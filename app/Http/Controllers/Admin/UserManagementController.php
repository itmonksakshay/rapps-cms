<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class UserManagementController extends BaseController{
    
    public function index(){
		$this->setPageHead('User Management', 'Admin User Management','User Management Page');
		return view('admin.user.index');
	}
	public function create(){
		
		$this->setPageHead('Create User', 'Admin User Management','User Management Page');
		return view('admin.user.create');
		
	}
}

