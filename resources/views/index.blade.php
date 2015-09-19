<!DOCTYPE html>
<html ng-app="mainModule">
<head>
  <title>Tarefas</title>
  <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body id="vue" ng-controller='mainController'>
  <div class="container" id="app">

    <h1 class="titulo">Tarefas</h1>

    <input type="text" id="new" ng-model="nome" ng-keypress="criar($event)" class="form-control" placeholder="Nova Tarefa">
    <div class="well">
      <div class="list-group" ng-model="tarefas" ui-sortable="sortableOptions">
        <div ng-repeat="tarefa in tarefas" class="tarefa list-group-item">
          <div class="acoes">
            <ul>
              <li><a href="">R</a></li>
              <li ng-click="editar(tarefa)">E</li>
              <li>#</li>
            </ul>
          </div>
          <span class="list-group-item-heading">@{{tarefa.titulo}}</span>
        </div>
      </div>
    </div>
      
  </div>
  <script src="/bower_components/jquery/dist/jquery.js"></script>
  <script src="/bower_components/jquery-ui/jquery-ui.js"></script>
  <script src="/bower_components/angular/angular.js"></script>
  <script src="/bower_components/angular-ui-sortable/sortable.js"></script>

  <script src="/js/app.angular.js"></script>
</body>
</html>