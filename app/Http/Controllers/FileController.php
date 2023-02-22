<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if($request->file('sample_image')) {
            $file = $request->file('sample_image')->store('Produk-file');
        }
        $image_path = asset('storage/'. $file);
        $name_path = $file;

        return response()->json([
            'image_path' => $image_path,
            'name_path' => $name_path,
        ]);
    }
}
