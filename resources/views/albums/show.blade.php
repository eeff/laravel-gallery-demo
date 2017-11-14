@extends('layout.app')

@section('content')
	<h1>{{$album->name}}</h1>
	<a class="button secondary" href="/">Go Back</a>
	<a class="button" href="/photos/create/{{$album->id}}">Upload photo to album</a>
	<hr>
@endsection