<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\UserRole;
use App\Http\Requests\StoreFormRequest;

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
			$actionName = class_basename($request->route()->getActionname());
			foreach ($permissions as $permission){
				$_namespaces_chunks = explode('\\', $permission->controller);
				$controller = end($_namespaces_chunks);
				if ($actionName == $controller . '@' . $permission->method){
					return $next($request);
				}			
			}		
		}
		return $this->responseRedirect('user.login','Not An Authorized User', 'error');
	}
}
