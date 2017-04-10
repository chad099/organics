<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableDealComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_comments', function(Blueprint $table){
          $table->increments('id');
          $table->integer('deal_id')->unsigned();
          $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade');
          $table->integer('user_id')->nullable();
          $table->string('email');
          $table->longtext('comment');
          $table->integer('is_approve')->default(0);
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
        Schema::drop('deal_comments');
    }
}
