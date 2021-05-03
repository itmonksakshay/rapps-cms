<?php

namespace App\Traits;

trait FlashMessages {
	
	protected $errorMsg =[];
	protected $successMsg=[];
	
	protected function setFlashMessage($msg,$type){
		$model='successMsg';
		switch($type){
			
			case 'error': {
				$model='errorMsg';
				break;
			}
			case 'success' :{
				$model='successMsg';
				break;
			}
		}
		if(is_array($msg)){
				foreach($msg as $value){
						array_push($this->$model,$value);
				}
		}else{
				array_push($this->$model,$value);
		}
		
	}
	protected function getFlashMessage(){
			return [
				'error'=> $this->errorMsg,
				'success'=> $this->successMsg
			];
	}
	protected function showFlashMessages(){
	
		session()->flash('error', $this->errorMsg);
	    session()->flash('success', $this->successMsg);	
	
	}
	
}
