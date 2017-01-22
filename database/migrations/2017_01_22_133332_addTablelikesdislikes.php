<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablelikesdislikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_dislikes', function(Blueprint $table){
          $table->increments('id');
          $table->integer('post_id')->unsigned();
          $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
          $table->integer('likes')->default(0);
          $table->integer('dislikes')->default(0);
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
        Schema::drop('likes_dislikes');
    }
}
