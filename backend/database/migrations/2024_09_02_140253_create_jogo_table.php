<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('tecnologia_id')->constrained('tecnologia');//tal jogo pertence a tal tecnologia. Como se fosse uma pasta onde teria o nome das tcnologias e o jogos dentro da pasta tecnologias meio que pra separar eles.
            $table->string('preset');
            $table->float('fps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
