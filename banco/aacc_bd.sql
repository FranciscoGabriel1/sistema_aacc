-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Fev-2019 às 00:41
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aacc_bd`
--
CREATE DATABASE IF NOT EXISTS `aacc_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `aacc_bd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aacc`
--

CREATE TABLE `aacc` (
  `sigla` varchar(5) NOT NULL,
  `descricao_aacc` varchar(250) DEFAULT NULL,
  `cargamin` int(11) DEFAULT NULL,
  `cargamax` int(11) DEFAULT NULL,
  `aprov_max` int(11) DEFAULT NULL,
  `doc_comprobatorio` varchar(30) DEFAULT NULL,
  `coord_idcoord` int(11) NOT NULL,
  `modalidade_idmod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aacc`
--

INSERT INTO `aacc` (`sigla`, `descricao_aacc`, `cargamin`, `cargamax`, `aprov_max`, `doc_comprobatorio`, `coord_idcoord`, `modalidade_idmod`) VALUES
('EN1', 'Ministrante de curso', 6, 20, 50, 'certificado e/ou Declaração', 5, 1),
('EX1', 'Participação em eventos científicos', 10, 20, 60, 'Certificado e/ou Declaração', 5, 3),
('EX2', 'ParticipaÃ§Ã£o em curso/minicurso/treinamento (presencial ou online)', 4, 20, 40, 'Certificado e/ou DeclaraÃ§Ã£o', 5, 3),
('P2', 'dododp', 3, 4, 5, '06', 5, 2),
('PE1', 'Participação em Projetos', 60, 60, 60, 'Certificado', 5, 2),
('sig', 'des', 2, 3, 4, 'sa', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `curso_codigo` varchar(5) NOT NULL,
  `coord_idcoord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `curso_codigo`, `coord_idcoord`) VALUES
(3, 'Francisco', 'IT16', 5),
(22, 'ddd', 'IT01', 5),
(321, 'gab', 'IT16', 5),
(444, 'ChicoAnysio', 'IT16', 5),
(3223, 'Priscila Vasconcelos', 'IT16', 5),
(54321, 'Daiane', 'IT16', 5),
(32414221, 'Evelym Vasconcelos Moraes dos Santos', 'IT01', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  `semestre` varchar(10) DEFAULT NULL,
  `descricao_atividade` varchar(250) DEFAULT NULL,
  `cargahoraria` int(11) DEFAULT NULL,
  `aluno_matricula` int(11) NOT NULL,
  `aacc_sigla` varchar(5) NOT NULL,
  `coord_idcoord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `ano`, `semestre`, `descricao_atividade`, `cargahoraria`, `aluno_matricula`, `aacc_sigla`, `coord_idcoord`) VALUES
(1, 2017, '2017/1', 'Participação em um Evento da SNCT 2017', 10, 444, 'EX1', 5),
(2, 2019, '2019/2', 'Artigo do SBSI', 20, 3223, 'PE1', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coord`
--

CREATE TABLE `coord` (
  `idcoord` int(11) NOT NULL,
  `nome` varchar(25) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `curso_codigo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `coord`
--

INSERT INTO `coord` (`idcoord`, `nome`, `senha`, `curso_codigo`) VALUES
(5, 'Gabriel', 'es123', 'IT16'),
(6, 'evelym', 'si123', 'IT01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codigo` varchar(5) NOT NULL,
  `descricao_curso` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codigo`, `descricao_curso`) VALUES
('IT01', 'Sistemas de Informação'),
('IT16', 'Engenharia de Software');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `idmod` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`idmod`, `descricao`) VALUES
(1, 'Ensino'),
(2, 'Pesquisa'),
(3, 'Extensão');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aacc`
--
ALTER TABLE `aacc`
  ADD PRIMARY KEY (`sigla`),
  ADD KEY `fk_aacc_coord1_idx` (`coord_idcoord`),
  ADD KEY `fk_aacc_modalidade1_idx` (`modalidade_idmod`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `fk_aluno_curso1_idx` (`curso_codigo`),
  ADD KEY `fk_aluno_coord1_idx` (`coord_idcoord`);

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_atividade_aluno_idx` (`aluno_matricula`),
  ADD KEY `fk_atividade_aacc1_idx` (`aacc_sigla`),
  ADD KEY `fk_atividade_coord1_idx` (`coord_idcoord`);

--
-- Indexes for table `coord`
--
ALTER TABLE `coord`
  ADD PRIMARY KEY (`idcoord`),
  ADD KEY `fk_admin_curso1_idx` (`curso_codigo`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`idmod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coord`
--
ALTER TABLE `coord`
  MODIFY `idcoord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `idmod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aacc`
--
ALTER TABLE `aacc`
  ADD CONSTRAINT `fk_aacc_coord1` FOREIGN KEY (`coord_idcoord`) REFERENCES `coord` (`idcoord`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aacc_modalidade1` FOREIGN KEY (`modalidade_idmod`) REFERENCES `modalidade` (`idmod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_coord1` FOREIGN KEY (`coord_idcoord`) REFERENCES `coord` (`idcoord`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_curso1` FOREIGN KEY (`curso_codigo`) REFERENCES `curso` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_atividade_aacc1` FOREIGN KEY (`aacc_sigla`) REFERENCES `aacc` (`sigla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_aluno` FOREIGN KEY (`aluno_matricula`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_coord1` FOREIGN KEY (`coord_idcoord`) REFERENCES `coord` (`idcoord`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `coord`
--
ALTER TABLE `coord`
  ADD CONSTRAINT `fk_admin_curso1` FOREIGN KEY (`curso_codigo`) REFERENCES `curso` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
