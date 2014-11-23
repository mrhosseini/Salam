<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilefieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profilefields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->enum('type', array('string', 'text', 'integer', 'double', 'boolean'));
			$table->string('display_name');
			$table->boolean('active')->default(true);
			$table->softDeletes();
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
		Schema::drop('profilefields');
	}

}
