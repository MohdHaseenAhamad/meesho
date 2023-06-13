<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name', 100);
            $table->string('pro_slug', 100)->nullable();
            $table->text('pro_desc');
            $table->string('pro_size', 100)->nullable();
            $table->string('pro_color', 100)->nullable();
            $table->integer('pro_price')->default(0);
            $table->integer('pro_stock')->default(0);
            $table->string('pro_img', 100)->nullable();
            $table->integer('pro_status')->default(0);
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
        Schema::dropIfExists('product');
    }
}
