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
			$table->string('img'); //user image
			$table->string('phone'); //user phone number
			$table->string('degree'); //user last university degree
			$table->string('field'); //field of study
			$table->string('university');
			$table->string('work'); // place of work
			$table->string('job'); //job title
			$table->text('description');
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
