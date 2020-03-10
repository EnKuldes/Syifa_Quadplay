<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaprosRegionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_dapros_regionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pots')->nullable()->default(null);
            $table->string('witel')->nullable()->default(null);
            $table->string('nama_customer')->nullable()->default(null);
            $table->string('klasifikasi_revenue')->nullable()->default(null);
            $table->string('prioritas_1')->nullable()->default(null);
            $table->string('prioritas_2')->nullable()->default(null);
            $table->string('prioritas_3')->nullable()->default(null);
            $table->enum('data_available',['available', 'in use', 'junk'])->default('available');
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
        Schema::dropIfExists('_dapros_regionals');
    }
}
