-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-08-2024 a las 17:28:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rungeDatabasev2`
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
(2, 'prueba de ingreso por funcion-2', 'L4321', 50, 1),
(3, NULL, '1234', 30, 1);

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
(4, 'canontex', 'av belen 495'),
(5, 'alicomer', 'av belen 154'),
(6, 'nutrisco', 'chile,123'),
(7, 'castaño', 'chile,321');

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
(11, 'ANTICIPOS AGOSTO', 9320000, '2024-08-15'),
(12, 'ANTICIPOS AGOSTO', 900000, '2024-08-15'),
(13, 'PREVIRED', 3076095, '2024-08-01'),
(14, 'PETROLEO ', 40000, '2024-08-01'),
(15, 'VIATICO', 15300, '2024-08-01'),
(16, 'VIATICO', 12000, '2024-08-01'),
(17, 'PAGO DE PARCELA', 1000000, '2024-08-03'),
(18, 'SERVIPAG ', 1325641, '2024-08-04'),
(19, 'Pago de vacaciones Castor Vilson (2023-2024)', 210000, '2024-08-01'),
(20, 'PAGO PARCELA ', 1000000, '2024-08-03'),
(21, 'Pago autopistas ', 1325641, '2024-08-04'),
(22, 'Pago Forum cuota 14', 380967, '2024-08-04'),
(23, 'Pago COPEC', 3429619, '2024-08-04'),
(24, 'Asesoría Contable', 300000, '2024-08-04'),
(25, 'Viatico Puerto Montt', 150000, '2024-08-04'),
(26, 'Chevrolet Servicios Financieros 4/36', 900955, '2024-08-05'),
(27, 'Viatico Ovalle', 60000, '2024-08-06'),
(28, 'Viatico Viña Park', 20000, '2024-08-06'),
(29, 'Peoneta Adicional Ovalle', 30000, '2024-08-06'),
(30, 'Viatico Talca CWCP-38', 10000, '2024-08-07'),
(31, 'Viatico Talca FZWT-21', 30000, '2024-08-12'),
(32, 'Estacionamiento Costanera Center TJWL-54', 10000, '2024-08-13'),
(33, 'Estacionamiento Plaza Oeste CYZY-10', 2100, '2024-08-13'),
(34, 'Pago Autopistas', 507099, '2024-08-13'),
(35, 'Leasing 27/38', 1441227, '2024-08-13'),
(36, 'Impuesto Julio', 639936, '2024-08-13'),
(37, 'Postergación Mayo', 6847263, '2024-08-13'),
(38, 'Viatico Viña Park FZWT-21', 18000, '2024-08-13'),
(39, 'Viatico Viña Park CYZY-10', 18000, '2024-08-13'),
(40, 'Compra de Candados', 14300, '2024-08-13'),
(41, 'Estacionamiento Viña Park FZWT-21', 3500, '2024-08-13'),
(42, 'Pago Tarjeta de Crédito', 1264936, '2024-08-14'),
(43, 'Reparación del cobertorio del sofá (Marketing)', 134129, '2024-08-14'),
(44, 'Sueldo Agosto ALFREDO RUNGE', 500000, '2024-08-14'),
(45, 'Viatico Curauma CYZY-10', 18000, '2024-08-14'),
(46, 'Viatico Curauma CWCP-38', 6000, '2024-08-14'),
(47, 'Préstamo Germán Suarez', 300000, '2024-08-15'),
(48, 'Bono feriado Pedro collao', 25000, NULL),
(49, 'Peoneta extra Curauma CYZY-10', 30000, '2024-08-15'),
(50, 'Préstamo socio ', 1000000, '2024-08-16'),
(51, 'Anticipos Agosto', 50000, '2024-08-16'),
(52, 'Reparación puerta trasera TJWL-54', 40000, '2024-08-16'),
(53, 'Estacionamiento Lider Nos CWCP-38', 2850, '2024-08-17'),
(54, 'Abono camión nuevo', 3500000, '2024-08-17'),
(55, 'Seguros Zurich', 228072, '2024-08-17'),
(56, 'Mantenimiento RSYJ-94', 166600, '2024-08-17'),
(57, 'Bono sábado Pedro Collao ', 30000, '2024-08-17'),
(58, 'Bono sábado Victor Valdivieso', 20000, '2024-08-17');

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
  `codigoEnvio` varchar(100) DEFAULT NULL,
  `tipoDeViajeFK` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`idEnvio`, `idCamionFk`, `idConductorFk`, `idClienteFk`, `fechaRegistrada`, `fechaInicio`, `fechaFinal`, `estadoEnvio`, `comentarioEnvio`, `rutaFotoEnvio`, `montoViaje`, `bonoConductor`, `bonoPeoneta`, `codigoEnvio`, `tipoDeViajeFK`) VALUES
(61, 1, 4, 4, '2024-08-12 10:16:19', '2024-08-16 14:35:35', '2024-08-16 14:35:43', 3, '', '', 120000, NULL, NULL, 'p0003', 1),
(62, 1, 4, 4, '2024-08-12 10:18:34', NULL, NULL, 1, NULL, NULL, 60000, NULL, NULL, 'P0004', 2),
(63, 2, 5, 4, '2024-08-12 14:15:30', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0005', 3),
(64, 2, 5, 4, '2024-08-12 14:15:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P0005', 4),
(65, 2, 5, 4, '2024-08-13 16:38:02', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P0005', 5),
(68, 1, 4, 5, '2024-08-15 17:54:30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P0009', 1),
(69, 2, 4, 4, '2024-08-15 18:00:42', NULL, NULL, 1, NULL, NULL, 140000, NULL, NULL, 'P0010', 1),
(72, 1, 4, 5, '2024-08-15 18:45:49', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0011', 9),
(73, 2, 4, 4, '2024-08-15 18:46:25', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0002', 3),
(74, 2, 5, 4, '2024-08-15 18:46:50', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0011', 3),
(75, 1, 4, 5, '2024-08-15 18:47:53', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0002', 8),
(76, 2, 4, 5, '2024-08-15 18:48:51', NULL, NULL, 1, NULL, NULL, 150000, NULL, NULL, 'P0011', 7),
(84, 1, 4, 5, '2024-08-15 19:10:17', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0011', 6),
(86, 2, 5, 6, '2024-08-15 19:15:12', NULL, NULL, 1, NULL, NULL, 150000, NULL, NULL, 'P0011', 10),
(87, 2, 4, 7, '2024-08-15 19:15:44', NULL, NULL, 1, NULL, NULL, 135000, NULL, NULL, '123sadas', 10),
(88, 1, 4, 7, '2024-08-15 19:16:25', NULL, NULL, 1, NULL, NULL, 135000, NULL, NULL, 'P0011', 10),
(89, 1, 4, 7, '2024-08-15 19:17:25', NULL, NULL, 1, NULL, NULL, 135000, NULL, NULL, 'p134', 10),
(90, 2, 5, 5, '2024-08-15 20:22:16', '2024-08-15 20:25:16', '2024-08-15 20:26:03', 3, '', '', 140000, NULL, NULL, 'P0014', 6),
(91, 2, 5, 7, '2024-08-15 20:27:05', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P0011', 10),
(92, 2, 4, 5, '2024-08-15 21:14:53', NULL, NULL, 1, NULL, NULL, 140000, NULL, NULL, 'P0011', 6),
(93, 2, 5, 4, '2024-08-15 21:21:37', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, '101106', 3),
(94, 1, 4, 4, '2024-08-15 21:24:28', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'P0011', 2),
(95, 3, 5, 4, '2024-08-15 21:27:31', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'P0002', 1),
(96, 1, 4, 6, '2024-08-17 11:15:00', '2024-08-18 12:02:26', '2024-08-18 12:02:36', 3, '', '', 130000, NULL, NULL, 'P0004', 10),
(98, 2, 5, 4, '2024-08-20 15:48:47', NULL, NULL, 1, NULL, NULL, 70000, NULL, NULL, '12323', 2);

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
(20, 'OC DISTRIHOGAR', 10043600, '2024-08-13'),
(21, 'FACTURA LOS TRES SPA', 1000000, '2024-08-14'),
(22, 'OC CANONTEX', 32105010, '2024-08-08'),
(23, 'FACTURA 218 LAOTONG LOG SPA', 1201900, '2024-08-08'),
(24, 'SALDO JULIO', 23099555, '2024-07-31'),
(25, 'PRESTAMO SOCIO', 300000, '2024-08-02'),
(26, 'PRESTAMO SOCIO 2/3', 150000, '2024-08-02');

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
(24, 'sucursal xavi', 'av lol', 7, 91),
(25, 'sucursal xavi', 'av lol', 4, 94),
(26, 'sucursal gabriel', 'av peru', 4, 94),
(27, 'sucursal gabriel', 'av lol', 6, 96),
(28, 'sucursal xavi', 'av lol', 6, 96),
(29, 'mid mall', 'p,atricia viñuela', 4, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposDeViajes`
--

