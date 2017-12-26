


DROP DATABASE IF EXISTS `muevet`;
CREATE DATABASE IF NOT EXISTS `muevet` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `muevet`;
GRANT ALL PRIVILEGES ON * . * TO 'root'@'localhost';
FLUSH PRIVILEGES;


--
-- Base de datos: `muevet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadgrupal`
--
-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-12-2017 a las 19:58:55
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
-- Base de datos: `muevet`
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
  `diaActividadGrupal` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `horaInicioActividadGrupal` time NOT NULL,
  `horaFinActividadGrupal` time NOT NULL,
  `fechaInicioActividadGrupal` date NOT NULL,
  `fechaFinActividadGrupal` date NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idInstalacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividadgrupal`
--

INSERT INTO `actividadgrupal` (`idActividadGrupal`, `nombreActividadGrupal`, `descripcionActividadGrupal`, `numPlazasActividadGrupal`, `diaActividadGrupal`, `horaInicioActividadGrupal`, `horaFinActividadGrupal`, `fechaInicioActividadGrupal`, `fechaFinActividadGrupal`, `username`, `idInstalacion`) VALUES
(1, 'Yoga A', 'AdÃ©ntrate en el mundo del fittness y aprende a conectar todos tus sentidos con tu cuerpo', 25, 'Lunes', '18:00:00', '19:30:00', '2018-01-01', '2018-01-31', 'entrenador', 1),
(2, 'Yoga B', 'AdÃ©ntrate en el mundo del fittness y aprende a conectar todos tus sentidos con tu cuerpo', 25, 'MiÃ©rcoles', '18:00:00', '19:30:00', '2018-01-01', '2018-01-31', 'entrenador', 1),
(3, 'Yoga C', 'AdÃ©ntrate en el mundo del fittness y aprende a conectar todos tus sentidos con tu cuerpo', 25, 'Jueves', '18:00:00', '19:30:00', '2018-01-01', '2018-01-31', 'entrenador', 1),
(4, 'Yoga D', 'AdÃ©ntrate en el mundo del fittness y aprende a conectar todos tus sentidos con tu cuerpo', 25, 'Viernes', '18:00:00', '19:30:00', '2018-01-01', '2018-01-31', 'entrenador', 1),
(5, 'Spinning A', 'Ejercicio cardiovascular sobre bici que recrea un circuito de montaÃ±a, de intensidad media-alta, al ritmo de la mÃºsica. Se caracteriza por su alto consumo calÃ³rico', 20, 'Lunes', '16:00:00', '18:00:00', '2018-01-15', '2018-02-15', 'entrenador2', 1),
(6, 'Spinning B', 'Ejercicio cardiovascular sobre bici que recrea un circuito de montaÃ±a, de intensidad media-alta, al ritmo de la mÃºsica. Se caracteriza por su alto consumo calÃ³rico', 20, 'MiÃ©rcoles', '16:00:00', '18:00:00', '2018-01-15', '2018-02-15', 'entrenador2', 1),
(7, 'Spinning C', 'Ejercicio cardiovascular sobre bici que recrea un circuito de montaÃ±a, de intensidad media-alta, al ritmo de la mÃºsica. Se caracteriza por su alto consumo calÃ³rico', 20, 'Viernes', '16:00:00', '18:00:00', '2018-01-15', '2018-02-15', 'entrenador2', 1),
(8, 'Boxeo A', 'Deporte en que dos adversarios luchan con los puÃ±os enfundados en guantes especiales, para golpear al contrario por encima de la cintura.', 10, 'Martes', '19:30:00', '21:00:00', '2018-01-01', '2018-02-01', 'entrenador2', 1),
(9, 'Boxeo B', 'Deporte en que dos adversarios luchan con los puÃ±os enfundados en guantes especiales, para golpear al contrario por encima de la cintura.', 10, 'Jueves', '19:30:00', '21:00:00', '2018-01-01', '2018-02-01', 'entrenador2', 1),
(10, 'Body Pumb A', 'Programa de entrenamiento Les Mills con barras y discos que fortalece, tonifica y define la musculatura de todo el cuerpo', 10, 'Martes', '19:30:00', '21:00:00', '2018-01-10', '2018-02-10', 'entrenador3', 2),
(11, 'Body Pumb B', 'Programa de entrenamiento Les Mills con barras y discos que fortalece, tonifica y define la musculatura de todo el cuerpo', 10, 'MiÃ©rcoles', '19:30:00', '21:00:00', '2018-01-10', '2018-02-10', 'entrenador3', 2),
(12, 'Body Pumb C', 'Programa de entrenamiento Les Mills con barras y discos que fortalece, tonifica y define la musculatura de todo el cuerpo', 10, 'Jueves', '19:30:00', '21:00:00', '2018-01-10', '2018-02-10', 'entrenador3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadindividual`
--

