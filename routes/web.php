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

Route::get('/dang-nhap', 'Auth\LoginController@getLogin')->name('login');
Route::post('/dang-nhap', 'Auth\LoginController@postLogin');
Route::get('/dang-xuat', 'Auth\LoginController@logOut')->name('logout');

Route::group(['middleware'=>'login'], function (){
	Route::get('/', 'MainController@index')->name('home');


	Route::group(['prefix' =>'quan-ly-xe'],function (){
		Route::get('/', 'NhanVienQuanLyXe@index')->name('quanLyXe');
	});
});