<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            'serial_id' => 1,
            'number' => random_int(1,40),
            'count_epizdes' => random_int(1,40),
            'country' => str_random(10),
            'description' => str_random(50),
            'date_start' => date(1),
            'date_end' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('seasons')->insert([
            'serial_id' => 1,
            'number' => random_int(1,40),
            'count_epizdes' => random_int(1,40),
            'country' => str_random(10),
            'description' => str_random(50),
            'date_start' => date(1),
            'date_end' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('seasons')->insert([
            'serial_id' => 1,
            'number' => random_int(1,40),
            'count_epizdes' => random_int(1,40),
            'country' => str_random(10),
            'description' => str_random(50),
            'date_start' => date(1),
            'date_end' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('seasons')->insert([
            'serial_id' => 1,
            'number' => random_int(1,40),
            'count_epizdes' => random_int(1,40),
            'country' => str_random(10),
            'description' => str_random(50),
            'date_start' => date(1),
            'date_end' => date(1),
            'slug' => str_random(10),
        ]);

        DB::table('seasons')->insert([
            'serial_id' => 1,
            'number' => random_int(1,40),
            'count_epizdes' => random_int(1,40),
            'country' => str_random(10),
            'description' => str_random(50),
            'date_start' => date(1),
            'date_end' => date(1),
            'slug' => str_random(10),
        ]);
    }
}
