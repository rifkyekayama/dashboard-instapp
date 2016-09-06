<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserControl\User;
use Auth;

class LoginController extends Controller
{
    //

    public function showLoginForm(){
    	return view('pages.auth.login');
    }

    public function Login(Request $request){
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => bcrypt($request->input('password'))])) {
            // Authentication passed...
            return redirect()->intended('index');
        }
    }
}
