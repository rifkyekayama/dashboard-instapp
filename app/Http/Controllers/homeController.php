<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class homeController extends Controller
{
    //
    public function index(){
    	return view('pages.home')->withTitle('Dashboard');
    }
}
