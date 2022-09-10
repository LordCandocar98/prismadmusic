-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-09-2022 a las 23:08:04
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
  `tipo_secundario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrumental` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compositor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arreglista` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annio_produccion` year(4) DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subgenero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero_secundario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subgenero_secundario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letra_chocante_vulgar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inicio_previsualizacion` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idioma_titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idioma_letra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_principal_salida` date DEFAULT NULL,
  `pista_mp3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_preguardado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `repertorio_id`, `tipo_secundario`, `instrumental`, `titulo`, `version_subtitulo`, `autor`, `compositor`, `arreglista`, `productor`, `pline`, `annio_produccion`, `genero`, `subgenero`, `genero_secundario`, `subgenero_secundario`, `letra_chocante_vulgar`, `inicio_previsualizacion`, `idioma_titulo`, `idioma_letra`, `fecha_principal_salida`, `pista_mp3`, `link_preguardado`) VALUES
(16, 26, 'original', 'no', 'Bajo el árbol sombrío', NULL, 'Janeth Perez', 'Janeth Perez', 'Diego Hernandez', 'DH estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '1', 'Español', 'Español', '2022-06-10', '1654232904.wav', NULL),
(17, 27, 'original', 'no', 'Ven y dime', NULL, 'Manuel García', 'Manuel García', 'Diego Hernandez', 'DH estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '1', 'Español', 'Español', '2022-06-10', '1654233376.wav', NULL),
(18, 28, 'original', 'no', 'Si tu no estas', NULL, 'Omar Piñeros', 'Omar Piñeros', 'Diego Hernandez', 'DH estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654233554.wav', NULL),
(19, 29, 'original', 'no', 'Negro Azabache', NULL, 'Manuel García', 'Manuel García', 'Diego Hernandez', 'DH estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654233781.wav', NULL),
(20, 30, 'original', 'no', 'Sin ti', NULL, 'Carlos Orozco', 'Carlos Orozco', 'Diego Hernandez', 'DH estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '3', 'Español', 'Español', '2022-06-10', '1654234329.wav', NULL),
(21, 31, 'original', 'no', 'Mi muchacho coleador', NULL, 'Jhon Henry Londoño', 'Jhon Henry Londoño', 'Ivan Niño', 'Platino Estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654235073.wav', NULL),
(22, 32, 'original', 'no', 'Cuando se quiere se puede', NULL, 'Alberto Santos', 'Alberto Santos', 'Ivan Niño', 'Platino Estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654311490.wav', NULL),
(23, 33, 'original', 'no', 'Hechizante mirada', NULL, 'Franklin Diaz', 'Franklin Diaz', 'Ivan Niño', 'Platino Estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654311684.wav', NULL),
(24, 34, 'original', 'no', 'Amalaya', NULL, 'Franklin Diaz', 'Franklin Diaz', 'Ivan Niño', 'Platino Estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654311852.wav', NULL),
(25, 35, 'original', 'no', 'Mi sombrero es un diamante', NULL, 'Rodrigo Castillo', 'Rodrigo Castillo', 'Diego Hernandez', 'DH estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654312724.wav', NULL),
(26, 36, 'original', 'no', 'Te salió mal la jugada', NULL, 'Jhon Henry Londoño', 'Jhon Henry Londoño', 'Ivan Niño', 'Platino Estudio', 'Luna Reyes', 2022, 'Folk', 'Folk', 'Folk', 'Folk', 'no', '5', 'Español', 'Español', '2022-06-10', '1654313042.wav', NULL),
(27, 38, 'original', 'no', 'HASTA VIEJITOS', NULL, 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2022, 'Pop', 'Latin', 'Pop', 'Latin', 'no', '15', 'Español', 'Español', '2022-06-19', '1655176177.wav', NULL),
(28, 37, 'original', 'no', 'LUNA Y ESTRELLA', NULL, 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2019, 'Pop', 'Latin', 'Pop', 'Latin', 'no', '15', 'Español', 'Español', '2022-06-19', '1655176607.wav', NULL),
(29, 39, 'original', 'no', 'A MI MODO', NULL, 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2020, 'Pop', 'Latin', 'Pop', 'Latin', 'no', '20', 'Español', 'Español', '2022-06-19', '1655176898.wav', NULL),
(30, 40, 'original', 'no', 'A MI MODO', NULL, 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2020, 'Pop', 'Latin', 'Pop', 'Latin', 'no', NULL, 'Español', 'Español', '2022-06-19', '1655177429.wav', NULL),
(31, 41, 'original', 'no', 'HASTA VIEJITOS', 'pop', 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2022, 'Pop', 'Latin', 'Pop', 'Latin', 'no', NULL, 'Español', 'Español', '2022-06-22', '1655440242.wav', NULL),
(32, 42, 'original', 'no', 'A MI MODO', 'pop', 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2020, 'Pop', 'Latin', 'Pop', 'Latin', 'no', NULL, 'Español', 'Español', '2022-06-22', '1655441574.wav', NULL),
(33, 43, 'original', 'no', 'ETERNAMENTE AMADA', 'pop', 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2010, 'Pop', 'Alternative', 'Pop', 'Alternative', 'no', NULL, 'Español', 'Español', '2022-06-23', '1655442781.wav', NULL),
(34, 44, 'original', 'no', 'CUANDO MUERE EL AMOR', 'Original', 'Abdul Farfán', 'Abdul Farfán', 'Abdul Farfán', 'Abdul Farfán', 'Abdul Farfán', 2022, 'Musica Llanera', 'Folk', 'Musica Llanera', 'Folk', 'no', '3', 'Español', 'Español', '2022-08-03', '1659063327.wav', NULL),
(35, 46, 'original', 'no', 'Mi muchacho coleador', NULL, 'Jhon Henry Londoño', 'Jhon Henry Londoño', 'Ivan Niño', 'Platino Estudio', 'Luna Reyes', 2022, 'Musica Llanera', 'Folk', 'Musica Llanera', 'Folk', 'no', '10', 'Español', 'Español', '2022-08-10', '1659647283.wav', NULL),
(36, 47, 'original', 'no', 'NADA', 'pop', 'CARLOS ALVAREZ PERALTA', 'CARLOS ALVAREZ PERALTA', NULL, 'CARLOS ALVAREZ', 'CARLOS ALVAREZ', 2022, 'Pop', 'Latin', 'Pop', 'Latin', 'no', NULL, 'Español', 'Español', '2022-08-19', '1660104002.wav', NULL),
(37, 48, 'original', 'no', 'Te Sigo Extrañando', NULL, 'Yacko Marquez', 'Yacko Marquez, Juan Triana', 'Juan Triana', 'Juan Triana', 'Yacko Marquez', 2022, 'balada pop', 'Pop in Spanish', 'balada pop', 'Pop in Spanish', 'no', '93', 'Español', 'Español', '2022-09-16', '1660172568.wav', NULL),
(38, 49, 'Original', 'no', 'COUNT ON ME', NULL, 'DJ NEW FEST', 'DJ NEW FEST', NULL, 'DJ NEW FEST', 'DJ NEW FEST', 2019, '46', '133', '46', '133', 'no', '120', 'Inglés', 'Inglés', '2019-08-12', '[]', NULL),
(39, 50, 'original', 'no', 'Recuerdos', NULL, 'Nelson Romero', 'Nelson Romero', 'Nelson Romero', 'Alejo Cruz', 'Nelson Romero', 2022, 'fusion tropical', 'Latin', 'fusion tropical', 'Latin', 'no', '3', 'Español', 'Español', '2022-09-16', '1660784565.wav', NULL),
(40, 51, 'original', 'no', 'Away From You', 'Estudio', 'Mar Blanco', 'Mar Blanco / Danny Castelle', 'Danny Castelle', 'Danny Castelle', 'Mar Blanco', 2022, 'Pop', 'Electropop', 'Pop', 'Electropop', 'no', '3', 'Inglés', 'Inglés', '2022-09-16', '1660939550.wav', NULL),
(41, 53, 'original', 'no', 'Estacion Lunar', 'oficial', 'Anica Rod', 'Anica Rod', 'Aleja Olarte', 'Anica Rod, Aleja Olarte', 'Anica Rod', 2022, 'balada pop', 'Pop', 'balada pop', 'Pop', 'no', '-3', 'Español', 'Español', '2022-09-11', '1661825320.wav', NULL),
(42, 52, 'original', 'no', 'Lust - Seth Covelli ft Karen Castiblanco', 'original', 'Seth Covelli', 'Daniel Stornelli,Karen Castiblanco', 'Daniel Stornelli, Seth Covelli', 'Seth Covelli', 'Seth Covelli', 2022, 'Electronica', 'Pop', 'Electronica', 'Pop', 'no', NULL, 'Español', 'Español', '2022-10-07', '1662352260.wav', NULL),
(43, 55, 'original', 'no', 'Global Shock - Seth Covelli x King - O', NULL, 'Seth Covelli', 'King - O', 'Seth Covelli', 'Seth Covelli', 'Seth Covelli', 2022, 'Hip Hop/Rap', 'Trap', 'Hip Hop/Rap', 'Trap', 'no', NULL, 'Inglés', 'Inglés', '2022-09-14', '1662649623.wav', NULL);

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
(23, 40, 'MIGUEL HUERTAS', 'https://open.spotify.com/artist/2gXDNzafAvtZ4dYrDBhYpm?si=PGRSbbQUS7WjXR6gqCGvGw'),
(24, 41, 'La Shule', 'https://open.spotify.com/artist/4u4FEjo1WEgiwgC2fRsQHB?si=neXxstxiRV-QKldNtzWtuA&utm_source=copy-link'),
(25, 42, 'Nelson Romero', 'https://open.spotify.com/artist/4QI5KKpGTdNQaYo7mIpIN3?si=zVHju4vHR_SOFIScQhDuBA'),
(26, 43, 'Mey Manjarres', 'https://open.spotify.com/user/12127905777?si=-LxXOYhcTWWCytSvvDgjPw&utm_source=copy-link&nd=1'),
(27, 44, 'Kassett', 'https://open.spotify.com/track/08DoQ1mGKSjLWn98NnseYX?si=f57cc08980aa4eba'),
(28, 45, 'Vanna', NULL),
(29, 46, 'Anica Rod', 'https://open.spotify.com/artist/0BWH2QK6dFzWdZr72LwqaQ?si=mTFR5-4nR2SoHNnUP6BzyQ'),
(30, 47, 'Witthy', NULL),
(37, 54, 'warning', 'https://open.spotify.com/artist/2bkDh0Tguv3Ncm2yhEsAm0?si=Ygwz-RDpTNuhm7R6DPN3SA'),
(40, 57, 'Magic Juanpa', 'https://open.spotify.com/track/6uhepxdTt42IVv13gFpKvv?si=w4LnlB6lTJKU62GFVQOgMQ'),
(41, 58, 'Luna Reyes', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(42, 59, 'Papo', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(43, 60, 'Dartagnan', 'https://open.spotify.com/artist/33XmSc0MFJWZ7bbPtpitQz?si=MVudRc16Riyu-AsHQUxvkQ'),
(44, 61, 'Éle de la Rem', 'https://open.spotify.com/artist/2jNXxqD5UJRgBREPiCR6oB?si=YVfMx_BhRY-AN4hP51xg6Q'),
(45, 62, 'Kelly Cardenas', 'https://open.spotify.com/artist/5Db3K394enddwMhkhUJQ3U?si=m6bS1XPmQIuzhFu6L8l69A'),
(46, 63, 'Rei Panda', 'https://open.spotify.com/artist/0oZVf3CTkj7AqKCXuzyOOK/discography/all?pageUri=spotify:album:12X5q97SdxHWkRqSRcHcoY'),
(47, 64, 'Rock-Dolf', 'https://open.spotify.com/artist/6NK4FifX2U1w2auiJyGcUC?si=l5A3-QuSTmmbPeZ9ESc8cA'),
(48, 65, 'dj jhonatan peru', 'https://open.spotify.com/artist/3ajec2RtAQFQCH7UOgyAzC'),
(49, 66, 'Abdul Farfán', 'https://open.spotify.com/artist/5rV5LN79yWzWv39pAgYn7R?si=hYLfntMuQ6G3UrJqQ685uA'),
(50, 67, 'Stornelli', 'https://open.spotify.com/artist/0z3lddSggKvF6wF0HyZfQn?si=t1kCEF5GRwS2AwplRmgsaw&utm_source=copy-link'),
(51, 68, 'La Reina Del Joropo', NULL),
(52, 69, 'Seth Covelli', 'https://open.spotify.com/artist/7oMNPqcIsTOmJuNoz778A8?si=y2n7MbyxTqiH2jec5HoBZg'),
(53, 70, 'Seth Covelli', 'https://open.spotify.com/artist/7oMNPqcIsTOmJuNoz778A8?si=y2n7MbyxTqiH2jec5HoBZg'),
(54, 71, 'Franklin Abreu', NULL),
(55, 72, 'Tian Quintero', 'https://open.spotify.com/artist/6jlbE8rCuwi3rxjAUpmJFB'),
(56, 73, 'Canapiare', 'https://open.spotify.com/artist/1YevnZYQup5xTxQlYm5OHX?si=ZDZQEQgbT_S1GrXCOetZSw'),
(57, 74, 'Thiago', 'https://open.spotify.com/artist/3rsIBj92pyqIX8YYoidjIb?si=qG1mUJAOSuWcnRsVSK2TAA'),
(58, 75, 'Claruz', 'https://open.spotify.com/album/4gfvTFyHF9FIA4VLMcNxyU?si=iIF7TzfEQcqTEhb6_3FuxQ&utm_source=copy-link'),
(59, 76, 'JeanFord', 'https://open.spotify.com/user/21uivcgggsupvl4sw3io2bmwq?si=u83Mw1aLRsCC2xvkPheIBw&utm_source=copy-link'),
(60, 77, 'JeanFord', 'https://open.spotify.com/user/21uivcgggsupvl4sw3io2bmwq?si=u83Mw1aLRsCC2xvkPheIBw&utm_source=copy-link'),
(61, 78, 'Francis Carolina', 'https://open.spotify.com/artist/4yzmcEPeTftgkCykrG1kBB?si=CUeDLdIeTHe-sySwqrWPVA&utm_source=copy-link'),
(62, 79, 'Gelo Arango', 'https://open.spotify.com/artist/1IDFD0FecyWg2rjm5iNcZo?si=7uEGYRHiTomW8WH0mNjeOA'),
(63, 80, 'Yacko Marquez', 'https://open.spotify.com/artist/4KgoWycUzamMhwFoVyGOX3?si=R7ej7owdRfKneDHHezO5ZQ'),
(64, 81, 'Newfest', 'https://open.spotify.com/track/4qmwprXM7i9KT0iOY7oR2w?si=grZ7dJswSb6PAqyYKsp1Tg'),
(65, 82, 'Abimael Herrera', 'https://open.spotify.com/artist/3mgAYpUaQ91PF28dbGUCC9'),
(66, 83, 'Alejo Cruz', 'https://open.spotify.com/artist/6ZyhBCSLEWD31C6AdgXiRt?si=LnfKQ8fESAKoGQFU3eYTAg'),
(67, 84, 'Jeyson BPM', 'https://open.spotify.com/artist/7DSLCeJ5eHxCjAmJVlnMo8'),
(68, 85, 'Mar Blanco', NULL),
(69, 86, 'Yeferson Bolivar', NULL),
(70, 87, 'Cristian Parra', 'https://open.spotify.com/artist/1Alsmcqy1zAILJbNANSf8v?si=SwXT_vGlR7qPjmpKjcKVPw'),
(71, 88, 'Alejotao', 'https://open.spotify.com/artist/0ncChRyOLwg2vldS0rYJKw?si=jdwdq1cdS12jSbwk_f14gQ'),
(72, 89, 'Alejotao', 'https://open.spotify.com/artist/0ncChRyOLwg2vldS0rYJKw?si=jdwdq1cdS12jSbwk_f14gQ'),
(73, 90, 'Developer', 'www.developer.com');

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
(19, 'joropo2014@hotmail.com', 100, 16),
(20, 'joropo2014@hotmail.com', 100, 17),
(21, 'joropo2014@hotmail.com', 100, 18),
(22, 'joropo2014@hotmail.com', 100, 19),
(23, 'joropo2014@hotmail.com', 100, 20),
(24, 'joropo2014@hotmail.com', 100, 21),
(25, 'joropo2014@hotmail.com', 100, 22),
(26, 'joropo2014@hotmail.com', 100, 23),
(27, 'joropo2014@hotmail.com', 100, 24),
(28, 'joropo2014@hotmail.com', 100, 25),
(29, 'joropo2014@hotmail.com', 100, 26),
(30, 'cealvarezperalta@hotmail.com', 100, 27),
(31, 'cealvarezperalta@hotmail.com', 100, 28),
(32, 'cealvarezperalta@hotmail.com', 100, 29),
(33, 'cealvarezperalta@hotmail.com', 100, 30),
(34, 'cealvarezperalta@hotmail.com', 100, 31),
(35, 'cealvarezperalta@hotmail.com', 100, 32),
(36, 'cealvarezperalta@hotmail.com', 100, 33),
(37, 'abdulfd32@gmail.com', 100, 34),
(38, 'joropo2014@hotmail.com', 100, 35),
(39, 'cealvarezperalta@hotmail.com', 100, 36),
(40, 'yackomarquez@gmail.com', 100, 37),
(41, 'djnewfest2016@hotmail.com', 100, 38),
(42, 'nelsonromeromusic@gmail.com', 80, 39),
(43, 'alejocruzmusic@gmail.com', 20, 39),
(44, 'marblancomusic@gmail.com', 50, 40),
(45, 'de.rodriguezc@uniandes.edu.co', 50, 40),
(46, 'anicarodmusica@gmail.com', 50, 41),
(47, 'Idmusic2@outlook.com', 80, 42),
(48, 'stornellioficial@gmail.com', 20, 42),
(49, 'Idmusic2@outlook.com', 50, 43),
(50, 'thisiskingo821@gmail.com', 50, 43);

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

--
-- Volcado de datos para la tabla `colaboracion_art_feas`
--

INSERT INTO `colaboracion_art_feas` (`id`, `nombre`, `tipo_colaboracion`, `cancion_id`, `created_at`, `updated_at`) VALUES
(9, 'Karen Castiblanco', 'Featuring', 42, '2022-09-04 23:31:29', '2022-09-04 23:31:29');

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
(22, 24, 'juanpa12237@gmail.com', 'Principal (1st)', 'https://open.spotify.com/track/6uhepxdTt42IVv13gFpKvv?si=w4LnlB6lTJKU62GFVQOgMQ'),
(23, 25, 'stiivenmoreno@gmail.com', 'Principal (1st)', 'https://open.spotify.com/user/08wfyckbjxeptjjbe3m2c912u'),
(24, 26, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(25, 27, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(26, 28, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(27, 29, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(28, 30, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(29, 31, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(30, 32, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(31, 33, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(32, 34, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(33, 35, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(34, 36, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(35, 37, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(36, 38, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(37, 39, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(38, 40, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(39, 41, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(40, 42, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(41, 43, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(42, 44, 'abdulfd32@gmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/5rV5LN79yWzWv39pAgYn7R?si=hYLfntMuQ6G3UrJqQ685uA'),
(43, 45, 'thiagoomusic7@gmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/3rsIBj92pyqIX8YYoidjIb?si=qG1mUJAOSuWcnRsVSK2TAA'),
(44, 46, 'joropo2014@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4XY3uMdKzYaPNAUQL2v4tL?si=x7LdxH7EQM6KzebfKn_HDg'),
(45, 47, 'cealvarezperalta@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/playlist/3dwYTX2RMz9BRhVItzHO09?si=19d9a1b4a95847ad'),
(46, 48, 'yackomarquez@gmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4KgoWycUzamMhwFoVyGOX3?si=R7ej7owdRfKneDHHezO5ZQ'),
(47, 50, 'nelsonromeromusic@gmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/4QI5KKpGTdNQaYo7mIpIN3?si=zVHju4vHR_SOFIScQhDuBA'),
(48, 51, 'marblancomusic@gmail.com', 'Principal (1st)', NULL),
(49, 52, 'Idmusic2@outlook.com', 'Principal (1st)', 'https://open.spotify.com/artist/7oMNPqcIsTOmJuNoz778A8?si=y2n7MbyxTqiH2jec5HoBZg'),
(50, 53, 'anicarodmusica@gmail.com', 'Principal (1st)', 'https://open.spotify.com/artist/0BWH2QK6dFzWdZr72LwqaQ?si=mTFR5-4nR2SoHNnUP6BzyQ'),
(51, 54, 'djnewfest2016@hotmail.com', 'Principal (1st)', 'https://open.spotify.com/track/4qmwprXM7i9KT0iOY7oR2w?si=grZ7dJswSb6PAqyYKsp1Tg'),
(52, 55, 'Idmusic2@outlook.com', 'Principal (1st)', 'https://open.spotify.com/artist/7oMNPqcIsTOmJuNoz778A8?si=y2n7MbyxTqiH2jec5HoBZg');

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
(2, 1, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 0, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Role Adicional', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '{}', 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '{}', 2),
(31, 5, 'category_id', 'text', 'Category', 0, 0, 1, 1, 1, 0, '{}', 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '{}', 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '{}', 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '{}', 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, '{}', 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 4),
(48, 6, 'body', 'rich_text_box', 'Body', 0, 0, 1, 1, 1, 1, '{}', 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, '{}', 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'editor_id', 'text', 'Editor Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{}', 3),
(59, 7, 'resumen', 'text', 'Resumen', 1, 1, 1, 1, 1, 1, '{}', 4),
(60, 7, 'imagen', 'image', 'Imagen', 1, 1, 1, 1, 1, 1, '{}', 5),
(61, 7, 'link', 'text', 'Link', 1, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'articulo_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"editor_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(63, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(64, 8, 'cliente_id', 'text', 'Cliente Id', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"El cliente es obligatorio\"}}}', 2),
(65, 8, 'desprendible', 'file', 'Desprendible', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|mimes:pdf\",\"messages\":{\"required\":\"El desprendible es obligatorio\",\"mimes\":\"El desprendible debe ser formato PDF\"}}}', 3),
(66, 8, 'fecha_informe', 'timestamp', 'Fecha Informe', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"La fecha de informe es requerida\"}}}', 4),
(67, 8, 'nomina_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(68, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(69, 9, 'repertorio_id', 'select_dropdown', 'Repertorio Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(70, 9, 'tipo_secundario', 'select_dropdown', 'Tipo Secundario', 1, 1, 1, 1, 1, 1, '{\"default\":\"Original\",\"options\":{\"Original\":\"Original\",\"karaoke\":\"Karaoke\",\"medley\":\"Medley\",\"cover\":\"Cover\",\"otrogrupo\":\"Versi\\u00f3n por otro grupo\"}}', 4),
(71, 9, 'instrumental', 'select_dropdown', 'Instrumental', 1, 1, 1, 1, 1, 1, '{\"default\":\"no\",\"options\":{\"no\":\"No\",\"si\":\"Si\"}}', 5),
(72, 9, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{}', 6),
(73, 9, 'version_subtitulo', 'text', 'Version Subtitulo', 0, 1, 1, 1, 1, 1, '{}', 7),
(77, 9, 'autor', 'text', 'Autor', 1, 1, 1, 1, 1, 1, '{}', 8),
(78, 9, 'compositor', 'text', 'Compositor', 1, 1, 1, 1, 1, 1, '{}', 9),
(79, 9, 'arreglista', 'text', 'Arreglista', 0, 1, 1, 1, 1, 1, '{}', 10),
(80, 9, 'productor', 'text', 'Productor', 0, 1, 1, 1, 1, 1, '{}', 11),
(81, 9, 'pline', 'text', 'Pline', 1, 1, 1, 1, 1, 1, '{}', 12),
(82, 9, 'annio_produccion', 'text', 'Año Producción', 1, 1, 1, 1, 1, 1, '{}', 13),
(83, 9, 'genero', 'text', 'Genero', 1, 1, 1, 1, 1, 1, '{}', 14),
(84, 9, 'subgenero', 'text', 'Subgénero', 1, 1, 1, 1, 1, 1, '{}', 15),
(85, 9, 'genero_secundario', 'text', 'Genero Secundario', 0, 1, 1, 1, 1, 1, '{}', 16),
(86, 9, 'subgenero_secundario', 'text', 'Subgénero Secundario', 0, 1, 1, 1, 1, 1, '{}', 17),
(87, 9, 'letra_chocante_vulgar', 'select_dropdown', 'Letra Chocante Vulgar', 1, 1, 1, 1, 1, 1, '{\"default\":\"no\",\"options\":{\"no\":\"No\",\"si\":\"Si\"}}', 18),
(88, 9, 'inicio_previsualizacion', 'text', 'Inicio Previsualización', 0, 1, 1, 1, 1, 1, '{}', 19),
(89, 9, 'idioma_titulo', 'select_dropdown', 'Idioma Titulo', 1, 1, 1, 1, 1, 1, '{\"default\":\"Espa\\u00f1ol\",\"options\":{\"Espa\\u00f1ol\":\"Espa\\u00f1ol\",\"Ingl\\u00e9s\":\"Ingl\\u00e9s\",\"Portugu\\u00e9s\":\"Portugu\\u00e9s\",\"Italiano\":\"Italiano\",\"Franc\\u00e9s\":\"Franc\\u00e9s\",\"Chino\":\"Chino\",\"Japon\\u00e9s\":\"Japon\\u00e9s\",\"Coreano\":\"Coreano\",\"Alem\\u00e1n\":\"Alem\\u00e1n\",\"\\u00c1rabe\":\"\\u00c1rabe\",\"Hindi\":\"Hindi\",\"Ruso\":\"Ruso\"}}', 21),
(90, 9, 'idioma_letra', 'select_dropdown', 'Idioma Letra', 1, 1, 1, 1, 1, 1, '{\"default\":\"Espa\\u00f1ol\",\"options\":{\"Espa\\u00f1ol\":\"Espa\\u00f1ol\",\"Ingl\\u00e9s\":\"Ingl\\u00e9s\",\"Portugu\\u00e9s\":\"Portugu\\u00e9s\",\"Italiano\":\"Italiano\",\"Franc\\u00e9s\":\"Franc\\u00e9s\",\"Chino\":\"Chino\",\"Japon\\u00e9s\":\"Japon\\u00e9s\",\"Coreano\":\"Coreano\",\"Alem\\u00e1n\":\"Alem\\u00e1n\",\"\\u00c1rabe\":\"\\u00c1rabe\",\"Hindi\":\"Hindi\",\"Ruso\":\"Ruso\"}}', 22),
(91, 9, 'fecha_principal_salida', 'date', 'Fecha Principal Salida', 0, 1, 1, 1, 1, 1, '{}', 23),
(93, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(95, 10, 'nombre_artistico', 'text', 'Nombre Artistico', 1, 1, 1, 1, 1, 1, '{}', 3),
(96, 10, 'link_spoty', 'text', 'Link Spoty', 0, 1, 1, 1, 1, 1, '{}', 4),
(99, 10, 'cliente_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Persona\",\"table\":\"persona\",\"type\":\"belongsTo\",\"column\":\"persona_id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(100, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(102, 11, 'porcentaje_intelectual', 'number', 'Porcentaje Intelectual', 1, 1, 1, 1, 1, 1, '{\"step\":1,\"min\":1,\"max\":100,\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"El porcentaje intelectual es obligatorio\"}}}', 3),
(103, 11, 'colaboracion_belongsto_cancion_relationship', 'relationship', 'cancion', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cancion\",\"table\":\"cancion\",\"type\":\"belongsTo\",\"column\":\"cancion_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(104, 11, 'cancion_id', 'text', 'Cancion', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"El campo canci\\u00f3n es obligatorio\"}}}', 4),
(106, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(107, 13, 'cliente_id', 'text', 'Cliente Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(108, 13, 'informe', 'file', 'Informe', 1, 1, 1, 1, 1, 1, '{}', 3),
(110, 13, 'regalium_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_id\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(111, 9, 'cancion_belongsto_repertorio_relationship_1', 'relationship', 'repertorio', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Repertorio\",\"table\":\"repertorio\",\"type\":\"belongsTo\",\"column\":\"repertorio_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(114, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(115, 14, 'portada', 'image', 'Portada', 0, 1, 1, 1, 1, 1, '{}', 2),
(116, 14, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{}', 3),
(117, 14, 'version', 'text', 'Version', 0, 1, 1, 1, 1, 1, '{}', 4),
(119, 14, 'genero', 'select_dropdown', 'Genero', 1, 1, 1, 1, 1, 1, '{}', 6),
(120, 14, 'subgenero', 'select_dropdown', 'Subgenero', 1, 1, 1, 1, 1, 1, '{}', 7),
(121, 14, 'nombre_sello', 'text', 'Nombre Sello', 1, 1, 1, 1, 1, 1, '{}', 8),
(122, 14, 'formato', 'select_dropdown', 'Formato', 1, 1, 1, 1, 1, 1, '{\"default\":\"EP\",\"options\":{\"EP\":\"EP\",\"SINGLE\":\"SINGLE\",\"ALBUM\":\"ALBUM\"}}', 9),
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
(161, 8, 'nombre_banco', 'text', 'Nombre Banco', 0, 1, 1, 1, 1, 1, '{}', 6),
(162, 8, 'numero_cuenta', 'text', 'Numero Cuenta', 0, 1, 1, 1, 1, 1, '{}', 7),
(163, 8, 'tipo_cuenta', 'select_dropdown', 'Tipo Cuenta', 0, 1, 1, 1, 1, 1, '{\"default\":\"Ahorros\",\"options\":{\"Ahorros\":\"Ahorros\",\"Corriente\":\"Corriente\"}}', 8),
(164, 11, 'cliente_email', 'text', 'Cliente Email', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|email\",\"messages\":{\"required\":\"El campo email es obligatorio\",\"email\":\"Debe ser formato e-mail\"}}}', 2),
(166, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(167, 18, 'repertorio_id', 'text', 'Repertorio Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(168, 18, 'cliente_email', 'text', 'Cliente Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(169, 18, 'tipo_colaboracion', 'text', 'Tipo Colaboracion', 0, 1, 1, 1, 1, 1, '{}', 4),
(170, 18, 'spotify_colaboracion', 'text', 'Spotify Colaboracion', 0, 1, 1, 1, 1, 1, '{}', 5),
(171, 18, 'colaboracion_repertorio_belongsto_repertorio_relationship', 'relationship', 'repertorio', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Repertorio\",\"table\":\"repertorio\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(172, 18, 'colaboracion_repertorio_belongsto_cliente_relationship', 'relationship', 'cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cliente\",\"table\":\"cliente\",\"type\":\"belongsTo\",\"column\":\"cliente_email\",\"key\":\"id\",\"label\":\"nombre_artistico\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(173, 15, 'firma', 'text', 'Firma', 0, 1, 1, 1, 1, 1, '{}', 11),
(174, 15, 'contrato', 'file', 'Contrato', 0, 1, 1, 1, 1, 1, '{}', 12),
(175, 9, 'pista_mp3', 'file', 'Pista Wav', 1, 1, 1, 1, 1, 1, '{}', 20),
(176, 19, 'id', 'text', 'Id', 0, 1, 1, 1, 1, 1, '{}', 1),
(177, 19, 'nombre', 'text', 'Nombre', 0, 1, 1, 1, 1, 1, '{}', 2),
(178, 19, 'descripcion', 'text', 'Descripcion', 0, 1, 1, 1, 1, 1, '{}', 3),
(179, 1, 'confirmation_code', 'text', 'Confirmation Code', 0, 1, 1, 1, 1, 1, '{}', 13),
(180, 14, 'fecha_lanzamiento', 'date', 'Fecha Lanzamiento', 0, 1, 1, 1, 1, 1, '{}', 14),
(181, 14, 'terminado', 'checkbox', 'Terminado', 1, 1, 1, 1, 1, 1, '{\"on\":\"Terminado\",\"off\":\"No Terminado\",\"checked\":true}', 15),
(182, 20, 'id', 'text', 'Id', 0, 1, 1, 1, 1, 1, '{}', 1),
(183, 20, 'nombre', 'text', 'Nombre', 0, 1, 1, 1, 1, 1, '{}', 2),
(184, 20, 'descripcion', 'text', 'Descripcion', 0, 1, 1, 1, 1, 1, '{}', 3),
(185, 14, 'repertorio_belongsto_genero_relationship', 'relationship', 'genero', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Genero\",\"table\":\"genero\",\"type\":\"belongsTo\",\"column\":\"genero\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 16),
(186, 14, 'repertorio_belongsto_subgenero_relationship', 'relationship', 'subgenero', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Subgenero\",\"table\":\"subgenero\",\"type\":\"belongsTo\",\"column\":\"subgenero\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 17),
(187, 9, 'cancion_belongsto_genero_relationship', 'relationship', 'genero', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Genero\",\"table\":\"genero\",\"type\":\"belongsTo\",\"column\":\"genero\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 26),
(188, 9, 'cancion_belongsto_subgenero_relationship', 'relationship', 'subgenero', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Subgenero\",\"table\":\"subgenero\",\"type\":\"belongsTo\",\"column\":\"subgenero\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 27),
(189, 9, 'cancion_belongsto_genero_relationship_1', 'relationship', 'Genero Secundario', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Genero\",\"table\":\"genero\",\"type\":\"belongsTo\",\"column\":\"genero_secundario\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 28),
(190, 9, 'cancion_belongsto_subgenero_relationship_1', 'relationship', 'Subgenero Secundario', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Subgenero\",\"table\":\"subgenero\",\"type\":\"belongsTo\",\"column\":\"subgenero_secundario\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"articulo\",\"pivot\":\"0\",\"taggable\":\"0\"}', 29);

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
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:12', '2022-06-06 23:28:08'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:12', '2022-06-06 23:26:29'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:12', '2022-06-06 23:29:59'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:18', '2022-06-06 23:29:11'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:19', '2022-06-06 23:30:24'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 04:43:20', '2022-06-06 23:26:57'),
(7, 'articulo', 'articulo', 'Articulo', 'Articulos', 'voyager-news', 'App\\Models\\Articulo', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 01:44:23', '2022-06-06 23:24:02'),
(8, 'nomina', 'nomina', 'Nomina', 'Nominas', 'fa fa-university', 'App\\Models\\Nomina', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:14:43', '2022-06-06 23:26:42'),
(9, 'cancion', 'cancion', 'Cancion', 'Canciones', 'voyager-music', 'App\\Models\\Cancion', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:18:22', '2022-08-12 20:52:54'),
(10, 'cliente', 'cliente', 'Cliente', 'Clientes', 'voyager-smile', 'App\\Models\\Cliente', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:22:19', '2022-06-06 23:29:45'),
(11, 'colaboracion', 'colaboracion', 'Colaboracion', 'Colaboraciones', 'voyager-people', 'App\\Models\\Colaboracion', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:26:02', '2022-06-15 22:28:16'),
(13, 'regalia', 'regalia', 'Regalia', 'Regalias', 'voyager-wallet', 'App\\Models\\Regalia', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:42:20', '2022-01-25 23:21:00'),
(14, 'repertorio', 'repertorio', 'Repertorio', 'Repertorios', 'voyager-documentation', 'App\\Models\\Repertorio', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-02 17:49:10', '2022-06-15 21:51:04'),
(15, 'persona', 'persona', 'Persona', 'Personas', NULL, 'App\\Models\\Persona', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-05 21:30:03', '2022-06-06 23:30:47'),
(18, 'colaboracion_repertorio', 'colaboracion-repertorio', 'Colaboracion Repertorio', 'Colaboracion Repertorios', 'voyager-logbook', 'App\\Models\\ColaboracionRepertorio', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-18 23:07:56', '2022-06-06 23:25:38'),
(19, 'genero', 'genero', 'Genero', 'Generos', 'fa fa-caret-square-o-right', 'App\\Models\\Genero', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-06-06 21:55:02', '2022-06-06 23:25:46'),
(20, 'subgenero', 'subgenero', 'Subgenero', 'Subgeneros', 'fa fa-bell-o', 'App\\Models\\Subgenero', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-06-06 21:55:56', '2022-06-13 10:35:12');

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
(2, 'Alternative', NULL),
(11, 'Blues', NULL),
(12, 'Bossa nova', NULL),
(25, 'Musica Infantil', NULL),
(26, 'Chill-Out', NULL),
(30, 'Musica Cristiana', NULL),
(31, 'Classical', NULL),
(34, 'Country', NULL),
(35, 'Cumbia', NULL),
(36, 'Dance', NULL),
(37, 'Dancehall', NULL),
(38, 'Delta blues', NULL),
(41, 'Downtempo', NULL),
(42, 'Drum and bass', NULL),
(45, 'Electronic', NULL),
(46, 'Electronica', NULL),
(49, 'Folk', NULL),
(53, 'Funk', NULL),
(57, 'Gospel', NULL),
(58, 'Grunge', NULL),
(61, 'Hardcore', NULL),
(62, 'Heavy Metal', NULL),
(63, 'Hip Hop/Rap', NULL),
(65, 'House', NULL),
(66, 'Indo Pop', NULL),
(68, 'Jazz', NULL),
(71, 'Kizomba', NULL),
(72, 'Latin Jazz', NULL),
(73, 'Latin Rap', NULL),
(74, 'Lounge', NULL),
(76, 'Motown', NULL),
(78, 'New Age', NULL),
(80, 'Opera', NULL),
(82, 'Pop', NULL),
(83, 'Pop en español', NULL),
(85, 'Punk', NULL),
(87, 'Ranchera', NULL),
(88, 'Rap', NULL),
(89, 'Reggae', NULL),
(90, 'Reggaeton', NULL),
(91, 'Regional Mexicano', NULL),
(92, 'Rhythm & Blues', NULL),
(93, 'Rock', NULL),
(94, 'Rap', NULL),
(97, 'Salsa', NULL),
(98, 'Salsa Choke', NULL),
(99, 'Samba', NULL),
(101, 'Samba-reggae', NULL),
(104, 'Ska', NULL),
(105, 'Smooth jazz', NULL),
(106, 'Soca', NULL),
(107, 'Soul', NULL),
(111, 'Techno', NULL),
(114, 'Trance', NULL),
(115, 'Trap', NULL),
(120, 'Vallenato', NULL),
(121, 'Musica Llanera', NULL),
(1, 'salsa', NULL),
(116, 'rock en español', NULL),
(117, 'merengue', NULL),
(118, 'bachata', NULL),
(119, 'urbano', NULL),
(112, 'k pop', NULL),
(113, 'balada pop', NULL),
(108, 'punk', NULL),
(109, 'black pop', NULL),
(110, 'fusion tropical', NULL),
(102, 'corridos tumbados', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_canciones`
--

