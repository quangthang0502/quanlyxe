<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'guest' )->except( 'logout' );
	}

	public function getLogin() {
		return view( 'login' );
	}

	public function postLogin( UserRequest $request ) {
		$input = $request->only( [ 'username', 'password' ] );

		$user = User::where( [
			'username' => $input['username']
		] )->first();

		if ( $user && Hash::check( $input['password'], $user->password ) ) {
			if ($user->active == 1){
				Auth::login( $user, true );
				$request->session()->put( 'userData', $user );

				return redirect()->route( 'home' );
			}else {
				$errors = new MessageBag( [ 'loginError' => 'Tài khoản bị khóa vui lòng liên hệ admin' ] );

				return redirect()->back()->withInput()->withErrors( $errors );
			}

		} else {
			$errors = new MessageBag( [ 'loginError' => 'Tài khoản hoặc mật khẩu không đúng' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}

	public function logOut( Request $request ) {
		Auth::logout();
		$request->session()->forget( 'userData' );

		return redirect()->back();
	}
}
