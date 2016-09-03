<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Mails\Mails;

use App\Helpers\MailHelpers;

class homeController extends Controller
{
    //
    public function index(){
    	$mail = Mails::orderBy('mail_index', 'desc')->get();
    	$head = json_decode($mail[0]->content);
    	$header = [];
    	for($i=1;$i<sizeof($head);$i+=2){
    		array_push($header, $head[$i]);
    	}
    	return view('pages.home', ['mails' => $mail, 'header' => $header])->withTitle('Dashboard');
    }

    public function allMessage(){
    	$mail = new MailHelpers();
    	$mail->readAllMails();
    	$message = $mail->getMessages();
    	// $message = $mail->getMessagesUnRead();

    	foreach($message as $val){
    		$mails = new Mails;
    		$mails->mail_index = $val['mail_index'];
    		$mails->date = $val['date'];
    		$mails->from = $val['from'];
    		$mails->subject = $val['subject'];
    		$mails->content = $val['content'];
    		$mails->save();
    	}
    }

    public function messageUnRead(){
    	$mail = new MailHelpers();
    	$mail->readAllMails();
    	// $message = $mail->getMessages();
    	$message = $mail->getMessagesUnRead();

    	foreach($message as $val){
    		$mails = new Mails;
    		$mails->mail_index = $val['mail_index'];
    		$mails->date = $val['date'];
    		$mails->from = $val['from'];
    		$mails->subject = $val['subject'];
    		$mails->content = $val['content'];
    		$mails->save();
    	}
    }
}
