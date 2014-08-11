<?php
namespace ScIm\Controllers\Admin;

use Illuminate\Support\Facades\View;
use ScIm\RecordLabel\RecordLabel;

class RecordLabelsController extends \BaseController
{
	public function index()
	{
		$recordLabels = RecordLabel::paginate();
		return View::make('admin.record-labels.index', compact('recordLabels'));
	}
}
