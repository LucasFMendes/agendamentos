<?php
// conexão básica com MySQL
$host = 'localhost';
$user = 'root';
$senha = '';
$banco = 'agenda_maria';

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
  die("Deu ruim na conexão: " . $conn->connect_error);
}
?>

