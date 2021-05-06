<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{

	protected $userRoles=[['name'=>'admin','description'=>'super admin role'],['name'=>'editor','description'=>'post author role']];
    public function run(){
		foreach($this->userRoles as $key=>$userRole){
			$role_check = UserRole::where($userRole)->first();
			if(!$role_check){	
				UserRole::create($userRole);
			}   
		}
	}
}
