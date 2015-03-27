-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2015 at 02:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blink_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`idcurso`, `idprofesor`, `nombre`, `descripcion`) VALUES
(1, 3, 'Maquetacion Web Basica', 'Maquetacion Web Basica Maquetacion Web Basica Maquetacion Web Basica'),
(2, 3, 'Basic Web Layout', 'Basic Web Layout Basic Web Layout Basic Web Layout Basic Web Layout');

-- --------------------------------------------------------

--
-- Table structure for table `curso-estudiante`
--

CREATE TABLE IF NOT EXISTS `curso-estudiante` (
  `idcurso` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intentos`
--

CREATE TABLE IF NOT EXISTS `intentos` (
  `idusuario` int(11) NOT NULL,
  `hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leccion`
--

CREATE TABLE IF NOT EXISTS `leccion` (
  `idleccion` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `teoria` varchar(1000) NOT NULL,
  `filename` int(11) DEFAULT NULL,
  PRIMARY KEY (`idleccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leccion`
--

INSERT INTO `leccion` (`idleccion`, `idcurso`, `nombre`, `descripcion`, `teoria`, `filename`) VALUES
(1, 2, 'Creating a Website with your name', 'In this lesson you will learn how to create a basic Website with your name on it.', 'The h1 to h6 tags are used to define HTML headings.\r\n\r\nh1 defines the most important heading. h6 defines the least important heading.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_tb`
--

CREATE TABLE IF NOT EXISTS `usuarios_tb` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` char(1) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  `contra` varchar(128) NOT NULL,
  `estado` char(1) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `avatar` int(3) DEFAULT NULL,
  `tipo` char(1) NOT NULL,
  `salt` char(128) NOT NULL,
  `log` int(11) NOT NULL,
  `lang` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Usuarios registrados en Blink' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `estado`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`, `log`, `lang`) VALUES
(1, 'Miguel Alejandro', 'Lopez Barrientos', '1997-10-07', NULL, 'mlopez', '4058954535b048eb15036fff397fd814b368dada96f60941353e1439129fb606961f8dc74e9620b38f2bed969e50cc33bcbc71b29c01721196eea3443554d13b', '0', NULL, 'miguel@mail.com', 36, '3', 'f0f8640510cbfb8c1ae8f13234847440f088c2f4aaa12c8849799037d1d006d6f32321f23cb20573178fd54af21a99b22b618f7f7e6ac84c1179a38a075b4bdf', 1, NULL),
(2, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'glopez97', '7fc85991852803f88e19773bc18bfb51be74ed74f5dbc2bf9ec1c2896daa422aaf0c761cde92e43f31c5717697f72bc422c6a3c4f8c1f5008499d3bdf1ef5524', '0', NULL, 'gerardo.antonio97@gmail.com', 22, '3', 'b95b65ffae70308c670c6fea6b1a08198cf3f283c8bafcf6f645d4727e1f6ba306265e5b0b882fdabf17fc52313c866df52e89b7e98826adfdc9e313d1614bcb', 1, NULL),
(3, 'Renato Andres', 'Reyes Martinez', '1996-12-20', NULL, 'renato96', '4d803a565542e01c1b9fa274661a4a054b21485002e048811aff8c1807e3574cb14ddfe6c008d9bac733f930b00b3ceedf73637ab0eb0303ce766a05131ff223', '0', NULL, 'renatomartinez96@gmail.com', 35, '2', '1154ccfa82eb54d473b595451670ef7c7e869fe65a454788c5132d399bf1aef3bfb4789d5f472d2dedc8f8bfe15cc4d684659c68e005283d60b655e86e064816', 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
