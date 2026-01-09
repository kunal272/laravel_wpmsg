<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = DB::table('usermaster')
            ->where('id', Auth::user()->id)
            ->first();
        return view('profile.index', compact('user'));
    }


    public function update(Request $request)
    {
        try {
            // dd($request->all());

            $validator = Validator::make($request->all(), [
                'id'       => 'required|integer|exists:usermaster,id',
                'username' => 'required|string|max:255',
                'access'   => 'required|string',
                'password' => 'nullable|string|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->first()
                ]);
            }

            $updateData = [
                'username' => $request->username,
                'access'   => $request->access,
            ];

            DB::table('usermaster')
                ->where('id', $request->id)
                ->update($updateData);

            DB::table('user_permission2')
                ->where('user_id', $request->id)
                ->update([
                    'username' => $request->username
                ]);
            return response()->json(['success' => 'Profile updated successfully']);
        } catch (\Exception $e) {
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }
}
