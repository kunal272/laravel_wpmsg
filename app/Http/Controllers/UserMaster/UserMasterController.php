<?php

namespace App\Http\Controllers\UserMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class UserMasterController extends Controller
{
    public function index(Request $request)
    {
        $UserCount = DB::connection('mysql')
            ->table('usermaster as us')
            ->join('user_permission2 as per', 'per.user_id', '=', 'us.id')
            ->select('us.id', 'us.access', 'us.password', 'us.username', 'per.*')
            ->count();
        return view('userMaster.index', compact('UserCount'));
    }


    public function getData(Request $request)
    {
        try {
            $userdata = DB::connection('mysql')
                ->table('usermaster as us')
                ->join('user_permission2 as per', 'per.user_id', '=', 'us.id')
                ->select('us.id', 'us.access', 'us.password', 'us.username', 'per.*')
                ->get();

            // dd($userdata);
            return view('userMaster.table.list', compact('userdata'));
        } catch (\Exception $e) {
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    public function givepermission(Request $request)
    {
        $user_id = $request->id;
        $permission = (object) $request->permissions;
        try {
            $Success = DB::connection('mysql')
                ->table('user_permission2')
                ->where('user_id', $user_id)
                ->update([
                    'dashboard' => $permission->dashboard,
                    'actionlog' => $permission->actionlog,
                    'usermaster' => $permission->usermaster
                ]);

            if (!empty($Success)) {
                return response()->json(['success' => 'Permission Updated Successfully']);
            } else {
                return response()->json(['error' => 'Nothing has been updated']);
            }
        } catch (\Exception $e) {
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    public function addNewUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:usermaster',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()]);
            }

            $getId = DB::connection('mysql')->table('usermaster')
                ->insertGetId([
                    'username' => $request->username,
                    'password' => $request->password,
                    'access' => $request->user_role,
                    'indate' => Carbon::now()
                ]);
            DB::connection('mysql')->table('user_permission2')
                ->insert([
                    'username' => $request->username,
                    'user_Id' => $getId,
                    'InDate' => Carbon::now()
                ]);

            return response()->json(['success' => 'Added new user successfully.']);
        } catch (\Exception $e) {
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }
}
