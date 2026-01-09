<?php

namespace App\Http\Controllers\Api\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Helper\helper;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function emailapi(Request $request)
    {
        try {
            $data = $request->body;
            $from = $request->from;
            $mail_title = $request->title;
            $subject = $request->subject;
            $attachemnt = $request->attachemnt;
            $to = $request->to;
            $cc = $request->cc;
            $bcc = $request->bcc;
            $Atomic = $request->has('imageFlag') ? 1 : 0;
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                $errors = 'Fill valid To email, please try again.';
                return response()->json([
                    'Status' => false,
                    'Message' => $errors,
                ]);
            }
            if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
                $errors = 'Fill valid From email, please try again.';
                return response()->json([
                    'Status' => false,
                    'Message' => $errors,
                ]);
            }
            if ($from != '' && $data != '' && $mail_title != '' && $subject != '' && $to != '') {
                Mail::send('Email.Email', array('data' => $data, 'title' => $mail_title, "Atomic" => $Atomic), function ($message) use ($to, $mail_title, $attachemnt, $from, $subject, $cc, $bcc) {
                    $message->to($to, "");
                    if ($cc != '') {
                        $message->cc($cc);
                    }
                    if ($bcc != '') {
                        $message->bcc($bcc);
                    }
                    $message->subject($subject);
                    if ($attachemnt != '') {
                        if (is_array($attachemnt)) {
                            foreach ($attachemnt as $file) {
                                $message->attach($file);
                            }
                        } else {
                            $message->attach($attachemnt);
                        }
                    }
                    $message->from($from, $mail_title);
                });
                return response()->json([
                    'Status' => true,
                    'Message' => 'Email Sent Successfully..',
                ]);
            } else {
                return response()->json([
                    'Status' => false,
                    'Message' => 'OOPS! Please Fill Required Field..',
                ]);
            }
        } catch (Exception $e) {
            $errors = $e->getMessage();
            return response()->json([
                'Status' => false,
                'Message' => $errors,
            ]);
        }
    }
}
