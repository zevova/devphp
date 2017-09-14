-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Вер 13 2017 р., 05:13
-- Версія сервера: 5.7.14
-- Версія PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `yii2api`
--

-- --------------------------------------------------------

--
-- Структура таблиці `article`
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
-- Дамп даних таблиці `article`
--

INSERT INTO `article` (`id`, `user_id`, `alias`, `title`, `content`, `image`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017200242_59b83d621d5b3.jpg', 1505246562, 1505246562, 1),
(2, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017200243_59b83d63e646e.jpg', 1505246563, 1505246563, 0),
(3, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017200245_59b83d6588a03.jpg', 1505246565, 1505246565, 1),
(4, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017200246_59b83d66ecffb.jpg', 1505246566, 1505246566, 0),
(5, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017200248_59b83d685d7fc.jpg', 1505246568, 1505246568, 1),
(6, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017203319_59b8448fb5338.jpg', 1505248399, 1505248399, 0),
(7, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017203322_59b844927709c.jpg', 1505248402, 1505248402, 1),
(8, 1, 'test1-df-gfdg-df-fdg-df-gddfgdfg', 'Test1 df gfdg df fdg df gddfgdfg', 'Content1 sdfsdf Dfghfsdf sdf s df', '12092017203324_59b8449419273.jpg', 1505248404, 1505248404, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1505249553),
('m150207_210500_i18n_init', 1505249561);

-- --------------------------------------------------------

--
-- Структура таблиці `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `user`
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
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `api_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dog', '0W1TOZZOt1VfsDU3rMeMqWhhiF9hZKPw', '$2y$13$WcyRXkIcWCsGavUidPCezeWbwU7zx.8rbTRpv53dAbC87by/sokby', '0W1TOZZOt1VfsDU3rMeMqWhhiF9hZKPw\n', NULL, 'dog@devphp.host', 10, 1505123846, 1505123846);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`),
  ADD KEY `idx_message_language` (`language`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_source_message_category` (`category`);

--
-- Індекси таблиці `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
