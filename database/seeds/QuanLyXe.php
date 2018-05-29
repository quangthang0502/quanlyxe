<?php

use Illuminate\Database\Seeder;

class QuanLyXe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table( 'tai_xes' )->insert( [
		    'codeDriver' => '123456',
		    'firstName'        => 'Dinh Sy',
		    'lastName'     => 'Trung',
		    'address'     => 'Khu đô thị Linh Đàm',
		    'phoneNumber' => '12345678',
	    ] );

	    DB::table( 'taxis' )->insert( [
		    'licenceNumber' => '11111',
		    'model'        => 'LX',
		    'numberOfSeat'     => '4',
		    'status'     => 1,
		    'codeDriver' => '123456',
		    'codeLocation' => '01'
	    ] );
    }
}
