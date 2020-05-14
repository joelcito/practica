<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaTablaPrestamoLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo_libro', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_prestamo');
            $table->string('prestado_a',100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')->nullable();
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario', 'fk_libroprestamo_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('id_libro');
            $table->foreign('id_libro', 'fk_libroprestamo_libro')->references('id')->on('libro')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('prestamo_libro');
    }
}
