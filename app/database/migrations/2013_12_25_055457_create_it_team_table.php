<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('it_team', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('nip');
			$table->string('jabatan');
			$table->string('status');
			$table->string('email');
			$table->string('telp');
			$table->string('photo');
			$table->string('keterangan')->nullable();
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
		Schema::drop('it_team');
	}

}