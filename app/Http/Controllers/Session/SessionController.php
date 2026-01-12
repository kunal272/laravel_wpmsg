<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UserSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class SessionController extends Controller
{
    public function logoutDevice($id)
    {

        try {

            $userId = Auth::user()->id; // Use Auth instead of session('user_id')

            $session = UserSession::where('user_id', $userId)->find($id);

            if (!$session) {
                return response()->json([
                    'error' => 'Session not found.'
                ]);
            }

            try {
                // Destroy Laravel session safely
                Session::getHandler()->destroy($session->session_id);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }

            $session->delete();

            return response()->json([
                'success' => 'Device logged out successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => substr($e->getMessage(), 0, 126)
            ]);
        }
    }

    public function logoutAll()
    {
        try {
            $userId = Auth::user()->id; // current user
            $currentSessionId = Session::getId();

            // Fetch all other sessions
            $sessions = UserSession::where('user_id', $userId)
                ->where('session_id', '!=', $currentSessionId)
                ->get();

            // dd($sessions);

            foreach ($sessions as $session) {
                try {
                    // Destroy Laravel session safely
                    Session::getHandler()->destroy($session->session_id);
                } catch (\Exception $e) {
                    Log::error("Failed to destroy session {$session->session_id}: {$e->getMessage()}");
                }

                // Remove from user_sessions table
                $session->delete();
            }

            return response()->json([
                'success' => 'Logged out from all other devices.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => substr($e->getMessage(), 0, 126)
            ]);
        }
    }
}
