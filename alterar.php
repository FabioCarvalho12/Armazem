<link rel="stylesheet" href="CSS/style.css">
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
// Alterar dados no banco de dados 
 $nome = $_GET["nome"];

// Pegar o nome do produto a ser alterado
$sql = "SELECT * FROM produtos WHERE nome = '$nome'"; // Consultar os dados do produto
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); // Pegar os dados do produto em um array associativo
    $nome = $row["nome"];
    $categoria = $row["categoria"];
    $quantidade = $row["quantidade"];
    $validade = $row["validade"];
    // Mostrar um formulário com os dados do produto preenchidos
    echo "<form action='alterar.php' method='post'>";
    echo "<p>Altere os dados do produto:</p>";
    echo "<label for='nome'>Nome:</label>";
    echo "<input type='text' id='nome' name='nome' value='$nome' readonly><br>"; // O nome não pode ser alterado
    echo "<label for='categoria'>Categoria:</label>";
    echo "<select id='categoria' name='categoria' value='$categoria'>";
    echo "<option value='limpeza'>Limpeza</option>";
    echo "<option value='higiene'>Higiene</option>";
    echo "<option value='hortifruti'>Hortifrúti</option>";
    echo "<option value='pereciveis'>Perecíveis</option>";
    echo "</select><br>";
    echo "<label for='quantidade'>Quantidade:</label>";
    echo "<input type='number' id='quantidade' name='quantidade' value='$quantidade' min='0'><br>";
    echo "<label for='validade'>Validade:</label>";
    echo "<input type='date' id='validade' name='validade' value='$validade'><br>";
    echo "<input type='submit' value='Alterar'>";
    echo "</form>";
} else {
    header("Location: naoEncontrado.php");
}

// Se o formulário foi enviado, pegar os novos dados e atualizar o banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $quantidade = $_POST["quantidade"];
    $validade = $_POST["validade"];
    $sql = "UPDATE produtos SET categoria = '$categoria', quantidade = '$quantidade', validade = '$validade' WHERE nome = '$nome'";
    if (mysqli_query($conn, $sql)) {
        header("Location: atualizado.php");
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
}
// Fechar a conexão
$conn->close();
?>