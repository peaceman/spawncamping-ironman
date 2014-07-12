<?php

use Laracasts\Commander\CommandBus;
use Laracasts\Validation\FormValidationException;
use ScIm\Forms\LoginForm;
use ScIm\User\InvalidCredentialsException;

class SessionController extends BaseController
{
	/**
	 * @var CommandBus
	 */
	protected $commandBus;

	/**
	 * @var LoginForm
	 */
	private $loginForm;

	public function __construct(CommandBus $commandBus, LoginForm $loginForm)
	{
		$this->commandBus = $commandBus;
		$this->loginForm = $loginForm;
	}

	public function create()
	{
		return View::make('session.create');
	}

	public function store()
	{
		try {
			$this->loginForm->validate(Input::all());

			$command = new \ScIm\User\LogInUserCommand(
				Input::get('username'),
				Input::get('password')
			);

			$this->commandBus->execute($command);

			return Redirect::home();
		} catch (FormValidationException $e) {
			return Redirect::back()
				->withInput()
				->withErrors($e->getErrors());
		} catch (InvalidCredentialsException $e) {
			return Redirect::back()
				->withInput()
				->withErrors(['credentials' => 'Ungültige Zugangsdaten']);
		}
	}
} 
