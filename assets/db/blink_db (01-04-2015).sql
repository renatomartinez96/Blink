-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2015 a las 17:22:24
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `blink_db`
--
CREATE DATABASE IF NOT EXISTS `blink_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blink_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `idprofesor`, `nombre`, `descripcion`) VALUES
(1, 3, 'Maquetacion Web Basica', 'Maquetacion Web Basica Maquetacion Web Basica Maquetacion Web Basica'),
(2, 3, 'Basic Web Layout', 'Basic Web Layout Basic Web Layout Basic Web Layout Basic Web Layout');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso-estudiante`
--

CREATE TABLE IF NOT EXISTS `curso-estudiante` (
  `idcurso` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE IF NOT EXISTS `intentos` (
  `idusuario` int(11) NOT NULL,
  `hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intentos`
--

INSERT INTO `intentos` (`idusuario`, `hora`) VALUES
(2, '1427459432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leccion`
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
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`idleccion`, `idcurso`, `nombre`, `descripcion`, `teoria`, `filename`) VALUES
(1, 2, 'Creating a Website with your name', 'In this lesson you will learn how to create a basic Website with your name on it.', 'The h1 to h6 tags are used to define HTML headings.\r\n\r\nh1 defines the most important heading. h6 defines the least important heading.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tb`
--

CREATE TABLE IF NOT EXISTS `usuarios_tb` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` char(1) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  `contra` varchar(128) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `avatar` int(3) DEFAULT NULL,
  `tipo` char(1) NOT NULL,
  `salt` char(128) NOT NULL,
  `lang` varchar(3) DEFAULT NULL,
  `log` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Usuarios registrados en Blink' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`, `lang`, `log`, `estado`, `token`) VALUES
(1, 'Miguel Alejandro', 'Lopez Barrientos', '1997-10-07', NULL, 'mlopez', '4058954535b048eb15036fff397fd814b368dada96f60941353e1439129fb606961f8dc74e9620b38f2bed969e50cc33bcbc71b29c01721196eea3443554d13b', NULL, 'miguel@mail.com', 36, '3', 'f0f8640510cbfb8c1ae8f13234847440f088c2f4aaa12c8849799037d1d006d6f32321f23cb20573178fd54af21a99b22b618f7f7e6ac84c1179a38a075b4bdf', NULL, 1, '0', NULL),
(3, 'Renato Andres', 'Reyes Martinez', '1996-12-20', NULL, 'renato96', '4d803a565542e01c1b9fa274661a4a054b21485002e048811aff8c1807e3574cb14ddfe6c008d9bac733f930b00b3ceedf73637ab0eb0303ce766a05131ff223', NULL, 'renatomartinez96@gmail.com', 35, '1', '1154ccfa82eb54d473b595451670ef7c7e869fe65a454788c5132d399bf1aef3bfb4789d5f472d2dedc8f8bfe15cc4d684659c68e005283d60b655e86e064816', NULL, 1, '0', NULL),
(7, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'gerardo123', 'e80097864e4020e01266ed7627cdea97b24b53e1050bf41926f4a36a8efb9a0a14d8d97af05684b7deb8e81a98d3b8695421e08b2a10df66d6740cec1ba8b5e9', NULL, 'gerardo@mail.com', NULL, '3', '6ede6661d46e2b17532293da14e0b762ccbe029eb6e38e8216879a49eb99837f721214abd09d26f38bbc16d0b9435956d431d7d661b573a18009e93893d0921c', NULL, 0, '0', NULL),
(11, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'glopez97', '7eec0d587a593c8b0815dd73e00502d0b538f9eef56a0acebb6c59084b07eb1b324181e1200f9f55dec1a13517ff70ec701f36ea10634f647a5126913d3354c8', NULL, 'gerardo.antonio97@gmail.com', 22, '3', '1b590b359f1ea94fe177993afe57c955876318cc37ab0db4ff999558ff89c81b83a6913ac939fc5f229b28e675353265a042b09632f243add8406352ffff9d22', NULL, 1, '1', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
