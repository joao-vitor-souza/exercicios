<?php

// Definindo as credenciais e o banco de dados que permitirão a conexão.
$hostname = "localhost";
$user = "root";
$password = "root";
$database = "cadastro";

// Criando uma instância de conexão.
$conexao = mysqli_connect($hostname, $user, $password, $database);

// Se True, então mostramos uma mensagem de erro.
if(mysqli_connect_error()){
	echo "Falha na conexão com o Banco de Dados: ".mysqli_connect_error();
}

?>