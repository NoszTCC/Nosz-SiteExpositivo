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
        Schema::create('downloads', function (Blueprint $tabela) {
            $tabela->id();
            $tabela->enum('tipo', ['users', 'parceiros']);
            $tabela->string('nome');
            $tabela->string('email')->unique();
            $tabela->string('senha');
            $tabela->string('cpfcnpj')->unique();
            $tabela->string('telefone')->unique();
            $tabela->string('cep');
            $tabela->string('rua');
            $tabela->integer('numero');
            $tabela->string('bairro');
            $tabela->string('cidade');
            $tabela->string('estado');
            $tabela->string('restaurante')->nullable();
            $tabela->string('logo')->nullable();
            $tabela->string('mensagem')->nullable();
            $tabela->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};
