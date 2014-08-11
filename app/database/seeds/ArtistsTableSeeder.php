<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use ScIm\Artist\Artist;

class ArtistsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 50) as $index) {
			Artist::create([
				'name' => $faker->unique()->name,
			]);
		}
	}

}
