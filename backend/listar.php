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
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['titulo']) ?></td>
        <td><?= htmlspecialchars($row['descricao']) ?></td>
        <td><?= htmlspecialchars($row['nome_cliente']) ?></td>
        <td><?= $row['data_inicial'] ?></td>
        <td><?= $row['data_final'] ?></td>
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
