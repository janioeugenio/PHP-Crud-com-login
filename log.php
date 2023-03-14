<?php

function registra_log($conn, $email,$descricao){

    // Definir o fuso horário como America/Sao_Paulo
    date_default_timezone_set('America/Sao_Paulo');
    // Obter a data atual
    $dataAtual = date('Y-m-d H:i:s'); 

    //Armazena no banco o Log de Login
    $log = "INSERT INTO registro_log ( usuario, data, alteracao) VALUES ('{$email}','{$dataAtual}','{$descricao}')";
    $inset_log = $conn->query($log); 

    // Checa se houve erro na consulta
    if(!$inset_log) {
        // Exibe a mensagem de erro
        echo "Erro na consulta: " . mysqli_error($conn);
    }    
}

?>