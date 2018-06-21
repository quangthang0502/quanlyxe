<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhienLieuRequest;
use App\KhuVuc;
use App\PhieuTiepNhienLieu;
use App\TaiXe;
use App\TaxiTaiXe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanLyNhienLieu extends Controller {
	//
	function index() {
		$nhienLieu = PhieuTiepNhienLieu::paginate( 8 );
		$result    = array();

		foreach ( $nhienLieu as $a ) {
			array_push( $result, [
				'id'             => $a->id,
				'time'           => $a->time,
				'numberGasoline' => $a->numberGasoline,
				'numberOil'      => $a->numberOil,
				'driverName'     => $a->getDriver()->firstName . ' ' . $a->getDriver()->lastName,
				'licenceNumber'  => $a->licenceNumber,
				'nameLocation'   => $a->getLocation()->nameLocation,
				'address'        => $a->getLocation()->addressInputGasoline,
			] );
		}

		return view( 'QuanLyNhienLieu.index' )->with( compact( 'result', 'nhienLieu' ) );
	}

	function themNhienLieu() {
		$driver = TaxiTaiXe::all();
		$result = array();

		foreach ( $driver as $a ) {
			array_push( $result, [
				'codeDriver'    => $a->codeDriver,
				'name'          => $a->getDriver()->firstName . ' ' . $a->getDriver()->lastName,
				'licenceNumber' => $a->licenceNumber
			] );
		}

		$location = KhuVuc::all();

		return view( 'QuanLyNhienLieu.addNewData' )->with( compact( 'result', 'location' ) );
	}

	function postThemNhienLieu( NhienLieuRequest $request ) {
		$input = $request->only( [
			'time',
			'numberGasoline',
			'numberOil',
			'codeDriver',
			'codeLocation',
		] );

		$taxiTaiXe = TaxiTaiXe::where( 'codeDriver', $input['codeDriver'] )->first();

		PhieuTiepNhienLieu::create( [
			'time'           => $input['time'],
			'numberGasoline' => $input['numberGasoline'],
			'numberOil'      => $input['numberOil'],
			'licenceNumber'  => $taxiTaiXe->licenceNumber,
			'codeDriver'     => $input['codeDriver'],
			'codeLocation'   => $input['codeLocation'],
		] );

		return redirect()->route( 'nhienLieu' );
	}

	function suaPhieu( $id ) {
		$phieu = PhieuTiepNhienLieu::find( $id );

		$driver = TaxiTaiXe::all();
		$result = array();
		foreach ( $driver as $a ) {
			array_push( $result, [
				'codeDriver'    => $a->codeDriver,
				'name'          => $a->getDriver()->firstName . ' ' . $a->getDriver()->lastName,
				'licenceNumber' => $a->licenceNumber
			] );
		}

		$location = KhuVuc::all();

		return view( 'QuanLyNhienLieu.editData' )->with( compact( 'phieu', 'location', 'result' ) );
	}

	function postSuaPhieu( $id, NhienLieuRequest $request ) {
		$phieu = PhieuTiepNhienLieu::find( $id );
		$input = $request->only( [
			'time',
			'numberGasoline',
			'numberOil',
			'codeDriver',
			'codeLocation',
		] );

		$taxiTaiXe = TaxiTaiXe::where( 'codeDriver', $input['codeDriver'] )->first();

		$phieu->time           = $input['time'];
		$phieu->numberGasoline = $input['numberGasoline'];
		$phieu->numberOil      = $input['numberOil'];
		$phieu->codeDriver     = $input['codeDriver'];
		$phieu->codeLocation   = $input['codeLocation'];
		$phieu->licenceNumber  = $taxiTaiXe->licenceNumber;

		$phieu->save();

		return redirect()->route( 'nhienLieu' );
	}

	function delete( $id ) {
		$phieu = PhieuTiepNhienLieu::find( $id );

		$phieu->delete();

		return redirect()->route( 'nhienLieu' );
	}

	function thongKe() {
		$phieu = PhieuTiepNhienLieu::select(DB::raw('sum(numberGasoline) as gas, sum(numberOil) as oil, codeDriver'))
		                           ->groupBy('codeDriver')->get();
		$totalGas = 0;
		$totalOil = 0;
		$result = array();
		foreach ($phieu as $a){
			$totalGas = $totalGas + $a->gas;
			$totalOil = $totalOil + $a->oil;
			$driver = TaiXe::where('codeDriver', $a->codeDriver)->first();
			array_push($result, [
				'name' => $driver->firstName . ' ' . $driver->lastName,
				'gas' => $a->gas,
				'oil' => $a->oil
			]);
		}
		return view('QuanLyNhienLieu.thongKe')->with(compact('result','totalGas','totalOil'));
	}
}
