<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableDealVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('deal_votes', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('deal_id');
          $table->boolean('up');
          $table->boolean('down');
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
        Schema::drop('deal_votes');
    }
}
