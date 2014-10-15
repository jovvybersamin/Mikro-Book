<?php 
$I = new FunctionalTester($scenario);
$I->am('a member of Larabook.');
$I->wantTo('list all users who are registered in Larabook.');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');

