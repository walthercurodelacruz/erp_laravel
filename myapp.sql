-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-03-2025 a las 23:52:51
-- Versión del servidor: 8.0.41-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_alm` int NOT NULL,
  `nom_alm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_alm`, `nom_alm`) VALUES
(1, 'Almacen 1'),
(2, 'Almacen 2'),
(3, 'Almacen 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int NOT NULL,
  `nom_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nom_area`) VALUES
(3, 'Almacen '),
(1, 'Gerencia'),
(2, 'Logistica'),
(6, 'Operaciones'),
(7, 'Planeamiento'),
(4, 'Sistemas '),
(5, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int NOT NULL,
  `nom_cargo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nom_cargo`) VALUES
(6, 'Administrador'),
(5, 'Almacenero'),
(2, 'Asistente rrhh'),
(7, 'Ejecutivo Comercial'),
(4, 'Evaluador'),
(3, 'Logistico'),
(1, 'Super Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categ` int NOT NULL,
  `nom_categ` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categ`, `nom_categ`) VALUES
(1, 'Hardware'),
(4, 'Licenciamiento'),
(3, 'Mantenimiento'),
(2, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_clie` int NOT NULL,
  `cod_clie` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num` int DEFAULT NULL,
  `ruc_clie` bigint DEFAULT NULL,
  `razons_clie` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direc_clie` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contacto_clie` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel1_clie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel2_clie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cel1_clie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cel2_clie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email1_clie` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email2_clie` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pagweb_clie` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `area` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `asignado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_clie`, `cod_clie`, `num`, `ruc_clie`, `razons_clie`, `direc_clie`, `contacto_clie`, `tel1_clie`, `tel2_clie`, `cel1_clie`, `cel2_clie`, `email1_clie`, `email2_clie`, `pagweb_clie`, `area`, `estado`, `asignado`) VALUES
(1, 'CLI00001', 1, 20123456789, 'Cliente Principal SAC', 'Lima - Miraflores', 'Arturo Collado', '123456789', NULL, '123456789', NULL, 'arturo@cliente.com', NULL, 'cliente.com', 'Logistica', 'Activo', 'Sistemas Senati');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int NOT NULL,
  `cod_op` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_compras` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nota_compras` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cant_compras` int NOT NULL,
  `prov_compras` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mon_compras` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `costo_compras` float DEFAULT NULL,
  `cot_prov_compras` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `asig_compras` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entrega_compras` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `respon_compras` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ocp_compras` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_cot` int NOT NULL,
  `cod_cot` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `rucc_cot` bigint NOT NULL,
  `num` int NOT NULL,
  `cliente_cot` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contacto_cot` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cargo_cot` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `asignado_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fpago_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `moneda_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tentrega_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expira_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_cot` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `condgeneral_cot` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pie_cot` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_cot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `impuestos` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `garantia` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `condproduc` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `simbolo` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id_cot`, `cod_cot`, `rucc_cot`, `num`, `cliente_cot`, `contacto_cot`, `cargo_cot`, `estado_cot`, `asignado_cot`, `fpago_cot`, `moneda_cot`, `tentrega_cot`, `expira_cot`, `direc_cot`, `condgeneral_cot`, `pie_cot`, `fecha_cot`, `impuestos`, `garantia`, `condproduc`, `simbolo`) VALUES
(1, '2022-00001', 20123456789, 1, 'Cliente Principal SAC', 'Arturo Collado', 'Logistica', 'Abierto', 'Sistemas Senati', '15 dias', 'Dolares', '06 Meses', '15 dias', 'Lima - Miraflores', 'Condiciones Generales 1', 'Mi Empresa Sac', '2025-03-07 21:01:54', 'Precio Unitario no Inc. IGV', '1 Año de Fábrica', '100% Original', '$');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_condgeneral`
--

CREATE TABLE `cot_condgeneral` (
  `id_condgeneral` int NOT NULL,
  `nom_condgeneral` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_condgeneral`
--

