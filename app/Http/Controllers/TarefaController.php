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
        return Tarefa::orderBy('ordem')->get();
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa($request->all());
        if ($tarefa->save()) 
            return ['criado' => true, 'tarefa' => $tarefa];
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

    public function updateAll(Request $request)
    {
        $resultado = [];
        foreach ($request->get('tarefas') as $tarefa) {
            $resultado[] = Tarefa::find($tarefa['id'])->update($tarefa);
        }   
        return $resultado;
    }

}
