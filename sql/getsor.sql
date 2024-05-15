-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2024 a las 17:59:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

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
-- Estructura de tabla para la tabla `agenda_citas`
--

CREATE TABLE `agenda_citas` (
  `id` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctor` varchar(255) NOT NULL,
  `id_nombre_seleccionado` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `ap_paterno` varchar(255) NOT NULL,
  `ap_materno` varchar(255) NOT NULL,
  `servicio_nombre` varchar(255) NOT NULL,
  `fecha_hora_estudio` datetime NOT NULL,
  `razon` text NOT NULL,
  `numero_expediente` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `compania` varchar(255) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda_citas`
--

INSERT INTO `agenda_citas` (`id`, `fecha_hora`, `doctor`, `id_nombre_seleccionado`, `nombre_cliente`, `ap_paterno`, `ap_materno`, `servicio_nombre`, `fecha_hora_estudio`, `razon`, `numero_expediente`, `precio`, `duracion`, `compania`, `estatus`) VALUES
(1, '2024-05-10 18:16:48', 'YOVANI GONZALEZ RODRIGUEZ ', 1, 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'RADIOGRAFÍA', '2024-05-11 12:16:00', 'DULE LA RODILLA', 1, '500.00', '1 HORA', 'COMPAÑIA 2', 'ACTIVO'),
(2, '2024-05-10 11:11:21', 'YOVANI GONZALEZ RODRIGUEZ ', 2, 'YOVANI', 'GONZALEZ', 'RODRIGUEZ', 'CONSULTA GENERAL', '2024-05-10 09:00:00', 'SENTIR CON SINTOMAS DE MAL ESTAR EN EL ESRTOMAGO', 2, '100.00', '30 MINUTOS', 'COMPAÑIA 1', 'ACTIVO'),
(3, '2024-05-10 11:23:52', 'YOVANI GONZALEZ RODRIGUEZ ', 1, 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'CONSULTA GENERAL', '2024-05-10 17:23:00', 'DOLOR DE ESTOMAGO', 1, '100.00', '30 MINUTOS', 'COMPAÑIA 1', 'ACTIVO'),
(4, '2024-05-10 16:56:20', 'YOVANI GONZALEZ RODRIGUEZ ', 3, 'LAURA', 'LINARES', 'DOMINGUEZ', 'EXAMEN DE SANGRE', '2024-05-11 10:55:00', 'SINTOMAS DE SALUD', 3, '150.00', '30 MINUTOS', 'COMPAÑIA 2', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto_registro`
--

CREATE TABLE `auto_registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ap_paterno` varchar(100) NOT NULL,
  `ap_materno` varchar(100) NOT NULL,
  `estatura` float NOT NULL,
  `alergias` varchar(255) NOT NULL,
  `enfermedades` varchar(255) NOT NULL,
  `fracturas` varchar(255) NOT NULL,
  `antecedentes` varchar(255) NOT NULL,
  `otros` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auto_registro`
--

INSERT INTO `auto_registro` (`id`, `nombre`, `ap_paterno`, `ap_materno`, `estatura`, `alergias`, `enfermedades`, `fracturas`, `antecedentes`, `otros`) VALUES
(1, 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 1.73, 'NINGUNA', 'NINGUNA', 'RODILLA', 'NINGUNA', ''),
(2, 'YOVANI', 'GONZALEZ', 'RODRIGUEZ', 1.62, 'NINGUNA', 'NINGUNA', 'BRAZO', 'INTERPENZO', 'DIABETES'),
(3, 'LAURA', 'LINARES', 'DOMINGUEZ', 1.6, 'SI', 'NINGUNA', 'NINGUNA', 'DIABETES', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compañia`
--

CREATE TABLE `compañia` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `sector_industrial` varchar(255) DEFAULT NULL,
  `direccion1` varchar(255) DEFAULT NULL,
  `direccion2` varchar(255) DEFAULT NULL,
  `sitio_web` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(10) DEFAULT NULL,
  `numero_interno` varchar(10) DEFAULT NULL,
  `numero_externo` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(5) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compañia`
--

INSERT INTO `compañia` (`id`, `id_empleado`, `nombre`, `email`, `telefono`, `sector_industrial`, `direccion1`, `direccion2`, `sitio_web`, `whatsapp`, `numero_interno`, `numero_externo`, `codigo_postal`, `ciudad`, `estatus`) VALUES
(7, 2, 'YOVANI GONZALEZ RODRIGUEZ ', 'compania1@gmail.com', '2222222222', 'MEDICO', '1111111111', '1111111', 'https://abastecedoralagranjita.com/', '1111111111', '1111111111', '1111111111', '75480', 'TECAMACHALCO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_empleado` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `numero_interno` varchar(10) DEFAULT NULL,
  `numero_externo` varchar(10) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `compania` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_empleado`, `nombre`, `telefono`, `categoria`, `direccion`, `numero_interno`, `numero_externo`, `codigo_postal`, `ciudad`, `estado`, `compania`) VALUES
(3, '2', 'YOVANI GONZALEZ RODRIGUEZ ', '2491753453', 'MÉDICO', '5 PONIENTE #3106 BARRIO DE JONETLAN', '1111111111', '109', '75480', 'PUEBLA', 'PUEBLA', 'COMPAÑIA 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre_imagen_login` varchar(255) NOT NULL,
  `nombre_imagen_recuperar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recuperacion`
--

INSERT INTO `recuperacion` (`id`, `nombre`, `correo`) VALUES
(12, 'YOVANI GONZALEZ RODRIGUEZ', 'yovanigonzar@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_clientes`
--

CREATE TABLE `registro_clientes` (
  `id` int(11) NOT NULL,
  `id_nombre_seleccionado` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `ap_paterno` varchar(255) NOT NULL,
  `ap_materno` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` enum('HOMBRE','MUJER') NOT NULL,
  `numero_expediente` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `numero_interno` varchar(10) DEFAULT NULL,
  `numero_externo` varchar(10) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `estatus` enum('ACTIVO') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_clientes`
--

INSERT INTO `registro_clientes` (`id`, `id_nombre_seleccionado`, `nombre`, `ap_paterno`, `ap_materno`, `telefono`, `fecha_nacimiento`, `genero`, `numero_expediente`, `direccion`, `numero_interno`, `numero_externo`, `codigo_postal`, `ciudad`, `whatsapp`, `estatus`, `fecha_creacion`) VALUES
(1, 1, 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', '2491753453', '1983-07-01', 'MUJER', '1', '3 PONIENTE', '3106', '', '75480', 'PUEBLA', '2221237654', 'ACTIVO', '2024-05-10 18:16:08'),
(2, 2, 'YOVANI', 'GONZALEZ', 'RODRIGUEZ', '2491753453', '2002-06-20', 'HOMBRE', '2', '5 PONIENTE #3106 BARRIO DE JONETLAN', '3106', '', '75480', 'PUEBLA', '2491753453', 'ACTIVO', '2024-05-10 23:10:36'),
(3, 3, 'LAURA', 'LINARES', 'DOMINGUEZ', '1111111111', '1978-02-03', 'MUJER', '3', '5 PONIENTE #3106 BARRIO DE JONETLAN', '3104', '', '75480', 'PUEBLA', '2222222222', 'ACTIVO', '2024-05-11 04:55:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_servicio` varchar(100) DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `estado_servicio` varchar(50) DEFAULT NULL,
  `compania` varchar(100) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `precio`, `categoria_servicio`, `duracion`, `estado_servicio`, `compania`, `estatus`, `creado_en`) VALUES
(3, 'ECOGRAFÍA', 'PROCEDIMIENTO EN EL QUE SE USAN ONDAS DE SONIDO DE ALTA ENERGÍA (ULTRASONIDOS) PARA OBSERVAR LOS TEJIDOS Y ÓRGANOS DEL INTERIOR DEL CUERPO.', '700.00', 'ECOGRAFÍA', '1 HORA', 'DISPONIBLE', 'COMPAÑIA 1', 'ACTIVO', '2024-05-09 14:55:22'),
(4, 'EXAMEN DE SANGRE', 'LAS PRUEBAS DE SANGRE SE USAN PARA MEDIR O ANALIZAR CÉLULAS, SUSTANCIAS QUÍMICAS, PROTEÍNAS Y OTROS COMPONENTES DE LA SANGRE. SON UNO DE LOS TIPOS MÁS COMUNES DE PRUEBAS DE LABORATORIO. SE SUELEN INCLUIR COMO PARTE DE LOS CHEQUEOS MÉDICOS DE RUTINA Y TAMBIÉN SE USAN PARA: DIAGNOSTICAR CIERTAS AFECCIONES Y ENFERMEDADES.', '150.00', 'EXAMEN DE SANGRE', '30 MINUTOS', 'DISPONIBLE', 'COMPAÑIA 2', 'ACTIVO', '2024-05-09 14:56:26'),
(5, 'CONSULTA GENERAL', 'LA CONSULTA GENERAL ES UN PROCEDIMIENTO, ACCIÓN O EXAMEN DESTINADO A OBTENER UN RESULTADO DIAGNÓSTICO O TERAPÉUTICO DEL PACIENTE', '100.00', 'CONSULTA GENERAL', '30 MINUTOS', 'DISPONIBLE', 'COMPAÑIA 1', 'ACTIVO', '2024-05-09 14:57:22'),
(6, 'RADIOGRAFÍA', 'UNA RADIOGRAFÍA ES UNA PRUEBA RÁPIDA E INDOLORA QUE TOMA IMÁGENES DE LAS ESTRUCTURAS INTERNAS DEL CUERPO, EN ESPECIAL DE LOS HUESOS.', '500.00', 'RADIOGRAFÍA', '1 HORA', 'DISPONIBLE', 'COMPAÑIA 2', 'ACTIVO', '2024-05-09 15:04:42'),
(7, 'CONSULTA GENERAL', 'CONSULTA GENERAL', '0.00', 'CONSULTA GENERAL', '30 MINUTOS', 'DISPONIBLE', 'COMPAÑIA 1', 'ACTIVO', '2024-05-11 05:00:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_diagnostico`
--

CREATE TABLE `tabla_diagnostico` (
  `id` int(11) NOT NULL,
  `expediente` int(11) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `ap_paterno` varchar(255) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `razon` varchar(255) DEFAULT NULL,
  `id_nombre_seleccionado` int(11) DEFAULT NULL,
  `resultados` text DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla_diagnostico`
--

INSERT INTO `tabla_diagnostico` (`id`, `expediente`, `servicio`, `nombre_cliente`, `ap_paterno`, `ap_materno`, `razon`, `id_nombre_seleccionado`, `resultados`, `fecha_creacion`) VALUES
(1, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'LA RODRILLA ESTA EN UNA POSICION MAL YA QUE PRESENTA UNA FRACTURA Y EL HUESO ESTA QUEBRADO', '2024-05-10 23:22:34'),
(2, 1, 'CONSULTA GENERAL', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DOLOR DE ESTOMAGO', 1, '', '2024-05-10 23:24:12'),
(3, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'LA RODILLA ESTA EN MAL ESTADO', '2024-05-11 04:09:58'),
(4, 2, 'CONSULTA GENERAL', 'YOVANI', 'GONZALEZ', 'RODRIGUEZ', 'SENTIR CON SINTOMAS DE MAL ESTAR EN EL ESRTOMAGO', 2, 'INFECCION DE ESTOMAGO', '2024-05-11 04:12:06'),
(5, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'LA RODRILLA ESTA EN UNA POSICION MAL YA QUE PRESENTA UNA FRACTURA Y EL HUESO ESTA QUEBRADO', '2024-05-11 04:14:21'),
(6, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'LA RODRILLA ESTA EN UNA POSICION MAL YA QUE PRESENTA UNA FRACTURA Y EL HUESO ESTA QUEBRADO', '2024-05-11 04:15:50'),
(7, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'INFECCION DE ESTOMAGO', '2024-05-11 04:16:54'),
(8, 1, 'CONSULTA GENERAL', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DOLOR DE ESTOMAGO', 1, 'INFECCION DE ESTOMAGO', '2024-05-11 04:19:11'),
(9, 2, 'CONSULTA GENERAL', 'YOVANI', 'GONZALEZ', 'RODRIGUEZ', 'SENTIR CON SINTOMAS DE MAL ESTAR EN EL ESRTOMAGO', 2, 'INFECCION DE ESTOMAGO, PRESENTA SIGNOS DE IRRITACION Y MAL COMPORTAMNIENTO EN SU HIGADO', '2024-05-11 04:26:50'),
(10, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'INFECCION DE ESTOMAGO, PRESENTA SIGNOS DE IRRITACION Y MAL COMPORTAMNIENTO EN SU HIGADO', '2024-05-11 04:37:17'),
(11, 1, 'CONSULTA GENERAL', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DOLOR DE ESTOMAGO', 1, 'LA RODILLA ESTA EN MAL ESTADO', '2024-05-11 04:38:53'),
(12, 3, 'EXAMEN DE SANGRE', 'LAURA', 'LINARES', 'DOMINGUEZ', 'SINTOMAS DE SALUD', 3, ' CELULAS DE CELL CON LAS DE MAJINBOO Y GOKU Y VEGETA', '2024-05-11 04:58:09'),
(13, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'LA RODILLA ESTA EN MAL ESTADO', '2024-05-11 05:22:34'),
(14, 1, 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'INFECCION DE ESTOMAGO, PRESENTA SIGNOS DE IRRITACION Y MAL COMPORTAMNIENTO EN SU HIGADO', '2024-05-11 05:26:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_tratamiento`
--

CREATE TABLE `tabla_tratamiento` (
  `id` int(11) NOT NULL,
  `expediente` varchar(100) DEFAULT NULL,
  `servicio` varchar(100) DEFAULT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL,
  `ap_paterno` varchar(100) DEFAULT NULL,
  `ap_materno` varchar(100) DEFAULT NULL,
  `razon` text DEFAULT NULL,
  `id_nombre_seleccionado` int(11) DEFAULT NULL,
  `resultados` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `recomendaciones` text DEFAULT NULL,
  `medicamentos` text DEFAULT NULL,
  `progreso` text DEFAULT NULL,
  `folio_diagnostico` varchar(100) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla_tratamiento`
--

INSERT INTO `tabla_tratamiento` (`id`, `expediente`, `servicio`, `nombre_cliente`, `ap_paterno`, `ap_materno`, `razon`, `id_nombre_seleccionado`, `resultados`, `descripcion`, `recomendaciones`, `medicamentos`, `progreso`, `folio_diagnostico`, `fecha_inicio`, `fecha_fin`, `fecha_creacion`) VALUES
(1, '1', 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'INFECCION DE ESTOMAGO, PRESENTA SIGNOS DE IRRITACION Y MAL COMPORTAMNIENTO EN SU HIGADO', 'LA RODILLA LE DUELE POR EL DESGASTE', 'USARLA POR 2 SEMANAS Y VENIR DESPUES DE 2 SEMANAS', 'NEUMELIBRINA DE 500g', 'COMENZANDO 1%', '1', '2024-05-10', '2024-05-25', '2024-05-11 06:00:05'),
(2, '1', 'RADIOGRAFÍA', 'BLANCA', 'RODRIGUEZ ', 'JIMENEZ', 'DULE LA RODILLA', 1, 'INFECCION DE ESTOMAGO, PRESENTA SIGNOS DE IRRITACION Y MAL COMPORTAMNIENTO EN SU HIGADO', 'Aa', 'aa', 'AA', '1', '2', '2024-05-11', '2024-05-11', '2024-05-11 06:00:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `rol` enum('ADMIN','EMPLEADO') NOT NULL,
  `estatus` enum('ACTIVO','INACTIVO') NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `usuario`, `rol`, `estatus`, `fecha_hora`) VALUES
(1, 'LAURA TORRES LINARES', 'lau@gmail.com', '$2y$10$6JOXjj9Oijo31Nq3lsil1enE7JV4yDtOwQ9ORcH2qvTRHCdaPpr0G', 'LAURITA', 'ADMIN', 'ACTIVO', '2024-05-07 09:48:15'),
(2, 'YOVANI GONZALEZ RODRIGUEZ ', 'giovanigonza88@gmail.com', '$2y$10$1lvH8kbSPLXJaKrHgZ0NGetJXpLSuvX9nYb/BGrQERaEwqJI5/NJa', 'GIO', 'EMPLEADO', 'ACTIVO', '2024-05-07 09:48:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda_citas`
--
ALTER TABLE `agenda_citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auto_registro`
--
ALTER TABLE `auto_registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compañia`
--
ALTER TABLE `compañia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `registro_clientes`
--
ALTER TABLE `registro_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_diagnostico`
--
ALTER TABLE `tabla_diagnostico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_tratamiento`
--
ALTER TABLE `tabla_tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda_citas`
--
ALTER TABLE `agenda_citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `auto_registro`
--
ALTER TABLE `auto_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compañia`
--
ALTER TABLE `compañia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recuperacion`
--
ALTER TABLE `recuperacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `registro_clientes`
--
ALTER TABLE `registro_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tabla_diagnostico`
--
ALTER TABLE `tabla_diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tabla_tratamiento`
--
ALTER TABLE `tabla_tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
