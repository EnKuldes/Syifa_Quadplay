<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagStatusToDapros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_dapros', function (Blueprint $table) {
            $table->enum('data_available',['available', 'in use'])->default('available')->after('ODP3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_dapros', function (Blueprint $table) {
            $table->dropColumn('data_available');
        });
    }
}
