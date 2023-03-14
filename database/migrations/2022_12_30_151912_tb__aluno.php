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
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AlunoNome')->nullable();
            $table->string('AlunoDataNascimento')->nullable();
            $table->string('AlunoCPF')->nullable();
            $table->string('AlunoSexo')->nullable();
            $table->string('AlunoFiliacao1')->nullable();
            $table->string('AlunoFiliacao2')->nullable();
            $table->string('AlunoEndereco')->nullable();
            $table->string('AlunoNumero')->nullable();
            $table->string('AlunoBairro')->nullable();
            $table->string('AlunoCEP')->nullable();
            $table->string('AlunoCidade')->nullable();
            $table->string('AlunoEstado')->nullable();
            $table->string('AlunoDDD')->nullable();
            $table->string('AlunoTelefone')->nullable();
            $table->string('AlunoObs')->nullable();
     

            // $table->foreignId('FichaCatID')->constrained('tb_categoria')->onDelete('cascade');
            // $table->foreignId('FichaEscolaID')->constrained('tb_escola')->onDelete('cascade');
            // $table->foreignId('FichaAlunoID')->constrained('tb_aluno')->onDelete('cascade');
            // $table->foreignId('FichaAlunoID')->constrained('tb_aluno')->onDelete('cascade');


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
        Schema::dropIfExists('aluno');
    }
};
