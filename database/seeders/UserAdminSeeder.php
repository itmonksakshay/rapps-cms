<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
use App\Models\User;

class UserAdminSeeder extends Seeder{
	
	protected $admin =['name' => 'Admin','email' => 'admin@rapps.com','password' => '123'];
  
    public function run(){
		$admin_role = UserRole::where('name','admin')->first();
			$user = new User();
			$user->name =  $this->admin['name'];
			$user->email = $this->admin['email'];
			$user->password = $this->admin['password'];
			$user->role_id = $admin_role->id;
			if($user->save()){
				$this->command->info('Admin Created Successfully');
				return true;
			} else {	
				$this->command->info("Admin User Update Failed");
				return;		
			}
    }
}
