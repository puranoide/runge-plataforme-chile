-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2024 a las 18:37:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rungedatabasev2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE `camion` (
  `camionId` int(11) NOT NULL,
  `descripcionCamion` varchar(100) DEFAULT NULL,
  `placaCamion` varchar(150) NOT NULL,
  `cubicajeCamion` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camion`
--

INSERT INTO `camion` (`camionId`, `descripcionCamion`, `placaCamion`, `cubicajeCamion`, `estado`) VALUES
(1, 'prueba de ingreso por funcion-actualizada', 'L1234', 30, 2),
(2, 'prueba de ingreso por funcion-2', 'L4321', 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `clienteId` int(11) NOT NULL,
  `nombreCliente` varchar(100) DEFAULT NULL,
  `SucursalPrincipal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`clienteId`, `nombreCliente`, `SucursalPrincipal`) VALUES
(1, 'gabriel', 'av belen 495'),
(2, 'edgar macedo', 'calle jose lean 1551'),
(3, 'Juan Carrera', 'av belen 495 departamento 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idconductor` int(11) NOT NULL,
  `completenameconductor` varchar(255) NOT NULL,
  `fechaingresoconductor` datetime NOT NULL,
  `iduserfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idconductor`, `completenameconductor`, `fechaingresoconductor`, `iduserfk`) VALUES
