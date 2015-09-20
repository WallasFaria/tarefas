<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tarefa extends Model
{
	public function save(array $options = array())
	{
		if (!isset($this->id)) {
			$this->ordem = Tarefa::orderBy('ordem', 'DESC')->first()->ordem + 1;
		}
		return parent::save($options);
	}

	public function delete(array $options = array())
	{
		$ordem = $this->ordem;
		Tarefa::where('ordem', '>=', $ordem)
			->update(['ordem' => DB::raw('ordem - 1')]);
		return parent::delete($options);
	}

  protected $fillable = ['titulo', 'descricao', 'ordem', 'grupo'];
}
