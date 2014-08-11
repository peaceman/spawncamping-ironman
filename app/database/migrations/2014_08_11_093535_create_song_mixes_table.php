<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSongMixesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('song_mixes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('song_id')->unsigned();
			$table->string('title');
			$table->integer('length_in_seconds')->unsigned();
			$table->string('filename')->unique();
			$table->timestamps();

			$table->foreign('song_id')
				->references('id')->on('songs');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('song_mixes');
	}

}
