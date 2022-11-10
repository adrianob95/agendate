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
        Schema::create('alistamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('descricao')->nullable();
            $table->string('alistamento');
            $table->string('situacao');
            $table->string('protocolo');
            $table->foreignId('usuario_id')->constrained();
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
        Schema::dropIfExists('alistamentos');
    }
};
