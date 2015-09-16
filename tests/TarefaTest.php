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
		$this->post('/tarefa', array(
			'titulo'  => 'Comprar Leite',
			'data'    => '2015-09-17 09:45',
			'lembrar' => true
		))
		->seeJson(['created' => true]);
	}
}
