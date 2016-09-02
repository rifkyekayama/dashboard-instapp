<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Zalazdi\LaravelImap\Client;

use App\Http\Requests;

class homeController extends Controller
{
    //
    public function index(){
    	// return view('pages.home')->withTitle('Dashboard');

    	$mails = new Client();
    	// $mails->coonnect();
    	dd($mails->connect()->getMailboxes());
    }
}
