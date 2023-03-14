<h1>Novo Telefone</h1>

<form action="?page=salvar" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome do produto</label>
		<input type="text" name="nome" class="form-control">
	</div>

	<div class="mb-3">
		<label>Descrição do produto</label>
		<input type="text" name="descricao" class="form-control">
	</div>

	<div class="mb-3">
		<label>Status do produto</label>
		<input type="number" name="status" class="form-control">
	</div>

	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>