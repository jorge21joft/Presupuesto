<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cantidad',8,2);
           

            $table->integer('ingreso_id')->unsigned();
            $table->integer('tipo_categoria_id')->unsigned();

            $table->foreign('ingreso_id')->references('id')->on('ingresos');
            $table->foreign('tipo_categoria_id')->references('id')->on('tipo_categorias');

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
        Schema::dropIfExists('detalle_ingresos');
    }
}
