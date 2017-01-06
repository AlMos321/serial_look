<?php

use Illuminate\Database\Seeder;

class EpizodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('epizodes')->insert([
            'name' => str_random(50),
            'description' => str_random(50),
            'number' => random_int(1,40),
            'images' => 'example.jpg',
            'producer' => str_random(10),
            'directed' => str_random(10),
            'running_time' => 100,
            'season_id' => 1,
            'serial_id' => 1,
            'date_start' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('epizodes')->insert([
            'name' => str_random(50),
            'description' => str_random(50),
            'number' => random_int(1,40),
            'images' => 'example.jpg',
            'producer' => str_random(10),
            'directed' => str_random(10),
            'running_time' => 100,
            'season_id' => 1,
            'serial_id' => 1,
            'date_start' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('epizodes')->insert([
            'name' => str_random(50),
            'description' => str_random(50),
            'number' => random_int(1,40),
            'images' => 'example.jpg',
            'producer' => str_random(10),
            'directed' => str_random(10),
            'running_time' => 100,
            'season_id' => 1,
            'serial_id' => 1,
            'date_start' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('epizodes')->insert([
            'name' => str_random(50),
            'description' => str_random(50),
            'number' => random_int(1,40),
            'images' => 'example.jpg',
            'producer' => str_random(10),
            'directed' => str_random(10),
            'running_time' => 100,
            'season_id' => 3,
            'serial_id' => 1,
            'date_start' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('epizodes')->insert([
            'name' => str_random(50),
            'description' => str_random(50),
            'number' => random_int(1,40),
            'images' => 'example.jpg',
            'producer' => str_random(10),
            'directed' => str_random(10),
            'running_time' => 100,
            'season_id' => 3,
            'serial_id' => 1,
            'date_start' => date(1),
            'slug' => str_random(10),
        ]);
    }
}
