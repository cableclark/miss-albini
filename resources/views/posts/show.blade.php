@extends('templates.layout')

@section ('content')
    <div class="container">

        @include('inc.status')

        <div class="article">

             <h2>{{$post->title }}</h2>

             <span > Published: {{$post->created_at->diffForHumans()}}</span>

             <div class="body-p">

                 <img src="http://missalbini.test/storage/{!!$post->featured_image!!}">

                 {!!$post->body!!}

             </div>

        </dv>

  
    @include('inc.discuss')
@endsection
