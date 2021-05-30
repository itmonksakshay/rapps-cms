<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RappUserRole extends Model{
    use HasFactory;
    
    protected $table = 'rapp_user_roles';
    
    protected $fillable = ['name','description'];
    
    public function users(){
		return $this->hasMany(RappUser::Class,'role_id');
	}
}
