-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2016 г., 17:32
-- Версия сервера: 5.5.48
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Laptop'),
(2, 'Smartphone'),
(3, 'Tablet'),
(8, 'Watch'),
(13, 'iPod');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date` datetime NOT NULL,
  `products` text NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `date`, `products`, `total_price`) VALUES
(21, 'Tony Stark', '(123) 456-78-90', 'Miami', '2016-10-16 12:54:46', 'a:2:{i:0;a:6:{s:2:"id";s:1:"2";s:4:"name";s:9:"iPad mini";s:8:"category";s:6:"Tablet";s:5:"price";s:3:"299";s:5:"image";s:29:"images/product/ipad mini.jpeg";s:5:"count";i:1;}i:1;a:6:{s:2:"id";s:1:"7";s:4:"name";s:17:"Apple Watch Sport";s:8:"category";s:5:"Watch";s:5:"price";s:3:"399";s:5:"image";s:31:"images/product/watch sport.jpeg";s:5:"count";i:1;}}', 698),
(22, 'Steve Rogers', '(111) 222-33-44', 'Washington', '2016-10-16 12:56:51', 'a:2:{i:0;a:6:{s:2:"id";s:1:"3";s:4:"name";s:11:"MacBook Air";s:8:"category";s:6:"Laptop";s:5:"price";s:3:"999";s:5:"image";s:30:"images/product/macbook-air.jpg";s:5:"count";i:1;}i:1;a:6:{s:2:"id";s:1:"1";s:4:"name";s:9:"iPhone 5S";s:8:"category";s:10:"Smartphone";s:5:"price";s:3:"299";s:5:"image";s:21:"images/product/5s.jpg";s:5:"count";i:2;}}', 1597);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `image`) VALUES
(1, 'iPhone 5S', 'Smartphone', 299, 'images/product/5s.jpg'),
(2, 'iPad mini', 'Tablet', 299, 'images/product/ipad mini.jpeg'),
(3, 'MacBook Air', 'Laptop', 999, 'images/product/macbook-air.jpg'),
(4, 'iPhone 6', 'Smartphone', 499, 'images/product/ip6.jpg'),
(7, 'Apple Watch Sport', 'Watch', 399, 'images/product/watch sport.jpeg'),
(8, 'Apple Watch Gold Edition', 'Watch', 9999, 'images/product/gold.jpg'),
(9, 'iPad Pro', 'Tablet', 899, 'images/product/ipad pro.jpg'),
(10, 'MacBook Pro', 'Laptop', 1299, 'images/product/MacBook-Pro-13.jpg'),
(13, 'iPod Touch', 'iPod', 249, 'images/product/black-ipod-touch.jpg'),
(20, 'iPhone SE', 'Smartphone', 399, 'images/product/iphoneserosegold-800x898.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
