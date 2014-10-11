<?php 
$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('login to my Larabook account');
$I->amOnPage('login');

$I->signIn();
$I->see('Welcome Back');