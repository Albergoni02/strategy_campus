-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2024 às 22:48
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
  `vencedor` int DEFAULT NULL,
  `local` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `horario` time DEFAULT NULL,
  `dificuldade` varchar(100) NOT NULL,
  `totalPartida` int DEFAULT NULL,
  `modoJogo` varchar(100) NOT NULL,
  `nomeJogo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jogador1` int DEFAULT NULL,
  `jogador2` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`idPartida`, `vencedor`, `local`, `data`, `horario`, `dificuldade`, `totalPartida`, `modoJogo`, `nomeJogo`, `jogador1`, `jogador2`) VALUES
(24, NULL, 'Quadra', '2024-10-10', '22:29:53', 'intermediario', 5, 'tabuleiro', 'Batalha Naval', 5, 7),
(25, NULL, 'Refeitorio', '2024-10-10', '22:31:46', 'iniciante', 5, 'online', 'Clash Royale', 6, 8),
(26, NULL, 'Biblioteca', '2024-10-10', '22:32:44', 'iniciante', 7, 'tabuleiro', 'Xadrez', 5, 6),
(27, NULL, 'Saguão', '2024-10-10', '22:34:33', 'avançado', 8, 'tabuleiro', 'Damas', 8, 6);

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
(5, 'Thor', '1c1509ac7c97a96e079877efc3abe055', 'informatica', 'Thorraio@gmail.com', 'img/Chris-Hemsworth-8.jpg'),
(6, 'Chris', '220e41ff880ecd1df218818bee726363', 'informatica', 'Capitaoamerica@gmail.com', 'img/chrisevansresult_0013c725.jpeg'),
(7, 'Mbappe', 'af2dc50202cf969450db7c2c35a75340', 'mecanica', 'Mbappe@gmail.com', 'img/mbappe.jpeg'),
(8, 'B. Jordan', 'c908d3f69f5c3b7e7ed6a71dd4136596', 'automacao', 'michael@gmail.com', 'img/Michael B. Jordan.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`),
  ADD KEY `fk_jogador1` (`jogador1`),
  ADD KEY `fk_jogador2` (`jogador2`);

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
  MODIFY `idPartida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `fk_jogador1` FOREIGN KEY (`jogador1`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_jogador2` FOREIGN KEY (`jogador2`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
