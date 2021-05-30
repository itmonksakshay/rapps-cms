<?php

namespace App\Providers;


use Exception;

use App\Models\RappUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use App\Modules\ElipticCurve\EthereumElipticCurve;

class RappUserAuthProvider implements UserProvider{
	
	
	
	public function retrieveByToken ($identifier, $token) {
        throw new Exception('Method not implemented.');
    }

    public function updateRememberToken (Authenticatable $user, $token) {
        throw new Exception('Method not implemented.');
    }

    public function retrieveById ($identifier) {
        return RappUser::find($identifier);
    }

    public function retrieveByCredentials (array $credentials) {
        $address = $credentials['address'];
        return RappUser::where('address', $address)->first();
    }

    public function validateCredentials (Authenticatable $user, array $credentials) {
		$signature = $credentials['signature'];
		$message = $credentials['message'];
		$address = $credentials['address'];
		$ec = new EthereumElipticCurve();
        return $ec->decodeSignature($message,$signature,$address);
    }

}
