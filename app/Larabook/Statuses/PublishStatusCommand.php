<?php namespace Larabook\Statuses;


class PublishStatusCommand {

    /**
     * @var Status body
     */
    public $body;

    /**
     * @var User Id
     */
    public $userId;

    /**
     *
     * @param $body
     * @param $userId
     */
    public function __construct($body,$userId)
    {
        $this->body = $body;

        $this->userId = $userId;
    }

} 