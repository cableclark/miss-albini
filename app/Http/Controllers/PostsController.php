<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show','featured_image']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "DESC")->get();
        return view('posts.template')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $post= new Post($validatedData);
        $post->featured_image = "/defaultImage.jpg";
        $post->is_draft = 1;

        if (!empty ($request->files)) {

            // $path = $this->saveImages($request);

            $this->uploadImages ($request, $validatedData);
         }

        if (!empty ($request->file('featured_image'))) {
            $path = $this->saveImagePath($request);
            $post->featured_image = $path;
         }

        $post->save();
        // dd($post->id);

        return redirect('home')->with('status', 'The post was saved!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post= Post::findOrFail($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form fot
     *
     * @param  int  $idt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post= Post::findOrFail($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'featured_image'=> 'image|max:1999 '
        ]);

        $post= Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->body= $validatedData['body'];

        if (!empty ($request->photos)) {
            dd($request->photos);
            // $path = $this->saveImages($request);

            $this->uploadImages ($request, $validatedData);
         }

        if ($request->featured_image) {
            $post->featured_image= $this->saveImagePath($validatedData);
        }

        $post->update();

        return redirect('home')->with('status', 'Profile updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::find($id)->delete();

        return redirect("/home");
    }

    /**
     * Saves the image on disk and in data base.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String $filenmaToStore
     */

    public function uploadImages (Request $request, $validatedData) {

        $post = new Post($validatedData);
        $post->featured_image = "/defaultImage.jpg";
        $post->is_draft = 1;


        if (!empty ($request->file('featured_image'))) {
            $path = $this->saveImagePath($request);
            $post->featured_image = $path;
         }

         $post->save();

        foreach ($request->file("photos") as $image) {
            //TODO  save images in database;
            dd($image);

        }

    }


    /**
     * Prepares a filename for iamge file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String $filenmaToStore
     */
    public function saveImagePath($request) {

         //1. Get the filename of the image
        $filenameWithExt=  $request['featured_image']->getClientOriginalName();

        //2.Remove exntenstion
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //3. Get exntension
        $extension = $request['featured_image']->getClientOriginalExtension();

        //4. Add the name + the time + extesion and voila...
        $filenameToStore = $filename . "_" . time() . "_" . $extension;

        //...Done

        $path = $request['featured_image']->storeAs('/public', $filenameToStore);

        return $filenameToStore;

    }
}
