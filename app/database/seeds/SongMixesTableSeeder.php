<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use ScIm\SongMix\SongMix;

class SongMixesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
		$songIds = \ScIm\Song\Song::lists('id');

		foreach (range(1, 800) as $index) {
			SongMix::create([
				'song_id' => $faker->randomElement($songIds),
				'title' => $faker->sentence(3),
				'length_in_seconds' => $faker->numberBetween(90, 300),
				'filename' => $faker->unique()->uuid . '.mp3',
			]);
		}
	}

}
