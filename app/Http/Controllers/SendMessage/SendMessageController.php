<?php

namespace App\Http\Controllers\SendMessage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SendMessageController extends Controller
{
    public function index()
    {
        $devices    = DB::table('whatsapp_devices')->where('user_id', Auth::user()->id)->get();
        $phonebooks = DB::table('phonebooks')->where('user_id', Auth::user()->id)->get();
        $templates  = DB::table('whatsapp_templates')->where('user_id', Auth::user()->id)->get();

        return view('sendMessage.index', compact(
            'devices',
            'phonebooks',
            'templates'
        ));
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_id' => 'required',
            'message'   => 'required|max:1024'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        DB::beginTransaction();

        try {

            $numbers = [];

            // From phonebook
            if ($request->phonebook_id) {
                $numbers = DB::table('phonebook_contacts')
                    ->where('phonebook_id', $request->phonebook_id)
                    ->pluck('mobile')
                    ->toArray();
            }

            // From manual input
            if ($request->numbers) {
                $manual = explode(',', $request->numbers);
                $numbers = array_merge($numbers, $manual);
            }

            if (empty($numbers)) {
                return response()->json(['error' => 'No receiver found']);
            }

            // Upload media
            $mediaPath = null;
            if ($request->hasFile('media')) {
                $mediaPath = $request->file('media')->store('whatsapp-media');
            }

            foreach ($numbers as $number) {
                DB::table('message_queue')->insert([
                    'device_id'   => $request->device_id,
                    'mobile'      => trim($number),
                    'message'     => $request->message,
                    'media'       => $mediaPath,
                    'schedule_at' => $request->schedule_at,
                    'delay'       => $request->delay ?? 0,
                    'status'      => 'pending',
                    'created_at'  => now()
                ]);
            }

            DB::commit();
            return response()->json(['success' => 'Message queued successfully']);
        } catch (\Exception $e) {
            DB::rollBack();

            info('Error at SendMessageController send :' . $e->getMessage());

            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json([
                    'error' => substr($e->getMessage(), 0, 126),
                    'string' => $e->__toString()
                ]);
            } else {
                return response()->json(['error' => 'Something went wrong..!']);
            }
        }
    }
}
