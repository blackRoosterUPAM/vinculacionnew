-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 15:39:27
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
-- Base de datos: `vinculacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnodocs`
--

CREATE TABLE `alumnodocs` (
  `Matricula` int(11) NOT NULL,
  `CV` longblob DEFAULT NULL,
  `FechaCreación` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Matricula` int(11) NOT NULL,
  `NombreA` varchar(255) NOT NULL,
  `ApellidoP` varchar(255) NOT NULL,
  `ApellidoM` varchar(255) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `CorreoE` varchar(255) NOT NULL,
  `Carrera` int(11) DEFAULT NULL,
  `Estatus` tinyint(1) NOT NULL,
  `Proceso` int(11) NOT NULL,
  `idProceso` int(11) DEFAULT NULL,
  `idPeriodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnosede`
--

CREATE TABLE `alumnosede` (
  `IdSede` int(11) NOT NULL,
  `NombreSede` varchar(25) NOT NULL,
  `Matricula` int(11) NOT NULL,
  `NombrePE` int(11) NOT NULL,
  `FechaInicio` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idProceso` int(11) DEFAULT NULL,
  `Aceptado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `IdCarrera` int(11) NOT NULL,
  `nombreCarrera` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`IdCarrera`, `nombreCarrera`) VALUES
(1, 'Ingeniería Automotriz'),
(2, 'Ingeniería en Energía'),
(3, 'Ingeniería en Software'),
(4, 'Ingeniería en Tecnologías'),
(5, 'Licenciatura en Terapia F'),
(6, 'Licenciatura en Administr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_recuperacion`
--

CREATE TABLE `codigos_recuperacion` (
  `idUsuario` int(11) NOT NULL,
  `codigo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `IdSede` int(11) NOT NULL,
  `Convenio` varchar(10) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docalumnoperiodo`
--

CREATE TABLE `docalumnoperiodo` (
  `Matricula` int(11) NOT NULL,
  `IdValidacion` int(11) NOT NULL,
  `IdProceso` int(11) NOT NULL,
  `IdDocumento` int(11) NOT NULL,
  `DocumentoPDF` longblob DEFAULT NULL,
  `EstatusPtc` tinyint(1) NOT NULL,
  `EstatusVinc` tinyint(1) NOT NULL,
  `IdPeriodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `IdDocumento` int(11) NOT NULL,
  `NombreDoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `IdPeriodo` int(11) NOT NULL,
  `Meses` varchar(25) NOT NULL,
  `Año` int(11) NOT NULL,
  `estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`IdPeriodo`, `Meses`, `Año`, `estatus`) VALUES
(1, 'Enero-Abril', 2023, 1),
(2, 'Mayo-Agosto', 2023, 1),
(3, 'Septiembre-Diciembre', 2023, 0),
(4, 'Enero-Abril', 2027, 1),
(5, 'Mayo-Agosto', 2027, 0),
(6, 'DD', 2021, 1),
(7, 'Mayo-Agosto', 2029, 0),
(8, 'Enero-Abril', 2023, 1),
(9, 'Mayo-Agosto', 2023, 1),
(10, 'Septiembre-Diciembre', 2023, 0),
(11, 'Enero-Abril', 2027, 1),
(12, 'Mayo-Agosto', 2027, 0),
(13, 'DD', 2021, 1),
(14, 'Mayo-Agosto', 2029, 0);

--
-- Disparadores `periodo`
--
DELIMITER $$
CREATE TRIGGER `incrementar_id` BEFORE INSERT ON `periodo` FOR EACH ROW BEGIN
    DECLARE nuevo_id INT;
   
    SELECT IFNULL(MAX(IdPeriodo), 0) + 1 INTO nuevo_id FROM periodo;
   
    SET NEW.IdPeriodo = nuevo_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pliberación`
--

CREATE TABLE `pliberación` (
  `IdProceso` int(11) NOT NULL,
  `IdValidación` int(11) NOT NULL,
  `Estatus` tinyint(1) NOT NULL,
  `Matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `IdProceso` int(11) NOT NULL,
  `NombrePE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`IdProceso`, `NombrePE`) VALUES
(1, 'Estancia 1'),
(2, 'Estancia 2'),
(3, 'Estadia'),
(4, 'Práctica 1'),
(5, 'Práctica 2'),
(6, 'Práctica 3'),
(7, 'Práctica 4'),
(8, 'Servicio Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ptc`
--

CREATE TABLE `ptc` (
  `idPtc` int(11) NOT NULL,
  `nombrePtc` varchar(255) NOT NULL,
  `APaternoPtc` varchar(255) NOT NULL,
  `AMaternoPtc` varchar(255) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `IdCarrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'SuperAdmin'),
(2, 'Escolares'),
(3, 'Vinculacion'),
(4, 'Estudiante'),
(5, 'Sede'),
(6, 'Director'),
(7, 'PTC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `IdSede` int(11) NOT NULL,
  `NombreSede` varchar(50) NOT NULL,
  `Dirección` varchar(50) NOT NULL,
  `CorreoContacto` varchar(25) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `tiposede` varchar(10) NOT NULL,
  `Logo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `CorreoE` varchar(255) NOT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `NombreU` varchar(255) NOT NULL,
  `APaternoU` varchar(255) NOT NULL,
  `AMaternoU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `CorreoE`, `Contraseña`, `idRol`, `NombreU`, `APaternoU`, `AMaternoU`) VALUES
(9001, 'vinculacion@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 3, 'Vinculacion', 'Vinculacion', 'Viculacion'),
(9002, 'superadmin@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 1, 'Super', 'Admin', 'istrador'),
(9003, 'director@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 6, 'Director', 'Director', 'Director'),
(9004, 'escolares@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 2, 'servicios', 'escolares', 'escolares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
  `IdSede` int(11) NOT NULL,
  `IdCarrera` int(11) NOT NULL,
  `IdProceso` int(11) NOT NULL,
  `IdPeriodo` int(11) NOT NULL,
  `Perfil` text NOT NULL,
  `Beneficios` text NOT NULL,
  `NumVacantes` int(11) NOT NULL,
  `NumPostulados` int(11) NOT NULL,
  `totalVacantes` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnodocs`
--
ALTER TABLE `alumnodocs`
  ADD KEY `Matricula` (`Matricula`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `idPeriodo` (`idPeriodo`);

--
-- Indices de la tabla `alumnosede`
--
ALTER TABLE `alumnosede`
  ADD KEY `Matricula` (`Matricula`),
  ADD KEY `IdSede` (`IdSede`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`IdCarrera`);

--
-- Indices de la tabla `codigos_recuperacion`
--
ALTER TABLE `codigos_recuperacion`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`Convenio`),
  ADD KEY `IdSede` (`IdSede`);

--
-- Indices de la tabla `docalumnoperiodo`
--
ALTER TABLE `docalumnoperiodo`
  ADD PRIMARY KEY (`IdValidacion`),
  ADD KEY `Matricula` (`Matricula`),
  ADD KEY `IdProceso` (`IdProceso`),
  ADD KEY `IdDocumento` (`IdDocumento`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`IdDocumento`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`IdPeriodo`);

--
-- Indices de la tabla `pliberación`
--
ALTER TABLE `pliberación`
  ADD KEY `Matricula` (`Matricula`),
  ADD KEY `IdValidación` (`IdValidación`),
  ADD KEY `IdProceso` (`IdProceso`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`IdProceso`);

--
-- Indices de la tabla `ptc`
--
ALTER TABLE `ptc`
  ADD PRIMARY KEY (`idPtc`),
  ADD KEY `IdCarrera` (`IdCarrera`) USING BTREE;

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`IdSede`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD KEY `IdSede` (`IdSede`),
  ADD KEY `IdCarrera` (`IdCarrera`),
  ADD KEY `IdProceso` (`IdProceso`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `IdCarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `docalumnoperiodo`
--
ALTER TABLE `docalumnoperiodo`
  MODIFY `IdValidacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `IdProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ptc`
--
ALTER TABLE `ptc`
  MODIFY `idPtc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210326191;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnodocs`
--
ALTER TABLE `alumnodocs`
  ADD CONSTRAINT `alumnodocs_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnosede`
--
ALTER TABLE `alumnosede`
  ADD CONSTRAINT `alumnosede_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnosede_ibfk_2` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`IdSede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD CONSTRAINT `convenios_ibfk_1` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`IdSede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docalumnoperiodo`
--
ALTER TABLE `docalumnoperiodo`
  ADD CONSTRAINT `docalumnoperiodo_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docalumnoperiodo_ibfk_2` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docalumnoperiodo_ibfk_3` FOREIGN KEY (`IdDocumento`) REFERENCES `documentacion` (`IdDocumento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docalumnoperiodo_ibfk_4` FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`IdPeriodo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pliberación`
--
ALTER TABLE `pliberación`
  ADD CONSTRAINT `pliberación_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pliberación_ibfk_2` FOREIGN KEY (`IdValidación`) REFERENCES `docalumnoperiodo` (`IdValidacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pliberación_ibfk_3` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ptc`
--
ALTER TABLE `ptc`
  ADD CONSTRAINT `ptc_ibfk_1` FOREIGN KEY (`IdCarrera`) REFERENCES `carrera` (`IdCarrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idRol` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);

--
-- Filtros para la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD CONSTRAINT `vacantes_ibfk_1` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`IdSede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vacantes_ibfk_2` FOREIGN KEY (`IdCarrera`) REFERENCES `carrera` (`IdCarrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vacantes_ibfk_3` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vacantes_ibfk_4` FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`IdPeriodo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
