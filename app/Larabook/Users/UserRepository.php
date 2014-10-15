<?php namespace Larabook\Users;


use Larabook\Statuses\Status;

class UserRepository {

    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * List all paginated users.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username','asc')->simplePaginate($howMany);
    }

    /**
     * Show the user by its username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function($query)
            {
                $query->latest();
            }])->whereUsername($username)->first();
    }



}