<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TarefaTest extends TestCase
{
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testCriarTarefa()
	{
		$tarefa = array(
			'titulo'  => 'Comprar Leite',
			'data'    => '2015-09-17 09:45',
			'lembrar' => true,
			'grupo'   => 1,
		);

		$this->post('/tarefa', $tarefa)
			->seeJson(array("criado" => true));
	}

	public function testMarcarTarefaComoFeito()
	{
		$this->put('/tarefa/4/feito', [])
			->seeJson(array("feito" => true));
	}
}
