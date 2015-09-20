var app = angular.module('mainModule', ['ui.sortable']);

app.controller('mainController', function($scope, $http) {
	$scope.tarefas = [];
	$scope.tarefa = {id: 0, titulo: ''};
	$scope.titulo = '';
	$scope.edicao = false;

	$scope.editar = function (tarefa) {
		$scope.tarefa = tarefa;
		$scope.titulo = tarefa.titulo;
		$scope.edicao = true;
	}

	$scope.excluir = function (tarefa) {
		$http.delete('/tarefa/'+tarefa.id).success(function(data) {
			index = $scope.tarefas.indexOf(tarefa);
			$scope.tarefas.splice(index, 1);
		});
	}

	$http.get('/tarefa').success(function(data) {
		$scope.tarefas = data;
	});
	
	$scope.salvar = function (keyEvent) {
		if ($scope.edicao && keyEvent.which === 13) {
			tarefa = {id: $scope.tarefa.id, titulo: $scope.titulo}; 	
			$http.put('/tarefa', {tarefas: [tarefa]}).success(function(data) {
				$scope.tarefa.titulo = $scope.titulo;
				$scope.edicao = false;
				$scope.titulo = '';
			});
		} 
		else if (keyEvent.which === 13) {
			tarefa = {titulo: $scope.titulo, grupo: 1}; 	
			$http.post('/tarefa', tarefa).success(function(data) {
				if (data.criado) {$scope.tarefas.push(data.tarefa)};
				$scope.titulo = '';
			});
		}
	}

	$scope.sortableOptions = {
    stop: function(e, ui) {
    	posicao = [ui.item.sortable.index, ui.item.scope().$index].sort();
    	ordem = [];
    	if (posicao[0] != posicao[1]) {
	    	for (var i = posicao[0]; i <= posicao[1]; i++) {
    			ordem.push({id: $scope.tarefas[i].id, ordem: i+1});
	    	};

	    	$http.put('/tarefa', {tarefas: ordem}).success(function(data) {
					console.log(data);
				});
    	};
    }
  };
});