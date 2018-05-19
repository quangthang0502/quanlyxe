<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('admins')->insert([
		    'name' => 'Nguyễn Sỹ Quang Thắng',
		    'email' => 'quangthang050296@gmail.com',
		    'username' => 'quangthang0502',
		    'password' => bcrypt('123456'),
		    'active' => 1
	    ]);
    }
}
