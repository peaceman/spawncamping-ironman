<?php
namespace ScIm\Controllers\Admin;

use BaseController;
use View;

class PagesController extends BaseController
{
	public function home()
	{
		return View::make('admin.pages.home');
	}
}
