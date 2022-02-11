-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-02-2022 a las 23:04:08
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
  `instrumental` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `featuring` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remixer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `colaboracion_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `link_spoty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cuenta_bancaria` bigint(20) NOT NULL,
  `tipo_cuenta_bancaria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo_banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `persona_id`, `nombre_artistico`, `link_spoty`, `numero_cuenta_bancaria`, `tipo_cuenta_bancaria`, `nombre_banco`, `archivo_banco`) VALUES
(2, 14, 'PrismadMusic', 'open.', 456123456748, 'ahorros', '', ''),
(4, 16, 'LordCandocar', 'open', 114569541325, 'ahorros', '', ''),
(5, 17, 'LordCandocar', 'open.', 114569541325, 'ahorros', '', ''),
(8, 20, 'Javox', 'www.javox.com', 52454345235, 'ahorros', 'Nequi', 'archivoeqweqw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboracion`
--

CREATE TABLE `colaboracion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `porcentaje_intelectual` double NOT NULL,
  `cancion_id` bigint(20) NOT NULL,
  `nombre_colaboracion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(64, 8, 'cliente_id', 'text', 'Cliente Id', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"El cliente es obligatorio\"}}}', 2),
(65, 8, 'desprendible', 'text', 'Desprendible', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|mimes:pdf\",\"messages\":{\"required\":\"El desprendible es obligatorio\",\"mimes\":\"El desprendible debe ser formato PDF\"}}}', 3),
(66, 8, 'fecha_informe', 'text', 'Fecha Informe', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|mimes:pdf\",\"messages\":{\"required\":\"El desprendible es obligatorio\",\"mimes\":\"El desprendible debe ser formato PDF\"}}}', 4),
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
(97, 10, 'numero_cuenta_bancaria', 'text', 'Numero Cuenta Bancaria', 1, 1, 1, 1, 1, 1, '{}', 5),
(98, 10, 'tipo_cuenta_bancaria', 'text', 'Tipo Cuenta Bancaria', 1, 1, 1, 1, 1, 1, '{}', 6),
(99, 10, 'cliente_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Persona\",\"table\":\"persona\",\"type\":\"belongsTo\",\"column\":\"persona_id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(100, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(101, 11, 'cliente_id', 'text', 'Cliente Id', 1, 1, 1, 1, 1, 1, '{}', 2),
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
(137, 15, 'nombre', 'text', 'Nombre', 1, 1, 1, 1, 1, 1, '{}', 2),
(138, 15, 'apellido', 'text', 'Apellido', 1, 1, 1, 1, 1, 1, '{}', 3),
(139, 15, 'pais', 'text', 'Pais', 1, 1, 1, 1, 1, 1, '{}', 4),
(140, 15, 'ciudad', 'text', 'Ciudad', 1, 1, 1, 1, 1, 1, '{}', 6),
(142, 15, 'numero_identificacion', 'text', 'Numero Identificacion', 1, 1, 1, 1, 1, 1, '{}', 8),
(143, 15, 'telefono', 'text', 'Telefono', 1, 1, 1, 1, 1, 1, '{}', 9),
(144, 15, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 10),
(145, 15, 'persona_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(146, 10, 'persona_id', 'text', 'Persona Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(147, 15, 'tipo_documento', 'text', 'Tipo Documento', 1, 1, 1, 1, 1, 1, '{}', 7),
(148, 15, 'departamento', 'text', 'Departamento', 1, 1, 1, 1, 1, 1, '{}', 5),
(150, 1, 'registro_confirmed', 'checkbox', 'Registro Confirmed', 0, 1, 1, 0, 0, 1, '{\"on\":\"Completado\",\"off\":\"Incompleto\"}', 12),
(151, 10, 'nombre_banco', 'text', 'Nombre Banco', 1, 1, 1, 1, 1, 1, '{}', 7),
(152, 10, 'archivo_banco', 'file', 'Archivo Banco', 1, 1, 1, 1, 1, 1, '{}', 8),
(153, 13, 'fecha_informe_inicio', 'date', 'Fecha Informe Inicio', 1, 1, 1, 1, 1, 1, '{}', 4),
(154, 13, 'fecha_informe_final', 'date', 'Fecha Informe Final', 1, 1, 1, 1, 1, 1, '{}', 5),
(155, 13, 'regalium_belongsto_nomina_relationship', 'relationship', 'nomina', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Nomina\",\"table\":\"nomina\",\"type\":\"belongsTo\",\"column\":\"nomina_id\",\"key\":\"id\",\"label\":\"desprendible\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(156, 13, 'nomina_id', 'text', 'Nomina Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(157, 13, 'valor', 'number', 'Valor', 1, 1, 1, 1, 1, 1, '{}', 7),
(158, 8, 'valor', 'number', 'Valor', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"El valor es obligatorio\"}}}', 5),
(159, 9, 'cancion_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":null}', 28),
(160, 11, 'colaboracion_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":null}', 6);

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
(8, 'nomina', 'nomina', 'Nomina', 'Nominas', 'fa fa-university', 'App\\Models\\Nomina', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:14:43', '2022-01-29 17:50:45'),
(9, 'cancion', 'cancion', 'Cancion', 'Canciones', 'voyager-music', 'App\\Models\\Cancion', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:18:22', '2022-01-02 17:47:17'),
(10, 'cliente', 'cliente', 'Cliente', 'Clientes', 'voyager-smile', 'App\\Models\\Cliente', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:22:19', '2022-01-22 16:26:03'),
(11, 'colaboracion', 'colaboracion', 'Colaboracion', 'Colaboraciones', 'voyager-people', 'App\\Models\\Colaboracion', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:26:02', '2022-01-02 17:36:36'),
(13, 'regalia', 'regalia', 'Regalia', 'Regalias', 'voyager-wallet', 'App\\Models\\Regalia', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:42:20', '2022-01-25 23:21:00'),
(14, 'repertorio', 'repertorio', 'Repertorio', 'Repertorios', 'voyager-documentation', 'App\\Models\\Repertorio', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-01-02 17:49:10', '2022-01-02 17:49:10'),
(15, 'persona', 'persona', 'Persona', 'Personas', NULL, 'App\\Models\\Persona', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-05 21:30:03', '2022-01-11 21:48:06');

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
(28, 1, 'Gestión Clientes', '/gestionClientes', '_self', 'fa fa-user-circle-o', '#000000', NULL, 5, '2022-01-15 21:22:45', '2022-01-15 21:22:45', NULL, ''),
(30, 3, 'Gestión de Repertorios', '/repertorio', '_self', 'voyager-music', '#000000', NULL, 2, '2022-02-03 21:55:21', '2022-02-03 22:05:49', NULL, ''),
(31, 3, 'Escritorio', '/admin', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-02-03 21:56:24', '2022-02-03 21:56:37', NULL, ''),
(32, 2, 'Escritorio', '/admin', '_self', 'voyager-boat', '#000000', NULL, 6, '2022-02-03 21:57:47', '2022-02-03 21:57:47', NULL, ''),
(33, 2, 'Gestión de Nómina', '/nomina', '_self', 'fa fa-university', '#000000', NULL, 7, '2022-02-03 22:00:00', '2022-02-03 22:00:00', NULL, ''),
(34, 2, 'Gestón de Regalías', '/regalias', '_self', 'voyager-wallet', '#000000', NULL, 8, '2022-02-03 22:01:50', '2022-02-03 22:01:50', NULL, ''),
(35, 2, 'Gestión de Clientes', '/clientes', '_self', 'fa fa-user-circle-o', '#000000', NULL, 9, '2022-02-03 22:04:54', '2022-02-03 22:04:54', NULL, '');

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
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `desprendible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_informe` date NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`id`, `cliente_id`, `desprendible`, `fecha_informe`, `valor`) VALUES
(1, 5, '', '2022-02-03', '36'),
(2, 4, 'Nomina/February2022/1643948785.pdf', '2022-02-10', '230');

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
(80, 'delete_persona', 'persona', '2022-01-05 21:30:03', '2022-01-05 21:30:03');

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
(80, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `pais`, `ciudad`, `tipo_documento`, `numero_identificacion`, `telefono`, `user_id`, `departamento`, `firma`, `contrato`) VALUES
(14, 'Prismad', 'Music', 'Colombia', 'Villavicencio', 'cc', '9000000000', '3003577830', 1, 'Meta', NULL, NULL),
(16, 'Candido', 'Moreno', 'Colombia', 'Villavicencio', 'cc', '1121958055', '3138339062', 21, 'Meta', NULL, NULL),
(17, 'Prismad', 'Music', 'Colombia', 'Villavicencio', 'cc', '1121958055', '3138339062', 1, 'Meta', NULL, NULL),
(20, 'Javier Ivan', 'Varon Bueno', 'Colombia', 'Medellín', 'cc', '1121924426', '3192205400', 25, 'Antioquia', NULL, NULL);

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
  `informe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_informe_inicio` date NOT NULL,
  `fecha_informe_final` date NOT NULL,
  `nomina_id` bigint(20) DEFAULT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regalia`
--

INSERT INTO `regalia` (`id`, `cliente_id`, `informe`, `fecha_informe_inicio`, `fecha_informe_final`, `nomina_id`, `valor`) VALUES
(3, 4, 'Regalias/February2022/1643948491.xlsx', '2022-02-04', '2022-07-20', 1, '34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repertorio`
--

CREATE TABLE `repertorio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artista_principal` bigint(20) DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subgenero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_sello` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_salida` date NOT NULL,
  `productor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annio_produccion` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upc_ean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_catalogo` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repertorio`
--

INSERT INTO `repertorio` (`id`, `portada`, `titulo`, `version`, `artista_principal`, `genero`, `subgenero`, `nombre_sello`, `formato`, `fecha_salida`, `productor`, `copyright`, `annio_produccion`, `upc_ean`, `numero_catalogo`) VALUES
(1, 'portadas/February2022/1643948013.jpeg', 'Loley', 'fdasfsda', 8, 'g45', 'sg2', 'ns1', 'f1', '2022-02-09', 'Dennys', 'javox intc', '1994', 'sdafsdaf', 23413124);

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
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/February2022/m3pglLimUB3DEssv351q.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '376527473637-0c66akrj06fs2q9rqi6ahlpreul7e6sp.apps.googleusercontent.com', '', 'text', 1, 'Admin');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registro_confirmed` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `registro_confirmed`) VALUES
(1, 1, 'PrismadMusic', 'prismadmusic@gmail.com', 'users/February2022/aqHRg7reMK3wpKL0Qftr.jpg', '2022-01-15 21:19:31', '$2y$10$5Ilfxt6ad3cHxqwwnmqYGeLdsofwcdq483/PhvUbrEDgCWq1WMFw2', 'wuaeXdYeRzYTbBq8zjLlFY5tUWSu1hnyU0gURHya2sVDGz5pVrJA8HnUlnOp', '{\"locale\":\"es\"}', '2022-01-02 04:43:19', '2022-02-03 22:37:10', 1),
(21, 2, 'LordCandocar', 'stiivenmoreno@gmail.com', 'users/February2022/i7RRngz5d7G0r48MjIo0.jpg', '2022-01-15 20:34:30', '$2y$10$Ke5w/9eWb5j4wYYSbSZ3z.6ckFdDsARb0iA51kwac9tWDMecxqK22', 'mwvr41HrSDCOz0z0xJQaLI0aYn13SFc3rQGLQb0BMWk8h8MaW9d32xmO0qkY', '{\"locale\":\"es\"}', '2022-01-15 18:22:57', '2022-02-03 22:18:59', 1),
(25, 2, 'Javier', 'javoxdaemon@gmail.com', 'users/default.png', '2022-02-03 23:01:38', '$2y$10$XjosMoaEGJq6vCq4VwXtl.R/SGSLpQPocfN2PBLsEWDQKb99Dq5Oa', NULL, NULL, '2022-02-03 23:01:01', '2022-02-03 23:07:28', 1),
(26, 3, 'Dennys', 'dennys@gmail.com', 'users/default.png', '2022-02-03 23:16:25', '$2y$10$zqDFxyQqrWlocRE9jZ.p4eEdcKW.VVi2pMCF3tk9sXtQgOZSkFRGC', 'UqhNpi6Rtca2Xfra3Ar0gbTIQbthiuLvQfM3Uayjvr7D4YWxJ90n3KieJYrh', '{\"locale\":\"es\"}', '2022-02-03 23:16:08', '2022-02-03 23:16:08', 1);

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
  ADD KEY `cancion_repertorio_id_index` (`repertorio_id`),
  ADD KEY `cancion_user_id_index` (`cliente_id`),
  ADD KEY `cancion_colaboracion_id_index` (`colaboracion_id`);

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
  ADD KEY `colaboracion_cliente_id_index` (`cliente_id`),
  ADD KEY `colaboracion_cancion_id_index` (`cancion_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `repertorio_artista_principal_index` (`artista_principal`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `colaboracion`
--
ALTER TABLE `colaboracion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
