<?php

class PagesController extends \BaseController {

    /**
     * @return mixed
     */
    public function home()
	{
		return View::make('pages.home');
	}

}
