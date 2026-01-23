<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TodayReportController extends Controller
{
    public function index(Request $request)
    {
        $messageCount = DB::connection('mysql')
            ->table('message_queue')
            // ->where('user_id', Auth::user()->id)
            ->count();
        return view('report.todayReport.index', compact('messageCount'));
    }


    public function getData(Request $request)
    {
        try {
            $messages = DB::table('message_queue as mq')
                ->leftJoin('whatsapp_devices as wd', 'wd.id', '=', 'mq.device_id')
                ->select(
                    'mq.id',
                    'mq.mobile',
                    'mq.message',
                    'mq.status',
                    'mq.error_message',
                    'mq.created_at',
                    'mq.sent_at',
                    'wd.device_name',
                    'wd.mobile_number',
                    'wd.status as device_status'
                )
                // ->whereIn('mq.status', ['pending', 'failed'])
                ->orderBy('mq.created_at', 'desc')
                ->paginate(10);

            // dd($messages);

            return view('report.todayReport.table.list', compact('messages'));
        } catch (\Exception $e) {
            info('Error at TodayReportController getData :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }
}
