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
        //
        Schema::create('historico_acoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_chamado');
            $table->string('tipo_acao');
            $table->text('descricao')->nullable();
            $table->timestamps();
            $table->foreign('id_chamado')->references('id')->on('chamados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
