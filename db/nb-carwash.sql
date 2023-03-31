-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-01-2023 a las 01:28:14
-- Versión del servidor: 10.5.12-MariaDB-0+deb11u1
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nb-carwash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `is_valid` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Kolom penentu apakah booking valid atau belum',
  `is_done` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Kolom penentu booking selesai apa belum',
  `plate_number` varchar(20) DEFAULT NULL,
  `merk_model` varchar(50) DEFAULT NULL,
  `wash_type_id` int(1) NOT NULL,
  `time` time NOT NULL,
  `total` int(7) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `no_hp`, `is_valid`, `is_done`, `plate_number`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `created_at`, `updated_at`) VALUES
('135671', 'Adi', '', 'true', 'false', 'P09907RQ', 'Honda Vario', 2, '22:29:00', 20000, '2022-09-10', '2022-11-11 04:10:35', '0000-00-00 00:00:00'),
('2022-12-09-adi-0:46', 'Adi', '0990237024', 'false', 'false', 'R12308PL', 'Vario', 1, '00:46:00', 16000, '2022-12-09', '2022-12-08 17:46:44', NULL),
('2022-12-09-adi-1:01', 'Adi', '0990237024', 'false', 'false', 'R12308PL', 'Vario', 1, '01:01:00', 16000, '2022-12-09', '2022-12-08 17:59:26', NULL),
('2022-12-11-adi-20:00', 'Adi', '085748314069', 'true', 'true', 'P2312RQ', 'Honda Vario 125', 1, '20:00:00', 16000, '2022-12-11', '2022-12-11 12:47:26', NULL),
('2022-12-17-adi-13:00', 'Adi', '085748314069', 'false', 'false', 'P093123OL', 'Vario', 1, '13:00:00', 16000, '2022-12-17', '2022-12-17 05:57:29', NULL),
('2022-12-31-adi-14:10', 'Adi', '085748314069', 'false', 'false', 'P0797RT', 'Honda Revo', 1, '14:10:00', 20000, '2022-12-31', '2022-12-31 07:05:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` varchar(30) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_fee` int(7) DEFAULT NULL,
  `time` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `date`, `total_fee`, `time`, `created_at`, `updated_at`) VALUES
('2-2023-01-06-1', 2, '2023-01-06', 3500, 1, '2023-01-06 16:20:37', NULL),
('6-2023-01-06-1', 6, '2023-01-06', 3500, 1, '2023-01-06 16:17:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profits`
--

CREATE TABLE `profits` (
  `id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `total` int(7) NOT NULL,
  `daytime` int(5) DEFAULT NULL,
  `for_employee` int(7) DEFAULT NULL,
  `for_cash` int(7) NOT NULL COMMENT 'Uang untuk kas',
  `for_owner` int(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profits`
--

INSERT INTO `profits` (`id`, `date`, `total`, `daytime`, `for_employee`, `for_cash`, `for_owner`, `created_at`, `updated_at`) VALUES
('1-2023-01-06', '2023-01-06', 40000, 1, 7000, 1050, 20000, '2023-01-06 12:49:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesi`
--

CREATE TABLE `sesi` (
  `id` int(5) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesi`
--

INSERT INTO `sesi` (`id`, `keterangan`, `jam_awal`, `jam_akhir`) VALUES
(1, 'sesi1(11:02-18:02)', '11:02:00', '18:02:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spends`
--

CREATE TABLE `spends` (
  `id` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `total` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `spends`
--

INSERT INTO `spends` (`id`, `keterangan`, `date`, `total`, `created_at`, `updated_at`) VALUES
(5, 'jjasdsa', '2022-12-05', 12000, '2022-12-05 07:11:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(60) NOT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `is_done` enum('true','false') NOT NULL DEFAULT 'false',
  `plate_number` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `merk_model` varchar(50) DEFAULT NULL,
  `wash_type_id` int(1) NOT NULL DEFAULT 5,
  `time` time NOT NULL,
  `total` int(10) DEFAULT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`id`, `bukti`, `name`, `keterangan`, `is_done`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `note`, `created_at`, `updated_at`) VALUES
('2022-11-04-malik-09:24', '', 'Malik', NULL, 'false', 'N YAS', '', 'Honda Revo', 1, '09:30:00', 16000, '2022-11-07', '', '2022-11-04 02:24:36', '2022-11-04 02:24:36'),
('2022-12-11-adi-20:00', '', 'Adi', NULL, 'true', 'P2312RQ', '085748314069', 'Honda Vario 125', 1, '18:08:00', 16000, '2023-01-06', NULL, '2022-12-11 13:27:07', NULL),
('2023-01-14--01:19', 'evolution.jpg', 'Adi', NULL, 'false', NULL, '082983213', NULL, 6, '01:19:00', 12000, '2023-01-14', NULL, '2023-01-13 18:19:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','owner','employee','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `is_active` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_password` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_active`, `password`, `change_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rendi', 'rendi123@gmail.com', 'employee', 'true', '12345', 'false', NULL, NULL, NULL),
(4, 'Admin', 'admin@gmail.com', 'admin', 'true', '$2y$10$64ji8fVDMZpJB.R4AEBsf.x.QbtbLWh4xleK.ojQYtol6rUWw2PN6', 'false', NULL, '2022-09-21 07:31:48', '2022-12-31 07:11:08'),
(6, 'Adi', 'muhammadxxz7@gmail.com', 'employee', 'true', '$2y$10$0RvYUlw4w5LLF58EtFmLo.HwMDCv6BojOFfOAshyZ7i88VLkGVhhS', 'false', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wash_types`
--

CREATE TABLE `wash_types` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('Motor','Mobil','Karpet') NOT NULL,
  `price` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wash_types`
--

INSERT INTO `wash_types` (`id`, `name`, `type`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Motor', 'Motor', 17000, '2022-09-10 14:23:07', '2022-12-31 07:07:54'),
(2, 'Cuci Express Mobil', 'Mobil', 25000, '2022-09-10 14:23:07', NULL),
(3, 'Cuci Standard Mobil', 'Mobil', 30000, '2022-09-10 14:24:03', NULL),
(4, 'Cuci Premium Mobil', 'Mobil', 40000, '2022-09-10 14:24:03', NULL),
(6, 'Cuci Karpet', 'Karpet', 0, '2023-01-06 13:09:10', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wash_type_id` (`wash_type_id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `time` (`time`);

--
-- Indices de la tabla `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daytime` (`daytime`);

--
-- Indices de la tabla `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `spends`
--
ALTER TABLE `spends`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wash_type_id` (`wash_type_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wash_types`
--
ALTER TABLE `wash_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `spends`
--
ALTER TABLE `spends`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `wash_types`
--
ALTER TABLE `wash_types`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`wash_type_id`) REFERENCES `wash_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`time`) REFERENCES `sesi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`wash_type_id`) REFERENCES `wash_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
