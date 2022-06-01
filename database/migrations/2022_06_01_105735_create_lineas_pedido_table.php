<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineasPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_pedido', function (Blueprint $table) {
            $table->integer('linea_pedido_id')->primary();
            $table->integer('numero_pedido')->nullable();
            $table->integer('prenda_id')->nullable();
            $table->decimal('precio', 5, 0)->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('servicio_id')->nullable();
            
            $table->foreign('numero_pedido', 'numero_pedido')->references('numero_pedido')->on('pedido');
            $table->foreign('prenda_id', 'prenda_id')->references('prenda_id')->on('prenda');
            $table->foreign('servicio_id', 'servicio_id')->references('servicio_id')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineas_pedido');
    }
}
