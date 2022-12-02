-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2022 a las 07:22:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `tipo_doc` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cuatri` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `año` year(4) NOT NULL,
  `fecha_hora_entrega` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivos` int(11) NOT NULL,
  `tipo_documento` int(11) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `size` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `ruta` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `extension` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `nom_archivos` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `clase` int(11) DEFAULT NULL,
  `periodo` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivos`, `tipo_documento`, `fecha_hora`, `size`, `ruta`, `extension`, `nom_archivos`, `clase`, `periodo`, `docente`) VALUES
(1, 1, '2022-10-23 22:09:38', '133766', '/sistemagestionutdv2/aplicacion/archivos/files/0364/VentajasDesventajas_SOA_MoranVazquez.pdf', 'pdf', 'VentajasDesventajas_SOA_MoranVazquez.pdf', 10, '0', 2),
(2, 3, '2022-10-23 22:09:47', '1904250', '/sistemagestionutdv2/aplicacion/archivos/files/0364/ActividadesyTareas_1erParcial_MiguelMoran.pdf', 'pdf', 'ActividadesyTareas_1erParcial_MiguelMoran.pdf', 10, '0', 2),
(5, 1, '2022-10-23 23:00:25', '1904250', '/sistemagestionutdv2/aplicacion/archivos/files/0364/ActividadesyTareas_1erParcial_MiguelMoran.pdf', 'pdf', 'ActividadesyTareas_1erParcial_MiguelMoran.pdf', 10, '0', 2),
(6, 2, '2022-11-10 22:33:46', '261405', '/sistemagestionutdV2/aplicacion/archivos/files/0364/MapaConceptual_MoranVazquez.pdf', 'pdf', 'MapaConceptual_MoranVazquez.pdf', 10, '0', 2),
(7, 1, '2022-11-10 23:10:28', '605778', '/sistemagestionutdV2/aplicacion/archivos/files/0364/Portada_Contenidos_MoranVazquez.pdf', 'pdf', 'Portada_Contenidos_MoranVazquez.pdf', 10, '0', 2),
(8, 4, '2022-11-11 01:05:09', '605778', '/sistemagestionutdV2/aplicacion/archivos/files/0364/Portada_Contenidos_MoranVazquez.pdf', 'pdf', 'Portada_Contenidos_MoranVazquez.pdf', 11, '0', 2),
(9, 4, '2022-11-11 01:49:39', '261405', '/sistemagestionutdV2/aplicacion/archivos/files/0364/MapaConceptual_MoranVazquez.pdf', 'pdf', 'MapaConceptual_MoranVazquez.pdf', 10, '0', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_c` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `modalidad` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_c`, `modalidad`) VALUES
(1, 'Tecnologias de la Informacion', 'clasica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clases` int(11) NOT NULL,
  `nombre_clase` text COLLATE utf8_spanish2_ci NOT NULL,
  `ciclo` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ano_c` year(4) NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  `docente` int(11) NOT NULL,
  `modalidad` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clases`, `nombre_clase`, `ciclo`, `ano_c`, `carrera`, `docente`, `modalidad`) VALUES
