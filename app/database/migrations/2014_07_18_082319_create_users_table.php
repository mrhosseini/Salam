<?php
//بسم الله الرحمن الرحیم

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('active')->default(false);
			$table->boolean('root')->default(false);
			$table->string('firstname');
			$table->string('lastname');
			$table->string('img')->nullable(); //user image
			$table->rememberToken();
			$table->timestamp('last_login')->nullable();
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
		Schema::drop('users');
	}

}
