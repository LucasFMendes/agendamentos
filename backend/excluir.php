<?php
include 'conexao.php';

// Verifica se o ID foi passado via GET
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];

// Usa prepared statement para segurança
$sql = "DELETE FROM agendamentos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  header('Location: listar.php');
  exit; // É importante usar exit após o header
} else {
  echo "Erro ao excluir: " . $conn->error;
}
?>