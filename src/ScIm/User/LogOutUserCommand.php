<?php
namespace ScIm\User;

class LogOutUserCommand
{
	/**
	 * @var User
	 */
	public $user;

	/**
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}
} 
