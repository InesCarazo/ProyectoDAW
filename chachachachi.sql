-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2019 a las 14:57:34
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chachachachi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `P_Administrador` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `A_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`P_Administrador`, `nombre`, `apellidos`, `correo`, `fechaNacimiento`, `A_usuario`) VALUES
(1, 'Antonio', 'Sierra', 'antonioSierra@gmail.com', '0000-00-00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencia`
--

CREATE TABLE `ausencia` (
  `P_ausencia` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `ausencia_empleado` (
  `P_ausenciaEmpleado` int(11) NOT NULL,
  `A_empleado` int(11) DEFAULT NULL,
  `A_ausencia` int(11) DEFAULT NULL,
  `justificada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `beacon` (
  `P_beacon` int(11) NOT NULL,
  `A_sala` int(11) DEFAULT NULL,
  `UUID` varchar(40) NOT NULL,
  `major` int(10) NOT NULL,
  `minor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `beacon`
--

INSERT INTO `beacon` (`P_beacon`, `A_sala`, `UUID`, `major`, `minor`) VALUES
(1, 1, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 100, 100),
(2, 2, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 29158, 64580),
(3, 3, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 53583, 12200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `P_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `A_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`P_cliente`, `nombre`, `apellidos`, `correo`, `fechaNacimiento`, `A_usuario`) VALUES
(1, 'Jacinto', 'Girasol Margarito', 'jagima_thebest@hotmail.com', '2001-04-15', 1),
(2, 'Mari', 'Iborra Ipinta', 'chachimari@gmail.com', '1953-02-03', 2),
(3, 'Johny', 'Mentero Nilavo', 'johnypower@outlook.es', '1982-11-13', 3),
(4, 'Augusta', 'González Linares', 'conceptronic@gmail.com', '1938-09-13', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `P_empleado` int(11) NOT NULL,
  `nombre` char(20) DEFAULT NULL,
  `correo` char(30) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `precioHora` float DEFAULT NULL,
  `A_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`P_empleado`, `nombre`, `correo`, `fechaNacimiento`, `precioHora`, `A_usuario`) VALUES
(1, 'Ignacio', 'ignacio@gmail.com', '1998-02-18', 10, 5),
(2, 'Ana', 'anaCasado@gmail.com', '1997-09-02', 10, 6),
(3, 'Andrés', 'andresgf@gmail.com', '1993-02-15', 9, 7),
(4, 'Josefina', 'thejoseoficial@gmail.com', '1998-04-22', 12, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_horario`
--

CREATE TABLE `empleado_horario` (
  `P_empleadoHorario` int(11) NOT NULL,
  `A_empleado` int(11) DEFAULT NULL,
  `A_horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_sala_tarea`
--

CREATE TABLE `empleado_sala_tarea` (
  `P_empleadoSalaTarea` int(11) NOT NULL,
  `A_empleado` int(11) DEFAULT NULL,
  `A_sala` int(11) DEFAULT NULL,
  `A_tarea` int(11) DEFAULT NULL,
  `A_realizada` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `duracion_h` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_sala_tarea`
--

INSERT INTO `empleado_sala_tarea` (`P_empleadoSalaTarea`, `A_empleado`, `A_sala`, `A_tarea`, `A_realizada`, `fecha`, `duracion_h`) VALUES
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
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `P_horario` int(11) NOT NULL,
  `turno` varchar(30) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hEntrada` time NOT NULL,
  `hSalida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`P_horario`, `turno`, `fecha`, `hEntrada`, `hSalida`) VALUES
(1, 'Mañana', '2019-03-18', '06:00:00', '12:00:00'),
(2, 'Tarde', '2019-03-18', '12:00:00', '18:00:00'),
(3, 'Noche', '2019-03-18', '18:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `P_sala` int(11) NOT NULL,
  `nombre` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`P_sala`, `nombre`) VALUES
(1, 'Cocina'),
(2, 'Sala'),
(3, 'Baño'),
(4, 'Habitación 1'),
(5, 'Habitación 2'),
(6, 'Alacena'),
(7, 'Cuarto de estudio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `P_tarea` int(11) NOT NULL,
  `texto` char(100) DEFAULT NULL,
  `duracion_h` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`P_tarea`, `texto`, `duracion_h`) VALUES
(1, 'Limpiar cristales', 1),
(2, 'Barrer el suelo', 1),
(3, 'Fregar el suelo', 1),
(4, 'Lavar los platos', 1),
(5, 'Quitar el polvo', 2),
(6, 'Hacer la colada', 2),
(7, 'Limpiar el baño', 1),
(8, 'Tender la ropa', 1),
(9, 'Planchar la ropa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_realizada`
--

CREATE TABLE `tarea_realizada` (
  `P_tarea_realizada` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `pagada` tinyint(4) DEFAULT NULL,
  `duracion_h` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `P_Usuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `rol` enum('CLIENTE','EMPLEADO','ADMINISTRADOR') COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`P_Usuario`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'jagima', 'jagima12_*', 'CLIENTE'),
(2, 'mar123', 'DWES19', 'CLIENTE'),
(3, 'johnypower', 'john82', 'CLIENTE'),
(4, 'chachiagl', 'amazonbasi', 'CLIENTE'),
(5, 'ignacio1', 'SoyIgnacio', 'EMPLEADO'),
(6, 'Anita', 'AnaSoyYo', 'EMPLEADO'),
(7, 'AndresGF', 'AnDrEs', 'EMPLEADO'),
(8, 'JoseRoDi', 'laJoOficiá', 'EMPLEADO'),
(9, 'Antonio', 'terriblementeFacil', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`P_Administrador`),
  ADD KEY `A_Usuario` (`A_usuario`);

--
-- Indices de la tabla `ausencia`
--
ALTER TABLE `ausencia`
  ADD PRIMARY KEY (`P_ausencia`);

--
-- Indices de la tabla `ausencia_empleado`
--
ALTER TABLE `ausencia_empleado`
  ADD PRIMARY KEY (`P_ausenciaEmpleado`),
  ADD KEY `A_empleado` (`A_empleado`),
  ADD KEY `A_ausencia` (`A_ausencia`);

--
-- Indices de la tabla `beacon`
--
ALTER TABLE `beacon`
  ADD PRIMARY KEY (`P_beacon`),
  ADD KEY `A_sala` (`A_sala`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`P_cliente`),
  ADD KEY `A_usuario` (`A_usuario`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`P_empleado`),
  ADD KEY `P_Usuario` (`A_usuario`);

--
-- Indices de la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  ADD PRIMARY KEY (`P_empleadoHorario`),
  ADD KEY `A_empleado` (`A_empleado`),
  ADD KEY `A_horario` (`A_horario`);

--
-- Indices de la tabla `empleado_sala_tarea`
--
ALTER TABLE `empleado_sala_tarea`
  ADD PRIMARY KEY (`P_empleadoSalaTarea`),
  ADD KEY `A_empleado` (`A_empleado`),
  ADD KEY `A_sala` (`A_sala`),
  ADD KEY `A_tarea` (`A_tarea`),
  ADD KEY `A_realizada` (`A_realizada`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`P_horario`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`P_sala`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`P_tarea`);

--
-- Indices de la tabla `tarea_realizada`
--
ALTER TABLE `tarea_realizada`
  ADD PRIMARY KEY (`P_tarea_realizada`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`P_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `P_Administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ausencia`
--
ALTER TABLE `ausencia`
  MODIFY `P_ausencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ausencia_empleado`
--
ALTER TABLE `ausencia_empleado`
  MODIFY `P_ausenciaEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `beacon`
--
ALTER TABLE `beacon`
  MODIFY `P_beacon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `P_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `P_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  MODIFY `P_empleadoHorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado_sala_tarea`
--
ALTER TABLE `empleado_sala_tarea`
  MODIFY `P_empleadoSalaTarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `P_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `P_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `P_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tarea_realizada`
--
ALTER TABLE `tarea_realizada`
  MODIFY `P_tarea_realizada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `P_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`A_usuario`) REFERENCES `usuario` (`P_Usuario`);

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
  ADD CONSTRAINT `beacon_ibfk_1` FOREIGN KEY (`A_sala`) REFERENCES `sala` (`P_sala`);

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
-- Filtros para la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  ADD CONSTRAINT `empleado_horario_ibfk_1` FOREIGN KEY (`A_empleado`) REFERENCES `empleado` (`P_empleado`),
  ADD CONSTRAINT `empleado_horario_ibfk_2` FOREIGN KEY (`A_horario`) REFERENCES `horario` (`P_horario`);

--
-- Filtros para la tabla `empleado_sala_tarea`
--
ALTER TABLE `empleado_sala_tarea`
  ADD CONSTRAINT `empleado_sala_tarea_ibfk_1` FOREIGN KEY (`A_empleado`) REFERENCES `empleado` (`P_empleado`),
  ADD CONSTRAINT `empleado_sala_tarea_ibfk_2` FOREIGN KEY (`A_sala`) REFERENCES `sala` (`P_sala`),
  ADD CONSTRAINT `empleado_sala_tarea_ibfk_3` FOREIGN KEY (`A_tarea`) REFERENCES `tarea` (`P_tarea`),
  ADD CONSTRAINT `tarea_realizada` FOREIGN KEY (`A_realizada`) REFERENCES `tarea_realizada` (`P_tarea_realizada`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
