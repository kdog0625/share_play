<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//一般人のユーザー新規登録、ログイン、ログアウト
Auth::routes();

//シェアハウス一覧ページをトップページに設定
Route::get('/', 'SharesController@index')->name('shares.index');

//トップページ
Route::resource('/shares', 'SharesController')->except(['index'])->middleware('auth:admin');

//管理者用のルーティング
Route::prefix('admin')->namespace('admin')->name('admin.')->group(function () {
    //管理者のユーザー新規登録、ログイン、ログアウト
    Auth::routes();
    Route::get('/home', 'AdminHomeController@index')->name('admin_home');
});
