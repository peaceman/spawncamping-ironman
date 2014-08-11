<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use ScIm\RecordLabel\RecordLabel;

class RecordLabelsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 15) as $index) {
			RecordLabel::create([
				'name' => $faker->company,
				'logo_filename' => $faker->unique()->uuid . '.png',
			]);
		}
	}

}
