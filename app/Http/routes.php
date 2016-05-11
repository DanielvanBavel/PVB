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