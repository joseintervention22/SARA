<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reembolsos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('consecutivo');
            $table->string('concepto');
            $table->string('proveedor');
            $table->float('importe');
            $table->string('archivo');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('agencia_id');
            $table->foreign('agencia_id')->references('id')->on('agencias');
            $table->dateTime('fechac');
            $table->integer('estado');
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
        Schema::dropIfExists('reembolsos');
    }
}
