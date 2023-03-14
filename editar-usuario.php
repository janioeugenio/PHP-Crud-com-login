<h1>Editar perfil</h1>

<?php

    // executar uma consulta SQL para recuperar as informações do usuário
    $sql = "SELECT * FROM usuarios WHERE id = ".$_SESSION['id'];
    $consulta = $conn->query($sql);

    // Checa se houve erro na consulta
    if(!$consulta) {
        // Exibe a mensagem de erro
        echo "Erro na consulta: " . mysqli_error($conn);
    }

    $resultado = $consulta->fetch_assoc();

	//Encerra a conexão
    mysqli_close($conn);
?>



<form action="?page=usuario" class="mt-5" method="POST">
	<input type="hidden" name="acao" value="editar-perfil">
	<input type="hidden" name="id" value="<?php print $_SESSION['id']; ?>">

	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="<?php print $resultado['nome']; ?>">
	</div>

	<div class="mb-3">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="<?php print $resultado['email']; ?>">
	</div>

    <div class="mb-3">
		<label>Senha</label>
		<input type="password" name="senha" class="form-control" value="<?php print $resultado['senha']; ?>">
	</div>

	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>
