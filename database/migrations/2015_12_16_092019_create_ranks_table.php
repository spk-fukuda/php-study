<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first-name');
            $table->string('last-name');
            $table->string('country');
            $table->integer('rank')->unsigned();
            $table->integer('previous-rank')->unsigned()->nullable();
            $table->integer('points');
            $table->timestamps();

            $table->index('first-name');
            $table->index('last-name');
            $table->index('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rankings');
    }
}
