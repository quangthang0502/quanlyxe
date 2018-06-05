<?php

use Illuminate\Database\Seeder;

class QuanLyNhienLieu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('phieu_tiep_nhien_lieus')->insert([
		    'licenceNumber' => '11111',
		    'codeDriver' => '123456',
		    'time' => new DateTime('now'),
		    'numberGasoline' => 100,
		    'numberOil' => 10,
		    'codeLocation' => '01'
	    ]);
    }
}
