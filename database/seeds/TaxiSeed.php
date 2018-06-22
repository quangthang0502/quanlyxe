<?php

use App\TaiXe;
use App\Taxi;
use Illuminate\Database\Seeder;

class TaxiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$model = array(
    		['Hyundai Elantra', 5],
		    ['Toyota Vios', 5],
		    ['Toyota Innova', 7],
		    ['Kia Moring', 4],
		    ['Hyundai i10', 4],
	    );
    	$faker = Faker\Factory::create('vi_VN');
        for($i = 0; $i < 100; $i ++){
        	$a = rand(0,4);
	        Taxi::create( [
		        'licenceNumber' => $faker->numberBetween('1000000','9999999'),
		        'numberOfSeat'  => $model[$a][1],
		        'model'         => $model[$a][0],
		        'status'        => 0,
		        'frameNumber' => $faker->numberBetween('1000000','100000000'),
		        'machineNumber' => $faker->numberBetween('1000000','100000000'),
		        'created_at' => $faker->dateTimeThisYear
	        ] );
        }

        for ($i = 0; $i < 100; $i++){
	        TaiXe::create( [
		        'codeDriver'       => $faker->numberBetween('1000000','9999999'),
		        'firstName'        => $faker->firstName,
		        'lastName'         => $faker->lastName,
		        'address'          => $faker->address,
		        'phoneNumber'      => $faker->phoneNumber,
		        'cardNumber'       => '12345678',
		        'birthday'         => new DateTime('now'),
		        'danToc'           => 'Kinh',
		        'relationship'     => 'doc than',
		        'religion'         => 'Không',
		        'educationalLevel' => "đại học",
		        'email'            => $faker->unique()->email,
		        'gender'           => $faker->boolean,
		        'story'            => '',
		        'description'      => '',
		        'active'           => true
	        ] );
        }
    }
}
