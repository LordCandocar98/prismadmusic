<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('pista_mp3')) {
            $file = $request->file('pista_mp3');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/canciontemp/tmp/' . $folder, $filename);
            return [
                'folder' => $folder,
                'filename' => $filename
            ];
        }
        return '';
    }
}
