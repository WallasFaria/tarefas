<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tarefa;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        // 
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa($request->all());
        if ($tarefa->save()) 
            return ['created' => true];
        else
            return response('Não foi possível salvar', 401);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
