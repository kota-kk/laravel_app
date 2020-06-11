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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('todo', 'TodoController');
// Auth::routes([‘register’ => false]);とするとregisterが利用できなくなる。
Auth::routes();
// routes()メソッドはvendor> Laravel> framework> src> illminate> support> facedes> Auth.php で定義されている

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gizmo_lv1', 'lvTestController@index')->name('gizmo');
