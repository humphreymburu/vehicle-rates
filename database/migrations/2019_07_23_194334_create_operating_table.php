<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('tyre_cost', 10, 2)->nullable();
            $table->decimal('services_cost', 10, 2)->nullable();
            $table->decimal('repair_cost', 10, 2)->nullable();
            $table->integer('capacity_id')->unsigned();
            $table->integer('fuel_id')->unsigned()->nullable();
            $table->string('drive');
            $table->string('fuel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
