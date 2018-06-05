<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		return view('home');
	}
}
