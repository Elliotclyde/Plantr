<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_details', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32);
            $table->integer('daystoharveststart');
            $table->integer('daystoharvestend');
            $table->integer('seedlingage');
            $table->tinyInteger('seasonstart');
            $table->tinyInteger('seasonend');
            $table->json('tips')->nullable();
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
        Schema::dropIfExists('plant_details');
    }
}
