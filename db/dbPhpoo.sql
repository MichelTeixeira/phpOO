-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Out-2016 às 16:27
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpoo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_produto`
--

CREATE TABLE `categoria_produto` (
  `id_categoria_planejamento` int(11) NOT NULL,
  `nome` varchar(155) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria_produto`
--

INSERT INTO `categoria_produto` (`id_categoria_planejamento`, `nome`) VALUES
(1, 'Periféricos'),
(2, 'Computadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria_produto` int(11) NOT NULL,
  `nome` varchar(155) CHARACTER SET latin1 NOT NULL,
  `data` datetime NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria_produto`, `nome`, `data`, `valor`) VALUES
(1, 1, 'Teclado', '2016-10-01 00:13:56', 16.5),
(2, 1, 'Mouse', '2016-09-30 00:00:00', 15.2),
(5, 2, 'Notebook - I5(3.80Ghz), 1Tb, 16Gb, Win10', '2016-09-30 22:44:13', 2199),
(6, 2, 'Notebook - I3(3.50Ghz), 500Gb, 8Gb, Win10', '2016-10-01 12:28:24', 1666.35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD PRIMARY KEY (`id_categoria_planejamento`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`,`id_categoria_produto`),
  ADD KEY `id_categoria_produto` (`id_categoria_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_produto`
--
ALTER TABLE `categoria_produto`
  MODIFY `id_categoria_planejamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria_produto`) REFERENCES `categoria_produto` (`id_categoria_planejamento`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
