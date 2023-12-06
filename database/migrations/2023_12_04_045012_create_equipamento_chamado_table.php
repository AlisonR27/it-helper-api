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
        Schema::create('equipamento_chamado', function (Blueprint $table) {
            $table->unsignedBigInteger('id_chamado');
            $table->unsignedBigInteger('id_equipamento');
            $table->timestamps();
            $table->foreign('id_chamado')->references('id')->on('chamados');
            $table->foreign('id_equipamento')->references('id')->on('equipamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamento_chamado');
    }
};
