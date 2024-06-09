-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 06:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `about_desc` longtext NOT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `about_desc`, `about_image`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(1, 'About Novelify', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere voluptatum necessitatibus commodi eveniet dolores amet laudantium ex harum, facilis aperiam, tenetur temporibus nostrum aliquam autem. Ut laborum ab architecto soluta.<br />\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates, natus minima non aliquid iusto asperiores. Voluptates debitis recusandae blanditiis quas est cum eum, aperiam quasi laboriosam et animi vero earum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores nostrum nesciunt vitae voluptatibus debitis natus consequuntur. Fugit quia dolorem porro sunt nesciunt ullam, facere mollitia, quae at, delectus rerum consectetur!</p>', 'about-img.png', 'About Novelify', 'About Novelify', NULL, '2023-09-21 00:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Abhilekh Bansal', 'abhi@mail.com', '$2y$10$8CBR3XivnqHlDBnv0yEdkulCvqx8DIqXol9B.86gQzne76L3TaqCi', 1, '2023-06-22 05:38:51', '2023-06-23 03:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('Reg','Not-reg') NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_type`, `quantity`, `product_id`, `price`, `added_on`, `status`) VALUES
(36, 30230025, 'Not-reg', 1, 6, 164, '2023-08-05 10:32:59', 'Not_Paid'),
(37, 69689072, 'Not-reg', 1, 5, 425, '2023-08-05 10:33:02', 'Not_Paid'),
(38, 41354224, 'Not-reg', 1, 3, 186, '2023-08-05 10:33:05', 'Not_Paid'),
(39, 18366680, 'Not-reg', 1, 5, 425, '2023-08-05 10:37:18', 'Not_Paid'),
(40, 18366680, 'Not-reg', 1, 4, 235, '2023-08-05 10:37:21', 'Not_Paid'),
(41, 41, 'Reg', 1, 6, 164, '2023-08-05 10:38:29', 'Not_Paid'),
(42, 41, 'Reg', 1, 4, 235, '2023-08-05 10:38:32', 'Not_Paid'),
(49, 59638106, 'Not-reg', 1, 6, 164, '2023-08-07 11:28:05', 'Not_Paid'),
(50, 59638106, 'Not-reg', 1, 4, 235, '2023-08-07 11:28:08', 'Not_Paid'),
(74, 57692285, 'Not-reg', 1, 5, 425, '2023-08-12 07:41:53', 'Not_Paid'),
(78, 81492268, 'Not-reg', 1, 4, 235, '2023-08-23 04:39:40', 'Not_Paid'),
(79, 81492268, 'Not-reg', 1, 5, 425, '2023-08-23 04:39:54', 'Not_Paid'),
(80, 81492268, 'Not-reg', 1, 6, 164, '2023-08-23 04:39:57', 'Not_Paid'),
(81, 80662406, 'Not-reg', 1, 6, 164, '2023-08-25 10:56:36', 'Not_Paid'),
(82, 77320766, 'Not-reg', 1, 4, 235, '2023-08-25 11:09:22', 'Not_Paid'),
(83, 77320766, 'Not-reg', 1, 5, 425, '2023-08-25 11:09:25', 'Not_Paid'),
(84, 92880114, 'Not-reg', 1, 5, 425, '2023-08-25 11:11:19', 'Not_Paid'),
(85, 92880114, 'Not-reg', 1, 6, 164, '2023-08-25 11:11:22', 'Not_Paid'),
(86, 90489652, 'Not-reg', 1, 5, 425, '2023-08-25 11:34:44', 'Not_Paid'),
(87, 37571479, 'Not-reg', 1, 4, 235, '2023-09-02 09:09:52', 'Not_Paid'),
(88, 50094185, 'Not-reg', 1, 4, 235, '2023-09-02 09:11:54', 'Not_Paid'),
(91, 74639350, 'Not-reg', 10, 4, 235, '2023-09-13 01:01:12', 'Not_Paid'),
(92, 48107694, 'Not-reg', 1, 4, 235, '2023-09-14 05:26:20', 'Not_Paid'),
(93, 62207678, 'Not-reg', 1, 4, 235, '2023-09-14 05:27:56', 'Not_Paid'),
(94, 33509701, 'Not-reg', 1, 4, 235, '2023-09-14 05:30:56', 'Not_Paid'),
(95, 33509701, 'Not-reg', 1, 5, 425, '2023-09-14 06:17:26', 'Not_Paid'),
(102, 97208076, 'Not-reg', 1, 5, 425, '2023-09-14 12:42:52', 'Not_Paid'),
(103, 97208076, 'Not-reg', 0, 4, 235, '2023-09-14 12:43:34', 'Not_Paid'),
(104, 97208076, 'Not-reg', 1, 3, 186, '2023-09-14 12:44:21', 'Not_Paid'),
(106, 56843051, 'Not-reg', 1, 3, 186, '2023-09-21 10:50:38', 'Not_Paid'),
(107, 56843051, 'Not-reg', 1, 5, 425, '2023-09-21 10:50:41', 'Not_Paid'),
(108, 60410671, 'Not-reg', 3, 4, 235, '2023-09-22 07:12:16', 'Not_Paid'),
(109, 78543960, 'Not-reg', 1, 19, 120, '2023-09-22 07:48:25', 'Not_Paid'),
(111, 78543960, 'Not-reg', 1, 6, 164, '2023-09-22 08:48:01', 'Not_Paid'),
(116, 35, 'Reg', 1, 3, 186, '2023-11-07 04:45:10', 'Not_Paid'),
(117, 35, 'Reg', 1, 19, 120, '2023-11-07 04:45:19', 'Not_Paid');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_image` varchar(225) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tag` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_slug`, `parent_category_id`, `category_image`, `status`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, NULL, 1, 0, '2023-07-18 03:23:12', '2023-07-19 04:04:51'),
(2, 'Novel', '#', 0, NULL, 1, NULL, '2023-07-18 03:56:01', '2023-08-08 03:37:16'),
(4, 'About', 'about', 0, NULL, 1, 0, '2023-07-18 03:20:04', '2023-07-18 03:20:04'),
(5, 'Contact', 'contact', 0, NULL, 0, NULL, '2023-07-18 03:19:21', '2023-09-21 05:14:15'),
(6, 'Blog', 'blog', 0, NULL, 0, 1, '2023-07-18 03:24:03', '2023-08-14 02:00:32'),
(11, 'Science Fiction', 'category/science-fiction', 2, NULL, 1, 0, '2023-06-24 00:47:28', '2023-07-24 23:46:53'),
(13, 'Action', 'category/action', 2, NULL, 1, 0, '2023-06-24 06:16:50', '2023-07-24 23:56:53'),
(14, 'Romance', 'category/romance', 2, NULL, 1, 0, '2023-07-10 06:10:29', '2023-07-24 23:57:01'),
(26, 'Horror', 'category/horror', 2, NULL, 1, 0, '2023-06-24 00:56:13', '2023-07-27 04:18:57'),
(31, 'Drama', 'category/drama', 2, NULL, 1, NULL, '2023-08-23 03:16:16', '2023-08-23 03:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` longtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alt_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `map` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` longtext DEFAULT NULL,
  `yt_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `linked_link` varchar(255) DEFAULT NULL,
  `pt_link` varchar(255) DEFAULT NULL,
  `x_link` varchar(255) DEFAULT NULL,
  `ft_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `alt_phone`, `email`, `alt_email`, `whatsapp`, `map`, `meta_title`, `meta_desc`, `yt_link`, `insta_link`, `fb_link`, `linked_link`, `pt_link`, `x_link`, `ft_image`, `created_at`, `updated_at`) VALUES
