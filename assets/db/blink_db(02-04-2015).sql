-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-04-2015 a las 20:16:36
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
(2, '1427459432'),
(12, '1427997441'),
(12, '1427997447'),
(12, '1427997456'),
(12, '1427998372'),
(12, '1427998377'),
(12, '1427998384'),
(12, '1427998677'),
(12, '1427998681'),
(12, '1427998683'),
(12, '1427998683'),
(12, '1427998754'),
(12, '1427999497'),
(12, '1427999498'),
(12, '1427999499'),
(12, '1427999505'),
(12, '1427999511'),
(1, '1427999538'),
(12, '1427999834'),
(12, '1428000189'),
(12, '1428000191'),
(12, '1428000204'),
(12, '1428000709'),
(12, '1428000711'),
(12, '1428000713'),
(12, '1428000715'),
(12, '1428000716'),
(12, '1428000718'),
(12, '1428000720'),
(12, '1428001094'),
(12, '1428001612');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Usuarios registrados en Blink' AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`, `lang`, `log`, `estado`, `token`) VALUES
(1, 'Miguel Alejandro', 'Lopez Barrientos', '1997-10-07', NULL, 'mlopez', '4058954535b048eb15036fff397fd814b368dada96f60941353e1439129fb606961f8dc74e9620b38f2bed969e50cc33bcbc71b29c01721196eea3443554d13b', NULL, 'miguel@mail.com', 36, '3', 'f0f8640510cbfb8c1ae8f13234847440f088c2f4aaa12c8849799037d1d006d6f32321f23cb20573178fd54af21a99b22b618f7f7e6ac84c1179a38a075b4bdf', NULL, 1, '0', NULL),
(3, 'Renato Andres', 'Reyes Martinez', '1996-12-20', NULL, 'renato96', '4d803a565542e01c1b9fa274661a4a054b21485002e048811aff8c1807e3574cb14ddfe6c008d9bac733f930b00b3ceedf73637ab0eb0303ce766a05131ff223', NULL, 'renatomartinez96@gmail.com', 35, '1', '1154ccfa82eb54d473b595451670ef7c7e869fe65a454788c5132d399bf1aef3bfb4789d5f472d2dedc8f8bfe15cc4d684659c68e005283d60b655e86e064816', NULL, 1, '0', NULL),
(12, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'glopez97', '31f6579fa213a5a49c415804f7fff5e2a0bf1425edb6b3896bf157c6e73e08308a334a4c779723a5bd5e8dbe450178e6213edf83d2cb926078dc344e635155b9', NULL, 'gerardo.antonio97@gmail.com', 22, '3', '1d0e41257fec9c3788babd2b9edf0cd5064af1ca3863ed9a01d47ea85438a722d2dafd28eccef66ef1e783ab9494d64f0a335d85a6842f67f3be2239236961a3', NULL, 1, '1', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
