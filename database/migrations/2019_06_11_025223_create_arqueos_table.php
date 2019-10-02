<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArqueosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arqueos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mil')->nullable();
            $table->integer('quinientos')->nullable();
            $table->integer('doscientos')->nullable();
            $table->integer('cien')->nullable();
            $table->integer('cincuenta')->nullable();
            $table->integer('veinte')->nullable();
            $table->integer('diez')->nullable();
            $table->integer('cinco')->nullable();
            $table->integer('dos')->nullable();
            $table->integer('uno')->nullable();
            $table->integer('cincuenta_cent')->nullable();
            $table->integer('veinte_cent')->nullable();
            $table->integer('diez_cent')->nullable();
            $table->integer('cinco_cent')->nullable();
            $table->double('total_efectivo', 12, 3)->nullable();
            $table->double('total_cheques', 12, 3)->nullable();
            $table->double('total', 12, 3)->nullable();
            $table->datetime('mes');
            $table->unsignedInteger('arqueo_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('agencia_id');
            $table->foreign('agencia_id')->references('id')->on('agencias');
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
        Schema::dropIfExists('arqueos');
    }
}
