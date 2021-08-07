-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2021 a las 18:14:23
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
-- Base de datos: `videoritsav2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `annotations`
--

CREATE TABLE `annotations` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `annotations`
--

INSERT INTO `annotations` (`id`, `message`, `user_id`, `video_id`, `creation_date`) VALUES
(1, 'Las resistencias del microondas se miden con el multimetro', 1, 1, '2021-05-29 11:11:56'),
(5, 'Debo hacer algo ', 1, 1, '2021-06-17 10:50:22'),
(6, 'Recordar que el magnetron es electrico', 1, 1, '2021-07-04 16:56:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `names` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `names`, `lastname`, `email`) VALUES
(1, 'Byron Aldair', 'Pena Portillo', 'byronpenna@gmail.com'),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', 'byronpenna@outlook.com'),
(5, '', '', ''),
(6, '', '', 'byronpenna@outlook.com'),
(7, 'testing', 'testing', 'byronpenna@outlook.com'),
(8, 'testing', 'testing', 'byronpenna@outlook.com'),
(9, 'testing', 'testing', 'byronpenna@outlook.com'),
(10, 'testing', 'testing', 'byronpenna@outlook.com'),
(11, 'testing', 'testing', 'byronpenna@outlook.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ritsa_videos`
--

CREATE TABLE `ritsa_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `base_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ritsa_videos`
--

INSERT INTO `ritsa_videos` (`id`, `title`, `base_url`) VALUES
(1, 'Magnetron', '1uOJ2Ts05mc'),
(2, 'Nintendo 2ds', 'Ft7NbytK3Zc'),
(3, 'Previa impresora atascada', '7nXdbjtxzGU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(600) NOT NULL,
  `people_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `people_id`) VALUES
(1, 'byronpenna', 'c2242b55b12318ac8d508a805e325c16', 1),
(2, 'testing', 'c2242b55b12318ac8d508a805e325c16', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `annotations`
--
ALTER TABLE `annotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_annotations_users` (`user_id`),
  ADD KEY `r_annotations_ritsavideos` (`video_id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ritsa_videos`
--
ALTER TABLE `ritsa_videos`
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
-- AUTO_INCREMENT de la tabla `annotations`
--
ALTER TABLE `annotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ritsa_videos`
--
ALTER TABLE `ritsa_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `annotations`
--
ALTER TABLE `annotations`
  ADD CONSTRAINT `r_annotations_ritsavideos` FOREIGN KEY (`video_id`) REFERENCES `ritsa_videos` (`id`),
  ADD CONSTRAINT `r_annotations_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `r_users_people` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
