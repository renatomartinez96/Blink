-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-04-2015 a las 04:46:57
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
  `imagen` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `idprofesor`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 3, 'Maquetacion Web Basica', 'Maquetacion Web Basica Maquetacion Web Basica Maquetacion Web Basica', NULL),
(2, 3, 'Basic Web Layout', 'Basic Web Layout Basic Web Layout Basic Web Layout Basic Web Layout', NULL),
(3, 1, 'HTML ', 'hola', NULL),
(4, 12, 'curso basico', 'descripcion', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoestudiante`
--

CREATE TABLE IF NOT EXISTS `cursoestudiante` (
  `idcurso` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursoestudiante`
--

INSERT INTO `cursoestudiante` (`idcurso`, `idestudiante`) VALUES
(2, 12),
(3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente-estudiante`
--

CREATE TABLE IF NOT EXISTS `docente-estudiante` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idDetalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `docente-estudiante`
--

INSERT INTO `docente-estudiante` (`idDetalle`, `idDocente`, `idEstudiante`) VALUES
(9, 1, 12),
(11, 14, 12),
(12, 1, 15),
(13, 3, 12);

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
(12, '1428001612'),
(12, '1428100943'),
(12, '1428160410'),
(1, '1428634214'),
(1, '1428634239'),
(3, '1428681313');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`idleccion`, `idcurso`, `nombre`, `descripcion`, `teoria`, `filename`) VALUES
(1, 2, 'Creating a Website with your name', 'In this lesson you will learn how to create a basic Website with your name on it.', 'The h1 to h6 tags are used to define HTML headings.\r\n\r\nh1 defines the most important heading. h6 defines the least important heading.', NULL),
(2, 2, 'Header', 'header lesson', '<h1> to <h6> ', NULL),
(4, 2, 'basic lesson ', 'description', 'descripcion teorica', NULL),
(5, 3, 'holasdads', 'jhagsjhdajshgd', 'jhagdsjhagsjdhasdasdasd', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Usuarios registrados en Blink' AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`, `lang`, `log`, `estado`, `token`) VALUES
(1, 'Miguel Alejandro', 'Lopez Barrientos', '1997-10-07', NULL, 'mlopez', 'db9da5806dedebe0788eb6712f913d4ff0c814f61b9a36dcf3f46f91f64471e67e89d7b1e2c55c1a65e3205de833005782bef54e6a89a514e6e2542ee41206eb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'miguel@mail.com', 36, '2', '23daad667aa164c3eee0313d94b3e0f831f97b0aec7fd4f6447ae4f98a83db8c777b4066788ce8e1d8913a01fd9e3ba4b7608cacdce0670441ba114ec3a75844', NULL, 1, '1', NULL),
(3, 'Renato Andres', 'Reyes Martinez', '1996-12-20', NULL, 'renato96', '4d803a565542e01c1b9fa274661a4a054b21485002e048811aff8c1807e3574cb14ddfe6c008d9bac733f930b00b3ceedf73637ab0eb0303ce766a05131ff223', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'renatomartinez96@gmail.com', 35, '2', '1154ccfa82eb54d473b595451670ef7c7e869fe65a454788c5132d399bf1aef3bfb4789d5f472d2dedc8f8bfe15cc4d684659c68e005283d60b655e86e064816', NULL, 1, '0', NULL),
(12, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'glopez97', 'c64dffe83f5689ff26462711c068db78acbddfa3dd9aeb841d9ad03b07618d6f47080e5972eff89f428fb6884a6f3e4480caa81d3c8561035c69657b92b47681', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'gerardo.antonio97@gmail.com', 22, '3', '781881ac59ed7fdbc3f87ba07253370fddebee3df1443edbbb91746a4c4b61282afaa7499d33f28801e3a45c986f523a2206f67cc3a4b570351e75217aaeb78a', NULL, 1, '1', '8581e3cf27eb61a26d20f4ea214e0e76'),
(14, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'g_lopez97', 'c05a3fd7e3355aaaa16b1ba446c404923bd3ee26599565ee1ea4db2315b2830dff82f3dbe4bc06ce744ed9981ae649cb861ad8d3f8ca7e2a9183199b6ee216f4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'gerardo.antonio20@hotmail.com', 22, '2', 'bafb28a96b0267f68aadcb240cfbd420a4702d1d1baf74f303add5eb52e451478555495f8328ed089a82f8a4b6e4207bff8a93a76a2e7c65a0de0053ac3663d8', NULL, 1, '1', NULL),
(15, 'Miguel Antonio', 'LÃ³pez Barrientos', '1997-10-07', NULL, 'mlopez123', 'ca6fb92588a1ee1f302897a73c59ce81142a6fd6ca03958f2a8350b1ffbc30798c72973247a8b2033ace7e6c6972febda0ce0b9b1971b2cad673712651399d48', NULL, 'malc@mail.com', 33, '3', 'd7efc1330964575a322dd6ad89ff94174c6ccd74259c8a3c80b2f121c41b02ee183f9b18d0840c435d46d12fd8fbc83c4f7d6a7ef98bc32c0abe0b1a08628414', NULL, 1, '1', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
