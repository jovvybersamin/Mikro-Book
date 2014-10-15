<?php

// Composer: "fzaninotto/faker": "v1.4.*"
use Faker\Factory as Faker;
use Larabook\Users\User;
use Larabook\Statuses\Status;

class StatusTableSeeder extends Seeder {

	public function run()
    {

    $faker = Faker::create();
    $userIds = User::lists('id');

    foreach(range(1, 50) as $index)
    {
        Status::create([
            'user_id' => $faker->randomElement($userIds),
            'body' => $faker->sentence(),
        ]);
    }
}

}