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
}
