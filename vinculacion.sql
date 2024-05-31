-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2023 a las 04:08:29
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
-- Base de datos: `vinculacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnodocs`
--

CREATE TABLE `alumnodocs` (
  `Matricula` int(11) NOT NULL,
  `CV` longblob DEFAULT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Matricula`, `NombreA`, `ApellidoP`, `ApellidoM`, `Telefono`, `CorreoE`, `Carrera`, `Estatus`, `Proceso`, `idProceso`, `idPeriodo`) VALUES
(21032019, 'Ale', 'R', 'D', 2225885572, 'm.santiagof@upam.edu.mx', 4, 0, 1, 2, 10),
(21032021, 'D', 'H', 'J', 2225885572, 'm.santiagof@upam.edu.mx', 6, 0, 1, 2, 10),
(21032027, 'Marcela', 'Santiago', 'F', 2225885572, 'm.santiagof@upam.edu.mx', 3, 0, 0, 2, 10),
(21032032, 'Luis', 'sadasd', 'Guadalupe', 2225885572, 'm.santiagof@upam.edu.mx', 3, 0, 0, 2, 10),
(21032035, 'brandon', 'rodriguez', 'trujeque', 2225885572, 'b.rodriguezt@upam.edu.mx', 3, 0, 2, 2, 10);

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

--
-- Volcado de datos para la tabla `alumnosede`
--

INSERT INTO `alumnosede` (`IdSede`, `NombreSede`, `Matricula`, `NombrePE`, `FechaInicio`, `idProceso`, `Aceptado`) VALUES
(2140, 'Aerobot', 21032019, 1, NULL, NULL, 0),
(2140, 'Aerobot', 21032035, 1, '2023-12-13 00:53:22', NULL, 2),
(2140, 'Aerobot', 21032021, 1, NULL, NULL, 0);

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

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`IdDocumento`, `NombreDoc`) VALUES
(1, 'RVIN'),
(2, 'Carta Aceptación'),
(3, 'Evaluación Final'),
(4, 'Carta Liberación'),
(5, 'Acuse de Carta de Presentación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `IdPeriodo` int(11) NOT NULL,
  `Meses` varchar(25) NOT NULL,
  `nio` int(11) NOT NULL,
  `estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`IdPeriodo`, `Meses`, `anio`, `estatus`) VALUES
(1, 'Enero-Abril', 2023, 1),
(2, 'Mayo-Agosto', 2023, 1),
(3, 'Septiembre-Diciembre', 2023, 0),
(4, 'Enero-Abril', 2027, 1),
(5, 'Mayo-Agosto', 2027, 0),
(6, 'DD', 2021, 1),
(7, 'Mayo-Agosto', 2029, 0),
(8, 'Enero-Abril', 2023, 1),
(9, 'Mayo-Agosto', 2023, 1),
(10, 'Septiembre-Diciembre', 2023, 1),
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
-- Estructura de tabla para la tabla `pliberacion`
--

