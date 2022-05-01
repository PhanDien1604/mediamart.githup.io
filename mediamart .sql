-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2022 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mediamart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_web`
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
-- Đang đổ dữ liệu cho bảng `category_web`
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
-- Cấu trúc bảng cho bảng `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `export_warehouse`
--

CREATE TABLE `export_warehouse` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `creat_at` date NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `export_warehouse`
--

INSERT INTO `export_warehouse` (`id`, `amount`, `creat_at`, `warehouse_id`, `warehouse_product_id`) VALUES
(35, 5, '2022-04-25', 8, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `group_product`
--

CREATE TABLE `group_product` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_product`
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
-- Cấu trúc bảng cho bảng `group_product_rel`
--

CREATE TABLE `group_product_rel` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_product`
--

INSERT INTO `images_product` (`id`, `key`, `path`) VALUES
(48, 'img_prd_main', 'images/products/1650640829771.jpg'),
(49, 'img_prd_sub', 'images/products/1650640829261.png'),
(50, 'img_prd_main', 'images/products/1650732879950.jpg'),
(51, 'img_prd_main', 'images/products/1650732896569.png'),
(52, 'img_prd_main', 'images/products/1650879424653.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product_rel`
--

CREATE TABLE `image_product_rel` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_warehouse`
--

CREATE TABLE `import_warehouse` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `creat_at` date NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `import_warehouse`
--

INSERT INTO `import_warehouse` (`id`, `amount`, `creat_at`, `warehouse_id`, `warehouse_product_id`) VALUES
(37, 10, '2022-04-25', 7, 24),
(38, 5, '2022-04-25', 7, 22),
(39, 20, '2022-04-25', 8, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo_category_web`
--

CREATE TABLE `logo_category_web` (
  `id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logo_category_web`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
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
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `code`, `info`, `total_money`, `unit`, `discount`, `subject_apply`, `date_range`, `status`) VALUES
(12, 'KM0003', 'Áp dụng cho khách hàng', 200000, '%', 2, 'Khách hàng', '03/31/2022 - 03/31/2022', NULL),
(20, 'KM0004', 'Áp dụng cho đơn hàng', 100000, 'VNĐ', 10000, 'Đơn hàng', '04/01/2022 - 04/01/2022', 'on'),
(21, 'KM0002', 'KM san pham', NULL, '%', 2, 'Sản phẩm', '04/22/2022 - 04/22/2022', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promo_product_rel`
--

CREATE TABLE `promo_product_rel` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `promo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
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
-- Cấu trúc bảng cho bảng `users`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`) VALUES
(7, 'Cơ sở 1', 'SN 7B ngo 6'),
(8, 'Cơ sở 2', 'SN5'),
(9, 'Cơ sở 3', 'SN 7B ngo 6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_product`
--

CREATE TABLE `warehouse_product` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse_product`
--

INSERT INTO `warehouse_product` (`id`, `code`, `name`, `price`) VALUES
(22, 'MH3245', 'Lenovo Idipad 5', 20000000),
(23, 'MH7236', 'Aser Nitro 5', 20000000),
(24, 'MH0001', 'Dell 5510', 15000000),
(25, 'MH1234', 'Dell 5510', 15000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_product_rel`
--

CREATE TABLE `warehouse_product_rel` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `warehouse_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse_product_rel`
--

INSERT INTO `warehouse_product_rel` (`id`, `warehouse_id`, `warehouse_product_id`) VALUES
(12, 7, 24),
(13, 7, 22),
(14, 8, 24);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_web`
--
ALTER TABLE `category_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `category_web_ibfk_2` (`group_main_id`),
  ADD KEY `category_web_ibfk_3` (`group_sub_id`),
  ADD KEY `promo_id` (`promo_id`);

--
-- Chỉ mục cho bảng `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `export_warehouse`
--
ALTER TABLE `export_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `warehouse_product_id` (`warehouse_product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `group_product`
--
ALTER TABLE `group_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `group_product_rel`
--
ALTER TABLE `group_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `group_product_rel_ibfk_1` (`group_id`),
  ADD KEY `group_product_rel_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `images_product`
--
ALTER TABLE `images_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `image_product_rel_ibfk_1` (`image_id`),
  ADD KEY `image_product_rel_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `import_warehouse`
--
ALTER TABLE `import_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `import_warehouse_ibfk_1` (`warehouse_id`),
  ADD KEY `import_warehouse_ibfk_2` (`warehouse_product_id`);

--
-- Chỉ mục cho bảng `logo_category_web`
--
ALTER TABLE `logo_category_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `promo_product_rel_ibfk_2` (`promo_id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `warehouse_product`
--
ALTER TABLE `warehouse_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `warehouse_product_rel_ibfk_1` (`warehouse_id`),
  ADD KEY `warehouse_product_id` (`warehouse_product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_web`
--
ALTER TABLE `category_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `export_warehouse`
--
ALTER TABLE `export_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `group_product`
--
ALTER TABLE `group_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `group_product_rel`
--
ALTER TABLE `group_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `import_warehouse`
--
ALTER TABLE `import_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `logo_category_web`
--
ALTER TABLE `logo_category_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `warehouse_product`
--
ALTER TABLE `warehouse_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_web`
--
ALTER TABLE `category_web`
  ADD CONSTRAINT `category_web_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_web_ibfk_2` FOREIGN KEY (`group_main_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_web_ibfk_3` FOREIGN KEY (`group_sub_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_web_ibfk_4` FOREIGN KEY (`promo_id`) REFERENCES `promotion` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `export_warehouse`
--
ALTER TABLE `export_warehouse`
  ADD CONSTRAINT `export_warehouse_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `export_warehouse_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_product` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `group_product_rel`
--
ALTER TABLE `group_product_rel`
  ADD CONSTRAINT `group_product_rel_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_product_rel_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  ADD CONSTRAINT `image_product_rel_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_product_rel_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `import_warehouse`
--
ALTER TABLE `import_warehouse`
  ADD CONSTRAINT `import_warehouse_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `import_warehouse_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_product` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  ADD CONSTRAINT `promo_product_rel_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promo_product_rel_ibfk_2` FOREIGN KEY (`promo_id`) REFERENCES `promotion` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  ADD CONSTRAINT `warehouse_product_rel_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_product_rel_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
