-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2022 lúc 11:37 AM
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
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_product`
--

INSERT INTO `images_product` (`id`, `fullname`) VALUES
('MH3245', 'public/assets/images/MH3245-1.png|public/assets/images/MH3245-2.png'),
(NULL, 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public-2.png'),
(NULL, 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\/assets-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\/assets-2.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\/assets-3.png'),
(NULL, 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\/assets/images-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\/assets/images-2.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\/assets/images-3.png'),
('IM123', 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesIM123-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesIM123-2.png'),
(NULL, 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-2.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-3.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-4.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-5.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-6.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-7.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-8.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-9.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\images-10.png'),
('IM8974', 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesIM8974-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesIM8974-2.png'),
('MH7236', 'C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-1.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-2.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-3.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-4.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-5.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-6.png|C:\\xampp\\htdocs\\ProjectShop\\MediaMart\\public\\assets\\imagesMH7236-7.png');

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
  `id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `infor` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '',
  `group_prd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `promo` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '',
  `supplier` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '',
  `introduction_article` varchar(1000) COLLATE utf8_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `infor`, `group_prd`, `amount`, `price`, `promo`, `supplier`, `introduction_article`) VALUES
('MH1234', 'Aser Nitro 5', 'Bộ nhớ 64GB...', '', 10, 25000000, 'Tặng bao lô...', '', ''),
('MH3245', 'Lenovo Idipad 5', 'ạdkjahskdasd', '', 5, 20000000, 'sdasd', 'saaaa', 'Điền nội dung bài viết...'),
('MH7236', 'Dell 7541', 'dfghdfgdf', '', 10, 15000000, 'ádasdasdsa', 'rtyertyedsff', 'sdasdads'),
('MH7236', 'Dell 7541', 'dfghdfgdf', '', 10, 15000000, NULL, 'rtyertyedsff', 'sdasdads'),
('MH7236', 'Dell 7541', 'dfghdfgdf', '', 10, 15000000, NULL, 'rtyertyedsff', NULL),
('MH3245', 'Dell 7541', NULL, '', 10, 15000000, NULL, NULL, NULL),
('MH3245', 'Dell 7541', NULL, '', 10, 15000000, NULL, NULL, NULL),
('HK1654', 'Dell 7500', '', 'Aser', NULL, NULL, '', '', ''),
('MH7236', 'Dell 7541', NULL, '', 5, 15000000, NULL, NULL, NULL),
('MH7236', 'Dell 7541', NULL, 'Texas', 5, 15000000, NULL, NULL, NULL),
('MH7236', 'Dell 7541', NULL, 'Texas', 5, 15000000, NULL, NULL, NULL),
('MH7236', 'Lenovo Idipad 5', NULL, 'California', 10, 15000000, NULL, NULL, NULL),
('MH7236', 'Lenovo Idipad 5', NULL, 'Alaska', 5, 20000000, NULL, NULL, NULL),
('MH7236', 'Lenovo Idipad 5', NULL, 'Alaska', 5, 20000000, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('MH3245', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('MH3245', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('MH3245', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('MH3245', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('IM123', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('IM123', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('IM8974', NULL, NULL, '--Nhóm sản phẩm--', NULL, NULL, NULL, NULL, NULL),
('MH7236', NULL, NULL, '--Nhóm sản phẩm--', 10, NULL, NULL, NULL, NULL);

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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
