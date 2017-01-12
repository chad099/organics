<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('post_id')->unsigned();
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        $table->longtext('comment');
        $table->boolean('is_visible')->default(1);
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
