--
-- Base de datos: `2019p_icarazo`
--

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
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `P_empleado` int(11) NOT NULL,
  `nss` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL,
  `A_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`P_empleado`, `nss`, `isAdmin`, `A_usuario`) VALUES
(1, '111222333', 0, 5),
(2, '44555666', 0, 6),
(3, '777888999', 0, 7),
(4, '111555999', 0, 8),
(5, '333555777', 1, 9),
(6, '1111111111111', 1, 10),
(7, '11111111', 0, 12);

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
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `P_tarea` int(11) NOT NULL,
  `duracion_h` int(11) DEFAULT NULL,
  `comentarios` varchar(100) NOT NULL,
  `precio` int(2) NOT NULL,
  `A_tipo_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`P_tarea`, `duracion_h`, `comentarios`, `precio`, `A_tipo_tarea`) VALUES
(1, 1, '', 10, 1),
(2, 1, '', 10, 2),
(3, 1, '', 15, 3),
(4, 1, '', 10, 4),
(5, 2, '', 20, 5),
(6, 2, '', 25, 6),
(7, 1, '', 25, 7);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`P_horario`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`P_tarea`),
  ADD KEY `P_tipo_tarea` (`A_tipo_tarea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `P_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  MODIFY `P_empleadoHorario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `P_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `P_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`A_usuario`) REFERENCES `usuario` (`P_Usuario`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`A_tipo_tarea`) REFERENCES `tipo_tarea` (`P_tipo_tarea`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
