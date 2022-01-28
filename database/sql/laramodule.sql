-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2022 at 09:14 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laramodule`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int NOT NULL,
  `call_center_id` int DEFAULT NULL,
  `department_id` int NOT NULL,
  `group_id` int DEFAULT NULL,
  `sip_id` int DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `call_center_id`, `department_id`, `group_id`, `sip_id`, `username`, `firstname`, `lastname`, `email`, `password`, `description`, `image`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, 'asetsea', 'asetgsewrtg', 'asedgtser', 'agents@test.com', '$2y$10$rxrJYepDKOMJyJXaWD5j/u5PALBk75.IeGJCT0EXlc78JZo/.aJ7m', 'ryuer5t5', NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laramodule_cachetest@test.com|127.0.0.1', 'i:1;', 1643391951),
('laramodule_cachetest@test.com|127.0.0.1:timer', 'i:1643391951;', 1643391951);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `group_id` int NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` char(32) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `group_id`, `uuid`, `sid`, `username`, `password`, `remember_token`, `firstname`, `lastname`, `email`, `email_verified_at`, `image`, `ip`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, '', '', 'testuser', '$2y$10$wOzruf.ZFDuCesB9Pd1gFOTXwgGlGeM80yrLNTc6MhOfRJ0ik6B0q', NULL, 'Test', 'User', 'user@test.com', NULL, NULL, '127.0.0.1', 0, '2020-05-19 19:33:08', '2020-06-16 07:28:13', NULL),
(3, 0, '', '', 'wer', '$2y$10$ovXShCrEmqQQQqQzj3g4zO6c/hjInuVPnQQslnCddGUIVQAvkTJPK', NULL, 'wetrewt', 'wetwe', 'client@test.com', NULL, NULL, '127.0.0.1', 0, '2020-05-21 09:37:30', '2020-05-21 09:37:30', NULL),
(4, 0, '', '', 'rwtr5w5', '$2y$10$5EgSp.o8RX.GvbpSBYzEpOSZ7dn9ClPvC9d/yUQXztkralpC6Fu0i', NULL, 'swt5we', 'swtwet6', 'clients@test.com', NULL, NULL, '127.0.0.1', 0, '2020-05-21 11:14:21', '2020-05-21 11:14:21', NULL),
(5, 0, '', '', 'rwtr5w53', '$2y$10$FenaZX15h1fbZBJ4MxZ2yeCaxpP17/yd0f3ecF7GLAV/3pi2D61p.', NULL, 'swt5we', 'swtwet6', 'clientss@test.com', NULL, NULL, '127.0.0.1', 0, '2020-05-21 12:38:01', '2020-05-21 12:38:01', NULL),
(6, 0, '', '', 'ttt', '$2y$10$uL0t98cK276Bcg3VLA9PMOj3hlXI9FOWMY8SxUtc3VTTpce5v.0zq', NULL, 'ttt', 'ttt', 'admin@admin.com', NULL, NULL, '127.0.0.1', 0, '2020-05-21 13:49:55', '2020-05-21 13:49:55', NULL),
(8, 0, '', '', 'twetyf', '$2y$10$xfAR3hg1SppHGagTz/Qqt.11eNEY0Ub2VzkkjnXDYE3Fi2h.OjpS.', NULL, 'ewtewtyf', 'eswyeryef', 'users@test.com', '2020-05-22 14:04:21', NULL, '127.0.0.1', 0, '2020-05-22 17:04:01', '2020-06-16 07:28:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_password_reset`
--

CREATE TABLE `customer_password_reset` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint NOT NULL,
  `reserved_at` int DEFAULT NULL,
  `available_at` int NOT NULL,
  `created_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL,
  `directory` varchar(32) NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `locale`, `image`, `directory`, `sort_order`, `status`) VALUES
(1, 'English', 'en-gb', 'en-US,en_US.UTF-8,en_US,en-gb,english', 'en-gb.png', 'en-gb', 1, 1),
(2, 'Ukrainian', 'uk-ua', 'uk-UA,uk_UA,uk_UA.UTF-8,ukrainian', 'uk-ua.png', 'uk-ua', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_08_08_100000_create_telescope_entries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `bottom` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` tinyint NOT NULL DEFAULT '0',
  `column_order` tinyint NOT NULL DEFAULT '0',
  `viewed` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `description`, `keyword`, `top`, `bottom`, `status`, `sort_order`, `column_order`, `viewed`, `created_at`, `updated_at`) VALUES
