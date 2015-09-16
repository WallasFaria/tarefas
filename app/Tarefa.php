<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['titulo', 'descricao', 'data', 'lembrar', 'grupo'];
}