CREATE TABLE `actividadindividual` (
  `idActividadIndividual` int(10) NOT NULL,
  `nombreActividadIndividual` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionActividadIndividual` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividadindividual`
--

INSERT INTO `actividadindividual` (`idActividadIndividual`, `nombreActividadIndividual`, `descripcionActividadIndividual`) VALUES
(1, 'Fittness', 'RealizaciÃ³n de diferentes ejercicios fÃ­sicos en una sala acondicionada para ello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDeportista` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `metodoPago` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`userName`, `tipoDeportista`, `metodoPago`) VALUES
('deportista1', 'PEF', '1234567898765432'),
('deportista2', 'TDU', '5406282043000000'),
('deportista3', 'PEF', '5489067823456543'),
('deportista4', 'TDU', '5467876523459876');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_asignar_tabla`
--

CREATE TABLE `deportista_asignar_tabla` (
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista_asignar_tabla`
--

INSERT INTO `deportista_asignar_tabla` (`username`, `idTabla`) VALUES
('deportista1', 1),
('deportista1', 2),
('deportista1', 8),
('deportista1', 9),
('deportista1', 11),
('deportista2', 5),
('deportista2', 6),
('deportista2', 12),
('deportista3', 1),
('deportista3', 3),
('deportista3', 9),
('deportista4', 4),
('deportista4', 5),
('deportista4', 7),
('deportista4', 12),
('deportista4', 13);

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
  `estado` tinyint(1) DEFAULT '0',
  `plazasDisponibles` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista_inscribir_actividadgrupal`
--

INSERT INTO `deportista_inscribir_actividadgrupal` (`userName`, `idActividadGrupal`, `estado`, `plazasDisponibles`) VALUES
('deportista1', 1, 0, 24),
('deportista1', 5, 1, 19),
('deportista1', 8, 1, 8),
('deportista2', 8, 1, 8),
('deportista2', 1, 1, 24),
('deportista2', 4, 1, 24),
('deportista2', 10, 0, 10),
('deportista3', 8, 0, 7),
('deportista3', 6, 0, 20),
('deportista3', 5, 0, 19),
('deportista3', 11, 0, 10),
('deportista4', 3, 1, 24),
('deportista4', 8, 1, 7),
('deportista4', 2, 1, 19),
('deportista4', 7, 1, 19),
('deportista4', 12, 1, 9);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_inscribir_actividadindividual`
--

CREATE TABLE `deportista_inscribir_actividadindividual` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idActividadIndividual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista_inscribir_actividadindividual`
--

INSERT INTO `deportista_inscribir_actividadindividual` (`userName`, `idActividadIndividual`) VALUES
('deportista1', 1),
('deportista2', 1),
('deportista3', 1),
('deportista4', 1);

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
(1, 'Cinta de Correr', 'Trotar de menos a mÃ¡s', 'http://bicicletaeliptica.org/wp-content/uploads/2016/05/chica-corriendo-en-cinta-de-correr.jpg'),
(2, 'Bicicleta EstÃ¡tica', 'Andar en la bicleta estÃ¡tica de menos a mÃ¡s.','https://images-na.ssl-images-amazon.com/images/I/71R2L1-eeOL._SL1500.jpg'),
(3, 'Bicicleta ElÃ­ptica', 'Andar en la bicleta elÃ­ptica de menos a mÃ¡s.', 'https://www.decathlon.es/media/835/8358831/big_d3737dee-2c16-47ef-9d5c-9def26d4ec40.jpg'),
(4, 'Prensa de Pecho en Banco', 'RecuÃ©state de espalda sobre un banco y sujeta 2 mancuernas al nivel del pecho, a los lados del cuerpo, con las palmas apuntando hacia tus pies', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/1.gif'),
(5, 'Prensa de Pecho en Banco (EmpuÃ±adura Neutral', 'RecuÃ©state de espalda sobre un banco y sujeta 2 mancuernas al nivel del pecho, a los lados del cuerpo, con las palmas apuntando una hacia otra.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/2.gif'),
(6, 'Prensa de Pecho en Banco - Inclinada', 'RecuÃ©state de espalda sobre un banco inclinado y sujeta 2 mancuernas al nivel del pecho, a los lados del cuerpo, con las palmas apuntando hacia adelante.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/3.gif'),
(7, 'Prensa de Pecho en Banco - Declinada', 'RecuÃ©state de espalda sobre un banco declinado y sujeta 2 mancuernas al nivel del pecho, con las palmas apuntando hacia adelante.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/5.gif'),
(8, 'Apertura - Inclinada', 'RecuÃ©state de espalda sobre un banco inclinado y coge una mancuerna con cada mano a la altura del cuerpo, con tus codos ligeramente arqueados.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/7.gif'),
(9, 'Pullover - Brazos Rectos', 'RecuÃ©state de espalda sobre uno de los extremos del banco y sujeta una mancuerna con ambas manos por sobre el Ã¡rea de tu pecho, con los brazos extendidos.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/8.gif'),
(10, 'Pullover - Brazos Flexionados', 'RecuÃ©state de espalda sobre uno de los extremos del banco y sujeta 2 mancuernas por debajo del nivel de tu cabeza, con los codos formando un Ã¡ngulo de 90 grados.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/9.gif'),
(11, 'Prensa de Hombros', 'Ponte de pie y sujeta dos mancuernas cerca de tus hombros, con las palmas apuntando hacia adelante.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/5.gif'),
(12, 'Vuelos Laterales', 'Ponte de pie y sujeta una mancuerna con cada mano frente a tus caderas, con las palmas apuntando una hacia otra.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/8.gif'),
(13, 'Remo Vertical', 'Ponte de pie y sujeta una mancuerna en cada mano enfrente de tus muslos.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/15.gif'),
(14, 'Vuelos Frontales', 'Ponte de pie y sujeta una mancuerna con cada mano frente a tus muslos, con las palmas apuntando hacia tu cuerpo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/16.gif'),
(15, 'Prensa Superior', 'Ponte de pie y sujeta dos mancuernas justo por encima de tus hombros, con las palmas apuntando una hacia otra, y las rodillas arqueadas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/18.gif'),
(16, 'Encogimiento de Hombros', 'Ponte de pie y sujeta una mancuerna con cada mano frente a tus muslos, con las palmas apuntando hacia tu cuerpo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/17.gif'),
(17, 'Flexiones de BÃ­ceps', 'Ponte de pie y sujeta una mancuerna con cada mano, a los costados de tu cuerpo, con las palmas apuntando una hacia otra.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/4.gif'),
(18, 'Flexiones Martillo', 'Coge una mancuerna con cada mano, hacia los costados de tu cuerpo, con las palmas apuntando hacia tu cuerpo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/5.gif'),
(19, 'Flexiones de BÃ­ceps Inclinado', 'SiÃ©ntate sobre un banco inclinado y sujeta una mancuerna con cada mano, con las palmas de tu mano apuntando una hacia otra.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/9.gif'),
(20, 'Flexiones de BÃ­ceps Supinadoras', 'RecuÃ©state de espalda sobre un banco y sujeta una mancuerna con cada mano hacia cada lado de tu cuerpo, por debajo de la altura del cuerpo, con las palmas apuntando hacia arriba.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/18.gif'),
(21, 'Apertura de Espalda', 'RecuÃ©state sobre tu pecho en el banco y coge dos mancuernas con tus manos, con los codos formando Ã¡ngulos de 90 grados.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/9.gif'),
(22, 'Peso Muerto', 'Ponte de pie y sujeta una mancuerna con cada una de tus manos.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/5.gif'),
(23, 'Remo Arrodillado - A Un Brazo', 'ColÃ³cate en posiciÃ³n inclinada hacia adelante enfrente de un banco, mientras sostienes una mancuerna con una mano (con el brazo extendido).', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/4.gif'),
(24, 'Flexiones al Pie Opuesto', 'Ponte de pie y estÃ­rate hacia abajo de modo de tomar dos mancuernas con ambas manos (las rodillas ligeramente flexionadas).', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/6.gif'),
(25, 'Sentadillas', 'Ponte de pie y sujeta una mancuerna en cada mano a los costados de tu cuerpo, con las palmas apuntando hacia tu cuerpo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/2.gif'),
(26, 'Estocadas EstÃ¡ticas', 'Ponte de pie con un pie al frente, el otro atrÃ¡s y sujeta una mancuerna en cada mano a los costados de tu cuerpo, con las palmas apuntando una hacia la otra.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/3.gif'),
(27, 'ElevaciÃ³n de Punta del Pie - A Una Pierna', 'PÃ¡rate en un pie sobre un pequeÃ±o escalÃ³n y sujeta una mancuerna con una mano contra el costado de tu cuerpo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/8.gif'),
(28, 'Peso Muerto - Piernas Rectas', 'Ponte de pie y sujeta una mancuerna en cada mano contra los costados de tu cuerpo, con las palmas apuntando una hacia la otra.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/6.gif'),
(29, 'Encogimientos - Con Carga', 'RecuÃ©state de espalda sobre un banco y sujeta una mancuerna por encima de tu pecho.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/abdominales/images/1.gif'),
(30, 'Elevaciones de Piernas - Con Carga', 'RecuÃ©state de espalda sobre el banco, con tus manos agarrando los costados del mismo y sujeta una mancuerna entre tus pies.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/abdominales/images/2.gif'),
(31, 'Flexiones Laterales con Mancuernas', 'Sujeta una mancuerna con una mano, al costado de tu cuerpo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/abdominales/images/3.gif'),
(32, 'Navajas con Pelota', 'Coloca tus tobillos por encima de la pelota de ejercitaciÃ³n, las piernas extendidas, el pecho apuntando hacia el suelo y extiende tus brazos para levantarte del suelo.', 'http://www.ejercicios-con-pelotas.com/ejercicios/abdominales/images/ball-jacknife.gif'),
(33, 'Plancha sobre Pelota', 'Ponte de rodillas, coloca tus antebrazos por encima de la pelota de ejercitaciÃ³n frente a ti, los codos con un Ã¡ngulo de 90 grados y la espalda recta.', 'http://www.ejercicios-con-pelotas.com/ejercicios/abdominales/images/ball-table-top.gif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cuentaBanc` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`userName`, `cuentaBanc`) VALUES
('entrenador', '20900000290350000083'),
('entrenador2', '00190020961234567890'),
('entrenador3', '00190020961234567890');

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
(14, 'Ver Usuario', 'Gestion Usuarios'),
(15, 'Ver Deportista', 'Gestion Deportistas'),
(16, 'Ver Entrenador', 'Gestion Entrenadores'),
(17, 'Ver Actividades Entrenador', 'Gestion Deportistas'),
(18, 'Asignar Tablas a Deportista', 'Gestion Deportistas'),
(19, 'Asignar Actividades Grupales a Deportista', 'Gestion Deportistas'),
(50, 'Listar Solicitudes de Inscripcion', 'Gestion Inscripciones'),
(100, 'Listar Ejercicios', 'Gestion Ejercicios'),
(101, 'Añadir Ejercicio', 'Gestion Ejercicios'),
(102, 'Borrar Ejercicio', 'Gestion Ejercicios'),
(103, 'Modificar Ejercicio', 'Gestion Ejercicios'),
(104, 'Ver Ejercicio', 'Gestion Ejercicios'),
(150, 'Listar Tablas', 'Gestion Tablas'),
(151, 'Añadir Tabla', 'Gestion Tablas'),
(152, 'Editar Tabla', 'Gestion Tablas'),
(153, 'Ver Tabla', 'Gestion Tablas'),
(200, 'Listar Notificaciones', 'Gestion Notificaciones'),
(201, 'Consultar Notificaciones', 'Gestion Notificaciones'),
(202, 'Ver Notificacion', 'Gestion Notificaciones'),
(203, 'Insertar Notificacion', 'Gestion Notificaciones'),
(204, 'Baja Notificacion', 'Gestion Notificaciones'),
(300, 'Alta sesion', 'Gestion Sesiones'),
(301, 'Consultar sesion', 'Gestion Sesiones'),
(302, 'Modificar sesion', 'Gestion Sesiones'),
(303, 'Filtrar sesion', 'Gestion Sesiones'),
(304, 'Consulta sesion', 'Gestion Sesiones'),
(400, 'Insertar Actividad Grupal', 'Gestion Actividad Grupal'),
(401, 'Borrar Actividad Grupal', 'Gestion Actividad Grupal'),
(402, 'Modificar Actividad Grupal', 'Gestion Actividad Grupal'),
(403, 'Consultar Actividades Grupales', 'Gestion Actividad Grupal'),
(404, 'Listar Actividades Grupales', 'Gestion Actividad Grupal'),
(405, 'Ver Actividad Grupal', 'Gestion Actividad Grupal'),
(450, 'Insertar Actividad Individual', 'Gestion Actividad Individual'),
(451, 'Borrar Actividad Individual', 'Gestion Actividad Individual'),
(452, 'Modificar Actividad Individual', 'Gestion Actividad Individual'),
(453, 'Consultar Actividades Individuales', 'Gestion Actividad Individual'),
(454, 'Listar Actividades Individuales', 'Gestion Actividad Individual'),
(455, 'Ver Actividad Individual', 'Gestion Actividad Individual');

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
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(50, 50),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(150, 150),
(151, 151),
(152, 152),
(153, 153),
(200, 200),
(201, 201),
(202, 202),
(203, 203),
(204, 204),
(300, 300),
(301, 301),
(302, 302),
(303, 303),
(304, 304),
(400, 400),
(401, 401),
(402, 402),
(403, 403),
(404, 404),
(405, 405),
(450, 450),
(451, 451),
(452, 452),
(453, 453),
(454, 454),
(455, 455);

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
(13, 2),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 3),
(17, 3),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
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
(150, 1),
(150, 2),
(150, 3),
(151, 1),
(151, 2),
(152, 1),
(152, 2),
(153, 1),
(153, 2),
(153, 3),
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
(302, 3),
(303, 3),
(304, 3),
(400, 1),
(401, 1),
(402, 1),
(403, 1),
(403, 2),
(403, 3),
(404, 1),
(404, 2),
(404, 3),
(405, 1),
(405, 2),
(405, 3),
(450, 1),
(451, 1),
(452, 1),
(453, 1),
(453, 2),
(453, 3),
(454, 1),
(454, 2),
(454, 3),
(455, 1),
(455, 2),
(455, 3);

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
(1, 'Sala Multiusos A', NULL, 50),
(2, 'Sala Multiusos B', NULL, 50);

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
(14, '../Views/USUARIO_SHOW_Vista.php', 'USUARIO SHOW'),
(15, '../Views/DEPORTISTA_SHOW_Vista.php', 'DEPORTISTA SHOW'),
(16, '../Views/ENTRENADOR_SHOW_Vista.php', 'ENTRENADOR SHOW'),
(17, '../Views/DEPORTISTA_SHOW_GRUPALES_Vista.php', 'DEPORTISTA SHOW ACTIVIDADES'),
(18, '../Views/DEPORTISTA_ASIGNAR_TABLA_Vista.php', 'DEPORTISTA TABLAS'),
(19, '../Views/DEPORTISTA_INSCRIBIR_ACTIVIDAD_Vista.php', 'DEPORTISTA ACTIVIDADES'),
(50, '../Views/INSCRIPCIONPENDIENTE_SHOWALL_Vista.php', 'INSCRIPCIONES PENDIENTES SHOW ALL'),
(100, '../Views/EJERCICIO_SHOWALL_Vista.php', 'EJERCICIO SHOWALL'),
(101, '../Views/EJERCICIO_ADD_Vista.php', 'EJERCICIO ADD'),
(102, '../Views/EJERCICIO_DELETE_Vista.php', 'EJERCICIO DELETE'),
(103, '../Views/EJERCICIO_EDIT_Vista.php', 'EJERCICIO EDIT'),
(104, '../Views/EJERCICIO_SHOWCURRENT_Vista.php', 'EJERCICIO SHOW CURRENT'),
(150, '../Views/TABLA_SHOWALL_Vista.php', 'TABLA SHOW ALL'),
(151, '../Views/TABLA_ADD_Vista.php', 'TABLA ADD'),
(152, '../Views/TABLA_EDIT_Vista.php', 'TABLA EDIT'),
(153, '../Views/TABLA_SHOWCURRENT_Vista.php', 'TABLA SHOW'),
(200, '../Views/NOTIFICACION_SHOWALL_Vista.php', 'NOTIFICACION SHOW ALL'),
(201, '../Views/NOTIFICACION_SHOWCURRENT_Vista.php', 'NOTIFICACION SHOW CURRENT'),
(202, '../Views/NOTIFICACION_SELECT_Vista.php', 'NOTIFICACION SELECT'),
(203, '../Views/NOTIFICACION_ADD_Vista.php', 'NOTIFICACION ADD'),
(204, '../Views/NOTIFICACION_DELETE_Vista.php', 'NOTIFICACION DELETE'),
(300, '../Views/SESSION_ADD_Vista.php', 'SESSION ADD'),
(301, '../Views/SESSION_SHOWALL_Vista.php', 'SESSION SHOWALL'),
(302, '../Views/SESSION_EDIT_Vista.php', 'SESSION EDIT'),
(303, '../Views/SESSION_SHOW_Vista.php', 'SESSION SHOW'),
(304, '../Views/SESSION_SHOWCURRENT_Vista.php', 'SESSION SHOWCURRENT'),
(400, '../Views/ACTIVIDAD_GRUPAL_ADD_Vista.php', 'ACTIVIDAD GRUPAL ADD'),
(401, '../Views/ACTIVIDAD_GRUPAL_DELETE_Vista.php', 'ACTIVIDAD GRUPAL DELETE'),
(402, '../Views/ACTIVIDAD_GRUPAL_EDIT_Vista.php', 'ACTIVIDAD GRUPAL EDIT'),
(403, '../Views/ACTIVIDAD_GRUPAL_SHOWCURRENT_Vista.php', 'ACTIVIDAD GRUPAL SHOWCURRENT'),
(404, '../Views/ACTIVIDAD_GRUPAL_SHOWALL_Vista.php', 'ACTIVIDAD GRUPAL SHOWALL'),
(405, '../Views/ACTIVIDAD_GRUPAL_SHOW_Vista.php', 'ACTIVIDAD GRUPAL SHOW'),
(450, '../Views/ACTIVIDAD_INDIVIDUAL_ADD_Vista.php', 'ACTIVIDAD INDIVIDUAL ADD'),
(451, '../Views/ACTIVIDAD_INDIVIDUAL_DELETE_Vista.php', 'ACTIVIDAD INDIVIDUAL DELETE'),
(452, '../Views/ACTIVIDAD_INDIVIDUAL_EDIT_Vista.php', 'ACTIVIDAD INDIVIDUAL EDIT'),
(453, '../Views/ACTIVIDAD_INDIVIDUAL_SHOWCURRENT_Vista.php', 'ACTIVIDAD INDIVIDUAL SHOWCURRENT'),
(454, '../Views/ACTIVIDAD_INDIVIDUAL_SHOWALL_Vista.php', 'ACTIVIDAD INDIVIDUAL SHOWALL'),
(455, '../Views/ACTIVIDAD_INDIVIDUAL_SHOW_Vista.php', 'ACTIVIDAD INDIVIDUAL SHOW');

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
  `fechaSesion` date NOT NULL,
  `horaInicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `horaFin` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioSesion` text COLLATE utf8_spanish_ci,
  `idActividadIndividual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idSesion`, `username`, `idTabla`, `fechaSesion`, `horaInicio`, `horaFin`, `comentarioSesion`, `idActividadIndividual`) VALUES
