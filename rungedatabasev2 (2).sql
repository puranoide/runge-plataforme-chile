-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 00:40:03
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
(4, 'Chervrolet-NPR 815-4KHK1817997-2010', 'CRCW-61', 30, 1),
(5, 'HYUNDAY-HD 78 STD-D3DDA449430-2011', 'CYZY-10', 30, 1),
(6, 'VOLKSWAGEN-17250-36225658-2011', 'CWCP-38', 50, 1),
(7, 'CHEVROLET-FVR 1724-6HK1641036-2014', 'FZWT-21', 50, 1),
(8, 'CHEVROLET-NPR E5-4HK10KS880-2022', 'RSYJ-93', 30, 1),
(9, 'CHEVROLET-NPR E5-4HK10KS875-2022', 'RSYJ-94', 30, 1),
(10, 'VOLKSWAGEN-DELIVERY 11.180 -36754945', 'RYVT-10', 50, 1),
(11, 'CHEVROLET-NPR 816-4HK10VB979-2024', 'TJWL-54', 30, 1);

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
(6, 'Alex Antonio Mujica Silva', '2023-04-24 12:31:48', 2),
(7, 'Emilio José Cifuentes Rivero', '2023-10-12 12:33:09', 2),
(8, 'Fernando Willians Perez Cabello', '2021-06-11 12:33:09', 2),
(9, 'German Fernando Suarez Fuentes', '2023-02-15 12:33:09', 2),
(10, 'Hernan Elias Arredondo Albornoz', '2022-02-01 12:33:09', 2),
(11, 'Juan Antonio Gonzales Araya', '2019-09-01 12:33:09', 2),
(12, 'Pedro Antonio Cuevas Guzman', '2020-10-03 12:33:09', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresoscamiondata`
--

CREATE TABLE `egresoscamiondata` (
  `idEgresoCamionData` int(11) NOT NULL,
  `detalle` varchar(250) DEFAULT NULL,
  `montoEgresoCamion` double NOT NULL,
  `linkEgresoCamionImagen` varchar(550) DEFAULT NULL,
  `FKtipoDeIngresoCamion` int(11) DEFAULT NULL,
  `FKcamion` int(11) DEFAULT NULL,
  `fechaEgresoCamion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `egresoscamiondata`
--

INSERT INTO `egresoscamiondata` (`idEgresoCamionData`, `detalle`, `montoEgresoCamion`, `linkEgresoCamionImagen`, `FKtipoDeIngresoCamion`, `FKcamion`, `fechaEgresoCamion`) VALUES
(1, 'prueba', 100, NULL, 2, 5, NULL),
(2, 'prueba de engreso camion', 30.23, '/imagendeprueba', 1, 4, '2024-10-07'),
(3, 'prueba desde forntend', 100, '/pruebaingresoFoto', 2, 4, '2024-10-07'),
(4, 'prueba desde forntend 2', 1223.23, '/pruebaingresoFoto4', 1, 9, '2024-10-07'),
(5, 'prueba desde forntend 3', 100, '/pruebaingresoFoto', 3, 7, '2024-10-07'),
(6, 'prueba desde forntend 3', 100.23, '/pruebaingresoFoto', 2, 6, '2024-10-07'),
(7, 'prueba desde forntend 123', 100.1, '/pruebaingresoFoto3', 1, 9, '2024-10-08'),
(8, 'prueba desde forntend 123', 100, '/pruebaingresoFoto', 2, 6, '2024-10-14'),
(9, 'prueba desde forntend 123', 100, '/pruebaingresoFoto', 2, 6, '2024-10-14'),
(10, 'prueba desde forntend 123', 100, '/pruebaingresoFoto', 2, 6, '2024-10-14'),
(11, 'prueba desde forntend 123', 100, '/pruebaingresoFoto', 2, 6, '2024-10-14'),
(12, 'prueba desde forntend 123', 100, '/pruebaingresoFoto', 2, 6, '2024-10-14'),
(13, 'prueba desde forntend 123', 123123, '/pruebaingresoFoto', 2, 6, '2024-10-14'),
(14, 'prueba desde forntend 123', 123.11, '/pruebaingresoFoto', 1, 11, '2024-10-14'),
(15, 'prueba desde forntend 123', 100.3, '/pruebaingresoFoto', 2, 8, '2024-10-14'),
(16, 'prueba desde forntend 123', 111.11, '/pruebaingresoFoto2', 1, 9, '2024-10-14'),
(17, 'prueba desde forntend 123', 123230.1, '/pruebaingresoFoto1', 2, 9, '2024-10-14');

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
(58, 'Bono sábado Victor Valdivieso', 20000, '2024-08-17'),
(59, 'prueba desde front', 11111, '2024-08-29'),
(60, '123', 123, '2024-08-21'),
(61, 'prueba desde front', 123, '2024-10-14'),
(62, 'prueba desde front', 123.01, '2024-10-14'),
(63, 'prueba desde front', 1000, '2024-10-17');

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
  `tipoDeViajeFK` int(11) UNSIGNED DEFAULT NULL,
  `sobreCargo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`idEnvio`, `idCamionFk`, `idConductorFk`, `idClienteFk`, `fechaRegistrada`, `fechaInicio`, `fechaFinal`, `estadoEnvio`, `comentarioEnvio`, `rutaFotoEnvio`, `montoViaje`, `bonoConductor`, `bonoPeoneta`, `codigoEnvio`, `tipoDeViajeFK`, `sobreCargo`) VALUES
(108, 5, 7, 4, '2024-09-10 00:00:00', '2024-09-28 16:39:32', '2024-09-28 16:39:43', 3, '', '', 60100, 25000, 20000, 'prueba', 2, 100),
(109, 4, 6, 7, '2024-09-12 00:00:00', NULL, NULL, 1, NULL, NULL, 135000, NULL, NULL, 'adssda', 10, 0),
(110, 5, 6, 4, '2024-09-12 00:00:00', NULL, NULL, 1, NULL, NULL, 60000, NULL, NULL, '12345', 2, 0),
(111, 4, 7, 4, '2024-09-28 00:00:00', NULL, NULL, 1, NULL, NULL, 120000, NULL, NULL, 'adssda', 1, 0),
(112, 5, 7, 4, '2024-10-07 00:00:00', '2024-10-14 22:07:50', NULL, 2, '', '', NULL, 0, 0, 'san isidro,cerca al golf club,frente al colegio belen', 1, 11.22),
(121, 4, 6, 4, '2024-10-12 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/n5qS4bm.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0),
(122, 4, 6, 4, '2024-10-12 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/bRhhkRM.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0),
(123, 6, 10, 4, '2024-10-13 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/b52JIfH.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 2, 0),
(124, 4, 6, 4, '2024-10-12 00:00:00', NULL, NULL, 1, NULL, '', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0),
(125, 4, 6, 4, '2024-10-13 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/ezah1eR.jpeg', NULL, NULL, NULL, 'sadfsaa', 1, 0),
(126, 5, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/QLXuxxi.png', NULL, NULL, NULL, 'prueba refactorizada 1', 1, 1),
(128, 5, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/aSUKFjP.png', NULL, NULL, NULL, 'prueba refactorizada 2', 2, 1),
(129, 5, 6, 6, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/k8C9srx.png', 130001, NULL, NULL, 'prueba refactorizada 2', 10, 1),
(130, 4, 6, 5, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/mTVaQbE.jpeg', 120200, NULL, NULL, 'prueba refactorizada 3', 6, 200),
(131, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/Yt4ZszH.jpeg', 60123, NULL, NULL, 'prueba refactorizada 4', 2, 123),
(132, 4, 6, 5, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/u5rzVji.jpeg', 130123, NULL, NULL, 'prueba refactorizada 45', 7, 123),
(133, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/1hOp1JD.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 2.22),
(134, 4, 6, 5, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/kpyKJCa.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 6, 2.22),
(135, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/aj1sGp0.jpeg', NULL, NULL, NULL, 'prueba refactorizada 2', 2, 11.11),
(136, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/AnoJcm1.jpeg', 120100, NULL, NULL, '123', 1, 100),
(137, 4, 7, 5, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/LRQLkFt.jpeg', NULL, NULL, NULL, '123', 6, 12.12),
(138, 4, 7, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/xvrTxzM.jpeg', NULL, NULL, NULL, '123', 2, 12.12),
(139, 4, 7, 6, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/DGLyUPM.jpeg', NULL, NULL, NULL, '123', 10, 12.12),
(140, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/0Hllr8E.jpeg', NULL, NULL, NULL, '123', 1, 12.12),
(141, 4, 6, 5, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/NueQq1r.jpeg', 120000, NULL, NULL, '123', 6, 0),
(142, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/RFF0j2X.jpeg', NULL, NULL, NULL, '123', 2, 10.01),
(143, 4, 6, 5, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/3XFyPDN.jpeg', 120010, NULL, NULL, '123', 6, 10),
(144, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/XUZRSRp.jpeg', NULL, NULL, NULL, '123', 2, 10.01),
(145, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/xB9RC7A.jpeg', NULL, NULL, NULL, '123', 1, 10.01),
(146, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/yZK1pHw.jpeg', NULL, NULL, NULL, '123', 2, 12.12),
(147, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/a5eyN6C.png', 120010.2, NULL, NULL, '123', 1, 10.2),
(148, 4, 6, 4, '2024-10-14 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/nwdAfzw.png', 120000.01, NULL, NULL, '123', 1, 0.01),
(149, 9, 6, 4, '2024-10-17 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/OfrgN4z.png', 120012, NULL, NULL, 'p898', 1, 12);

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
(34, '100000', 1000, '2024-10-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peonetas`
--

CREATE TABLE `peonetas` (
  `idPeoneta` int(11) NOT NULL,
  `nombresyapellidoscompletos` varchar(255) NOT NULL,
  `rut` varchar(100) DEFAULT NULL,
  `fechadeingresopeoneta` date NOT NULL,
  `correopeoneta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peonetas`
--

INSERT INTO `peonetas` (`idPeoneta`, `nombresyapellidoscompletos`, `rut`, `fechadeingresopeoneta`, `correopeoneta`) VALUES
(1, 'Diego Nicolas Muñoz', '19.345.220-5', '2023-12-18', 'Nicolasmontre0@gmail.com'),
(2, 'Edouard Elismane Elismane', '26.664.278-4', '2022-12-19', 'edouardelismane86@gmail.com'),
(3, 'Educardo Enrique Araneda Valdes', '17.429.409-7', '2021-07-01', 'Aranedavaldeseduardoenrique@gmail.com'),
(4, 'Rodrigo Antonio Cuevas Guzman', '15.607.225-7', '2023-03-10', 'rodrigoocuevas80@gmail.com'),
(5, 'Victor Osvaldo Valdivieso Espinoza', '18.928.084-k', '2024-09-02', 'NAN@gmail.com'),
(6, 'Vilson Castor', '27.025.911-1', '2021-02-07', 'castorvilsonn54@gmail.com'),
(7, 'Winston James Mayor Molina', '26.504.110-8', '2023-05-09', 'Winston.mayor91@hotmail.com');

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
(36, 'prueba de sucursal 2', 'av belen 154', 4, 126),
(37, 'prueba de sucursal 2', 'av belen 154', 4, 128),
(38, 'prueba de sucursal 2', 'av belen 154', 4, 128),
(39, 'prueba de sucursal 2', 'av belen 154', 4, 129),
(40, 'prueba de sucursal 2', 'av belen 154', 6, 129),
(41, 'prueba de sucursal 2', 'av belen 154', 4, 130),
(42, 'prueba de sucursal 2', 'av belen 154', 4, 130),
(43, 'prueba de sucursal 2', 'av belen 154', 4, 131),
(44, 'prueba de sucursal 2', 'av belen 154', 5, 132),
(45, 'prueba de sucursal 2', 'av belen 154', 4, 136),
(46, 'prueba de sucursal 2', 'av belen 154', 5, 139);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeegresocamion`
--

CREATE TABLE `tipodeegresocamion` (
  `idtipoDeEgresoCamion` int(11) NOT NULL,
  `descripcionTipoEgresoCamion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodeegresocamion`
--

INSERT INTO `tipodeegresocamion` (`idtipoDeEgresoCamion`, `descripcionTipoEgresoCamion`) VALUES
(1, 'Repuestos'),
(2, 'Gasolina'),
(3, 'Mantenimiento'),
(4, 'Viáticos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdeviajes`
--

CREATE TABLE `tiposdeviajes` (
  `idTipoDeviaje` int(11) UNSIGNED NOT NULL,
  `descripcionViaje` varchar(155) DEFAULT NULL,
  `clienteFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiposdeviajes`
--

INSERT INTO `tiposdeviajes` (`idTipoDeviaje`, `descripcionViaje`, `clienteFK`) VALUES
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
(3, 'pruebaconfuncion@gmail.com', 'pruebafuncion1234', '2', 'pruebaFuncionactualizada', ''),
(4, 'xavi@gmail.com', '1234', '1', 'xavi tu papi', NULL);

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
-- Indices de la tabla `egresoscamiondata`
--
ALTER TABLE `egresoscamiondata`
  ADD PRIMARY KEY (`idEgresoCamionData`),
  ADD KEY `egresosCamionData_tipodeegresocamion_FK` (`FKtipoDeIngresoCamion`),
  ADD KEY `egresosCamionData_camion_FK` (`FKcamion`);

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
-- Indices de la tabla `peonetas`
--
ALTER TABLE `peonetas`
  ADD PRIMARY KEY (`idPeoneta`);

--
-- Indices de la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  ADD PRIMARY KEY (`idSucusalesSubClientes`),
  ADD KEY `sucursales_subclientes_cliente_FK` (`idClienteFk`),
  ADD KEY `sucursales_subclientes_envios_FK` (`idEnvioFK`);

--
-- Indices de la tabla `tipodeegresocamion`
--
ALTER TABLE `tipodeegresocamion`
  ADD PRIMARY KEY (`idtipoDeEgresoCamion`);

--
-- Indices de la tabla `tiposdeviajes`
--
ALTER TABLE `tiposdeviajes`
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
  MODIFY `camionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idconductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `egresoscamiondata`
--
ALTER TABLE `egresoscamiondata`
  MODIFY `idEgresoCamionData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `egresosmanuales`
--
ALTER TABLE `egresosmanuales`
  MODIFY `idEgresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `idEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `gestores`
--
ALTER TABLE `gestores`
  MODIFY `idgestores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresosmanuales`
--
ALTER TABLE `ingresosmanuales`
  MODIFY `idIngresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `peonetas`
--
ALTER TABLE `peonetas`
  MODIFY `idPeoneta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  MODIFY `idSucusalesSubClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tipodeegresocamion`
--
ALTER TABLE `tipodeegresocamion`
  MODIFY `idtipoDeEgresoCamion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiposdeviajes`
--
ALTER TABLE `tiposdeviajes`
  MODIFY `idTipoDeviaje` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_user_fk` FOREIGN KEY (`iduserfk`) REFERENCES `user` (`userid`);

--
-- Filtros para la tabla `egresoscamiondata`
--
ALTER TABLE `egresoscamiondata`
  ADD CONSTRAINT `egresosCamionData_camion_FK` FOREIGN KEY (`FKcamion`) REFERENCES `camion` (`camionId`),
  ADD CONSTRAINT `egresosCamionData_tipodeegresocamion_FK` FOREIGN KEY (`FKtipoDeIngresoCamion`) REFERENCES `tipodeegresocamion` (`idtipoDeEgresoCamion`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `NewTable_camion_FK` FOREIGN KEY (`idCamionFk`) REFERENCES `camion` (`camionId`),
  ADD CONSTRAINT `NewTable_cliente_FK` FOREIGN KEY (`idClienteFk`) REFERENCES `cliente` (`clienteId`),
  ADD CONSTRAINT `NewTable_conductor_FK` FOREIGN KEY (`idConductorFk`) REFERENCES `conductor` (`idconductor`),
  ADD CONSTRAINT `tipoDeViajeFK` FOREIGN KEY (`tipoDeViajeFK`) REFERENCES `tiposdeviajes` (`idTipoDeviaje`);

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
-- Filtros para la tabla `tiposdeviajes`
--
ALTER TABLE `tiposdeviajes`
  ADD CONSTRAINT `clienteFK` FOREIGN KEY (`clienteFK`) REFERENCES `cliente` (`clienteId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
