<?php
//insere as configurações do banco
include('config.php');

//Chama o arquivo que grava o log
include('log.php');

// Inicia a sessão
session_start();

// Verificar se o usuário já está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Se já estiver logado, redireciona para a página inicial
    echo "<script> window.location.replace('index.php'); </script>";
    exit;
}

// verificação se o formulário foi enviado
if (isset($_POST['entrar'])) {

    // recuperar o email e a senha do formulário
    $email = $_POST['email'];
    $senha =  $_POST['senha'] ;

    // executar uma consulta SQL para recuperar o registro do usuário correspondente ao email informado
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $consulta = $conn->query($sql);

    // Checa se houve erro na consulta
    if(!$consulta) {
        // Exibe a mensagem de erro
        echo "Erro na consulta: " . mysqli_error($conn);
    }

    $resultado = $consulta->fetch_assoc();

    //Recebe o hash da senha do banco de dados
    $senha_hash = $resultado['senha'];

    //Verifica se a senha digitada corresponde ao hash do banco 
    if (password_verify( $senha, $senha_hash)) {

        //<------------Insere as informações na tabelad de LOG ---------------->
        //Define a descrição dos logs como login
        $descricao = "Login";
        registra_log($conn, $email,$descricao);

        //Recebe as informações da sessão 
        //Define o usuario como logado
        $_SESSION['loggedin'] = true;
        //Armazena as informações do usuário
        $_SESSION['id'] = $resultado['id'];
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['email'] = $resultado['email'];
        
        //Fecha a conexão com o banco
        mysqli_close($conn);

        //Redireciona para a página inicial do sistema
        echo "<script> window.location.replace('index.php'); </script>";
        exit;

    }
    //casso a senha esteja errada
    else{
         // se as senhas não coincidirem, exibir uma mensagem de erro
         print "<p style='background-color: #ff0000d4; color: white; padding:5px; border-radius: 5px; '> Dados incorretos<p>";
    }

}

?>