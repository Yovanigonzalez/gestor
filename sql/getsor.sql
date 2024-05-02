-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2024 a las 04:26:26
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
(10, 'YOVANI GONZALEZ RODRIGUEZ', 'yovanigonzar@gmail.com', '$2y$10$UKhfGPY730jeImF6RPQ7hOgZ2.BSJ7YQo3JVAUhbagEOxfjEA.E76', 'EMPLEADO', 'ACTIVO', '2024-05-01 22:32:52'),
(11, 'URIEL GONZALEZ RODRIGUEZ', 'april803@yahoo.com', '$2y$10$xiOjDoNS/4OMLCAyup7lFuPyOORMMRWCzOkzbtFNJGlJV66nYURi6', 'EMPLEADO', 'ACTIVO', '2024-05-01 22:33:29'),
(12, 'YOVANI GONZALEZ RODRIGUEZ', 'A@gmail.com', '$2y$10$CRi5hgBUmI379T8E9n7nFOAZ3Hhg4rsOaVweNe7imCKBWGFGZgTva', 'EMPLEADO', 'ACTIVO', '2024-05-01 22:37:27'),
(13, 'BLANCA RODRIGUEZ JIMENEZ', 'blanquita@gmail.com', '$2y$10$2bPY2/yZo1FvgEknl64o5OD6PF8CI0JhPsmf8Ae6AtN8YvV/xQgvC', 'EMPLEADO', 'ACTIVO', '2024-05-01 22:52:48'),
(14, 'JOSE LUIS RODRIGUEZ JIMENEZ', 'admon@mjsolucionesenti.com', '$2y$10$Q5QtgoHS0dlSEcE7bvVxH.v2tTzUr5jDqVH81KZRVm0qlACxbOe5O', 'EMPLEADO', 'ACTIVO', '2024-05-01 23:02:53'),
(15, 'LAURA TORRES LINARES', 'lau@gmail.com', '$2y$10$I2Gyw8RnRT.1sH0gvP5v/ef6aMa4vleXX2Ymr0mzwgCkT8AgBp3ea', 'ADMIN', 'ACTIVO', '2024-05-01 23:14:32'),
(16, 'WILLIOM', 'asadoslafortaleza2381274286@gmail.com', '$2y$10$W4KmQ9Hgzau47RgBJVZ5wuANViwcHt2H0vk95rYIx2MOjwAYiWsn6', 'EMPLEADO', 'ACTIVO', '2024-05-01 23:18:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
