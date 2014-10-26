<?php

namespace Larabook\Users;


class FollowUserCommand {

    /**
     * @var int
     */
    public $userId;

    /**
     * @var int
     */
    public $userIdToFollow;

    /**
     * @param $userId
     * @param $userIdToFollow
     */
    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

} 