<?php

use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use ScIm\Forms\LoginForm;
use ScIm\User\InvalidCredentialsException;
use ScIm\User\LogInUserCommand;
use ScIm\User\LogOutUserCommand;

class SessionController extends BaseController
{
	use CommanderTrait;

	/**
	 * @var LoginForm
	 */
	private $loginForm;

	public function __construct(LoginForm $loginForm)
	{
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

			$this->execute(LogInUserCommand::class);

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

	public function destroy()
	{
		$this->execute(LogOutUserCommand::class, ['user' => Auth::user()]);

		return Redirect::home();
	}
} 
