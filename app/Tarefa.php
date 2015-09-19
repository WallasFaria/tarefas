<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
	public function save(array $options = array())
	{
		if (!isset($this->id)) {
			$this->ordem = Tarefa::orderBy('ordem', 'DESC')->first()->ordem + 1;
		}
		return parent::save($options);
	}

  protected $fillable = ['titulo', 'descricao', 'ordem', 'grupo'];
}
