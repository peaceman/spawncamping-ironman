<?php

use Laracasts\Commander\CommandBus;
use Laracasts\Validation\FormValidationException;
use ScIm\Forms\RegistrationForm;
use ScIm\User\RegisterUserCommand;

class RegistrationController extends \BaseController
{
	/**
	 * @var CommandBus
	 */
	protected $commandBus;

	/**
	 * @var RegistrationForm
	 */
	protected $registrationForm;

	/**
	 * @param CommandBus $commandBus
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(CommandBus $commandBus, RegistrationForm $registrationForm)
	{
		$this->commandBus = $commandBus;
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

			$command = new RegisterUserCommand(
				Input::get('username'),
				Input::get('email'),
				Input::get('password')
			);

			$this->commandBus->execute($command);

			return Redirect::home();
		} catch (FormValidationException $e) {
			return Redirect::back()
				->withInput()
				->withErrors($e->getErrors());
		}
	}
}
