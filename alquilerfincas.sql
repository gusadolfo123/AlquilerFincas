-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-09-2018 a las 16:28:36
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilerfincas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudads`
--

DROP TABLE IF EXISTS `ciudads`;
CREATE TABLE IF NOT EXISTS `ciudads` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(280) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudads`
--

INSERT INTO `ciudads` (`id`, `descripcion`) VALUES
(1, 'Quindio'),
(2, 'Tolima'),
(3, 'Bolivar'),
(4, 'Quindio'),
(5, 'Cundinamarca'),
(6, 'Magdalena'),
(7, 'Boyaca'),
(8, 'Meta'),
(9, 'Amazonas'),
(10, 'Guajira');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `celular`) VALUES
(1, 'Ratione non ipsa nam fugit ab vel sint.', 'prueba1@hotmail.com', '4290284655'),
(2, 'Placeat culpa aspernatur eos laudantium aut magni.', 'prueba2@hotmail.com', '8502389236'),
(3, 'Voluptatibus et rerum doloremque.', 'prueba3@hotmail.com', '3340728499'),
(4, 'Deleniti quia odit officiis est.', 'prueba4@hotmail.com', '3656914868'),
(5, 'Et aperiam tempore expedita qui earum ducimus.', 'prueba5@hotmail.com', '3415748259'),
(6, 'Porro est eaque fuga ea. Omnis quia nemo esse officia.', 'prueba6@hotmail.com', '4113638058'),
(7, 'Saepe pariatur ratione error est dolores et.', 'prueba7@hotmail.com', '8297258301'),
(8, 'Error ab odio dolor ut nemo.', 'prueba8@hotmail.com', '3566192369'),
(9, 'Nemo vel eveniet molestias qui est.', 'prueba9@hotmail.com', '5791366560'),
(10, 'Vero autem quas nostrum rerum praesentium debitis.', 'prueba10@hotmail.com', '8639352811');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

