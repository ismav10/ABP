-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 14:26:10
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gymgest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadgrupal`
--

CREATE TABLE `actividadgrupal` (
  `idActividadGrupal` int(10) NOT NULL,
  `nombreActividadGrupal` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionActividadGrupal` text COLLATE utf8_spanish_ci,
  `numPlazasActividadGrupal` int(10) NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idInstalacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividadgrupal`
--

INSERT INTO `actividadgrupal` (`idActividadGrupal`, `nombreActividadGrupal`, `descripcionActividadGrupal`, `numPlazasActividadGrupal`, `username`, `idInstalacion`) VALUES
(1, 'Yoga', 'El yoga se refiere a una tradicional disciplina física, mental y espiritual que se originó en la India. La palabra se asocia con prácticas de meditación en el hinduismo, el budismo y el jainismo.', 25, 'entrenador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadindividual`
--

CREATE TABLE `actividadindividual` (
  `idActividadIndividual` int(10) NOT NULL,
  `nombreActividadIndividual` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionActividadIndividual` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDeportista` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `metodoPago` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `idActividadIndividual` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`userName`, `tipoDeportista`, `metodoPago`, `idActividadIndividual`) VALUES
('deportista1', 'PEF', '1234567898765432', NULL),
('deportista2', 'TDU', '5406282043000000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_asignar_tabla`
--

CREATE TABLE `deportista_asignar_tabla` (
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_asistir_actividadgrupal`
--

CREATE TABLE `deportista_asistir_actividadgrupal` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idActividadGrupal` int(10) NOT NULL,
  `fechaAsistencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_inscribir_actividadgrupal`
--

CREATE TABLE `deportista_inscribir_actividadgrupal` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idActividadGrupal` int(10) NOT NULL,
  `estado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista_inscribir_actividadgrupal`
--

INSERT INTO `deportista_inscribir_actividadgrupal` (`userName`, `idActividadGrupal`, `estado`) VALUES
('deportista1', 1, 0),
('deportista2', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` int(10) NOT NULL,
  `nombreEjercicio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionEjercicio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `giftEjercicio` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombreEjercicio`, `descripcionEjercicio`, `giftEjercicio`) VALUES
(1, 'Ejercicio 1', '25 series de abdominales con repetición con descanso de 2 minutos entre serie.', 'http://www.canalgif.net/Gifs-animados/Deportes/Abdominales/Imagen-animada-Abdominales-03.gif'),
(2, 'Ejercicio 2', '30 SERIES de ABDOMINALES + 15 min de CARDIO + 30 SERIES DE SENTADILLAS', 'http://www.gifmania.com/Gif-Animados-Deportes/Imagenes-Fitness/Abdominales/Abdominales-Superiores-87551.gif'),
(3, 'Sentadillas - PET', '10 SERIES DE 7 SENTADILLAS POR SERIE CON DESCANSO DE 1 MINUTO.', 'https://saludybienestarmadrid.files.wordpress.com/2015/04/jen-pulsesquat-gif.gif'),
(5, 'Press BANCA', '25 SERIES DE 8 REPETICIONES CADA SERIE (20KG)', 'http://static.wixstatic.com/media/189d0c_e72dec9883364bcdab5a6fd8b5b42572.gif_srz_608_456_85_22_0.50_1.20_0.00_gif_srz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cuentaBanc` varchar(24) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`userName`, `cuentaBanc`) VALUES
('entrenador', 'ES1320900000290350000083');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad`
--

CREATE TABLE `funcionalidad` (
  `idFuncionalidad` int(10) NOT NULL,
  `nombreFuncionalidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `categoriaFuncionalidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionalidad`
--

INSERT INTO `funcionalidad` (`idFuncionalidad`, `nombreFuncionalidad`, `categoriaFuncionalidad`) VALUES
(1, 'Listar Usuarios', 'Gestion Usuarios'),
(2, 'Seleccionar Usuarios', 'Gestion Usuarios'),
(3, 'Añadir Usuario', 'Gestion Usuarios'),
(4, 'Añadir Entrenador', 'Gestion Usuarios'),
(5, 'Añadir Deportista', 'Gestion Usuarios'),
(6, 'Modificar Usuario', 'Gestion Usuarios'),
(7, 'Modificar Entrenador', 'Gestion Entrenadores'),
(8, 'Modificar Deportista', 'Gestion Deportistas'),
(9, 'Borrar Usuario', 'Gestion Usuario'),
(10, 'Borrar Entrenador', 'Gestion Usuario'),
(11, 'Borrar Deportista', 'Gestion Usuario'),
(12, 'Listar Entrenadores', 'Gestion Entrenadores'),
(13, 'Listar Deportistas', 'Gestion Deportistas'),
(50, 'Listar Solicitudes de Inscripcion', 'Gestion Inscripciones'),
(100, 'Listar Ejercicios', 'Gestion Ejercicios'),
(101, 'Añadir Ejercicio', 'Gestion Ejercicios'),
(102, 'Borrar Ejercicio', 'Gestion Ejercicios'),
(103, 'Modificar Ejercicio', 'Gestion Ejercicios'),
(104, 'Ver Ejercicio', 'Gestion Ejercicios'),
(200, 'Listar Notificaciones', 'Gestion Notificaciones'),
(201, 'Consultar Notificaciones', 'Gestion Notificaciones'),
(202, 'Ver Notificacion', 'Gestion Notificaciones'),
(203, 'Insertar Notificacion', 'Gestion Notificaciones'),
(204, 'Baja Notificacion', 'Gestion Notificaciones'),
(300, 'Alta sesion', 'Gestion Sesiones'),
(301, 'Consultar sesion', 'Gestion Sesiones'),
(302, 'Modificar sesion', 'Gestion Sesiones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad_pagina`
--

CREATE TABLE `funcionalidad_pagina` (
  `idFuncionalidad` int(10) NOT NULL,
  `idPagina` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionalidad_pagina`
--

INSERT INTO `funcionalidad_pagina` (`idFuncionalidad`, `idPagina`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(50, 50),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(200, 200),
(201, 201),
(202, 202),
(203, 203),
(204, 204),
(300, 300),
(301, 301),
(302, 302);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad_rol`
--

CREATE TABLE `funcionalidad_rol` (
  `idFuncionalidad` int(10) NOT NULL,
  `idRol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionalidad_rol`
--

INSERT INTO `funcionalidad_rol` (`idFuncionalidad`, `idRol`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 3),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(50, 1),
(100, 1),
(100, 2),
(100, 3),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(200, 1),
(200, 2),
(200, 3),
(201, 1),
(202, 1),
(202, 2),
(202, 3),
(203, 1),
(203, 2),
(204, 1),
(300, 3),
(301, 3),
(302, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

CREATE TABLE `instalacion` (
  `idInstalacion` int(10) NOT NULL,
  `nombreInstalacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descipcionInstalacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aforoIntalacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instalacion`
--

INSERT INTO `instalacion` (`idInstalacion`, `nombreInstalacion`, `descipcionInstalacion`, `aforoIntalacion`) VALUES
(1, 'Sala Multiusos', NULL, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` int(100) NOT NULL,
  `remitenteNotificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `destinatarioNotificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaHoraNotificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asuntoNotificacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mensajeNotificacion` longtext COLLATE utf8_spanish_ci,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idNotificacion`, `remitenteNotificacion`, `destinatarioNotificacion`, `fechaHoraNotificacion`, `asuntoNotificacion`, `mensajeNotificacion`, `username`) VALUES
(1, 'ivanddf1994@gmail.com', 'ivanddf1994@hotmail.com', '2017-11-18 12:52:47', 'Probando SHOWALL', 'Hola', 'admin'),
(2, 'isma@hotmail.com', 'ivanddf1994@hotmail.com', '2017-11-18 12:58:50', 'Prueba SHOWALL 2', 'Hola 2', 'deportista1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idPagina` int(10) NOT NULL,
  `linkPagina` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `nombrePagina` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idPagina`, `linkPagina`, `nombrePagina`) VALUES
(1, '../Views/USUARIO_SHOWALL_Vista.php', 'USUARIO SHOWALL'),
(2, '../Views/USUARIO_SELECT_Vista.php', 'USUARIO SELECT'),
(3, '../Views/USUARIO_ADD_Vista.php', 'USUARIO ADD'),
(4, '../Views/ENTRENADOR_ADD_Vista.php', 'ENTRENADOR_ADD'),
(5, '../Views/DEPORTISTA_ADD_Vista.php', 'DEPORTISTA_ADD'),
(6, '../Views/USUARIO_EDIT_Vista.php', 'USUARIO EDIT'),
(7, '../Views/ENTRENADOR_EDIT_Vista.php', 'ENTRENADOR EDIT'),
(8, '../Views/DEPORTISTA_EDIT_Vista.php', 'DEPORTISTA EDIT'),
(9, '../Views/USUARIO_DELETE_Vista.php', 'USUARIO DELETE'),
(10, '../Views/ENTRENADOR_DELETE_Vista.php', 'ENTRENADOR DELETE'),
(11, '../Views/DEPORTISTA_DELETE_Vista.php', 'DEPORTISTA DELETE'),
(12, '../Views/ENTRENADOR_SHOWALL_Vista.php', 'ENTRENADOR SHOW ALL'),
(13, '../Views/DEPORTISTA_SHOWALL_Vista.php', 'DEPORTISTA SHOW ALL'),
(50, '../Views/INSCRIPCIONPENDIENTE_SHOWALL_Vista.php', 'INSCRIPCIONES PENDIENTES SHOW ALL'),
(100, '../Views/EJERCICIO_SHOWALL_Vista.php', 'EJERCICIO SHOWALL'),
(101, '../Views/EJERCICIO_ADD_Vista.php', 'EJERCICIO ADD'),
(102, '../Views/EJERCICIO_DELETE_Vista.php', 'EJERCICIO DELETE'),
(103, '../Views/EJERCICIO_EDIT_Vista.php', 'EJERCICIO EDIT'),
(104, '../Views/EJERCICIO_SHOWCURRENT_Vista.php', 'EJERCICIO SHOW CURRENT'),
(200, '../Views/NOTIFICACION_SHOWALL_Vista.php', 'NOTIFICACION SHOW ALL'),
(201, '../Views/NOTIFICACION_SHOWCURRENT_Vista.php', 'NOTIFICACION SHOW CURRENT'),
(202, '../Views/NOTIFICACION_SELECT_Vista.php', 'NOTIFICACION SELECT'),
(203, '../Views/NOTIFICACION_ADD_Vista.php', 'NOTIFICACION ADD'),
(204, '../Views/NOTIFICACION_DELETE_Vista.php', 'NOTIFICACION DELETE'),
(300, '../Views/SESSION_ADD_Vista.php', 'SESSION ADD'),
(301, '../Views/SESSION_SHOWALL_Vista.php', 'SESSION SHOWALL'),
(302, '../Views/SESSION_EDIT_Vista.php', 'SESSION EDIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(10) NOT NULL,
  `nombreRol` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador'),
(2, 'Entrenador'),
(3, 'Deportista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idSesion` int(10) NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` int(10) NOT NULL,
  `comentarioSesion` text COLLATE utf8_spanish_ci,
  `idActividadIndividual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `idTabla` int(10) NOT NULL,
  `descripcionTabla` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_con_ejercicio`
--

CREATE TABLE `tabla_con_ejercicio` (
  `idTabla` int(10) NOT NULL,
  `idEjercicio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `foto` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `tipoUsuario` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`foto`, `userName`, `password`, `tipoUsuario`, `nombre`, `apellidos`, `dni`, `fechaNac`, `direccion`, `telefono`, `email`) VALUES
('../Documents/Administradores/44488795X/Foto/ivan.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Iván', 'de Dios Fernández', '44488795X', '1994-03-26', 'Avenida Vistahermosa 8, 3ÂºA', 988252875, 'ivanddf1994@hotmail.com'),
(NULL, 'deportista1', '5e3ea95c649fe43cbc6e9c1c71071f0f', 3, 'Bruno', 'Romero Rodríguez', '87654321Q', '1995-10-10', 'Paseo de la Castellana 22, 1º', 988767165, 'brunoromero@gmail.com'),
(NULL, 'deportista2', '220a15a78a728aa88fcf45d009705d96', 3, 'Alberto', 'Porral Framiñán', '12678946H', '1992-09-17', 'Manuel Antonio Puga 54, 2ºA', 678987432, 'albertoporral@hotmail.com'),
(NULL, 'entrenador', 'a990ba8861d2b344810851e7e6b49104', 2, 'Ismael', 'Vázquez Fernández', '12345678A', '1995-10-01', 'Avenida de la Albufera 6, 2º', 988767521, 'ismaelvazquez@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `userName` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`userName`, `idRol`) VALUES
('admin', 1),
('deportista1', 3),
('deportista2', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividadgrupal`
--
ALTER TABLE `actividadgrupal`
  ADD PRIMARY KEY (`idActividadGrupal`),
  ADD KEY `username` (`username`),
  ADD KEY `idInstalacion` (`idInstalacion`);

--
-- Indices de la tabla `actividadindividual`
--
ALTER TABLE `actividadindividual`
  ADD PRIMARY KEY (`idActividadIndividual`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `idActividadIndividual` (`idActividadIndividual`);

--
-- Indices de la tabla `deportista_asignar_tabla`
--
ALTER TABLE `deportista_asignar_tabla`
  ADD PRIMARY KEY (`username`,`idTabla`),
  ADD KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `deportista_asistir_actividadgrupal`
--
ALTER TABLE `deportista_asistir_actividadgrupal`
  ADD PRIMARY KEY (`userName`,`idActividadGrupal`),
  ADD KEY `idActividadGrupal` (`idActividadGrupal`);

--
-- Indices de la tabla `deportista_inscribir_actividadgrupal`
--
ALTER TABLE `deportista_inscribir_actividadgrupal`
  ADD PRIMARY KEY (`userName`,`idActividadGrupal`),
  ADD KEY `idActividadGrupal` (`idActividadGrupal`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`userName`);

--
-- Indices de la tabla `funcionalidad`
--
ALTER TABLE `funcionalidad`
  ADD PRIMARY KEY (`idFuncionalidad`);

--
-- Indices de la tabla `funcionalidad_pagina`
--
ALTER TABLE `funcionalidad_pagina`
  ADD PRIMARY KEY (`idFuncionalidad`,`idPagina`),
  ADD KEY `idPagina` (`idPagina`);

--
-- Indices de la tabla `funcionalidad_rol`
--
ALTER TABLE `funcionalidad_rol`
  ADD PRIMARY KEY (`idFuncionalidad`,`idRol`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`idInstalacion`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idNotificacion`,`username`),
  ADD KEY `username` (`username`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idPagina`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idSesion`,`username`),
  ADD KEY `username` (`username`),
  ADD KEY `idTabla` (`idTabla`),
  ADD KEY `idActividadIndividual` (`idActividadIndividual`);

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD PRIMARY KEY (`idTabla`),

--
-- Indices de la tabla `tabla_con_ejercicio`
--
ALTER TABLE `tabla_con_ejercicio`
  ADD PRIMARY KEY (`idTabla`,`idEjercicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userName`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`userName`,`idRol`),
  ADD KEY `usuario_rol_ibfk_2` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividadgrupal`
--
ALTER TABLE `actividadgrupal`
  MODIFY `idActividadGrupal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `actividadindividual`
--
ALTER TABLE `actividadindividual`
  MODIFY `idActividadIndividual` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `funcionalidad`
--
ALTER TABLE `funcionalidad`
  MODIFY `idFuncionalidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `idInstalacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idSesion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabla`
--
--
-- AUTO_INCREMENT de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  MODIFY `idRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividadgrupal`
--
ALTER TABLE `actividadgrupal`
  ADD CONSTRAINT `actividadgrupal_ibfk_1` FOREIGN KEY (`username`) REFERENCES `entrenador` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividadgrupal_ibfk_2` FOREIGN KEY (`idInstalacion`) REFERENCES `instalacion` (`idInstalacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `deportista_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`),
  ADD CONSTRAINT `deportista_ibfk_2` FOREIGN KEY (`idActividadIndividual`) REFERENCES `actividadindividual` (`idActividadIndividual`);

--
-- Filtros para la tabla `deportista_asignar_tabla`
--
ALTER TABLE `deportista_asignar_tabla`
  ADD CONSTRAINT `deportista_asignar_tabla_ibfk_1` FOREIGN KEY (`username`) REFERENCES `deportista` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deportista_asignar_tabla_ibfk_2` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deportista_asistir_actividadgrupal`
--
ALTER TABLE `deportista_asistir_actividadgrupal`
  ADD CONSTRAINT `deportista_asistir_actividadgrupal_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `deportista` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deportista_asistir_actividadgrupal_ibfk_2` FOREIGN KEY (`idActividadGrupal`) REFERENCES `actividadgrupal` (`idActividadGrupal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deportista_inscribir_actividadgrupal`
--
ALTER TABLE `deportista_inscribir_actividadgrupal`
  ADD CONSTRAINT `deportista_inscribir_actividadgrupal_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `deportista` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deportista_inscribir_actividadgrupal_ibfk_2` FOREIGN KEY (`idActividadGrupal`) REFERENCES `actividadgrupal` (`idActividadGrupal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`);

--
-- Filtros para la tabla `funcionalidad_pagina`
--
ALTER TABLE `funcionalidad_pagina`
  ADD CONSTRAINT `funcionalidad_pagina_ibfk_1` FOREIGN KEY (`idFuncionalidad`) REFERENCES `funcionalidad` (`idFuncionalidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionalidad_pagina_ibfk_2` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcionalidad_rol`
--
ALTER TABLE `funcionalidad_rol`
  ADD CONSTRAINT `funcionalidad_rol_ibfk_1` FOREIGN KEY (`idFuncionalidad`) REFERENCES `funcionalidad` (`idFuncionalidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionalidad_rol_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuario` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`username`) REFERENCES `deportista` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesion_ibfk_2` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesion_ibfk_3` FOREIGN KEY (`idActividadIndividual`) REFERENCES `actividadindividual` (`idActividadIndividual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabla`
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
