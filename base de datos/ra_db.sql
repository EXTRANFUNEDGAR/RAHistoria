-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 05:27:58
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
-- Base de datos: `ra_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE `avance` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `avance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avance`
--

INSERT INTO `avance` (`id_usuario`, `id_tema`, `avance`) VALUES
(11, 3, 8),
(10, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `id_usuario`) VALUES
(1, 10),
(2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_usuario`
--

CREATE TABLE `clase_usuario` (
  `id_clase` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `tema` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `id_clase`, `tema`) VALUES
(3, 1, 'Los primeros Humanos'),
(4, 2, 'Mexico Antiguo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `contrasena` varchar(500) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `curp`, `contrasena`, `tipo`) VALUES
(1, '', 'pruebad', 'pruebad', 1),
(2, '', 'prueba', 'prueba', 2),
(3, '', 'prueba2', 'prueba2', 1),
(4, '', 'prueba3', 'prueba3', 2),
(5, '', 'prueba4', '1234', 1),
(6, '', 'prueba5', '1', 1),
(7, '', 'prueba6', '$2y$10$ASetS0JFxnAOp', 1),
(8, '', 'c', '$2y$10$L1usaVkzwck8k', 2),
(9, '', 'pruebac', '$2y$10$bBuXE9IAre07fLu/UvqnRuFNsGU.4i.vmffvj1UTPMYU3KVui.M.e', 1),
(10, 'emmanuel', 'disj', '$2y$10$7llKinycM8/CYaCoY/uR3uchTmdNGHdel9jMnSMKgmv2lceyhfqX2', 1),
(11, 'edgar', 'edgar', '$2y$10$o4Nq1FzxHfCPyY/mMqRVwO3sZ8Ti9DzcEEMtEeANeI7cBLC9/b3OC', 2),
(12, 'enrique', 'enrique', '$2y$10$qv0WwYu10.5jUMiIs11zsOVGooo.S1/vucuqrgvO7izL4ZcLY74pK', 1),
(13, 'p', 'pc', '$2y$10$q/KuLzwVtecXKuDj0HpUneCKJAPEvIs/faOUwqvLO1iU7HKL3cwqm', 2),
(14, '1', '1', '$2y$10$.NCfnoPQ/plAMT1fObAzqe6/e5ncy8VqrZn6LCkW0rrssFM6ywW.C', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avance`
--
ALTER TABLE `avance`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD UNIQUE KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `clase_usuario`
--
ALTER TABLE `clase_usuario`
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `avance_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `avance_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`);

--
-- Filtros para la tabla `clase_usuario`
--
ALTER TABLE `clase_usuario`
  ADD CONSTRAINT `clase_usuario_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `clase_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
