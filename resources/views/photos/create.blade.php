@extends('layout.app')

@section('content')
  <h3>Create Album</h3>
  {!!Form::open(['action' => 'PhotosController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{Form::text('title','',['placeholder' => 'Photo Title'])}}
    {{Form::textarea('description','',['placeholder' => 'Album Description'])}}
    {{Form::file('photo')}}
    {{Form::hidden('album_id', $album_id)}}
    {{Form::submit('submit')}}
  {!! Form::close() !!}
@endsection