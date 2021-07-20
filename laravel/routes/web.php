<?php

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

//デフォルトのルーティング
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//シェアハウス一覧ページをトップページに設定
Route::get('/', 'SharesController@index')->name('shares.index');
Route::resource('/shares', 'SharesController')->except(['index'])->middleware('auth');
//管理者用のルーティング
Route::prefix('admin')->namespace('admin')->name('admin.')->group(function(){
    Auth::routes();
});
