<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaTarefas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $t) {
          $t->increments('id');
          $t->string('titulo');
          $t->string('descricao')->nullable();
          $t->datetime('data')->nullable();
          $t->boolean('lembrar')->default(false);
          $t->datetime('feito')->nullable();
          $t->datetime('arquivado')->nullable();
          $t->integer('grupo');
          $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tarefas');
    }
}
