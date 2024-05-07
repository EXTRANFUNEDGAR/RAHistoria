-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2024 a las 05:18:47
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
-- Base de datos: `ra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

create database ra_db;

create table usuarios 
	(id_usuario int AUTO_INCREMENT primary key, 
  curp varchar(18), 
  contrasena varchar(20),
  tipo int(2))

create table clases
	(id_clase int AUTO_INCREMENT primary key,
  id_usuario int)        
    
create table temas
	(id_tema int AUTO_INCREMENT primary key,
  id_clase int,
  tema varchar(100))        

create table avance
	(id_usuario int,
  id_tema int,
  avance int)

create table clase_usuario
  (id_clase int, 
  id_usuario int)
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES
('Emmanuel', '1234'),
('Emmanuel', '1234');


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
