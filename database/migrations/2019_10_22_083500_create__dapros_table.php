<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_dapros', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Field Dapros Berdasarkan file Excel Start
            $table->string('BRAND');
            $table->string('ROW_NUM');
            $table->string('MSISDN_MASK');
            $table->string('MSISDN');
            $table->string('NAME_MASK');
            $table->string('CUSTOMER_SUBTYPE');
            $table->string('TOT_BILL_AMOUNT');
            $table->string('TOTAL_REVENUE');
            $table->string('DEVICE_TYPE');
            $table->string('VOL_BROADBAND');
            $table->string('VOL_BROADBAND_PACKAGE');
            $table->string('CI');
            $table->string('KABUPATEN');
            $table->string('LONGITUDE');
            $table->string('LATITUDE');
            $table->string('ODP1');
            $table->string('ODP2');
            $table->string('ODP3');
            // Field Dapros End

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
        Schema::dropIfExists('_dapros');
    }
}
