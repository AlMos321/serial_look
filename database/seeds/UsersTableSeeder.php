<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alexander',
            'email' => 'alexmoss09@gmail.com',
            'password' => bcrypt('111111'),
            'remember_token' => str_random(10),
            'is_admin' => '1',
        ]);
    }
}
