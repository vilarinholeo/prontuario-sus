<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaoMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nao_medicos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned()->unique();

            $table->foreign('usuario_id')
              ->references('id')
              ->on('usuarios')
            ->onDelete('cascade');

            $table->string('conselho')->nullable();
            $table->string('especialidade')->nullable();
            $table->string('cargo')->nullable();
            $table->string('telefone')->nullable();

            $table->tinyInteger('historico')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nao_medicos');
    }
}
