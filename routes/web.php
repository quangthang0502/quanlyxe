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

	Route::get( '/danh-sach-tai-xe', 'NhanVienQuanLyXe@showListDriver' )->name( 'listDriver' );
	Route::get( '/them-tai-xe', 'NhanVienQuanLyXe@showFormAddDriver' )->name( 'showFormAddDriver' );
	Route::post( '/them-tai-xe', 'NhanVienQuanLyXe@postFormAddDriver' );
	Route::get('/cap-nhap-tai-xe/{codeDriver}', 'NhanVienQuanLyXe@updateDriver')->name('capNhapTaiXe');
	Route::post('/cap-nhap-tai-xe/{codeDriver}','NhanVienQuanLyXe@postUpdateDriver');
	Route::get('/xoa-tai-xe/{codeDriver}','NhanVienQuanLyXe@deleteDriver')->name('xoaTaiXe');


	Route::get( '/danh-sach-xe', 'NhanVienQuanLyXe@showListTaxi' )->name( 'listTaxi' );

	Route::get( '/tai-xe-{codeDriver}', 'NhanVienQuanLyXe@showDetal' )->name( 'TaxiDetal' );

	Route::get( '/them-xe', 'NhanVienQuanLyXe@getAddInforNewTaxi' )->name( 'formNewTaxi' );
	Route::post( '/them-xe', 'NhanVienQuanLyXe@postAddInforNewTaxi' );
	Route::get('/sua-xe/{licenceNumber}', 'NhanVienQuanLyXe@updateTaxi')->name('capNhapTaxi');
	Route::post('/sua-xe/{licenceNumber}','NhanVienQuanLyXe@postUpdateTaxi');
	Route::get('/xoa-xe/{licenceNumber}', 'NhanVienQuanLyXe@deleteTaxi')->name('xoaTaxi');

	Route::get('/danh-sach-tai-xe/driver-search', 'NhanVienQuanLyXe@driverSearch')->name('dSearch');
	Route::get('/danh-sach-xe/taxi-search', 'NhanVienQuanLyXe@getTaxiSearch')->name('tSearch');

	Route::get('/thong-ke', 'MainController@thongKe')->name('tongHopThongKe');
	Route::get('/sieu-thong-ke-{id}','MainController@sieuThongKe')->name('sieuThongKe');


	Route::group( [ 'prefix' => 'quan-ly-xe' ], function () {
		Route::get( '/', 'NhanVienQuanLyXe@index' )->name( 'quanLyXe' );

		Route::get('/search', 'NhanVienQuanLyXe@search')->name('aSearch');


		Route::get( '/phan-xe', 'NhanVienQuanLyXe@partitionTaxiForDriver' )->name( 'phanXe' );
		Route::post( '/phan-xe', 'NhanVienQuanLyXe@postPartitionTaxiForDriver' );
		Route::get( '/xoa-phan-xe/{licenceNumber}/{codeDriver}', 'NhanVienQuanLyXe@deletePartitionTaxiForDriver' )->name( 'xoaPhanXe' );

		Route::get('/sua-chua', 'NhanVienQuanLyXe@suaChuaIndex')->name('suaChua');
		Route::get('/them-sua-chua', 'NhanVienQuanLyXe@themSuaChua')->name('themSuaChua');
		Route::post('/them-sua-chua', 'NhanVienQuanLyXe@postThemSuaChua');

		Route::get('/them-sua-chua-{id}', 'NhanVienQuanLyXe@editSuaChua')->name('editSuaChua');
		Route::post('/them-sua-chua-{id}', 'NhanVienQuanLyXe@posteditSuaChua');

		Route::get('/xoa-sua-chua-{id}', 'NhanVienQuanLyXe@xoaSuaChua')->name('xoaSuaChua');
		Route::get('/searh-sua-chua','NhanVienQuanLyXe@searhSuaChua')->name('searSuaChua');
	} );

	Route::group(['prefix' => 'quan-ly-lo-trinh'],function (){
		Route::get('/','QuanLyLoTrinh@index')->name('loTrinh');

		Route::get('/chuyen-di-{codeCustomer}', 'QuanLyLoTrinh@showDetailCustomer')->name('showCustomer');

		Route::get('/them-lo-trinh', 'QuanLyLoTrinh@addNewCustomer')->name('themLoTrinh');
		Route::post('/them-lo-trinh', 'QuanLyLoTrinh@postAddNewCustomer');

		Route::get('/sua-lo-trinh-{codeCustomer}', 'QuanLyLoTrinh@editCustomer')->name('suaLoTrinh');
		Route::post('/sua-lo-trinh-{codeCustomer}', 'QuanLyLoTrinh@postEditCustomer');

		Route::get('/xoa-lo-trinh-{codeCustomer}','QuanLyLoTrinh@deleteCustomer')->name('deleteCustomer');

		Route::get('/thong-ke', 'QuanLyLoTrinh@findByDriver')->name('ThongKeLotrinh');
		Route::post('/thong-ke', 'QuanLyLoTrinh@postFindByDriver');
	});

	Route::group(['prefix' => 'quan-ly-nhien-lieu'], function (){
		Route::get('/', 'QuanLyNhienLieu@index')->name('nhienLieu');

		Route::get('/them-xe-do-nhien-lieu', 'QuanLyNhienLieu@themNhienLieu')->name('nhapNhienLieu');
		Route::post('/them-xe-do-nhien-lieu', 'QuanLyNhienLieu@postThemNhienLieu');

		Route::get('/sua-phieu-{id}', 'QuanLyNhienLieu@suaPhieu')->name('suaPhieu');
		Route::post('/sua-phieu-{id}', 'QuanLyNhienLieu@postSuaPhieu');

		Route::get('/xoa-{id}', 'QuanLyNhienLieu@delete')->name('xoaPhieu');

		Route::get('/thong-ke', 'QuanLyNhienLieu@thongKe')->name('ThongKeNhienLieu');
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