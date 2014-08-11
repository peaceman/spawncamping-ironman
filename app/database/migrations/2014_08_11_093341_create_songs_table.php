<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSongsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('artist_id')->unsigned();
			$table->integer('genre_id')->unsigned();
			$table->integer('record_label_id')->unsigned();
			$table->datetime('promotion_start');
			$table->datetime('promotion_end');
			$table->string('cover_filename')->unique();
			$table->string('title');
			$table->text('description');
			$table->timestamps();

			$table->foreign('record_label_id')
				->references('id')->on('record_labels');

			$table->foreign('artist_id')
				->references('id')->on('artists');

			$table->foreign('genre_id')
				->references('id')->on('genres')
				->onDelete('restrict');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('songs');
	}

}
