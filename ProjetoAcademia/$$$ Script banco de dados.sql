-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 26-Maio-2021 às 22:12
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `academia`
--
CREATE DATABASE IF NOT EXISTS `academia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `academia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Id` varchar(256) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `EmailConfirmado` tinyint(1) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Foto` varchar(256) NOT NULL,
  `StatusCadastro` tinyint(1) NOT NULL,
  `DataCriacao` datetime NOT NULL,
  `DataNascimento` datetime NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Logradouro` varchar(256) NOT NULL,
  `EnderecoNumero` int(11) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Estado` char(2) NOT NULL,
  `Celular` varchar(12) DEFAULT NULL,
  `Telefone` varchar(11) DEFAULT NULL,
  `ProdutoId` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  KEY `ProdutoId` (`ProdutoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `Id` varchar(256) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `Id` varchar(256) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  `Preco` decimal(10,0) NOT NULL,
  `DataInicio` datetime NOT NULL,
  `DataFim` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` varchar(256) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `EmailConfirmado` tinyint(1) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Foto` varchar(256) NOT NULL,
  `StatusCadastro` tinyint(1) NOT NULL,
  `DataCriacao` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Id_2` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nome`, `Email`, `EmailConfirmado`, `Password`, `Foto`, `StatusCadastro`, `DataCriacao`) VALUES
('03fa4c68-5b36-4ca3-9cf2-2211063d96d1', 'Administrador', 'administrador@ritmoacelerado.com', 1, '123456', 'c62887ab-0589-451a-80e5-4b0a7a9416e1.JPG', 2, '2021-05-22 19:10:05'),
('6ab382e9-6893-4a21-95a2-5c3fe73bfc56', 'Administrador2', 'administrador2@ritmoacelerado.com', 1, '123456', 'd3d348ff-2530-48cd-846e-468edd123ecb.jpg', 2, '2021-05-22 19:19:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosfuncoes`
--

CREATE TABLE IF NOT EXISTS `usuariosfuncoes` (
  `UsuarioId` varchar(256) NOT NULL,
  `FuncaoId` varchar(256) NOT NULL,
  PRIMARY KEY (`FuncaoId`),
  UNIQUE KEY `PK_UsuariosFuncoes` (`UsuarioId`,`FuncaoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_Produtos` FOREIGN KEY (`ProdutoId`) REFERENCES `produtos` (`Id`);

--
-- Limitadores para a tabela `usuariosfuncoes`
--
ALTER TABLE `usuariosfuncoes`
  ADD CONSTRAINT `FK_FuncaoId` FOREIGN KEY (`FuncaoId`) REFERENCES `funcoes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UsuarioId` FOREIGN KEY (`UsuarioId`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de Dados: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banco`;