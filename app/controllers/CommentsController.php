<?php

use Larabook\Statuses\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController {

	/**
	 * Leave new comment.
	 *
	 *
	 * @return Response
	 */
	public function store()
	{
        // fetch the input
        $user_id = Auth::user()->id;
        // execute the command to store the input.
        $comment = $this->execute(LeaveCommentOnStatusCommand::class,compact('user_id'));
        // go back.
        return Redirect::back();
	}

}