-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 29 2017 г., 15:41
-- Версия сервера: 5.6.34
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dates`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1511865506),
('user', '2', 1511865506);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1511865506, 1511865506),
('delete', 2, NULL, NULL, NULL, 1511865506, 1511865506),
('edit', 2, 'Edit', NULL, NULL, 1511865506, 1511865506),
('index', 2, 'Index view', NULL, NULL, 1511865506, 1511865506),
('user', 1, NULL, NULL, NULL, 1511865506, 1511865506),
('view', 2, 'View', NULL, NULL, 1511865506, 1511865506);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'delete'),
('admin', 'edit'),
('user', 'edit'),
('admin', 'index'),
('user', 'index'),
('admin', 'view'),
('user', 'view');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `historical_event`
--

CREATE TABLE `historical_event` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `historical_event`
--

INSERT INTO `historical_event` (`id`, `user_ip`, `date_insert`, `date`, `description`) VALUES
(65, '83.237.42.210', '2017-11-29 05:51:03', '1888-11-28', '28 ноября 1880 года родился Александр Блок — один из главных русских символистов Серебряного века.\r\nБлок родился в интеллигентной семье. Отец был весьма видным юристом, дядя по отцовской линии некоторое время занимал должность самарского и гродненского губернатора. Мать — дочь крупного ботаника и ректора Санкт-Петербургского университета Бекетова.'),
(66, '83.237.42.210', '2017-11-29 05:51:54', '2017-11-24', '24 ноября 1730 года родился Александр Васильевич Суворов — самый знаменитый и успешный русский полководец. Единственный русский генералиссимус, получивший это звание исключительно благодаря победам на полях сражений, а не придворным интригам. Последний генералиссимус в истории Российской Империи.'),
(67, '83.237.42.210', '2017-11-29 05:53:01', '2017-11-22', '22 ноября 1801 года родился Владимир Даль — знаменитый русский лингвист и врач, более всего известный благодаря своему монументальному Толковому словарю великорусского языка.'),
(68, '83.237.42.210', '2017-11-29 05:54:08', '1864-11-20', '20 ноября 1864 года император Александр II утвердил новые Судебные уставы. Началась судебная реформа — одна из самых значимых и успешных реформ этого императора, создавшая в Российской Империи новую и прекрасно работающую систему правосудия.'),
(69, '83.237.42.210', '2017-11-29 05:55:50', '1821-11-11', '11 ноября 1821 года родился Федор Достоевский — гений русской литературы и один из самых значимых мировых писателей.'),
(70, '83.237.42.210', '2017-11-29 06:01:44', '1747-09-16', '16 сентября 1747 года родился Михаил Голенищев-Кутузов — русский фельдмаршал и главнокомандующий армией в Отечественной войне 1812 года.'),
(71, '83.237.42.210', '2017-11-29 06:03:23', '1812-09-07', '7 сентября 1812 года состоялось Бородинское сражение. Оно поставило новый рекорд кровопролитности среди всех однодневных битв того времени.'),
(73, '83.237.42.210', '2017-11-29 06:06:16', '1895-07-22', '22 июля 1895 года в Российской Империи на свет появился Павел Сухой — знаменитый авиаконструктор, чьи истребители и штурмовики до сих пор составляют основу ВВС России.'),
(74, '83.237.42.210', '2017-11-29 06:08:16', '1696-07-19', '19 июля 1696 года  мы получили выход в Азовское море — сдалась турецкая крепость Азов, что привело к фактическому завершению Второго Азовского похода царя Петра.'),
(75, '83.237.42.210', '2017-11-29 06:09:56', '1712-06-28', '28 июня 1712 года был спущен на воду первый построенный на Адмиралтейской верфи линейный корабль, получивший название «Полтава».'),
(76, '83.237.42.210', '2017-11-29 06:11:22', '1672-06-09', '9 июня 1672 года — день рождения императора Петра I, чье правление кардинально изменило ход развития русского государства на протяжении последующих нескольких веков.'),
(77, '83.237.42.210', '2017-11-29 06:13:18', '1889-05-25', '25 мая 1889 года — день рождения Игоря Сикорского, создателя первых в мире четырехмоторного самолета и вертолета, отец русских бомбардировщиков в частности и вертолетов вообще.'),
(78, '83.237.42.210', '2017-11-29 06:16:25', '1754-05-20', '20 мая 1754 года императрица Елизавета Петровна указом распорядилась организовать в России первый банк, названный Дворянским.'),
(79, '83.237.42.210', '2017-11-29 06:17:25', '1911-05-22', '22 мая 1911 года русский ученый и изобретатель Борис Розинг в своей лаборатории продемонстрировал возможность передачи и приема изображений прибором, ставшим предтечей телевизионного кинескопа.'),
(80, '83.237.42.210', '2017-11-29 06:19:38', '1961-04-12', '12 апреля 1961 года космический корабль «Восток» с русским космонавтом Юрием Гагариным на борту совершил виток вокруг Земли.'),
(81, '83.237.42.210', '2017-11-29 06:20:28', '1809-04-01', '1 апреля 1809 года на свет появился великий русский писатель Николай Гоголь.'),
(82, '83.237.42.210', '2017-11-29 06:21:41', '1872-03-31', '31 марта 1872 года родился Сергей Дягилев — выдающийся русский антрепренер и менеджер, с именем которого неразрывно связана экспансия русской культуры на Запад на излете Прекрасной эпохи.'),
(83, '83.237.42.210', '2017-11-29 06:22:40', '1839-03-21', '21 марта 1839 года — день появления на свет Модеста Мусоргского, одного из самых знаменитых русских композиторов.'),
(84, '83.237.42.210', '2017-11-29 06:24:13', '1834-02-08', '8 февраля 1834 — день рождения Дмитрия Менделеева, самого знаменитого русского химика.'),
(85, '83.237.42.210', '2017-11-29 06:25:30', '1848-01-24', '24 января 1848 года в Красноярске, в семье скромного коллежского регистратора Сурикова, появляется на свет мальчик. Названный Василием, он станет одним из самых знаменитых русских живописцев.'),
(86, '83.237.42.210', '2017-11-29 06:26:51', '1810-11-25', '25 ноября 1810 года родился Николай Пирогов — знаменитый русский хирург и практически отец-основатель военно-полевой хирургии в Российской Империи, впервые широко внедривший в медицинскую практику наркоз и анестезию.');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1511833960),
('m140506_102106_rbac_init', 1511833966),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1511833966);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '1jtEtOQVjnVZ3WqVvJ4SW56Y1OZSKe4V'),
(2, 'user', '827ccb0eea8a706c4c34a16891f84e7b', '8j8yCAse5RBlIz-A_jp8gyC-QbkrGRLq');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `historical_event`
--
ALTER TABLE `historical_event`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `historical_event`
--
ALTER TABLE `historical_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
