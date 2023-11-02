
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>
    <a href="index.php" id="voltar">Voltar</a>
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