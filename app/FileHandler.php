<?php

namespace App\FileHandler;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileHandler
{
    public static function uploadFile(Request $request, $inputName = null)
    {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $fileName = Str::random(10) . '-' . time() . '.' . $request->file($inputName)->extension();

            if ($file->isValid()) {
                return $file->storeAs('public/files', $fileName);
            }
        }

        return false;
    }

    public static function removeFile($path)
    {
        return Storage::delete($path);
    }
}
