-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 08:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_web`
--

CREATE TABLE `category_web` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `row` int(11) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_main_id` int(11) DEFAULT NULL,
  `group_main_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_sub_id` int(11) DEFAULT NULL,
  `group_sub_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `promo_id` int(11) DEFAULT NULL,
  `promo_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_web`
--

INSERT INTO `category_web` (`id`, `key`, `row`, `logo`, `group_id`, `group_name`, `group_main_id`, `group_main_name`, `group_sub_id`, `group_sub_name`, `promo_id`, `promo_name`) VALUES
(82, 'category-promo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'Áp dụng cho khách hàng'),
(83, 'category-promo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 'Áp dụng cho đơn hàng'),
(84, 'category-promo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 'KM san pham'),
(85, 'category-main', 1, NULL, 54, 'Tivi', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'category-main', 1, NULL, 55, 'Loa, Dàn Karaoke', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'category-sub', 1, NULL, NULL, NULL, 54, 'Tivi', 21, 'SamSung', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `account`, `password`, `address`, `tel`, `email`, `path`) VALUES
(1, 'Phan Điên', 'dienpq1604@gmail.com', '2', '512 C9 Tô Hiệu Nghĩa Tân Cầu Giấy', '0963865764', 'dienpq1604@gmail.com', 'images/users/1656297315600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `export_warehouse`
--

CREATE TABLE `export_warehouse` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `creat_at` date NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `export_warehouse`
--

INSERT INTO `export_warehouse` (`id`, `amount`, `creat_at`, `warehouse_id`, `warehouse_product_id`) VALUES
(35, 5, '2022-04-25', 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `group_product`
--

CREATE TABLE `group_product` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_product`
--

INSERT INTO `group_product` (`id`, `code`, `name`) VALUES
(21, 'TVSS', 'SamSung'),
(22, 'LOAAT', 'Loa, Âm thanh'),
(23, 'LOA1', 'Loa Bluetooth'),
(24, 'PKTV', 'Phụ kiện Tivi'),
(25, 'PKTV1', 'Khung treo Tivi'),
(26, 'SONY', 'Sony'),
(27, 'LG', 'LG'),
(28, 'TL', 'Tủ lạnh'),
(29, 'TDTM', 'Tủ đông, Tủ mát'),
(30, 'MG', 'Máy giặt'),
(31, 'SQA', 'Sấy quần áo'),
(32, 'ML', 'Máy Lạnh'),
(33, 'QDH', 'Quạt điều hòa'),
(34, 'DGD', 'Điện gia dụng'),
(35, 'DC', 'Dụng cụ'),
(36, 'DDNB', 'Đồ dùng nhà bếp'),
(37, 'BD', 'Bếp điện'),
(38, 'LN', 'Lọc nước'),
(39, 'TBLD', 'Thiết bị làm đẹp'),
(40, 'DT', 'Điện thoại'),
(41, 'LT', 'Laptop'),
(42, 'TBL', 'Tablet'),
(43, 'PK', 'Phụ kiện'),
(44, 'DH', 'Đồng hồ'),
(45, 'XD', 'Xe đạp'),
(46, 'PKXD', 'Phụ kiện xe đạp'),
(47, 'TLSS', 'SamSung'),
(48, 'TDTMAQ', 'AQUA'),
(49, 'MGPNSN', 'Panasonic'),
(50, 'MGMS', 'Candy'),
(51, 'PKMG', 'Phụ kiện máy giặt'),
(52, 'PKMGTG', 'Túi giặt'),
(54, 'TV', 'Tivi'),
(55, 'LOADKROK', 'Loa, Dàn Karaoke');

-- --------------------------------------------------------

--
-- Table structure for table `group_product_rel`
--

CREATE TABLE `group_product_rel` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_product_rel`
--

INSERT INTO `group_product_rel` (`id`, `group_id`, `product_id`) VALUES
(68, 21, 32),
(69, 54, 32);

-- --------------------------------------------------------

--
-- Table structure for table `images_product`
--

CREATE TABLE `images_product` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images_product`
--

