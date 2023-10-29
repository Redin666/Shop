-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2023 г., 22:25
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Коментарии`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `created_at`, `email`) VALUES
(1, 'Qwerteam', 'fdfsfdsa', '2023-05-19 18:39:19', 'redinn41@gmail.com'),
(2, 'Qwerteam', 'павпывап', '2023-05-19 18:51:06', 'redinn41@gmail.com'),
(3, 'Т', 'ertretret', '2023-05-19 18:56:02', 'redin.nikita2018@yandex.com'),
(4, 'Т', 'ertretret', '2023-05-19 18:56:04', 'redin.nikita2018@yandex.com'),
(5, 'Qwerteam', 'кен65кн4', '2023-05-19 18:59:44', 'redin.nikita2018@yandex.com'),
(6, 'Qwerteam', 'fggrw5gtryrt', '2023-05-19 19:05:59', 'redinn41@gmail.com'),
(7, 'Т', 'ytry6y65y65y65y5', '2023-05-19 19:07:24', 'redin.nikita2018@yandex.com'),
(8, 'ret', '5н543н6н654', '2023-05-19 19:22:12', 'redinn41@gmail.com'),
(9, 'ret', 'ео765о765', '2023-05-19 19:22:32', 'redin.nikita2018@yandex.com'),
(10, 'ret', 'праврп', '2023-05-19 19:27:39', 'redinnikita47@gmail.com'),
(11, 'Т', 'hgfhfghfgdh', '2023-05-19 19:28:04', 'redin.nikita2018@yandex.com'),
(12, 'ret', ',,mopojmoik,', '2023-05-19 19:29:47', 'redin.nikita2018@yandex.com'),
(13, 'Т', 'hgfht5yh67547', '2023-05-19 20:57:15', 'redinn41@gmail.com'),
(14, 'Т', 'павпваыпав', '2023-05-19 21:07:00', 'redin.nikita2018@yandex.com'),
(15, '09-09', 'hjkhgjkgjkghjkgh', '2023-05-19 21:08:59', 'redin.nikita2018@yandex.com'),
(16, 'Qwerteam', 'gfdsgfdgfdsgfds', '2023-05-19 21:11:25', 'redinn41@gmail.com'),
(17, 'ttrtry', 'rehyryeh', '2023-05-20 07:08:04', 'redin.nikita2018@yandex.com'),
(18, '09-09', 'gfdgfdgfdgdf', '2023-05-20 07:11:41', 'redin.nikita2018@yandex.com'),
(19, '09-09', 'павпавпаывпав', '2023-05-20 09:59:40', 'redin.nikita2018@yandex.com'),
(20, 'ttrtry', 'jurtutyuty', '2023-05-20 10:35:15', 'redin.nikita2018@yandex.com'),
(23, 'Тест', 'привет это тест', '2023-05-20 18:11:12', 'redinnikita47@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
