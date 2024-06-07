-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 21:35:31
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
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `title`, `tipo`, `descripcion`, `duracion`) VALUES
(1, 'Yoga', 'Grupo', 'Clase de yoga para principiantes', 60),
(2, 'Spinning', 'Grupo', 'Clase de spinning para todos los niveles', 45),
(3, 'Pilates', 'Grupo', 'Clase de pilates para fortalecimiento muscular', 60),
(4, 'Zumba', 'Grupo', 'Clase de zumba con ritmos latinos', 45),
(5, 'Cardio', 'Grupo', 'Clase de cardio intensa', 30),
(6, 'Boxeo', 'Grupo', 'Clase de guanteo de boxeo', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `nombre`, `tipo`, `descripcion`, `stock`) VALUES
(1, 'Tapete de Yoga', 'Equipamiento', 'Tapete de yoga de alta calidad', 20),
(2, 'Bicicleta de Spinning', 'Equipamiento', 'Bicicleta de spinning profesional', 5),
(3, 'Colchoneta', 'Equipamiento', 'Colchoneta para ejercicios de suelo', 10),
(4, 'Balones de fitness', 'Equipamiento', 'Balones de fitness para ejercicios de fuerza y equilibrio', 3),
(5, 'Pesas de 2kg', 'Equipamiento', 'Pesas de 2kg ideales para entrenamientos de fuerza', 15),
(6, 'Pelotas de Yoga', 'Equipamiento', 'Pelotas de yoga para mejorar el equilibrio y la estabilidad', 8),
(7, 'Bandas Elásticas', 'Equipamiento', 'Bandas elásticas para ejercicios de resistencia y estiramiento', 20),
(8, 'Barra de dominadas', 'Equipamiento', 'Barra de dominadas para ejercicios de espalda y brazos', 10),
(9, 'Step', 'Equipamiento', 'Step ajustable para entrenamientos aeróbicos y de tonificación', 12),
(10, 'Cuerdas de saltar', 'Equipamiento', 'Cuerdas de saltar para entrenamientos cardiovasculares', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE `monitor` (
  `id_monitor` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `imc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monitor`
--

INSERT INTO `monitor` (`id_monitor`, `username`, `password`, `nombre`, `apellido`, `email`, `fecha_nac`, `rol`, `imc`) VALUES
(1, 'pedro_martinez33', 'a644e2d3738178417cf86e75d3ebbf92c61501c52f683ecd971af7d9f00103d4', 'Pedro', 'Martínez', 'pedro.martinez@gmail.com', '1992-05-01', 2, 0),
(2, 'sara_lopez44', '34d1283dd5ddc95c54f829adde207e9a7aba545f53989c4a361fa4b936cd573a', 'Sara', 'López', 'sara.lopez@gmail.com', '1990-09-15', 2, 0),
(3, 'laura_garcia12', '8d45265a59e4ae1f6200be357169e988bb7eb2dd39295eab27e019a66dad6775', 'Laura', 'García', 'laura.garcia@gmail.com', '1993-05-10', 2, 0),
(4, 'carlos_ruiz73', 'e7c5e4e687eba0c36d42eb00e0b4779d98247b1932fbfa85d2eea25332ba2525', 'Carlos', 'Ruiz', 'carlos.ruiz@gmail.com', '1985-12-03', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_monitor` int(11) DEFAULT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `hora_clase` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`, `id_monitor`, `id_clase`, `start`, `hora_clase`) VALUES
(1, 4, 4, 5, '2024-06-01', '09:00:00'),
(2, 5, 2, 3, '2024-06-01', '12:00:00'),
(3, 3, 1, 5, '2024-06-03', '08:00:00'),
(4, 4, 1, 5, '2024-06-06', '17:30:00'),
(5, 1, 2, 1, '2024-06-03', '16:00:00'),
(6, 2, 2, 1, '2024-06-07', '08:00:00'),
(7, 1, 1, 2, '2024-06-04', '09:00:00'),
(8, 2, 4, 2, '2024-06-05', '12:30:00'),
(9, 5, 3, 6, '2024-06-04', '12:00:00'),
(10, 4, 3, 6, '2024-06-05', '10:15:00'),
(11, 1, 4, 4, '2024-06-04', '16:30:00'),
(12, 2, 1, 4, '2024-06-06', '10:00:00'),
(13, 1, 3, 3, '2024-06-07', '12:50:00'),
(14, 2, 2, 3, '2024-06-08', '13:00:00'),
(15, 4, 4, 5, '2024-06-13', '17:30:00'),
(16, 5, 1, 5, '2024-06-15', '09:00:00'),
(17, 1, 2, 1, '2024-06-10', '16:00:00'),
(18, 2, 2, 1, '2024-06-14', '08:00:00'),
(19, 1, 4, 2, '2024-06-11', '09:00:00'),
(20, 2, 3, 6, '2024-06-11', '12:00:00'),
(21, 4, 2, 6, '2024-06-12', '10:15:00'),
(22, 1, 1, 4, '2024-06-11', '16:30:00'),
(23, 2, 1, 4, '2024-06-13', '10:00:00'),
(24, 1, 3, 3, '2024-06-14', '12:50:00'),
(25, 2, 3, 3, '2024-06-15', '13:00:00'),
(26, 4, 4, 5, '2024-06-10', '09:00:00'),
(27, 5, 1, 4, '2024-06-11', '16:30:00'),
(28, 1, 4, 4, '2024-06-18', '16:30:00'),
(29, 2, 4, 5, '2024-06-20', '17:30:00'),
(30, 4, 4, 5, '2024-06-22', '09:30:00'),
(31, 5, 1, 5, '2024-06-17', '08:00:00'),
(32, 2, 1, 2, '2024-06-19', '12:30:00'),
(33, 4, 1, 4, '2024-06-20', '17:30:00'),
(34, 5, 4, 2, '2024-06-12', '12:30:00'),
(35, 1, 3, 1, '2024-06-17', '16:00:00'),
(36, 4, 3, 6, '2024-06-19', '10:15:00'),
(37, 2, 2, 6, '2024-06-18', '12:00:00'),
(38, 1, 2, 3, '2024-06-21', '12:50:00'),
(39, 5, 2, 3, '2024-06-22', '13:00:00'),
(40, 1, 2, 1, '2024-06-21', '08:00:00'),
(41, 6, 2, 1, '2024-06-24', '16:00:00'),
(42, 8, 2, 6, '2024-06-26', '10:15:00'),
(43, 10, 2, 3, '2024-06-29', '13:00:00'),
(44, 2, 3, 6, '2024-06-25', '12:00:00'),
(45, 1, 3, 3, '2024-06-28', '12:50:00'),
(46, 7, 3, 1, '2024-06-28', '08:00:00'),
(47, 9, 4, 5, '2024-06-24', '08:00:00'),
(48, 5, 4, 2, '2024-06-25', '09:00:00'),
(49, 4, 4, 5, '2024-06-27', '08:00:00'),
(50, 7, 1, 4, '2024-06-27', '10:00:00'),
(51, 5, 4, 2, '2024-06-18', '09:00:00'),
(52, 5, 1, 4, '2024-06-25', '16:30:00'),
(53, 10, 1, 2, '2024-06-26', '12:30:00'),
(54, 7, 1, 5, '2024-06-29', '08:00:00'),
(55, 9, 4, 5, '2024-06-08', '08:00:00'),
(56, 1, 1, 5, '2024-07-01', '08:00:00'),
(57, 2, 2, 1, '2024-07-01', '16:00:00'),
(58, 3, 3, 2, '2024-07-02', '09:00:00'),
(59, 4, 3, 6, '2024-07-02', '12:00:00'),
(60, 5, 4, 4, '2024-07-02', '16:30:00'),
(61, 6, 1, 2, '2024-07-03', '12:30:00'),
(62, 7, 3, 6, '2024-07-03', '10:15:00'),
(63, 8, 2, 3, '2024-07-05', '12:50:00'),
(64, 9, 3, 1, '2024-07-05', '08:00:00'),
(65, 10, 1, 5, '2024-07-06', '09:00:00'),
(66, 1, 4, 4, '2024-07-04', '10:00:00'),
(67, 2, 1, 5, '2024-07-04', '17:30:00'),
(68, 3, 2, 3, '2024-07-06', '13:00:00'),
(69, 4, 4, 5, '2024-07-08', '08:00:00'),
(70, 5, 2, 1, '2024-07-08', '16:00:00'),
(71, 6, 1, 2, '2024-07-09', '09:00:00'),
(72, 7, 3, 6, '2024-07-09', '12:00:00'),
(73, 8, 4, 4, '2024-07-09', '16:30:00'),
(74, 9, 1, 2, '2024-07-10', '12:30:00'),
(75, 10, 3, 6, '2024-07-10', '10:15:00'),
(76, 1, 2, 3, '2024-07-12', '12:50:00'),
(77, 2, 3, 1, '2024-07-12', '08:00:00'),
(78, 3, 4, 5, '2024-07-13', '09:00:00'),
(79, 4, 1, 4, '2024-07-11', '10:00:00'),
(80, 5, 4, 5, '2024-07-11', '17:30:00'),
(81, 6, 2, 3, '2024-07-13', '13:00:00'),
(82, 7, 1, 5, '2024-07-15', '08:00:00'),
(83, 8, 3, 1, '2024-07-15', '16:00:00'),
(84, 9, 4, 2, '2024-07-16', '09:00:00'),
(85, 10, 2, 6, '2024-07-16', '12:00:00'),
(86, 1, 1, 4, '2024-07-16', '16:30:00'),
(87, 2, 4, 2, '2024-07-17', '12:30:00'),
(88, 3, 2, 6, '2024-07-17', '10:15:00'),
(89, 4, 3, 3, '2024-07-19', '12:50:00'),
(90, 5, 2, 1, '2024-07-19', '08:00:00'),
(91, 6, 1, 5, '2024-07-20', '09:00:00'),
(92, 7, 4, 4, '2024-07-18', '10:00:00'),
(93, 8, 1, 5, '2024-07-18', '17:30:00'),
(94, 9, 3, 3, '2024-07-20', '13:00:00'),
(95, 10, 4, 5, '2024-07-22', '08:00:00'),
(96, 1, 2, 1, '2024-07-22', '16:00:00'),
(97, 2, 1, 2, '2024-07-23', '09:00:00'),
(98, 3, 3, 6, '2024-07-23', '12:00:00'),
(99, 4, 4, 4, '2024-07-23', '16:30:00'),
(100, 5, 1, 2, '2024-07-24', '12:30:00'),
(101, 6, 2, 6, '2024-07-24', '10:15:00'),
(102, 7, 3, 3, '2024-07-26', '12:50:00'),
(103, 8, 2, 1, '2024-07-26', '08:00:00'),
(104, 9, 4, 5, '2024-07-27', '09:00:00'),
(105, 10, 1, 4, '2024-07-25', '10:00:00'),
(106, 1, 4, 5, '2024-07-25', '17:30:00'),
(107, 2, 3, 3, '2024-07-27', '13:00:00'),
(108, 3, 1, 5, '2024-07-29', '08:00:00'),
(109, 4, 2, 1, '2024-07-29', '16:00:00'),
(110, 5, 3, 2, '2024-07-30', '09:00:00'),
(111, 6, 4, 4, '2024-07-30', '12:00:00'),
(112, 7, 1, 2, '2024-07-30', '16:30:00'),
(113, 8, 2, 2, '2024-07-31', '12:30:00'),
(114, 9, 3, 6, '2024-07-31', '10:15:00'),
(115, 10, 2, 2, '2024-07-09', '09:00:00'),
(116, 1, 2, 2, '2024-07-16', '09:00:00'),
(117, 7, 2, 6, '2024-07-30', '12:00:00'),
(118, 6, 3, 2, '2024-07-24', '12:30:00'),
(119, 1, 3, 2, '2024-07-17', '12:30:00'),
(120, 9, 2, 2, '2024-07-23', '09:00:00'),
(121, 8, 2, 2, '2024-07-03', '12:30:00'),
(122, 5, 3, 2, '2024-07-10', '12:30:00'),
(123, 4, 4, 2, '2024-07-02', '09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `id_monitor` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`id_monitor`, `id_clase`) VALUES
(1, 2),
(1, 4),
(1, 5),
(2, 1),
(2, 3),
(2, 6),
(3, 1),
(3, 3),
(3, 6),
(4, 2),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `fecha_nacim` date DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `imc` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `email`, `fecha_nacim`, `rol`, `imc`) VALUES
(1, 'juan_perez12', '710d740674c57e0823793e9ca53b8377b504ab44ff3a36dd29129e4841a43dd0', 'Juan', 'Pérez', 'juan.perez@gmail.com', '1990-03-12', 0, 25.5),
(2, 'maria_gonzalez53', 'da837697041edb6592e84ff05d5dc42f8883c7e15a7f18c21332ecf1c73f754a', 'María', 'González', 'maria.gonzalez@gmail.com', '1985-07-25', 0, 22.1),
(3, 'admin', 'ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270', 'Admin', 'Admin', 'admin@gmail.com', '1980-12-20', 1, 0),
(4, 'ana_rodriguez27', 'c1ea922bc882d3586346a63d47660230731014e9fc52e3641aee8ec0123c20e4', 'Ana', 'Rodríguez', 'ana.rodriguez@gmail.com', '1992-08-15', 0, 21.8),
(5, 'david_gomez74', 'c2b6161a5690716f4136ddba1ae607d6adae10c061b99a4533931990aa4b8b4a', 'David', 'Gómez', 'david.gomez@gmail.com', '1987-04-30', 0, 23.3),
(6, 'jose_heredia94', 'e17caade1b433e8af34d0142b329a72cf3c36a2eb94d53b64b61d4d70d1231e6', 'Jose', 'Heredia', 'jose.heredia@gmail.com', '1998-07-13', 0, 20.5),
(7, 'raul_gonzalez36', 'd5019c66fba6d3222d8eca93ed676d5e6885897d3f5d2e1dec7e209be2ae1f09', 'raul', 'gonzalez', 'raul.gonzalez@gmail.com', '2000-03-29', 0, 24),
(8, 'alvaro_fernandez61', '16c608ccada5d02167b4d2f5356484898993eda435293baa8241eace68371209', 'alvaro', 'fernandez', 'alvaro.fernandez@gmail.com', '1999-11-03', 0, 22),
(9, 'marcos_marcos38', '234d2cc87f40109514cedddbb2d13d65ac76fc8051fc7469c73e765b6132e7ba', 'marcos', 'marcos', 'marcossblazquezz@gmail.com', '2004-05-10', 0, 23.5),
(10, 'ana_blazquez94', 'c1ea922bc882d3586346a63d47660230731014e9fc52e3641aee8ec0123c20e4', 'ana', 'blazquez', 'ana.blazquez@gmail.com', '1973-12-07', 0, 19.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utiliza`
--

CREATE TABLE `utiliza` (
  `id_material` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `utiliza`
--

INSERT INTO `utiliza` (`id_material`, `id_clase`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id_monitor`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_usuario_reserva` (`id_usuario`),
  ADD KEY `fk_clase_reserva` (`id_clase`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`id_monitor`,`id_clase`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `utiliza`
--
ALTER TABLE `utiliza`
  ADD PRIMARY KEY (`id_material`,`id_clase`),
  ADD KEY `fk_material_utiliza` (`id_material`),
  ADD KEY `fk_clase_utiliza` (`id_clase`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_clase_reserva` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_reserva` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_monitor`) REFERENCES `monitor` (`id_monitor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `utiliza`
--
ALTER TABLE `utiliza`
  ADD CONSTRAINT `fk_clase_utiliza` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_utiliza` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
