<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			 
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id')->unsigned();
			$table->integer('hotel_id')->unsigned();
			$table->foreign('hotel_id')->references('id')->on('hotel');
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('comments');
	}

}
