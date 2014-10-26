<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook member');

$I->wantTo('follow a larabook member');

$I->haveAnAccount(['username' => 'OtherUser']);

$I->signIn();

$I->click('Browse Users');

$I->seeCurrentUrlEquals('/users');

$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');

// When i follow a user.
$I->click('Follow');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow');

// When i unfollow the same user.
$I->click('Unfollow');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow');




