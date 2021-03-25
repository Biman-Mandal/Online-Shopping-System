<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuyProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyProducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProfileID');
            $table->string('ProductID1');
            $table->string('ProductID2')->nullable();
            $table->string('ProductID3')->nullable();
            $table->string('ProductID4')->nullable();
            $table->string('ProductID5')->nullable();
            $table->string('PaymentType');
            $table->string('TotalAmount');
            $table->string('BuyProductToken');
            $table->string('PaymentDocument')->nullable();
            $table->string('FinalPayment')->nullable();
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
        Schema::dropIfExists('buyProducts');
    }
}
