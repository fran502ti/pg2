-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2024 a las 07:41:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisgestionescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id_asignacion` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id_asignacion`, `docente_id`, `grado_id`, `materia_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(19, 11, 7, 13, '2024-10-06 00:00:00', NULL, '1'),
(20, 11, 7, 14, '2024-10-06 00:00:00', NULL, '1'),
(21, 11, 7, 15, '2024-10-06 00:00:00', NULL, '1'),
(22, 11, 7, 16, '2024-10-06 00:00:00', NULL, '1'),
(23, 10, 8, 14, '2024-10-06 00:00:00', NULL, '1'),
(24, 10, 8, 13, '2024-10-06 00:00:00', NULL, '1'),
(25, 10, 8, 15, '2024-10-06 00:00:00', NULL, '1'),
(26, 10, 8, 16, '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificaciones` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nota1` varchar(5) NOT NULL,
  `nota2` varchar(5) NOT NULL,
  `nota3` varchar(5) NOT NULL,
  `nota4` varchar(5) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificaciones`, `docente_id`, `estudiante_id`, `materia_id`, `nota1`, `nota2`, `nota3`, `nota4`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(2, 10, 9, 13, '75', '', '', '', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_institucion`
--

CREATE TABLE `configuracion_institucion` (
  `id_config_institucion` int(11) NOT NULL,
  `nombre_institucion` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion_institucion`
--

INSERT INTO `configuracion_institucion` (`id_config_institucion`, `nombre_institucion`, `logo`, `direccion`, `telefono`, `correo`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(3, 'EORM CANTON CHULUMAL II', '2024-10-06-22-14-58images.jpg', 'CANTON CHULUMAL II, CHICHICASTENANGO, EL QUICHE', '49427408', 'ESCUELA@EORMCH2.EDU.GT', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `antiguedad` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `persona_id`, `antiguedad`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(10, 20, '15', '2024-10-06 00:00:00', NULL, '1'),
(11, 22, '12', '2024-10-06 00:00:00', NULL, '1'),
(12, 23, '12', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `persona_id`, `grado_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(9, 21, 8, '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1'),
(10, 24, 7, '2024-10-06 00:00:00', NULL, '1'),
(11, 25, 8, '2024-10-06 00:00:00', NULL, '1'),
(12, 26, 7, '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiones`
--

CREATE TABLE `gestiones` (
  `id_gestion` int(11) NOT NULL,
  `gestion` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gestiones`
--

INSERT INTO `gestiones` (`id_gestion`, `gestion`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(13, 'CICLO ESCOLAR 2024', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL,
  `gestion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `curso`, `seccion`, `fyh_creacion`, `fyh_actualizacion`, `estado`, `gestion_id`) VALUES
(7, 'PRIMERO', 'A', '2024-10-06 00:00:00', NULL, '1', 13),
(8, 'SEGUNDO', 'A', '2024-10-06 00:00:00', NULL, '1', 13),
(9, 'SEGUNDO', 'B', '2024-10-06 00:00:00', NULL, '1', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(13, 'COMUNICACION Y LENGUAJE L-1', '2024-10-06 00:00:00', NULL, '1'),
(14, 'COMUNICACIÓN Y LENGUAJE L-2', '2024-10-06 00:00:00', NULL, '1'),
(15, 'COMUNICACION Y LENGUAJE L-3', '2024-10-06 00:00:00', NULL, '1'),
(16, 'MATEMATICAS', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre_url` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre_url`, `url`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'Configuraciones - Institucion', '/admin/configuraciones/institucion/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(2, 'Configuraciones - Institucion - Create', '/admin/configuraciones/institucion/create.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(3, 'Grados', '/admin/grados/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(4, 'Grados - Create', '/admin/grados/create.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(5, 'Materias', '/admin/materias/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(6, 'Materias - Create', '/admin/materias/create.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(9, 'Usuarios', '/admin/usuarios/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(11, 'Docentes', '/admin/docentes/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(12, 'Docentes - Create', '/admin/docentes/create.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(13, 'Asignaciones', '/admin/docentes/asignacion.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(14, 'Inscripciones', '/admin/inscripciones/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(15, 'Inscripciones - Create', '/admin/inscripciones/create.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(16, 'Estudiantes', '/admin/estudiantes/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(17, 'Usuarios - Create', '/admin/usuarios/create.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(18, 'Calificaciones', '/admin/calificaciones/index.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(19, 'Permisos', '/admin/roles/permisos.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(20, 'Permisos - Create', '/admin/roles/create_permisos.php', '2024-10-05 00:00:00', '2024-10-05 00:00:00', '1'),
(21, 'Configuraciones', '/admin/configuraciones/index.php', '2024-10-05 00:00:00', NULL, '1'),
(22, 'Principal', '/admin/index.php', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1'),
(23, 'Configuraciones - Show', '/admin/configuraciones/institucion/show.php', '2024-10-06 00:00:00', NULL, '1'),
(24, 'Configuraciones - Edit', '/admin/configuraciones/institucion/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(25, 'Configuraciones - Gestion', '/admin/configuraciones/gestion/index.php', '2024-10-06 00:00:00', NULL, '1'),
(26, 'Configuraciones - Gestion - Create', '/admin/configuraciones/gestion/create.php', '2024-10-06 00:00:00', NULL, '1'),
(27, 'Configuraciones - Gestion - Show', '/admin/configuraciones/gestion/show.php', '2024-10-06 00:00:00', NULL, '1'),
(28, 'Configuraciones - Gestion - Edit', '/admin/configuraciones/gestion/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(30, 'Permisos - Edit', '/admin/roles/edit_permiso.php', '2024-10-06 00:00:00', NULL, '1'),
(31, 'Grados - Edit', '/admin/grados/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(32, 'Grados - Show', '/admin/grados/show.php', '2024-10-06 00:00:00', NULL, '1'),
(33, 'Materias - Show', '/admin/materias/show.php', '2024-10-06 00:00:00', NULL, '1'),
(34, 'Materias - Edit', '/admin/materias/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(35, 'Docentes - Show', '/admin/docentes/show.php', '2024-10-06 00:00:00', NULL, '1'),
(36, 'Docentes - Edit', '/admin/docentes/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(39, 'Usuarios - Show', '/admin/usuarios/show.php', '2024-10-06 00:00:00', NULL, '1'),
(40, 'Usuarios - Edit', '/admin/usuarios/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(41, 'Estudiantes - Show', '/admin/estudiantes/show.php', '2024-10-06 00:00:00', NULL, '1'),
(42, 'Estudiantes - Edit', '/admin/estudiantes/edit.php', '2024-10-06 00:00:00', NULL, '1'),
(43, 'Calificaciones - Subir Notas', '/admin/calificaciones/create.php', '2024-10-06 00:00:00', NULL, '1'),
(44, 'Roles', '/admin/roles/index.php', '2024-10-06 00:00:00', NULL, '1'),
(45, 'Roles - Create', '/admin/roles/create.php', '2024-10-06 00:00:00', NULL, '1'),
(46, 'Roles - Show', '/admin/roles/show.php', '2024-10-06 00:00:00', NULL, '1'),
(47, 'Roles - Edit', '/admin/roles/edit.php', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cui` varchar(13) NOT NULL,
  `fecha_nacimiento` varchar(20) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `usuario_id`, `nombres`, `apellidos`, `cui`, `fecha_nacimiento`, `profesion`, `direccion`, `celular`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'Abner Adonias Francisco', 'Tian Ixtan', '3083675291406', '25-10-1999', 'Ingeniero', 'Canton Chulumal III, Chichicastenango, El Quiche', '39056626', '2024-09-24 22:39:00', NULL, '1'),
(20, 21, 'OFELIA', 'TIAN IXTAN', '1234123451234', '1985-11-21', 'PROFESORA DE ENSEÑANZA MEDIA', 'CANTÓN CHULUMAL PRIMERO, CHICHICASTENANGO, EL QUICHÉ', '44776587', '2024-10-06 00:00:00', NULL, '1'),
(21, 22, 'CALEB JOSHUA', 'NIX TIAN', '1234123451234', '2015-08-12', 'ESTUDIANTE', 'CANTÓN CHULUMAL PRIMERO, CHICHICASTENANGO, EL QUICHÉ', '12345678', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1'),
(22, 23, 'JOSEFA', 'TIRIQUIZ AGUILAR', '1234123451234', '1982-07-12', 'MAESTRA DE EDUCACIÓN PRIMARIA', 'CANTÓN CHULUMAL TERCERO, CHICHICASTENANGO, EL QUICHÉ', '12345678', '2024-10-06 00:00:00', NULL, '1'),
(23, 24, 'WERNER', 'MORALES', '1234123451234', '1983-02-12', 'MAESTRO DE EDUCACIÓN PRIMARIA', 'CANTÓN CHICUA I, CHICHICASTENANGO, EL QUICHÉ', '12345678', '2024-10-06 00:00:00', NULL, '1'),
(24, 25, 'ADRIANA GUISELLE', 'TIAN TIRIQUIZ', '1234123451234', '2016-06-06', 'ESTUDIANTE', 'CANTÓN CHULUMAL III, CHICHICASTENANGO, EL QUICHÉ', '12345678', '2024-10-06 00:00:00', NULL, '1'),
(25, 26, 'GRACE ABIGAIL', 'IXTUC TIAN', '1234123451234', '2016-10-25', 'ESTUDIANTE', 'CANTON CHULUMAL III, CHICHICASTENANGO, EL QUICHE', '12345678', '2024-10-06 00:00:00', NULL, '1'),
(26, 27, 'MERY MELANY ANABELLY', 'IXTUC TIAN', '1234123451234', '2012-03-08', 'ESTUDIANTE', 'CANTÓN CHULUMAL III, CHICHICASTENANGO, EL QUICHÉ', '12345678', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppffs`
--

CREATE TABLE `ppffs` (
  `id_ppff` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `nombres_apellidos_ppff` varchar(50) NOT NULL,
  `cui_ppff` varchar(15) NOT NULL,
  `celular_ppff` varchar(8) NOT NULL,
  `ocupacion_ppff` varchar(50) NOT NULL,
  `ref_nombre` varchar(50) NOT NULL,
  `ref_parentesco` varchar(50) NOT NULL,
  `ref_celular` varchar(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ppffs`
--

INSERT INTO `ppffs` (`id_ppff`, `estudiante_id`, `nombres_apellidos_ppff`, `cui_ppff`, `celular_ppff`, `ocupacion_ppff`, `ref_nombre`, `ref_parentesco`, `ref_celular`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(9, 9, 'OFELIA TIÁN IXTÁN', '1234123451234', '44776587', 'MAESTRA DE EDUCACIÓN PRIMARIA', 'JUAN JOSÉ NIX REN', 'ESPOSO', '50097660', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1'),
(10, 10, 'KAREN TIRIQUIZ LION', '1234123451234', '12345678', 'COMERCIANTE', 'EDGAR ELIAS TIAN IXTÁN', 'ESPOSO', '12345678', '2024-10-06 00:00:00', NULL, '1'),
(11, 11, 'MICAELA TIÁN IXTÁN', '1234123451234', '12345678', 'COMERCIANTE', 'CARLOS IXTUC SALVADOR', 'ESPOSO', '12345678', '2024-10-06 00:00:00', NULL, '1'),
(12, 12, 'MICAELA TIÁN IXTÁN', '1234123451234', '12345678', 'COMERCIANTE', 'CARLOS IXTUC SALVADOR', 'ESPOSO', '12345678', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'ADMINISTRADOR', '2024-08-27 21:31:21', NULL, '1'),
(3, 'DOCENTE', '2024-08-27 21:31:21', NULL, '1'),
(13, 'DIRECTOR', '2024-10-05 00:00:00', NULL, '1'),
(15, 'ESTUDIANTE', '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `id_rol_permiso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles_permisos`
--

INSERT INTO `roles_permisos` (`id_rol_permiso`, `rol_id`, `permiso_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 13, 13, '2024-10-05 00:00:00', NULL, '1'),
(2, 3, 18, '2024-10-05 00:00:00', NULL, '1'),
(3, 1, 13, '2024-10-05 00:00:00', NULL, '1'),
(4, 1, 1, '2024-10-05 00:00:00', NULL, '1'),
(5, 1, 2, '2024-10-05 00:00:00', NULL, '1'),
(6, 1, 11, '2024-10-05 00:00:00', NULL, '1'),
(7, 1, 12, '2024-10-05 00:00:00', NULL, '1'),
(8, 1, 16, '2024-10-05 00:00:00', NULL, '1'),
(9, 1, 3, '2024-10-05 00:00:00', NULL, '1'),
(10, 1, 4, '2024-10-05 00:00:00', NULL, '1'),
(11, 1, 14, '2024-10-05 00:00:00', NULL, '1'),
(12, 1, 15, '2024-10-05 00:00:00', NULL, '1'),
(13, 1, 5, '2024-10-05 00:00:00', NULL, '1'),
(14, 1, 6, '2024-10-05 00:00:00', NULL, '1'),
(17, 1, 9, '2024-10-05 00:00:00', NULL, '1'),
(18, 1, 17, '2024-10-05 00:00:00', NULL, '1'),
(19, 13, 1, '2024-10-05 00:00:00', NULL, '1'),
(20, 13, 11, '2024-10-05 00:00:00', NULL, '1'),
(21, 13, 16, '2024-10-05 00:00:00', NULL, '1'),
(22, 13, 3, '2024-10-05 00:00:00', NULL, '1'),
(23, 13, 14, '2024-10-05 00:00:00', NULL, '1'),
(24, 13, 15, '2024-10-05 00:00:00', NULL, '1'),
(25, 13, 5, '2024-10-05 00:00:00', NULL, '1'),
(28, 13, 12, '2024-10-05 00:00:00', NULL, '1'),
(29, 13, 6, '2024-10-05 00:00:00', NULL, '1'),
(30, 1, 19, '2024-10-05 00:00:00', NULL, '1'),
(31, 1, 20, '2024-10-05 00:00:00', NULL, '1'),
(32, 1, 18, '2024-10-05 00:00:00', NULL, '1'),
(33, 3, 16, '2024-10-05 00:00:00', NULL, '1'),
(34, 3, 14, '2024-10-05 00:00:00', NULL, '1'),
(35, 3, 15, '2024-10-05 00:00:00', NULL, '1'),
(36, 3, 13, '2024-10-05 00:00:00', NULL, '1'),
(37, 3, 11, '2024-10-05 00:00:00', NULL, '1'),
(39, 1, 22, '2024-10-06 00:00:00', NULL, '1'),
(40, 3, 22, '2024-10-06 00:00:00', NULL, '1'),
(41, 13, 22, '2024-10-06 00:00:00', NULL, '1'),
(42, 13, 21, '2024-10-06 00:00:00', NULL, '1'),
(43, 1, 21, '2024-10-06 00:00:00', NULL, '1'),
(44, 1, 23, '2024-10-06 00:00:00', NULL, '1'),
(45, 1, 24, '2024-10-06 00:00:00', NULL, '1'),
(46, 1, 25, '2024-10-06 00:00:00', NULL, '1'),
(47, 1, 26, '2024-10-06 00:00:00', NULL, '1'),
(48, 1, 27, '2024-10-06 00:00:00', NULL, '1'),
(49, 1, 28, '2024-10-06 00:00:00', NULL, '1'),
(50, 1, 30, '2024-10-06 00:00:00', NULL, '1'),
(51, 1, 31, '2024-10-06 00:00:00', NULL, '1'),
(52, 1, 32, '2024-10-06 00:00:00', NULL, '1'),
(53, 1, 34, '2024-10-06 00:00:00', NULL, '1'),
(54, 1, 33, '2024-10-06 00:00:00', NULL, '1'),
(55, 1, 36, '2024-10-06 00:00:00', NULL, '1'),
(56, 1, 35, '2024-10-06 00:00:00', NULL, '1'),
(59, 1, 40, '2024-10-06 00:00:00', NULL, '1'),
(60, 1, 39, '2024-10-06 00:00:00', NULL, '1'),
(61, 1, 42, '2024-10-06 00:00:00', NULL, '1'),
(62, 1, 41, '2024-10-06 00:00:00', NULL, '1'),
(63, 3, 43, '2024-10-06 00:00:00', NULL, '1'),
(64, 3, 41, '2024-10-06 00:00:00', NULL, '1'),
(65, 13, 23, '2024-10-06 00:00:00', NULL, '1'),
(66, 13, 25, '2024-10-06 00:00:00', NULL, '1'),
(67, 13, 27, '2024-10-06 00:00:00', NULL, '1'),
(68, 13, 36, '2024-10-06 00:00:00', NULL, '1'),
(69, 13, 35, '2024-10-06 00:00:00', NULL, '1'),
(70, 13, 42, '2024-10-06 00:00:00', NULL, '1'),
(71, 13, 41, '2024-10-06 00:00:00', NULL, '1'),
(72, 13, 31, '2024-10-06 00:00:00', NULL, '1'),
(73, 13, 32, '2024-10-06 00:00:00', NULL, '1'),
(74, 13, 34, '2024-10-06 00:00:00', NULL, '1'),
(75, 13, 33, '2024-10-06 00:00:00', NULL, '1'),
(76, 13, 26, '2024-10-06 00:00:00', NULL, '1'),
(77, 13, 28, '2024-10-06 00:00:00', NULL, '1'),
(78, 1, 44, '2024-10-06 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `email`, `password`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'admin@admin.com', '$2y$10$O7FjnoTx4IafCnL8TfVQ9uW4XamWwmfOawzTaOWvrbsYoU2mWF9/y', '2023-08-16 22:39:00', '2024-10-04 00:00:00', '1'),
(21, 3, 'johnofel21@gmail.com', '$2y$10$5dbTnmT8xshKJnGKNmYaUO4.3/S04xJsD/U5.Xyh9FZtdDmOhUCp6', '2024-10-06 00:00:00', NULL, '1'),
(22, 15, 'calebjo@gmail.com', '$2y$10$Wdlh0iXmvH9IJxW0YkdgS.Qpll0hm/W/K0Vl8gwiHUO6xKnDc91hO', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1'),
(23, 3, 'josefati@gmail.com', '$2y$10$Fajd9SkBNP3Qf0xPGOAEbuANMeq/UgQQZTRLYyuK5s1O4597heWLi', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '1'),
(24, 13, 'wermo@gmail.com', '$2y$10$5/Xy3nhiaO.PmqyUNvcgfu9RJOdyLBq/U10AQcG2W4xU8gIog1xhq', '2024-10-06 00:00:00', NULL, '1'),
(25, 15, 'adrigui@gmail.com', '$2y$10$/9ejtNSbu2jP9Hhfau72F.3LLi3IHgtojh7AWt4egJ5fNvSM0Ho/S', '2024-10-06 00:00:00', NULL, '1'),
(26, 15, 'gracab@gmail.com', '$2y$10$yzRMTttz0gNx2lTbyikOtuyA4j23K/vmg5BNB7zslEXsxEo0oHO2O', '2024-10-06 00:00:00', NULL, '1'),
(27, 15, 'merym@gmail.com', '$2y$10$OWDjzOP6EkPQ8dDOBAbQAeKFhdCFBHJj8rpg8CN6oHQ9DFx.VYcYq', '2024-10-06 00:00:00', NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificaciones`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `docente_id` (`docente_id`);

--
-- Indices de la tabla `configuracion_institucion`
--
ALTER TABLE `configuracion_institucion`
  ADD PRIMARY KEY (`id_config_institucion`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `gestiones`
--
ALTER TABLE `gestiones`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `fk_gestion` (`gestion_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  ADD PRIMARY KEY (`id_ppff`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indices de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD PRIMARY KEY (`id_rol_permiso`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `permiso_id` (`permiso_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configuracion_institucion`
--
ALTER TABLE `configuracion_institucion`
  MODIFY `id_config_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `gestiones`
--
ALTER TABLE `gestiones`
  MODIFY `id_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  MODIFY `id_ppff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  MODIFY `id_rol_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `fk_gestion` FOREIGN KEY (`gestion_id`) REFERENCES `gestiones` (`id_gestion`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ppffs`
--
ALTER TABLE `ppffs`
  ADD CONSTRAINT `ppffs_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id_permiso`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
