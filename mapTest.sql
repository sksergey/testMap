-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 15 2017 г., 21:48
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mapTest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(120) NOT NULL,
  `image` varchar(200) NOT NULL,
  `lat` varchar(10) DEFAULT NULL,
  `lng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `image`, `lat`, `lng`) VALUES
(4, 'Сергей Жуков', 'Украина Харьков ул.Сумская, 38', '/images/question.png', '49.999889', '36.234664'),
(5, 'Иван Иванов', 'Украина Харьков ул.Сумская, 89', '/images/android-logo-200x200.jpg', '50.0071481', '36.2373511'),
(6, 'Анна Петрова', 'Украина Харьков ул.Чичибабина, 5', '/images/Happy Face 200x200.png', '50.0065384', '36.2223938'),
(7, 'Юля Васильева', 'Украина Харьков ул.Героев Труда, 25', '/images/android-logo-200x200.jpg', '50.0210686', '36.3475521');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
