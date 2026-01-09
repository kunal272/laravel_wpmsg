<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
    {

        $user = session()->get('permission');
        // dd($user);
        if ($user && isset($user)) {
            return redirect("dashboard");
        } else {
            return view("login.login");
        }
    }

    public function logout()
    {
        DB::statement("SET SQL_MODE=''");

        Session::flush();
        Auth::logout();

        return redirect("/")->with("success", 'You Log-Out Successfully !');
    }

    public function CheckLogin(Request $request)
    {

        // dd($request->all());
        DB::statement("SET SQL_MODE=''");
        Session::forget('permission');
        $user_check = User::where('username', '=', $request->username)->where('password', '=', $request->password)->first();

        if ($user_check) {
            if (Auth::guard('web')->attempt($request->only(['username', 'password']))) {
                $permission = DB::connection('mysql')
                    ->table('user_permission2')
                    ->where('user_permission2.username', '=', Auth::user()->username)
                    ->first();
                DB::connection('mysql')->table('usermaster')
                    ->where('usermaster.username', Auth::user()->username)
                    ->update([
                        'ip' => $request->ip(),
                        'lastlogin' => Carbon::now()
                    ]);

                Session::put('permission', $permission);
                return redirect("/dashboard")->with("success", "Successfully login.");
            }
        }
        return redirect('/')->with("error", "Please enter the valid username and password");
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function changePassword(Request $request)
    {

        DB::statement("SET SQL_MODE=''");

        $CurrentPass = $request->CurrentPass;
        $NewPass = $request->NewPass;
        $ConfirmPass = $request->ConfirmPass;
        $pass = Auth::user();

        if ($CurrentPass != $pass->Password) {
            return redirect('dashboard')->with('error', 'Current password does not match!');
        } elseif ($NewPass != $ConfirmPass) {
            return redirect('dashboard')->with('error', 'Confirm password does not match!');
        }

        $data = DB::table("loginmaster")
            ->where("Id", "=", $pass->Id)
            ->update(
                array(
                    "Password" => $request->NewPass
                )
            );
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success', 'Password successfully changed!  Login Again..');
    }
}
