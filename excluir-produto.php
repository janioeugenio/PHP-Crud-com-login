<h1>Editar Produtos</h1>

<?php
$sql = "SELECT * FROM produtos WHERE id=" . $_REQUEST['id'];

$consulta_exc = $conn->query($sql);

// Checa se houve erro na consulta
if(!$consulta_exc) {
    // Exibe a mensagem de erro
    echo "Erro na consulta: " . mysqli_error($conn);
}

$resultado_exc = $consulta_exc->fetch_object();

//Encerra a conexão
mysqli_close($conn);
?>

<form action="?page=salvar" method="POST">
	<input type="hidden" name="acao" value="excluir">
	<input type="hidden" name="id" value="<?php print $resultado_exc->id; ?>">

	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="<?php print $resultado_exc->nome; ?>">
	</div>

	<div class="mb-3">
		<label>Descrição</label>
		<input type="text" name="descricao" class="form-control" value="<?php print $resultado_exc->descricao; ?>">
	</div>

	<div class="mb-3">
		<label>Status</label>
		<input type="number" name="status" class="form-control" value="<?php print $resultado_exc->status; ?>">
	</div>

    <h3>Deseja excluir esse produto?</h3>

	<div class="mb-3">
		<button type="submit" class="btn btn-success">SIM</button>
        <a href="?page=listar" class="btn btn-danger">NÃO</a>
	</div>
</form>