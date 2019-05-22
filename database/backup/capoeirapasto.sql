-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2019 a las 21:00:39
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capoeirapasto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `saldo_actual` int(15) NOT NULL,
  `saldo_anterior` int(15) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `nombre`, `saldo_actual`, `saldo_anterior`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Menor', 80000, 50000, 'abierta', '2019-04-21 00:55:45', '2019-05-13 00:19:10'),
(2, 'Mensualidades', 30000, 0, 'cerrada', '2019-04-21 00:58:24', '2019-05-02 03:01:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Musica', 'Musicas, letras y composiciones varias del mundo de la capoeira', 1, '2019-02-01 07:08:52', '2019-03-29 20:37:36'),
(2, 'Tecnica', 'Movimientos básicos de la capoeira, ataques, contraataques y salidas fundamentales.', 1, '2019-02-01 07:09:45', '2019-02-01 07:09:45'),
(3, 'Eventos', 'Eventos de capoeira', 1, '2019-03-21 02:17:41', '2019-03-21 02:17:41'),
(4, 'Noticias', 'Noticias, publicaciones de capoeira', 1, '2019-03-29 20:35:56', '2019-03-29 20:35:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `descripcion`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(137, 'Excelente evento', 1, 1, '2019-03-09 04:34:45', '2019-03-09 04:34:45'),
(139, 'Excelentes aulas', 3, 1, '2019-03-20 02:17:14', '2019-03-20 02:17:14'),
(140, 'Muy bonita experiencia', 5, 1, '2019-03-20 02:23:57', '2019-03-20 02:23:57'),
(141, 'Gran organizacion', 1, 1, '2019-04-01 04:00:19', '2019-04-01 04:00:19'),
(142, 'Holi', 1, 7, '2019-05-05 18:17:15', '2019-05-05 18:17:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos_caja`
--

CREATE TABLE `egresos_caja` (
  `id` int(10) UNSIGNED NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `pago_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mov_caja_id` int(10) UNSIGNED NOT NULL,
  `valor_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_caja`
--

CREATE TABLE `ingresos_caja` (
  `id` int(10) UNSIGNED NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `pago_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mov_caja_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos_caja`
--

INSERT INTO `ingresos_caja` (`id`, `concepto`, `pago_id`, `user_id`, `mov_caja_id`) VALUES
(2, 'Camisetas', 2, 1, 12),
(3, 'Mensualidad', 5, 1, 12),
(4, 'Mensualidad', 5, 1, 12),
(5, 'Mensualidad', 5, 1, 12),
(6, 'Mensualidad', 5, 1, 12),
(7, 'Camisetas', 2, 1, 9),
(8, 'Camisetas', 2, 1, 13),
(9, 'Camisetas', 2, 1, 13),
(10, 'Mensualidad', 5, 1, 13),
(11, 'Mensualidad', 5, 7, 13),
(12, 'Camisetas', 2, 1, 14),
(13, 'Camisetas', 2, 5, 14),
(14, 'Camisetas', 2, 5, 14),
(15, 'Camisetas', 2, 8, 14),
(16, 'Mensualidad', 5, 7, 14),
(17, 'Camisetas', 2, 8, 14),
(18, 'Camisetas', 2, 8, 14),
(19, 'Camisetas', 2, 8, 14),
(20, 'Clases individuales', 7, 5, 14),
(21, 'Camisetas', 2, 1, 14),
(22, 'Camisetas', 2, 1, 15),
(23, 'Camisetas', 2, 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_22_025018_create_categorias_table', 2),
(4, '2019_01_18_223245_create_posts_table', 3),
(5, '2019_01_22_024947_create_comentarios_table', 4),
(6, '2019_01_22_024658_create_pagos_table', 5),
(7, '2019_05_03_005601_entrust_setup_tables', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_cajas`
--

CREATE TABLE `mov_cajas` (
  `id` int(11) UNSIGNED NOT NULL,
  `base` int(11) NOT NULL,
  `fecha_apertura` date NOT NULL,
  `fecha_cierre` varchar(100) NOT NULL DEFAULT 'cerrada',
  `diferencia` int(11) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `caja_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mov_cajas`
--

INSERT INTO `mov_cajas` (`id`, `base`, `fecha_apertura`, `fecha_cierre`, `diferencia`, `observaciones`, `caja_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 200000, '2019-04-24', 'May 9, 2019', -30000, 'Apertura de caja diaria', 1, 1, '2019-04-25 02:40:56', '2019-05-09 04:53:53'),
(6, 150000, '2019-04-25', 'May 9, 2019', -80000, 'Apertura caja diaria', 1, 4, '2019-04-25 21:55:13', '2019-05-09 04:53:54'),
(7, 100000, '2019-04-25', 'May 9, 2019', -130000, 'Apertura', 1, 1, '2019-04-25 21:59:21', '2019-05-09 04:53:54'),
(8, 300000, '2019-04-25', 'May 9, 2019', 70000, 'Apertura', 1, 5, '2019-04-25 22:07:08', '2019-05-09 04:53:54'),
(9, 150000, '2019-04-25', 'Apr 27, 2019', 0, 'Apertura de caja mensualidades', 2, 4, '2019-04-26 04:37:26', '2019-04-27 23:30:53'),
(10, 120000, '2019-04-27', 'May 9, 2019', -110000, 'Apertura sabdo', 1, 1, '2019-04-27 23:07:22', '2019-05-09 04:53:54'),
(11, 50000, '2019-04-27', 'May 9, 2019', -180000, 'Apertura sabatina', 1, 7, '2019-04-27 23:34:22', '2019-05-09 04:53:54'),
(12, 1000000, '2019-04-27', 'May 9, 2019', 770000, 'Apertura', 1, 1, '2019-04-28 03:25:31', '2019-05-09 04:53:54'),
(13, 150000, '2019-05-01', 'May 9, 2019', -80000, 'Apertura mayo', 1, 1, '2019-05-02 03:09:14', '2019-05-09 04:53:54'),
(14, 100000, '2019-05-08', 'May 9, 2019', -130000, 'Apertura caja miercoles', 1, 1, '2019-05-08 22:20:03', '2019-05-09 04:53:54'),
(15, 200000, '2019-05-08', 'May 9, 2019', -30000, 'Apertura', 1, 1, '2019-05-09 04:47:14', '2019-05-09 04:53:54'),
(16, 50000, '2019-05-12', 'abierta', 0, 'Apertura domingo', 1, 1, '2019-05-13 00:18:31', '2019-05-13 00:18:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `detalle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `detalle`, `descripcion`, `valor`, `created_at`, `updated_at`) VALUES
(2, 'Camisetas', 'Camisetas oficiales en negro, blanco y rojo', 30000, '2019-02-01 07:11:33', '2019-02-01 07:11:33'),
(5, 'Mensualidad', 'Pagos mensuales por concepto de clases de capoeira.', 50000, '2019-02-07 22:20:24', '2019-05-08 22:24:54'),
(6, 'Berimbau', 'Berimbau instrumento de capoeira', 80000, '2019-02-11 07:58:24', '2019-05-09 02:37:27'),
(7, 'Clases individuales', 'Clases con pago por sesión de entreno.', 8000, '2019-05-08 22:25:54', '2019-05-08 22:25:54'),
(8, 'Malha', 'Malha oficial negra, blanca o roja', 50000, '2019-05-09 02:38:32', '2019-05-09 02:38:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_user`
--

CREATE TABLE `pago_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pago_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pago_user`
--

INSERT INTO `pago_user` (`id`, `estado`, `fecha_asignacion`, `fecha_pago`, `user_id`, `pago_id`, `created_at`, `updated_at`) VALUES
(47, 'vencido', '2019-05-08', '2019-05-20', 1, 2, '2019-05-09 01:33:29', '2019-05-09 01:33:29'),
(48, 'vencido', '2019-05-08', '2019-05-21', 1, 5, '2019-05-09 01:47:07', '2019-05-09 01:47:07'),
(49, 'pagado', '2019-05-08', '2019-05-09', 8, 2, '2019-05-09 01:47:52', '2019-05-09 01:47:52'),
(50, 'pagado', '2019-05-08', '2019-05-09', 5, 7, '2019-05-09 03:38:00', '2019-05-09 03:38:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('caparra92@gmail.com', '$2y$10$GKWU0kaE6el7IssSa6O3mu5adwbmCuiibuGZQCYImctouDSmVrQWS', '2019-02-13 22:07:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Crear usuarios', 'Creación de usuarios en el sistema', '2019-05-03 04:39:32', '2019-05-03 04:39:32'),
(2, 'edit-users', 'Edicion de usuarios', 'Edicion de usuarios del sistema', '2019-05-03 04:40:02', '2019-05-03 04:40:02'),
(3, 'delete-users', 'Eliminacion de usuarios', 'Eliminacion de usuarios del sistema', '2019-05-03 04:40:39', '2019-05-03 04:40:39'),
(4, 'create-posts', 'Creacion de post', 'Creacion de nuevo post en blog', '2019-05-05 17:57:47', '2019-05-05 17:57:47'),
(5, 'edit-posts', 'Edicion de post', 'Edicion y actualizacion de posts en blog', '2019-05-05 17:58:23', '2019-05-05 17:58:23'),
(6, 'delete-posts', 'Eliminacion de posts', 'Eliminacion de posts en blog', '2019-05-05 17:59:00', '2019-05-05 17:59:00'),
(7, 'create-category', 'Creacion de categorias', 'Creacion de categorias en blog', '2019-05-05 17:59:45', '2019-05-05 17:59:45'),
(8, 'edit-category', 'Edicion de categorias', 'Edicion y actualizacion de categorias en blog', '2019-05-05 18:00:24', '2019-05-05 18:00:24'),
(9, 'delete-category', 'Eliminacion de categorias', 'Eliminacion de categorias en blog', '2019-05-05 18:01:01', '2019-05-05 18:01:01'),
(10, 'create-pago', 'Creacion de pagos', 'Creacion de nuevo pago', '2019-05-05 18:02:02', '2019-05-05 18:02:02'),
(11, 'edit-pago', 'Edicion de pagos', 'edicion y actualizacion de pagos del sistema', '2019-05-05 18:02:54', '2019-05-05 18:02:54'),
(12, 'delete-pago', 'Eliminacion de pagos', 'Eliminacion de pagos del sistema', '2019-05-05 18:03:24', '2019-05-05 18:03:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `descripcion`, `path`, `slug`, `categoria_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Seminario Técnica e fundamento 2018', 'Durante el mes de octubre del año 2018 se llevó a cabo el primer taller técnica e fundamento realizado en la ciudad de Pasto - Nariño a cargo de los formados Batata y Minhoca de la ciudad de Bogota.', '9twp51tx63.jpg', 'seminario-tecnica-e-fundamento-2018', 1, 1, '2019-04-01 08:10:54', '2019-05-20 22:39:00'),
(2, 'Batizado e troca de cordas Bogota 2019', 'Durante el mes de Junio de este año se llevará a cabo en Bogota el batizado e troca de cordas, en el cual estará presente Mestre Delei fundador del grupo internacional de capoeira Abolicao y con el estarán Mestrando anao, professores, formados y demas.', 'gjyq19zpe4.jpg', 'batizado-e-troca-de-cordas-bogota-2019', 2, 1, '2019-02-13 22:10:33', '2019-03-19 16:05:35'),
(3, '2do Ao som do Gunga', 'Durante el mes de marzo se llevó a cabo el segundop encuentro de capoeira Ao som do Gunga en la ciudad de Bogotá', 'gjyq19zpe4.jpg', '2do-ao-som-do-gunga', 1, 1, '2019-02-13 17:32:56', '2019-03-20 01:46:18'),
(5, 'Batizado Internacional Porto Seguro bahia 2019', 'Durante los dias 4 al 10 de febrero del presente año se darán cita en el estado de bahia Brazil los mejores exponentes del grupo Internacional de capoeira abolicao.', '98x9nmxi36.jpg', 'batizado-internacional-porto-seguro-bahia-2019', 2, 1, '2019-03-13 22:14:19', '2019-03-13 22:14:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', 'Administrador del sistema', NULL, NULL),
(2, 'user', 'Usuario', 'Usuario o alumno del sistema', '2019-05-03 04:38:57', '2019-05-03 04:38:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `direccion`, `telefono`, `fecha_nacimiento`, `password`, `usuario`, `email`, `path`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Camilo', 'Parra', 'Calle 22 # 1a-69', '3148025287', '1992-09-20', '$2y$10$2UTflDYBJMJqpRHtbV3OS.ukAj8wgjQNliZGMGRcIm9vNYP5uLlMq', 'caparra92', 'caparra92@gmail.com', 'w0vwm9sug7.png', 'EKb2Lmxf1uE72UIU333dpgZV2DDAWRvFgrtVU0WPQ6ib44orATpjtwHXgX3M', '2019-02-01 07:07:41', '2019-04-01 21:25:17'),
(4, 'John Freddy', 'Tutistar', 'Cra 4ta a #12b-47', '3105124961', '1994-02-03', '$2y$10$oyHmQsGuBh4NUhzP3aKN3.aejeBc.d19S3kRi3Ef1iZffbhaVWQf.', 'maculele1994', 'johnfre.157@gmail.com', '43bfcvsrhh.png', NULL, '2019-02-11 07:56:17', '2019-05-20 22:43:22'),
(5, 'La perro', 'Runita', 'JK 448', '991739069', '1989-07-01', '$2y$10$DMYU6T1Kxaz1hof6BSfef.NHcEJnPU6KAY5IIvD3fLkQJS7TyMy3S', 'laPerro', 'jngarciaca@gmail.com', 'mibuts0rq4.jpg', 'xZT8rjedEnMv3MEpQEYlPw1e3joa0URNN6JMGFCyA5zrlV6THcfE3VTRWoJm', '2019-03-10 21:41:01', '2019-05-21 20:31:46'),
(7, 'Galo', 'abolicao', 'calle 3 #45-45', '3124567899', '1992-09-20', '$2y$10$0TI09OxDsQkXds1mCjetWuECkn363U9xoh6UKBYU8sBe8qVRz8aeG', 'galoabolicao', 'galo@gmail.com', 'xd72nfuuke.png', '06BdiM3nUUZ2CEI4gzokT0CW3HB4WikxhUpTWBiVSxY7hmzuQePplkJb0FSd', '2019-03-29 15:53:45', '2019-03-29 15:55:25'),
(8, 'Natalia', 'Garcia', 'Av jk 448 Bl 07 apt 408', '991739069', '1989-07-01', '$2y$10$/qRmPu8XJc/eHo5TsON4WexVaP6imcQsL3lE5vzuYJ3lAtzctbfma', 'jngarcia89', 'jngarcia@hotmail.com', '', NULL, '2019-04-01 20:29:38', '2019-04-01 20:29:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_user_id_foreign` (`user_id`),
  ADD KEY `comentarios_post_id_foreign` (`post_id`);

--
-- Indices de la tabla `egresos_caja`
--
ALTER TABLE `egresos_caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pago_id` (`pago_id`),
  ADD KEY `mov_caja_id` (`mov_caja_id`);

--
-- Indices de la tabla `ingresos_caja`
--
ALTER TABLE `ingresos_caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pago_id` (`pago_id`),
  ADD KEY `ingresos_caja_ibfk_3` (`user_id`),
  ADD KEY `ingresos_caja_ibfk_4` (`mov_caja_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mov_cajas`
--
ALTER TABLE `mov_cajas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `caja_id` (`caja_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago_user`
--
ALTER TABLE `pago_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_pagos_user_id_foreign` (`user_id`),
  ADD KEY `users_pagos_pago_id_foreign` (`pago_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_categoria_id_foreign` (`categoria_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `egresos_caja`
--
ALTER TABLE `egresos_caja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos_caja`
--
ALTER TABLE `ingresos_caja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mov_cajas`
--
ALTER TABLE `mov_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pago_user`
--
ALTER TABLE `pago_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `egresos_caja`
--
ALTER TABLE `egresos_caja`
  ADD CONSTRAINT `egresos_caja_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egresos_caja_ibfk_3` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egresos_caja_ibfk_4` FOREIGN KEY (`mov_caja_id`) REFERENCES `cajas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingresos_caja`
--
ALTER TABLE `ingresos_caja`
  ADD CONSTRAINT `ingresos_caja_ibfk_2` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingresos_caja_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingresos_caja_ibfk_4` FOREIGN KEY (`mov_caja_id`) REFERENCES `mov_cajas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mov_cajas`
--
ALTER TABLE `mov_cajas`
  ADD CONSTRAINT `mov_cajas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mov_cajas_ibfk_2` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_user`
--
ALTER TABLE `pago_user`
  ADD CONSTRAINT `users_pagos_pago_id_foreign` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_pagos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
