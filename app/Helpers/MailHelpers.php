<?php

namespace App\Helpers;

use App\Libs\PhpImap\Mailbox as ImapMailbox;
use App\Libs\PhpImap\IncomingMail;
use App\Libs\PhpImap\IncomingMailAttachment;

use App\Models\Mails\Mails;

class MailHelpers{

	private $mailbox;
	private $mailsIds;

	public function __construct(){
		$this->mailbox = new ImapMailbox('{imap.gmail.com:993/imap/ssl}INBOX', config('imap.username'), config('imap.password'), app_path('Mails/Attachments/'));
	}

	public function readAllMails(){
		// Read all messaged into an array:
		$this->mailsIds = $this->mailbox->searchMailbox('ALL');
		if(!$this->mailsIds) {
		    die('Mailbox is empty');
		}
	}

	public function getMessages(){
		$result = [];
		for($i=0;$i<sizeof($this->mailsIds);$i++){
			$mail = $this->mailbox->getMail($this->mailsIds[$i]);
			foreach ($mail->getAttachments() as $attach) {
				# code...
				$ext = pathinfo($attach->filePath, PATHINFO_EXTENSION);
				if($ext == "html"){
					$myfile = fopen($attach->filePath, "r") or die("Unable to open file!");
					$text = fread($myfile,filesize($attach->filePath));

					$clean = strip_tags($text);

					$val = explode(PHP_EOL, $clean);
					
					for($j=0;$j<sizeof($val);$j++){
						$val[$j] = trim($val[$j]);
					}

					$mailContent =  array_values(array_filter($val, function($value) { return $value !== ''; }));
				}
			}
			array_push($result, 
				[
					"mail_index" => $mail->id, 
					"date" => $mail->date,
					"from" => $mail->headers->fromaddress,
					"subject" => $mail->subject,
					"content" => json_encode($mailContent),
				]
			);
		}
		return $result;
	}

	public function getMessagesUnRead(){
		$result = [];
		$switch = true;
		$index = sizeof($this->mailsIds)-1;

		$lastIndex = Mails::orderBy('mail_index', 'desc')->first();
		while($switch){

			$mail = $this->mailbox->getMail($this->mailsIds[$index]);
			$id = $mail->id;

			if($id > $lastIndex->mail_index){

				foreach ($mail->getAttachments() as $attach) {
				# code...
					$ext = pathinfo($attach->filePath, PATHINFO_EXTENSION);
					if($ext == "html"){
						$myfile = fopen($attach->filePath, "r") or die("Unable to open file!");
						$text = fread($myfile,filesize($attach->filePath));

						$clean = strip_tags($text);

						$val = explode(PHP_EOL, $clean);
						
						for($j=0;$j<sizeof($val);$j++){
							$val[$j] = trim($val[$j]);
						}

						$mailContent =  array_values(array_filter($val, function($value) { return $value !== ''; }));
					}
				}
				array_push($result, 
					[
						"mail_index" => $mail->id, 
						"date" => $mail->date,
						"from" => $mail->headers->fromaddress,
						"subject" => $mail->subject,
						"content" => json_encode($mailContent),
					]
				);
			}else{
				$switch = false;
			}
			$index--;
		}

		return array_reverse($result);
	}
}