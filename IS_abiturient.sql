-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3333
-- Время создания: Дек 22 2023 г., 13:11
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `IS_abiturient`
--

-- --------------------------------------------------------

--
-- Структура таблицы `add_info`
--

CREATE TABLE `add_info` (
  `add_data` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `add_info`
--

INSERT INTO `add_info` (`add_data`) VALUES
('инвалид'),
('нуждается в общежитии'),
('сирота');

-- --------------------------------------------------------

--
-- Структура таблицы `ankets`
--

CREATE TABLE `ankets` (
  `id_user` int(10) NOT NULL,
  `birthday` date NOT NULL,
  `citizenship` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'номер телефона',
  `educ` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Законченное образовательное учреждение',
  `date_educ` int(4) NOT NULL COMMENT 'Год окончания этого учреждения',
  `add_data` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Дополнительные сведения',
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Изучаемый иностранный язык',
  `avg_attestat` decimal(2,1) NOT NULL,
  `parents_data` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ankets`
--

INSERT INTO `ankets` (`id_user`, `birthday`, `citizenship`, `sex`, `adress`, `special`, `tel`, `educ`, `date_educ`, `add_data`, `lang`, `avg_attestat`, `parents_data`) VALUES
(1, '2002-01-09', 'Россия', 'Мужской', 'Дом 55', 'Переводчик с английского', '89007008090', 'Образовательное учреждение', 2018, 'инвалид', 'Испанский', '4.4', 'ымымывмвмы123'),
(3, '2023-12-07', 'Россия', 'Мужской', 'Дом 55', 'Программист', '89007008090', 'Образовательное учреждение', 2015, 'нуждается в общежитии', 'Французский', '4.4', '.l,oikmujhbgvf'),
(5, '2012-02-09', 'Россия', 'Мужской', 'Дом 55', 'Программист', '89007008090', 'Образовательное учреждение', 2018, 'инвалид', 'Китайский', '4.7', 'wasedrftvgbyhuj');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `lang` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`lang`) VALUES
('Китайский\r\n'),
('Испанский\r\n'),
('Английский\r\n'),
('Хинди\r\n'),
('Арабский\r\n'),
('Бенгальский\r\n'),
('Португальский\r\n'),
('Русский\r\n'),
('Японский\r\n'),
('Немецкий\r\n'),
('Французский');

-- --------------------------------------------------------

--
-- Структура таблицы `specialize`
--

CREATE TABLE `specialize` (
  `special` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specialize`
--

INSERT INTO `specialize` (`special`) VALUES
('Бухгалтер'),
('Переводчик с английского'),
('Переводчик с китайского'),
('Программист'),
('Синхронный переводчик с английского'),
('Синхронный переводчик с китайского'),
('Специалист информационных систем'),
('Юрист');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Нет отчества',
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `last_name`, `first_name`, `middle_name`, `admin`) VALUES
(1, 'kik', '123', 'Федоров', 'Федор', 'Фиадорианович', NULL),
(3, 'kike', '123', 'Грегин', 'Грег', '', NULL),
(4, 'admin', 'admin', 'admin', 'admin', 'Нет отчества', 1),
(5, 'кике ', '123456', 'Петров', 'Михаил', 'Валерьевич', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `add_info`
--
ALTER TABLE `add_info`
  ADD UNIQUE KEY `add_data` (`add_data`);

--
-- Индексы таблицы `ankets`
--
ALTER TABLE `ankets`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `specialize`
--
ALTER TABLE `specialize`
  ADD UNIQUE KEY `special` (`special`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
