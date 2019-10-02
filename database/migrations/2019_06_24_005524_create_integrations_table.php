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
            $table->double('importefec',12,3)->nullable();
            $table->double('vales',12,3)->nullable();
            $table->double('importeche',12,3)->nullable();
            $table->double('saldob',12,3)->nullable();
            $table->double('reembolsop',12,3)->nullable();
            $table->double('documentos',12,3)->nullable();
            $table->double('otros',12,3)->nullable();
            $table->double('comprobado',12,3);
            $table->double('fondo',12,3);
            $table->double('diferencia',12,3);
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
