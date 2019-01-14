<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cantidad',8,2);
            $table->integer('subcategoria_id')->unsigned();

            $table->integer('gasto_id')->unsigned();
           
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('gasto_id')->references('id')->on('gastos');
           
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
        Schema::dropIfExists('detalle_gastos');
    }
}
