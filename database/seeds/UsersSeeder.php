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
		    'email' => 'dinhtrung1@gmail.com',
		    'username' => 'dinhtrung1',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 1
	    ]);
	    DB::table('users')->insert([
		    'name' => 'Quản lý xe',
		    'email' => 'dinhtrung2@gmail.com',
		    'username' => 'dinhtrung2',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 2
	    ]);
	    DB::table('users')->insert([
		    'name' => 'Quản lý lộ trình',
		    'email' => 'dinhtrung3@gmail.com',
		    'username' => 'dinhtrung3',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 3
	    ]);
	    DB::table('users')->insert([
		    'name' => 'Admin',
		    'email' => 'admin@gmail.com',
		    'username' => 'admin',
		    'password' => bcrypt('123456'),
		    'active' => 1,
		    'level' => 0
	    ]);
    }
}
