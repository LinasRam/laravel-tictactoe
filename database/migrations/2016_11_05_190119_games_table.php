<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user1_id');
            $table->integer('user2_id');
            $table->char('button1', 1)->nullable();
            $table->char('button2', 1)->nullable();
            $table->char('button3', 1)->nullable();
            $table->char('button4', 1)->nullable();
            $table->char('button5', 1)->nullable();
            $table->char('button6', 1)->nullable();
            $table->char('button7', 1)->nullable();
            $table->char('button8', 1)->nullable();
            $table->char('button9', 1)->nullable();
            $table->integer('turn_user_id');
            $table->integer('moves');
            $table->integer('winner_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('games');
    }
}
