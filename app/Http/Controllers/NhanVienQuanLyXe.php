<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxiFormRequest;
use App\KhuVuc;
use App\TaiXe;
use App\Taxi;
use App\TaxiTaiXe;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class NhanVienQuanLyXe extends Controller {
	//
	function index() {
		$taxiTaiXe = TaxiTaiXe::all();
		$result    = array();
		foreach ( $taxiTaiXe as $a ) {
			$taxi = $a->getTaxi();
			array_push( $result, array(
				'shift'         => $a->shift,
				'licenceNumber' => $taxi->licenceNumber,
				'model'         => $taxi->tGetModel(),
				'name'          => $a->getDriver()->lastName,
				'khuVuc'        => $a->getLocation()->nameLocation,
				'codeDriver'    => $a->getDriver()->codeDriver,
			) );

		}

		return view( 'QuanLyXe.showAllTaxi' )->with( compact( 'result' ) );
	}

	function showDetal( $codeDriver ) {
		$taxiTaiXe = TaxiTaiXe::where( 'codeDriver', $codeDriver )->first();
		$driver    = $taxiTaiXe->getDriver();
		$location  = $taxiTaiXe->getLocation();
		$taxi      = $taxiTaiXe->getTaxi();
		$shift     = $taxiTaiXe->shift;

		return view( 'QuanLyXe.detal' )->with( compact( 'taxi', 'driver', 'location', 'shift' ) );
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

		$taxi   = Taxi::where( 'licenceNumber', $input['licenceNumber'] )->first();
		$driver = TaiXe::where( 'codeDriver', $input['codeDriver'] )->first();

		if ( ! $driver && ! $taxi ) {
			TaiXe::create( [
				'codeDriver'  => $input['codeDriver'],
				'firstName'   => $input['firstName'],
				'lastName'    => $input['lastName'],
				'address'     => $input['address'],
				'phoneNumber' => $input['phoneNumber']
			] );

			Taxi::create( [
				'licenceNumber' => $input['licenceNumber'],
				'numberOfSeat'  => $input['numberOfSeat'],
				'model'         => $input['model'],
				'codeLocation'  => $input['codeLocation'],
				'codeDriver'    => $input['codeDriver'],
				'status'        => 1
			] );

			return redirect()->route( 'TaxiDetal', $input['licenceNumber'] );
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Biển số hoặc mã tài xế đã tồn tại' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}
}
