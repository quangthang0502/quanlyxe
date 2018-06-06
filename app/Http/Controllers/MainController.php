<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class MainController extends Controller
{
    //
	function index(){
		if(isQuanLyXe()){
			return redirect()->route('quanLyXe');
		}
		if (isTrucBan()){
			return redirect()->route('loTrinh');
		}
		if (isQuanLyNhienLieu()){
			return redirect()->route('nhienLieu');
		}
		if(isAdmin()){
			return redirect()->route('admin');
		}
		return view('home');
	}

	function changePassword(){
		return view('changePassword');
	}

	function postChangePassword(NewPasswordRequest $request){
		$input = $request->only([
			'id',
			'old_password',
			'password'
		]);

		$user = User::find($input['id']);

		if (Hash::check($input['old_password'], $user->password)){
			$user->password = bcrypt($input['password']);
			$user->save();

			$message = "Đổi mật khẩu thành công.";
			return view('thanhCong')->with(compact('message'));
		}else {
			$errors = new MessageBag( [ 'loginError' => 'Mật khẩu không đúng' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}
}
