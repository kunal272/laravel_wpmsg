<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class ActionLogController extends Controller
{
    public function index(Request $request)
    {
        $actionlogscnt = DB::connection('mysql')->table('actionlogs as ac')
            ->join('usermaster as u', 'ac.AddedBy', '=', 'u.id')
            ->count();
        return view('log.actionLog.index', compact('actionlogscnt'));
    }

    public function getData(Request $request)
    {
        try {

            $actionlogs = DB::connection('mysql')->table('actionlogs as ac')
                ->join('usermaster as u', 'ac.AddedBy', '=', 'u.id')
                ->select('ac.id', 'u.username', 'ac.Action', 'ac.Description', 'ac.Indate')
                ->orderBy('ac.id', 'desc')
                ->paginate(100);

            return view('log.actionLog.table.list', compact('actionlogs'));
        } catch (\Exception $e) {
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }
}
