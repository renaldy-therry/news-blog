<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait
{
    public function handleFileUpload(Request $request, string $fieldName, ?string $oldPath = null,
    string $dir = 'uploads'): ?String
    {

          /*check request has file*/
          if(!$request->hasFile($fieldName)){
            return null;
           }

           /*delete the existing image if have*/
            if($oldPath && File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }

           $file = $request->file($fieldName);
           $extension = $file->getClientOriginalExtension();
           $updatedFileName = \Str::random(30).'.'.$extension;

           $file->move(public_path($dir), $updatedFileName);

           $filePath = $dir.'/'.$updatedFileName;

           return $filePath;

    }
}
