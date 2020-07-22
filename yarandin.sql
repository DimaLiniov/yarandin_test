-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 22 2020 г., 19:56
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yarandin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_21_094952_create_project_table', 2),
(5, '2020_07_21_100203_create_task_table', 3),
(6, '2020_07_22_140350_alter_table_users', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'Сделать тестовое задание', 'Система для ведения учета задач по проекту', '2020-07-23', NULL, '2020-07-22 07:15:35'),
(5, 'test', 'test', '2020-08-08', '2020-07-22 08:41:48', '2020-07-22 11:38:54');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('set','work','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set',
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `name`, `status`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Сделать авторизацию', 'done', 'task/MnNjwRU0u1FPmqFXHon2tqK60CNQnHbrgYVjE7Wt.svg', NULL, '2020-07-22 07:56:59'),
(6, 1, 'test', 'set', 'task/6Ixy6hjDLGE4cEWKJs5TjkBDxVsld69qffgr2fqs.pdf', '2020-07-22 07:19:30', '2020-07-22 07:57:20'),
(7, 5, 'test', 'set', NULL, '2020-07-22 08:47:59', '2020-07-22 08:47:59');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Dima', 'dimalinyov@gmail.com', NULL, '$2y$10$UCjBr.aUqJcGjDKney80IO.tFfvk0PUIdLa4WlWAd3zMlO4k0SbBm', NULL, '2020-07-21 06:12:14', '2020-07-21 06:12:14', 1),
(2, 'Mike', 'mike@gmail.com', NULL, '$2y$10$mE5no6dWjVK0B1Cmv/RaZuJDQialkzyuwCh1GD3w9Fl7lkf7d9wNu', NULL, '2020-07-22 08:14:43', '2020-07-22 08:14:43', 1),
(3, 'PHub12jyvb', 'iehBmR8MGr@gmail.com', NULL, '$2y$10$ufdjFIZ1IW81kebvnx1eGerfMLmstXX1nm3qYphK61h.ZLGHRpF8a', NULL, NULL, NULL, 0),
(4, 'unJ99CzXmt', 'qsS8hQarx0@gmail.com', NULL, '$2y$10$d0sFKq4Oq4ZAuGIXL4RUHeQfpgiA3TAXuumLE8.jjSFV5eOfATntW', NULL, NULL, NULL, 0),
(5, '4MdCrDTI82', 'xRAxHF9YQo@gmail.com', NULL, '$2y$10$zTGPR4kPkH9Bl8/AYXe4tuW8jL9Kcj3FLMqWSjz1TEnYDPSNcZMOa', NULL, NULL, NULL, 0),
(6, 'CNjCyLkIpX', 'lF4JntAaXV@gmail.com', NULL, '$2y$10$aMFmz091ml1ZL00Q3xJVkO2oammOtPdcpmUgea7vHndcy/E7Qyjc6', NULL, NULL, NULL, 0),
(7, 'Bohdan', 'bohdan@ukr.net', NULL, '$2y$10$UcoPfJLu3cc5e/ZRYRxy9u2DlJ7n175Mh64VHMgrzd9E0IYT7s2d2', NULL, '2020-07-22 11:26:00', '2020-07-22 11:26:00', 0),
(8, 'Admin', 'admin@ukr.net', NULL, '$2y$10$5/5Krv0kCI19KMN85bnGR.hbJXCGegWgJtr7dQicNukIX5W9MnYem', NULL, '2020-07-22 11:31:05', '2020-07-22 11:31:05', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
