<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Helper\ActionHelper;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $DeiceCount = DB::connection('mysql')
            ->table('whatsapp_devices')
            ->where('user_id', Auth::user()->id)
            ->count();
        return view('device.index', compact('DeiceCount'));
    }


    public function getData(Request $request)
    {
        try {
            $devices =  DB::connection('mysql')
                ->table('whatsapp_devices')
                ->where('user_id', Auth::user()->id)
                ->get();
            return view('device.table.list', compact('devices'));
        } catch (\Exception $e) {
            info('Error at DeviceController getData :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    public function addDevice(Request $request)
    {
        try {
            // dd($request->all());
            $validator = Validator::make(
                $request->all(),
                [
                    'device_name'   => 'required',
                    'mobile_number' => 'required|digits:10',
                    'webhook_url'   => 'nullable|url',
                ],
                [
                    'device_name.required' => 'Device name is required.',
                    'mobile_number.required' => 'Mobile number is required.',
                    'mobile_number.digits' => 'Mobile number must be exactly 10 digits.',
                    'webhook_url.url' => 'Webhook URL must be a valid URL.',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error'  => $validator->errors()->first()]);
            }

            DB::connection('mysql')
                ->table('whatsapp_devices')->insert([
                    'user_id'       => Auth::user()->id,
                    'device_name'   => $request->device_name,
                    'mobile_number' => $request->mobile_number,
                    'api_token'     => Str::random(32),
                    'webhook_url'   => $request->webhook_url,
                    'status'        => 'OFFLINE'
                ]);

            try {
                ActionHelper::saveAction(
                    'New Device is added...',
                    $request->device_name,
                    Auth::user()->id
                );
            } catch (\Exception $e) {
                info($e->getMessage());
                return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
            }

            return response()->json(['success' => 'Device added successfully']);
        } catch (\Exception $e) {
            info('Error at DeviceController addDevice :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    public function scanDevice(Request $request)
    {
        try {
            // dd(env('NODE_API_KEY'));
            $id = $request->id;
            $response = Http::withHeaders([
                'x-api-key' => config('constant.node_api_key'),
            ])->get(config('constant.whatsapp_api_url') . "/api/whatsapp/qr/$id");

            try {

                $deviceInfo = DB::connection('mysql')
                    ->table('whatsapp_devices')
                    ->where('id', $id)->first();
                ActionHelper::saveAction(
                    "Device is scanned...",
                    $deviceInfo->device_name,
                    Auth::user()->id
                );
            } catch (\Exception $e) {
                info($e->getMessage());
                return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
            }

            return response()->json($response->json());
        } catch (\Exception $e) {
            info('Error at DeviceController getData :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['status' => false, 'message' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['status' => false, 'message' => "Something went wrong..!"]);
            }
        }
    }

    public function checkStatus(Request $request)
    {
        try {
            $deviceId = $request->id;

            $response = Http::withHeaders([
                'x-api-key' => config('constant.node_api_key'),
            ])->get(config('constant.whatsapp_api_url') . "/api/whatsapp/status/$deviceId");

            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Node API not reachable'
                ], 500);
            }
            $data = $response->json();
            info($data);

            if ($data['is_ready']) {
                DB::connection('mysql')
                    ->table('whatsapp_devices')
                    ->where('id', $deviceId)
                    ->update([
                        'status'     => 'ONLINE',
                        'updated_at' => now()
                    ]);

                try {
                    $deviceInfo = DB::connection('mysql')
                        ->table('whatsapp_devices')
                        ->where('id', $deviceId)->first();
                    ActionHelper::saveAction(
                        "Device is ready...",
                        $deviceInfo->device_name,
                        Auth::user()->id
                    );
                } catch (\Exception $e) {
                    info($e->getMessage());
                    return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
                }
            }
            return response()->json([
                'success'   => true,
                'status'    => $data['status'],
                'message'   => $data['message'],
                'number'    => $data['number'],
                'is_ready'  => $data['is_ready']
            ]);
        } catch (\Exception $e) {
            info('Error at DeviceController getData :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['status' => false, 'message' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['status' => false, 'message' => "Something went wrong..!"]);
            }
        }
    }

    public function logout(Request $request)
    {
        try {

            // dd($request->all());
            $request->validate([
                'id' => 'required'
            ]);

            $deviceId = $request->id;


            $response = Http::withHeaders([
                'x-api-key' => config('constant.node_api_key'),
            ])->post(
                config('constant.whatsapp_api_url') . "/api/whatsapp/logout/{$deviceId}"
            );


            info($response->json());

            if ($response->json('success')) {
                DB::table('whatsapp_devices')
                    ->where('id', $deviceId)
                    ->update([
                        'status' => 'DISCONNECTED',
                        'updated_at' => now()
                    ]);

                try {
                    $deviceInfo = DB::connection('mysql')
                        ->table('whatsapp_devices')
                        ->where('id', $deviceId)->first();
                    ActionHelper::saveAction(
                        "Device is logout successfully...",
                        $deviceInfo->device_name,
                        Auth::user()->id
                    );
                } catch (\Exception $e) {
                    info($e->getMessage());
                    return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
                }
            }

            // Node error
            if (!$response->ok() || !$response->json('status')) {
                return response()->json($response->json());
            } else {
                return response()->json($response->json());
            }
        } catch (\Exception $e) {
            info('Error at DeviceController getData :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['status' => false, 'message' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['status' => false, 'message' => "Something went wrong..!"]);
            }
        }
    }

    public function deleteDevice(Request $request)
    {
        try {
            $deviceId = $request->id;

            if (!$deviceId) {
                return response()->json([
                    'status' => false,
                    'message' => 'Device ID is required'
                ]);
            }

            $deleted = DB::connection('mysql')
                ->table('whatsapp_devices')
                ->where('id', $deviceId)
                ->where('user_id', Auth::user()->id)
                ->delete();

            if (!$deleted) {
                return response()->json([
                    'status' => false,
                    'message' => 'Device not found or already deleted'
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Device deleted successfully'
            ]);
        } catch (\Exception $e) {
            info('Error at DeviceController deleteDevice :' . $e->getMessage());

            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json([
                    'status' => false,
                    'error' => substr($e->getMessage(), 0, 126),
                    'string' => $e->__toString()
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong..!'
                ]);
            }
        }
    }
}
