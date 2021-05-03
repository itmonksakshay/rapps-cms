<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AdminDashboardController extends BaseController {
    public function index(){
		return view('admin.index');	
	}
}
