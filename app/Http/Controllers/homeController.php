<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Mails\Mails;
use App\Models\Transaction\Customer;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;

use App\Helpers\MailHelpers;
use App\Helpers\AppHelpers;

class homeController extends Controller
{
	//
	public function index(){
		$mail = new MailHelpers();
		$mail->readAllMails();
		if(Mails::count() == 0){
			$message = $mail->getMessages();
		}else{
			$message = $mail->getMessagesUnRead();
		}

		foreach($message as $val){
			if(strpos($val['subject'], "[Vertikal Digital Indonesia]") !== false){
				if(strpos($val['subject'], "Please, Request a Project and be Our Next Client") !== false){
					$mails = new Mails;
					$mails->mail_index = $val['mail_index'];
					$mails->mailTypes = "form_editor";
					$mails->date = $val['date'];
					$mails->from = $val['from'];
					$mails->subject = $val['subject'];
					$mails->content = $val['content'];
					$mails->isread = 'false';
					$mails->save();
				}
			}
		}

		$mail = Mails::where('mailTypes', 'form_editor')->orderBy('mail_index', 'desc')->get();
		$head = json_decode($mail[0]->content);
		$header = [];
		for($i=1;$i<sizeof($head);$i+=2){
			array_push($header, $head[$i]);
		}
		return view('pages.home', ['mails' => $mail, 'header' => $header])->withTitle('Dashboard');
	}

	public function order(){
		$mail = new MailHelpers();
		$mail->readAllMails();
		if(Mails::count() == 0){
			$message = $mail->getMessages();
		}else{
			$message = $mail->getMessagesUnRead();
		}

		foreach($message as $val){
			if(strpos($val['subject'], "[Old Coffee]") !== false){
				if(strpos($val['subject'], "New order is placed") !== false){
					$id = Mails::where('mail_index', $val['mail_index'])->first();
					if($id == null){
						$mails = new Mails;
						$mails->mail_index = $val['mail_index'];
						$mails->mailTypes = "order";
						$mails->date = $val['date'];
						$mails->from = $val['from'];
						$mails->subject = $val['subject'];
						$mails->content = $val['content'];
						$mails->isread = 'false';
						$mails->save();
					}

					$content = json_decode($val['content']);

					$customer = Customer::where('customer_id', $content->customer_id)->first();
					if($customer == null){
						$cust = new Customer;
						$cust->customer_id   	= $content->customer_id;
						$cust->login         	= $content->login;
						$cust->name          	= $content->name;
						$cust->address			= $content->address;
						$cust->zip				= $content->zip;
						$cust->city				= $content->city;
						$cust->country			= $content->country;
						$cust->phone			= $content->phone;
						$cust->email			= $content->email;
						$cust->birthdate		= date("Y-m-d", strtotime($content->birthdate));
						$cust->gender			= $content->gender;
						$cust->contact_email	= $content->contact_email;
						$cust->link_to_customer	= '<a target="_blank" href="http://apps.instapp.id/enduser/'.$content->customer_id.'/show">'.$content->link_to_customer.'</a>';
						$cust->save();
					}

					$transaction = Transaction::where('id_transaction', $content->id)->first();
					if($transaction == null){
						$trans = new Transaction;
						$trans->id_transaction		= $content->id;
						$trans->id_customer 		= $content->customer_id;
						$trans->delivery_type 		= $content->delivery_type;
						$trans->delivery_price 		= AppHelpers::priceConverter($content->delivery_price);
						$trans->amount_to_charge 	= AppHelpers::priceConverter($content->amount_to_charge);
						$trans->payment_solution 	= $content->payment_solution;
						$trans->special_request 	= $content->special_request;
						$trans->save();

						$items = json_decode($content->details);
						foreach($items as $item){
							$transDetail = new TransactionDetail;
							$transDetail->id_transaction	= $content->id;
							$transDetail->product 			= $item[0];
							$transDetail->price 			= AppHelpers::priceConverter($item[1]);
							$transDetail->quantity 			= str_replace("x ", "", $item[2]);
							$transDetail->save();
						}
					}
				}
			}else if(strpos($val['subject'], "[Vertikal Digital Indonesia]") !== false){
				if(strpos($val['subject'], "Please, Request a Project and be Our Next Client") !== false){
					$id = Mails::where('mail_index', $val['mail_index'])->first();
					if($id == null){
						$mails = new Mails;
						$mails->mail_index = $val['mail_index'];
						$mails->mailTypes = "form_editor";
						$mails->date = $val['date'];
						$mails->from = $val['from'];
						$mails->subject = $val['subject'];
						$mails->content = $val['content'];
						$mails->isread = 'false';
						$mails->save();
					}
				}
			}
		}
		dd($message);
	}
}
