<?php namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository {


    /**
     * Get all the statuses of the user
     *
     * @param User $user
     * @return mixed
     */
    public function getAllForUser(User $user)
    {
        return $user->statuses()->get();
    }

    /**
     * Save a new status for the user
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status,$userId)
    {
        return User::findOrFail($userId)
                   ->statuses()
                   ->save($status);
    }


} 