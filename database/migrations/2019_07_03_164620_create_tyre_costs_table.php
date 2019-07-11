<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyreCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyre_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tyre_sizes_id')->unsigned();
            $table->decimal('tyre_cost', 8, 2)->nullable();
            $table->foreign('tyre_sizes_id')->references('tyre_sizes_id')->on('tyre_sizes');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tyre_costs', function (Blueprint $table) {
            $table->foreign('tyre_sizes_id')->references('tyre_sizes_id')->on('tyre_sizes')->onDelete('cascade');
        });
    }
}
