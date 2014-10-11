<?php


use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{


   /**
    * @var \IntegrationTester
    */
    protected $tester;

    /**
     * @var StatusRepository
     */
    protected $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

    /** @test */ #<---- i need this everytime //
    public function it_gets_all_statuses_for_a_user()
    {
        // Given i have two users
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        // And statuses for both of them
        TestDummy::times(2)->create('Larabook\Statuses\Status',[
             'user_id'  =>  $users[0]->id,
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status',[
            'user_id'  =>  $users[1]->id,
        ]);

        // When i fetch the statuses for one user
        $statusesForUser =  $this->repo->getAllForUser($users[0]);

        // Then i should receive the relevant ones
        $this->assertCount(2,$statusesForUser);

    }


    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        // Given i have unsaved status
        $status = TestDummy::create('Larabook\Statuses\Status',[
            'user_id'  => null,
            'body'  =>  'My post'
        ]);

        // And an existing user
        $user = TestDummy::create('Larabook\Users\User');

        // Then save this unsaved status to the existing user
        $savedStatus = $this->repo->save($status,$user->id);

        // Check if the status has been saved
        $this->tester->seeRecord('statuses',[
            'body'  => $status->body
        ]);

        // And the status should have a correct user_id
        $this->assertEquals($user->id,$savedStatus->user_id);

    }

}