DROP TABLE IF EXISTS `fincas`;
CREATE TABLE IF NOT EXISTS `fincas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_Tbaja` decimal(8,2) NOT NULL,
  `precio_Talta` decimal(8,2) NOT NULL,
  `direccion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cant_habitaciones` int(11) NOT NULL,
  `cant_banios` int(11) NOT NULL,
  `max_personas` int(11) NOT NULL,
  `sn_jacuzi` tinyint(1) NOT NULL,
  `sn_piscina` tinyint(1) NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `via_id` int(10) UNSIGNED NOT NULL,
  `ciudad_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fincas_slug_unique` (`slug`),
  KEY `fincas_via_id_foreign` (`via_id`),
  KEY `fincas_ciudad_id_foreign` (`ciudad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fincas`
--

INSERT INTO `fincas` (`id`, `nombre`, `descripcion`, `precio_Tbaja`, `precio_Talta`, `direccion`, `cant_habitaciones`, `cant_banios`, `max_personas`, `sn_jacuzi`, `sn_piscina`, `slug`, `via_id`, `ciudad_id`) VALUES
(1, 'quo', 'Exercitationem quos ad ullam est. Voluptas alias exercitationem voluptatum vel praesentium. Officia ea molestiae quas. Ut autem asperiores et placeat libero repellendus nobis. Nihil tenetur atque sed at provident velit est assumenda. Cupiditate repellat totam saepe vel adipisci magnam nulla laudantium. Est sit harum nisi officia quis hic. Soluta aut dolor aliquid fugit vitae. Dicta et laudantium dolorem animi distinctio cum. Voluptatem et est sint iusto dignissimos dicta illum.', '92875.00', '54800.00', 'maxime', 5, 7, 18, 1, 1, 'quo', 2, 5),
(2, 'eveniet', 'Et velit consequatur sed autem. Nisi ut qui et blanditiis inventore. Est aperiam voluptatem eos. Ut eos consequatur ullam ipsum. Enim fuga eum nam et autem iusto est. Ab facilis nihil aperiam velit quasi. Excepturi numquam doloribus unde et. Vitae nihil dolores vel placeat placeat possimus. Doloremque ut magnam officiis quia. Quia possimus rerum qui ex quasi. Deserunt commodi autem minima nihil in. Quam deserunt corrupti numquam eligendi dicta ad maxime. Aut repellendus ad et molestiae.', '92870.00', '61489.00', 'consectetur', 9, 7, 14, 0, 0, 'eveniet', 1, 3),
(3, 'rerum', 'Id iure quos qui ab nulla. Dolores quibusdam est qui sunt aspernatur tenetur eum. Officia eligendi at corporis nulla sequi porro quibusdam. Sunt corrupti ad dolorem odio. Libero quae veniam et nihil iure non. Cumque quia quas consectetur voluptas vitae magni. Nam qui quaerat tempore quam nisi dignissimos in. Aliquam quasi et delectus asperiores neque perspiciatis. Reiciendis quis molestiae libero magnam. Dolore saepe omnis est sit. Molestiae est debitis quia rerum qui.', '80046.00', '54580.00', 'eius', 3, 8, 11, 0, 0, 'rerum', 4, 7),
(4, 'explicabo', 'Qui ut amet voluptatem itaque. Velit est est minima similique molestias iste laboriosam omnis. Esse consequatur sint optio laborum id blanditiis. Dignissimos modi fugit qui. Est minus architecto explicabo quibusdam rerum qui fugiat. Corrupti illo dolorum magnam error aliquid voluptatem quia. Rerum quasi autem odit nisi reiciendis enim voluptatem nostrum. Ut voluptatibus officia doloremque aut corrupti. Accusantium beatae et quibusdam officiis et non. Tenetur rerum illum dolor sed sit qui ullam.', '91527.00', '84886.00', 'adipisci', 4, 9, 14, 0, 0, 'explicabo', 2, 4),
(5, 'quidem', 'Voluptas voluptas dolor dolor est quidem molestias ipsa. Dolores qui quis cum quos praesentium ad. Aperiam amet beatae blanditiis quis impedit. Perspiciatis aut natus occaecati eligendi sint magnam inventore. Debitis culpa quo ea tempore veritatis atque. Illo voluptas cumque est quia vero aut. Quia enim dolore sunt aperiam odit. Distinctio culpa et in nihil laudantium aperiam culpa. Cupiditate numquam fugiat atque exercitationem voluptatum quibusdam et iusto. Vel voluptas non recusandae.', '63836.00', '82877.00', 'iure', 3, 10, 12, 1, 0, 'quidem', 3, 8),
(6, 'aliquid', 'Nesciunt quia aut ut voluptatem. Quo occaecati dolores ea. Odio dolor atque exercitationem rerum aspernatur rerum nihil. Quo laudantium est numquam nam doloribus rerum. Perspiciatis quam aperiam consequuntur eius est totam et libero. Ut praesentium ea qui dicta. Sunt est consequuntur a maiores magnam odio impedit. Ullam mollitia qui est adipisci quibusdam facere nam. Et quibusdam vero quae repellendus et minus qui expedita. Doloremque dignissimos et occaecati deserunt ad doloribus.', '59667.00', '86868.00', 'nam', 2, 4, 11, 1, 1, 'aliquid', 3, 6),
(7, 'blanditiis', 'Quaerat aliquam veritatis ut commodi aut quia. Officiis veniam perspiciatis iste sed asperiores commodi. Inventore provident in aspernatur dolorum et fuga. Repudiandae maiores quo nisi nisi. Accusamus sit odio sapiente ut incidunt unde. Et aut sed natus quam consequatur. Animi aut error ut est. Esse quibusdam voluptates sunt omnis voluptatem omnis rem. Eum qui molestiae praesentium nemo quisquam. Architecto assumenda ipsa dolor animi iste iure odio omnis.', '82556.00', '81133.00', 'ut', 7, 3, 13, 1, 0, 'blanditiis', 4, 3),
(8, 'eum', 'Rerum optio totam voluptatibus non consequatur. Culpa minima reprehenderit harum odit velit ad. Et nobis ut cumque qui fugiat deserunt. Aut incidunt odit in voluptatem molestiae. Voluptatem et est suscipit sunt repellendus. Cum voluptatem facere sapiente et ea. Iste voluptatibus totam perferendis dignissimos voluptas odio.', '79396.00', '65655.00', 'omnis', 7, 9, 19, 0, 0, 'eum', 3, 2),
(9, 'eos', 'Vitae omnis ipsa assumenda cum amet omnis. Est aliquid delectus in veritatis dolorem sit commodi. Itaque voluptatem ullam quia. Illum sunt maxime dolor ut voluptate tenetur rerum. Eum architecto facere doloremque et aut et quae. Adipisci sed fugiat praesentium officiis at hic. Dolorem nulla voluptatibus eligendi consequatur. Minima minima facere molestiae corrupti velit aspernatur non. Modi voluptatibus porro laborum. Eveniet dolorum temporibus et odit non adipisci.', '59598.00', '87667.00', 'molestiae', 3, 10, 20, 0, 0, 'eos', 4, 7),
(10, 'qui', 'Enim soluta sint fugit eos itaque. Voluptatibus voluptas iste non quod molestiae. Nihil perferendis soluta labore reprehenderit esse animi quo. Eveniet ullam cupiditate incidunt minima. Exercitationem assumenda et repudiandae sunt qui sequi nihil dolores. Nam delectus et assumenda quis cumque autem. Cupiditate quae accusantium iusto itaque molestiae accusamus odit. Consequatur consequatur dolorem impedit nam qui. Amet quos quos nisi sint.', '80665.00', '97935.00', 'fugit', 7, 5, 19, 1, 1, 'qui', 4, 1),
(11, 'La Finca 1', 'Descripcion de la Finca 1', '99500.00', '150000.00', 'Cll Falsa 123', 2, 1, 5, 0, 1, 'La-Finca-1', 6, 6),
(12, 'La Finca 2', 'Descripcion de la Finca 2', '99500.00', '150000.00', 'Cll 75 b 123', 6, 2, 10, 0, 1, 'La-Finca-2', 6, 6),
(13, 'La Finca 3', 'Descripcion de la Finca 3', '75900.00', '120000.00', 'Cll 25 a 75 ', 8, 2, 16, 1, 1, 'La-Finca-3', 1, 6),
(14, 'La Finca 4', 'Descripcion de la Finca 4', '28763.00', '189900.00', 'Cll Falsa 8888', 3, 1, 6, 1, 1, 'La-Finca-4', 2, 6),
(15, 'La Finca 5', 'Descripcion de la Finca 5', '60000.00', '145500.00', 'Cll Falsa 7777', 2, 1, 4, 1, 1, 'La-Finca-5', 3, 6),
(16, 'La Finca 6', 'Descripcion de la Finca 6', '55000.00', '120000.00', 'Cll Falsa +9999', 4, 2, 8, 0, 1, 'La-Finca-6', 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_fincas`
--

DROP TABLE IF EXISTS `foto_fincas`;
CREATE TABLE IF NOT EXISTS `foto_fincas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finca_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foto_fincas_finca_id_foreign` (`finca_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `foto_fincas`
--

INSERT INTO `foto_fincas` (`id`, `archivo`, `finca_id`) VALUES
(1, 'https://lorempixel.com/1200/600/?40664', 4),
(2, 'https://lorempixel.com/1200/600/?46124', 9),
(3, 'https://lorempixel.com/1200/600/?76410', 6),
(4, 'https://lorempixel.com/1200/600/?44270', 5),
(5, 'https://lorempixel.com/1200/600/?98368', 3),
(6, 'https://lorempixel.com/1200/600/?12926', 7),
(7, 'https://lorempixel.com/1200/600/?54501', 9),
(8, 'https://lorempixel.com/1200/600/?48173', 5),
(9, 'https://lorempixel.com/1200/600/?90893', 1),
(10, 'https://lorempixel.com/1200/600/?98944', 10),
(11, 'https://lorempixel.com/1200/600/?77127', 7),
(12, 'https://lorempixel.com/1200/600/?37776', 1),
(13, 'https://lorempixel.com/1200/600/?21498', 6),
(14, 'https://lorempixel.com/1200/600/?55390', 7),
(15, 'https://lorempixel.com/1200/600/?86016', 10),
(16, 'https://lorempixel.com/1200/600/?52978', 6),
(17, 'https://lorempixel.com/1200/600/?98603', 2),
(18, 'https://lorempixel.com/1200/600/?63489', 3),
(19, 'https://lorempixel.com/1200/600/?20981', 2),
(20, 'https://lorempixel.com/1200/600/?76196', 2),
(21, 'https://lorempixel.com/1200/600/?92788', 4),
(22, 'https://lorempixel.com/1200/600/?65625', 3),
(23, 'https://lorempixel.com/1200/600/?76835', 1),
(24, 'https://lorempixel.com/1200/600/?75881', 8),
(25, 'https://lorempixel.com/1200/600/?46406', 6),
(26, 'https://lorempixel.com/1200/600/?56133', 9),
(27, 'https://lorempixel.com/1200/600/?61225', 9),
(28, 'https://lorempixel.com/1200/600/?66081', 8),
(29, 'https://lorempixel.com/1200/600/?18529', 4),
(30, 'https://lorempixel.com/1200/600/?79320', 10),
(31, 'https://lorempixel.com/1200/600/?76410', 11),
(32, 'https://lorempixel.com/1200/600/?76410', 12),
(33, 'https://lorempixel.com/1200/600/?76410', 13),
(34, 'https://lorempixel.com/1200/600/?76410', 14),
(35, 'https://lorempixel.com/1200/600/?76410', 15),
(36, 'https://lorempixel.com/1200/600/?76410', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(154, '2014_10_12_000000_create_users_table', 1),
(155, '2014_10_12_100000_create_password_resets_table', 1),
(156, '2018_08_20_011007_create_temporadas_table', 1),
(157, '2018_08_20_011114_create_clientes_table', 1),
(158, '2018_08_20_011808_create_fincas_table', 1),
(159, '2018_08_20_011826_create_foto_fincas_table', 1),
(160, '2018_08_20_011834_create_vias_table', 1),
(161, '2018_08_20_011843_create_reservas_table', 1),
(162, '2018_08_20_013959_create_ciudads_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `finca_id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `fec_Reserva` datetime NOT NULL,
  `fec_Ingreso` datetime NOT NULL,
  `fec_Salida` datetime NOT NULL,
  `preCotizacion` decimal(8,2) NOT NULL,
  `requerimientos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cant_Menores` int(11) NOT NULL,
  `cant_Adultos` int(11) NOT NULL,
  `estado` enum('VERIFICACION','CONFIRMADO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VERIFICACION',
  PRIMARY KEY (`id`),
  KEY `reservas_finca_id_foreign` (`finca_id`),
  KEY `reservas_cliente_id_foreign` (`cliente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `finca_id`, `cliente_id`, `fec_Reserva`, `fec_Ingreso`, `fec_Salida`, `preCotizacion`, `requerimientos`, `cant_Menores`, `cant_Adultos`, `estado`) VALUES
(1, 3, 4, '2018-08-29 13:38:49', '2018-09-02 16:30:13', '2018-09-04 12:41:42', '50000.00', 'Est voluptatibus ab modi et magnam eos aut voluptatem. Officiis cum ab eius est omnis optio magnam. Quis quidem voluptatem ipsa dicta. Facere quo harum ea. Reiciendis labore quae et omnis. Ullam aperiam sit quidem blanditiis saepe voluptates. Vero ab ut impedit inventore eos. Ipsa vero dignissimos dolore nobis et reprehenderit quis. Non magnam similique ducimus nobis illum. Voluptas occaecati cum ipsum laudantium maxime maxime.', 6, 4, 'CONFIRMADO'),
(2, 5, 3, '2018-08-29 13:38:49', '2018-08-29 18:22:07', '2018-09-03 15:14:50', '50000.00', 'Inventore sunt nisi inventore libero. Qui repellendus inventore labore et amet hic eius. Quam sunt aut eum quas et harum. Ducimus iste facilis atque modi provident odit. Magnam voluptatibus fugit odio. Error nemo quod nemo atque voluptas delectus eligendi ipsam. Delectus corporis consequuntur sunt quae. Eum eum velit omnis impedit.', 4, 7, 'CONFIRMADO'),
(3, 4, 6, '2018-08-29 13:38:49', '2018-09-03 03:08:55', '2018-09-04 09:32:20', '50000.00', 'Fuga doloremque repudiandae animi omnis. Rem quia magni tempore. Et laborum suscipit vitae vitae voluptatem beatae omnis. Alias magni voluptas occaecati porro maxime sit. Accusantium ut aperiam qui in impedit voluptatem voluptates. Reprehenderit similique molestias sit officiis maiores totam. Voluptate deleniti autem distinctio culpa provident aut impedit ducimus. Nihil rerum fugit ex illo sint.', 8, 4, 'VERIFICACION'),
(4, 5, 5, '2018-08-29 13:38:49', '2018-08-29 20:09:23', '2018-09-01 11:31:47', '50000.00', 'Qui praesentium et molestiae tempora veritatis a laborum. Qui quis eos eius nihil totam fugit eos. Quaerat placeat esse reprehenderit. Nam illum facere blanditiis. Et voluptatem enim et ipsam. Esse itaque ratione nihil ut et corrupti dolor. Consequatur alias esse voluptas assumenda. Ut qui voluptates quos laudantium. In et ex qui. Vel sint quas adipisci suscipit porro molestias dignissimos. Culpa quis eaque at corrupti.', 4, 4, 'VERIFICACION'),
(5, 10, 6, '2018-08-29 13:38:49', '2018-08-29 23:19:09', '2018-09-01 01:51:20', '50000.00', 'Nihil omnis porro incidunt sunt et. Laborum occaecati iste eaque veritatis nam. Modi ipsum omnis autem excepturi. Fuga rerum repudiandae aut deserunt maxime esse. Doloribus sit quo veniam est et. Eos suscipit autem reprehenderit cum dolore modi autem. Natus corporis tenetur maxime. Mollitia non rem maiores ducimus tempora et sit ut. Recusandae ullam ea qui doloribus rerum aliquid. Quas quam autem a voluptatum eius temporibus.', 2, 5, 'CONFIRMADO'),
(6, 1, 2, '2018-08-29 13:38:49', '2018-09-03 15:33:17', '2018-09-04 04:13:50', '50000.00', 'Aliquid id sint nostrum consequatur quae velit et. Et et deleniti tenetur. Ea aperiam dolores eaque temporibus ut. Labore vel cupiditate non occaecati atque. Sit totam et non ab. Occaecati dolor nam enim dicta. Ut ad et voluptatibus dolorum in possimus. Omnis enim qui inventore praesentium vero velit dicta. Et quasi asperiores doloremque saepe ex deleniti alias deserunt. Nisi amet numquam harum eos fugiat beatae commodi magnam. Soluta dolorem quos qui porro veritatis.', 2, 2, 'CONFIRMADO'),
(7, 8, 9, '2018-08-29 13:38:49', '2018-09-03 11:14:13', '2018-09-04 05:05:32', '50000.00', 'Quia accusantium iusto neque. Voluptas doloremque aut deleniti tempore quo ex asperiores. Et ut natus aut culpa. Hic et consectetur nesciunt eum omnis qui. Exercitationem omnis tenetur est laboriosam non tempore omnis. Corrupti libero consequatur illo omnis eum placeat. Voluptas est et corrupti delectus ut dolorum. Commodi id excepturi ducimus fugiat rerum voluptatum.', 6, 8, 'CONFIRMADO'),
(8, 1, 3, '2018-08-29 13:38:49', '2018-09-03 11:06:13', '2018-09-04 13:02:08', '50000.00', 'Aspernatur est amet iste voluptatem maiores. Ducimus officia illum nam molestias est. In consequatur aliquid sed aut consequuntur rerum. Molestias dolore nam cupiditate sint. Beatae quia iure rerum provident illum illo. Eveniet sequi quis earum. Aliquam beatae cupiditate id amet laboriosam temporibus. Neque iste ut omnis. Aliquam odio id cupiditate porro accusantium.', 4, 4, 'CONFIRMADO'),
(9, 6, 4, '2018-08-29 13:38:49', '2018-08-27 23:36:31', '2018-08-31 23:23:39', '50000.00', 'Sed quia et et eveniet voluptatibus. Officiis aspernatur est est est provident ad. Pariatur voluptatem autem reiciendis expedita voluptas. Molestiae voluptatem sed sapiente. Ut at nihil mollitia aut sit vel. Quia voluptatibus ad sequi optio et earum reiciendis. Voluptatibus dolores fuga dolorem in pariatur vel. Eius ipsum id inventore nemo ad est sit.', 9, 3, 'CONFIRMADO'),
(10, 6, 4, '2018-08-29 13:38:49', '2018-09-02 10:24:57', '2018-09-04 06:21:42', '50000.00', 'Quia nostrum iure dolores mollitia. Voluptatem aspernatur alias totam assumenda culpa. Voluptatem odio consequatur tempore magni quisquam est mollitia. Consectetur quis dolor nemo cupiditate. Ipsam expedita et porro amet accusamus. Fugiat consequatur iure quia. Architecto quis quia fugit dicta dolorum. Ut provident et dolores iure. Aut eveniet distinctio sunt totam qui corrupti quasi.', 5, 8, 'VERIFICACION'),
(11, 6, 10, '2018-08-29 13:38:49', '2018-09-01 10:45:42', '2018-09-01 12:06:33', '50000.00', 'Impedit sit et ea harum suscipit suscipit a. Atque qui velit ducimus saepe accusantium. Aliquam praesentium sint dolorem id. Distinctio aut possimus dolorem aut. Incidunt aut omnis optio. Sit recusandae sed neque voluptatibus cupiditate id. Est qui ipsa soluta ipsum. Accusantium molestiae et alias ea voluptate ut distinctio.', 10, 8, 'CONFIRMADO'),
(12, 9, 4, '2018-08-29 13:38:49', '2018-08-29 10:18:48', '2018-08-31 19:07:42', '50000.00', 'Quia deleniti dignissimos et possimus. Perferendis unde recusandae debitis. Ut nihil vel minus consequatur rem et repellendus et. Qui in repellendus molestiae rerum aut consequatur officia. Magni nihil consequatur ex sint modi maiores. Sunt vel pariatur officia qui amet. Doloribus non asperiores ut laboriosam ut. Cupiditate enim voluptatem fugiat ducimus dolor ea ut et. Magni dolor eos quam quisquam nostrum animi dicta. Accusamus veniam odio aut dolor quam aut.', 3, 4, 'CONFIRMADO'),
(13, 6, 2, '2018-08-29 13:38:49', '2018-09-01 00:31:19', '2018-09-03 02:58:53', '50000.00', 'In vel ad reiciendis sint fuga quidem. Repellendus atque in accusantium sunt ab et. Deserunt animi sequi eum. Accusantium esse reiciendis sapiente laboriosam possimus officiis repellat. Officia vel et fugit nobis et accusamus nobis. Voluptatibus id neque placeat quis. Qui dolores molestias magni. In rem atque libero adipisci. Laboriosam maiores ut et distinctio ipsam. Consequatur quam consectetur est eaque mollitia libero aut. Amet nobis et suscipit reprehenderit eum.', 10, 1, 'VERIFICACION'),
(14, 1, 8, '2018-08-29 13:38:49', '2018-08-28 14:29:21', '2018-09-01 19:27:51', '50000.00', 'Et fuga eum et rem vel iusto deleniti qui. Rerum pariatur minima amet. Labore ratione totam tempora voluptas ut fugiat. Omnis tenetur eius et. Ut qui eum dolore sint. Natus iure ullam ab error. Architecto in expedita aut laboriosam quaerat. In eligendi aut tempore velit qui ut. Incidunt temporibus ducimus vel est et. Assumenda molestiae velit laboriosam sed qui sequi accusamus placeat. Commodi et laboriosam dignissimos.', 9, 4, 'CONFIRMADO'),
(15, 6, 2, '2018-08-29 13:38:49', '2018-09-01 04:34:50', '2018-09-03 15:26:52', '50000.00', 'Beatae dolorem rem nesciunt non omnis. Iure rerum quaerat distinctio sint velit ut voluptatibus. Et mollitia id id placeat sequi eum. Iste est beatae similique iure corrupti maiores ipsa. Eveniet doloribus eum quia tempora consequuntur et quia. Officiis et aliquid nostrum expedita autem accusamus. Sint autem in accusantium. Aut fugit ea porro nemo officia non quibusdam autem. Qui laboriosam aut quo.', 2, 8, 'CONFIRMADO'),
(16, 5, 8, '2018-08-29 13:38:49', '2018-08-28 03:17:16', '2018-09-01 05:45:25', '50000.00', 'Sint voluptatem enim ducimus voluptate architecto et asperiores. Voluptates omnis et molestias et similique corporis consequatur. Pariatur autem sequi sed ea quis ullam. Dignissimos magni animi et optio. Et doloribus illum assumenda esse delectus ea aliquam. Exercitationem illo possimus fugiat et dolorum rerum. Labore laborum sint iste labore. Repellat sapiente illum at veniam. Nobis cum velit eum incidunt cupiditate dolorem recusandae.', 3, 9, 'VERIFICACION'),
(17, 3, 10, '2018-08-29 13:38:49', '2018-08-30 06:06:22', '2018-09-01 17:51:42', '50000.00', 'Fugit minus tempora voluptas quis. Consequuntur qui aspernatur ut fugiat iste. Sint qui eveniet voluptatem aut fugiat nihil. Labore nam nihil natus ut nihil dolor. Sapiente non ut magnam maxime tempore velit. Aut est dolore impedit eveniet architecto maxime. Incidunt et non itaque nam hic voluptatum cupiditate. Dolores quis est quod et exercitationem. Perferendis non veritatis harum aut. Ut praesentium itaque voluptatem. Quod culpa rerum quo omnis veniam iusto.', 3, 3, 'VERIFICACION'),
(18, 2, 8, '2018-08-29 13:38:49', '2018-08-28 10:05:24', '2018-08-30 19:42:54', '50000.00', 'Omnis quasi eius ut amet modi. Accusamus accusantium doloremque maxime id nesciunt velit itaque. Aut eius eum aut culpa fugiat. Dolore qui exercitationem quibusdam corrupti. Est in distinctio dolore expedita voluptatem et tempore. Dolorem rerum est officiis a. Eum et sapiente qui. Qui quis ut officia sit totam aperiam quos. Incidunt eos natus et nostrum voluptas dolorum aliquid dolor. Nulla autem non error quos nihil autem quibusdam. Eius magnam error pariatur qui et.', 1, 9, 'CONFIRMADO'),
(19, 10, 6, '2018-08-29 13:38:49', '2018-09-02 03:24:25', '2018-09-02 04:11:18', '50000.00', 'Iure omnis voluptate nisi laudantium porro ea magnam. Placeat doloremque qui nihil ab velit iste ipsam. Expedita dignissimos pariatur ipsum maiores. Sequi itaque porro omnis aut veritatis sit. Omnis omnis sed sapiente et qui deserunt delectus. Facere illo non est fugit quis aperiam a. Quibusdam quia impedit et est consequatur deleniti. Quis officia consectetur quia.', 1, 1, 'VERIFICACION'),
(20, 7, 5, '2018-08-29 13:38:49', '2018-08-28 15:03:44', '2018-08-29 00:44:58', '50000.00', 'Voluptas alias voluptas consequatur. Sed impedit incidunt est numquam odit non. Porro earum deserunt ut dolor quo facere perferendis suscipit. Quam recusandae nihil et. Libero doloremque qui enim nostrum ab qui. Blanditiis nisi quod ut ad quaerat ullam. Non non in nostrum iure. Corporis reiciendis veritatis quia qui odit voluptatem.', 2, 5, 'CONFIRMADO'),
(21, 6, 6, '2018-08-29 13:38:49', '2018-09-02 02:14:56', '2018-09-02 22:31:03', '50000.00', 'Nihil eos provident sunt qui numquam qui ut omnis. Aperiam eligendi id facilis enim assumenda in eum. Vel ut quaerat aut et. Aut enim qui voluptas magni. Temporibus iste sint sed unde est hic et labore. Tempora sint eaque cum qui. Ipsam voluptatibus modi cupiditate rerum. Iste ullam nulla sit molestiae. Asperiores omnis iure et exercitationem pariatur ipsum. Earum id consequatur eum quae. Sit perspiciatis est earum itaque dicta laboriosam quo.', 10, 1, 'CONFIRMADO'),
(22, 1, 1, '2018-08-29 13:38:49', '2018-09-03 11:31:32', '2018-09-03 11:54:53', '50000.00', 'Qui mollitia iusto exercitationem omnis rerum quod aliquid. In minus vel modi iste fugiat in repellat. Porro nobis nobis molestiae architecto. Minima quae corporis adipisci dicta. Quo alias ut ut qui. Amet expedita ut sequi vitae. Aliquid eligendi quo ad quos perspiciatis sunt. Officia laboriosam architecto et autem. Est est fuga consectetur aut. Atque repellat modi quae voluptatem. Voluptates magni aut magni excepturi minima reprehenderit.', 4, 1, 'CONFIRMADO'),
(23, 6, 9, '2018-08-29 13:38:49', '2018-09-03 11:34:14', '2018-09-03 13:03:47', '50000.00', 'Quibusdam ex vel maxime qui. Dolor velit aut possimus nemo esse autem. Ullam iste sapiente et eveniet vel. Et rerum error quidem laboriosam tenetur nam. Vitae nulla sed porro est. Necessitatibus ab exercitationem cum. Deserunt autem optio temporibus et libero. Enim fugit voluptatem delectus nulla incidunt cum atque consequatur. Quidem dolore provident facere deleniti optio commodi sint rerum. Labore iure odio consequatur consectetur dolor aut et.', 8, 10, 'CONFIRMADO'),
(24, 5, 2, '2018-08-29 13:38:49', '2018-08-27 22:09:41', '2018-08-30 16:15:15', '50000.00', 'Explicabo et itaque voluptatem qui voluptas impedit ea. Praesentium beatae dolores sit omnis repudiandae. Et id error architecto eligendi. Tenetur excepturi libero dolores sed. Omnis ullam consequuntur laboriosam nihil amet. Ea quia eveniet deleniti. Ipsam quam est voluptatem iusto tenetur quia expedita. Tempora atque consequuntur facere voluptatum. Ducimus aliquid totam rem. Ratione et enim laborum labore quis.', 2, 8, 'CONFIRMADO'),
(25, 6, 10, '2018-08-29 13:38:49', '2018-09-01 19:57:13', '2018-09-01 23:35:57', '50000.00', 'Et accusantium odit iste quas eligendi. Itaque aut molestiae aut et eum. Officia voluptate voluptates omnis omnis labore ipsum id. Dolorem nostrum voluptas illum similique. Consequatur aut aspernatur explicabo voluptas qui sed illum. Natus saepe maxime dolor in.', 1, 5, 'CONFIRMADO'),
(26, 9, 2, '2018-08-29 13:38:49', '2018-08-30 21:43:09', '2018-09-01 06:29:16', '50000.00', 'Explicabo fuga vel voluptas officia eveniet aut tempora. Nam repellendus totam cumque. Delectus iste necessitatibus tempore architecto. Omnis neque aliquam fuga unde inventore et eligendi debitis. Fugit eveniet ut consequuntur consequatur. Vitae magni eligendi doloribus nesciunt debitis.', 1, 8, 'VERIFICACION'),
(27, 2, 3, '2018-08-29 13:38:49', '2018-09-02 04:13:18', '2018-09-04 05:43:06', '50000.00', 'Voluptatem temporibus molestiae vitae voluptas sed neque omnis. Error dolor aut vel nemo tempore. Laboriosam at mollitia autem ut consequatur vel repellat labore. Praesentium ad quae earum corrupti qui qui fugit. Sunt sit quos qui non non tenetur consequuntur. Aut incidunt aspernatur temporibus. Et distinctio fuga est aut. Adipisci exercitationem in voluptas iure.', 10, 6, 'CONFIRMADO'),
(28, 5, 4, '2018-08-29 13:38:49', '2018-09-03 19:55:42', '2018-09-03 20:11:24', '50000.00', 'Assumenda quaerat praesentium harum aut blanditiis. Facere exercitationem quas dolorum voluptates ut ut excepturi. Fuga quo voluptatem fugit facere ut. Distinctio aut explicabo facilis deleniti doloremque officia. Iusto iusto aut et tempore doloribus placeat. Id debitis et et corporis doloremque consequatur ut ipsum. Corrupti eum aut ratione nihil optio blanditiis voluptatem. Quo ratione eveniet fugit iure et.', 8, 10, 'CONFIRMADO'),
(29, 9, 5, '2018-08-29 13:38:49', '2018-08-30 21:48:16', '2018-09-04 10:32:05', '50000.00', 'Corporis facilis tempora nam et totam tempora culpa. Quam voluptatibus quisquam labore odit ea ut. Ea dolor distinctio similique ea assumenda beatae. Commodi commodi nesciunt et consequuntur iusto necessitatibus quae. Odio nemo dolore aut praesentium dignissimos neque. Voluptatem ducimus occaecati expedita vel enim commodi voluptatem. Dolor vel maxime aut est ipsa iure consequatur. Molestiae odio at est ipsa id in illum ducimus. Sequi laboriosam itaque nam quaerat. Sed ut nostrum minima.', 10, 6, 'CONFIRMADO'),
(30, 5, 5, '2018-08-29 13:38:49', '2018-09-02 17:18:10', '2018-09-02 20:21:41', '50000.00', 'A omnis ut sit at nulla voluptates animi. Similique facilis aut aut quo. Ea tempore reprehenderit corrupti delectus voluptates tempore pariatur rerum. Expedita ut pariatur vitae voluptate. Delectus sint minus quis blanditiis nihil quis laboriosam. Atque rerum sed voluptas asperiores consectetur distinctio voluptates. Aliquid voluptates vel aspernatur natus quas quidem. Dolorem vel dicta ex enim velit veniam sequi accusantium.', 8, 9, 'CONFIRMADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

DROP TABLE IF EXISTS `temporadas`;
CREATE TABLE IF NOT EXISTS `temporadas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ALTA','MEDIA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ALTA',
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`id`, `descripcion`, `estado`, `fecha`) VALUES
(1, 'Iste dolores sunt.', 'ALTA', '2018-09-25 00:00:00'),
(2, 'Distinctio rerum.', 'ALTA', '2018-09-22 00:00:00'),
(3, 'Explicabo iusto.', 'ALTA', '2018-08-07 00:00:00'),
(4, 'Dicta quo libero.', 'ALTA', '2018-11-17 00:00:00'),
(5, 'Temporibus impedit.', 'ALTA', '2018-10-25 00:00:00'),
(6, 'Explicabo qui aut.', 'ALTA', '2018-09-18 00:00:00'),
(7, 'Sequi quia est.', 'ALTA', '2018-08-03 00:00:00'),
(8, 'Aspernatur.', 'ALTA', '2018-11-15 00:00:00'),
(9, 'Harum nam ut.', 'ALTA', '2018-08-25 00:00:00'),
(10, 'Perferendis sed.', 'ALTA', '2018-11-21 00:00:00'),
(11, 'Deleniti placeat.', 'ALTA', '2018-08-17 00:00:00'),
(12, 'Vel commodi dolor.', 'ALTA', '2018-10-25 00:00:00'),
(13, 'Aut eum et soluta.', 'ALTA', '2018-08-19 00:00:00'),
(14, 'Ut soluta dolore.', 'ALTA', '2018-11-14 00:00:00'),
(15, 'Ut non non.', 'ALTA', '2018-09-03 00:00:00'),
(16, 'Hic aut autem vel.', 'ALTA', '2018-08-01 00:00:00'),
(17, 'Voluptas sequi.', 'ALTA', '2018-09-23 00:00:00'),
(18, 'Nesciunt delectus.', 'ALTA', '2018-12-22 00:00:00'),
(19, 'Quia occaecati.', 'ALTA', '2018-10-03 00:00:00'),
(20, 'Voluptas dolore.', 'ALTA', '2018-11-07 00:00:00'),
(21, 'Rem iure modi.', 'ALTA', '2018-10-18 00:00:00'),
(22, 'Eum amet ut aliquid.', 'ALTA', '2018-10-12 00:00:00'),
(23, 'Reprehenderit fugit.', 'ALTA', '2018-09-07 00:00:00'),
(24, 'Culpa nisi quasi.', 'ALTA', '2018-10-01 00:00:00'),
(25, 'Nihil id nostrum.', 'ALTA', '2018-09-15 00:00:00'),
(26, 'Ea et aliquid.', 'ALTA', '2018-10-28 00:00:00'),
(27, 'Magni sed nemo et.', 'ALTA', '2018-11-19 00:00:00'),
(28, 'Commodi consequatur.', 'ALTA', '2018-08-07 00:00:00'),
(29, 'Sit tempore dolorem.', 'ALTA', '2018-08-16 00:00:00'),
(30, 'Fuga qui rerum non.', 'ALTA', '2018-10-17 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Donnell O\'Conner DDS', 'guiseppe.bahringer@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Sj9fEcl9ir', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(2, 'Prof. Kieran Crona Sr.', 'dooley.estrella@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '3yB9oUl3sd', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(3, 'Maxie Heidenreich', 'baby.berge@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1cAKBrke50', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(4, 'Hertha Rutherford DVM', 'marquardt.charlie@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'eelCur1QDr', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(5, 'Dr. Gavin Willms', 'jackie44@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'iwScvlh7CU', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(6, 'Iva Lind', 'guillermo50@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'cYisXkdAua', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(7, 'Hadley Koss', 'spowlowski@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'qhN82wlaqY', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(8, 'Kattie Franecki', 'kankunding@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'DjFX4Wc7jZ', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(9, 'Florida Moen', 'ines.sipes@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '6gPZL5jEoj', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(10, 'Barrett Schimmel DDS', 'natalia37@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1K1QViwK3M', '2018-08-29 18:38:49', '2018-08-29 18:38:49'),
(11, 'Gusadolfo123', 'Gusadolfo123@hotmail.com', '$2y$10$Ffo4r5QdH.7QNmoWlxUOS.Fcuh0FlxK6b/WlNf5omp/GQzdUTEDcq', NULL, '2018-08-29 18:38:49', '2018-08-29 18:38:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vias`
--

DROP TABLE IF EXISTS `vias`;
CREATE TABLE IF NOT EXISTS `vias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(280) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vias`
--

INSERT INTO `vias` (`id`, `descripcion`) VALUES
(1, 'Bogota - Medellin'),
(2, 'Bogota - Boyaca'),
(3, 'Cali - Cartagena'),
(4, 'Villao - Bogota'),
(5, 'Cota - La Vega'),
(6, 'La Vega - Cota');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
