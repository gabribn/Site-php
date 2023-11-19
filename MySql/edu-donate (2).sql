-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2023 às 17:11
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `edu-donate`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `nome` varchar(50) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hash_senha` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `adm` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`nome`, `cpf`, `email`, `hash_senha`, `data_nascimento`, `adm`) VALUES
('admin', '03030303030', 'admin@admin', '$2y$10$IHrcBnQTWijrqREMUF.cfO576d6qLGNXCOsRte2XM0G2PAKoFkrGS', '2023-11-07', 1),
('Ziraldo', '22222222222', '2@22', '$2y$10$OpwmZJPls1qEO66u9Bj2Z.6A.gKExCBYtsbONtjX0DxOYwROd1QF2', '2023-11-09', 0),
('Maria', '33333333333', '3@3', '$2y$10$pwhOsDf96Wr2b.2i7ATTtOVPNAsQusCl6HiEYXfYh9UgC7pyFn98m', '2023-11-16', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id` int(11) NOT NULL,
  `valor` float DEFAULT NULL,
  `data` date DEFAULT NULL,
  `id_cliente` char(11) NOT NULL,
  `mensagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `doacao`
--

INSERT INTO `doacao` (`id`, `valor`, `data`, `id_cliente`, `mensagem`) VALUES
(12, 44, '2023-11-18', '33333333333', 'efdss'),
(13, 66, '2023-11-18', '33333333333', 'afwe'),
(15, 55, '2023-11-18', '22222222222', 'awfqwa'),
(16, 22, '2023-11-18', '22222222222', 'dfds');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`cpf`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
