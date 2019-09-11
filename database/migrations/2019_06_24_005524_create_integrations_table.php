<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrations', function (Blueprint $table) {
            $table->increments('id');
            $table->double('importefec',8,4)->nullable();
            $table->double('importeche',8,4)->nullable();
            $table->double('saldob',8,4)->nullable();
            $table->double('reembolsop',8,4)->nullable();
            $table->double('documentos',8,4)->nullable();
            $table->double('otros',8,4)->nullable();
            $table->double('comprobado',8,4);
            $table->double('fondo',8,4);
            $table->double('diferencia',8,4);
            $table->unsignedInteger('arqueo_id');
            $table->foreign('arqueo_id')->references('id')->on('arqueos');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('integrations');
    }
}
