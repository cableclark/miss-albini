@extends('templates.layout')

@section ('content')
    <div class="container">

        <form action="/posts/{{$post->id}}" method= "POST">
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
       
    </div> 
@endsection