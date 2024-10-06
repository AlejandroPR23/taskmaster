-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 30-05-2024 a las 04:53:23
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
(22, 'Agregar Verificación Campos No Vacios', 'Agregar la restriccion de campos con bootstrap', 2, 1, 2),
(23, 'Organizar Tablas De Gestiona El Riego', 'Agregar la restriccion de campos con bootstrap', 2, 1, 1),
(24, 'Organizar Tablas De Gestiona El Riesgo1', 'Organizar restricciones con if.', 2, 3, 3),
(25, 'Arreglar Suelo', 'arreglar agujeros', 2, 3, 2),
(26, 'Organizar Tablas De Gestiona El Riegodawd', 'Datatables no puede buscar en columnas de tablas relacionadas, es necesario investigas y encontrar una manera de hacerlo', 2, 2, 3),
(28, 'Agregar Verificación Campos No Vacios', 'Organizar restricciones con if', 4, 1, 2);

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
(5, 'gsst', '123');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

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
