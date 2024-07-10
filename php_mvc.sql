-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 05 feb 2024 om 09:30
-- Serverversie: 5.7.39
-- PHP-versie: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_mvc`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`author`, `content`, `id`, `datum`, `slug`, `title`) VALUES
('tijmen hullegie', 'ik weet niet wat ik hier moet neer zetten', 1, '2024-01-22', 'weetniet', 'ik weet het niet'),
('tijmen hullegie', 'dit is een test', 2, '2024-02-05', 'test', 'test'),
('milan hulskers', 'Als de zon opkomt, gaan de hanen \"kukelukuuu\" zeggen.', 3, '2024-01-22', 'zon', 'de zon'),
('timmahh', 'Hallo Tijmen,\r\n\r\nMijn naam is Tim, en ik moest hier wat neer zetten.\r\n\r\nvriendelijke groet uit,\r\nVjenne', 4, '2024-02-05', 'tijmen', 'Tijmwn');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `rol` enum('gebruiker','admin') NOT NULL DEFAULT 'gebruiker',
  `email` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `authorName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`rol`, `email`, `name`, `authorName`, `password`, `userid`) VALUES
('gebruiker', 'tijmenhullegie@gmail.com', 'Tijmen Hullegie', 'tijmen hullegie', '$2y$10$FZCo1Wj4mWXXLsVRRS702eAqg6fSe5imHzG1lNGeGt/T4QNIuh3ii', 1),
('admin', 'admin@gmail.com', 'admin', 'admin', '$2y$10$bl/zteWyGZ1G7SqiX1RZA.QKAQzQFtWgxA7DLNxZSZ7ACOLPzaoVO', 2),
('gebruiker', 'timmieoudeavenhuis@gmail.com', 'Tim', 'timmahh', '$2y$10$JO.Cfy98KuH3BW6N5an8wenD.0dxz8UjG2EfHjZbGJSiILDX4ZAka', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
