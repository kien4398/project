<?php

namespace App\traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function imageUpload($request,$image, $folderName)
    {
        if ($request->hasFile($image)) {
            $file = $request->file($image);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().".".$fileExtension;
            $file->move($folderName, $fileName);
            return $fileName;
        }
    }
    public function imageUpdate($request,$image, $folderName, $imageUpdate)
    {
        if ($request->hasFile($image)) {
            $file = $request->file($image);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().".".$fileExtension;
            $file->move($folderName, $fileName);
            $imageUpdate = $fileName;
            return $fileName;
        }
    }



    
    public function imageTraitUpload($request, $image, $folderName)
    {
        if ($request->hasFile($image)) {
            $file = $request->file($image);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().".".$fileExtension;
            $file->storeAs('public/'.$folderName, $fileName);
            return $fileName;
        }
    }
}

