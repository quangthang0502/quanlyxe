<?php
/**
 * Created by PhpStorm.
 * User: Dinh Trung
 * Date: 5/20/2018
 * Time: 8:49 PM
 */

function isAdmin() {
	$user = session()->get( 'userData' );
	if ( $user->active == 1 && $user->level == 0 ) {
		return $user;
	} else {
		return false;
	}
}

function isQuanLyNhienLieu() {
	$user = session()->get( 'userData' );
	if ( $user->active == 1 && $user->level == 1 ) {
		return $user;
	} else {
		return false;
	}
}

function isTrucBan() {
	$user = session()->get( 'userData' );
	if ( $user->active == 1 && $user->level == 3 ) {
		return $user;
	} else {
		return false;
	}
}

function isQuanLyXe() {
	$user = session()->get( 'userData' );
	if ( $user->active == 1 && $user->level == 2 ) {
		return $user;
	} else {
		return false;
	}
}

function getUser(){
	return session()->get( 'userData' );
}