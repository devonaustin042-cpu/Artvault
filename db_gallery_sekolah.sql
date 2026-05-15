-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2026 at 03:45 AM
-- Server version: 8.0.45-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gallery_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file_path` varchar(255) NOT NULL,
  `upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`id`, `user_id`, `category_id`, `title`, `description`, `file_path`, `upload_time`) VALUES
(9, 21, 3, 'Claymonster', 'A creative clay monster sculpture.', 'Claymonster.png', '2026-05-12 01:29:07'),
(10, 22, 2, 'Koi Pond', 'A serene view of a koi pond.', 'Koi-Pond.png', '2026-05-12 01:29:07'),
(11, 23, 2, 'Trash Hunt', 'An imaginative urban scene of a trash hunt.', 'Trash-Hunt.png', '2026-05-12 01:29:07'),
(12, 24, 1, 'Cherish the moment', 'A beautiful capture of a cherished moment.', 'Cherish-the-moment.png', '2026-05-12 01:29:07'),
(13, 25, 3, 'Ayo punya cita-cita', 'Inspirational art about having dreams.', 'Ayo-punya-cita-cita.png', '2026-05-12 01:29:07'),
(14, 26, 4, 'Billie Eilish', 'A portrait of the famous singer.', 'Billie-Eilish.png', '2026-05-12 01:29:07'),
(15, 27, 1, 'A positive spin on n', 'Creative light bulb art.', 'A-positive-spin-on.png', '2026-05-12 01:29:07'),
(16, 28, NULL, 'Menggapai Indonesia', 'Digital illustration about Indonesian dreams.', 'Menggapai-Indonesia.png', '2026-05-12 01:29:07'),
(17, 29, NULL, 'Vibrant River', 'A colorful and vibrant river landscape.', 'Vibrant-River.png', '2026-05-12 01:29:07'),
(18, 30, 6, 'Anonymous Protagonis', 'Unique character art by Felicia Chiao.', 'Anonymous-Protagonis.png', '2026-05-12 01:29:07'),
(19, 31, 1, 'A Chill Doomsday', 'Atmospheric scene in a vehicle.', 'A-Chill-Doomsday.png', '2026-05-12 01:29:07'),
(20, 32, 4, 'Melody in Guitar', 'Expressive sketch of a person with a guitar.', 'Melody-in-Guitar.png', '2026-05-12 01:29:07'),
(21, 44, 6, 'The Samurai  Wuthering Waves', 'The Sky is amazing but the sigma will be the one who being chosenThe Sky is amazing but the sigma will be the one who being chosenThe Sky is amazing but the sigma will be the one who being chosenThe Sky is amazing but the sigma will be the one who being chosenThe Sky is amazing but the sigma will be the one who being chosenThe Sky is amazing but the sigma will be the one who being chosenThe Sky is amazing but the sigma will be the one who being chosen', '6a05e011388191.45144687.jpg', '2026-05-14 14:45:37'),
(22, 44, 5, 'Amazing, ini yang papa cari', 'dawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawdadawdawdawdadawdawdawdawda', '6a05e147412820.32681982.png', '2026-05-14 14:50:47'),
(24, 45, 6, 'Niggers or blacky', '1231231321321', '6a0682bbe7b3b1.44495735.jpg', '2026-05-15 02:19:39'),
(25, 33, 1, 'The Man Behind The Scene', 'The Man Behind The Scene - Especially telling about nothing The Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingThe Man Behind The Scene - Especially telling about nothingv', '6a06847b3a6223.79369451.jpg', '2026-05-15 02:27:07'),
(26, 33, 5, 'Amazing Sky', 'Amazing Sky ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... ......... .........v', '6a0685b6938ff0.12633859.jpg', '2026-05-15 02:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Painting'),
(2, 'Digital Art'),
(3, 'Sculpture'),
(4, 'Sketch'),
(5, 'Photography'),
(6, 'Illustration');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `artwork_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `artwork_id`, `user_id`, `comment_text`, `created_at`, `parent_id`) VALUES
(5, 22, 45, 'Harry keren banget, 😍😍😍😍😍🔥🔥🔥👏👏👏', '2026-05-15 02:15:58', NULL),
(6, 22, 45, 'setuju !!!! 🔥🔥🔥🔥', '2026-05-15 02:16:06', 5),
(7, 22, 45, 'Kurang yakin 😀', '2026-05-15 02:16:26', 5),
(8, 14, 45, 'Willy noob 😀😀😀😀', '2026-05-15 02:17:48', NULL),
(9, 14, 45, 'willy hitam legam', '2026-05-15 02:17:55', 8),
(10, 24, 45, '😍😍😍😍😍✨✨✨✨✨, Premium Nigga', '2026-05-15 02:19:53', NULL),
(11, 24, 45, 'Racist is amazing nowadys 😍😍😍', '2026-05-15 02:20:08', 10),
(12, 26, 33, '❤️❤️❤️❤️', '2026-05-15 02:32:29', NULL),
(13, 26, 33, '😍😍😍', '2026-05-15 02:32:34', 12),
(15, 26, 7, '😀😀😀😀', '2026-05-15 03:05:23', 12),
(16, 26, 7, 'cool', '2026-05-15 03:16:40', 12);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int NOT NULL,
  `follower_id` int NOT NULL,
  `following_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `artwork_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `artwork_id`, `user_id`, `created_at`) VALUES
(4, 22, 44, '2026-05-14 15:40:04'),
(5, 21, 44, '2026-05-14 15:40:05'),
(6, 9, 44, '2026-05-14 15:40:06'),
(7, 13, 44, '2026-05-14 15:40:07'),
(8, 12, 44, '2026-05-14 15:40:08'),
(9, 11, 44, '2026-05-14 15:40:09'),
(10, 10, 44, '2026-05-14 15:40:10'),
(11, 20, 44, '2026-05-14 15:40:33'),
(12, 19, 44, '2026-05-14 15:40:34'),
(13, 18, 44, '2026-05-14 15:40:35'),
(14, 14, 44, '2026-05-14 15:40:38'),
(15, 22, 45, '2026-05-15 02:15:40'),
(16, 21, 45, '2026-05-15 02:15:44'),
(17, 9, 45, '2026-05-15 02:16:44'),
(18, 13, 45, '2026-05-15 02:16:45'),
(19, 12, 45, '2026-05-15 02:16:46'),
(20, 11, 45, '2026-05-15 02:16:47'),
(21, 10, 45, '2026-05-15 02:16:47'),
(23, 15, 45, '2026-05-15 02:16:52'),
(24, 16, 45, '2026-05-15 02:16:53'),
(25, 17, 45, '2026-05-15 02:16:54'),
(26, 20, 45, '2026-05-15 02:16:55'),
(27, 19, 45, '2026-05-15 02:16:56'),
(28, 18, 45, '2026-05-15 02:16:57'),
(32, 14, 45, '2026-05-15 02:17:39'),
(34, 24, 45, '2026-05-15 02:20:56'),
(36, 22, 33, '2026-05-15 02:26:19'),
(37, 21, 33, '2026-05-15 02:26:22'),
(38, 12, 33, '2026-05-15 02:26:25'),
(39, 19, 33, '2026-05-15 02:27:17'),
(40, 26, 33, '2026-05-15 02:32:25'),
(41, 25, 33, '2026-05-15 02:56:13'),
(42, 26, 7, '2026-05-15 03:18:48'),
(43, 25, 44, '2026-05-15 03:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('viewer','author','admin') DEFAULT 'viewer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `banner_path` varchar(255) DEFAULT 'background.png',
  `avatar_path` varchar(255) DEFAULT 'user.png',
  `student_id` varchar(20) DEFAULT '123456789'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`, `banner_path`, `avatar_path`, `student_id`) VALUES
