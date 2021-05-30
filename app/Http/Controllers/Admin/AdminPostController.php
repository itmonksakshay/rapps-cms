<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UserManagementContract;
use App\Http\Controllers\BaseController

class AdminPostController extends BaseController{
    
    public function index(){
		
			return view('admin.post.index',compact('posts'))
	}
}
