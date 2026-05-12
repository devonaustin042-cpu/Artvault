-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2026 at 04:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
(1, 1, NULL, 'Claymonster', 'A creative clay monster sculpture.', 'Claymonster.png', '2026-05-04 04:15:04'),
(2, 2, NULL, 'Koi Pond', 'A serene view of a koi pond.', 'Koi-Pond.png', '2026-05-04 04:15:04'),
(3, 1, NULL, 'Trash Hunt', 'An imaginative urban scene of a trash hunt.', 'Trash-Hunt.png', '2026-05-04 04:15:04'),
(4, 2, NULL, 'Cherish the moment', 'A beautiful capture of a cherished moment.', 'Cherish-the-moment.png', '2026-05-04 04:15:04'),
(5, 1, NULL, 'Ayo punya cita-cita', 'Inspirational art about having dreams.', 'Ayo-punya-cita-cita.png', '2026-05-04 04:15:04'),
(6, 2, NULL, 'Billie Eilish', 'A portrait of the famous singer.', 'Billie-Eilish.png', '2026-05-04 04:15:04'),
(7, 1, NULL, 'Vibrant River', 'A colorful and vibrant river landscape.', 'Vibrant-River.png', '2026-05-04 04:15:04'),
(8, 2, NULL, 'Anonymous Protagonis', 'Unique character art by Felicia Chiao.', 'Anonymous-Protagonis.png', '2026-05-04 04:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('viewer','author') DEFAULT 'viewer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Author Amboi', 'amboi@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author', '2026-05-04 04:09:30'),
(2, 'Viewer Amboi', 'amboi@gmail.com', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'viewer', '2026-05-04 04:09:30'),
(3, 'Amboi', 'amboi1223@gmail.com', '$2y$10$5t27iHI6noSfft25QNePRe.Md/r3CC5bwzeHhPHR5QyKHkhMqXmee', 'viewer', '2026-05-04 04:26:16'),
(4, 'Amboi', 'kureng@ski.sch.id', '$2y$10$veIDlYi3LrzEawktPMYPhu2FIJKvaqgdydm7Tmnmf5n/xJkZfyBhe', 'author', '2026-05-04 04:26:51'),
(5, 'gg', 'gg@ski.sch.id', '$2y$10$UtJ9TBGc4L0cJdxfJ/vjh.jaWVzIHd9ZCIJpGQIk56VSIkpwGskTm', 'author', '2026-05-05 00:02:22'),
(6, 'Amboi', 'amboi123@gmail.com', '$2y$10$9BNCd/wWuNn.1jYrvH//YuEX5z8p87Y0A9O59AMB63YuIn5MEdR8u', 'viewer', '2026-05-05 00:04:14'),
(7, 'Amboi', 'aduh@gmail.com', '$2y$10$/biw1NJmJ3/CgIYc5PBTouk1X8X6DymRL7EqjblhdNaC5CuWAYDXm', 'author', '2026-05-05 00:32:49'),
(9, 'Amboi', 'amboi11231@gmail.com', '$2y$10$eIDlWCncVAMwLCAO0bTk/ug3QRKzOQwZsYru86IV5GtAbCzPcOApG', 'author', '2026-05-05 00:34:18'),
(11, 'Amboi', 'aoi@gmail.com', '$2y$10$9vYEf5wh1TrJX3CvqXWutuJ7rDKvy51AOiwCtXymQnFZVCMqpgJuy', 'author', '2026-05-05 00:35:16'),
(12, 'Devon', 'test@gmail.com', '$2y$10$EYEUCRnnpmL0ZUSjOPFNyu1V/b1KDPs15jodPfIqJftXTxd8b00we', 'viewer', '2026-05-05 01:01:06'),
(13, 'Devon', 'test@ski.sch.id', '$2y$10$z5qLtVfKew/Kgxyag2x0S.kMaEOQzypRlT2qmaWVMiY8wZR2BJQ/m', 'author', '2026-05-05 01:01:49'),
(14, 'gdhh', 'test123@gmail.com', '$2y$10$/Lm/4wEKnOPU7ThIA2IP/.fY4l9Mf1pbJbw5YyIAnijHzPJHGlj2u', 'viewer', '2026-05-08 03:28:46'),
(16, 'Devon', 'test12@ski.sch.id', '$2y$10$ok7IxpegOetxi9iAxiltEubRka9HjeqcA6j3WmyRZW7yeXRYO8m.G', 'author', '2026-05-08 03:29:45'),
(17, 'tes', '123@gmail.com', '$2y$10$HdaCJfE.BgX/Xx/df3EMS.zlzVa/3wbyJOfq4cK7BfqVXyjh8FSEy', 'viewer', '2026-05-08 04:05:14'),
(18, 'tes', 'tes123@ski.sch.id', '$2y$10$U2VGtOxVCVSgZMniZiZDReWGoUGNnp9mWUL3T7J8wWyTy5aGmuYry', 'author', '2026-05-08 04:05:54'),
(19, 'felix', 'snack@gmail.com', '$2y$10$QdrAQN5LlROV8eOW1xmDxOjMVrXxYZ3hQZJwFqTh.jM5mN7oViIaK', 'viewer', '2026-05-08 04:06:33'),
(20, 'felix', 'snack@ski.sch.id', '$2y$10$IGLpdWTZf8oeu2aJ/qHbvOnfI2cG40lKJYfHL3iRK9N.0Di5AjShC', 'author', '2026-05-08 04:07:04'),
(21, 'Flazened Admin', 'flazened@ski.sch.id', '$2y$10$8KpZG/jCsulygGUP/qLt5.CdDj9jM8uQ3SVNooEaQU.mjHndKwWlW', 'author', '2026-05-12 00:00:00');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artworks`
--
ALTER TABLE `artworks`
  ADD CONSTRAINT `artworks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artworks_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
