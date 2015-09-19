new Vue({
	el:"#vue",

	data: {
		nome: '',
		tarefas: {}
	},

	methods: {
		editar: function (tarefa) {
			this.nome = tarefa.titulo;
		}
	},

	created : function () {
		var self = this;
		jQuery.getJSON('/tarefa', function (tarefas) {
			self.tarefas = tarefas;
		});
	}
});