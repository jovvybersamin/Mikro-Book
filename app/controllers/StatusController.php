<?php

use Larabook\Statuses\StatusRepository;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Forms\PublishStatusForm;
use Laracasts\Commander\CommanderTrait;

class StatusController extends \BaseController {

    use CommanderTrait;

    /**
     * @var StatusRepository
     */
    protected $statusRepository;

    /**
     * @var PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * Status Controller Constructor
     */
    public function __construct(PublishStatusForm $publishStatusForm,StatusRepository $statusRepository)
    {
       $this->publishStatusForm = $publishStatusForm;
       $this->statusRepository = $statusRepository;
       //$this->beforeFilter('auth');
    }

	/**
	 * Display a listing of the resource.
	 * GET /status
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getAllForUser(Auth::user());

	    return View::make('statuses.index',compact('statuses'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /status/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /status
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->publishStatusForm->validate(Input::only('body'));

        $userId = Auth::user()->id;

        $status = $this->execute(PublishStatusCommand::class,compact('userId'));

        Flash::message('Your status has been updated.');

        return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /status/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /status/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /status/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /status/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}