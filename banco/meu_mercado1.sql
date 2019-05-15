-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql995.umbler.com
-- Generation Time: 15-Maio-2019 às 09:45
-- Versão do servidor: 5.6.40-log
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meu_mercado1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `codigoProduto` int(11) NOT NULL,
  `nomeProduto` varchar(255) NOT NULL,
  `tipoProduto` varchar(255) NOT NULL,
  `valorProduto` float NOT NULL,
  `qtdEstoque` float NOT NULL,
  `vendas` int(11) NOT NULL,
  `estoque_loja` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50058 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigoProduto`, `nomeProduto`, `tipoProduto`, `valorProduto`, `qtdEstoque`, `vendas`, `estoque_loja`) VALUES
(50031, 'miojo', 'massa', 2098770000, 8, 2147483647, -1e37),
(50033, 'palmito', 'legume', 7, 8, 10, -2),
(50034, 'arroz', 'cereal', 2.4, 3.40282e38, 2147483647, -3.40282e38),
(50035, 'coxa de frango', 'carne', 23, 0, 2, -2),
(50036, 'guizado', 'carne', 2.99, 43, -30, 73),
(50040, 'motorola g7 plus', 'smartphone', 120000, 10, 300, -290),
(50041, 'katana', 'espada', 1200, 96, 0, 96),
(50042, 'miojo', 'massa', 2.9, 10, 0, 10),
(50043, 'heineken', 'cerveja', 35000, 5000, 0, 5000),
(50044, 'stella artois', 'cerveja', 3000, 501, 0, 501),
(50045, 'motog7', 'smartphone', 900, 2500, 1000, 1500),
(50046, 'coca cola 2l', 'refrigerante', 5, 100, 82, 18),
(50047, 'renan teixeirinha', 'boneca inflÃ¡vel', 10, 2, 0, 2),
(50052, 'coca cola g1', 'refrigerante grupo um', 6, 15, 2147483647, -10000000000),
(50054, 'fandangos g1', 'salgadinho grupo um', 200000000000000, 1, 2147483647, -2147480000),
(50056, 'teclado g1', 'eletronicos grupo um', 50, 9e26, 0, 9e26),
(50057, 'teste compra alterada g1', 'coisa grupo um ', 2000000, 500000, 2147483647, -9999500000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigoUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigoUsuario`, `nomeUsuario`, `senhaUsuario`, `cargo`) VALUES
(1000, 'giovane', '$2y$10$6pCw8VMzvMVOO.BQ.nAvueYOXtRFzFVUsd6yvAgOmQ8d/uGg5NQXO', '1'),
(1001, 'zoppas', '$2y$10$DYCTnRZ7nf38eYQzFgC6ROWKj.XLZRCcoAMIYFbSg7uiyJspWrxhO', '1'),
(1002, 'renan', '$2y$10$g/1o.pCs6Cn0RvVePmMSjuRewH9yyBc6X5dA15UgcCaZ48PPoaELe', '1'),
(1003, 'gabriel', '$2y$10$lxWByfJc2jsjfH3wW3XSkuax3Gy4jhNz6XPP2oqiWWziyzVLYNzBy', '1'),
(1004, 'andrey', '$2y$10$O5nNWy2lY01RjLFL3jXEueXi.celggLsOHjO3y5IY.18PMmtFRJWu', '1'),
(1005, 'renan', '$2y$10$fc7hdrY0fl2tfhgzBtSLz.FCO2h.H9T8EcSA97OTxgv9Ad9YUpVRG', '1'),
(1006, 'renan', '$2y$10$95diFZscl5iNaEMp8zFzB.7cL1fsUnVGMBqqBQKgqa.cDjuX1uSqS', '1'),
(1007, 'renan silva', '$2y$10$Nfm7H6p6cxAlEBK2UiVS2OKkVypf/ZVPws/65YYuGWlAofHaesTIi', '1'),
(1008, 'kanneman', '$2y$10$h6vmznyxdRO9tXzPsSxivOrQrCaE/kQsT4wf8fJB647.XkGTlOVV2', '1'),
(1009, 'testecinco', '$2y$10$Bm2yd7XtWbVxr/XUH1KN7.h8N/YPVqEmOuSNLWrkb6bruAQHxi3/2', '1'),
(1010, 'juau', '$2y$10$Li/PpTBMn6HzfeVLV0rFTeD1349/w911Jjwt874UE8le6UR/.bC/6', '1'),
(1011, 'jaozin', '$2y$10$dKpfD8zZmaOxUhtifF8B5.xm5SCBHunt55eRQXcDTfG7TfyfAeu1W', '1'),
(1012, 'josÃ© eduardo', '$2y$10$LgavLAn626rF89kggZCLkeVm3yV4iQ40hjhsI2YVYOu7.9CIoDlpe', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigoProduto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigoProduto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50058;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigoUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1013;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
