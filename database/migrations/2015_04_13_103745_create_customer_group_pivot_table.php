<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerGroupPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_group', function(Blueprint $table)
		{
			$table->integer('customer_id')->unsigned()->index();
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->integer('group_id')->unsigned()->index();
			$table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_group');
	}

}
