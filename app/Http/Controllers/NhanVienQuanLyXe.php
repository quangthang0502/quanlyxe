<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Http\Requests\TaxiFormRequest;
use App\KhuVuc;
use App\TaiXe;
use App\Taxi;
use App\TaxiTaiXe;
use Illuminate\Support\MessageBag;

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

	function showListDriver() {
		$taiXe = TaiXe::all();

		return view( 'QuanLyXe.listDriver' )->with( compact( 'taiXe' ) );
	}

	function showFormAddDriver() {
		return view( 'QuanLyXe.showFormAddDriver' );
	}

	function showDetal( $codeDriver ) {
		$taxiTaiXe = TaxiTaiXe::where( 'codeDriver', $codeDriver )->first();
		if ( $taxiTaiXe ) {
			$driver   = $taxiTaiXe->getDriver();
			$location = $taxiTaiXe->getLocation();
			$taxi     = $taxiTaiXe->getTaxi();
			$shift    = $taxiTaiXe->shift;
		} else {
			$driver   = TaiXe::where( 'codeDriver', $codeDriver )->first();
			$location = $taxi = $shift = '';
		}


		return view( 'QuanLyXe.detal' )->with( compact( 'taxi', 'driver', 'location', 'shift' ) );
	}

	function getAddInforNewTaxi() {
		$location = KhuVuc::all();

		return view( 'QuanLyXe.formNewTaxi' )->with( compact( 'location' ) );
	}

	function postFormAddDriver( DriverRequest $request ) {
		$input = $request->only( [
			'codeDriver',
			'firstName',
			'lastName',
			'address',
			'phoneNumber',
			'cardNumber',
			'birthday',
			'danToc',
			'relationship',
			'religion',
			'educationalLevel',
			'email',
			'gender',
			'story',
			'description',
		] );

		$driver = TaiXe::where( 'codeDriver', $input['codeDriver'] )->first();

		if ( ! $driver ) {
			TaiXe::create( [
				'codeDriver'       => $input['codeDriver'],
				'firstName'        => $input['firstName'],
				'lastName'         => $input['lastName'],
				'address'          => $input['address'],
				'phoneNumber'      => $input['phoneNumber'],
				'cardNumber'       => $input['cardNumber'],
				'birthday'         => $input['birthday'],
				'danToc'           => $input['danToc'],
				'relationship'     => $input['relationship'],
				'religion'         => $input['religion'],
				'educationalLevel' => $input['educationalLevel'],
				'email'            => $input['email'],
				'gender'           => $input['gender'],
				'story'            => $input['story'],
				'description'      => $input['description'],
				'active'           => true
			] );

			return redirect()->route( 'TaxiDetal', $input['codeDriver'] );
		}

		return redirect()->route( 'quanLyXe' );
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
