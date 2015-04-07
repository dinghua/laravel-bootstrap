<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileFields extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_fields', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('key');
            $table->string('display_name');
            $table->string('type');
            $table->string('default')->nullable();
            $table->boolean('required')->default(FALSE);
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
        Schema::drop('profile_fields');
    }

}
