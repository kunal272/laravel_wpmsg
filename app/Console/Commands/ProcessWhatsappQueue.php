<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessWhatsappQueue extends Command
{

    protected $signature = 'run:process-whatsapp-queue';


    protected $description = 'Command description';


    public function handle()
    {
        Log::info('WhatsApp Queue Cron Started');

        $messages = DB::table('message_queue')
            ->where('status', 'pending')
            ->limit(20)
            ->get();

        if ($messages->isEmpty()) {
            Log::info('No pending WhatsApp messages found');
            return;
        }

        foreach ($messages as $msg) {
            try {

                Log::info('Sending WhatsApp Message', [
                    'queue_id' => $msg->id,
                    'device_id' => $msg->device_id,
                    'mobile' => $msg->mobile
                ]);

                $response = Http::withHeaders([
                    'x-api-key' => env('NODE_API_KEY'),
                    'Content-Type' => 'application/json'
                ])->timeout(30)
                    ->post(env('WHATSAPP_API_URL') . '/api/whatsapp/send', [
                        'user_id' => $msg->device_id,
                        'number'  => $msg->mobile,
                        'message' => $msg->message
                    ]);

                $responseBody = $response->json();

                if ($response->successful() && isset($responseBody['success']) && $responseBody['success'] === true) {

                    DB::table('message_queue')->where('id', $msg->id)->update([
                        'status'   => 'sent',
                        'sent_at'  => now(),
                        'error_message' => null
                    ]);

                    Log::info('WhatsApp Message Sent Successfully', [
                        'queue_id' => $msg->id,
                        'mobile'   => $msg->mobile,
                        'response' => $responseBody
                    ]);
                } else {

                    DB::table('message_queue')->where('id', $msg->id)->update([
                        'status' => 'failed',
                        'error_message' => json_encode($responseBody)
                    ]);

                    Log::error('WhatsApp Message Failed (API Error)', [
                        'queue_id' => $msg->id,
                        'mobile'   => $msg->mobile,
                        'response' => $responseBody
                    ]);
                }

                sleep(3);
            } catch (\Exception $e) {

                DB::table('message_queue')->where('id', $msg->id)->update([
                    'status' => 'failed',
                    'error_message' => $e->getMessage()
                ]);

                Log::critical('WhatsApp Message Failed (Exception)', [
                    'queue_id' => $msg->id,
                    'mobile'   => $msg->mobile,
                    'error'    => $e->getMessage(),
                    'trace'    => $e->getTraceAsString()
                ]);
            }
        }

        Log::info('WhatsApp Queue Cron Finished');
    }
}
