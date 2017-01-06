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
        $this->call(UsersTableSeeder::class);
        $this->call(SerialsTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(EpizodesTableSeeder::class);
    }
}
