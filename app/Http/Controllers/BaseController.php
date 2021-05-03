<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;

class BaseController extends Controller{
	
	use FlashMessages;
	protected function setPageHead($title,$metaTitle,$metaDescription){
		
		view()->share(['pageTitle' => $title, 'metaTitle' => $metaTitle,'metaDescription'=> $metaDescription]);
		
	}
    protected function showErrorpage($errCode='404',$msg=null){
		
		$data['message'] = $message;
		return response()->view('errors.'.$errorCode, $data, $errorCode);
		
	}
	
	protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false){
	    $this->setFlashMessage($message, $type);
	    $this->showFlashMessages();
	
	    if ($error && $withOldInputWhenError) {
	        return redirect()->back()->withInput();
	    }
	
	    return redirect()->route($route);
	}
	
	protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false){
    
	    $this->setFlashMessage($message, $type);
	    $this->showFlashMessages();
	
	    return redirect()->back();
	}
}
