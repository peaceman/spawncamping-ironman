<?php
namespace ScIm\User;

class UserRepository
{
	public function save(User $user)
	{
		return $user->save();
	}
} 
