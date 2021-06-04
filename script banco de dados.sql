--
-- Base de Dados: `academia`
--
CREATE DATABASE IF NOT EXISTS `academia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `academia`;

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
  UNIQUE KEY `PK_UsuarioId` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nome`, `Email`, `EmailConfirmado`, `Password`, `Foto`, `StatusCadastro`, `DataCriacao`) VALUES
('03fa4c68-5b36-4ca3-9cf2-2211063d96d1', 'Administrador', 'administrador@ritmoacelerado.com', 1, '123456', 'c62887ab-0589-451a-80e5-4b0a7a9416e1.JPG', 2, '2021-05-22 19:10:05'),
('6ab382e9-6893-4a21-95a2-5c3fe73bfc56', 'Administrador2', 'administrador2@ritmoacelerado.com', 1, '123456', 'd3d348ff-2530-48cd-846e-468edd123ecb.jpg', 2, '2021-05-22 19:19:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `Id` varchar(256) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `PK_FuncaoId` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcoes`
--

INSERT INTO `funcoes` (`Id`, `Nome`) VALUES
('53065cf1-64e4-48e0-9f1f-671102b36e27', 'Vendedor'),
('c525ebec-1620-4338-8e00-d8987c09b69d', 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosfuncoes`
--

CREATE TABLE IF NOT EXISTS `usuariosfuncoes` (
  `UsuarioId` varchar(256) NOT NULL,
  `FuncaoId` varchar(256) NOT NULL,
  PRIMARY KEY (`UsuarioId`,`FuncaoId`),
  UNIQUE KEY `PK_UsuariosFuncoes` (`UsuarioId`,`FuncaoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariosfuncoes`
--

INSERT INTO `usuariosfuncoes` (`UsuarioId`, `FuncaoId`) VALUES
('03fa4c68-5b36-4ca3-9cf2-2211063d96d1', 'c525ebec-1620-4338-8e00-d8987c09b69d');

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
  PRIMARY KEY (`Id`),
  UNIQUE KEY `PK_ProdutoId` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Id`, `Nome`, `Preco`, `DataInicio`, `DataFim`) VALUES
('18a2b58f-46a6-41f1-8891-5ccbe9b3c7a4', 'Pagamento Semestral', '171.00', '2021-05-01 00:00:00', '9999-12-31 00:00:00'),
('e4202321-0b1f-4386-9d05-31d6209b47df', 'Pagamento Mensal', '60.00', '2021-05-01 00:00:00', '2021-05-30 17:55:10'),
('e7f30465-1f7e-4a91-be19-fb4fefb7c1e7', 'Pagamento Anual', '300.79', '2021-05-01 00:00:00', '9999-12-31 00:00:00');

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
  UNIQUE KEY `PK_ClienteId` (`Id`),
  KEY `ProdutoId` (`ProdutoId`),
  FOREIGN KEY (`ProdutoId`) REFERENCES `produtos` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`Id`, `Nome`, `Email`, `EmailConfirmado`, `Password`, `Foto`, `StatusCadastro`, `DataCriacao`, `DataNascimento`, `Cpf`, `Logradouro`, `EnderecoNumero`, `Cidade`, `Estado`, `Celular`, `Telefone`, `ProdutoId`) VALUES
('0a1206f2-576b-4a09-a3a6-9069cd539ba7', 'Teste', 'teste@email', 1, '123456', '0a1206f2-576b-4a09-a3a6-9069cd539ba721.jpg', 0, '2021-06-03 18:28:02', '1994-06-03 00:00:00', '12345678912', '12345678912', 2147483647, '12345678912', '12', '12345678912', '12345678912', '18a2b58f-46a6-41f1-8891-5ccbe9b3c7a4'),
('3d5cd9a8-acc5-40f8-9193-cb3b60d8e12f', 'Teste', 'teste@email', 1, '123456', '3d5cd9a8-acc5-40f8-9193-cb3b60d8e12f21.jpg', 0, '2021-06-03 18:27:38', '2021-06-03 00:00:00', '12345678912', '12345678912', 2147483647, '12345678912', '12', '12345678912', '12345678912', '18a2b58f-46a6-41f1-8891-5ccbe9b3c7a4'),
('fdd7fa07-eb50-4058-87de-6e5074fbe5d1', 'Teste', 'teste@email', 1, '123456789', 'fdd7fa07-eb50-4058-87de-6e5074fbe5d121.jpg', 0, '2021-06-03 18:25:50', '0000-00-00 00:00:00', '12345678912', '12345678912', 2147483647, '12345678912', '12', '12345678912', '12345678912', '18a2b58f-46a6-41f1-8891-5ccbe9b3c7a4');

--
-- Limitadores para a tabela `clientes`
--
-- ALTER TABLE `clientes`
  -- ADD CONSTRAINT `FK_Produtos` FOREIGN KEY (`ProdutoId`) REFERENCES `produtos` (`Id`);