CREATE TABLE `historico_canciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `cancion_id` int(11) DEFAULT NULL,
  `annio` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mes` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` double DEFAULT NULL
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
(1, 1, 'Escritorio', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-01-02 04:43:13', '2022-06-06 22:00:14', 'voyager.dashboard', 'null'),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 5, 1, '2022-01-02 04:43:13', '2022-06-06 23:59:07', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, 51, 1, '2022-01-02 04:43:14', '2022-06-06 23:51:37', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 22, 1, '2022-01-02 04:43:14', '2022-06-06 23:51:32', 'voyager.roles.index', NULL),
(5, 1, 'Herramientas', '', '_self', 'voyager-tools', '#000000', NULL, 3, '2022-01-02 04:43:14', '2022-01-10 23:45:27', NULL, ''),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 27, 1, '2022-01-02 04:43:14', '2022-06-06 23:58:42', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 27, 2, '2022-01-02 04:43:14', '2022-06-06 23:58:47', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 27, 3, '2022-01-02 04:43:14', '2022-06-06 23:58:51', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 27, 4, '2022-01-02 04:43:14', '2022-06-06 23:59:00', 'voyager.bread.index', NULL),
(10, 1, 'Configuraciones', '', '_self', 'voyager-settings', '#000000', 5, 2, '2022-01-02 04:43:14', '2022-06-06 23:59:36', 'voyager.settings.index', 'null'),
(15, 1, 'Nominas', '', '_self', 'fa fa-university', '#000000', 53, 1, '2022-01-02 17:14:43', '2022-06-07 00:03:26', 'voyager.nomina.index', 'null'),
(16, 1, 'Canciones', '', '_self', 'voyager-music', NULL, 52, 2, '2022-01-02 17:18:23', '2022-08-20 22:39:57', 'voyager.cancion.index', NULL),
(17, 1, 'Clientes', '', '_self', 'voyager-smile', NULL, 51, 3, '2022-01-02 17:22:20', '2022-06-06 23:54:44', 'voyager.cliente.index', NULL),
(18, 1, 'Colaboraciones', '', '_self', 'voyager-group', '#000000', 52, 3, '2022-01-02 17:26:02', '2022-08-20 22:39:57', 'voyager.colaboracion.index', 'null'),
(19, 1, 'Regalias', '', '_self', 'voyager-wallet', '#000000', 53, 3, '2022-01-02 17:42:20', '2022-08-20 22:39:57', 'voyager.regalia.index', 'null'),
(20, 1, 'Repertorios', '', '_self', 'voyager-documentation', NULL, 52, 1, '2022-01-02 17:49:10', '2022-08-20 22:39:57', 'voyager.repertorio.index', NULL),
(21, 1, 'Personas', '', '_self', 'voyager-people', '#000000', 51, 2, '2022-01-05 21:30:03', '2022-06-06 23:54:44', 'voyager.persona.index', 'null'),
(22, 1, 'Administración', '', '_self', 'voyager-pirate', '#000000', NULL, 4, '2022-01-10 23:15:48', '2022-01-10 23:41:13', NULL, ''),
(26, 1, 'Despliegue', '', '_blank', 'voyager-dot-3', '#000000', 25, 1, '2022-01-10 23:30:25', '2022-01-10 23:32:50', NULL, 'null'),
(27, 1, 'Desarrollo', '', '_self', 'voyager-whale', '#000000', NULL, 2, '2022-01-10 23:38:07', '2022-01-10 23:41:13', NULL, ''),
(30, 3, 'Gestión de Repertorios', '/repertorio', '_self', 'voyager-music', '#000000', NULL, 2, '2022-02-03 21:55:21', '2022-05-08 01:10:06', NULL, ''),
(31, 3, 'Escritorio', '/admin', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-02-03 21:56:24', '2022-02-03 21:56:37', NULL, ''),
(32, 2, 'Escritorio', '/admin', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-02-03 21:57:47', '2022-02-28 04:00:31', NULL, ''),
(33, 2, 'Gestión de Nómina', '/nomina', '_self', 'fa fa-university', '#000000', NULL, 2, '2022-02-03 22:00:00', '2022-02-28 04:00:50', NULL, ''),
(34, 2, 'Gestón de Regalías', '/regalias', '_self', 'voyager-wallet', '#000000', NULL, 3, '2022-02-03 22:01:50', '2022-02-28 04:00:50', NULL, ''),
(36, 3, 'Informe de Pagos', '/informeNomina', '_self', 'fa fa-university', '#000000', 37, 1, '2022-02-12 15:51:40', '2022-05-08 01:11:39', NULL, ''),
(37, 3, 'Informes', '', '_self', 'fa fa-info-circle', '#000000', NULL, 3, '2022-02-12 23:41:14', '2022-05-22 17:30:48', NULL, ''),
(39, 3, 'Cargar Musica', '/cancion', '_self', 'fa fa-file-audio-o', '#000000', 38, 1, '2022-02-12 23:42:59', '2022-05-08 01:10:06', NULL, ''),
(40, 3, 'Informe de Regalías', '/informeRegalias', '_self', 'voyager-wallet', '#000000', 37, 2, '2022-02-12 23:43:58', '2022-02-12 23:44:21', NULL, ''),
(43, 2, 'Gestión de Usuarios', '', '_self', 'voyager-folder', '#000000', NULL, 4, '2022-05-16 22:37:05', '2022-05-16 22:46:29', NULL, ''),
(44, 2, 'Usuarios', '/admin/users', '_self', 'voyager-person', '#000000', 43, 1, '2022-05-16 22:37:46', '2022-05-16 22:38:31', NULL, ''),
(45, 2, 'Cliente', '/admin/cliente', '_self', 'voyager-smile', '#000000', 43, 3, '2022-05-16 22:38:08', '2022-05-16 22:46:29', NULL, ''),
(46, 2, 'Persona', '/admin/persona', '_self', 'voyager-people', '#000000', 43, 2, '2022-05-16 22:38:26', '2022-05-16 22:46:29', NULL, ''),
(47, 3, 'Colaboraciones', '/cancion-colaboracion', '_self', 'fa fa-percent', '#000000', NULL, 4, '2022-05-17 23:02:02', '2022-05-22 17:30:48', NULL, ''),
(48, 2, 'Gestión de Repertorio', '/producto', '_self', 'fa fa-gavel', '#000000', NULL, 6, '2022-05-18 03:03:20', '2022-05-18 03:03:20', NULL, ''),
(49, 1, 'Generos', '', '_self', 'fa fa-caret-square-o-right', NULL, 22, 2, '2022-06-06 21:55:02', '2022-06-06 23:51:53', 'voyager.genero.index', NULL),
(50, 1, 'Subgeneros', '', '_self', 'fa fa-bell-o', '#000000', 22, 3, '2022-06-06 21:55:56', '2022-06-08 21:43:43', 'voyager.subgenero.index', 'null'),
(51, 1, 'Administración Usuarios', '', '_self', 'voyager-helm', '#000000', NULL, 5, '2022-06-06 23:51:18', '2022-06-06 23:53:52', NULL, ''),
(52, 1, 'Administración Productos', '', '_self', 'voyager-helm', '#000000', NULL, 6, '2022-06-06 23:53:20', '2022-06-06 23:55:05', NULL, ''),
(53, 1, 'Administración Contable', '', '_self', 'voyager-helm', '#000000', NULL, 7, '2022-06-07 00:03:00', '2022-06-07 00:03:00', NULL, ''),
(54, 1, 'Gestón de Regalías', '/regalias', '_self', 'voyager-wallet', '#000000', 53, 2, '2022-08-20 22:39:00', '2022-08-20 22:39:57', NULL, '');

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
(85, 'delete_colaboracion_repertorio', 'colaboracion_repertorio', '2022-03-18 23:07:56', '2022-03-18 23:07:56'),
(86, 'browse_genero', 'genero', '2022-06-06 21:55:02', '2022-06-06 21:55:02'),
(87, 'read_genero', 'genero', '2022-06-06 21:55:02', '2022-06-06 21:55:02'),
(88, 'edit_genero', 'genero', '2022-06-06 21:55:02', '2022-06-06 21:55:02'),
(89, 'add_genero', 'genero', '2022-06-06 21:55:02', '2022-06-06 21:55:02'),
(90, 'delete_genero', 'genero', '2022-06-06 21:55:02', '2022-06-06 21:55:02'),
(91, 'browse_subgenero', 'subgenero', '2022-06-06 21:55:56', '2022-06-06 21:55:56'),
(92, 'read_subgenero', 'subgenero', '2022-06-06 21:55:56', '2022-06-06 21:55:56'),
(93, 'edit_subgenero', 'subgenero', '2022-06-06 21:55:56', '2022-06-06 21:55:56'),
(94, 'add_subgenero', 'subgenero', '2022-06-06 21:55:56', '2022-06-06 21:55:56'),
(95, 'delete_subgenero', 'subgenero', '2022-06-06 21:55:56', '2022-06-06 21:55:56');

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
(16, 3),
(17, 1),
(17, 3),
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
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
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
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1);

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
(17, 'Prismad', 'Music', 'Colombia', 'Bogotá', 'cc', '300357 7830', '3003577830', 1, 'Bogota DC', 'firma/1.png', '/contratos/1.pdf'),
(23, 'Jonathan', 'Susana Collado', 'Dominican Republic', 'Concepción de La Vega', 'cc', '40234501308', '8492203449', 31, 'La Vega Province', 'firma/31.png', '/contratos/31.pdf'),
(36, 'jonathan', 'garzon', 'Colombia', 'Villavicencio', 'cc', '1121940890', '3213860504', 51, 'Meta', 'firma/51.png', '/contratos/51.pdf'),
(37, 'joseph', 'heurtematte', 'El Salvador', NULL, 'cc', '8-856-14', '5062659086', 55, 'Santa Ana Department', 'firma/55.png', '/contratos/55.pdf'),
(38, 'Jorge', 'Vélez', 'Colombia', NULL, 'cc', '94534280', '3112482761', 56, 'Bogotá', 'firma/56.png', '	\r\n/contratos/56.pdf'),
(39, 'Jorge', 'Vélez', 'Colombia', NULL, 'cc', '94534280', '3112482761', 56, 'Bogotá', 'firma/56.png', '/contratos/56.pdf'),
(40, 'MIGUEL', 'HUERTAS', 'Colombia', NULL, 'cc', '1014272451', '3208150897', 57, 'Bogotá', 'firma/57.png', '/contratos/57.pdf'),
(41, 'Pablo', 'Cano', 'Spain', 'Gandesa', 'cc', '47817131Q', '+667289427', 60, 'Catalonia', 'firma/60.png', '/contratos/60.pdf'),
(42, 'Nelson', 'Romero', 'Colombia', 'Bogotá D.C.', 'cc', '80742991', '3125561118', 62, 'Bogotá D.C.', 'firma/62.png', '/contratos/62.pdf'),
(43, 'mey', 'manjarres', 'Colombia', 'Bogotá D.C.', 'cc', '1010165035', '3124835089', 63, 'Bogotá D.C.', 'firma/63.png', '/contratos/63.pdf'),
(44, 'Josue', 'paredes', 'Colombia', 'Bogotá D.C.', 'ce', '21063809', '3112266723', 70, 'Bogotá D.C.', 'firma/70.png', '/contratos/70.pdf'),
(45, 'Carlos', 'Sanchez', 'Ecuador', 'Guayaquil', 'tp', '0930095815', '0980127117', 73, 'Guayas', 'firma/73.png', '/contratos/73.pdf'),
(46, 'Aneglica', 'Rodriguez', 'Colombia', 'Bogotá D.C.', 'cc', '52235260', '3004438405', 74, 'Bogotá D.C.', 'firma/74.png', '/contratos/74.pdf'),
(47, 'Juan David', 'Wittinghan Franco', 'Colombia', 'Bogotá D.C.', 'cc', '1018446891', '3102334422', 76, 'Bogotá D.C.', 'firma/76.png', '/contratos/76.pdf'),
(54, 'alejandro', 'guerra', 'Chile', 'Santiago', 'cc', '255927507', '6976743377', 94, 'Región Metropolitana de Santiago', 'firma/94.png', '/contratos/94.pdf'),
(57, 'Juan Pablo', 'Dávila landinez', 'Colombia', 'Barranquilla', 'cc', '1192765539', '3244493126', 101, 'Atlántico', 'firma/101.png', '/contratos/101.pdf'),
(58, 'Luna', 'Reyes', 'Colombia', 'Villavicencio', 'cc', '1006828097', '3209378772', 102, 'Meta', 'firma/102.png', '/contratos/102.pdf'),
(59, 'Carlos Eduardo', 'Alvarez Peralta', 'Colombia', 'Villavicencio', 'cc', '86077571', '3112961478', 105, 'Meta', 'firma/105.png', '/contratos/105.pdf'),
(60, 'Jhon', 'Ubaque', 'Colombia', 'Villavicencio', 'cc', '86050481', '3164976262', 106, 'Meta', 'firma/106.png', '/contratos/106.pdf'),
(61, 'Éle', 'de la Rem', 'Spain', 'Provincia de Sevilla', 'cc', '714332210', '3468596523', 108, 'Andalusia', 'firma/108.png', '/contratos/108.pdf'),
(62, 'kelly', 'cardenas', 'Colombia', 'Bogotá D.C.', 'cc', '1018423639', '3125315107', 109, 'Bogotá D.C.', 'firma/109.png', '/contratos/109.pdf'),
(63, 'elizabeth', 'giraldo duque', 'Colombia', 'Medellín', 'cc', '21492543', '3165212283', 110, 'Antioquia', 'firma/110.png', '/contratos/110.pdf'),
(64, 'rodolfo', 'udrizard', 'Argentina', 'Paraná', 'cc', '22377115', '3435258671', 115, 'Entre Ríos', 'firma/115.png', '/contratos/115.pdf'),
(65, 'Julio', 'Sencio', 'Peru', 'Lima', 'cc', '75878501', '9137270970', 117, 'Lima', 'firma/117.png', '/contratos/117.pdf'),
(66, 'Abdul', 'Farfán', 'Colombia', 'Bogotá D.C.', 'cc', '17583802', '3103125502', 43, 'Cundinamarca', 'firma/43.png', '/contratos/43.pdf'),
(67, 'Daniel', 'Stornelli Ortiz', 'Colombia', 'Bogotá D.C.', 'cc', '1020782304', '3012054194', 119, 'Bogotá D.C.', 'firma/119.png', '/contratos/119.pdf'),
(68, 'Yane', 'Masi', 'Cambodia', NULL, 'tp', '065571330', '3137090546', 122, 'Svay Rieng', 'firma/122.png', '/contratos/122.pdf'),
(69, 'Seth', 'Covelli', 'United States', 'Rochester', 'ce', '499044851', '5852678494', 124, 'New York', 'firma/124.png', '/contratos/124.pdf'),
(70, 'Seth', 'Covelli', 'United States', 'Rochester', 'ce', '499044851', '5852678494', 124, 'New York', 'firma/124.png', '/contratos/124.pdf'),
(71, 'Franklin', 'Abreu', 'Colombia', 'Bogotá D.C.', 'cc', '14389362', '3132515682', 125, 'Cundinamarca', 'firma/125.png', '/contratos/125.pdf'),
(72, 'Jhon Sebastian', 'Quintero Gonzalez', 'Colombia', 'Medellín', 'cc', '1016039455', '3132440976', 126, 'Antioquia', 'firma/126.png', '/contratos/126.pdf'),
(73, 'Jaissonn Arnoldi', 'Rozo Blanco', 'Colombia', 'Bogotá D.C.', 'cc', '1024472712', '3112296848', 127, 'Bogotá D.C.', 'firma/127.png', '/contratos/127.pdf'),
(74, 'Santiago', 'Bolivar', 'Colombia', 'Bogotá D.C.', 'cc', '1026593252', '7868382936', 128, 'Bogotá D.C.', 'firma/128.png', '/contratos/128.pdf'),
(75, 'Juan David', 'Echeverry', 'Chile', 'San Miguel', 'tp', 'AV60664', '3002189632', 130, 'Región Metropolitana de Santiago', 'firma/130.png', '/contratos/130.pdf'),
(76, 'Jean Carlos', 'Gutierrez', 'Colombia', 'Bogotá D.C.', 'ce', 'CV.18606961', '3144744607', 132, 'Cundinamarca', 'firma/132.png', '/contratos/132.pdf'),
(77, 'Jean Carlos', 'Gutierrez', 'Colombia', 'Bogotá D.C.', 'ce', 'CV.18606961', '3144744607', 132, 'Cundinamarca', 'firma/132.png', '/contratos/132.pdf'),
(78, 'Francis Carolina', 'Nieves Rodríguez', 'Colombia', NULL, 'tp', '105720942', '3213185948', 133, 'Cundinamarca', 'firma/133.png', '/contratos/133.pdf'),
(79, 'Angelica', 'Arango', 'Colombia', 'Bogotá D.C.', 'cc', '1115069546', '3176440747', 135, 'Bogotá D.C.', 'firma/135.png', '/contratos/135.pdf'),
(80, 'YACKO', 'MARQUEZ', 'Colombia', 'Bogotá D.C.', 'cc', '80241191', '3123799721', 136, 'Bogotá D.C.', 'firma/136.png', '/contratos/136.pdf'),
(81, 'Juan', 'Rodríguez', 'Colombia', 'Bogotá D.C.', 'cc', '1099205872', '3246813539', 137, 'Cundinamarca', 'firma/137.png', '/contratos/137.pdf'),
(82, 'Abimael', 'Abimael Herrera', 'United States', NULL, 'cc', '27321604', '0769738810', 139, 'Texas', 'firma/139.png', '/contratos/139.pdf'),
(83, 'Alejo', 'Cruz', 'Colombia', 'Bogotá D.C.', 'cc', '79864485', '3223537186', 141, 'Cundinamarca', 'firma/141.png', '/contratos/141.pdf'),
(84, 'Jeison', 'medina', 'Venezuela', NULL, 'cc', '24112263', '4126761649', 142, 'Barinas', 'firma/142.png', '/contratos/142.pdf'),
(85, 'Maria Paula', 'Hurtado Blanco', 'Colombia', 'Bogotá D.C.', 'cc', '1000572357', '3103852125', 143, 'Bogotá D.C.', 'firma/143.png', '/contratos/143.pdf'),
(86, 'Yeferson', 'Bolivar', 'Venezuela', 'Maracay', 'cc', '22944263', '3132387839', 146, 'Aragua', 'firma/146.png', '/contratos/146.pdf'),
(87, 'Cristian', 'Parra', 'Colombia', NULL, 'cc', '1006823859', '3219710167', 147, 'Meta', 'firma/147.png', '/contratos/147.pdf'),
(88, 'Alejandro', 'Prieto', 'Colombia', 'Bogotá D.C.', 'cc', '1136886082', '9549018022', 148, 'Bogotá D.C.', 'firma/148.png', '/contratos/148.pdf'),
(89, 'Alejandro', 'Prieto', 'Colombia', 'Bogotá D.C.', 'cc', '1136886082', '9549018022', 148, 'Bogotá D.C.', 'firma/148.png', '/contratos/148.pdf'),
(90, 'Javier Iván', 'Varón Bueno', 'Colombia', 'Villavicencio', 'cc', '1121924426', '3192205400', 158, 'Meta', 'firma/158.png', '/contratos/158.pdf');

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
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regalia`
--

