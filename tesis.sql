-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2018 a las 01:09:13
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulare_id` int(11) DEFAULT NULL,
  `cedula` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nombres` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `parentesco_id` int(50) DEFAULT NULL,
  `sexo` text COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id`, `titulare_id`, `cedula`, `nombres`, `apellidos`, `parentesco_id`, `sexo`, `fecha`) VALUES
(8, 7, '1919191', 'argenis', 'guedez', 3, 'MASCULINO', '2018-03-31'),
(9, 7, '762763', 'norma', 'crespo', 2, 'MASCULINO', '2018-03-31'),
(10, 8, '21231', 'ada', 'crespo', 2, 'FEMENINO', '2018-03-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregados`
--

CREATE TABLE `entregados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulare_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `entregados`
--

INSERT INTO `entregados` (`id`, `titulare_id`, `beneficiario_id`, `fecha`) VALUES
(25, 8, 10, '2018-04-03'),
(26, 8, 0, '2018-04-03'),
(27, 8, 10, '2018-04-03'),
(28, 7, 0, '2018-04-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicinas`
--

CREATE TABLE `medicinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulare_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `medicinas`
--

INSERT INTO `medicinas` (`id`, `titulare_id`, `beneficiario_id`, `producto_id`) VALUES
(9, 7, 0, 6),
(11, 7, 9, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'ADMIN', 'usuario del seguro'),
(2, 'EMPLEADO', 'usuario del seguro'),
(3, 'SOPORTE', 'soporte configuraciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `nombre`, `activo`) VALUES
(5, 'para el dolor de cabeza', 'atamel', 1),
(6, 'fiebre', 'teragrip', 1),
(7, 'cabeza', 'dol', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulares`
--

CREATE TABLE `titulares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `titulares`
--

INSERT INTO `titulares` (`id`, `cedula`, `nombres`, `apellidos`, `sexo`, `fecha`) VALUES
(7, 21020500, 'alvaro', 'guedez', 'MASCULINO', '2018-03-31'),
(8, 16028060, 'gheylert', 'gil', 'MASCULINO', '2018-03-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` int(11) NOT NULL,
  `apellido` text COLLATE utf8_bin NOT NULL,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `login` text COLLATE utf8_bin NOT NULL,
  `password` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `cedula`, `apellido`, `nombre`, `id_permiso`, `login`, `password`, `activo`, `fecha_creacion`) VALUES
(1, 1, 'user apellido', 'user nombre', 1, 'admin', 123456, 1, '2018-03-23'),
(3, 2, 'empleados', 'empleado nombre', 2, 'empleado', 123456, 1, '2018-03-23'),
(5, 3, 'soporte', 'soporte nombre', 3, 'soporte', 123456, 1, '2018-03-23'),
(11, 345678, 'soporte apellido', 'soporte nombre', 3, 'soporte1', 123456, 1, '2018-03-24'),
(12, 90909009, 'yoyo', 'yoyo', 2, 'yo', 123456, 1, '2018-04-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `entregados`
--
ALTER TABLE `entregados`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `medicinas`
--
ALTER TABLE `medicinas`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `titulares`
--
ALTER TABLE `titulares`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entregados`
--
ALTER TABLE `entregados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `medicinas`
--
ALTER TABLE `medicinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `titulares`
--
ALTER TABLE `titulares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
