<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id');
             $table->string('type', 32)->references('type')->on('plant_details');
             $table->timestamp('planted');
             $table->timestamp('transplanted')->nullable();
             $table->enum('propogation_type',['directsow','seedling','proptray']);
             $table->integer('quantity');
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
        Schema::dropIfExists('plants');
    }
}
