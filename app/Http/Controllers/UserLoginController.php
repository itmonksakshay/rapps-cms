<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends BaseController{
	
	
	public function __construct(){
        $this->middleware('guest')->except('destroy');
    }
    
    public function index(){
		
				$this->setPageHead('User Login', 'User Login','User Login');
				return view('login');
				
	}
	public function authenticate(Request $request){
		
		    $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
			return $this->responseRedirect('dashboard.index','Login Successfully','success');
		}
		return $this->responseRedirectBack('Enter correct credentials','error' );
	
	}
	public function logout(){
		
		Auth::logout();		
	}
}
