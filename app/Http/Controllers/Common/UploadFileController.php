<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_path = Str::random(20) . "_$file_name";
        Storage::disk('public')->put($file_path, $file->getContent());

        return response()->json([
            'path' => Storage::url($file_path),
            'url' => asset(Storage::url($file_path)),
        ]);
    }
}
