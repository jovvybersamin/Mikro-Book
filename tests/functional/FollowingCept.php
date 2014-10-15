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

$I->click('Follow OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('You are following OtherUser');

$I->dontSee('Follow');




