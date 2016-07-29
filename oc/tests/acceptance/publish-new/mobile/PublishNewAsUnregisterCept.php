<?php 
$I = new AcceptanceTester($scenario);
$I->am('a visitor');
$I->wantTo('publish a new ad');


$I->amOnPage('/oc-panel/auth/login');
$I->fillField('email','admin@reoc.lo');
$I->fillField('password','1234');
$I->click('auth_redirect');
$I->see('welcome admin');

$I->wantTo('activate mobile theme');
$I->amOnPage('/oc-panel/Config/update/theme');
$I->fillField('#formorm_config_value','mobile');
$I->click('button[type="submit"]');
$I->see('Item updated. Please to see the changes delete the cache');

$I->click('Logout'); 


$I->amOnPage('/publish-new.html');
$I->see('Publish new advertisement');
$I->fillField('#title',"New ad unregister mobile");
$I->selectOption('category','18');
$I->selectOption('location','4');
$I->fillField('#description','This is a new ad from unregister user on the mobile theme');
$I->fillField('#phone','99885522');
$I->fillField('#address','barcelona');
$I->fillField('#price','25');
$I->fillField('#name','David');
$I->fillField('#email','david@gmail.com');
$I->fillField('#website','https://www.admin.com');
$I->click('submit');

$I->see('Advertisement is posted. Congratulations!');

$I->amOnPage('/apartment/new-ad-unregister-mobile.html');
$I->see('New ad unregister mobile');
$I->see('This is a new ad from unregister user on the mobile theme');
$I->see('Barcelona');

// Check if user has created
$I->amOnPage('/user/david');
$I->dontSee('Page not found');


$I->amOnPage('/oc-panel/auth/login');
$I->fillField('email','admin@reoc.lo');
$I->fillField('password','1234');
$I->click('auth_redirect');
$I->see('welcome admin');

$I->wantTo('activate Default theme again');
$I->amOnPage('/oc-panel/Config/update/theme');
$I->fillField('#formorm_config_value','default');
$I->click('button[type="submit"]');
$I->see('Item updated. Please to see the changes delete the cache');

$I->click('Logout'); 
