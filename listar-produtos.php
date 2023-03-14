<div>
	<h1>Lista de ramais</h1>

	<!--Cria o campo de pesquisa-->
	<form method="post" action="?page=pesquisa">
		<div class="input-group mb-3">
			<input type="text" class="form-control" placeholder="Pesquisar..." name="pesquisa">
			<div class="input-group-append">
				<button class="btn btn-primary" type="submit">Buscar</button>
			</div>
		</div>
	</form>

</div>

<?php

//Consulta a lista de todos os produtos
$sql = "SELECT * FROM produtos";
$consulta_produtos = $conn->query($sql);

// Checa se houve erro na consulta
if(!$consulta_produtos) {
    // Exibe a mensagem de erro
    echo "Erro na consulta: " . mysqli_error($conn);
}

//Encerra a conexão
mysqli_close($conn);


//Recebe a quantidade total de produtos cadastrados
$quantidade_produtos = $consulta_produtos->num_rows;


//Caso tenha algum produto cadastrado ele exibe a tabela de produtos
if ($quantidade_produtos > 0) {

	//Cria o cabeçalho da tabela de produtos
	print "<div class='table-responsive' >";
	print "<table class='table table-hover table-striped table-bordered'>";
	print "<tr class='table-dark'>";
	print "<th>ID</th>";
	print "<th>NOME</th>";
	print "<th>DESCRIÇÃO</th>";
	print "<th>STATUS</th>";
	print "<th>AÇÃO</th>";
	print "</tr>";

	//Insere os produtos de acordo com a quantidade usando o while
	while ($resultado = $consulta_produtos->fetch_assoc()) {
		print "<tr>";
		print "<td>" .$resultado['id']. "</td>";
		print "<td>" . $resultado['nome']. "</td>";
		print "<td>" . $resultado['descricao'] . "</td>";
		print "<td>" . $resultado['status'] . "</td>";
		print "	<td>
				   	<button onclick=\"location.href='?page=editar&id=" . $resultado['id'] . "'\" class='btn btn-success' >Editar</button>
					<button onclick=\"location.href='?page=excluir&id=" . $resultado['id'] . "'\" class='btn btn-danger' >Excluir</button>
				</td>";
		print "</tr>";
	}
	print "</div>";
	//Finalixa a tag da tabela
	print "</table>";
} 
//Caso o SQL não retorne valores ele exibe uma mensagem de lista vazia
else {
	print "<p class='alert alert-danger'>Sua Lista está vazia!</p>";
}

?>