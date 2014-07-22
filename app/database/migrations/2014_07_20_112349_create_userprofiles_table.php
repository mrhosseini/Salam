<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userprofiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->unique();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('img')->nullable(); //user image
			$table->string('phone')->nullable(); //user phone number
			$table->string('degree')->nullable(); //user last university degree
			$table->string('field')->nullable(); //field of study
			$table->string('university')->nullable();
			$table->string('live_in')->nullable(); //
			$table->string('workplace')->nullable(); // place of work
			$table->string('job')->nullable(); //job title
			$table->text('description')->nullable();
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userprofiles');
	}

}
