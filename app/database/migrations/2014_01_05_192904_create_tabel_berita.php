<?php

use Illuminate\Database\Migrations\Migration;

class CreateTabelBerita extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('berita', function($table) {
			$table->increments('id');
			$table->string('judul');
			$table->string('alias');
			$table->string('gambar');
			$table->text('isi_berita');
			$table->integer('id_user');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('berita');
	}

}