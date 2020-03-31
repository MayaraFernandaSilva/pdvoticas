-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30-Out-2018 às 03:13
-- Versão do servidor: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_juridica`
--

CREATE TABLE `cad_juridica` (
  `id` int(11) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `nomeFantasia` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `inscEstadual` varchar(255) NOT NULL,
  `isento` int(11) NOT NULL,
  `endereco` text NOT NULL,
  `numero` varchar(50) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `uf` varchar(25) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `complemento` text NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `observation` text NOT NULL,
  `dataCadastro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cad_juridica`
--

INSERT INTO `cad_juridica` (`id`, `razaoSocial`, `nomeFantasia`, `cnpj`, `inscEstadual`, `isento`, `endereco`, `numero`, `bairro`, `municipio`, `uf`, `cep`, `complemento`, `telefone`, `celular`, `email`, `site`, `observation`, `dataCadastro`) VALUES
(1, 'Oticas Real', 'Oticas Vitreo', '11.111.111/1112-33', '111.111.111.133', 0, 'Rua Antonio Carlos', '675', 'Centro', 'Entre Rios', 'BA', '48180-000', 'Atras da N. Modas', '14998142288', '(44)4 4444-4444', 'cdsx120@hotmail.om', 'pipocaflix.com', '', '09/10/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_pessoal`
--

CREATE TABLE `cad_pessoal` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `estado_civil` varchar(255) NOT NULL,
  `data_nascimento` varchar(250) NOT NULL,
  `nascionalidade` varchar(255) NOT NULL,
  `naturalidade` varchar(255) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `uf_endereco` varchar(20) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `complemento` text NOT NULL,
  `data_cadastro` varchar(250) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `obsevacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoqueproduct`
--

CREATE TABLE `estoqueproduct` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `dateCompra` varchar(255) NOT NULL,
  `codLancamento` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `obs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `vendedor` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `codigoOS` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `prazo` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `desconto` varchar(255) NOT NULL,
  `pagamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `productos`
--

CREATE TABLE `productos` (
  `idGer` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qtd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_register`
--

CREATE TABLE `product_register` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `codigoBarra` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `contabil` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `dateCad` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `obs` text NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `icms` varchar(50) NOT NULL,
  `Cfop` varchar(50) NOT NULL,
  `tributoStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `register_login`
--

CREATE TABLE `register_login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `register_login`
--

INSERT INTO `register_login` (`id`, `nome`, `codigo`, `cpf`, `sexo`, `cargo`, `nivel_acesso`, `login`, `senha`, `status`, `obs`) VALUES
(7, 'Josué Henrique', 'CC0001', '069.475.075-99', 'Masculino', 'Web Developer', 2, 'demo123', '25f9e794323b453885f5181f1b624d0b', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cad_juridica`
--
ALTER TABLE `cad_juridica`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cad_pessoal`
--
ALTER TABLE `cad_pessoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoqueproduct`
--
ALTER TABLE `estoqueproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_register`
--
ALTER TABLE `product_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_login`
--
ALTER TABLE `register_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cad_juridica`
--
ALTER TABLE `cad_juridica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cad_pessoal`
--
ALTER TABLE `cad_pessoal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `estoqueproduct`
--
ALTER TABLE `estoqueproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_register`
--
ALTER TABLE `product_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `register_login`
--
ALTER TABLE `register_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
