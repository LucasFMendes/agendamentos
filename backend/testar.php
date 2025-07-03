<?php
$conn = new mysqli("localhost", "root", "", "agenda_maria");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM agendamentos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Número de registros: " . $result->num_rows . "<br>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Título: " . $row["titulo"] . " - Cliente: " . $row["nome_cliente"] . "<br>";
    }
} else {
    echo "Nenhum agendamento encontrado.";
}

$conn->close();
?>
