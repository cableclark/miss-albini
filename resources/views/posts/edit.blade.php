@extends('templates.layout')

@section ('content')

    <div class="container">
        @include('inc.flash')
        <form action="/posts/{{$post->id}}" method= "POST"  enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            @include('inc.form') 
        </form>    

   

        <div class="form-group"> 
             <form action="/posts/{{$post->id}}" method= "POST">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <a href="/posts/{{$post->id}}/edit"><button type="submit" class="btn btn-danger"> Delete</button></a>
            </form>   
        </div>

         @if (!empty($post->featured_image))
             <div> <p>Featured image:</p> <img class="featured_img" src="/storage/{{$post->featured_image}}"> </div> 
        @endif
    </div> 
@endsection