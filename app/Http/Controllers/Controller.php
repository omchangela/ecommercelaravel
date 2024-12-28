<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    private $storage_folder = 'laravel11';

    public function uploadFile($request, $record = [], $name, $path, $thumb = false, $thumbWidthSize = null, $thumbHeightSize = null) {
        if($this->storage_folder != null){
            $path = $this->storage_folder.'/'.$path.'/'.Carbon::now()->format('Y').'/'.Carbon::now()->format('m');
        }

        if ($request->hasFile($name)) {
//            return "456";
            $file_name = $request->file($name)->store($path);
            if ($thumb) {
                $file = $request->file($name);
                $path = $file->hashName('thumb/' . $path);
                $image = \Intervention\Image\Facades\Image::make($file);

                // Resize uploaded file
                if ($thumb == true && !empty($thumbWidthSize) && !empty($thumbHeightSize)) {
                    $image->resize($thumbWidthSize, $thumbHeightSize, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } elseif ($thumb == true && !empty($thumbWidthSize) && $thumbHeightSize == null) {
                    $image->resize($thumbWidthSize, null , function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } elseif ($thumb == true && $thumbWidthSize == null && !empty($thumbHeightSize)) {
                    $image->resize(null, $thumbHeightSize, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                Storage::put($path, (string) $image->encode());
                if (!empty($record[$name]) && Storage::exists($record[$name]) ) {
                    Storage::delete('thumb/' . $record[$name]);
                }
            }            
            if (!empty($record[$name]) && Storage::has($record[$name])) {
                Storage::delete($record[$name]);
            }
            return $file_name;
        } else {
            return null;
        }
    }

    public function deleteFile($record,$name,$is_thumb=false){
        if (!empty($record)) {
            !is_null($record[$name]) && Storage::delete($record[$name]);
            if ($is_thumb) {
                Storage::delete('thumb/' . $record[$name]);
            }
        }
    }


}
