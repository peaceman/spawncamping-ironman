<?php
namespace ScIm\Controllers\Admin;

use Illuminate\Support\Facades\View;
use ScIm\Song\Song;

class SongsController extends \BaseController
{
	public function index()
	{
		$songs = Song::with(['artist', 'genre', 'recordLabel'])->paginate();
		return View::make('admin.songs.index', compact('songs'));
	}

	public function edit()
	{

	}
}
