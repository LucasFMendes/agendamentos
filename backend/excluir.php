<?php
include 'conexao.php';
$id = $_GET['id'];

$sql = "DELETE FROM agendamentos WHERE id=$id";

if ($conn->query($sql)) {
  header('Location: listar.php');
} else {
  echo "Erro ao excluir: " . $conn->error;
}
?>
