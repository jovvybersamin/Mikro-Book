<?php namespace Larabook\Statuses\Presenter;


use Mikro\Presenter\Presenter;

class CommentPresenter extends Presenter{

    public function timeSinceCommented()
    {
        return $this->created_at->diffForHumans();
    }

} 