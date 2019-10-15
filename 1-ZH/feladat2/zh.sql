-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Már 20. 23:25
-- Kiszolgáló verziója: 10.1.19-MariaDB
-- PHP verzió: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `zh`
--
DROP DATABASE IF EXISTS `zh`;
CREATE DATABASE `zh` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `zh`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hallgatok`
--

DROP TABLE IF EXISTS `hallgatok`;
CREATE TABLE `hallgatok` (
  `sorszam` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `neptun` varchar(6) COLLATE utf8_hungarian_ci NOT NULL,
  `szak` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`sorszam`),
  UNIQUE KEY `neptun` (`neptun`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hallgatok`
--

INSERT INTO `hallgatok` (`sorszam`, `nev`, `neptun`, `szak`) VALUES
(1, 'Kovács Tibor', 'NJE001', 'Informatika'),
(2, 'Tóth Lajos', 'NJE002', 'Informatika'),
(3, 'Kiss László', 'NJE003', 'Informatika');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
