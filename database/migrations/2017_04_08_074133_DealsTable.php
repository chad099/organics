<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->string('title');
          $table->longtext('message')->nullable();
          $table->integer('price');
          $table->string('price_type');
          $table->string('store_name');
          $table->string('link');
          $table->boolean('is_active')->default(0);
          $table->string('product_image')->nullable();
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
        Schema::drop('deals');
    }
}
