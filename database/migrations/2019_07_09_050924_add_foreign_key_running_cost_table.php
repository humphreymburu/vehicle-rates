<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyRunningCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('running_cost', function (Blueprint $table) {
            $table->foreign('capacity_id')->references('id')->on('capacity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('running_cost', function (Blueprint $table) {
            $table->foreign('capacity_id')->references('id')->on('capacity')->onDelete('cascade');
        });
    }
}
