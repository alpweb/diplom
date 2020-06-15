-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 15 2020 г., 06:17
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `довгорізана`
--

CREATE TABLE `довгорізана` (
  `Код_виду_продукції` int(11) NOT NULL,
  `Діаметр` int(11) DEFAULT NULL,
  `Довжина` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `довгорізана`
--

INSERT INTO `довгорізана` (`Код_виду_продукції`, `Діаметр`, `Довжина`) VALUES
(2, 5, 10),
(3, 5, 20),
(4, 5, 30),
(5, 5, 40),
(6, 5, 50),
(8, 10, 50),
(9, 10, 80);

-- --------------------------------------------------------

--
-- Структура таблицы `короткорізана`
--

CREATE TABLE `короткорізана` (
  `Код_виду_продукції` int(11) NOT NULL,
  `Діаметр` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `короткорізана`
--

INSERT INTO `короткорізана` (`Код_виду_продукції`, `Діаметр`) VALUES
(2, 5),
(3, 10),
(4, 3),
(5, 7),
(6, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `пакувальні_машини`
--

CREATE TABLE `пакувальні_машини` (
  `Код_пакувальної_машини` int(11) NOT NULL,
  `Назва_машини` varchar(20) NOT NULL,
  `Тип_дозатора` varchar(20) NOT NULL,
  `Кількість_одночасного_наповнення` int(11) NOT NULL,
  `Код_виробника_обладнання` int(11) NOT NULL,
  `Код_типу_фасування_пакування` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `пакувальні_машини`
--

INSERT INTO `пакувальні_машини` (`Код_пакувальної_машини`, `Назва_машини`, `Тип_дозатора`, `Кількість_одночасного_наповнення`, `Код_виробника_обладнання`, `Код_типу_фасування_пакування`) VALUES
(2, 'Назва', 'тип-1', 20, 123123, 5588),
(3, 'Назва 2', 'тип-2', 30, 236545, 4455),
(4, 'Назва 3', 'тип-3', 40, 657898, 6655);

-- --------------------------------------------------------

--
-- Структура таблицы `пакувальні_машини_лінії`
--

CREATE TABLE `пакувальні_машини_лінії` (
  `Код_використання` int(11) NOT NULL,
  `Код_пакувальної_машини` int(11) DEFAULT NULL,
  `Код_лінії` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `пакувальні_машини_лінії`
--

INSERT INTO `пакувальні_машини_лінії` (`Код_використання`, `Код_пакувальної_машини`, `Код_лінії`) VALUES
(1, 2, 5),
(3, 3, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `продукція`
--

CREATE TABLE `продукція` (
  `Код_продукції` int(11) NOT NULL,
  `Назва_продукції` varchar(20) NOT NULL,
  `Довжина` int(11) NOT NULL DEFAULT 10,
  `Діаметр_перерізу` int(11) NOT NULL DEFAULT 5,
  `Код_виду_продукції` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `продукція`
--

INSERT INTO `продукція` (`Код_продукції`, `Назва_продукції`, `Довжина`, `Діаметр_перерізу`, `Код_виду_продукції`) VALUES
(2, 'sdfgsdgfsdg', 10, 5, 2),
(4, '22222', 20, 8, 3),
(5, '444444444', 30, 5, 1);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `активне_завдання_та_бригада`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `активне_завдання_та_бригада` (
);

-- --------------------------------------------------------

--
-- Структура таблицы `автоматизовані_лінії`
--

CREATE TABLE `автоматизовані_лінії` (
  `Код_лінії` int(11) NOT NULL,
  `Назва_лінії` varchar(20) DEFAULT NULL,
  `Тип_лінії` varchar(20) NOT NULL,
  `Кількість_бункерів` int(11) NOT NULL DEFAULT 1,
  `Обєм_бункера` int(11) NOT NULL DEFAULT 1,
  `Код_виробника_обладнання` int(11) NOT NULL DEFAULT 1,
  `Код_використання` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `автоматизовані_лінії`
--

INSERT INTO `автоматизовані_лінії` (`Код_лінії`, `Назва_лінії`, `Тип_лінії`, `Кількість_бункерів`, `Обєм_бункера`, `Код_виробника_обладнання`, `Код_використання`) VALUES
(5, 'line-5', '', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `вид_продукції`
--

CREATE TABLE `вид_продукції` (
  `Код_виду_продукції` int(11) NOT NULL,
  `Назва_продукції` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `вид_продукції`
--

INSERT INTO `вид_продукції` (`Код_виду_продукції`, `Назва_продукції`) VALUES
(1, 'vid_pr_1'),
(2, 'vid_pr_2'),
(3, 'вид продукции3'),
(4, 'молоко');

-- --------------------------------------------------------

--
-- Структура таблицы `вид_сировини`
--

CREATE TABLE `вид_сировини` (
  `Код_виду_сировини` int(11) NOT NULL,
  `Назва_сировини` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `вид_сировини`
--

INSERT INTO `вид_сировини` (`Код_виду_сировини`, `Назва_сировини`) VALUES
(1, 'цуцу'),
(2, 'цуцу'),
(3, 'vid1'),
(4, 'vid2'),
(5, 'Сир');

-- --------------------------------------------------------

--
-- Структура таблицы `змінний_журнал`
--

CREATE TABLE `змінний_журнал` (
  `Код_норми_виготовлення_продукції` int(11) NOT NULL,
  `Код_продукції` int(11) NOT NULL,
  `К_сть_виготовлен_прод_кг` int(11) NOT NULL,
  `Код_сировини` int(11) DEFAULT NULL,
  `Код_лінії` int(11) DEFAULT NULL,
  `Номе_бригади` int(11) NOT NULL,
  `Дата` datetime NOT NULL,
  `Кількість_використаної_сировини` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `змінний_журнал`
--

INSERT INTO `змінний_журнал` (`Код_норми_виготовлення_продукції`, `Код_продукції`, `К_сть_виготовлен_прод_кг`, `Код_сировини`, `Код_лінії`, `Номе_бригади`, `Дата`, `Кількість_використаної_сировини`) VALUES
(1, 2, 111, 2, 5, 22, '2020-05-28 00:00:00', 3333330),
(2, 2, 111, 2, 5, 22, '2020-05-28 00:00:00', 3333330);

-- --------------------------------------------------------

--
-- Структура таблицы `заявка_на_виробництво`
--

CREATE TABLE `заявка_на_виробництво` (
  `Код_заявки` int(11) NOT NULL,
  `Розмір_партії` int(11) NOT NULL,
  `Код_продукції` int(11) NOT NULL,
  `Дата_виконання` datetime NOT NULL,
  `Дата_надходження` datetime NOT NULL DEFAULT current_timestamp(),
  `Дата_необхідного_виконання` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `заявка_на_виробництво`
--

INSERT INTO `заявка_на_виробництво` (`Код_заявки`, `Розмір_партії`, `Код_продукції`, `Дата_виконання`, `Дата_надходження`, `Дата_необхідного_виконання`) VALUES
(4, 100, 2, '2020-05-08 00:00:00', '2020-05-31 10:06:20', '2020-05-30 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `сировина`
--

CREATE TABLE `сировина` (
  `Код_сировини` int(11) NOT NULL,
  `Назва` varchar(20) NOT NULL,
  `Код_виду_сировини` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `сировина`
--

INSERT INTO `сировина` (`Код_сировини`, `Назва`, `Код_виду_сировини`) VALUES
(2, 'eeeee', 1),
(9, 'ууууууууу', 2),
(10, 'ннннннн', 3),
(12, 'вапрвапр', 4),
(13, 'творог', 5);

-- --------------------------------------------------------

--
-- Структура для представления `активне_завдання_та_бригада`
--
DROP TABLE IF EXISTS `активне_завдання_та_бригада`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `активне_завдання_та_бригада`  AS  select `заявка_на_виробництво`.`Розмір_партії` AS `Розмір_партії`,`змінний_журнал`.`К_сть_виготовлен_прод_за_год_в_кг` AS `К_сть_виготовлен_прод_за_год_в_кг`,`змінний_журнал`.`Номе_бригади` AS `Номе_бригади`,`змінний_журнал`.`Дата` AS `Дата`,`продукція`.`Назва_продукції` AS `Назва_продукції` from ((`заявка_на_виробництво` join `продукція`) join `змінний_журнал`) where `продукція`.`Код_продукції` = `заявка_на_виробництво`.`Код_продукції` and `змінний_журнал`.`Код_продукції` = `продукція`.`Код_продукції` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `довгорізана`
--
ALTER TABLE `довгорізана`
  ADD PRIMARY KEY (`Код_виду_продукції`);

--
-- Индексы таблицы `короткорізана`
--
ALTER TABLE `короткорізана`
  ADD PRIMARY KEY (`Код_виду_продукції`);

--
-- Индексы таблицы `пакувальні_машини`
--
ALTER TABLE `пакувальні_машини`
  ADD PRIMARY KEY (`Код_пакувальної_машини`),
  ADD KEY `Код_пакувальної_машини` (`Код_пакувальної_машини`);

--
-- Индексы таблицы `пакувальні_машини_лінії`
--
ALTER TABLE `пакувальні_машини_лінії`
  ADD PRIMARY KEY (`Код_використання`),
  ADD KEY `Код_використання` (`Код_використання`),
  ADD KEY `Код_лінії` (`Код_лінії`),
  ADD KEY `Код_пакувальної_машини` (`Код_пакувальної_машини`);

--
-- Индексы таблицы `продукція`
--
ALTER TABLE `продукція`
  ADD PRIMARY KEY (`Код_продукції`),
  ADD KEY `Код_продукції` (`Код_продукції`),
  ADD KEY `Код_виду_продукції` (`Код_виду_продукції`);

--
-- Индексы таблицы `автоматизовані_лінії`
--
ALTER TABLE `автоматизовані_лінії`
  ADD PRIMARY KEY (`Код_лінії`),
  ADD KEY `Код_лінії` (`Код_лінії`),
  ADD KEY `Код_використання` (`Код_використання`);

--
-- Индексы таблицы `вид_продукції`
--
ALTER TABLE `вид_продукції`
  ADD PRIMARY KEY (`Код_виду_продукції`),
  ADD KEY `Код_виду_продукції` (`Код_виду_продукції`);

--
-- Индексы таблицы `вид_сировини`
--
ALTER TABLE `вид_сировини`
  ADD PRIMARY KEY (`Код_виду_сировини`),
  ADD KEY `Код_виду_сировини` (`Код_виду_сировини`);

--
-- Индексы таблицы `змінний_журнал`
--
ALTER TABLE `змінний_журнал`
  ADD PRIMARY KEY (`Код_норми_виготовлення_продукції`),
  ADD KEY `Код_продукції` (`Код_продукції`),
  ADD KEY `Код_лінії` (`Код_лінії`),
  ADD KEY `Код_сировини` (`Код_сировини`);

--
-- Индексы таблицы `заявка_на_виробництво`
--
ALTER TABLE `заявка_на_виробництво`
  ADD PRIMARY KEY (`Код_заявки`),
  ADD KEY `Код_продукції` (`Код_продукції`);

--
-- Индексы таблицы `сировина`
--
ALTER TABLE `сировина`
  ADD PRIMARY KEY (`Код_сировини`),
  ADD KEY `Код_сировини` (`Код_сировини`),
  ADD KEY `Код_виду_сировини` (`Код_виду_сировини`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `довгорізана`
--
ALTER TABLE `довгорізана`
  MODIFY `Код_виду_продукції` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `короткорізана`
--
ALTER TABLE `короткорізана`
  MODIFY `Код_виду_продукції` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `пакувальні_машини`
--
ALTER TABLE `пакувальні_машини`
  MODIFY `Код_пакувальної_машини` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `пакувальні_машини_лінії`
--
ALTER TABLE `пакувальні_машини_лінії`
  MODIFY `Код_використання` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `продукція`
--
ALTER TABLE `продукція`
  MODIFY `Код_продукції` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `автоматизовані_лінії`
--
ALTER TABLE `автоматизовані_лінії`
  MODIFY `Код_лінії` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `вид_продукції`
--
ALTER TABLE `вид_продукції`
  MODIFY `Код_виду_продукції` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `вид_сировини`
--
ALTER TABLE `вид_сировини`
  MODIFY `Код_виду_сировини` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `змінний_журнал`
--
ALTER TABLE `змінний_журнал`
  MODIFY `Код_норми_виготовлення_продукції` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `заявка_на_виробництво`
--
ALTER TABLE `заявка_на_виробництво`
  MODIFY `Код_заявки` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `сировина`
--
ALTER TABLE `сировина`
  MODIFY `Код_сировини` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `пакувальні_машини_лінії`
--
ALTER TABLE `пакувальні_машини_лінії`
  ADD CONSTRAINT `пакувальні_машини_лінії_ibfk_1` FOREIGN KEY (`Код_лінії`) REFERENCES `автоматизовані_лінії` (`Код_лінії`),
  ADD CONSTRAINT `пакувальні_машини_лінії_ibfk_2` FOREIGN KEY (`Код_пакувальної_машини`) REFERENCES `пакувальні_машини` (`Код_пакувальної_машини`);

--
-- Ограничения внешнего ключа таблицы `продукція`
--
ALTER TABLE `продукція`
  ADD CONSTRAINT `продукція_ibfk_1` FOREIGN KEY (`Код_виду_продукції`) REFERENCES `вид_продукції` (`Код_виду_продукції`);

--
-- Ограничения внешнего ключа таблицы `автоматизовані_лінії`
--
ALTER TABLE `автоматизовані_лінії`
  ADD CONSTRAINT `автоматизовані_лінії_ibfk_1` FOREIGN KEY (`Код_використання`) REFERENCES `пакувальні_машини_лінії` (`Код_використання`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `змінний_журнал`
--
ALTER TABLE `змінний_журнал`
  ADD CONSTRAINT `змінний_журнал_ibfk_1` FOREIGN KEY (`Код_продукції`) REFERENCES `продукція` (`Код_продукції`) ON UPDATE CASCADE,
  ADD CONSTRAINT `змінний_журнал_ibfk_2` FOREIGN KEY (`Код_лінії`) REFERENCES `автоматизовані_лінії` (`Код_лінії`),
  ADD CONSTRAINT `змінний_журнал_ibfk_3` FOREIGN KEY (`Код_сировини`) REFERENCES `сировина` (`Код_сировини`);

--
-- Ограничения внешнего ключа таблицы `заявка_на_виробництво`
--
ALTER TABLE `заявка_на_виробництво`
  ADD CONSTRAINT `заявка_на_виробництво_ibfk_1` FOREIGN KEY (`Код_продукції`) REFERENCES `продукція` (`Код_продукції`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `сировина`
--
ALTER TABLE `сировина`
  ADD CONSTRAINT `сировина_ibfk_1` FOREIGN KEY (`Код_виду_сировини`) REFERENCES `вид_сировини` (`Код_виду_сировини`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
