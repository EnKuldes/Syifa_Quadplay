<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaprosStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_dapros_statistics', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Column in table START
            // Call
            $table->bigInteger('dapros_id');
            $table->tinyInteger('call_status_id');
            $table->tinyInteger('call_status_detail_id');
            $table->tinyInteger('call_status_detail_reason_id');
            $table->dateTime('call_am_datetime')->nullable(); // appointment management / Manajemen Janji
            $table->dateTime('call_fu_datetime')->nullable(); // Follow Up
            $table->longText('call_information'); // Keterangan
            $table->tinyInteger('call_attempts')->default('0');
            $table->string('call_agent_username');
            $table->dateTime('call_consume_datetime');
            // Tapping
            $table->tinyInteger('tapping_status_id')->nullable();
            $table->longText('tapping_information')->nullable();
            $table->string('tapping_agent_username')->nullable();
            $table->dateTime('tapping_consume_datetime')->nullable();
            // Column in table END
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
        Schema::dropIfExists('_dapros_statistics');
    }
}
