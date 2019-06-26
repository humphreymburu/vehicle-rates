<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_costs', function (Blueprint $table) {
            $table->bigIncrements('annual_cost_id');
            $table->decimal('inspection_cost', 8, 2)->nullable();
            $table->decimal('licence_cost', 8, 2)->nullable();
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
        Schema::dropIfExists('annual_costs');
    }
}
