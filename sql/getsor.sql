-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2024 a las 04:06:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `getsor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre_imagen_login` varchar(255) NOT NULL,
  `nombre_imagen_recuperar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre_imagen_login`, `nombre_imagen_recuperar`) VALUES
(4, 'software-medico.png', 'doc.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperacion`
--

CREATE TABLE `recuperacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `recuperacion`
--

INSERT INTO `recuperacion` (`id`, `nombre`, `correo`) VALUES
(5, 'URIEL GONZALEZ RODRIGUEZ', 'asadoslafortaleza2381274286@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`, `estatus`, `fecha_hora`) VALUES
(18, 'LAURA TORRES LINARES', 'lau@gmail.com', '$2y$10$TSM/cEsi.3ww4ZOGD7tDt.di3KbFh7nd9S3SIIGbB1QUDCbN7Ugry', 'ADMIN', 'ACTIVO', '2024-05-02 23:06:53'),
(19, 'YOVANI GONZALEZ RODRIGUEZ', 'yovanigonzar@gmail.com', '$2y$10$19f8CkGH5NwjYTI4Im6PauLNTtNrQI62HArs62lmF5HKz3rvaVq..', 'EMPLEADO', 'ACTIVO', '2024-05-02 23:07:38'),
(20, 'LAURA TORRES LINARES', 'giovanigonza88@gmail.com', '$2y$10$1dtkCR8a6emSbubCh4J9oeTs8Q/VTM5c5mRXSz3uz84.AkeYHVyAG', 'EMPLEADO', 'ACTIVO', '2024-05-03 01:33:48'),
(21, 'JOSE LUIS RODRIGUEZ JIMENEZ', 'april803@yahoo.com', '$2y$10$JW8OKZvsG.liubW08kDU4uzd65FkT/ObYqAsaY94JSabhSdL00v1a', 'EMPLEADO', 'ACTIVO', '2024-05-03 01:34:02'),
(22, 'LUIS EDUARDO', 'c@gmail.com', '$2y$10$WT7TJ0WHexKhY35ocolwdOuasW7PzLJT92KN3U6Zb7e55MizjpBW2', 'EMPLEADO', 'INACTIVO', '2024-05-03 01:34:13'),
(23, 'MEZCAL ESPADIN ', 'therichars@gmail.com', '$2y$10$47eRP4hmdXmKvqTufYJtOelOi8qu3PIL.AljvVcNrP8eyKWLZDNPq', 'EMPLEADO', 'INACTIVO', '2024-05-03 01:34:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recuperacion`
--
ALTER TABLE `recuperacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recuperacion`
--
ALTER TABLE `recuperacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
