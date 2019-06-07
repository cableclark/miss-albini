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

    }


    public function store (Request $request)
    {

    }

    public function show ($id)
    {

    }

    public function destroy ($id)
    {
        $photo = Photo::find($id);

        if(Storage::delete('/public/photos/'. $photo->album_id . "/". $photo->photo));

        $photo->delete();

        return redirect('/')->with('success', "The photo was deleted");
    }


  



}
