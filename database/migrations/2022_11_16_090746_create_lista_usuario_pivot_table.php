<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaUsuarioPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('lista_id')->index();
            $table->foreign('lista_id')->references('id')->on('listas')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id')->index();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->primary(['lista_id', 'usuario_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_usuario');
    }
}
