<?php
include 'conexao.php';

// Verifica se o ID foi passado via GET
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];

// Busca os dados do agendamento
$sql = "SELECT * FROM agendamentos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$agendamento = $res->fetch_assoc();

// Se o agendamento não for encontrado, redireciona
if (!$agendamento) {
    header('Location: listar.php');
    exit;
}

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $nome_cliente = $_POST['nome_cliente'];
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];

    $sql = "UPDATE agendamentos SET
            titulo = ?, descricao = ?, nome_cliente = ?,
            data_inicial = ?, data_final = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $titulo, $descricao, $nome_cliente, $data_inicial, $data_final, $id);

    if ($stmt->execute()) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Editar Agendamento</title>
  <link rel="stylesheet" href="../public/css/estilo.css" />
</head>
<body>
  <h1>Editar Agendamento</h1>
  <form method="post" action="">
    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($agendamento['titulo']) ?>" required><br>

    <label>Descrição:</label><br>
    <textarea name="descricao"><?= htmlspecialchars($agendamento['descricao']) ?></textarea><br>

    <label>Nome do Cliente:</label><br>
    <input type="text" name="nome_cliente" value="<?= htmlspecialchars($agendamento['nome_cliente']) ?>" required><br>

    <label>Data Inicial:</label><br>
    <input type="datetime-local" name="data_inicial" value="<?= str_replace(' ', 'T', $agendamento['data_inicial']) ?>" required><br>

    <label>Data Final:</label><br>
    <input type="datetime-local" name="data_final" value="<?= str_replace(' ', 'T', $agendamento['data_final']) ?>" required><br><br>

    <button type="submit">Atualizar</button>
  </form>
  <br>
  <a href="listar.php">Voltar para lista</a>
</body>
</html>