-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2022 a las 05:04:32
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
-- Base de datos: `calculadora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `id` int(11) NOT NULL,
  `num1` varchar(45) NOT NULL,
  `num2` varchar(45) NOT NULL,
  `resultado` varchar(45) NOT NULL,
  `operacion` enum('0','Suma','Resta','Multiplicacion','Division') NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`id`, `num1`, `num2`, `resultado`, `operacion`, `fecha`) VALUES
(1, '3', '4', '7', 'Suma', '2022-06-03 02:38:03'),
(2, '3', '4', '-1', 'Resta', '2022-06-03 02:38:03'),
(3, '5', '2', '10', 'Multiplicacion', '2022-06-03 02:46:48'),
(4, '5', '2', '10', 'Multiplicacion', '2022-06-03 02:46:48'),
(5, '7', '7', '49', 'Multiplicacion', '2022-06-03 02:47:42'),
(6, '9', '5', '45', 'Multiplicacion', '2022-06-03 02:47:42'),
(7, '10', '4', '0.04', 'Division', '2022-06-03 02:52:32'),
(8, '19', '9', '171', 'Multiplicacion', '2022-06-03 02:52:32'),
(9, '9', '7', '16', 'Suma', '2022-06-03 02:54:10'),
(10, '9', '2', '11', 'Suma', '2022-06-03 02:54:10'),
(11, '8', '8', '64', 'Multiplicacion', '2022-06-03 02:54:57'),
(12, '3', '4', '12', 'Multiplicacion', '2022-06-03 03:39:25'),
(17, '', '', '', '0', '0000-00-00 00:00:00'),
(18, '', '', '', '0', '0000-00-00 00:00:00'),
(19, 'num1', 'num2', 'resultado', '', '0000-00-00 00:00:00'),
(20, 'num1', 'num2', 'resultado', '', '0000-00-00 00:00:00'),
(21, 'num1', 'num2', 'resultado', '', '0000-00-00 00:00:00'),
(22, 'num1', 'num2', 'resultado', '', '0000-00-00 00:00:00'),
(23, 'num1', 'num2', 'resultado', '', '0000-00-00 00:00:00'),
(24, 'num1', 'num2', 'resultado', '', '0000-00-00 00:00:00'),
(25, 'val1', 'val2', 'result', '', '0000-00-00 00:00:00'),
(26, 'val1', 'val2', 'result', '', '0000-00-00 00:00:00'),
(27, '', '', '', '', '0000-00-00 00:00:00'),
(28, '', '', '', '', '0000-00-00 00:00:00'),
(29, '', '', '', '', '0000-00-00 00:00:00'),
(30, '', '', '0', '', '0000-00-00 00:00:00'),
(31, '', '', '0', '', '0000-00-00 00:00:00'),
(32, '4', '4', '0', 'Resta', '0000-00-00 00:00:00'),
(33, '44', '22', '22', 'Resta', '0000-00-00 00:00:00'),
(34, '44', '22', '22', 'Resta', '0000-00-00 00:00:00'),
(35, '', '', '', '', '2022-06-03 02:29:07'),
(36, '', '', '', '', '2022-06-03 02:30:43'),
(37, '3', '4', '-1', 'Resta', '2022-06-03 02:30:54'),
(38, '4', '3', '1.3333333333333', 'Division', '2022-06-03 02:31:15'),
(39, '4', '3', '1.3333333333333', 'Division', '2022-06-03 02:32:53'),
(40, '4', '3', '1.3333333333333', 'Division', '2022-06-03 02:32:57'),
(41, '3', '4', '-1', 'Resta', '2022-06-03 02:33:04'),
(42, '5', '4', '1.25', 'Division', '2022-06-03 02:33:12'),
(43, '5', '4', '1.25', 'Division', '2022-06-03 02:33:31'),
(44, '5', '4', '1.25', 'Division', '2022-06-03 02:33:35'),
(45, '5', '4', '1.25', 'Division', '2022-06-03 02:34:17'),
(46, '', '', '', '', '2022-06-03 02:34:19'),
(47, '32', '44', '1408', 'Multiplicacion', '2022-06-03 02:36:25'),
(48, '', '', '', '', '2022-06-03 02:36:40'),
(49, '', '', '', '', '2022-06-03 02:36:44'),
(50, '', '', '', '', '2022-06-03 02:38:19'),
(51, '3', '4', '-1', 'Resta', '2022-06-03 02:38:28'),
(52, '', '', '', '', '2022-06-03 02:38:31'),
(53, '34', '232', '7888', 'Multiplicacion', '2022-06-03 02:38:41'),
(54, '', '', '', '', '2022-06-03 02:38:46'),
(55, '', '', '', '', '2022-06-03 02:40:12'),
(56, '', '', '', '', '2022-06-03 02:40:18'),
(57, '', '', '', '', '2022-06-03 02:48:09'),
(58, '', '', '', '', '2022-06-03 02:49:19'),
(59, '2', '3', '-1', 'Resta', '2022-06-03 02:49:34'),
(60, '2', '2', '', '0', '2022-06-03 02:50:23'),
(61, '33', '333', '-300', 'Resta', '2022-06-03 02:50:40'),
(62, '33', '333', '', 'Resta', '2022-06-03 02:51:53'),
(63, '33', '333', '', 'Resta', '2022-06-03 02:52:29'),
(64, '33', '333', '', 'Resta', '2022-06-03 02:52:33'),
(65, '33', '333', '', 'Resta', '2022-06-03 02:52:36'),
(66, '3', '34', '', 'Division', '2022-06-03 02:53:06'),
(67, '23', '2', '', 'Suma', '2022-06-03 02:54:11'),
(68, '23', '2', '', 'Suma', '2022-06-03 02:55:12'),
(69, '23', '2', '', 'Suma', '2022-06-03 02:55:18'),
(70, '23', '2', '', 'Suma', '2022-06-03 02:55:22'),
(71, '23', '2', '', 'Suma', '2022-06-03 03:01:32'),
(72, '23', '2', '', 'Suma', '2022-06-03 03:01:39'),
(73, '3', '4', '', 'Resta', '2022-06-03 03:01:51'),
(74, '4', '5', '', 'Resta', '0000-00-00 00:00:00'),
(75, '4', '5', '', 'Resta', '0000-00-00 00:00:00'),
(76, '4', '5', '', 'Resta', '2022-06-03 03:35:51'),
(77, '6', '3', '', 'Suma', '2022-06-03 03:36:04'),
(78, '', '', '', '', '2022-06-03 03:36:38'),
(79, '', '', '', '', '0000-00-00 00:00:00'),
(80, '', '', '', '', '2022-06-03 03:42:13'),
(81, '34', '34', '', 'Resta', '2022-06-03 03:48:58'),
(82, '34', '34', '', 'Resta', '2022-06-03 03:53:02'),
(83, '4', '5', '', 'Suma', '2022-06-03 03:53:13'),
(84, '4', '5', '', 'Suma', '2022-06-03 03:57:06'),
(85, '34', '43', '', 'Division', '2022-06-03 03:57:15'),
(86, '34', '43', '', 'Division', '2022-06-03 03:58:37'),
(87, '3', '4', '', 'Suma', '2022-06-03 03:58:44'),
(88, '44', '321', '', 'Suma', '2022-06-03 04:01:37'),
(89, '44', '321', '', 'Suma', '2022-06-03 04:04:05'),
(90, '3212', '2324', '', 'Suma', '2022-06-03 04:04:21'),
(91, '3212', '2324', '', 'Suma', '2022-06-03 04:06:29'),
(92, '444', '44444', '', 'Resta', '2022-06-03 04:06:38'),
(93, '444', '44444', '', 'Resta', '2022-06-03 04:40:58'),
(94, '444', '3', '', 'Suma', '2022-06-03 04:41:08'),
(95, '444', '3', '', 'Suma', '2022-06-03 04:41:48'),
(96, '3', '4', '', 'Suma', '2022-06-03 04:41:58'),
(97, '3', '4', '-1', 'Resta', '2022-06-03 04:42:31'),
(98, '3', '4', '-1', 'Resta', '2022-06-03 04:45:32'),
(99, '', '', '', '', '2022-06-03 04:46:33'),
(100, '32', '223', '255', 'Suma', '2022-06-03 04:46:43'),
(101, '', '', '', '', '2022-06-03 06:03:52'),
(102, '', '', '', '', '2022-06-04 02:26:22'),
(103, '', '', '', '', '2022-06-04 02:27:56'),
(104, '3', '4', '-1', 'Resta', '2022-06-04 02:28:04'),
(105, '4', '2', '2', 'Division', '2022-06-04 02:28:13'),
(106, '', '', '', '', '2022-06-04 02:28:34'),
(107, '', '', '', '', '2022-06-04 02:29:27'),
(108, '', '', '', '', '2022-06-04 02:29:36'),
(109, '4', '4', '0', 'Resta', '2022-06-04 02:29:41'),
(110, '', '', '', '', '2022-06-04 02:29:46'),
(111, '4', '3', '', 'Resta', '0000-00-00 00:00:00'),
(112, '4', '3', '1', 'Resta', '0000-00-00 00:00:00'),
(113, '3', '44', '47', 'Suma', '2022-06-04 02:37:26'),
(114, '2', '2', '4', 'Multiplicacion', '2022-06-04 02:38:51'),
(115, '0', '4', '', 'Division', '2022-06-04 02:42:01'),
(116, '4', '32', '128', 'Multiplicacion', '2022-06-04 02:45:09'),
(117, '2', '34', '36', 'Suma', '2022-06-04 02:48:01'),
(118, '0', '4', '', 'Division', '2022-06-04 02:48:14'),
(119, '0', '4', '', 'Division', '2022-06-04 02:49:41'),
(120, '0', '4', '', 'Division', '2022-06-04 02:50:13'),
(121, '0', '4', '', 'Division', '2022-06-04 02:50:15'),
(122, '3', '4', '-1', 'Resta', '2022-06-04 02:50:29'),
(123, '0', '6', '', 'Division', '2022-06-04 02:50:35'),
(124, '0', '6', '', 'Division', '2022-06-04 02:51:08'),
(125, '4', '0', '', 'Division', '2022-06-04 02:51:13'),
(126, '44', '33', '1.3333333333333', 'Division', '2022-06-04 02:54:27'),
(127, '7', '8', '-1', 'Resta', '2022-06-04 02:55:14'),
(128, '5', '4', '1', 'Resta', '2022-06-04 03:03:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
