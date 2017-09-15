-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2017 at 11:53 AM
-- Server version: 5.7.14-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) NOT NULL,
  `user_id` int(128) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `user_id`, `alias`, `title`, `content`, `image`, `created_at`, `updated_at`, `status`) VALUES
(44, 1, 'sdfgsdfgsdf-6', 'sdfgsdfgsdf', 'sdfgsdfgsdfg', '15092017084642_59bb937228c18.jpg', 1505465202, 1505465202, 1),
(26, 1, 'title1-ghdfg-fdghdf-ddfgh111-13', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505402889, 1505402889, 1),
(27, 1, 'title1-ghdfg-fdghdf-ddfgh111-14', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505402907, 1505402907, 1),
(28, 1, 'title1-ghdfg-fdghdf-ddfgh111-15', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505402913, 1505402913, 1),
(29, 1, 'title1-ghdfg-fdghdf-ddfgh111-16', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404517, 1505404517, 1),
(30, 1, 'title1-ghdfg-fdghdf-ddfgh111-17', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404556, 1505404556, 1),
(31, 1, 'title1-ghdfg-fdghdf-ddfgh111-18', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404580, 1505404580, 1),
(32, 1, 'title1-ghdfg-fdghdf-ddfgh111-19', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404742, 1505404742, 1),
(33, 1, 'title1-ghdfg-fdghdf-ddfgh111-20', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404829, 1505404829, 1),
(34, 1, 'title1-ghdfg-fdghdf-ddfgh111-21', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404880, 1505404880, 1),
(35, 1, 'title1-ghdfg-fdghdf-ddfgh111-22', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404881, 1505404881, 1),
(36, 1, 'title1-ghdfg-fdghdf-ddfgh111-23', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404883, 1505404883, 1),
(37, 1, 'title1-ghdfg-fdghdf-ddfgh111-24', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505404895, 1505404895, 1),
(38, 1, 'title1-ghdfg-fdghdf-ddfgh111-25', 'Title1 ghdfg fdghdf dDFGH111', 'content1', NULL, 1505457575, 1505457575, 1),
(39, 1, 'sdfgsdfgsdf', 'sdfgsdfgsdf', 'sdfgsdfgsdfg', NULL, 1505460727, 1505460727, 1),
(40, 1, 'sdfgsdfgsdf-2', 'sdfgsdfgsdf', 'sdfgsdfgsdfg', '15092017073223_59bb8207764f2.jpg', 1505460743, 1505460743, 1),
(41, 1, 'sdfgsdfgsdf-3', 'sdfgsdfgsdf', 'sdfgsdfgsdfg', '15092017082220_59bb8dbceea1b.jpg', 1505463740, 1505463740, 1),
(42, 1, 'sdfgsdfgsdf-4', 'sdfgsdfgsdf', 'sdfgsdfgsdfg', '15092017083102_59bb8fc6835e7.jpg', 1505464262, 1505464262, 1),
(43, 1, 'sdfgsdfgsdf-5', 'sdfgsdfgsdf', 'sdfgsdfgsdfg', '15092017084136_59bb924060b24.jpg', 1505464896, 1505464896, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`) VALUES
(21, 1),
(26, 1),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES
(21, 1),
(26, 1),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(38, 7),
(38, 8),
(38, 9),
(42, 12),
(42, 13),
(42, 13),
(43, 12),
(43, 13),
(43, 13),
(44, 12),
(44, 13),
(44, 13);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `alias` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `alias`, `title`, `description`, `image`, `status`) VALUES
(1, NULL, 'category', 'Category', 'description', NULL, 1),
(2, NULL, 'category1category1', 'Category1Category1', 'description', NULL, 1),
(3, NULL, 'category1-category1', 'Category1 Category1', 'description', NULL, 1),
(4, 1, 'category4', 'Category4', 'description', NULL, 1),
(5, 1, 'category5', 'Category5', 'description', NULL, 1),
(6, 2, 'category6', 'Category6', 'description', NULL, 1),
(7, 2, 'category7', 'Category7', 'description', NULL, 1),
(8, 3, 'category8', 'Category8', 'description', NULL, 1),
(9, 3, 'category9', 'Category9', 'description', NULL, 1),
(10, 3, 'category10', 'Category10', 'description', NULL, 1),
(11, 10, 'category11', 'Category11', 'description', NULL, 1),
(12, 10, 'category11-2', 'Category11', 'description', NULL, 1),
(13, 10, 'category11-3', 'Category11', 'description', NULL, 1),
(14, 10, 'sdfgsdfgsdfg', 'Category11', 'description', NULL, 1),
(15, 10, 'sdfgsdfgsdfgsdfgsdfg', 'Category11', 'description', NULL, 1),
(16, 10, 'category11-4', 'Category11', 'description', '14092017094607_59ba4fdf572f1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1505249553),
('m150207_210500_i18n_init', 1505249561);

-- --------------------------------------------------------

--
-- Table structure for table `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `alias`, `title`, `status`) VALUES
(1, 'title1-ghdfg-fdghdf-ddfgh111', 'Title1 ghdfg fdghdf dDFGH111', 1),
(2, 'articke', 'Articke', 1),
(3, 'articke-2', 'Articke', 1),
(4, 'articke-3', 'Articke', 1),
(5, 'articke-4', 'Articke', 1),
(6, 'articke-5', 'Articke', 1),
(7, 'dfghdfg', 'dfghdfg', 1),
(8, 'dfgdsfgdsf', 'dfgdsfgdsf', 1),
(9, 'dfgsdfg', 'dfgsdfg', 1),
(10, 'articke-6', 'Articke', 1),
(11, 'articke-7', 'Articke', 1),
(12, 'sfdgsdfg', 'sfdgsdfg', 1),
(13, 'sdfgsdfg', 'sdfgsdfg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `api_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dog', '0W1TOZZOt1VfsDU3rMeMqWhhiF9hZKPw', '$2y$13$WcyRXkIcWCsGavUidPCezeWbwU7zx.8rbTRpv53dAbC87by/sokby', '0W1TOZZOt1VfsDU3rMeMqWhhiF9hZKPw\n', NULL, 'dog@devphp.host', 10, 1505123846, 1505123846);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`),
  ADD KEY `idx_message_language` (`language`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_source_message_category` (`category`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
