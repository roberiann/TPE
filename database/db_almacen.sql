-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 13:08:25
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
(3, 'Cereales', 'Snacks, desayuno, mix, etc'),
(4, 'Especias', 'Aromáticas'),
(5, 'Frutas secas', 'Energéticas, etc'),
(6, 'Repostería', 'Decoración de tartas, pasteles, galletas, budines'),
(7, 'Celíacos', 'Todo tipo de alimento apto celíaco.'),
(8, 'Gourmet', 'Alta cocina y a la cultura del buen comer'),
(21, 'Varios', 'Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `descripcion`, `calificacion`, `id_producto`, `id_usuario`) VALUES
(38, 'Muy bueno!', 1, 6, 1),
(44, 'Coment', 1, 13, 2),
(45, 'Coment', 1, 14, 2),
(46, 'Excelente', 5, 18, 1),
(52, 'Muy bueno', 1, 18, 1),
(53, 'Muy bueno', 4, 1, 2),
(54, 'Regular', 3, 9, 2),
(55, 'Regular', 3, 16, 2);

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
  `imagen` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `id_categoria`) VALUES
(1, 'Poroto', 'Alubia', 300, 10, 'images/5fc69be98484e2.07292848.jpg', 1),
(6, 'Chia', 'Aplastada', 150, 10, 'images/5fc69b05a86655.99730719.jpg', 3),
(9, 'Provenzal', 'Origen: Argentina', 700, 10, 'images/5fc69bfcde63a3.41524090.jpg', 4),
(10, 'Nuez mariposa', 'Origen: Chile', 1100, 10, 'images/5fc69bb3ae7df3.48504565.png', 5),
(13, 'Dulce de leche', 'Repostero', 700, 10, 'images/5fc69b1aeb9769.14148919.jpg', 6),
(14, 'Tostadas de arroz', 'Origen: Argentina', 1100, 123, 'images/5fc69c4dbcd9b3.52910153.png', 7),
(16, 'Pimentón especial', 'Origen: Argentina', 1100, 10, 'images/5fc69bcf5ba051.84125493.png', 8),
(18, 'Arroz', 'Carnaroli', 100, 200, 'images/5fc69a6453a093.17322659.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `admin`) VALUES
(1, 'Federico Temudio', 'fedde.temudio@gmail.com', '$2y$12$iK5nHKSMaB4IVAqgMlHGZuOsr4di4gCUxecSpAtSifRD0q0nmClGe', 1),
(2, 'Roberto Iannuzzi', 'riannuzzi1980@gmail.com', '$2y$12$iK5nHKSMaB4IVAqgMlHGZuOsr4di4gCUxecSpAtSifRD0q0nmClGe', 1),
(3, 'Juan Pablo', 'juan.pablo@gmail.com', '$2y$10$.mKwutZuOCbf/H4qyAE14.mUUxOcJjEN3p4/1eD5kWc.rgAh7uVe2', 0),
(5, 'Tomas Temudio', 'tomas.temudio@gmail.com', '$2y$10$vfDdCRlgxXYM0XWy2lawPee28UXrsOmQZVt4mVuWKgcVtIqTBqmly', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
