<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'TasksController@index');
});

// Route::resource('tasks', 'TasksController');

// ログインフォームの表示
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

// ログイン
Route::post('login', 'Auth\LoginController@login')->name('login.post');

// ログアウト
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


// サインアップ
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');

// サインアップ
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// タスク投稿機能
Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['index', 'show','create','destroy','update','edit']]);
});


