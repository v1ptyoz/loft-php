-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Апр 16 2022 г., 02:55
-- Версия сервера: 5.7.34
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `loft_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `comment` text,
  `user_id` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `address`, `comment`, `user_id`, `date`) VALUES
(3, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(4, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(5, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(6, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(7, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(8, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(9, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(10, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(11, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(12, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(13, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfsdf@re.re', '2022-04-15'),
(14, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfs123df@re.re', '2022-04-15'),
(15, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfs123df@re.re', '2022-04-16'),
(16, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfs123df@re.re', '2022-04-16'),
(17, 'ttyyuuu 111 222 333 444', 'sadfgasgghjgsafsadf\r\nasdfasdfas\r\ndfsafasdfasdfsdf', 'asdfs123df@re.re', '2022-04-16');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`email`, `name`, `phone`) VALUES
('asdfs123df@re.re', 'asdfsa', '+7 (234) 234 23 43'),
('asdfsdf@re.re', 'asdfsa', '+7 (234) 234 23 43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_id_uindex` (`id`),
  ADD KEY `orders_users_email_fk` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `users_email_uindex` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_email_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
