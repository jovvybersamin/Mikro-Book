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
        return $user->statuses()->with('user')->latest()->get();
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

    /**
     * Get the feed for a user.
     *
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUser()->lists('followed_id');

        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id',$userIds)->latest()->get();
    }

    /**
     * Leave a comment for the status.
     *
     * @param $userId
     * @param $statusId
     * @param $body
     * @return static
     */
    public function leaveComment($userId, $statusId, $body)
    {
        $comment = Comment::leave($statusId,$body);

        $comment = User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }

} 