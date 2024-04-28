<?php

namespace App\Services\Storage;

use Illuminate\Http\UploadedFile;

class StorageService
{
    public function store(UploadedFile $file, $path): string
    {
        $extension = $file->extension();
        $imageName = md5($file->getClientOriginalName()) . strtotime("now") .'.'. $extension;

        $uploadedFile = $file->move(public_path($path), $imageName);

        return $uploadedFile->getPath();
    }

    public function delete($path)
    {
        // remover o arquivo
    }
}
