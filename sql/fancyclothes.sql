-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 06 2019 kl. 09:25:46
-- Serverversion: 10.1.40-MariaDB
-- PHP-version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fancyclothes`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `categories`
--

INSERT INTO `categories` (`categoryId`, `category`) VALUES
(1, 'Jakker'),
(2, 'Bukser'),
(3, 'Skjorter'),
(4, 'Strik'),
(5, 'T-shirts & Tank tops'),
(6, 'Tasker'),
(7, 'Sko');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `productId` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `imgUrl` varchar(50) NOT NULL,
  `imgAlt` varchar(50) NOT NULL,
  `date` int(10) NOT NULL,
  `text` varchar(750) NOT NULL,
  `userId` int(3) NOT NULL,
  `stars` int(1) NOT NULL,
  `categoryId` int(2) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`productId`, `title`, `imgUrl`, `imgAlt`, `date`, `text`, `userId`, `stars`, `categoryId`, `price`) VALUES
(1, 'Lækker læderjakke', 'læderjakke.jpg', 'Lækker læderjakke', 1561452251, 'Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha\'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.', 1, 3, 1, 199.95),
(2, 'Bean Boots', 'beanboots.jpg', 'Bean Boots', 1561462120, 'Bean Boots Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate reiciendis repudiandae fugiat placeat aspernatur sunt ea, eos sapiente! Aperiam alias architecto, atque rem repudiandae molestias commodi enim blanditiis optio est?', 1, 4, 7, 299.00),
(4, 'Jessie Skjorte', 'jessie-skjorte.jpg', 'Jessie Skjorte', 1561467326, 'Oxford-skjorte i økologisk bomuld med klassisk krave og knaplukning. Lange ærmer med knapper ved ærmeafslutningen. Figursyet og normal pasform. ', 3, 2, 3, 159.00);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userId` int(3) NOT NULL,
  `dbUsername` varchar(30) NOT NULL,
  `dbEmail` varchar(255) NOT NULL,
  `dbPassword` varchar(255) NOT NULL,
  `accessLevel` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userId`, `dbUsername`, `dbEmail`, `dbPassword`, `accessLevel`) VALUES
(1, 'nicklas', 'nicklas@mail.dk', 'nicklas', 1),
(2, 'level2', 'level2@mail.dk', 'level2', 2),
(3, 'level3', 'level3@mail.dk', 'level3', 3),
(4, 'asd', 'asd@123.dk', '123', 3);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
