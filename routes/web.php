<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// api resource for User, Tweet
Route::prefix('shout')->group(function () {
    // Tweets controller
    Route::get('tweets', 'Tweets\TweetController@index');
    Route::get('tweets/{id}', 'Tweets\TweetController@show');
    // Users controller
    Route::get('users', 'Users\UserController@index');
    Route::get('users/{id}', 'Users\UserController@show');
    Route::get('{username}:{limit?}', 'Users\UserController@getTweets');
});
