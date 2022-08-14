<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function add(Request $request, $slugs = null, $ch = null)
    {

        $file                   = $request->file('file');
        $fileName               = $file->getClientOriginalName();
        $newPath3              = public_path() . '/images/' . $slugs . '/' . $ch;
        File::isDirectory($newPath3)  or File::makeDirectory($newPath3, 0777, true, true);
        $uni = uniqid();
        $file->move($newPath3,   $uni . $fileName);

        return '/images/' . $slugs . '/' . $ch . '/' . $uni . $fileName;
    }
}
