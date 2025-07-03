CREATE DATABASE IF NOT EXISTS agenda_maria;
USE agenda_maria;

CREATE TABLE IF NOT EXISTS agendamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  descricao TEXT,
  nome_cliente VARCHAR(255) NOT NULL,
  data_inicial DATETIME NOT NULL,
  data_final DATETIME NOT NULL
);
