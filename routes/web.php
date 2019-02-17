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

Route::get('/',function(){
   return view('user.signin');
});

Route::group(['prefix' => 'user'], function(){
    
    Route::group(['middleware' => 'guest'], function(){
    //登録
    Route::get('/signup', [
        'uses' => 'UserController@getSignup',
        'as' => 'user.signup'
        ]);
        
    Route::post('/signup',[
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
        ]);
    
    //ログイン
    Route::get('/signin',[
        'uses' => 'UserController@getSignin',
        'as' => 'user.signin'
        ]);
        
    Route::post('/signin',[
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
        ]);
 
    });
    
    Route::group(['middleware' => 'auth'],function(){
    //ユーザープロフィール
    Route::get('/profile',[
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
        ]);
    //ログアウト
    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
        ]);
        
     //貸し情報登録
    Route::get('/{id}/lends/create','LendController@showCreateForm')->name('lends.create');
    
    Route::post('/{id}/lends/create','LendController@create');
   
    //貸し情報の編集
    Route::get('/{id}/lends/{lend_id}/edit','LendController@showEditForm')->name('lends.edit');
    
    Route::post('/{id}/lends/{lend_id}/edit','LendController@edit');
    
    //貸し情報の削除
    Route::post('/{id}/lends/{lend_id}/delete','LendController@delete')->name('lends.delete');
    
    //貸し情報一覧
    Route::get('/{id}/lends','LendController@index')->name('lends.index');
    });
    
});


