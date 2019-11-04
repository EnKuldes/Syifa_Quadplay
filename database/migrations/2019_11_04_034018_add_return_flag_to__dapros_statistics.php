<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReturnFlagToDaprosStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_dapros_statistics', function (Blueprint $table) {
            $table->enum('ever_be_returned',['no','yes'])->default('no')->after('tapping_information');
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
            $table->dropColumn('ever_be_returned');
        });
    }
}
