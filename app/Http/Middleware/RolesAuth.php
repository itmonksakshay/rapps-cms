<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\UserRole;

class RolesAuth extends BaseController{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
		
		if(Auth::check()){
			$role = UserRole::findOrFail(Auth::User()->role_id);
			$permissions = $role->permissions;
			dd($permissions);
			return $next($request);
		}
		return $this->responseRedirectBack('Not An Authorized User', 'error');
	}
}
