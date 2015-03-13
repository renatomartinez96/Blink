-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2015 a las 19:43:19
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `blink_db`
--
CREATE DATABASE blink_db
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE `intentos` (
`idusuario` int(11) NOT NULL,
  `hora` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tb`
--

CREATE TABLE `usuarios_tb` (
`idusuario` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contra` varchar(128) NOT NULL,
  `estado` char(1) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `avatar` int(3) NOT NULL,
  `tipo` char(1) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `estado`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`) VALUES
(1, 'Ivan', 'Nolasco', '1997-04-02', 'm', 'test', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', '1', 'holi', 'ignh.lel@yandex.com', 1, '3', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `intentos`
--
ALTER TABLE `intentos`
 ADD PRIMARY KEY (`idusuario`), ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios_tb`
--
ALTER TABLE `usuarios_tb`
 ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios_tb`
--
ALTER TABLE `usuarios_tb`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
