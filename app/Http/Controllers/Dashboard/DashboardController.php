<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function dashboard()
    {
        return view('dashboard.index', [
            'totalDevices'   => DB::table('whatsapp_devices')->count(),
            'activeDevices'  => DB::table('whatsapp_devices')->where('status', 'ONLINE')->count(),
            'phonebooks'     => DB::table('phonebooks')->count(),
            'contacts'       => DB::table('phonebook_contacts')->count(),
            'todayMessages'  => DB::table('whatsapp_logs')
                ->whereDate('created_at', today())
                ->count()
        ]);
    }

    public function loadTable(Request $request)
    {
        try {
            $type = $request->type;
            // $Curdate = Carbon::today()->toDateString();
            $Curdate = "2025-03-23";
            // $yesterday = Carbon::yesterday()->toDateString();
            $yesterday = "2025-03-23";
            // $last10 = Carbon::today()->subDays(10)->toDateString();
            $last10 = "2025-03-13";

            switch ($type) {

                // PRODUCT SUMMARY
                case 'product_summary':
                    $Product = DB::connection('mysql')->table('PAYMENTINFO AS RESULT')
                        ->select(
                            'PROD.PRODCODE',
                            DB::raw("SUM(PROD.PRODQTY + PROD.PRODQTYFREE) AS ORDERCOUNT"),
                            DB::raw("SUM(IF(RESULT.ISPAYMENTSUCCESSFUL = 2, PROD.PRODQTY + PROD.PRODQTYFREE, 0)) AS ORDERCOUNTSUCCESS"),
                            DB::raw("SUM(IF(chqDetails = 'Checkoutp' , PROD.PRODQTY ,0)) AS CHECKOUTCOUNT"),
                            DB::raw("
CASE
    -- SOFTWARE : Add validity Yr if not already in name
    WHEN PROD.ProductGroup = 'Software'
         AND COALESCE(PO.validity, '') <> ''
         AND LOCATE('Yr',
            TRIM(REPLACE(REPLACE(REPLACE(REPLACE(
                LEFT(PROD.ProdName, 100),
                'Online',''), 'Years','Yr'),
                'Year','Yr'), 'Net Protector',''))
         ) = 0
    THEN CONCAT(
        TRIM(REPLACE(REPLACE(REPLACE(REPLACE(
            LEFT(PROD.ProdName, 100),
            'Online',''), 'Years','Yr'),
            'Year','Yr'), 'Net Protector','')),
        ' ', PO.validity, ' Yr'
    )

-- HARDWARE : Add VariantValue (NOT validity)
WHEN PROD.ProductGroup = 'Hardware'
     AND COALESCE(PO.VariantValue, '') <> ''
THEN CONCAT(
    TRIM(REPLACE(REPLACE(REPLACE(REPLACE(
        LEFT(PROD.ProdName, 100),
        'Online',''), 'Years','Yr'),
        'Year','Yr'), 'Net Protector','')),
    ' ', PO.VariantValue
)

-- DEFAULT : only cleaned name
ELSE TRIM(REPLACE(REPLACE(REPLACE(REPLACE(
        LEFT(PROD.ProdName, 100),
        'Online',''), 'Years','Yr'),
        'Year','Yr'), 'Net Protector',''))
END AS PRODNAME
")
                        )
                        ->join('PRODUCTINFO AS PROD', 'PROD.PAYID', '=', 'RESULT.PAYID')
                        ->leftJoin('product_options AS PO', 'PROD.PRODCODE', '=', 'PO.PRODCODE')
                        ->whereBetween('RESULT.PAYMENTDATE', ["$Curdate 00:00:00", "$Curdate 23:59:59"])
                        ->groupBy('PROD.PRODCODE') //'PROD.ProdName',
                        ->orderBy('RESULT.PAYID', 'desc')
                        ->limit(10000)
                        ->get();
                    return view('dashboard.table.productSummary', compact('Product'));

                    // ORDER SUMMARY (TODAY)
                case 'order_today':
                    $OrderSummeryToday = DB::connection('mysql')
                        ->table(DB::raw('(SELECT PAYID, ORDERTYPE, PAYMENTDATE, chqDetails, ISPAYMENTSUCCESSFUL FROM PAYMENTINFO ORDER BY PAYID DESC LIMIT 10000) AS RESULT'))
                        ->select(
                            'ORDERTYPE',
                            DB::raw("CASE
                            WHEN ORDERTYPE = 0 THEN 'END USER'
                            WHEN ORDERTYPE = 1 THEN 'DEALER'
                            WHEN ORDERTYPE = 2 THEN 'DUKAN'
                            WHEN ORDERTYPE = 3 THEN 'BUYNOW.EXE'
                            WHEN ORDERTYPE = 4 THEN 'RENEWAL'
                            WHEN ORDERTYPE = 5 THEN 'WFH OFFER'
                            WHEN ORDERTYPE = 6 THEN 'CUSTOM PAYMENT'
                            WHEN ORDERTYPE = 7 THEN 'MY ACCOUNT'
                            WHEN ORDERTYPE = 8 THEN 'AV TO TS'
                            WHEN ORDERTYPE = 9 THEN 'UPGRADE'
                            WHEN ORDERTYPE = 10 THEN 'MOBILE SECURITY'
                            WHEN ORDERTYPE = 11 THEN 'MANUALLY'
                            WHEN ORDERTYPE = 12 THEN 'PAY EDITION UPGRADE'
                            WHEN ORDERTYPE = 13 THEN 'TRACK MEE'
                        END AS ORDERTYPENAME"),
                            DB::raw('COUNT(RESULT.PAYID) AS ORDERCOUNT'),
                            DB::raw('SUM(IF(RESULT.ISPAYMENTSUCCESSFUL = 2, 1, 0)) AS ORDERCOUNTSUCCESS'),
                            DB::raw("SUM(IF(chqDetails = 'Checkoutp', 1, 0)) AS CHECKOUTCOUNT")
                        )
                        ->whereDate('PAYMENTDATE', $Curdate)
                        ->groupBy('ORDERTYPE')
                        ->orderBy('ORDERTYPE')
                        ->get();
                    return view('dashboard.table.orderSummaryToday', compact('OrderSummeryToday'));

                case 'order_yesterday':

                    $OrderSummeryYesterday = DB::connection('mysql')
                        ->table(DB::raw('(SELECT PAYID, ORDERTYPE, PAYMENTDATE, chqDetails, ISPAYMENTSUCCESSFUL FROM PAYMENTINFO ORDER BY PAYID DESC LIMIT 10000) AS RESULT'))
                        ->select(
                            'ORDERTYPE',
                            DB::raw("CASE
                            WHEN ORDERTYPE = 0 THEN 'END USER'
                            WHEN ORDERTYPE = 1 THEN 'DEALER'
                            WHEN ORDERTYPE = 2 THEN 'DUKAN'
                            WHEN ORDERTYPE = 3 THEN 'BUYNOW.EXE'
                            WHEN ORDERTYPE = 4 THEN 'RENEWAL'
                            WHEN ORDERTYPE = 5 THEN 'WFH OFFER'
                            WHEN ORDERTYPE = 6 THEN 'CUSTOM PAYMENT'
                            WHEN ORDERTYPE = 7 THEN 'MY ACCOUNT'
                            WHEN ORDERTYPE = 8 THEN 'AV TO TS'
                            WHEN ORDERTYPE = 9 THEN 'UPGRADE'
                            WHEN ORDERTYPE = 10 THEN 'MOBILE SECURITY'
                            WHEN ORDERTYPE = 11 THEN 'MANUALLY'
                            WHEN ORDERTYPE = 12 THEN 'PAY EDITION UPGRADE'
                            WHEN ORDERTYPE = 13 THEN 'TRACK MEE'
                        END AS ORDERTYPENAME"),
                            DB::raw('COUNT(RESULT.PAYID) AS ORDERCOUNT'),
                            DB::raw('SUM(IF(RESULT.ISPAYMENTSUCCESSFUL = 2, 1, 0)) AS ORDERCOUNTSUCCESS'),
                            DB::raw("SUM(IF(chqDetails = 'Checkoutp', 1, 0)) AS CHECKOUTCOUNT")
                        )
                        ->whereDate('PAYMENTDATE', $yesterday)
                        ->groupBy('ORDERTYPE')
                        ->orderBy('ORDERTYPE')
                        ->get();
                    return view('dashboard.table.orderSummaryYesterday', compact('OrderSummeryYesterday'));

                case 'order_ten_day':

                    $order = DB::table('PAYMENTINFO as RESULT')
                        ->select(
                            DB::raw("DATE(RESULT.PAYMENTDATE) as ORDERDATE"),
                            DB::raw("COUNT(RESULT.PAYID) as ORDERCOUNT"),
                            DB::raw("SUM(IF(RESULT.ISPAYMENTSUCCESSFUL = 2, 1, 0)) as ORDERCOUNTSUCCESS"),
                            DB::raw("SUM(IF(RESULT.chqDetails = 'Checkoutp', 1, 0)) as CHECKOUTCOUNT")
                        )
                        ->whereBetween('RESULT.PAYMENTDATE', ["$last10 00:00:00", "$Curdate 23:59:59"])
                        ->groupBy(DB::raw("DATE(RESULT.PAYMENTDATE)"))
                        ->orderByDesc(DB::raw("DATE(RESULT.PAYMENTDATE)"))
                        ->get();
                    return view('dashboard.table.orderSummaryTenDay', compact('order'));

                    // KEY STOCK
                case 'key_stock':
                    $serial = DB::connection('mysql')->table('KEYINFO')
                        ->select(
                            DB::raw("(CASE
                WHEN (SERIALINITIAL = 'E') THEN '01.TS 1 YR'
                WHEN (SERIALINITIAL = 'A') THEN '02.TS 3 YR'
                WHEN (SERIALINITIAL = 'L') THEN '03.AV PRO 1 YR'
                WHEN (SERIALINITIAL = 'S') THEN '04.SRV 1 YR'
                WHEN (SERIALINITIAL = 'T') THEN '05.SRV 3 YR'
                WHEN (SERIALINITIAL = 'X' AND KeyValidity = 0) THEN '06.Z SEC 1/3 YR'
                WHEN (SERIALINITIAL = 'W') THEN '07.Win10Boost 1 YR'
                WHEN (SERIALINITIAL = 'B') THEN '08.Parental Control App'
                WHEN (SERIALINITIAL = 'V') THEN '10.PTS 1 YR'
                WHEN (SERIALINITIAL = 'P') THEN '11.IS 1 YR'
                WHEN (SERIALINITIAL = 'W') THEN '12.CWC 1 YR'
                WHEN (SERIALINITIAL = 'F') THEN '13.TS 30 DAYS'
                WHEN (SERIALINITIAL = 'U') THEN '14.TAB SEC 1 YR'
                WHEN (SERIALINITIAL = 'Y') THEN '15.GameBooster 1 YR'
                WHEN (SERIALINITIAL = 'M' AND LEFT(serialNo, 1) != 'P') THEN '16.MOB SEC 1 YR'
                WHEN (SERIALINITIAL = 'M' AND LEFT(serialNo, 1) = 'P') THEN '17.MOB SEC PREMIUM 1 YR'
                WHEN (SERIALINITIAL = 'D') THEN '18.DOC LOCKER 1 YR'
                WHEN (SERIALINITIAL = 'X' AND KeyValidity = 15 ) THEN '19.Z SEC FESTIVE 1 YR'
                WHEN (SERIALINITIAL = 'X' AND KeyValidity = 12 AND edition='ZS') THEN '20.Z SEC 1 YR'
                WHEN (SERIALINITIAL = 'X' AND KeyValidity = 36 AND edition='ZS') THEN '21.Z SEC 3 YR'
                WHEN (SERIALINITIAL = 'X' AND KeyValidity = 12 AND edition='ZPS') THEN '22.Z PLUS SEC 1 YR'
                WHEN (SERIALINITIAL = 'X' AND KeyValidity = 36 AND edition='ZPS') THEN '23.Z PLUS SEC 3 YR'
                WHEN (SERIALINITIAL = 'O') THEN '24.PC OPT'
                WHEN (SERIALINITIAL = 'FP') THEN '25.FP 1 YR'
                ELSE SERIALINITIAL
                END) AS EDN"),
                            DB::raw('count(KEYISSUED) as CNT_STK')
                        )
                        ->where('KEYISSUED', false)
                        ->groupBy('SERIALINITIAL')
                        ->groupBy('EDN')
                        ->orderByDesc('CNT_STK')
                        ->get();
                    return view('dashboard.table.keyStock', compact('serial'));

                    // SOURCE SUMMARY
                case 'source_summary':
                    $summery = DB::table('SOURCELOG AS SRCL')
                        ->select(
                            DB::raw('(SELECT SRCNAME FROM SOURCEMASTER WHERE SRCID = SRCL.SRCID LIMIT 1) AS ORDERDATE'),
                            DB::raw("IFNULL((SELECT IF(SRCA.APPNAME = '', 'not-passed', SRCA.APPNAME)
                            FROM SOURCEAPPMASTER SRCA WHERE SRCA.APPID = SRCL.APPID LIMIT 1), 'not-available') AS ORDERDATEAPP"),
                            DB::raw('COUNT(SRCL.ID) AS ORDERCOUNT'),
                            DB::raw('SUM(IF((SELECT PAY.ISPAYMENTSUCCESSFUL FROM PAYMENTINFO PAY WHERE PAY.PAYID = SRCL.PAYID LIMIT 1) = 2, 1, 0)) AS ORDERCOUNTSUCCESS')
                        )
                        ->whereDate('SRCL.INDATE', $Curdate)
                        ->groupBy('SRCL.SRCID', 'ORDERDATEAPP')
                        ->orderBy('SRCL.SRCID')
                        ->get();
                    return view('dashboard.table.sourceSummary', compact('summery'));

                case 'key_not_send':
                    $KeyNotSent =  DB::connection('mysql')->table('paymentinfo AS p')
                        // ->select(DB::raw('count(p.payID) as Count'))
                        ->leftJoin('productinfo AS PI', 'p.payID', 'PI.PayId')
                        ->where('isPaymentSuccessful', 2)
                        ->where('isKeyAlreadySent', false)
                        ->where('isKeySent', false)
                        ->whereBetween('PAYMENTDATE', [date('Y-m-d', strtotime('-15 days')) . '00:00:00', date('Y-m-d', strtotime('0 days')) . '23:59:59'])
                        ->whereNotIn('PI.ProdCode', ['SU-CB-1001', 'SU-CB-1002', 'SU-CWC-1023', 'SU-EPS-1022'])
                        ->whereNotIn('orderNumber', function ($q) {
                            $q->select('OrderNo')->from('productinfo')
                                ->whereBetween('Entry_Dttm', [date('Y-m-d', strtotime('-15 days')) . '00:00:00', date('Y-m-d', strtotime('0 days')) . '23:59:59'])
                                ->get();
                        })
                        ->count();
                    return view('dashboard.table.keyNotSend', compact('KeyNotSent'));

                case 'UnActivated_Keys':
                    $unactive = DB::select("SELECT CAST(LEFT(RESULT1.EDN, 2) AS CHAR) AS SRNO,
                                    RIGHT(RESULT1.EDN, LENGTH(RESULT1.EDN) - 3) AS EDN, RESULT1.CNT
                                    FROM (SELECT CASE WHEN  LEFT(SERIALINITIAL,1) = 'E' THEN '01.TS 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'A' THEN '02.TS 3 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'S' THEN '03.SRV 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'T' THEN '04.SRV 3 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'X' THEN '05.Z SEC 1/3 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'W' THEN '06.Win10Boost 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'B' THEN '07.Parental Control  1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'V' THEN '08.TSP 1/3 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'L' THEN '09.AV PRO 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'P' THEN '10.IS 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'O' THEN '11.PC OPT'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'W' THEN '12.CWC 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'F' THEN '13.TS 30 DAYS'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'M' THEN '14.MOB SEC 1 YR'
                                    --  WHEN (LEFT(SERIALINITIAL,1) AND LEFT(SERIALINITIAL,3) != 'M-P')  THEN '14.MOB SEC 1 YR'
                                    --  WHEN (LEFT(SERIALINITIAL,1) AND LEFT(SERIALINITIAL,3) = 'M-P')  THEN '17.MOB SEC PREMIUM 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'U' THEN '15.TAB SEC 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'Y' THEN '16.GameBooster 1 YR'
                                    WHEN  LEFT(SERIALINITIAL,1) = 'D' THEN '18.DOC LOCKER 1 YR'
                                    ELSE '17.NA'
                                    END AS EDN, CNT
                                    FROM (SELECT  LEFT(KEYNO, 3) AS SERIALINITIAL,  COUNT(KID) AS CNT FROM KEYINFOACT
                                    WHERE !ISACT  AND !ISBLOCK  GROUP BY LEFT(KEYNO, 1)) AS RESULT) AS RESULT1 ORDER BY SRNO");


                    return view('dashboard.table.unActivatedKeys', compact('unactive'));

                case 'keyActive_Status':
                    $status = DB::select("SELECT * FROM (SELECT YEAR(ISSDATE) AS YER, MONTH(ISSDATE) AS MNT,
                     COUNT(KID) AS CNT_TOT, SUM(IF(ISACT=TRUE AND ISBLOCK =FALSE, 1, 0)) AS CNT_ACT,
                     SUM(IF(ISBLOCK=TRUE, 1, 0)) AS CNT_BLK  FROM KEYINFOACT GROUP BY YEAR(ISSDATE),
                     MONTH(ISSDATE)) AS RESULT ORDER BY RESULT.YER DESC, RESULT.MNT DESC LIMIT 12;");


                    return view('dashboard.table.keyActiveStatus', compact('status'));

                default:
                    return response()->json(['error' => 'Invalid table type'], 400);
            }
        } catch (\Exception $e) {
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }
}
