<?php
namespace App\Repositories;
use App\Contracts\MediaContract;
use App\Models\Media;
use App\Traits\MediaUpload;

class MediaRepository extends BaseRepository implements MediaContract {

		use MediaUpload;
		
		public function __construct(Media $model){
				parent::__construct($model);
		}
		
		public function getMedia(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
		
			return $this->all($columns, $order, $sort);
		
		}
		public function getMediaById(int $id){
				return  true;
		}
		
		public function addMedia(array $params){
				$mediaName = $params['media']->getClientOriginalName();
				$mediaType = $params['media']->getClientMimeType();
				$mediaExt = $params['media']->getClientOriginalExtension();
				$mediaPath = $this->uploadOne($params['media'], 'images',$mediaName);
				$mediaData =['name'=>$mediaName,'media_path'=>$mediaPath,'media_tpye'=>$mediaType,'media_ext'=>$mediaExt];
				return $this->create($mediaData);;
		}
		public function deleteMedia(int $id){
			
				return true;
		}
	
}
