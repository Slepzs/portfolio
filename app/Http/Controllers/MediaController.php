<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class MediaController extends Controller
{


    public function store(Request $request)
    {

        $media = new Image;
        if ($request->hasFile('images')) {
            $fileAdders = $media->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('photos');
            });
        }
        return $fileAdders;

    }

}
