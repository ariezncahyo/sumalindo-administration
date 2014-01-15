<?php

use Illuminate\Database\Migrations\Migration;

class CreateListEmail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('list_email', function($table) {
			$table->increments('id');
			$table->string('nama');
			$table->string('divisi');
			$table->string('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('list_email');
	}

}