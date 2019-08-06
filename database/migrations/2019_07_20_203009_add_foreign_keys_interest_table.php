<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interest', function (Blueprint $table) {
            $table->foreign('interest_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interest', function (Blueprint $table) {
            $table->foreign('interest_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }
}
