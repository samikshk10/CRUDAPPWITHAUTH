<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('vehicletype');
            $table->string('vehiclebrand');
            $table->string('vehiclemodel');
            $table->string('email');
            $table->foreign('email')->references('email')->on('cruds')->onDelete('cascade');
            $table->integer('rentnoofdays');
            $table->integer('totalrent');
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
        Schema::dropIfExists('cars');
    }
};
