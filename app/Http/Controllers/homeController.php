<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Libs\PhpImap\Mailbox as ImapMailbox;
use App\Libs\PhpImap\IncomingMail;
use App\Libs\PhpImap\IncomingMailAttachment;

class homeController extends Controller
{
    //
    public function index(){
    	// return view('pages.home')->withTitle('Dashboard');

    	$mailbox = new ImapMailbox('{imap.gmail.com:993/imap/ssl}INBOX', config('imap.username'), config('imap.password'), app_path('Mails/Attachments/'));

		// Read all messaged into an array:
		$mailsIds = $mailbox->searchMailbox('ALL');
		if(!$mailsIds) {
		    die('Mailbox is empty');
		}

		// Get the first message and save its attachment(s) to disk:
		$mail = $mailbox->getMail($mailsIds[sizeof($mailsIds)-1]);

		echo "<pre>";
		echo print_r($mail);
		echo "\n\n\n\n\n";
		// print_r($mail->getAttachments());

		foreach ($mail->getAttachments() as $attach) {
			# code...
			$ext = pathinfo($attach->filePath, PATHINFO_EXTENSION);
			if($ext == "html"){
				$myfile = fopen($attach->filePath, "r") or die("Unable to open file!");
				$text = fread($myfile,filesize($attach->filePath));

				$clean = strip_tags($text);

				$val = explode(PHP_EOL, $clean);
				
				for($i=0;$i<sizeof($val);$i++){
					$val[$i] = trim($val[$i]);
				}

				echo print_r(array_values(array_filter($val, function($value) { return $value !== ''; })));
			}
			echo "\n";
		}
    }
}
