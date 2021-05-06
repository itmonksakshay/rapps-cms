<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends BaseController{
	
	
	public function __construct(){
        $this->middleware('guest')->except('destroy');
    }
    
    public function index(){
		
				$this->setPageHead('User Login', 'User Login','User Login');
				return view('login');
				
	}
}
