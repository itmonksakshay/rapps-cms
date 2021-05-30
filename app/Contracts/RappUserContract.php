<?php
namespace App\Contracts;


interface RappUserContract {
	
	public function getRappUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
	public function getRappUserByAddress(string $address);
	public function getRappUserByName(string $name);
	public function getRappUserById(int $id);
	public function addRappUser(array $params);
	public function updateRappUser(array $params);
	public function deleteRappUser(int $id);
	
}
