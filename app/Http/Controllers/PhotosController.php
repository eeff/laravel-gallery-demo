<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id)
    {
    	return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
    		'photo' => 'image|max:1999'
    	]);

    	$photo_file = $request->file('photo');
    	$finfo = pathinfo($photo_file->getClientOriginalName());
    	$fn = $finfo['filename'] . "_" . time() . "." . $finfo['extension'];
    	
    	$path = $photo_file->storeAs('public/photos/'.$request->input('album_id'), $fn);

    	$photo = new Photo;
    	$photo->album_id = $request->input('album_id');
    	$photo->title = $request->input('title');
    	$photo->description = $request->input('description');
    	$photo->size = $photo_file->getClientSize();
    	$photo->photo = $fn;

    	if ($photo->save()) {
    		return redirect("/albums/{$photo->album_id}")->with('success', 'photo Created');
    	} else {
    		return redirect("/albums/{$photo->album_id}")->withErrors(['photo creation failure']);
    	}
    }
}
