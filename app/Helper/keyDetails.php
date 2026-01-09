<?php

namespace App\Helper;

use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class keyDetails
{

    public static function submitBlockKeyData($lic_key, $reason)
    {
        try {
            $lic_key = $lic_key;
            $reason = $reason;
            $client = new Client(['verify' => false]);
            $blockKeyApi = 'https://activation.indiaantivirus.com/userinfo2/api/blockKey';
            $timeout = 300; // 5 minutes

            $request = $client->post($blockKeyApi, [
                'json' => [
                    'keyNo' => $lic_key, // license key
                    'blockReason' => $reason
                ],
                'timeout' => $timeout
            ]);
            if ($request->getStatusCode() == 200) {
                $result = json_decode($request->getBody()->getContents());

                if ($result->status) {
                    return $result->status; // true
                }
            }
            return false;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public static function fetchKeyDetails($lic_key)
    {

        try {
            $client = new Client(['verify' => false]);
            $endpoint =  'https://activation.indiaantivirus.com/userinfo2/api/getKeyDetails';
            $getKeyDetails = $endpoint . "?licNo="; // userinfo2 tusharb
            $response = $client->request('GET', $getKeyDetails, ['query' => [
                'licNo' => $lic_key
            ]]);

            if ($response->getStatusCode() == 200) {
                $result = $response->getBody()->getContents();
                $result = json_decode($result);
                // dd($result);
                if (!empty($result) && !empty($result->status)) {
                    return true;
                }
                return false;
            }
            return false;
        } catch (Exception $e) {
            Log::error('Fetch key details error: ' . $e->getMessage());
            return false;
        }
    }

    public static function add_zskey($data)
    {
        try {
            $client = new Client(['verify' => false]);
            $add3YrSrvAPI = "http://activation.indiaantivirus.com/actN/addZs3YrSrv.asp?d="; // ip restricted API
            $response = $client->request('GET', $add3YrSrvAPI, ['query' => [
                'd' => $data
            ]]);

            if ($response->getStatusCode() == 200) {
                $result = $response->getBody()->getContents();
                return $result;
            }
            return false;
        } catch (Exception $e) {
            return false;
            //  Log::error('Add zs key error: ' . $e->getMessage());
            //return $e->getMessage();
        }
    }
}
