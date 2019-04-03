@extends('templates.layout')

@section ('content')
    <div class="container is-widescreen">
        @foreach ($posts as $post) 
        <div >
        <h2><a href="{{url()->current() . "/posts/" . $post->id}}" >{{$post->title }} </a></h2>
            <span>{{$post->created_at->diffForHumans()}}</span>
            {!!$post->body!!}
            <img src="https://2.bp.blogspot.com/-fsZRiFIGpf4/XEIigIF1GCI/AAAAAAAAYFI/PqjRMxQNLYg69ksybKPJgmN1bh1oIQNgQCLcBGAs/s400/Moon%2BSafari%2BGimp.jpg" alt="">
        </div>   
        @endforeach
    </div> 
@endsection