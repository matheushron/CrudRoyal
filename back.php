<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Produtos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS ProdutosPapelaria (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

$sql = "SELECT COUNT(*) AS count FROM ProdutosPapelaria";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $sql = "INSERT INTO ProdutosPapelaria (nome, quantidade, preco) VALUES ('Lapis', 50, 1.50)";
    if (!$conn->query($sql)) {
        die("Error inserting data: " . $conn->error);
    }
    
    $sql = "INSERT INTO ProdutosPapelaria (nome, quantidade, preco) VALUES ('Caneta', 50, 2.50)";
    if (!$conn->query($sql)) {
        die("Error inserting data: " . $conn->error);
    }
    
    $sql = "INSERT INTO ProdutosPapelaria (nome, quantidade, preco) VALUES ('Borracha', 50, 3.00)";
    if (!$conn->query($sql)) {
        die("Error inserting data: " . $conn->error);
    }
}

$sql = "SELECT * FROM ProdutosPapelaria";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroDeLapis = intval($_POST['NumeroDeLapis']);
    $numeroDeCanetas = intval($_POST['NumeroDeCanetas']);
    $numeroDeBorrachas = intval($_POST['NumeroDeBorrachas']);

    $conta = ($numeroDeLapis * 1.5) + ($numeroDeCanetas * 2.5) + ($numeroDeBorrachas * 3);

    // Atualiza as quantidades no banco de dados.
    $sql = "UPDATE ProdutosPapelaria SET quantidade = quantidade - ? WHERE nome = 'Lapis'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numeroDeLapis);
    $stmt->execute();

    $sql = "UPDATE ProdutosPapelaria SET quantidade = quantidade - ? WHERE nome = 'Caneta'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numeroDeCanetas);
    $stmt->execute();

    $sql = "UPDATE ProdutosPapelaria SET quantidade = quantidade - ? WHERE nome = 'Borracha'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numeroDeBorrachas);
    $stmt->execute();

    $stmt->close();


    $sql = "SELECT * FROM ProdutosPapelaria";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nome</th><th>Preço</th><th>Quantidade</th></tr>";

        while($row = $result->fetch_assoc()) {
            $quantidade = $row["quantidade"];
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
            echo "<td>$" . htmlspecialchars($row["preco"]) . "</td>";
            echo "<td>" . htmlspecialchars($quantidade) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No products found</p>";
    }

    // Display success message
    $MensagemFinal = "Sua conta deu R$".$conta;
}

$conn->close();
?>

