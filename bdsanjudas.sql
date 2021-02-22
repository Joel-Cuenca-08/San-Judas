-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2021 a las 06:25:25
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
(2, 2, 1, 2, 'Administrador de Ruta', 'Registrar las rutas', 1);

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
(2, 2, 'Q78463927', 'A-IIb', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ruta`
--

CREATE TABLE `detalle_ruta` (
  `Id` int(11) NOT NULL,
  `IdRuta` int(11) NOT NULL,
  `HoraSalida` time NOT NULL,
  `HoraLlegada` time NOT NULL,
  `Duracion` time NOT NULL,
  `Observacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, '2020');

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
(2, 'DNI', 'PERUANA', '80231377', 'Joel', 'Cuenca', 'Villogas', '981234539', 'joel@gmail.com', '', '2021-02-22 05:07:00'),
(3, 'DNI', 'Peruana', '78464937', 'Dani', 'Carras', 'Contresa', '981234532', 'carras@gmail.com', '', '2021-02-22 05:07:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `Id` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `TarjetaPropiedad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Ruc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TelEmergencia` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`Id`, `IdPersona`, `TarjetaPropiedad`, `Ruc`, `TelEmergencia`, `Estado`) VALUES
(1, 2, '987ccv', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `Id` int(11) NOT NULL,
  `IdConductor` int(11) NOT NULL,
  `IdAdministrativo` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Ganancia` double NOT NULL,
  `Observacion` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(2, 2, 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Administrador', 1, '2021-02-22 04:02:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Id` int(11) NOT NULL,
  `IdPropietario` int(11) NOT NULL,
  `Placa` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Marca` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Año` int(11) NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Id`, `IdPropietario`, `Placa`, `Marca`, `Año`, `Tipo`, `Estado`, `Creado`) VALUES
(1, 1, 'AFH-192', 'Toyota', 1990, 'Combi', 0, '2021-02-22 04:15:29');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
