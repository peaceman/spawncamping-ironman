<?php
namespace ScIm\Controllers\Admin;

use Illuminate\Support\Facades\View;
use ScIm\Artist\Artist;

class ArtistsController extends \BaseController
{
	public function index()
	{
		$artists = Artist::paginate();
		return View::make('admin.artists.index', compact('artists'));
	}

	public function create()
	{
		return View::make('admin.artists.create');
	}
}
