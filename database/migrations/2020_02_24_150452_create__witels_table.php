<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWitelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_witels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('witel_desc');
            $table->tinyInteger('id_regional');
            $table->enum('is_enabled',[0,1])->default(1);
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
        Schema::dropIfExists('_witels');
    }
}
