<?php

use Larabook\Forms\SignInForm;

class SessionController extends \BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    /**
     * SessionController Constructor
     *
     * @param SignInForm $signInForm
     */
    public function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest',['except'=> 'destroy']);
    }

    /**
     * Show the form for signing in
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.create');
    }

    /**
     *
     *
     * @return Response
     */

    public function store()
    {
        $formData = Input::only('email','password');

        $this->signInForm->validate($formData);

        if (! Auth::attempt($formData))
        {
            Flash::error('We were unable to sign you in. Please check your credentials and try again.');

            return Redirect::back()->withInput();

        }

        Flash::message('Welcome back!');
            // redirect to statuses
        return Redirect::intended('statuses');
    }

    /**
     * Log a user out of Larabook
     *
     * @return mixed
     */

    public function destroy()
    {
       Auth::logout();

       Flash::message('You are now logout..');

       return Redirect::home();
    }

}