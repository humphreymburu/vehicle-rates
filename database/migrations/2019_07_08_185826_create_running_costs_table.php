<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunningCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_cost', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->decimal('fuel_cost', 8, 2)->nullable();
            $table->decimal('oil_cost', 8, 2)->nullable();
            $table->decimal('service_cost', 8, 2)->nullable();
            $table->decimal('repairs_cost', 8, 2)->nullable();
            $table->decimal('tyre_tube', 8, 2)->nullable();
            $table->integer('capacity_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('running_cost');
    }
}
