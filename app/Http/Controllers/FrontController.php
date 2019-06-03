<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    //
    public function index () {
        return view('posts.template');
    }

    
    public function  render () {
        
           $posts = Post::orderBy('created_at', 'DESC')->paginate(3); 

           return response()->json($posts);

    }
}
