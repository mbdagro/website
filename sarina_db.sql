-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 02:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarina_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filesize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_by` bigint(20) DEFAULT NULL,
  `status` enum('Active','Inactive','Cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `filename`, `extention`, `filesize`, `location`, `comments`, `file_des`, `order_id`, `user_id`, `order_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '026a4ee34d125ae4f3dbfb3c2ccce53f.png', 'png', '359075', 'attachment/hdiN2NGBZEy5UPXpCPsqsjB8JoykHzByhedxRXCH.png', NULL, 'sdfghjkl;', 20, 1, NULL, 'Active', '2020-06-23 06:05:55', '2020-06-23 06:05:55', NULL),
(2, '026a4ee34d125ae4f3dbfb3c2ccce53f.png', 'png', '359075', 'attachment/mykNq3Vj4nwAVF5T2i2s2xijj3QXatSuW06hw6Un.png', NULL, 'dsfghjkljhg', 21, 1, NULL, 'Active', '2020-06-23 06:12:53', '2020-06-23 06:12:53', NULL),
(3, '223.pdf', 'pdf', '306238', 'attachment/jmb0JYZMBw5TvxGjhGo5ZStKfF09N1yixxUE9AZ4.pdf', NULL, 'dsfghjkljhg', 21, 1, NULL, 'Active', '2020-06-23 06:12:53', '2020-06-23 06:12:53', NULL),
(4, '37205602_1620386501407652_2745506446094368768_o.jpg', 'jpg', '91952', 'attachment/CrPQZjrJncsyUpPmXAtqfTTIIljq9K14ed13WuOV.jpeg', NULL, 'dsfghjkljhg', 21, 1, NULL, 'Active', '2020-06-23 06:12:53', '2020-06-23 06:12:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Digital Print', NULL, 1, '2020-06-20 23:38:02', '2020-06-21 05:58:59', NULL),
(2, 'Offset Print', NULL, 1, '2020-06-21 00:11:38', '2020-06-21 00:44:32', NULL),
(3, 'Gift Item', NULL, 1, '2020-06-21 05:58:16', '2020-06-21 05:59:15', NULL),
(7, 'UV Printing', NULL, 1, '2020-06-21 05:58:27', '2020-06-21 05:58:27', NULL),
(8, 'Packaging', NULL, 1, '2020-06-22 01:07:44', '2020-06-23 02:29:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_u_s`
--

CREATE TABLE `contact_u_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_serivice_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_u_s`
--

INSERT INTO `contact_u_s` (`id`, `full_name`, `phone`, `email`, `address`, `order_details`, `image`, `product_serivice_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-06-22 03:50:25', '2020-06-22 03:50:25', NULL),
(2, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-06-22 03:51:41', '2020-06-22 03:51:41', NULL),
(3, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', 'sfsrgdtxhfcygvuhbinjokmp', NULL, NULL, '2020-06-22 03:53:33', '2020-06-22 03:53:33', NULL),
(4, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', 'sfsrgdtxhfcygvuhbinjokmp', NULL, NULL, '2020-06-22 03:57:12', '2020-06-22 03:57:12', NULL),
(5, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', 'sfsrgdtxhfcygvuhbinjokmp', NULL, NULL, '2020-06-22 03:58:16', '2020-06-22 03:58:16', NULL),
(6, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', 'sfsrgdtxhfcygvuhbinjokmp', NULL, NULL, '2020-06-22 03:59:02', '2020-06-22 03:59:02', NULL),
(7, 'dfghjvgcfxd', '005202002', NULL, 'Dhaka,Bangladesh', 'sfsrgdtxhfcygvuhbinjokmp', NULL, NULL, '2020-06-22 03:59:45', '2020-06-22 03:59:45', NULL),
(8, 'Mozammel', '01643235533', NULL, 'Dhaka,Bangladesh', 'Off Page Cutting', NULL, NULL, '2020-06-22 04:00:58', '2020-06-22 04:00:58', NULL),
(9, 'Mozammel', '005202002', NULL, 'Dhaka,Bangladesh', 'Off Cutting Page', 'contact_us_image/159282022537205602_1620386501407652_2745506446094368768_o.jpg', NULL, '2020-06-22 04:03:45', '2020-06-22 04:03:45', NULL),
(10, 'Mozammel', '01844509794', NULL, 'sdfxgchjbknlm;', 'ewrdgtfyjhbklnfdghjbknlmkjh', NULL, NULL, '2020-06-22 04:15:09', '2020-06-22 04:15:09', NULL),
(11, 'ssssssssssssssssss', 'ssssssssssss', NULL, NULL, NULL, NULL, NULL, '2020-06-22 05:08:58', '2020-06-22 05:08:58', NULL),
(12, 'ssss', 'sssss', NULL, 'sssss', NULL, NULL, NULL, '2020-06-22 05:15:43', '2020-06-22 05:15:43', NULL),
(13, 'ddd', '01643235533', NULL, 'sdzfz', 'dfzd', NULL, NULL, '2020-06-22 05:17:24', '2020-06-22 05:17:24', NULL),
(14, 'sadsea', '01643235533', NULL, 'aesrfdgth', 'arefgstfhdyg', NULL, NULL, '2020-06-22 05:18:13', '2020-06-22 05:18:13', NULL),
(15, 'Mozammel', '01844509794', NULL, 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-06-22 05:19:44', '2020-06-22 05:19:44', NULL),
(16, 'Mozammel', '01844509794', NULL, 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-06-22 05:20:36', '2020-06-22 05:20:36', NULL),
(17, 'Mozammel', '01643235888', NULL, 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-06-22 05:22:46', '2020-06-22 05:22:46', NULL),
(18, 'Mozammel', '01844509794', NULL, 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-06-22 05:24:09', '2020-06-22 05:24:09', NULL),
(19, 'Mozammels', '01643235888', NULL, 'sdfxgchjbknlm;', NULL, NULL, 12, '2020-06-22 05:38:29', '2020-06-22 05:38:29', NULL),
(20, 'fgdghfgxd', '01643235536', NULL, 'dfgdhnfds', 'szfgdhfn', NULL, 11, '2020-06-22 06:20:27', '2020-06-22 06:20:27', NULL),
(21, 'Nazmul', '01776912858', NULL, 'Dhaka,Bangladesh', NULL, NULL, 8, '2020-07-01 06:05:19', '2020-07-01 06:05:19', NULL),
(22, 'dfghjvgcfxd', '01844509794', 'demo@demo.com', 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-07-01 06:42:50', '2020-07-01 06:42:50', NULL),
(23, 'Mozammel', '01844509794', 'admin@admin.com', 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-07-01 06:45:20', '2020-07-01 06:45:20', NULL),
(24, 'Nazmul', '01844509794', 'branch@admin.com', '72,No Mostafiz Center,Fatulllah,Narayangong', NULL, NULL, NULL, '2020-07-01 06:45:49', '2020-07-01 06:45:49', NULL),
(25, 'Mozammel', '01844509794', 'admin@admin.com', 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-07-01 06:48:00', '2020-07-01 06:48:00', NULL),
(26, 'Mozammel', '01844509794', 'admin@admin.com', 'Dhaka,Bangladesh', NULL, NULL, NULL, '2020-07-01 06:52:43', '2020-07-01 06:52:43', NULL),
(27, 'dfghjvgcfxd', '01643235533', 'md.mamun6128@gmail.com', '72,No Mostafiz Center,Fatulllah,Narayangong', NULL, NULL, NULL, '2020-07-01 06:54:53', '2020-07-01 06:54:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('gallary','slider') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `category_id`, `name`, `title`, `sort_des`, `long_des`, `image`, `type`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'test', 'Title', 'ddddddddddddddd', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'gallary_image/159274271044652783_1017911011712262_5391012726254338048_o.jpg', 'slider', 1, '2020-03-15 09:11:04', '2020-06-21 06:31:50', NULL),
(2, 7, 'New Item two', 'Standard Bank Ltd', 'Hello', 'sssssssssssssssfadsgdf', 'gallary_image/159274269644621104_1017911038378926_57893010939052032_o.jpg', 'slider', 1, '2020-06-20 04:05:58', '2020-07-11 23:29:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_managements`
--

CREATE TABLE `home_managements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_vedio_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_managements`
--

INSERT INTO `home_managements` (`id`, `logo`, `background_image`, `company_name`, `slogan`, `address`, `welcome_title`, `welcome_description`, `welcome_image`, `email`, `contact_no`, `youtube_vedio_url`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'home_image/159265508141L3WqxHOpL._AC_.jpg', 'home_image/15927217421584341180slide01.jpg', 'Design Touch', 'Your Printing Partner', 'Shahabag, Dhaka', 'Colorway is the leader in defferent format printing', 'With over 30 years of experience, we specialize in variety of high quality services.', 'home_image/15927217421584175854about.png', 'admin@admin.com', '01522222222', 'https://www.youtube.com/watch?v=hMy5za-m5Ew', 1, '2020-03-14 18:00:00', '2020-06-22 06:43:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_20_124925_create_permission_tables', 1),
(4, '2020_01_21_112634_create_orders_table', 1),
(6, '2020_03_14_064825_create_home_managements_table', 1),
(7, '2020_03_14_115230_create_gallaries_table', 1),
(8, '2020_03_14_115307_create_contents_table', 1),
(9, '2020_06_21_045631_create_categories_table', 2),
(12, '2020_06_21_050159_create_product_services_table', 3),
(13, '2020_06_21_050033_create_news_events_table', 4),
(14, '2020_06_21_135743_create_sub_categories_table', 5),
(15, '2020_06_22_091245_create_contact_u_s_table', 6),
(16, '2020_01_21_112808_create_attachments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_event_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pop_up` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `name`, `title`, `news_event_date`, `description`, `image`, `is_pop_up`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Printing', '50% Discount', NULL, 'Hello World', 'newsevent_image/15927233031584184664yamaha-r15-v30-racing-blue.png', '0', 1, '2020-06-21 01:08:01', '2020-06-23 02:31:24', NULL),
(2, 'News one', '60% Discount', NULL, 'Hello Ji', 'newsevent_image/159290604810-2-special-offer-png-clipart.png', '1', 1, '2020-06-23 01:54:28', '2020-06-23 03:54:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` enum('Order','Quote') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` enum('New','Download','Print','Waiting','Complete') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_subject`, `order_qty`, `order_des`, `order_type`, `order_by`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Order', '10', 'dfghjkl', 'Order', 2, 2, 'Complete', '2020-01-26 15:11:05', '2020-01-27 15:36:36', NULL),
(2, 'PVC Printing', '4 x 5 x 2 Pcs', 'Ilet & Pocket', 'Order', NULL, 4, 'New', '2020-01-26 16:05:04', '2020-01-26 16:05:04', NULL),
(3, 'PVC Printing', '2', 'Ilet & Pocket', 'Order', NULL, 4, 'New', '2020-01-26 16:05:22', '2020-01-26 16:05:22', NULL),
(4, 'PVC Printing', '2', 'Ilet & Pocket', 'Order', NULL, 4, 'New', '2020-01-26 16:05:57', '2020-01-26 16:05:57', NULL),
(5, 'PVC Printing', '2', 'jhgry', 'Order', NULL, 2, 'New', '2020-01-26 16:07:02', '2020-01-26 16:07:02', NULL),
(6, 'PVC Printing', '4 x 5 x 2 Pcs', 'Ilet', 'Order', NULL, 4, 'New', '2020-01-26 16:09:05', '2020-01-26 16:09:05', NULL),
(7, 'PVC Printing', '2', 'Ilet', 'Order', NULL, 4, 'New', '2020-01-26 16:09:20', '2020-01-26 16:09:20', NULL),
(8, 'PVC Printing', '2', NULL, 'Order', 4, 4, 'New', '2020-01-26 16:09:48', '2020-01-26 16:42:04', NULL),
(9, 'test', '10*2*3', 'dfghjkl', 'Order', NULL, 1, 'New', '2020-01-28 07:25:46', '2020-01-28 07:25:46', NULL),
(10, 'test', '150', 'oiuhgfdcvghjkl;', 'Order', NULL, 1, 'New', '2020-01-28 07:31:07', '2020-01-28 07:31:07', NULL),
(11, 'Test', '1', 'Hlw', 'Order', NULL, 1, 'New', '2020-02-06 17:11:49', '2020-02-06 17:11:49', NULL),
(12, 'Sifat', '2&4', 'Shkaaan', 'Order', 1, 5, 'Complete', '2020-02-06 17:16:08', '2020-02-06 17:18:14', NULL),
(13, 'Test', '10', 'Hlw', 'Order', NULL, 6, 'New', '2020-02-09 07:47:14', '2020-02-09 07:47:14', NULL),
(14, 'Test', '10', NULL, 'Order', NULL, 1, 'New', '2020-02-09 07:56:28', '2020-02-09 07:56:28', NULL),
(15, 'PVC Printing', '4 x 5 x 2 Pcs', NULL, 'Order', NULL, 7, 'New', '2020-02-09 16:52:37', '2020-02-09 16:52:37', NULL),
(16, 'Test', '100', 'sfdghjkl;jhgfd', 'Order', NULL, 8, 'New', '2020-02-10 07:54:09', '2020-02-10 07:54:09', NULL),
(17, 'PVC Printing', '5/8-2 Pcs', '12465164', 'Order', NULL, 9, 'New', '2020-02-10 09:48:20', '2020-02-10 09:48:20', NULL),
(18, 'PVC Printing', '4 x 5 x 2 Pcs', 'ssadsd', 'Order', NULL, 7, 'New', '2020-02-10 13:43:38', '2020-02-10 13:43:38', NULL),
(19, 'PVC Printing', '2', 'test', 'Order', NULL, 8, 'New', '2020-02-10 14:00:17', '2020-02-10 14:00:17', NULL),
(20, 'Test', '10', 'sdfghjkl;', 'Order', NULL, 1, 'New', '2020-06-23 06:05:54', '2020-06-23 06:05:54', NULL),
(21, 'test', '122', 'dsfghjkljhg', 'Order', NULL, 1, 'New', '2020-06-23 06:12:53', '2020-06-23 06:12:53', NULL),
(22, 'ssss', '23', 'dcvbc', 'Order', NULL, 1, NULL, '2020-06-23 06:13:25', '2020-06-23 06:13:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'view order', 'web', '2020-01-26 07:27:51', '2020-01-26 07:27:51'),
(3, 'edit order', 'web', '2020-01-26 07:28:46', '2020-01-26 07:28:46'),
(4, 'delete order', 'web', '2020-01-26 07:29:06', '2020-01-26 07:29:06'),
(5, 'delete user', 'web', '2020-01-26 07:29:39', '2020-01-26 07:29:39'),
(6, 'edit user', 'web', '2020-01-26 07:29:49', '2020-01-26 07:29:49'),
(7, 'view user', 'web', '2020-01-26 07:30:11', '2020-01-26 07:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_services`
--

INSERT INTO `product_services` (`id`, `sub_category_id`, `code`, `name`, `short_description`, `description`, `image`, `image1`, `image2`, `image3`, `price`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, NULL, 'Id Card Silver', NULL, '<p>dsgfhjkblnjbvhgfdz</p>\r\n\r\n<p>dfszfhgjckbnlmbjhgf</p>', 'service_image/159274961144586032_1017910975045599_8910080148573782016_o.jpg', NULL, NULL, NULL, '200', 1, '2020-06-21 08:26:52', '2020-06-21 08:26:52', NULL),
(9, 1, NULL, 'ID Card Green', NULL, '<p>dfsfguhkjl;&#39;gfhjkhfdfsfghj</p>', 'service_image/159275116544713508_1017911351712228_2495935147883364352_o.jpg', NULL, NULL, NULL, '250', 1, '2020-06-21 08:52:45', '2020-06-21 08:52:45', NULL),
(10, 2, NULL, 'Nazmul', NULL, '<p>hello</p>', 'service_image/159280740437205602_1620386501407652_2745506446094368768_o.jpg', NULL, NULL, NULL, '250', 1, '2020-06-22 00:30:04', '2020-06-22 00:30:04', NULL),
(11, 3, '12005c', 'Yearly  Calender', NULL, '<p>gdjfhjanbms,nzxnmc</p>\r\n\r\n<p>fldihsz,kjgxnvdzx,c m</p>\r\n\r\n<p>DGFBRzdkjcxhvndzf m,x</p>\r\n\r\n<p>sdZYGFMvzd ,vc</p>\r\n\r\n<p>sdfjbhmng zt,df</p>\r\n\r\n<p>&nbsp;</p>', 'service_image/159281100337205602_1620386501407652_2745506446094368768_o.jpg', NULL, NULL, NULL, '200', 1, '2020-06-22 01:30:04', '2020-06-22 04:08:14', NULL),
(12, 4, NULL, 'Monthly Calender', NULL, '<p>gdjfhjanbms,nzxnmc</p>\r\n\r\n<p>fldihsz,kjgxnvdzx,c m</p>\r\n\r\n<p>DGFBRzdkjcxhvndzf m,x</p>\r\n\r\n<p>sdZYGFMvzd ,vc</p>\r\n\r\n<p>sdfjbhmng zt,df</p>\r\n\r\n<p>&nbsp;</p>', 'service_image/1592811025026a4ee34d125ae4f3dbfb3c2ccce53f.png', NULL, NULL, NULL, '250', 1, '2020-06-22 01:30:25', '2020-06-22 01:30:25', NULL),
(13, 3, NULL, 'New Calender Desk', NULL, '<p>dsfghjkhbhvjgfesaghvnm</p>\r\n\r\n<p>asdfgchvjbknlmnjydtrsedtfhgjbk</p>', 'service_image/159281109044713508_1017911351712228_2495935147883364352_o.jpg', NULL, NULL, NULL, '120', 1, '2020-06-22 01:31:30', '2020-06-22 02:27:59', NULL),
(14, 4, 'PS1999753', 'New Calender Desk', NULL, '<p>swerdtfgyuhiojpk[lkjohi</p>', 'service_image/159281440382567868_3155495884478431_3750863981196083200_n.jpg', NULL, NULL, NULL, '1234', 1, '2020-06-22 02:26:43', '2020-06-22 02:26:43', NULL),
(15, 1, 'PS0432178', 'School Id Card', 'HEllo', '<p>Once More again</p>\r\n\r\n<p>Hello</p>\r\n\r\n<p>what do u do</p>\r\n\r\n<p>what are you doing now</p>\r\n\r\n<p>what can i do</p>', 'service_image/159284440044713508_1017911351712228_2495935147883364352_o.jpg', 'service_image/159284470444621104_1017911038378926_57893010939052032_o.jpg', 'service_image/159284470444652783_1017911011712262_5391012726254338048_o.jpg', 'service_image/159284470444713508_1017911351712228_2495935147883364352_o.jpg', '20', 1, '2020-06-22 10:46:41', '2020-06-28 05:25:24', NULL),
(16, 2, 'PS5350103', 'New Item', NULL, NULL, 'service_image/159309483844621104_1017911038378926_57893010939052032_o.jpg', NULL, NULL, NULL, '150', 1, '2020-06-25 08:20:38', '2020-06-25 08:20:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-01-26 07:22:54', '2020-01-26 07:22:54'),
(2, 'user', 'web', '2020-01-26 07:23:18', '2020-01-26 07:23:18'),
(3, 'manager', 'web', '2020-01-26 07:23:18', '2020-01-26 07:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ID Card', 1, '2020-06-21 08:13:01', '2020-06-21 08:51:11', NULL),
(2, 7, 'Sifat', 1, '2020-06-22 00:28:01', '2020-06-22 00:28:01', NULL),
(3, 8, 'Mini Calender', 1, '2020-06-22 01:07:58', '2020-06-22 01:07:58', NULL),
(4, 8, 'Big Calendar', 1, '2020-06-22 01:08:09', '2020-06-22 01:08:09', NULL),
(5, 3, 'New gift', 1, '2020-06-25 08:21:13', '2020-06-25 08:21:13', NULL),
(6, 2, 'Sub category', 1, '2020-06-25 08:21:22', '2020-06-25 08:21:22', NULL),
(7, 2, 'Sub category 2', 1, '2020-06-25 08:21:47', '2020-06-25 08:21:47', NULL),
(8, 1, 'Sub category 3', 1, '2020-06-25 08:21:58', '2020-06-25 08:21:58', NULL),
(9, 7, 'Samsung J2 Prime', 1, '2020-06-25 08:22:13', '2020-06-25 08:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `company`, `house_no`, `road_no`, `address`, `mobile_verified_at`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Najmul', 'n@j.m', '01643235533', 'Huda', '213', '34', 'Dhaka,Bangladesh', '2020-02-09 15:08:59', NULL, '$2y$10$mvbv26qFy1RQo0urp6K46.ZIQPMZIkIMphRLiuSwi/swbhZVU9I0W', NULL, '2020-01-21 05:22:04', '2020-06-21 07:11:51'),
(2, 'Shanto', NULL, '01712393621', 'Design Touch', '60', '8', 'Dhaka', NULL, NULL, '$2y$10$VHoABaQewozWjoZID39/tezYiOYzK6A.FOZUE0.nsgtvv3JhNCVIO', NULL, '2020-01-26 15:04:59', '2020-01-26 16:18:59'),
(3, 'Md. Rezaul Hasan', 'fp2022@yahoo.com', '01646083389', 'Fantacy Products', '189, Fakirapool, B6', 'Khabir Plaza', 'Motijheel, Dhaka-1000', NULL, NULL, '$2y$10$TqOEOGLJihXu0GCeHp58mOSsvuNubBS8EWjajeaWTrxKU1saeofOm', NULL, '2020-01-26 15:19:19', '2020-01-26 15:19:19'),
(4, 'SP Shanto', 'printxpress.bd@gmail.com', '01677644991', 'Print Xpress', '164', 'B', 'Fakirapool', NULL, NULL, '$2y$10$ime3KwYoDZ/M8zH3unGjJu8SFHxjxmeq9QKARSpD31cSN5m/nKuve', NULL, '2020-01-26 15:57:11', '2020-01-26 16:22:25'),
(5, 'Sifat', NULL, '01643235522', 'Zahan', '40', '1', 'Dhaka', NULL, NULL, '$2y$10$fU/1i6fkQf6XVDWmb0Ew5uIqGExkM4xS5b74WRsPd1Q2ZjiDJ2CZ2', NULL, '2020-02-06 17:15:15', '2020-02-06 17:15:15'),
(6, 'Momin', 'momoin@monim.com', '01643235555', 'Ali', '12', '12', 'Dhaka', NULL, NULL, '$2y$10$ip3qYuEqwpNj6PnMytPBKuu/F5B6jFvWBkEi6WkzJqKnT0bXDAb2G', NULL, '2020-02-09 07:46:42', '2020-02-09 07:46:42'),
(7, 'SP Shanto', 'designtouch.sp@gmail.com', '01774755775', 'Print Xpress', '164', 'BMAS Road', 'Fakirapool, Motijheel', '2020-02-09 16:45:54', NULL, '$2y$10$84igsDv/RhDeL7p5bEr9lepqzP3AraCnn2ObQgV1iX446/.Cxat6K', NULL, '2020-02-09 16:44:59', '2020-02-09 16:45:54'),
(8, 'Mozammel', 'mozammel2030@gmail.com', '01687802090', 'Techno IT', '41', '14', 'Dhaka', '2020-02-10 07:53:29', NULL, '$2y$10$utB/CcXJJKdTg1FPuGlgiOPeAESeoQsoM0ROcjgzNla/dP8ij8dy2', NULL, '2020-02-10 07:53:02', '2020-02-10 07:53:29'),
(9, 'Suborna', 'suborna123456@gmail.com', '01720584866', 'Print Xpress', '188', 'BMAS Road', 'Fakirapool, Motijheel', '2020-02-10 09:44:41', NULL, '$2y$10$U7QGIQnk/dUhG3wYPXZx5.ByJs.BBXI1PVe.G1Bk7fCruXqaWXbKG', NULL, '2020-02-10 09:44:07', '2020-02-10 09:44:41'),
(10, 'Sifat', 'nazmul2858@gmail.com', '01776912858', 'Sifat', '24', '25', 'Dhaka,Bangladesh', NULL, NULL, '$2y$10$Ob4V7wpEXIw/OB49wS3hmeofpOiwg0KXAE6rjKWj0bcaEGhIoiyPi', NULL, '2020-06-23 04:44:38', '2020-06-23 04:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `model_type`, `user_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 6),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 10),
(3, 'App\\User', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_order_id_index` (`order_id`),
  ADD KEY `attachments_user_id_index` (`user_id`),
  ADD KEY `attachments_order_by_index` (`order_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_index` (`user_id`);

--
-- Indexes for table `contact_u_s`
--
ALTER TABLE `contact_u_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_id_index` (`id`),
  ADD KEY `contents_user_id_index` (`user_id`);

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_managements`
--
ALTER TABLE `home_managements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_managements_id_index` (`id`),
  ADD KEY `home_managements_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_events_user_id_index` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_order_by_index` (`order_by`),
  ADD KEY `orders_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_services_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`user_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`user_id`,`model_type`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`user_id`,`model_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_u_s`
--
ALTER TABLE `contact_u_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_managements`
--
ALTER TABLE `home_managements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
