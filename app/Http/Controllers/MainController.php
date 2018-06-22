<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPasswordRequest;
use App\LoTrinh;
use App\PhieuTiepNhienLieu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

	function thongKe(){
		return view('thongKe');
	}

	function sieuThongKe($id){
		if ($id == 0){
			$time = 'Tháng';
			$groupBy = 'extract(month from created_at)';
		}else {
			$time = 'Năm';
			$groupBy = 'extract(year from created_at)';
		}


		if (isQuanLyNhienLieu()){
			$phieu = PhieuTiepNhienLieu::select(DB::raw('sum(numberGasoline) as gas,count(numberOil) as cc, sum(numberOil) as oil, '.$groupBy.' as time'))
			                           ->groupBy(DB::raw($groupBy))->get();
			$totalGas = 0;
			$totalOil = 0;
			$totalCount = 0;
			$result = array();
			$title = array(
				$time,
				'Số lần đổ',
				'Số lượng dầu',
				'Số lượng xăng'
			);
			foreach ($phieu as $a){
				$totalGas = $totalGas + $a->gas;
				$totalOil = $totalOil + $a->oil;
				$totalCount = $totalCount + $a->cc;
				array_push($result, [
					'time' => $a->time,
					'cc' => $a->cc,
					'gas' => $a->gas.' Lít',
					'oil' => $a->oil.' Lít'
				]);
			}

			$total = array(
				$totalCount,
				$totalGas.' Lít',
				$totalOil.' Lít'
			);
		}

		if (isTrucBan()){
			$loTrinh = LoTrinh::select(DB::raw('sum(numberOfKm) as km, sum(fee) as f, count(fee) as cc, '.$groupBy.' as time'))
			                  ->groupBy(DB::raw($groupBy))->get();
			$totalKm = 0;
			$totalFee = 0;
			$totalCount = 0;
			$result = array();
			$title = array(
				$time,
				'Số chuyến',
				'Số KM',
				'Số tiền'
			);
			foreach ($loTrinh as $a){
				$totalKm = $totalKm + $a->km;
				$totalFee = $totalFee + $a->f;
				$totalCount = $totalCount + $a->cc;
				array_push($result, [
					$a->time,
					$a->cc,
					$a->km.' Km',
					$a->f.' Đồng'
				]);
			}
			$total = array(
				$totalCount,
				$totalKm.' Km',
				$totalFee.' Đồng'
			);
		}

		return view('sieuThongKe')->with(compact('result','total', 'time','title'));
	}
}
