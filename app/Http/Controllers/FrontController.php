<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    //
    public function index () {
           $posts = Post::orderBy('created_at', 'DESC')->get(); 

           return view('posts.template')->with('posts', $posts);

    }
}
