<?php
namespace ScIm\User;

use Laracasts\Commander\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler
{
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

		return $user;
	}
}
