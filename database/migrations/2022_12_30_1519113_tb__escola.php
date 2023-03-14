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
        Schema::create('escola', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EscolaCod')->nullable();
            $table->string('EscolaNome')->nullable();
            $table->string('EscolaEndereco')->nullable();
            $table->string('EscolaNumero')->nullable();
            $table->string('EscolaBairro')->nullable();
            $table->string('EscolaCep')->nullable();
            $table->string('EscolaCidade')->nullable();
            $table->string('EscolaEstado')->nullable();
            $table->string('EscolaDDD')->nullable();
            $table->string('EscolaTel')->nullable();
            $table->string('EscolaEmail')->nullable();
            $table->string('EscolaStatus')->nullable();
            
            // $table->unsignedInteger('aluno_id');
            // $table->foreign('aluno_id')->references('id')->on('aluno');                 
             
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
        Schema::dropIfExists('escola');

    }
};