INSERT INTO `cot_condgeneral` (`id_condgeneral`, `nom_condgeneral`) VALUES
(3, 'Condiciones Generales 1'),
(4, 'Condiciones Generales 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_estado`
--

CREATE TABLE `cot_estado` (
  `id_estado` int NOT NULL,
  `nom_estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_estado`
--

INSERT INTO `cot_estado` (`id_estado`, `nom_estado`) VALUES
(5, 'Abierto'),
(9, 'Aprobado'),
(8, 'Cerrado'),
(6, 'Descartada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_expira`
--

CREATE TABLE `cot_expira` (
  `id_expira` int NOT NULL,
  `nom_expira` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_expira`
--

INSERT INTO `cot_expira` (`id_expira`, `nom_expira`) VALUES
(7, '1 DÍA'),
(4, '10 dias'),
(5, '15 dias'),
(6, '20 dias'),
(1, '3 dias'),
(2, '5 dias'),
(3, '7 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_fpago`
--

CREATE TABLE `cot_fpago` (
  `id_fpago` int NOT NULL,
  `nom_fpago` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_fpago`
--

INSERT INTO `cot_fpago` (`id_fpago`, `nom_fpago`) VALUES
(7, '15 dias'),
(8, '20 dias'),
(9, '30 dias'),
(20, '40% Adelantado / 60% al Finalizar el Proyecto'),
(10, '45 dias'),
(14, '50% adelanto / 50% a 30 DÍAS LUEGO DE LA ENTREGA'),
(12, '50% adelanto / 50% al finalizar proyecto'),
(19, '50% DE ADELANTO / 50% 07 DÍAS LUEGO DE LA ENTREGA'),
(18, '50% DE ADELANTO / 50% 15 DÍAS LUEGO DE LA ENTREGA'),
(11, '60 dias'),
(16, '7 Días'),
(15, 'A la entrega de Sitio Web'),
(13, 'Al Contado'),
(5, 'Efectivo'),
(17, 'SEGÚN FINANCIAMIENTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_items`
--

CREATE TABLE `cot_items` (
  `id_items` int NOT NULL,
  `cod_cot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detalle_items` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio_items` float NOT NULL,
  `cant_items` int NOT NULL,
  `total_items` float NOT NULL,
  `nota_items` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numitem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_moneda`
--

CREATE TABLE `cot_moneda` (
  `id_moneda` int NOT NULL,
  `nom_moneda` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_moneda`
--

INSERT INTO `cot_moneda` (`id_moneda`, `nom_moneda`) VALUES
(4, 'Dolares'),
(6, 'Euros'),
(5, 'Soles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_pie`
--

CREATE TABLE `cot_pie` (
  `id_pie` int NOT NULL,
  `nom_pie` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_pie`
--

INSERT INTO `cot_pie` (`id_pie`, `nom_pie`) VALUES
(3, 'Mi Empresa Sac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_tentrega`
--

CREATE TABLE `cot_tentrega` (
  `id_tentrega` int NOT NULL,
  `nom_tentrega` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cot_tentrega`
--

INSERT INTO `cot_tentrega` (`id_tentrega`, `nom_tentrega`) VALUES
(22, '05 Meses y Medio'),
(23, '06 Meses'),
(10, '10 dias'),
(11, '15 dias'),
(17, '24 Días Hábiles'),
(12, '30 dias'),
(18, '35 días habiles'),
(13, '4 dias'),
(24, '40 días luego de realizado el Pago.'),
(20, '60 Días, Luego de Pago.'),
(15, '7 dias'),
(16, 'COORDINADO'),
(21, 'Equipo: 07 Días / Software : 60 días Previo Pago'),
(19, 'IMPORTACIÓN 170 DÍAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int NOT NULL,
  `nom_estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nom_estado`) VALUES
(1, 'Activo'),
(3, 'Inactivo'),
(2, 'Potencial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ocp`
--

CREATE TABLE `estado_ocp` (
  `id_ocp` int NOT NULL,
  `nom_ocp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_ocp`
--

INSERT INTO `estado_ocp` (`id_ocp`, `nom_ocp`) VALUES
(1, 'ABIERTO'),
(2, 'ENVIADO'),
(3, 'EN PROCESO'),
(4, 'PEDIDO RECIBIDO'),
(5, 'CERRADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id_eval` int NOT NULL,
  `cod_eval` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cot_eval` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucc_eval` bigint NOT NULL,
  `num` int NOT NULL,
  `cliente_eval` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_eval` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `asig_eval` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entrega_eval` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_eval` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creacion_eval` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_eval` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tecnico_eval` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detalle_eval` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `requiere_eval` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eval_items`
--

CREATE TABLE `eval_items` (
  `id_item` int NOT NULL,
  `cod_eval` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_eval` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nota_eval` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cant_eval` int NOT NULL,
  `obser_eval` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `id_fabricante` int NOT NULL,
  `nom_fabricante` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`id_fabricante`, `nom_fabricante`) VALUES
(1, 'Microsoft'),
(2, 'HP'),
(3, 'Dell'),
(4, 'Lenovo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnicas`
--

CREATE TABLE `ficha_tecnicas` (
  `id` bigint UNSIGNED NOT NULL,
  `fapertura` date DEFAULT NULL,
  `fechaprogentrega` date DEFAULT NULL,
  `otcliente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ptrabajo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cliente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `marca` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `aplicacion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ot` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cotizacion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nparte` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `smedicion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `evaluador` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f1` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f2` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f3` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f4` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f5` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f6` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f7` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f8` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f9` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f10` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f11` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f12` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f13` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f14` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f15` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f16` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f17` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f18` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f19` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ndt` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cdesarmado` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `ecilindro` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `recomendaciones` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pmateriales` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `f20` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f21` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f22` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f23` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f24` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f25` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f26` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f27` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f28` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f29` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f30` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f31` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f32` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f33` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f34` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f35` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f36` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f37` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f38` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f39` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f40` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f41` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f42` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f43` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f44` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f45` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f46` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f47` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f48` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f49` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slip` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ndt2` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `evastago` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `recomendaciones2` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pmateriales2` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `f50` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ndt3` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f51` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f52` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f53` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `etapaprincipal` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `recomendaciones3` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pmateriales3` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `f54` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ndt4` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f55` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f56` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `epistonprincipal` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `recomendaciones4` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pmateriales4` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `f57` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f58` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f59` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f60` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f61` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f62` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f63` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f64` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f65` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f66` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f67` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f68` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f69` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f70` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f71` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `perfil` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f72` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f73` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f74` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f75` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f76` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f77` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f78` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f79` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f80` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f81` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f82` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f83` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f84` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f85` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f86` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f87` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f88` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f89` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f90` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f91` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f92` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f93` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f94` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f95` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f96` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f97` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f98` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f99` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `od` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f100` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f101` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f102` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f103` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f104` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f105` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f106` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f107` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f108` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f109` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f110` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f111` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f112` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f113` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `altura` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f114` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f115` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f116` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f117` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f118` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f119` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f120` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f121` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f122` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f123` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f124` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f125` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f126` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f127` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f128` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f129` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f130` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f131` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f132` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f133` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f134` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f135` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f136` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f137` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f138` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f139` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f140` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f141` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f142` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f143` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f144` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f145` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f146` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f147` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `f148` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `archfichatecnica` longblob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `ficha_tecnicas`
--

INSERT INTO `ficha_tecnicas` (`id`, `fapertura`, `fechaprogentrega`, `otcliente`, `ptrabajo`, `cliente`, `marca`, `aplicacion`, `tipo`, `ot`, `cotizacion`, `nparte`, `smedicion`, `evaluador`, `f1`, `f2`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`, `f10`, `f11`, `f12`, `f13`, `f14`, `f15`, `f16`, `f17`, `f18`, `f19`, `ndt`, `cdesarmado`, `ecilindro`, `recomendaciones`, `pmateriales`, `f20`, `f21`, `f22`, `f23`, `f24`, `f25`, `f26`, `f27`, `f28`, `f29`, `f30`, `f31`, `f32`, `f33`, `f34`, `f35`, `f36`, `f37`, `f38`, `f39`, `f40`, `f41`, `f42`, `f43`, `f44`, `f45`, `f46`, `f47`, `f48`, `f49`, `slip`, `ndt2`, `evastago`, `recomendaciones2`, `pmateriales2`, `f50`, `ndt3`, `f51`, `f52`, `f53`, `etapaprincipal`, `recomendaciones3`, `pmateriales3`, `f54`, `ndt4`, `f55`, `f56`, `epistonprincipal`, `recomendaciones4`, `pmateriales4`, `f57`, `f58`, `f59`, `f60`, `f61`, `f62`, `f63`, `f64`, `f65`, `f66`, `f67`, `f68`, `f69`, `f70`, `f71`, `perfil`, `f72`, `f73`, `f74`, `f75`, `f76`, `f77`, `f78`, `f79`, `f80`, `f81`, `f82`, `f83`, `f84`, `f85`, `id1`, `f86`, `f87`, `f88`, `f89`, `f90`, `f91`, `f92`, `f93`, `f94`, `f95`, `f96`, `f97`, `f98`, `f99`, `od`, `f100`, `f101`, `f102`, `f103`, `f104`, `f105`, `f106`, `f107`, `f108`, `f109`, `f110`, `f111`, `f112`, `f113`, `altura`, `f114`, `f115`, `f116`, `f117`, `f118`, `f119`, `f120`, `f121`, `f122`, `f123`, `f124`, `f125`, `f126`, `f127`, `cant`, `f128`, `f129`, `f130`, `f131`, `f132`, `f133`, `f134`, `f135`, `f136`, `f137`, `f138`, `f139`, `f140`, `f141`, `f142`, `f143`, `f144`, `f145`, `f146`, `f147`, `f148`, `archfichatecnica`, `created_at`, `updated_at`) VALUES
(1, '2021-12-01', '2021-12-01', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0', 'a', 'a', 'a', 'a', 'a', 'a', NULL, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '1', '1', 'a', 'a', 'a', 'a', NULL, 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x6172636869766f732d66696368617465636e6963612f7072756562612e706466, '2021-12-15 14:44:59', '2021-12-15 14:44:59'),
(2, '2021-12-01', '2021-12-01', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '1', 'b', 'b', 'b', 'b', 'b', 'b', NULL, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '1', '1', 'b', 'b', 'b', 'b', '1', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '1', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x6172636869766f732d66696368617465636e6963612f7072756562612e706466, '2021-12-15 14:52:47', '2021-12-15 14:52:47'),
(3, '2021-12-09', '2021-12-10', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '1', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '1', '1', 'c', 'c', 'c', 'c', '1', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '1', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x6172636869766f732d66696368617465636e6963612f7072756562612e706466, '2021-12-15 14:57:33', '2021-12-15 14:57:33'),
(4, '2021-12-03', '2021-12-03', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'DD', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', '1', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'DD', 'D', 'D', 'DD', '1', '1', 'D', 'D', 'D', 'D', '1', 'D', 'D', 'DD', 'DD', 'D', 'D', 'D', '1', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'DD', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'DD', 'D', 'D', 'DD', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'G', 'G', 'G', 'G', 'G', 'F', 'F', 'F', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x6172636869766f732d66696368617465636e6963612f707275656261202831292e706466, '2021-12-15 19:46:56', '2021-12-15 19:46:56'),
(5, '2021-12-22', '2021-11-30', 'OT2001', 'E', 'SENATI', 'E', 'E', 'E', 'OT0001', 'COT00001', 'E', 'mm', 'Edwin', 'eeee', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', '1', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', '1', '1', 'e', 'e', 'e', 'e', '1', 'e', 'e', 'e', 'e', 'e', 'e', 'e', '1', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'ee', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x6172636869766f732d66696368617465636e6963612f434f4e5354414e4349415f2d5f43756c747572615f64655f5365677572696461645f795f53616c75645f656e5f656c5f54726162616a6f2e706466, '2021-12-16 14:31:47', '2021-12-16 14:31:47'),
(6, '2021-12-07', '2021-12-01', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', '1', 'f\r\nf\r\nf\r\nf\r\nf', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'ff', 'f', 'f', '1', '1', 'f', 'f', 'f', 'f', '1', 'f', 'f', 'f', 'f', 'f', 'f', 'f', '1', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'ff', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'ff', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x6172636869766f732d66696368617465636e6963612f434f4e5354414e4349415f2d5f4d6564696461735f64655f70726576656e63696e5f656e5f74726162616a6f5f72656d6f746f5f795f6c615f6572676f6e6f6d615f656e5f656c5f74726162616a6f5f436f6e76697669656e646f5f636f6e5f656c5f434f5649442d31392e706466, '2021-12-16 16:11:34', '2021-12-16 16:11:34'),
(7, '2021-12-06', '2021-12-04', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', '1', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', '1', '1', 'g', 'g', 'g', 'g', '1', 'g', 'g', 'g', 'g', 'g', 'g', 'g', '1', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', '0', '0', '0', 'g', 0x6172636869766f732d66696368617465636e6963612f434f4e5354414e4349415f2d5f43756c747572615f64655f5365677572696461645f795f53616c75645f656e5f656c5f54726162616a6f2e706466, '2021-12-16 16:37:14', '2021-12-16 16:37:14'),
(8, '2021-12-16', '2021-12-16', '1', '2', 'Hola Mundo', 'HP', '5', '6', '7aaa', 'CT000020', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19 mm', '20', '21', '22', '23', '24', '25', '26 mm', '27 mm', '28 mm', '34 mm', '36 mm', 'SI', '39 aaaaaaaaa bbbbbbbbbbbb dw xxxxxxxxxxxxxxueiejdiejdi eiceijcijdijei jij jeijd iejdij eid ed ed', '40 dew wndi niiiiiiiiiiiiiiiiiii edni nDWLD N NNNNNNNNNNN Eiin ienin c', '41 aaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbb ccccccccccccccccccccccccccccccccc cccccccccc', '42 dddddddddddddddddddddddddddddddddddddddddddddddddd ddddd eeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeee effffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff ffffffffff', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', NULL, '62', NULL, '64', '69', '68', '67', '65', NULL, '71', '73', '72', 'BUENA', 'SI', '75', '76', '77', '78', 'SI', '80', '81', '82', '83', '84', '85', '86', 'SI', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '100', '101', '102', '103', '104', '105', '106', '107', '108', '109', '110', '111', '112', '113', '114', '115', '116', '117', '118', '119', '120', '121', '122', '123', '124', '125', '126', '127', '128', '129', '130', '131', '132', '133', '134', '135', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150', '151', '152', '153', '154', '155', '156', '157', '158', '159', '160', '161', '162', '163', '164', '165', '166', '167', '168', '169', '170', '171', '172', '173', '174', '175', '176', '177', '178', '179', '180', '181', '182', '29 mm', '35 mm', '37 cm', 'BUENA', 'BUENA', 'BUENA', '33 mm', 0x6172636869766f732d66696368617465636e6963612f434f4e5354414e4349415f2d5f43756c747572615f64655f5365677572696461645f795f53616c75645f656e5f656c5f54726162616a6f202832292e706466, '2021-12-16 21:46:33', '2021-12-21 05:57:05'),
(9, '2021-12-21', '2021-12-21', 'OT-202021', '50 BAR', 'Mi Empresa Sac', 'CAT', 'Hidraulica', 'Bares', 'OT 20', 'COT 00102', '30-2030', 'Bar', 'Carlos Matos', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', 'NO', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', NULL, '20 Ø 50 mm', NULL, '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', NULL, '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', 'MALA', 'NO', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm', 'SI', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm 20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm', 'SI', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', '20 Ø 50 mm', 'MALA', 'MALA', 'BUENA', '20 Ø 50 mm', 0x6172636869766f732d66696368617465636e6963612f434f4e5354414e4349415f2d5f43756c747572615f64655f5365677572696461645f795f53616c75645f656e5f656c5f54726162616a6f20283229202833292e706466, '2021-12-22 02:32:38', '2021-12-22 02:32:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ftin`
--

CREATE TABLE `ftin` (
  `id_ftin` int NOT NULL,
  `cod_ftin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruc_ftin` bigint NOT NULL,
  `razons_ftin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc_ftin` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `arch_ftin` longblob,
  `cot_ftin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `entrega_ftin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtotal_ftin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_ftin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `femi_ftin` date DEFAULT NULL,
  `fcaduca_ftin` date DEFAULT NULL,
  `moneda_ftin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ftout`
--

CREATE TABLE `ftout` (
  `id_ftout` int NOT NULL,
  `cod_ftout` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruc_ftout` bigint NOT NULL,
  `razons_ftout` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc_ftout` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `arch_ftout` longblob,
  `cot_ftout` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `entrega_ftout` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtotal_ftout` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_ftout` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `femi_ftout` date DEFAULT NULL,
  `fcaduca_ftout` date DEFAULT NULL,
  `moneda_ftout` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id_guia` int NOT NULL,
  `cod_guia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucp_guia` bigint NOT NULL,
  `razons_guia` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_guia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_guia` date NOT NULL,
  `hora_guia` time NOT NULL,
  `arch_guia` longblob NOT NULL,
  `ocp_guia` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_guia` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_sa`
--

CREATE TABLE `guia_sa` (
  `id_guia` int NOT NULL,
  `cod_guia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucc_guia` bigint NOT NULL,
  `razons_guia` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_guia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_guia` date NOT NULL,
  `hora_guia` time NOT NULL,
  `arch_guia` longblob NOT NULL,
  `occ_guia` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_guia` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `igv`
--

CREATE TABLE `igv` (
  `id_igv` int NOT NULL,
  `valor_igv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `igv`
--

INSERT INTO `igv` (`id_igv`, `valor_igv`) VALUES
(1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ing` int NOT NULL,
  `cod_alm` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_ing` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_ing` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fab_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_ing` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categ_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pc_ing` float NOT NULL,
  `lote_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `um_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unid_ing` int NOT NULL,
  `desc_ing` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucp_ing` bigint NOT NULL,
  `razons_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guia_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alm_ing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ocp_ing` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `op_ing` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mon_ing` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_ing` date NOT NULL,
  `hora_ing` time NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` int NOT NULL,
  `nom_lote` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id_lote`, `nom_lote`) VALUES
(1, 'Lote 1'),
(2, 'Lote 2'),
(3, 'Lote 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int NOT NULL,
  `nom_modelo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nom_modelo`) VALUES
(1, 'Modelo 1'),
(2, 'Modelo 2'),
(3, 'Modelo 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocp_items`
--

CREATE TABLE `ocp_items` (
  `id_ocpi` int NOT NULL,
  `cod_op` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_ocp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_ocp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nota_ocp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cant_ocp` int NOT NULL,
  `costo_ocp` float NOT NULL,
  `total_ocp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc_cliente`
--

CREATE TABLE `oc_cliente` (
  `id_occliente` int NOT NULL,
  `cod_occliente` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruc_occliente` bigint NOT NULL,
  `razons_occliente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc_occliente` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `arch_occliente` longblob,
  `cot_occliente` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entrega_occliente` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc_proveedor`
--

CREATE TABLE `oc_proveedor` (
  `id_ocp` int NOT NULL,
  `cod_ocp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_cot` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruc_prov` bigint NOT NULL,
  `estado_ocp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `respon_ocp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mon_ocp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entrega_ocp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `razons_ocp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contacto_ocp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_ocp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_ocp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_logistica`
--

CREATE TABLE `op_logistica` (
  `id_op` int NOT NULL,
  `cod_op` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ot_op` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucc_op` bigint NOT NULL,
  `cliente_op` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_op` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `asig_op` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entrega_op` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_op` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creacionot_op` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_op` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tecnico_op` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detalle_op` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `requiere_op` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_tabla`
--

CREATE TABLE `op_tabla` (
  `id_op` int NOT NULL,
  `cod_op` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_op` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nota_op` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cant_op` int NOT NULL,
  `obser_op` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-rol', 'web', '2021-11-11 06:03:44', '2021-11-11 06:03:44'),
(2, 'crear-rol', 'web', '2021-11-11 06:03:44', '2021-11-11 06:03:44'),
(3, 'editar-rol', 'web', '2021-11-11 06:03:44', '2021-11-11 06:03:44'),
(4, 'borrar-rol', 'web', '2021-11-11 06:03:44', '2021-11-11 06:03:44'),
(5, 'ver-user', 'web', '2021-11-11 06:04:01', '2021-11-11 06:04:01'),
(6, 'crear-user', 'web', '2021-11-11 06:04:01', '2021-11-11 06:04:01'),
(7, 'editar-user', 'web', '2021-11-11 06:04:01', '2021-11-11 06:04:01'),
(8, 'borrar-user', 'web', '2021-11-11 06:04:01', '2021-11-11 06:04:01'),
(9, 'ver-cliente', 'web', '2021-11-11 06:04:16', '2021-11-11 06:04:16'),
(10, 'crear-cliente', 'web', '2021-11-11 06:04:16', '2021-11-11 06:04:16'),
(11, 'editar-cliente', 'web', '2021-11-11 06:04:16', '2021-11-11 06:04:16'),
(12, 'borrar-cliente', 'web', '2021-11-11 06:04:16', '2021-11-11 06:04:16'),
(13, 'ver-cotizacion', 'web', '2021-11-11 06:04:37', '2021-11-11 06:04:37'),
(14, 'crear-cotizacion', 'web', '2021-11-11 06:04:37', '2021-11-11 06:04:37'),
(15, 'editar-cotizacion', 'web', '2021-11-11 06:04:37', '2021-11-11 06:04:37'),
(16, 'borrar-cotizacion', 'web', '2021-11-11 06:04:37', '2021-11-11 06:04:37'),
(17, 'ver-evaluacion', 'web', '2021-11-11 06:05:58', '2021-11-11 06:05:58'),
(18, 'crear-evaluacion', 'web', '2021-11-11 06:05:58', '2021-11-11 06:05:58'),
(19, 'editar-evaluacion', 'web', '2021-11-11 06:05:58', '2021-11-11 06:05:58'),
(20, 'borrar-evaluacion', 'web', '2021-11-11 06:05:58', '2021-11-11 06:05:58'),
(21, 'ver-ps', 'web', '2021-11-11 06:06:12', '2021-11-11 06:06:12'),
(22, 'crear-ps', 'web', '2021-11-11 06:06:12', '2021-11-11 06:06:12'),
(23, 'editar-ps', 'web', '2021-11-11 06:06:13', '2021-11-11 06:06:13'),
(24, 'borrar-ps', 'web', '2021-11-11 06:06:13', '2021-11-11 06:06:13'),
(25, 'ver-prov', 'web', '2021-11-11 06:06:43', '2021-11-11 06:06:43'),
(26, 'crear-prov', 'web', '2021-11-11 06:06:43', '2021-11-11 06:06:43'),
(27, 'editar-prov', 'web', '2021-11-11 06:06:43', '2021-11-11 06:06:43'),
(28, 'borrar-prov', 'web', '2021-11-11 06:06:43', '2021-11-11 06:06:43'),
(29, 'ver-occ', 'web', '2021-11-11 06:06:53', '2021-11-11 06:06:53'),
(30, 'crear-occ', 'web', '2021-11-11 06:06:53', '2021-11-11 06:06:53'),
(31, 'editar-occ', 'web', '2021-11-11 06:06:53', '2021-11-11 06:06:53'),
(32, 'borrar-occ', 'web', '2021-11-11 06:06:53', '2021-11-11 06:06:53'),
(33, 'ver-compras', 'web', '2021-11-23 06:50:00', '2021-11-23 06:50:00'),
(34, 'crear-compras', 'web', '2021-11-23 06:50:00', '2021-11-23 06:50:00'),
(35, 'editar-compras', 'web', '2021-11-23 06:50:00', '2021-11-23 06:50:00'),
(36, 'borrar-compras', 'web', '2021-11-23 06:50:00', '2021-11-23 06:50:00'),
(38, 'ver-guia', 'web', '2021-11-23 10:39:41', '2021-11-23 10:39:41'),
(39, 'crear-guia', 'web', '2021-11-23 10:39:41', '2021-11-23 10:39:41'),
(40, 'editar-guia', 'web', '2021-11-23 10:39:41', '2021-11-23 10:39:41'),
(41, 'borrar-guia', 'web', '2021-11-23 10:39:41', '2021-11-23 10:39:41'),
(42, 'ver-ingreso', 'web', '2021-11-23 10:41:33', '2021-11-23 10:41:33'),
(43, 'crear-ingreso', 'web', '2021-11-23 10:41:33', '2021-11-23 10:41:33'),
(44, 'editar-ingreso', 'web', '2021-11-23 10:41:33', '2021-11-23 10:41:33'),
(45, 'borrar-ingreso', 'web', '2021-11-23 10:41:34', '2021-11-23 10:41:34'),
(46, 'ver-itemscot', 'web', '2021-11-23 10:44:02', '2021-11-23 10:44:02'),
(47, 'crear-itemscot', 'web', '2021-11-23 10:44:02', '2021-11-23 10:44:02'),
(48, 'editar-itemscot', 'web', '2021-11-23 10:44:02', '2021-11-23 10:44:02'),
(49, 'borrar-itemscot', 'web', '2021-11-23 10:44:02', '2021-11-23 10:44:02'),
(50, 'ver-itemsocp', 'web', '2021-11-23 10:49:26', '2021-11-23 10:49:26'),
(51, 'crear-itemsocp', 'web', '2021-11-23 10:49:26', '2021-11-23 10:49:26'),
(52, 'editar-itemsocp', 'web', '2021-11-23 10:49:26', '2021-11-23 10:49:26'),
(53, 'borrar-itemsocp', 'web', '2021-11-23 10:49:26', '2021-11-23 10:49:26'),
(54, 'ver-ocp', 'web', '2021-11-23 10:57:41', '2021-11-23 10:57:41'),
(55, 'crear-ocp', 'web', '2021-11-23 10:57:41', '2021-11-23 10:57:41'),
(56, 'editar-ocp', 'web', '2021-11-23 10:57:41', '2021-11-23 10:57:41'),
(57, 'borrar-ocp', 'web', '2021-11-23 10:57:41', '2021-11-23 10:57:41'),
(62, 'ver-op', 'web', '2021-11-23 11:12:09', '2021-11-23 11:12:09'),
(63, 'crear-op', 'web', '2021-11-23 11:12:09', '2021-11-23 11:12:09'),
(64, 'editar-op', 'web', '2021-11-23 11:12:09', '2021-11-23 11:12:09'),
(65, 'borrar-op', 'web', '2021-11-23 11:12:09', '2021-11-23 11:12:09'),
(66, 'ver-permisos', 'web', '2021-11-23 11:17:46', '2021-11-23 11:17:46'),
(67, 'crear-permisos', 'web', '2021-11-23 11:17:47', '2021-11-23 11:17:47'),
(68, 'editar-permisos', 'web', '2021-11-23 11:17:47', '2021-11-23 11:17:47'),
(69, 'borrar-permisos', 'web', '2021-11-23 11:17:47', '2021-11-23 11:17:47'),
(70, 'ver-salida', 'web', '2021-11-23 11:24:19', '2021-11-23 11:24:19'),
(71, 'crear-salida', 'web', '2021-11-23 11:24:20', '2021-11-23 11:24:20'),
(72, 'editar-salida', 'web', '2021-11-23 11:24:20', '2021-11-23 11:24:20'),
(73, 'borrar-salida', 'web', '2021-11-23 11:24:20', '2021-11-23 11:24:20'),
(74, 'ver-stock', 'web', '2021-11-23 11:26:56', '2021-11-23 11:26:56'),
(75, 'crear-stock', 'web', '2021-11-23 11:26:56', '2021-11-23 11:26:56'),
(76, 'editar-stock', 'web', '2021-11-23 11:26:56', '2021-11-23 11:26:56'),
(77, 'borrar-stock', 'web', '2021-11-23 11:26:56', '2021-11-23 11:26:56'),
(78, 'ver-guia-sa', 'web', '2021-11-26 05:05:44', '2021-11-26 05:05:44'),
(79, 'crear-guia-sa', 'web', '2021-11-26 05:05:44', '2021-11-26 05:05:44'),
(80, 'editar-guia-sa', 'web', '2021-11-26 05:05:44', '2021-11-26 05:05:44'),
(81, 'borrar-guia-sa', 'web', '2021-11-26 05:05:44', '2021-11-26 05:05:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int NOT NULL,
  `cod_prod` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_prod` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sn_prod` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fabric_prod` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modelo_prod` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_prod` longblob,
  `pcosto_prod` float DEFAULT NULL,
  `pventa_prod` float DEFAULT NULL,
  `dispo_prod` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_prod` tinyint NOT NULL DEFAULT '1',
  `desc_prod` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ruc_prov` bigint DEFAULT NULL,
  `razons_prov` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categ_prod` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prod_serv` tinyint NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int NOT NULL,
  `cod_prov` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` int NOT NULL,
  `ruc_prov` bigint NOT NULL,
  `razons_prov` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direc_prov` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contacto_prov` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cel1_prov` int NOT NULL,
  `cel2_prov` int DEFAULT NULL,
  `email1_prov` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email2_prov` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pagweb_prov` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_prov` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `cod_prov`, `num`, `ruc_prov`, `razons_prov`, `direc_prov`, `contacto_prov`, `cel1_prov`, `cel2_prov`, `email1_prov`, `email2_prov`, `pagweb_prov`, `estado_prov`) VALUES
(49, 'PROV00001', 1, 12345678910, 'Empresa Proveedor SAC', 'Lima - San Isidro', 'Juan Perez', 987654321, NULL, 'jperez@empresa.com', NULL, NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Sistemas', 'web', '2021-11-11 06:18:46', '2021-11-13 07:04:02'),
(2, 'Ventas', 'web', '2021-11-13 03:36:57', '2021-11-13 03:36:57'),
(3, 'Logistica', 'web', '2021-11-13 07:05:12', '2021-11-13 07:06:52'),
(4, 'Operaciones', 'web', '2021-11-13 07:05:42', '2021-11-13 07:07:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_sal` int NOT NULL,
  `cod_sal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_sal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `respon_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sn_sal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mon_sal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modelo_sal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pc_sal` float NOT NULL,
  `um_sal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc_sal` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fab_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categ_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lote_sal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucc_sal` bigint NOT NULL,
  `razons_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unid_sal` int NOT NULL,
  `vend_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guia_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alma_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `occ_sal` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cot_sal` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_sal` date NOT NULL,
  `hora_sal` time NOT NULL,
  `num` int NOT NULL,
  `op_sal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int NOT NULL,
  `cod_alm` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_stock` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_stock` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fab_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_stock` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categ_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pc_stock` float NOT NULL,
  `lote_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `um_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unid_stock` int NOT NULL,
  `desc_stock` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rucp_stock` bigint NOT NULL,
  `razons_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guia_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alm_stock` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ocp_stock` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `op_stock` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mon_stock` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_stock` date NOT NULL,
  `hora_stock` time NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_um` int NOT NULL,
  `nom_um` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_um`, `nom_um`) VALUES
(1, 'Und'),
(2, 'Litros'),
(3, 'Kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_emp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `celular` int NOT NULL,
  `f_nac` date NOT NULL,
  `id_cargo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ingreso` date NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `email_verified_at`, `password`, `dni`, `cod_emp`, `estado`, `celular`, `f_nac`, `id_cargo`, `ingreso`, `remember_token`, `created_at`, `updated_at`, `num`) VALUES
(38, 'Sistemas', 'Senati', 'sistemas@senati.com', NULL, '$2y$10$0QJDs66N7Z5RKGS.8aqe/ONIgSLzKBa1fTtOlN.C1MxJZLK10UHSq', '12345678', 'USU00017', 1, 987654321, '2015-04-06', 'Super Sistemas', '2025-03-06', NULL, '2025-03-07 05:18:54', '2025-03-07 05:18:54', 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_alm`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `nom_area` (`nom_area`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `nom_cargo` (`nom_cargo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categ`),
  ADD KEY `nom_categ` (`nom_categ`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_clie`),
  ADD KEY `estado` (`estado`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_cot`),
  ADD KEY `estado_cot` (`estado_cot`),
  ADD KEY `fpago_cot` (`fpago_cot`),
  ADD KEY `tentrega_cot` (`tentrega_cot`),
  ADD KEY `moneda_cot` (`moneda_cot`),
  ADD KEY `expira_cot` (`expira_cot`),
  ADD KEY `condgeneral_cot` (`condgeneral_cot`(191)),
  ADD KEY `pie_cot` (`pie_cot`(191));

--
-- Indices de la tabla `cot_condgeneral`
--
ALTER TABLE `cot_condgeneral`
  ADD PRIMARY KEY (`id_condgeneral`),
  ADD KEY `nom_condgeneral` (`nom_condgeneral`(191));

--
-- Indices de la tabla `cot_estado`
--
ALTER TABLE `cot_estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `nom_estado` (`nom_estado`);

--
-- Indices de la tabla `cot_expira`
--
ALTER TABLE `cot_expira`
  ADD PRIMARY KEY (`id_expira`),
  ADD KEY `nom_expira` (`nom_expira`);

--
-- Indices de la tabla `cot_fpago`
--
ALTER TABLE `cot_fpago`
  ADD PRIMARY KEY (`id_fpago`),
  ADD KEY `nom_fpago` (`nom_fpago`);

--
-- Indices de la tabla `cot_items`
--
ALTER TABLE `cot_items`
  ADD PRIMARY KEY (`id_items`);

--
-- Indices de la tabla `cot_moneda`
--
ALTER TABLE `cot_moneda`
  ADD PRIMARY KEY (`id_moneda`),
  ADD KEY `nom_moneda` (`nom_moneda`);

--
-- Indices de la tabla `cot_pie`
--
ALTER TABLE `cot_pie`
  ADD PRIMARY KEY (`id_pie`),
  ADD KEY `nom_pie` (`nom_pie`(191));

--
-- Indices de la tabla `cot_tentrega`
--
ALTER TABLE `cot_tentrega`
  ADD PRIMARY KEY (`id_tentrega`),
  ADD KEY `nom_tentrega` (`nom_tentrega`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `nom_estado` (`nom_estado`);

--
-- Indices de la tabla `estado_ocp`
--
ALTER TABLE `estado_ocp`
  ADD PRIMARY KEY (`id_ocp`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id_eval`),
  ADD KEY `cod_eval` (`cod_eval`);

--
-- Indices de la tabla `eval_items`
--
ALTER TABLE `eval_items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `cod_eval` (`cod_eval`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id_fabricante`);

--
-- Indices de la tabla `ficha_tecnicas`
--
ALTER TABLE `ficha_tecnicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ftin`
--
ALTER TABLE `ftin`
  ADD PRIMARY KEY (`id_ftin`) USING BTREE;

--
-- Indices de la tabla `ftout`
--
ALTER TABLE `ftout`
  ADD PRIMARY KEY (`id_ftout`) USING BTREE;

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id_guia`);

--
-- Indices de la tabla `guia_sa`
--
ALTER TABLE `guia_sa`
  ADD PRIMARY KEY (`id_guia`);

--
-- Indices de la tabla `igv`
--
ALTER TABLE `igv`
  ADD PRIMARY KEY (`id_igv`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ing`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `ocp_items`
--
ALTER TABLE `ocp_items`
  ADD PRIMARY KEY (`id_ocpi`);

--
-- Indices de la tabla `oc_cliente`
--
ALTER TABLE `oc_cliente`
  ADD PRIMARY KEY (`id_occliente`);

--
-- Indices de la tabla `oc_proveedor`
--
ALTER TABLE `oc_proveedor`
  ADD PRIMARY KEY (`id_ocp`);

--
-- Indices de la tabla `op_logistica`
--
ALTER TABLE `op_logistica`
  ADD PRIMARY KEY (`id_op`),
  ADD KEY `cod_op` (`cod_op`);

--
-- Indices de la tabla `op_tabla`
--
ALTER TABLE `op_tabla`
  ADD PRIMARY KEY (`id_op`),
  ADD KEY `cod_op` (`cod_op`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `categ_prod` (`categ_prod`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`),
  ADD KEY `cod_prov` (`cod_prov`),
  ADD KEY `estado_prov` (`estado_prov`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_sal`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_um`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `name` (`name`(191)),
  ADD KEY `cod_emp` (`cod_emp`(191));

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_alm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categ` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_clie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id_cot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cot_condgeneral`
--
ALTER TABLE `cot_condgeneral`
  MODIFY `id_condgeneral` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cot_estado`
--
ALTER TABLE `cot_estado`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cot_expira`
--
ALTER TABLE `cot_expira`
  MODIFY `id_expira` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cot_fpago`
--
ALTER TABLE `cot_fpago`
  MODIFY `id_fpago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cot_items`
--
ALTER TABLE `cot_items`
  MODIFY `id_items` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cot_moneda`
--
ALTER TABLE `cot_moneda`
  MODIFY `id_moneda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cot_pie`
--
ALTER TABLE `cot_pie`
  MODIFY `id_pie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cot_tentrega`
--
ALTER TABLE `cot_tentrega`
  MODIFY `id_tentrega` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_ocp`
--
ALTER TABLE `estado_ocp`
  MODIFY `id_ocp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id_eval` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eval_items`
--
ALTER TABLE `eval_items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id_fabricante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ficha_tecnicas`
--
ALTER TABLE `ficha_tecnicas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ftin`
--
ALTER TABLE `ftin`
  MODIFY `id_ftin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ftout`
--
ALTER TABLE `ftout`
  MODIFY `id_ftout` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id_guia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia_sa`
--
ALTER TABLE `guia_sa`
  MODIFY `id_guia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `igv`
--
ALTER TABLE `igv`
  MODIFY `id_igv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ing` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id_lote` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ocp_items`
--
ALTER TABLE `ocp_items`
  MODIFY `id_ocpi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oc_cliente`
--
ALTER TABLE `oc_cliente`
  MODIFY `id_occliente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oc_proveedor`
--
ALTER TABLE `oc_proveedor`
  MODIFY `id_ocp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `op_logistica`
--
ALTER TABLE `op_logistica`
  MODIFY `id_op` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `op_tabla`
--
ALTER TABLE `op_tabla`
  MODIFY `id_op` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_sal` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_um` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eval_items`
--
ALTER TABLE `eval_items`
  ADD CONSTRAINT `eval_items_ibfk_1` FOREIGN KEY (`cod_eval`) REFERENCES `evaluaciones` (`cod_eval`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `op_tabla`
--
ALTER TABLE `op_tabla`
  ADD CONSTRAINT `op_tabla_ibfk_1` FOREIGN KEY (`cod_op`) REFERENCES `op_logistica` (`cod_op`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`categ_prod`) REFERENCES `categorias` (`nom_categ`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_2` FOREIGN KEY (`estado_prov`) REFERENCES `estado` (`nom_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`nom_cargo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
