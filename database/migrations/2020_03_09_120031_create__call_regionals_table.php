<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallRegionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_call_regionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Call
            $table->bigInteger('dapros_id');
            $table->tinyInteger('call_status_id');
            $table->tinyInteger('call_status_detail_id');
            $table->tinyInteger('call_status_detail_reason_id');
            $table->dateTime('call_am_datetime')->nullable()->default(null); // appointment management / Manajemen Janji / Manja
            $table->dateTime('call_fu_datetime')->nullable()->default(null); // Follow Up
            // Call Input by Agent
            $table->longText('call_information'); // Keterangan
            $table->longText('call_input_pstn')->nullable(); // PSTN
            $table->string('call_input_dial_to')->nullable(); // DIAL TO
            $table->tinyInteger('call_regional')->nullable(); // Regional
            $table->tinyInteger('call_witel')->nullable(); // Witel
            $table->tinyInteger('call_paket')->nullable(); // Paket -> link ke Model Paket
            $table->string('call_input_nama_pelanggan')->nullable(); // NAMA PELANGGAN
            $table->string('call_email')->nullable(); // Email
            $table->longText('call_alamat_pemasangan')->nullable(); // Alamat Pemasangan
            $table->longText('call_input_k_kontak')->nullable(); // K KONTAK
            $table->enum('call_via_by',['-', 'Telpon', 'Whatsapp', 'Email'])->nullable()->default('-'); // Via By

            //$table->tinyInteger('call_attempts')->default('0');
            $table->string('call_agent_username');
            $table->dateTime('call_consume_datetime')->useCurrent = true;
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
        Schema::dropIfExists('_call_regionals');
    }
}
