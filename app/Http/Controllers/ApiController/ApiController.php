<?php

namespace App\Http\Controllers\ApiController;

use App\TaiXe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ApiController extends Controller {
//	public function __construct() {
//		header( 'Access-Control-Allow-Origin', '*' );
//		header( 'Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS' );
//		header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
//		header('content-type','application/json');
//	}

	//
	function getDriver() {
		$diver = TaiXe::all();

		return response()->json( $diver, 200 );
	}

	public function postLogin( Request $request ) {
//		$input = [
//			'username' => $request['username'],
//			'password' => $request['password']
//		];
//
//		$user = User::where( [
//			'username' => $input['username']
//		] )->first();
//
//		if ( $user && Hash::check( $input['password'], $user->password ) ) {
//			if ($user->active == 1){
//				return response()->json($user,200);
//			}else {
//				$errors = new MessageBag( [ 'loginError' => 'Tài khoản bị khóa vui lòng liên hệ admin' ] );
//
//				return response()->json($errors,200);
//			}
//
//		} else {
//			$errors = new MessageBag( [ 'loginError' => 'Tài khoản hoặc mật khẩu không đúng' ] );
//
//			return response()->json($errors,200);
//		}
		$data = $request->json();

		$header = [
			'Access-Control-Allow-Origin'      => $_SERVER['HTTP_ORIGIN'],
			'Access-Control-Allow-Methods'     => 'GET, POST, PUT, DELETE, OPTIONS',
			'Access-Control-Allow-Credentials' => 'true'
		];

		return response()->json( $data, 200 )->withHeaders( $header );
	}
}
