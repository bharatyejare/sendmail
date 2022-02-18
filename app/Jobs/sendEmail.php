<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class sendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $mail_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data=$mail_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users=User::get();
       // echo "<pre>";print_r($users);die();
        $input['subject']=$this->mail_data['subject'];
        //foreach ($users as $key => $value) {
        $input['email']=$value->email;
        $input['name']=$value->name;
        \Mail::send('mails.mail',[],function($message) use($input){
            $message->to('byejare@gmail.com',$input['name'])
            ->subject($input['subject']);
        });
        //}
        if (Mail::failures()) {
            echo "failed";
            // return response showing failed emails
        }
        
    }
}
