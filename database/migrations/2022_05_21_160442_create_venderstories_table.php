<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenderstoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venderstories', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->nullable();
            $table->text('quote');
            $table->text('w1');
            $table->text('w2');
            $table->text('w3');
            $table->text('content1');
            $table->text('img1');
            $table->text('content2');
            $table->text('img2');
            $table->text('content3');
            $table->text('meeting');
            $table->text('execute');
            $table->text('delivery');
            $table->text('meet');
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
        Schema::dropIfExists('venderstories');
    }
}
