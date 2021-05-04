<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Http\Requests\MediaFormRequest;
use App\Contracts\MediaContract;
use Illuminate\Http\Request;



class AdminMediaController extends BaseController{
	
	protected $mediaRepository;
	public function __construct(MediaContract $mediaRepository ){
		$this->mediaRepository= $mediaRepository;
	}
	

    public function index(){
				
		$media = $this->mediaRepository->getMedia();
        $this->setPageHead('Upload Media', 'List of all uploaded media','Media Page');
		return view('admin.media',compact('media'));
        
    }

    public function store(MediaFormRequest $request){
		
			
			$params = $request->except('_token');
			$media = $this->mediaRepository->addMedia($params);
			if (!$media) {
				return $this->responseRedirectBack('Media Upload Issue', 'error', true, true);
			}
			return $this->responseRedirect('media.index', 'Media Added' ,'success',false, false); 
    }

    public function show($id)
    {
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
