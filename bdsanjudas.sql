-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2021 a las 23:34:28
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsanjudas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `Id` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdPeriodo` int(11) NOT NULL,
  `IdSede` int(11) NOT NULL,
  `Cargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Funcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`Id`, `IdPersona`, `IdPeriodo`, `IdSede`, `Cargo`, `Funcion`, `Estado`) VALUES
(2, 2, 1, 1, 'Administrador de Ruta', 'Registrar las rutas', 1),
(3, 5, 1, 1, 'Administrador de Ruta', 'Registrar las rutas', 1),
(4, 6, 1, 1, 'Administrador General', '', 1),
(5, 11, 1, 1, 'Administrador de Ruta', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `Id` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `NroLicencia` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `CatLicencia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`Id`, `IdPersona`, `NroLicencia`, `CatLicencia`, `Estado`) VALUES
(3, 4, 'Q918232', 'A-IIb', 1),
(5, 3, 'Q78464937', 'A-IIIa', 1),
(6, 7, 'Q08457688', 'A-IIIa', 1),
(7, 8, 'Q13845960', 'A-IIIa', 1),
(8, 9, 'Q03845728', 'A-IIIa', 1),
(9, 10, 'Q98375868', 'A-IIIb', 1),
(10, 5, 'Q75473829', 'A-IIIa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ruta`
--

CREATE TABLE `detalle_ruta` (
  `Id` int(11) NOT NULL,
  `IdRuta` int(11) NOT NULL,
  `HoraSalida` time NOT NULL DEFAULT current_timestamp(),
  `HoraLlegada` time DEFAULT NULL,
  `Ingreso` decimal(10,0) DEFAULT NULL,
  `Observacion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_ruta`
--

INSERT INTO `detalle_ruta` (`Id`, `IdRuta`, `HoraSalida`, `HoraLlegada`, `Ingreso`, `Observacion`) VALUES
(34, 21, '00:23:07', '00:23:14', NULL, NULL),
(35, 21, '00:23:21', '00:23:27', NULL, NULL),
(36, 22, '01:24:30', '01:24:37', NULL, NULL),
(37, 22, '14:27:11', '14:27:23', NULL, NULL),
(38, 22, '15:49:53', '16:08:24', NULL, NULL),
(41, 23, '17:31:56', '17:32:39', NULL, NULL),
(43, 23, '17:58:52', '17:59:06', NULL, NULL),
(44, 23, '23:18:43', '23:18:48', NULL, NULL),
(45, 24, '09:17:32', '09:17:39', NULL, NULL),
(46, 25, '19:39:54', '19:40:00', NULL, NULL),
(47, 25, '22:46:44', '22:46:52', NULL, NULL),
(48, 26, '02:07:09', '02:12:42', NULL, NULL),
(49, 26, '02:12:49', '02:13:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`Id`, `Nombre`) VALUES
(1, '2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Id` int(11) NOT NULL,
  `TipoDocumento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nacionalidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `NumeroDoc` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoPa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoMa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Id`, `TipoDocumento`, `Nacionalidad`, `NumeroDoc`, `Nombre`, `ApellidoPa`, `ApellidoMa`, `Telefono`, `Correo`, `Direccion`, `Creado`) VALUES
(2, 'DNI', 'PERUANA', '80231377', 'Joel', 'Cuenca', 'Villogas', '981234539', 'joel@gmail.com', 'VES', '2021-03-04 00:53:24'),
(3, 'DNI', 'Peruana', '78464937', 'Danitza', 'Carrasco', 'Chuquihuanca', '981234532', 'carras@gmail.com', '', '2021-02-23 05:04:59'),
(4, 'DNI', 'Peruana', '78938564', 'Jose ', 'Mendoza', 'Perez', '1234567890', 'jperez@gmail.com', '', '2021-02-24 04:01:17'),
(5, 'DNI', 'Peruana', '75473829', 'Ysac', 'Cuenca', 'Manzilla', '123456789', 'perez@gmail.com', '', '2021-03-07 23:40:55'),
(6, 'DNI', 'Peruana', '78564758', 'Miguel', 'Chozo', 'Rivadeneyra', '989268046', 'march_tadeo@hotmail.com', '', '2021-03-06 23:48:51'),
(7, 'DNI', 'PERUANA', '08457688', 'Armando ', 'Salcedo', 'Salcedo', '983576437', 'salcedo_08@gmail.com', '', '2021-03-07 23:06:32'),
(8, 'DNI', 'PERUANA', '13845960', 'Jose', 'Burga', 'Villar', '983457468', 'Jose_vi@gmail.com', '', '2021-03-07 23:28:57'),
(9, 'DNI', 'PERUANA', '03845728', 'Jesus', 'Valencia', 'Paredes', '983495948', 'Jesu09s@gmail.com', '', '2021-03-07 23:30:43'),
(10, 'DNI', 'PERUANA', '98375868', 'Jose', 'Ardino', 'Paredes', '982375634', 'Ardinoc09@gmail.com', '', '2021-03-07 23:32:34'),
(11, 'DNI', 'PERUANA', '02853527', 'Jose Luis', 'Morales', 'Solgorre', '913071405', 'morale@gmail.com', '', '2021-03-07 23:37:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `Id` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `TarjetaPropiedad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TelEmergencia` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`Id`, `IdPersona`, `TarjetaPropiedad`, `TelEmergencia`, `Estado`) VALUES
(4, 7, 'QH0937458', '', 1),
(5, 11, 'A092341', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `Id` int(11) NOT NULL,
  `IdConductor` int(11) NOT NULL,
  `IdAdministrativo` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ganancia` decimal(19,2) DEFAULT NULL,
  `Observacion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`Id`, `IdConductor`, `IdAdministrativo`, `IdVehiculo`, `Fecha`, `Ganancia`, `Observacion`) VALUES
(21, 5, 5, 1, '2021-03-03 05:22:58', '250.00', ''),
(22, 3, 5, 3, '2021-03-03 06:24:23', '190.00', ''),
(23, 3, 5, 3, '2021-03-06 22:31:49', '190.00', NULL),
(24, 3, 5, 6, '2021-03-07 14:17:23', '250.00', NULL),
(25, 3, 3, 4, '2021-03-08 00:39:47', '300.00', 'ok'),
(26, 7, 3, 6, '2021-03-08 07:07:02', '270.00', 'Todo ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `Id` int(11) NOT NULL,
  `Sede` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`Id`, `Sede`) VALUES
(1, 'Las Palmas'),
(2, 'Centro de Lima'),
(3, 'Villa Maria del Triunfo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Perfil` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `IdPersona`, `Usuario`, `Password`, `Perfil`, `Estado`, `Creado`) VALUES
(2, 2, 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Administrador', 1, '2021-03-07 23:22:42'),
(4, 6, 'Chozo', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', 1, '2021-03-08 05:14:50'),
(5, 11, 'admin123', '$2a$07$asxx54ahjppf45sd87a5auUT6aJXA0AIEmZ0IwDqQ544.p3yGlkI.', 'Digitador', 1, '2021-03-08 00:38:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Id` int(11) NOT NULL,
  `IdPropietario` int(11) DEFAULT NULL,
  `Placa` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Id`, `IdPropietario`, `Placa`, `Tipo`, `Estado`, `Creado`) VALUES
(1, 5, 'A1B-780', 'Bus', 1, '2021-03-08 00:21:58'),
(3, 5, 'A1K-739', 'Bus', 1, '2021-03-07 23:56:37'),
(4, 5, 'A3E-748', 'Bus', 1, '2021-03-08 00:02:13'),
(6, 4, 'A5P-710', 'Bus', 1, '2021-03-07 23:11:58'),
(8, 4, 'A9Q-706', 'Bus', 1, '2021-03-07 23:13:36'),
(9, 4, 'ASU-768', 'Bus', 1, '2021-03-07 23:13:13'),
(10, 4, 'AWQ-778', 'Bus', 1, '2021-03-07 23:15:59'),
(11, 4, 'BBD-762', 'Bus', 1, '2021-03-07 23:19:05'),
(12, 5, 'C2D-780', 'Bus', 1, '2021-03-07 23:57:37'),
(13, 4, 'C6W-444', 'Bus', 1, '2021-03-07 23:19:06'),
(14, 4, 'C8E-779', 'Bus', 1, '2021-03-07 23:19:06'),
(15, 4, 'DOP-875', 'Bus', 1, '2021-03-07 23:19:06'),
(16, 4, 'D7A-729', 'Bus', 1, '2021-03-07 23:19:06'),
(17, 4, 'D7B-706', 'Bus', 1, '2021-03-07 23:19:06'),
(18, 4, 'F8P-811', 'Bus', 1, '2021-03-07 23:19:06'),
(19, 4, 'Z3R-750', 'Bus', 1, '2021-03-07 23:19:06'),
(20, 4, 'A92-786', 'Bus', 1, '2021-03-07 23:19:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPersona` (`IdPersona`),
  ADD KEY `IdPeriodo` (`IdPeriodo`),
  ADD KEY `IdSede` (`IdSede`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdRuta` (`IdRuta`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdConductor` (`IdConductor`),
  ADD KEY `IdAdministrativo` (`IdAdministrativo`),
  ADD KEY `IdVehiculo` (`IdVehiculo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPropietario` (`IdPropietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `administrativo_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`),
  ADD CONSTRAINT `administrativo_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`Id`),
  ADD CONSTRAINT `administrativo_ibfk_3` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`Id`);

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  ADD CONSTRAINT `detalle_ruta_ibfk_1` FOREIGN KEY (`IdRuta`) REFERENCES `ruta` (`Id`);

--
-- Filtros para la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD CONSTRAINT `propietario_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`IdConductor`) REFERENCES `conductor` (`Id`),
  ADD CONSTRAINT `ruta_ibfk_2` FOREIGN KEY (`IdAdministrativo`) REFERENCES `administrativo` (`Id`),
  ADD CONSTRAINT `ruta_ibfk_3` FOREIGN KEY (`IdVehiculo`) REFERENCES `vehiculo` (`Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`IdPropietario`) REFERENCES `propietario` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
