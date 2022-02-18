<?php
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $arrayEmails = ['byejare@gmail.com','bharatyejare93@gmail.com'];
$emailSubject = 'My Subject';
$emailBody = 'Hello, this is my message content.';

Mail::send('mails.mail',
	['msg' => $emailBody],
	function($message) use ($arrayEmails, $emailSubject) {
		$message->to($arrayEmails)
        ->subject($emailSubject);
	}
);
    Mail::to('byejare@gmail.com')->send(new TestMail());
    //Mail::mailer('mailgun')->to('byejare@gmail.com')->send(new TestMail());
    return 'done';
});
