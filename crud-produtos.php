<?php

//Chama o arquivo que grava o log
include('log.php');

switch ($_REQUEST['acao']) {

		//Se a ação do botão seja cadastrar
	case 'cadastrar':

		//Recebe via POST as informações do produto a ser cadastrado
		$nome_produto = $_POST['nome'];
		$descricao_produto = $_POST['descricao'];
		$status_produto = $_POST['status'];

		$sql = "INSERT INTO produtos (nome, descricao, status) 
				VALUES ('{$nome_produto}','{$descricao_produto}','{$status_produto}')";

		$consulta_add_prduto = mysqli_query($conn, $sql);

		// Checa se houve erro na consulta
		if (!$consulta_add_prduto) {
			// Exibe a mensagem de erro
			echo "Erro na consulta: " . mysqli_error($conn);
		} else {

			//<------------Insere as informações na tabelad de LOG ---------------->

			//Define a descrição dos logs como cadastro
			$descricao = " CADASTRO 
					nome=$nome_produto
					descrição=$descricao_produto
					status=$status_produto";

			registra_log($conn, $_SESSION['nome'], $descricao);

			//Redireciona para pagina listar
			print "<script>location.href='?page=listar';</script>";
		}
		//Encerra a conexão
		mysqli_close($conn);
		break;

	case 'editar':

		//Recebe o ID do produto a ser editado
		$id = $_REQUEST["id"];

		//Recebe via POST as informações do produto a ser cadastrado
		$nome_produto = $_POST['nome'];
		$descricao_produto = $_POST['descricao'];
		$status_produto = $_POST['status'];

		$sql = "UPDATE produtos SET 
				nome='{$nome_produto}',
				descricao='{$descricao_produto}',
				status='{$status_produto}'
				WHERE 
				id=" . (int)$_REQUEST["id"];


		$consulta_edit_prduto = mysqli_query($conn, $sql);

		// Checa se houve erro na consulta
		if (!$consulta_edit_prduto) {
			// Exibe a mensagem de erro
			echo "Erro na consulta: " . mysqli_error($conn);
		} else {

			//<------------Insere as informações na tabelad de LOG ---------------->

			//Define a descrição dos logs como alteração
			$descricao = " ALTERAÇÃO 
					nome=$nome_produto
					descrição=$descricao_produto
					status=$status_produto
					id=$id";

			registra_log($conn, $_SESSION['email'], $descricao);

			//Redireciona para pagina listar
			print "<script>location.href='?page=listar';</script>";
		}
		//Encerra a conexão
		mysqli_close($conn);
		break;

	case 'editar':

		//Recebe o ID do produto a ser editado
		$id = $_REQUEST["id"];

		//Recebe via POST as informações do produto a ser cadastrado
		$nome_produto = $_POST['nome'];
		$descricao_produto = $_POST['descricao'];
		$status_produto = $_POST['status'];

		$sql = "UPDATE produtos SET 
				nome='{$nome_produto}',
				descricao='{$descricao_produto}',
				status='{$status_produto}'
				WHERE 
				id=" . (int)$_REQUEST["id"];


		$consulta_edit_prduto = mysqli_query($conn, $sql);

		// Checa se houve erro na consulta
		if (!$consulta_edit_prduto) {
			// Exibe a mensagem de erro
			echo "Erro na consulta: " . mysqli_error($conn);
		} else {

			//<------------Insere as informações na tabelad de LOG ---------------->

			//Define a descrição dos logs como alteração
			$descricao = " ALTERAÇÃO 
					nome=$nome_produto
					descrição=$descricao_produto
					status=$status_produto
					id=$id";

			registra_log($conn, $_SESSION['email'], $descricao);

			//Redireciona para pagina listar
			print "<script>location.href='?page=listar';</script>";
		}
		//Encerra a conexão
		mysqli_close($conn);
		break;

	case 'excluir':

		//Recebe o ID do produto a ser editado
		$id = $_REQUEST["id"];

		//Recebe via POST as informações do produto a ser cadastrado
		$nome_produto = $_POST['nome'];
		$descricao_produto = $_POST['descricao'];
		$status_produto = $_POST['status'];

		$sql = "DELETE FROM produtos WHERE id=" . (int)$_REQUEST["id"];
		$consulta_edit_prduto = mysqli_query($conn, $sql);

		// Checa se houve erro na consulta
		if (!$consulta_edit_prduto) {
			// Exibe a mensagem de erro
			echo "Erro na consulta: " . mysqli_error($conn);
		} else {

			//<------------Insere as informações na tabelad de LOG ---------------->

			//Define a descrição dos logs como alteração
			$descricao = " EXCLUSÃO 
						nome=$nome_produto
						descrição=$descricao_produto
						status=$status_produto
						id=$id";

			registra_log($conn, $_SESSION['email'], $descricao);

			//Redireciona para pagina listar
			print "<script>location.href='?page=listar';</script>";
		}
		//Encerra a conexão
		mysqli_close($conn);
		break;


	default:

		break;
}
