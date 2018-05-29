<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxiFormRequest;
use App\KhuVuc;
use App\TaiXe;
use App\Taxi;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class NhanVienQuanLyXe extends Controller {
	//
	function index() {
		$taxi   = Taxi::all();
		$result = array();
		foreach ( $taxi as $a ) {
			array_push( $result, array(
				'licenceNumber' => $a->licenceNumber,
				'model'         => $a->tGetModel(),
				'name'          => $a->getDriver()->lastName,
				'khuVuc'        => $a->getLocation()->nameLocation
			) );

		}

		return view( 'QuanLyXe.showAllTaxi' )->with( compact( 'result' ) );
	}

	function showDetal( $licenceNumber ) {
		$taxi     = Taxi::where( 'licenceNumber', $licenceNumber )->first();
		$driver   = $taxi->getDriver();
		$location = $taxi->getLocation();

		return view( 'QuanLyXe.detal' )->with( compact( 'taxi', 'driver', 'location' ) );
	}

	function getAddInforNewTaxi() {
		$location = KhuVuc::all();

		return view( 'QuanLyXe.formNewTaxi' )->with( compact( 'location' ) );
	}

	function postAddInforNewTaxi( TaxiFormRequest $request ) {
		$input = $request->only( [
			'licenceNumber',
			'numberOfSeat',
			'model',
			'codeDriver',
			'codeLocation',
			'firstName',
			'lastName',
			'address',
			'phoneNumber'
		] );

		$taxi = Taxi::where('licenceNumber', $input['licenceNumber'])->first();
		$driver = TaiXe::where('codeDriver',$input['codeDriver'])->first();

		if(!$driver && !$taxi) {
			TaiXe::create([
				'codeDriver' => $input['codeDriver'],
				'firstName' => $input['firstName'],
				'lastName' => $input['lastName'],
				'address' => $input['address'],
				'phoneNumber' => $input['phoneNumber']
			]);

			Taxi::create([
				'licenceNumber' => $input['licenceNumber'],
				'numberOfSeat' => $input['numberOfSeat'],
				'model' => $input['model'],
				'codeLocation' => $input['codeLocation'],
				'codeDriver' => $input['codeDriver'],
				'status' => 1
			]);

			return redirect()->route('TaxiDetal', $input['licenceNumber']);
		}
		else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Biển số hoặc mã tài xế đã tồn tại' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}
}
