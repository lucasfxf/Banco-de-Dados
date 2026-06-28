-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Out-2025 às 03:13
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS mundo_dastelas;
USE mundo_dastelas;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `nota_publico` decimal(3,1) DEFAULT 0.0,
  `data_lancamento` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `filmes` (`id`, `nome`, `descricao`, `nota_publico`, `data_lancamento`, `created_at`) VALUES
(1, 'filme', '0', 10.0, '2025-07-09', '2025-10-09 01:07:52');

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `nota_publico` decimal(3,1) DEFAULT 0.0,
  `temporadas` int(11) DEFAULT 1,
  `episodios` int(11) DEFAULT 1,
  `data_lancamento` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `series` (`id`, `nome`, `descricao`, `nota_publico`, `temporadas`, `episodios`, `data_lancamento`, `created_at`) VALUES
(1, 'ASDasd', '0', 2.0, 10, 2, '0000-00-00', '2025-10-09 01:08:17');

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created_at`) VALUES
(2, 'Emanuel', 'emanuel201621@gmail.com', '$2y$10$3J1v8p8zvZ8.y.iCESgGWOBtvG26XJUwtvWecvUJqultB271IHAZi', '2025-10-09 00:50:27');

ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


USE mundo_dastelas;

CREATE INDEX idx_filmes_nota ON filmes (nota_publico);
CREATE INDEX idx_series_nota ON series (nota_publico);

CREATE VIEW view_filmes_nota AS
SELECT nome, nota_publico
FROM filmes
ORDER BY nota_publico DESC;

CREATE VIEW view_series_nota AS
SELECT nome, temporadas, nota_publico
FROM series
WHERE nota_publico > 5;

CREATE TABLE historico_usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DELIMITER //
CREATE TRIGGER trig_novo_usuario
AFTER INSERT ON usuarios
FOR EACH ROW
BEGIN
  INSERT INTO historico_usuarios (usuario_id) VALUES (NEW.id);
END //
DELIMITER ;

SELECT COUNT(*) FROM filmes;
SELECT AVG(nota_publico) FROM series;
SELECT nome FROM filmes GROUP BY nome;
SELECT nome FROM series GROUP BY nome;
SELECT nome FROM filmes ORDER BY data_lancamento DESC;
SELECT nome FROM series ORDER BY nota_publico DESC;
SELECT nome FROM usuarios WHERE nome LIKE '%a%';
SELECT nome FROM filmes WHERE nome LIKE '%i%';
