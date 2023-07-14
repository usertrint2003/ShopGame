-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2023 lúc 02:56 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_oop_php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL COMMENT 'Mã hóa đơn',
  `id_product` int(11) DEFAULT NULL COMMENT 'Mã sản phẩm',
  `id_user` int(11) DEFAULT NULL COMMENT 'Mã khách hàng',
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian tạo',
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_product`, `id_user`, `create_at`, `update_at`) VALUES
(1, 1, 1, '2023-02-19 03:04:01', '2023-02-19 03:04:01'),
(2, 2, 1, '2023-02-19 03:04:18', '2023-02-19 03:04:18'),
(3, 2, 1, NULL, NULL),
(4, 1, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 6, 1, '2023-02-19 03:50:31', '2023-02-19 03:50:31'),
(7, 4, 1, '2023-02-19 10:30:59', '2023-02-19 10:30:59'),
(8, 1, 1, '2023-02-19 10:33:11', '2023-02-19 10:33:11'),
(9, 11, 1, '2023-07-14 19:51:46', '2023-07-14 19:51:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL COMMENT 'Mã danh mục',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên danh mục',
  `image` varchar(255) DEFAULT NULL COMMENT 'Ảnh danh mục',
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian tạo',
  `update_at` datetime DEFAULT NULL COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `create_at`, `update_at`) VALUES
(1, 'Liên quân', 'ShopLienQuan.gif', '2023-02-16 04:47:36', '2023-02-12 13:06:24'),
(2, 'Liên minh', 'ShopLienMinh.gif', '2023-02-16 04:48:24', '2023-02-12 13:06:36'),
(5, 'Free Fire', 'ShopFreeFire.gif', '2023-02-16 04:46:40', '2023-02-16 04:46:43'),
(6, 'Tốc chiến', 'ShopTocChien.gif', '2023-02-16 04:52:58', '2023-02-16 04:52:58'),
(7, 'Ngọc rồng', 'ShopNgocRong.gif', '2023-02-17 01:24:50', '2023-02-17 01:24:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'Mã tài khoản',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên tài khoản sản phẩm',
  `description` varchar(255) DEFAULT NULL COMMENT 'Mô tả',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `image` text DEFAULT NULL COMMENT 'Ảnh sản phẩm',
  `account_product` varchar(255) DEFAULT NULL COMMENT 'Tài khoản',
  `password_product` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu',
  `status` int(11) DEFAULT NULL COMMENT 'Trạng thái mua',
  `id_cate` int(11) DEFAULT NULL COMMENT 'Mã danh mục',
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian tạo',
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `account_product`, `password_product`, `status`, `id_cate`, `create_at`, `update_at`) VALUES
(1, 'Tài khoản liên quân', 'Mô tả tài khoản', 300000, 'fu9FtZUQwS_1646986344.jpg', 'anninh9x', 'Cuongnh', 2, 1, '2023-02-19 10:33:11', '2023-02-19 10:33:11'),
(2, 'Tài khoản liên minh', 'qưdqwdqwdqw', 300000, 'image-3c98a69e-acb0-4587-bc1c-ed474bfaaf32.jpeg', 'anninh99', 'Cuongnh', 1, 2, '2023-02-19 09:56:52', '2023-02-19 09:56:52'),
(4, 'Tài khoản liên quân 3', 'Test 3', 500000, '7iOnnwjgYq_1646986345.jpg', 'anninh95d', 'dưqdwqdwqdqw', 2, 1, '2023-02-19 10:30:59', '2023-02-19 10:30:59'),
(5, 'Tài khoản liên quân 4', 'Hihi', 300000, 'GYwsPyLvM9_1674280494.jpg', 'anninh95d', '12332131', 1, 1, '2023-02-19 01:23:15', '2023-02-19 01:23:15'),
(6, 'Tài khoản liên quân 5', 'dqdwqdwq', 2332122, '4onVhiCtJ5_1676526176.jpg', 'dưqdqw', 'dưqdwq', 1, 1, '2023-02-19 09:56:55', '2023-02-19 09:56:55'),
(7, 'Tài khoản liên quân 6', 'sadasda', 300000, 'QqertYXgrV_1658543673.jpg', 'ádsads', 'dsadasda', 1, 1, '2023-02-19 01:23:16', '2023-02-19 01:23:16'),
(8, 'Tài khoản liên quân 7', '2131312', 300000, 'NXiJ62OGmH_1658547313.jpg', '3123123123', '1232132131', 1, 1, '2023-02-19 01:23:16', '2023-02-19 01:23:16'),
(9, 'Tài khoản liên quân 8', 'dsqdwqdqw', 300000, 'pqNqAk0ysq_1658568463.jpg', 'dqwdqwdwq', 'dqwdqwdqw', 1, 1, '2023-02-19 01:23:17', '2023-02-19 01:23:17'),
(10, 'Tài khoản liên quân 8', '31231231', 300000, 'T4r3VVSeuF_1658570178.jpg', '31231231', '3132131', 1, 1, '2023-02-19 01:23:17', '2023-02-19 01:23:17'),
(11, 'Tài khoản liên quân 9', '3123123', 21313, '68crrF4yRg_1658570511.jpg', '312312', '5412412', 2, 1, '2023-07-14 19:51:46', '2023-07-14 19:51:46'),
(12, 'Tài khoản liên quân 11', '321321', 231231, 'SyvOoq43dJ_1658571131.jpg', '31231231233', '12312312', 1, 1, '2023-02-19 01:23:18', '2023-02-19 01:23:18'),
(13, 'Tài khoản ngọc rồng', 'fwejhfweidqwdq', 50000, '328521842_1254673382147255_7683267750165101048_n.jpg', 'ưqdqwdwqđ', 'dqwdqwdwqqdwq', 1, 7, '2023-02-19 02:07:22', '2023-02-19 02:07:22'),
(14, 'Tài khoản ngọc rồng 1', '312321321', 300000, '324471735_486448826894834_7460284253730174089_n.jpg', '312312', '312322131', 1, 7, '2023-02-19 01:23:19', '2023-02-19 01:23:19'),
(15, 'Tài khoản free fire', 'dqwdwqd', 30000, '578aa69ac2a95d83afedaf85ec4d6fa0.jpg', 'dưqdwqdwq', 'dqwdwqdqw', 1, 5, '2023-02-19 01:23:19', '2023-02-19 01:23:19'),
(16, 'Tài khoản free fire 1', '312313211312', 11, '1ad5551e3b4db000e78f3b8dd65ef450.jpg', '312321312', '1321321321', 1, 5, '2023-02-19 01:23:20', '2023-02-19 01:23:20'),
(17, 'Tài khoản free fire 2', 'dưqdqwdqw', 300000, '49be4b01a98310e72346356dd8b4170a.jpg', 'dưqdqw', 'dqwqwdwqdqw', 1, 5, '2023-02-19 01:23:21', '2023-02-19 01:23:21'),
(18, 'Tài khoản tốc chiến', 'đưqưd', 312321, '63c6528d2968a.jpg', 'dqwdqwdwq', 'dưqdwq', 1, 6, '2023-02-19 01:23:20', '2023-02-19 01:23:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL COMMENT 'Mã ảnh',
  `id_product` int(11) DEFAULT NULL COMMENT 'Mã sản phẩm',
  `url_image` text DEFAULT NULL COMMENT 'Đường dẫn ảnh',
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian tạo',
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'Mã chức vụ',
  `name_role` varchar(255) DEFAULT NULL COMMENT 'Tên chức vụ',
  `create_at` datetime DEFAULT NULL COMMENT 'Thời gian tạo',
  `update_at` datetime DEFAULT NULL COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name_role`, `create_at`, `update_at`) VALUES
