<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use ScIm\Song\Song;

class SongsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
		$artistIds = \ScIm\Artist\Artist::lists('id');
		$genreIds = \ScIm\Genre\Genre::lists('id');
		$recordLabelIds = \ScIm\RecordLabel\RecordLabel::lists('id');

		foreach (range(1, 200) as $index) {
			$promotionEnd = $faker->dateTimeBetween('-3 months', '+1 year');

			Song::create([
				'artist_id' => $faker->randomElement($artistIds),
				'genre_id' => $faker->randomElement($genreIds),
				'record_label_id' => $faker->randomElement($recordLabelIds),
				'promotion_start' => $faker->dateTimeThisYear($promotionEnd),
				'promotion_end' => $promotionEnd,
				'cover_filename' => $faker->unique()->uuid . '.png',
				'title' => $faker->sentence(4),
				'description' => $faker->text(),
			]);
		}
	}

}
