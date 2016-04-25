<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Ourgarage\StaticPages\Models\StaticPage;

class StaticPagesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            StaticPage::create([
                'status' => StaticPage::STATUS_ACTIVE,
                'title' => $faker->sentence,
                'content' => $faker->text,
                'slug' => $faker->word,
                'meta_keywords' => $faker->sentence,
                'meta_description' => $faker->sentence,
                'meta_title' => $faker->sentence
            ]);
        }
    }

}
