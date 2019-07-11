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
            $table->decimal('purchase_cost', 8, 2)->nullable();
            $table->string('category')->nullable();
            $table->year('year_manufacture')->nullable();
            $table->decimal('fixed_cost')->nullable();
            $table->decimal('operating_cost')->nullable();
            $table->integer('sub_id')->unsigned();
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
