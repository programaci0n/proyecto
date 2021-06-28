-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2021 a las 02:31:46
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tablas`
--

CREATE TABLE `Tablas` (
  `Nombre(s)` text NOT NULL,
` date NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Doctor` text NOT NULL,
  `Consultorio` text NOT NULL,
  `E-mail` text NOT NULL,
  `Horario` text NOT NULL,
  `Mensaje` text NOT NULL,
  `Analisis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tablas`
--

INSERT INTO `Tablas` (`Nombre(s)`, `Fecha de Nacimiento`, `Telefono`, `Doctor`, `Consultorio`, `E-mail`, `Horario`, `Mensaje`, `Analisis`) VALUES
('Denise Ante', '1998-03-19', '3317140932', 'Samuel Hernandez', 'Av. México', 'denise.ante@alumnos.udg.mx', '19:00 hrs', 'Limpieza Dental', 'Ninguno');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