(1, 'About', 'Hello Summernote', 'about', 1, 1, 1, 1, 1, 0, '2020-05-22 23:04:49', '2020-05-22 23:04:49'),
(2, 'FAQs', 'Hello Summernote', 'faq', 1, 1, 1, 2, 1, 0, '2020-05-22 23:10:06', '2020-05-22 23:10:06'),
(3, 'Privacy Policy', 'Hello Summernote', 'policy', 0, 1, 1, 3, 2, 0, '2020-05-22 23:11:37', '2020-05-22 23:11:37'),
(4, 'Terms & Conditions', 'Hello Summernote', 'terms', 0, 1, 1, 4, 2, 0, '2020-05-22 23:12:29', '2020-05-22 23:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int NOT NULL,
  `code` varchar(32) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text,
  `serialized` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telescope_entries`
--

INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(1, '95774565-86eb-440c-aa9d-1522f0e8556a', '95774565-8a54-40f4-8563-c0bd78820c85', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\/resources\\/views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:19'),
(2, '95774565-89e2-4bd5-89fe-0a1f713af06c', '95774565-8a54-40f4-8563-c0bd78820c85', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\\/telescope\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":[],\"response_status\":404,\"response\":\"HTML Response\",\"duration\":121,\"memory\":6,\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:19'),
(3, '95774575-76c3-4494-96f2-01b6882e57ba', '95774575-7850-4f27-aaf2-14cf79bdcd22', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\/resources\\/views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:29'),
(4, '95774575-77df-4e49-bd12-c2756e306e74', '95774575-7850-4f27-aaf2-14cf79bdcd22', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admuin\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":[],\"response_status\":404,\"response\":\"HTML Response\",\"duration\":94,\"memory\":4,\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:29'),
(5, '9577457e-2d5a-485c-9d53-b03e04997b0a', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'log', '{\"level\":\"info\",\"message\":\"Api Event: created\",\"context\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(6, '9577457e-2e14-4232-a501-cfc5683496d3', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'event', '{\"name\":\"call.before\",\"payload\":[\"created\"],\"listeners\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/EventServiceProvider.php[20:22]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(7, '9577457e-2f04-4bb7-80f2-fde31f93fe73', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.dashboard\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(8, '9577457e-3072-4e74-aebf-3ae531af9109', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(9, '9577457e-30ec-4e17-9e26-537863193f8c', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(10, '9577457e-319c-4347-a395-81f379958823', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(11, '9577457e-327b-425d-882d-07ceafb2eef1', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(12, '9577457e-332a-44d0-8c20-24a5ee89180b', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(13, '9577457e-33b9-4ed2-8d79-c781fb5ddfe9', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(14, '9577457e-34ac-4605-8984-abe20755b835', '9577457e-3568-4f97-853b-1025b7d28a46', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\DashboardController@index\",\"middleware\":[\"web\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[]},\"duration\":105,\"memory\":4,\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:35'),
(15, '95774587-4dbd-4342-93ea-2ed8d115b9d0', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'log', '{\"level\":\"info\",\"message\":\"Api Event: created\",\"context\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(16, '95774587-4e7f-4b8f-a0e9-ac1325dd1aab', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'event', '{\"name\":\"call.before\",\"payload\":[\"created\"],\"listeners\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/EventServiceProvider.php[20:22]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(17, '95774587-4f6e-45af-831f-15235233e624', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.dashboard\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(18, '95774587-5002-4fbd-9583-b75add7ad16f', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(19, '95774587-507d-4e12-9a59-f30d11d94b00', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(20, '95774587-5122-444c-9db4-86e68a5e64de', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(21, '95774587-51f4-46fa-98aa-834eb7496dbc', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(22, '95774587-52aa-4495-9507-2c72caac44eb', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(23, '95774587-5331-4942-8c53-528df1c5f9dc', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(24, '95774587-5424-4fea-9615-4bc09bc689d5', '95774587-54dc-4d9c-8dbf-3bb732bbcae8', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\DashboardController@index\",\"middleware\":[\"web\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[]},\"duration\":103,\"memory\":4,\"hostname\":\"TARDIS\"}', '2022-01-28 18:36:41'),
(25, '957745c4-9d36-48e2-a547-c94449dbec15', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'log', '{\"level\":\"info\",\"message\":\"Api Event: created\",\"context\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(26, '957745c4-9dd7-4a1d-8885-56db891c5888', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'event', '{\"name\":\"call.before\",\"payload\":[\"created\"],\"listeners\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/EventServiceProvider.php[20:22]\",\"queued\":false},{\"name\":\"Barryvdh\\\\Debugbar\\\\DataCollector\\\\EventCollector@onWildcardEvent\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(27, '957745c4-9ef1-4a27-bf69-047d8debd347', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.dashboard\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(28, '957745c4-9f9a-4db8-80ae-198548cb54ac', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(29, '957745c4-a038-4d8b-a446-9747aad32e76', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(30, '957745c4-a0fa-41dd-ada5-c1dc555b2557', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(31, '957745c4-a1f4-4f20-bb35-fcbce1735365', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(32, '957745c4-a2bf-41e6-8186-ee0023ba3f5c', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(33, '957745c4-a377-4d12-ad59-60272704cb19', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(34, '957745c4-bdc6-4b12-8601-b20bc69d1038', '957745c4-bfec-4533-bf85-97f59ea02ada', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\DashboardController@index\",\"middleware\":[\"web\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2,\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[]},\"duration\":230,\"memory\":4,\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:21'),
(35, '957745f9-341c-469a-8a97-28d83bcfa36b', '957745f9-4d28-4fd4-bca4-140f119b4a31', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\/resources\\/views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:56'),
(36, '957745f9-4c99-4bd8-ab38-d528b8e66558', '957745f9-4d28-4fd4-bca4-140f119b4a31', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\\/telescope\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":[],\"response_status\":404,\"response\":\"HTML Response\",\"duration\":219,\"memory\":6,\"hostname\":\"TARDIS\"}', '2022-01-28 18:37:56'),
(37, '95774675-8447-4a56-9d73-ed8d305b313a', '95774675-8664-440e-91f6-75d62cf7d648', NULL, 1, 'command', '{\"command\":\"telescope:install\",\"exit_code\":0,\"arguments\":{\"command\":\"telescope:install\"},\"options\":{\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":null,\"no-interaction\":false,\"env\":null},\"hostname\":\"TARDIS\"}', '2022-01-28 18:39:17'),
(38, '95774680-1873-47b4-a024-ac5d0eb7e4af', '95774680-3132-408d-a47d-c1fb67365636', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\/resources\\/views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:39:24'),
(39, '95774680-3097-41ef-81fd-eab5ec5f354a', '95774680-3132-408d-a47d-c1fb67365636', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\\/telescope\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":[],\"response_status\":404,\"response\":\"HTML Response\",\"duration\":216,\"memory\":6,\"hostname\":\"TARDIS\"}', '2022-01-28 18:39:24'),
(40, '9577471e-1972-4f31-8798-0e08a11bac47', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'log', '{\"level\":\"info\",\"message\":\"Api Event: created\",\"context\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(41, '9577471e-1a2d-4571-8205-cb7b2b0aca03', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'event', '{\"name\":\"call.before\",\"payload\":[\"created\"],\"listeners\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/EventServiceProvider.php[20:22]\",\"queued\":false},{\"name\":\"Barryvdh\\\\Debugbar\\\\DataCollector\\\\EventCollector@onWildcardEvent\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(42, '9577471e-1b3a-4ead-80b2-9eac6fbb101c', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.dashboard\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(43, '9577471e-1bdf-4fcb-95b4-0a3b82ce8f87', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(44, '9577471e-1c75-44c5-9ee8-10766c671b8f', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(45, '9577471e-1d3d-4f7e-9f12-f3ae55de66b9', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(46, '9577471e-1e2d-4a96-bf2b-ab3b57870b31', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(47, '9577471e-1efa-46fe-b357-68a015724932', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(48, '9577471e-1fa3-4681-ac83-173a1521b994', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(49, '9577471e-3874-4ce9-ae84-f43e5c5bf2cc', '9577471e-3a7b-46a5-a951-77b637005648', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\DashboardController@index\",\"middleware\":[\"web\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2,\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[]},\"duration\":260,\"memory\":4,\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:08'),
(50, '95774743-1cf1-4a39-ad2c-42a5003d450a', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `user` where `id` = 2 limit 1\",\"time\":\"1.12\",\"slow\":false,\"file\":\"\\/var\\/www\\/laramodule\\/public\\/index.php\",\"line\":55,\"hash\":\"91985e4371f1ceb14d60f707b8f35c90\",\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:32'),
(51, '95774743-1fa5-47ef-a243-0c43452af5ca', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.system.log\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/system\\/log.blade.php\",\"data\":[\"log\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(52, '95774743-2055-43d5-9842-7db729f77049', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(53, '95774743-2162-402d-afcc-ff52b4af8052', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[\"log\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(54, '95774743-223d-47bd-89f4-54d3ecbdf45f', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[\"log\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(55, '95774743-22ff-4ed0-84ad-4e732c2750fc', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[\"log\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(56, '95774743-23de-438b-9525-1af644310652', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[\"log\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(57, '95774743-2492-421b-b8d4-34fd4192dce6', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[\"log\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32');
INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(58, '95774743-3d90-48eb-9aca-efadf4c74416', '95774743-4001-41b3-804e-ee3ae3260b25', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\\/log\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\System\\\\LogController@index\",\"middleware\":[\"web\",\"auth:admin\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"upgrade-insecure-requests\":\"1\",\"dnt\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"referer\":\"http:\\/\\/laramodule\\/admin\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\\/log\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2,\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/system\\/log.blade.php\",\"data\":{\"log\":\"[2022-01-28 17:19:56] local.ERROR: require(\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Routes\\/web.php): failed to open stream: No such file or directory {\\\"exception\\\":\\\"[object] (ErrorException(code: 0): require(\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Routes\\/web.php): failed to open stream: No such file or directory at \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php:35)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php(35): Illuminate\\\\\\\\Foundation\\\\\\\\Bootstrap\\\\\\\\HandleExceptions->handleError()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php(35): require()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(417): Illuminate\\\\\\\\Routing\\\\\\\\RouteFileRegistrar->register()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(374): Illuminate\\\\\\\\Routing\\\\\\\\Router->loadRoutes()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteRegistrar.php(135): Illuminate\\\\\\\\Routing\\\\\\\\Router->group()\\n#5 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(36): Illuminate\\\\\\\\Routing\\\\\\\\RouteRegistrar->group()\\n#6 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(27): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->mapWebRoutes()\\n#7 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(36): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->map()\\n#8 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::Illuminate\\\\\\\\Container\\\\\\\\{closure}()\\n#9 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(93): Illuminate\\\\\\\\Container\\\\\\\\Util::unwrapIfClosure()\\n#10 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::callBoundMethod()\\n#11 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(596): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::call()\\n#12 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php(87): Illuminate\\\\\\\\Container\\\\\\\\Container->call()\\n#13 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php(36): Illuminate\\\\\\\\Foundation\\\\\\\\Support\\\\\\\\Providers\\\\\\\\RouteServiceProvider->loadRoutes()\\n#14 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(22): Illuminate\\\\\\\\Foundation\\\\\\\\Support\\\\\\\\Providers\\\\\\\\RouteServiceProvider->boot()\\n#15 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(36): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->boot()\\n#16 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::Illuminate\\\\\\\\Container\\\\\\\\{closure}()\\n#17 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(93): Illuminate\\\\\\\\Container\\\\\\\\Util::unwrapIfClosure()\\n#18 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::callBoundMethod()\\n#19 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(596): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::call()\\n#20 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(867): Illuminate\\\\\\\\Container\\\\\\\\Container->call()\\n#21 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(850): Illuminate\\\\\\\\Foundation\\\\\\\\Application->bootProvider()\\n#22 [internal function]: Illuminate\\\\\\\\Foundation\\\\\\\\Application->Illuminate\\\\\\\\Foundation\\\\\\\\{closure}()\\n#23 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(851): array_walk()\\n#24 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Bootstrap\\/BootProviders.php(17): Illuminate\\\\\\\\Foundation\\\\\\\\Application->boot()\\n#25 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(230): Illuminate\\\\\\\\Foundation\\\\\\\\Bootstrap\\\\\\\\BootProviders->bootstrap()\\n#26 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(151): Illuminate\\\\\\\\Foundation\\\\\\\\Application->bootstrapWith()\\n#27 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(135): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->bootstrap()\\n#28 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(109): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->sendRequestThroughRouter()\\n#29 \\/var\\/www\\/laramodule\\/public\\/index.php(55): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->handle()\\n#30 {main}\\n\\\"} \\n[2022-01-28 17:19:56] local.ERROR: require(\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Routes\\/web.php): failed to open stream: No such file or directory {\\\"exception\\\":\\\"[object] (ErrorException(code: 0): require(\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Routes\\/web.php): failed to open stream: No such file or directory at \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php:35)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php(35): Illuminate\\\\\\\\Foundation\\\\\\\\Bootstrap\\\\\\\\HandleExceptions->handleError()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php(35): require()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(417): Illuminate\\\\\\\\Routing\\\\\\\\RouteFileRegistrar->register()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(374): Illuminate\\\\\\\\Routing\\\\\\\\Router->loadRoutes()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteRegistrar.php(135): Illuminate\\\\\\\\Routing\\\\\\\\Router->group()\\n#5 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(36): Illuminate\\\\\\\\Routing\\\\\\\\RouteRegistrar->group()\\n#6 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(27): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->mapWebRoutes()\\n#7 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(36): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->map()\\n#8 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::Illuminate\\\\\\\\Container\\\\\\\\{closure}()\\n#9 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(93): Illuminate\\\\\\\\Container\\\\\\\\Util::unwrapIfClosure()\\n#10 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::callBoundMethod()\\n#11 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(596): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::call()\\n#12 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php(87): Illuminate\\\\\\\\Container\\\\\\\\Container->call()\\n#13 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php(36): Illuminate\\\\\\\\Foundation\\\\\\\\Support\\\\\\\\Providers\\\\\\\\RouteServiceProvider->loadRoutes()\\n#14 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(22): Illuminate\\\\\\\\Foundation\\\\\\\\Support\\\\\\\\Providers\\\\\\\\RouteServiceProvider->boot()\\n#15 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(36): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->boot()\\n#16 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::Illuminate\\\\\\\\Container\\\\\\\\{closure}()\\n#17 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(93): Illuminate\\\\\\\\Container\\\\\\\\Util::unwrapIfClosure()\\n#18 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::callBoundMethod()\\n#19 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(596): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::call()\\n#20 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(867): Illuminate\\\\\\\\Container\\\\\\\\Container->call()\\n#21 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(850): Illuminate\\\\\\\\Foundation\\\\\\\\Application->bootProvider()\\n#22 [internal function]: Illuminate\\\\\\\\Foundation\\\\\\\\Application->Illuminate\\\\\\\\Foundation\\\\\\\\{closure}()\\n#23 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(851): array_walk()\\n#24 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Bootstrap\\/BootProviders.php(17): Illuminate\\\\\\\\Foundation\\\\\\\\Application->boot()\\n#25 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(230): Illuminate\\\\\\\\Foundation\\\\\\\\Bootstrap\\\\\\\\BootProviders->bootstrap()\\n#26 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(151): Illuminate\\\\\\\\Foundation\\\\\\\\Application->bootstrapWith()\\n#27 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(135): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->bootstrap()\\n#28 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(109): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->sendRequestThroughRouter()\\n#29 \\/var\\/www\\/laramodule\\/public\\/index.php(55): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->handle()\\n#30 {main}\\n\\\"} \\n[2022-01-28 17:21:04] local.ERROR: require(\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Routes\\/web.php): failed to open stream: No such file or directory {\\\"exception\\\":\\\"[object] (ErrorException(code: 0): require(\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Routes\\/web.php): failed to open stream: No such file or directory at \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php:35)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php(35): Illuminate\\\\\\\\Foundation\\\\\\\\Bootstrap\\\\\\\\HandleExceptions->handleError()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteFileRegistrar.php(35): require()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(417): Illuminate\\\\\\\\Routing\\\\\\\\RouteFileRegistrar->register()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(374): Illuminate\\\\\\\\Routing\\\\\\\\Router->loadRoutes()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteRegistrar.php(135): Illuminate\\\\\\\\Routing\\\\\\\\Router->group()\\n#5 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(36): Illuminate\\\\\\\\Routing\\\\\\\\RouteRegistrar->group()\\n#6 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(27): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->mapWebRoutes()\\n#7 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(36): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->map()\\n#8 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::Illuminate\\\\\\\\Container\\\\\\\\{closure}()\\n#9 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(93): Illuminate\\\\\\\\Container\\\\\\\\Util::unwrapIfClosure()\\n#10 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::callBoundMethod()\\n#11 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(596): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::call()\\n#12 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php(87): Illuminate\\\\\\\\Container\\\\\\\\Container->call()\\n#13 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php(36): Illuminate\\\\\\\\Foundation\\\\\\\\Support\\\\\\\\Providers\\\\\\\\RouteServiceProvider->loadRoutes()\\n#14 \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/RouteServiceProvider.php(22): Illuminate\\\\\\\\Foundation\\\\\\\\Support\\\\\\\\Providers\\\\\\\\RouteServiceProvider->boot()\\n#15 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(36): Modules\\\\\\\\Admin\\\\\\\\Providers\\\\\\\\RouteServiceProvider->boot()\\n#16 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::Illuminate\\\\\\\\Container\\\\\\\\{closure}()\\n#17 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(93): Illuminate\\\\\\\\Container\\\\\\\\Util::unwrapIfClosure()\\n#18 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php(37): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::callBoundMethod()\\n#19 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(596): Illuminate\\\\\\\\Container\\\\\\\\BoundMethod::call()\\n#20 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(867): Illuminate\\\\\\\\Container\\\\\\\\Container->call()\\n#21 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(850): Illuminate\\\\\\\\Foundation\\\\\\\\Application->bootProvider()\\n#22 [internal function]: Illuminate\\\\\\\\Foundation\\\\\\\\Application->Illuminate\\\\\\\\Foundation\\\\\\\\{closure}()\\n#23 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(851): array_walk()\\n#24 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Bootstrap\\/BootProviders.php(17): Illuminate\\\\\\\\Foundation\\\\\\\\Application->boot()\\n#25 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(230): Illuminate\\\\\\\\Foundation\\\\\\\\Bootstrap\\\\\\\\BootProviders->bootstrap()\\n#26 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(151): Illuminate\\\\\\\\Foundation\\\\\\\\Application->bootstrapWith()\\n#27 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(135): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->bootstrap()\\n#28 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(109): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->sendRequestThroughRouter()\\n#29 \\/var\\/www\\/laramodule\\/public\\/index.php(55): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->handle()\\n#30 {main}\\n\\\"} \\n[2022-01-28 17:25:48] local.INFO: Api Event: created  \\n[2022-01-28 17:26:39] local.ERROR: Target class [Modules\\\\Admin\\\\Controllers\\\\Customer\\\\GroupController] does not exist. {\\\"exception\\\":\\\"[object] (Illuminate\\\\\\\\Contracts\\\\\\\\Container\\\\\\\\BindingResolutionException(code: 0): Target class [Modules\\\\\\\\Admin\\\\\\\\Controllers\\\\\\\\Customer\\\\\\\\GroupController] does not exist. at \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php:811)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(691): Illuminate\\\\\\\\Container\\\\\\\\Container->build()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(796): Illuminate\\\\\\\\Container\\\\\\\\Container->resolve()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(637): Illuminate\\\\\\\\Foundation\\\\\\\\Application->resolve()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(781): Illuminate\\\\\\\\Container\\\\\\\\Container->make()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(253): Illuminate\\\\\\\\Foundation\\\\\\\\Application->make()\\n#5 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(970): Illuminate\\\\\\\\Routing\\\\\\\\Route->getController()\\n#6 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(931): Illuminate\\\\\\\\Routing\\\\\\\\Route->controllerMiddleware()\\n#7 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(702): Illuminate\\\\\\\\Routing\\\\\\\\Route->gatherMiddleware()\\n#8 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(678): Illuminate\\\\\\\\Routing\\\\\\\\Router->gatherRouteMiddleware()\\n#9 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(662): Illuminate\\\\\\\\Routing\\\\\\\\Router->runRouteWithinStack()\\n#10 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(628): Illuminate\\\\\\\\Routing\\\\\\\\Router->runRoute()\\n#11 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(617): Illuminate\\\\\\\\Routing\\\\\\\\Router->dispatchToRoute()\\n#12 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(165): Illuminate\\\\\\\\Routing\\\\\\\\Router->dispatch()\\n#13 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(128): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\{closure}()\\n#14 \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/Middleware\\/InjectDebugbar.php(67): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#15 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Barryvdh\\\\\\\\Debugbar\\\\\\\\Middleware\\\\\\\\InjectDebugbar->handle()\\n#16 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(21): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#17 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\TransformsRequest->handle()\\n#18 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(21): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#19 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\TransformsRequest->handle()\\n#20 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/ValidatePostSize.php(27): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#21 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\ValidatePostSize->handle()\\n#22 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/CheckForMaintenanceMode.php(63): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#23 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\CheckForMaintenanceMode->handle()\\n#24 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(103): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#25 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(140): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->then()\\n#26 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(109): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->sendRequestThroughRouter()\\n#27 \\/var\\/www\\/laramodule\\/public\\/index.php(55): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->handle()\\n#28 {main}\\n\\n[previous exception] [object] (ReflectionException(code: -1): Class Modules\\\\\\\\Admin\\\\\\\\Controllers\\\\\\\\Customer\\\\\\\\GroupController does not exist at \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php:809)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(809): ReflectionClass->__construct()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(691): Illuminate\\\\\\\\Container\\\\\\\\Container->build()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(796): Illuminate\\\\\\\\Container\\\\\\\\Container->resolve()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php(637): Illuminate\\\\\\\\Foundation\\\\\\\\Application->resolve()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php(781): Illuminate\\\\\\\\Container\\\\\\\\Container->make()\\n#5 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(253): Illuminate\\\\\\\\Foundation\\\\\\\\Application->make()\\n#6 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(970): Illuminate\\\\\\\\Routing\\\\\\\\Route->getController()\\n#7 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(931): Illuminate\\\\\\\\Routing\\\\\\\\Route->controllerMiddleware()\\n#8 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(702): Illuminate\\\\\\\\Routing\\\\\\\\Route->gatherMiddleware()\\n#9 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(678): Illuminate\\\\\\\\Routing\\\\\\\\Router->gatherRouteMiddleware()\\n#10 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(662): Illuminate\\\\\\\\Routing\\\\\\\\Router->runRouteWithinStack()\\n#11 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(628): Illuminate\\\\\\\\Routing\\\\\\\\Router->runRoute()\\n#12 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(617): Illuminate\\\\\\\\Routing\\\\\\\\Router->dispatchToRoute()\\n#13 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(165): Illuminate\\\\\\\\Routing\\\\\\\\Router->dispatch()\\n#14 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(128): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\{closure}()\\n#15 \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/Middleware\\/InjectDebugbar.php(67): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#16 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Barryvdh\\\\\\\\Debugbar\\\\\\\\Middleware\\\\\\\\InjectDebugbar->handle()\\n#17 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(21): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#18 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\TransformsRequest->handle()\\n#19 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(21): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#20 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\TransformsRequest->handle()\\n#21 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/ValidatePostSize.php(27): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#22 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\ValidatePostSize->handle()\\n#23 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/CheckForMaintenanceMode.php(63): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#24 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\CheckForMaintenanceMode->handle()\\n#25 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(103): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#26 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(140): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->then()\\n#27 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(109): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->sendRequestThroughRouter()\\n#28 \\/var\\/www\\/laramodule\\/public\\/index.php(55): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->handle()\\n#29 {main}\\n\\\"} \\n[2022-01-28 17:34:07] local.INFO: Api Event: created  \\n[2022-01-28 17:35:34] local.INFO: Api Event: created  \\n[2022-01-28 17:39:32] local.INFO: Api Event: created  \\n[2022-01-28 17:39:45] local.INFO: Api Event: created  \\n[2022-01-28 17:44:07] local.INFO: Api Event: created  \\n[2022-01-28 17:47:37] local.INFO: Api Event: created  \\n[2022-01-28 17:49:33] local.INFO: Api Event: created  \\n[2022-01-28 18:03:20] local.INFO: Api Event: created  \\n[2022-01-28 18:08:44] local.INFO: Api Event: created  \\n[2022-01-28 18:33:45] local.ERROR: There are no commands defined in the \\\"telescope\\\" namespace. {\\\"exception\\\":\\\"[object] (Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Exception\\\\\\\\NamespaceNotFoundException(code: 0): There are no commands defined in the \\\\\\\"telescope\\\\\\\" namespace. at \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php:639)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php(690): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->findNamespace()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php(259): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->find()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php(171): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->doRun()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Console\\/Application.php(93): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->run()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Console\\/Kernel.php(129): Illuminate\\\\\\\\Console\\\\\\\\Application->run()\\n#5 \\/var\\/www\\/laramodule\\/artisan(37): Illuminate\\\\\\\\Foundation\\\\\\\\Console\\\\\\\\Kernel->handle()\\n#6 {main}\\n\\\"} \\n[2022-01-28 18:34:11] local.ERROR: There are no commands defined in the \\\"telescope\\\" namespace. {\\\"exception\\\":\\\"[object] (Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Exception\\\\\\\\NamespaceNotFoundException(code: 0): There are no commands defined in the \\\\\\\"telescope\\\\\\\" namespace. at \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php:639)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php(690): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->findNamespace()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php(259): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->find()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/symfony\\/console\\/Application.php(171): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->doRun()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Console\\/Application.php(93): Symfony\\\\\\\\Component\\\\\\\\Console\\\\\\\\Application->run()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Console\\/Kernel.php(129): Illuminate\\\\\\\\Console\\\\\\\\Application->run()\\n#5 \\/var\\/www\\/laramodule\\/artisan(37): Illuminate\\\\\\\\Foundation\\\\\\\\Console\\\\\\\\Kernel->handle()\\n#6 {main}\\n\\\"} \\n[2022-01-28 18:36:23] local.ERROR: The Telescope assets are not published. Please run: php artisan telescope:publish {\\\"exception\\\":\\\"[object] (RuntimeException(code: 0): The Telescope assets are not published. Please run: php artisan telescope:publish at \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/telescope\\/src\\/Telescope.php:762)\\n[stacktrace]\\n#0 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/telescope\\/src\\/Http\\/Controllers\\/HomeController.php(20): Laravel\\\\\\\\Telescope\\\\\\\\Telescope::assetsAreCurrent()\\n#1 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Controller.php(54): Laravel\\\\\\\\Telescope\\\\\\\\Http\\\\\\\\Controllers\\\\\\\\HomeController->index()\\n#2 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php(45): Illuminate\\\\\\\\Routing\\\\\\\\Controller->callAction()\\n#3 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(239): Illuminate\\\\\\\\Routing\\\\\\\\ControllerDispatcher->dispatch()\\n#4 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Route.php(196): Illuminate\\\\\\\\Routing\\\\\\\\Route->runController()\\n#5 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(685): Illuminate\\\\\\\\Routing\\\\\\\\Route->run()\\n#6 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(128): Illuminate\\\\\\\\Routing\\\\\\\\Router->Illuminate\\\\\\\\Routing\\\\\\\\{closure}()\\n#7 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/telescope\\/src\\/Http\\/Middleware\\/Authorize.php(18): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#8 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Laravel\\\\\\\\Telescope\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\Authorize->handle()\\n#9 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Middleware\\/SubstituteBindings.php(41): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#10 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Routing\\\\\\\\Middleware\\\\\\\\SubstituteBindings->handle()\\n#11 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/View\\/Middleware\\/ShareErrorsFromSession.php(49): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#12 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\View\\\\\\\\Middleware\\\\\\\\ShareErrorsFromSession->handle()\\n#13 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Session\\/Middleware\\/StartSession.php(116): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#14 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Session\\/Middleware\\/StartSession.php(62): Illuminate\\\\\\\\Session\\\\\\\\Middleware\\\\\\\\StartSession->handleStatefulRequest()\\n#15 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Session\\\\\\\\Middleware\\\\\\\\StartSession->handle()\\n#16 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(103): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#17 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(687): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->then()\\n#18 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(662): Illuminate\\\\\\\\Routing\\\\\\\\Router->runRouteWithinStack()\\n#19 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(628): Illuminate\\\\\\\\Routing\\\\\\\\Router->runRoute()\\n#20 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php(617): Illuminate\\\\\\\\Routing\\\\\\\\Router->dispatchToRoute()\\n#21 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(165): Illuminate\\\\\\\\Routing\\\\\\\\Router->dispatch()\\n#22 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(128): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\{closure}()\\n#23 \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/Middleware\\/InjectDebugbar.php(60): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#24 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Barryvdh\\\\\\\\Debugbar\\\\\\\\Middleware\\\\\\\\InjectDebugbar->handle()\\n#25 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(21): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#26 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\TransformsRequest->handle()\\n#27 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/TransformsRequest.php(21): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#28 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\TransformsRequest->handle()\\n#29 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/ValidatePostSize.php(27): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#30 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\ValidatePostSize->handle()\\n#31 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Middleware\\/CheckForMaintenanceMode.php(63): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#32 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(167): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Middleware\\\\\\\\CheckForMaintenanceMode->handle()\\n#33 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Pipeline\\/Pipeline.php(103): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->Illuminate\\\\\\\\Pipeline\\\\\\\\{closure}()\\n#34 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(140): Illuminate\\\\\\\\Pipeline\\\\\\\\Pipeline->then()\\n#35 \\/var\\/www\\/laramodule\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php(109): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->sendRequestThroughRouter()\\n#36 \\/var\\/www\\/laramodule\\/public\\/index.php(55): Illuminate\\\\\\\\Foundation\\\\\\\\Http\\\\\\\\Kernel->handle()\\n#37 {main}\\n\\\"} \\n[2022-01-28 18:36:35] local.INFO: Api Event: created  \\n[2022-01-28 18:36:41] local.INFO: Api Event: created  \\n[2022-01-28 18:37:21] local.INFO: Api Event: created  \\n[2022-01-28 18:41:08] local.INFO: Api Event: created  \\n\"}},\"duration\":230,\"memory\":6,\"hostname\":\"TARDIS\",\"user\":{\"id\":2,\"name\":null,\"email\":\"user@test.com\"}}', '2022-01-28 18:41:32'),
(59, '95774758-382a-4a60-bd5f-670608e929df', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'log', '{\"level\":\"info\",\"message\":\"Api Event: created\",\"context\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(60, '95774758-38d5-4550-a38f-68498b9e884d', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'event', '{\"name\":\"call.before\",\"payload\":[\"created\"],\"listeners\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/EventServiceProvider.php[20:22]\",\"queued\":false},{\"name\":\"Barryvdh\\\\Debugbar\\\\DataCollector\\\\EventCollector@onWildcardEvent\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(61, '95774758-39dd-4b9b-8578-7e25133b6793', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.dashboard\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(62, '95774758-3a7a-4a6d-9370-7298752c623d', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(63, '95774758-3b16-4940-bb36-5a1851f37690', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(64, '95774758-3bdb-4a90-a96d-b2726110d67c', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(65, '95774758-3cc6-4007-b778-d5d1f0e00297', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(66, '95774758-3d90-4a3c-bccc-9588cf4df9bf', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(67, '95774758-3e35-4303-ab1f-b04e16a7d592', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(68, '95774758-56b0-434a-ab9a-2a43c98a9835', '95774758-587e-42f9-98c3-1e515f13a7ca', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\DashboardController@index\",\"middleware\":[\"web\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"upgrade-insecure-requests\":\"1\",\"dnt\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"referer\":\"http:\\/\\/laramodule\\/admin\\/log\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2,\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[]},\"duration\":222,\"memory\":6,\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:46'),
(69, '9577476d-19cf-4f6c-91c6-77608ea68c35', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'log', '{\"level\":\"info\",\"message\":\"Api Event: created\",\"context\":[],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(70, '9577476d-1a7c-4087-99af-2b4ab0e94821', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'event', '{\"name\":\"call.before\",\"payload\":[\"created\"],\"listeners\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Providers\\/EventServiceProvider.php[20:22]\",\"queued\":false},{\"name\":\"Barryvdh\\\\Debugbar\\\\DataCollector\\\\EventCollector@onWildcardEvent\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(71, '9577476d-1b8a-45c2-86a1-905fb18984d0', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.dashboard\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(72, '9577476d-1c2b-42d0-b189-b605b8b1d014', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.common.breadcrumb\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/common\\/breadcrumb.blade.php\",\"data\":[\"slot\",\"title\",\"li_1\",\"li_2\"],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(73, '9577476d-1cc4-402f-9ed6-100e156681d1', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.master\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/master.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59');
INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(74, '9577476d-1d8a-4fde-965b-5ab694538fda', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.topbar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/topbar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(75, '9577476d-1e7d-4fe7-8f88-0fdd971a49ab', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(76, '9577476d-1f47-49e5-acb1-2d04b5db4916', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.footer\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/footer.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(77, '9577476d-1ff2-41b3-a81e-d4cffbb07599', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'view', '{\"name\":\"admin::theme.default.layouts.right-sidebar\",\"path\":\"\\/Modules\\/Admin\\/Views\\/theme\\/default\\/layouts\\/right-sidebar.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/var\\/www\\/laramodule\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59'),
(78, '9577476d-3832-44c3-ba6e-52d804db7fc6', '9577476d-3a3e-44dd-baeb-b3b81c8d98fa', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\Admin\\\\Controllers\\\\DashboardController@index\",\"middleware\":[\"web\"],\"headers\":{\"authorization\":\"\",\"host\":\"laramodule\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"dnt\":\"1\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.99 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"referer\":\"http:\\/\\/laramodule\\/admin\\/log\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,uk;q=0.8\",\"cookie\":\"ZSDEVBAR=%7B7D; ZRayDisable=1; laramodule_session=b3paYQrziCvtRacEibSNDefBOIaWRyFft7BOfrMG\"},\"payload\":[],\"session\":{\"_token\":\"yAlYlHcVlrMDLfVj6vrl6bce5DFnBzcW4yllEVkl\",\"_previous\":{\"url\":\"http:\\/\\/laramodule\\/admin\"},\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":2,\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/var\\/www\\/laramodule\\/Modules\\/Admin\\/Views\\/theme\\/default\\/dashboard.blade.php\",\"data\":[]},\"duration\":243,\"memory\":6,\"hostname\":\"TARDIS\"}', '2022-01-28 18:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telescope_entries_tags`
--

INSERT INTO `telescope_entries_tags` (`entry_uuid`, `tag`) VALUES
('95774743-1fa5-47ef-a243-0c43452af5ca', 'Auth:2'),
('95774743-2055-43d5-9842-7db729f77049', 'Auth:2'),
('95774743-2162-402d-afcc-ff52b4af8052', 'Auth:2'),
('95774743-223d-47bd-89f4-54d3ecbdf45f', 'Auth:2'),
('95774743-22ff-4ed0-84ad-4e732c2750fc', 'Auth:2'),
('95774743-23de-438b-9525-1af644310652', 'Auth:2'),
('95774743-2492-421b-b8d4-34fd4192dce6', 'Auth:2'),
('95774743-3d90-48eb-9aca-efadf4c74416', 'Auth:2');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `group_id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `group_id`, `username`, `password`, `remember_token`, `firstname`, `lastname`, `email`, `email_verified_at`, `image`, `ip`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'testuser', '$2y$10$wOzruf.ZFDuCesB9Pd1gFOTXwgGlGeM80yrLNTc6MhOfRJ0ik6B0q', NULL, 'Test', 'User', 'user@test.com', NULL, NULL, '127.0.0.1', 0, '2020-05-19 19:33:08', '2020-05-20 19:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `permission`) VALUES
(1, 'Administrator', '{\"access\":[\"user\",\"log\",\"page\",\"login\",\"user\",\"log\",\"page\",\"login\"],\"modify\":[\"user\",\"log\",\"page\",\"login\",\"user\",\"log\",\"page\",\"login\"]}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `sip_number_id` (`sip_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer_password_reset`
--
ALTER TABLE `customer_password_reset`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue` (`queue`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`keyword`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
