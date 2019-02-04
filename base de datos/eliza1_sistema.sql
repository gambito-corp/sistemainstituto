-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-02-2019 a las 04:31:55
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eliza1_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave_registro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `email`, `password`, `nick`, `dni`, `clave_registro`, `foto`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Sidi Farid', 'Aguirre', 'asesor.pedro@gmail.com', '$2y$10$DTGKAnJCpmJoHw0Ij7pwaO1Ed0UadKWqIhr7O73uZzjpcqHGfzICG', 'Gambito', '963852741', 'asdfghjklñ', NULL, NULL, NULL, '2019-02-04 14:13:23', '2019-02-04 14:13:23');

--
-- Restricciones para tablas volcadas
--

--
-- Estructura de tabla para la tabla `asistencias`
--

DROP TABLE IF EXISTS `asistencias`;
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencias_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-02-04 09:23:02', '2019-02-04 09:23:02'),
(2, 1, 1, '2019-02-04 09:23:19', '2019-02-04 09:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'informatica y computacion', '2019-02-04 09:14:23', '2019-02-04 09:14:23'),
(2, 'administracion', '2019-02-04 09:14:23', '2019-02-04 09:14:23'),
(3, 'electricidad', '2019-02-04 09:14:54', '2019-02-04 09:14:54'),
(4, 'mecatronica', '2019-02-04 09:14:54', '2019-02-04 09:14:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_carrera_id_foreign` (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `carrera_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 2, 'ingles administracion', 'curso de ingles de la carrera administracion', '2019-02-04 09:16:16', '2019-02-04 09:16:16'),
(2, 3, 'ingles electricidad', 'curso de ingles de la carrera de electricidad', '2019-02-04 09:16:16', '2019-02-04 09:16:16'),
(3, 1, 'ingles informatica y computacion', 'curso de ingles de la carrera de informatica y computacion', NULL, NULL),
(4, 4, 'ingles mecatronica', 'curso de ingles de la carrera de mecatronica', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

DROP TABLE IF EXISTS `ciclos`;
CREATE TABLE IF NOT EXISTS `ciclos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciclos_user_id_foreign` (`user_id`),
  KEY `ciclos_carrera_id_foreign` (`carrera_id`),
  KEY `ciclos_curso_id_foreign` (`curso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`id`, `user_id`, `carrera_id`, `curso_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '3ª ciclo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE IF NOT EXISTS `periodos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fechafinal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `nombre`, `fecha_inicio`, `fechafinal`, `created_at`, `updated_at`) VALUES
(1, 'primer periodo', '2017-01-01', '2017-06-01', '2019-02-04 09:28:27', '2019-02-04 09:28:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `ciclo_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documentos_carrera_id_foreign` (`carrera_id`),
  KEY `documentos_curso_id_foreign` (`curso_id`),
  KEY `documentos_ciclo_id_foreign` (`ciclo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `nombre`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'fundamentod de la administracion', 'fundamentos-admin.pdf', '2019-02-04 09:24:34', '2019-02-04 09:24:34'),
(2, 1, 3, 1, 'suspensos de area ingles para 3ªciclo', 'suspensos3ªcicloInf.pdf', '2019-02-04 09:26:01', '2019-02-04 09:26:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1-2014_10_12_100000_create_password_resets_table', 1),
(2, '2-2014_10_12_000000_create_users_table', 1),
(3, '3-2019_02_03_174335_create_carreras_table', 1),
(4, '4-2019_02_03_174535_create_cursos_table', 1),
(5, '5-2019_02_03_174556_create_ciclos_table', 1),
(6, '6-2019_02_03_174650_create_periodos_table', 1),
(7, '7-2019_02_03_174426_create_silabuses_table', 1),
(8, '8-2019_02_03_174449_create_asistencias_table', 1),
(9, '9-2019_02_03_174616_create_notas_table', 1),
(10, '99-2019_02_03_174515_create_documentos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `ciclo_id` int(10) UNSIGNED NOT NULL,
  `periodo_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nota1` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota2` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota3` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota4` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota5` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota6` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota7` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota8` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_nota` tinyint(1) NOT NULL,
  `estado_periodo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notas_carrera_id_foreign` (`carrera_id`),
  KEY `notas_curso_id_foreign` (`curso_id`),
  KEY `notas_ciclo_id_foreign` (`ciclo_id`),
  KEY `notas_periodo_id_foreign` (`periodo_id`),
  KEY `notas_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `periodo_id`, `user_id`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nota6`, `nota7`, `nota8`, `estado_nota`, `estado_periodo`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 1, '20', '20', '20', '20', '20', '20', '20', '20', 1, 1, '2019-02-04 09:30:09', '2019-02-04 09:30:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silabus`
--

DROP TABLE IF EXISTS `silabus`;
CREATE TABLE IF NOT EXISTS `silabus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `ciclo_id` int(10) UNSIGNED NOT NULL,
  `periodo_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `silabus_carrera_id_foreign` (`carrera_id`),
  KEY `silabus_curso_id_foreign` (`curso_id`),
  KEY `silabus_ciclo_id_foreign` (`ciclo_id`),
  KEY `silabus_periodo_id_foreign` (`periodo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `silabus`
--

INSERT INTO `silabus` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `periodo_id`, `nombre`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'ingles administracion', 'silabusingles3ciclo.pdf', '2019-02-04 09:31:18', '2019-02-04 09:31:18');

-- --------------------------------------------------------

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD CONSTRAINT `ciclos_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciclos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciclos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `silabus`
--
ALTER TABLE `silabus`
  ADD CONSTRAINT `silabus_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
