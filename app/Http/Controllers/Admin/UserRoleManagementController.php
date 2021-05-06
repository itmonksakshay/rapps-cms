<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class UserRoleManagementController extends BaseController{

    public function index(){
		$this->setPageHead('Role Management', 'Admin Role Management','User Role Management Page');
		return view('admin.role.index');
       
    }
    
    public function create(){
        
        $this->setPageHead('Create Role', 'Admin Role Management','User Role Management Page');
		return view('admin.role.create');
    }


    public function store(Request $request){
        
    }
    
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
