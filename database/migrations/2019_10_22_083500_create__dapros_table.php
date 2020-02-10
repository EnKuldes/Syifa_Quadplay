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
            $table->string('BRAND')->nullable()->default(null);
            $table->string('ROW_NUM')->nullable()->default(null);
            $table->string('MSISDN_MASK')->nullable()->default(null);
            $table->string('MSISDN')->nullable()->default(null);
            $table->string('NAME_MASK')->nullable()->default(null);
            $table->string('CUSTOMER_SUBTYPE')->nullable()->default(null);
            $table->string('TOT_BILL_AMOUNT')->nullable()->default(null);
            $table->string('TOTAL_REVENUE')->nullable()->default(null);
            $table->string('DEVICE_TYPE')->nullable()->default(null);
            $table->string('VOL_BROADBAND')->nullable()->default(null);
            $table->string('VOL_BROADBAND_PACKAGE')->nullable()->default(null);
            $table->string('CI')->nullable()->default(null);
            $table->string('KABUPATEN')->nullable()->default(null);
            $table->string('LONGITUDE')->nullable()->default(null);
            $table->string('LATITUDE')->nullable()->default(null);
            $table->string('ODP1')->nullable()->default(null);
            $table->string('ODP2')->nullable()->default(null);
            $table->string('ODP3')->nullable()->default(null);
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
