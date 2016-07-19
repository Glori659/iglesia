<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        	['first_name' => 'admin', 'last_name' => 'blockscore','type'=>"ADMIN",'status'=>1, 'email' => 'admin@admin.net','password' => \Hash::make('admin')],
		]);
    }
}
