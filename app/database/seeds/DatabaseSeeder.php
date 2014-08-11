<?php

class DatabaseSeeder extends Seeder
{
	/**
	 * @var array
	 */
	protected $tables = [
		'artists', 'record_labels', 'genres', 'songs', 'song_mixes',
	];

	/**
	 * @var array
	 */
	protected $seeders = [
		'ArtistsTableSeeder',
		'RecordLabelsTableSeeder',
		'GenresTableSeeder',
		'SongsTableSeeder',
		'SongMixesTableSeeder',
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabase();

		foreach ($this->seeders as $seeder) {
			$this->call($seeder);
		}
	}

	protected function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this->tables as $table) {
			DB::table($table)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
