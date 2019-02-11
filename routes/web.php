<?php

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
Route::group(['prefix' => 'user'], function(){

    Route::get('/signup', [
        'uses' => 'UserController@getSignup',
        'as' => 'user.signup'
        ]);
        
    Route::post('/signup',[
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
        ]);
        
    Route::get('/profile',[
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
        ]);
        
    Route::get('/signin',[
        'uses' => 'UserController@getSignin',
        'as' => 'user.signin'
        ]);
        
    Route::post('/signin',[
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
        ]);

});


