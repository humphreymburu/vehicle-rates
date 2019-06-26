<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations_costs', function (Blueprint $table) {
            $table->bigIncrements('operations_cost_id');
            $table->decimal('oil_cost', 8, 2)->nullable();
            $table->decimal('fuel_cost', 8, 2)->nullable();
            $table->decimal('service_cost', 8, 2)->nullable();
            $table->decimal('repairs_cost', 8, 2)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('operations_costs');
    }
}