INSERT INTO `images_product` (`id`, `key`, `path`) VALUES
(48, 'img_prd_main', 'images/products/1650640829771.jpg'),
(49, 'img_prd_sub', 'images/products/1650640829261.png'),
(50, 'img_prd_main', 'images/products/1650732879950.jpg'),
(51, 'img_prd_main', 'images/products/1650732896569.png'),
(52, 'img_prd_main', 'images/products/1650879424653.jpg'),
(53, 'img_prd_main', 'images/products/1656297969805.jpg'),
(54, 'img_prd_sub', 'images/products/1656297969561.png'),
(55, 'img_prd_sub', 'images/products/165629796951.png'),
(56, 'img_prd_sub', 'images/products/165629796981.jpg'),
(57, 'img_prd_sub', 'images/products/1656297969306.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_product_rel`
--

CREATE TABLE `image_product_rel` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_product_rel`
--

INSERT INTO `image_product_rel` (`id`, `image_id`, `product_id`) VALUES
(53, 53, 32),
(54, 54, 32),
(55, 55, 32),
(56, 56, 32),
(57, 57, 32);

-- --------------------------------------------------------

--
-- Table structure for table `import_warehouse`
--

CREATE TABLE `import_warehouse` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `creat_at` date NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `import_warehouse`
--

INSERT INTO `import_warehouse` (`id`, `amount`, `creat_at`, `warehouse_id`, `warehouse_product_id`) VALUES
(37, 10, '2022-04-25', 7, 24),
(38, 5, '2022-04-25', 7, 22),
(39, 20, '2022-04-25', 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `logo_category_web`
--

CREATE TABLE `logo_category_web` (
  `id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logo_category_web`
--

INSERT INTO `logo_category_web` (`id`, `row`, `path`) VALUES
(4, 1, 'images/website/logo-category/logo-1.png'),
(5, 2, 'images/website/logo-category/logo-2.png'),
(6, 3, 'images/website/logo-category/logo-3.png'),
(7, 4, 'images/website/logo-category/logo-4.png'),
(8, 5, 'images/website/logo-category/logo-5.png'),
(9, 6, 'images/website/logo-category/logo-6.png'),
(10, 7, 'images/website/logo-category/logo-7.png'),
(11, 8, 'images/website/logo-category/logo-8.png'),
(12, 9, 'images/website/logo-category/logo-9.png'),
(13, 10, 'images/website/logo-category/logo-10.png');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `code`, `amount`, `product_id`, `client_id`, `status`) VALUES
(1, '1656298806528', 1, 32, 1, 0),
(2, '1656299993103', 3, 32, 1, 0);

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `introduction_article` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creat_at` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `info`, `price`, `introduction_article`, `creat_at`, `status`) VALUES
(32, 'TVSS01', 'Smart Tivi Samsung 4K Crystal UHD 55 inch', 'Smart Tivi Samsung 4K 55 inch UA55AU8100 thiết kế theo phong cách AirSlim tối giản với các cạnh viền siêu mỏng tạo cảm giác màn hình không hề bị giới hạn. Tivi có 2 chân đế hình chữ V úp ngược giúp trụ vững trên tất cả mặt phẳng, bạn cũng có thể treo tivi lên tường để tiết kiệm không gian.', 15000000, '<h3 style=\"margin: 20px 0px 15px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(51, 51, 51); outline: none;\">Trải nghiệm xem thêm nhập vai với màn hình 55 inch không viền 3 cạnh</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;\"><a href=\"https://www.dienmayxanh.com/tivi/led-4k-samsung-ua55au8100\" target=\"_blank\" title=\"Smart Tivi Samsung 4K 55 inch UA55AU8100 \" style=\"margin: 0px; padding: 0px; transition: all 0.2s ease 0s; color: rgb(47, 128, 237);\">Smart Tivi Samsung 4K 55 inch UA55AU8100&nbsp;</a>thiết kế theo phong cách AirSlim tối giản với các cạnh viền siêu mỏng tạo cảm giác màn hình không hề bị giới hạn. Tivi có 2 chân đế hình chữ V úp ngược giúp', '06/27/2022', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_money` int(11) DEFAULT NULL,
  `unit` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `subject_apply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_range` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `code`, `info`, `total_money`, `unit`, `discount`, `subject_apply`, `date_range`, `status`) VALUES
(12, 'KM0003', 'Áp dụng cho khách hàng', 200000, '%', 2, 'Khách hàng', '03/31/2022 - 03/31/2022', NULL),
(20, 'KM0004', 'Áp dụng cho đơn hàng', 100000, 'VNĐ', 10000, 'Đơn hàng', '04/01/2022 - 04/01/2022', 'on'),
(21, 'KM0002', 'KM san pham', NULL, '%', 2, 'Sản phẩm', '04/22/2022 - 04/22/2022', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `promo_product_rel`
--

CREATE TABLE `promo_product_rel` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `promo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promo_product_rel`
--

INSERT INTO `promo_product_rel` (`id`, `product_id`, `promo_id`) VALUES
(10, 32, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key`, `path`) VALUES
(19, 'banner_top', 'images/website/16506248629.png'),
(20, 'banner_top', 'images/website/1650624862647.gif'),
(21, 'banner_top', 'images/website/1650624862596.png'),
(22, 'banner_body', 'images/website/1650624862111.png'),
(23, 'banner_body', 'images/website/1650624862895.png'),
(24, 'banner_body', 'images/website/1650624862941.png'),
(25, 'banner_body', 'images/website/1650624862728.png'),
(26, 'banner_promo', 'images/website/1650624862365.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phan Quang Điện', 'dienpq1604@gmail.com', NULL, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`) VALUES
(7, 'Cơ sở 1', 'SN 7B ngo 6'),
(8, 'Cơ sở 2', 'SN5'),
(9, 'Cơ sở 3', 'SN 7B ngo 6');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_product`
--

CREATE TABLE `warehouse_product` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouse_product`
--

INSERT INTO `warehouse_product` (`id`, `code`, `name`, `price`) VALUES
(22, 'MH3245', 'Lenovo Idipad 5', 20000000),
(23, 'MH7236', 'Aser Nitro 5', 20000000),
(24, 'MH0001', 'Dell 5510', 15000000),
(25, 'MH1234', 'Dell 5510', 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_product_rel`
--

CREATE TABLE `warehouse_product_rel` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `warehouse_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouse_product_rel`
--

INSERT INTO `warehouse_product_rel` (`id`, `warehouse_id`, `warehouse_product_id`) VALUES
(12, 7, 24),
(13, 7, 22),
(14, 8, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `cart_ibfk_2` (`product_id`);

--
-- Indexes for table `category_web`
--
ALTER TABLE `category_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `category_web_ibfk_2` (`group_main_id`),
  ADD KEY `category_web_ibfk_3` (`group_sub_id`),
  ADD KEY `promo_id` (`promo_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `export_warehouse`
--
ALTER TABLE `export_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `warehouse_product_id` (`warehouse_product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `group_product`
--
ALTER TABLE `group_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `group_product_rel`
--
ALTER TABLE `group_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `group_product_rel_ibfk_1` (`group_id`),
  ADD KEY `group_product_rel_ibfk_2` (`product_id`);

--
-- Indexes for table `images_product`
--
ALTER TABLE `images_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `image_product_rel`
--
ALTER TABLE `image_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `image_product_rel_ibfk_1` (`image_id`),
  ADD KEY `image_product_rel_ibfk_2` (`product_id`);

--
-- Indexes for table `import_warehouse`
--
ALTER TABLE `import_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `import_warehouse_ibfk_1` (`warehouse_id`),
  ADD KEY `import_warehouse_ibfk_2` (`warehouse_product_id`);

--
-- Indexes for table `logo_category_web`
--
ALTER TABLE `logo_category_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `promo_product_rel_ibfk_2` (`promo_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `warehouse_product`
--
ALTER TABLE `warehouse_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `warehouse_product_rel_ibfk_1` (`warehouse_id`),
  ADD KEY `warehouse_product_id` (`warehouse_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_web`
--
ALTER TABLE `category_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `export_warehouse`
--
ALTER TABLE `export_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_product`
--
ALTER TABLE `group_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `group_product_rel`
--
ALTER TABLE `group_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `image_product_rel`
--
ALTER TABLE `image_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `import_warehouse`
--
ALTER TABLE `import_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `logo_category_web`
--
ALTER TABLE `logo_category_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warehouse_product`
--
ALTER TABLE `warehouse_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `category_web`
--
ALTER TABLE `category_web`
  ADD CONSTRAINT `category_web_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_web_ibfk_2` FOREIGN KEY (`group_main_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_web_ibfk_3` FOREIGN KEY (`group_sub_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_web_ibfk_4` FOREIGN KEY (`promo_id`) REFERENCES `promotion` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `export_warehouse`
--
ALTER TABLE `export_warehouse`
  ADD CONSTRAINT `export_warehouse_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `export_warehouse_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_product` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `group_product_rel`
--
ALTER TABLE `group_product_rel`
  ADD CONSTRAINT `group_product_rel_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_product_rel_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_product_rel`
--
ALTER TABLE `image_product_rel`
  ADD CONSTRAINT `image_product_rel_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_product_rel_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `import_warehouse`
--
ALTER TABLE `import_warehouse`
  ADD CONSTRAINT `import_warehouse_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `import_warehouse_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_product` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  ADD CONSTRAINT `promo_product_rel_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promo_product_rel_ibfk_2` FOREIGN KEY (`promo_id`) REFERENCES `promotion` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  ADD CONSTRAINT `warehouse_product_rel_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_product_rel_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
