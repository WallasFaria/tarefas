<?php

Route::resource('tarefa/', 'TarefaController');
Route::put('tarefa/', 'TarefaController@updateAll');
Route::delete('tarefa/{id}', 'TarefaController@destroy');

Route::get('/', function () {
  return view('index');
});
