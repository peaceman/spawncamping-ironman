<?php

class RegistrationController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Creating a new user.
	 *
	 * @return string
	 */
	public function store()
	{
		return 'creating a new user';
	}
}
