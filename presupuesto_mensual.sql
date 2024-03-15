-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2019 a las 22:29:19
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_presupuesto_mensual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganancias`
--

CREATE TABLE `ganancias` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `precio_previsto` float NOT NULL,
  `precio_real` float DEFAULT NULL,
  `diferencia` float DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `precio_previsto` float NOT NULL,
  `precio_real` float DEFAULT NULL,
  `diferencia` float DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre_comercial` varchar(255) NOT NULL,
  `propietario` varchar(255) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `web` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre_comercial`, `propietario`, `telefono`, `direccion`, `email`, `web`) VALUES
(1, 'Sistema Web S.A. de C.V.', 'Obed Alvarado', '+456-345-908-559', '234/90, New York Street\r\n <br />\r\n United States.<br />', 'info@obedalvarado.pw', 'www.sistemasweb.la');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
