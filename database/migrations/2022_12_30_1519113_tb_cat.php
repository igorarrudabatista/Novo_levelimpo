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
        Schema::create('tb_categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Categoria_Nome')->nullable();
            $table->string('Catregoria_Status')->nullable();
  
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     * 
     * 	[FichaCatId] [int] IDENTITY(1,1) NOT NULL,
	
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_categoria');

    }
};