CREATE TABLE `pliberacion` (
  `IdProceso` int(11) NOT NULL,
  `IdValidacion` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `ptc`
--

INSERT INTO `ptc` (`idPtc`, `nombrePtc`, `APaternoPtc`, `AMaternoPtc`, `correo`, `IdCarrera`) VALUES
(1, 'Veronica', 'Moreno', 'Jimenez', 'veronica.moreno@upamozoc.edu.mx', 3);

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
(7, 'PTC'),
(8, 'Graficas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `IdSede` int(11) NOT NULL,
  `NombreSede` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `CorreoContacto` varchar(25) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `tiposede` varchar(10) NOT NULL,
  `Logo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`IdSede`, `NombreSede`, `Direccion`, `CorreoContacto`, `Telefono`, `tiposede`, `Logo`) VALUES
(2140, 'Aerobot', 'AZUCENA 45', 'aerobot@gmail.com', 2225885572, 'Publica', NULL),
(231231, 'maruchan', 'hola que hace #101010', 'brandon@gmail.com', 2211212121, 'Privada', 0x436170747572612064652070616e74616c6c6120323032332d31302d3331203139303933332e706e67),
(242424, 'B2B Consultores', '19 ser 4319', 'contacto@btb.com.mx', 2221446980, 'Publica', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `CorreoE` varchar(255) NOT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `NombreU` varchar(255) NOT NULL,
  `APaternoU` varchar(255) NOT NULL,
  `AMaternoU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `CorreoE`, `Contrasena`, `idRol`, `NombreU`, `APaternoU`, `AMaternoU`) VALUES
(2, 'contacto@btb.com.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 5, 'Juliana', 'Sanchez', 'Vargas'),
(10, 'g@g.g', '202cb962ac59075b964b07152d234b70', 8, 'Graphics', 'G', 'G'),
(1150, 'ptc@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 7, 'Profesor', 'Tiempo', 'Completo'),
(2140, 'aerobot@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5, 'Mike', 'Peregrina', 'Dominguez'),
(9001, 'vinculacion@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 3, 'Vinculacion', 'Vinculacion', 'Viculacion'),
(9002, 'superadmin@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 1, 'Super', 'Admin', 'istrador'),
(9003, 'director@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 6, 'Director', 'Director', 'Director'),
(9004, 'escolares@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 2, 'servicios', 'escolares', 'escolares'),
(9005, 'veronica.moreno@upamozoc.edu.mx', '6ebe76c9fb411be97b3b0d48b791a7c9', 7, 'Veronica', 'Moreno', 'Jimenez'),
(231231, 'brandon@gmail.com', 'fca920e01bb171a1e338fdd671ed36f1', 7, 'BRANDON', 'Rodriguez', 'Trujeque'),
(21032019, 'm.santiagof@upam.edu.mx', '4dc09f7619b38acec6b5f79ea53fdc57', 4, 'Ale', 'R', 'D'),
(21032021, 'm.santiagof@upam.edu.mx', '4e08210daef932abb00964b3afdcd067', 4, 'D', 'H', 'J'),
(21032027, 'm.santiagof@upam.edu.mx', '1e8cf9633da22de4b8f6a61ec0523b94', 4, 'Marcela', 'Santiago', 'F'),
(21032032, 'm.santiagof@upam.edu.mx', '8609441726b5f89599df16ab6199a645', 4, 'Luis', 'sadasd', 'Guadalupe'),
(21032035, 'b.rodriguezt@upam.edu.mx', '12442513d9fa0fb57a56ff7d92e3d15e', 4, 'brandon', 'rodriguez', 'trujeque');

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
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`IdSede`, `IdCarrera`, `IdProceso`, `IdPeriodo`, `Perfil`, `Beneficios`, `NumVacantes`, `NumPostulados`, `totalVacantes`) VALUES
(2140, 1, 1, 2, 'Busca de talentos', 'apoyo econimico', 4, 4, 5),
(2140, 1, 1, 2, 'Busca de talentos', 'apoyo econimico', 4, 4, 5);

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
-- Indices de la tabla `pliberacion`
--
ALTER TABLE `pliberacion`
  ADD KEY `Matricula` (`Matricula`),
  ADD KEY `IdValidacion` (`IdValidacion`),
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
  ADD UNIQUE KEY `IdCarrera` (`IdCarrera`);

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
  MODIFY `IdValidacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `IdProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ptc`
--
ALTER TABLE `ptc`
  MODIFY `idPtc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Filtros para la tabla `pliberacion`
--
ALTER TABLE `pliberacion`
  ADD CONSTRAINT `pliberacion_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pliberacion_ibfk_2` FOREIGN KEY (`IdValidacion`) REFERENCES `docalumnoperiodo` (`IdValidacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pliberacion_ibfk_3` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON DELETE CASCADE ON UPDATE CASCADE;

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
