<?php
// Configure as credenciais do banco de dados
$servername = "localhost"; // Endereço do servidor MySQL
$username = "seu_usuario"; // Nome de usuário do MySQL
$password = "sua_senha"; // Senha do MySQL
$dbname = "nome_do_banco"; // Nome do banco de dados

// Crie uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password);

// Verifique a conexão
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Verifique se o banco de dados existe
$result = $conn->query("SHOW DATABASES LIKE '$dbname'");

// Se o banco de dados não existir, crie-o
if ($result->num_rows == 0) {
  $sql = "CREATE DATABASE $dbname";
  if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso";
  } else {
    echo "Erro ao criar banco de dados: " . $conn->error;
  }
}

// Conecte-se agora ao banco de dados criado
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão novamente após criar o banco de dados
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

echo "Conexão bem-sucedida ao banco de dados";

$conn->close(); // Fecha a conexão com o banco de dados
?>
