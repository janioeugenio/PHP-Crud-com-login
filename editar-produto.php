<h1>Editar Produtos</h1>

<?php
$sql = "SELECT * FROM produtos WHERE id=" . $_REQUEST['id'];

$consulta_edit = $conn->query($sql);

// Checa se houve erro na consulta
if(!$consulta_edit) {
    // Exibe a mensagem de erro
    echo "Erro na consulta: " . mysqli_error($conn);
}

$resultado_edit = $consulta_edit->fetch_object();

//Encerra a conexão
mysqli_close($conn);
?>

<form action="?page=salvar" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id" value="<?php print $resultado_edit->id; ?>">

	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="<?php print $resultado_edit->nome; ?>">
	</div>

	<div class="mb-3">
		<label>Descrição</label>
		<input type="text" name="descricao" class="form-control" value="<?php print $resultado_edit->descricao; ?>">
	</div>

	<div class="mb-3">
		<label>Status</label>
		<input type="number" name="status" class="form-control" value="<?php print $resultado_edit->status; ?>">
	</div>

	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>