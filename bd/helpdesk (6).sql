-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2023 a las 18:03:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asignacion`
--

CREATE TABLE `t_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `marca` varchar(245) DEFAULT NULL,
  `modelo` varchar(245) DEFAULT NULL,
  `color` varchar(245) DEFAULT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `memoria` varchar(245) DEFAULT NULL,
  `disco_duro` varchar(245) DEFAULT NULL,
  `procesador` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_asignacion`
--

INSERT INTO `t_asignacion` (`id_asignacion`, `id_persona`, `id_equipo`, `marca`, `modelo`, `color`, `descripcion`, `memoria`, `disco_duro`, `procesador`) VALUES
(1, 1, 6, '1', '2', '3', '4', '5', '6', '7'),
(4, 1, 1, 'hp', 'i-45', 'sdad', 'a', '4gb ram', '1 tb', 'intel 9'),
(5, 121, 1, 'lenovo', 'hk-2645', 'negro', 'no se', '4gb ram', '1 tb', 'intel 10'),
(6, 121, 4, 'hp', '12345', 'negro', 'teclado', '', '', ''),
(7, 123, 1, 'lenovo', 'hk-2645', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_equipo`
--

CREATE TABLE `t_cat_equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_equipo`
--

INSERT INTO `t_cat_equipo` (`id_equipo`, `nombre`, `descripcion`) VALUES
(1, 'PC', 'fas fa-desktop'),
(2, 'LAPTOP', 'fas fa-laptop'),
(3, 'MAUSE', ''),
(4, 'TECLADO', 'fas fa-keyboard'),
(5, 'MONITOR', ''),
(6, 'BAFLES', ''),
(7, 'CELULARES', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'cliente', 'Es un cliente'),
(2, 'admin', 'Es Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `apellido` varchar(245) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `correo` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `nombre`, `apellido`, `id_rol`, `correo`) VALUES
(1, 'Juan', 'Perez', 1, 'juan.perez@example.com'),
(121, 'Maria', 'Lopez', 2, 'maria.lopez@example.com'),
(123, 'Pedro', 'Gomez', 2, 'pedro.gomez@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reportes`
--

CREATE TABLE `t_reportes` (
  `id_reporte` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `titulo` varchar(245) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_reportes`
--

INSERT INTO `t_reportes` (`id_reporte`, `id_persona`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 1, 'Reporte 1', 'Este es el primer reporte.', '2023-01-01'),
(2, 121, 'Reporte 2', 'Este es el segundo reporte.', '2023-02-02'),
(3, 123, 'Reporte 3', 'Este es el tercer reporte.', '2023-03-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD UNIQUE KEY `id_persona` (`id_persona`,`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `t_cat_equipo`
--
ALTER TABLE `t_cat_equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD UNIQUE KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD CONSTRAINT `t_asignacion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`),
  ADD CONSTRAINT `t_asignacion_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipo` (`id_equipo`);

--
-- Filtros para la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD CONSTRAINT `t_persona_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`);

--
-- Filtros para la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD CONSTRAINT `t_reportes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`);

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `t_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`),
  ADD CONSTRAINT `t_usuarios_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
