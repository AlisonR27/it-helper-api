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
        Schema::create('acoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario_1')->nullable();
            $table->unsignedBigInteger('id_funcionario_2')->nullable();
            $table->string('descricao');
            $table->timestamps();
            $table->foreign('id_funcionario_1')->references('id')->on('funcionarios');
            $table->foreign('id_funcionario_2')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acoes');
    }
};
