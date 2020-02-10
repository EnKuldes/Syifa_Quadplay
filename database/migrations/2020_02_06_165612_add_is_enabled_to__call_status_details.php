<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsEnabledToCallStatusDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_call_status_details', function (Blueprint $table) {
            // Penambahan kolom is Enabled
            $table->enum('is_enabled',[0,1])->default(1)->after('value_call_status_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_call_status_details', function (Blueprint $table) {
            // Penghapusan kolom is Enabled
            $table->dropColumn('is_enabled');
        });
    }
}
