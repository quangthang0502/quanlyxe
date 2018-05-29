<?php

namespace App\Http\Controllers;

use App\Taxi;
use Illuminate\Http\Request;

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

	}

	function postAddInforNewTaxi() {

	}
}
