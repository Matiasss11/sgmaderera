<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('venta_id')->nullable();
            //$table->estado_id(); (???)
            $table->timestamps();
        });

        Schema::create('lista_de_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presupuesto_id')->nullable();
        });

        Schema::create('elementos_de_lista', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cantidad')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('lista_id')->nullable();
        });

        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('fecha_de_retiro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos');
        Schema::dropIfExists('lista_de_productos');
        Schema::dropIfExists('elementos_de_lista');
        Schema::dropIfExists('ventas');
    }
}
