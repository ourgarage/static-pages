<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class StaticPagesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,5) as $index) {
            DB::table('static_pages')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
