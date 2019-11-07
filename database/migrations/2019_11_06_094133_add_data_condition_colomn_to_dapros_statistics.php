<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataConditionColomnToDaprosStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_dapros_statistics', function (Blueprint $table) {
            // Add Flag Data REturn dan Agent telah melakukan call Ulang
            $table->enum('data_condition',['-','returned to agent','returned to qco'])->default('-')->after('ever_be_returned');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_dapros_statistics', function (Blueprint $table) {
            $table->dropColumn('data_condition');
        });
    }
}
