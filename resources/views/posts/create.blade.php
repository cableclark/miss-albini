@extends('templates.layout')

@section ('content')
    <div class="container">
         @include('inc.flash')
        <form action="/posts" method= "POST"  enctype="multipart/form-data">
            @csrf
            @include('inc.form')
        </form>
      @include('inc.images')
      
      @include('inc.editor')

    </div>
@endsection
