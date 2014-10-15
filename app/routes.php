<?php


/**
 *
 */
Event::listen('Larabook.Registration.Events.UserRegistered',function($event)
{
   // dd('send a notification email.');
});

// Elequent Debugger

Event::listen('illuminate.query',function($query)
{
   // echo '<pre>' , print_r($query,1) , '</pre>';
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('test',function() use ($app)
{
   dd($app['files']->get(__DIR__ . '/../.env.php'));
});

Route::get('/',[
	'as'	=>	'home',
	'uses'	=>	'PagesController@home'
]);

/**
 * Registration
 */

Route::get('register',[
	'as'	=>	'register_path',
	'uses'	=>	'RegistrationController@create'
]);

Route::post('register',[
	'as'	=>	'register_path',
	'uses'	=>	'RegistrationController@store'
]);

/**
 * Sessions
 */

Route::get('login',[
   'as' =>  'login_path',
   'uses'  =>  'SessionController@create'
]);

Route::post('login',[
    'as' => 'login_path',
    'uses'  =>  'SessionController@store'
]);

Route::get('logout',[
    'as' => 'logout_path',
    'uses' => 'SessionController@destroy'
]);

/**
 * Statuses
 */

Route::get('statuses',[
    'as' =>  'statuses_path',
    'uses' => 'StatusController@index'
]);

Route::post('statuses',[
    'as' => 'statuses_path',
    'uses' => 'StatusController@store'
]);

/**
 * Users
 */

Route::get('users',[
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

Route::get('@{username}',[
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);


