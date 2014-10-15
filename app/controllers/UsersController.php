<?php
use Larabook\Users\UserRepository;


/**
 * Class UsersController
 */
class UsersController extends \BaseController {


    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

	/**
	 * Display a list of registered users.
	 *
	 * @return Response
	 */

	public function index()
	{
       $users = $this->userRepository->getPaginated();
       return View::make('users.index')->withUsers($users);
    }


    /**
     * Shows user profile.
     *
     * @param $user
     */
    public function show($user)
    {
        $user = $this->userRepository->findByUsername($user);

        return View::make('users.profile')->withUser($user);
    }
}
