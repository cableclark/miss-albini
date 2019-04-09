@extends('templates.layout')

@section ('content')
    <div class="container">

        <form action="/posts" method= "POST">
            @csrf
            @include('inc.form') 
        </form>     
    
    </div> 
@endsection