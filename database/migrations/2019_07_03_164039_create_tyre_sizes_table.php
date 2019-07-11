<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyreSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyre_sizes', function (Blueprint $table) {
            $table->increments('tyre_sizes_id');
            $table->string('size')->nullable();
            $table->text('tyre_type')->nullable();
            $table->float('km_tyre')->nullable();
            $table->integer('tyre_no')->nullable();
            $table->integer('vehicles_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tyre_sizes');
    }
}
