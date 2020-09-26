-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2020 a las 21:59:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Legumbres', 'Se denomina legumbre a la semilla contenida en las plantas de la familia de las Leguminosas.'),
(2, 'Semillas', 'Aportan sabor y color a preparaciones dulces y saladas.'),
(3, 'Cereales', 'Los cereales son plantas de la familia de las poáceas cultivadas por su grano.'),
(4, 'Especias', 'Especia, ​ también llamada condimento es el nombre dado a ciertos aromas de origen vegetal, que se u'),
(5, 'Frutas secas', 'Los frutos secos son llamados así porque todos tienen una característica en común: en su composición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `id_categoria`) VALUES
(1, 'Poroto', 'Origen : Argentina.', 300, 10, 1),
(2, 'Lentejas', 'Origen : Argentina.', 300, 10, 1),
(3, 'Girasol', 'Origen : Argentina.', 300, 10, 2),
(4, 'Chia', 'Origen : Argentina.', 500, 10, 2),
(5, 'Sesamo', 'Origen : Argentina.', 400, 10, 2),
(6, 'Avena', 'Origen : Argentina.', 150, 10, 3),
(7, 'Arroz', 'Origen : Argentina.', 100, 10, 3),
(8, 'Pimenton', 'Origen : Argentina.', 1000, 10, 4),
(9, 'Provenzal', 'Origen : Argentina.', 700, 10, 4),
(10, 'Nuez mariposa', 'Origen : Argentina.', 1100, 10, 5),
(11, 'Mani', 'Origen : Argentina.', 400, 10, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
