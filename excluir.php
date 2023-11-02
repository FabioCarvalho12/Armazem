<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "armazem";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegar o nome do produto a ser excluído
$nome = $_GET["nome"];

// Excluir o produto do banco de dados
$sql = "DELETE FROM produtos WHERE nome = '$nome'";
if (mysqli_query($conn, $sql)) {
    header("Location: excluido.php");
} else {
    echo "Erro: " . mysqli_error($conn);
}

// Fechar a conexão
$conn->close();
?>