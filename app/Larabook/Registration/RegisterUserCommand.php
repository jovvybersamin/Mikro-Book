<?php namespace Larabook\Registration;


class RegisterUserCommand {

	/**
	 * 
	 * @var string
	 */
	public $username;

	/**
	 * 
	 * @var string
	 */
	public $email;

	/**
	 *
	 * @var string
	 */
	public $password;

	public function __construct($username,$email,$password)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}


}