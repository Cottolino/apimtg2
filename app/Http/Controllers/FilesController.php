<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    //
    public function show($filename)
    {
        $path = storage_path('app/public/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
        $url = Storage::url($filename);
        // return response()->file($path);
        return response()->json(['url' => $url, 'filename' => $filename]);
    }
}
