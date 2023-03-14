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
        Schema::create('ficha_conselho', function (Blueprint $table) {

        $table->increments('id');

        $table->date('data_encaminhamento')->nullable();
        $table->string('Nome_Responsavel')->nullable();
        $table->string('CPF_Responsavel')->nullable();

        $table->unsignedInteger('ficha_id');
        $table->foreign('ficha_id')->references('id')->on('ficha')->onDelete('cascade');
        
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
        //
    }
};
