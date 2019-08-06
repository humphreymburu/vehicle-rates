<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyOilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oil', function (Blueprint $table) {
            $table->integer('capacity_id')->unsigned();
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
        Schema::table('oil', function (Blueprint $table) {
            $table->foreign('capacity_id')->references('id')->on('capacity')->onDelete('cascade');
        });
    }
}
