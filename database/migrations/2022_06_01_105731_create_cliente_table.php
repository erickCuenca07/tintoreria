<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('cliente_id')->primary();
            $table->string('nif', 45);
            $table->string('nombre', 50);
            $table->integer('telefono');
            $table->string('email', 50);
            $table->string('domicilio', 45)->nullable();
            $table->string('provincia', 50);
            $table->string('municipio', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
