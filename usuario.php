<?php

//Chama o arquivo que grava o log
include('log.php');

switch ($_REQUEST['acao']) {

    case 'editar-perfil':

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        //Ussa a função password_hash para criptografar a senha usando o algoritmo BCRYPT
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

        //Envia o sql com as informações de alteração recebidas via POST
        $sql = "UPDATE usuarios SET 
				        nome='{$nome}',
				        email='{$email}',
				        senha='{$senha}'
				        WHERE 
				        id=" . $_REQUEST["id"];

        $res = mysqli_query($conn, $sql);

        if ($res) {

            $descricao = " ALTERAÇÃO 
                nome=$nome
                email=$email
                senha=$senha";


            //Armazena o Log de Login
            registra_log($conn, $email,$descricao);

            print "<script>location.href='?page=exibeperfil';</script>";
        }

        if (!$res) {
            die("Conexão falhou: " . mysqli_connect_error());
            print "<script>location.href='?page=exibeperfil';</script>";
        }

        mysqli_close($conn);

        break;

    default:
        break;
}
?>