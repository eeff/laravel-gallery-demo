<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'cover_img' => 'image|max:1999'
    	]);

    	$finfo = pathinfo($request->file('cover_img')->getClientOriginalName());
    	$fn = $finfo['filename'] . "_" . time() . $finfo['extension'];
    	
    	$path = $request->file('cover_img')->storeAs('public/album_covers', $fn);

    	$album = new Album;
    	$album->name = $request->input('name');
    	$album->description = $request->input('description');
    	$album->cover_img = $fn;

    	if ($album->save()) {
    		return redirect('/albums')->with('success', 'Album Created');
    	} else {
    		return redirect('/albums')->withErrors(['Album creation failure']);
    	}
    }
}
