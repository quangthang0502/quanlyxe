<?php

use Illuminate\Database\Seeder;

class Test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Faker\Factory::create('vi_VN');
	    for ($i = 0; $i < 100;$i++){
		    DB::table('phieu_tiep_nhien_lieus')->insert([
			    'licenceNumber' => '11111',
			    'codeDriver' => '123456',
			    'time' => new DateTime('now'),
			    'numberGasoline' => $faker->numberBetween('1','10000'),
			    'numberOil' => $faker->numberBetween('1','10000'),
			    'codeLocation' => '01',
			    'created_at' => $faker->dateTime
		    ]);
	    }
    }
}
