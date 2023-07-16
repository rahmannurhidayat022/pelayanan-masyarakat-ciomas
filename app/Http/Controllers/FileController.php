<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function downloadFile($filename)
    {
        $filePath = 'public/files/' . $filename;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }

        abort(404, 'File not found');
    }
}
