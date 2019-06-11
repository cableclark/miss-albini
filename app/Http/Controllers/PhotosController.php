<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //

    public function index () {

      $photos= Photo::all();

      return view('photos.index')->with('photos', $photos);
    }

    public function create ()

    {
          return view('photos.create');
    }


    public function store (Request $request)
    {

      $validatedData = $request->validate([
          'photo'=> 'image|max:1999',
          'title'=> ''
      ]);

      $this->uploadImage($validatedData);

       return $this->index();
    }

    public function show ($id)
    {
      $photos = Photo::all();

      return view (photos.index)->with('photos', $photos);
    }

    public function destroy ($id)
    {

        $photo = Photo::find($id);

        if(Storage::delete('/public/photos/'. $photo->album_id . "/". $photo->photo));

        $photo->delete();

        return redirect('/')->with('success', "The photo was deleted");
    }

        /**
         * Saves the image on disk and in the database.
         *
         *
         */


        public function uploadImage ($data) {

                $path = $this->saveImagePath($data);
                $photo = new Photo();
                $photo->photo = $path;
                $photo->title = $data['title'];
                $photo->save();

                return true;

        }

        public function saveImagePath($image) {

             //1. Get the filename of the image
            $filenameWithExt= $image['photo']->getClientOriginalName();

            //2.Remove exntenstion
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //3. Get exntension
            $extension = $image['photo']->getClientOriginalExtension();

            //4. Add the name + the time + extesion and voila...
            $filenameToStore = $filename . "_" . time() . "_." . $extension;
            //...Done

            $path = $image['photo']->storeAs('/public', $filenameToStore);

            return $filenameToStore;

        }







}
