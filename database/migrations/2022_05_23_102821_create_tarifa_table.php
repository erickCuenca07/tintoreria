<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifa', function (Blueprint $table) {
            $table->integer('prenda_id');
            $table->integer('servicio_id');
            $table->integer('precio');
            
            $table->foreign('prenda_id', 'tarifa_ibfk_1')->references('prenda_id')->on('prenda');
            $table->foreign('servicio_id', 'tarifa_ibfk_2')->references('servicio_id')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifa');
    }
}
