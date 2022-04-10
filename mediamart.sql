-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2022 lúc 10:52 AM
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
  `row` int(11) DEFAULT NULL,
  `group_main_id` int(11) DEFAULT NULL,
  `group_main_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_sub_id` int(11) DEFAULT NULL,
  `group_sub_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_web`
--

INSERT INTO `category_web` (`id`, `row`, `group_main_id`, `group_main_name`, `group_sub_id`, `group_sub_name`) VALUES
(11, 1, 11, 'Lenovo', 17, 'Thinkpad'),
(15, 1, 11, 'Lenovo', 12, 'Dell'),
(16, 1, 11, 'Lenovo', 17, 'Thinkpad'),
(17, 1, 17, 'Thinkpad', 11, 'Lenovo'),
(18, 1, 17, 'Thinkpad', 12, 'Dell'),
(19, 1, 17, 'Thinkpad', 17, 'Thinkpad');

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
(11, 'NH1234', 'Lenovo'),
(12, 'NH0001', 'Dell'),
(17, 'NH0003', 'Thinkpad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_product_rel`
--

CREATE TABLE `group_product_rel` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_product_rel`
--

INSERT INTO `group_product_rel` (`id`, `group_id`, `product_id`) VALUES
(53, 11, 9),
(56, 17, 9),
(63, 12, 9),
(64, 12, 10),
(65, 12, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` int(11) NOT NULL,
  `fullname` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_product`
--

INSERT INTO `images_product` (`id`, `fullname`) VALUES
(11, 'images/1648528598436.png'),
(17, 'images/1648644020634.png'),
(18, 'images/1648648251921.png'),
(19, 'images/1648665871393.png'),
(20, 'images/1648665898734.png'),
(21, 'images/1648797933396.png');

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
(11, 11, 6),
(17, 17, 9),
(18, 18, 10),
(19, 19, 11),
(20, 20, 12),
(21, 21, 13);

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
(6, 'MH3245', 'Lenovo Idipad 5', NULL, NULL, NULL, 15000000, NULL, NULL, '03/29/2022', NULL),
(9, 'MH0001', 'Dell 7541', NULL, NULL, NULL, 20000000, '0', NULL, '03/30/2022', NULL),
(10, 'MH0002', 'Aser Nitro 5', NULL, NULL, NULL, 15000000, NULL, NULL, '03/30/2022', 'on'),
(11, 'MH0004', 'Dell 7541', NULL, NULL, NULL, 15000000, NULL, NULL, '03/31/2022', 'on'),
(12, 'MH0005', 'Lenovo Idipad 5', NULL, NULL, NULL, 20000000, NULL, NULL, '03/31/2022', 'on'),
(13, 'MH0009', 'Aser Nitro 5', NULL, NULL, NULL, 15000000, '19', NULL, '04/01/2022', 'on');

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
(1, 'banner_top', 'images/website/1649263757379.png'),
(2, 'banner_top', 'images/website/1649263757805.gif'),
(3, 'banner_top', 'images/website/164926375749.png'),
(4, 'banner_body', 'images/website/164926375844.png'),
(5, 'banner_body', 'images/website/1649263758889.png'),
(7, 'banner_body', 'images/website/1649263758683.png'),
(9, 'banner_promo', 'images/website/1649263758913.png'),
(10, 'banner_sub', 'images/website/1649263904653.png'),
(11, 'banner_sub', 'images/website/164926390473.png'),
(12, 'banner_sub', 'images/website/1649263904771.png'),
(14, 'banner_body', 'images/website/1649265676591.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `group_product_rel`
--
ALTER TABLE `group_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `image_product_rel`
--
ALTER TABLE `image_product_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
