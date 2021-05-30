<?php

namespace App\Repositories;
use App\Contracts\UserRoleContract;
use App\Models\UserRole;
use App\Models\User;
class UserRoleRepository extends BaseRepository implements UserRoleContract{
	
	public function __construct(UserRole $model){
			parent::__construct($model);
	}
		
	public function getUserRoles(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
		return $this->all($columns, $order, $sort);
	}
	public function getRoleById(int $id){
		
		return $this->findOneOrFail($id);
	
	}
	public function addRole(array $params){
		
		$collection = collect($params);
        $role = new UserRole($params);
        $role->save();

        if ($collection->has('permissions')) {
			$role->permissions()->sync($params['permissions']);
        }
        return $role;

	}
	public function updateRole(array $params){
		
		$role = $this->getRoleById($params['id']); 
        $role->update($params);
        $collection = collect($params);
        if($collection->has('permissions')){
			$role->permissions()->sync($params['permissions']);
		}
		return $role;
	}
	public function deleteRole(int $id){
		$defaultRole = $this->findOneBy(array('name'=>'subscriber'));
		User::where('role_id', $id)->update(['role_id' => $defaultRole->id]);
		$role = $this->getRoleById($id);
		$role->delete();
		return $role;
		
	}


}