(1, 'Pocket C, Okhla Phase I, Okhla Industrial Area, New Delhi 110020', '9100000026', '9100000026', 'novelifyscribes@gmail.com', 'novelifyscribes@gmail.com', '9100000026', '#', 'Contact details', 'Contact details', 'https://www.youtube.com/', 'https://www.instagram.com/', 'https://www.facebook.com/', '#', '#', '#', 'about-img.png', NULL, '2023-09-22 00:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` enum('Value','Per') NOT NULL,
  `min_order_amt` int(11) DEFAULT NULL,
  `is_one_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jan2023', 'jan2023', '150', 'Value', 0, 0, 1, '2023-06-26 00:59:16', '2023-07-07 08:16:21'),
(3, 'New Coupun', 'new', '15', 'Per', 500, 0, 1, '2023-07-11 03:19:29', '2023-07-11 03:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_verify` int(11) NOT NULL,
  `is_forgot_password` int(11) NOT NULL,
  `rand_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `image`, `username`, `email`, `phone`, `password`, `address`, `city`, `state`, `zip`, `status`, `is_verify`, `is_forgot_password`, `rand_id`, `created_at`, `updated_at`) VALUES
(35, 'abhilekh', NULL, NULL, 'abhilekhbansal.tki@gmail.com', '9925765234', 'eyJpdiI6InNaeXQrV0xqV1FpbnlnMkVOclJNd3c9PSIsInZhbHVlIjoiRGpIakxYNVh5OC9mcEhJZjBsUUhuSlRzZDRxaFFZSnppZ3BqQjAzOG42ST0iLCJtYWMiOiIzNzFiY2U4MzIxOTU2MGZkNTczYzlkOGM5MzJiOWI1MjU4ZDJhZTRkM2YzMGI1NTg2YWQwMmQyOTBhN2YwZmNkIiwidGFnIjoiIn0=', NULL, NULL, NULL, NULL, 1, 1, 0, '', '2023-08-11 10:53:31', '2023-08-01 23:38:55'),
(41, 'abhi', NULL, NULL, 'abhilekhbansal.tki@gmail.com', '9685741525', 'eyJpdiI6InNzQi9hdmdadDd4VXRPR0JvN29wQmc9PSIsInZhbHVlIjoiWmxnbzBialBnaTBBbUhOZEFhRXJ1T3pCTVBEU1pRdy8xaThoeHN0U0lVQT0iLCJtYWMiOiI1ZWM1ZTU2NzViOWQxMWQ3NDRiMjZhM2YwNzViNjFjZjJjYTFjNzU3ZDcwMjJjZGQ4NGVlZTYxNzU0MjE1MWFmIiwidGFnIjoiIn0=', NULL, NULL, NULL, NULL, 1, 1, 0, '', '2023-08-05 06:32:27', '2023-08-02 04:31:57'),
(42, 'avesh', NULL, NULL, 'avesh.jam721@gmail.com', '9988866444', 'eyJpdiI6Im1JODd2NE5qUnhVN3VtVit5NVZJNWc9PSIsInZhbHVlIjoiQzN1TXZKbWpaRi8vWXE0Y1owVXBEUT09IiwibWFjIjoiYTc3OTBjNDcyZDk1ZTM5OTkxM2RhOTUxZWY0NjIwZGMzYmE2ZTZiNDk3ZmE2NDI4YjdkMDk2YzhkMWYxOWRjMSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, 1, 0, 0, '58964572', '2023-08-04 05:38:44', '2023-08-04 05:38:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_14_141214_add_deleted_at_to_register_table', 2),
(6, '2023_06_22_045621_create_admins_table', 3),
(7, '2023_06_23_143839_create_category_table', 4),
(8, '2023_06_26_053624_create_coupons_table', 5),
(9, '2023_06_27_050807_create_products_table', 6),
(10, '2023_07_11_091424_create_customers_table', 7),
(11, '2023_07_17_094525_create_sliders_table', 8),
(12, '2023_09_21_043543_create_abouts_table', 9),
(13, '2023_09_21_084535_create_contacts_table', 10),
(14, '2023_09_22_094022_create_testimonials_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `btn_text` varchar(225) NOT NULL,
  `btn_link` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `coupon_value` int(11) DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_type` enum('COD','Gateway') NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `txn_id` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `coupon_code`, `coupon_value`, `order_status`, `payment_type`, `payment_id`, `txn_id`, `payment_status`, `total_amt`, `added_on`) VALUES
