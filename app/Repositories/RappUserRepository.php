<?php

namespace App\Repositories;

use App\Contracts\RappUserContract;
use App\Models\RappUser;

class RappUserRepository extends BaseRepository implements RappUserContract{
	
	public function __construct(RappUser $model){
		
		parent::__construct($model);
	
	}
	//RappUserContract
		
	public function getRappUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
			return $this->all($columns, $order, $sort);
	}
	public function getRappUserByAddress(string $address){
		return $this->findOneBy(['address'=>$address]);
	}
	public function getRappUserByName(string $name){
		return $this->findOneByOrFail(['name'=>$name]);
	}
	public function getRappUserById(int $id){
			return $this->findOneOrFail($id);
	}
	public function addRappUser(array $params){
		return true;
	}
	public function updateRappUser(array $params){
		return true;
	}
	public function deleteRappUser(int $id){
		return true;
	}
	
}
