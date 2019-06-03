@extends('templates.layout')

@section ('content')

    <div class="container">
        <div class="results"> </div>
    </div>

    <script src=  "{{ asset('/js/infinite.js') }}"> </script>  

@endsection
