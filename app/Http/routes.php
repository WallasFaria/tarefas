<?php

Route::resource('tarefa/', 'TarefaController');
Route::put('tarefa/', 'TarefaController@updateAll');

Route::get('/', function () {
  return view('index');
});
