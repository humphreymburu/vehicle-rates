<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyFuelOperationCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operations', function (Blueprint $table) {
            $table->foreign('fuel_id')->references('id')->on('fuel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operations', function (Blueprint $table) {
            $table->foreign('fuel_id')->references('id')->on('fuel')->onDelete('cascade');
        });
    }
}
