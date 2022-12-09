-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2022 a las 23:31:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCLIENTE` int(11) NOT NULL,
  `RAZON_SOCIAL` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `RFC` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCLIENTE`, `RAZON_SOCIAL`, `RFC`) VALUES
(1, 'Jose prueba', 'JOSE123'),
(2, 'JOSE MARTINEZ', 'PEPE123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `IDCODIGO` int(11) NOT NULL,
  `IDCLIENTE` int(11) NOT NULL,
  `RAZON_SOCIAL` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `RFC` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `SUBTOTAL` double(13,3) NOT NULL,
  `IVA` double(13,3) NOT NULL,
  `TOTAL` double(13,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`IDCODIGO`, `IDCLIENTE`, `RAZON_SOCIAL`, `RFC`, `SUBTOTAL`, `IVA`, `TOTAL`) VALUES
(1, 1, 'Jose prueba', 'JOSE123', 200.000, 32.000, 232.000),
(2, 1, 'Jose prueba', 'JOSE123', 200.000, 32.000, 232.000),
(3, 2, 'JOSE MARTINEZ', 'PEPE123', 1000.000, 160.000, 1160.000),
(4, 2, 'JOSE MARTINEZ', 'PEPE123', 1000.000, 160.000, 1160.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentorenglon`
--

CREATE TABLE `documentorenglon` (
  `IDCODIGO` int(11) NOT NULL,
  `IDMATERIAL` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `UNIDAD_MEDIDA` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `CANTIDAD` double(13,3) NOT NULL,
  `PRECIO1` double(13,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documentorenglon`
--

INSERT INTO `documentorenglon` (`IDCODIGO`, `IDMATERIAL`, `UNIDAD_MEDIDA`, `CANTIDAD`, `PRECIO1`) VALUES
(1, 'monitor', 'pieza', 2.000, 200.000),
(2, 'monitor', 'pieza', 2.000, 200.000),
(3, 'teclado', 'pieza', 3.000, 600.000),
(4, 'teclado', 'pieza', 3.000, 600.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `IDMATERIAL` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPCION` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `UNIDADMEDIDA` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PRECIO1` double(13,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `IDMATERIAL`, `DESCRIPCION`, `UNIDADMEDIDA`, `PRECIO1`) VALUES
(1, 'monitor', 'monitor samsung 20pulgadas', 'pieza', 100.000),
(2, 'teclado', 'teclado razer', 'pieza', 200.000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCLIENTE`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`IDCODIGO`);

--
-- Indices de la tabla `documentorenglon`
--
ALTER TABLE `documentorenglon`
  ADD PRIMARY KEY (`IDCODIGO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `IDCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `documentorenglon`
--
ALTER TABLE `documentorenglon`
  MODIFY `IDCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
