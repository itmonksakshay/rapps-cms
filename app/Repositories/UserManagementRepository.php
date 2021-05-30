<?php 

namespace App\Repositories;

use App\Contracts\UserManagementContract;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use App\Models\User;
class UserManagementRepository extends BaseRepository implements UserManagementContract  {
	
	public function __construct(User $model){
		parent::__construct($model);
	}
	public function getUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
		return $this->all($columns, $order, $sort);
	}
	public function getUserById(int $id){
		return $this->findOneOrFail($id);
		
	
	}
	public function addUser(array $params){
			
		try{
			$user = new User($params);
			$user->save();
			return $user;
		}catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
	
	}
	public function updateUser(array $params){
		
		$user = $this->getUserById($params['id']); 
        $update = $this->update($params,$params['id']);
        return $update;
	
	}
	public function deleteUser(int $id){
	
	}
	
	

}
