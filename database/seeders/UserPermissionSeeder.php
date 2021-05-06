<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\UserPermission;
use App\Models\UserRole;
use Illuminate\Support\Facades\Route;
class UserPermissionSeeder extends Seeder{
    public function run(){
		
		$routes =  collect(Route::getRoutes()->getRoutes())->filter(function ($value, $key) {
			if(Str::startsWith($value->uri(), 'admin')){
				return $value;
			}
		});
		$permission_ids =[];
		foreach($routes as $key => $route){
			$action = explode('@',$route->getActionname());
			$permission_check = UserPermission::where(['slug'=>$route->getName()])->first();
			if(!$permission_check){	
				$permission = new UserPermission();
				$permission->name = $route->getName();
				$permission->slug = $route->getName();
				$permission->controller = $action[0];
				$permission->method = end($action);
				$permission->save();
				$permission_ids[] = $permission->id;
			} 
		}
		$admin_role = UserRole::where('name','admin')->first();
		$admin_role->permissions()->attach($permission_ids);	
    }
}
