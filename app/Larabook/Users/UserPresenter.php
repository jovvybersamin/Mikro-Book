<?php namespace Larabook\Users;


use Mikro\Presenter\Presenter;

class UserPresenter extends Presenter {


    public function gravatar()
    {
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/" . $email . '?s=30';
    }


} 