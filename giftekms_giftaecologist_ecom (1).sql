-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2021 at 05:14 PM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giftekms_giftaecologist_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `username`, `email`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'anis', '$2y$10$yuqfspJDefcS5DvRV.rPD.AA4ifhFYpXoQdfCSKIneMQEUCXBcJUC', 'admin', 'anis904692@gmail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `post`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MD. Anichur Rahaman', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deserunt dolor, illum tempore earum nihil in enim? \n\nExpedita necessitatibus sequi quae consequuntur ipsum iusto nulla mollitia, voluptas soluta est vel?\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deserunt dolor, illum tempore earum nihil in enim? Expedita necessitatibus sequi quae consequuntur ipsum iusto nulla mollitia, voluptas soluta est vel?\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deserunt dolor, illum tempore earum nihil in enim? Expedita necessitatibus sequi quae consequuntur ipsum iusto nulla mollitia, voluptas soluta est vel?', 1, '2021-05-31 23:02:55', '2021-05-31 23:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mobile`, `email`, `msg`, `subject`) VALUES
(2, 'Hi Nice site https://google.com', '82874171928', 'ascehine@mail.ru', 'Hi Nice site https://google.com', 'Hi Nice site https://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `exp_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `cupon_code`, `discount`, `type`, `status`, `exp_date`, `created_at`, `updated_at`) VALUES
(1, '1010', 10.00, 1, 1, '2021-05-31 00:00:00', NULL, '2021-05-11 22:52:05'),
(2, 'anis', 25.00, 1, 1, '2021-05-28 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_about_section`
--

CREATE TABLE `home_about_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_about_section`
--

INSERT INTO `home_about_section` (`id`, `title`, `description`, `image1`, `image2`, `image3`, `exp_image`) VALUES
(1, 'About us', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.\nDynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.\n\nDynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.', 'https://giftaecologist.com/public/storage/P8CHiU0lRLWtJ507LAnNYisye3jOL1PiusFDq8QS.jpg', 'https://giftaecologist.com/public/storage/3OmshOsOLp00tvWHOaIwIdBBXe99yNt03WSUN303.jpg', 'https://giftaecologist.com/public/storage/RLiq2VsWckBkFZwj0NAiDFhLzsaUzujD1FVo4wig.jpg', 'https://giftaecologist.com/public/storage/cULcxpZ23X9fYidIC1oiEtTaeswaeRkhTtgNkHe5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_exclusive_feature`
--

CREATE TABLE `home_exclusive_feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_special_feature`
--

CREATE TABLE `home_special_feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_special_feature`
--

INSERT INTO `home_special_feature` (`id`, `title`, `description`) VALUES
(1, 'Hello', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.'),
(2, 'Hello', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.'),
(3, 'Hello', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.');

-- --------------------------------------------------------

--
-- Table structure for table `meserments`
--

CREATE TABLE `meserments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meserment_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meserments`
--

INSERT INTO `meserments` (`id`, `product_id`, `meserment_value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'md', '2021-05-31 09:15:04', NULL, NULL),
(2, '2', 'md', '2021-05-31 09:15:37', NULL, NULL),
(3, '20', '10-mg', NULL, NULL, NULL),
(4, '16', 'xl', NULL, NULL, NULL),
(5, '13', 'md', NULL, NULL, NULL),
(6, '14', 'lg', NULL, NULL, NULL),
(7, '11', '100-gm', NULL, NULL, NULL),
(8, '12', '100-gm', NULL, NULL, NULL),
(9, '15', 'md', NULL, NULL, NULL),
(10, '10', 'lg', NULL, NULL, NULL),
(11, '19', '100-kg', NULL, NULL, NULL),
(12, '18', '10-mg', NULL, NULL, NULL),
(13, '17', 'md', NULL, NULL, NULL),
(14, '9', 'lg', '2021-05-31 09:29:07', NULL, NULL),
(15, '1', 'md', NULL, NULL, NULL),
(16, '2', 'md', NULL, NULL, NULL),
(17, '3', 'xl', NULL, NULL, NULL),
(18, '8', '100-gm', NULL, NULL, NULL),
(19, '7', '10-metter', NULL, NULL, NULL),
(20, '6', '10-feet', NULL, NULL, NULL),
(21, '5', '10-kg', '2021-05-31 09:19:32', NULL, NULL),
(22, '5', '10-kg', NULL, NULL, NULL),
(23, '4', 'md', NULL, NULL, NULL),
(24, '21', 'lg', NULL, NULL, NULL),
(25, '22', 'md', NULL, NULL, NULL),
(26, '22', 'lg', NULL, NULL, NULL),
(27, '23', 'lg', '2021-05-31 09:25:36', NULL, NULL),
(28, '23', 'sm', '2021-05-31 09:25:36', NULL, NULL),
(29, '23', 'lg', '2021-06-01 23:09:10', NULL, NULL),
(30, '23', 'sm', '2021-06-01 23:09:10', NULL, NULL),
(31, '9', 'lg', NULL, NULL, NULL),
(32, '23', '40', '2021-06-01 23:09:32', NULL, NULL),
(33, '23', '50', '2021-06-01 23:09:32', NULL, NULL),
(34, '23', '60', '2021-06-01 23:09:32', NULL, NULL),
(35, '23', '40', NULL, NULL, NULL),
(36, '23', '50', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_04_084849_create_vendors_table', 1),
(5, '2020_11_30_045358_slider', 1),
(6, '2020_12_02_110151_create_product_has_images_table', 1),
(7, '2020_12_02_110536_create_product_colors_table', 1),
(8, '2020_12_02_110911_create_meserments_table', 1),
(9, '2020_12_06_054422_create_products_category_models_table', 1),
(10, '2020_12_06_055652_create_producrts_brand_models_table', 1),
(11, '2020_12_16_114837_admin_table', 1),
(12, '2020_12_19_065435_orders', 1),
(13, '2020_12_19_071443_order_products', 1),
(14, '2020_12_21_111041_contact', 1),
(15, '2020_12_21_113836_visitortable', 1),
(16, '2020_12_21_114907_social_link', 1),
(17, '2020_12_21_122315_others_model', 1),
(18, '2021_01_02_041806_testimonial_table', 1),
(19, '2021_01_02_041940_home_about_section_table', 1),
(20, '2021_01_02_042009_home_special_features_table', 1),
(21, '2021_01_02_042038_home_exclusive_features_table', 1),
(22, '2021_01_17_100849_create_reating_reviews_table', 1),
(23, '2021_01_31_050757_pages', 1),
(24, '2021_05_03_183956_create_order_settings_table', 1),
(25, '2021_05_10_081303_create_products_table', 1),
(26, '2021_05_10_083331_create_product_user_table', 1),
(27, '2021_05_10_112853_create_cupons_table', 1),
(28, '2021_05_31_143345_create_blogs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone_number` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bangladesh',
  `postal_code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_without_discount` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `total_tax` decimal(8,2) NOT NULL,
  `total_delivery_charge` int(11) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `total_cupon_discount` decimal(10,2) NOT NULL,
  `payment_status` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_details` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transection_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `processed_by` int(10) UNSIGNED DEFAULT NULL,
  `order_product_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone_number`, `address`, `city`, `district`, `country`, `postal_code`, `price_without_discount`, `discount_amount`, `total_amount`, `total_tax`, `total_delivery_charge`, `paid_amount`, `total_cupon_discount`, `payment_status`, `payment_details`, `transection_id`, `user_id`, `processed_by`, `order_product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 500.00, 100.00, 400.00, 52.00, 130, 382.00, 200.00, 'Cancel', 'Cash  On  Delivery', NULL, 1, NULL, NULL, NULL, '2021-05-10 19:34:24', '2021-05-10 19:34:24'),
(2, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 1100.00, 210.00, 890.00, 110.30, 130, 685.30, 445.00, 'pending', 'Rocket', 'kjkjkk', 1, NULL, NULL, NULL, '2021-05-11 14:07:02', '2021-05-11 14:07:02'),
(3, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 5500.00, 1050.00, 4450.00, 551.50, 80, 2856.50, 2225.00, 'pending', 'Cash  On  Delivery', NULL, 1, NULL, NULL, NULL, '2021-05-11 14:09:49', '2021-05-11 14:09:49'),
(4, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 5000.00, 1000.00, 4000.00, 520.00, 130, 2650.00, 2000.00, 'pending', 'Rocket', 'nagadidtr', 1, NULL, NULL, NULL, '2021-05-11 14:12:05', '2021-05-11 14:12:05'),
(5, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 400.00, 40.00, 360.00, 25.20, 130, 515.20, 0.00, 'pending', 'Rocket', 'Ggggg', 1, NULL, NULL, NULL, '2021-05-11 20:15:23', '2021-05-11 20:15:23'),
(6, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 600.00, 110.00, 490.00, 58.30, 80, 505.80, 122.50, 'pending', 'Cash  On  Delivery', NULL, 1, NULL, NULL, NULL, '2021-05-11 20:17:29', '2021-05-11 20:17:29'),
(7, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 1000.00, 100.00, 900.00, 63.00, 80, 1043.00, 0.00, 'pending', 'Nagad', '01816366535', 1, NULL, NULL, NULL, '2021-05-12 12:24:18', '2021-05-12 12:24:18'),
(8, 'Md. Anichur Rahaman', '01816366535', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'Comilla', 'Comilla', 'Bangladesh', '1212', 1100.00, 210.00, 890.00, 110.30, 80, 1080.30, 0.00, 'pending', 'Cash  On  Delivery', NULL, 6, NULL, NULL, NULL, '2021-05-12 19:20:12', '2021-05-12 19:20:12'),
(9, 'MD. Anichur Rahaman', '01816366535', 'Dhaka', 'Comilla', 'Barura', 'Bangladesh', '3560', 500.00, 100.00, 400.00, 52.00, 80, 492.00, 40.00, 'pending', 'Cash  On  Delivery', NULL, 9, NULL, NULL, NULL, '2021-05-16 11:18:50', '2021-05-16 11:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maserment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_owner_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `quantity`, `color`, `maserment`, `note1`, `note2`, `price`, `order_id`, `product_id`, `product_owner_id`, `deleted_at`) VALUES
(1, 3, '#DB3232', 'md', 'n100', 'n200', 400.00, 1, 1, 0, NULL),
(2, 2, '#DB3232', 'md', NULL, NULL, 800.00, 2, 1, 0, NULL),
(3, 5, '#DB4747', 'md', NULL, NULL, 90.00, 2, 2, 0, NULL),
(4, 5, '#DB4747', 'md', NULL, NULL, 450.00, 3, 2, 0, NULL),
(5, 10, '#DB3232', 'md', NULL, NULL, 4000.00, 3, 1, 0, NULL),
(6, 10, '#DB3232', 'md', NULL, NULL, 4000.00, 4, 1, 0, NULL),
(7, 4, '#DB4747', 'md', NULL, NULL, 360.00, 5, 2, 0, NULL),
(8, 1, '#DB3232', 'md', NULL, NULL, 400.00, 6, 1, 0, NULL),
(9, 1, '#DB4747', 'md', NULL, NULL, 90.00, 6, 2, 0, NULL),
(10, 10, '#DB4747', 'md', NULL, NULL, 900.00, 7, 2, 0, NULL),
(11, 2, '#DB3232', 'md', NULL, NULL, 800.00, 8, 1, 0, NULL),
(12, 1, '#DB4747', 'md', NULL, NULL, 90.00, 8, 2, 0, NULL),
(13, 1, '#DB3232', 'md', NULL, NULL, 400.00, 9, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_settings`
--

CREATE TABLE `order_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bkash_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rocket_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivary_in_city` int(11) DEFAULT NULL,
  `delivary_out_city` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_settings`
--

INSERT INTO `order_settings` (`id`, `bkash_number`, `rocket_number`, `nagad_number`, `delivary_in_city`, `delivary_out_city`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 80, 130, NULL, '2021-05-10 23:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `logo`, `hero_banner`, `promo_image_one`, `promo_image_two`, `promo_image_three`, `title`, `sub_title`, `phone`, `email`, `address`, `gmap`, `created_at`, `updated_at`) VALUES
(1, 'https://giftaecologist.com/public/storage/ZyN3tjgHy3pZ7QVpGKEsZjpiQTCe5bA995MQlldl.png', 'https://giftaecologist.com/public/storage/QAcaM8JQAQYsOi0s7h33vO76UgmXBzuVfyiPy4Lx.jpg', 'https://giftaecologist.com/public/storage/cOQaJoBaiSF8P4fOurdV3MDvcqzrDNaZgqWy4Dlp.jpg', 'https://giftaecologist.com/public/storage/7T4NU0Mxgx8q6SM966NYXYtIKQvR295oCWzXMK25.jpg', 'https://giftaecologist.com/public/storage/BCfduEXKVCRsB81q3SgO03bMGL5vWmshmrLzoW3Q.jpg', 'Welcome To Our Ecommerce Service', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.', '01816366535', 'anis@gmail.com', 'Vill: Bezimara, P.O:Adda Bazar, P.S: Barura, Dist:comilla', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14593.516207252544!2d90.37854813040045!3d23.876173902438737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c415dabf6e4d%3A0xb9fa0b309dbe4785!2sUttara%20Sector%2011%20Park!5e0!3m2!1sen!2sbd!4v1620673922674!5m2!1sen!2sbd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_in_stock` tinyint(4) NOT NULL DEFAULT 1,
  `product_price` decimal(8,2) NOT NULL,
  `product_saving` int(11) NOT NULL DEFAULT 0,
  `product_selling_price` decimal(8,2) DEFAULT NULL,
  `product_tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `product_delivary_charge` int(11) NOT NULL DEFAULT 0,
  `product_delivary_charge_type` tinyint(4) NOT NULL DEFAULT 0,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `product_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `feture_products` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `product_if_has_color` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_meserment_type` int(10) UNSIGNED DEFAULT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `product_brand_id` int(10) UNSIGNED NOT NULL,
  `product_owner_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_discription`, `product_slug`, `product_in_stock`, `product_price`, `product_saving`, `product_selling_price`, `product_tax`, `product_delivary_charge`, `product_delivary_charge_type`, `product_quantity`, `product_active`, `feture_products`, `product_if_has_color`, `product_meserment_type`, `product_category_id`, `product_brand_id`, `product_owner_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Product', '\nLorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test10', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 1, 1, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(2, 'Test products', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-210', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 1, 4, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(3, 'Pant', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test1010', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 1, 4, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(4, 'Mobile 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-210101', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 1, 3, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(5, 'Rice', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test1010', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 2, 4, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(6, 'oven 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-2101', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 3, 2, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(7, 'Oven', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test101', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 3, 2, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(8, 'Spray', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-210', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 2, 5, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(9, 'Hotpot', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test10', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 1, 6, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(10, 'Jama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-210', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 1, 6, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(11, 'Body Spray', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test10', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 2, 5, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(12, 'Lipstics', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-210', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 2, 3, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(13, 'Three piece', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test10', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 1, 2, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(14, 'Three piece', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-210', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 1, 2, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(15, 'Jama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test10', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 1, 4, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(16, 'Watch', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-25420', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 1, 6, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(17, 'Ghori', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test7856', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 1, 1, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(18, 'Jama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-27865', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 2, 1, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(19, 'Shorts', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam \nquibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe\n impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test78', 1, 500.00, 20, 400.00, 13.00, 0, 0, 1, '1', '1', 0, 2, 1, 1, 0, NULL, '2021-05-10 18:55:47', '2021-05-10 18:55:47'),
(20, 'Shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque distinctio cum dolores consectetur, consequuntur aliquam excepturi aperiam nemo saepe impedit, iusto ipsa et modi nulla minima similique ex nesciunt. Eum atque quasi at sapiente iste quis veritatis pariatur amet et sit, facilis voluptate similique cum. Aliquid velit adipisci repellat iusto distinctio officia accusantium reprehenderit vel similique.', 'test-278', 1, 100.00, 10, 90.00, 7.00, 0, 0, 1, '1', '1', 0, 2, 1, 1, 0, NULL, '2021-05-11 12:35:45', '2021-05-11 12:35:45'),
(21, 'T- shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque ', 't-shirt', 1, 100.00, 0, 100.00, 9.00, 0, 0, 1, '1', '1', 0, 1, 6, 1, 0, NULL, '2021-05-31 05:22:24', '2021-05-31 05:22:24'),
(22, 'Three Piece 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque ', 'three-piece-3', 1, 200.00, 9, 182.00, 10.00, 0, 0, 1, '1', '1', 0, 1, 6, 1, 0, NULL, '2021-05-31 05:23:47', '2021-05-31 05:23:47'),
(23, 'Kamiz', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium totam molestiae, necessitatibus mollitia nobis quia quaerat eligendi asperiores aperiam quibusdam sapiente exercitationem non. Minus ullam exercitationem, reprehenderit ducimus saepe repellat aperiam placeat omnis quos aspernatur animi voluptas, obcaecati a quae! Ipsam perferendis similique, voluptatibus ea earum ducimus architecto possimus. Exercitationem rerum cumque ', 'kamiz', 1, 300.00, 10, 270.00, 10.00, 0, 0, 1, '1', '1', 0, 4, 6, 1, 0, NULL, '2021-05-31 05:24:48', '2021-05-31 05:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `products_brand`
--

CREATE TABLE `products_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_brand`
--

INSERT INTO `products_brand` (`id`, `name`, `image`, `products_category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'https://giftaecologist.com/public/storage/A8YkVqYU7JI2jrNiKsMkMaW4pdRfmaFMSgQbEzcu.webp', '1', NULL, '2021-05-10 18:53:45', '2021-05-10 18:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_menu` tinyint(4) NOT NULL DEFAULT 0,
  `is_homepage` tinyint(4) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `name`, `icon`, `banner_image`, `parent_id`, `status`, `is_menu`, `is_homepage`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Fashion', 'https://giftaecologist.com/public/storage/gpFkxcwRmJ3MMrSrnGZ8v4KYTCznGGlHs1jZFApH.jpg', 'https://giftaecologist.com/public/storage/NYsBVStE660Aq3YW2ywriMbQHebhrVshqwqVhzO8.jpg', 0, 1, 1, 1, 'fashion', NULL, '2021-05-10 18:51:44', '2021-05-10 18:51:44'),
(2, 'Electronics', 'https://giftaecologist.com/public/storage/DNdlsTpxmT2YrdX7f15S4rB6D0ZLyZFybcu3GtYB.jpg', 'https://giftaecologist.com/public/storage/OXxNIOZxJuTIL3J80SWJ4CxKRhIWFTm81TGN3RqD.jpg', 0, 1, 1, 1, 'electronics', NULL, '2021-05-31 04:15:28', '2021-05-31 04:15:28'),
(4, 'Home & Living', 'https://giftaecologist.com/public/storage/AbkdDulePUKoxZgDIp9mhsjtY5AzQ1guAxa8q9yK.jpg', 'https://giftaecologist.com/public/storage/vZbyZp4mO9zuBXRYYpmbRQzkafH2q489wPQ7h8ZT.jpg', 0, 1, 1, 1, 'home-living', NULL, '2021-05-31 04:16:13', '2021-05-31 04:16:13'),
(5, 'Daily Needs', 'https://giftaecologist.com/public/storage/5sa9raTeHAOxIq9lN73KLc4CFP9ekSwafPxoCNPH.jpg', 'https://giftaecologist.com/public/storage/pZQkQe49YtHROaRfzX3kjYUYNlv4fMRe5H03ukkd.jpg', 0, 1, 0, 1, 'daily-needs', NULL, '2021-05-31 04:16:56', '2021-05-31 04:16:56'),
(1, 'Traditional Goods', 'https://giftaecologist.com/public/storage/hXiXKNQ2N6eu3G6DIl7WqagJXMzgrTFJte4uODgt.jpg', 'https://giftaecologist.com/public/storage/wJSRJZgJnSgGGQiBaj68zmAD6vpy5O3bIHpP2Gsu.jpg', 0, 1, 1, 1, 'traditional-goods', NULL, '2021-05-31 04:18:12', '2021-05-31 04:18:12'),
(3, 'Mobile', 'https://giftaecologist.com/public/storage/WZ609FQuvl4RnjgnPRZWKN7Uzbj0pKXo8rGcKseZ.png', 'https://giftaecologist.com/public/storage/wbluD6sGSiHAoYjCaQyc3MVt5W2a9S35X8UFcB1U.png', 0, 1, 0, 1, 'mobile', NULL, '2021-05-31 04:18:42', '2021-05-31 04:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_product_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_color_code`, `product_color_product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#DB3232', 1, '2021-05-31 09:15:04', NULL, NULL),
(2, '#DB4747', 2, '2021-05-31 09:15:37', NULL, NULL),
(3, '#9A2525', 20, NULL, NULL, NULL),
(4, '#BA5757', 16, NULL, NULL, NULL),
(5, '#000000', 13, NULL, NULL, NULL),
(6, '#000000', 14, NULL, NULL, NULL),
(7, '#D93939', 11, NULL, NULL, NULL),
(8, '#D70909', 12, NULL, NULL, NULL),
(9, '#000000', 15, NULL, NULL, NULL),
(10, '#C64141', 10, NULL, NULL, NULL),
(11, '#E13434', 19, NULL, NULL, NULL),
(12, '#000000', 18, NULL, NULL, NULL),
(13, '#ED6B6B', 17, NULL, NULL, NULL),
(14, '#080C31', 9, '2021-05-31 09:29:07', NULL, NULL),
(15, '#DB3232', 1, NULL, NULL, NULL),
(16, '#DB4747', 2, NULL, NULL, NULL),
(17, '#000000', 3, NULL, NULL, NULL),
(18, '#ED6565', 8, NULL, NULL, NULL),
(19, '#000000', 7, NULL, NULL, NULL),
(20, '#000000', 6, NULL, NULL, NULL),
(21, '#6B2B2B', 5, '2021-05-31 09:19:32', NULL, NULL),
(22, '#6B2B2B', 5, NULL, NULL, NULL),
(23, '#E5C4C4', 4, NULL, NULL, NULL),
(24, '#281E1E', 21, NULL, NULL, NULL),
(25, '#BCCC20', 22, NULL, NULL, NULL),
(26, '#1F44BA', 23, '2021-05-31 09:25:36', NULL, NULL),
(27, '#1F44BA', 23, '2021-06-01 23:09:10', NULL, NULL),
(28, '#080C31', 9, NULL, NULL, NULL),
(29, '#1F44BA', 23, '2021-06-01 23:09:32', NULL, NULL),
(30, '#1F44BA', 23, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_images`
--

CREATE TABLE `product_has_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `has_images_product_id` int(11) NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_has_images`
--

INSERT INTO `product_has_images` (`id`, `has_images_product_id`, `image_path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://giftaecologist.com/public/storage/16206729470.jpg', '2021-05-31 09:15:04', NULL, NULL),
(2, 1, 'https://giftaecologist.com/public/storage/16206729471.jpg', '2021-05-31 09:15:04', NULL, NULL),
(3, 2, 'https://giftaecologist.com/public/storage/16207365450.jpg', '2021-05-31 09:15:37', NULL, NULL),
(4, 2, 'https://giftaecologist.com/public/storage/16207365451.jpg', '2021-05-31 09:15:37', NULL, NULL),
(5, 20, 'https://giftaecologist.com/public/storage/16224372830.png', NULL, NULL, NULL),
(6, 20, 'https://giftaecologist.com/public/storage/16224372831.png', NULL, NULL, NULL),
(7, 16, 'https://giftaecologist.com/public/storage/16224375060.jpg', NULL, NULL, NULL),
(8, 13, 'https://giftaecologist.com/public/storage/16224375950.jpg', NULL, NULL, NULL),
(9, 13, 'https://giftaecologist.com/public/storage/16224375951.jpg', NULL, NULL, NULL),
(10, 14, 'https://giftaecologist.com/public/storage/16224376390.jpg', NULL, NULL, NULL),
(11, 11, 'https://giftaecologist.com/public/storage/16224376700.jpg', NULL, NULL, NULL),
(12, 11, 'https://giftaecologist.com/public/storage/16224376701.jpg', NULL, NULL, NULL),
(13, 12, 'https://giftaecologist.com/public/storage/16224377050.jpg', NULL, NULL, NULL),
(14, 12, 'https://giftaecologist.com/public/storage/16224377051.jpg', NULL, NULL, NULL),
(15, 15, 'https://giftaecologist.com/public/storage/16224377430.jpg', NULL, NULL, NULL),
(16, 15, 'https://giftaecologist.com/public/storage/16224377431.jpg', NULL, NULL, NULL),
(17, 10, 'https://giftaecologist.com/public/storage/16224377820.jpg', NULL, NULL, NULL),
(18, 10, 'https://giftaecologist.com/public/storage/16224377821.jpg', NULL, NULL, NULL),
(19, 19, 'https://giftaecologist.com/public/storage/16224378800.jpg', NULL, NULL, NULL),
(20, 19, 'https://giftaecologist.com/public/storage/16224378801.jpg', NULL, NULL, NULL),
(21, 18, 'https://giftaecologist.com/public/storage/16224379520.jpg', NULL, NULL, NULL),
(22, 18, 'https://giftaecologist.com/public/storage/16224379521.jpg', NULL, NULL, NULL),
(23, 17, 'https://giftaecologist.com/public/storage/16224380410.jpg', NULL, NULL, NULL),
(24, 17, 'https://giftaecologist.com/public/storage/16224380411.jpg', NULL, NULL, NULL),
(25, 9, 'https://giftaecologist.com/public/storage/16224380800.png', '2021-05-31 09:29:07', NULL, NULL),
(26, 9, 'https://giftaecologist.com/public/storage/16224380801.png', '2021-05-31 09:29:07', NULL, NULL),
(27, 1, 'https://giftaecologist.com/public/storage/16224381040.jpg', NULL, NULL, NULL),
(28, 1, 'https://giftaecologist.com/public/storage/16224381041.jpg', NULL, NULL, NULL),
(29, 2, 'https://giftaecologist.com/public/storage/16224381370.jpg', NULL, NULL, NULL),
(30, 2, 'https://giftaecologist.com/public/storage/16224381371.jpg', NULL, NULL, NULL),
(31, 3, 'https://giftaecologist.com/public/storage/16224381620.jpg', NULL, NULL, NULL),
(32, 3, 'https://giftaecologist.com/public/storage/16224381621.jpg', NULL, NULL, NULL),
(33, 8, 'https://giftaecologist.com/public/storage/16224382070.jpg', NULL, NULL, NULL),
(34, 8, 'https://giftaecologist.com/public/storage/16224382071.jpg', NULL, NULL, NULL),
(35, 7, 'https://giftaecologist.com/public/storage/16224382520.jpg', NULL, NULL, NULL),
(36, 7, 'https://giftaecologist.com/public/storage/16224382521.jpg', NULL, NULL, NULL),
(37, 6, 'https://giftaecologist.com/public/storage/16224383270.jpg', NULL, NULL, NULL),
(38, 6, 'https://giftaecologist.com/public/storage/16224383271.jpg', NULL, NULL, NULL),
(39, 5, 'https://giftaecologist.com/public/storage/16224383570.jpg', '2021-05-31 09:19:32', NULL, NULL),
(40, 5, 'https://giftaecologist.com/public/storage/16224383571.jpg', '2021-05-31 09:19:32', NULL, NULL),
(41, 5, 'https://giftaecologist.com/public/storage/16224383720.jpg', NULL, NULL, NULL),
(42, 5, 'https://giftaecologist.com/public/storage/16224383721.jpg', NULL, NULL, NULL),
(43, 4, 'https://giftaecologist.com/public/storage/16224384190.png', NULL, NULL, NULL),
(44, 4, 'https://giftaecologist.com/public/storage/16224384191.jpg', NULL, NULL, NULL),
(45, 21, 'https://giftaecologist.com/public/storage/16224385440.jpg', NULL, NULL, NULL),
(46, 22, 'https://giftaecologist.com/public/storage/16224386270.jpeg', NULL, NULL, NULL),
(47, 22, 'https://giftaecologist.com/public/storage/16224386271.jpg', NULL, NULL, NULL),
(48, 23, 'https://giftaecologist.com/public/storage/16224386880.jpg', '2021-05-31 09:25:36', NULL, NULL),
(49, 23, 'https://giftaecologist.com/public/storage/16224386881.jpg', '2021-05-31 09:25:36', NULL, NULL),
(50, 23, 'https://giftaecologist.com/public/storage/16224387360.jpg', NULL, NULL, NULL),
(51, 9, 'https://giftaecologist.com/public/storage/16224389470.jpg', NULL, NULL, NULL),
(52, 9, 'https://giftaecologist.com/public/storage/16224389471.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_user`
--

INSERT INTO `product_user` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 2, 1, NULL, NULL),
(6, 1, 1, NULL, NULL),
(12, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 4, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reating_reviews`
--

CREATE TABLE `reating_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `star_reating` double(8,2) NOT NULL,
  `product_review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reating_reviews`
--

INSERT INTO `reating_reviews` (`id`, `product_id`, `user_id`, `seller_id`, `star_reating`, `product_review`, `is_approved`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 5.00, 'Test', 0, NULL, '2021-05-10 23:31:23', '2021-05-10 23:31:23'),
(2, 1, 10, 0, 5.00, 'Hello', 0, NULL, '2021-05-20 17:41:11', '2021-05-20 17:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `title`, `sub_title`) VALUES
(1, 'https://giftaecologist.com/public/storage/HLCOICylx3NOOp3qx1HwDeXzbMck5tGQFVdF2g17.jpg', '', ''),
(3, 'https://giftaecologist.com/public/storage/Pthm9kFHDaRphun75yPR6wIygJLNkcnslLUeXqSN.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instragram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `facebook`, `twitter`, `google`, `instragram`, `youtube`, `linkin`, `created_at`, `updated_at`) VALUES
(1, '#', '#', NULL, '#', '#', 'https://player.vimeo.com/video/87701971', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `date`, `image`, `description`) VALUES
(2, 'Anis', 'Web Developer', 'https://giftaecologist.com/public/storage/Y0zKrTcHAPTYsN4E72sm2EhBIPqRd9Jb7tMcxiOK.jpg', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.'),
(3, 'Anis', 'Web Developer', 'https://giftaecologist.com/public/storage/xINDMxFkpFwiML8eBDCL0O6zYYHHzUOEOr1Qw9rX.jpg', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.'),
(4, 'Anis', 'Web Developer', 'https://giftaecologist.com/public/storage/5Qg9NZsk96AwyAafVi3JdXzohpKky6nvrcwqrFJh.jpg', 'Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` decimal(8,2) DEFAULT NULL,
  `email_verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `image`, `address`, `city`, `district`, `postal_code`, `wallet`, `email_verification_token`, `provider`, `provider_id`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 'আনিছ আরণ্য', 'anis904692@gmail.com', ' ', '$2y$10$IzfG8FgTWx/QdFSqNnWENOhGG03H6yYGk7/ObDINg.hCPJkV/MLVq', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2021-06-10 06:08:43', 'LauYC2Cj1LLNZohMWmb9ON1ukLsW9rJuRYlh9hV6XMoPvYTvBULii608ew7c', NULL, '2021-06-02 00:06:52', '2021-06-02 00:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` decimal(8,2) DEFAULT NULL,
  `email_verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tables`
--

CREATE TABLE `visitor_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_tables`
--

INSERT INTO `visitor_tables` (`id`, `ip_address`, `visit_time`) VALUES
(1, '103.120.38.222', '2021-05-11 12:48:31am'),
(2, '103.120.38.222', '2021-05-11 12:48:32am'),
(3, '103.120.38.222', '2021-05-11 12:48:55am'),
(4, '103.120.38.222', '2021-05-11 12:48:56am'),
(5, '103.120.38.222', '2021-05-11 12:53:15am'),
(6, '103.120.38.222', '2021-05-11 12:53:16am'),
(7, '103.120.38.222', '2021-05-11 12:55:55am'),
(8, '103.120.38.222', '2021-05-11 12:55:56am'),
(9, '103.120.38.222', '2021-05-11 12:58:20am'),
(10, '103.120.38.222', '2021-05-11 12:58:21am'),
(11, '103.165.162.144', '2021-05-11 01:07:37am'),
(12, '103.165.162.144', '2021-05-11 01:07:39am'),
(13, '103.165.162.144', '2021-05-11 01:07:55am'),
(14, '103.165.162.144', '2021-05-11 01:07:56am'),
(15, '103.120.38.222', '2021-05-11 01:09:32am'),
(16, '103.120.38.222', '2021-05-11 01:10:30am'),
(17, '103.120.38.222', '2021-05-11 01:10:59am'),
(18, '103.120.38.222', '2021-05-11 01:13:10am'),
(19, '103.120.38.222', '2021-05-11 01:25:00am'),
(20, '103.120.38.222', '2021-05-11 01:25:15am'),
(21, '3.250.65.141', '2021-05-11 03:40:59am'),
(22, '3.122.238.188', '2021-05-11 09:26:41am'),
(23, '54.36.148.121', '2021-05-11 10:21:58am'),
(24, '103.120.38.222', '2021-05-11 06:12:28pm'),
(25, '103.120.38.222', '2021-05-11 06:12:50pm'),
(26, '103.120.38.222', '2021-05-11 06:13:09pm'),
(27, '103.120.38.222', '2021-05-11 06:15:08pm'),
(28, '103.120.38.222', '2021-05-11 06:27:05pm'),
(29, '103.120.38.222', '2021-05-11 06:31:10pm'),
(30, '103.120.38.222', '2021-05-11 06:31:16pm'),
(31, '103.120.38.222', '2021-05-11 06:32:19pm'),
(32, '103.120.38.222', '2021-05-11 06:32:35pm'),
(33, '103.120.38.222', '2021-05-11 06:33:37pm'),
(34, '103.120.38.222', '2021-05-11 06:35:51pm'),
(35, '103.120.38.222', '2021-05-11 08:01:32pm'),
(36, '103.120.38.222', '2021-05-11 08:01:38pm'),
(37, '103.120.38.222', '2021-05-11 08:01:42pm'),
(38, '103.120.38.222', '2021-05-11 08:01:46pm'),
(39, '103.120.38.222', '2021-05-11 08:01:54pm'),
(40, '103.120.38.222', '2021-05-11 08:02:40pm'),
(41, '103.120.38.222', '2021-05-11 08:03:22pm'),
(42, '103.120.38.222', '2021-05-11 08:04:06pm'),
(43, '103.120.38.222', '2021-05-11 08:07:37pm'),
(44, '103.120.38.222', '2021-05-11 08:10:32pm'),
(45, '103.120.38.222', '2021-05-11 08:10:41pm'),
(46, '103.120.38.222', '2021-05-11 08:10:55pm'),
(47, '103.120.38.222', '2021-05-11 09:05:55pm'),
(48, '103.120.38.222', '2021-05-11 09:13:59pm'),
(49, '143.198.105.128', '2021-05-11 10:34:08pm'),
(50, '54.36.148.46', '2021-05-11 11:12:52pm'),
(51, '103.120.38.222', '2021-05-12 12:44:12am'),
(52, '103.120.38.222', '2021-05-12 12:46:41am'),
(53, '103.120.38.222', '2021-05-12 12:47:22am'),
(54, '103.120.38.222', '2021-05-12 12:48:08am'),
(55, '103.120.38.222', '2021-05-12 12:48:52am'),
(56, '103.120.38.222', '2021-05-12 12:53:28am'),
(57, '103.120.38.222', '2021-05-12 12:56:21am'),
(58, '103.120.38.222', '2021-05-12 12:58:44am'),
(59, '103.120.38.222', '2021-05-12 01:05:42am'),
(60, '103.120.38.222', '2021-05-12 01:08:06am'),
(61, '103.120.38.222', '2021-05-12 01:08:27am'),
(62, '103.120.38.222', '2021-05-12 01:08:45am'),
(63, '103.120.38.222', '2021-05-12 01:14:29am'),
(64, '103.120.38.222', '2021-05-12 01:16:00am'),
(65, '103.120.38.222', '2021-05-12 01:16:30am'),
(66, '52.91.57.173', '2021-05-12 01:37:47am'),
(67, '103.120.38.222', '2021-05-12 01:39:16am'),
(68, '103.120.38.222', '2021-05-12 01:40:01am'),
(69, '103.120.38.222', '2021-05-12 01:40:41am'),
(70, '103.120.38.222', '2021-05-12 01:41:10am'),
(71, '103.120.38.222', '2021-05-12 01:42:04am'),
(72, '103.120.38.222', '2021-05-12 02:11:03am'),
(73, '103.120.38.222', '2021-05-12 02:13:07am'),
(74, '103.120.38.222', '2021-05-12 02:14:14am'),
(75, '103.120.38.222', '2021-05-12 02:15:47am'),
(76, '34.253.127.75', '2021-05-12 03:16:11am'),
(77, '103.120.38.222', '2021-05-12 03:53:14am'),
(78, '103.120.38.222', '2021-05-12 03:53:40am'),
(79, '66.249.79.14', '2021-05-12 07:16:21am'),
(80, '54.36.148.5', '2021-05-12 12:02:07pm'),
(81, '34.77.162.7', '2021-05-12 01:40:00pm'),
(82, '44.242.157.86', '2021-05-12 03:34:58pm'),
(83, '52.39.21.78', '2021-05-12 03:35:29pm'),
(84, '103.120.38.222', '2021-05-12 03:40:55pm'),
(85, '103.120.38.222', '2021-05-12 03:41:01pm'),
(86, '180.149.232.181', '2021-05-12 04:23:28pm'),
(87, '185.119.81.108', '2021-05-12 04:31:56pm'),
(88, '185.119.81.108', '2021-05-12 04:31:57pm'),
(89, '185.119.81.108', '2021-05-12 04:31:59pm'),
(90, '103.120.38.222', '2021-05-12 05:28:35pm'),
(91, '103.120.38.222', '2021-05-12 05:29:48pm'),
(92, '103.120.38.222', '2021-05-12 06:04:20pm'),
(93, '103.120.38.222', '2021-05-12 06:04:38pm'),
(94, '103.120.38.222', '2021-05-12 06:06:36pm'),
(95, '66.249.82.222', '2021-05-12 06:07:13pm'),
(96, '66.249.82.218', '2021-05-12 06:07:13pm'),
(97, '35.178.157.56', '2021-05-12 06:07:17pm'),
(98, '66.249.82.220', '2021-05-12 06:07:17pm'),
(99, '66.249.82.220', '2021-05-12 06:07:17pm'),
(100, '35.178.157.56', '2021-05-12 06:09:34pm'),
(101, '103.120.38.222', '2021-05-12 06:12:35pm'),
(102, '103.120.38.222', '2021-05-12 06:13:25pm'),
(103, '103.120.38.222', '2021-05-12 06:13:38pm'),
(104, '103.120.38.222', '2021-05-12 06:14:22pm'),
(105, '54.36.148.218', '2021-05-12 07:16:13pm'),
(106, '185.141.34.141', '2021-05-12 08:03:45pm'),
(107, '58.53.128.148', '2021-05-12 09:02:31pm'),
(108, '103.120.38.222', '2021-05-12 11:54:03pm'),
(109, '103.120.38.222', '2021-05-13 12:19:59am'),
(110, '103.120.38.222', '2021-05-13 12:25:45am'),
(111, '103.120.38.222', '2021-05-13 12:37:20am'),
(112, '103.120.38.222', '2021-05-13 12:38:45am'),
(113, '103.120.38.222', '2021-05-13 12:39:20am'),
(114, '103.120.38.222', '2021-05-13 12:41:36am'),
(115, '103.120.38.222', '2021-05-13 12:43:04am'),
(116, '103.120.38.222', '2021-05-13 12:49:29am'),
(117, '103.120.38.222', '2021-05-13 12:51:32am'),
(118, '103.120.38.222', '2021-05-13 12:51:55am'),
(119, '103.120.38.222', '2021-05-13 01:09:57am'),
(120, '103.120.38.222', '2021-05-13 01:11:30am'),
(121, '103.120.38.222', '2021-05-13 01:18:31am'),
(122, '103.120.38.222', '2021-05-13 01:18:35am'),
(123, '103.120.38.222', '2021-05-13 01:20:22am'),
(124, '103.120.38.222', '2021-05-13 01:20:38am'),
(125, '103.120.38.222', '2021-05-13 01:25:07am'),
(126, '103.120.38.222', '2021-05-13 01:27:17am'),
(127, '103.120.38.222', '2021-05-13 01:29:24am'),
(128, '66.249.88.106', '2021-05-13 01:44:37am'),
(129, '171.13.14.21', '2021-05-13 01:46:03am'),
(130, '180.163.220.5', '2021-05-13 01:46:27am'),
(131, '171.13.14.84', '2021-05-13 01:47:29am'),
(132, '42.236.10.93', '2021-05-13 01:48:08am'),
(133, '42.236.10.93', '2021-05-13 01:48:14am'),
(134, '42.236.10.78', '2021-05-13 01:48:24am'),
(135, '42.236.10.78', '2021-05-13 01:48:26am'),
(136, '185.250.39.93', '2021-05-13 01:51:03am'),
(137, '185.205.194.51', '2021-05-13 01:51:04am'),
(138, '103.120.38.222', '2021-05-13 01:52:19am'),
(139, '103.120.38.222', '2021-05-13 01:54:20am'),
(140, '103.120.38.222', '2021-05-13 01:54:42am'),
(141, '103.120.38.222', '2021-05-13 01:55:32am'),
(142, '103.120.38.222', '2021-05-13 01:57:08am'),
(143, '103.120.38.222', '2021-05-13 01:59:25am'),
(144, '103.120.38.222', '2021-05-13 01:59:58am'),
(145, '103.120.38.222', '2021-05-13 02:00:20am'),
(146, '103.120.38.222', '2021-05-13 02:00:46am'),
(147, '103.120.38.222', '2021-05-13 02:01:35am'),
(148, '103.120.38.222', '2021-05-13 02:02:57am'),
(149, '103.120.38.222', '2021-05-13 02:03:45am'),
(150, '103.120.38.222', '2021-05-13 02:03:57am'),
(151, '103.120.38.222', '2021-05-13 02:33:16am'),
(152, '103.120.38.222', '2021-05-13 02:34:17am'),
(153, '54.36.148.186', '2021-05-13 02:35:42am'),
(154, '103.120.38.222', '2021-05-13 02:37:01am'),
(155, '52.114.14.71', '2021-05-13 02:38:22am'),
(156, '103.114.97.140', '2021-05-13 02:38:31am'),
(157, '103.120.38.222', '2021-05-13 02:40:49am'),
(158, '103.120.38.222', '2021-05-13 02:49:50am'),
(159, '103.120.38.222', '2021-05-13 03:31:30am'),
(160, '173.252.83.2', '2021-05-13 03:31:49am'),
(161, '173.252.83.11', '2021-05-13 03:31:49am'),
(162, '173.252.83.23', '2021-05-13 03:31:56am'),
(163, '42.192.17.155', '2021-05-13 03:33:55am'),
(164, '103.120.38.222', '2021-05-13 04:01:32am'),
(165, '103.120.38.222', '2021-05-13 04:01:54am'),
(166, '103.120.38.222', '2021-05-13 04:04:26am'),
(167, '103.120.38.222', '2021-05-13 04:05:14am'),
(168, '103.120.38.222', '2021-05-13 04:06:45am'),
(169, '103.120.38.222', '2021-05-13 04:07:33am'),
(170, '103.120.38.222', '2021-05-13 04:07:45am'),
(171, '103.120.38.222', '2021-05-13 04:07:49am'),
(172, '103.120.38.222', '2021-05-13 04:08:17am'),
(173, '103.120.38.222', '2021-05-13 04:08:23am'),
(174, '103.120.38.222', '2021-05-13 04:08:56am'),
(175, '103.120.38.222', '2021-05-13 04:09:21am'),
(176, '103.120.38.222', '2021-05-13 04:09:58am'),
(177, '103.120.38.222', '2021-05-13 04:10:08am'),
(178, '103.120.38.222', '2021-05-13 04:10:29am'),
(179, '103.120.38.222', '2021-05-13 04:10:41am'),
(180, '103.120.38.222', '2021-05-13 04:10:55am'),
(181, '103.120.38.222', '2021-05-13 04:11:09am'),
(182, '103.120.38.222', '2021-05-13 04:11:33am'),
(183, '103.120.38.222', '2021-05-13 04:11:37am'),
(184, '103.120.38.222', '2021-05-13 04:12:07am'),
(185, '3.250.80.59', '2021-05-13 04:28:04am'),
(186, '103.120.38.222', '2021-05-13 04:41:28am'),
(187, '103.120.38.222', '2021-05-13 04:41:37am'),
(188, '103.120.38.222', '2021-05-13 04:41:56am'),
(189, '103.120.38.222', '2021-05-13 04:44:20am'),
(190, '103.120.38.222', '2021-05-13 04:44:22am'),
(191, '103.120.38.222', '2021-05-13 04:44:24am'),
(192, '103.120.38.222', '2021-05-13 04:44:28am'),
(193, '103.120.38.222', '2021-05-13 04:44:43am'),
(194, '103.120.38.222', '2021-05-13 04:44:49am'),
(195, '54.36.148.66', '2021-05-13 06:04:10am'),
(196, '52.26.23.162', '2021-05-13 07:09:47am'),
(197, '69.171.231.118', '2021-05-13 10:17:09am'),
(198, '69.171.231.112', '2021-05-13 10:17:14am'),
(199, '42.192.17.155', '2021-05-13 10:33:35am'),
(200, '18.184.195.200', '2021-05-13 10:54:33am'),
(201, '107.150.46.53', '2021-05-13 11:34:46am'),
(202, '103.120.38.222', '2021-05-13 12:38:09pm'),
(203, '103.120.38.222', '2021-05-13 12:38:59pm'),
(204, '103.120.38.222', '2021-05-13 12:39:32pm'),
(205, '103.120.38.222', '2021-05-13 12:39:49pm'),
(206, '103.120.38.222', '2021-05-13 12:40:22pm'),
(207, '103.120.38.222', '2021-05-13 12:40:22pm'),
(208, '103.120.38.222', '2021-05-13 12:40:23pm'),
(209, '103.120.38.222', '2021-05-13 12:40:23pm'),
(210, '103.120.38.222', '2021-05-13 12:41:08pm'),
(211, '103.120.38.222', '2021-05-13 12:41:22pm'),
(212, '66.249.79.88', '2021-05-13 01:57:21pm'),
(213, '74.208.31.129', '2021-05-13 02:58:54pm'),
(214, '103.230.106.35', '2021-05-13 03:58:41pm'),
(215, '103.230.106.35', '2021-05-13 03:58:57pm'),
(216, '103.120.38.222', '2021-05-13 06:30:01pm'),
(217, '107.150.46.53', '2021-05-13 07:14:40pm'),
(218, '54.36.148.0', '2021-05-13 07:32:35pm'),
(219, '138.246.253.24', '2021-05-13 09:24:48pm'),
(220, '54.36.148.196', '2021-05-13 10:32:39pm'),
(221, '172.104.11.122', '2021-05-13 10:47:22pm'),
(222, '172.104.11.122', '2021-05-13 10:47:24pm'),
(223, '172.104.13.75', '2021-05-13 10:47:26pm'),
(224, '172.104.13.75', '2021-05-13 10:47:29pm'),
(225, '103.120.38.222', '2021-05-14 12:04:54am'),
(226, '103.120.38.222', '2021-05-14 12:05:44am'),
(227, '103.120.38.222', '2021-05-14 12:05:49am'),
(228, '103.120.38.222', '2021-05-14 12:06:13am'),
(229, '103.120.38.222', '2021-05-14 12:06:36am'),
(230, '103.120.38.222', '2021-05-14 12:07:02am'),
(231, '103.120.38.222', '2021-05-14 12:07:12am'),
(232, '103.120.38.222', '2021-05-14 12:07:45am'),
(233, '103.120.38.222', '2021-05-14 12:10:40am'),
(234, '103.120.38.222', '2021-05-14 12:15:55am'),
(235, '103.120.38.222', '2021-05-14 12:16:01am'),
(236, '103.120.38.222', '2021-05-14 12:17:22am'),
(237, '103.120.38.222', '2021-05-14 12:17:36am'),
(238, '66.249.79.18', '2021-05-14 02:39:57am'),
(239, '3.250.199.139', '2021-05-14 03:27:11am'),
(240, '54.36.148.226', '2021-05-14 09:18:11am'),
(241, '54.36.148.196', '2021-05-14 02:54:51pm'),
(242, '18.236.192.61', '2021-05-14 03:15:26pm'),
(243, '34.222.230.10', '2021-05-14 03:16:10pm'),
(244, '103.155.52.48', '2021-05-14 03:35:52pm'),
(245, '54.36.148.196', '2021-05-14 11:00:39pm'),
(246, '34.96.130.5', '2021-05-15 12:28:00am'),
(247, '54.36.148.196', '2021-05-15 04:03:44am'),
(248, '34.244.175.66', '2021-05-15 04:27:24am'),
(249, '54.36.149.72', '2021-05-15 11:47:07am'),
(250, '35.163.68.44', '2021-05-15 03:22:39pm'),
(251, '54.36.148.28', '2021-05-15 04:48:39pm'),
(252, '54.36.148.196', '2021-05-16 03:00:10am'),
(253, '54.36.148.243', '2021-05-16 10:21:03am'),
(254, '199.187.126.42', '2021-05-16 10:37:55am'),
(255, '74.208.177.88', '2021-05-16 10:37:55am'),
(256, '115.127.74.82', '2021-05-16 10:53:50am'),
(257, '115.127.74.82', '2021-05-16 10:54:03am'),
(258, '185.72.54.199', '2021-05-16 02:47:36pm'),
(259, '44.229.11.167', '2021-05-16 03:15:13pm'),
(260, '34.221.142.207', '2021-05-16 03:22:51pm'),
(261, '54.244.201.204', '2021-05-16 03:29:44pm'),
(262, '115.127.74.82', '2021-05-16 04:02:24pm'),
(263, '115.127.74.82', '2021-05-16 04:02:33pm'),
(264, '115.127.74.82', '2021-05-16 04:02:45pm'),
(265, '115.127.74.82', '2021-05-16 04:02:52pm'),
(266, '115.127.74.82', '2021-05-16 04:03:04pm'),
(267, '115.127.74.82', '2021-05-16 04:03:19pm'),
(268, '115.127.74.82', '2021-05-16 04:04:16pm'),
(269, '115.127.74.82', '2021-05-16 04:04:37pm'),
(270, '115.127.74.82', '2021-05-16 04:06:34pm'),
(271, '115.127.74.82', '2021-05-16 04:08:47pm'),
(272, '115.127.74.82', '2021-05-16 04:11:39pm'),
(273, '115.127.74.82', '2021-05-16 04:12:38pm'),
(274, '115.127.74.82', '2021-05-16 04:12:54pm'),
(275, '115.127.74.82', '2021-05-16 04:13:37pm'),
(276, '115.127.74.82', '2021-05-16 04:14:37pm'),
(277, '115.127.74.82', '2021-05-16 04:15:25pm'),
(278, '66.249.79.16', '2021-05-16 04:17:00pm'),
(279, '115.127.74.82', '2021-05-16 04:18:42pm'),
(280, '115.127.74.82', '2021-05-16 04:19:55pm'),
(281, '115.127.74.82', '2021-05-16 04:21:01pm'),
(282, '115.127.74.82', '2021-05-16 04:21:31pm'),
(283, '115.127.74.82', '2021-05-16 04:28:15pm'),
(284, '115.127.74.82', '2021-05-16 04:29:00pm'),
(285, '115.127.74.82', '2021-05-16 04:31:21pm'),
(286, '54.36.148.196', '2021-05-16 04:45:56pm'),
(287, '115.127.74.82', '2021-05-16 04:46:06pm'),
(288, '115.127.74.82', '2021-05-16 04:48:18pm'),
(289, '115.127.74.82', '2021-05-16 05:04:42pm'),
(290, '115.127.74.82', '2021-05-16 05:04:46pm'),
(291, '115.127.74.82', '2021-05-16 05:17:01pm'),
(292, '115.127.74.82', '2021-05-16 05:19:37pm'),
(293, '115.127.74.82', '2021-05-16 05:23:58pm'),
(294, '54.36.148.196', '2021-05-17 01:23:10am'),
(295, '124.126.78.138', '2021-05-17 03:51:28am'),
(296, '124.126.78.168', '2021-05-17 04:28:55am'),
(297, '62.109.13.37', '2021-05-17 11:01:28am'),
(298, '54.36.148.252', '2021-05-17 11:21:31am'),
(299, '115.127.74.82', '2021-05-17 11:28:41am'),
(300, '115.127.74.82', '2021-05-17 11:33:18am'),
(301, '44.233.116.165', '2021-05-17 03:16:54pm'),
(302, '54.185.152.99', '2021-05-17 03:17:21pm'),
(303, '34.222.170.236', '2021-05-17 03:18:26pm'),
(304, '54.36.148.159', '2021-05-17 06:12:23pm'),
(305, '52.211.176.200', '2021-05-18 04:11:37am'),
(306, '54.36.148.123', '2021-05-18 07:49:20am'),
(307, '34.96.130.11', '2021-05-18 09:23:44am'),
(308, '42.236.10.75', '2021-05-18 01:02:06pm'),
(309, '27.115.124.38', '2021-05-18 01:04:52pm'),
(310, '27.115.124.38', '2021-05-18 01:04:57pm'),
(311, '42.236.10.125', '2021-05-18 01:05:04pm'),
(312, '54.36.148.175', '2021-05-18 01:17:22pm'),
(313, '124.126.78.155', '2021-05-18 01:56:35pm'),
(314, '35.163.177.132', '2021-05-18 03:17:50pm'),
(315, '51.15.205.3', '2021-05-18 06:53:01pm'),
(316, '54.229.197.136', '2021-05-18 09:31:14pm'),
(317, '43.245.123.54', '2021-05-18 09:53:02pm'),
(318, '43.245.123.54', '2021-05-18 10:19:21pm'),
(319, '42.0.6.248', '2021-05-18 10:20:02pm'),
(320, '43.245.123.54', '2021-05-18 10:20:38pm'),
(321, '27.147.243.46', '2021-05-18 10:20:51pm'),
(322, '43.245.123.54', '2021-05-18 10:21:43pm'),
(323, '172.245.113.20', '2021-05-19 03:00:06am'),
(324, '54.217.33.1', '2021-05-19 03:24:34am'),
(325, '54.36.149.87', '2021-05-19 03:51:38am'),
(326, '51.15.205.3', '2021-05-19 05:44:51am'),
(327, '54.36.148.228', '2021-05-19 07:11:13am'),
(328, '69.171.231.120', '2021-05-19 09:23:44am'),
(329, '173.252.107.19', '2021-05-19 09:23:46am'),
(330, '173.252.107.1', '2021-05-19 09:23:46am'),
(331, '173.252.107.12', '2021-05-19 09:23:46am'),
(332, '173.252.107.120', '2021-05-19 09:23:46am'),
(333, '173.252.107.120', '2021-05-19 09:23:46am'),
(334, '173.252.107.4', '2021-05-19 09:23:46am'),
(335, '173.252.107.1', '2021-05-19 09:23:46am'),
(336, '173.252.107.116', '2021-05-19 09:23:46am'),
(337, '173.252.107.119', '2021-05-19 09:23:46am'),
(338, '173.252.107.10', '2021-05-19 09:23:47am'),
(339, '191.101.217.30', '2021-05-19 12:06:03pm'),
(340, '35.179.75.4', '2021-05-19 02:35:49pm'),
(341, '54.191.112.246', '2021-05-19 03:12:19pm'),
(342, '34.220.8.244', '2021-05-19 03:12:27pm'),
(343, '34.216.224.184', '2021-05-19 03:25:11pm'),
(344, '115.127.74.82', '2021-05-19 04:13:16pm'),
(345, '54.244.84.42', '2021-05-19 04:53:32pm'),
(346, '103.120.38.182', '2021-05-19 08:08:21pm'),
(347, '66.249.79.4', '2021-05-19 10:00:55pm'),
(348, '52.54.248.193', '2021-05-19 11:05:44pm'),
(349, '173.252.83.9', '2021-05-20 12:38:38am'),
(350, '173.252.83.9', '2021-05-20 12:38:38am'),
(351, '66.249.79.30', '2021-05-20 02:43:01am'),
(352, '34.242.227.173', '2021-05-20 03:30:28am'),
(353, '103.18.82.201', '2021-05-20 04:06:42am'),
(354, '54.36.149.48', '2021-05-20 04:26:14am'),
(355, '54.36.148.196', '2021-05-20 08:30:42am'),
(356, '66.249.79.4', '2021-05-20 08:53:39am'),
(357, '61.135.15.130', '2021-05-20 10:00:14am'),
(358, '173.252.87.116', '2021-05-20 10:19:22am'),
(359, '173.252.87.30', '2021-05-20 10:19:22am'),
(360, '31.13.115.24', '2021-05-20 10:19:22am'),
(361, '31.13.115.113', '2021-05-20 10:19:22am'),
(362, '31.13.115.118', '2021-05-20 10:19:22am'),
(363, '31.13.115.2', '2021-05-20 10:19:22am'),
(364, '31.13.115.11', '2021-05-20 10:19:22am'),
(365, '42.236.10.93', '2021-05-20 11:06:17am'),
(366, '34.255.180.79', '2021-05-20 01:30:33pm'),
(367, '34.255.180.79', '2021-05-20 01:40:03pm'),
(368, '115.127.74.82', '2021-05-20 02:01:37pm'),
(369, '115.127.74.82', '2021-05-20 02:01:53pm'),
(370, '115.127.74.82', '2021-05-20 02:15:07pm'),
(371, '115.127.74.82', '2021-05-20 02:16:13pm'),
(372, '115.127.74.82', '2021-05-20 02:22:39pm'),
(373, '115.127.74.82', '2021-05-20 02:31:13pm'),
(374, '115.127.74.82', '2021-05-20 02:32:43pm'),
(375, '115.127.74.82', '2021-05-20 02:33:57pm'),
(376, '115.127.74.82', '2021-05-20 02:34:17pm'),
(377, '115.127.74.82', '2021-05-20 02:34:26pm'),
(378, '115.127.74.82', '2021-05-20 02:38:36pm'),
(379, '115.127.74.82', '2021-05-20 02:42:58pm'),
(380, '115.127.74.82', '2021-05-20 02:43:03pm'),
(381, '115.127.74.82', '2021-05-20 02:43:42pm'),
(382, '115.127.74.82', '2021-05-20 02:43:59pm'),
(383, '115.127.74.82', '2021-05-20 03:00:45pm'),
(384, '115.127.74.82', '2021-05-20 03:01:00pm'),
(385, '115.127.74.82', '2021-05-20 03:01:04pm'),
(386, '69.171.231.116', '2021-05-20 03:26:50pm'),
(387, '54.202.10.124', '2021-05-20 03:44:40pm'),
(388, '54.188.202.240', '2021-05-20 03:58:04pm'),
(389, '173.252.107.14', '2021-05-20 04:41:29pm'),
(390, '173.252.107.13', '2021-05-20 04:41:29pm'),
(391, '173.252.107.117', '2021-05-20 04:41:29pm'),
(392, '173.252.107.116', '2021-05-20 04:41:30pm'),
(393, '173.252.107.2', '2021-05-20 04:41:30pm'),
(394, '173.252.107.119', '2021-05-20 04:41:30pm'),
(395, '173.252.107.19', '2021-05-20 04:41:30pm'),
(396, '173.252.107.10', '2021-05-20 04:41:31pm'),
(397, '103.67.158.92', '2021-05-20 07:24:51pm'),
(398, '103.67.158.92', '2021-05-20 07:25:08pm'),
(399, '103.67.158.92', '2021-05-20 07:26:24pm'),
(400, '103.67.158.92', '2021-05-20 07:29:10pm'),
(401, '103.67.158.92', '2021-05-20 07:29:20pm'),
(402, '103.67.158.92', '2021-05-20 07:29:58pm'),
(403, '103.67.158.92', '2021-05-20 07:34:14pm'),
(404, '103.67.158.92', '2021-05-20 07:34:28pm'),
(405, '103.67.158.92', '2021-05-20 07:34:30pm'),
(406, '103.67.158.92', '2021-05-20 07:34:37pm'),
(407, '103.67.158.92', '2021-05-20 07:36:22pm'),
(408, '103.67.158.92', '2021-05-20 07:36:46pm'),
(409, '103.67.158.92', '2021-05-20 07:36:55pm'),
(410, '103.67.158.92', '2021-05-20 07:40:16pm'),
(411, '54.189.67.101', '2021-05-20 07:56:21pm'),
(412, '173.252.83.24', '2021-05-20 08:09:30pm'),
(413, '173.252.83.19', '2021-05-20 08:09:30pm'),
(414, '173.252.83.2', '2021-05-20 08:09:30pm'),
(415, '173.252.83.111', '2021-05-20 08:09:30pm'),
(416, '31.13.127.32', '2021-05-20 08:09:31pm'),
(417, '173.252.83.119', '2021-05-20 08:09:31pm'),
(418, '173.252.83.18', '2021-05-20 08:09:32pm'),
(419, '103.67.158.92', '2021-05-20 09:09:59pm'),
(420, '103.120.38.222', '2021-05-20 09:36:27pm'),
(421, '159.253.31.111', '2021-05-20 10:11:05pm'),
(422, '54.36.148.218', '2021-05-21 12:18:11am'),
(423, '3.250.52.135', '2021-05-21 03:15:36am'),
(424, '61.135.15.136', '2021-05-21 04:19:01am'),
(425, '54.36.148.172', '2021-05-21 05:18:36am'),
(426, '163.172.180.25', '2021-05-21 06:02:11am'),
(427, '217.12.221.2', '2021-05-21 08:26:15am'),
(428, '89.179.119.216', '2021-05-21 09:26:53am'),
(429, '34.86.35.15', '2021-05-21 09:59:57am'),
(430, '93.158.91.208', '2021-05-21 11:05:06am'),
(431, '103.112.65.202', '2021-05-21 12:21:43pm'),
(432, '52.32.50.164', '2021-05-21 03:43:27pm'),
(433, '54.188.49.200', '2021-05-21 03:43:28pm'),
(434, '35.164.52.162', '2021-05-21 03:47:13pm'),
(435, '34.216.169.73', '2021-05-21 03:48:11pm'),
(436, '52.10.241.226', '2021-05-21 03:50:24pm'),
(437, '34.209.126.116', '2021-05-21 04:33:50pm'),
(438, '123.253.65.80', '2021-05-21 04:44:46pm'),
(439, '69.171.231.116', '2021-05-21 05:20:23pm'),
(440, '69.171.231.116', '2021-05-21 05:20:31pm'),
(441, '173.252.107.113', '2021-05-21 05:20:34pm'),
(442, '173.252.107.4', '2021-05-21 05:20:34pm'),
(443, '173.252.107.17', '2021-05-21 05:20:34pm'),
(444, '173.252.107.15', '2021-05-21 05:20:34pm'),
(445, '173.252.107.10', '2021-05-21 05:20:34pm'),
(446, '173.252.111.24', '2021-05-21 05:20:34pm'),
(447, '173.252.111.15', '2021-05-21 05:20:34pm'),
(448, '173.252.111.11', '2021-05-21 05:20:35pm'),
(449, '173.252.111.13', '2021-05-21 05:20:35pm'),
(450, '54.36.149.106', '2021-05-21 07:46:38pm'),
(451, '216.19.195.17', '2021-05-21 08:22:14pm'),
(452, '103.120.38.182', '2021-05-21 10:37:28pm'),
(453, '54.36.148.233', '2021-05-21 11:00:47pm'),
(454, '138.246.253.24', '2021-05-21 11:34:44pm'),
(455, '171.13.14.58', '2021-05-22 01:50:21am'),
(456, '171.13.14.54', '2021-05-22 01:51:09am'),
(457, '171.13.14.53', '2021-05-22 01:51:10am'),
(458, '54.183.133.218', '2021-05-22 03:10:32am'),
(459, '69.171.249.13', '2021-05-22 04:03:15am'),
(460, '69.171.249.17', '2021-05-22 04:03:16am'),
(461, '54.216.230.114', '2021-05-22 04:06:46am'),
(462, '66.249.73.138', '2021-05-22 04:57:30am'),
(463, '193.200.151.103', '2021-05-22 05:41:10am'),
(464, '173.252.83.21', '2021-05-22 09:40:41am'),
(465, '173.252.83.10', '2021-05-22 09:40:41am'),
(466, '173.252.83.113', '2021-05-22 09:40:41am'),
(467, '173.252.83.9', '2021-05-22 09:40:41am'),
(468, '173.252.83.11', '2021-05-22 09:40:41am'),
(469, '173.252.83.14', '2021-05-22 09:40:42am'),
(470, '54.36.148.196', '2021-05-22 01:42:54pm'),
(471, '54.203.136.235', '2021-05-22 03:14:56pm'),
(472, '52.40.158.14', '2021-05-22 03:15:08pm'),
(473, '34.220.170.233', '2021-05-22 03:15:25pm'),
(474, '34.216.188.255', '2021-05-22 03:15:27pm'),
(475, '66.249.79.30', '2021-05-22 04:16:46pm'),
(476, '37.111.196.25', '2021-05-22 04:26:44pm'),
(477, '34.221.10.132', '2021-05-22 05:45:43pm'),
(478, '54.36.148.195', '2021-05-22 06:39:01pm'),
(479, '27.123.255.182', '2021-05-22 08:32:00pm'),
(480, '31.13.127.119', '2021-05-22 11:54:32pm'),
(481, '31.13.127.17', '2021-05-22 11:54:32pm'),
(482, '66.249.79.30', '2021-05-23 01:57:10am'),
(483, '54.36.148.196', '2021-05-23 02:30:22am'),
(484, '74.124.24.17', '2021-05-23 06:02:38am'),
(485, '173.252.87.3', '2021-05-23 09:30:29am'),
(486, '173.252.87.120', '2021-05-23 09:30:30am'),
(487, '54.36.148.55', '2021-05-23 09:59:09am'),
(488, '115.127.74.82', '2021-05-23 10:17:36am'),
(489, '115.127.74.82', '2021-05-23 10:17:49am'),
(490, '115.127.74.82', '2021-05-23 10:18:08am'),
(491, '31.13.127.25', '2021-05-23 01:14:38pm'),
(492, '31.13.127.1', '2021-05-23 01:14:38pm'),
(493, '31.13.127.10', '2021-05-23 01:14:38pm'),
(494, '31.13.127.117', '2021-05-23 01:14:38pm'),
(495, '31.13.127.30', '2021-05-23 01:14:38pm'),
(496, '31.13.127.13', '2021-05-23 01:14:39pm'),
(497, '31.13.127.16', '2021-05-23 01:14:39pm'),
(498, '31.13.127.6', '2021-05-23 01:14:39pm'),
(499, '54.36.148.168', '2021-05-23 03:52:19pm'),
(500, '66.220.149.19', '2021-05-23 04:02:37pm'),
(501, '66.220.149.54', '2021-05-23 04:02:37pm'),
(502, '66.220.149.61', '2021-05-23 04:02:37pm'),
(503, '66.220.149.113', '2021-05-23 04:02:37pm'),
(504, '66.220.149.112', '2021-05-23 04:02:37pm'),
(505, '31.13.127.14', '2021-05-23 04:02:38pm'),
(506, '31.13.127.24', '2021-05-23 04:02:38pm'),
(507, '66.220.149.14', '2021-05-23 04:02:38pm'),
(508, '31.13.127.8', '2021-05-23 04:02:39pm'),
(509, '34.219.37.27', '2021-05-23 04:07:47pm'),
(510, '34.208.196.175', '2021-05-23 04:07:48pm'),
(511, '54.186.92.96', '2021-05-23 04:08:31pm'),
(512, '52.39.9.142', '2021-05-23 04:09:51pm'),
(513, '34.214.240.9', '2021-05-23 04:10:36pm'),
(514, '173.252.107.18', '2021-05-23 06:33:47pm'),
(515, '173.252.107.17', '2021-05-23 06:33:47pm'),
(516, '173.252.107.116', '2021-05-23 06:33:47pm'),
(517, '173.252.107.1', '2021-05-23 06:33:47pm'),
(518, '173.252.107.116', '2021-05-23 06:33:47pm'),
(519, '173.252.107.4', '2021-05-23 06:33:48pm'),
(520, '173.252.107.1', '2021-05-23 06:33:48pm'),
(521, '31.13.115.117', '2021-05-23 09:04:42pm'),
(522, '31.13.115.18', '2021-05-23 09:04:42pm'),
(523, '31.13.115.14', '2021-05-23 09:04:42pm'),
(524, '31.13.115.1', '2021-05-23 09:04:42pm'),
(525, '31.13.115.118', '2021-05-23 09:04:42pm'),
(526, '173.252.83.22', '2021-05-23 09:04:42pm'),
(527, '173.252.83.19', '2021-05-23 09:04:42pm'),
(528, '173.252.83.18', '2021-05-23 09:04:42pm'),
(529, '31.13.115.10', '2021-05-23 09:04:43pm'),
(530, '31.13.115.111', '2021-05-23 09:04:43pm'),
(531, '103.96.36.42', '2021-05-23 09:41:42pm'),
(532, '58.53.128.234', '2021-05-24 12:15:09am'),
(533, '69.171.249.118', '2021-05-24 01:10:59am'),
(534, '69.171.249.4', '2021-05-24 01:10:59am'),
(535, '69.171.249.111', '2021-05-24 01:10:59am'),
(536, '69.171.249.4', '2021-05-24 01:10:59am'),
(537, '69.171.249.6', '2021-05-24 01:10:59am'),
(538, '69.171.249.10', '2021-05-24 01:10:59am'),
(539, '66.249.79.2', '2021-05-24 01:49:13am'),
(540, '54.36.149.17', '2021-05-24 02:10:38am'),
(541, '34.216.71.189', '2021-05-24 06:05:29am'),
(542, '54.36.148.40', '2021-05-24 06:36:19am'),
(543, '173.252.107.23', '2021-05-24 09:52:58am'),
(544, '173.252.107.113', '2021-05-24 09:52:58am'),
(545, '34.221.53.237', '2021-05-24 03:38:36pm'),
(546, '54.149.26.19', '2021-05-24 03:40:36pm'),
(547, '54.71.178.48', '2021-05-24 03:40:58pm'),
(548, '34.214.35.30', '2021-05-24 03:49:59pm'),
(549, '34.209.143.28', '2021-05-24 03:50:03pm'),
(550, '54.212.129.118', '2021-05-24 03:55:34pm'),
(551, '54.36.148.45', '2021-05-24 09:06:49pm'),
(552, '103.19.252.166', '2021-05-24 09:09:59pm'),
(553, '103.138.125.197', '2021-05-25 12:58:16am'),
(554, '103.138.125.197', '2021-05-25 01:08:16am'),
(555, '54.36.148.84', '2021-05-25 02:29:21am'),
(556, '54.194.181.249', '2021-05-25 03:16:01am'),
(557, '162.55.179.56', '2021-05-25 05:24:53am'),
(558, '54.36.148.196', '2021-05-25 08:24:01am'),
(559, '18.236.204.217', '2021-05-25 03:12:09pm'),
(560, '54.200.66.91', '2021-05-25 03:12:09pm'),
(561, '54.184.232.126', '2021-05-25 03:13:14pm'),
(562, '34.220.249.137', '2021-05-25 03:17:02pm'),
(563, '185.119.81.108', '2021-05-25 04:14:38pm'),
(564, '185.119.81.108', '2021-05-25 04:14:39pm'),
(565, '185.119.81.108', '2021-05-25 04:14:40pm'),
(566, '103.120.38.222', '2021-05-25 10:06:06pm'),
(567, '103.120.38.222', '2021-05-25 10:06:43pm'),
(568, '103.120.38.222', '2021-05-25 10:06:45pm'),
(569, '103.120.38.222', '2021-05-25 10:06:51pm'),
(570, '103.120.38.222', '2021-05-25 10:07:06pm'),
(571, '103.120.38.222', '2021-05-25 10:07:12pm'),
(572, '103.120.38.222', '2021-05-25 10:08:24pm'),
(573, '103.120.38.222', '2021-05-25 10:08:25pm'),
(574, '103.120.38.222', '2021-05-25 10:08:27pm'),
(575, '103.120.38.222', '2021-05-25 10:10:04pm'),
(576, '103.120.38.222', '2021-05-25 10:11:22pm'),
(577, '103.120.38.222', '2021-05-25 10:12:12pm'),
(578, '103.120.38.222', '2021-05-25 10:13:47pm'),
(579, '103.120.38.222', '2021-05-25 10:13:53pm'),
(580, '103.120.38.222', '2021-05-25 10:14:11pm'),
(581, '103.120.38.222', '2021-05-25 10:14:14pm'),
(582, '93.158.91.233', '2021-05-25 10:17:00pm'),
(583, '103.120.38.222', '2021-05-25 10:20:46pm'),
(584, '103.120.38.222', '2021-05-25 10:20:50pm'),
(585, '103.120.38.222', '2021-05-25 10:20:54pm'),
(586, '103.120.38.222', '2021-05-25 10:21:00pm'),
(587, '103.120.38.222', '2021-05-25 10:21:02pm'),
(588, '103.120.38.222', '2021-05-25 10:21:06pm'),
(589, '103.120.38.222', '2021-05-25 10:21:16pm'),
(590, '103.120.38.222', '2021-05-25 10:21:21pm'),
(591, '103.120.38.222', '2021-05-25 10:21:26pm'),
(592, '103.120.38.222', '2021-05-25 10:21:28pm'),
(593, '103.120.38.222', '2021-05-25 10:21:33pm'),
(594, '103.120.38.222', '2021-05-25 10:21:46pm'),
(595, '103.120.38.222', '2021-05-25 10:21:49pm'),
(596, '103.120.38.222', '2021-05-25 10:21:58pm'),
(597, '103.120.38.222', '2021-05-25 10:22:03pm'),
(598, '103.120.38.222', '2021-05-25 10:22:08pm'),
(599, '103.120.38.222', '2021-05-25 10:22:10pm'),
(600, '103.120.38.222', '2021-05-25 10:23:17pm'),
(601, '103.120.38.222', '2021-05-25 10:23:21pm'),
(602, '103.120.38.222', '2021-05-25 10:23:26pm'),
(603, '103.120.38.222', '2021-05-25 10:23:30pm'),
(604, '54.36.148.184', '2021-05-25 10:45:22pm'),
(605, '18.237.173.173', '2021-05-26 01:43:51am'),
(606, '54.170.186.244', '2021-05-26 03:37:10am'),
(607, '54.36.148.222', '2021-05-26 04:31:37am'),
(608, '59.153.103.20', '2021-05-26 01:38:38pm'),
(609, '18.236.184.175', '2021-05-26 03:23:41pm'),
(610, '34.221.234.104', '2021-05-26 03:25:52pm'),
(611, '54.191.85.139', '2021-05-26 03:26:14pm'),
(612, '54.184.36.39', '2021-05-26 03:27:42pm'),
(613, '34.96.130.14', '2021-05-26 03:34:07pm'),
(614, '54.244.41.158', '2021-05-26 04:18:51pm'),
(615, '54.191.121.69', '2021-05-26 04:19:38pm'),
(616, '54.36.148.21', '2021-05-26 05:28:10pm'),
(617, '196.242.178.22', '2021-05-26 05:53:59pm'),
(618, '103.25.251.225', '2021-05-26 08:38:08pm'),
(619, '216.19.195.83', '2021-05-26 10:29:11pm'),
(620, '54.36.148.196', '2021-05-26 11:55:32pm'),
(621, '54.154.170.56', '2021-05-27 03:40:22am'),
(622, '38.122.112.147', '2021-05-27 04:19:53am'),
(623, '52.151.32.41', '2021-05-27 07:41:44am'),
(624, '138.246.253.24', '2021-05-27 11:37:31am'),
(625, '115.127.128.194', '2021-05-27 02:41:52pm'),
(626, '54.36.148.178', '2021-05-27 03:34:52pm'),
(627, '52.24.69.11', '2021-05-27 03:46:58pm'),
(628, '34.217.106.96', '2021-05-27 03:54:24pm'),
(629, '34.223.3.20', '2021-05-27 03:54:56pm'),
(630, '34.219.52.171', '2021-05-27 03:57:52pm'),
(631, '34.219.52.171', '2021-05-27 04:02:16pm'),
(632, '34.218.59.40', '2021-05-27 04:03:16pm'),
(633, '157.55.39.58', '2021-05-27 04:36:31pm'),
(634, '54.36.148.226', '2021-05-27 08:02:39pm'),
(635, '103.166.58.18', '2021-05-27 09:41:22pm'),
(636, '103.166.58.18', '2021-05-27 09:41:28pm'),
(637, '103.166.58.18', '2021-05-27 09:42:42pm'),
(638, '52.50.86.102', '2021-05-27 10:25:14pm'),
(639, '66.249.79.30', '2021-05-28 02:54:29am'),
(640, '173.252.87.3', '2021-05-28 04:01:40am'),
(641, '173.252.87.23', '2021-05-28 04:01:40am'),
(642, '31.13.127.22', '2021-05-28 04:01:40am'),
(643, '31.13.127.2', '2021-05-28 04:01:40am'),
(644, '31.13.127.22', '2021-05-28 04:01:40am'),
(645, '31.13.127.16', '2021-05-28 04:01:40am'),
(646, '31.13.127.11', '2021-05-28 04:01:40am'),
(647, '31.13.127.22', '2021-05-28 04:01:41am'),
(648, '34.240.96.58', '2021-05-28 04:10:09am'),
(649, '23.94.229.203', '2021-05-28 06:53:59am'),
(650, '66.220.149.50', '2021-05-28 07:14:36am'),
(651, '66.220.149.45', '2021-05-28 07:14:36am'),
(652, '103.91.144.18', '2021-05-28 11:37:36am'),
(653, '103.91.144.18', '2021-05-28 11:37:50am'),
(654, '103.91.144.18', '2021-05-28 11:38:40am'),
(655, '103.91.144.18', '2021-05-28 11:38:59am'),
(656, '103.91.144.18', '2021-05-28 11:39:04am'),
(657, '103.91.144.18', '2021-05-28 11:39:35am'),
(658, '103.91.144.18', '2021-05-28 11:39:42am'),
(659, '103.91.144.18', '2021-05-28 11:39:47am'),
(660, '103.91.144.18', '2021-05-28 11:41:51am'),
(661, '103.91.144.18', '2021-05-28 11:41:55am'),
(662, '103.91.144.18', '2021-05-28 11:42:00am'),
(663, '103.91.144.18', '2021-05-28 11:42:03am'),
(664, '103.91.144.18', '2021-05-28 11:42:10am'),
(665, '103.91.144.18', '2021-05-28 11:42:16am'),
(666, '103.91.144.18', '2021-05-28 11:43:52am'),
(667, '103.91.144.18', '2021-05-28 11:44:48am'),
(668, '103.91.144.18', '2021-05-28 11:45:04am'),
(669, '103.91.144.18', '2021-05-28 11:45:05am'),
(670, '103.91.144.18', '2021-05-28 11:47:10am'),
(671, '103.91.144.18', '2021-05-28 11:47:31am'),
(672, '103.91.144.18', '2021-05-28 11:47:35am'),
(673, '103.91.144.18', '2021-05-28 11:47:41am'),
(674, '103.91.144.18', '2021-05-28 11:47:45am'),
(675, '103.91.144.18', '2021-05-28 11:47:49am'),
(676, '103.91.144.18', '2021-05-28 11:47:51am'),
(677, '103.91.144.18', '2021-05-28 11:47:55am'),
(678, '103.91.144.18', '2021-05-28 11:47:58am'),
(679, '103.91.144.18', '2021-05-28 11:48:00am'),
(680, '103.91.144.18', '2021-05-28 11:48:03am'),
(681, '103.91.144.18', '2021-05-28 11:48:06am'),
(682, '103.91.144.18', '2021-05-28 11:48:23am'),
(683, '103.91.144.18', '2021-05-28 11:48:30am'),
(684, '103.91.144.18', '2021-05-28 11:48:43am'),
(685, '103.91.144.18', '2021-05-28 11:49:50am'),
(686, '103.91.144.18', '2021-05-28 11:49:51am'),
(687, '103.91.144.18', '2021-05-28 11:50:07am'),
(688, '103.91.144.18', '2021-05-28 11:50:07am'),
(689, '103.91.144.18', '2021-05-28 12:27:22pm'),
(690, '103.91.144.18', '2021-05-28 12:28:00pm'),
(691, '103.91.144.18', '2021-05-28 12:28:01pm'),
(692, '103.91.144.18', '2021-05-28 12:28:11pm'),
(693, '103.120.38.222', '2021-05-28 12:30:01pm'),
(694, '54.36.149.63', '2021-05-28 12:31:23pm'),
(695, '103.91.144.18', '2021-05-28 12:34:44pm'),
(696, '103.91.144.18', '2021-05-28 12:34:47pm'),
(697, '66.249.79.2', '2021-05-28 12:40:58pm'),
(698, '103.91.144.18', '2021-05-28 12:42:12pm'),
(699, '103.91.144.18', '2021-05-28 12:49:00pm'),
(700, '103.91.144.18', '2021-05-28 12:49:03pm'),
(701, '103.91.144.18', '2021-05-28 12:49:07pm'),
(702, '103.91.144.18', '2021-05-28 12:49:08pm'),
(703, '103.91.144.18', '2021-05-28 01:03:46pm'),
(704, '103.91.144.18', '2021-05-28 01:03:47pm'),
(705, '103.91.144.18', '2021-05-28 01:03:48pm'),
(706, '31.13.115.119', '2021-05-28 01:59:01pm'),
(707, '31.13.115.10', '2021-05-28 01:59:01pm'),
(708, '31.13.115.120', '2021-05-28 01:59:01pm'),
(709, '31.13.115.117', '2021-05-28 01:59:01pm'),
(710, '31.13.115.116', '2021-05-28 01:59:01pm'),
(711, '31.13.115.1', '2021-05-28 01:59:03pm'),
(712, '31.13.115.116', '2021-05-28 01:59:03pm'),
(713, '31.13.115.23', '2021-05-28 01:59:03pm'),
(714, '198.54.125.92', '2021-05-28 02:55:57pm'),
(715, '198.54.125.92', '2021-05-28 02:56:17pm'),
(716, '54.184.109.25', '2021-05-28 03:16:00pm'),
(717, '54.185.255.126', '2021-05-28 03:16:40pm'),
(718, '103.120.38.222', '2021-05-28 03:18:02pm'),
(719, '34.222.251.10', '2021-05-28 03:42:24pm'),
(720, '167.99.127.159', '2021-05-28 04:57:07pm'),
(721, '54.36.148.196', '2021-05-28 06:59:48pm'),
(722, '103.120.38.222', '2021-05-28 08:57:24pm'),
(723, '173.252.79.28', '2021-05-28 09:44:04pm'),
(724, '173.252.79.5', '2021-05-28 09:44:04pm'),
(725, '173.252.111.17', '2021-05-28 09:44:05pm'),
(726, '173.252.111.11', '2021-05-28 09:44:05pm'),
(727, '173.252.111.10', '2021-05-28 09:44:05pm'),
(728, '173.252.111.111', '2021-05-28 09:44:05pm'),
(729, '173.252.111.119', '2021-05-28 09:44:05pm'),
(730, '173.252.111.22', '2021-05-28 09:44:05pm'),
(731, '173.252.111.21', '2021-05-28 09:44:05pm'),
(732, '173.252.111.111', '2021-05-28 09:44:06pm'),
(733, '103.127.3.7', '2021-05-28 09:48:06pm'),
(734, '66.249.79.30', '2021-05-29 02:50:15am'),
(735, '54.193.168.183', '2021-05-29 03:21:59am'),
(736, '54.170.230.190', '2021-05-29 04:15:32am'),
(737, '34.105.8.199', '2021-05-29 07:03:59am'),
(738, '35.230.27.103', '2021-05-29 07:04:17am'),
(739, '35.197.48.215', '2021-05-29 07:04:29am'),
(740, '35.233.243.166', '2021-05-29 07:04:30am'),
(741, '35.199.158.3', '2021-05-29 07:04:30am'),
(742, '54.36.149.9', '2021-05-29 12:51:16pm'),
(743, '34.216.0.147', '2021-05-29 03:34:08pm'),
(744, '34.222.115.239', '2021-05-29 03:35:04pm'),
(745, '52.37.95.251', '2021-05-29 03:35:44pm'),
(746, '66.249.79.2', '2021-05-29 03:50:15pm'),
(747, '69.171.231.1', '2021-05-29 05:08:01pm'),
(748, '66.220.149.117', '2021-05-29 05:08:04pm'),
(749, '66.220.149.44', '2021-05-29 05:08:04pm'),
(750, '66.220.149.6', '2021-05-29 05:08:04pm'),
(751, '66.220.149.43', '2021-05-29 05:08:04pm'),
(752, '66.220.149.26', '2021-05-29 05:08:04pm'),
(753, '66.220.149.60', '2021-05-29 05:08:04pm'),
(754, '66.220.149.12', '2021-05-29 05:08:04pm'),
(755, '66.220.149.4', '2021-05-29 05:08:04pm'),
(756, '66.220.149.15', '2021-05-29 05:08:04pm'),
(757, '66.220.149.113', '2021-05-29 05:08:05pm'),
(758, '66.220.149.40', '2021-05-29 05:08:05pm'),
(759, '66.220.149.17', '2021-05-29 05:08:05pm'),
(760, '54.36.148.196', '2021-05-29 05:43:41pm'),
(761, '45.87.83.124', '2021-05-29 06:28:04pm'),
(762, '103.120.38.182', '2021-05-29 06:32:11pm'),
(763, '192.99.18.122', '2021-05-29 06:45:29pm'),
(764, '192.99.18.122', '2021-05-29 06:45:49pm'),
(765, '103.15.216.130', '2021-05-29 08:18:20pm'),
(766, '192.99.18.136', '2021-05-30 01:54:39am'),
(767, '192.99.18.136', '2021-05-30 01:55:20am'),
(768, '103.118.152.225', '2021-05-30 02:25:55am'),
(769, '149.56.150.41', '2021-05-30 03:50:57am'),
(770, '149.56.150.41', '2021-05-30 03:51:04am'),
(771, '149.56.150.41', '2021-05-30 03:51:20am'),
(772, '66.249.79.2', '2021-05-30 03:52:40am'),
(773, '51.77.246.204', '2021-05-30 03:57:54am'),
(774, '52.53.214.126', '2021-05-30 05:29:13am'),
(775, '66.249.79.2', '2021-05-30 10:13:31am'),
(776, '54.36.148.196', '2021-05-30 03:07:48pm'),
(777, '66.249.79.30', '2021-05-30 06:38:59pm'),
(778, '66.249.79.2', '2021-05-30 06:39:00pm'),
(779, '113.11.40.46', '2021-05-30 07:21:35pm'),
(780, '54.36.148.196', '2021-05-30 08:53:50pm'),
(781, '173.252.127.22', '2021-05-30 10:19:54pm'),
(782, '173.252.127.45', '2021-05-30 10:19:56pm'),
(783, '54.190.0.238', '2021-05-30 10:58:17pm'),
(784, '54.202.91.99', '2021-05-30 10:58:50pm'),
(785, '54.189.127.99', '2021-05-30 11:29:51pm'),
(786, '52.11.102.163', '2021-05-30 11:30:22pm'),
(787, '52.42.175.30', '2021-05-30 11:44:03pm'),
(788, '18.237.148.160', '2021-05-30 11:44:21pm'),
(789, '103.161.67.45', '2021-05-30 11:51:54pm'),
(790, '103.161.67.45', '2021-05-31 12:02:49am'),
(791, '34.219.87.128', '2021-05-31 12:03:25am'),
(792, '18.237.127.248', '2021-05-31 12:03:39am'),
(793, '103.16.25.253', '2021-05-31 12:06:11am'),
(794, '52.38.164.78', '2021-05-31 01:06:54am'),
(795, '18.237.148.160', '2021-05-31 01:07:44am'),
(796, '52.41.73.220', '2021-05-31 01:58:29am'),
(797, '18.237.148.160', '2021-05-31 01:59:02am'),
(798, '52.43.126.53', '2021-05-31 02:08:28am'),
(799, '35.164.153.80', '2021-05-31 02:09:01am'),
(800, '54.191.238.255', '2021-05-31 02:09:27am'),
(801, '34.222.106.171', '2021-05-31 02:12:06am'),
(802, '54.203.88.43', '2021-05-31 02:28:32am'),
(803, '34.219.180.109', '2021-05-31 02:28:58am'),
(804, '54.218.141.187', '2021-05-31 03:40:21am'),
(805, '173.252.95.28', '2021-05-31 04:49:07am'),
(806, '103.133.200.162', '2021-05-31 09:33:30am'),
(807, '115.127.74.82', '2021-05-31 10:13:30am'),
(808, '115.127.74.82', '2021-05-31 10:18:43am'),
(809, '115.127.74.82', '2021-05-31 10:19:09am'),
(810, '115.127.74.82', '2021-05-31 10:20:16am'),
(811, '115.127.74.82', '2021-05-31 10:21:52am'),
(812, '115.127.74.82', '2021-05-31 10:22:30am'),
(813, '115.127.74.82', '2021-05-31 10:25:28am'),
(814, '115.127.74.82', '2021-05-31 10:28:46am'),
(815, '115.127.74.82', '2021-05-31 10:29:19am'),
(816, '115.127.74.82', '2021-05-31 10:29:36am'),
(817, '115.127.74.82', '2021-05-31 10:30:22am'),
(818, '115.127.74.82', '2021-05-31 10:31:26am'),
(819, '115.127.74.82', '2021-05-31 10:32:17am'),
(820, '115.127.74.82', '2021-05-31 10:32:51am'),
(821, '115.127.74.82', '2021-05-31 10:33:21am'),
(822, '115.127.74.82', '2021-05-31 10:33:34am'),
(823, '115.127.74.82', '2021-05-31 10:33:38am'),
(824, '115.127.74.82', '2021-05-31 10:33:56am'),
(825, '115.127.74.82', '2021-05-31 10:34:21am'),
(826, '115.127.74.82', '2021-05-31 10:55:56am'),
(827, '115.127.74.82', '2021-05-31 10:56:22am'),
(828, '115.127.74.82', '2021-05-31 10:57:43am'),
(829, '115.127.74.82', '2021-05-31 10:58:14am'),
(830, '115.127.74.82', '2021-05-31 10:58:51am'),
(831, '115.127.74.82', '2021-05-31 10:59:19am'),
(832, '115.127.74.82', '2021-05-31 10:59:42am'),
(833, '115.127.74.82', '2021-05-31 11:01:26am'),
(834, '115.127.74.82', '2021-05-31 11:01:41am'),
(835, '115.127.74.82', '2021-05-31 11:05:12am'),
(836, '115.127.74.82', '2021-05-31 11:06:34am'),
(837, '115.127.74.82', '2021-05-31 11:06:42am'),
(838, '115.127.74.82', '2021-05-31 11:09:41am'),
(839, '115.127.74.82', '2021-05-31 11:12:29am'),
(840, '115.127.74.82', '2021-05-31 11:20:22am'),
(841, '115.127.74.82', '2021-05-31 11:24:39am'),
(842, '115.127.74.82', '2021-05-31 11:24:49am'),
(843, '115.127.74.82', '2021-05-31 11:25:59am'),
(844, '115.127.74.82', '2021-05-31 11:36:11am'),
(845, '115.127.74.82', '2021-05-31 11:37:12am'),
(846, '115.127.74.82', '2021-05-31 11:38:21am'),
(847, '115.127.74.82', '2021-05-31 11:48:10am'),
(848, '115.127.74.82', '2021-05-31 11:49:12am'),
(849, '115.127.74.82', '2021-05-31 11:50:07am'),
(850, '115.127.74.82', '2021-05-31 11:51:30am'),
(851, '115.127.74.82', '2021-05-31 11:53:25am'),
(852, '115.127.74.82', '2021-05-31 11:53:51am'),
(853, '115.127.74.82', '2021-05-31 11:54:05am'),
(854, '115.127.74.82', '2021-05-31 11:54:32am'),
(855, '115.127.74.82', '2021-05-31 11:55:32am'),
(856, '115.127.74.82', '2021-05-31 11:56:07am'),
(857, '115.127.74.82', '2021-05-31 11:56:10am'),
(858, '115.127.74.82', '2021-05-31 11:56:51am'),
(859, '115.127.74.82', '2021-05-31 11:57:54am'),
(860, '115.127.74.82', '2021-05-31 12:00:12pm'),
(861, '115.127.74.82', '2021-05-31 12:05:58pm'),
(862, '115.127.74.82', '2021-05-31 12:06:46pm'),
(863, '34.68.220.46', '2021-05-31 01:23:26pm'),
(864, '185.119.81.108', '2021-05-31 02:03:42pm'),
(865, '185.119.81.108', '2021-05-31 02:03:43pm'),
(866, '185.119.81.108', '2021-05-31 02:03:45pm'),
(867, '18.237.148.160', '2021-05-31 04:03:20pm'),
(868, '54.203.3.145', '2021-05-31 04:03:35pm'),
(869, '54.244.175.203', '2021-05-31 04:05:49pm'),
(870, '217.12.221.2', '2021-05-31 04:40:42pm'),
(871, '203.202.252.74', '2021-05-31 05:07:01pm'),
(872, '93.159.230.28', '2021-05-31 05:08:49pm'),
(873, '157.55.39.58', '2021-05-31 05:19:37pm'),
(874, '54.36.148.196', '2021-05-31 05:20:00pm'),
(875, '115.127.74.82', '2021-05-31 05:43:50pm'),
(876, '115.127.74.82', '2021-05-31 05:43:56pm'),
(877, '115.127.74.82', '2021-05-31 05:43:59pm'),
(878, '115.127.74.82', '2021-05-31 05:44:50pm'),
(879, '52.42.15.87', '2021-05-31 06:15:55pm'),
(880, '34.210.121.81', '2021-05-31 06:17:59pm'),
(881, '115.127.74.82', '2021-05-31 06:20:47pm'),
(882, '115.127.74.82', '2021-05-31 06:24:19pm'),
(883, '115.127.74.82', '2021-05-31 06:33:54pm'),
(884, '115.127.74.82', '2021-05-31 06:34:53pm'),
(885, '202.134.8.128', '2021-05-31 07:17:56pm'),
(886, '124.126.78.133', '2021-05-31 07:33:27pm'),
(887, '116.204.229.174', '2021-05-31 11:03:34pm'),
(888, '34.68.220.46', '2021-05-31 11:29:06pm'),
(889, '103.120.38.222', '2021-06-01 12:50:14am'),
(890, '103.120.38.222', '2021-06-01 12:58:38am'),
(891, '31.13.127.7', '2021-06-01 01:01:44am'),
(892, '31.13.115.24', '2021-06-01 01:02:00am'),
(893, '31.13.115.3', '2021-06-01 01:02:00am'),
(894, '31.13.115.19', '2021-06-01 01:02:00am'),
(895, '31.13.115.117', '2021-06-01 01:02:00am'),
(896, '31.13.115.119', '2021-06-01 01:02:00am'),
(897, '31.13.115.23', '2021-06-01 01:02:00am'),
(898, '103.120.38.222', '2021-06-01 01:03:30am'),
(899, '103.120.38.222', '2021-06-01 01:27:39am'),
(900, '103.120.38.222', '2021-06-01 01:28:43am'),
(901, '103.120.38.222', '2021-06-01 02:23:22am'),
(902, '103.120.38.222', '2021-06-01 02:23:48am'),
(903, '103.120.38.222', '2021-06-01 02:24:32am'),
(904, '103.120.38.222', '2021-06-01 02:25:03am'),
(905, '3.249.159.216', '2021-06-01 03:36:22am'),
(906, '66.249.79.30', '2021-06-01 04:32:21am'),
(907, '54.36.149.98', '2021-06-01 06:08:30am'),
(908, '202.134.10.135', '2021-06-01 09:25:45am'),
(909, '115.127.74.82', '2021-06-01 10:10:03am'),
(910, '115.127.74.82', '2021-06-01 10:13:51am'),
(911, '115.127.74.82', '2021-06-01 10:14:48am'),
(912, '115.127.74.82', '2021-06-01 10:15:52am'),
(913, '115.127.74.82', '2021-06-01 10:15:56am'),
(914, '115.127.74.82', '2021-06-01 10:17:10am'),
(915, '115.127.74.82', '2021-06-01 10:17:14am'),
(916, '173.252.87.21', '2021-06-01 10:18:38am'),
(917, '173.252.87.23', '2021-06-01 10:18:38am'),
(918, '173.252.87.5', '2021-06-01 10:18:38am'),
(919, '173.252.87.4', '2021-06-01 10:18:38am'),
(920, '173.252.87.4', '2021-06-01 10:18:38am'),
(921, '173.252.87.18', '2021-06-01 10:18:38am'),
(922, '173.252.87.2', '2021-06-01 10:18:40am'),
(923, '173.252.87.26', '2021-06-01 10:18:40am'),
(924, '116.58.201.255', '2021-06-01 02:03:49pm'),
(925, '116.58.201.255', '2021-06-01 02:04:46pm'),
(926, '116.58.201.255', '2021-06-01 02:05:31pm'),
(927, '116.58.201.255', '2021-06-01 02:05:38pm'),
(928, '116.58.201.255', '2021-06-01 02:06:31pm'),
(929, '116.58.201.255', '2021-06-01 02:07:05pm'),
(930, '116.58.201.255', '2021-06-01 02:07:42pm'),
(931, '116.58.201.255', '2021-06-01 02:07:49pm'),
(932, '116.58.201.255', '2021-06-01 02:08:04pm'),
(933, '116.58.201.255', '2021-06-01 02:09:38pm'),
(934, '116.58.201.255', '2021-06-01 02:10:06pm'),
(935, '116.58.201.255', '2021-06-01 02:17:51pm'),
(936, '116.58.201.255', '2021-06-01 02:20:03pm'),
(937, '116.58.201.255', '2021-06-01 02:24:35pm'),
(938, '116.58.201.255', '2021-06-01 02:45:57pm'),
(939, '116.58.201.255', '2021-06-01 02:45:58pm'),
(940, '116.58.201.255', '2021-06-01 02:46:09pm'),
(941, '116.58.201.255', '2021-06-01 02:48:36pm'),
(942, '116.58.201.255', '2021-06-01 02:48:47pm'),
(943, '116.58.201.255', '2021-06-01 02:52:32pm'),
(944, '116.58.201.255', '2021-06-01 02:52:36pm'),
(945, '116.58.201.255', '2021-06-01 02:58:53pm'),
(946, '116.58.201.255', '2021-06-01 02:59:04pm'),
(947, '116.58.201.255', '2021-06-01 02:59:08pm'),
(948, '116.58.201.255', '2021-06-01 03:11:56pm'),
(949, '116.58.201.255', '2021-06-01 03:13:38pm'),
(950, '89.179.119.216', '2021-06-01 04:01:51pm'),
(951, '52.43.175.181', '2021-06-01 04:27:55pm'),
(952, '54.201.151.57', '2021-06-01 04:31:51pm'),
(953, '54.191.79.209', '2021-06-01 04:43:27pm'),
(954, '54.186.254.147', '2021-06-01 05:30:06pm'),
(955, '115.127.74.82', '2021-06-01 05:56:36pm'),
(956, '116.58.201.255', '2021-06-01 06:06:06pm'),
(957, '116.58.201.255', '2021-06-01 06:06:34pm'),
(958, '116.58.201.255', '2021-06-01 06:06:38pm'),
(959, '116.58.201.255', '2021-06-01 06:08:46pm'),
(960, '116.58.201.255', '2021-06-01 06:09:02pm'),
(961, '116.58.201.255', '2021-06-01 06:09:22pm'),
(962, '54.189.230.128', '2021-06-01 08:20:58pm'),
(963, '103.120.38.222', '2021-06-01 09:07:15pm'),
(964, '103.120.38.222', '2021-06-01 09:24:42pm'),
(965, '103.120.38.222', '2021-06-01 09:25:02pm'),
(966, '173.252.79.28', '2021-06-01 09:38:11pm'),
(967, '173.252.95.12', '2021-06-01 09:45:35pm'),
(968, '175.41.46.54', '2021-06-01 09:45:40pm'),
(969, '54.36.148.196', '2021-06-01 10:05:25pm'),
(970, '68.3.78.181', '2021-06-01 10:17:13pm'),
(971, '173.252.111.117', '2021-06-02 12:46:33am'),
(972, '66.249.73.132', '2021-06-02 12:56:59am'),
(973, '103.120.38.222', '2021-06-02 01:05:32am'),
(974, '103.120.38.222', '2021-06-02 01:06:05am'),
(975, '103.120.38.222', '2021-06-02 01:06:39am'),
(976, '103.120.38.222', '2021-06-02 01:07:23am'),
(977, '103.120.38.222', '2021-06-02 01:09:54am'),
(978, '103.120.38.222', '2021-06-02 01:12:26am'),
(979, '103.120.38.222', '2021-06-02 01:13:05am'),
(980, '103.120.38.222', '2021-06-02 01:14:26am'),
(981, '103.120.38.222', '2021-06-02 01:15:29am'),
(982, '103.120.38.222', '2021-06-02 01:16:56am'),
(983, '103.120.38.222', '2021-06-02 01:17:25am'),
(984, '103.120.38.222', '2021-06-02 01:26:03am'),
(985, '103.120.38.222', '2021-06-02 01:30:01am'),
(986, '103.120.38.222', '2021-06-02 01:34:11am'),
(987, '103.120.38.222', '2021-06-02 01:34:16am'),
(988, '103.120.38.222', '2021-06-02 01:34:53am'),
(989, '103.120.38.222', '2021-06-02 01:38:02am'),
(990, '103.120.38.222', '2021-06-02 01:38:07am'),
(991, '103.120.38.222', '2021-06-02 01:40:30am'),
(992, '103.120.38.222', '2021-06-02 01:40:35am'),
(993, '103.120.38.222', '2021-06-02 01:45:03am'),
(994, '103.120.38.222', '2021-06-02 01:45:08am'),
(995, '103.120.38.222', '2021-06-02 01:45:43am'),
(996, '103.120.38.222', '2021-06-02 01:45:48am'),
(997, '103.120.38.222', '2021-06-02 01:46:24am'),
(998, '103.120.38.222', '2021-06-02 01:46:31am'),
(999, '103.120.38.222', '2021-06-02 01:48:19am'),
(1000, '103.120.38.222', '2021-06-02 01:48:24am'),
(1001, '103.120.38.222', '2021-06-02 01:51:56am'),
(1002, '103.120.38.222', '2021-06-02 01:57:44am'),
(1003, '103.120.38.222', '2021-06-02 02:00:07am'),
(1004, '31.13.127.4', '2021-06-02 02:02:27am'),
(1005, '31.13.127.23', '2021-06-02 02:02:27am'),
(1006, '31.13.127.21', '2021-06-02 02:02:27am'),
(1007, '31.13.127.2', '2021-06-02 02:02:27am'),
(1008, '31.13.127.14', '2021-06-02 02:02:27am'),
(1009, '31.13.127.31', '2021-06-02 02:02:27am'),
(1010, '103.120.38.222', '2021-06-02 02:08:25am'),
(1011, '103.120.38.222', '2021-06-02 02:10:11am'),
(1012, '103.120.38.222', '2021-06-02 02:10:16am'),
(1013, '103.120.38.222', '2021-06-02 02:12:19am'),
(1014, '103.120.38.222', '2021-06-02 02:13:46am'),
(1015, '103.120.38.222', '2021-06-02 02:15:01am'),
(1016, '103.120.38.222', '2021-06-02 02:15:57am'),
(1017, '103.120.38.222', '2021-06-02 02:17:22am'),
(1018, '103.120.38.222', '2021-06-02 02:17:27am'),
(1019, '103.120.38.222', '2021-06-02 02:19:56am'),
(1020, '103.120.38.222', '2021-06-02 02:20:02am'),
(1021, '103.120.38.222', '2021-06-02 02:21:13am'),
(1022, '103.120.38.222', '2021-06-02 02:23:52am'),
(1023, '103.120.38.222', '2021-06-02 02:24:56am'),
(1024, '103.120.38.222', '2021-06-02 02:25:02am'),
(1025, '103.120.38.222', '2021-06-02 02:25:12am'),
(1026, '103.120.38.222', '2021-06-02 02:25:22am'),
(1027, '103.120.38.222', '2021-06-02 02:25:39am'),
(1028, '103.120.38.222', '2021-06-02 02:25:47am'),
(1029, '103.120.38.222', '2021-06-02 02:26:02am'),
(1030, '103.120.38.222', '2021-06-02 02:26:16am'),
(1031, '103.120.38.222', '2021-06-02 02:31:08am'),
(1032, '103.120.38.222', '2021-06-02 02:33:35am'),
(1033, '103.120.38.222', '2021-06-02 02:34:24am'),
(1034, '103.120.38.222', '2021-06-02 02:34:29am'),
(1035, '103.120.38.222', '2021-06-02 02:35:16am'),
(1036, '103.120.38.222', '2021-06-02 02:35:22am'),
(1037, '103.120.38.222', '2021-06-02 02:40:01am'),
(1038, '103.120.38.222', '2021-06-02 02:41:45am'),
(1039, '103.120.38.222', '2021-06-02 02:44:09am'),
(1040, '103.120.38.222', '2021-06-02 02:44:15am'),
(1041, '103.120.38.222', '2021-06-02 02:45:42am'),
(1042, '103.120.38.222', '2021-06-02 02:45:47am'),
(1043, '103.120.38.222', '2021-06-02 02:46:40am'),
(1044, '103.120.38.222', '2021-06-02 02:46:46am'),
(1045, '103.120.38.222', '2021-06-02 02:48:56am'),
(1046, '103.120.38.222', '2021-06-02 02:49:02am'),
(1047, '103.120.38.222', '2021-06-02 02:49:07am'),
(1048, '103.120.38.222', '2021-06-02 02:49:18am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_about_section`
--
ALTER TABLE `home_about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_exclusive_feature`
--
ALTER TABLE `home_exclusive_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_special_feature`
--
ALTER TABLE `home_special_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meserments`
--
ALTER TABLE `meserments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_settings`
--
ALTER TABLE `order_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_brand`
--
ALTER TABLE `products_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_has_images`
--
ALTER TABLE `product_has_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reating_reviews`
--
ALTER TABLE `reating_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`),
  ADD UNIQUE KEY `vendors_phone_number_unique` (`phone_number`);

--
-- Indexes for table `visitor_tables`
--
ALTER TABLE `visitor_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_about_section`
--
ALTER TABLE `home_about_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_exclusive_feature`
--
ALTER TABLE `home_exclusive_feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_special_feature`
--
ALTER TABLE `home_special_feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meserments`
--
ALTER TABLE `meserments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_settings`
--
ALTER TABLE `order_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products_brand`
--
ALTER TABLE `products_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_has_images`
--
ALTER TABLE `product_has_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_user`
--
ALTER TABLE `product_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reating_reviews`
--
ALTER TABLE `reating_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor_tables`
--
ALTER TABLE `visitor_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1049;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