(1, 'Author Amboi', 'amboi@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-04 04:09:30', 'background.png', 'user.png', '80000001'),
(2, 'Viewer Amboi', 'amboi@gmail.com', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'viewer', '2026-05-04 04:09:30', 'background.png', 'user.png', '80000002'),
(3, 'Amboi', 'amboi1223@gmail.com', '$2y$10$5t27iHI6noSfft25QNePRe.Md/r3CC5bwzeHhPHR5QyKHkhMqXmee', 'viewer', '2026-05-04 04:26:16', 'background.png', 'user.png', '80000003'),
(4, 'Amboi', 'kureng@ski.sch.id', '$2y$10$veIDlYi3LrzEawktPMYPhu2FIJKvaqgdydm7Tmnmf5n/xJkZfyBhe', 'author', '2026-05-04 04:26:51', 'background.png', 'user.png', '80000004'),
(5, 'gg', 'gg@ski.sch.id', '$2y$10$UtJ9TBGc4L0cJdxfJ/vjh.jaWVzIHd9ZCIJpGQIk56VSIkpwGskTm', 'author', '2026-05-05 00:02:22', 'background.png', 'user.png', '80000005'),
(6, 'Amboi', 'amboi123@gmail.com', '$2y$10$9BNCd/wWuNn.1jYrvH//YuEX5z8p87Y0A9O59AMB63YuIn5MEdR8u', 'viewer', '2026-05-05 00:04:14', 'background.png', 'user.png', '80000006'),
(7, 'Amboi', 'aduh@gmail.com', '$2y$10$/biw1NJmJ3/CgIYc5PBTouk1X8X6DymRL7EqjblhdNaC5CuWAYDXm', 'viewer', '2026-05-05 00:32:49', 'background.png', 'user.png', '80000007'),
(9, 'Amboi', 'amboi11231@gmail.com', '$2y$10$eIDlWCncVAMwLCAO0bTk/ug3QRKzOQwZsYru86IV5GtAbCzPcOApG', 'viewer', '2026-05-05 00:34:18', 'background.png', 'user.png', '80000008'),
(11, 'Amboi', 'aoi@gmail.com', '$2y$10$9vYEf5wh1TrJX3CvqXWutuJ7rDKvy51AOiwCtXymQnFZVCMqpgJuy', 'viewer', '2026-05-05 00:35:16', 'background.png', 'user.png', '80000009'),
(12, 'Devon', 'test@gmail.com', '$2y$10$EYEUCRnnpmL0ZUSjOPFNyu1V/b1KDPs15jodPfIqJftXTxd8b00we', 'viewer', '2026-05-05 01:01:06', 'background.png', 'user.png', '80000010'),
(13, 'Devon', 'test@ski.sch.id', '$2y$10$z5qLtVfKew/Kgxyag2x0S.kMaEOQzypRlT2qmaWVMiY8wZR2BJQ/m', 'author', '2026-05-05 01:01:49', 'background.png', 'user.png', '80000011'),
(14, 'gdhh', 'test123@gmail.com', '$2y$10$/Lm/4wEKnOPU7ThIA2IP/.fY4l9Mf1pbJbw5YyIAnijHzPJHGlj2u', 'viewer', '2026-05-08 03:28:46', 'background.png', 'user.png', '80000012'),
(16, 'Devon', 'test12@ski.sch.id', '$2y$10$ok7IxpegOetxi9iAxiltEubRka9HjeqcA6j3WmyRZW7yeXRYO8m.G', 'author', '2026-05-08 03:29:45', 'background.png', 'user.png', '80000013'),
(17, 'tes', '123@gmail.com', '$2y$10$HdaCJfE.BgX/Xx/df3EMS.zlzVa/3wbyJOfq4cK7BfqVXyjh8FSEy', 'viewer', '2026-05-08 04:05:14', 'background.png', 'user.png', '80000014'),
(18, 'tes', 'tes123@ski.sch.id', '$2y$10$U2VGtOxVCVSgZMniZiZDReWGoUGNnp9mWUL3T7J8wWyTy5aGmuYry', 'author', '2026-05-08 04:05:54', 'background.png', 'user.png', '80000015'),
(19, 'felix', 'snack@gmail.com', '$2y$10$QdrAQN5LlROV8eOW1xmDxOjMVrXxYZ3hQZJwFqTh.jM5mN7oViIaK', 'viewer', '2026-05-08 04:06:33', 'background.png', 'user.png', '80000016'),
(20, 'felix', 'snack@ski.sch.id', '$2y$10$IGLpdWTZf8oeu2aJ/qHbvOnfI2cG40lKJYfHL3iRK9N.0Di5AjShC', 'author', '2026-05-08 04:07:04', 'background.png', 'user.png', '80000017'),
(21, 'Chisa Evelyn', 'chisa@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000018'),
(22, 'Odin Madun', 'odin@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000019'),
(23, 'Viktor Wembu', 'viktor@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000020'),
(24, 'Daniel Caesar', 'daniel@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000021'),
(25, 'Faysal Pratama', 'faysal@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000022'),
(26, 'Depon Vintjai', 'depon@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000023'),
(27, 'Tang Yau Hoong', 'tang@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000024'),
(28, 'Marcello Adil', 'marcello@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000025'),
(29, 'Reyfan Andika', 'reyfan@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000026'),
(30, 'Felicia Chiao', 'felicia@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000027'),
(31, 'Nicholas Jo', 'nicholas@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000028'),
(32, 'Jo Halimawan', 'jo@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-12 01:29:07', 'background.png', 'user.png', '80000029'),
(33, 'Flazened Admin', 'flazened@ski.sch.id', '$2y$10$3b.deZ8aho5giYhKRIe0SOIrf.z9yPvSiwUKxAL83ry49EL9lzsri', 'admin', '2026-05-12 02:36:58', 'background.png', 'user.png', '80000030'),
(35, 'System Admin', 'admin@ski.sch.id', '$2y0$Z4J68ixrI6IDJuGIJW4AWu7iBM9LCH3sCSS/BJnx4UU0t6qRlOS06', 'admin', '2026-05-12 02:49:00', 'background.png', 'user.png', '80000031'),
(38, 'siapa', 'abc@gmail.com', '$2y$10$D0ykgc1oo8TaAU09Bnzhker/rRJrs3Zw5dAvIdyLfrx48NQrqBHVS', 'viewer', '2026-05-12 02:53:54', 'background.png', 'user.png', '80000032'),
(44, 'Michael Sigma', 'abc@ski.sch.id', '$2y$10$v8.XkawEt1mdMhhHy7G7VOpwcKHSZx0zrTiWiMwoRirbOdbzts.eC', 'author', '2026-05-14 14:41:37', 'background.png', 'user.png', '80000033'),
(45, 'Michael Sigma', 'aku@ski.sch.id', '$2y$10$a.uNXDxUYBsUKYuK84yO5uFbeqTKcxxh/2T3witFKN62UEX.7ilzC', 'author', '2026-05-15 02:15:11', 'background.png', 'user.png', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `user_tags`
--

CREATE TABLE `user_tags` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `tag_name` varchar(50) NOT NULL,
  `tag_color` varchar(20) DEFAULT '#f4c430',
  `tag_icon` varchar(50) DEFAULT 'paint.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_id` (`artwork_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_parent_comment` (`parent_id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_follow` (`follower_id`,`following_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`artwork_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_tags`
--
ALTER TABLE `user_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artworks`
--
ALTER TABLE `artworks`
  ADD CONSTRAINT `artworks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artworks_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`artwork_id`) REFERENCES `artworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_parent_comment` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`artwork_id`) REFERENCES `artworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD CONSTRAINT `user_tags_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
