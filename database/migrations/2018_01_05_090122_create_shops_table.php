<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_owner_id');
            $table->integer('category_id')->nullable();
            $table->integer('franchise_id')->nullable();
            $table->string('name');
            $table->string('key')->nullable();
            $table->boolean('activated')->default(false);
            $table->integer('province_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->integer('rating')->nullable();
            $table->string('website')->nullable();
            $table->string('open_hour')->nullable();
            $table->string('close_hour')->nullable();
            $table->string('logo')->default('logo.jpg');
            $table->string('slider_img_1')->default('slider-img-1.jpg');
            $table->string('slider_img_2')->default('slider-img-2.jpg');
            $table->string('slider_img_3')->default('slider-img-3.jpg');
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
        Schema::dropIfExists('shops');
    }
}
