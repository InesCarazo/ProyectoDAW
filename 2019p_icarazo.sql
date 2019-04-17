-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2019 a las 13:12:17
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `2019p_icarazo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencia`
--

CREATE TABLE IF NOT EXISTS `ausencia` (
  `P_ausencia` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`P_ausencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ausencia`
--

INSERT INTO `ausencia` (`P_ausencia`, `tipo`) VALUES
(1, 'Médico'),
(2, 'Urgencia'),
(3, 'Descanso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencia_empleado`
--

CREATE TABLE IF NOT EXISTS `ausencia_empleado` (
  `P_ausenciaEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `A_empleado` int(11) DEFAULT NULL,
  `A_ausencia` int(11) DEFAULT NULL,
  `justificada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`P_ausenciaEmpleado`),
  KEY `A_empleado` (`A_empleado`),
  KEY `A_ausencia` (`A_ausencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ausencia_empleado`
--

INSERT INTO `ausencia_empleado` (`P_ausenciaEmpleado`, `A_empleado`, `A_ausencia`, `justificada`) VALUES
(1, 1, 2, 1),
(3, 2, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beacon`
--

CREATE TABLE IF NOT EXISTS `beacon` (
  `P_beacon` int(11) NOT NULL AUTO_INCREMENT,
  `A_sala` int(11) DEFAULT NULL,
  `UUID` varchar(40) NOT NULL,
  `major` int(10) NOT NULL,
  `minor` int(10) NOT NULL,
  PRIMARY KEY (`P_beacon`),
  KEY `A_sala` (`A_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `beacon`
--

INSERT INTO `beacon` (`P_beacon`, `A_sala`, `UUID`, `major`, `minor`) VALUES
(1, 1, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 100, 100),
(2, 2, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 29158, 64580),
(3, 3, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 53583, 12200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE IF NOT EXISTS `casa` (
  `P_casa` int(11) NOT NULL AUTO_INCREMENT,
  `sice` int(4) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `hasFurniture` tinyint(4) NOT NULL,
  `A_cliente` int(11) NOT NULL,
  PRIMARY KEY (`P_casa`),
  KEY `A_cliente` (`A_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`P_casa`, `sice`, `direccion`, `hasFurniture`, `A_cliente`) VALUES
(1, 0, '', 1, 1),
(2, 0, '', 0, 2),
(3, 0, '', 1, 3),
(4, 0, '', 0, 4),
(5, 0, '', 1, 4),
(7, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `P_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` int(10) NOT NULL,
  `formaPago` varchar(20) NOT NULL,
  `nCuenta` varchar(50) NOT NULL,
  `A_usuario` int(11) NOT NULL,
  PRIMARY KEY (`P_cliente`),
  KEY `A_usuario` (`A_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`P_cliente`, `telefono`, `formaPago`, `nCuenta`, `A_usuario`) VALUES
(1, 653245865, 'TARJETA', '', 1),
(2, 658742136, 'BANCO', '', 2),
(3, 658974216, 'TARJETA', '', 3),
(4, 655224494, 'BANCO', '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `P_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nSS` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL,
  `A_usuario` int(11) NOT NULL,
  PRIMARY KEY (`P_empleado`),
  KEY `P_Usuario` (`A_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`P_empleado`, `nSS`, `telefono`, `isAdmin`, `A_usuario`) VALUES
(1, '', '', 0, 5),
(2, '', '', 0, 6),
(3, '', '', 0, 7),
(4, '', '', 0, 8),
(5, '', '', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_cliente_tarea`
--

CREATE TABLE IF NOT EXISTS `empleado_cliente_tarea` (
  `P_empleadoSalaTarea` int(11) NOT NULL AUTO_INCREMENT,
  `A_empleado` int(11) DEFAULT NULL,
  `A_cliente` int(11) DEFAULT NULL,
  `A_tarea` int(11) DEFAULT NULL,
  `A_realizada` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `duracion_h` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_empleadoSalaTarea`),
  KEY `A_empleado` (`A_empleado`),
  KEY `A_sala` (`A_cliente`),
  KEY `A_tarea` (`A_tarea`),
  KEY `A_realizada` (`A_realizada`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `empleado_cliente_tarea`
--

INSERT INTO `empleado_cliente_tarea` (`P_empleadoSalaTarea`, `A_empleado`, `A_cliente`, `A_tarea`, `A_realizada`, `fecha`, `duracion_h`) VALUES
(1, 2, 1, 1, 1, '2018-06-15', 2),
(2, 1, 1, 3, 2, '2018-05-28', 1),
(3, 2, 1, 1, 4, '2018-06-15', 1),
(4, 3, 1, 3, 3, '2018-06-11', 1),
(5, 4, 2, 5, NULL, '2018-06-11', 2),
(6, 1, 2, 2, NULL, '2018-06-16', 1),
(7, 1, 1, 4, NULL, '2018-06-16', 1),
(18, 1, 1, 2, NULL, '2018-06-17', 1),
(19, 1, 2, 2, NULL, '2018-06-17', 1),
(20, 1, 3, 2, NULL, '2018-06-17', 1),
(21, 1, 1, 3, 5, '2018-06-18', 1),
(22, 1, 2, 5, 6, '2018-06-18', 1),
(23, 1, 3, 3, 7, '2018-06-18', 1),
(24, 1, 1, 2, 8, '2018-06-18', 1),
(25, 1, 2, 2, 9, '2018-06-18', 1),
(26, 1, 3, 7, 10, '2018-06-18', 1),
(27, 1, 2, 1, 11, '2018-06-17', 1),
(28, 1, 1, 1, NULL, '2018-06-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_horario`
--

CREATE TABLE IF NOT EXISTS `empleado_horario` (
  `P_empleadoHorario` int(11) NOT NULL AUTO_INCREMENT,
  `A_empleado` int(11) DEFAULT NULL,
  `A_horario` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_empleadoHorario`),
  KEY `A_empleado` (`A_empleado`),
  KEY `A_horario` (`A_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `P_horario` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(30) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hEntrada` time NOT NULL,
  `hSalida` time NOT NULL,
  PRIMARY KEY (`P_horario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`P_horario`, `turno`, `fecha`, `hEntrada`, `hSalida`) VALUES
(1, 'Mañana', '2019-03-18', '06:00:00', '12:00:00'),
(2, 'Tarde', '2019-03-18', '12:00:00', '18:00:00'),
(3, 'Noche', '2019-03-18', '18:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `P_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `duracion_h` int(11) DEFAULT NULL,
  `comentarios` varchar(100) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `A_tipo_tarea` int(11) NOT NULL,
  PRIMARY KEY (`P_tarea`),
  KEY `P_tipo_tarea` (`A_tipo_tarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`P_tarea`, `duracion_h`, `comentarios`, `precio`, `A_tipo_tarea`) VALUES
(1, 1, '', 0.00, 1),
(2, 1, '', 0.00, 2),
(3, 1, '', 0.00, 3),
(4, 1, '', 0.00, 4),
(5, 2, '', 0.00, 5),
(6, 2, '', 0.00, 6),
(7, 1, '', 0.00, 7),
(8, 1, '', 0.00, 8),
(9, 1, '', 0.00, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_realizada`
--

CREATE TABLE IF NOT EXISTS `tarea_realizada` (
  `P_tarea_realizada` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `pagada` tinyint(4) DEFAULT NULL,
  `duracion_h` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_tarea_realizada`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tarea_realizada`
--

INSERT INTO `tarea_realizada` (`P_tarea_realizada`, `fecha`, `pagada`, `duracion_h`) VALUES
(1, '2018-05-22', 0, 1),
(2, '2018-05-22', 1, 1),
(3, '2018-06-10', 0, 1),
(4, '2018-06-16', 1, 1),
(5, '2018-06-18', 1, 1),
(6, '2018-06-18', 1, 1),
(7, '2018-06-18', 1, 1),
(8, '2018-06-18', 1, 1),
(9, '2018-06-18', 1, 1),
(10, '2018-06-18', 1, 1),
(11, '2018-06-18', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tarea`
--

CREATE TABLE IF NOT EXISTS `tipo_tarea` (
  `P_tipo_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(30) NOT NULL,
  PRIMARY KEY (`P_tipo_tarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tipo_tarea`
--

INSERT INTO `tipo_tarea` (`P_tipo_tarea`, `texto`) VALUES
(1, 'Limpiar cristales'),
(2, 'Barrer el suelo'),
(3, 'Fregar el suelo'),
(4, 'Lavar los platos'),
(5, 'Quitar el polvo'),
(6, 'Hacer la colada'),
(7, 'Limpiar el baño'),
(8, 'Tender la ropa'),
(9, 'Planchar la ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `P_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `rol` enum('CLIENTE','EMPLEADO') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`P_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`P_Usuario`, `usuario`, `contrasena`, `nombre`, `apellidos`, `telefono`, `correo`, `fechaNacimiento`, `rol`) VALUES
(1, 'jagima', 'jagima12_*', 'Jacinto', 'Girasol Margarito', 655224494, 'jagima_thebest@hotmail.com', '2001-04-15', 'CLIENTE'),
(2, 'mar123', 'DWES19', 'Mari', 'Iborra Ipinta', 658974216, 'chachimari@gmail.com', '1953-02-03', 'CLIENTE'),
(3, 'johnypower', 'john82', 'Johny', 'Mentero Nilavo', 658742136, 'johnypower@outlook.es', '1982-11-13', 'CLIENTE'),
(4, 'chachiagl', 'amazonbasi', 'Augusta', 'González Linares', 653245865, 'conceptronic@gmail.com', '1938-09-13', 'CLIENTE'),
(5, 'ignacio1', 'SoyIgnacio', 'Ignacio', 'Fernández Ortiz', 0, 'ignacio@gmail.com', '1998-02-18', 'EMPLEADO'),
(6, 'Anita', 'AnaSoyYo', 'Ana', 'Ortega Lavin', 0, 'anaCasado@gmail.com', '1997-09-02', 'EMPLEADO'),
(7, 'AndresGF', 'AnDrEs', 'Andrés', 'Torres Fernández', 0, 'andresgf@gmail.com', '1993-02-15', 'EMPLEADO'),
(8, 'JoseRoDi', 'laJoOficiá', 'Josefina', 'Martínez López', 0, 'thejoseoficial@gmail.com', '1998-04-22', 'EMPLEADO'),
(9, 'Antonio', 'terriblementeFacil', 'Antonio', 'Sierra', 0, 'antoniosierra@gmail.com', '0000-00-00', 'EMPLEADO');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ausencia_empleado`
--
ALTER TABLE `ausencia_empleado`
  ADD CONSTRAINT `ausencia_empleado_ibfk_1` FOREIGN KEY (`A_empleado`) REFERENCES `empleado` (`P_empleado`),
  ADD CONSTRAINT `ausencia_empleado_ibfk_2` FOREIGN KEY (`A_ausencia`) REFERENCES `ausencia` (`P_ausencia`);

--
-- Filtros para la tabla `beacon`
--
ALTER TABLE `beacon`
  ADD CONSTRAINT `beacon_ibfk_1` FOREIGN KEY (`A_sala`) REFERENCES `casa` (`P_casa`);

--
-- Filtros para la tabla `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `casa_ibfk_1` FOREIGN KEY (`A_cliente`) REFERENCES `cliente` (`P_cliente`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`A_usuario`) REFERENCES `usuario` (`P_Usuario`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`A_usuario`) REFERENCES `usuario` (`P_Usuario`);

--
-- Filtros para la tabla `empleado_cliente_tarea`
--
ALTER TABLE `empleado_cliente_tarea`
  ADD CONSTRAINT `empleado_cliente_tarea_ibfk_1` FOREIGN KEY (`A_empleado`) REFERENCES `empleado` (`P_empleado`),
  ADD CONSTRAINT `empleado_cliente_tarea_ibfk_3` FOREIGN KEY (`A_tarea`) REFERENCES `tarea` (`P_tarea`),
  ADD CONSTRAINT `empleado_cliente_tarea_ibfk_4` FOREIGN KEY (`A_cliente`) REFERENCES `cliente` (`P_cliente`),
  ADD CONSTRAINT `tarea_realizada` FOREIGN KEY (`A_realizada`) REFERENCES `tarea_realizada` (`P_tarea_realizada`);

--
-- Filtros para la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  ADD CONSTRAINT `empleado_horario_ibfk_1` FOREIGN KEY (`A_empleado`) REFERENCES `empleado` (`P_empleado`),
  ADD CONSTRAINT `empleado_horario_ibfk_2` FOREIGN KEY (`A_horario`) REFERENCES `horario` (`P_horario`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`A_tipo_tarea`) REFERENCES `tipo_tarea` (`P_tipo_tarea`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
