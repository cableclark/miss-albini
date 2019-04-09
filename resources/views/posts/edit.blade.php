@extends('templates.layout')

@section ('content')
    <div class="container">

        <form action="/posts/{{$post->id}}" method= "POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            @include('inc.form') 
        </form>     
        <form action="/posts/{{$post->id}}" method= "POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <a href="/posts/{{$post->id}}/edit"><button type="submit" class="btn btn-danger"> Delete</button></a>
        </form>   
       
    </div> 
@endsection