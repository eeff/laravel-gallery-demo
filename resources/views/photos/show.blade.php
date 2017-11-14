@extends('layout.app')

@section('content')
	<h3>{{$photo->title}}</h3>
	<p>{{$photo->description}}</p>
	<a href="/ablums/{{$photo->album_id}}">Back To Album</a>
	<hr>
	<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}">
	<br><br>
	{!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
		{{Form::hidden('_method', 'DELETE')}}
		{{Form::submit('Delete Photo', ['class' => 'button alert'])}}
	{!!Form::close() !!}
	<hr>
	<small>Size: {{$photo->size}}</small>
@endsection