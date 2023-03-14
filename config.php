<?php

	define('HOST', 'localhost:3306');
	define('USER', 'root');
	define('PASS', '');
	define('BASE', 'crud');

	$conn = new MySQLi(HOST,USER,PASS,BASE);

	// Checa se houve erro na conexão
	if (!$conn){
		die("Erro de conexão: " . mysqli_connect_error());
	}
?>