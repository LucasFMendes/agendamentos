<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include 'conexao.php';

$sql = "SELECT * FROM agendamentos ORDER BY data_inicial DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Agendamentos</title>
  <link rel="stylesheet" href="../public/css/estilo.css" />
</head>
<body>
  <h1>Agendamentos</h1>
  <a href="criar.php">➕ Criar Novo</a><br /><br />
  <?php if ($result->num_rows > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Cliente</th>
        <th>Data Inicial</th>
        <th>Data Final</th>
        <th>Ações</th> </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['titulo']) ?></td>
        <td><?= htmlspecialchars($row['descricao']) ?></td>
        <td><?= htmlspecialchars($row['nome_cliente']) ?></td>
        <td><?= $row['data_inicial'] ?></td>
        <td><?= $row['data_final'] ?></td>
        <td>
            <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
            <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este agendamento?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>Nenhum agendamento encontrado.</p>
  <?php endif; ?>
  <br />
  <a href="../public/index.php">Voltar ao início</a>
</body>
</html>