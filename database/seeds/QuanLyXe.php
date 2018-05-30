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
		    'cardNumber' => '123456789',
		    'birthday' => new DateTime('now'),
		    'danToc' => 'Kinh',
		    'relationship' => 'single',
		    'religion' => 'Ko',
		    'educationalLevel' => 'Dai hoc',
		    'email' => 'trung@gmail.com',
		    'gender' => 1,
		    'story' => '',
		    'description' => ''
	    ] );

	    DB::table( 'taxis' )->insert( [
		    'licenceNumber' => '11111',
		    'model'        => 'LX',
		    'numberOfSeat'     => '4',
		    'status'     => 1,
	    ] );

	    DB::table('taxi_tai_xes')->insert([
	    	'licenceNumber' => '11111',
		    'codeDriver' => '123456',
		    'codeLocation' => '05',
		    'shift' => 1
	    ]);
    }
}
