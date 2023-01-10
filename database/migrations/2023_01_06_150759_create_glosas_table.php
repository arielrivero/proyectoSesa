<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glosas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('id_nomina')->unsigned();
            $table->foreign('id_nomina')->references('id')->on('nominas');
            $table->integer('anio');
            $table->integer('quincena');
            $table->string('nombre', 50);
            $table->string('estatus', 50);
            $table->string('ubicacion_fisica', 50);
            $table->date('fecha_elaboracion')->nullable();
            $table->date('fecha_entrega_srh')->nullable();
            $table->date('fecha_devolucion_srh')->nullable();
            $table->date('fecha_entrega_da')->nullable();
            $table->date('fecha_devolucion_da')->nullable();
            $table->date('fecha_digitalizacion')->nullable();
            $table->date('fecha_entrega_archivo')->nullable();
            $table->date('fecha_entrega_resp')->nullable();
            $table->string('observaciones', 100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glosas');
    }
};
