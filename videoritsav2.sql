-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2021 a las 05:13:07
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miembros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `alert_mjs` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `withTimer` bit(1) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'miliseconds',
  `severity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alerts`
--

INSERT INTO `alerts` (`id`, `alert_mjs`, `withTimer`, `duration`, `severity_id`) VALUES
(1, 'Corte comercial', b'1', 600, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerts_log`
--

CREATE TABLE `alerts_log` (
  `id` int(11) NOT NULL,
  `alert_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alerts_log`
--

INSERT INTO `alerts_log` (`id`, `alert_id`, `start_date`, `end_date`) VALUES
(1, 1, '2021-03-13 20:48:23', '2021-03-13 20:58:23'),
(2, 1, '2021-03-13 21:56:48', '2021-03-13 22:06:48'),
(3, 1, '2021-03-24 20:31:47', '2021-03-24 20:41:47'),
(4, 1, '2021-03-24 21:08:17', '2021-03-24 21:18:17'),
(5, 1, '2021-03-24 21:21:49', '2021-03-24 21:31:49'),
(6, 1, '2021-03-25 14:26:37', '2021-03-25 14:36:37'),
(7, 1, '2021-03-25 14:39:22', '2021-03-25 14:49:22'),
(8, 1, '2021-03-25 14:49:39', '2021-03-25 14:59:39'),
(9, 1, '2021-03-25 15:00:01', '2021-03-25 15:10:01'),
(10, 1, '2021-03-25 15:10:11', '2021-03-25 15:20:11'),
(11, 1, '2021-03-25 15:20:48', '2021-03-25 15:30:48'),
(12, 1, '2021-03-25 15:30:53', '2021-03-25 15:40:53'),
(13, 1, '2021-03-25 15:38:20', '2021-03-25 15:48:20'),
(14, 1, '2021-03-25 15:39:31', '2021-03-25 15:49:31'),
(15, 1, '2021-03-25 15:39:55', '2021-03-25 15:49:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerts_severities`
--

CREATE TABLE `alerts_severities` (
  `id` int(11) NOT NULL,
  `severity` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alerts_severities`
--

INSERT INTO `alerts_severities` (`id`, `severity`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `message` varchar(650) COLLATE utf8_spanish_ci NOT NULL,
  `active` bit(1) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `title`, `message`, `active`, `creation_date`) VALUES
(1, 'Byron Portillo', 'Felicidades doctor excelente programa.', b'0', '2021-03-07 00:00:00'),
(2, 'xx', 'xx', b'0', '2021-03-15 00:00:00'),
(3, 'asd', 'asq', b'0', '2021-03-17 00:00:00'),
(4, 'Ernesto cordoba', 'Muchas gracias por el programa, saludos a todos', b'0', '2021-03-18 00:00:00'),
(5, 'Emilio castro', 'Muy bien doctor siga hablando sobre estos temas', b'0', '2021-03-11 00:00:00'),
(6, 'kpok', 'jiojio', b'0', '2021-03-19 00:00:00'),
(7, 'prueba', 'prueba x', b'0', '2021-03-17 00:00:00'),
(8, 'prueba hoy', 'casa\r\n', b'1', '2021-03-20 18:44:34'),
(9, 'Segunda prueba', 'pollo', b'0', '2021-03-20 18:44:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `names` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(600) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `names`, `lastname`, `email`) VALUES
(1, 'Byron', 'Portillo', 'byronpenna@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `people_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `people_id`) VALUES
(1, 'byronpenna', 'c2242b55b12318ac8d508a805e325c16', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_alerts_alertsseverities` (`severity_id`);

--
-- Indices de la tabla `alerts_log`
--
ALTER TABLE `alerts_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alerts_log_alerts` (`alert_id`);

--
-- Indices de la tabla `alerts_severities`
--
ALTER TABLE `alerts_severities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_users_people` (`people_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alerts_log`
--
ALTER TABLE `alerts_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `alerts_severities`
--
ALTER TABLE `alerts_severities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `r_alerts_alertsseverities` FOREIGN KEY (`severity_id`) REFERENCES `alerts_severities` (`id`);

--
-- Filtros para la tabla `alerts_log`
--
ALTER TABLE `alerts_log`
  ADD CONSTRAINT `alerts_log_alerts` FOREIGN KEY (`alert_id`) REFERENCES `alerts` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `r_users_people` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
