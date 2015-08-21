-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Czas generowania: 21 Sie 2015, 14:47
-- Wersja serwera: 5.5.42
-- Wersja PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projectPlanner`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fos_users`
--

CREATE TABLE `fos_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `fos_users`
--

INSERT INTO `fos_users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `description`) VALUES
(1, 'Michal', 'michal', 'kfiatos@gmail.com', 'kfiatos@gmail.com', 1, 'jvft650xs4ggcsog80ck8oowo0cg848', '$2y$13$jvft650xs4ggcsog80ck8eBcFtm2f3Rmh396sE1SLCtFrt3624VhK', '2015-08-21 10:24:53', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:16:"ROLE_SUPER_ADMIN";i:1;s:10:"ROLE_ADMIN";}', 0, NULL, ''),
(2, 'hubert', 'hubert', 'hubert@gmail.com', 'hubert@gmail.com', 1, 'k8huq7veu684c8o0gsg8w8s4gwwgwkw', '$2y$13$k8huq7veu684c8o0gsg8wuJyA0cAwgzlQ42KH5RWZy1PEdDZlB62y', '2015-08-21 10:48:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL),
(3, 'rysiek', 'rysiek', 'rysiek@rysike.com', 'rysiek@rysike.com', 1, '95xfd1vd0d0cogkocwk4cw8ww0kg0kc', '$2y$13$95xfd1vd0d0cogkocwk4cuZ/UvYACaEZt5DZ8FFUJ6BFHuqV1j1rC', '2015-08-21 14:02:32', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `started` datetime NOT NULL,
  `resolved_at` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `issues`
--

INSERT INTO `issues` (`id`, `name`, `description`, `started`, `resolved_at`, `status`, `project_id`) VALUES
(1, 'ds', 'ds', '2010-01-01 00:00:00', '2010-01-01 00:00:00', '0', 1),
(2, 'Zadanie 2', 'opis do zadania 2', '2010-01-01 00:00:00', '2017-01-01 00:00:00', 'początek', 1),
(3, 'Zadanie 2 projekt1', 'opis', '2010-01-01 00:00:00', '2017-01-01 00:00:00', 'new', 1),
(6, 'Zadanie 2 projekt 2', '2/2', '2010-01-01 00:00:00', '2016-01-01 00:00:00', 'new', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `members_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `bug_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `members_id`, `deadline`, `bug_id`, `status`, `comments_id`) VALUES
(1, 'Project 1', 'opis projektu jeden', 1, '2016-01-01', NULL, NULL, 1),
(2, 'Projekt 2', 'Opis projektu 2', 1, '2017-04-01', NULL, NULL, 1),
(3, 'Projekt 3', 'Opis proj 3', 2, '2017-01-01', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `project_user`
--

CREATE TABLE `project_user` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `project_user`
--

INSERT INTO `project_user` (`project_id`, `user_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_projects`
--

CREATE TABLE `users_projects` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fos_users`
--
ALTER TABLE `fos_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_32427CF792FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_32427CF7A0D96FBF` (`email_canonical`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DA7D7F83166D1F9C` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `IDX_B4021E51166D1F9C` (`project_id`),
  ADD KEY `IDX_B4021E51A76ED395` (`user_id`);

--
-- Indexes for table `users_projects`
--
ALTER TABLE `users_projects`
  ADD PRIMARY KEY (`user_id`,`project_id`),
  ADD KEY `IDX_27D2987EA76ED395` (`user_id`),
  ADD KEY `IDX_27D2987E166D1F9C` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `fos_users`
--
ALTER TABLE `fos_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `FK_DA7D7F83166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Ograniczenia dla tabeli `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `FK_B4021E51166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B4021E51A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `users_projects`
--
ALTER TABLE `users_projects`
  ADD CONSTRAINT `FK_27D2987E166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_27D2987EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
