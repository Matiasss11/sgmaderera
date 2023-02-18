<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('caracteristicas')->nullable(); //Separar por "|" y crear función para rearmar el texto.
            $table->double('stock');
            $table->double('precio_base')->nullable();
            $table->binary('imagen')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('categorias_de_productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('producto-categoria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producto_id');
            $table->bigInteger('categoria_id');
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
        Schema::dropIfExists('productos');
        Schema::dropIfExists('categorias_de_productos');
        Schema::dropIfExists('producto-categoria');
    }
}
