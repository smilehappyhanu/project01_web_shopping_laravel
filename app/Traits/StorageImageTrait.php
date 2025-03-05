<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Storage;

trait StorageImageTrait {
    // upload one file 
    public function storageImageUpload($request,$fieldName,$folderName) {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName; // get file
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20). '.'. $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash); // save file on which directory with which name
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];
            return $dataUpload;
        } else {
            return null;
        }
    }
    // upload multiple file
    public function storageImageUploadMultiple($file,$folderName) {
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20). '.'. $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash); // save file on which directory with which name
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];
            return $dataUpload;
    }
}


?>