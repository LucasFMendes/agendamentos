<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Agenda de Agendamentos</title>
  <link rel="stylesheet" href="css/estilo.css">
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background: #f0f2f5;
      padding: 50px;
      text-align: center;
    }
    h1 {
      color: #333;
      margin-bottom: 30px;
    }
    .menu {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
    }
    .menu a {
      display: inline-block;
      padding: 12px 25px;
      background: #007bff;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s ease;
    }
    .menu a:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <h1>Agenda de Agendamentos</h1>
  <div class="menu">
    <a href="../backend/criar.php">➕ Criar Novo Agendamento</a>
    <a href="../backend/listar.php">📋 Listar Agendamentos</a>
  </div>
</body>
</html>
