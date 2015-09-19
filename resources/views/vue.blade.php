<!DOCTYPE html>
<html>
<head>
    <title>Tarefas</title>
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body id="vue">
    <div class="container" id="app">

        <h1 class="titulo">Tarefas</h1>

        <input type="text" id="new" v-model="nome" class="form-control" placeholder="Nova Tarefa">
        <div class="well">
            <ul class="list-group">
                <div v-repeat="tarefa in tarefas" class="tarefa list-group-item">
                    <div class="acoes">
                        <ul>
                            <li><a href="">R</a></li>
                            <li v-on="click: editar(tarefa)">E</li>
                            <li v-on="click: remover(tarefa)">#</li>
                        </ul>
                    </div>
                    <span class="list-group-item-heading">@{{tarefa.titulo}}</span>
                </div>
            </ul>
        </div>
            
    </div>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/vue/dist/vue.min.js"></script>
    <script src="/js/app.vue.js"></script>
</body>
</html>