-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2021 a las 07:25:36
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
  `IdPersona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IdSede` int(11) NOT NULL,
  `Cargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Funcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`Id`, `IdPersona`, `IdSede`, `Cargo`, `Funcion`, `Estado`) VALUES
(7, '09364738', 7, 'Administrador General', '', 1),
(8, '09691350', 3, 'Administrador de Ruta', '', 1),
(9, '78464937', 4, 'Administrador de Ruta', '', 1),
(10, '12345678', 3, 'Administrador General', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `Id` int(11) NOT NULL,
  `IdPersona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `NroLicencia` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `CatLicencia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`Id`, `IdPersona`, `NroLicencia`, `CatLicencia`, `Estado`) VALUES
(2, '09691350', 'Q12345678', 'A-IIa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ruta`
--

CREATE TABLE `detalle_ruta` (
  `Id` int(11) NOT NULL,
  `IdRuta` int(11) NOT NULL,
  `HoraEntrada` time NOT NULL,
  `HoraSalida` time NOT NULL,
  `Duracion` time NOT NULL,
  `Observacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Id` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TipoDocumento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nacionalidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoPa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoMa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Id`, `TipoDocumento`, `Nacionalidad`, `Nombre`, `ApellidoPa`, `ApellidoMa`, `Telefono`, `Correo`, `Direccion`, `Creado`) VALUES
('09364738', 'DNI', 'Peruana', 'Juan', 'Perez', 'Manzilla', '985697939', 'jperez@gmail.com', 'Mz. O lt-38', '2021-02-11 01:16:35'),
('09691350', 'DNI', 'Peruana', 'Jorge', 'Cuenca', 'Perez', '981233728', 'asdas@gmail.com', 'VES', '2021-02-08 21:38:41'),
('12345678', 'DNI', 'Peruana', 'nickol', 'Sinchi', 'Urbano', '987654323', 'chinita@gmail.com', 'VES', '2021-02-08 06:10:04'),
('2404989', 'DNI', 'Peruana', 'Danitza', 'Carrasco', 'Chuquihuanca', '923859290', 'nisha', 'VMT', '2021-02-08 06:07:24'),
('78464937', 'DNI', 'Peruana', 'Joel', 'Cuenca', 'Villogas', '981323726', 'joael@gmail.com', 'Mz o LT38 ', '2021-02-08 00:56:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `Id` int(11) NOT NULL,
  `IdPersona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TarjetaPropiedad` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TelEmergencia` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`Id`, `IdPersona`, `TarjetaPropiedad`, `Ruc`, `TelEmergencia`, `Estado`) VALUES
(3, '09691350', '12312412', '', '', 1),
(4, '78464937', 'qwe12213', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `Id` int(11) NOT NULL,
  `IdConductor` int(11) NOT NULL,
  `IdAdministrativo` int(11) NOT NULL,
  `IdVehiculo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Ganancia` double NOT NULL,
  `Observacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `Id` int(11) NOT NULL,
  `Sede` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`Id`, `Sede`) VALUES
(3, 'Palmas'),
(4, 'VMT'),
(7, 'Centro de Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `IdPersona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `perfil` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `ultimo_login` datetime NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `IdPersona`, `usuario`, `password`, `perfil`, `estado`, `ultimo_login`, `creado`) VALUES
(6, '09691350', 'fer', '$2a$07$asxx54ahjppf45sd87a5aulYTAkXz0mb2xR6/H5UMsA9SCILYDwxW', 'Especial', 1, '0000-00-00 00:00:00', '2021-02-11 02:42:33'),
(10, '78464937', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Administrador', 1, '0000-00-00 00:00:00', '2021-02-11 01:08:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IdPropietario` int(11) NOT NULL,
  `Marca` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Año` int(11) NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Id`, `IdPropietario`, `Marca`, `Año`, `Tipo`, `Estado`, `Creado`) VALUES
('af192', 3, 'toyota', 2012, 'bus', 1, '2021-02-15 06:17:17'),
('ash283', 4, 'toyota', 2011, 'combi', 1, '2021-02-15 06:17:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPersona` (`IdPersona`),
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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_IdPersona` (`IdPersona`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `administrativo_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`),
  ADD CONSTRAINT `administrativo_ibfk_2` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`Id`);

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
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_IdPersona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`IdPropietario`) REFERENCES `propietario` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
