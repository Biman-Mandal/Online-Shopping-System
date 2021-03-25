<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CustomerName');
            $table->string('CustomerPhone')->nullable();
            $table->string('CustomerPhoneToken')->nullable();
            $table->string('PhoneActive')->nullable()->default(null);

            $table->string('CustomerEmail')->unique()->nullable();
            $table->string('CustomerEmailToken')->nullable();
            $table->string('CustomerEmailActive')->nullable()->default(null);
            $table->string('CustomerPass');

        
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
        Schema::dropIfExists('profiles');
    }
}
