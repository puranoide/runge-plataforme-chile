-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2024 a las 16:28:04
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
-- Base de datos: `rungedatabasev3`
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
(11, 'CHEVROLET-NPR 816-4HK10VB979-2024', 'TJWL-54', 30, 1),
(12, 'Chervrolet-NQR919VL20-4HK10XD571-2024', 'TRFY-97', 50, 1),
(13, 'Chervrolet-NPR816VL20-4HK10XJ790-2024', 'TRWL-45', 30, 1);

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
(12, 'Pedro Antonio Cuevas Guzman', '2020-10-03 12:33:09', 2),
(13, 'Pablo Octavio Arevalo Rosales', '2019-08-09 00:00:00', 2),
(14, 'Walter Alberto Vielma Guarda', '2019-10-04 00:00:00', 2);

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
(66, 'prueba desde front', 100000, '2024-10-26'),
(67, 'prueba desde front', 100000, '2024-09-26');

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
  `sobreCargo` double DEFAULT NULL,
  `rutacomplementariaid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`idEnvio`, `idCamionFk`, `idConductorFk`, `idClienteFk`, `fechaRegistrada`, `fechaInicio`, `fechaFinal`, `estadoEnvio`, `comentarioEnvio`, `rutaFotoEnvio`, `montoViaje`, `bonoConductor`, `bonoPeoneta`, `codigoEnvio`, `tipoDeViajeFK`, `sobreCargo`, `rutacomplementariaid`) VALUES
(169, 7, 8, 4, '2024-10-26 00:00:00', '2024-10-26 16:30:06', NULL, 2, '', '', 140000, 25000, 20000, 'prueba bonos', 1, 0, NULL),
(170, 4, 6, 4, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/pPxeWXJ.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, NULL),
(171, 4, 6, 4, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/TPqadFL.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, NULL),
(173, 4, 6, 4, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/Zokk4CV.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, NULL),
(174, 4, 6, 5, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/vJeAM3Q.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 6, 0, NULL),
(175, 4, 6, 4, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/t6MzI9u.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, NULL),
(176, 4, 6, 5, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/sQ2EJ7W.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 6, 0, NULL),
(177, 4, 6, 4, '2024-10-26 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/Lw6KH7d.jpeg', 120000, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, NULL),
(178, 4, 6, 4, '2024-10-29 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/1owN5bH.jpeg', 120000, NULL, NULL, 'ppppp', 1, 0, NULL),
(181, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/NIfZtUO.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 4, 10, 0),
(182, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/uDLhXJT.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 4, 10, 0),
(183, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/dJDIYIx.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 4, 10, 9),
(184, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/Y2US1af.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 4, 10, 9),
(185, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/bwiXDsK.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 4, 10, 9),
(186, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/t4GUNcy.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 2, 10, 7),
(187, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/0lzyg0C.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 10, 7),
(188, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/nWs3mWq.jpeg', 1900010, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 10, 7),
(189, 10, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/dopRUt3.jpeg', 2070000, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, 7),
(191, 10, 6, 4, '2024-10-30 00:00:00', '2024-10-30 22:32:19', NULL, 2, '', '', 650000, 0, 0, 'san isidro,cerca al golf club,frente al colegio belen', 14, 0, 11),
(192, 4, 6, 5, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/op1W1R9.jpeg', 120000, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 6, 0, 0),
(193, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/8IOzPRG.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, 0),
(194, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/2N9ogzW.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, 0),
(195, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/ESirNDL.jpeg', NULL, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, 0),
(196, 4, 6, 4, '2024-10-30 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/LOE8AOV.jpeg', 1880000, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 1, 0, 0),
(197, 6, 6, 4, '2024-10-31 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/EBI5L4p.jpeg', 250000, NULL, NULL, 'san isidro,cerca al golf club,frente al colegio belen', 7, 0, 0),
(198, 10, 6, 4, '2024-11-04 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/amp3rdd.jpeg', 795000, NULL, NULL, '11111111111', 4, 0, 9),
(199, 5, 7, 5, '2024-11-04 00:00:00', NULL, NULL, 1, NULL, 'https://i.imgur.com/70Hi1G0.jpeg', 130000, NULL, NULL, '22222222222', 7, 0, 0);

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
(37, 'prueba este mes', 120000, '2024-10-26'),
(38, 'prueba mes anterior', 100000, '2024-09-26');

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
(2, 'Edouard Elismane Elismane', '26.664.278-4', '2022-12-19', 'edouardelismane86@gmail.com'),
(3, 'Eduardo Enrique Araneda Valdes', '17.429.409-7', '2021-07-01', 'Aranedavaldeseduardoenrique@gmail.com'),
(4, 'Rodrigo Antonio Cuevas Guzman', '15.607.225-7', '2023-03-10', 'rodrigoocuevas80@gmail.com'),
(5, 'Victor Osvaldo Valdivieso Espinoza', '18.928.084-k', '2024-09-02', 'NAN@gmail.com'),
(6, 'Vilson Castor', '27.025.911-1', '2021-02-07', 'castorvilsonn54@gmail.com'),
(7, 'Winston James Mayor Molina', '26.504.110-8', '2023-05-09', 'Winston.mayor91@hotmail.com'),
(8, 'Crisitian Marcelo Gonzales Silva', '11.881.019-8', '2024-09-27', 'NAN@gmail.com'),
(9, 'Matias Mauricio Valdivia Muñoz', '21.233.735-8', '2024-10-01', 'NAN@gmail.com'),
(10, 'Max Alejandro Cavieres Caroca ', '14.295.550-4', '2024-09-23', 'NAN@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `idregiones` int(11) NOT NULL,
  `regionNumero` int(11) NOT NULL,
  `nombreLocal` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `precio30` int(11) NOT NULL,
  `precio50` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`idregiones`, `regionNumero`, `nombreLocal`, `direccion`, `precio30`, `precio50`) VALUES
(1, 2, 'ANTOFAGASTA ANGAMOS', 'AV. ANGAMOS 02170- LOCAL 128-ANTOFAGASTA', 1880000, 2000000),
(2, 2, 'OUTLET ANTOF. ESP. URB.', 'AV. ZENTENO 21- LOCAL 2028-2030- ANTOFAGASTA', 1880000, 2000000),
(4, 4, 'OPEN PLAZA OVALLE', 'OVALLE - BENAVENTE 1075, LOCAL 1280', 505000, 590000),
(5, 4, 'OUTLET PEÑUELAS', 'PEÑUELA - RUTA 5 NORTE, REGIMIENTO ARICA CON AV CENTRAL, CIUDAD DE SERENA, LOCAL 1048-1052-1056', 515000, 650000),
(6, 4, 'OUTLET LA CANTERA', 'AV. LA CANTERA 2325, LOCAL S 02', 515000, 650000),
(7, 5, 'VIÑA CALLE', '14 NORTE 961 LOCAL SUR, VIÑA DEL MAR', 220000, 250000),
(8, 5, 'QUILPUE', 'AVENIDA LOS CARRERA 754 - LOCAL 201-203', 220000, 250000),
(9, 5, 'OUTLET VIÑA PARK', 'O. VIÑA PARK - CAMINO INTERNACIONAL ACCESO A REÑACA  ALTO, LOCALES  24 Y 26, VIÑA DEL MAR', 220000, 250000),
(10, 5, 'OUTLET LA CALERA', 'AVENIDA JOSE JOAQUIN PEREZ N°12010 LOCAL 1360', 220000, 250000),
(11, 5, 'OUTLET CURAUMA', 'AVENIDA LOMAS DE LA LUZ N°4650, LOCAL 02', 220000, 250000),
(12, 6, 'OUTLET RANCAGUA ', 'O. RANCAGUA - AV. EINSTEIN Nº 290 LOCAL 121', 200000, 230000),
(13, 7, 'MALL ARAUCO CHILLAN', 'CHILLÁN - CALLE EL ROBLE 770, LOCAL 322 A Y 323 A.', 490000, 590000),
(14, 7, 'TALCA', 'AV. CIRCUNVALACION ORIENTE 1055', 369000, 380000),
(15, 7, 'OUTLET VIVO CHILLAN', 'AVDA.VICENTE MENDEZ N°1545 LOCAL 1140, CHILLAN', 490000, 590000),
(16, 8, 'CONCEPCION CENTRO', 'CONCE CENTRO - BARROS ARANA Nº677 - LOCALES Nº1-6-7 - CENTRO ESPAÑOL', 660000, 710000),
(17, 8, 'EL TREBOL', 'EL TREBOL - AVD0A. JORGE ALESSANDRI 3177 LOC. E 217 / 219', 660000, 710000),
(18, 8, 'OUTLET SAN PEDRO ', 'O. SAN PEDRO - SAN PEDRO DE LA PAZ  Nº  4850 – L-31', 660000, 710000),
(19, 9, 'OUTLET EASTON TEMUCO', 'RUDECINDO ORTEGA N°01738 LOCAL 128', 830000, 910000),
(20, 9, 'OUTLET VIVO TEMUCO', 'OUTLET VIVO TEMUCO - LAS QUILAS #1605, LOCAL 1288-1292', 830000, 910000),
(21, 10, 'PUERTO MONTT', 'PUERTO MONTT - ILLAPEL N.10 LOC 248', 1150000, 1355000),
(22, 10, 'CASTRO', 'MALL PASEO CHILOE -  CALLE SERRANO #574, LOCAL Nº324-A', 1150000, 1355000),
(23, 10, 'OUTLET ALERCE', 'AVDA. FERROCARRILES 2.001, KM 3,5 CAMINO A ALERCE, LOCAL 135 CENTRO COMERCIAL PASEO ALERCE', 1150000, 1355000),
(24, 14, 'VALDIVIA', 'VALDIVIA - CALLE ARAUCO Nº561 - LOCAL Nº194', 1090000, 1180000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regionescomplementarias`
--

