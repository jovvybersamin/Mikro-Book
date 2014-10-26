<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController
{

    /**
     * Follow a larabook user.
     *
     * @return Response
     */
    public function store()
    {
        $userId = Auth::id();

        $this->execute(FollowUserCommand::class,compact('userId'));

        Flash::success('You are now following this user.');

        return Redirect::back();
    }

    /**
     * Unfollow a user.
     *
     * @param $idOfUserToUnfollow
     * @return mixed
     */
	public function destroy($idOfUserToUnfollow)
	{
        $userId = Auth::id();

        $this->execute(UnfollowUserCommand::class,compact('userId'));

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();
	}


}
