<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('payload')->nullable();
            $table->integer('status')->default(0);
            $table->string('desc');
            $table->string('tube')->nullable();
            $table->string('module')->nullable();
            $table->boolean('pause')->default(0);
            $table->boolean('resume')->default(0);
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
		Schema::drop('tasks');
	}

}
