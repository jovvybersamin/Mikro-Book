<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Larabook\Registration\Events\UserHasRegistered;
use Larabook\Statuses\Status;
use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Support\Facades\Hash;
use Mikro\Presenter\Contracts\PresenterInterface;
use Mikro\Presenter\PresenterTrait;

class User extends \Eloquent implements UserInterface, RemindableInterface, PresenterInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresenterTrait, FollowableTrait;

	/**
	 * Which fields may be mass assigned
	 *
	 * @var array
	 */
	protected $fillable = ['username','email','password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    /**
     * Refers to UserPresenter Class
     *
     * @var UserPresenter
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

    /**
     * password must always be hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }


    /**
     * User has many statuses
     *
     * @return mixed
     */
    public function statuses()
    {
       return $this->hasMany(Status::class);
    }





    /**
     * Register new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username,$email,$password)
    {
        $user = new static(compact('username','email','password'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    /**
     * Determine if the given user is the same as the current one.
     *
     * @param string $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;

        return ($this->username == $user->username);
    }


}