CREATE TABLE `tiposDeViajes` (
  `idTipoDeviaje` int(11) UNSIGNED NOT NULL,
  `descripcionViaje` varchar(155) DEFAULT NULL,
  `clienteFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiposDeViajes`
--

INSERT INTO `tiposDeViajes` (`idTipoDeviaje`, `descripcionViaje`, `clienteFK`) VALUES
(1, 'viaje 1', 4),
(2, 'viaje 2', 4),
(3, 'viaje 3', 4),
(4, 'viaje 2-Ruta Colchon', 4),
(5, 'viaje 3-ruta Colchon', 4),
(6, 'entrega de pan', 5),
(7, 'retiro de harina', 5),
(8, 'retiro de cajas de carton', 5),
(9, 'retiro de bandejas plasticas', 5),
(10, 'ruta con sucursales', NULL);

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
  ADD KEY `NewTable_conductor_FK` (`idConductorFk`),
  ADD KEY `tipoDeViajeFK` (`tipoDeViajeFK`);

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
-- Indices de la tabla `tiposDeViajes`
--
ALTER TABLE `tiposDeViajes`
  ADD PRIMARY KEY (`idTipoDeviaje`),
  ADD KEY `clienteFK` (`clienteFK`);

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
  MODIFY `camionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idconductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `egresosmanuales`
--
ALTER TABLE `egresosmanuales`
  MODIFY `idEgresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `idEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `gestores`
--
ALTER TABLE `gestores`
  MODIFY `idgestores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresosmanuales`
--
ALTER TABLE `ingresosmanuales`
  MODIFY `idIngresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  MODIFY `idSucusalesSubClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tiposDeViajes`
--
ALTER TABLE `tiposDeViajes`
  MODIFY `idTipoDeviaje` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `NewTable_conductor_FK` FOREIGN KEY (`idConductorFk`) REFERENCES `conductor` (`idconductor`),
  ADD CONSTRAINT `tipoDeViajeFK` FOREIGN KEY (`tipoDeViajeFK`) REFERENCES `tiposDeViajes` (`idTipoDeviaje`);

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

--
-- Filtros para la tabla `tiposDeViajes`
--
ALTER TABLE `tiposDeViajes`
  ADD CONSTRAINT `clienteFK` FOREIGN KEY (`clienteFK`) REFERENCES `cliente` (`clienteId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
