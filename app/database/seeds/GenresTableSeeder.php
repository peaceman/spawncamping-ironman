<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use ScIm\Genre\Genre;

class GenresTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 10) as $index) {
			Genre::create([
				'name' => $faker->unique()->word,
			]);
		}
	}

}
