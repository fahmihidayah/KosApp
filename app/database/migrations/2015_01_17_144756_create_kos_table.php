<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->double('nilai_bobot_harga');
			$table->double('nilai_bobot_jarak');
			$table->double('nilai_bobot_suasana');
			$table->double('nilai_jarak');
			$table->double('nilai_harga');
			$table->double('nilai_suasana');
			$table->double('nilai_kos');
			$table->double('nilai_akhir');
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
		Schema::drop('kos');
	}

}
