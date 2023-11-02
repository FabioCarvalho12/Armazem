<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    
    
    <title>Armazém BR></title>
</head>
<body>
    <h1>Sistema de Armazém</h1>
    <p>Neste sistema, você pode cadastrar produtos de limpeza, higiene, hortifrúti e perecíveis.</p>
    <form action="inserir.php" method="post">
        <p>Insira os dados do produto:</p>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="limpeza">Limpeza</option>
            <option value="higiene">Higiene</option>
            <option value="hortifruti">Hortifrúti</option>
            <option value="pereciveis">Perecíveis</option>
        </select><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="0" required><br>
        <label for="validade">Validade:</label>
        <input type="date" id="validade" name="validade"><br>
        <input type="submit" value="Inserir">
    </form>
    <form action="produtos.php" method="get">
        <input type="submit" value="Visualizar">
    </form>
    
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

    // Consultar os dados do banco de dados
    $sql = "SELECT nome, categoria, quantidade, validade FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar os dados em uma tabela
        echo "<table><tr><th>Nome</th><th>Categoria</th><th>Quantidade</th><th>Validade</th><th>Ações</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["categoria"] . "</td><td>" . $row["quantidade"] . "</td><td>" . $row["validade"] . "</td>";
            echo "<td><a href='alterar.php?nome=".$row["nome"]."'>Alterar</a> | <a href='excluir.php?nome=".$row["nome"]."'>Excluir</a></td>";
            
        }
        echo "</table>";
    } else {
        header("Location: naoEncontrado.php");
    }

    // Fechar a conexão
    $conn->close();
    ?>
</body>
</html>