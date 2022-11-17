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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('titulo')->nullable();
            $table->string('sus')->nullable();
            $table->string('nis')->nullable();
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->date('datanascimento')->nullable();
            $table->string('endereco')->nullable();
            $table->string('contato')->nullable();
            $table->string('obs')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
