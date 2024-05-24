<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Estoque"; // Substitua "Estoque" pelo nome do seu banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$nomeProduct = $_POST['nomeProduct'];
$valor = $_POST['valor'];

// Preparando a query de inserção
$sql_cliente = "INSERT INTO cliente (nome, email) VALUES ('$nome', '$email')";
$sql_produto = "INSERT INTO produto (nomeProduct, valor) VALUES ('$nomeProduct', '$valor')";

if ($conn->query($sql_cliente) === TRUE && $conn->query($sql_produto) === TRUE) {
    echo "Dados salvos com sucesso";
} else {
    echo "Erro ao salvar dados: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
