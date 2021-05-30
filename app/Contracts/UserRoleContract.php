<?php

namespace App\Contracts;

interface UserRoleContract {
		
	public function getUserRoles(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
	public function getRoleById(int $id);
	public function addRole(array $params);
	public function updateRole(array $params);
	public function deleteRole(int $id);
	
}
