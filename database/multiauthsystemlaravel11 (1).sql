-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 07:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauthsystemlaravel11`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'changela om', 'changelaom@gmail.com', NULL, '$2y$12$FPi2OsmNay2de0bBtdNXaODO0vAlcfSnMBgtojxhERoKyN5OYfJL.', NULL, '2024-12-28 05:02:41', '2024-12-28 05:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_input_1` varchar(255) DEFAULT NULL,
  `text_input_2` varchar(255) DEFAULT NULL,
  `text_input_3` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `text_input_1`, `text_input_2`, `text_input_3`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Made for You!', 'Beauty Inspired by Real Life', 'Made using clean, non-toxic ingredients, our products are designed for everyone.', 'public/banners/GrduvCdfuJ2hmSyg6I2hvtqpgOjLChcswoC5yrqO.jpg', '2024-12-28 05:57:05', '2024-12-28 05:57:05'),
(3, 'Made for You!', 'Beauty Inspired by Real Life', 'Made using clean, non-toxic ingredients, our products are designed for everyone.', 'public/banners/Xw9Py7mrS1VLCqANU1g7TYjfLs4Hz6Wmwl60C3Dy.jpg', '2024-12-28 05:57:22', '2024-12-28 05:57:22'),
(4, 'Made for You!', 'Beauty Inspired by Real Life', 'Made using clean, non-toxic ingredients, our products are designed for everyone.', 'public/banners/lEUygmHdVd9I4UlTEHFAueTSWVyfq9w87BgH6F3U.jpg', '2024-12-30 00:02:19', '2024-12-30 00:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_name`, `price`, `quantity`, `unit`, `image_url`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 'Face Oil', 435.00, 1, '45gm', 'http://localhost:8000/storage/images/6772252e56e35.jpg', '2024-12-30 00:23:17', '2025-01-05 01:35:42'),
(23, 2, 11, 'Shield Shampoo', 220.00, 1, '45gm', 'http://localhost:8000/storage/images/677387bf3bcd7.jpg', '2025-01-02 22:45:04', '2025-01-03 06:20:56'),
(33, 2, 3, 'fogg perfume', 23.00, 1, '45gm', 'http://localhost:8000/storage/images/677235c8483a5.jpg', '2025-01-03 06:21:49', '2025-01-03 06:21:49'),
(34, 1, 3, 'fogg perfume', 23.00, 1, '45gm', 'http://127.0.0.1:8000/storage/images/677235c8483a5.jpg', '2025-01-05 01:20:46', '2025-01-05 01:35:43'),
(36, 1, 7, 'Shield Spray', 400.00, 1, '45gm', 'http://127.0.0.1:8000/storage/images/677387685b80b.jpg', '2025-01-05 09:51:09', '2025-01-05 09:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'facewash', 'Active', 'categories/UIhk0BG3KugaiYAGHYsBXoVCfKQFHokkJ0pOyt0Z.jpg', '2024-12-28 05:03:35', '2025-01-05 22:39:36'),
(2, 'Face Oil', 'Active', 'categories/3UIc6zmyBUiDSyJDhk641pOMs5ltAlnlEktUHQIg.jpg', '2024-12-28 05:58:45', '2025-01-05 22:39:09'),
(3, 'body wash', 'Active', 'categories/8DqAiL6CEldpIxvBRGxSKQS4CS3hwj32bHOVS9W9.jpg', '2024-12-28 05:59:10', '2024-12-28 05:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `how_to_uses`
--

CREATE TABLE `how_to_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_to_uses`
--

INSERT INTO `how_to_uses` (`id`, `product_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, '<p>For Normal, Oily, Combination Skin Types</p><p>Complexion-perfecting natural foundation enriched with antioxidant-packed superfruits, vitamins, and other skin-nourishing nutrients. Creamy liquid formula sets with a pristine matte finish for soft, velvety smooth skin.</p><p>Say hello to flawless, long-lasting foundation that comes in 7 melt-into-your-skin shades. This lightweight, innovative formula creates a smooth, natural matte finish that won’t settle into lines. It’s the perfect fit for your skin. 1 fl. oz.</p><p>Benefits</p><ul><li>Buildable medium-to-full coverage</li><li>Weightless, airy feel—no caking!</li><li>Long-wearing</li><li>Evens skin tone</li><li>Available in 07 shades (all exclusive to Makeaholic!)</li></ul><p><br>&nbsp;</p>', '2024-12-30 06:13:53', '2024-12-30 06:13:53'),
(3, 13, '<p><strong>Follow these safety guidelines when using cosmetics products of any type:</strong></p><ul><li>Read the label. Follow all directions and heed all warnings.</li><li>Wash your hands before you use the product.</li><li>Do not share makeup.</li><li>Keep the containers clean and tightly closed when not in use, and protect them from temperature extremes.</li><li>Throw away cosmetics if there are changes in color or smell.</li><li>Use aerosols or sprays cans in well-ventilated areas. Do not use them while you are smoking or near an open flame. It could start a fire.<br><br>&nbsp;</li></ul>', '2025-01-05 23:57:12', '2025-01-05 23:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `indepth_product_details`
--

CREATE TABLE `indepth_product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indepth_product_details`
--

INSERT INTO `indepth_product_details` (`id`, `product_id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(4, 2, 'indepth_images/lgNhHaXkW7HMFsPG8ZtVYwPYYj2kAEw2bLs0i1QX.jpg', '<h4>For Normal, Oily, Combination Skin Types</h4><p>Complexion-perfecting natural foundation enriched with antioxidant-packed superfruits, vitamins, and other skin-nourishing nutrients. Creamy liquid formula sets with a pristine matte finish for soft, velvety smooth skin.</p><p>Say hello to flawless, long-lasting foundation that comes in 7 melt-into-your-skin shades. This lightweight, innovative formula creates a smooth, natural matte finish that won’t settle into lines. It’s the perfect fit for your skin. 1 fl. oz.</p><p>Benefits</p><ul><li>Buildable medium-to-full coverage</li><li>Weightless, airy feel—no caking!</li><li>Long-wearing</li><li>Evens skin tone</li><li>Available in 07 shades (all exclusive to Makeaholic!)</li></ul>', '2024-12-31 07:03:32', '2024-12-31 07:03:32'),
(5, 13, 'indepth_images/XwDUaBiab9zcyCsiXdhAC7KnK62crxdDSXGy4b2y.jpg', '<h4>For Normal, Oily, Combination Skin Types</h4><p>Complexion-perfecting natural foundation enriched with antioxidant-packed superfruits, vitamins, and other skin-nourishing nutrients. Creamy liquid formula sets with a pristine matte finish for soft, velvety smooth skin.</p><p>Say hello to flawless, long-lasting foundation that comes in 7 melt-into-your-skin shades. This lightweight, innovative formula creates a smooth, natural matte finish that won’t settle into lines. It’s the perfect fit for your skin. 1 fl. oz.</p><p><strong>Benefits</strong></p><ul><li>Buildable medium-to-full coverage</li><li>Weightless, airy feel—no caking!</li><li>Long-wearing</li><li>Evens skin tone</li><li>Available in 07 shades (all exclusive to Makeaholic!)</li></ul>', '2025-01-05 23:55:10', '2025-01-05 23:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `product_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(4, 3, 'cas', '92128-82-0, 9057-02-7', '2024-12-30 05:26:07', '2024-12-30 05:26:07'),
(5, 8, 'cas', '92128-82-0, 9057-02-7', '2025-01-01 04:29:37', '2025-01-01 04:29:37'),
(6, 14, 'cas', '92128-82-0, 9057-02-7', '2025-01-01 05:46:29', '2025-01-01 05:46:29'),
(7, 14, 'cas', '92128-82-0, 9057-02-7', '2025-01-01 05:46:29', '2025-01-01 05:46:29'),
(8, 13, 'cas', '92128-82-0, 9057-02-7', '2025-01-05 23:58:28', '2025-01-05 23:58:28'),
(9, 13, 'INCI', 'Nannochloropsis Oculata (micro algae) extract, pullulan', '2025-01-05 23:58:29', '2025-01-05 23:58:29'),
(10, 13, 'Composition', 'Nannochloropsis Oculata (micro algae) extract, pullulan, water, ethanol', '2025-01-05 23:58:29', '2025-01-05 23:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_showcases`
--

CREATE TABLE `instagram_showcases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagram_showcases`
--

INSERT INTO `instagram_showcases` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'instagram_images/9DdTsfAKNr3iZlUxnHf0O3t8xZZKqrQ7FXbzvkCr.jpg', '2025-01-01 03:52:31', '2025-01-05 22:43:12'),
(3, 'instagram_images/pIbfstWS3a39uI73epRPwoSvZdZqPvia6YgHoTYH.jpg', '2025-01-01 03:53:45', '2025-01-05 22:50:16'),
(4, 'instagram_images/BzpIgL2u5SLm4og1j2cB1NWEFWouRHQJ6k8h8M6i.jpg', '2025-01-01 04:06:20', '2025-01-05 22:50:47'),
(5, 'instagram_images/YgHxc8lwRJaVCqNTKyovbxdk70ra6oWVYVOsoQIa.jpg', '2025-01-05 22:44:32', '2025-01-05 22:44:32'),
(6, 'instagram_images/xKPiZqBbOXpFWk3wwZ0kysFGioXyUcgDlDLlwF2j.jpg', '2025-01-05 22:44:58', '2025-01-05 22:51:17'),
(7, 'instagram_images/TCbokWMWiRmbLNEe7nJgAloDJbQSXK2EVAY55kJP.jpg', '2025-01-05 22:45:22', '2025-01-05 22:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_16_152512_create_admins_table', 1),
(5, '2024_04_16_152512_create_teachers_table', 1),
(6, '2024_08_30_181158_create_categories_table', 1),
(7, '2024_12_14_093717_create_products_table', 1),
(8, '2024_12_15_151325_create_banners_table', 1),
(9, '2024_12_17_083136_create_prices_table', 1),
(10, '2024_12_18_045349_add_description_to_products_table', 1),
(11, '2024_12_18_082342_create_indepth_product_details', 1),
(12, '2024_12_20_101718_create_wishlists_table', 1),
(13, '2024_12_20_122053_create_carts_table', 1),
(14, '2024_12_22_063928_add_image_url_to_carts_table', 1),
(15, '2024_12_22_105225_add_product_id_to_wishlists_table', 1),
(16, '2024_12_22_132222_add_unit_to_wishlist_table', 1),
(17, '2024_12_23_050554_create_ingredients_table', 1),
(18, '2024_12_23_065500_create_how_to_uses_table', 1),
(19, '2024_12_23_091325_create_reviews_table', 1),
(20, '2024_12_28_100207_create_order_payments_table', 1),
(21, '2025_01_01_085415_create_instagram_showcases_table', 2),
(22, '2025_01_01_120004_create_product_banners_table', 3),
(23, '2025_01_02_050029_create_orders_table', 4),
(24, '2025_01_02_050030_create_order_products_table', 4),
(25, '2025_01_02_050032_create_payments_table', 4),
(26, '2025_01_02_073314_add_address_to_orders_table', 5),
(27, '2025_01_03_082223_create_orders_table', 6),
(28, '2025_01_03_082224_create_order_products_table', 6),
(29, '2025_01_03_082225_create_payments_table', 6),
(30, '2025_01_03_085736_create_orders_table', 7),
(31, '2025_01_03_085737_create_payments_table', 7),
(32, '2025_01_03_090132_create_order_products_table', 8),
(33, '2025_01_03_095313_create_orders_table', 9),
(34, '2025_01_03_095315_create_order_products_table', 9),
(35, '2025_01_03_095316_create_payments_table', 9),
(40, '2025_01_03_102756_create_orders_table', 10),
(41, '2025_01_03_102757_create_order_products_table', 10),
(42, '2025_01_03_102757_create_payments_table', 10),
(43, '2025_01_03_102944_add_address_to_orders_table', 10),
(44, '2025_01_06_053831_add_delivery_status_to_orders_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','paid','cancelled','failed') NOT NULL DEFAULT 'pending',
  `delivery_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `payment_id` varchar(255) DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL,
  `shipping_country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `total_amount`, `status`, `delivery_status`, `payment_id`, `shipping_name`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_zip`, `shipping_country`, `created_at`, `updated_at`) VALUES
(12, 1, 'ORD-677A2C32D050E', 481.00, 'paid', 'Delivered', 'order_PffaJg9b1V34lO', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-05 01:22:34', '2025-01-06 00:44:37'),
(13, 1, 'ORD-677A2E3C37C97', 501.00, 'paid', 'Shipped', 'order_PffjSfmT3PrAac', 'changela om', 'HAS Audio Solutions Pvt Ltd , 6th Floor, Eyecon House, behind Sindhu Bhavan, Hall, Bodakdev, Ahmedabad, Gujarat', 'AHMEDABAD', 'Gujarat', '380054', 'India', '2025-01-05 01:31:16', '2025-01-06 00:43:04'),
(17, 1, 'ORD-677A8848DF43D', 458.00, 'paid', 'Pending', 'order_PfmHLJrEfHBHxW', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-05 07:55:28', '2025-01-05 07:55:54'),
(18, 1, 'ORD-677A9F10B30C0', 458.00, 'paid', 'Pending', 'order_Pfnw3AjPxlNTF8', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-05 09:32:40', '2025-01-05 09:33:13'),
(19, 1, 'ORD-677AA02E920A4', 458.00, 'paid', 'Shipped', 'order_Pfo112l7oN3S3M', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-05 09:37:26', '2025-01-06 00:45:12'),
(20, 1, 'ORD-677AA3747CFC0', 858.00, 'pending', 'Pending', 'order_PfoFncJAAENx0L', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-05 09:51:24', '2025-01-05 09:51:28'),
(21, 1, 'ORD-677AA3E99B19F', 858.00, 'paid', 'Pending', 'order_PfoHrqfc8eThbF', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-05 09:53:21', '2025-01-05 09:53:50'),
(22, 1, 'ORD-677B6E34D9AC9', 858.00, 'paid', 'Pending', 'order_Pg2zawDmLWZ5rL', 'Om Changela', 'Gondal\nGondal', 'Rajkot', 'Gujarat', '360330', 'India', '2025-01-06 00:16:28', '2025-01-06 00:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 4, 435.00, '2025-01-04 11:38:32', '2025-01-04 11:38:32'),
(2, 1, 29, 1, 400.00, '2025-01-04 11:38:32', '2025-01-04 11:38:32'),
(3, 2, 7, 4, 435.00, '2025-01-04 11:43:24', '2025-01-04 11:43:24'),
(4, 2, 29, 1, 400.00, '2025-01-04 11:43:24', '2025-01-04 11:43:24'),
(5, 3, 7, 4, 435.00, '2025-01-04 11:47:44', '2025-01-04 11:47:44'),
(6, 3, 29, 1, 400.00, '2025-01-04 11:47:44', '2025-01-04 11:47:44'),
(7, 4, 7, 4, 435.00, '2025-01-04 12:30:53', '2025-01-04 12:30:53'),
(8, 4, 29, 1, 400.00, '2025-01-04 12:30:53', '2025-01-04 12:30:53'),
(9, 5, 7, 4, 435.00, '2025-01-04 13:00:02', '2025-01-04 13:00:02'),
(10, 5, 29, 1, 400.00, '2025-01-04 13:00:02', '2025-01-04 13:00:02'),
(11, 6, 7, 4, 435.00, '2025-01-04 13:18:05', '2025-01-04 13:18:05'),
(12, 6, 29, 1, 400.00, '2025-01-04 13:18:05', '2025-01-04 13:18:05'),
(13, 7, 7, 4, 435.00, '2025-01-04 13:22:59', '2025-01-04 13:22:59'),
(14, 7, 29, 1, 400.00, '2025-01-04 13:22:59', '2025-01-04 13:22:59'),
(15, 8, 7, 1, 435.00, '2025-01-05 01:03:30', '2025-01-05 01:03:30'),
(16, 9, 7, 1, 435.00, '2025-01-05 01:09:02', '2025-01-05 01:09:02'),
(17, 10, 7, 1, 435.00, '2025-01-05 01:15:54', '2025-01-05 01:15:54'),
(18, 11, 7, 1, 435.00, '2025-01-05 01:17:47', '2025-01-05 01:17:47'),
(19, 12, 7, 1, 435.00, '2025-01-05 01:22:35', '2025-01-05 01:22:35'),
(20, 12, 34, 2, 23.00, '2025-01-05 01:22:36', '2025-01-05 01:22:36'),
(21, 13, 7, 1, 435.00, '2025-01-05 01:31:16', '2025-01-05 01:31:16'),
(22, 13, 34, 2, 23.00, '2025-01-05 01:31:16', '2025-01-05 01:31:16'),
(23, 13, 35, 1, 20.00, '2025-01-05 01:31:16', '2025-01-05 01:31:16'),
(24, 14, 7, 2, 435.00, '2025-01-05 01:33:38', '2025-01-05 01:33:38'),
(25, 14, 34, 2, 23.00, '2025-01-05 01:33:38', '2025-01-05 01:33:38'),
(26, 14, 35, 1, 20.00, '2025-01-05 01:33:38', '2025-01-05 01:33:38'),
(27, 15, 7, 1, 435.00, '2025-01-05 01:35:50', '2025-01-05 01:35:50'),
(28, 15, 34, 1, 23.00, '2025-01-05 01:35:50', '2025-01-05 01:35:50'),
(29, 15, 35, 1, 20.00, '2025-01-05 01:35:50', '2025-01-05 01:35:50'),
(30, 16, 7, 1, 435.00, '2025-01-05 01:36:49', '2025-01-05 01:36:49'),
(31, 16, 34, 1, 23.00, '2025-01-05 01:36:49', '2025-01-05 01:36:49'),
(32, 16, 35, 1, 20.00, '2025-01-05 01:36:49', '2025-01-05 01:36:49'),
(33, 17, 7, 1, 435.00, '2025-01-05 07:55:29', '2025-01-05 07:55:29'),
(34, 17, 34, 1, 23.00, '2025-01-05 07:55:29', '2025-01-05 07:55:29'),
(35, 18, 7, 1, 435.00, '2025-01-05 09:32:41', '2025-01-05 09:32:41'),
(36, 18, 34, 1, 23.00, '2025-01-05 09:32:41', '2025-01-05 09:32:41'),
(37, 19, 7, 1, 435.00, '2025-01-05 09:37:26', '2025-01-05 09:37:26'),
(38, 19, 34, 1, 23.00, '2025-01-05 09:37:26', '2025-01-05 09:37:26'),
(39, 20, 7, 1, 435.00, '2025-01-05 09:51:25', '2025-01-05 09:51:25'),
(40, 20, 34, 1, 23.00, '2025-01-05 09:51:25', '2025-01-05 09:51:25'),
(41, 20, 36, 1, 400.00, '2025-01-05 09:51:25', '2025-01-05 09:51:25'),
(42, 21, 7, 1, 435.00, '2025-01-05 09:53:22', '2025-01-05 09:53:22'),
(43, 21, 34, 1, 23.00, '2025-01-05 09:53:23', '2025-01-05 09:53:23'),
(44, 21, 36, 1, 400.00, '2025-01-05 09:53:23', '2025-01-05 09:53:23'),
(45, 22, 7, 1, 435.00, '2025-01-06 00:16:29', '2025-01-06 00:16:29'),
(46, 22, 34, 1, 23.00, '2025-01-06 00:16:29', '2025-01-06 00:16:29'),
(47, 22, 36, 1, 400.00, '2025-01-06 00:16:29', '2025-01-06 00:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_gateway`, `payment_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Razorpay', 'pay_PfRY054WjyfGb3', 2140.00, 'success', '2025-01-04 11:39:05', '2025-01-04 11:39:05'),
(2, 2, 'Razorpay', 'pay_PfRfIjt3uVzUld', 2140.00, 'success', '2025-01-04 11:45:57', '2025-01-04 11:45:57'),
(3, 8, 'Razorpay', 'pay_PffGYUimOpSh4X', 435.00, 'success', '2025-01-05 01:04:18', '2025-01-05 01:04:18'),
(4, 9, 'Razorpay', 'pay_PffM4zgbd7488x', 435.00, 'success', '2025-01-05 01:09:29', '2025-01-05 01:09:29'),
(5, 10, 'Razorpay', 'pay_PffTIUPM9CIzWz', 435.00, 'success', '2025-01-05 01:16:17', '2025-01-05 01:16:17'),
(6, 12, 'Razorpay', 'pay_PffaPf5SMj9eQq', 481.00, 'success', '2025-01-05 01:23:00', '2025-01-05 01:23:00'),
(7, 13, 'Razorpay', 'pay_PffjpaqqRBRUWG', 501.00, 'success', '2025-01-05 01:31:54', '2025-01-05 01:31:54'),
(8, 14, 'Razorpay', 'pay_Pffm98JU4pfNd1', 936.00, 'success', '2025-01-05 01:34:10', '2025-01-05 01:34:10'),
(9, 17, 'Razorpay', 'pay_PfmHQttvGXu9m5', 458.00, 'success', '2025-01-05 07:55:54', '2025-01-05 07:55:54'),
(10, 18, 'Razorpay', 'pay_Pfnw9rffAcRGr0', 458.00, 'success', '2025-01-05 09:33:13', '2025-01-05 09:33:13'),
(11, 19, 'Razorpay', 'pay_Pfo16Mh4fjqNpt', 458.00, 'success', '2025-01-05 09:37:49', '2025-01-05 09:37:49'),
(12, 21, 'Razorpay', 'pay_PfoI0eRCga2HmW', 858.00, 'success', '2025-01-05 09:53:50', '2025-01-05 09:53:50'),
(13, 22, 'Razorpay', 'pay_Pg2zg8B61StOy3', 858.00, 'success', '2025-01-06 00:16:53', '2025-01-06 00:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `product_id`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(3, 3, 23.00, '45gm', '2024-12-30 00:25:20', '2024-12-30 00:25:20'),
(4, 2, 435.00, '45gm', '2024-12-30 00:50:03', '2024-12-30 00:50:03'),
(5, 4, 700.00, '45gm', '2024-12-31 00:23:41', '2024-12-31 00:23:41'),
(6, 4, 2000.00, '45ml', '2024-12-31 00:23:42', '2024-12-31 00:23:42'),
(7, 5, 100.00, '45gm', '2024-12-31 00:24:44', '2024-12-31 00:24:44'),
(8, 6, 400.00, '45gm', '2024-12-31 00:25:40', '2024-12-31 00:25:40'),
(9, 7, 400.00, '45gm', '2024-12-31 00:25:52', '2024-12-31 00:25:52'),
(10, 8, 200.00, '45gm', '2024-12-31 00:26:16', '2024-12-31 00:26:16'),
(11, 9, 2002.00, '45gm', '2024-12-31 00:26:42', '2024-12-31 00:26:42'),
(12, 10, 20.00, '45gm', '2024-12-31 00:26:56', '2024-12-31 00:26:56'),
(13, 11, 220.00, '45gm', '2024-12-31 00:27:19', '2024-12-31 00:27:19'),
(14, 12, 520.00, '45gm', '2024-12-31 00:27:53', '2024-12-31 00:27:53'),
(15, 13, 620.00, '45gm', '2024-12-31 00:28:50', '2024-12-31 00:28:50'),
(16, 14, 420.00, '45gm', '2024-12-31 00:29:09', '2024-12-31 00:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` decimal(3,2) NOT NULL DEFAULT 0.00,
  `review_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `multiple_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`multiple_images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `status`, `category_id`, `rate`, `review_count`, `multiple_images`, `created_at`, `updated_at`) VALUES
(2, 'Face Oil', 'this is face oil demo', 'images/6772252e56e35.jpg', 'Active', 2, 4.00, 34, '[\"images\\/67723b9380bbd.jpg\",\"images\\/67723b9381c95.jpg\",\"images\\/67723b9382410.jpg\",\"images\\/67723b9382dca.jpg\"]', '2024-12-29 23:14:31', '2024-12-30 00:50:03'),
(3, 'fogg perfume', 'this is demo', 'images/677235c8483a5.jpg', 'Active', 1, 3.00, 1, '[\"images\\/677235c8cefa6.jpg\",\"images\\/677235c8cf719.jpg\",\"images\\/677235c8cff31.jpg\"]', '2024-12-30 00:25:20', '2024-12-30 00:25:20'),
(4, 'Enriched Hand & Body Wash', 'this is boday wash product', 'images/677386e5ae9b2.jpg', 'Active', 3, 4.00, 1, '[\"images\\/677386e5ccac4.jpg\",\"images\\/677386e5cd812.jpg\",\"images\\/677386e5ce1e6.jpg\"]', '2024-12-31 00:23:41', '2024-12-31 00:23:41'),
(5, 'Shield Shampoo', 'this is fashwash product', 'images/6773872421919.jpg', 'Active', 1, 4.00, 1, '[\"images\\/677387242ce95.jpg\",\"images\\/677387242dbef.jpg\",\"images\\/677387242e60c.jpg\",\"images\\/677387242ee75.jpg\"]', '2024-12-31 00:24:44', '2024-12-31 00:24:44'),
(6, 'Shield Spray', 'this is fashwash product', 'images/6773875beec1a.jpg', 'Active', 2, 4.00, 1, '[\"images\\/6773875bf1c42.jpg\",\"images\\/6773875bf27c4.jpg\",\"images\\/6773875bf2f71.jpg\"]', '2024-12-31 00:25:39', '2024-12-31 00:25:39'),
(7, 'Shield Spray', 'this is fashwash product', 'images/677387685b80b.jpg', 'Active', 2, 4.00, 1, '[\"images\\/677387685f671.jpg\",\"images\\/677387685feeb.jpg\",\"images\\/67738768606f6.jpg\"]', '2024-12-31 00:25:52', '2024-12-31 00:25:52'),
(8, 'Shield Spray', 'this is fashwash product', 'images/677387805b095.jpg', 'Active', 3, 4.00, 1, '[\"images\\/677387805ee06.jpg\",\"images\\/677387805f5cc.jpg\",\"images\\/677387805fd3e.jpg\"]', '2024-12-31 00:26:16', '2024-12-31 00:26:16'),
(9, 'Shield', 'this is fashwash product', 'images/6773879a888b3.jpg', 'Active', 2, 4.00, 1, '[\"images\\/6773879a8bdcc.jpg\",\"images\\/6773879a8c5f4.jpg\",\"images\\/6773879a8cdb7.jpg\"]', '2024-12-31 00:26:42', '2024-12-31 00:26:42'),
(10, 'Shield', 'this is fashwash product', 'images/677387a8a667b.jpg', 'Active', 2, 4.00, 1, '[\"images\\/677387a8aab9f.jpg\",\"images\\/677387a8ab495.jpg\",\"images\\/677387a8ac394.jpg\"]', '2024-12-31 00:26:56', '2024-12-31 00:26:56'),
(11, 'Shield Shampoo', 'this is fashwash product', 'images/677387bf3bcd7.jpg', 'Active', 2, 4.00, 1, '[\"images\\/677387bf3f9fb.jpg\",\"images\\/677387bf403ed.jpg\",\"images\\/677387bf40b41.jpg\"]', '2024-12-31 00:27:19', '2024-12-31 00:27:19'),
(12, 'Shield bodywash', 'this is body wash product', 'images/677387e041ad3.jpg', 'Active', 3, 4.00, 1, '[\"images\\/677387e04556e.jpg\",\"images\\/677387e045dca.jpg\",\"images\\/677387e0465d4.jpg\"]', '2024-12-31 00:27:52', '2024-12-31 00:27:52'),
(13, 'Supreme Moisture Mask', 'this is body wash product', 'images/67738819dbfc5.jpg', 'Active', 1, 4.00, 2, '[\"images\\/67738819e163b.jpg\",\"images\\/67738819e23b2.jpg\",\"images\\/67738819e2b2d.jpg\"]', '2024-12-31 00:28:49', '2025-01-05 23:05:24'),
(14, 'Supreme Mask', 'this is body wash product', 'images/6773882d6425a.jpg', 'Active', 1, 4.00, 1, '[\"images\\/6773882d67257.jpg\",\"images\\/6773882d6798c.jpg\",\"images\\/6773882d680b0.jpg\"]', '2024-12-31 00:29:09', '2024-12-31 00:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_banners`
--

CREATE TABLE `product_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_banners`
--

INSERT INTO `product_banners` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'product_banners/1ag0zqeRApYTDmW9P0uNZKe6g2Gu0Ex4GMF6Ny8j.jpg', '2025-01-01 06:45:43', '2025-01-01 06:45:43'),
(2, 'product_banners/JAta7w4Vmma87PTMRbOjl4QgUwVhL2XjabOxjA9t.jpg', '2025-01-01 06:56:04', '2025-01-01 06:56:04'),
(3, 'product_banners/JKjl514jHvIa8nn021Gq6VW64AVYVYKa9llSQbdh.jpg', '2025-01-01 22:42:05', '2025-01-05 22:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `helpful_count` int(11) NOT NULL DEFAULT 0,
  `not_helpful_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `rating`, `title`, `message`, `images`, `helpful_count`, `not_helpful_count`, `created_at`, `updated_at`) VALUES
(1, 13, 'om patel', 'changelaom@gmail.com', 4, 'facewash product review', 'this is very good product', '[\"reviews\\/69naJmroiNAP0MdQDnQ9zZ1b4iXe3KzhJyMQxUAo.jpg\",\"reviews\\/l6yM4B2lR4nZ1JXYDKZXdXU9dLCjDxTivBntZ1xv.jpg\",\"reviews\\/jhn97BfbKhKLlxprYk6QwbTsHvnHZIraAv9G4E4U.jpg\"]', 0, 0, '2025-01-05 23:05:24', '2025-01-05 23:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('O6C6zp8fzFYYCwHuoIChuRE7fxpjimZy0tFVWk7Y', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU1lLc3gxSm54emhjNGh5V2dKTXgwVEFGQXYxTFc2bmlJczY5a1p6VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXltZW50LXN0YXR1cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1736142423),
('u5rCTmYc4emNouD98iDHABU8dgYMrcWgJVOaB3FX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmhlMUhtRW9VQ3VuekNFUTYzR3JCM1RDRzdXWkd5ZnYxVDh5MTJQdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1736144112);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'changela om', 'changelaom@gmail.com', NULL, '$2y$12$HB/6l2ncFdNWWbjHZRUJJuXJVdGW2GcwfFhGQLTD5nyy5ZIRUjKVK', NULL, '2024-12-28 05:06:16', '2024-12-28 05:06:16'),
(2, 'user', 'user@gmail.com', NULL, '$2y$12$7MVtCCFEj/0bCMPtpanzu.O0XglkzH5sYvu4ZqXgHHxed3u6O6/hm', NULL, '2025-01-02 22:39:12', '2025-01-02 22:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `product_name`, `product_image`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'Face Oil', 'http://localhost:8000/storage/images/6772252e56e35.jpg', 435.00, '45gm', '2024-12-30 00:23:26', '2024-12-30 00:23:26'),
(7, 1, 3, 'fogg perfume', 'http://localhost:8000/storage/images/677235c8483a5.jpg', 23.00, '45gm', '2024-12-31 02:03:52', '2024-12-31 02:03:52'),
(17, 1, 10, 'Shield', 'http://localhost:8000/storage/images/677387a8a667b.jpg', 20.00, '45gm', '2024-12-31 04:27:51', '2024-12-31 04:27:51'),
(18, 1, 7, 'Shield Spray', 'http://localhost:8000/storage/images/677387685b80b.jpg', 400.00, '45gm', '2024-12-31 07:00:49', '2024-12-31 07:00:49'),
(20, 2, 11, 'Shield Shampoo', 'http://localhost:8000/storage/images/677387bf3bcd7.jpg', 220.00, '45gm', '2025-01-02 22:45:15', '2025-01-02 22:45:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `how_to_uses`
--
ALTER TABLE `how_to_uses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `how_to_uses_product_id_foreign` (`product_id`);

--
-- Indexes for table `indepth_product_details`
--
ALTER TABLE `indepth_product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indepth_product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_product_id_foreign` (`product_id`);

--
-- Indexes for table `instagram_showcases`
--
ALTER TABLE `instagram_showcases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_banners`
--
ALTER TABLE `product_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `how_to_uses`
--
ALTER TABLE `how_to_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `indepth_product_details`
--
ALTER TABLE `indepth_product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instagram_showcases`
--
ALTER TABLE `instagram_showcases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_banners`
--
ALTER TABLE `product_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `how_to_uses`
--
ALTER TABLE `how_to_uses`
  ADD CONSTRAINT `how_to_uses_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `indepth_product_details`
--
ALTER TABLE `indepth_product_details`
  ADD CONSTRAINT `indepth_product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
