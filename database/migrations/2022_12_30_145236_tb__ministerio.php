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
        Schema::create('ministerio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MinisterioNome')->nullable();
            $table->string('MinisterioStatus')->nullable();
            $table->string('MinisterioEmail')->nullable();
            $table->string('MinisterioDDD')->nullable();
            $table->string('MinisterioFone')->nullable();
            $table->string('MinisterioEndereco')->nullable();
            $table->string('MinisterioEndBairroId')->nullable();
            $table->string('MinisterioEndNmr')->nullable();
            $table->string('MinisterioCidade')->nullable();
            $table->string('MinisterioEstado')->nullable();
  
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
        Schema::dropIfExists('ministerio');

    }
};
