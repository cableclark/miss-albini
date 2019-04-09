@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table"> 
                        <thead>Posts</thead>

                            @foreach($posts as $post)
                        
                            <tr>   
                                <td>{{$post->title}}</td>  
                                <td><a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-success"> Edit</button></a>
                                
                                </td>
                             </tr>

                            @endforeach
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
