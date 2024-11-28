<?php 
//CONFIGURAÇÕES DE CREDENCIAIS
$dbHost = 'localhost';
$dbUsername = 'jonasborges_zz2';
$dbPassword = '0uG5Z1>o=qLp.#';
$dbName = 'jonasborges_db_zz2';


//CONEXAO COM NOSSO BANCO DE DADOS
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName);

//VERIFICAR CONEXAO
if($conexao->connect_error){
    die("Falha ao se comunicar com banco de dados: ". $conexao->connect_error);
}

?>