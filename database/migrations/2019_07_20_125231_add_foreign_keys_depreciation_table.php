<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysDepreciationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depreciation', function (Blueprint $table) {
            $table->foreign('dep_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depreciation', function (Blueprint $table) {
            $table->foreign('dep_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }
}
