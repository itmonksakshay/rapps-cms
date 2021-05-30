<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Contracts\UserRoleContract;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\UserPermission;


class UserRoleManagementController extends BaseController{

    protected $userRoleRepo;
    public function __construct(UserRoleContract $userRoleRepo){
			$this->userRoleRepo = $userRoleRepo;
	}
    
    public function index(){
		$userRoles = $this->userRoleRepo->getUserRoles();
		$this->setPageHead('Role Management', 'Admin Role Management','User Role Management Page');
		return view('admin.role.index',compact('userRoles'));
       
    }
    
    public function create(){
		$permissions = UserPermission::orderBy('id', 'asc')->get('*');
        $this->setPageHead('Create Role', 'Admin Role Management','User Role Management Page');
		return view('admin.role.create',compact('permissions'));
    }


    public function store(Request $request){
		$request->validate([
			'name' => "required|alpha|unique:user_roles,name",
			'description' => "required"
		]);
		
		$params = $request->except('_token');
		$role = $this->userRoleRepo->addRole($params);
		if (!$role) {
			return $this->responseRedirectBack('Error occurred while creating Role', 'error', true, true);
		}
		return $this->responseRedirect('role-management.index', 'Role added successfully' ,'success',false, false); 
    }
    
    public function show(int $id){
		
		$userRole = $this->userRoleRepo->getRoleById($id);
		$roleUsers = $userRole->users()->get();
		$rolePermissions = $userRole->permissions()->get();
		$this->setPageHead('User Role', 'Admin Role Management','User Role Management Page');
		return view('admin.role.show',compact('userRole','rolePermissions','roleUsers'));
       
    }

    public function edit( int $id){
		$permissions = UserPermission::orderBy('id', 'asc')->get('*');
		$userRole = $this->userRoleRepo->getRoleById($id);
		$userPermissions = $userRole->permissions()->get();
		
        $this->setPageHead('User Role', 'Admin Role Management','User Role Management Page');
		return view('admin.role.edit',compact('permissions','userRole','userPermissions'));
	}


    public function update(Request $request,int $id){
		
		$request->validate([
			'name' => "required|alpha|unique:user_roles,name,{$id}",
			'description' => "required"
		]);
		$params = $request->except('_token');
		$role = $this->userRoleRepo->updateRole($params);
		if (!$role) {
			return $this->responseRedirectBack('Error occurred while updating role.', 'error', true, true);
		}
		return $this->responseRedirect('role-management.index', 'Role updated successfully' ,'success',false, false);	
    }
    
    public function delete(int $id){
		
		$role = $this->userRoleRepo->getRoleById($id);
		return view('admin.role.delete',compact('role'));	
	}

    public function destroy(int $id){
		
		$role = $this->userRoleRepo->deleteRole($id);
		if (!$role) {
			return $this->responseRedirectBack('Error occurred while deleted role.', 'error');
		}
		return $this->responseRedirect('role-management.index', 'Role deleted successfully' ,'success',false, false);
    }
}
