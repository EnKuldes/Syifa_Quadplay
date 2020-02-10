<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsEnabledToTappingStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_tapping_statuses', function (Blueprint $table) {
            $table->enum('is_enabled',[0,1])->default(1)->after('value_tapping_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_tapping_statuses', function (Blueprint $table) {
            $table->dropColumn('is_enabled');
        });
    }
}
