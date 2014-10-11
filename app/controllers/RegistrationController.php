<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends \BaseController {

    use CommandBus;

    /**
     * Constructor
     *
     * @param RegistrationForm $registrationform
     */

    public function __construct(RegistrationForm $registrationform)
	{
		$this->registrationform = $registrationform;

        $this->beforeFilter('guest');
	}

	/**
	 * Show a form to register the user
	 *
	 * @return Response
	 */

	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Create a new Larabook user
	 *
	 * @return  String
	 */
	
	public function store()
	{
		$this->registrationform->validate(Input::all());

        extract(Input::only('username','email','password'));

		$command = new RegisterUserCommand($username,$email,$password);

		$user = $this->execute($command);

		Auth::login($user);

        Flash::message('Welcome aboard');

		return Redirect::home();
	}

}
