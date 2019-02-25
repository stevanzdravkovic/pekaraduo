-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 05:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pekara`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_anketa` int(11) NOT NULL,
  `opis` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `opis`, `bod`) VALUES
(1, '1-5', 1),
(2, '5-10', 6);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `pol` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `uloga_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `ime`, `prezime`, `lozinka`, `email`, `pol`, `uloga_id`) VALUES
(10, 'Pile', 'Pilic', '425db0c444e763b61ebb9116c7140955', 'Pile@gmail.com', 'muski', 2),
(11, 'Misa', 'Misic', 'fc5ef89938ad050b7c83a472f0987704', 'Misa@gmail.com', 'muski', 2),
(12, 'Admin1', 'Admin1', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Admin1@gmail.com', 'muski', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `meni_id` int(3) NOT NULL,
  `meni_ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`meni_id`, `meni_ime`, `link`) VALUES
(1, 'Početna', 'index.php'),
(2, 'Galerija', 'galerija.php'),
(3, 'Vas nalog', 'user.php'),
(4, 'O nama', 'onama.php'),
(5, 'Kontakt', 'kontakt.php'),
(6, 'Anketa', 'anketa.php'),
(7, 'Registracija', 'registracija.php'),
(8, 'Prijava', 'logovanje.php'),
(9, 'Odjava', 'logout.php'),
(10, 'Admin', 'admin.php'),
(11, 'O autoru', 'oAutoru.php'),
(12, 'Brisanja slika', 'admin_brisanje.php'),
(13, 'Dodavanje slika', 'admin_dodaj.php'),
(14, 'Promena podataka', 'admin_promena.php'),
(15, 'Sitemap', 'sitemap.xml'),
(16, 'Dokumentacija', 'dokumentacija.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `peciva`
--

CREATE TABLE `peciva` (
  `id_peciva` int(11) NOT NULL,
  `ime_peciva` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(4) NOT NULL,
  `popust` int(4) NOT NULL,
  `putanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `peciva`
--

INSERT INTO `peciva` (`id_peciva`, `ime_peciva`, `cena`, `popust`, `putanja`) VALUES
(2, 'Kroasan', 65, 45, 'slike/kroasan.png'),
(3, 'Kroasan dzem', 100, 50, 'slike/kroasanDzem.png'),
(4, 'Pogača', 45, 30, 'slike/pogaca.jpg'),
(5, 'pogačice', 25, 10, 'slike/pogacice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id_slike` int(11) NOT NULL,
  `putanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id_slike`, `putanja`, `alt`) VALUES
(1, 'slike/slajd3.jpg', 'slide1'),
(2, 'slike/slajd4.jpg', 'slide2'),
(3, 'slike/slajd5.jpg', 'slide3'),
(4, 'slike/pekaralogo.jpg', 'logo'),
(5, 'slike/jaja.jpg', 'Autor');

-- --------------------------------------------------------

--
-- Table structure for table `ulga`
--

CREATE TABLE `ulga` (
  `id_uloga` int(3) NOT NULL,
  `naziv_uloga` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ulga`
--

INSERT INTO `ulga` (`id_uloga`, `naziv_uloga`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`meni_id`);

--
-- Indexes for table `peciva`
--
ALTER TABLE `peciva`
  ADD PRIMARY KEY (`id_peciva`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id_slike`);

--
-- Indexes for table `ulga`
--
ALTER TABLE `ulga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_anketa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `meni_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `peciva`
--
ALTER TABLE `peciva`
  MODIFY `id_peciva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id_slike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ulga`
--
ALTER TABLE `ulga`
  MODIFY `id_uloga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
