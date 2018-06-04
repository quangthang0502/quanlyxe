<?php

use Illuminate\Database\Seeder;

class QuanLyLoTrinh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('customers')->insert([
		    'codeCustomer' => '123456789',
		    'phoneNumber' => '12342353',
		    'number' => 1,
		    'codeLocation' => '05',
		    'licenceNumber' => '11111',
		    'codeDriver' => '123456',
	    ]);

    	DB::table('lo_trinhs')->insert([
		    'origin' => 'DOan ke thien',
			'destination' => 'Giap bat',
			'time' => 10,
			'numberOfKm' => 160,
			'mediumTime' => 16,
			'fee' => 1600000,
			'codeCustomer' => '123456789',
	    ]);

    }
}