INSERT INTO `regalia` (`id`, `cliente_id`, `informe`, `fecha_informe_inicio`, `fecha_informe_final`, `nomina_id`, `valor`) VALUES
(17, 64, '[{\"download_link\":\"regalia\\/August2022\\/LyjssdTtuOeQHxUArIfr.xlsx\",\"original_name\":\"Newfest_62f694.xlsx\"}]', '2019-09-01', '2019-11-30', NULL, 0.819),
(18, 64, '[{\"download_link\":\"regalia\\/August2022\\/IzGrf3jfFQTldbCKh6Ni.xlsx\",\"original_name\":\"Newfest_62f6b4.xlsx\"}]', '2019-12-01', '2020-02-29', NULL, 0.812),
(19, 64, '[{\"download_link\":\"regalia\\/August2022\\/pnfEx5wLQOFC407Fh0mb.xlsx\",\"original_name\":\"Newfest_62f6b5.xlsx\"}]', '2020-03-01', '2020-05-31', NULL, 0.133),
(20, 64, '[{\"download_link\":\"regalia\\/August2022\\/QZQsKvWUT0O5G6z2fJdW.xlsx\",\"original_name\":\"Newfest_62f6b7.xlsx\"}]', '2020-06-01', '2020-08-31', NULL, 5.243),
(21, 64, '[{\"download_link\":\"regalia\\/August2022\\/3dYXBBASw2pcGyIIaCMw.xlsx\",\"original_name\":\"Newfest_62f6b7.xlsx\"}]', '2020-09-01', '2020-11-30', NULL, 7.189),
(22, 64, '[{\"download_link\":\"regalia\\/August2022\\/fLSUDbXbhCKm0Q05JLIv.xlsx\",\"original_name\":\"Newfest_62f6b8.xlsx\"}]', '2020-12-01', '2021-02-28', NULL, 6.356),
(23, 64, '[{\"download_link\":\"regalia\\/August2022\\/RMMBOAsoFv9NAgNohEPq.xlsx\",\"original_name\":\"Newfest_62f6b8.xlsx\"}]', '2021-03-01', '2021-05-31', NULL, 9.373),
(24, 64, '[{\"download_link\":\"regalia\\/August2022\\/fWycyK6LsZW8Kv2I1o07.xlsx\",\"original_name\":\"Newfest_62f6b9.xlsx\"}]', '2021-06-01', '2021-08-31', NULL, 6.048),
(25, 64, '[{\"download_link\":\"regalia\\/August2022\\/Ql1jgMia1k3iCwIthKkX.xlsx\",\"original_name\":\"Newfest_62f768.xlsx\"}]', '2021-09-01', '2021-11-30', NULL, 6.433),
(26, 64, '[{\"download_link\":\"regalia\\/August2022\\/WGC5Us7rd07xBLuuCpYL.xlsx\",\"original_name\":\"Newfest_62f768.xlsx\"}]', '2021-12-01', '2022-02-28', NULL, 6.363),
(27, 64, '[{\"download_link\":\"regalia\\/August2022\\/SoeUfm7PKGF00I2nVGvn.xlsx\",\"original_name\":\"Newfest_62f6b9.xlsx\"}]', '2022-03-01', '2022-05-31', NULL, 6.447),
(28, 64, '[{\"download_link\":\"regalia\\/August2022\\/vxTdRXek3PmDMZON0xiP.xlsx\",\"original_name\":\"Newfest_62f6c8.xlsx\"}]', '2022-06-01', '2022-06-30', NULL, 2.464),
(29, 66, '[{\"download_link\":\"regalia\\/August2022\\/lziGJzuzveqqXiqvSplg.xlsx\",\"original_name\":\"Alejo_Cruz_62f692.xlsx\"}]', '2019-09-01', '2019-11-30', NULL, 1.302),
(30, 66, '[{\"download_link\":\"regalia\\/August2022\\/RF3PkuUVavnlMBcJz7Xe.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b2.xlsx\"}]', '2029-12-01', '2020-02-29', NULL, 0.07),
(31, 66, '[{\"download_link\":\"regalia\\/August2022\\/SNf4tUyg97CHIbNPOir8.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b3.xlsx\"}]', '2020-03-01', '2020-05-31', NULL, 0.035),
(32, 66, '[{\"download_link\":\"regalia\\/August2022\\/0lQUIYJcTP7qVhGDgeGQ.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b5.xlsx\"}]', '2020-06-01', '2020-08-31', NULL, 9.779),
(33, 66, '[{\"download_link\":\"regalia\\/August2022\\/hV8cCsF5uZ5ZHNgbV9c5.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b5.xlsx\"}]', '2020-09-01', '2020-11-30', NULL, 0.567),
(34, 66, '[{\"download_link\":\"regalia\\/August2022\\/yVU4f3DLDcBBlk20Er71.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b6.xlsx\"}]', '2020-12-01', '2021-02-28', NULL, 0.616),
(35, 66, '[{\"download_link\":\"regalia\\/August2022\\/VcWhVlv0pg0ZKg8MUaFj.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b6.xlsx\"}]', '2021-03-01', '2021-05-31', NULL, 4.536),
(36, 66, '[{\"download_link\":\"regalia\\/August2022\\/JpCJNbGciQMFFCie064n.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b7.xlsx\"}]', '2021-06-01', '2021-08-31', NULL, 2.527),
(37, 66, '[{\"download_link\":\"regalia\\/August2022\\/6Sk1kZTIqTp46JedUSDM.xlsx\",\"original_name\":\"Alejo_Cruz_62f767.xlsx\"}]', '2021-09-01', '2021-11-30', NULL, 4.865),
(38, 66, '[{\"download_link\":\"regalia\\/August2022\\/FzZ7KTeGshujNaSXnEsV.xlsx\",\"original_name\":\"Alejo_Cruz_62f766.xlsx\"}]', '2021-12-01', '2022-02-28', NULL, 3.857),
(39, 66, '[{\"download_link\":\"regalia\\/August2022\\/rZ8lpjNK8US4bpz47Rnv.xlsx\",\"original_name\":\"Alejo_Cruz_62f6b7.xlsx\"}]', '2022-03-01', '2022-05-31', NULL, 7.322),
(40, 66, '[{\"download_link\":\"regalia\\/August2022\\/4SBxEkO2dZzejMRaVXTR.xlsx\",\"original_name\":\"Alejo_Cruz_62f6c6.xlsx\"}]', '2022-06-01', '2022-06-30', NULL, 1.946),
(41, 45, '[{\"download_link\":\"regalia\\/August2022\\/YXMOAqezafwrbK4wBgCI.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b2.xlsx\"}]', '2020-03-01', '2020-05-31', NULL, 4.207),
(42, 45, '[{\"download_link\":\"regalia\\/August2022\\/ds05SdSq4gK0f9eDDpVv.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b4.xlsx\"}]', '2020-06-01', '2020-08-31', NULL, 4.375),
(43, 45, '[{\"download_link\":\"regalia\\/August2022\\/fL2oTdNMBAgG6u65umA9.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b4.xlsx\"}]', '2020-09-01', '2020-11-30', NULL, 15.204),
(44, 45, '[{\"download_link\":\"regalia\\/August2022\\/vyvZxA6wSL24f0JDk1kx.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b5.xlsx\"}]', '2020-12-01', '2021-02-28', NULL, 2.66),
(45, 45, '[{\"download_link\":\"regalia\\/August2022\\/mkkW9CyL5AVahZaKJfXJ.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b5.xlsx\"}]', '2021-03-01', '2021-05-31', NULL, 4.361),
(46, 45, '[{\"download_link\":\"regalia\\/August2022\\/naJK28UlLBFBlen49Vs6.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b6.xlsx\"}]', '2021-06-01', '2021-08-31', NULL, 1.813),
(47, 45, '[{\"download_link\":\"regalia\\/August2022\\/nllNZRq6RhLmdvCLi7gL.xlsx\",\"original_name\":\"Kelly_Cardenas_62f766.xlsx\"}]', '2021-09-01', '2021-11-30', NULL, 9.457),
(48, 45, '[{\"download_link\":\"regalia\\/August2022\\/pjQO62y0IGwFWoExVdSE.xlsx\",\"original_name\":\"Kelly_Cardenas_62f765.xlsx\"}]', '2021-12-01', '2022-02-28', NULL, 6.615),
(49, 45, '[{\"download_link\":\"regalia\\/August2022\\/VMVaIXFu61PYa3dPwUD6.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6b6.xlsx\"}]', '2022-03-01', '2020-05-31', NULL, 13.923),
(50, 45, '[{\"download_link\":\"regalia\\/August2022\\/qkveX7KxSTc7mJJNyA0Y.xlsx\",\"original_name\":\"Kelly_Cardenas_62f6c5.xlsx\"}]', '2022-06-01', '2022-06-30', NULL, 37.821),
(51, 41, '[{\"download_link\":\"regalia\\/August2022\\/PcVbPmuUjnI4QygTJxho.xlsx\",\"original_name\":\"Luna_Reyes_62f6b56.xlsx\"}]', '2020-12-01', '2021-02-28', NULL, 2.141),
(52, 41, '[{\"download_link\":\"regalia\\/August2022\\/LQ1RT1yW1eFFWzQLo0gu.xlsx\",\"original_name\":\"Luna_Reyes_62f6b60.xlsx\"}]', '2021-03-01', '2021-05-31', NULL, 3.339),
(53, 41, '[{\"download_link\":\"regalia\\/August2022\\/CEGi64rW4Wy6fChOtIQs.xlsx\",\"original_name\":\"Luna_Reyes_62f6b61.xlsx\"}]', '2021-06-01', '2021-08-31', NULL, 4.333),
(54, 41, '[{\"download_link\":\"regalia\\/August2022\\/i7iPkP7AJNwT7JBdtypP.xlsx\",\"original_name\":\"Luna_Reyes_62f7657.xlsx\"}]', '2021-09-01', '2022-11-30', NULL, 5.173),
(55, 41, '[{\"download_link\":\"regalia\\/August2022\\/GiLcPyG30frpQ9be11bR.xlsx\",\"original_name\":\"Luna_Reyes_62f7658.xlsx\"}]', '2021-12-01', '2022-02-28', NULL, 4.354),
(56, 41, '[{\"download_link\":\"regalia\\/August2022\\/Y8y1TW5G0xPxthOhN1fJ.xlsx\",\"original_name\":\"Luna_Reyes_62f6b55.xlsx\"}]', '2022-03-01', '2022-05-31', NULL, 2.926),
(57, 41, '[{\"download_link\":\"regalia\\/August2022\\/04NfJpInpDoUuDgCoJvb.xlsx\",\"original_name\":\"Luna_Reyes_62f6c53.xlsx\"}]', '2022-06-01', '2022-06-30', NULL, 4.389),
(58, 49, '[{\"download_link\":\"regalia\\/August2022\\/nxmWLLo7aZdrDcngyPIl.xlsx\",\"original_name\":\"Abdul_Farfan_62f7686.xlsx\"}]', '2021-12-01', '2022-02-28', NULL, 2.527),
(59, 49, '[{\"download_link\":\"regalia\\/August2022\\/cutzi2WycjYdXNHJApqc.xlsx\",\"original_name\":\"Abdul_Farfan_62f6b83.xlsx\"}]', '2022-03-01', '2022-05-31', NULL, 2.667),
(60, 49, '[{\"download_link\":\"regalia\\/August2022\\/FOMVJBmP4Ni5YLISJ7c6.xlsx\",\"original_name\":\"Abdul_Farfan_62f6c80.xlsx\"}]', '2022-06-01', '2022-06-30', NULL, 1.008),
(61, 21, '[{\"download_link\":\"regalia\\/August2022\\/aodUlC5aIJydvwWjakLB.xlsx\",\"original_name\":\"Jorge_Velez_Panda_62f6b89.xlsx\"}]', '2022-03-01', '2022-05-31', NULL, 1.309),
(62, 21, '[{\"download_link\":\"regalia\\/August2022\\/A4LswCXzx5zqPnho6hoV.xlsx\",\"original_name\":\"Jorge_Velez_Panda_62f6c86.xlsx\"}]', '2022-06-01', '2022-06-30', NULL, 0.294);

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
  `terminado` tinyint(1) NOT NULL DEFAULT 0,
  `procesado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repertorio`
