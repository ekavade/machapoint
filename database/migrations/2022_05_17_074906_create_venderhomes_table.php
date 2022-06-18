<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenderhomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venderhomes', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->nullable();
            $table->text('content1');
            $table->text('content2');
            $table->text('tag');
            $table->text('our_mission');
            $table->text('our_vision');
            $table->text('why_us');
            $table->text('images');
            $table->text('image1');
            $table->text('image2');
            $table->text('image3');
            $table->text('content2images');
            $table->integer('num1')->default(0);
            $table->integer('num2')->default(0);
            $table->integer('num3')->default(0);
            $table->integer('num4')->default(0);
            $table->text('sign1')->default(0);
            $table->text('sign2')->default(0);
            $table->text('sign3')->default(0);
            $table->text('sign4')->default(0);
            $table->text('name1')->default(0);
            $table->text('name2')->default(0);
            $table->text('name3')->default(0);
            $table->text('name4')->default(0);
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
        Schema::dropIfExists('venderhomes');
    }
}