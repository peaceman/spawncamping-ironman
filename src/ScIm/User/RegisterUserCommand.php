<?php
namespace ScIm\User;

class RegisterUserCommand
{
	public $username;
	public $email;
	public $password;

	public function __construct($username, $email, $password)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}
} 
