<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Album\ImageRequest;

use App\Models\Album;
use App\Models\Media;
class ImageController extends Controller
{

    public function store(ImageRequest $request){
        $album = Album::find($request->id);
        foreach($request->file as $index=>$value){
            $album->addMedia($request->file[$index])
            ->usingName($album->name.$index)
            ->toMediaCollection();
        }
        return response()->json(["message"=>"success"],200);; 
    }




    public function destroy($id){
        $media = Media::find($id);
        $media->delete();
        return response()->json(["message"=>"success"],200);; 
    }
}
