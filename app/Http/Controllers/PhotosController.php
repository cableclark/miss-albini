<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photos;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //

    public function create ($album_id) 
    {
        return view('photos.create')->with('album_id', $album_id);
    }


    public function store (Request $request) 
    {
        $this->validate ($request, [
            'title'=> 'required',
            'image'=> 'image|max:1999 '  
            ]
        );
         //TODO make into antoher function.. 
        // Add uniique name by adding the date
        
        //1. Get filename with extenstion
        $filenameWithExt=  $request->file('photo')->getClientOriginalName();
        
        //2.Remove exntenstion
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        //3. Get exntenstion   
        $extension = $request->file('photo')->getClientOriginalExtension();
        //4. Add the name + the time + extesion and voila...
        $filenameToStore = $filename . "_" . time() . "_" . $extension;
        //..Do ovde

        $path = $request->file('photo')->storeAs('public/albums/' . $request->input('album_id'), $filenameToStore);
        
        $photo = new Photo;
        $photo->title= $request->input('title'); 
        $photo->description= $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo= $filenameToStore; 
        $photo->album_id= $request->input('album_id');

        $photo->save();


        return redirect('/albums/'. $request->input('album_id'))->with(['success'=>'Photo created']);
    }

    public function show ($id) 
    {
     $photo = Photo::find($id);
     
     return view('photos.show')->with('photo', $photo);
    }

    public function destroy ($id) 
    {
     $photo = Photo::find($id);


     if(Storage::delete('/public/photos/'. $photo->album_id . "/". $photo->photo));

     $photo->delete();
     
     return redirect('/')->with('success', "The photo was deleted");
    }
}
