<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Contracts\UserRoleContract;
use App\Contracts\UserManagementContract;
use App\Models\UserRole;
use App\Models\User;

class UserManagementController extends BaseController{
	
	protected $userRepo;
	protected $userRoleRepo;
	
	public function __construct(UserRoleContract $userRoleRepo,UserManagementContract $userManageRepo){
		
		$this->userRepo = $userManageRepo;
		$this->userRoleRepo = $userRoleRepo;
		
	}
 
    public function index(){
		$users = $this->userRepo->getUsers();
		$this->setPageHead('User Management', 'Admin User Management','User Management Page');
		return view('admin.user.index',compact('users'));
	}
	public function create(){
		$userRoles = $this->userRoleRepo->getUserRoles('id','asc',['id','name']);
		$this->setPageHead('Create User', 'Admin User Management','User Management Page');
		return view('admin.user.create',compact('userRoles'));
		
	}
	public function show(int $id ){
		
	}
	public function store(Request $request){
		
		$validator = $request->validate([
			'name' => 'required|string|alpha|max:255',
			'email' => 'required|string|email|max:255|unique:users',
		    'password' => 'required|string|min:8',
			'password_confirmation' => 'required|string|min:8|same:password'
		]);
		
		$params = $request->except(['_token','password_confirmation']);
		$userAdd = array('name'=>$params['name'],'email'=>$params['email'],'password'=>$params['password'],'role_id'=>$params['role']);
		$user = $this->userRepo->addUser($userAdd);
		if (!$user) {
			return $this->responseRedirectBack('Error occurred while creating User', 'error', true, true);
		}
		return $this->responseRedirect('user-management.index', 'User added successfully' ,'success',false, false); 
	
	}
	public function edit(int $id){
		$user = $this->userRepo->getUserById($id);
		$userRoles = $this->userRoleRepo->getUserRoles('id','asc',['id','name']);
		$this->setPageHead('edit User', 'Admin User Management','User Management Page');
		return view('admin.user.edit',compact('user','userRoles'));
	
	}
	 public function update(Request $request,int $id){
		 
		$validator = $request->validate([
			'name' => 'required|string|alpha|max:255',
			'email' => "required|string|email|max:255|unique:users,email,{$id}",
			'password' => 'nullable|string:min:6',
			'password_confirmation' => 'nullable|string|min:8|same:password'
		]);
		
		$params = $request->except(['_token','password_confirmation']);
		if ($request->filled('password')) {
			$userUpdate = array('id'=>$id,'name'=>$params['name'],'email'=>$params['email'],'password'=>$params['password'],'role_id'=>$params['role']);
			$udpate = $this->userRepo->updateUser($userUpdate);
		}
		else{
			$userUpdate = array('id'=>$id,'name'=>$params['name'],'email'=>$params['email'],'role_id'=>$params['role']);
			$update = $this->userRepo->updateUser($userUpdate);
		}
		if (!$update) {
			return $this->responseRedirectBack('Error occurred while Updating User', 'error', true, true);
		}
		return $this->responseRedirect('user-management.index', 'User updated successfully' ,'success',false, false); 
		
	 }
	 public function destroy(){
		 
		}
}

