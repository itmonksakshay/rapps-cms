<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\RappUserContract;
use App\Models\RappUser;
use JWTAuth;

class UserLoginController extends BaseController{
		
		protected $rappUser;
		public function __construct(RappUserContract $user){
			$this->rappUser = $user;
		
		}
				
		public function userExsists(string $address){
			
			$rappUser = $this->rappUser->getRappUserByAddress($address);
			if($rappUser){
				$user = ['address'=>$rappUser->address,'name'=>$rappUser->name];
				return $this->responseJson(false,200,"User foundSuccess",$user);
			}else{
				
				return $this->responseJson(true,200,"User Not Found");
			}
		}
		public function authenticate(Request $request){
				$message = $request->get('message');
				$signature = $request->get('signature');
				$address = $request->get('address');	
				$token = JWTAuth::attempt(['message'=>$message,'signature'=>$signature,'address'=>$address]);
				if($token){
					$rappUser = JWTAuth::user();
					$user = ['address'=>$rappUser->address,'name'=>$rappUser->name,'type'=>$rappUser->role->name,'token'=>$token];
					return $this->responseJson(false,200,"User Login Success",$user);
				}else{
					return $this->responseJson(true,200,"User Login Fail");
				}
				
		}
		public function logout(){
			 JWTAuth::invalidate(JWTAuth::getToken());
			 return $this->responseJson(false,200,"User logout Success");
				
		}
}
