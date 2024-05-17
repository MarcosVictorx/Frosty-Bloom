<?php
$servername = "localhost";
$username = "root";
$password = ""; // Coloque sua senha se tiver
$dbname = "frostybloom_db";

// Criando uma conexão com o servidor MySQL
$mysqli = new MySQLi($servername, $username, $password);

// Verificando a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Criando o banco de dados frostybloom_db
$sql = "CREATE DATABASE IF NOT EXISTS frostybloom_db";
if ($mysqli->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso<br>";
} else {
    echo "Erro ao criar banco de dados: " . $mysqli->error;
}

// Selecionando o banco de dados frostybloom_db
$mysqli->select_db($dbname);

// Criando a tabela cliente
$sql = "CREATE TABLE IF NOT EXISTS cliente (
    clientid INT AUTO_INCREMENT PRIMARY KEY,
    nameclient VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phonenumber VARCHAR(20) NOT NULL
)";
if ($mysqli->query($sql) === TRUE) {
    echo "Tabela cliente criada com sucesso<br>";
} else {
    echo "Erro ao criar tabela cliente: " . $mysqli->error;
}

// Criando a tabela produtos
$sql = "CREATE TABLE IF NOT EXISTS produtos (
    productid INT AUTO_INCREMENT PRIMARY KEY,
    NameProduct VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    amount INT NOT NULL,
    clientid INT,
    flavor VARCHAR(200), -- Adicionando o campo flavor
    FOREIGN KEY (clientid) REFERENCES cliente(clientid)
)";
if ($mysqli->query($sql) === TRUE) {
    echo "Tabela produtos criada com sucesso<br>";
} else {
    echo "Erro ao criar tabela produtos: " . $mysqli->error;
}

// Fechando a conexão
$mysqli->close();
?>
