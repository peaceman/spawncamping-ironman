<?php
namespace ScIm\User\Events;

use ScIm\User\User;

class UserLoggedIn
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
