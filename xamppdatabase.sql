CREATE DATABASE gogalse;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cart` (`id`, `product_id`, `name`, `price`, `image`, `added_at`) VALUES
(28, 8, 'img1', 99999999.99, 'gogalse/images/img1.jpg', '2025-06-17 02:15:45'),
(37, 8, 'img1', 99999999.99, 'gogalse/images/img1.jpg', '2025-07-03 02:06:09'),
(38, 10, 'img3', 9898989.00, 'gogalse/images/img3.jpg', '2025-07-03 02:06:11'),
(41, 8, 'img1', 99999999.99, 'gogalse/images/img1.jpg', '2025-07-10 03:56:59'),
(42, 8, 'img1', 99999999.99, 'gogalse/images/img1.jpg', '2025-07-10 06:43:46'),
(44, 17, 'i1.1', 99999999.99, 'gogalse/images/i1.jpg', '2025-07-10 06:45:26'),
(45, 8, 'img1', 99999999.99, 'gogalse/images/img1.jpg', '2025-07-10 07:30:17');


CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'joshi krushal', 'joshiky59@gmail.com', 'good', '2025-07-11 14:47:11'),
(2, 'joshi krushal', 'joshiky59@gmail.com', 'good', '2025-07-11 14:47:25'),
(3, 'joshi krushal', 'jos@gmail.com', 'erferea', '2025-07-17 21:25:30');


CREATE TABLE `goggles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `goggles` (`id`, `name`, `type`, `image`, `price`, `description`) VALUES
(1, 'RayBan Aviator', 'Sunglasses', 'assets/images/rayban.jpg', 120.00, 'Stylish aviator sunglasses for daily wear'),
(2, '3M Safety Glasses', 'Safety Goggles', 'assets/images/3m.jpg', 20.00, 'Protective eyewear for industrial use'),
(3, 'Speedo Swim Goggles', 'Swimming Goggles', 'assets/images/speedo.jpg', 25.00, 'Anti-fog swimming goggles for clear vision'),
(4, 'Smith I/O Mag', 'Ski Goggles', 'assets/images/ski.jpg', 180.00, 'Premium ski goggles for snow sports'),
(5, 'Meta Quest 2', 'VR Goggles', 'assets/images/vr.jpg', 299.00, 'Advanced virtual reality headset');


