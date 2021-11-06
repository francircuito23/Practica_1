-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2021 a las 12:11:16
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_service` int(50) NOT NULL,
  `id_veh` varchar(50) NOT NULL,
  `NomServicio` varchar(100) NOT NULL,
  `Descripción` varchar(100) NOT NULL,
  `Fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_service`, `id_veh`, `NomServicio`, `Descripción`, `Fecha`) VALUES
(1, '', 'Cambio_de_acite', 'Mi coche no funciona bien', '2021-10-27'),
(2, '', 'Cambio_de_freno', 'Hola buenas, mi coche no va bien', '2021-10-27'),
(3, '', 'Pinchazo', '', '2021-10-31'),
(1, '1', 'Cambio de aceite', 'Mi coche no va', '2021-11-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `login`, `password`) VALUES
(1, 'Joan', 'joan123'),
(2, 'fran', 'fran123'),
(3, 'miguel', 'miguel123'),
(4, 'Juanma', 'juanma123'),
(5, 'Pablo', 'pablo123'),
(6, 'Juanfran', 'juanfran123'),
(9, 'Adrián', 'Adri123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_veh` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `combustible` varchar(50) NOT NULL,
  `tipo_motor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_veh`, `id_user`, `marca`, `modelo`, `matricula`, `combustible`, `tipo_motor`) VALUES
('1', '1', 'Ford', 'Kuga', '2708_HZH', 'Diesel', 'Motor_Diesel'),
('2', '1', 'Audi', 'Q8', '4875_LMX', 'Diesel', 'Motor_Diesel'),
('3', '1', 'BMW', 'X6', '3962 LKK', 'Diesel', 'Motor_Diesel'),
('4', '2', 'Ford', 'Raptor', '2974_LYZ', 'Diesel', 'Motor_Diesel'),
('5', '2', 'Mazda', 'RX7', '0437_CVX', 'Diesel', 'Motor_Diesel'),
('6', '1', 'Yamaha', 'T-MAX', '1912_LDC', 'Diesel', 'Motor_Diesel'),
('7', '3', 'Lamborghini', 'Urus', '4303_LSX', 'Diesel', 'Motor_Diesel'),
('8', '1', 'Mercedes Benz', 'GLE_Coupé', '2021_LXV', 'Diesel', 'Motor_Diesel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_veh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
