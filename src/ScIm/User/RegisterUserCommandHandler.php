<?php
namespace ScIm\User;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler
{
	use DispatchableTrait;

	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$user = User::register(
			$command->username, $command->email, $command->password
		);

		$this->userRepository->save($user);

		$this->dispatchEventsFor($user);

		return $user;
	}
}
