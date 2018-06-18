<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	    $this->call(UsersSeeder::class);
	    $this->call(KhuVuc::class);
	    $this->call(QuanLyXe::class);
	    $this->call(QuanLyLoTrinh::class);
	    $this->call(QuanLyNhienLieu::class);
	    $this->call(TaxiSeed::class);
    }
}
