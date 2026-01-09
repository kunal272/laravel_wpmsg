<?php

namespace App\Helper;

use GuzzleHttp\Client;
use Exception;

class ActionHelper
{
    public static function saveAction($action, $description, $addedBy)
    {
        try {
            info("Action Log Added...");
            $Api_Url = url('/api/saveAction');
            info("Api_Url : $Api_Url");
            $client = new Client(['verify' => false]);
            return $client->post($Api_Url, [
                'json' => [
                    "Action"      => $action,
                    "Description" => $description,
                    "AddedBy"     => $addedBy,
                ]
            ]);
        } catch (Exception $e) {
            info("API ERROR : " . $e->getMessage());
            return false;
        }
    }
}
