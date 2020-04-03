-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2020 a las 22:50:45
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamentos` int(11) NOT NULL,
  `nombre_departamentos` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `dependencia` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`idDepartamentos`, `nombre_departamentos`, `dependencia`) VALUES
(0, 'Municipalidad', 'Municipalidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dic_marcas`
--

CREATE TABLE `dic_marcas` (
  `idDicMarcas` int(11) NOT NULL,
  `nombre_dicmarcas` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `dic_marcas`
--

INSERT INTO `dic_marcas` (`idDicMarcas`, `nombre_dicmarcas`) VALUES
(1, 'AMD'),
(2, 'Nvidia'),
(3, 'Intel'),
(4, 'ASRock'),
(5, 'ASUS'),
(6, 'Biostar'),
(7, 'ECS'),
(8, 'Gigabyte'),
(9, 'MSI'),
(10, 'A-DATA'),
(11, 'A-Tech'),
(12, 'Corsair'),
(13, 'Crucial'),
(14, 'Dell'),
(15, 'ELPIDA'),
(16, 'GeIL'),
(17, 'Genérico(a)'),
(18, 'G.Skill'),
(19, 'HP'),
(20, 'Kingston'),
(21, 'Lenovo'),
(22, 'OWC'),
(23, 'SuperTalent'),
(24, 'TEAM'),
(25, 'HGST'),
(26, 'Hitachi'),
(27, 'Seagate'),
(28, 'Toshiba'),
(29, 'Western Digital'),
(30, 'Asgard'),
(31, 'Lexar'),
(32, 'Micron'),
(33, 'PNY'),
(34, 'Samsung'),
(35, 'SanDisk'),
(36, 'Transcend'),
(37, 'Aerocool'),
(38, 'Apexgaming'),
(39, 'Azza'),
(40, 'be quiet!'),
(41, 'BitFenix'),
(42, 'Clio'),
(43, 'Cooler Master'),
(44, 'Cougar'),
(45, 'DeepCool'),
(46, 'EVGA'),
(47, 'Fantech'),
(48, 'Fractal Design'),
(49, 'Gamdias'),
(50, 'Gamemax'),
(51, 'In Win'),
(52, 'Lian Li'),
(53, 'Nox'),
(54, 'NZXT'),
(55, 'Raidmax'),
(56, 'Riotoro'),
(57, 'Sentey'),
(58, 'Sharkoon'),
(59, 'Spektra'),
(60, 'Sunshine'),
(61, 'Thermaltake'),
(62, 'XTech'),
(63, '3nStar'),
(64, 'Acer'),
(65, 'AOC'),
(66, 'BenQ'),
(67, 'Gear'),
(68, 'Hikvision'),
(69, 'LG'),
(70, 'Ozone'),
(71, 'Philips'),
(72, 'Viewsonic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipos` int(11) NOT NULL,
  `ipEquipos` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `idTipoEquipos` int(11) NOT NULL,
  `idEstadoEquipos` int(11) NOT NULL,
  `marca_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `procesador_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `ram_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `hdd_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `monitor_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `arquitectura_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `so_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `office_equipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipos`, `ipEquipos`, `idTipoEquipos`, `idEstadoEquipos`, `marca_equipos`, `procesador_equipos`, `ram_equipos`, `hdd_equipos`, `monitor_equipos`, `arquitectura_equipos`, `so_equipos`, `office_equipos`) VALUES
(1, '192.168.5.12', 1, 1, 'Genérico', 'Intel i7-4770', 'Kingston 8,00 GB', 'Seagate 500 GB', 'LG 20\'\'', 'x64', 'Windows 10', 'Office 2007 Enterprise'),
(2, '192.168.5.1', 1, 1, 'Genérico', 'Intel i5-4690K', 'Kingston 4,00 GB', 'Western Digital 1TB', 'Samsung 28\'\'', 'x64', 'Windows 7 Professional', 'Office 2003 Enterprise'),
(3, '192.168.1.52', 2, 1, 'BenQ', 'AMD J24', 'Gigabyte DDR 4 8GB', 'SanDisk 32GB', 'Viewsonic 19\"', 'x64 bits', 'Windows 10 Standard Edition', 'Microsoft Office 2007 Professional'),
(6, '192.168.1.53', 3, 1, 'ASRock', 'Biostar 22', 'BenQ DDR 4 16GB', 'BitFenix 16GB', 'ASUS 32\"', 'x64 bits', 'Windows Server 2008 Ultimate', 'Microsoft Office 2003 Professional'),
(7, '1.1.1.1', 1, 0, 'Asgard', 'BenQ J24', 'BitFenix DDR 4 4GB', 'Apexgaming 16GB', 'Azza 29\"', 'x64 bits', 'Windows 8 Professional N', 'Microsoft Office 2007 Professional Plus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eq_estado`
--

CREATE TABLE `eq_estado` (
  `idEstadoEquipos` int(11) NOT NULL,
  `nombre_estadoequipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `eq_estado`
--

INSERT INTO `eq_estado` (`idEstadoEquipos`, `nombre_estadoequipos`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eq_func`
--

CREATE TABLE `eq_func` (
  `ipEquipos` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `rut_funcionarios` varchar(8) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eq_log_estado`
--

CREATE TABLE `eq_log_estado` (
  `idEstadoEquipos` int(11) NOT NULL,
  `ipEquipos` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `observacion_equipos` varchar(500) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eq_tipo`
--

CREATE TABLE `eq_tipo` (
  `idTipoEquipos` int(11) NOT NULL,
  `nombre_tipoequipos` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `eq_tipo`
--

INSERT INTO `eq_tipo` (`idTipoEquipos`, `nombre_tipoequipos`) VALUES
(1, 'CPU'),
(2, 'Notebook'),
(3, 'Servidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `rut_funcionarios` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `digrut_funcionarios` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_funcionarios` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `sexo_funcionarios` tinyint(1) NOT NULL,
  `direccion_funcionarios` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fechanac_funcionarios` datetime NOT NULL,
  `fechaing_funcionarios` datetime NOT NULL,
  `contrasena_funcionarios` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE `oficinas` (
  `idOficinas` int(11) NOT NULL,
  `nombre_oficinas` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `direccion_oficinas` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofi_func`
--

CREATE TABLE `ofi_func` (
  `idOficinas` int(11) NOT NULL,
  `idFuncionarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(1000) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(1000) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `nombre`, `contrasena`) VALUES
(1, 'michelanyelo', '8k1919!');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dic_marcas`
--
ALTER TABLE `dic_marcas`
  ADD PRIMARY KEY (`idDicMarcas`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipos`);

--
-- Indices de la tabla `eq_estado`
--
ALTER TABLE `eq_estado`
  ADD PRIMARY KEY (`idEstadoEquipos`);

--
-- Indices de la tabla `eq_tipo`
--
ALTER TABLE `eq_tipo`
  ADD PRIMARY KEY (`idTipoEquipos`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`rut_funcionarios`);

--
-- Indices de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD PRIMARY KEY (`idOficinas`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dic_marcas`
--
ALTER TABLE `dic_marcas`
  MODIFY `idDicMarcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  MODIFY `idOficinas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
