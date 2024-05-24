<?php
$servername = "localhost";
$username = "root";
$password = "";

// Criando a conexão
$conn = mysqli_connect($servername, $username, $password);

// Verificando a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verificando se o banco de dados existe
$dbname = "EstoqueTesteBKP";
$result = mysqli_query($conn, "SHOW DATABASES LIKE '$dbname'");

if (mysqli_num_rows($result) == 0) {
    // O banco de dados não existe, vamos tentar criá-lo
    $sql_create_db = "CREATE DATABASE $dbname";
    if (mysqli_query($conn, $sql_create_db)) {
        echo "Banco de dados criado com sucesso";
    } else {
        echo "Erro ao criar o banco de dados: " . mysqli_error($conn);
    }
}

// Conectando ao banco de dados especificado
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificando a nova conexão
if (!$conn) {
    die("Conexão falhou após a criação do banco de dados: " . mysqli_connect_error());
}

// Criação da tabela (se ainda não existir)
$sql_create_table_cliente = "CREATE TABLE IF NOT EXISTS cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
)";

$sql_create_table_produto = "CREATE TABLE IF NOT EXISTS produto (
    idProduct INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduct VARCHAR(255) NOT NULL,
    valor INT NOT NULL
)";

if (mysqli_query($conn, $sql_create_table_cliente) && mysqli_query($conn, $sql_create_table_produto)) {
    echo "Tabelas criadas com sucesso ou já existentes";
} else {
    echo "Erro ao criar as tabelas: " . mysqli_error($conn);
}

// Fechando a conexão
mysqli_close($conn);
?>
