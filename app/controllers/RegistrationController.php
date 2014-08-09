<?php

use Laracasts\Commander\CommandBus;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use ScIm\Forms\RegistrationForm;
use ScIm\User\RegisterUserCommand;

class RegistrationController extends \BaseController
{
	use CommanderTrait;

	/**
	 * @var RegistrationForm
	 */
	protected $registrationForm;

	/**
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}

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
		try {
			$this->registrationForm->validate(Input::all());

			$this->execute(RegisterUserCommand::class);

			return Redirect::home();
		} catch (FormValidationException $e) {
			return Redirect::back()
				->withInput()
				->withErrors($e->getErrors());
		}
	}
}
