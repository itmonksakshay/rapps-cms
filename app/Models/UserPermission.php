<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserPermission extends Model{
	
	use HasFactory;
    
    protected $table = 'user_permissions';
     
    protected $fillable = ['name','controller','method'];
     
    public function setSlugAttribute($value){
			$this->attributes['slug'] = Str::slug($value, '-');
	}
	public function roles(){
        return $this->belongsToMany(UserRole::class, 'roles_permissions');
    }

}
