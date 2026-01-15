<?php

namespace App\Http\Controllers\ForgotPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Helper\helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ForgotPasswordController extends Controller
{
    public function sendCustomResetLink(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required|email'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'We couldn\'t find an account with that email.']);
            }

            $token = Password::getRepository()->create($user);
            $resetUrl = url("/reset-password/{$token}?email={$user->email}");

            $messageBody = "
<p style=\"line-height: 1.6; font-family: Arial, sans-serif; font-size: 15px;\">
    Dear User,
</p>

<p style=\"line-height: 1.6; font-family: Arial, sans-serif; font-size: 15px;\">
    We received a request to reset the password for your <strong>NPAV CyberSec AI SSD Tracker</strong> account.
</p>

<p style=\"line-height: 1.6; font-family: Arial, sans-serif; font-size: 15px;\">
    Please click the button below to set a new password:
</p>

<p style=\"text-align: center; margin: 30px 0;\">
    <a href=\"{$resetUrl}\"
       style=\"
            background-color: #007bff;
            color: #ffffff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            display: inline-block;\">
        Reset Your Password
    </a>
</p>

<p style=\"line-height: 1.6; font-family: Arial, sans-serif; font-size: 15px;\">
    If you did not request a password reset, please ignore this email or contact support if you have concerns.
</p>

<p style=\"line-height: 1.6; font-family: Arial, sans-serif; font-size: 15px;\">
    This link will expire in 60 minutes for security reasons.
</p>

<p style=\"line-height: 1.6; font-family: Arial, sans-serif; font-size: 15px;\">
    Best regards,<br>
    <strong>Team NPAV CyberSec AI SSD Tracker</strong>
</p>
";

            $sent = Helper::SendForgotPasswordEmail($user->email, $messageBody, $user->organization_id);
            return back()->with('status', 'Reset link sent to your email.');
        } catch (\Exception $e) {
            info($e->getMessage());
            return back()->withErrors(['email' => 'Failed to send reset link. Please try again later.']);
        }
    }


    public function showResetForm(Request $request, $token = null)
    {
        try {

            $email = $request->query('email');

            if ($email) {
                $emailPresent = DB::table('password_reset_tokens')
                    ->where('email', $email)
                    ->first();

                if ($emailPresent) {
                    return view('forgotPassword.reset-password', compact('token', 'email'));
                } else {
                    return view('forgotPassword.link-expired');
                }
            }
        } catch (\Exception $e) {
            info($e->getMessage());
            return back()->withErrors(['email' => "Something went wrong...!"]);
        }
    }

    // Handle the password reset submission
    public function reset(Request $request)
    {

        try {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
            ]);


            $tokenData = DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->first();


            if (!$tokenData || !Hash::check($request->token, $tokenData->token)) {
                return back()->withErrors(['email' => 'Invalid or expired token.']);
            }


            $tokenCreatedAt = Carbon::parse($tokenData->created_at);
            if ($tokenCreatedAt->addMinutes(60)->isPast()) {
                return back()->withErrors(['email' => 'Token expired. The reset link is valid only for 60 minutes. Please request a new password reset.']);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'User not found.']);
            }


            $user->password = Hash::make($request->password);
            $user->save();


            DB::table('password_reset_tokens')->where('email', $request->email)->delete();


            return redirect('/')->with('success', 'Password has been successfully reset.');
        } catch (\Exception $e) {
            info($e->getMessage());
            return back()->withErrors(['email' => "Something went wrong...!"]);
        }
    }
}
