<?php
$conn = new mysqli("127.0.0.1", "root", "", "agenda_maria"); // Altere o nome do banco de dados para 'agenda_maria'

if ($conn->connect_errno) {
    echo "Falha ao conectar: " . $conn->connect_error;
    exit();
}
?>