<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM agendamentos WHERE id=$id";
$res = $conn->query($sql);
$agendamento = $res->fetch_assoc();

if ($_POST) {
  $titulo = $_POST['titulo'];
  $desc = $_POST['descricao'];
  $cliente = $_POST['nome_cliente'];
  $inicio = $_POST['data_inicial'];
  $fim = $_POST['data_final'];

  $sql = "UPDATE agendamentos SET
          titulo='$titulo', descricao='$desc', nome_cliente='$cliente',
          data_inicial='$inicio', data_final='$fim'
          WHERE id=$id";

  if ($conn->query($sql)) {
    header('Location: listar.php');
  } else {
    echo "Erro: " . $conn->error;
  }
}
?>

<form method="post">
  <h2>Editar Agendamento</h2>
  <input type="text" name="titulo" value="<?= $agendamento['titulo'] ?>" required><br>
  <input type="text" name="descricao" value="<?= $agendamento['descricao'] ?>"><br>
  <input type="text" name="nome_cliente" value="<?= $agendamento['nome_cliente'] ?>" required><br>
  <input type="datetime-local" name="data_inicial" value="<?= str_replace(' ', 'T', $agendamento['data_inicial']) ?>" required><br>
  <input type="datetime-local" name="data_final" value="<?= str_replace(' ', 'T', $agendamento['data_final']) ?>" required><br>
  <button type="submit">Atualizar</button>
</form>
