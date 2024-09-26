-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Set-2024 às 22:43
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `strategy_campus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `idJogo` int NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dificuldade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `idPartida` int NOT NULL,
  `vencedor` varchar(100) DEFAULT NULL,
  `local` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `horario` time DEFAULT NULL,
  `dificuldade` varchar(100) NOT NULL,
  `totalPartida` int DEFAULT NULL,
  `modoJogo` varchar(100) NOT NULL,
  `nomejogo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`idPartida`, `vencedor`, `local`, `data`, `horario`, `dificuldade`, `totalPartida`, `modoJogo`, `nomejogo`) VALUES
(1, NULL, 'quq', '2024-09-26', '00:00:00', 'iniciante', 1, 'tabuleiro', 'xaderz'),
(2, NULL, 'quq', '2024-09-26', '22:38:46', 'iniciante', 1, 'tabuleiro', 'xaderz'),
(3, NULL, 'quq', '2024-09-26', '22:41:54', 'iniciante', 1, 'tabuleiro', 'xaderz'),
(4, NULL, 'quq', '2024-09-26', '22:42:08', 'iniciante', 1, 'tabuleiro', 'xaderz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `senha`, `curso`, `email`, `foto`) VALUES
(1, 'alber', 'c20ad4d76fe97759aa27a0c99bff6710', 'informatica', 'alber@gmail.com', 'img/dificil.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `partida`
--
ALTER TABLE `partida`
  MODIFY `idPartida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
