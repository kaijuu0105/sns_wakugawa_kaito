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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

// プロフィール
Route::get('/profile','UsersController@profile');

//検索画面表示
Route::get('/search','UsersController@index');
// 検索機能
// Rotue::post('/search','UsersController@search');

// フォロー・アンフォロー機能を行う
 Route::post('/follow/{id}','FollowsController@follow')->name('follow');
 Route::post('/unfollow/{id}','FollowsController@unfollow')->name('unfollow');

// フォローリスト・フォロワーリストを表示
Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

// ログアウト
Route::post('/logout','Auth\LoginController@logout')->name('logout');
