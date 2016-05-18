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
    'uses' => '\SocialApp\Http\Controllers\HomeController@index',
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
    'uses' => '\SocialApp\Http\Controllers\MessageController@getMessages',
    'as' => 'messages.index',
    'middleware' => ['auth'],
]);


/**
 * GebruikersProfiel
 */

Route::get('/profiel', [
    'uses' => '\SocialApp\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index',
    'middleware' => ['auth'],
]);

Route::get('/profiel/edit', [
    'uses' => '\SocialApp\Http\Controllers\ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth'],
]);

Route::post('/profiel/edit', [
    'uses' => '\SocialApp\Http\Controllers\ProfileController@postEdit',
    'middleware' => ['auth'],
]);

/*
* Vrienden
*/

Route::get('/vrienden', [
    'uses' => '\SocialApp\Http\Controllers\FriendsController@index',
    'as'   => 'friends.index',
    'middleware' => ['auth'],
]);

/*
* Meldingen
*/

Route::get('/meldingen', [
    'uses' => '\SocialApp\Http\Controller\NotificationController@index',
    'as'    => 'notification.index',
    'middleware' => ['auth'],
]);



/**
 * Zoeken
 */

Route::get('/zoeken', [
    'uses' => '\SocialApp\Http\Controllers\SearchController@getResults',
    'as' => 'search.results',
]);


/**
*  Timeline
*/

Route::post('submitPost',[
    'uses' => '\SocialApp\Http\Controllers\HomeController@submitPost'
]);