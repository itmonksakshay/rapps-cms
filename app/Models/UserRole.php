<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','description'];
    
    public function permissions(){
        return $this->belongsToMany(UserPermission::Class, 'roles_permissions');
    }
}