--

INSERT INTO `repertorio` (`id`, `portada`, `titulo`, `version`, `genero`, `subgenero`, `nombre_sello`, `formato`, `productor`, `copyright`, `annio_produccion`, `upc_ean`, `numero_catalogo`, `fecha_lanzamiento`, `terminado`, `procesado`) VALUES
(26, '1654232551.jpg', 'Bajo el árbol sombrío', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'DH estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(27, '1654233243.jpg', 'Ven y dime', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'DH estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(28, '1654233458.jpg', 'Si tu no estas', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'DH estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(29, '1654233685.jpg', 'Negro Azabache', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'DH estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(30, '1654234175.jpg', 'Sin ti', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'DH estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(31, '1654234658.jpg', 'Mi muchacho coleador', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'Platino Estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(32, '1654311242.jpg', 'Cuando se quiere se puede', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'Platino Estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(33, '1654311583.jpg', 'Hechizante mirada', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'Platino Estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(34, '1654311763.jpg', 'Amalaya', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'Platino Estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(35, '1654312178.jpg', 'Mi sombrero es un diamante', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'DH estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(36, '1654312968.jpg', 'Te salió mal la jugada', NULL, 'Folk', 'Folk', 'Prismad Music', 'SINGLE', 'Platino Estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-06-10', 1, 1),
(37, '1655174690.jpg', 'LUNA Y ESTRELLA', NULL, 'Pop', 'Latin', 'INDEPENDIENTE', 'SINGLE', 'CRISTIAN DIAZ - CARLOS ALVAREZ', 'CARLOS ALVAREZ PERALTA', '2022', NULL, NULL, '2022-06-19', 1, 1),
(41, '1655440016.jpg', 'HASTA VIEJITOS', 'Pop', 'Pop', 'Latin', 'INDEPENDIENTE', 'SINGLE', 'CARLOS ALVAREZ', 'CARLOS ALVAREZ PERALTA', '2019', NULL, NULL, '2022-06-22', 1, 1),
(42, '1655441435.jpg', 'A MI MODO', 'Pop', 'Pop', 'Latin', 'INDEPENDIENTE', 'SINGLE', 'CARLOS ALVAREZ', 'CARLOS ALVAREZ PERALTA', '2020', NULL, NULL, '2022-06-22', 1, 1),
(43, '1655442523.jpg', 'ETERNAMENTE AMADA', 'POP - ROCK', 'Pop', 'Alternative', 'INDEPENDIENTE', 'SINGLE', 'CARLOS ALVAREZ', 'CARLOS ALVAREZ PERALTA', '2010', NULL, NULL, '2022-06-23', 1, 1),
(44, '1659062523.png', 'CUANDO MUERE EL AMOR', 'Original', 'Musica Llanera', 'Folk', 'Abdul Farfán', 'SINGLE', 'Abdul Farfán', 'Abdul Farfán', '2022', NULL, NULL, '2022-08-03', 1, 1),
(45, '1659065911.jpg', 'La Nota', NULL, 'Reggaeton', 'Latin', 'Thiago', 'SINGLE', 'Yan Boss', 'Prismad Music', '2022', NULL, NULL, '2022-08-05', 0, 0),
(46, '1659647077.jpg', 'Mi muchacho coleador', NULL, 'Musica Llanera', 'Folk', 'Prismad Music', 'SINGLE', 'Platino Estudio', 'Luna Reyes', '2022', NULL, NULL, '2022-08-10', 1, 1),
(47, '1660103869.jpg', 'NADA', 'Pop', 'Pop', 'Latin', 'INDEPENDIENTE', 'SINGLE', 'CARLOS ALVAREZ', 'CARLOS ALVAREZ PERALTA', '2022', NULL, NULL, '2022-08-19', 1, 1),
(48, '1660171148.jpg', 'Te Sigo Extrañando', NULL, 'balada pop', 'Pop in Spanish', 'Prismad Music', 'SINGLE', 'Juan Triana', 'Yacko Marquez', '2022', NULL, NULL, '2022-09-16', 1, 1),
(49, NULL, 'COUNT ON ME', NULL, '36', '133', 'prismad music', 'SINGLE', 'DJ NewFest', 'DJ NewFest', '2019', NULL, NULL, NULL, 1, 1),
(50, '1660783379.jpg', 'Recuerdos', NULL, 'fusion tropical', 'Latin', 'SanalejoStudio', 'SINGLE', 'Alejo Cruz', 'Prismad Music', '2022', NULL, NULL, '2022-09-16', 1, 1),
(51, '1660939141.jpg', 'Away From You', NULL, 'Pop', 'Electropop', 'SanalejoStudio', 'SINGLE', 'Danny Castelle', 'Mar Blanco', '2022', NULL, NULL, '2022-09-16', 1, 1),
(52, '1661043067.jpeg', 'Lust', 'Original', 'Electronica', 'Pop', 'Prismadmusic', 'SINGLE', 'Seth Covelli', 'Seth Covelli', '2022', NULL, NULL, '2022-09-20', 1, 1),
(53, '1661823567.jpg', 'Estacion Lunar', 'oficial', 'balada pop', 'Pop', 'independiente', 'SINGLE', 'Anica Rod, Aleja Olarte', 'Angelica Rodriguez', '2022', NULL, '1', '2022-09-11', 0, 0),
(54, '1662343052.jpg', 'sopleteo', 'radio', 'Electronica', 'Afrobeat', 'prismadmusic', 'SINGLE', 'newfest', 'prismadmusic', '2022', 'newfest', NULL, '2022-09-10', 0, 0),
(55, '1662649171.jpg', 'Global Shock - Seth Covelli x King - O', 'Original', 'Hip Hop/Rap', 'Trap', 'Prismad Music', 'SINGLE', 'Seth Covelli', 'Seth Covelli', '2022', NULL, NULL, '2022-09-14', 1, 0);

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
(1, 1, 'PrismadMusic', 'prismadmusic@gmail.com', 'users/February2022/aqHRg7reMK3wpKL0Qftr.jpg', '2022-01-15 21:19:31', '$2y$10$5Ilfxt6ad3cHxqwwnmqYGeLdsofwcdq483/PhvUbrEDgCWq1WMFw2', 'C9UVzqcNEJvkRzBI6RArLGGuAVzcVYvzm1C7Lp9xVa4LHZJx2vzFp9gG1BI5', '{\"locale\":\"es\"}', '2022-01-02 04:43:19', '2022-02-03 22:37:10', 1, NULL),
(30, 2, 'Rodyam Producer', 'mrodyam@gmail.com', 'users/default.png', '2022-03-07 14:38:40', '$2y$10$BUoyQQa3gC1ujJzx4aPH6urxh70KXERF4bJx2d.pvjtE7OultcUbW', NULL, NULL, '2022-03-07 14:37:03', '2022-03-07 14:38:40', 0, NULL),
(31, 2, 'Jay es', 'jonathan_susana@hotmail.com', 'users/default.png', '2022-03-07 15:32:05', '$2y$10$dQZ6ZUtKF0m1i8ydTZMrdeEiQBd5n.Iojf1JDRUecUkQnxaBWzlbe', NULL, NULL, '2022-03-07 15:31:04', '2022-03-07 15:36:07', 1, NULL),
(43, 2, 'Abdul Farfán', 'abdulfd32@gmail.com', 'users/default.png', '2022-03-13 14:46:59', '$2y$10$mT5u3YwOxkBjfCG/R0qzjecXZJkxLIXDn6vIYTa/DbKUe2JkBvkVW', 'AjhZfmXM1vCPQIMUgbq5kSZfT1XPM8AueqPtIm3dMBmaVCa9jD8LLJWLCWZv', '{\"locale\":\"es\"}', '2022-03-13 14:46:16', '2022-07-08 20:47:01', 1, NULL),
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
(62, 2, 'Nelson Romero', 'nelsonromeromusic@gmail.com', 'users/August2022/yFQHPAQXhrcDB4u33Fby.jpg', '2022-03-28 18:12:27', '$2y$10$XE8KmihtzSA0wnlEYX1I.et8PpEZiIvvuFVicHnZmth2cQMgvHUP6', '7IYyEfmi9xsWroaZmV9tFK5g8xgVawgqTjLYAgRutaVisXE8hqbQjTwDiXQl', '{\"locale\":\"es\"}', '2022-03-28 18:09:29', '2022-08-19 15:34:05', 1, NULL),
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
(74, 2, 'anica rod', 'anicarodmusica@gmail.com', 'users/default.png', '2022-04-22 11:13:00', '$2y$10$ciFH.bNjE00doY8jVv0f6OUTlll/X2zYPIsx6dWBMm4pinF0UWWAO', 'Y6BVSVEg8SMNaiPt6DRY1PxQKaXYlbZLjtCcKyBpCtmndUz6byEIAR60AEgm', NULL, '2022-04-22 11:02:39', '2022-09-04 19:29:28', 1, NULL),
(76, 2, 'Witthy', 'witthyguitar@gmail.com', 'users/default.png', '2022-04-26 18:23:12', '$2y$10$cHWWtzKx5zqlS0GwD6KGCeNc/gwsyv0D6U4xuF1cM6FZHLII49Dde', 'je9AEtllK6a0lwOgBcOKGyUCIDYV7r7RIPiqrGdhoyINrZboGBUHkIDMNyIh', NULL, '2022-04-26 18:22:47', '2022-04-26 18:25:04', 1, NULL),
(77, 2, 'Lil', 'Lilcrazyoficial1@gmail.com', 'users/default.png', NULL, '$2y$10$YXbzmnhXh2.JA.cfa19x/e5nO9kEQm8QsNLv3BaZ9f270zpvCoWR.', NULL, NULL, '2022-04-27 11:44:07', '2022-04-27 11:44:07', 0, NULL),
(78, 2, 'Lil', 'Moirg4l@gmail.com', 'users/default.png', '2022-04-27 11:49:54', '$2y$10$bGxn7ZxovVrJjMTMmDMRBu7gqTzAkBM8b0gy0Hb1u6pf0kwWt89d6', NULL, NULL, '2022-04-27 11:47:00', '2022-04-27 11:49:54', 0, NULL),
(82, 2, 'Kikemouse', 'kikemouse@gmail.com', 'users/default.png', '2022-05-04 19:34:16', '$2y$10$S27MIK3qVw2/Cj0wDke8nOLTvMSZWTptz/MLnyXSIs8duYpUmDaRe', NULL, NULL, '2022-05-04 19:33:50', '2022-05-04 19:34:16', 0, NULL),
(83, 2, 'ARIEL A GATO', 'arielalejandrogato@gmail.com', 'users/default.png', '2022-05-06 14:14:04', '$2y$10$kh9Gdxk3N8JPtsDxtn91cuCCzEVNTy4rHK.fBP9AduOovAPkkDaSi', NULL, NULL, '2022-05-06 14:12:25', '2022-05-06 14:14:04', 0, NULL),
(86, 2, 'Felwil', 'felwilleo@gmail.com', 'users/default.png', '2022-05-08 11:59:48', '$2y$10$RKlwxzQDhhXXtjMfPs3Rx.Nwh7uFzivZiOqaN1d7sK3XxB3oAmo/O', NULL, NULL, '2022-05-08 11:59:31', '2022-05-08 11:59:48', 0, NULL),
(87, 2, 'Festo', 'boxjr91@gmail.com', 'users/default.png', '2022-05-11 18:34:37', '$2y$10$wptLgnq.jRzRnqBYPLSyBunKwdrOjDYrnRMefFNkrTF0XbAe2z3rW', 's1UFBcHyNZyt8D5rvR43weHy6pwhFvMwmbyxRvfy8Zzo2vlaie2amfMHvlSN', NULL, '2022-05-11 18:33:36', '2022-05-11 18:34:37', 0, NULL),
(89, 2, 'Eder Gutiérrez', 'edernahum2007@gmail.com', 'users/default.png', '2022-05-16 19:30:43', '$2y$10$32Z7F38xsBQ6ZKdP55aaEup4rHLf5Afnd.k467W9RMkAJ3HR6.JeC', NULL, NULL, '2022-05-16 19:29:15', '2022-05-16 19:30:43', 0, NULL),
(91, 3, 'Llano Music', 'llanomusicoficial@gmail.com', 'users/default.png', '2022-05-17 22:44:30', '$2y$10$hT05vMcNQvUoG8TuX/ANNel.nSnurtsv.am80fYdTV/jxc7sY.Dgy', 'lNGmVnb6Gzg9wH9i43rYNyk9Fj0M8uOij6dXAs9NFSQgRLtGQ5pPfh6N2YC3', '{\"locale\":\"es\"}', '2022-05-17 22:42:27', '2022-05-17 22:44:30', 1, NULL),
(92, 2, 'Serra Tiy', 'tiyserra@gmail.com', 'users/default.png', '2022-05-18 10:36:56', '$2y$10$JcZuArALV/duuVV59IBpjOipqCl56Z3T2dgIpVmMolS6JFX28bMk.', NULL, NULL, '2022-05-18 10:35:17', '2022-05-18 10:36:56', 0, NULL),
(93, 2, 'cristian urquijo', 'somosunomas01@gmail.com', 'users/default.png', '2022-05-20 09:36:45', '$2y$10$pthRzX/tuWtuFmvsScq4Q.J7vXPF.a0CcCpMsYRgnkqWHIh8WDlOa', NULL, NULL, '2022-05-20 09:33:04', '2022-05-20 09:36:45', 0, NULL),
(94, 2, 'warningprod', 'warcontacto@gmail.com', 'users/default.png', '2022-05-25 19:36:47', '$2y$10$0WOXqaRFIg1hv7Evqwztke5dJzt3nq7fvdYHajN5/pPF5.Orx8K8a', NULL, NULL, '2022-05-25 19:36:17', '2022-05-25 19:40:08', 1, NULL),
(99, 2, 'Javier Manchego', 'pildorasparaelcorazonjm@gmail.com', 'users/default.png', NULL, '$2y$10$kZMlU4CnU5Hdwe.HNAmG8u1KZ1jsop3iHSIk533cksSt7CaH/qpP.', NULL, NULL, '2022-05-31 18:14:03', '2022-05-31 18:14:03', 0, NULL),
(101, 2, 'magicjuanpa/', 'juanpa12237@gmail.com', 'users/default.png', '2022-06-01 14:56:22', '$2y$10$fWcokHgCSTHxype4/T/rfeJ/mvcbr.1KhzitsHke3qLU0VVoSObhe', 't3UOj1pLMIFpy4kFZHrBdIZ9STLkEhuTFULL0BWcAtkrit3ApmRkP5yGVHXg', NULL, '2022-06-01 14:55:26', '2022-06-01 14:58:59', 1, NULL),
(102, 2, 'Luna Reyes', 'joropo2014@hotmail.com', 'users/June2022/WVHZQ4Y7qsEwDrecay3V.JPG', '2022-06-01 15:40:24', '$2y$10$u11LaWbiEeIh9z5O/mtqJ.40ia28ujlKj1iVz.i1BrxbdQwfH7Nue', 'DB2O4Py07k3u7CRSKkQX3uZdWYoL84LgqaaYWiVB6AEQ3rS3zEdJcWvnJAdG', '{\"locale\":\"es\"}', '2022-06-01 15:39:06', '2022-06-01 16:17:54', 1, NULL),
(104, 2, 'Alonzo Urbina', 'alonsomusictv@gmail.com', 'users/default.png', '2022-06-08 15:54:19', '$2y$10$rHckqi7UuAfBUmHdbfRMBeFjy51O5Vyuk5aXTM9E3QrVJ3tNCKOs6', NULL, NULL, '2022-06-08 15:49:55', '2022-06-08 15:54:19', 0, NULL),
(105, 2, 'papo', 'cealvarezperalta@hotmail.com', 'users/default.png', '2022-06-13 18:20:34', '$2y$10$MItKHxK9MMHNSt1jY4nw/OMfaVRaNmvSYAcssvewUiyqcuGFJv3kO', 'FuJFp3VoqM1dZH1Mvdv3ABc62ZVSgp7wEj7H5kFiNYeeCeRSW3clUJpNcxEO', NULL, '2022-06-13 18:18:41', '2022-06-13 20:08:50', 1, NULL),
(106, 2, 'Dartagnan', 'dartar5.jhu@gmail.com', 'users/June2022/VRPZKAo9pXoeVH9GIumL.jpeg', '2022-06-16 19:54:48', '$2y$10$d4Q.E0ACNdf/Nl0gojx0xuLNFmhFDmipgJ0ssKxIJXdQ1YDZjHyaG', '10AOHK4SU9jqRxO1pSLpGWqxuBFm4JxqCOlm880iYfHdXBSi2odrAfflf2Qy', '{\"locale\":\"es\"}', '2022-06-16 19:52:05', '2022-06-19 15:09:32', 1, NULL),
(107, 3, 'Javier', 'javoxdaemon@gamil.com', 'users/default.png', NULL, '$2y$10$GqiZjbO2L8UX4D7ygFCO5eCK8AqaGrWZp46GWecBLz8TFVxc3F9x.', NULL, '{\"locale\":\"es\"}', '2022-06-17 12:23:45', '2022-06-17 12:23:45', 0, NULL),
(108, 2, 'Éle de la Rem', 'eledelarem@gmail.com', 'users/default.png', '2022-06-18 16:10:48', '$2y$10$eLkhhlE/P8gKoIhYiw9Y0OHZIAHVe0pu5AbV.Vo0bXUIHS9rNcbju', NULL, NULL, '2022-06-18 16:10:25', '2022-06-18 16:15:29', 1, NULL),
(109, 2, 'Kelly Cardenas', 'infokellycardenas@gmail.com', 'users/default.png', '2022-06-18 19:17:17', '$2y$10$LhpQXA8H9Ue5TONYqRzxxOcho38oBKIzYHHVTFt4aNjtVXAlYKqge', NULL, NULL, '2022-06-18 19:15:10', '2022-06-18 19:20:12', 1, NULL),
(110, 2, 'rei panda', 'jero.quintero12@gmail.com', 'users/default.png', '2022-06-22 00:36:51', '$2y$10$kay3FqneCyX1rFGa1sY8xuEm4sPzz5F9olMbp9VHGdsD.2WX62MnC', NULL, NULL, '2022-06-22 00:36:32', '2022-06-22 00:38:41', 1, NULL),
(111, 2, 'Martin Romero', 'Marto.e.r.r81@gmail.com', 'users/default.png', NULL, '$2y$10$P/Vrr08gUsrxWjLbguVsNuso4KNEz.KwsTuRd3ILgFVhBGEOc8Zxq', NULL, NULL, '2022-06-22 09:50:03', '2022-06-22 09:50:03', 0, NULL),
(112, 2, 'r_oneoficial', 'larrygonzalez2000@gmail.com', 'users/default.png', '2022-06-25 08:51:34', '$2y$10$dJppHJqWNMdKbcoLsW82h.BC6ZYG6ksJjGE7DEsHOYG8chxh1BVMi', NULL, NULL, '2022-06-25 08:50:33', '2022-06-25 08:51:34', 0, NULL),
(113, 2, 'Cris Orbe', 'orbecris@gmail.com', 'users/default.png', NULL, '$2y$10$g2NGzC/W2xFdkcOioRHjLeZYgmXoA7MoVUdT/qB.WRa3ZuE5fDA/q', NULL, NULL, '2022-06-26 16:35:22', '2022-06-26 16:35:22', 0, NULL),
(114, 2, 'Irish B&B', 'elirishok@gmail.com', 'users/default.png', NULL, '$2y$10$g4XZQ3txtPKkaXwsQOTbvuBESYXjzsR88AAzg0YjJZINbCxiQj7b6', NULL, NULL, '2022-06-27 19:17:13', '2022-06-27 19:17:13', 0, NULL),
(115, 2, 'rockdolf', 'rodolfoudrizard@gmail.com', 'users/default.png', '2022-06-30 19:05:44', '$2y$10$U7fAB0.gT.n1H4.ABrmyG.FIuZFRaq4zYjn.443dm/ANFc7e4hEAS', NULL, NULL, '2022-06-30 19:04:42', '2022-06-30 19:08:27', 1, NULL),
(116, 2, 'juan pablo vitali', 'juanpablovitali@gmail.com', 'users/default.png', NULL, '$2y$10$74uZHIPsu/ip8GTY.Vg9v.kdXF5DdGNvgjg/ps4zNY8hqXt21cYK2', 'euODANjHBEqZqC33TpjzAeIKEn9DLjKE1SU2i3n6wcaCp7oZSOnW0hfezhZR', NULL, '2022-07-05 14:07:40', '2022-07-05 14:07:40', 0, NULL),
(117, 2, 'Julio Sencio', 'jhonatansencio06@gmail.com', 'users/default.png', '2022-07-06 23:52:42', '$2y$10$wp33qUefixfP8T01YEbh3.B1cHcrTfMv03pOhJ3k7h5fPXOR.Y366', '8LXas0K2HvOepHUheA9JHNGUeHmmNqdqejo8kNaoBc92xmrgj7F2SrgJC3Q0', NULL, '2022-07-06 23:52:05', '2022-07-07 00:02:51', 1, NULL),
(118, 2, 'José Monsalve', 'Josemonsalveoficial1@gmail.com', 'users/default.png', '2022-07-09 07:20:31', '$2y$10$1Xamxll49IU4.6cnPyPJxu/uhuqGLmfVtgBKEz5XhgaqZzLa2MAAe', NULL, NULL, '2022-07-09 07:17:13', '2022-07-09 07:20:31', 0, NULL),
(119, 2, 'Stornelli', 'stornellioficial@gmail.com', 'users/default.png', '2022-07-09 17:50:29', '$2y$10$b072pjCNyCvlQCh1T5EnneVbENLZkZxUqtWxCo7wZPNHqNjsddhIq', NULL, NULL, '2022-07-09 17:49:58', '2022-07-09 17:52:26', 1, NULL),
(120, 2, 'zuazo', 'zuazoernesto@gmail.com', 'users/default.png', NULL, '$2y$10$eT7k2MxZGDuMuFz3kSA6weYSoIKaiDbqyq2YyjzfAANGQiREEQ.w6', NULL, NULL, '2022-07-10 08:33:40', '2022-07-10 08:33:40', 0, NULL),
(121, 2, 'Luisto', 'luislechon@telefonica.net', 'users/default.png', '2022-07-11 09:41:32', '$2y$10$.gYQJ5XHMKY7VpcFH5jQcuz0rYan41Xa4iDm7klDE4M/LhUVsxI2O', '7jShXi69kiX9xw1B2p9hVFC8miWHSmIX67qhRXEhSErqOoN6qtgacd76RdDv', NULL, '2022-07-11 07:06:53', '2022-07-11 09:41:32', 0, NULL),
(122, 2, 'Yane Masi', 'yanemasi40@gmail.com', 'users/default.png', '2022-07-11 10:49:33', '$2y$10$ibUmTHGenCFBIohSBGBtW.kuKpVaKhkeWzOM9UQ2EFDCdjgEBKp7.', NULL, NULL, '2022-07-11 10:48:25', '2022-07-11 11:24:56', 1, NULL),
(123, 2, 'Lida Beltrán', 'labelrod22@gmail.com', 'users/default.png', '2022-07-12 22:13:50', '$2y$10$GY/0I.aHwjSLviNEofhfbOFw9H/9D2DIMPEf0HHyrW7/t/Z2lXv66', NULL, NULL, '2022-07-12 22:06:02', '2022-07-12 22:13:50', 0, NULL),
(124, 2, 'DJSethMCnight', 'Idmusic2@outlook.com', 'users/default.png', '2022-07-13 14:17:03', '$2y$10$0Y1e9oGRdp8AcZk4sZ42Cu6IQXIaqNTmBwwUnSwyab2bjNarG7jda', '6KCk6CnCifC4rxdng9wtmAqMd0JBZ9ugmoFVSUDea3M45SUBCzCJUqfy8qMw', NULL, '2022-07-13 14:13:42', '2022-07-13 14:22:30', 1, NULL),
(125, 2, 'Franklinabreu', 'franklinmacaco1@gmail.com', 'users/default.png', '2022-07-14 19:12:00', '$2y$10$0RYJGKwRJ9NexcJ0xhsfQuwIw8mKITsdVBuEUW/n.nASWzRtowMNq', 'aq8xd4240cxbN5ZZL1u4NFwia2x0B4pJ9o3000kpfXlFEhcx7OSPmSxRbTR0', NULL, '2022-07-14 19:07:46', '2022-07-14 19:18:57', 1, NULL),
(126, 2, 'tianquintero', 'managertianquintero@gmail.com', 'users/default.png', '2022-07-25 16:59:29', '$2y$10$WBhABrxlOhBubH0O/T11gORkfmnm1p241Ka/ef.MLE.VpDi6Ke.N2', NULL, NULL, '2022-07-25 16:59:07', '2022-07-25 17:03:15', 1, NULL),
(127, 2, 'CANAPIARE', 'canapiareji@gmail.com', 'users/August2022/4SMbjBAj3eXuso8VAEA5.jpg', '2022-07-27 19:13:16', '$2y$10$lWZzsNVsx/ysODPlgIHPY.pU2IJ/gF4HL.ZmDI3i9SdPpYDbPld66', 'GgFbt17cfBsvwlb09J5sEUymQuurDU6CHAbhUBIzSQ8JOd1bTXDbGG1iEZfH', '{\"locale\":\"es\"}', '2022-07-27 19:12:48', '2022-08-27 03:58:29', 1, NULL),
(128, 2, 'Thiago', 'thiagoomusic7@gmail.com', 'users/default.png', '2022-07-27 19:22:43', '$2y$10$m697FgCXiTVx2d7vyap.2.YhBY.Nc2cvSSXmqNL6sdbC9B3IJgUV2', 'qugoThHvST4uzvIlrhAktNNur65jIWuXgKazr7WDcmvB9LrnMj3lOIiEUgGe', NULL, '2022-07-27 19:20:52', '2022-07-28 22:23:31', 1, NULL),
(129, 2, 'Jerrydelllano', 'jhonhenrry.londono@academia.unimeta.edu.co', 'users/default.png', '2022-07-28 16:01:16', '$2y$10$AFW1LpquE0l/8KtALn0Zru.AGChgK7CcROuAOZjkBpioVFEQBaK0O', NULL, NULL, '2022-07-28 16:00:20', '2022-07-28 16:01:16', 0, NULL),
(130, 2, 'Juan David Echeverry', 'juanecheverry93@gmail.com', 'users/default.png', '2022-08-01 23:44:51', '$2y$10$LqcsV3qj8Jut4OCyaGWQue5SKfcf/m3gkdveW9wZsbGNSLRpWhf7.', NULL, NULL, '2022-08-01 23:44:20', '2022-08-01 23:51:29', 1, NULL),
(131, 2, 'goni.cm', 'gonnograp@gmail.com', 'users/default.png', '2022-08-02 18:33:26', '$2y$10$j0z/MEyXhClpaab5BrKlpu7XgQX4yO/UNQe2rYxfdsf07iNQY9bb.', NULL, NULL, '2022-08-02 18:32:48', '2022-08-02 18:33:26', 0, NULL),
(132, 2, 'JeanFord', 'indexinte@gmail.com', 'users/August2022/BM83irRIyCCDv6HmFIHs.png', '2022-08-07 23:24:33', '$2y$10$h3mhgw4lw.R9GJ95zkPFP./nZhDztbFb2wWjZRJ2n0jy39xynLmuq', NULL, '{\"locale\":\"es\"}', '2022-08-07 23:19:59', '2022-08-07 23:40:13', 1, NULL),
(133, 2, 'soyfranciscarolina', 'fcnievesr@gmail.com', 'users/default.png', '2022-08-08 17:37:25', '$2y$10$h1Z5MlUWaIz4A107pF1ooOS7EY9UxN/UEqGsLsdNYhqKk.9Z.N9Ri', NULL, NULL, '2022-08-08 17:34:38', '2022-08-08 18:03:08', 1, NULL),
(134, 2, 'raffyperez', 'raffyperez0389@gmail.com', 'users/default.png', '2022-08-08 21:38:23', '$2y$10$YRjgOC7OgLG7OYyY4ywxlOqL4g5o9GQjCIuvcxTiEK1L0T2.tV4b6', NULL, NULL, '2022-08-08 21:38:06', '2022-08-08 21:38:23', 0, NULL),
(135, 2, 'GELO ARANGO', 'geloarango88@gmail.com', 'users/default.png', '2022-08-10 16:17:58', '$2y$10$1hJGAkfb6q8vA41moRcfrOhvCa6ePK92xHwnWsFxeueSwcJWWr.5q', 'zRsKvRhEHxbqQgWAnRC4YkR2GeKBs6e460QTMsICuq51RJbPBstJibG1T8OP', NULL, '2022-08-10 16:17:29', '2022-08-10 16:21:50', 1, NULL),
(136, 2, 'YACKO MARQUEZ', 'yackomarquez@gmail.com', 'users/default.png', '2022-08-10 16:23:38', '$2y$10$fk1YHl8kK05D5ji7erAvNeWeX5t7/L0ePPZ.C27retQis9byOg80W', 'll8QeMmkLPKS9nioNwoIDjJvwy4NRU6zBuAf1cKLoUz7jjfDLV2rdL1EEg74', NULL, '2022-08-10 16:23:20', '2022-08-10 16:25:26', 1, NULL),
(137, 2, 'Newfest', 'djnewfest2016@hotmail.com', 'users/August2022/iFlVckav7QwViKAhkh8h.jpeg', '2022-08-12 21:19:30', '$2y$10$N6IZEvRNY5lufZbHsWCk3.Y3f2LJC2C4NYkWxyYqZXvIju2Iyn4uW', 't8lX2HlocQHmx2QKPSZFezcXcoxpCP0qF304RVz7lz7ipzhLcR9VJbrjvuZg', '{\"locale\":\"es\"}', '2022-08-12 21:17:46', '2022-08-14 04:18:43', 1, NULL),
(138, 2, 'Aston Maio', 'aston_maio06@hotmail.com', 'users/default.png', '2022-08-13 14:27:58', '$2y$10$KfyXR38WnPPEX42oSUaJ9e3cIo7Nk8nlCPo62ZczArqSTfiIv0u1S', NULL, NULL, '2022-08-13 14:26:09', '2022-08-13 14:27:58', 0, NULL),
(139, 2, 'Abimael Herrera', 'abimaelherrera1394@gmail.com', 'users/default.png', '2022-08-13 16:03:39', '$2y$10$g3H1bV1m.E2BZ/NJhCSxPun46/NywNxZiUBUJKiLdHpkEC/ECptk.', NULL, NULL, '2022-08-13 16:03:09', '2022-08-13 16:24:27', 1, NULL),
(140, 2, 'CHCRIS', 'chcrisofficial@gmail.com', 'users/default.png', '2022-08-13 21:08:19', '$2y$10$HtaGr9KK3Zw4uZ3SToGcF.vc5Hcxn62Gl1dwoM8attJZ0ck7Wx6hO', NULL, NULL, '2022-08-13 21:07:20', '2022-08-13 21:08:19', 0, NULL),
(141, 2, 'Alejo Cruz', 'alejocruzmusic@gmail.com', 'users/August2022/Dfugq1c8588Freq1Fsup.jpg', '2022-08-15 11:06:56', '$2y$10$MAy39keOeYOBgxe9ZB6P.uHXVhHgycxcVaFa2wyx1/UvTvnFsJN.C', 'Ks8PjWwx5GFLqtpcPD7CAfIvMQxdZLHUjJu3udhZzrRM1DT9Hg9r07JrpM2p', '{\"locale\":\"es\"}', '2022-08-15 11:05:07', '2022-08-15 11:09:50', 1, NULL),
(142, 2, 'Jeyson BPM', 'musicjeyson@gmail.com', 'users/default.png', '2022-08-17 17:17:45', '$2y$10$Ha5ScmNGGMPm8uaN/yTLp.xFJqu0lyIot47FZv2lwTD97i51XSd0.', NULL, NULL, '2022-08-17 17:17:19', '2022-08-17 17:20:01', 1, NULL),
(143, 2, 'Mar Blanco', 'marblancomusic@gmail.com', 'users/default.png', '2022-08-19 14:43:56', '$2y$10$QyenWKsawVjEsEZZrVkYmOQIOnUcU8uz/YdWfpbL46jq3zK6ab98G', 'S0JAXTPhLtnVmoRYqUH7rS5Ou67qcMjbNzVyDIScTV8uLGr4MLUC1NaNSTmL', NULL, '2022-08-19 14:42:07', '2022-08-19 14:46:29', 1, NULL),
(144, 2, 'de.rodriguezc@uniandes.edu.co', 'de.rodriguezc@uniandes.edu.co', 'users/default.png', '2022-08-23 18:15:54', '$2y$10$EDk/4OrkuiTGU38l69721.pVa7yxUwEsPbodFt7Hmvzu5DSQBsQWy', 'iFr5oL3ynao6ZoBPeHFZpufnT7wAg8xEsGW7wmWmNTdnWa44M4Tm1ixkuIQR', NULL, '2022-08-19 15:08:05', '2022-08-23 18:15:54', 0, '6ZskbfqH8pY0gUAgSsq6ZsQ7mO3aMYopj6W9Fnqe'),
(145, 2, 'Danny Castelle', 'DannyCastelle@gmail.com', 'users/default.png', '2022-08-19 16:35:08', '$2y$10$MMYVTcvZGBQ7HH/iGZa20.AVlmzdTlENU7VAPlYxKkpe0aWdQtVuW', NULL, NULL, '2022-08-19 16:34:48', '2022-08-19 16:35:08', 0, NULL),
(146, 2, 'Yeferson Bolivar', 'bolivaryeferson7@gmail.com', 'users/August2022/72fT1iOeqb0ErQhZMMsk.jpg', '2022-08-22 19:29:23', '$2y$10$ECdnTll8kYG.y4F.o64KXumlr2HOkUPONJ1nEaAZLbGHNRkR3QMJS', NULL, '{\"locale\":\"es\"}', '2022-08-22 19:28:45', '2022-08-22 19:46:00', 1, NULL),
(147, 2, 'Cristian Parra', 'parracristianmusic@gmail.com', 'users/August2022/TLn0ObT6yycurEYdQDDt.jpeg', '2022-08-22 19:45:29', '$2y$10$S15bc.OtN7OdbKAyztK3MeU9.REyNjlbB5p1gjmWBhfmhJMKZGa86', NULL, '{\"locale\":\"es\"}', '2022-08-22 19:43:42', '2022-08-22 19:50:15', 1, NULL),
(148, 2, 'alejotao', 'alejop.bohorquez@gmail.com', 'users/default.png', '2022-08-24 07:21:35', '$2y$10$4GbZMCkOX3ovkSJQtFIlmeAZsUW91EuDnO3T1sIE5rWWIlUNMCK3a', 'pgnjdPeVmZMj2LQDIp0in8IMemNMENYmBmsx0xQgph3hZixJqhos44DTN4T2', NULL, '2022-08-24 07:20:05', '2022-08-24 07:23:36', 1, NULL),
(149, 2, 'JAVIER MANCHEGO', 'manchego2012@hotmail.com', 'users/default.png', NULL, '$2y$10$9O1rHYaAS2rjf8AmJvT14.XrbaWdePImXI81p3I.FTiYXkPQuBRUG', NULL, NULL, '2022-08-28 15:24:46', '2022-08-28 15:24:46', 0, NULL),
(150, 2, 'Alejandra Olarte', 'Alejandra Olarte', 'users/default.png', NULL, '$2y$10$W3VfvJcoaA4obuQSk6PAM.W0F3qlqTs5ReJyrRNEW4M.IcQrs1ZzG', NULL, NULL, '2022-08-29 21:25:26', '2022-08-29 21:25:26', 0, 'N5jeGrLWnPkXrYV7WUWLvwiDcukie7SyKcutsN7G'),
(151, 2, 'Pepo Mix', 'pepin3376@gmail.com', 'users/default.png', NULL, '$2y$10$2a4OmUmnyVcdIBnj9CxcCehlmiTKHVaer6wUs47pSd76zsIP4DHde', NULL, NULL, '2022-08-31 20:49:25', '2022-08-31 20:49:25', 0, NULL),
(152, 2, 'Jospinap', 'jaison.ospina@gmail.com', 'users/default.png', '2022-09-01 13:21:47', '$2y$10$qlh8DSEiXflQK9encL/DF.I1urdhyPuzbLOd4j6S5ddvTn9IfZvhS', NULL, NULL, '2022-09-01 13:21:13', '2022-09-01 13:21:47', 0, NULL),
(153, 2, 'Juan Antonio Blanco Blanco', 'djskiber@gmail.com', 'users/default.png', '2022-09-04 13:59:56', '$2y$10$HQj4XgA11e3ASc9gNbwP8.HFezsBmHLACInv9nxBFlozansvZIiIG', NULL, NULL, '2022-09-04 13:58:57', '2022-09-04 13:59:56', 0, NULL),
(154, 2, 'Yamile', 'rne212@gmail.com', 'users/default.png', '2022-09-04 21:48:48', '$2y$10$vaQZ.EJGP2iFMOnj78a2tusN/iTicR6xhQBT4UjAJmfD.s5vTGYY.', 'vHaxhlYbpdDESWIbVQJxNYC8Vj77ajme2keBGeovmpVVDGXg42IbsM1Sd5i3', NULL, '2022-09-04 21:48:18', '2022-09-05 21:59:16', 0, NULL),
(155, 2, 'thisiskingo821@gmail.com', 'thisiskingo821@gmail.com', 'users/default.png', NULL, '$2y$10$YVX7S44dGBk8vx7oufi4K.4mkkiy1V7AmAznYKmcukDCyYUw1gIty', NULL, NULL, '2022-09-08 10:07:57', '2022-09-08 10:07:57', 0, '0At4O9wWfLka9AOTODCWNi5ufOtcFOphX732wYL1'),
(156, 2, 'Gder', 'gdermusic@gmail.com', 'users/default.png', NULL, '$2y$10$9bZvRsZNL9VgiiuHXZj0CehUAKBKW0ph7GL.GVp7Td9xtuTErrlGm', NULL, NULL, '2022-09-08 15:49:36', '2022-09-08 15:49:36', 0, NULL),
(157, 2, 'Germany', 'germandariopadillar@gmail.com', 'users/default.png', '2022-09-08 15:52:19', '$2y$10$Y1y4/d7HgmWH9nTqot0HqOsc6NSJgXfbwzubvEhkqhC7COQEjVWXO', NULL, NULL, '2022-09-08 15:51:43', '2022-09-08 15:52:19', 0, NULL),
(158, 2, 'GEM Seeder Developer', 'javoxdaemon@gmail.com', 'users/default.png', '2022-09-09 21:52:22', '$2y$10$imHvjrgYVehVKkIiOSTZyeAcMUWrEsqWvBsWCt5JWJc6exvEZ11Am', NULL, NULL, '2022-09-09 21:50:06', '2022-09-09 21:57:06', 1, NULL);

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
-- Indices de la tabla `historico_canciones`
--
ALTER TABLE `historico_canciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historico_canciones_cancion_id_index` (`cancion_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `colaboracion`
--
ALTER TABLE `colaboracion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `colaboracion_art_feas`
--
ALTER TABLE `colaboracion_art_feas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `colaboracion_repertorio`
--
ALTER TABLE `colaboracion_repertorio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historico_canciones`
--
ALTER TABLE `historico_canciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `repertorio`
--
ALTER TABLE `repertorio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

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
