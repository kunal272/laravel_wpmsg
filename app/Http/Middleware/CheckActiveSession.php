<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSession;

class CheckActiveSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $userId = session('user')['orgId'] ?? null; // Use your session structure
            $sessionId = session()->getId();

            if ($userId) {
                $exists = UserSession::where('user_id', $userId)
                    ->where('session_id', $sessionId)
                    ->exists();

                if (!$exists) {
                    // Session row not found — log out user
                    Auth::logout();

                    try {
                        \Illuminate\Support\Facades\Session::getHandler()->destroy($sessionId);
                    } catch (\Exception $e) {
                        log($e->getMessage());
                    }

                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect('/')->with('error', 'You have been logged out from this device.');
                }
            }
        }

        return $next($request);
    }
}
