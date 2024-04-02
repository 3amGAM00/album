<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Album\AlbumRequest;
use App\Models\Album;
use Carbon\Carbon;

class AlbumController extends Controller
{
    public function index(){
        $albums = Album::paginate(15);
        return view('index',compact('albums')); 
    }

    public function show($id){
        $album = Album::find($id);
        return view('show',compact('album'));
    }

    public function store(AlbumRequest $request){
        $album = Album::create([
            'name'=>$request->name
        ]);
        return back()->with(['message'=>"successs"]);
    }

   
    public function Update(AlbumRequest $request){
        $album = Album::find($request->id);
        $album->update([
            'name'=>$request->name
        ]);
        return back()->with(['message'=>"successs"]);
    }

    public function destroy($id){
        $album = Album::find($id);
        $album->delete();
        return response()->json(["message"=>"success"],200); 
    }
}