CREATE TABLE `goggle_recovery` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mnumber` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `left_lens` varchar(50) NOT NULL,
  `right_lens` varchar(50) NOT NULL,
  `frame_option` enum('shop_frame','upload_frame') NOT NULL,
  `frame_image` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `orders` (`id`, `name`, `address`, `city`, `zip`, `phone`, `total_price`, `created_at`) VALUES
(11, 'khushi', 'fukfghtuhg', 'bardoli', '89562325', '9876541478', 99999999.99, '2025-05-08 06:29:02'),
(12, 'khushi', 'fukfghtuhg', 'bardoli', '89562325', '9876541478', 19.99, '2025-05-08 06:32:01'),
(13, 'khushi', 'fukfghtuhg', 'bardoli', '89562325', '9876541478', 0.00, '2025-05-08 06:38:17'),
(14, 'jk', 'hyygghgytrf', 'surat', '394111', '0987654565', 99999999.99, '2025-05-08 06:40:19'),
(15, 'khushi', 'hyygghgytrf', 'bardoli', '897654', '0987654565', 99999999.99, '2025-05-08 06:43:35'),
(16, 'jk', 'fukfghtuhg', 'surat', '897654', '9876541478', 99999999.99, '2025-05-09 11:41:38'),
(17, 'jk', 'fukfghtuhg', 'surat', '897654', '9876541478', 99999999.99, '2025-05-12 05:55:39'),
(18, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-06-16 18:38:36'),
(19, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '78994564236', 99999999.99, '2025-06-17 02:16:09'),
(20, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '560556055605', 99999999.99, '2025-06-19 05:25:26'),
(21, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-06-23 02:04:30'),
(22, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-03 02:05:06'),
(23, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-03 02:06:41'),
(24, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-07 06:44:34'),
(25, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-08 05:21:20'),
(26, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-11 09:22:29'),
(27, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-15 01:59:30'),
(28, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '3286582', 99999999.99, '2025-07-17 17:03:48'),
(29, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-25 09:42:00');


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `company` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `products` (`id`, `name`, `type`, `image`, `price`, `description`, `created_at`, `company`, `user_id`) VALUES
(8, 'img1', 'sun gogalse', 'gogalse/images/img1.jpg', 99999999.99, 'best img1 sun gogalse', '2025-05-07 07:53:31', NULL, 0),
(9, 'img2', 'sun gogalse', 'gogalse/images/img2.jpg', 99999999.99, 'img2 sun gogalse', '2025-05-07 07:55:19', NULL, 0),
(10, 'img3', 'sun gogalse', 'gogalse/images/img3.jpg', 9898989.00, 'img3 sun gogalse', '2025-05-07 07:56:04', NULL, 0),
(11, 'img4', 'sun gogalse', 'gogalse/images/img4.jpg', 99999999.99, 'img4 sun gogalse', '2025-05-07 07:56:36', NULL, 0),
(12, 'i1', 'number gogalse', 'gogalse/images/i1.jpg', 111119.00, 'number gogalse', '2025-05-07 08:01:41', NULL, 0),
(13, 'i2', 'number gogalse', 'gogalse/images/i2.jpg', 99999999.99, 'number gogalse', '2025-05-07 08:02:11', NULL, 0),
(14, 'i3', 'number gogalse', 'gogalse/images/i3.jpg', 997874.00, 'number gogalse', '2025-05-07 08:02:38', NULL, 0),
(15, 'i4', 'number gogalse', 'gogalse/images/i4.jpg', 859674.00, 'number gogalse', '2025-05-07 08:03:12', NULL, 0),
(16, 'jk', '1 Sun GoGalse', 'gogalse/images/h1.jpg.png', 99999.00, 'demo for edite option', '2025-05-07 08:09:08', 'Ray-Ban', 0),
(17, 'i1.1', '2 Num GoGalse', 'gogalse/images/i1.jpg', 99999999.99, 'example ', '2025-05-07 08:15:28', 'Ray-Ban', 0),
(18, 'jk', '2 Num GoGalse', 'gogalse/images/IMG_20240423_100539.jpg', 999.00, 'hgugiy', '2025-05-08 04:55:05', 'Gucci', 0),
(22, 'demo2', '2 Num GoGalse', 'gogalse/images/kajalmaam.jpg', 125.00, 'demo2', '2025-05-12 04:58:07', 'Armani', 0),
(23, 'demo1', '1 Sun GoGalse', 'gogalse/images/68218a1d0f6b0_IMG_20240512_191131.jpg', 9896.00, 'demo1', '2025-05-12 05:41:49', 'Armani', 0),
(25, 'ndemo1', '1 Sun GoGalse', 'gogalse/images/68218b603b173_IMG_20240428_000455.jpg', 99999999.99, 'ndemo1 image and prodiuct', '2025-05-12 05:47:12', 'Ray-Ban', 2),
(26, 'newus', '1 Sun GoGalse', 'gogalse/images/68218d1449d6e_IMG_20240423_101432.jpg', 99999999.99, 'demo test njhfjbrhej', '2025-05-12 05:54:28', 'Gucci', 2),
(27, 'jkvghj cfgmmmmmm', '1 Sun GoGalse', 'gogalse/images/68665484a4c3e_canvademo bnana.png', 111111.00, 'after iupdate sellet.php', '2025-07-03 09:59:32', 'Ray-Ban', 31),
(28, 'jk', '1 Sun GoGalse', 'gogalse/images/686cab6393d23_Screenshot 2025-06-27 134658.png', 99999999.99, 'nikhil 1.1', '2025-07-08 05:23:47', 'Ray-Ban', 36);


CREATE TABLE `recover` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `left_lens_number` varchar(50) NOT NULL,
  `right_lens_number` varchar(50) NOT NULL,
  `frame_id` int(11) DEFAULT NULL,
  `frame_name` varchar(100) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `recover` (`id`, `username`, `mobile`, `address`, `gmail`, `left_lens_number`, `right_lens_number`, `frame_id`, `frame_name`, `total`, `notes`, `created_at`) VALUES
(1, 'jk', '8529637410', 'fgchg', 'x@gmail.com', '0.5', '1', 14, 'i3', 997874.00, 'fkvuo', '2025-07-10 07:48:50'),
(2, 'joshi', '8529637410', 'vffvd', 'x@gmail.com', '0.5', '1', 11, 'img4', 99999999.99, 'fdve', '2025-07-10 08:02:52'),
(3, 'joshi', '8529637410', 'vffvd', 'x@gmail.com', '0.5', '1', 11, 'img4', 99999999.99, 'fdve', '2025-07-10 08:03:59'),
(4, 'cus', '8529637410', 'htr', '23bca059@vtcbcsr.edu.in', '0.5', '1', 8, 'img1', 99999999.99, '', '2025-07-10 08:05:15'),
(5, 'iu', '8529637410', 'cfcffjgy', 'x@gmail.com', '0.5', '1', 8, 'img1', 99999999.99, 'not in coolage', '2025-07-11 06:33:13'),
(6, 'joshi', '8529637410', 'yewdqewulbdui', 'x@gmail.com', '0.5', '5', 9, 'img2', 99999999.99, '', '2025-07-11 09:06:29'),
(7, 'joshi', '8529637410', 'yewdqewulbdui', 'x@gmail.com', '0.5', '5', 9, 'img2', 99999999.99, '', '2025-07-11 09:07:14'),
(8, 'joshi', '8529637410', 'yewdqewulbdui', 'x@gmail.com', '0.5', '5', 9, 'img2', 99999999.99, '', '2025-07-11 09:08:20'),
(9, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:12'),
(10, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:13'),
(11, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:15'),
(12, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:15'),
(13, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:15'),
(14, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:15'),
(15, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:16');


CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','seller') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `phone`) VALUES
(2, 'seller1', 'pass123', 'seller', 'example@example.com', '1234567890'),
(22, 'exam1', '$2y$10$Tn3nhaacu9Ku.mctw9SRZeTbgDIwRhp.DuXty9BMU9WjOlInrabPW', 'customer', 'exam@gmail.com', '1231231231'),
(24, 'ram123', '$2y$10$ncVI/6.XTUCYjctYTQK/O.vpq7REK.Z19gSN7iFM8cs4LPWm/eAJW', 'seller', 'ram123@gmail.com', '1234567895'),
(25, 'ram5605', '$2y$10$DsRqukHaJ5k16tJKRiiFN.zSVzDHfUVxnPx5/9JVwiJ8hhbeC2OT2', 'seller', 'ram5605@gmail.com', '560556055605'),
(26, 'jk123', '$2y$10$L75LyYC7Wc4f74pIcAvtWePz2xnQkTnvmbEO.eOc4.rLY93yIcdzq', 'seller', 'jk123@gmail.com', '1234567854'),
(27, 'raj', '$2y$10$eAldaGidcTyoXQCDUnr2We5Yrk8qmpPEqci0VakRG814VegBH2Vqm', 'customer', 'raj1@gmail.com', '7897537419'),
(28, 'a1', '$2y$10$P3LBXtPFlfk.9qySFjfawe0itol62EFHxVdBwAI4Cl2IDUbE2jZAW', 'seller', 'a1@gmail.com', '9876541478'),
(29, 'mmmm', '$2y$10$OG8sf.uCk7al3C0ZG5oncOQc27KmoEUjDwbcZBVMBp7AGRVgqvozq', 'seller', 'acb@gmail.com', '9876541478'),
(30, 'c1', '$2y$10$zHQRG9G3MsSAMEb5p5f3AeOTRHciH8ykE/q5jD5CZhXpg/5nXJgii', 'customer', 'c1@gmail.com', '9876541478'),
(31, 'm1', '$2y$10$Kio5wgcho6teMasxY7AJ7.jbquu1H3o7lRpSDXHOsZ4qbn78eMfcC', 'seller', 'm1@gmail.com', '8596526345'),
(32, 'my', '$2y$10$CMEPC1WkJNmSwrSebzxPcOfyCMZaocPNJDIFzHAeq3d49XDr2bB02', 'customer', 'my1@gmail.com', '8596526349'),
(33, 's', '$2y$10$nfvNxaqZHstV9/a8fp3hfu1jDXLzjrdid34JSKnf37VqxkZHhWtXu', 'seller', 'acb@gmail.com', '9876541478'),
(34, 'nikhil', '$2y$10$LVTEnp93ErwmQ.C/RsyAO.VboHfTRjDeSVSdQesSi3K6fQDriZ6X6', 'seller', 'jos@gmail.com', '9876541478'),
(35, 'l', '$2y$10$FCoRYhlcG/MKaOn393xPyO6zotOWHGOm/pWsWGg0QIrpc4xxjCxca', 'customer', 'acb@gmail.com', '9876541478'),
(36, 'ls', '$2y$10$pP/04DQJF0L2aXGJgL.LDOOrs6IjXP9VyfiSbsyiV0Q3O0w2S4tfG', 'seller', 'joshi@gmail.com', '9876541478'),
(37, 'yash', '$2y$10$Es9tKTyPfu5NX2uUs7GzXOLjS7TquWi86exOjP3bQ15cbMnrS/aq6', 'customer', 'yash@gmail.com', '9876541478'),
(38, 'n', '$2y$10$45WLBtHdmRih/BKXBbWtH.eXVmjG6BemfflwFHOrEl5tUN0yl2rVm', 'seller', 'acb@gmail.com', '9876541478'),
(39, '23bca059', '$2y$10$bDKyNKJrfRF.ANiHjgM.TuTou3vFzZE8EnTZxLquRwADaovHDParS', 'customer', '23bca059@vtcbcsr.edu.in', '8780230790'),
(40, 'krushal', '$2y$10$g8BdsIbRioWlWLjzZLgB/elaayXuM2yTnLwwaF1kKrKaVrWTqcAKW', 'customer', 'krushaljoshi9@gmail.com', '8780230790');



ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `goggles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `goggle_recovery`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `recover`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `goggles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `goggle_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE `recover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;
