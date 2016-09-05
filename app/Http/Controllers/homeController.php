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
					$mails->date = $val['date'];
					$mails->from = $val['from'];
					$mails->subject = $val['subject'];
					$mails->content = $val['content'];
					$mails->isread = 'false';
					$mails->save();
				}
			}
		}

		$mail = Mails::orderBy('mail_index', 'desc')->get();
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
		$order = $mail->getOrder();

		foreach($order as $val){
			$customer = Customer::where('customer_id', $val['customer_id'])->first();
			if($customer == null){
				$cust = new Customer;
				$cust->customer_id   	= $val['customer_id'];
				$cust->login         	= $val['login'];
				$cust->name          	= $val['name'];
				$cust->address			= $val['address'];
				$cust->zip				= $val['zip'];
				$cust->city				= $val['city'];
				$cust->country			= $val['country'];
				$cust->phone			= $val['phone'];
				$cust->email			= $val['email'];
				$cust->birthdate		= date("Y-m-d", strtotime($val['birthdate']));
				$cust->gender			= $val['gender'];
				$cust->contact_email	= $val['contact_email'];
				$cust->link_to_customer	= '<a target="_blank" href="http://apps.instapp.id/enduser/'.$val['customer_id'].'/show">'.$val['link_to_customer'].'</a>';
				$cust->save();
			}

			$transaction = Transaction::where('id_transaction', $val['id'])->first();
			if($transaction == null){
				$trans = new Transaction;
				$trans->id_transaction		= $val['id'];
				$trans->id_customer 		= $val['customer_id'];
				$trans->delivery_type 		= $val['delivery_type'];
				$trans->delivery_price 		= AppHelpers::priceConverter($val['delivery_price']);
				$trans->amount_to_charge 	= AppHelpers::priceConverter($val['amount_to_charge']);
				$trans->payment_solution 	= $val['payment_solution'];
				$trans->special_request 	= $val['special_request'];
				$trans->save();

				$items = json_decode($val['details']);
				foreach($items as $item){
					$transDetail = new TransactionDetail;
					$transDetail->id_transaction	= $val['id'];
					$transDetail->product 			= $item[0];
					$transDetail->price 			= AppHelpers::priceConverter($item[1]);
					$transDetail->quantity 			= str_replace("x ", "", $item[2]);
					$transDetail->save();
				}
			}
		}
		dd($order);
	}
}
