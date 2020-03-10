<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTappingRegionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_tapping_regionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dapros_id');
            // Tapping
            $table->tinyInteger('tapping_status_id')->nullable();
            $table->longText('tapping_information')->nullable();
            //$table->enum('ever_be_returned',['no','yes'])->default('no');
            //$table->enum('data_condition',['-','returned to agent','returned to qco'])->default('-');
            $table->string('tapping_agent_username')->nullable();
            $table->dateTime('tapping_consume_datetime')->nullable()->useCurrent = true;
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
        Schema::dropIfExists('_tapping_regionals');
    }
}
