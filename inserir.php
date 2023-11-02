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

// Pegar os dados do formulário
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$quantidade = $_POST["quantidade"];
$validade = $_POST["validade"];

// Inserir os dados no banco de dados
$sql = "INSERT INTO produtos (nome, categoria, quantidade, validade) VALUES ('$nome', '$categoria', '$quantidade', '$validade')";
if (mysqli_query($conn, $sql)) {
    header("Location: inserida.php");
} else {
    echo "Erro: " . mysqli_error($conn);
}

// Fechar a conexão
$conn->close();
?>