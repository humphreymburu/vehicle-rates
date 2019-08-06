<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->decimal('purchase_cost', 10, 2)->nullable();
            $table->string('category')->nullable();
            $table->year('year_manufacture')->nullable();
            $table->decimal('fixed_cost', 10, 2)->nullable();
            $table->decimal('operating_cost', 10, 2)->nullable();
            $table->uuid('uuid')->nullable();
            $table->decimal('parking_fee', 10, 2)->default(93500);
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
