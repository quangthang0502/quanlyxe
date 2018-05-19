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
	    DB::table('users')->insert([
		    'name' => 'Quản lý nhiên liệu',
		    'email' => 'quangthang0502961@gmail.com',
		    'username' => 'quangthang1',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 1
	    ]);
	    DB::table('users')->insert([
		    'name' => 'Quản lý xe',
		    'email' => 'quangthang0502962@gmail.com',
		    'username' => 'quangthang2',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 2
	    ]);
	    DB::table('users')->insert([
		    'name' => 'Quản lý lộ trình',
		    'email' => 'quangthang0502963@gmail.com',
		    'username' => 'quangthang3',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 3
	    ]);
    }
}
