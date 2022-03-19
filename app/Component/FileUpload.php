<?php

namespace App\Component;

use App\Component\SizeFile;
use Illuminate\Support\Str;

class FileUpload
{

    public function uploadFile($file,$folder)
    {

        if ($file) {
            $size = new SizeFile();
            $size=$size->sizeFile($file->getSize());
            $filenameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $url = $file->storeAs('uploads/'.$folder.'/files/' . auth()->id(), $fileNameHash, 'local');
            return [
                'file_name' => $filenameOrigin,
                'url' => $url,
                'size_file' => $size,
            ];

        }
        return null;

    }
}


