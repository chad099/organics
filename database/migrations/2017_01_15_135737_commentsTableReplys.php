<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsTableReplys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comment_replys', function(Blueprint $table){
        $table->increments('id');
        $table->integer('comment_id')->unsigned();
        $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        $table->integer('user_id');
        $table->longtext('comment');
        $table->integer('moderate')->default(1);
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
        Schema::drop('comment_replys');
    }
}
