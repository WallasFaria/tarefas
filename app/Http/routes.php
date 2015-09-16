<?php

Route::resource('tarefa/', 'TarefaController');

Route::get('/', function () {
    return view('welcome');
});
