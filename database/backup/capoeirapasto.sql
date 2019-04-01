-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2019 a las 20:37:12
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
(138, 'Excelente noticia', 4, 1, '2019-03-13 23:15:49', '2019-03-13 23:15:49'),
(139, 'Excelentes aulas', 3, 1, '2019-03-20 02:17:14', '2019-03-20 02:17:14'),
(140, 'Muy bonita experiencia', 5, 1, '2019-03-20 02:23:57', '2019-03-20 02:23:57');

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
(6, '2019_01_22_024658_create_pagos_table', 5);

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
(5, 'Mensualidad', 'Pagos mensuales por concepto de clases de capoeira a pagarse el 5 de cada mes', 40000, '2019-02-07 22:20:24', '2019-02-07 22:20:24'),
(6, 'Berimbaos', 'berimbaos de biriba', 80000, '2019-02-11 07:58:24', '2019-02-11 07:58:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_user`
--

CREATE TABLE `pago_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pago_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pago_user`
--

INSERT INTO `pago_user` (`id`, `estado`, `fecha`, `user_id`, `pago_id`, `created_at`, `updated_at`) VALUES
(39, 'pagado', '2019-03-08', 1, 2, '2019-02-09 08:44:32', '2019-02-09 08:44:32'),
(41, 'pagado', '2019-03-01', 1, 5, '2019-03-09 03:57:32', '2019-03-09 03:57:32'),
(42, 'pagado', '2019-02-01', 1, 6, '2019-03-09 04:07:05', '2019-03-09 04:07:05');

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
(1, 'Seminario Técnica e fundamento 2018', 'Durante el mes de octubre del año 2018 se llevó a cabo el primer taller técnica e fundamento realizado en la ciudad de Pasto - Nariño a cargo de los formados Batata y Minhoca de la ciudad de Bogota.', 'mffhmkxd7k.jpg', 'seminario-tecnica-e-fundamento-2018', 2, 1, '2019-04-01 08:10:54', '2019-03-19 16:04:30'),
(2, 'Batizado e troca de cordas Bogota 2019', 'Durante el mes de Junio de este año se llevará a cabo en Bogota el batizado e troca de cordas, en el cual estará presente Mestre Delei fundador del grupo internacional de capoeira Abolicao y con el estarán Mestrando anao, professores, formados y demas.', 'gjyq19zpe4.jpg', 'batizado-e-troca-de-cordas-bogota-2019', 2, 1, '2019-02-13 22:10:33', '2019-03-19 16:05:35'),
(3, '2do Ao som do Gunga', 'Durante el mes de marzo se llevó a cabo el segundop encuentro de capoeira Ao som do Gunga en la ciudad de Bogotá', 'gjyq19zpe4.jpg', '2do-ao-som-do-gunga', 1, 1, '2019-02-13 17:32:56', '2019-03-20 01:46:18'),
(4, 'Capoeira reconocida en la UNESCO', 'capoeira ha sido declarada como patrimonio inmaterial de la humanidad desde el año 2014 por la UNESCO.', 'm15bvqdc2m.jpg', 'capoeira-reconocida-en-la-unesco', 2, 1, '2019-03-13 20:25:27', '2019-03-19 16:07:40'),
(5, 'Batizado Internacional Porto Seguro bahia 2019', 'Durante los dias 4 al 10 de febrero del presente año se darán cita en el estado de bahia Brazil los mejores exponentes del grupo Internacional de capoeira abolicao.', '98x9nmxi36.jpg', 'batizado-internacional-porto-seguro-bahia-2019', 2, 1, '2019-03-13 22:14:19', '2019-03-13 22:14:19');

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
(1, 'Camilo', 'Parra', 'Calle 22 # 1a-69', '3148025287', '1992-09-20', '$2y$10$2UTflDYBJMJqpRHtbV3OS.ukAj8wgjQNliZGMGRcIm9vNYP5uLlMq', 'caparra92', 'caparra92@gmail.com', 'w0vwm9sug7.png', 'sIaarb237ocoKAGBG20f7A21BZqVqUJQdKA0XFk6hT8dGuD8nNMEVWGMi5mV', '2019-02-01 07:07:41', '2019-03-29 05:18:48'),
(4, 'John Freddy', 'Tutistar', 'Cra 4ta a #12b-47', '3105124961', '1994-02-03', '1234', 'maculele1994', 'johnfre.157@gmail.com', '', NULL, '2019-02-11 07:56:17', '2019-03-10 21:20:03'),
(5, 'La perro', 'Runa', 'JK 448', '991739069', '1989-07-01', '$2y$10$bAxX1Bbj5NDaTOrD1xOYsOonn67IT.364choHCUcGITpz47k5Uilu', 'laPerro', 'jngarciaca@gmail.com', '', 'xZT8rjedEnMv3MEpQEYlPw1e3joa0URNN6JMGFCyA5zrlV6THcfE3VTRWoJm', '2019-03-10 21:41:01', '2019-03-10 21:41:01'),
(7, 'Galo', 'abolicao', 'calle 3 #45-45', '3124567899', '1992-09-20', '$2y$10$0TI09OxDsQkXds1mCjetWuECkn363U9xoh6UKBYU8sBe8qVRz8aeG', 'galoabolicao', 'galo@gmail.com', 'xd72nfuuke.png', 'YFfKAZKEm6yjc4VZUasGpcGwfjEyeSGVmwG0fHFqu8IO47a2rmlVSBXyLaal', '2019-03-29 15:53:45', '2019-03-29 15:55:25');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_categoria_id_foreign` (`categoria_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pago_user`
--
ALTER TABLE `pago_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Filtros para la tabla `pago_user`
--
ALTER TABLE `pago_user`
  ADD CONSTRAINT `users_pagos_pago_id_foreign` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_pagos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
