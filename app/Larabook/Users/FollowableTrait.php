<?php namespace Larabook\Users;


trait FollowableTrait {
    /**
     * Get the list of users that the current users followed.
     *
     * @return mixed
     */
    public function followedUser()
    {
        return $this->belongsToMany(static::class,'follows','follower_id','followed_id');
    }

    /**
     * Get the list of users who follow the current user.
     *
     * @return mixed
     */
    public function followers()
    {
        return $this->belongsToMany(static::class,'follows','followed_id','follower_id');
    }

    /**
     * Determine if the user is followed by the other user.
     *
     * @param $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsOfOtherUserFollowed =  $otherUser->followedUser()->lists('followed_id');

        return in_array($this->id,$idsOfOtherUserFollowed);
    }

} 