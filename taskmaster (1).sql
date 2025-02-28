-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 28-02-2025 a las 04:46:14
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
-- Base de datos: `taskmaster`
--
CREATE DATABASE IF NOT EXISTS `taskmaster` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taskmaster`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `ID` smallint(6) NOT NULL,
  `Usuario` int(4) NOT NULL,
  `Nombre` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`ID`, `Usuario`, `Nombre`) VALUES
(4, 7, 'Laboral'),
(5, 7, 'Creatividad'),
(6, 7, 'Trabajo'),
(7, 7, 'Taskmaster');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `ID` int(4) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `Nombre`) VALUES
(1, 'Trabajo'),
(2, 'Estudio'),
(3, 'Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `ID` int(4) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID`, `Nombre`) VALUES
(1, 'Pendiente'),
(2, 'En progreso'),
(3, 'Completada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

DROP TABLE IF EXISTS `metas`;
CREATE TABLE `metas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(4) DEFAULT NULL,
  `area_id` smallint(6) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tiempo_estimado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metas`
--

INSERT INTO `metas` (`id`, `usuario_id`, `area_id`, `descripcion`, `tiempo_estimado`) VALUES
(1, 7, 4, 'Cambiar mis tareas', '1 semana'),
(2, 7, 4, 'Cambiar tareas 2', '2 semana'),
(7, 7, 6, 'Cambiar mis tareas', '1 semana'),
(8, 7, 6, 'Cambiar tareas 2', '2 semana'),
(9, 7, 6, 'Nata no me quiere', '1 dia'),
(10, 7, 6, 'Nata', '1 dia'),
(11, 7, 5, 'Architecto similique vel consectetur provident optio ipsam in.', 'Ad aperiam necessitatibus.'),
(12, 7, 5, 'Pariatur numquam deserunt velit magni.', 'Incidunt enim hic.'),
(13, 7, 5, 'Iste placeat corrupti quod possimus cum eligendi repellendus.', 'Saepe minima laboriosam fugit architecto exercitat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `ID` int(4) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Usuario` int(2) NOT NULL,
  `Categoria` int(3) NOT NULL,
  `Estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`ID`, `Nombre`, `Descripcion`, `Usuario`, `Categoria`, `Estado`) VALUES
(9, 'Organizar Tablas De Gestiona El Riesgo', 'Datatables no puede buscar en columnas de tablas relacionadas, es necesario investigas y encontrar una manera de hacerlo', 4, 1, 2),
(15, 'Solucionar Mi Error En Datatables', 'Al parecer los campos relacionados si deberían poder buscarse', 5, 2, 2),
(17, 'Organizar Habitación', 'Tender cama', 4, 2, 3),
(18, 'Volar', 'crear conexión estructurada PHP', 4, 3, 3),
(19, 'Regar Plantas', 'Hechar agua a las plantas', 4, 1, 1),
(20, 'Poner Datatables En Task Masters', 'Organizar datatables en task masters', 4, 2, 1),
(28, 'Agregar Verificación Campos No Vacios', 'Organizar restricciones con if', 4, 1, 2),
(31, 'Volar', 'Organizar restricciones con if.', 2, 2, 3),
(32, 'Arreglar Sección Botón Eliminar Y Editar', 'Se arregla la sección del botón de eliminar y agregar', 6, 3, 1),
(38, 'Mejorar Registro', 'Terminar curso de platzi', 7, 1, 3),
(40, '237', 'Sed fuga optio.', 7, 1, 1),
(41, '52', 'Minus ipsum quam quos incidunt sint debitis laudantium.', 7, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(4) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Contrasena` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Contrasena`) VALUES
(1, 'user1', 'password1'),
(2, 'user2', 'password2'),
(3, 'user3', 'password3'),
(4, 'Usuario1', '12345'),
(5, 'gsst', '123'),
(6, 'developer1', '1234'),
(7, 'Jamon', '$2y$10$B7qIJbr7exxiHPf1u41aEOAeHUwK7tH4.ZBIj.q9mJyaRXcYMYs.y');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_areas_usuarios` (`Usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_metas_usuario` (`usuario_id`),
  ADD KEY `FK_metas_areas` (`area_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_tarea_estado` (`Estado`),
  ADD KEY `Fk_tarea_categoria` (`Categoria`),
  ADD KEY `FK_tarea_usuario` (`Usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `FK_areas_usuarios` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `FK_metas_areas` FOREIGN KEY (`area_id`) REFERENCES `areas` (`ID`),
  ADD CONSTRAINT `FK_metas_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `FK_tarea_usuario` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `Fk_tarea_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID`),
  ADD CONSTRAINT `Fk_tarea_estado` FOREIGN KEY (`Estado`) REFERENCES `estados` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
