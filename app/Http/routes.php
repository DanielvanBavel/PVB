<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/**
 * Home
 */

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home',
]);

/**
 * Authentication
 */

Route::get('/register', [
    'uses' => '\SocialApp\Http\Controllers\AuthController@getRegister',
    'as' => 'auth.register',
    'middleware' => ['guest'],
]);

Route::post('/register', [
    'uses' => '\SocialApp\Http\Controllers\AuthController@postRegister',
    'middleware' => ['guest'],
]);

Route::get('/login', [
    'uses' => '\SocialApp\Http\Controllers\AuthController@getLogin',
    'as' => 'auth.login',
    'middleware' => ['guest'],
]);

Route::post('/login', [
    'uses' => '\SocialApp\Http\Controllers\AuthController@postLogin',
    'middleware' => ['guest'],
]);

Route::get('/uitloggen', [
    'uses' => '\SocialApp\Http\Controllers\AuthController@getSignout',
    'as' => 'auth.signout',
]);

Route::get('/wachtwoordvergeten', [
    'uses'  => '\SocialApp\Http\Controllers\AuthController@getPasswordForgotten',
    'as' => 'auth.forgetPass',
    'middleware' => ['guest'],
]);

/*Messages*/

Route::get('/berichten', [
    'uses' => 'MessageController@getMessages',
    'as' => 'messages.index',
    'middleware' => ['auth'],
]);


/**
 * GebruikersProfiel
 */

Route::get('/profiel/{user}', [
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index',
    'middleware' => ['auth'],
]);

Route::get('/mijnprofiel/edit', [
    'uses' => 'ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth'],
]);

Route::post('/mijnprofiel/edit', [
    'uses' => 'ProfileController@postEdit',
    'middleware' => ['auth'],
]);

Route::get('/profiel/{user}/vrienden', [
    'uses' => 'ProfileController@viewFriendsFromProfile',
    'as'   => 'profile.friends',
    'middleware' => ['auth'],
]);

/*
* Vrienden
*/

Route::get('/vrienden', [
    'uses' => 'FriendsController@getFriends',
    'as'   => 'friends.index',
    'middleware' => ['auth'],
]);

Route::post('/vrienden', [
    'uses' => 'FriendsController@AcceptFriendsRequests',
    'middleware' => ['auth'],
]);

/*
* Meldingen
*/

Route::get('/meldingen', [
    'uses' => 'NotificationController@index',
    'as'    => 'notification.index',
    'middleware' => ['auth'],
]);

/**
 * Zoeken
 */

Route::get('/zoeken', [
    'uses' => 'SearchController@getResults',
    'as' => 'search.results',
]);