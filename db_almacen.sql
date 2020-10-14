-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 18:35:08
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
(1, 'Legumbres', 'Familia de las Leguminosas'),
(2, 'Semillas', 'Comestibles y tostadas'),
(3, 'Cereales', 'Snacks, desayuno, mix.'),
(4, 'Especias', 'Aromáticas'),
(5, 'Frutas secas', 'Energéticas'),
(6, 'Repostería', 'Decoración de tartas, pasteles, galletas, budines'),
(7, 'Celíacos', 'Todo tipo de alimento apto celíaco'),
(8, 'Gourmet', 'Alta cocina y a la cultura del buen comer');

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
(1, 'Poroto', 'Alubia', 300, 10, 1),
(2, 'Lentejas', 'Pequeñas', 300, 10, 1),
(3, 'Girasol', 'Origen: Argentina', 300, 10, 2),
(4, 'Chia clase A', 'Origen: China', 600, 32, 3),
(5, 'Sesamo', 'Tostada ', 400, 10, 2),
(6, 'Avena', 'Aplastada', 150, 10, 3),
(9, 'Provenzal', 'Origen: Argentina', 700, 10, 4),
(10, 'Nuez mariposa', 'Origen: Chile', 1100, 10, 5),
(11, 'Mani salado', 'Con cáscara', 100, 1000, 7),
(12, 'Dulce de leche', 'Origen: Argentina', 1000, 10, 6),
(13, 'Baño de chocolate', 'Origen: Argentina', 700, 10, 6),
(14, 'Tostadas de arroz', 'Origen: Argentina', 1100, 123, 7),
(15, 'Barra energizante', 'Origen: Argentina', 400, 10, 7),
(16, 'Leche de almendras', 'Origen: Argentina', 1100, 10, 8),
(17, 'Pasta de aceituna', 'Origen: Argentina', 400, 10, 8),
(18, 'Arroz', 'Carnaroli', 100, 200, 2),
(21, 'Arroz doble carolina', 'Origen: China', 100, 1000, 3),
(22, 'Pasta de nuez', 'Origen', 1000, 10, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'fedde.temudio@gmail.com', '$2y$12$iK5nHKSMaB4IVAqgMlHGZuOsr4di4gCUxecSpAtSifRD0q0nmClGe'),
(2, 'riannuzzi1980@gmail.com', '$2y$12$iK5nHKSMaB4IVAqgMlHGZuOsr4di4gCUxecSpAtSifRD0q0nmClGe');

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
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
