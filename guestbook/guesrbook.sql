-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Май 11 2021 г., 19:31
-- Версия сервера: 5.7.32
-- Версия PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `bd_misyte`
--

-- --------------------------------------------------------

--
-- Структура таблицы `guest_book`
--

CREATE TABLE `guest_book` (
                              `id` int(7) NOT NULL,
                              `name` varchar(100) NOT NULL,
                              `email` varchar(50) NOT NULL,
                              `comment` text NOT NULL,
                              `status` int(1) NOT NULL,
                              `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guest_book`
--

INSERT INTO `guest_book` (`id`, `name`, `email`, `comment`, `status`, `date`) VALUES
(1, 'Igor', 'Igor@mail.ru', 'Hello Wild', 0, '2021-05-10 23:23:33'),
(2, 'Андрей', 'adrey@mail.ru', 'Привет Мир!', 1, '2021-05-09 22:27:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `guest_book`
--
ALTER TABLE `guest_book`
    ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `guest_book`
--
ALTER TABLE `guest_book`
    MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
