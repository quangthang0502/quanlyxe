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

Route::get( '/dang-nhap', 'Auth\LoginController@getLogin' )->name( 'login' )->middleware('isLogin');
Route::post( '/dang-nhap', 'Auth\LoginController@postLogin' );
Route::get( '/dang-xuat', 'Auth\LoginController@logOut' )->name( 'logout' );

Route::group( [ 'middleware' => 'login' ], function () {
	Route::get( '/', 'MainController@index' )->name( 'home' );

	Route::get('/doi-mat-khau', 'MainController@changePassword')->name('changePassword');
	Route::post('/doi-mat-khau', 'MainController@postChangePassword');


	Route::group( [ 'prefix' => 'quan-ly-xe' ], function () {
		Route::get( '/', 'NhanVienQuanLyXe@index' )->name( 'quanLyXe' );

		Route::get( '/danh-sach-tai-xe', 'NhanVienQuanLyXe@showListDriver' )->name( 'listDriver' );
		Route::get( '/them-tai-xe', 'NhanVienQuanLyXe@showFormAddDriver' )->name( 'showFormAddDriver' );
		Route::post( '/them-tai-xe', 'NhanVienQuanLyXe@postFormAddDriver' );
		Route::get('/cap-nhap-tai-xe/{codeDriver}', 'NhanVienQuanLyXe@updateDriver')->name('capNhapTaiXe');
		Route::post('/cap-nhap-tai-xe/{codeDriver}','NhanVienQuanLyXe@postUpdateDriver');
		Route::get('/xoa-tai-xe/{codeDriver}','NhanVienQuanLyXe@deleteDriver')->name('xoaTaiXe');


		Route::get( '/danh-sach-xe', 'NhanVienQuanLyXe@showListTaxi' )->name( 'listTaxi' );

		Route::get( '/phan-xe', 'NhanVienQuanLyXe@partitionTaxiForDriver' )->name( 'phanXe' );
		Route::post( '/phan-xe', 'NhanVienQuanLyXe@postPartitionTaxiForDriver' );
		Route::get( '/xoa-phan-xe/{licenceNumber}/{codeDriver}', 'NhanVienQuanLyXe@deletePartitionTaxiForDriver' )->name( 'xoaPhanXe' );

		Route::get( '/tai-xe-{codeDriver}', 'NhanVienQuanLyXe@showDetal' )->name( 'TaxiDetal' );

		Route::get( '/them-xe', 'NhanVienQuanLyXe@getAddInforNewTaxi' )->name( 'formNewTaxi' );
		Route::post( '/them-xe', 'NhanVienQuanLyXe@postAddInforNewTaxi' );
		Route::get('/sua-xe/{licenceNumber}', 'NhanVienQuanLyXe@updateTaxi')->name('capNhapTaxi');
		Route::post('/sua-xe/{licenceNumber}','NhanVienQuanLyXe@postUpdateTaxi');
		Route::get('/xoa-xe/{licenceNumber}', 'NhanVienQuanLyXe@deleteTaxi')->name('xoaTaxi');

		Route::post('/search', 'NhanVienQuanLyXe@search')->name('aSearch');
		Route::post('/danh-sach-tai-xe/driver-search', 'NhanVienQuanLyXe@driverSearch')->name('dSearch');
		Route::post('/danh-sach-xe/taxi-search', 'NhanVienQuanLyXe@taxiSearch')->name('tSearch');
	} );

	Route::group(['prefix' => 'quan-ly-lo-trinh'],function (){
		Route::get('/','QuanLyLoTrinh@index')->name('loTrinh');

		Route::get('/chuyen-di-{codeCustomer}', 'QuanLyLoTrinh@showDetailCustomer')->name('showCustomer');

		Route::get('/them-lo-trinh', 'QuanLyLoTrinh@addNewCustomer')->name('themLoTrinh');
		Route::post('/them-lo-trinh', 'QuanLyLoTrinh@postAddNewCustomer');

		Route::get('/sua-lo-trinh-{codeCustomer}', 'QuanLyLoTrinh@editCustomer')->name('suaLoTrinh');
		Route::post('/sua-lo-trinh-{codeCustomer}', 'QuanLyLoTrinh@postEditCustomer');

		Route::get('/xoa-lo-trinh-{codeCustomer}','QuanLyLoTrinh@deleteCustomer')->name('deleteCustomer');
	});

	Route::group(['prefix' => 'quan-ly-nhien-lieu'], function (){
		Route::get('/', 'QuanLyNhienLieu@index')->name('nhienLieu');

		Route::get('/them-xe-do-nhien-lieu', 'QuanLyNhienLieu@themNhienLieu')->name('nhapNhienLieu');
		Route::post('/them-xe-do-nhien-lieu', 'QuanLyNhienLieu@postThemNhienLieu');

		Route::get('/sua-phieu-{id}', 'QuanLyNhienLieu@suaPhieu')->name('suaPhieu');
		Route::post('/sua-phieu-{id}', 'QuanLyNhienLieu@postSuaPhieu');

		Route::get('/xoa-{id}', 'QuanLyNhienLieu@delete')->name('xoaPhieu');
	});

	Route::group(['prefix' => 'admin'], function (){
		Route::get('/', 'AdminController@index')->name('admin');

		Route::get('/them-user', 'AdminController@newUser')->name('adminNewUser');
		Route::post('/them-user', 'AdminController@postNewUser');

		Route::get('/chan-{id}', 'AdminController@denyUser')->name('chanUser');
		Route::get('/mo-{id}', 'AdminController@permitUser')->name('moUser');

		Route::get('/sua-{id}', 'AdminController@editUser')->name('adminEditUser');
		Route::post('/sua-{id}', 'AdminController@postEditUser');

		Route::post('/mat-khau-moi-{id}', 'AdminController@newPassword')->name('newPassword');

		Route::get('/xoa-{id}' ,'AdminController@deleteUser')->name('adminDelUser');
	});
} );