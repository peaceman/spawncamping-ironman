<?php namespace ScIm\Artist;

class CreateArtistCommand
{

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @param string name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}

}
