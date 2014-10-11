<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator{

    /**
     * Validation rules for the SignInForm
     *
     * @var array
     */
    protected $rules = [
      'email'   =>  'required',
      'password'   =>  'required'
    ];

} 