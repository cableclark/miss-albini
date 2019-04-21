@extends ('layouts.app')

@section('content')
<h3> {{$photo->title}}</h3>
<p>{{$photo->description }}</p>

<a href="/albums/{{$photo->album_id}}"> Back to gallery</a>
<img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" alt="">

{!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method'=>'POST'])!!}
{{ Form::hidden('_method','delete') }}
{{Form::submit('Delete photo', ['class'=> 'alert'])}}
{!!Form::close()!!}
Size : {{$photo->size}}
@endsection