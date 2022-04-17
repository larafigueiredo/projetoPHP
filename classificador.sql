-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Abr-2022 às 00:59
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `classificador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hierarquia`
--

CREATE TABLE `hierarquia` (
  `relacao` int(50) DEFAULT NULL,
  `condicao` text DEFAULT NULL,
  `id_termo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hierarquia`
--

INSERT INTO `hierarquia` (`relacao`, `condicao`, `id_termo`) VALUES
(28, 'ASC', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `termos`
--

CREATE TABLE `termos` (
  `id_termo` int(50) NOT NULL,
  `descricao` varchar(140) NOT NULL,
  `data_submissao` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `data_alteracao` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `data_revisao` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `termo` varchar(50) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `termos`
--

INSERT INTO `termos` (`id_termo`, `descricao`, `data_submissao`, `data_alteracao`, `data_revisao`, `termo`, `id_utilizador`, `ativo`) VALUES
(25, 'dasd', '2022-04-17 17:29:21.097642', '2022-04-17 17:47:14.000000', '2022-04-17 17:29:21.097642', 'asd', 0, 0),
(26, 'teste', '2022-04-17 18:02:40.289207', '2022-04-17 18:02:40.289207', '2022-04-17 18:02:40.289207', 'tes', 33, 1),
(27, 'dasda', '2022-04-17 18:04:07.006511', '2022-04-17 22:21:40.000000', '2022-04-17 18:04:07.006511', '111', 33, 1),
(28, 'vb', '2022-04-17 18:04:41.523817', '2022-04-17 18:04:41.523817', '2022-04-17 18:04:41.523817', 'b', 34, 1),
(29, 'tes', '2022-04-17 22:13:44.001594', '2022-04-17 22:13:44.001594', '2022-04-17 22:13:44.001594', 'asdas', 33, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `adm` int(1) NOT NULL DEFAULT 0,
  `token` varchar(32) NOT NULL,
  `confirmado` int(1) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`email`, `senha`, `nome`, `adm`, `token`, `confirmado`, `id`, `ativo`) VALUES
('teste@teste.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Lucas Deanoa', 1, '3BRVCM2J56PICNGI', 1, 25, 1),
('laraj0256@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Lara Júlia Medeiros Dantas da Silva Figueiredo', 0, 'T2BT57JHGTP3FV3P', 1, 33, 1),
('brunonf15@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'bruno figueiredo', 1, 'RSVJVH4FW6Z8MSVQ', 1, 34, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `termos`
--
ALTER TABLE `termos`
  ADD PRIMARY KEY (`id_termo`),
  ADD UNIQUE KEY `nome` (`termo`),
  ADD UNIQUE KEY `termo` (`termo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `termos`
--
ALTER TABLE `termos`
  MODIFY `id_termo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
