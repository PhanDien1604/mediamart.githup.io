-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2022 lúc 11:34 AM
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
-- Cấu trúc bảng cho bảng `category_promo_web`
--

CREATE TABLE `category_promo_web` (
  `id` int(11) NOT NULL,
  `promo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_promo_web`
--

INSERT INTO `category_promo_web` (`id`, `promo_id`) VALUES
(1, 19),
(2, 20),
(3, 12);

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
  `group_sub_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_web`
--

INSERT INTO `category_web` (`id`, `key`, `row`, `logo`, `group_id`, `group_name`, `group_main_id`, `group_main_name`, `group_sub_id`, `group_sub_name`) VALUES
(45, 'category-sub', 1, NULL, NULL, NULL, 18, 'Tivi', 21, 'SamSung'),
(46, 'category-sub', 1, NULL, NULL, NULL, 18, 'Tivi', 26, 'Sony'),
(47, 'category-sub', 1, NULL, NULL, NULL, 18, 'Tivi', 27, 'LG'),
(48, 'category-sub', 1, NULL, NULL, NULL, 22, 'Loa, Âm thanh', 23, 'Loa Bluetooth'),
(49, 'category-sub', 1, NULL, NULL, NULL, 24, 'Phụ kiện Tivi', 25, 'Khung treo Tivi'),
(53, 'category-main', 1, NULL, 18, 'Tivi', NULL, NULL, NULL, NULL),
(54, 'category-main', 1, NULL, 19, 'Loa', NULL, NULL, NULL, NULL),
(55, 'category-main', 1, NULL, 20, 'Dàn Karaoke', NULL, NULL, NULL, NULL);

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
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_product`
--

INSERT INTO `group_product` (`id`, `code`, `name`) VALUES
(18, 'TV', 'Tivi'),
(19, 'LOA', 'Loa'),
(20, 'KROK', 'Dàn Karaoke'),
(21, 'SS', 'SamSung'),
(22, 'LOAAT', 'Loa, Âm thanh'),
(23, 'LOA1', 'Loa Bluetooth'),
(24, 'PKTV', 'Phụ kiện Tivi'),
(25, 'PKTV1', 'Khung treo Tivi'),
(26, 'SONY', 'Sony'),
(27, 'LG', 'LG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_product_rel`
--

CREATE TABLE `group_product_rel` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_product`
--

INSERT INTO `images_product` (`id`, `key`, `path`) VALUES
(35, 'img_prd_main', 'images/products/1650038067917.png'),
(36, 'img_prd_sub', 'images/products/1650038067856.png'),
(37, 'img_prd_main', 'images/products/1650038224831.png'),
(38, 'img_prd_sub', 'images/products/1650038224162.png'),
(40, 'img_prd_sub', 'images/products/165003825020.png'),
(42, 'img_prd_sub', 'images/products/1650038822825.png'),
(43, 'img_prd_main', 'images/products/1650038960235.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product_rel`
--

CREATE TABLE `image_product_rel` (
  `id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_product_rel`
--

INSERT INTO `image_product_rel` (`id`, `image_id`, `product_id`) VALUES
(35, 35, 19),
(36, 36, 19),
(37, 37, 21),
(38, 38, 21),
(40, 40, 21),
(42, 42, 9),
(43, 43, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo_category_web`
--

CREATE TABLE `logo_category_web` (
  `id` int(11) NOT NULL,
  `row` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_prd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `promo_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction_article` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creat_at` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `info`, `group_prd`, `amount`, `price`, `promo_id`, `introduction_article`, `creat_at`, `status`) VALUES
(9, 'MH0001', 'Dell 7541', NULL, NULL, NULL, 20000000, '0', NULL, '03/30/2022', NULL),
(10, 'MH0002', 'Aser Nitro 5', NULL, NULL, NULL, 15000000, '0', NULL, '03/30/2022', 'on'),
(19, 'MH723615', 'Lenovo Idipad 5', NULL, NULL, NULL, 20000000, '0', NULL, '04/15/2022', 'on'),
(21, 'MH723619', 'Lenovo Idipad 5', NULL, NULL, NULL, 20000000, '0', NULL, '04/15/2022', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `unit` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `subject_apply` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_range` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `code`, `info`, `total_money`, `unit`, `discount`, `subject_apply`, `date_range`, `status`) VALUES
(12, 'KM0003', 'Áp dụng cho khách hàng', 200000, '%', 2, 'Khách hàng', '03/31/2022 - 03/31/2022', NULL),
(19, 'KM0001', 'Áp dụng cho sản phẩm', NULL, '%', 7, 'Sản phẩm', '04/01/2022 - 04/01/2022', 'on'),
(20, 'KM0004', 'Áp dụng cho đơn hàng', 100000, 'VNĐ', 10000, 'Đơn hàng', '04/01/2022 - 04/01/2022', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promo_product_rel`
--

CREATE TABLE `promo_product_rel` (
  `id` int(11) NOT NULL,
  `promo_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promo_product_rel`
--

INSERT INTO `promo_product_rel` (`id`, `promo_id`, `product_id`) VALUES
(3, 11, 10),
(5, 12, 11),
(6, 12, 9);

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
(4, 'banner_body', 'images/website/164926375844.png'),
(5, 'banner_body', 'images/website/1649263758889.png'),
(7, 'banner_body', 'images/website/1649263758683.png'),
(9, 'banner_promo', 'images/website/1649263758913.png'),
(10, 'banner_sub', 'images/website/1649263904653.png'),
(11, 'banner_sub', 'images/website/164926390473.png'),
(12, 'banner_sub', 'images/website/1649263904771.png'),
(14, 'banner_body', 'images/website/1649265676591.png'),
(16, 'banner_top', 'images/website/1650096293839.png'),
(17, 'banner_top', 'images/website/1650096293613.gif'),
(18, 'banner_top', 'images/website/1650096293887.png');

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
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`) VALUES
(2, 'Cơ sở 3', 'SN 7B ngo 6'),
(3, 'Cơ sở 2', 'SN5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_product_rel`
--

CREATE TABLE `warehouse_product_rel` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse_product_rel`
--

INSERT INTO `warehouse_product_rel` (`id`, `warehouse_id`, `product_id`, `product_amount`) VALUES
(10, 2, 9, NULL),
(11, 2, 10, NULL),
(16, 2, 12, NULL),
(17, 3, 9, 10),
(18, 3, 11, 3),
(19, 3, 10, 5),
(20, 3, 12, 18),
(21, 2, 13, 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_promo_web`
--
ALTER TABLE `category_promo_web`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_web`
--
ALTER TABLE `category_web`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group_product_rel`
--
ALTER TABLE `group_product_rel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images_product`
--
ALTER TABLE `images_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_rel_ibfk_1` (`image_id`),
  ADD KEY `image_product_rel_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `logo_category_web`
--
ALTER TABLE `logo_category_web`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_promo_web`
--
ALTER TABLE `category_promo_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category_web`
--
ALTER TABLE `category_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `group_product`
--
ALTER TABLE `group_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `group_product_rel`
--
ALTER TABLE `group_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `promo_product_rel`
--
ALTER TABLE `promo_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `warehouse_product_rel`
--
ALTER TABLE `warehouse_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  ADD CONSTRAINT `image_product_rel_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_product_rel_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
