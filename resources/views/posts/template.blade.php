@extends('templates.layout')

@section ('content')
    <div class="container">
        @foreach ($posts as $post) 
        <div class="article">
        <h2><a href= "{{'/posts/'. $post->id  }}">{{$post->title }} </a></h2>
        <span > Published: {{$post->created_at->diffForHumans()}}</span>
            <div class="body-p">
               
                {!!$post->body!!}
            </div>
        </div>   
        @endforeach
    </div> 
@endsection