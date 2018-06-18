<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\EditAdmin;
use App\Http\Requests\PasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class AdminController extends Controller {
	//
	function index() {
		$user = User::where( 'level', '!=', '0' )->paginate(8);

		return view( 'admin.index' )->with( compact( 'user' ) );
	}

	function newUser() {
		return view( 'admin.detail' );
	}

	function postNewUser( AdminRequest $request ) {
		$input = $request->only( [
			'name',
			'email',
			'password',
			'username',
			'level'
		] );

		$user = User::where( 'username', $input['username'] )->first();

		if ( ! $user ) {
			User::create( [
				'name'     => $input['name'],
				'email'    => $input['email'],
				'password' => bcrypt( $input['password'] ),
				'username' => $input['username'],
				'active'   => 1,
				'level'    => $input['level']
			] );

			return redirect()->route( 'admin' );
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Tài khoản đã tồn tại' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}

	function denyUser( $id ) {
		if ( isAdmin() ) {
			$user         = User::find( $id );
			$user->active = 0;
			$user->save();
		}

		return redirect()->route( 'admin' );
	}

	function permitUser( $id ) {
		if ( isAdmin() ) {
			$user         = User::find( $id );
			$user->active = 1;
			$user->save();
		}

		return redirect()->route( 'admin' );
	}

	function editUser( $id ) {
		$user = User::find( $id );

		return view( 'admin.editUser' )->with( compact( 'user' ) );
	}

	function postEditUser( $id, EditAdmin $request ) {
		$input = $request->only( [
			'name',
			'email',
			'password',
			'username',
			'level'
		] );

		$user = User::find( $id );

		$user->name  = $input['name'];
		$user->email = $input['email'];
		$user->username = $input['username'];
		$user->level    = $input['level'];
		$user->save();

		return redirect()->route( 'admin' );
	}

	function newPassword( $id, PasswordRequest $request ) {
		$input = $request->only( [
			'password'
		] );
		$user = User::find( $id );
		$user->password = bcrypt( $input['password'] );
		$user->save();

		return redirect()->route( 'admin' );
	}
}
