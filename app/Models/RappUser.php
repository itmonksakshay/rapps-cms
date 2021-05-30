<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class RappUser extends Model implements JWTSubject, Authenticatable{
    
    use HasFactory;
    
	protected $table = 'rapp_users';
	
	protected $fillable = ['name','email','adddress','role_id'];
	
	public function role(){
		return $this->belongsTo(RappUserRole::class);
	}
	
	
	public function setNameAttribute($value){
        $this->attributes['address'] = strtolower($value);
    }
    
    public function getJWTIdentifier () {
        return $this->getKey();
    }

    public function getJWTCustomClaims () {
        return [];
    }
    
    	//Authenticatable implementation
	
	public function getAuthIdentifierName () {
        // TODO: Implement getAuthIdentifierName() method.
    }

    public function getAuthIdentifier () {
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword () {
        return $this->attributes['address'];
    }

    public function getRememberToken () {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken ($value) {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName () {
        // TODO: Implement getRememberTokenName() method.
    }
	
}
