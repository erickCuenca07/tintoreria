<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('numero_pedido')->primary();
            $table->integer('cliente_id')->nullable();
            $table->string('fecha_recibo', 45)->nullable();
            $table->string('domicilio', 45)->nullable();
            $table->string('municipio', 45)->nullable();
            $table->string('provincia', 45)->nullable();
            $table->string('fecha_prevista', 45)->nullable();
            $table->string('fecha_entregado', 45)->nullable();
            
            $table->foreign('cliente_id', 'cliente_id')->references('cliente_id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