(1, 'Admin', '2023-02-12 13:02:03', '2023-02-12 13:02:06'),
(2, 'User', '2023-02-12 13:02:34', '2023-02-12 13:02:38'),
(3, 'Member', '2023-02-16 03:20:46', '2023-02-16 03:20:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên hiển thị',
  `id_role` int(11) DEFAULT NULL COMMENT 'Mã chức vụ',
  `code` int(11) DEFAULT NULL COMMENT 'Mã xác thực',
  `money` int(10) UNSIGNED DEFAULT NULL COMMENT 'Tiền khách hàng',
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Thời gian tạo',
  `update_at` datetime DEFAULT NULL COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `id_role`, `code`, `money`, `create_at`, `update_at`) VALUES
(1, 'Admin@gmail.com', '123456', 'Admin', 1, 0, 99378687, '2023-07-14 19:51:46', '2023-02-12 13:04:07'),
(2, 'caubelangthang2003@gmail.com', 'Nguyen30111998', 'Nguyễn Trọng Trí', 2, 728289, 200000, '2023-02-19 10:35:31', '2023-02-12 13:05:38'),
(13, 'maiqqqq02@gmail.com', '123456', '123456', 1, 0, 950000, '2023-02-19 02:06:32', '2023-02-16 01:02:35'),
(14, 'quyetnpph23840@gmail.com', '123456', '123123', 1, 0, 0, '2023-02-16 01:43:41', '2023-02-16 01:43:40'),
(15, '1234@gmail.com', '123456', '#TriChua18', 2, 0, 0, '2023-02-16 02:30:12', '2023-02-16 01:43:43'),
(17, 'tri123@gmail.com', '00000000', 'Trí No Pro', 2, 0, 100000, '2023-02-17 11:22:06', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_bill` (`id_product`),
  ADD KEY `FK_user_bill` (`id_user`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cate_id` (`id_cate`);

--
-- Chỉ mục cho bảng `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_image` (`id_product`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã tài khoản', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã ảnh';

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chức vụ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `FK_product_bill` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_user_bill` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_cate_id` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `FK_product_image` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
