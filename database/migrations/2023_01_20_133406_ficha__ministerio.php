<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_ministerio', function (Blueprint $table) {

        $table->increments('id');
        $table->unsignedInteger('ficha_conselho_id');
        $table->foreign('ficha_conselho_id')->references('id')->on('ficha_conselho')->onDelete('cascade');
        

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
