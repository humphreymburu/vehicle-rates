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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('purchase_cost', 8, 2)->nullable();
            $table->string('category')->nullable();
            $table->integer('annual_costs_id')->nullable();
            $table->integer('ccrange_id')->nullable();
            $table->integer('monthly_dues_id')->nullable();
            $table->integer('subscription_id')->nullable();
            $table->integer('type_sizes_id')->nullable();
            $table->year('year_manufacture')->nullable();
            $table->uuid('uuid')->nullable();
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
