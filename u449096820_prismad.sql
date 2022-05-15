-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-05-2022 a las 22:26:52
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u449096820_prismad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(10) UNSIGNED NOT NULL,
  `editor_id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repertorio_id` bigint(20) NOT NULL,
  `tipo_secundario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instrumental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compositor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arreglista` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annio_produccion` year(4) NOT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subgenero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero_secundario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subgenero_secundario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letra_chocante_vulgar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio_previsualizacion` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idioma_titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma_letra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_principal_salida` date DEFAULT NULL,
  `pista_mp3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `repertorio_id`, `tipo_secundario`, `instrumental`, `titulo`, `version_subtitulo`, `autor`, `compositor`, `arreglista`, `productor`, `pline`, `annio_produccion`, `genero`, `subgenero`, `genero_secundario`, `subgenero_secundario`, `letra_chocante_vulgar`, `inicio_previsualizacion`, `idioma_titulo`, `idioma_letra`, `fecha_principal_salida`, `pista_mp3`) VALUES
(4, 8, 'original', 'si', 'Intro Perierat Loculus', 'Intro Perierat Loculus - (lyrics)', 'Javier Varon', 'Jennifer Agudelo', 'Nestor Viana', 'Brayan Perdomo', 'ASD-T', 2022, 'Heavy Metal', 'Dark', 'Rock', 'Death Industrial', 'si', '3', 'Italiano', 'Inglés', '2022-03-31', 'canciones/March2022/1647803932.wav'),
(5, 9, 'original', 'si', 'La gata moon', 'Agatha', 'Jesucristo', 'javier', 'ivan', 'Varon', 'Bueno', 2022, 'Alternative', 'Acid house', 'Afoxé', 'Acid', 'si', '2', 'Español', 'Español', '2023-02-08', 'canciones/March2022/1647805409.wav'),
(6, 10, 'original', 'si', 'somo de barrio', 'Agatha', 'el barrios nos llama', 'ya tu sabe', 'el que sabe', 'el que no sabe', 'el que lo sabe', 2022, 'Americana', 'Acid Punk', 'Afoxé', 'Acid', 'si', '5', 'Francés', 'Español', '2022-08-25', 'canciones/March2022/1647806503.wav'),
(7, 11, 'original', 'no', 'bien por ti', NULL, 'kelly cardenas', 'kelly cardenas', 'prismad music', 'alejo cruz', 'prismad music', 2022, 'Reggae', 'Pop', 'Afoxé', 'Acid', 'no', '120', 'Español', 'Español', '2022-03-28', 'canciones/March2022/1647839519.wav'),
(8, 11, 'original', 'no', 'bien por ti', NULL, 'kelly cardenas', 'kelly cardenas', 'prismad music', 'alejo cruz', 'prismad music', 2022, 'Reggae', 'Pop', 'Afoxé', 'Acid', 'no', '120', 'Español', 'Español', '2022-03-28', 'canciones/March2022/1647839615.wav'),
(9, 13, 'karaoke', 'no', 'Las mañanitas', NULL, 'LordCandocar', 'Candido Moreno', 'Javier Varon', 'Johan Vacca', 'Obligatorio', 2022, 'Ambient', 'Acid', 'Ambient', 'Acid', 'no', '3', 'Español', 'Español', '2022-05-07', '1650871725.wav'),
(10, 16, 'original', 'no', 'Loley', 'Intro Perierat Loculus - (lyrics)', 'Javier Varon', 'Jennifer Agudelo', 'Nestor Viana', 'Skull Red', 'ASD-T', 2022, 'Reggaeton', 'Latin', 'Reggaeton', 'Latin', 'no', '34', 'Español', 'Español', '2022-05-14', '1651461575.wav'),
(11, 19, 'karaoke', 'no', 'Canción 1 de JV12', 'Version_1', 'JV12', 'JV12', 'JV12', 'JV12', 'NoSeQueEsPline', 2022, 'Celtic Folk', 'Canto livre', 'Celtic Folk', 'Canto livre', 'no', '4', 'Ruso', 'Árabe', '2022-05-24', '1652013347.wav');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(2, NULL, 1, 'Category 2', 'category-2', '2022-01-02 04:43:18', '2022-01-02 04:43:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `persona_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_artistico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_spoty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `persona_id`, `nombre_artistico`, `link_spoty`) VALUES
(5, 17, 'PrismadMusic', 'open.'),
(19, 36, 'lol', NULL),
(20, 37, 'davinxi', 'https://open.spotify.com/track/5Xn3ouAZ912kJEhYInD70A?si=027b3f2f29d64279'),
(21, 38, 'Jorgevelezelpanda', NULL),
(22, 39, 'Jorgevelezelpanda', NULL),
(23, 40, 'MIGUEL HUERTAS', 'https://open.spotify.com/artist/2gXDNzafAvtZ4dYrDBhYpm?si=PGRSbbQUS7WjXR6gqCGvGw'),
(24, 41, 'La Shule', 'https://open.spotify.com/artist/4u4FEjo1WEgiwgC2fRsQHB?si=neXxstxiRV-QKldNtzWtuA&utm_source=copy-link'),
(25, 42, 'Nelson Romero', 'https://open.spotify.com/artist/4QI5KKpGTdNQaYo7mIpIN3?si=zVHju4vHR_SOFIScQhDuBA'),
(26, 43, 'Mey Manjarres', 'https://open.spotify.com/user/12127905777?si=-LxXOYhcTWWCytSvvDgjPw&utm_source=copy-link&nd=1'),
(27, 44, 'Kassett', 'https://open.spotify.com/track/08DoQ1mGKSjLWn98NnseYX?si=f57cc08980aa4eba'),
(28, 45, 'Vanna', NULL),
(29, 46, 'Anica Rod', 'https://open.spotify.com/artist/0BWH2QK6dFzWdZr72LwqaQ?si=mTFR5-4nR2SoHNnUP6BzyQ'),
(30, 47, 'Witthy', NULL),
(31, 48, 'LordCandocar', 'https://open.spotify.com/user/08wfyckbjxeptjjbe3m2c912u'),
(33, 50, 'mosik', NULL),
(34, 51, 'Shinobido', 'open.spotify/artist:shinobido'),
(35, 52, 'YohanInstitucional', 'open.spotify/artistUnillanos'),
(36, 53, 'llano music', 'https://open.spotify.com/artist/6p98zCBQU192bKp0TgzSdX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboracion`
--

CREATE TABLE `colaboracion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje_intelectual` double NOT NULL,
  `cancion_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colaboracion`
--

INSERT INTO `colaboracion` (`id`, `cliente_email`, `porcentaje_intelectual`, `cancion_id`) VALUES
(6, 'javoxdaemon@gmail.com', 50, 4),
(7, 'jeniagaitan@gmail.com', 50, 4),
(8, 'jeniagaitan@gmail.com', 50, 5),
(9, 'javoxdaemon@gmail.com', 30, 5),
(10, 'jvaronbueno@gmail.com', 20, 5),
(11, 'jeniagaitan@gmail.com', 50, 6),
(12, 'javoxdaemon@gmail.com', 20, 6),
(13, 'candido.moreno@unillanos.edu.co', 50, 9),
(14, 'yohan.vacca@unillanos.edu.co', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboracion_art_feas`
--

CREATE TABLE `colaboracion_art_feas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_colaboracion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancion_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboracion_repertorio`
--

CREATE TABLE `colaboracion_repertorio` (
  `id` int(10) UNSIGNED NOT NULL,
  `repertorio_id` bigint(20) NOT NULL,
  `cliente_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_colaboracion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spotify_colaboracion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colaboracion_repertorio`
--

INSERT INTO `colaboracion_repertorio` (`id`, `repertorio_id`, `cliente_email`, `tipo_colaboracion`, `spotify_colaboracion`) VALUES
(1, 7, 'stiivenmoreno@gmail.com', 'Principal', 'https://open.spotify.com/user/08wfyckbjxeptjjbe3m2c912u?si=df70056207424a55'),
(2, 8, 'javoxdaemon@gmail.com', 'Principal (1st)', 'www.javox.com'),
(3, 8, 'jeniagaitan@gmail.com', 'Featuring', 'www.jenniagaitan.com'),
(4, 9, 'jeniagaitan@gmail.com', 'Principal (1st)', 'www.lajena.com'),
(5, 9, 'javoxdaemon@gmail.com', 'Featuring', 'www.javox.com'),
(6, 9, 'jvaronbueno@gmail.com', 'Remixer', 'www.jvaronbuneo.com'),
(7, 10, 'jeniagaitan@gmail.com', 'Principal (1st)', 'www.lajena.com'),
(8, 10, 'javoxdaemon@gmail.com', 'Featuring', 'www.javox.com'),
(9, 11, 'polappcolombia@gmail.com', 'Principal (1st)', NULL),
(10, 12, 'jvaronbueno@gmail.com', 'Principal (1st)', 'www.malkan.com'),
(11, 13, 'stiivenmoreno@gmail.com', 'Principal (1st)', 'https://open.spotify.com/user/08wfyckbjxeptjjbe3m2c912u?si=78a27f635d8c47ef'),
(12, 14, 'witthyguitar@gmail.com', 'Principal (1st)', NULL),
(13, 15, 'stiivenmoreno@gmail.com', 'Principal (1st)', 'https://open.spotify.com/user/08wfyckbjxeptjjbe3m2c912u'),
(14, 16, 'contactomosik@gmail.com', 'Principal (1st)', NULL),
(15, 17, 'contactomosik@gmail.com', 'Principal (1st)', NULL),
(16, 18, 'witthyguitar@gmail.com', 'Principal (1st)', NULL),
(17, 19, 'johan.vacca12@gmail.com', 'Principal (1st)', 'open.spotify/artist:shinobido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Role Adicional', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'editor_id', 'text', 'Editor Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{}', 3),
(59, 7, 'resumen', 'text', 'Resumen', 1, 1, 1, 1, 1, 1, '{}', 4),
(60, 7, 'imagen', 'image', 'Imagen', 1, 1, 1, 1, 1, 1, '{}', 5),
(61, 7, 'link', 'text', 'Link', 1, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'articulo_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"editor_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":null}', 7),
(63, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(64, 8, 'cliente_id', 'text', 'Cliente Id', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"El cliente es obligatorio\"}}}', 2),
(65, 8, 'desprendible', 'file', 'Desprendible', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|mimes:pdf\",\"messages\":{\"required\":\"El desprendible es obligatorio\",\"mimes\":\"El desprendible debe ser formato PDF\"}}}', 3),
(66, 8, 'fecha_informe', 'timestamp', 'Fecha Informe', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"La fecha de informe es requerida\"}}}', 4),
(67, 8, 'nomina_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(68, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(69, 9, 'repertorio_id', 'text', 'Repertorio Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(70, 9, 'tipo_secundario', 'text', 'Tipo Secundario', 1, 1, 1, 1, 1, 1, '{}', 3),
(71, 9, 'instrumental', 'text', 'Instrumental', 1, 1, 1, 1, 1, 1, '{}', 4),
(72, 9, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{}', 5),
(73, 9, 'version_subtitulo', 'text', 'Version Subtitulo', 0, 1, 1, 1, 1, 1, '{}', 6),
(74, 9, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 7),
(75, 9, 'featuring', 'text', 'Featuring', 0, 1, 1, 1, 1, 1, '{}', 8),
(76, 9, 'remixer', 'text', 'Remixer', 0, 1, 1, 1, 1, 1, '{}', 9),
(77, 9, 'autor', 'text', 'Autor', 1, 1, 1, 1, 1, 1, '{}', 10),
(78, 9, 'compositor', 'text', 'Compositor', 1, 1, 1, 1, 1, 1, '{}', 11),
(79, 9, 'arreglista', 'text', 'Arreglista', 0, 1, 1, 1, 1, 1, '{}', 12),
(80, 9, 'productor', 'text', 'Productor', 0, 1, 1, 1, 1, 1, '{}', 13),
(81, 9, 'pline', 'text', 'Pline', 1, 1, 1, 1, 1, 1, '{}', 14),
(82, 9, 'annio_produccion', 'text', 'Annio Produccion', 1, 1, 1, 1, 1, 1, '{}', 15),
(83, 9, 'genero', 'text', 'Genero', 1, 1, 1, 1, 1, 1, '{}', 16),
(84, 9, 'subgenero', 'text', 'Subgenero', 1, 1, 1, 1, 1, 1, '{}', 17),
(85, 9, 'genero_secundario', 'text', 'Genero Secundario', 0, 1, 1, 1, 1, 1, '{}', 18),
(86, 9, 'subgenero_secundario', 'text', 'Subgenero Secundario', 0, 1, 1, 1, 1, 1, '{}', 19),
(87, 9, 'letra_chocante_vulgar', 'text', 'Letra Chocante Vulgar', 1, 1, 1, 1, 1, 1, '{}', 20),
(88, 9, 'inicio_previsualizacion', 'text', 'Inicio Previsualizacion', 0, 1, 1, 1, 1, 1, '{}', 21),
(89, 9, 'idioma_titulo', 'text', 'Idioma Titulo', 1, 1, 1, 1, 1, 1, '{}', 22),
(90, 9, 'idioma_letra', 'text', 'Idioma Letra', 1, 1, 1, 1, 1, 1, '{}', 23),
(91, 9, 'fecha_principal_salida', 'text', 'Fecha Principal Salida', 0, 1, 1, 1, 1, 1, '{}', 24),
(93, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(95, 10, 'nombre_artistico', 'text', 'Nombre Artistico', 1, 1, 1, 1, 1, 1, '{}', 3),
(96, 10, 'link_spoty', 'text', 'Link Spoty', 0, 1, 1, 1, 1, 1, '{}', 4),
(99, 10, 'cliente_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Persona\",\"table\":\"persona\",\"type\":\"belongsTo\",\"column\":\"persona_id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(100, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(102, 11, 'porcentaje_intelectual', 'text', 'Porcentaje Intelectual', 1, 1, 1, 1, 1, 1, '{}', 3),
(103, 11, 'colaboracion_belongsto_cancion_relationship', 'relationship', 'cancion', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cancion\",\"table\":\"cancion\",\"type\":\"belongsTo\",\"column\":\"cancion_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(104, 11, 'cancion_id', 'text', 'Cancion Id', 1, 1, 1, 1, 1, 1, '{}', 4),
(105, 11, 'nombre_colaboracion', 'text', 'Nombre Colaboracion', 1, 1, 1, 1, 1, 1, '{}', 5),
(106, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(107, 13, 'cliente_id', 'text', 'Cliente Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(108, 13, 'informe', 'file', 'Informe', 1, 1, 1, 1, 1, 1, '{}', 3),
(110, 13, 'regalium_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(111, 9, 'cancion_belongsto_repertorio_relationship_1', 'relationship', 'repertorio', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Repertorio\",\"table\":\"repertorio\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 26),
(112, 9, 'cancion_belongsto_colaboracion_relationship', 'relationship', 'colaboracion', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Colaboracion\",\"table\":\"colaboracion\",\"type\":\"belongsTo\",\"column\":\"colaboracion_id\",\"key\":\"id\",\"label\":\"nombre_colaboracion\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 27),
(113, 9, 'colaboracion_id', 'text', 'Colaboracion Id', 1, 1, 1, 1, 1, 1, '{}', 25),
(114, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(115, 14, 'portada', 'text', 'Portada', 0, 1, 1, 1, 1, 1, '{}', 2),
(116, 14, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{}', 3),
(117, 14, 'version', 'text', 'Version', 0, 1, 1, 1, 1, 1, '{}', 4),
(118, 14, 'artista_principal', 'text', 'Artista Principal', 0, 1, 1, 1, 1, 1, '{}', 5),
(119, 14, 'genero', 'text', 'Genero', 1, 1, 1, 1, 1, 1, '{}', 6),
(120, 14, 'subgenero', 'text', 'Subgenero', 1, 1, 1, 1, 1, 1, '{}', 7),
(121, 14, 'nombre_sello', 'text', 'Nombre Sello', 1, 1, 1, 1, 1, 1, '{}', 8),
(122, 14, 'formato', 'text', 'Formato', 1, 1, 1, 1, 1, 1, '{}', 9),
(123, 14, 'fecha_salida', 'text', 'Fecha Salida', 1, 1, 1, 1, 1, 1, '{}', 10),
(124, 14, 'productor', 'text', 'Productor', 1, 1, 1, 1, 1, 1, '{}', 11),
(125, 14, 'copyright', 'text', 'Copyright', 1, 1, 1, 1, 1, 1, '{}', 12),
(126, 14, 'annio_produccion', 'text', 'Annio Produccion', 1, 1, 1, 1, 1, 1, '{}', 13),
(127, 14, 'upc_ean', 'text', 'Upc Ean', 0, 1, 1, 1, 1, 1, '{}', 14),
(128, 14, 'numero_catalogo', 'text', 'Numero Catalogo', 0, 1, 1, 1, 1, 1, '{}', 15),
(129, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 0, 0, 1, '{}', 6),
(136, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(137, 15, 'nombre', 'text', 'Nombre', 0, 1, 1, 1, 1, 1, '{}', 2),
(138, 15, 'apellido', 'text', 'Apellido', 0, 1, 1, 1, 1, 1, '{}', 3),
(139, 15, 'pais', 'text', 'Pais', 0, 1, 1, 1, 1, 1, '{}', 4),
(140, 15, 'ciudad', 'text', 'Ciudad', 0, 1, 1, 1, 1, 1, '{}', 6),
(142, 15, 'numero_identificacion', 'text', 'Numero Identificacion', 0, 1, 1, 1, 1, 1, '{}', 8),
(143, 15, 'telefono', 'text', 'Telefono', 0, 1, 1, 1, 1, 1, '{}', 9),
(144, 15, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 10),
(145, 15, 'persona_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(146, 10, 'persona_id', 'text', 'Persona Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(147, 15, 'tipo_documento', 'text', 'Tipo Documento', 0, 1, 1, 1, 1, 1, '{}', 7),
(148, 15, 'departamento', 'text', 'Departamento', 0, 1, 1, 1, 1, 1, '{}', 5),
(150, 1, 'registro_confirmed', 'checkbox', 'Registro Confirmed', 0, 1, 1, 0, 0, 1, '{\"on\":\"Completado\",\"off\":\"Incompleto\"}', 12),
(153, 13, 'fecha_informe_inicio', 'date', 'Fecha Informe Inicio', 1, 1, 1, 1, 1, 1, '{}', 4),
(154, 13, 'fecha_informe_final', 'date', 'Fecha Informe Final', 1, 1, 1, 1, 1, 1, '{}', 5),
(155, 13, 'regalium_belongsto_nomina_relationship', 'relationship', 'nomina', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Nomina\",\"table\":\"nomina\",\"type\":\"belongsTo\",\"column\":\"nomina_id\",\"key\":\"id\",\"label\":\"desprendible\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(156, 13, 'nomina_id', 'text', 'Nomina Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(157, 13, 'valor', 'number', 'Valor', 1, 1, 1, 1, 1, 1, '{}', 7),
(158, 8, 'valor', 'number', 'Valor', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|numeric\",\"messages\":{\"required\":\"El valor es obligatorio\",\"numeric\":\"S\\u00f3lo se aceptan n\\u00fameros\"}}}', 5),
(159, 9, 'cancion_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":null}', 28),
(160, 11, 'colaboracion_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_email\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(161, 8, 'nombre_banco', 'text', 'Nombre Banco', 0, 1, 1, 1, 1, 1, '{}', 6),
(162, 8, 'numero_cuenta', 'text', 'Numero Cuenta', 0, 1, 1, 1, 1, 1, '{}', 7),
(163, 8, 'tipo_cuenta', 'select_dropdown', 'Tipo Cuenta', 0, 1, 1, 1, 1, 1, '{\"default\":\"Ahorros\",\"options\":{\"Ahorros\":\"Ahorros\",\"Corriente\":\"Corriente\"}}', 8),
(164, 11, 'cliente_email', 'text', 'Cliente Email', 1, 1, 1, 1, 1, 1, '{}', 2),
(165, 11, 'tipo_colaboracion', 'text', 'Tipo Colaboracion', 1, 1, 1, 1, 1, 1, '{}', 6),
(166, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(167, 18, 'repertorio_id', 'text', 'Repertorio Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(168, 18, 'cliente_email', 'text', 'Cliente Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(169, 18, 'tipo_colaboracion', 'text', 'Tipo Colaboracion', 0, 1, 1, 1, 1, 1, '{}', 4),
(170, 18, 'spotify_colaboracion', 'text', 'Spotify Colaboracion', 0, 1, 1, 1, 1, 1, '{}', 5),
(171, 18, 'colaboracion_repertorio_belongsto_repertorio_relationship', 'relationship', 'repertorio', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Repertorio\",\"table\":\"repertorio\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(172, 18, 'colaboracion_repertorio_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_email\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(173, 15, 'firma', 'text', 'Firma', 0, 1, 1, 1, 1, 1, '{}', 11),
(174, 15, 'contrato', 'file', 'Contrato', 0, 1, 1, 1, 1, 1, '{}', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:12', '2022-01-24 12:15:08'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-01-02 04:43:12', '2022-01-02 04:43:12'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-01-02 04:43:12', '2022-01-02 04:43:12'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-01-02 04:43:20', '2022-01-02 04:43:20'),
(7, 'articulo', 'articulo', 'Articulo', 'Articulos', 'voyager-news', 'App\\Models\\Articulo', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-01-02 01:44:23', '2022-01-02 01:44:23'),
(8, 'nomina', 'nomina', 'Nomina', 'Nominas', 'fa fa-university', 'App\\Models\\Nomina', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:14:43', '2022-03-14 23:54:28'),
(9, 'cancion', 'cancion', 'Cancion', 'Canciones', 'voyager-music', 'App\\Models\\Cancion', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:18:22', '2022-01-02 17:47:17'),
(10, 'cliente', 'cliente', 'Cliente', 'Clientes', 'voyager-smile', 'App\\Models\\Cliente', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:22:19', '2022-04-28 00:22:22'),
(11, 'colaboracion', 'colaboracion', 'Colaboracion', 'Colaboraciones', 'voyager-people', 'App\\Models\\Colaboracion', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:26:02', '2022-03-18 23:05:21'),
(13, 'regalia', 'regalia', 'Regalia', 'Regalias', 'voyager-wallet', 'App\\Models\\Regalia', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:42:20', '2022-01-25 23:21:00'),
(14, 'repertorio', 'repertorio', 'Repertorio', 'Repertorios', 'voyager-documentation', 'App\\Models\\Repertorio', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(15, 'persona', 'persona', 'Persona', 'Personas', NULL, 'App\\Models\\Persona', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-05 21:30:03', '2022-04-28 00:23:57'),
(18, 'colaboracion_repertorio', 'colaboracion-repertorio', 'Colaboracion Repertorio', 'Colaboracion Repertorios', 'voyager-logbook', 'App\\Models\\ColaboracionRepertorio', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-18 23:07:56', '2022-03-18 23:10:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(3) DEFAULT NULL,
  `nombre` varchar(19) DEFAULT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Afoxé', NULL),
(2, 'Alternative', NULL),
(3, 'Ambient', NULL),
(4, 'Americana', NULL),
(5, 'Anime', NULL),
(6, 'Arabesk', NULL),
(7, 'Avant-garde', NULL),
(8, 'Axé', NULL),
(9, 'Baile Funk', NULL),
(10, 'Bluegrass', NULL),
(11, 'Blues', NULL),
(12, 'Bossa nova', NULL),
(13, 'Breakbeat', NULL),
(14, 'Britpop', NULL),
(15, 'Bugio', NULL),
(16, 'C-Pop', NULL),
(17, 'Cajun', NULL),
(18, 'Canção', NULL),
(19, 'Cantopop/HK-Pop 1', NULL),
(20, 'Celtic', NULL),
(21, 'Celtic Folk', NULL),
(22, 'Chamamé', NULL),
(23, 'Chamarra', NULL),
(24, 'Chamber music', NULL),
(25, 'Children\'s music', NULL),
(26, 'Chill-Out', NULL),
(27, 'Chinese', NULL),
(28, 'Chorinho', NULL),
(29, 'Choro', NULL),
(30, 'Christian', NULL),
(31, 'Classical', NULL),
(32, 'Classical Crossover', NULL),
(33, 'Comedy', NULL),
(34, 'Country', NULL),
(35, 'Cumbia', NULL),
(36, 'Dance', NULL),
(37, 'Dancehall', NULL),
(38, 'Delta blues', NULL),
(39, 'Disco', NULL),
(40, 'Dixieland', NULL),
(41, 'Downtempo', NULL),
(42, 'Drum and bass', NULL),
(43, 'Dub', NULL),
(44, 'Easy listening', NULL),
(45, 'Electronic', NULL),
(46, 'Electronica', NULL),
(47, 'Emo', NULL),
(48, 'Enka', NULL),
(49, 'Folk', NULL),
(50, 'Forró', NULL),
(51, 'French Pop', NULL),
(52, 'Frevo', NULL),
(53, 'Funk', NULL),
(54, 'Gangsta rap', NULL),
(55, 'German Folk', NULL),
(56, 'German Pop', NULL),
(57, 'Gospel', NULL),
(58, 'Grunge', NULL),
(59, 'Guitarra baiana', NULL),
(60, 'Hard bop', NULL),
(61, 'Hardcore', NULL),
(62, 'Heavy Metal', NULL),
(63, 'Hip Hop/Rap', NULL),
(64, 'Holiday Music', NULL),
(65, 'House', NULL),
(66, 'Indo Pop', NULL),
(67, 'Industrial', NULL),
(68, 'Jazz', NULL),
(69, 'Karaoke', NULL),
(70, 'Kayokyuoku', NULL),
(71, 'Kizomba', NULL),
(72, 'Latin Jazz', NULL),
(73, 'Latin Rap', NULL),
(74, 'Lounge', NULL),
(75, 'Milonga', NULL),
(76, 'Motown', NULL),
(77, 'MPB', NULL),
(78, 'New Age', NULL),
(79, 'New Wave', NULL),
(80, 'Opera', NULL),
(81, 'Pagode', NULL),
(82, 'Pop', NULL),
(83, 'Pop in Spanish', NULL),
(84, 'Psychedelic', NULL),
(85, 'Punk', NULL),
(86, 'Ragtime', NULL),
(87, 'Rancheira', NULL),
(88, 'Rap', NULL),
(89, 'Reggae', NULL),
(90, 'Reggaeton', NULL),
(91, 'Regional Mexicano', NULL),
(92, 'Rhythm & Blues', NULL),
(93, 'Rock', NULL),
(94, 'Rap', NULL),
(95, 'Rockabilly', NULL),
(96, 'Russian Chanson', NULL),
(97, 'Salsa', NULL),
(98, 'Salsa Choke', NULL),
(99, 'Samba', NULL),
(100, 'Samba-canção', NULL),
(101, 'Samba-reggae', NULL),
(102, 'Sertaneja', NULL),
(103, 'Singer-songwriter', NULL),
(104, 'Ska', NULL),
(105, 'Smooth jazz', NULL),
(106, 'Soca', NULL),
(107, 'Soul', NULL),
(108, 'Soundtrack', NULL),
(109, 'Spoken Word', NULL),
(110, 'Surf', NULL),
(111, 'Techno', NULL),
(112, 'Teen Pop', NULL),
(113, 'Thai Pop', NULL),
(114, 'Trance', NULL),
(115, 'Trap', NULL),
(116, 'Trip Rock', NULL),
(117, 'Turkish', NULL),
(118, 'Underground', NULL),
(119, 'Urban Cowboy', NULL),
(120, 'Vallenato', NULL),
(121, 'Valsa', NULL),
(122, 'Vanera', NULL),
(123, 'Vocal', NULL),
(124, 'World', NULL),
(125, 'Worldbeat', NULL),
(126, 'Xote', NULL),
(127, 'Zydeco', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-01-02 04:43:13', '2022-01-02 04:43:13'),
(2, 'moderador', '2022-02-03 21:51:47', '2022-02-03 21:51:47'),
(3, 'cliente', '2022-02-03 21:52:02', '2022-02-03 21:52:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Escritorio', '', '_self', 'voyager-boat', '#e4de1b', NULL, 1, '2022-01-02 04:43:13', '2022-02-03 23:34:21', 'voyager.dashboard', 'null'),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 27, 1, '2022-01-02 04:43:13', '2022-01-10 23:41:13', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, 22, 1, '2022-01-02 04:43:14', '2022-01-10 23:36:18', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 22, 2, '2022-01-02 04:43:14', '2022-01-10 23:36:19', 'voyager.roles.index', NULL),
(5, 1, 'Herramientas', '', '_self', 'voyager-tools', '#000000', NULL, 3, '2022-01-02 04:43:14', '2022-01-10 23:45:27', NULL, ''),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2022-01-02 04:43:14', '2022-01-10 22:57:49', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2022-01-02 04:43:14', '2022-01-10 22:57:49', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2022-01-02 04:43:14', '2022-01-10 22:57:49', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2022-01-02 04:43:14', '2022-01-10 22:57:49', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, 27, 5, '2022-01-02 04:43:14', '2022-01-10 23:41:13', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, 27, 4, '2022-01-02 04:43:18', '2022-01-10 23:41:13', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, 27, 2, '2022-01-02 04:43:19', '2022-01-10 23:41:13', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, 27, 3, '2022-01-02 04:43:20', '2022-01-10 23:41:13', 'voyager.pages.index', NULL),
(14, 1, 'Articulos', '', '_self', 'voyager-news', NULL, 22, 5, '2022-01-02 01:44:23', '2022-01-10 23:36:26', 'voyager.articulo.index', NULL),
(15, 1, 'Nominas', '', '_self', 'fa fa-university', '#000000', 22, 6, '2022-01-02 17:14:43', '2022-01-23 17:21:45', 'voyager.nomina.index', 'null'),
(16, 1, 'Canciones', '', '_self', 'voyager-music', NULL, 22, 7, '2022-01-02 17:18:23', '2022-01-10 23:36:32', 'voyager.cancion.index', NULL),
(17, 1, 'Clientes', '', '_self', 'voyager-smile', NULL, 22, 3, '2022-01-02 17:22:20', '2022-01-10 23:36:21', 'voyager.cliente.index', NULL),
(18, 1, 'Colaboraciones', '', '_self', 'voyager-group', '#000000', 22, 8, '2022-01-02 17:26:02', '2022-01-10 23:42:27', 'voyager.colaboracion.index', 'null'),
(19, 1, 'Regalias', '', '_self', 'voyager-wallet', '#000000', 22, 9, '2022-01-02 17:42:20', '2022-01-23 17:22:35', 'voyager.regalia.index', 'null'),
(20, 1, 'Repertorios', '', '_self', 'voyager-documentation', NULL, 22, 10, '2022-01-02 17:49:10', '2022-01-10 23:36:42', 'voyager.repertorio.index', NULL),
(21, 1, 'Personas', '', '_self', 'voyager-people', '#000000', 22, 4, '2022-01-05 21:30:03', '2022-01-10 23:36:23', 'voyager.persona.index', 'null'),
(22, 1, 'Administración', '', '_self', 'voyager-pirate', '#000000', NULL, 4, '2022-01-10 23:15:48', '2022-01-10 23:41:13', NULL, ''),
(26, 1, 'Despliegue', '', '_blank', 'voyager-dot-3', '#000000', 25, 1, '2022-01-10 23:30:25', '2022-01-10 23:32:50', NULL, 'null'),
(27, 1, 'Desarrollo', '', '_self', 'voyager-whale', '#000000', NULL, 2, '2022-01-10 23:38:07', '2022-01-10 23:41:13', NULL, ''),
(30, 3, 'Gestión de Repertorios', '/repertorio', '_self', 'voyager-music', '#000000', NULL, 2, '2022-02-03 21:55:21', '2022-05-08 01:10:06', NULL, ''),
(31, 3, 'Escritorio', '/admin', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-02-03 21:56:24', '2022-02-03 21:56:37', NULL, ''),
(32, 2, 'Escritorio', '/admin', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-02-03 21:57:47', '2022-02-28 04:00:31', NULL, ''),
(33, 2, 'Gestión de Nómina', '/nomina', '_self', 'fa fa-university', '#000000', NULL, 2, '2022-02-03 22:00:00', '2022-02-28 04:00:50', NULL, ''),
(34, 2, 'Gestón de Regalías', '/regalias', '_self', 'voyager-wallet', '#000000', NULL, 3, '2022-02-03 22:01:50', '2022-02-28 04:00:50', NULL, ''),
(35, 2, 'Gestión de Clientes', '/clientes', '_self', 'fa fa-user-circle-o', '#000000', NULL, 4, '2022-02-03 22:04:54', '2022-02-28 04:00:50', NULL, ''),
(36, 3, 'Informe de Pagos', '/informeNomina', '_self', 'fa fa-university', '#000000', 37, 1, '2022-02-12 15:51:40', '2022-05-08 01:11:39', NULL, ''),
(37, 3, 'Informes', '', '_self', 'fa fa-info-circle', '#000000', NULL, 4, '2022-02-12 23:41:14', '2022-05-08 01:10:06', NULL, ''),
(39, 3, 'Cargar Musica', '/cancion', '_self', 'fa fa-file-audio-o', '#000000', 38, 1, '2022-02-12 23:42:59', '2022-05-08 01:10:06', NULL, ''),
(40, 3, 'Informe de Regalías', '/informeRegalias', '_self', 'voyager-wallet', '#000000', 37, 2, '2022-02-12 23:43:58', '2022-02-12 23:44:21', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `desprendible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_informe` timestamp NULL DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `nombre_banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-01-02 04:43:21', '2022-01-02 04:43:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Jorgevelezpanda@gmail.com', '$2y$10$WRnEkFtRNCRUIArEYhThD.2Jkg89UEdRCkiOZXDnlybr7zQzJS1LK', '2022-04-17 12:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(2, 'browse_bread', NULL, '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(3, 'browse_database', NULL, '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(4, 'browse_media', NULL, '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(5, 'browse_compass', NULL, '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(6, 'browse_menus', 'menus', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(7, 'read_menus', 'menus', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(8, 'edit_menus', 'menus', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(9, 'add_menus', 'menus', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(10, 'delete_menus', 'menus', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(11, 'browse_roles', 'roles', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(12, 'read_roles', 'roles', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(13, 'edit_roles', 'roles', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(14, 'add_roles', 'roles', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(15, 'delete_roles', 'roles', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(16, 'browse_users', 'users', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(17, 'read_users', 'users', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(18, 'edit_users', 'users', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(19, 'add_users', 'users', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(20, 'delete_users', 'users', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(21, 'browse_settings', 'settings', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(22, 'read_settings', 'settings', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(23, 'edit_settings', 'settings', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(24, 'add_settings', 'settings', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(25, 'delete_settings', 'settings', '2022-01-02 04:43:15', '2022-01-02 04:43:15'),
(26, 'browse_categories', 'categories', '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(27, 'read_categories', 'categories', '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(28, 'edit_categories', 'categories', '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(29, 'add_categories', 'categories', '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(30, 'delete_categories', 'categories', '2022-01-02 04:43:18', '2022-01-02 04:43:18'),
(31, 'browse_posts', 'posts', '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(32, 'read_posts', 'posts', '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(33, 'edit_posts', 'posts', '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(34, 'add_posts', 'posts', '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(35, 'delete_posts', 'posts', '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(36, 'browse_pages', 'pages', '2022-01-02 04:43:20', '2022-01-02 04:43:20'),
(37, 'read_pages', 'pages', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(38, 'edit_pages', 'pages', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(39, 'add_pages', 'pages', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(40, 'delete_pages', 'pages', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(41, 'browse_articulo', 'articulo', '2022-01-02 01:44:23', '2022-01-02 01:44:23'),
(42, 'read_articulo', 'articulo', '2022-01-02 01:44:23', '2022-01-02 01:44:23'),
(43, 'edit_articulo', 'articulo', '2022-01-02 01:44:23', '2022-01-02 01:44:23'),
(44, 'add_articulo', 'articulo', '2022-01-02 01:44:23', '2022-01-02 01:44:23'),
(45, 'delete_articulo', 'articulo', '2022-01-02 01:44:23', '2022-01-02 01:44:23'),
(46, 'browse_nomina', 'nomina', '2022-01-02 17:14:43', '2022-01-02 17:14:43'),
(47, 'read_nomina', 'nomina', '2022-01-02 17:14:43', '2022-01-02 17:14:43'),
(48, 'edit_nomina', 'nomina', '2022-01-02 17:14:43', '2022-01-02 17:14:43'),
(49, 'add_nomina', 'nomina', '2022-01-02 17:14:43', '2022-01-02 17:14:43'),
(50, 'delete_nomina', 'nomina', '2022-01-02 17:14:43', '2022-01-02 17:14:43'),
(51, 'browse_cancion', 'cancion', '2022-01-02 17:18:23', '2022-01-02 17:18:23'),
(52, 'read_cancion', 'cancion', '2022-01-02 17:18:23', '2022-01-02 17:18:23'),
(53, 'edit_cancion', 'cancion', '2022-01-02 17:18:23', '2022-01-02 17:18:23'),
(54, 'add_cancion', 'cancion', '2022-01-02 17:18:23', '2022-01-02 17:18:23'),
(55, 'delete_cancion', 'cancion', '2022-01-02 17:18:23', '2022-01-02 17:18:23'),
(56, 'browse_cliente', 'cliente', '2022-01-02 17:22:19', '2022-01-02 17:22:19'),
(57, 'read_cliente', 'cliente', '2022-01-02 17:22:19', '2022-01-02 17:22:19'),
(58, 'edit_cliente', 'cliente', '2022-01-02 17:22:19', '2022-01-02 17:22:19'),
(59, 'add_cliente', 'cliente', '2022-01-02 17:22:19', '2022-01-02 17:22:19'),
(60, 'delete_cliente', 'cliente', '2022-01-02 17:22:19', '2022-01-02 17:22:19'),
(61, 'browse_colaboracion', 'colaboracion', '2022-01-02 17:26:02', '2022-01-02 17:26:02'),
(62, 'read_colaboracion', 'colaboracion', '2022-01-02 17:26:02', '2022-01-02 17:26:02'),
(63, 'edit_colaboracion', 'colaboracion', '2022-01-02 17:26:02', '2022-01-02 17:26:02'),
(64, 'add_colaboracion', 'colaboracion', '2022-01-02 17:26:02', '2022-01-02 17:26:02'),
(65, 'delete_colaboracion', 'colaboracion', '2022-01-02 17:26:02', '2022-01-02 17:26:02'),
(66, 'browse_regalia', 'regalia', '2022-01-02 17:42:20', '2022-01-02 17:42:20'),
(67, 'read_regalia', 'regalia', '2022-01-02 17:42:20', '2022-01-02 17:42:20'),
(68, 'edit_regalia', 'regalia', '2022-01-02 17:42:20', '2022-01-02 17:42:20'),
(69, 'add_regalia', 'regalia', '2022-01-02 17:42:20', '2022-01-02 17:42:20'),
(70, 'delete_regalia', 'regalia', '2022-01-02 17:42:20', '2022-01-02 17:42:20'),
(71, 'browse_repertorio', 'repertorio', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(72, 'read_repertorio', 'repertorio', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(73, 'edit_repertorio', 'repertorio', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(74, 'add_repertorio', 'repertorio', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(75, 'delete_repertorio', 'repertorio', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(76, 'browse_persona', 'persona', '2022-01-05 21:30:03', '2022-01-05 21:30:03'),
(77, 'read_persona', 'persona', '2022-01-05 21:30:03', '2022-01-05 21:30:03'),
(78, 'edit_persona', 'persona', '2022-01-05 21:30:03', '2022-01-05 21:30:03'),
(79, 'add_persona', 'persona', '2022-01-05 21:30:03', '2022-01-05 21:30:03'),
(80, 'delete_persona', 'persona', '2022-01-05 21:30:03', '2022-01-05 21:30:03'),
(81, 'browse_colaboracion_repertorio', 'colaboracion_repertorio', '2022-03-18 23:07:56', '2022-03-18 23:07:56'),
(82, 'read_colaboracion_repertorio', 'colaboracion_repertorio', '2022-03-18 23:07:56', '2022-03-18 23:07:56'),
(83, 'edit_colaboracion_repertorio', 'colaboracion_repertorio', '2022-03-18 23:07:56', '2022-03-18 23:07:56'),
(84, 'add_colaboracion_repertorio', 'colaboracion_repertorio', '2022-03-18 23:07:56', '2022-03-18 23:07:56'),
(85, 'delete_colaboracion_repertorio', 'colaboracion_repertorio', '2022-03-18 23:07:56', '2022-03-18 23:07:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(42, 1),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_identificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `pais`, `ciudad`, `tipo_documento`, `numero_identificacion`, `telefono`, `user_id`, `departamento`, `firma`, `contrato`) VALUES
(17, 'Prismad', 'Music', 'Colombia', 'Bogotá', 'cc', '300357 7830', '3003577830', 1, 'Bogota DC', NULL, NULL),
(23, 'Jonathan', 'Susana Collado', 'Dominican Republic', 'Concepción de La Vega', 'cc', '40234501308', '8492203449', 31, 'La Vega Province', NULL, NULL),
(36, 'jonathan', 'garzon', 'Colombia', 'Villavicencio', 'cc', '1121940890', '3213860504', 51, 'Meta', NULL, NULL),
(37, 'joseph', 'heurtematte', 'El Salvador', NULL, 'cc', '8-856-14', '5062659086', 55, 'Santa Ana Department', NULL, NULL),
(38, 'Jorge', 'Vélez', 'Colombia', NULL, 'cc', '94534280', '3112482761', 56, 'Bogotá', NULL, NULL),
(39, 'Jorge', 'Vélez', 'Colombia', NULL, 'cc', '94534280', '3112482761', 56, 'Bogotá', NULL, NULL),
(40, 'MIGUEL', 'HUERTAS', 'Colombia', NULL, 'cc', '1014272451', '3208150897', 57, 'Bogotá', NULL, NULL),
(41, 'Pablo', 'Cano', 'Spain', 'Gandesa', 'cc', '47817131Q', '+667289427', 60, 'Catalonia', NULL, NULL),
(42, 'Nelson', 'Romero', 'Colombia', 'Bogotá D.C.', 'cc', '80742991', '3125561118', 62, 'Bogotá D.C.', NULL, NULL),
(43, 'mey', 'manjarres', 'Colombia', 'Bogotá D.C.', 'cc', '1010165035', '3124835089', 63, 'Bogotá D.C.', NULL, NULL),
(44, 'Josue', 'paredes', 'Colombia', 'Bogotá D.C.', 'ce', '21063809', '3112266723', 70, 'Bogotá D.C.', NULL, NULL),
(45, 'Carlos', 'Sanchez', 'Ecuador', 'Guayaquil', 'tp', '0930095815', '0980127117', 73, 'Guayas', NULL, NULL),
(46, 'Aneglica', 'Rodriguez', 'Colombia', 'Bogotá D.C.', 'cc', '52235260', '3004438405', 74, 'Bogotá D.C.', NULL, NULL),
(47, 'Juan David', 'Wittinghan Franco', 'Colombia', 'Bogotá D.C.', 'cc', '1018446891', '3102334422', 76, 'Bogotá D.C.', NULL, NULL),
(48, 'Candido', 'Moreno', 'Colombia', 'Villavicencio', 'cc', '1121958055', '3138339062', 79, 'Meta', NULL, NULL),
(50, 'mosik', 'mosik', 'Colombia', 'Bogotá D.C.', 'cc', '1019056933', '3212342334', 81, 'Cundinamarca', '/home/u449096820/domains/prismadmusic.com/public_html/storage/firma/81.png', '/home/u449096820/domains/prismadmusic.com/public_html/storage/contratos/81.docx'),
(51, 'Johan Dayan', 'Vacca Vaca', 'Colombia', 'Villavicencio', 'cc', '1121962356', '3123254608', 84, 'Meta', '/home/u449096820/domains/prismadmusic.com/public_html/storage/firma/84.png', '/home/u449096820/domains/prismadmusic.com/public_html/storage/contratos/84.docx'),
(52, 'Yohan', 'Unillanos', 'Albania', NULL, 'cc', '1121962355', '3123254607', 85, 'Kavajë District', '/home/u449096820/domains/prismadmusic.com/public_html/storage/firma/85.png', '/home/u449096820/domains/prismadmusic.com/public_html/storage/contratos/85.docx'),
(53, 'llano', 'music', 'Colombia', 'Bogotá D.C.', 'cc', '1019056933', '3045789392', 88, 'Bogotá D.C.', '/home/u449096820/domains/prismadmusic.com/public_html/storage/firma/88.png', '/home/u449096820/domains/prismadmusic.com/public_html/storage/contratos/88.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-01-02 04:43:19', '2022-01-02 04:43:19'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\r\n                <h2>We can use all kinds of format!</h2>\r\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-01-02 04:43:20', '2022-01-02 04:43:20'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-01-02 04:43:20', '2022-01-02 04:43:20'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\r\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\r\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-01-02 04:43:20', '2022-01-02 04:43:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalia`
--

CREATE TABLE `regalia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `informe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_informe_inicio` date NOT NULL,
  `fecha_informe_final` date NOT NULL,
  `nomina_id` bigint(20) DEFAULT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repertorio`
--

CREATE TABLE `repertorio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subgenero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_sello` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annio_produccion` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upc_ean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_catalogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_lanzamiento` date DEFAULT NULL,
  `terminado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repertorio`
--

INSERT INTO `repertorio` (`id`, `portada`, `titulo`, `version`, `genero`, `subgenero`, `nombre_sello`, `formato`, `productor`, `copyright`, `annio_produccion`, `upc_ean`, `numero_catalogo`, `fecha_lanzamiento`, `terminado`) VALUES
(7, 'portadas/March2022/1647664288.jpg', 'Las mañanitas', NULL, 'Britpop', 'Acid house', 'Prismad music', 'f1', 'CandidoM', 'copyrigth', '2022', NULL, NULL, '2022-03-24', 0),
(8, 'portadas/March2022/1647799197.jpg', 'Bast Lamia', 'Líber Lilith', 'Heavy Metal', 'Dark', 'Coclestis Meretrix', 'f3', 'Skull Red', 'Copyright Skull Red Productions', '1999', 'DM', '2545', '2022-03-31', 0),
(9, 'portadas/March2022/1647804894.jpg', 'la gata moon', 'agatha', 'Alternative', 'Acid house', 'los ratones de la casa se van cuando los gatos llegan', 'f3', 'jesucristo', 'maria', '2022', 'jose', '8', '2023-02-08', 0),
(10, 'portadas/March2022/1647806349.jpg', 'somo de barrio', 'el barrio nos llama', 'Americana', 'Acid rap', 'las cosas que pasan en el  barrio se quedan en el barrio', 'f3', 'don etor', 'ud sabe que yo le he servido', '2022', 'rosa', '5', '2022-08-25', 0),
(11, 'portadas/March2022/1647838896.jpg', 'kelly cardenas', NULL, 'Reggaeton', 'Pop', 'sony music', 'f3', 'alejo cruz', 'prismad music', '2022', NULL, NULL, '2022-03-28', 0),
(12, 'portadas/March2022/1647843845.jpg', 'Plasma', 'Electron', 'Afoxé', 'Acid house', 'Popeye', 'f3', 'Skull Red', 'Copyright Skull Red Productions', '2022', 'sdafsdaf', '23413124', '2022-03-31', 0),
(13, '1650871693.jpg', 'El amanecer', NULL, 'Ambient', 'Acid', 'Prismad music', 'SINGLE', 'CandidoM', 'copyrigth', '2022', NULL, 'sad', '2022-05-07', 0),
(14, '1651015851.jpg', 'Amor Prohibido', 'Witthy', 'Americana', 'Alternative', 'Prismad Music', 'SINGLE', 'Witthy', 'Witthy', '2022', NULL, NULL, '2022-05-07', 0),
(15, '1651209391.jpg', 'Las mañanitas dual', 'muse', 'Americana', 'Acid house', 'Prismad music', 'ALBUM', 'CandidoM', 'copyrigth', '2022', NULL, '3', '2022-05-07', 0),
(16, '1651457787.jpg', 'de que las hay las hay', NULL, 'Reggaeton', 'Latin', 'mosik', 'SINGLE', 'bad bunny', 'prismad music', '2022', NULL, NULL, '2022-05-07', 0),
(17, '1651463120.jpg', 'Loley', 'Líber Lilith', 'Afoxé', 'Acid house', 'Coclestis Meretrix', 'EP', 'Skull Red', 'Copyright Skull Red Productions', '2022', 'sdafsdaf', '23413124', '2022-05-19', 0),
(18, '1651791952.jpg', 'Love and thunder', 'Witthy', 'Urban Cowboy', 'Acid Jazz', 'Prismad music', 'SINGLE', 'Witthy', 'Witthy', '2022', NULL, NULL, '2022-05-11', 0),
(19, '1652012737.jpg', 'Repertorio de JohanVacca12', 'Versionamiento', 'Celtic Folk', 'Canto livre', 'Sello de RepertorioJV12', 'SINGLE', 'JV12', '@JV12', '2022', 'UPC EAN', '1', '2022-05-14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(2, 'user', 'Normal User', '2022-01-02 04:43:14', '2022-01-02 04:43:14'),
(3, 'Moderador', 'Moderador', '2022-01-02 01:03:14', '2022-01-02 01:03:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', 'G-EYLK0VXG97', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings/February2022/xlRswkbdEdXdOtddq7iL.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Prismad Music', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Editora digital, gestión de playlist y manejo digital para artistas y productos empresariales', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/March2022/4Wjdw2ejzVW61vk8jQh5.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '376527473637-0c66akrj06fs2q9rqi6ahlpreul7e6sp.apps.googleusercontent.com', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgenero`
--

CREATE TABLE `subgenero` (
  `id` int(3) DEFAULT NULL,
  `nombre` varchar(29) DEFAULT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subgenero`
--

INSERT INTO `subgenero` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Acid', NULL),
(2, 'Acid house', NULL),
(3, 'Acid Jazz', NULL),
(4, 'Acid Punk', NULL),
(5, 'Acid rap', NULL),
(6, 'Acid rock', NULL),
(7, 'Acid techno', NULL),
(8, 'Afoxé', NULL),
(9, 'Afro', NULL),
(10, 'Afro-Cuban Jazz', NULL),
(11, 'Afro-Juju', NULL),
(12, 'Afro-Punk', NULL),
(13, 'Afrobeat', NULL),
(14, 'Aggrotech', NULL),
(15, 'Air', NULL),
(16, 'Alternative', NULL),
(17, 'Alternative & Rock in Spanish', NULL),
(18, 'Ambient', NULL),
(19, 'Americana', NULL),
(20, 'Anadolu rock', NULL),
(21, 'Anarcho-punk', NULL),
(22, 'Andean New Age', NULL),
(23, 'Anime', NULL),
(24, 'Anti-folk', NULL),
(25, 'Arabesk', NULL),
(26, 'Art', NULL),
(27, 'Asian', NULL),
(28, 'Audio Book', NULL),
(29, 'Avant-garde', NULL),
(30, 'Axé', NULL),
(31, 'Bachata', NULL),
(32, 'Baião', NULL),
(33, 'Baile Exótico', NULL),
(34, 'Baile Funk', NULL),
(35, 'Banda', NULL),
(36, 'Bass', NULL),
(37, 'Bastard Pop', NULL),
(38, 'Batá', NULL),
(39, 'Batucada', NULL),
(40, 'Batuco', NULL),
(41, 'Beat', NULL),
(42, 'Beatboxing', NULL),
(43, 'Bebop', NULL),
(44, 'Big band music', NULL),
(45, 'Big Beat', NULL),
(46, 'Bloco afro', NULL),
(47, 'Bluegrass', NULL),
(48, 'Blues', NULL),
(49, 'Bohemian Dub', NULL),
(50, 'Boi', NULL),
(51, 'Bolero', NULL),
(52, 'Bombay pop', NULL),
(53, 'Bossa nova', NULL),
(54, 'Boy band', NULL),
(55, 'Brass', NULL),
(56, 'Brazilian', NULL),
(57, 'Breakbeat', NULL),
(58, 'Brega', NULL),
(59, 'Bregafunk', NULL),
(60, 'Britpop', NULL),
(61, 'Broken beat', NULL),
(62, 'Bubblegum pop', NULL),
(63, 'Bugio', NULL),
(64, 'Bulerias', NULL),
(65, 'C-Pop', NULL),
(66, 'Cabaret', NULL),
(67, 'Cadence', NULL),
(68, 'Cajun', NULL),
(69, 'Calypso', NULL),
(70, 'Cancão', NULL),
(71, 'Canto livre', NULL),
(72, 'Canto nuevo', NULL),
(73, 'Canto popular', NULL),
(74, 'Cantopop/HK-Pop', NULL),
(75, 'Caopeira music', NULL),
(76, 'Carimbó', NULL),
(77, 'Catalogue', NULL),
(78, 'Celtic', NULL),
(79, 'Celtic Folk', NULL),
(80, 'Celtic Pop', NULL),
(81, 'Celtic Rock', NULL),
(82, 'Chamamé', NULL),
(83, 'Chamarra', NULL),
(84, 'Chamber music', NULL),
(85, 'Champeta', NULL),
(86, 'Chemical breaks', NULL),
(87, 'Children\'s Music', NULL),
(88, 'Chill-Out', NULL),
(89, 'Chinese', NULL),
(90, 'Chorinho', NULL),
(91, 'Choro', NULL),
(92, 'Christian', NULL),
(93, 'Chumba', NULL),
(94, 'Classical', NULL),
(95, 'Classical Crossover', NULL),
(96, 'Club', NULL),
(97, 'Coldwave', NULL),
(98, 'Comedy', NULL),
(99, 'Cool Jazz', NULL),
(100, 'Country', NULL),
(101, 'Creole', NULL),
(102, 'Crunk', NULL),
(103, 'Cumbia', NULL),
(104, 'Currulao', NULL),
(105, 'Dance', NULL),
(106, 'Dancehall', NULL),
(107, 'Dark', NULL),
(108, 'Death Industrial', NULL),
(109, 'Death Metal', NULL),
(110, 'Deathcore', NULL),
(111, 'Deathgrind', NULL),
(112, 'Deboche', NULL),
(113, 'Deep house', NULL),
(114, 'Deep soul', NULL),
(115, 'Delta blues', NULL),
(116, 'Dembow', NULL),
(117, 'Dini', NULL),
(118, 'Disco', NULL),
(119, 'Dixieland', NULL),
(120, 'Dopé', NULL),
(121, 'Downtempo', NULL),
(122, 'Dream pop', NULL),
(123, 'Drill and bass', NULL),
(124, 'Drone', NULL),
(125, 'Drum and bass', NULL),
(126, 'Dub', NULL),
(127, 'Dubstep', NULL),
(128, 'Easy Listening', NULL),
(129, 'Electro', NULL),
(130, 'Electro Backbeat', NULL),
(131, 'Electro hop', NULL),
(132, 'Electronic', NULL),
(133, 'Electronica', NULL),
(134, 'Electropop', NULL),
(135, 'Emo', NULL),
(136, 'Electronic', NULL),
(137, 'Enka', NULL),
(138, 'Europop', NULL),
(139, 'Experimental', NULL),
(140, 'F-Step', NULL),
(141, 'Fado', NULL),
(142, 'Fantezi', NULL),
(143, 'Filk', NULL),
(144, 'Flamenco', NULL),
(145, 'Folk', NULL),
(146, 'Folktronica', NULL),
(147, 'Forró', NULL),
(148, 'Free improvisation', NULL),
(149, 'Free Jazz', NULL),
(150, 'Freestyle', NULL),
(151, 'French pop', NULL),
(152, 'Frevo', NULL),
(153, 'Fricote', NULL),
(154, 'Funk', NULL),
(155, 'Gangsta rap', NULL),
(156, 'Garage', NULL),
(157, 'German Folk', NULL),
(158, 'German Pop', NULL),
(159, 'Go go', NULL),
(160, 'Gospel', NULL),
(161, 'Gothic', NULL),
(162, 'Grime', NULL),
(163, 'Grindcore', NULL),
(164, 'Groove metal', NULL),
(165, 'Grunge', NULL),
(166, 'Grupera', NULL),
(167, 'Guaracha', NULL),
(168, 'Guitarra baiana', NULL),
(169, 'Gypsy', NULL),
(170, 'Halk', NULL),
(171, 'Hard bop', NULL),
(172, 'Hardcore', NULL),
(173, 'Heavy metal', NULL),
(174, 'Hip Hop', NULL),
(175, 'Hip Hop/Rap', NULL),
(176, 'Holiday Music', NULL),
(177, 'House', NULL),
(178, 'Hyphy', NULL),
(179, 'Indian Classical', NULL),
(180, 'Indie', NULL),
(181, 'Indie Pop', NULL),
(182, 'Indo Pop', NULL),
(183, 'Industrial', NULL),
(184, 'Infantil', NULL),
(185, 'Instrumental', NULL),
(186, 'Jam', NULL),
(187, 'Jazz', NULL),
(188, 'Juju', NULL),
(189, 'Jungle', NULL),
(190, 'K-Pop', NULL),
(191, 'Karaoke', NULL),
(192, 'Kayokyoku', NULL),
(193, 'Kizomba', NULL),
(194, 'Latin', NULL),
(195, 'Latin Jazz', NULL),
(196, 'Latin Rap', NULL),
(197, 'Lo-Pop', NULL),
(198, 'Lounge', NULL),
(199, 'Mambo', NULL),
(200, 'Mangue Beat', NULL),
(201, 'Maracatu', NULL),
(202, 'Mariachi', NULL),
(203, 'Marimba', NULL),
(204, 'Maxixe', NULL),
(205, 'Mento', NULL),
(206, 'Merengue', NULL),
(207, 'Metal', NULL),
(208, 'Mexican', NULL),
(209, 'Miami bass', NULL),
(210, 'Microhouse', NULL),
(211, 'Milonga', NULL),
(212, 'Minimalist', NULL),
(213, 'Modinha', NULL),
(214, 'Motown', NULL),
(215, 'MPB', NULL),
(216, 'Neo Soul', NULL),
(217, 'Neofolk', NULL),
(218, 'New Age', NULL),
(219, 'New Wave', NULL),
(220, 'Noise pop', NULL),
(221, 'Norteño', NULL),
(222, 'Nova Canção', NULL),
(223, 'Oi!', NULL),
(224, 'Old school', NULL),
(225, 'Old time', NULL),
(226, 'Oldies', NULL),
(227, 'Opera', NULL),
(228, 'Orchesta', NULL),
(229, 'Outlaw', NULL),
(230, 'Özgün', NULL),
(231, 'Pagode', NULL),
(232, 'Pixiefunk', NULL),
(233, 'Plena', NULL),
(234, 'Pop', NULL),
(235, 'Pop in Spanish', NULL),
(236, 'Popular Colombiana', NULL),
(237, 'Porngroove', NULL),
(238, 'Post-hardcore', NULL),
(239, 'Progressive', NULL),
(240, 'Psychedelic', NULL),
(241, 'Psychobilly', NULL),
(242, 'Punk', NULL),
(243, 'Quadrille', NULL),
(244, 'Ragas', NULL),
(245, 'Raggamuffin', NULL),
(246, 'Ragtime', NULL),
(247, 'Rancheira', NULL),
(248, 'Rap', NULL),
(249, 'Rave', NULL),
(250, 'Reggae', NULL),
(251, 'Reggaeton', NULL),
(252, 'Regional Mexicano', NULL),
(253, 'Retro', NULL),
(254, 'Rhytm & Blues', NULL),
(255, 'Rock', NULL),
(256, 'Rock opera', NULL),
(257, 'Rockabilly', NULL),
(258, 'Roots', NULL),
(259, 'Ruissian Chanson', NULL),
(260, 'Salsa', NULL),
(261, 'Salsa Choke', NULL),
(262, 'Samba', NULL),
(263, 'Samba-canção', NULL),
(264, 'Samba-reggae', NULL),
(265, 'Sanat', NULL),
(266, 'Sertaneja', NULL),
(267, 'Singer-songwriter', NULL),
(268, 'Ska', NULL),
(269, 'Skate', NULL),
(270, 'Sludge metal', NULL),
(271, 'Smooth jazz', NULL),
(272, 'Soca', NULL),
(273, 'Soldier', NULL),
(274, 'Son montuno', NULL),
(275, 'Sonata', NULL),
(276, 'Soul', NULL),
(277, 'Soundtrack', NULL),
(278, 'Southern', NULL),
(279, 'Space', NULL),
(280, 'Speed metal', NULL),
(281, 'Spiritual', NULL),
(282, 'Spirituals', NULL),
(283, 'Spoken Word', NULL),
(284, 'Story', NULL),
(285, 'Surf', NULL),
(286, 'Swing music', NULL),
(287, 'Swingbeat', NULL),
(288, 'Symphony', NULL),
(289, 'Tango', NULL),
(290, 'Techno', NULL),
(291, 'Teen pop', NULL),
(292, 'Thai pop', NULL),
(293, 'Thrash metal', NULL),
(294, 'Tradicional colombiana', NULL),
(295, 'Trance', NULL),
(296, 'Trap', NULL),
(297, 'Tribal house', NULL),
(298, 'Trip rock', NULL),
(299, 'Trip-hop', NULL),
(300, 'Tropical', NULL),
(301, 'Tropical Salsa', NULL),
(302, 'Tropicalia', NULL),
(303, 'Turkish', NULL),
(304, 'Turkish Alternative', NULL),
(305, 'Turkish Hip-Hop/Rap', NULL),
(306, 'Turkish Pop', NULL),
(307, 'Turkish Rock', NULL),
(308, 'Unnasigned', NULL),
(309, 'Undergound', NULL),
(310, 'Unplugged', NULL),
(311, 'Urban', NULL),
(312, 'Urban Cowboy', NULL),
(313, 'Urban Folk', NULL),
(314, 'Urban Jazz', NULL),
(315, 'Vallenato', NULL),
(316, 'Valsa', NULL),
(317, 'Vanera', NULL),
(318, 'Video game', NULL),
(319, 'Vocal', NULL),
(320, 'Waltz', NULL),
(321, 'West Coas hip hop', NULL),
(322, 'World', NULL),
(323, 'Worldbeat', NULL),
(324, 'Xote', NULL),
(325, 'Yo-pop', NULL),
(326, 'Zouk', NULL),
(327, 'Zulu', NULL),
(328, 'Zydeco', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_colaboracion`
--

CREATE TABLE `tipo_colaboracion` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-01-02 04:43:21', '2022-01-02 04:43:21'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-01-02 04:43:22', '2022-01-02 04:43:22'),
(31, 'data_rows', 'display_name', 63, 'en', 'Id', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(32, 'data_rows', 'display_name', 64, 'en', 'Cliente Id', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(33, 'data_rows', 'display_name', 65, 'en', 'Desprendible', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(34, 'data_rows', 'display_name', 66, 'en', 'Fecha Informe', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(35, 'data_rows', 'display_name', 67, 'en', 'cliente', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(36, 'data_types', 'display_name_singular', 8, 'en', 'Nomina', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(37, 'data_types', 'display_name_plural', 8, 'en', 'Nominas', '2022-01-02 17:16:52', '2022-01-02 17:16:52'),
(38, 'data_rows', 'display_name', 68, 'en', 'Id', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(39, 'data_rows', 'display_name', 69, 'en', 'Repertorio Id', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(40, 'data_rows', 'display_name', 70, 'en', 'Tipo Secundario', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(41, 'data_rows', 'display_name', 71, 'en', 'Instrumental', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(42, 'data_rows', 'display_name', 72, 'en', 'Titulo', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(43, 'data_rows', 'display_name', 73, 'en', 'Version Subtitulo', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(44, 'data_rows', 'display_name', 74, 'en', 'User Id', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(45, 'data_rows', 'display_name', 75, 'en', 'Featuring', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(46, 'data_rows', 'display_name', 76, 'en', 'Remixer', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(47, 'data_rows', 'display_name', 77, 'en', 'Autor', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(48, 'data_rows', 'display_name', 78, 'en', 'Compositor', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(49, 'data_rows', 'display_name', 79, 'en', 'Arreglista', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(50, 'data_rows', 'display_name', 80, 'en', 'Productor', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(51, 'data_rows', 'display_name', 81, 'en', 'Pline', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(52, 'data_rows', 'display_name', 82, 'en', 'Annio Produccion', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(53, 'data_rows', 'display_name', 83, 'en', 'Genero', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(54, 'data_rows', 'display_name', 84, 'en', 'Subgenero', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(55, 'data_rows', 'display_name', 85, 'en', 'Genero Secundario', '2022-01-02 17:20:13', '2022-01-02 17:20:13'),
(56, 'data_rows', 'display_name', 86, 'en', 'Subgenero Secundario', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(57, 'data_rows', 'display_name', 87, 'en', 'Letra Chocante Vulgar', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(58, 'data_rows', 'display_name', 88, 'en', 'Inicio Previsualizacion', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(59, 'data_rows', 'display_name', 89, 'en', 'Idioma Titulo', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(60, 'data_rows', 'display_name', 90, 'en', 'Idioma Letra', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(61, 'data_rows', 'display_name', 91, 'en', 'Fecha Principal Salida', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(62, 'data_rows', 'display_name', 92, 'en', 'repertorio', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(63, 'data_types', 'display_name_singular', 9, 'en', 'Cancion', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(64, 'data_types', 'display_name_plural', 9, 'en', 'Canciones', '2022-01-02 17:20:14', '2022-01-02 17:20:14'),
(65, 'data_rows', 'display_name', 93, 'en', 'Id', '2022-01-02 17:24:23', '2022-01-02 17:24:23'),
(66, 'data_rows', 'display_name', 94, 'en', 'User Id', '2022-01-02 17:24:23', '2022-01-02 17:24:23'),
(67, 'data_rows', 'display_name', 95, 'en', 'Nombre Artistico', '2022-01-02 17:24:23', '2022-01-02 17:24:23'),
(68, 'data_rows', 'display_name', 96, 'en', 'Link Spoty', '2022-01-02 17:24:24', '2022-01-02 17:24:24'),
(69, 'data_rows', 'display_name', 97, 'en', 'Numero Cuenta Bancaria', '2022-01-02 17:24:24', '2022-01-02 17:24:24'),
(70, 'data_rows', 'display_name', 98, 'en', 'Tipo Cuenta Bancaria', '2022-01-02 17:24:24', '2022-01-02 17:24:24'),
(71, 'data_rows', 'display_name', 99, 'en', 'users', '2022-01-02 17:24:24', '2022-01-02 17:24:24'),
(72, 'data_types', 'display_name_singular', 10, 'en', 'Cliente', '2022-01-02 17:24:24', '2022-01-02 17:24:24'),
(73, 'data_types', 'display_name_plural', 10, 'en', 'Clientes', '2022-01-02 17:24:24', '2022-01-02 17:24:24'),
(74, 'data_rows', 'display_name', 100, 'en', 'Id', '2022-01-02 17:36:36', '2022-01-02 17:36:36'),
(75, 'data_rows', 'display_name', 101, 'en', 'Cliente Id', '2022-01-02 17:36:36', '2022-01-02 17:36:36'),
(76, 'data_rows', 'display_name', 102, 'en', 'Porcentaje Intelectual', '2022-01-02 17:36:36', '2022-01-02 17:36:36'),
(77, 'data_rows', 'display_name', 103, 'en', 'cancion', '2022-01-02 17:36:36', '2022-01-02 17:36:36'),
(78, 'data_types', 'display_name_singular', 11, 'en', 'Colaboracion', '2022-01-02 17:36:36', '2022-01-02 17:36:36'),
(79, 'data_types', 'display_name_plural', 11, 'en', 'Colaboraciones', '2022-01-02 17:36:36', '2022-01-02 17:36:36'),
(80, 'data_rows', 'display_name', 106, 'en', 'Id', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(81, 'data_rows', 'display_name', 107, 'en', 'Cliente Id', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(82, 'data_rows', 'display_name', 108, 'en', 'Informe', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(83, 'data_rows', 'display_name', 109, 'en', 'Fecha Informe', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(84, 'data_rows', 'display_name', 110, 'en', 'cliente', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(85, 'data_types', 'display_name_singular', 13, 'en', 'Regalia', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(86, 'data_types', 'display_name_plural', 13, 'en', 'Regalias', '2022-01-02 17:44:15', '2022-01-02 17:44:15'),
(87, 'data_rows', 'display_name', 111, 'en', 'repertorio', '2022-01-02 17:47:17', '2022-01-02 17:47:17'),
(88, 'data_rows', 'display_name', 112, 'en', 'colaboracion', '2022-01-02 17:47:17', '2022-01-02 17:47:17'),
(89, 'menu_items', 'title', 15, 'en', 'Nominas', '2022-01-02 17:51:42', '2022-01-02 17:51:42'),
(90, 'data_rows', 'display_name', 1, 'en', 'ID', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(91, 'data_rows', 'display_name', 21, 'en', 'Role', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(92, 'data_rows', 'display_name', 2, 'en', 'Name', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(93, 'data_rows', 'display_name', 3, 'en', 'Email', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(94, 'data_rows', 'display_name', 8, 'en', 'Avatar', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(95, 'data_rows', 'display_name', 4, 'en', 'Password', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(96, 'data_rows', 'display_name', 5, 'en', 'Remember Token', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(97, 'data_rows', 'display_name', 11, 'en', 'Settings', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(98, 'data_rows', 'display_name', 6, 'en', 'Created At', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(99, 'data_rows', 'display_name', 7, 'en', 'Updated At', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(100, 'data_rows', 'display_name', 9, 'en', 'Role', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(101, 'data_rows', 'display_name', 10, 'en', 'voyager::seeders.data_rows.roles', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(102, 'data_types', 'display_name_singular', 1, 'en', 'User', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(103, 'data_types', 'display_name_plural', 1, 'en', 'Users', '2022-01-02 18:24:49', '2022-01-02 18:24:49'),
(104, 'data_rows', 'display_name', 129, 'en', 'Email Verified At', '2022-01-02 18:26:46', '2022-01-02 18:26:46'),
(105, 'data_rows', 'display_name', 130, 'en', 'Apellidos', '2022-01-02 18:26:46', '2022-01-02 18:26:46'),
(106, 'data_rows', 'display_name', 131, 'en', 'Pais', '2022-01-02 18:26:46', '2022-01-02 18:26:46'),
(107, 'data_rows', 'display_name', 132, 'en', 'Ciudad', '2022-01-02 18:26:46', '2022-01-02 18:26:46'),
(108, 'data_rows', 'display_name', 133, 'en', 'Tipo Docuemento', '2022-01-02 18:26:46', '2022-01-02 18:26:46'),
(109, 'data_rows', 'display_name', 134, 'en', 'Numero Identificacion', '2022-01-02 18:26:46', '2022-01-02 18:26:46'),
(110, 'data_rows', 'display_name', 135, 'en', 'Telefono', '2022-01-02 18:26:46', '2022-01-02 18:26:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registro_confirmed` tinyint(4) DEFAULT 0,
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `registro_confirmed`, `confirmation_code`) VALUES
(1, 1, 'PrismadMusic', 'prismadmusic@gmail.com', 'users/February2022/aqHRg7reMK3wpKL0Qftr.jpg', '2022-01-15 21:19:31', '$2y$10$5Ilfxt6ad3cHxqwwnmqYGeLdsofwcdq483/PhvUbrEDgCWq1WMFw2', 'KhbCE08egcOckVMA5wsZi8r0enjxr60AEQiDTCVjclsQPUwHTklywffSPGgB', '{\"locale\":\"es\"}', '2022-01-02 04:43:19', '2022-02-03 22:37:10', 1, NULL),
(30, 2, 'Rodyam Producer', 'mrodyam@gmail.com', 'users/default.png', '2022-03-07 14:38:40', '$2y$10$BUoyQQa3gC1ujJzx4aPH6urxh70KXERF4bJx2d.pvjtE7OultcUbW', NULL, NULL, '2022-03-07 14:37:03', '2022-03-07 14:38:40', 0, NULL),
(31, 2, 'Jay es', 'jonathan_susana@hotmail.com', 'users/default.png', '2022-03-07 15:32:05', '$2y$10$dQZ6ZUtKF0m1i8ydTZMrdeEiQBd5n.Iojf1JDRUecUkQnxaBWzlbe', NULL, NULL, '2022-03-07 15:31:04', '2022-03-07 15:36:07', 1, NULL),
(32, 2, 'alejocruz', 'alejocruzmusic@gmail.com', 'users/default.png', '2022-03-09 18:27:27', '$2y$10$P9AK9bdfreJjyj7tsADT5OkZhuXZ6YZtmpvLDxwyfw/mBRmSXEOHi', 'P1usys3AcLEq6O3hmSoQ0jc6MGYFtdsIqgS34zFgOK8e9luqQil2nCeA6OmI', NULL, '2022-03-09 18:27:03', '2022-03-09 18:31:19', 1, NULL),
(41, 2, 'dennis corredor', 'contcatodennisfernando@gmail.com', 'users/default.png', NULL, '$2y$10$QybFYmb2lYYk/Ler49aruO1WXNR5ptbIj5HVe/X6wfxdKiRhcxTQ2', NULL, NULL, '2022-03-12 22:34:38', '2022-03-12 22:34:38', 0, NULL),
(43, 2, 'Abdul Farfán', 'abdulfd32@gmail.com', 'users/default.png', '2022-03-13 14:46:59', '$2y$10$PJgbp3qe5rEhQtxucDZate46IbXExyrqsit2VNGfG69GWbzQomH16', 'iYvnvxcVz8KEhDoqxeqRjIWAGt19suo3VYkIA8D0fDDCa3YcGBpUXaF4ZmUZ', NULL, '2022-03-13 14:46:16', '2022-03-13 14:46:59', 0, NULL),
(51, 2, 'jonathan', 'jonatangarzon95@gmail.com', 'users/default.png', '2022-03-22 17:05:33', '$2y$10$8Cc7l93aF/7q.tn8oUFLgOx4O2sfZB1PdVtfkniY/.TfqbrmwUkqG', NULL, NULL, '2022-03-22 17:04:55', '2022-03-22 17:07:21', 1, NULL),
(52, 2, 'ian123456', 'iangigi97@gmail.com', 'users/default.png', '2022-03-24 11:01:28', '$2y$10$bLvZlShay4Flp7MuLQH0reHKze.4AeLPzTPJZUC1YFScyaGbaa2Ia', NULL, NULL, '2022-03-24 11:00:57', '2022-03-24 11:01:28', 0, NULL),
(53, 2, 'ElTorres', 'eltorres.musicprod@gmail.com', 'users/default.png', '2022-03-24 15:01:03', '$2y$10$M9q5FMRgrL6oDHCIc5DR9.ERJiCrUb8/dyR18ZalmzUdDrcLVdUBe', NULL, NULL, '2022-03-24 15:00:38', '2022-03-24 15:01:03', 0, NULL),
(54, 2, 'Michaelyremy', 'lapesadamusica@gmail.com', 'users/default.png', '2022-03-25 02:11:36', '$2y$10$PVizdDXc9kELGoQOLuN4yuA87tWQdpkB84d/DOHqc6Rwb.3e6UxP2', 'yoLD6Uya02AAtooa5uR56b4BthNd9iRz2TrtlyUikM2KDkNlQ1qG1rE9yM3x', NULL, '2022-03-25 02:10:45', '2022-03-25 02:11:36', 0, NULL),
(55, 2, 'davinxi', 'heurtemattejoseph1@gmail.com', 'users/default.png', '2022-03-25 11:51:19', '$2y$10$dFXb/CIjEhk7TxgI1W00teSY0TStF0O0LRVqpaRkUjqJi9Q1Q5xES', NULL, NULL, '2022-03-25 11:50:11', '2022-03-25 12:00:20', 1, NULL),
(56, 2, 'Elpanda', 'Jorgevelezpanda@gmail.com', 'users/default.png', '2022-03-25 22:01:36', '$2y$10$4fviP4pBddqcBZGwavrDJORE3KfFHzFZUbgv2dCqFcc0Xfx9I.h9i', 'ar6nKgvdluSe9lBSOtJ9h5NdFBqdOhZ9waTNMbtSKcXdUWLqAlQ41gCIAtrc', NULL, '2022-03-25 21:59:52', '2022-03-25 22:06:04', 1, NULL),
(57, 2, 'Miguel Huertas', 'miguelhuertas091@gmail.com', 'users/default.png', '2022-03-26 12:51:46', '$2y$10$UlfgzsStubUFAb1vN4c9RefxoZTS3TS0hd6EbvJHIMs7J7T3EzasG', NULL, NULL, '2022-03-26 12:50:46', '2022-03-26 12:54:37', 1, NULL),
(58, 2, 'Lotino Music', 'lotinomusic.14032@gmail.com', 'users/default.png', '2022-03-26 16:51:14', '$2y$10$qWFtN2YY3IBumcOQev17l.9PgHPEN2dB0DYTRZDg87XQUzbKPFErm', NULL, NULL, '2022-03-26 16:50:35', '2022-03-26 16:51:14', 0, NULL),
(59, 2, 'Luis Vázquez', 'nikola.gasol@gmail.com', 'users/default.png', '2022-03-28 00:14:35', '$2y$10$85RFPjv2HzDIXh43dMLL6OW2wipNBEMP9Wmp3InpbvQvUpUcOHF9q', NULL, NULL, '2022-03-28 00:13:12', '2022-03-28 00:14:35', 0, NULL),
(60, 2, 'Pablo Cano', 'pabloeveretscanovalencia@gmail.com', 'users/default.png', '2022-03-28 09:14:15', '$2y$10$O2DwF3JaoEZHC3mj7w0V1O/QoLXDRZflsoi6fhgzrQVofsi.T7.w6', '8rlRdsKRJrVy4dUFfLqElckHpqGIFC8eJcjsDondVn8TdBheA3SbEo8H4NAM', NULL, '2022-03-28 09:09:05', '2022-03-28 09:20:30', 1, NULL),
(61, 2, 'vicente rojas', 'vicente.rojas.rock@gmail.com', 'users/default.png', '2022-03-28 15:59:55', '$2y$10$2LfPiO5W.k5iopEbqPys8uyJmJ.GopZ2QZbIs2LDkkN.Yl9LerWKa', NULL, NULL, '2022-03-28 15:58:42', '2022-03-28 15:59:55', 0, NULL),
(62, 2, 'Nelson Romero', 'nelsonromeromusic@gmail.com', 'users/default.png', '2022-03-28 18:12:27', '$2y$10$T9SzXruxPphR8Pk7KleygOFUoCaITrjY51XH6Tf.uvoXT2cgE8GX2', NULL, NULL, '2022-03-28 18:09:29', '2022-03-28 18:15:12', 1, NULL),
(63, 2, 'mey manjarres', 'meycontacto@gmail.com', 'users/default.png', '2022-03-30 18:25:20', '$2y$10$j0U7g7dayNhmGexYTj.A4.M.KSS1JkgNTDCkU6w/EYJCS3uIZlo/u', NULL, NULL, '2022-03-30 18:23:49', '2022-03-30 18:30:20', 1, NULL),
(64, 2, 'Juan A. Castillo', 'tcrecordsmusic@gmail.com', 'users/default.png', '2022-03-30 19:06:20', '$2y$10$63fL3idu82XHKz3Tw/WHLOVyDmTjFxAIor/64ijgaFO8WUdFLfkvi', NULL, NULL, '2022-03-30 19:05:17', '2022-03-30 19:06:20', 0, NULL),
(65, 2, 'Dokla', 'laverdaderadinastia.official@gmail.com', 'users/default.png', '2022-04-04 19:25:16', '$2y$10$BqqVhYYlRbsup9mF2q8rZuZQmhmN8LpcVqF8UWzCQHl.piMngHb9S', NULL, NULL, '2022-04-04 19:24:29', '2022-04-04 19:25:16', 0, NULL),
(66, 2, 'Luis Javier Orizaba', 'luisjaviervoz@gmail.com', 'users/default.png', '2022-04-05 12:25:00', '$2y$10$.5jwOxcJSj/V5vtn2bV2ouOwSwdwfrrX3HunVKjLuQAtyjLXBDB/S', NULL, NULL, '2022-04-05 12:24:43', '2022-04-05 12:25:00', 0, NULL),
(68, 2, 'Manolo Maya', 'linkmaya@hotmail.com', 'users/default.png', '2022-04-16 11:20:35', '$2y$10$Wr3L.s95Mw.sCgBn9DouBuyxYmXSgCHvRpdEqUCubVDOSsSwzxMnC', NULL, NULL, '2022-04-16 11:17:07', '2022-04-16 11:20:35', 0, NULL),
(69, 2, 'bacco', 'bacco.lofi@gmail.com', 'users/default.png', '2022-04-18 13:21:28', '$2y$10$7M3MTekXl9Qim9DsSQYbu.jbnTq3BxouB8mENuYoWIlJFJvneiNDS', NULL, NULL, '2022-04-18 13:20:55', '2022-04-18 13:21:28', 0, NULL),
(70, 2, 'kassett', 'laordensonora2021@gmail.com', 'users/default.png', '2022-04-19 09:04:28', '$2y$10$BY1CVQXEVkBJENZhXd0nluuXZb.YQY6bNeTIZeXfJf5MsyXoqMG.e', NULL, NULL, '2022-04-19 09:03:53', '2022-04-19 09:09:21', 1, NULL),
(71, 2, '28music', '28musicve@gmail.com', 'users/default.png', '2022-04-19 11:28:28', '$2y$10$PdqvpU8vwrH.clQUSguHze9RH2R/GjDdWHtwfcPkPEW6wzXWdakT.', NULL, NULL, '2022-04-19 11:28:08', '2022-04-19 11:28:28', 0, NULL),
(72, 2, 'cristofer crdova cornejo', 'crissdeliz.oficial@gmail.com', 'users/default.png', '2022-04-19 13:40:32', '$2y$10$aG/l.kIvFcKPCsv3p.CmWOUD6oUqsSjjZNx8U7x4q/OVLWkEGL0MK', NULL, NULL, '2022-04-19 13:40:02', '2022-04-19 13:40:32', 0, NULL),
(73, 2, 'Carlos Sanchez', 'goodvibesmusicst@gmail.com', 'users/default.png', '2022-04-22 01:40:02', '$2y$10$3pmVImShYeD/eBbsO1ArEeZYrpHI/OCZ.5LFSVl2uVOatVuCdXlHa', NULL, NULL, '2022-04-22 01:38:53', '2022-04-22 01:41:34', 1, NULL),
(74, 2, 'anica rod', 'anicarodmusica@gmail.com', 'users/default.png', '2022-04-22 11:13:00', '$2y$10$UVe.19NYutiaAAsQ1pyEw.6mEpNzq.5Zv7gRZRk1ZoSH0vq/edqP.', NULL, NULL, '2022-04-22 11:02:39', '2022-04-22 11:19:43', 1, NULL),
(76, 2, 'Witthy', 'witthyguitar@gmail.com', 'users/default.png', '2022-04-26 18:23:12', '$2y$10$cHWWtzKx5zqlS0GwD6KGCeNc/gwsyv0D6U4xuF1cM6FZHLII49Dde', 'je9AEtllK6a0lwOgBcOKGyUCIDYV7r7RIPiqrGdhoyINrZboGBUHkIDMNyIh', NULL, '2022-04-26 18:22:47', '2022-04-26 18:25:04', 1, NULL),
(77, 2, 'Lil', 'Lilcrazyoficial1@gmail.com', 'users/default.png', NULL, '$2y$10$YXbzmnhXh2.JA.cfa19x/e5nO9kEQm8QsNLv3BaZ9f270zpvCoWR.', NULL, NULL, '2022-04-27 11:44:07', '2022-04-27 11:44:07', 0, NULL),
(78, 2, 'Lil', 'Moirg4l@gmail.com', 'users/default.png', '2022-04-27 11:49:54', '$2y$10$bGxn7ZxovVrJjMTMmDMRBu7gqTzAkBM8b0gy0Hb1u6pf0kwWt89d6', NULL, NULL, '2022-04-27 11:47:00', '2022-04-27 11:49:54', 0, NULL),
(79, 2, 'Candido Moreno', 'stiivenmoreno@gmail.com', 'users/default.png', '2022-04-28 00:30:28', '$2y$10$VP0h53LMPiDZBlxczICseeNcouzlWUH.sNAk8c.HYkETOiYTIGoB6', NULL, NULL, '2022-04-28 00:30:13', '2022-04-28 00:31:40', 1, NULL),
(81, 2, 'mosik', 'contactomosik@gmail.com', 'users/default.png', '2022-05-01 21:09:23', '$2y$10$rZsEZrJJBVeGhDMuVCTBZ.okC79QlcJtZvW3/p3OH5eFKq2IlTzGW', NULL, NULL, '2022-05-01 21:08:23', '2022-05-01 21:12:21', 1, NULL),
(82, 2, 'Kikemouse', 'kikemouse@gmail.com', 'users/default.png', '2022-05-04 19:34:16', '$2y$10$S27MIK3qVw2/Cj0wDke8nOLTvMSZWTptz/MLnyXSIs8duYpUmDaRe', NULL, NULL, '2022-05-04 19:33:50', '2022-05-04 19:34:16', 0, NULL),
(83, 2, 'ARIEL A GATO', 'arielalejandrogato@gmail.com', 'users/default.png', '2022-05-06 14:14:04', '$2y$10$kh9Gdxk3N8JPtsDxtn91cuCCzEVNTy4rHK.fBP9AduOovAPkkDaSi', NULL, NULL, '2022-05-06 14:12:25', '2022-05-06 14:14:04', 0, NULL),
(84, 2, 'JohanVacca12', 'johan.vacca12@gmail.com', 'users/May2022/3cGckaYRnWe9zSBujSfd.jpg', '2022-05-08 06:47:47', '$2y$10$mguLTKl/FgR5dcfm541AnOfov.DNHbkC/TBAEBLzSXtGu6zyIMcCS', NULL, '{\"locale\":\"es\"}', '2022-05-08 06:47:27', '2022-05-08 08:04:34', 1, NULL),
(85, 2, 'yohan.vacca@unillanos.edu.co', 'yohan.vacca@unillanos.edu.co', 'users/default.png', '2022-05-08 08:12:25', '$2y$10$4xatJjGAdAgYgBkaS.qiK.YokGehRiJa8XM8.rvv0F30DPT7ZT1AW', 'xc9Rz0miEvFREmAcrtX6qQTS4pFhEEII1Ukmh9FQfqRorgomdkm5GQKLZShl', NULL, '2022-05-08 07:40:22', '2022-05-08 08:19:06', 1, 'V13iRDwAPNyMIX2al40TkWNYak24J34pmDmHQNXp'),
(86, 2, 'Felwil', 'felwilleo@gmail.com', 'users/default.png', '2022-05-08 11:59:48', '$2y$10$RKlwxzQDhhXXtjMfPs3Rx.Nwh7uFzivZiOqaN1d7sK3XxB3oAmo/O', NULL, NULL, '2022-05-08 11:59:31', '2022-05-08 11:59:48', 0, NULL),
(87, 2, 'Festo', 'boxjr91@gmail.com', 'users/default.png', '2022-05-11 18:34:37', '$2y$10$wptLgnq.jRzRnqBYPLSyBunKwdrOjDYrnRMefFNkrTF0XbAe2z3rW', 's1UFBcHyNZyt8D5rvR43weHy6pwhFvMwmbyxRvfy8Zzo2vlaie2amfMHvlSN', NULL, '2022-05-11 18:33:36', '2022-05-11 18:34:37', 0, NULL),
(88, 3, 'Llano Music', 'llanomusicoficial@gmail.com', 'users/default.png', '2022-05-13 20:49:41', '$2y$10$WU4/yBo3t8JqfLHCe1/9kuQRRxyEMAKcmBk33ieK75wu/PuuFO9fS', NULL, '{\"locale\":\"es\"}', '2022-05-13 20:47:18', '2022-05-13 20:53:00', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulo_editor_id_index` (`editor_id`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancion_repertorio_id_index` (`repertorio_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_user_id_index` (`persona_id`);

--
-- Indices de la tabla `colaboracion`
--
ALTER TABLE `colaboracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colaboracion_cliente_id_index` (`cliente_email`),
  ADD KEY `colaboracion_cancion_id_index` (`cancion_id`);

--
-- Indices de la tabla `colaboracion_art_feas`
--
ALTER TABLE `colaboracion_art_feas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colaboracion_repertorio`
--
ALTER TABLE `colaboracion_repertorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colaboracion_repertorio_repertorio_id_index` (`repertorio_id`),
  ADD KEY `colaboracion_repertorio_cliente_email_index` (`cliente_email`);

--
-- Indices de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indices de la tabla `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indices de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomina_cliente_id_index` (`cliente_id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
  ADD KEY `permissions_key_index` (`key`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_user_id_index` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indices de la tabla `regalia`
--
ALTER TABLE `regalia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regalia_cliente_id_index` (`cliente_id`),
  ADD KEY `regalia_nomina_id_index` (`nomina_id`);

--
-- Indices de la tabla `repertorio`
--
ALTER TABLE `repertorio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indices de la tabla `tipo_colaboracion`
--
ALTER TABLE `tipo_colaboracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `colaboracion`
--
ALTER TABLE `colaboracion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `colaboracion_art_feas`
--
ALTER TABLE `colaboracion_art_feas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `colaboracion_repertorio`
--
ALTER TABLE `colaboracion_repertorio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `regalia`
--
ALTER TABLE `regalia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `repertorio`
--
ALTER TABLE `repertorio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_colaboracion`
--
ALTER TABLE `tipo_colaboracion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_editor_id` FOREIGN KEY (`editor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_user_id` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nomina_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `regalia`
--
ALTER TABLE `regalia`
  ADD CONSTRAINT `regalia_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