(1, 'deportista1', 3, '2017-12-18', '18:00', '18:45', 'Okey', 1),
(2, 'deportista1', 2, '2017-12-25', '18:25', '19:10', 'Uff', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `idTabla` int(10) NOT NULL,
  `nombreTabla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionTabla` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla`
--

INSERT INTO `tabla` (`idTabla`, `nombreTabla`, `tipo`, `descripcionTabla`) VALUES
(1, 'Tabla Pecho/Biceps 1', 'EstÃ¡ndar', ' Tabla Intensidad Alta'),
(2, 'Tabla Hombro/Espalda 1', 'EstÃ¡ndar', '  Tabla Intensidad Media'),
(3, 'Tabla Abdominal 1', 'EstÃ¡ndar', ' Tabla Intensidad Baja'),
(4, 'Tabla Hombro/Espalda 2', 'Personalizada', 'Tabla Intensidad Media'),
(5, 'Tabla Abdominal 2', 'Personalizada', 'Tabla Intensidad Baja'),
(6, 'Tabla Pierna 1', 'Personalizada', 'Tabla Intensidad Baja'),
(7, 'Tabla Pierna 2', 'Personalizada', 'Tabla Intensidad Media'),
(8, 'Tabla Abdominal 3', 'EstÃ¡ndar', ' Tabla Intensidad Media'),
(9, 'Tabla Pecho/Biceps 2', 'EstÃ¡ndar', ' Tabla Intensidad Alta'),
(10, 'Tabla Espalda 1', 'EstÃ¡ndar', ' Tabla Intensidad Media'),
(11, 'Tabla Cardio/Abdominal 1', 'EstÃ¡ndar', ' Tabla Intensidad Baja'),
(12, 'Tabla Mixta 1', 'Personalizada', ' Tabla Intensidad Baja'),
(13, 'Tabla Mixta 2', 'Personalizada', ' Tabla Intensidad Baja');

--
-- Estructura de tabla para la tabla `tabla_con_ejercicio`
--

CREATE TABLE `tabla_con_ejercicio` (
  `idTabla` int(10) NOT NULL,
  `idEjercicio` int(10) NOT NULL,
  `numseries` int(10) DEFAULT NULL,
  `numrepeticiones` int(10) DEFAULT NULL,
  `duracion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_con_ejercicio`
--

INSERT INTO `tabla_con_ejercicio` (`idTabla`, `idEjercicio`, `numseries`, `numrepeticiones`, `duracion`) VALUES
(1, 1, 1, 0, 20),
(1, 3, 2, 0, 15),
(1, 4, 4, 12, 0),
(1, 5, 4, 12, 0),
(1, 31, 3, 15, 0),
(1, 32, 4, 12, 0),
(1, 33, 4, 12, 0),
(2, 8, 10, 3, 0),
(2, 9, 12, 3, 0),
(2, 10, 10, 4, 0),
(2, 13, 15, 3, 0),
(2, 31, 0, 2, 10),
(3, 1, 0, 2, 20),
(3, 3, 0, 2, 20),
(3, 26, 0, 4, 1),
(3, 27, 0, 4, 1),
(3, 29, 0, 4, 1),
(3, 30, 0, 4, 1),
(3, 31, 0, 4, 1),
(4, 1, 0, 2, 10),
(4, 2, 0, 2, 10),
(4, 9, 10, 4, 0),
(4, 10, 10, 4, 0),
(4, 13, 10, 4, 0),
(4, 14, 10, 4, 0),
(4, 15, 10, 4, 0),
(4, 31, 30, 4, 0),
(6, 1, 0, 1, 15),
(6, 2, 0, 0, 20),
(6, 3, 0, 2, 10),
(6, 21, 12, 4, 0),
(6, 22, 12, 4, 0),
(6, 23, 12, 4, 0),
(6, 25, 12, 4, 0),
(7, 1, 0, 2, 20),
(7, 22, 15, 3, 0),
(7, 23, 15, 3, 0),
(7, 25, 15, 3, 0),
(7, 26, 30, 4, 0),
(7, 30, 30, 4, 0),
(7, 31, 30, 4, 0),
(9, 6, 10, 4, 0),
(9, 7, 10, 4, 0),
(9, 8, 15, 4, 0),
(9, 9, 10, 4, 0),
(9, 10, 10, 4, 0),
(9, 13, 25, 4, 0),
(9, 19, 10, 4, 0),
(9, 22, 10, 4, 0),
(9, 29, 25, 4, 0),
(10, 1, 1, 0, 20),
(10, 10, 3, 8, 0),
(10, 11, 4, 8, 0),
(10, 13, 3, 8, 0),
(10, 21, 3, 12, 0),
(10, 32, 3, 0, 1),
(10, 33, 3, 0, 1),
(11, 1, 1, 0, 10),
(11, 2, 2, 0, 15),
(11, 3, 2, 0, 15),
(11, 28, 3, 25, 0),
(11, 31, 3, 25, 0),
(11, 32, 3, 25, 0),
(12, 1, 1, 0, 10),
(12, 4, 3, 10, 0),
(12, 5, 3, 10, 0),
(12, 9, 3, 10, 0),
(12, 10, 3, 10, 0),
(12, 13, 3, 10, 0),
(12, 14, 3, 10, 0),
(12, 19, 3, 10, 0),
(12, 21, 3, 10, 0),
(12, 22, 3, 10, 0),
(12, 32, 3, 0, 1),
(13, 2, 1, 12, 15),
(13, 3, 1, 12, 15),
(13, 6, 3, 12, 0),
(13, 7, 3, 12, 0),
(13, 11, 3, 12, 0),
(13, 19, 3, 12, 0),
(13, 20, 3, 12, 0),
(13, 23, 3, 12, 0),
(13, 24, 4, 0, 1),
(13, 27, 4, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `foto` varchar(500) COLLATE utf8_spanish_ci DEFAULT '../img/user.jpg',
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
('../Documents/Administradores/44488795X/Foto/ivan.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'IvÃ¡n', 'de Dios FernÃ¡ndez', '44488795X', '1994-03-26', 'Avenida Vistahermosa 8, 3ÂºA', 988252875, 'ivanddf1994@hotmail.com'),
('../Documents/Deportistas/87654321Q/Foto/s.jpeg', 'deportista1', '5e3ea95c649fe43cbc6e9c1c71071f0f', 3, 'Bruno', 'Romero Rodriguez', '45147231W', '1995-10-10', 'Paseo de la Castellana 22, 1Âº', 988767165, 'brunoromero@gmail.com'),
('../img/user.jpg', 'deportista2', '220a15a78a728aa88fcf45d009705d96', 3, 'Alberto', 'Porral FramiÃ±Ã¡n', '54064900L', '1992-09-17', 'Manuel Antonio Puga 54, 2ÂºA', 678987432, 'albertoporral@hotmail.com'),
('../Documents/Deportistas/45147607X/Foto/FOTO_CARNET.png', 'deportista3', '1dcbb1e46c4c3e87b42c4a4128f9b6cd', 3, 'Rafa', 'VÃ¡zquez VÃ¡zquez', '45147607X', '1982-05-10', 'Ervedelo 36, 1Âº', 617890654, 'rafarafita@hotmail.com'),
('../Documents/Deportistas/45145143F/Foto/Harish_bhadana.jpg', 'deportista4', 'adee36ea3dc20ed625d1e1e091247c89', 3, 'Miguel', 'Gallego Mayor', '45145143F', '1989-07-14', 'Concordia 135, 4ÂºC', 654789654, 'miguelgallego@hotmail.com'),
('../img/user.jpg', 'entrenador', 'a990ba8861d2b344810851e7e6b49104', 2, 'Ismael', 'VÃ¡zquez FernÃ¡ndez', '45143252W', '1995-10-01', 'Avenida de la Albufera 6, 2Âº', 988767521, 'ismaelvazquez@hotmail.com'),
('../Documents/Entrenadores/45145326Y/Foto/section-premium-3.png', 'entrenador2', '0aed0af4f39be2e7834c46ee778851f5', 2, 'Pedro', 'MartÃ­nez PadrÃ³n', '45145326Y', '1994-06-14', 'C/ Rampa de SÃ¡s 165, 2ÂºF', 678906554, 'pedrofittness@gmail.com'),
('../Documents/Entrenadores/45161706X/Foto/TWpIdSbcdJe2GiKt8e5p_rafael-perez-carretero.jpg', 'entrenador3', '5e82bb13949e857dd51b7edc40507c3f', 2, 'Manuel', 'FernÃ¡ndez Inaraja', '45161706X', '1999-05-17', 'Plaza Los Suaves 56, 6Âº A', 643445021, 'manuelgym@gmail.com');

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
('deportista2', 3),
('deportista3', 3),
('deportista4', 3),
('entrenador', 2),
('entrenador2', 2),
('entrenador3', 2);

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
  ADD PRIMARY KEY (`userName`);

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
-- Indices de la tabla `deportista_inscribir_actividadindividual`
--
ALTER TABLE `deportista_inscribir_actividadindividual`
  ADD PRIMARY KEY (`userName`,`idActividadIndividual`),
  ADD KEY `idActividadIndividual` (`idActividadIndividual`);

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
  ADD PRIMARY KEY (`idTabla`);

--
-- Indices de la tabla `tabla_con_ejercicio`
--
ALTER TABLE `tabla_con_ejercicio`
  ADD PRIMARY KEY (`idTabla`,`idEjercicio`),
  ADD KEY `idTabla` (`idTabla`),
  ADD KEY `idEjercicio` (`idEjercicio`);

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
  MODIFY `idActividadGrupal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `actividadindividual`
--
ALTER TABLE `actividadindividual`
  MODIFY `idActividadIndividual` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `funcionalidad`
--
ALTER TABLE `funcionalidad`
  MODIFY `idFuncionalidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;
--
-- AUTO_INCREMENT de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `idInstalacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idSesion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tabla`
--
ALTER TABLE `tabla`
  MODIFY `idTabla` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `deportista_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`);

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
-- Filtros para la tabla `deportista_inscribir_actividadindividual`
--
ALTER TABLE `deportista_inscribir_actividadindividual`
  ADD CONSTRAINT `deportista_inscribir_actividadindividual_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `deportista` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deportista_inscribir_actividadindividual_ibfk_2` FOREIGN KEY (`idActividadIndividual`) REFERENCES `actividadindividual` (`idActividadIndividual`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `tabla_con_ejercicio`
--
ALTER TABLE `tabla_con_ejercicio`
  ADD CONSTRAINT `tabla_con_ejercicio_ibfk_1` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabla_con_ejercicio_ibfk_2` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE ON UPDATE CASCADE;

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
