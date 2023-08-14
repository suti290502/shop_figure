-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 04:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `figure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `figure_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'anime figure', '2023-07-24 19:24:14', '2023-07-24 19:24:14'),
(2, 'Film figure', '2023-07-24 19:24:34', '2023-07-24 19:24:34'),
(3, 'Game figure', '2023-07-24 19:24:51', '2023-07-24 19:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `figure_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `figure`
--

CREATE TABLE `figure` (
  `figure_id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `figure`
--

INSERT INTO `figure` (`figure_id`, `category`, `name`, `description`, `price`, `image`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kikyo', 'InuYasha anime figure', 1000000, '202307250227Kikyo.jpg', 5, '2023-07-24 19:27:26', '2023-07-24 19:27:26'),
(2, 1, 'Kohina', '...', 1000000, '202307250228Kohina.jpg', 5, '2023-07-24 19:28:17', '2023-07-24 19:28:17'),
(3, 1, 'Kukkuri-san', '....', 1000000, '202307250229Kukkuri-san.jpg', 10, '2023-07-24 19:29:14', '2023-07-24 19:29:14'),
(4, 1, 'Tomoe', 'Kamisama Hajimemashita anime figure', 1000000, '202307250230Tomoe.jpg', 10, '2023-07-24 19:30:43', '2023-07-24 19:30:43'),
(5, 1, 'Tomoe x Nanami', '....', 1000000, '202307250231Tomoe_x_Nanami.jpg', 5, '2023-07-24 19:31:56', '2023-07-24 19:31:56'),
(6, 1, 'Sesshomaru-sama', 'handsome', 1000000, '202307250232Sesshomaru.jpg', 10, '2023-07-24 19:32:51', '2023-07-24 19:32:51'),
(7, 1, 'Rin', 'Seshomaru-sama\'s wife', 1000000, '202307250233Rin.jpg', 10, '2023-07-24 19:33:43', '2023-07-24 19:33:43'),
(8, 2, 'BumbleBee', 'Transformer figure', 1000000, '202307250337BumbleBee.jpg', 10, '2023-07-24 20:37:24', '2023-07-24 20:37:24'),
(9, 2, 'OptimusPrime', 'Transformer film figure', 1000000, '202307260820OptimusPrime.jpg', 5, '2023-07-26 01:20:17', '2023-07-26 01:20:17'),
(10, 2, '11', '222', 1000000, '202307260825CyberTron.jpg', 1, '2023-07-26 01:25:42', '2023-07-26 01:25:42'),
(11, 2, 'wsw', 'ưsss', 1000000, '202307260849hai_trieu_nam_den_vau.jpeg', 4, '2023-07-26 01:49:49', '2023-07-26 01:49:49'),
(13, 2, 'sw', 'đee', 1000000, '202307260908Only.png', 4, '2023-07-26 02:08:46', '2023-07-26 02:08:46'),
(14, 1, 'aa', 'hhh', 1000000, '202307260932sango.jpg', 10, '2023-07-26 02:32:00', '2023-07-26 02:32:00');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_06_06_171516_create_user_table', 1),
(3, '2023_06_06_171528_create_category_table', 1),
(4, '2023_06_21_070024_create_figure_table', 2),
(5, '2023_06_06_171616_create_feedback_table', 3),
(6, '2023_06_06_171635_create_order_table', 3),
(7, '2023_06_06_171647_create_order_figure_table', 3),
(8, '2023_07_11_155724_create_cart_table', 4),
(9, '2023_07_11_160720_create_cart_item_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_figure`
--

CREATE TABLE `order_figure` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `figure_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `payments` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `address`, `phone_number`, `role`, `created_at`, `updated_at`) VALUES
(1, 'suti290502', '$2y$10$B3hymtLPWrrKVzlhaWqo1u.e9E5i5wey3tNZaCXy6n2dYmsk/x8dC', 'suti290502@gmail.com', 'minh tien, phu cu, hung yen', '03968196223', '3', NULL, NULL),
(2, 'cus1', '$2y$10$SGBL1KyFwTy4vwhxnUzFN.h1n3QruzsoaJJW9Ju7o0vlyUqFTgfdO', 'yennhpc@gmail.com', 'minh tien, phu cu, hung yen', '03968196223', '2', NULL, NULL),
(3, 'sell2', '$2y$10$uueHQ8DbWjgu/c9bQ6Rof.CXryoVlrQqAWuMXhf0p05FRcgMiqU5i', 'yennhpc@gmail.com', 'minh tien, phu cu, hung yen', '03968196223', '1', NULL, NULL),
(4, 'anni', '$2y$10$VK8yP5bCht4.D4XxLDqIDuiWpPuI5xIFhZ5KHtJmW6WVprye/vxQq', 'yennhpc@gmail.com', 'minh tien, phu cu, hung yen', '03968196223', '3', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_item_figure_id_foreign` (`figure_id`),
  ADD KEY `cart_item_order_id_foreign` (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`),
  ADD KEY `feedback_figure_id_foreign` (`figure_id`);

--
-- Indexes for table `figure`
--
ALTER TABLE `figure`
  ADD PRIMARY KEY (`figure_id`),
  ADD KEY `figure_category_foreign` (`category`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_figure`
--
ALTER TABLE `order_figure`
  ADD KEY `order_figure_order_id_foreign` (`order_id`),
  ADD KEY `order_figure_figure_id_foreign` (`figure_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `figure`
--
ALTER TABLE `figure`
  MODIFY `figure_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_figure_id_foreign` FOREIGN KEY (`figure_id`) REFERENCES `figure` (`figure_id`),
  ADD CONSTRAINT `cart_item_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_figure_id_foreign` FOREIGN KEY (`figure_id`) REFERENCES `figure` (`figure_id`),
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `figure`
--
ALTER TABLE `figure`
  ADD CONSTRAINT `figure_category_foreign` FOREIGN KEY (`category`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_figure`
--
ALTER TABLE `order_figure`
  ADD CONSTRAINT `order_figure_figure_id_foreign` FOREIGN KEY (`figure_id`) REFERENCES `figure` (`figure_id`),
  ADD CONSTRAINT `order_figure_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