(10, 'Fundamentos TI', 'SEP_DIC', 2022, 1, 2, 'clasica'),
(11, 'Diseño de Apps', 'ENE_ABR', 2022, 1, 2, 'clasica'),
(12, 'Aplicaciones Web', 'ENE_ABR', 2022, 1, 13, 'clasica'),
(13, 'prueba', 'MAYO_AGO', 2022, 1, 13, 'clasica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_personales`
--

CREATE TABLE `doc_personales` (
  `id_doc` int(11) NOT NULL,
  `tipo_doc` int(11) DEFAULT NULL,
  `fecha_hora_doc` timestamp NULL DEFAULT NULL,
  `size_doc` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruta_doc` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `extension_doc` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nom_doc` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas_sugerencias`
--

CREATE TABLE `quejas_sugerencias` (
  `id_qj` int(11) NOT NULL,
  `no_empleado_qj` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `comentario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_hora_qj` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `quejas_sugerencias`
--

INSERT INTO `quejas_sugerencias` (`id_qj`, `no_empleado_qj`, `comentario`, `fecha_hora_qj`) VALUES
(3, '0364', 'Hola buen dia, esta excelente el sistema pero tengo un problema al activar el modo oscuro, se queda congelado.', '2022-10-27 05:15:49'),
(4, '0364', 'Hola', '2022-10-27 15:46:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_doc` int(11) NOT NULL,
  `nombre_tipo_doc` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_doc`, `nombre_tipo_doc`) VALUES
(1, 'Planeaciones'),
(2, 'Proyectos'),
(3, 'Examen1erParcial'),
(4, 'Examen2doParcial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc_personal`
--

CREATE TABLE `tipo_doc_personal` (
  `id_docpersonal` int(11) NOT NULL,
  `nombre_docpersonal` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_doc_personal`
--

INSERT INTO `tipo_doc_personal` (`id_docpersonal`, `nombre_docpersonal`) VALUES
(1, 'Cedula'),
(2, 'Titulo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `no_empleado` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `password_confirmacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto_perfil` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellidos`, `no_empleado`, `password_confirmacion`, `fecha_nacimiento`, `correo`, `foto_perfil`, `password`, `telefono`, `rol`, `estatus`) VALUES
(1, 'Miguel Angel', 'Moran Vazquez', '0366', '', '2003-05-04', 'miguel@gmail.com', '/sistemagestionutdV2/aplicacion/archivos/files/0366/225055571_4190329027710891_1165903252721425121_n.jpg', 'F9181F9D8A083EC016A18B7F75011C1D', '6182972425', 'admin', 'activo'),
(2, 'Omar Antonio', 'Gomez Arreola', '0364', '', '1980-10-19', 'omar@gmail.com', '/sistemagestionutdv2/aplicacion/archivos/files/0364/219500392_124117296905281_6066549230819146722_n.jpg', 'B21E9CBE354A156E53755AE837BB7C48', '6182315467', 'estandar', 'activo'),
(13, 'Dagoberto', 'Fiscal Gurrola', '0365', '0', '0000-00-00', 'dago@gmail.com', '0', 'CB398FD74399AF9573473FD53FC7E761', '6182133258', 'estandar', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivos`),
  ADD KEY `indx_archivo` (`id_archivos`),
  ADD KEY `docente` (`docente`),
  ADD KEY `clases2` (`clase`),
  ADD KEY `tipo_documento` (`tipo_documento`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clases`),
  ADD KEY `docente` (`docente`),
  ADD KEY `carreras` (`carrera`);

--
-- Indices de la tabla `doc_personales`
--
ALTER TABLE `doc_personales`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `docente` (`docente`),
  ADD KEY `doc_personales_ibfk_2` (`tipo_doc`);

--
-- Indices de la tabla `quejas_sugerencias`
--
ALTER TABLE `quejas_sugerencias`
  ADD PRIMARY KEY (`id_qj`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `tipo_doc_personal`
--
ALTER TABLE `tipo_doc_personal`
  ADD PRIMARY KEY (`id_docpersonal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clases` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `doc_personales`
--
ALTER TABLE `doc_personales`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quejas_sugerencias`
--
ALTER TABLE `quejas_sugerencias`
  MODIFY `id_qj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_doc_personal`
--
ALTER TABLE `tipo_doc_personal`
  MODIFY `id_docpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`docente`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_doc` (`id_doc`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`docente`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id_carrera`);

--
-- Filtros para la tabla `doc_personales`
--
ALTER TABLE `doc_personales`
  ADD CONSTRAINT `doc_personales_ibfk_1` FOREIGN KEY (`docente`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `doc_personales_ibfk_2` FOREIGN KEY (`tipo_doc`) REFERENCES `tipo_doc_personal` (`id_docpersonal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
