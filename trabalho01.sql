-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2020 às 23:43
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientefinal`
--

CREATE TABLE `clientefinal` (
  `IDdoCliente` int(11) NOT NULL,
  `NomeCompleto` varchar(255) NOT NULL,
  `Documento` int(11) NOT NULL,
  `DatadeNascimento` int(11) NOT NULL,
  `Cidade` varchar(255) NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientefinal`
--

INSERT INTO `clientefinal` (`IDdoCliente`, `NomeCompleto`, `Documento`, `DatadeNascimento`, `Cidade`, `Estado`) VALUES
(1, '1', 1, 1, '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `data_res` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes2`
--

CREATE TABLE `clientes2` (
  `IDdoCliente` int(11) NOT NULL,
  `NomeCompleto` int(11) NOT NULL,
  `Documento` int(11) NOT NULL,
  `DatadeNascimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE `quartos` (
  `id_do_quarto` int(255) NOT NULL,
  `n_da_porta` int(255) NOT NULL,
  `tp_quarto` int(1) NOT NULL,
  `vr_diaria` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id_do_quarto`, `n_da_porta`, `tp_quarto`, `vr_diaria`, `status`) VALUES
(1, 11, 0, 1, 0),
(2, 1, 1, 1, 0),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0),
(5, 1, 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD UNIQUE KEY `data_res` (`data_res`);

--
-- Índices para tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`id_do_quarto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `id_do_quarto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
