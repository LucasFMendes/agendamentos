<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $nome_cliente = $_POST['nome_cliente'];
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];

    $stmt = $conn->prepare("INSERT INTO agendamentos (titulo, descricao, nome_cliente, data_inicial, data_final) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $titulo, $descricao, $nome_cliente, $data_inicial, $data_final);

    if ($stmt->execute()) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Erro ao criar agendamento: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Criar Agendamento</title>
  <link rel="stylesheet" href="../public/css/estilo.css" />
</head>
<body>
  <h1>Criar Agendamento</h1>
  <form method="POST" action="">
    <label>Título:</label><br />
    <input type="text" name="titulo" required /><br />

    <label>Descrição:</label><br />
    <textarea name="descricao"></textarea><br />

    <label>Nome do Cliente:</label><br />
    <input type="text" name="nome_cliente" required /><br />

    <label>Data Inicial:</label><br />
    <input type="datetime-local" name="data_inicial" required /><br />

    <label>Data Final:</label><br />
    <input type="datetime-local" name="data_final" required /><br /><br />

    <button type="submit">Salvar</button>
  </form>
  <br />
  <a href="listar.php">Voltar para lista</a>
</body>
</html>
