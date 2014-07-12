<?php
namespace ScIm\User\Events;

use ScIm\User\User;

class UserLoggedOut
{
	/**
	 * @var User
	 */
	public $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}
} 
