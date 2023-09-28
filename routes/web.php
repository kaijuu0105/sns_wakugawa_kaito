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
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
// Authユーザーしか見れないようにグループの中のルートにmiddlewareを指定
Route::group(['middleware' => ['auth']], function() {
  Route::get('/top','PostsController@index');

  // プロフィール
  Route::get('/profile','UsersController@profile');
  // プロフィール更新
  Route::post('/profile-up','UsersController@profileUpdate');

  //投稿機能
  Route::post('/post/create','PostsController@postCreate');
  // 投稿内容更新
  Route::post('/post/{id}/update', 'PostsController@update');
  // ルーティングを固定しない
  Route::get('/post/{id}/delete', 'PostsController@delete');

  //検索画面表示
  Route::get('/search','UsersController@search');
  // 検索機能
  Route::post('/search','UsersController@searching');

  // フォロー・アンフォロー機能を行う
  Route::post('/follow/{id}','FollowsController@follow')->name('follow');
  Route::post('/unfollow/{id}','FollowsController@unfollow')->name('unfollow');

  // フォローリスト・フォロワーリストを表示
  Route::get('/follow-list','FollowsController@followList');
  Route::get('/follower-list','FollowsController@followerList');

  // フォローユーザー、フォロワーの個人ページ
  // GET送信じゃないとreturn back()で元の画面に戻って来れない、エラーコードが出る
  Route::get('/another/{id}','FollowsController@another');
});
// ログアウト
Route::post('/login','Auth\LoginController@logout')->name('login');
