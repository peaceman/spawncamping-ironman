<?php
namespace ScIm\User;

use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Guard;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use ScIm\User\Events\UserLoggedIn;

class LogInUserCommandHandler implements CommandHandler
{
	use DispatchableTrait;

	/**
	 * @var Guard
	 */
	protected $auth;

	public function __construct(AuthManager $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle the command
	 *
	 * @param LogInUserCommand $command
	 * @return User
	 */
	public function handle($command)
	{
		if (!$this->auth->attempt([
			'username' => $command->username,
			'password' => $command->password,
		])) {
			throw new InvalidCredentialsException;
		}

		$user = $this->auth->user();
		$this->getDispatcher()->dispatch([new UserLoggedIn($user)]);

		return $user;
	}
}
