<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProductName');
            $table->string('BrandName');
            $table->string('Price');
            $table->string('Image1');
            $table->string('Image2')->nullable();
            $table->string('Image3')->nullable();
            $table->string('Image4')->nullable();
            $table->string('Image5')->nullable();
            $table->string('Description');
            
            $table->string('Token')->unique();
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
        Schema::dropIfExists('products');
    }
}
