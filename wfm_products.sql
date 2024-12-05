-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 05 2024 г., 22:01
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `wfm_products`
--

CREATE TABLE `wfm_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wfm_products`
--

INSERT INTO `wfm_products` (`id`, `title`, `category_id`, `price`) VALUES
(1, 'Apple iPhone XS Max 64GB (Silver) Dual SIM', 1, 1100),
(2, 'iPhone 7 Plus 128Gb Black', 1, 600),
(3, 'Apple iPhone SE 32gb Gold Neverlock', 1, 400),
(4, 'Мобильный телефон Asus ZenFone Live 2GB/32GB (ZB501KL-4A053A) DualSim Navy Black', 2, 120),
(5, 'Мобильный телефон Nokia 3.1 Plus Dual Sim 3/32GB TA-1104 Baltic', 3, 150),
(6, 'Мобильный телефон Nokia 7 Plus Dual Sim Black', 3, 280),
(7, 'Мобильный телефон Samsung Galaxy S10 8/128 GB Black (SM-G973FZKDSEK)', 4, 1000),
(8, 'Мобильный телефон Samsung Galaxy A30 4/64GB Blue (SM-A305FZBOSEK)', 4, 220),
(9, 'Мобильный телефон Samsung Galaxy S9 Plus 64GB Titanium Gray', 4, 800),
(10, 'Мобильный телефон Samsung Galaxy Note 9 6/128GB Midnight Black', 4, 850);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `wfm_products`
--
ALTER TABLE `wfm_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `wfm_products`
--
ALTER TABLE `wfm_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
