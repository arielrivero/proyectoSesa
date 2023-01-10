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
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rfc', 50);
            $table->string('nombre', 50);
            $table->integer('est_num');
            $table->string('puesto', 50);
            $table->integer('horas');
            $table->integer('porc_puesto');
            $table->string('periodo_pago', 50);
            $table->integer('tipo_pago');
            $table->integer('num_cheque');
            $table->integer('digito_verificador');
            $table->integer('num_cuenta');
            $table->integer('total_percep');
            $table->integer('total_ded');
            $table->integer('neto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
