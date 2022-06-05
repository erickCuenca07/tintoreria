<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prenda', function (Blueprint $table) {
            $table->integer('prenda_id')->primary();
            $table->string('nombre', 45)->nullable();
            $table->string('descripcion', 350)->nullable();
            $table->string('foto', 100)->nullable();
            $table->integer('categoria_id')->nullable();
            
            $table->foreign('categoria_id', 'categoria_id')->references('categoria_id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prenda');
    }
}
