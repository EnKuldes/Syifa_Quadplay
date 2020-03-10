<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillColomnsToCallStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_call_statuses', function (Blueprint $table) {
             $table->bigInteger('id_skill')->default(1)->after('value_call_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_call_statuses', function (Blueprint $table) {
            $table->dropColumn('id_skill');
        });
    }
}