CREATE TABLE `regionescomplementarias` (
  `idregioncomplementaria` int(11) NOT NULL,
  `regionnumero` int(11) NOT NULL,
  `nombrelocal` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `precio30` int(11) NOT NULL,
  `precio50` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regionescomplementarias`
--

INSERT INTO `regionescomplementarias` (`idregioncomplementaria`, `regionnumero`, `nombrelocal`, `direccion`, `precio30`, `precio50`) VALUES
(1, 4, 'OPEN PLAZA OVALLE', 'OVALLE - BENAVENTE 1075, LOCAL 1280', 710000, 795000),
(6, 2, 'ANTOFAGASTA ANGAMOS', 'AV. ANGAMOS 02170- LOCAL 128-ANTOFAGASTA', 1900000, 2070000),
(7, 2, 'OUTLET ANTOF. ESP. URB.', 'AV. ZENTENO 21- LOCAL 2028-2030- ANTOFAGASTA', 1900000, 2070000),
(8, 4, 'OUTLET PEÑUELAS', 'PEÑUELA - RUTA 5 NORTE, REGIMIENTO ARICA CON AV CENTRAL, CIUDAD DE SERENA, LOCAL 1048-1052-1056', 710000, 795000),
(9, 4, 'OUTLET LA CANTERA', 'AV. LA CANTERA 2325, LOCAL S 02', 710000, 795000),
(10, 7, 'OUTLET VIVO CHILLAN', 'AVDA.VICENTE MENDEZ N°1545 LOCAL 1140, CHILLAN', 550000, 650000),
(11, 7, 'MALL ARAUCO CHILLAN', 'CHILLÁN - CALLE EL ROBLE 770, LOCAL 322 A Y 323 A.', 550000, 650000),
(12, 7, 'TALCA', 'AV. CIRCUNVALACION ORIENTE 1055', 550000, 650000),
(13, 8, 'CONCEPCION CENTRO', 'CONCE CENTRO - BARROS ARANA Nº677 - LOCALES Nº1-6-7 - CENTRO ESPAÑOL', 695000, 795000),
(14, 8, 'EL TREBOL', 'EL TREBOL - AVD0A. JORGE ALESSANDRI 3177 LOC. E 217 / 219', 695000, 795000),
(15, 9, 'OUTLET EASTON TEMUCO', 'RUDECINDO ORTEGA N°01738 LOCAL 128', 830000, 910000),
(16, 9, 'OUTLET VIVO TEMUCO', 'OUTLET VIVO TEMUCO - LAS QUILAS #1605, LOCAL 1288-1292', 830000, 910000),
(17, 10, 'PUERTO MONTT', 'PUERTO MONTT - ILLAPEL N.10 LOC 248', 2100000, 2200000),
(18, 10, 'CASTRO', 'MALL PASEO CHILOE -  CALLE SERRANO #574, LOCAL Nº324-A', 2100000, 2200000),
(19, 10, 'OUTLET ALERCE', 'AVDA. FERROCARRILES 2.001, KM 3,5 CAMINO A ALERCE, LOCAL 135 CENTRO COMERCIAL PASEO ALERCE', 2100000, 2200000),
(20, 14, 'VALDIVIA', 'VALDIVIA - CALLE ARAUCO Nº561 - LOCAL Nº194', 2100000, 2200000);

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
-- Estructura de tabla para la tabla `trbonosapeonetas`
--

CREATE TABLE `trbonosapeonetas` (
  `fkpeoneta` int(11) NOT NULL,
  `fkenvio` int(11) NOT NULL,
  `bonopeoneta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trbonosapeonetas`
--

INSERT INTO `trbonosapeonetas` (`fkpeoneta`, `fkenvio`, `bonopeoneta`) VALUES
(4, 178, 0),
(5, 178, 0),
(5, 181, 0),
(5, 182, 0),
(5, 183, 0),
(5, 184, 0),
(5, 185, 0),
(5, 186, 0),
(5, 187, 0),
(5, 188, 0),
(4, 189, 0),
(5, 189, 0),
(6, 189, 0),
(4, 191, 0),
(5, 191, 0),
(5, 192, 0),
(6, 192, 0),
(10, 193, 0),
(10, 194, 0),
(10, 195, 0),
(10, 196, 0),
(8, 197, 0),
(9, 197, 0),
(5, 198, 0),
(6, 198, 0),
(7, 198, 0),
(5, 199, 0),
(6, 199, 0),
(7, 199, 0);

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
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`idregiones`);

--
-- Indices de la tabla `regionescomplementarias`
--
ALTER TABLE `regionescomplementarias`
  ADD PRIMARY KEY (`idregioncomplementaria`);

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
-- Indices de la tabla `trbonosapeonetas`
--
ALTER TABLE `trbonosapeonetas`
  ADD KEY `TRbonosapeonetas_envios_FK` (`fkenvio`),
  ADD KEY `TRbonosapeonetas_peonetas_FK` (`fkpeoneta`);

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
  MODIFY `camionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idconductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `egresoscamiondata`
--
ALTER TABLE `egresoscamiondata`
  MODIFY `idEgresoCamionData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `egresosmanuales`
--
ALTER TABLE `egresosmanuales`
  MODIFY `idEgresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `idEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de la tabla `gestores`
--
ALTER TABLE `gestores`
  MODIFY `idgestores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresosmanuales`
--
ALTER TABLE `ingresosmanuales`
  MODIFY `idIngresosManuales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `peonetas`
--
ALTER TABLE `peonetas`
  MODIFY `idPeoneta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `idregiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `regionescomplementarias`
--
ALTER TABLE `regionescomplementarias`
  MODIFY `idregioncomplementaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sucursalessubclientes`
--
ALTER TABLE `sucursalessubclientes`
  MODIFY `idSucusalesSubClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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

--
-- Filtros para la tabla `tiposdeviajes`
--
ALTER TABLE `tiposdeviajes`
  ADD CONSTRAINT `clienteFK` FOREIGN KEY (`clienteFK`) REFERENCES `cliente` (`clienteId`);

--
-- Filtros para la tabla `trbonosapeonetas`
--
ALTER TABLE `trbonosapeonetas`
  ADD CONSTRAINT `TRbonosapeonetas_envios_FK` FOREIGN KEY (`fkenvio`) REFERENCES `envios` (`idEnvio`),
  ADD CONSTRAINT `TRbonosapeonetas_peonetas_FK` FOREIGN KEY (`fkpeoneta`) REFERENCES `peonetas` (`idPeoneta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
