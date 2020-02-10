<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsEnabledToCallStatusDetailReasons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_call_status_detail_reasons', function (Blueprint $table) {
            $table->enum('is_enabled',[0,1])->default(1)->after('value_call_status_detail_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_call_status_detail_reasons', function (Blueprint $table) {
            $table->dropColumn('is_enabled');
        });
    }
}
