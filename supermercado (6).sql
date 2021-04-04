-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2021 a las 20:50:26
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supermercado`
--
CREATE DATABASE IF NOT EXISTS `supermercado` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `supermercado`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `num_fac` int(15) NOT NULL,
  `doc_user` int(15) NOT NULL,
  `time_ini` datetime NOT NULL,
  `time_fin` datetime DEFAULT NULL,
  `id_esta_comp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`num_fac`, `doc_user`, `time_ini`, `time_fin`, `id_esta_comp`) VALUES
(30, 467, '2021-03-26 09:08:20', '2021-03-26 12:08:20', 1),
(41, 1005765865, '2021-03-31 17:18:57', '2021-03-31 20:18:57', 1),
(42, 6556, '2021-04-01 11:48:53', '2021-04-01 14:48:53', 1),
(46, 1234, '2021-04-02 19:56:32', '2021-04-02 22:56:32', 1),
(59, 456, '2021-04-03 17:27:18', '2021-04-03 20:27:18', 2),
(65, 100987, '2021-04-04 13:44:51', '2021-04-04 16:44:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta_compra`
--

CREATE TABLE `deta_compra` (
  `id_det_comp` int(15) NOT NULL,
  `id_prod` int(15) NOT NULL,
  `num_fac` int(15) NOT NULL,
  `iva` int(11) DEFAULT NULL,
  `cantidad` int(15) NOT NULL,
  `id_tipo_pag` int(10) NOT NULL,
  `subtotal` int(15) DEFAULT NULL,
  `total_comp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deta_compra`
--

INSERT INTO `deta_compra` (`id_det_comp`, `id_prod`, `num_fac`, `iva`, `cantidad`, `id_tipo_pag`, `subtotal`, `total_comp`) VALUES
(20, 1111, 30, 0, 5, 3, 5500, 7700),
(21, 1111, 30, 0, 2, 3, 2200, 7700),
(34, 1, 41, 0, 2, 3, 2600, 15390),
(35, 1221, 41, 0, 1, 3, 3690, 15390),
(36, 1422, 41, 0, 4, 3, 4800, 15390),
(37, 2323, 41, 0, 2, 3, 4300, 15390),
(38, 1, 42, 0, 30, 2, 39000, 42690),
(39, 1221, 42, 0, 1, 2, 3690, 42690),
(43, 1, 46, 0, 1, 1, 1300, 1300),
(61, 1221, 59, 0, 2, 2, 7380, 20980),
(62, 1432, 59, 0, 2, 2, 5600, 20980),
(63, 1432, 59, 0, 2, 2, 5600, 20980),
(64, 1422, 59, 0, 2, 2, 2400, 20980);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_comp`
--

CREATE TABLE `estado_comp` (
  `id_esta_comp` int(10) NOT NULL,
  `esta_compra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_comp`
--

INSERT INTO `estado_comp` (`id_esta_comp`, `esta_compra`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(15) NOT NULL,
  `nom_produ` varchar(40) NOT NULL,
  `precio` int(12) NOT NULL,
  `id_tipo_prod` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nom_produ`, `precio`, `id_tipo_prod`) VALUES
(1, 'arroz', 1300, 4),
(1111, 'Escoba', 1100, 2),
(1221, 'Pan tajado Bimbo', 3690, 1),
(1422, 'Lechuga', 1200, 3),
(1432, 'Cereal', 2800, 1),
(2121, 'Salchichas', 2100, 1),
(2323, 'yogurt', 2150, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo_pag` int(10) NOT NULL,
  `tipo_pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id_tipo_pag`, `tipo_pago`) VALUES
(1, 'Tarjeta Credito'),
(2, 'Efectivo'),
(3, 'Puntos Tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_produc`
--

CREATE TABLE `tipo_produc` (
  `id_tipo_prod` int(14) NOT NULL,
  `nom_tipo_prod` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_produc`
--

INSERT INTO `tipo_produc` (`id_tipo_prod`, `nom_tipo_prod`) VALUES
(1, 'alimentos'),
(2, 'productos de limpieza'),
(3, 'verduras'),
(4, 'Granos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tip_user` int(10) NOT NULL,
  `nom_tip_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id_tip_user`, `nom_tip_user`) VALUES
(1, 'administrador'),
(2, 'cajero'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `doc_user` int(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `id_tip_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`doc_user`, `nombre`, `apellido`, `username`, `clave`, `id_tip_user`) VALUES
(456, 'alberto', 'llanos', '', '', 3),
(467, 'andres', 'moreno', '', '', 3),
(1234, 'firu', 'lais', '', '', 3),
(4545, 'firulais', 'mishi', 'firulais@mish.co', '556', 2),
(6556, 'julian', 'arciniegas', '', '', 3),
(7878, 'ramon', 'valdes', 'ramon@mias.co', '6565', 2),
(31231, 'eduardo', 'vlogs', 'eduardo@misn.co', '312', 1),
(100987, 'Steban', 'Nieto', '', '', 3),
(1005765865, 'Camilo Andres', 'Montealegre Pineda', '', '', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`num_fac`),
  ADD KEY `doc_user` (`doc_user`),
  ADD KEY `id_esta_comp` (`id_esta_comp`);

--
-- Indices de la tabla `deta_compra`
--
ALTER TABLE `deta_compra`
  ADD PRIMARY KEY (`id_det_comp`),
  ADD KEY `id_tipo_pag` (`id_tipo_pag`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `num_fac` (`num_fac`);

--
-- Indices de la tabla `estado_comp`
--
ALTER TABLE `estado_comp`
  ADD PRIMARY KEY (`id_esta_comp`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_tipo_prod` (`id_tipo_prod`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipo_pag`);

--
-- Indices de la tabla `tipo_produc`
--
ALTER TABLE `tipo_produc`
  ADD PRIMARY KEY (`id_tipo_prod`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tip_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`doc_user`),
  ADD KEY `id_tip_user` (`id_tip_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `num_fac` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `deta_compra`
--
ALTER TABLE `deta_compra`
  MODIFY `id_det_comp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`doc_user`) REFERENCES `user` (`doc_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_esta_comp`) REFERENCES `estado_comp` (`id_esta_comp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deta_compra`
--
ALTER TABLE `deta_compra`
  ADD CONSTRAINT `deta_compra_ibfk_2` FOREIGN KEY (`id_tipo_pag`) REFERENCES `tipo_pago` (`id_tipo_pag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deta_compra_ibfk_4` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deta_compra_ibfk_5` FOREIGN KEY (`num_fac`) REFERENCES `compra` (`num_fac`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipo_prod`) REFERENCES `tipo_produc` (`id_tipo_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_tip_user`) REFERENCES `tipo_user` (`id_tip_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
