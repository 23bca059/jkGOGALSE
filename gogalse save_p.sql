-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2025 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogalse`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `name`, `price`, `image`, `added_at`) VALUES
(52, 9, 'img2', 99999999.99, 'gogalse/images/img2.jpg', '2025-08-12 15:35:27'),
(53, 31, 'demojk_2', 222.00, 'gogalse/images/68920daf89175_h3.jpg.png', '2025-08-12 15:35:29'),
(54, 8, 'img1', 99999999.99, 'gogalse/images/img1.jpg', '2025-08-13 06:31:28'),
(57, 15, 'i4', 859674.00, 'gogalse/images/i4.jpg', '2025-08-13 08:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eye_test_bookings`
--

CREATE TABLE `eye_test_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eye_test_bookings`
--

INSERT INTO `eye_test_bookings` (`id`, `name`, `email`, `phone`, `city`, `date`, `time`, `created_at`) VALUES
(1, 'joshi krushal', 'acb@gmail.com', '9876541478', 'Bardoli', '2025-08-05', '17:58:00', '2025-08-05 12:29:06'),
(2, 'joshi krushal', 'acb@gmail.com', '9876541478', 'Bardoli', '2025-08-05', '17:58:00', '2025-08-05 12:30:41'),
(3, 'jky', 'jos@gmail.com', '0987654565', 'Bardoli', '2025-08-08', '18:03:00', '2025-08-05 12:31:29'),
(4, 'jky', 'jos@gmail.com', '0987654565', 'Bardoli', '2025-08-08', '18:03:00', '2025-08-05 12:32:40'),
(5, 'jky', 'jos@gmail.com', '0987654565', 'Bardoli', '2025-08-08', '18:03:00', '2025-08-05 12:34:05'),
(6, 'jky', 'jos@gmail.com', '0987654565', 'Bardoli', '2025-08-08', '18:03:00', '2025-08-05 12:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'joshi krushal', 'joshiky59@gmail.com', 'good', '2025-07-11 14:47:11'),
(2, 'joshi krushal', 'joshiky59@gmail.com', 'good', '2025-07-11 14:47:25'),
(3, 'joshi krushal', 'jos@gmail.com', 'erferea', '2025-07-17 21:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `goggles`
--

CREATE TABLE `goggles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goggles`
--

INSERT INTO `goggles` (`id`, `name`, `type`, `image`, `price`, `description`) VALUES
(1, 'RayBan Aviator', 'Sunglasses', 'assets/images/rayban.jpg', 120.00, 'Stylish aviator sunglasses for daily wear'),
(2, '3M Safety Glasses', 'Safety Goggles', 'assets/images/3m.jpg', 20.00, 'Protective eyewear for industrial use'),
(3, 'Speedo Swim Goggles', 'Swimming Goggles', 'assets/images/speedo.jpg', 25.00, 'Anti-fog swimming goggles for clear vision'),
(4, 'Smith I/O Mag', 'Ski Goggles', 'assets/images/ski.jpg', 180.00, 'Premium ski goggles for snow sports'),
(5, 'Meta Quest 2', 'VR Goggles', 'assets/images/vr.jpg', 299.00, 'Advanced virtual reality headset');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `payment_proof` varchar(255) DEFAULT NULL,
  `payment_status` enum('Pending','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `zip`, `phone`, `total_price`, `created_at`, `status`, `payment_proof`, `payment_status`) VALUES
(11, 0, 'khushi', 'fukfghtuhg', 'bardoli', '89562325', '9876541478', 99999999.99, '2025-05-08 06:29:02', 'Pending', NULL, 'Pending'),
(12, 0, 'khushi', 'fukfghtuhg', 'bardoli', '89562325', '9876541478', 19.99, '2025-05-08 06:32:01', 'Pending', NULL, 'Pending'),
(13, 0, 'khushi', 'fukfghtuhg', 'bardoli', '89562325', '9876541478', 0.00, '2025-05-08 06:38:17', 'Pending', NULL, 'Pending'),
(14, 0, 'jk', 'hyygghgytrf', 'surat', '394111', '0987654565', 99999999.99, '2025-05-08 06:40:19', 'Pending', NULL, 'Pending'),
(15, 0, 'khushi', 'hyygghgytrf', 'bardoli', '897654', '0987654565', 99999999.99, '2025-05-08 06:43:35', 'Pending', NULL, 'Pending'),
(16, 0, 'jk', 'fukfghtuhg', 'surat', '897654', '9876541478', 99999999.99, '2025-05-09 11:41:38', 'Pending', NULL, 'Pending'),
(17, 0, 'jk', 'fukfghtuhg', 'surat', '897654', '9876541478', 99999999.99, '2025-05-12 05:55:39', 'Pending', NULL, 'Pending'),
(18, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-06-16 18:38:36', 'Pending', NULL, 'Pending'),
(19, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '78994564236', 99999999.99, '2025-06-17 02:16:09', 'Pending', NULL, 'Pending'),
(20, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '560556055605', 99999999.99, '2025-06-19 05:25:26', 'Pending', NULL, 'Pending'),
(21, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-06-23 02:04:30', 'Pending', NULL, 'Pending'),
(22, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-03 02:05:06', 'Pending', NULL, 'Pending'),
(23, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-03 02:06:41', 'Pending', NULL, 'Pending'),
(24, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-07 06:44:34', 'Pending', NULL, 'Pending'),
(25, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-08 05:21:20', 'Pending', NULL, 'Pending'),
(26, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-11 09:22:29', 'Pending', NULL, 'Pending'),
(27, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-15 01:59:30', 'Pending', NULL, 'Pending'),
(28, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '3286582', 99999999.99, '2025-07-17 17:03:48', 'Pending', NULL, 'Pending'),
(29, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-07-25 09:42:00', 'Pending', NULL, 'Pending'),
(30, 0, 'ritu', '55,sardarvill', 'bardoli', '394601', '0987654565', 99999999.99, '2025-08-02 07:44:17', 'Pending', NULL, 'Pending'),
(31, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '0987654565', 99999999.99, '2025-08-05 13:53:35', 'Pending', NULL, 'Pending'),
(32, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-08-05 14:08:15', 'Pending', NULL, 'Pending'),
(33, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-08-06 06:58:49', 'Pending', NULL, 'Pending'),
(34, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '7845259863', 99999999.99, '2025-08-12 15:35:47', 'Pending', NULL, 'Pending'),
(35, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-08-13 06:57:20', 'Pending', NULL, 'Pending'),
(36, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-08-13 07:04:13', 'Pending', NULL, 'Pending'),
(37, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '0987654565', 99999999.99, '2025-08-13 07:16:32', 'Pending', NULL, 'Pending'),
(38, 0, 'demo_khushi', '55,sardarvill', 'bardoli', '394601', '7845259863', 99999999.99, '2025-08-13 07:23:33', 'Pending', NULL, 'Pending'),
(39, 0, 'kkkkkkkkk', 'kkkkkkkkkkkk', 'kkkkkkkkk', '394601', '9876541478', 99999999.99, '2025-08-13 07:27:33', 'Pending', NULL, 'Pending'),
(40, 0, 'jjjjjjjjjjj', 'jjjjjjjjjjj', 'jjjjjjjjjjjjj', '394601', '7845259863', 99999999.99, '2025-08-13 07:40:36', 'Pending', NULL, 'Pending'),
(41, 0, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '560556055605', 99999999.99, '2025-08-13 08:04:20', 'Pending', NULL, 'Pending'),
(42, 51, 'deeeee', 'moooo', 'unnn', '394601', '3387589687', 99999999.99, '2025-08-13 08:07:41', 'Pending', NULL, 'Pending'),
(43, 51, 'deeeee', 'moooo', 'unnn', '394601', '3387589687', 99999999.99, '2025-08-13 08:09:20', 'Pending', 'uploads/payment_proofs/1755073848_dff clintand sarvar.png', 'Completed'),
(44, 51, 'joshi krushal', '55,sardarvill', 'bardoli', '394601', '9876541478', 99999999.99, '2025-08-13 08:17:00', 'Pending', 'uploads/payment_proofs/1755073116_jkjkjk.png', 'Completed'),
(45, 51, 'dddd', 'ddddddd', 'ddddddd', '394601', '3387589687', 99999999.99, '2025-08-13 08:24:57', 'Pending', 'uploads/payment_proofs/1755073518_canvademo bnana.png', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_orders`
--

CREATE TABLE `prescription_orders` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mnumber` varchar(20) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `left_lens` varchar(50) NOT NULL,
  `right_lens` varchar(50) NOT NULL,
  `frame_option` enum('shop_frame','upload_frame') NOT NULL,
  `frame_image` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription_orders`
--

INSERT INTO `prescription_orders` (`id`, `username`, `mnumber`, `gmail`, `address`, `left_lens`, `right_lens`, `frame_option`, `frame_image`, `notes`, `total_price`, `created_at`) VALUES
(1, 'joshi', '8546132791', 'x@gmail.com', '55,sardarvill', '1', '0.5', 'shop_frame', NULL, '', 1500.00, '2025-08-06 10:30:46'),
(2, 'krushal', '8546132791', '23bca059@vtcbcsr.edu.in', '55,sardarvill', '2', '0.5', 'upload_frame', 'uploads/n2.jpg', '', 0.00, '2025-08-06 10:31:44'),
(3, 'customer1', '8546132791', 'x@gmail.com', '55,sardarvill', '1', '0.5', 'shop_frame', NULL, '', 1500.00, '2025-08-12 15:38:07'),
(4, '1', '8546132791', 'x@gmail.com', '55,sardarvill', '2', '4', 'shop_frame', NULL, 'e3r', 1500.00, '2025-08-13 06:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

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

--
-- Dumping data for table `products`
--

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
(28, 'jk', '1 Sun GoGalse', 'gogalse/images/686cab6393d23_Screenshot 2025-06-27 134658.png', 99999999.99, 'nikhil 1.1', '2025-07-08 05:23:47', 'Ray-Ban', 36),
(29, 'demo1', '1 Sun GoGalse', 'gogalse/images/688dc0e4c67f0_amitsir.jpg', 99999999.99, 'demo ritu', '2025-08-02 07:40:20', 'Ray-Ban', 41),
(31, 'demojk_2', '1 Sun GoGalse', 'gogalse/images/68920daf89175_h3.jpg.png', 222.00, 'demojk ok', '2025-08-05 13:57:03', 'Ray-Ban', 45),
(32, 'sjk', '1 Sun GoGalse', 'gogalse/images/689b6086b7907_Screenshot 2025-08-05 193307.png', 555.00, 'demo for sjk', '2025-08-12 15:40:54', 'Gucci', 53),
(33, 'sjk2', '2 Num GoGalse', 'gogalse/images/689b60a79e478_dff clintand sarvar.png', 666.00, 'demo for sjk2', '2025-08-12 15:41:27', 'Ray-Ban', 53);

-- --------------------------------------------------------

--
-- Table structure for table `recover`
--

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

--
-- Dumping data for table `recover`
--

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
(15, 'ftr', '8529637410', 'bfgh', 'x@gmail.com', '0.5', '1', 0, '', 0.00, 'nnn', '2025-07-17 16:13:16'),
(16, 'ritu', '8529637410', 't456ertftyrty', 'x@gmail.com', '0.5', '1', 29, 'demo1', 99999999.99, 'trky', '2025-08-02 07:46:09'),
(17, 'ritu', '8529637410', 't456ertftyrty', 'x@gmail.com', '0.5', '1', 29, 'demo1', 99999999.99, 'trky', '2025-08-02 07:46:11'),
(18, 'xyzzz', '8529637410', 'fdnibfjdsnfbdskjsd', 'x@gmail.com', '0.5', '1', 9, 'img2', 99999999.99, 'optional ', '2025-08-05 13:54:45'),
(19, 'xyzzz', '8529637410', 'fdnibfjdsnfbdskjsd', 'x@gmail.com', '0.5', '1', 9, 'img2', 99999999.99, 'optional ', '2025-08-05 13:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_history`
--

CREATE TABLE `shopping_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `items` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` varchar(50) DEFAULT 'Pending',
  `payment_proof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_history`
--

INSERT INTO `shopping_history` (`id`, `user_id`, `order_date`, `items`, `total_price`, `payment_status`, `payment_proof`) VALUES
(1, 51, '2025-08-13 08:07:41', 'img2 (₹99999999.99), demojk_2 (₹222.00), img1 (₹99999999.99)', 99999999.99, 'Completed', 'uploads/payment_proofs/1755073372_JKCOMPANEY.png'),
(2, 51, '2025-08-13 08:09:20', 'img2 (₹99999999.99), demojk_2 (₹222.00), img1 (₹99999999.99)', 99999999.99, 'Pending', NULL),
(3, 51, '2025-08-13 08:17:00', 'img2 (₹99999999.99), demojk_2 (₹222.00), img1 (₹99999999.99)', 99999999.99, 'Completed', 'uploads/payment_proofs/1755073362_namastaye.jpg'),
(4, 51, '2025-08-13 08:24:57', 'img2 (₹99999999.99), demojk_2 (₹222.00), img1 (₹99999999.99), i4 (₹859674.00)', 99999999.99, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Customer','Seller','Whole Seller','Retail Seller','Retail Customer','Offline Customer') NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `type`, `icon`, `comment`, `rating`, `created_at`) VALUES
(1, 'jk', 'Customer', NULL, 'demo', 5, '2025-08-06 08:19:08'),
(2, 'jk', 'Customer', NULL, 'demo', 5, '2025-08-06 08:24:32'),
(3, 'khushi', 'Seller', NULL, 'demo seller', 4, '2025-08-06 08:25:10'),
(4, 'joshi krushal', 'Whole Seller', NULL, 'whole seller', 5, '2025-08-06 08:25:31'),
(5, 'hg', 'Retail Seller', NULL, 'retail seller', 5, '2025-08-06 08:25:55'),
(6, 'joshi ', 'Retail Customer', NULL, 'retail customer', 5, '2025-08-06 08:26:21'),
(7, 'krushal', 'Offline Customer', NULL, 'offline customer', 5, '2025-08-06 08:27:04'),
(8, 'hg', 'Seller', NULL, 'second seller', 1, '2025-08-06 08:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','seller') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

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
(40, 'krushal', '$2y$10$g8BdsIbRioWlWLjzZLgB/elaayXuM2yTnLwwaF1kKrKaVrWTqcAKW', 'customer', 'krushaljoshi9@gmail.com', '8780230790'),
(41, 'ritu', '$2y$10$jhvSO0Vga0umiBwWTJgs1uvzhf/74aXoCQbosYkDs5GXJ5p84GP7i', 'seller', 'ritu9@gmail.com', '9876541478'),
(42, 'rituc', '$2y$10$lLfAMhQLebbSaVmGBQ8e8uofc2CpJYzVKGB74CBkEo.jQoL/0i4gu', 'customer', 'rituc@gmail.com', '0987654565'),
(43, 'vidhi', '$2y$10$FcDM973UGL.RuH6oHE9gnO4G33gmMWj2SRunsk2K7uzlqpupSbDsm', 'customer', 'vidhi@gmail.com', '9876543210'),
(44, 'chakli', '$2y$10$6QLBreL.ArJ0BWj0xoWPw.FO6H89qNtkXc2uL2OjmXDNBMvbgVVke', 'customer', 'chakli@gmail.com', '7845259863'),
(45, 'demojk', '$2y$10$Jn61eWfhMZR1Tv8duMPhquS64h5cmNIpbgzWzPl9DZMVGg5ccyX4O', 'seller', 'demojk@gmail.com', '9876541478'),
(46, 'demojkcu', '$2y$10$h9wi0aQ4G/9XQpCqtYmdT.EuZnQRCUCzWsBb/HyE6mu6zZmuK9WZm', 'customer', 'demojkcu@gmail.com', '9876541478'),
(47, 'm', '$2y$10$/HxYMO4SiBsBxT2mWqXUoOx5x/NsGI34vP5.toHimmc0Svi3RdmV6', 'customer', 'acb@gmail.com', '9876541478'),
(48, 'ms', '$2y$10$IWTQwMEqzm7rjnb5tlMgZ.QwO86Dakt56bI5oZ/OGzz8O5LV/Jwn2', 'seller', 'jos@gmail.com', '9876541478'),
(51, 'joshicum', '$2y$10$rq7pMnBHLcGdWFh8vqeyb.pyC98JvGa156AsmISZKTr2N5onAuoMC', 'customer', 'joshicum@gmail.com', '8596526345'),
(53, 'sjk', '$2y$10$APeRizpBshMXyefpOIBIyeZzsUWHJUyIKBx/vAX63vTPirx.2pFNi', 'seller', 'sjk@gmai.com', '7845259863');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `eye_test_bookings`
--
ALTER TABLE `eye_test_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goggles`
--
ALTER TABLE `goggles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_orders`
--
ALTER TABLE `prescription_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recover`
--
ALTER TABLE `recover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_history`
--
ALTER TABLE `shopping_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eye_test_bookings`
--
ALTER TABLE `eye_test_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goggles`
--
ALTER TABLE `goggles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `prescription_orders`
--
ALTER TABLE `prescription_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `recover`
--
ALTER TABLE `recover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shopping_history`
--
ALTER TABLE `shopping_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shopping_history`
--
ALTER TABLE `shopping_history`
  ADD CONSTRAINT `shopping_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
