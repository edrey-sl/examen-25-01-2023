-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2023 a las 01:30:49
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_univer_prodesat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alumnos`
--

CREATE TABLE `cat_alumnos` (
  `iCodigoAlumno` int(4) NOT NULL,
  `vchNombres` varchar(50) NOT NULL,
  `vchApellidos` varchar(50) NOT NULL,
  `dtFechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_alumnos`
--

INSERT INTO `cat_alumnos` (`iCodigoAlumno`, `vchNombres`, `vchApellidos`, `dtFechaNac`) VALUES
(1234, 'Martin Edrey', 'Salinas Luna', '1995-08-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materias`
--

CREATE TABLE `cat_materias` (
  `vchCodigoMateria` varchar(5) NOT NULL,
  `vchMateria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_materias`
--

INSERT INTO `cat_materias` (`vchCodigoMateria`, `vchMateria`) VALUES
('MA101', 'Español'),
('MA102', 'Matemáticas'),
('MA103', 'Biologia'),
('MA104', 'Ciencias Naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rel_alumno_materia`
--

CREATE TABLE `cat_rel_alumno_materia` (
  `iCodigoAlumno` int(4) NOT NULL,
  `vchCodigoMateria` varchar(5) NOT NULL,
  `fCalificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_rel_alumno_materia`
--

INSERT INTO `cat_rel_alumno_materia` (`iCodigoAlumno`, `vchCodigoMateria`, `fCalificacion`) VALUES
(1234, 'MA101', 8.4),
(1234, 'MA102', 9.5),
(1234, 'MA103', 7.4),
(1234, 'MA104', 7.8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_alumnos`
--
ALTER TABLE `cat_alumnos`
  ADD PRIMARY KEY (`iCodigoAlumno`);

--
-- Indices de la tabla `cat_materias`
--
ALTER TABLE `cat_materias`
  ADD PRIMARY KEY (`vchCodigoMateria`);

--
-- Indices de la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD KEY `cat_rel_cat_Alumnos` (`iCodigoAlumno`),
  ADD KEY `cat_rel_cat_materias` (`vchCodigoMateria`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD CONSTRAINT `cat_rel_cat_Alumnos` FOREIGN KEY (`iCodigoAlumno`) REFERENCES `cat_alumnos` (`iCodigoAlumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_rel_cat_materias` FOREIGN KEY (`vchCodigoMateria`) REFERENCES `cat_materias` (`vchCodigoMateria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
