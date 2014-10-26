<?php namespace Larabook\Users;


use Mikro\Presenter\Presenter;

class UserPresenter extends Presenter {


    public function gravatar()
    {
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/" . $email . '?s=30';
    }

    public function followerCount()
    {
        $count = $this->fromEntity()->followers()->count();
        $plural = str_plural('Follower',$count);

        return sprintf('%s %s',$count,$plural);
    }

    public function statusCount()
    {
        $count = $this->fromEntity()->followers()->count();
        $plural = str_plural('Status',$count);

        return sprintf('%s %s',$count,$plural);
    }
} 