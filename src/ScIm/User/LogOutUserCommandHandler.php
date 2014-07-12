<?php
namespace ScIm\User;

use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Guard;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use ScIm\User\Events\UserLoggedOut;

class LogOutUserCommandHandler implements CommandHandler
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
	 * @param LogOutUserCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$user = $this->auth->user();
		$this->auth->logout();

		$this->getDispatcher()->dispatch([new UserLoggedOut($user)]);
	}
}
