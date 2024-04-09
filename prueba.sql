-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2024 a las 05:54:19
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
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listregistro`
--

CREATE TABLE `listregistro` (
  `IdListRegistro` int(11) NOT NULL,
  `NombreUser` varchar(200) NOT NULL,
  `Prueba1` float NOT NULL,
  `Prueba2` float NOT NULL,
  `Prueba3` float NOT NULL,
  `Promedio` float NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `listregistro`
--

INSERT INTO `listregistro` (`IdListRegistro`, `NombreUser`, `Prueba1`, `Prueba2`, `Prueba3`, `Promedio`, `FechaCreacion`) VALUES
(3, 'alex', 4, 5, 3, 4, '2024-04-09 03:30:59'),
(4, 'Diego Alexander', 3, 3.4, 4.2, 3.5, '2024-04-09 03:32:05'),
(5, 'pepito', 3, 2, 1, 2, '2024-04-09 03:37:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listregistro`
--
ALTER TABLE `listregistro`
  ADD PRIMARY KEY (`IdListRegistro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listregistro`
--
ALTER TABLE `listregistro`
  MODIFY `IdListRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