(1, 35, 'abhilekh', 'abhi@mail', '9925765234', 'dwarka mor', 'new delhi', 'new delhi', '475451', 'new', 0, 1, 'COD', NULL, NULL, 'Pending', 824, '2023-08-11 10:37:39'),
(2, 35, 'abhilekh', 'abhi@mail', '9925765234', 'svdsvs', 'dv', 'dsvs', '354', 'new', 0, 1, 'COD', NULL, NULL, 'Pending', 874, '2023-08-11 10:43:13'),
(3, 35, 'abhilekh', 'abhi@mail', '9925765234', 'acsdcs', 'sdcsd', 'sdcd', '3245', 'new', 0, 1, 'COD', NULL, NULL, 'Pending', 700, '2023-08-11 10:52:12'),
(4, 35, 'abhilekh', 'abhi@mail', '9925765234', 'acsdcsfef', 'sdcsdvf', 'sdcdrvr', '3245', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 700, '2023-08-11 11:43:58'),
(5, 35, 'abhilekh', 'abhi@mail', '9925765234', 'acsdcsfef', 'sdcsdvf', 'sdcdrvr', '3245', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 700, '2023-08-11 11:44:00'),
(6, 35, 'abhilekh', 'abhi@mail', '9925765234', 'acsdcsfef', 'sdcsdvf', 'sdcdrvr', '3245', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 700, '2023-08-11 11:44:12'),
(7, 35, 'abhilekh', 'abhi@mail', '9925765234', 'wqdqwd', 'qdwssss', 'asdewcd', '3456', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 874, '2023-08-11 11:46:14'),
(8, 35, 'abhilekh', 'abhi@mail', '9925765234', 'wqdqwd', 'qdwssss', 'asdewcd', '3456', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 874, '2023-08-11 11:49:24'),
(9, 35, 'abhilekh', 'abhi@mail', '9925765234', 'wfefw', 'asdvf', 'cwefwef', '3456', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 874, '2023-08-11 11:56:53'),
(10, 35, 'abhilekh', 'abhi@mail', '9925765234', 'afsdc', 'sdvsd', 'sdvsd', '76543', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 874, '2023-08-11 12:01:43'),
(11, 35, 'abhilekh', 'abhi@mail', '9925765234', 'sxa', 'ertgfdsa', 'sxaqwx', '345', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 475, '2023-08-11 12:03:44'),
(12, 35, 'abhilekh', 'abhi@mail', '9925765234', 'wcc', 'cewcew', 'ecwec', '345', NULL, 0, 1, 'COD', NULL, NULL, 'Pending', 236, '2023-08-11 01:11:52'),
(13, 35, 'Test', 'Test@mail', '9638527416', 'Test', 'Test', 'Test', '103552', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 661, '2023-08-11 03:24:09'),
(14, 35, 'test', 'test@mail', '9638527415', 'test', 'test', 'test', '104004', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:26:08'),
(15, 35, 'test', 'test@mail', '9638527415', 'test', 'test', 'test', '400515', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:38:42'),
(16, 35, 'test', 'test@mail', '9925765234', 'test', 'test', 'test', '234534', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:39:32'),
(17, 35, 'key', 'key@mail', '9925765234', 'key', 'key', 'key', '34567', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:41:42'),
(18, 35, 'key', 'abhi@mail', '9925765234', 'key', 'key', 'key', '987654321', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:42:44'),
(19, 35, 'test', 'test@mail', '9925765234', 'test', 'test', 'test', '34567', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:43:49'),
(20, 35, 'test', 'test@mail', '9925765234', 'test', 'test', 'test', '401505', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 03:56:27'),
(21, 35, 'abhilekh', 'abhilekh.tki@gmail.com', '9925765234', 'sdfg', 'dfbdg', 'sfv', '3456', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 04:00:59'),
(22, 35, 'abhilekh', 'abhilekh.tki@gmail.com', '9925765234', 'sdfg', 'dfbdg', 'sfv', '3456', NULL, 0, 1, 'Gateway', NULL, '028a828b67b74df4993ad1b92ea078b0', 'Pending', 710, '2023-08-11 04:02:00'),
(23, 35, 'abhilekh', 'abhilekh.tki@gmail.com', '9925765234', 'sdfg', 'dfbdg', 'sfv', '3456', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 710, '2023-08-11 04:02:45'),
(24, 35, 'abhilekh', 'abhilekh.tki@gmail.com', '9925765234', 'wefwef', 'ascsd', 'wewe', '345', NULL, 0, 1, 'Gateway', NULL, '4ad763642e074f44ad784639ca26a854', 'Pending', 710, '2023-08-11 04:04:16'),
(25, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'qswdefrt', 'rty', 'rtyu', '456454', 'new', 124, 1, 'Gateway', 'MOJO3811B05A94612634', '28e64861379f4fcb829d62648dfd51a6', 'Success', 700, '2023-08-11 04:28:19'),
(26, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'vivek nagar', 'gwalior', 'mprxcfgvhbjnkm', '474001', NULL, 0, 1, 'Gateway', NULL, '3e679af1ba824a0bb71ab0e2f5045ecf', 'Pending', 235, '2023-11-06 10:00:47'),
(27, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'kjhjcxgcv', 'jhcgjgc', 'ytc', '618522', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 235, '2023-11-07 09:59:20'),
(28, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'kbskcsd', 'asccbakscasb', 'lsncakns', '474001', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 235, '2023-11-07 10:04:08'),
(29, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'xdfcgvhbj', 'szxdfcg', 'xdcfvgh', 'dxfcgvbh', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 824, '2023-11-07 10:11:24'),
(30, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'hvjcx', 'vjkkjbkb', 'kjbkjb', '4741000', NULL, 0, 1, 'Gateway', 'MOJO3b07L05A99925199', '6fb39db4f2204cf3abd546523740c052', 'Success', 824, '2023-11-07 10:13:49'),
(31, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'dxfcgv', 'cghvb', 'cfghvb', '474001', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:16:27'),
(32, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'dxfcgv', 'cghvb', 'cfghvb', '474001', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:16:56'),
(33, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'dxfcgv', 'cghvb', 'cfghvb', '474001', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:18:24'),
(34, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'cbksjc', 'kbkjkj', 'bqkjcckjasb', '4845118', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:23:38'),
(35, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'ascacas', 'b jhqcjq', 'qc   sdjsdcj dc', '451245', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:25:46'),
(36, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'vcbduhnixs', 'vfhcbdjn', 'evckm', '345987', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:28:27'),
(37, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'vcbduhnixs', 'vfhcbdjn', 'evckm', '345987', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:28:29'),
(38, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'vcbduhnixs', 'vfhcbdjn', 'evckm', '345987', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:28:31'),
(39, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'vcbduhnixs', 'vfhcbdjn', 'evckm', '345987', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:29:01'),
(40, 35, 'abhilekh', 'abhilekhbansal.tki@gmail.com', '9925765234', 'vcbduhnixs', 'vfhcbdjn', 'evckm', '345987', NULL, 0, 1, 'Gateway', NULL, NULL, 'Pending', 306, '2023-11-07 10:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `price`, `qty`) VALUES
(1, 1, 6, 164, 1),
(2, 1, 5, 425, 1),
(3, 1, 4, 235, 1),
(4, 2, 6, 164, 1),
(5, 2, 5, 425, 1),
(6, 2, 4, 235, 1),
(7, 3, 6, 164, 1),
(8, 3, 5, 425, 1),
(9, 3, 4, 235, 1),
(10, 4, 6, 164, 1),
(11, 4, 5, 425, 1),
(12, 4, 4, 235, 1),
(13, 5, 6, 164, 1),
(14, 5, 5, 425, 1),
(15, 5, 4, 235, 1),
(16, 6, 6, 164, 1),
(17, 6, 5, 425, 1),
(18, 6, 4, 235, 1),
(19, 7, 6, 164, 1),
(20, 7, 5, 425, 1),
(21, 7, 4, 235, 1),
(22, 8, 6, 164, 1),
(23, 8, 5, 425, 1),
(24, 8, 4, 235, 1),
(25, 9, 6, 164, 1),
(26, 9, 5, 425, 1),
(27, 9, 4, 235, 1),
(28, 10, 6, 164, 1),
(29, 10, 5, 425, 1),
(30, 10, 4, 235, 1),
(31, 11, 5, 425, 1),
(32, 12, 3, 186, 1),
(33, 13, 3, 186, 1),
(34, 13, 5, 425, 1),
(35, 14, 5, 425, 1),
(36, 14, 4, 235, 1),
(37, 15, 5, 425, 1),
(38, 15, 4, 235, 1),
(39, 16, 5, 425, 1),
(40, 16, 4, 235, 1),
(41, 17, 5, 425, 1),
(42, 17, 4, 235, 1),
(43, 18, 5, 425, 1),
(44, 18, 4, 235, 1),
(45, 19, 5, 425, 1),
(46, 19, 4, 235, 1),
(47, 20, 5, 425, 1),
(48, 20, 4, 235, 1),
(49, 21, 5, 425, 1),
(50, 21, 4, 235, 1),
(51, 22, 5, 425, 1),
(52, 22, 4, 235, 1),
(53, 24, 4, 235, 1),
(54, 24, 5, 425, 1),
(55, 25, 6, 164, 1),
(56, 25, 4, 235, 1),
(57, 25, 5, 425, 1),
(58, 26, 4, 235, 1),
(59, 27, 4, 235, 1),
(60, 28, 4, 235, 1),
(61, 29, 4, 235, 1),
(62, 29, 5, 425, 1),
(63, 29, 6, 164, 1),
(64, 30, 4, 235, 1),
(65, 30, 5, 425, 1),
(66, 30, 6, 164, 1),
(67, 31, 3, 186, 1),
(68, 31, 19, 120, 1),
(69, 32, 3, 186, 1),
(70, 32, 19, 120, 1),
(71, 33, 3, 186, 1),
(72, 33, 19, 120, 1),
(73, 34, 3, 186, 1),
(74, 34, 19, 120, 1),
(75, 35, 3, 186, 1),
(76, 35, 19, 120, 1),
(77, 36, 3, 186, 1),
(78, 36, 19, 120, 1),
(79, 37, 3, 186, 1),
(80, 37, 19, 120, 1),
(81, 38, 3, 186, 1),
(82, 38, 19, 120, 1),
(83, 39, 3, 186, 1),
(84, 39, 19, 120, 1),
(85, 40, 3, 186, 1),
(86, 40, 19, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `orders_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `orders_status`) VALUES
(1, 'Placed'),
(2, 'On the Way'),
(3, 'delivered');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(225) NOT NULL,
  `author_desc` longtext DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feature` int(11) DEFAULT NULL,
  `is_discounted` int(11) NOT NULL,
  `is_trending` int(11) NOT NULL,
  `is_promo` int(11) NOT NULL,
  `keywords` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `author`, `author_desc`, `desc`, `price`, `slug`, `rating`, `feature`, `is_discounted`, `is_trending`, `is_promo`, `keywords`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Sin Eater', 26, 'best_selling5.jpg', 'J.P. Morgan', NULL, NULL, 186, 'sin-eater', 3, 0, 0, 1, 1, 'Sin Eater,horrer,man,dark', 1, '2023-07-10 01:17:54', '2023-08-14 02:11:01'),
(4, 'Dark space', 11, 'best_selling7.jpg', 'J.P. Morgan', '<p>Jasper Scott is a USA Today bestselling author of science fiction and a three-time Kindle all-star. With more than forty novels published and over a million copies sold, Jasper&#39;s work has been translated into various languages and published around the world. Jasper writes fast-paced books with unexpected twists and flawed characters. He was born and raised in Canada by South African parents, with a British heritage on his mother&#39;s side and German on his father&#39;s. He now lives in an exotic locale with his wife, their two kids, and two Chihuahuas.</p>', '<p>As one ventures into Dark Space, they are greeted with an absence of light that is unlike anything experienced before. It is as if all sources of illumination have been extinguished, leaving only a vast void of blackness. Even stars, usually abundant in the cosmos, seem to avoid this ominous realm, leaving it devoid of the twinkling points of light that typically grace the night sky. The silence in Dark Space is deafening; no sound, no whispers, not even the faintest echo of any distant celestial object can be heard. This silence amplifies the feeling of isolation and alienation, making it a place where one&#39;s own thoughts and fears can become hauntingly loud. Although darkness pervades this enigmatic region, it is not an empty void. Nebulous clouds of dust and cosmic debris drift aimlessly, occasionally forming eerie shapes and figures. These ethereal formations seem to dance with unseen forces, giving the impression of spectral beings lurking in the shadows. As explorers traverse this void, they may encounter strange phenomena that challenge the laws of physics as they know them. Distortions in spacetime, gravitational anomalies, and peculiar cosmic phenomena that defy conventional understanding await those daring enough to venture into Dark Space. Despite its apparent lifelessness, Dark Space harbors an enigmatic allure that draws in explorers, scientists, and adventurers alike. The</p>', 235, 'dark-space', 4, 1, 0, 1, 1, 'Dark,space,noval', 1, '2023-07-10 01:26:16', '2023-07-21 01:02:40'),
(5, 'Independent Woman', 14, 'best_selling6.jpg', 'J.P. Morgan', NULL, NULL, 425, 'independent-woman', 2, 1, 0, 1, 0, 'Romance,woman,Love,Novel', 1, '2023-07-10 06:12:08', '2023-08-14 02:11:38'),
(6, 'EVANESCE', 14, 'best_selling3.jpg', 'K.L. Savage', NULL, '<p>Evanesce is ready to relax without her brother breathing down her neck, but the news she has for Tongue might just kick his fourth of July off with a bang. Between keeping a secret for Daphne and trying to avoid the blonde prospect, this trip to Vegas will be more than she bargained for.<br />\r\n<br />\r\nKnix came to Vegas, only keeping to the Kings clubs as he blows around the US. Staying or going, he just wants to make his name known in the club before he moves along to the next. He doesn&rsquo;t put down roots making the club the only consistent thing he knows. Knix thinks being the new guy is tough job but its nothing compared to the one the NOLA president throws his way.</p>', 164, 'evanesce', 4, 1, 0, 1, 0, 'romance,female,sci-fi', 1, '2023-07-21 05:41:40', '2023-07-21 05:41:40'),
(19, 'To Kill a Mockingbird', 31, 'book-cover-To-Kill-a-Mockingbird.jpeg', 'Harper Lee', '<p>American novelist who wrote the 1960 novel&nbsp;<em>To Kill a Mockingbird</em>&nbsp;that won the 1961 Pulitzer Prize and became a classic of modern American literature. She assisted her close friend Truman Capote in his research for the book&nbsp;<em>In Cold Blood</em>&nbsp;(1966). Her second novel,</p>', '<p>The story, told by Jean Louise Finch, takes place during three years (1933&ndash;35) of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Great_Depression\" title=\"Great Depression\">Great Depression</a>&nbsp;in the fictional town of Maycomb, Alabama, the seat of Maycomb County. Nicknamed Scout, the narrator, who is six years old at the beginning of the book, lives with her older brother Jeremy, nicknamed Jem, and their widowed father&nbsp;<a href=\"https://en.wikipedia.org/wiki/Atticus_Finch\" title=\"Atticus Finch\">Atticus</a>, a middle-aged lawyer. They also have a black cook, Calpurnia, who has been with the family for many years and helps Atticus raise the two children.</p>', 120, 'to-kill-a-mockingbird', 4, 0, 0, 1, 0, NULL, 1, '2023-08-23 03:31:21', '2023-08-23 03:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`) VALUES
(6, 4, 'empty_cart2.png'),
(24, 3, 'mattres4.jpg'),
(25, 3, 'pr1.1.jpg'),
(26, 17, 'abr-l-2.jpg'),
(27, 17, 'empty-cart.png'),
(29, 19, '2023-08-23IMG_2226web-675x900.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `image`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 'ayurveda.jpg', 'honey', '2222', 'honey@mail', 'scdvfbghjk', '2023-06-08 23:54:08', '2023-06-16 01:05:18', NULL),
(33, 'WhatsApp Image 2023-06-13 at 11.14.31 AM (1).jpeg', 'saleem', '7415963852', 'saleem@mail', 'QAWDEFRGTHYJUI', '2023-06-08 23:56:18', '2023-06-15 01:14:42', NULL),
(36, 'Catlog-boy-jeans-_-pants_582x.jpg', 'billu', '5222', 'billu@dc', 'dsfrgthyjui', '2023-06-09 00:14:39', '2023-07-31 03:36:11', NULL),
(44, 'volunteer-1.png', 'dfghj', 'jhgrfeddd', 'fghj@fg', 'fvbhnjkl', '2023-06-11 23:25:47', '2023-07-31 03:36:04', '2023-07-31 03:36:04'),
(54, 'volunteer-2 (1).png', 'ewew', '123', 'ffdgf@df', 'wwe', '2023-06-12 03:38:30', '2023-07-31 03:36:02', '2023-07-31 03:36:02'),
(61, 'xzxzx.jpg', 'inam', '963852741', 'inam@mail', 'asdf', '2023-07-31 03:38:28', '2023-07-31 03:38:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `p_id`, `name`, `rating`, `review`, `status`, `added_on`) VALUES
(1, 4, 'Abhilekh', 4, 'This book is very intersting & adventures', 1, '2023-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slider_text` text NOT NULL,
  `btn_link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `heading`, `title`, `slider_text`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'asqsqaw.jpg', 'Popular Drama Novels', 'To Kill a Mockingbird', '<p>&quot;To Kill a Mockingbird&quot; is a classic American novel that deals with themes of racial injustice and moral growth. It follows the story of a young girl named Scout Finch as she navigates the complexities of race and morality in her small town in the 1930s.</p>', 'category/drama', '1', '2023-07-17 06:25:14', '2023-08-23 03:15:32'),
(6, '12qwer.jpg', 'Historical Novels', 'title 2', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,&nbsp;</p>', '#', '0', '2023-07-27 05:22:48', '2023-07-27 23:22:58'),
(7, 'xzxzx.jpg', 'Horror Novels', 'House of Leaves', '<p>This novel is a unique and chilling horror experience that has captivated readers with its unconventional storytelling and unsettling atmosphere.</p>', 'category/horror', '1', '2023-07-27 05:26:30', '2023-08-23 03:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `image`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sam Barton', 'Bookworm', '', '“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”', 1, '2023-09-22 06:36:55', '2023-09-22 07:21:28');

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

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_type` enum('Reg','Not-reg') NOT NULL,
  `product_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `user_type`, `product_id`, `price`, `added_on`) VALUES
(9, 97208076, 'Not-reg', 3, 186, '2023-09-14 12:42:30'),
(10, 20042786, 'Not-reg', 4, 235, '2023-09-15 07:29:39'),
(11, 35, 'Reg', 4, 235, '2023-09-15 07:33:56'),
(12, 35, 'Reg', 6, 164, '2023-09-15 07:33:59'),
(13, 56843051, 'Not-reg', 4, 235, '2023-09-21 06:18:30'),
(14, 56843051, 'Not-reg', 3, 186, '2023-09-21 07:45:22'),
(15, 56843051, 'Not-reg', 5, 425, '2023-09-21 07:52:36'),
(16, 60410671, 'Not-reg', 4, 235, '2023-09-22 06:01:35'),
(17, 78543960, 'Not-reg', 6, 164, '2023-09-22 08:46:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
