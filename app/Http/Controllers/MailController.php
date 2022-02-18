<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        $mail_data=[
            'subject'=>'New Mesage Subject'
        ];
        $job=(new \App\Jobs\SendEmail($mail_data))->delay(now()->addSeconds(2));
        dispatch($job);
        dd('job dispatched');
    }
}
