<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frostybloom_db"; // Substitua "frostybloom_db" pelo nome do seu banco de dados

// Criando a conexão
$mysqli = new MySQLi($servername, $username, $password, $dbname);

// Verificando a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Obtendo os dados do formulário
$nameClient = $_POST['nameClient'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$nameProduct = $_POST['nameProduct'];
$amount = $_POST['amount'];
$price = $_POST['price'];
$flavor = $_POST['flavor'];

// Preparando a query de inserção
$sql_cliente = "INSERT INTO cliente (nameClient, email, phoneNumber) VALUES ('$nameClient', '$email', '$phoneNumber')";
$sql_produto = "INSERT INTO produtos (nameProduct, price, amount, flavor) VALUES ('$nameProduct', '$price', '$amount', '$flavor')";

// Executando as consultas
if ($mysqli->query($sql_cliente) === TRUE && $mysqli->query($sql_produto) === TRUE) {
    echo "Dados salvos com sucesso";
} else {
    echo "Erro ao salvar dados: " . $mysqli->error;
}

// Fechando a conexão
$mysqli->close();
?>
