<?php

// Definindo as credenciais e o banco de dados que permitirão a conexão.
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$hostname = $cleardb_url["host"];
$user = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"], 1);

// Criando uma instância de conexão.
$conexao = mysqli_connect($hostname, $user, $password, $database);

// Se True, então mostramos uma mensagem de erro.
if(mysqli_connect_error()){
	echo "Falha na conexão com o Banco de Dados: ".mysqli_connect_error();
}

?>