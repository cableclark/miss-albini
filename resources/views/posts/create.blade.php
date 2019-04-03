@extends('templates.layout')

@section ('content')
    <div class="container is-widescreen">

        <form action="/posts" method= "POST">
            @csrf
            @include('inc.form') 
        </form>     
    
    </div> 
@endsection