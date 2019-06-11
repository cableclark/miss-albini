@extends('templates.layout')

@section ('content')
    <div class="container">
         @include('inc.flash')

        <form action="/photos" method= "POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label for="upload_images">Select image</label>

                <input type="file" multiple="multiple" name="photo" class="form-control-file">

            </div>

            <div class="form-group">

                <label for="title">Image title: </label>

                <input type="text" multiple="multiple" name="title"  class="form-control">

            </div>


            <div class="form-group">

                  <button type="submit" class="btn btn-primary">Submit</button>

                  <a href="/posts"> <button class="btn">Cancel</button></a>

            </div>

        </form>

    </div>
@endsection
