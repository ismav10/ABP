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

CREATE TABLE IF NOT EXISTS `actividadgrupal` (
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
(5, 'Spinning A', 'Ejercicio cardiovascular sobre bici que recrea un circuito de montaÃ±a, de intensidad media-alta, al ritmo de la mÃºsica. Se caracteriza por su alto consumo calÃ³rico', 20, 'Lunes', '16:00:00', '18:00:00', '2018-01-15', '2018-02-15', 'entrenador2', 8),
(6, 'Spinning B', 'Ejercicio cardiovascular sobre bici que recrea un circuito de montaÃ±a, de intensidad media-alta, al ritmo de la mÃºsica. Se caracteriza por su alto consumo calÃ³rico', 20, 'MiÃ©rcoles', '16:00:00', '18:00:00', '2018-01-15', '2018-02-15', 'entrenador2', 8),
(7, 'Spinning C', 'Ejercicio cardiovascular sobre bici que recrea un circuito de montaÃ±a, de intensidad media-alta, al ritmo de la mÃºsica. Se caracteriza por su alto consumo calÃ³rico', 20, 'Viernes', '16:00:00', '18:00:00', '2018-01-15', '2018-02-15', 'entrenador2', 8),
(8, 'Boxeo A', 'Deporte en que dos adversarios luchan con los puÃ±os enfundados en guantes especiales, para golpear al contrario por encima de la cintura.', 8, 'Martes', '19:30:00', '21:00:00', '2018-01-01', '2018-02-01', 'entrenador2', 10),
(9, 'Boxeo B', 'Deporte en que dos adversarios luchan con los puÃ±os enfundados en guantes especiales, para golpear al contrario por encima de la cintura.', 8, 'Jueves', '19:30:00', '21:00:00', '2018-01-01', '2018-02-01', 'entrenador2', 10),
(10, 'Body Pumb A', 'Programa de entrenamiento Les Mills con barras y discos que fortalece, tonifica y define la musculatura de todo el cuerpo', 10, 'Martes', '19:30:00', '21:00:00', '2018-01-10', '2018-02-10', 'entrenador3', 2),
(11, 'Body Pumb B', 'Programa de entrenamiento Les Mills con barras y discos que fortalece, tonifica y define la musculatura de todo el cuerpo', 10, 'MiÃ©rcoles', '19:30:00', '21:00:00', '2018-01-10', '2018-02-10', 'entrenador3', 2),
(12, 'Body Pumb C', 'Programa de entrenamiento Les Mills con barras y discos que fortalece, tonifica y define la musculatura de todo el cuerpo', 10, 'Jueves', '19:30:00', '21:00:00', '2018-01-10', '2018-02-10', 'entrenador3', 2),
(13, 'Crossfit A', 'Actividad destinada a  los amantes del ejercicio fÃ­sico extremo.', 12, 'Martes', '16:00:00', '18:00:00', '2018-02-01', '2018-03-01', 'entrenador3', 4),
(14, 'Crossfit B', 'Actividad destinada a  los amantes del ejercicio fÃ­sico extremo.', 12, 'MiÃ©rcoles', '16:00:00', '18:00:00', '2018-02-01', '2018-03-01', 'entrenador3', 4),
(15, 'Crossfit C', 'Actividad destinada a  los amantes del ejercicio fÃ­sico extremo.', 12, 'Jueves', '16:00:00', '18:00:00', '2018-02-01', '2018-03-01', 'entrenador3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadindividual`
--

CREATE TABLE IF NOT EXISTS `actividadindividual` (
  `idActividadIndividual` int(10) NOT NULL,
  `nombreActividadIndividual` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionActividadIndividual` text COLLATE utf8_spanish_ci,
  `idInstalacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividadindividual`
--

INSERT INTO `actividadindividual` (`idActividadIndividual`, `nombreActividadIndividual`, `descripcionActividadIndividual`, `idInstalacion`) VALUES
(1, 'Fittness', 'RealizaciÃ³n de diferentes ejercicios fÃ­sicos en una sala acondicionada para ello', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE IF NOT EXISTS `deportista` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDeportista` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `metodoPago` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`userName`, `tipoDeportista`, `metodoPago`) VALUES
('deportista1', 'PEF', '1234567898765432'),
('deportista10', 'PEF', '3344556677881234'),
('deportista2', 'TDU', '5406282043000000'),
('deportista3', 'PEF', '5489067823456543'),
('deportista4', 'TDU', '5467876523459876'),
('deportista5', 'PEF', '9876435617825462'),
('deportista6', 'PEF', '7654829106675286'),
('deportista7', 'TDU', '6547281928365478'),
('deportista8', 'PEF', '1234567893018274'),
('deportista9', 'TDU', '4567876548987216');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_asignar_tabla`
--

CREATE TABLE IF NOT EXISTS `deportista_asignar_tabla` (
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
-- Estructura de tabla para la tabla `deportista_inscribir_actividadgrupal`
--

CREATE TABLE IF NOT EXISTS `deportista_inscribir_actividadgrupal` (
  `userName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idActividadGrupal` int(10) NOT NULL,
  `estado` tinyint(1) DEFAULT '0',
  `plazasDisponibles` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista_inscribir_actividadgrupal`
--

INSERT INTO `deportista_inscribir_actividadgrupal` (`userName`, `idActividadGrupal`, `estado`, `plazasDisponibles`) VALUES
('deportista1', 1, 1, 21),
('deportista1', 4, 1, 16),
('deportista1', 5, 1, 16),
('deportista1', 8, 1, 0),
('deportista1', 12, 0, 8),
('deportista1', 14, 1, 9),
('deportista1', 15, 0, 10),
('deportista10', 1, 1, 21),
('deportista10', 2, 1, 21),
('deportista10', 3, 1, 21),
('deportista10', 4, 1, 16),
('deportista10', 5, 1, 16),
('deportista10', 6, 1, 16),
('deportista10', 7, 1, 17),
('deportista10', 9, 1, 5),
('deportista10', 13, 0, 9),
('deportista10', 14, 0, 9),
('deportista10', 15, 0, 10),
('deportista2', 2, 1, 21),
('deportista2', 3, 1, 21),
('deportista2', 6, 1, 19),
('deportista2', 7, 1, 17),
('deportista2', 8, 1, 0),
('deportista2', 10, 1, 5),
('deportista2', 11, 1, 5),
('deportista2', 13, 0, 9),
('deportista3', 8, 1, 0),
('deportista3', 9, 1, 5),
('deportista3', 10, 0, 5),
('deportista3', 13, 1, 9),
('deportista3', 14, 1, 9),
('deportista3', 15, 1, 10),
('deportista4', 1, 1, 21),
('deportista4', 4, 1, 16),
('deportista4', 6, 1, 18),
('deportista4', 7, 1, 17),
('deportista4', 8, 1, 0),
('deportista5', 1, 0, 21),
('deportista5', 4, 0, 16),
('deportista5', 8, 1, 0),
('deportista5', 10, 1, 5),
('deportista5', 11, 1, 5),
('deportista5', 13, 1, 9),
('deportista6', 2, 1, 21),
('deportista6', 3, 1, 21),
('deportista6', 8, 1, 0),
('deportista6', 9, 1, 5),
('deportista6', 10, 1, 5),
('deportista6', 11, 1, 5),
('deportista6', 12, 1, 8),
('deportista7', 1, 1, 21),
('deportista7', 2, 1, 21),
('deportista7', 3, 1, 21),
('deportista7', 4, 1, 16),
('deportista7', 5, 1, 16),
('deportista7', 6, 1, 17),
('deportista7', 7, 1, 17),
('deportista7', 8, 1, 0),
('deportista7', 9, 1, 5),
('deportista7', 13, 0, 9),
('deportista7', 14, 0, 9),
('deportista7', 15, 0, 10),
('deportista8', 5, 1, 16),
('deportista8', 8, 1, 0),
('deportista8', 9, 1, 5),
('deportista8', 10, 1, 5),
('deportista8', 11, 1, 5),
('deportista8', 14, 0, 9),
('deportista8', 15, 0, 10),
('deportista9', 5, 0, 16),
('deportista9', 6, 0, 16),
('deportista9', 7, 0, 17),
('deportista9', 13, 1, 9),
('deportista9', 14, 1, 9),
('deportista9', 15, 1, 10);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_inscribir_actividadindividual`
--

CREATE TABLE IF NOT EXISTS `deportista_inscribir_actividadindividual` (
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
('deportista4', 1),
('deportista5', 1),
('deportista6', 1),
('deportista7', 1),
('deportista8', 1),
('deportista9', 1),
('deportista10', 1);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicio` (
  `idEjercicio` int(10) NOT NULL,
  `nombreEjercicio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionEjercicio` text COLLATE utf8_spanish_ci NOT NULL,
  `giftEjercicio` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombreEjercicio`, `descripcionEjercicio`, `giftEjercicio`) VALUES
(1, 'Cinta de Correr', 'Trotar de menos a mÃ¡s', 'http://bicicletaeliptica.org/wp-content/uploads/2016/05/chica-corriendo-en-cinta-de-correr.jpg'),
(2, 'Bicicleta EstÃ¡tica', 'Andar en la bicleta estÃ¡tica de menos a mÃ¡s.','https://images-na.ssl-images-amazon.com/images/I/71R2L1-eeOL._SL1500.jpg'),
(3, 'Bicicleta ElÃ­ptica', 'Andar en la bicleta elÃ­ptica de menos a mÃ¡s.', 'https://www.decathlon.es/media/835/8358831/big_d3737dee-2c16-47ef-9d5c-9def26d4ec40.jpg'),
(4, 'Prensa de Pecho en Banco', 'RecuÃ©state de espalda sobre un banco y sujeta 2 mancuernas al nivel del pecho, a los lados del cuerpo, con las palmas apuntando hacia tus pies.\n\nEleva las mancuernas  rectas hacia arriba hasta que tus codos se encuentren cerca de trabarse y bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/1.gif'),
(5, 'Prensa de Pecho en Banco (EmpuÃ±adura Neutral)', 'RecuÃ©state de espalda sobre un banco y sujeta 2 mancuernas al nivel del pecho, con las palmas apuntando una hacia otra.\n\nEleva las mancuernas en forma recta hacia arriba hasta que tus codos se encuentren cerca de trabarse y bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/2.gif'),
(6, 'Prensa de Pecho en Banco - Inclinada', 'RecuÃ©state de espalda sobre un banco inclinado y sujeta 2 mancuernas al nivel del pecho, con las palmas apuntando hacia adelante.\n\nEleva las mancuernas en forma recta hacia arriba hasta que tus codos se encuentren cerca de trabarse y bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/3.gif'),
(7, 'Prensa de Pecho en Banco - Declinada', 'RecuÃ©state de espalda sobre un banco declinado y sujeta 2 mancuernas al nivel del pecho, con las palmas apuntando hacia adelante.\nEleva las mancuernas en forma recta hacia arriba hasta que tus codos se encuentren cerca de trabarse y bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/5.gif'),
(8, 'Apertura - Inclinada', 'RecuÃ©state de espalda sobre un banco inclinado y coge una mancuerna con cada mano a la altura del cuerpo, con tus codos ligeramente arqueados.\n\nEleva las mancuernas hasta que estÃ©n lado a lado por encima de tu cuerpo y luego de una breve pausa bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/7.gif'),
(9, 'Pullover - Brazos Rectos', 'RecuÃ©state de espalda sobre uno de los extremos del banco y sujeta una mancuerna con ambas manos, con los brazos extendidos.\n\nEleva la mancuerna hacia arriba recta, hasta que tus brazos estÃ©n perpendiculares al suelo y bÃ¡jala.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/8.gif'),
(10, 'Pullover - Brazos Flexionados', 'RecuÃ©state de espalda sobre uno de los extremos del banco y sujeta 2 mancuernas por debajo tu cabeza, con los codos formando un Ã¡ngulo de 90 grados.\n\nEleva ambas mancuernas hasta que estÃ©n prÃ³ximas a tu pecho, y luego bÃ¡jalas', 'http://www.ejercicios-con-mancuernas.com/ejercicios/pecho/images/9.gif'),
(11, 'Prensa de Hombros', 'Ponte de pie y sujeta dos mancuernas cerca de tus hombros, con las palmas apuntando hacia adelante.\n\nEmpuja las mancuernas en forma recta hacia arriba, hasta que tus codos estÃ©n cerca de trabarse y bÃ¡jalas luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/5.gif'),
(12, 'Vuelos Laterales', 'Ponte de pie y sujeta una mancuerna con cada mano frente a tus caderas, con las palmas apuntando una hacia otra.\n\nEleva las mancuernas hacia los costados, hasta que tus brazos estÃ©n cerca de quedar paralelos al suelo y bÃ¡jalas luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/8.gif'),
(13, 'Remo Vertical', 'Ponte de pie y sujeta una mancuerna en cada mano enfrente de tus muslos.\n\nLevanta ambas mancuernas hasta que tus brazos estÃ©n casi paralelos al suelo y bÃ¡jalas lentamente luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/15.gif'),
(14, 'Vuelos Frontales', 'Ponte de pie y sujeta una mancuerna con cada mano frente a tus muslos, con las palmas apuntando hacia tu cuerpo.\n\nEleva las mancuernas hacia adelante hasta que tus brazos estÃ©n casi paralelos al suelo, y bÃ¡jalas luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/16.gif'),
(15, 'Prensa Superior', 'Ponte de pie y sujeta dos mancuernas justo por encima de tus hombros, con las palmas apuntando una hacia otra, y las rodillas arqueadas.\n\nEmpuja las mancuernas en forma recta hacia arriba hasta que tus brazos estÃ©n cerca de trabarse y bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/18.gif'),
(16, 'Encogimiento de Hombros', 'Ponte de pie y sujeta una mancuerna con cada mano frente a tus muslos, con las palmas apuntando hacia tu cuerpo.\n\nEleva las mancuernas en forma recta hacia arriba encogiendo tus hombros y bÃ¡jalas luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/hombros/images/17.gif'),
(17, 'Flexiones de BÃ­ceps', 'Ponte de pie y sujeta una mancuerna con cada mano, a los costados de tu cuerpo, con las palmas apuntando una hacia otra.\n\nEleva ambas mancuernas hasta que alcancen la altura de tus hombros y bÃ¡jalas lentamente hacia atrÃ¡s luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/4.gif'),
(18, 'Flexiones Martillo', 'Coge una mancuerna con cada mano, hacia los costados de tu cuerpo, con las palmas apuntando hacia tu cuerpo.\n\nEleva ambas mancuernas mediante la flexiÃ³n de tus codos y bÃ¡jalas luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/5.gif'),
(19, 'Flexiones de BÃ­ceps Inclinado', 'SiÃ©ntate sobre un banco inclinado y sujeta una mancuerna con cada mano, con las palmas de tu mano apuntando una hacia otra.\n\nEleva ambas mancuernas hasta que alcancen la altura de tus hombros y luego de una breve pausa, bÃ¡jalas lentamente.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/9.gif'),
(20, 'Flexiones de BÃ­ceps Supinadoras', 'RecuÃ©state de espalda sobre un banco y sujeta una mancuerna con cada mano hacia cada lado de tu cuerpo, por debajo de la altura del cuerpo, con las palmas apuntando hacia arriba.\n\nEleva las mancuernas hasta que alcancen la altura de tu cuerpo y lentamente bÃ¡jalas luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/biceps/images/18.gif'),
(21, 'Apertura de Espalda', 'RecuÃ©state sobre tu pecho en el banco y coge dos mancuernas con tus manos, con los codos formando Ã¡ngulos de 90 grados.\n\nEleva las mancuernas hasta que tus brazos estÃ©n paralelos al suelo y bÃ¡jalas nuevamente luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/9.gif'),
(22, 'Peso Muerto', 'Ponte de pie y sujeta una mancuerna con cada una de tus manos.\n\nFlexiona tus rodillas y caderas de manera de bajar las mancuernas hacia abajo en forma recta, y elÃ©vate a ti mismo luego de una breve pausa', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/5.gif'),
(23, 'Remo Arrodillado - A Un Brazo', 'ColÃ³cate en posiciÃ³n inclinada hacia adelante enfrente de un banco, mientras sostienes una mancuerna con una mano (con el brazo extendido).\n\nEleva la mancuerna sin mover otra cosa que tu brazo y bÃ¡jala luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/4.gif'),
(24, 'Flexiones al Pie Opuesto', 'Ponte de pie y estÃ­rate hacia abajo de modo de tomar dos mancuernas con ambas manos (las rodillas ligeramente flexionadas).\n\nEleva la mancuerna hacia arriba hasta que estÃ©s parado y bÃ¡jala luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/espalda/images/6.gif'),
(25, 'Sentadillas', 'Ponte de pie y sujeta una mancuerna en cada mano a los costados de tu cuerpo, con las palmas apuntando hacia tu cuerpo.\n\nBaja tu cuerpo flexionando tus rodillas hasta que formen un Ã¡ngulo de 90 grados, y elÃ©vate a ti mismo hacia arriba luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/2.gif'),
(26, 'Estocadas EstÃ¡ticas', 'Ponte de pie con un pie al frente, el otro atrÃ¡s y sujeta una mancuerna en cada mano a los costados de tu cuerpo, con las palmas apuntando una hacia la otra.\n\nBÃ¡jate a ti mismo sin mover tus pies hasta que tus rodillas forme un Ã¡ngulo de 90 grados y luego de una breve pausa elÃ©vate a ti mismo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/3.gif'),
(27, 'ElevaciÃ³n de Punta del Pie - A Una Pierna', 'PÃ¡rate en un pie sobre un pequeÃ±o escalÃ³n y sujeta una mancuerna con una mano contra el costado de tu cuerpo.\n\nElÃ©vate a ti mismo parÃ¡ndote sobre los dedos de tu pie y lentamente bÃ¡jate luego de una breve pausa. Luego de terminada la serie, cambia de pie.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/8.gif'),
(28, 'Peso Muerto - Piernas Rectas', 'Ponte de pie y sujeta una mancuerna en cada mano contra los costados de tu cuerpo, con las palmas apuntando una hacia la otra.\n\nBaja las mancuernas mediante la flexiÃ³n de tus caderas hacia adelante y elÃ©vate nuevamente hacia arriba luego de una breve pausa.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/piernas/images/6.gif'),
(29, 'Encogimientos - Con Carga', 'RecuÃ©state de espalda sobre un banco y sujeta una mancuerna por encima de tu pecho.\n\nEleva la parte superior de tu cuerpo hasta que tus omÃ³platos dejen de tocar el banco y luego de una breve pausa vuelve a bajarlo.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/abdominales/images/1.gif'),
(30, 'Elevaciones de Piernas - Con Carga', 'RecuÃ©state de espalda sobre el banco, con tus manos agarrando los costados del mismo y sujeta una mancuerna entre tus pies.\n\nEleva tus piernas hacia arriba hasta que estÃ©n perpendiculares al suelo, y luego de una breve pausa bÃ¡jalas.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/abdominales/images/2.gif'),
(31, 'Flexiones Laterales con Mancuernas', 'Sujeta una mancuerna con una mano, al costado de tu cuerpo.\n\nInclina la parte superior de tu cuerpo hacia el costado en el que sostienes la mancuerna, y luego de una breve pausa, vuelve a la posiciÃ³n inicial. Completa tu serie y cambia de lado.', 'http://www.ejercicios-con-mancuernas.com/ejercicios/abdominales/images/3.gif'),
(32, 'Navajas con Pelota', 'Coloca tus tobillos por encima de la pelota de ejercitaciÃ³n, las piernas extendidas, el pecho apuntando hacia el suelo y extiende tus brazos para levantarte del suelo.\n\nSosteniendo tu peso sobre tus brazos extendidos, rueda la pelota flexionando tus rodillas y caderas, y extiende nuevamente tus piernas luego de una breve pausa.', 'http://www.ejercicios-con-pelotas.com/ejercicios/abdominales/images/ball-jacknife.gif'),
(33, 'Plancha sobre Pelota', 'Ponte de rodillas, coloca tus antebrazos por encima de la pelota de ejercitaciÃ³n frente a ti, los codos con un Ã¡ngulo de 90 grados y la espalda recta.\n\nEleva tus rodillas del suelo rodando hacia adelante sobre la pelota, hasta que tus piernas se encuentren completamente extendidas, y retorna a la posiciÃ³n inicial luego de una breve pausa.', 'http://www.ejercicios-con-pelotas.com/ejercicios/abdominales/images/ball-table-top.gif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE IF NOT EXISTS `entrenador` (
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

CREATE TABLE IF NOT EXISTS `funcionalidad` (
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
(20, 'Ver Actividades de un Entrenador', 'Gestion Entrenadores'),
(21, 'Ver deportistas de una Actividad', 'Gestion Entrenadores'),
(22, 'Estadisticas Sistema', 'Gestion Usuarios'),
(23, 'Deportistas de Actividad Grupal', 'Gestion Actividad Grupal'),
(24, 'Estadisticas Deportista', 'Gestion Estadisticas'),
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
(201, 'Consultar Notificacion', 'Gestion Notificaciones'),
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
(455, 'Ver Actividad Individual', 'Gestion Actividad Individual'),
(600, 'Insertar Instalacion', 'Gestion Instalacion'),
(601, 'Borrar Instalacion', 'Gestion Instalacion'),
(602, 'Modificar Instalacion', 'Gestion Instalacion'),
(603, 'Consultar Instalaciones', 'Gestion Instalacion'),
(604, 'Listar Instalaciones', 'Gestion Instalacion'),
(605, 'Ver Instalacion', 'Gestion Instalacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad_pagina`
--

CREATE TABLE IF NOT EXISTS `funcionalidad_pagina` (
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
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
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
(455, 455),
(600, 600),
(601, 601),
(602, 602),
(603, 603),
(604, 604),
(605, 605);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad_rol`
--

CREATE TABLE IF NOT EXISTS `funcionalidad_rol` (
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
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(24, 3),
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
(201, 2),
(202, 2),
(201, 3),
(202, 3),
(203, 1),
(203, 2),
(204, 1),
(204, 2),
(204, 3),
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
(455, 3),
(600, 1),
(601, 1),
(602, 1),
(603, 1),
(603, 2),
(603, 3),
(604, 1),
(604, 2),
(604, 3),
(605, 1),
(605, 2),
(605, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

CREATE TABLE IF NOT EXISTS `instalacion` (
  `idInstalacion` int(10) NOT NULL,
  `nombreInstalacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionInstalacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aforoInstalacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instalacion`
--

INSERT INTO `instalacion` (`idInstalacion`, `nombreInstalacion`, `descripcionInstalacion`, `aforoInstalacion`) VALUES
(1, 'Sala Multiusos A', 'Sala preparada para cualquier evento que no requiera instrumental', 50),
(2, 'Sala Multiusos B', 'Sala preparada para cualquier evento que no requiera instrumental', 50),
(3, 'Sala Zumba', 'Sala de bailes', 20),
(4, 'Sala MusculaciÃ³n', 'Sala acondicionada con mÃ¡quinas para el ejercicio fÃ­sico', 30),
(5, 'Pista Principal', 'Campo cubierto con cancha de fÃºtbol sala, baloncesto, voley y tenis.', 40),
(6, 'Pista Secundaria', 'Campo descubierto con cancha de fÃºtbol sala, tenis y voley.', 40),
(7, 'Sala de MÃ¡quinas', 'Sala acondicionada con mÃ¡quinas para el ejercicio fÃ­sico', 40),
(8, 'Sala de Spinning', 'Sala acondicionada con biciletas estÃ¡ticas', 20),
(9, 'Sala de TRX', 'Sala acondicionada para la prÃ¡ctica del TRX', 20),
(10, 'Sala de Boxeo', 'Sala acondicionada con un ring y sacos de boxeo', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `estado` tinyint(1) DEFAULT '0',
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

INSERT INTO `notificacion` (`estado`, `idNotificacion`, `remitenteNotificacion`, `destinatarioNotificacion`, `fechaHoraNotificacion`, `asuntoNotificacion`, `mensajeNotificacion`, `username`) VALUES
(1, 1, 'administracion@muevet.com', 'brunoromero@gmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 2, 'administracion@muevet.com', 'hectorvikingo@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 3, 'administracion@muevet.com', 'rafarafita@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 4, 'administracion@muevet.com', 'miguelgallego@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 5, 'administracion@muevet.com', 'juliomorenza@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 6, 'administracion@muevet.com', 'galegonotas@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 7, 'administracion@muevet.com', 'elgrangarbo@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 8, 'administracion@muevet.com', 'rubenvega@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 9, 'administracion@muevet.com', 'jandrogonzaleez@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 10, 'administracion@muevet.com', 'ismaelvazquez@hotmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 11, 'administracion@muevet.com', 'pedrofittness@gmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 12, 'administracion@muevet.com', 'manuelgym@gmail.com', '2018-01-07 11:05:15', 'Bienvenido a MueveT', 'El equipo de MueveT le da la bienvenida y comunica que se ponga en contacto con nosotros ante cualquier problema.\n\n\nEquipo de MueveT', 'admin'),
(1, 13, 'administracion@muevet.com', 'brunoromero@gmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 14, 'administracion@muevet.com', 'hectorvikingo@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 15, 'administracion@muevet.com', 'rafarafita@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 16, 'administracion@muevet.com', 'miguelgallego@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 17, 'administracion@muevet.com', 'juliomorenza@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 18, 'administracion@muevet.com', 'galegonotas@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 19, 'administracion@muevet.com', 'elgrangarbo@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 20, 'administracion@muevet.com', 'rubenvega@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 21, 'administracion@muevet.com', 'jandrogonzaleez@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 22, 'administracion@muevet.com', 'ismaelvazquez@hotmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 23, 'administracion@muevet.com', 'pedrofittness@gmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 24, 'administracion@muevet.com', 'manuelgym@gmail.com', '2018-01-08 06:15:15', 'Se ha actualizado el catÃ¡logo de Actividades', 'Hemos actualizado el catÃ¡logo de activdades que ofertamos, Ã©chale un ojo y solicita tu inscripciÃ³n rÃ¡pido que vuelan!\n\n\nEquipo de MueveT', 'admin'),
(1, 25, 'ismaelvazquez@hotmail.com', 'brunoromero@gmail.com', '2018-01-08 06:15:15', 'Empiezan las clases', 'Os informo de que proximamente empezaremos las clases en el gimnasio', 'entrenador'),
(1, 26, 'ismaelvazquez@hotmail.com', 'hectorvikingo@gmail.com', '2018-01-08 06:15:15', 'Empiezan las clases', 'Os informo de que proximamente empezaremos las clases en el gimnasio', 'entrenador'),
(1, 27, 'ismaelvazquez@hotmail.com', 'juliomorenza@gmail.com', '2018-01-08 06:15:15', 'Empiezan las clases', 'Os informo de que proximamente empezaremos las clases en el gimnasio', 'entrenador'),
(1, 28, 'ismaelvazquez@hotmail.com', 'elgrangarbo@gmail.com', '2018-01-08 06:15:15', 'Empiezan las clases', 'Os informo de que proximamente empezaremos las clases en el gimnasio', 'entrenador');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
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
(20, '../Views/ENTRENADOR_SHOW_ACTIVIDADES_Vista.php', 'ENTRENADOR SHOW ACTIVIDADES'),
(21, '../Views/DEPORTISTAS_ACTIVIDAD_Vista.php', 'ENTRENADOR SHOW ACTIVIDADES DEPORTISTAS'),
(22, '../Views/ESTADISTICAS_ADMIN_Vista.php', 'ADMINISTADOR ESTADISTICAS'),
(23, '../Views/ACTIVIDAD_GRUPAL_LISTAR_USERS_Vista.php', 'DEPORTISTAS ACTIVIDAD GRUPAL'),
(24, '../Views/ESTADISTICAS_SHOWALL.php', 'ESTADISTICAS DEPORTISTA'),
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
(201, '../Views/NOTIFICACION_SHOW_Vista.php', 'NOTIFICACION SHOW'),
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
(455, '../Views/ACTIVIDAD_INDIVIDUAL_SHOW_Vista.php', 'ACTIVIDAD INDIVIDUAL SHOW'),
(600, '../Views/INSTALACION_ADD_Vista.php', 'INSTALACION ADD'),
(601, '../Views/INSTALACION_DELETE_Vista.php', 'INSTALACION DELETE'),
(602, '../Views/INSTALACION_EDIT_Vista.php', 'INSTALACION EDIT'),
(603, '../Views/INSTALACION_SHOWCURRENT_Vista.php', 'INSTALACION SHOWCURRENT'),
(604, '../Views/INSTALACION_SHOWALL_Vista.php', 'INSTALACION SHOWALL'),
(605, '../Views/INSTALACION_SHOW_Vista.php', 'INSTALACION SHOW');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
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

CREATE TABLE IF NOT EXISTS `sesion` (
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
(2, 'deportista1', 2, '2017-12-25', '18:25', '19:10', 'Uff', 1),
(3, 'deportista1', 2, '2017-12-26', '18:25', '19:10', 'Ha estado bien', 1),
(4, 'deportista1', 2, '2017-12-27', '18:25', '19:10', 'Podría haber sido mejor', 1),
(5, 'deportista1', 2, '2017-12-28', '18:25', '19:10', 'Tengo agujetas del otro dia', 1),
(6, 'deportista1', 2, '2017-12-29', '18:25', '19:10', 'Uff', 1),
(7, 'deportista1', 2, '2017-12-30', '18:25', '19:10', 'Uff', 1),
(8, 'deportista1', 2, '2017-12-2', '18:25', '19:10', 'Uff', 1),
(9, 'deportista1', 2, '2017-12-3', '18:25', '19:10', 'Uff', 1),
(10, 'deportista1', 2, '2017-12-24', '18:25', '19:10', 'Uff', 1),
(11, 'deportista1', 2, '2017-12-5', '18:25', '19:10', 'Uff', 1),
(12, 'deportista1', 2, '2017-12-23', '18:25', '19:10', 'Uff', 1),
(13, 'deportista1', 2, '2017-12-22', '18:25', '19:10', 'Uff', 1),
(14, 'deportista1', 2, '2017-12-21', '18:25', '19:10', 'Uff', 1),
(15, 'deportista1', 2, '2017-12-20', '18:25', '19:10', 'Uff', 1),
(16, 'deportista1', 2, '2017-12-19', '18:25', '19:10', 'Uff', 1),
(17, 'deportista1', 2, '2017-12-17', '18:25', '19:10', 'Uff', 1),
(18, 'deportista1', 2, '2017-12-16', '18:25', '19:10', 'Uff', 1),
(19, 'deportista1', 2, '2017-12-15', '18:25', '19:10', 'Uff', 1),
(20, 'deportista2', 3, '2017-12-18', '18:00', '18:45', 'Okey', 1),
(21, 'deportista2', 2, '2017-12-25', '18:25', '19:10', 'Uff', 1),
(22, 'deportista2', 2, '2017-12-26', '18:25', '19:10', 'Ha estado bien', 1),
(23, 'deportista2', 2, '2017-12-27', '18:25', '19:10', 'Podría haber sido mejor', 1),
(24, 'deportista2', 2, '2017-12-28', '18:25', '19:10', 'Tengo agujetas del otro dia', 1),
(25, 'deportista2', 2, '2017-12-29', '18:25', '19:10', 'Uff', 1),
(26, 'deportista2', 2, '2017-12-30', '18:25', '19:10', 'Uff', 1),
(27, 'deportista2', 2, '2017-12-2', '18:25', '19:10', 'Uff', 1),
(28, 'deportista2', 2, '2017-12-3', '18:25', '19:10', 'Uff', 1),
(29, 'deportista2', 2, '2017-12-24', '18:25', '19:10', 'Uff', 1),
(30, 'deportista2', 2, '2017-12-5', '18:25', '19:10', 'Uff', 1),
(31, 'deportista2', 2, '2017-12-23', '18:25', '19:10', 'Uff', 1),
(32, 'deportista2', 2, '2017-12-22', '18:25', '19:10', 'Uff', 1),
(33, 'deportista2', 2, '2017-12-21', '18:25', '19:10', 'Uff', 1),
(34, 'deportista2', 2, '2017-12-20', '18:25', '19:10', 'Uff', 1),
(35, 'deportista2', 2, '2017-12-19', '18:25', '19:10', 'Uff', 1),
(36, 'deportista2', 2, '2017-12-17', '18:25', '19:10', 'Uff', 1),
(37, 'deportista2', 2, '2017-12-16', '18:25', '19:10', 'Uff', 1),
(38, 'deportista2', 2, '2017-12-15', '18:25', '19:10', 'Uff', 1),
(39, 'deportista2', 2, '2017-11-12', '18:25', '19:10', 'Uff', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE IF NOT EXISTS `tabla` (
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

CREATE TABLE IF NOT EXISTS `tabla_con_ejercicio` (
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

CREATE TABLE IF NOT EXISTS `usuario` (
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
('../Documents/Administradores/44488795X/Foto/ivan.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'IvÃ¡n', 'de Dios FernÃ¡ndez', '44488795X', '1994-03-26', 'Avenida Vistahermosa 8, 3ÂºA', 988252875, 'administracion@muevet.com'),
('../Documents/Deportistas/87654321Q/Foto/s.jpeg', 'deportista1', '5e3ea95c649fe43cbc6e9c1c71071f0f', 3, 'Bruno', 'Romero Rodriguez', '45147231W', '1995-10-10', 'Paseo de la Castellana 22, 1Âº', 988767165, 'brunoromero@gmail.com'),
('../Documents/Deportistas/44495311V/Foto/deportista10.jpg', 'deportista10', '9dafe1b7ef8477287cc4ff5cf99d1fa1', 3, 'HÃ©ctor', 'Otero RodrÃ­guex', '44495311V', '1990-01-12', 'Plaza de las Mercedes 5, 1Âº', 654879543, 'hectorvikingo@hotmail.com'),
('../img/user.jpg', 'deportista2', '220a15a78a728aa88fcf45d009705d96', 3, 'Alberto', 'Porral FramiÃ±Ã¡n', '54064900L', '1992-09-17', 'Manuel Antonio Puga 54, 2ÂºA', 678987432, 'albertoporral@hotmail.com'),
('../Documents/Deportistas/45147607X/Foto/FOTO_CARNET.png', 'deportista3', '1dcbb1e46c4c3e87b42c4a4128f9b6cd', 3, 'Rafa', 'VÃ¡zquez VÃ¡zquez', '45147607X', '1982-05-10', 'Ervedelo 36, 1Âº', 617890654, 'rafarafita@hotmail.com'),
('../Documents/Deportistas/45145143F/Foto/Harish_bhadana.jpg', 'deportista4', 'adee36ea3dc20ed625d1e1e091247c89', 3, 'Miguel', 'Gallego Mayor', '45145143F', '1989-07-14', 'Concordia 135, 4ÂºC', 654789654, 'miguelgallego@hotmail.com'),
('../Documents/Deportistas/44497084L/Foto/deportista5.jpg', 'deportista5', '468fb3d1ac774e8195d07cf113e15441', 3, 'Julio', 'Morenza FernÃ¡ndez', '44497084L', '1990-05-03', 'Calle de la Rosa 4', 675489076, 'juliomorenza@hotmail.com'),
('../Documents/Deportistas/44662778K/Foto/deportista6.jpg', 'deportista6', 'bffd24877608eaa809ebfea35c6878ec', 3, 'RubÃ©n', 'Conde MartÃ­nez', '44662778K', '1978-06-30', 'Emilia Pardo BazÃ¡n 18, 4Âº F', 654332567, 'galegonotas@hotmail.com'),
('../Documents/Deportistas/44495984T/Foto/deportista7.jpg', 'deportista7', 'c3064e6681be3292425922f8a12f36c7', 3, 'David', 'Garbo DiÃ©guez', '44495984T', '1992-08-01', 'Calle Evedelo 194, 4ÂºA', 677543221, 'elgrangarbo@hotmail.com'),
('../Documents/Deportistas/33559530T/Foto/deportista8.jpg', 'deportista8', '063f4a178fca6a81e89d91a5f49855d5', 3, 'RubÃ©n', 'Vega Lamelas', '33559530T', '1994-09-28', 'Calle Alfonso X 65, 6Âº Izquierda', 654378919, 'rubenvega@hotmail.com'),
('../Documents/Deportistas/44665055K/Foto/deportista9.jpg', 'deportista9', 'bd788fd71d6da1c51fb7372bb5ee9caf', 3, 'Alejandro', 'MartÃ­nez GonzÃ¡lez', '44665055K', '1995-03-23', 'Avenida Vistahermosa 6, 2ÂºC', 654897152, 'jandrogonzaleez@hotmail.com'),
('../img/user.jpg', 'entrenador', 'a990ba8861d2b344810851e7e6b49104', 2, 'Ismael', 'VÃ¡zquez FernÃ¡ndez', '45143252W', '1995-10-01', 'Avenida de la Albufera 6, 2Âº', 988767521, 'ismaelvazquez@hotmail.com'),
('../Documents/Entrenadores/45145326Y/Foto/section-premium-3.png', 'entrenador2', '0aed0af4f39be2e7834c46ee778851f5', 2, 'Pedro', 'MartÃ­nez PadrÃ³n', '45145326Y', '1994-06-14', 'C/ Rampa de SÃ¡s 165, 2ÂºF', 678906554, 'pedrofittness@gmail.com'),
('../Documents/Entrenadores/45161706X/Foto/TWpIdSbcdJe2GiKt8e5p_rafael-perez-carretero.jpg', 'entrenador3', '5e82bb13949e857dd51b7edc40507c3f', 2, 'Manuel', 'FernÃ¡ndez Inaraja', '45161706X', '1999-05-17', 'Plaza Los Suaves 56, 6Âº A', 643445021, 'manuelgym@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `userName` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`userName`, `idRol`) VALUES
('admin', 1),
('deportista1', 3),
('deportista10', 3),
('deportista2', 3),
('deportista3', 3),
('deportista4', 3),
('deportista5', 3),
('deportista6', 3),
('deportista7', 3),
('deportista8', 3),
('deportista9', 3),
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
  ADD PRIMARY KEY (`idActividadIndividual`),
  ADD KEY `idInstalacion`(`idInstalacion`);

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
-- Filtros para la tabla `actividadindividual`
--
ALTER TABLE `actividadindividual`
  ADD CONSTRAINT `actividadindividual_ibfk_2` FOREIGN KEY (`idInstalacion`) REFERENCES `instalacion` (`idInstalacion`) ON DELETE CASCADE ON UPDATE CASCADE;

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
