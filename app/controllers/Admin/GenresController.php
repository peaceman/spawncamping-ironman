<?php
namespace ScIm\Controllers\Admin;

use Illuminate\Support\Facades\View;
use ScIm\Genre\Genre;

class GenresController extends \BaseController
{
	public function index()
	{
		$genres = Genre::paginate();
		return View::make('admin.genres.index', compact('genres'));
	}
}
