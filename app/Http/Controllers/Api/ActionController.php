<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    public function saveAction(Request $request)
    {
        try {
            info('Call Successfully...');
            DB::connection('mysql')->table('actionlogs')
                ->insert([
                    'Action' => $request->Action,
                    'Description' => $request->Description,
                    'Indate' => NOW(),
                    'AddedBy' => $request->AddedBy,
                ]);

            return response()->json(["status" => true, "msg" => "Action Perform  Succesfully "]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "msg" => "Something went wrong "]);
        }
    }
}
