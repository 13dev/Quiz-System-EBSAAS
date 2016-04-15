-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 07-Abr-2016 às 14:43
-- Versão do servidor: 5.5.34-MariaDB-cll-lve
-- versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `ebsaasx1_quizzer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Extraindo dados da tabela `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `text`) VALUES
(38, 1, 0, '56'),
(39, 1, 1, '57'),
(40, 1, 0, '58'),
(41, 1, 0, '60'),
(42, 2, 0, '80'),
(43, 2, 0, '90'),
(44, 2, 1, '70'),
(45, 3, 0, '4'),
(46, 3, 0, '5'),
(47, 3, 1, '3'),
(48, 3, 0, '6'),
(49, 4, 1, '5'),
(50, 4, 0, '4'),
(51, 4, 0, '6'),
(52, 5, 0, '14'),
(53, 5, 0, '13'),
(54, 5, 1, '30'),
(55, 5, 0, '26'),
(56, 6, 0, '4'),
(57, 6, 1, '5'),
(58, 6, 0, '6'),
(59, 7, 1, '797'),
(60, 7, 0, '860'),
(61, 7, 0, '405'),
(62, 8, 0, 'JosÃ© Clementino Fernandes Camacho'),
(63, 8, 0, 'Joaquim Carlos Ferreira Camacho'),
(64, 8, 1, 'JosÃ© Clementino Ferreira Camacho'),
(65, 9, 0, 'Escola BÃ¡sica e SecundÃ¡ria Dr. Augusto Ã‚ngelo da Silva'),
(66, 9, 0, 'Escola BÃ¡sica e SecundÃ¡ria Dr. Ã‚ngelo Agostinho da Silva'),
(67, 9, 1, 'Escola BÃ¡sica e SecundÃ¡ria Dr. Ã‚ngelo Augusto da Silva'),
(68, 10, 1, 'Ana AlÃ­cia MendonÃ§a Teixeira Ribeiro'),
(69, 10, 0, 'Maria FÃ¡tima Trindade da Costa Ferreira'),
(70, 10, 0, 'Ana Mafalda de Sampaio Palha da Silva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `name_score`
--

CREATE TABLE IF NOT EXISTS `name_score` (
  `tempo` varchar(40) NOT NULL,
  `data` varchar(255) NOT NULL,
  `turma` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Extraindo dados da tabela `name_score`
--

INSERT INTO `name_score` (`tempo`, `data`, `turma`, `ID`, `name`, `score`) VALUES
('46 Segundos', '07-04-2016 02:05min', 'TGPSI_1', 153, 'Leonardo Gomes', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_number` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`question_number`, `text`) VALUES
(1, 'Quantas Turmas hÃ¡ na escola ?'),
(2, 'Em que dÃ©cada foi fundada a EBSAAS ?'),
(3, 'Quantas salas de sessÃµes hÃ¡ na escola ?'),
(4, 'Quantos campos hÃ¡ na escola ? '),
(5, 'Quantas turmas havia quando a escola abriu ? '),
(6, 'Quantos cursos profissionais existem atualmente ?'),
(7, 'Qual o nÃºmero de alunos quando a escola Abriu?'),
(8, 'Qual o nome do fundador da Escola?'),
(9, 'Como se chama a escola ? '),
(10, 'Qual destas Pessoas Pertence a DirecÃ§Ã£o da Escola ?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
