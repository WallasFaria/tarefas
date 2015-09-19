var app = angular.module('mainModule', ['ui.sortable']);

app.controller('mainController', function($scope, $http) {
	$scope.tarefas = [];
	$scope.nome = '';

	$scope.editar = function (tarefa) {
		$scope.nome = tarefa.titulo;
	}

	$http.get('/tarefa').success(function(data) {
		$scope.tarefas = data;
	});
	
	$scope.criar = function (keyEvent) {
		if (keyEvent.which === 13) {
			tarefa = {titulo: $scope.nome, grupo: 1}; 	
			$http.post('/tarefa', tarefa).success(function(data) {
				if (data.criado) {$scope.tarefas.push(data.tarefa)};
				$scope.nome = '';
			});
		};
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