<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['post_id', 'description', 'photo', 'title', 'size'];

    public function posts ()
    {
       return $this->belongsTo('App\Photo');

    }
    /**
     * Saves the image on disk and in data base.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String $filenmaToStore
     */

    public function uploadImages (Request $request, $id) {

        foreach ($request->file("photos") as $image) {

            $path = $this->saveImagePath($image, "upload_image");
            $photo = new Photo();
            $photo->photo = $path;
            $photo->title =  "";
            $photo->post_id = $id;
            $photo->save();
        }

    }


    /**
     * Prepares a filename for iamge file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String $filenmaToStore
     */
    public function saveImagePath($image) {
         //1. Get the filename of the image

        $filenameWithExt= $image->getClientOriginalName();

        //2.Remove exntenstion
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //3. Get exntension
        $extension = $image->getClientOriginalExtension();

        //4. Add the name + the time + extesion and voila...
        $filenameToStore = $filename . "_" . time() . "_" . $extension;
        //...Done

        $path = $image->storeAs('/public', $filenameToStore);

        return $filenameToStore;

    }
}
