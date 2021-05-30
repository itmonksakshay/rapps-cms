<?php 

namespace App\Contracts;

interface UserManagementContract {
	
	public function getUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
	public function getUserById(int $id);
	public function addUser(array $params);
	public function updateUser(array $params);
	public function deleteUser(int $id);
	
}
