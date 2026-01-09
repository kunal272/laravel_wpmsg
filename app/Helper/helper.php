<?php

namespace App\Helper;

use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Helper\EncodeDecode;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class Helper
{

    public static function SendPasswordEmail($to, $messageBody, $orgId)
    {
        try {
            $client = new Client(['verify' => false]);

            $baseuri_email = url('/api/emailapi');
            $request = $client->post($baseuri_email, [
                'json' => [
                    'from' => "cybersecai@npav.net",
                    'to' => $to,
                    'title' => "NP CyberSecAi Storage",
                    'header' => "Your SSD Tracker Account Access Details",
                    'subject' => "SSD Tracker - Login Credentials Sent",
                    'body' => $messageBody
                ]

            ]);
            if ($request->getStatusCode() == 200) {
                DB::connection('mysql')->table('organization_master')->where('orgId', $orgId)->update([
                    'isWelcomeMailSent' => true
                ]);
                return true;
            }
            return false;
        } catch (Exception $e) {
            info(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            return false;
        }
    }

    public static function SendForgotPasswordEmail($to, $messageBody, $orgId)
    {
        try {
            $client = new Client(['verify' => false]);

            $baseuri_email = url('/api/emailapi');
            $request = $client->post($baseuri_email, [
                'json' => [
                    'from' => "cybersecai@npav.net",
                    'to' => $to,
                    'title' => "NP CyberSecAi Storage",
                    'header' => "Your SSD Tracker Account Access Details",
                    'subject' => "SSD Tracker - Login Credentials Sent",
                    'body' => $messageBody
                ]

            ]);
            if ($request->getStatusCode() == 200) {
                DB::connection('mysql')->table('organization_master')->where('orgId', $orgId)->update([
                    'isWelcomeMailSent' => true
                ]);
                return true;
            }
            return false;
        } catch (Exception $e) {
            info(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            return false;
        }
    }



    public static function generateUniqueOrderId()
    {
        try {
            $randomChar = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 1);
            $randomNumber = random_int(10000000, 99999999);
            $randomChar2 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 1);
            $OrderNo = strtoupper($randomChar) . $randomNumber . strtoupper($randomChar2);

            $CheckOrderNo = DB::table('paymentinfo')->where('orderNumber', $OrderNo)->exists();
            if (!empty($CheckOrderNo)) {
                return self::generateUniqueOrderId();
            }
            return $OrderNo;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // ----- IP logging helper -----
    public static function add_ip($name = '', $msg = '')
    {
        try {
            $clientIP = request()->ip(); // customer public ip address

            $FetchIPData = DB::table('ipusermaster')->where('IspIp', $clientIP)->select('Id', 'Hits')->first();

            if (!empty($FetchIPData)) {
                $Hits = $FetchIPData->Hits;
                $IPAddId = $FetchIPData->Id;

                $FetchHitCount = DB::table('ipuserlogs')
                    ->where('IpId', $IPAddId)
                    ->whereDate('InDate', Carbon::now()->toDateString())
                    ->select('Id')
                    ->get();

                if (count($FetchHitCount) >= 100) {
                    $InsertedBlockIP = DB::table('ipuserblocked')->insertGetId([
                        'IpId' => $IPAddId,
                        'Reason' => 'SAME_DAY_MULTIPLE_REQUESTS',
                        'InDate' => Carbon::now()->toDateTimeString(),
                    ]);
                    return response()->json(['msg' => 'SAME DAY MULTIPLE REQUESTS.', 'class' => 'error']);
                }

                DB::table('ipusermaster')
                    ->where('Id', $IPAddId)
                    ->update([
                        'Hits' => $Hits + 1,
                        'UpdDate' => Carbon::now()->toDateTimeString(),
                    ]);
            } else {
                $InsertedIPMaster = DB::table('ipusermaster')->insertGetId([
                    'Hits' => 1,
                    'IspIp' => $clientIP,
                    'InDate' => Carbon::now()->toDateTimeString(),
                ]);
                $IPAddId = $InsertedIPMaster;
            }

            $InsertedIPLogs = DB::table('ipuserlogs')->insertGetId([
                'IpId' => $IPAddId,
                'Name' => !empty($name) ? $name : 'NEW_ORDER',
                'Msg' => !empty($msg) ? $msg : 'New order api method.',
                'InDate' => Carbon::now()->toDateTimeString(),
            ]);
            return $InsertedIPLogs;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
