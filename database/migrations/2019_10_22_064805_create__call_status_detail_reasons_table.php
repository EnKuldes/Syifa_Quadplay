<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallStatusDetailReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_call_status_detail_reasons', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('value_call_status_detail_reason');
            $table->tinyInteger('id_call_status_detail');
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
        Schema::dropIfExists('_call_status_detail_reasons');
    }
}