(4, 'edgar actualizado', '2024-07-23 00:34:38', 2),
(5, 'edgar macedo', '2024-07-23 12:13:08', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresosmanuales`
--

CREATE TABLE `egresosmanuales` (
  `idEgresosManuales` int(11) NOT NULL,
  `descripcionEgresosManuales` text DEFAULT NULL,
  `montoEgresosManuales` double DEFAULT NULL,
  `fechaRegistrada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `egresosmanuales`
--

INSERT INTO `egresosmanuales` (`idEgresosManuales`, `descripcionEgresosManuales`, `montoEgresosManuales`, `fechaRegistrada`) VALUES
(5, 'ESTE MES 1', 10, '2024-08-06'),
(6, 'ESTE MES 2', 10.1, '2024-08-06'),
(7, 'MES SIGUIENTE', 10.3, '2024-09-03'),
(8, 'prueba desde front para panel', 123, '2024-08-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `idEnvio` int(11) NOT NULL,
  `idCamionFk` int(11) DEFAULT NULL,
  `idConductorFk` int(11) DEFAULT NULL,
  `idClienteFk` int(11) DEFAULT NULL,
  `fechaRegistrada` datetime NOT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaFinal` datetime DEFAULT NULL,
  `estadoEnvio` int(11) NOT NULL,
  `comentarioEnvio` text DEFAULT NULL,
  `rutaFotoEnvio` varchar(255) DEFAULT NULL,
  `montoViaje` double DEFAULT NULL,
  `bonoConductor` double DEFAULT NULL,
  `bonoPeoneta` int(11) DEFAULT NULL,
  `codigoEnvio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`idEnvio`, `idCamionFk`, `idConductorFk`, `idClienteFk`, `fechaRegistrada`, `fechaInicio`, `fechaFinal`, `estadoEnvio`, `comentarioEnvio`, `rutaFotoEnvio`, `montoViaje`, `bonoConductor`, `bonoPeoneta`, `codigoEnvio`) VALUES
(4, 1, 4, 1, '2024-07-25 11:27:29', '2024-07-25 23:13:44', '2024-07-25 23:14:47', 3, 'prueba Comentario', '', NULL, NULL, NULL, NULL),
(5, 1, 4, 1, '2024-07-25 11:28:23', '2024-07-26 10:57:34', NULL, 2, 'prueba Comentario', '', NULL, NULL, NULL, NULL),
(6, 1, 4, 1, '2024-07-25 11:36:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 4, 1, '2024-07-25 11:37:28', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 4, 1, '2024-07-25 11:37:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 4, 1, '2024-07-26 19:44:11', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(10, 1, 4, 1, '2024-07-26 21:08:10', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(11, 1, 4, 1, '2024-07-26 21:09:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(12, 1, 4, 1, '2024-07-26 21:10:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(13, 1, 4, 1, '2024-07-26 21:11:58', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(14, 1, 4, 1, '2024-07-26 21:12:06', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(15, 1, 4, 1, '2024-07-26 21:12:19', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(16, 1, 4, 1, '2024-07-26 21:12:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(17, 1, 4, 1, '2024-07-26 21:12:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(18, 1, 4, 1, '2024-07-26 21:14:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(19, 1, 4, 1, '2024-07-26 21:16:09', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P13243a'),
(20, 2, 5, 1, '2024-07-26 21:23:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2323'),
(21, 1, 4, 1, '2024-07-26 21:38:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2324'),
(22, 1, 5, 2, '2024-07-27 13:27:13', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '23245'),
(23, 1, 5, 3, '2024-07-28 18:44:02', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '1111'),
(24, 1, 4, 2, '2024-07-31 12:09:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2222'),
(25, 2, 4, 1, '2024-08-04 12:56:11', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestores`
--

CREATE TABLE `gestores` (
  `idgestores` int(11) NOT NULL,
  `completenamegestores` varchar(255) NOT NULL,
  `fechaingresogestor` varchar(100) NOT NULL,
  `iduserfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gestores`
--

INSERT INTO `gestores` (`idgestores`, `completenamegestores`, `fechaingresogestor`, `iduserfk`) VALUES
(1, 'gabriel actualizado', '2024-07-24 22:48:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosmanuales`
--

CREATE TABLE `ingresosmanuales` (
  `idIngresosManuales` int(11) NOT NULL,
  `descripcionIngresosManuales` text DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `fechaIngresoManual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingresosmanuales`
--

INSERT INTO `ingresosmanuales` (`idIngresosManuales`, `descripcionIngresosManuales`, `monto`, `fechaIngresoManual`) VALUES
(12, 'prueba desde front', 10.1, '2024-08-06'),
(13, 'prueba desde backend-otromes', 10.1, '2024-09-18'),
(14, 'prueba grafica', 100, '2024-08-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursalessubclientes`
--

CREATE TABLE `sucursalessubclientes` (
  `idSucusalesSubClientes` int(11) NOT NULL,
  `nombreSubcliente` varchar(255) DEFAULT NULL,
  `direccionSubCliente` varchar(255) DEFAULT NULL,
  `idClienteFk` int(11) DEFAULT NULL,
  `idEnvioFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursalessubclientes`
--

INSERT INTO `sucursalessubclientes` (`idSucusalesSubClientes`, `nombreSubcliente`, `direccionSubCliente`, `idClienteFk`, `idEnvioFK`) VALUES
(1, 'ale rCAMBIADO', 'prueba de calle actualizada', 3, 4),
(8, 'gabriel-subcliente', 'calle belen 155112', 1, 4),
(9, 'edgar macedo-subcliente', 'calle jose lean 155112', 2, 8),
(10, 'prueba de sucursal', 'prueba direccion sucursal', 2, 20),
(11, 'prueba de sucursal 2', 'prueba direccion sucursal 2', 1, 20),
(12, 'prueba de sucursal 3', 'prueba direccion sucursal 3', 2, 20),
(13, 'prueba de sucursal 3', 'prueba direccion sucursal 3', 2, 20),
(14, 'prueba de sucursal 1', 'prueba direccion sucursal 2', 3, 21),
(15, 'prueba de sucursal 2', 'prueba direccion sucursal 2', 3, 21),
(16, 'prueba de sucursal 2', 'prueba direccion sucursal 2', 1, 21),
(17, 'prueba de sucursal 2', 'prueba direccion sucursal 2', 2, 22),
(18, 'prueba de sucursal344', 'prueba direccion sucursal 333', 3, 22),
(19, 'gabriel prueba de vista kaka', 'nombreCliente', 1, 23),
(20, 'gabriel prueba de vista kaka', 'nombreCliente asdasd', 2, 24),
(21, 'qweqwe', '312wqe', 2, 24),
(22, 'prueba de sucursal', 'av belen 495', 2, 25),
(23, 'prueba de sucursal 2', 'av belen 495', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `correo` varchar(155) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fotorutauserprofile` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userid`, `correo`, `userpass`, `rol`, `username`, `fotorutauserprofile`) VALUES
(1, 'angel@gmail.com', 'Perogame1', '1', 'puranogame', NULL),
(2, 'conductor@gmail.com', 'conductorPrueba', '2', 'conductor-prueba', NULL),
(3, 'pruebaconfuncion@gmail.com', 'pruebafuncion1234', '2', 'pruebaFuncionactualizada', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`camionId`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clienteId`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idconductor`),
  ADD KEY `conductor_user_fk` (`iduserfk`);

--
-- Indices de la tabla `egresosmanuales`
--
ALTER TABLE `egresosmanuales`
  ADD PRIMARY KEY (`idEgresosManuales`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`idEnvio`),
  ADD KEY `NewTable_camion_FK` (`idCamionFk`),
  ADD KEY `NewTable_cliente_FK` (`idClienteFk`),
  ADD KEY `NewTable_conductor_FK` (`idConductorFk`);

--
-- Indices de la tabla `gestores`
--
ALTER TABLE `gestores`
  ADD PRIMARY KEY (`idgestores`),
  ADD KEY `gestores_user_fk` (`iduserfk`);

--
-- Indices de la tabla `ingresosmanuales`
--
ALTER TABLE `ingresosmanuales`
  ADD PRIMARY KEY (`idIngresosManuales`);

--
-- Indices de la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  ADD PRIMARY KEY (`idSucusalesSubClientes`),
  ADD KEY `sucursales_subclientes_cliente_FK` (`idClienteFk`),
  ADD KEY `sucursales_subclientes_envios_FK` (`idEnvioFK`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camion`
--
ALTER TABLE `camion`
  MODIFY `camionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idconductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `egresosmanuales`
--
ALTER TABLE `egresosmanuales`
  MODIFY `idEgresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `idEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `gestores`
--
ALTER TABLE `gestores`
  MODIFY `idgestores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresosmanuales`
--
ALTER TABLE `ingresosmanuales`
  MODIFY `idIngresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  MODIFY `idSucusalesSubClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_user_fk` FOREIGN KEY (`iduserfk`) REFERENCES `user` (`userid`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `NewTable_camion_FK` FOREIGN KEY (`idCamionFk`) REFERENCES `camion` (`camionId`),
  ADD CONSTRAINT `NewTable_cliente_FK` FOREIGN KEY (`idClienteFk`) REFERENCES `cliente` (`clienteId`),
  ADD CONSTRAINT `NewTable_conductor_FK` FOREIGN KEY (`idConductorFk`) REFERENCES `conductor` (`idconductor`);

--
-- Filtros para la tabla `gestores`
--
ALTER TABLE `gestores`
  ADD CONSTRAINT `gestores_user_fk` FOREIGN KEY (`iduserfk`) REFERENCES `user` (`userid`);

--
-- Filtros para la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  ADD CONSTRAINT `sucursales_subclientes_cliente_FK` FOREIGN KEY (`idClienteFk`) REFERENCES `cliente` (`clienteId`),
  ADD CONSTRAINT `sucursales_subclientes_envios_FK` FOREIGN KEY (`idEnvioFK`) REFERENCES `envios` (`idEnvio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
