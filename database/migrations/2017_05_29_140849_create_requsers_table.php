<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requsers', function (Blueprint $table) {
            $table->increments('id');
             $table->string('client_id');
            $table->date('date');
            $table->time('time');
            $table->string('event');
            $table->string('venue');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('contactnum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requsers');
    }
}
