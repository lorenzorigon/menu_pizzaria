<?php

namespace App\Services\Storage;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function store(UploadedFile $file, $path): string
    {
        $extension = $file->extension();
        $imageName = md5($file->getClientOriginalName()) . strtotime("now") .'.'. $extension;

        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $file->move(public_path($path), $imageName);
        
        $relative_path = $path . '/' . $imageName;
        
        return $relative_path;
    }

    public function delete($path) : void
    {
        $absolutePath = public_path($path);
        if (file_exists($absolutePath)) {
            unlink($absolutePath);
        }
    }
}