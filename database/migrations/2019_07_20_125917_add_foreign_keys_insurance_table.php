<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance', function (Blueprint $table) {
            $table->foreign('ins_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance', function (Blueprint $table) {
            $table->foreign('ins_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }
}
