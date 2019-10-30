<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Call START
            $table->bigInteger('dapros_id');
            $table->tinyInteger('call_status_id');
            $table->tinyInteger('call_status_detail_id');
            $table->tinyInteger('call_status_detail_reason_id');
            $table->dateTime('call_am_datetime')->nullable()->default(null); // appointment management / Manajemen Janji
            $table->dateTime('call_fu_datetime')->nullable()->default(null); // Follow Up
            $table->longText('call_information'); // Keterangan
            //$table->tinyInteger('call_attempts');
            $table->string('call_agent_username');
            $table->dateTime('call_consume_datetime')->useCurrent = true;
            // Call END
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
        Schema::dropIfExists('_calls');
    }
}
