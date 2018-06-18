<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Http\Requests\PhanXeRequest;
use App\Http\Requests\TaxiFormRequest;
use App\KhuVuc;
use App\TaiXe;
use App\Taxi;
use App\TaxiTaiXe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Request;

class NhanVienQuanLyXe extends Controller {
	//
	function index() {
		$taxiTaiXe = TaxiTaiXe::paginate(8);
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

		return view( 'QuanLyXe.showAllTaxi' )->with( compact( 'result','taxiTaiXe' ) );
	}

	function showListDriver() {
		$taiXe = TaiXe::paginate(8);

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
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Mã tài xế đã tồn tại' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}

	function showListTaxi() {
		$taxi = Taxi::paginate(8);

		return view( 'QuanLyXe.listTaxi' )->with( compact( 'taxi' ) );
	}

	function postAddInforNewTaxi( TaxiFormRequest $request ) {
		$input = $request->only( [
			'licenceNumber',
			'numberOfSeat',
			'model'
		] );

		$taxi = Taxi::where( 'licenceNumber', $input['licenceNumber'] )->first();

		if ( ! $taxi ) {

			Taxi::create( [
				'licenceNumber' => $input['licenceNumber'],
				'numberOfSeat'  => $input['numberOfSeat'],
				'model'         => $input['model'],
				'status'        => 0
			] );

			return redirect()->route( 'quanLyXe' );
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Biển số hoặc mã tài xế đã tồn tại' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}

	function partitionTaxiForDriver() {
		$taxi     = Taxi::where( 'status', '<', '2' )->get();
		$driver   = TaiXe::where( 'active', '=', '1' )->get();
		$location = KhuVuc::all();

		return view( 'QuanLyXe.phanXe' )->with( compact( 'taxi', 'driver', 'location' ) );
	}

	function postPartitionTaxiForDriver( PhanXeRequest $request ) {
		$input = $request->only( [
			'licenceNumber',
			'codeDriver',
			'codeLocation',
			'shift'
		] );

		$taxiTaiXe = TaxiTaiXe::where( [
			'licenceNumber' => $input['licenceNumber'],
			'shift'         => $input['shift'],
		] )->first();

		if ( ! $taxiTaiXe ) {
			TaxiTaiXe::create( [
				'licenceNumber' => $input['licenceNumber'],
				'codeDriver'    => $input['codeDriver'],
				'codeLocation'  => $input['codeLocation'],
				'shift'         => $input['shift'],
			] );

			$taxi = Taxi::where( 'licenceNumber', $input['licenceNumber'] )->first();

			$taxi->status = $taxi->status + 1;
			$taxi->save();

			$driver = TaiXe::where( 'codeDriver', $input['codeDriver'] )->first();
			$driver->active = false;
			$driver->save();

			return redirect()->route( 'quanLyXe' );
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Ca bị trùng' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}

	function deletePartitionTaxiForDriver($licenceNumber, $codeDriver){
		$taxiTaiXe = TaxiTaiXe::where( [
			'licenceNumber' => $licenceNumber,
			'codeDriver'         => $codeDriver,
		] )->first();

		$taxiTaiXe->delete();

		$taxi = Taxi::where( 'licenceNumber', $licenceNumber )->first();

		$taxi->status = $taxi->status - 1;
		$taxi->save();

		$driver = TaiXe::where( 'codeDriver', $codeDriver )->first();
		$driver->active = true;
		$driver->save();

		return redirect()->route( 'quanLyXe' );
	}

	function updateDriver($codeDriver){
		$driver = TaiXe::where( 'codeDriver', $codeDriver )->first();
		return view('QuanLyXe.updateDriver')->with(compact('driver'));
	}

	function postUpdateDriver($codeDriver, DriverRequest $request){
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

		$driver = TaiXe::where( 'codeDriver', $codeDriver )->first();
		$driver->codeDriver = $input['codeDriver'];
		$driver->firstName = $input['firstName'];
		$driver->lastName = $input['lastName'];
		$driver->address = $input['address'];
		$driver->phoneNumber = $input['phoneNumber'];
		$driver->cardNumber = $input['cardNumber'];
		$driver->birthday = $input['birthday'];
		$driver->danToc = $input['danToc'];
		$driver->relationship = $input['relationship'];
		$driver->religion = $input['religion'];
		$driver->educationalLevel = $input['educationalLevel'];
		$driver->email = $input['email'];
		$driver->gender = $input['gender'];
		$driver->story = $input['story'];
		$driver->description = $input['description'];

		$driver->save();

		return redirect()->back();
	}

	function deleteDriver($codeDriver){
		$taiXeTaxi = TaxiTaiXe::where('codeDriver', $codeDriver)->first();

		if (!$taiXeTaxi) {
			$driver = TaiXe::where( 'codeDriver', $codeDriver )->first();
			$driver->delete();
			return redirect()->route('listDriver');
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Tài xế đang được phân xe.' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}

	function updateTaxi($licenceNumber){
		$taxi = Taxi::where( 'licenceNumber', $licenceNumber )->first();
		return view('QuanLyXe.updateTaxi')->with(compact('taxi'));
	}

	function postUpdateTaxi($licenceNumber, TaxiFormRequest $request){
		$input = $request->only( [
			'licenceNumber',
			'numberOfSeat',
			'model'
		] );

		$taxi = Taxi::where( 'licenceNumber', $licenceNumber )->first();
		$taxi->licenceNumber = $input['licenceNumber'];
		$taxi->numberOfSeat = $input['numberOfSeat'];
		$taxi->setModel($input['model']);

		$taxi->save();

		return redirect()->back();
	}

	function deleteTaxi($licenceNumber){
		$taiXeTaxi = TaxiTaiXe::where('licenceNumber', $licenceNumber)->first();

		if (!$taiXeTaxi) {
			$taxi = TaiXe::where( 'licenceNumber', $licenceNumber )->first();
			$taxi->delete();
			return redirect()->route('listDriver');
		} else {
			$errors = new MessageBag( [ 'crateTaxiError' => 'Taxi đang được hoạt động.' ] );

			return redirect()->back()->withInput()->withErrors( $errors );
		}
	}
}