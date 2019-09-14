-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Eyl 2019, 16:59:44
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `envanter`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `user_id`, `task_id`, `created_at`, `updated_at`) VALUES
(129, 3, 1, '2019-09-14 08:59:04', '2019-09-14 08:59:04'),
(131, 3, 2, '2019-09-14 08:59:22', '2019-09-14 08:59:22'),
(135, 2, 4, '2019-09-14 08:59:28', '2019-09-14 08:59:28'),
(136, 2, 5, '2019-09-14 08:59:28', '2019-09-14 08:59:28'),
(137, 1, 1, '2019-09-14 09:05:41', '2019-09-14 09:05:41'),
(138, 2, 2, '2019-09-14 09:05:41', '2019-09-14 09:05:41'),
(141, 1, 3, '2019-09-14 10:37:47', '2019-09-14 10:37:47'),
(142, 3, 4, '2019-09-14 10:37:47', '2019-09-14 10:37:47'),
(143, 1, 9, '2019-09-14 10:37:47', '2019-09-14 10:37:47');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
