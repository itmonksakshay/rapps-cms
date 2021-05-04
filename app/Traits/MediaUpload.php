<?php

namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait MediaUpload {
	

	public function uploadOne(UploadedFile $file, $folder = null,$filename = null, $disk = 'public' ){
        $name = !is_null($filename) ? $filename : Str::random(25). "." . $file->getClientOriginalExtension();
        $storagePath = 'uploads/'.$folder;

        return $file->storeAs(
            $storagePath,
            $name,
            $disk
        );
    }

    public function deleteOne($path = null, $disk = 'public'){
        Storage::disk($disk)->delete($path);
    }
	
	
	
}
