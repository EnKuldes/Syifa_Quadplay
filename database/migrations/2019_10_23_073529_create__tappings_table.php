<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_tappings', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Tapping START
            $table->bigInteger('dapros_id');
            $table->bigInteger('call_id');
            $table->tinyInteger('tapping_status_id');
            $table->longText('tapping_information');
            $table->string('tapping_agent_username');
            $table->dateTime('tapping_consume_datetime')->useCurrent = true;
            // Tapping END
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
        Schema::dropIfExists('_tappings');
    }
}
