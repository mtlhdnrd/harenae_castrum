-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 08:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harenae_castrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `species` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `residency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `name`, `species`, `birthplace`, `residency`) VALUES
('helyi alkesz', 'Dávid', 'Humanoid', 'Budapest', 'Szendehely'),
('idcorrupt', 'Katona Bálint', 'weeb', 'budapest', 'dunakeszi'),
('nerd', 'pék', 'nerd', 'korhaz', 'despawnol');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `ID` int(11) NOT NULL,
  `date_recorded` varchar(19) NOT NULL,
  `date_of_journey` varchar(19) NOT NULL,
  `price` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `number_of_passangers` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planet`
--

CREATE TABLE `planet` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hostility` int(11) NOT NULL DEFAULT 0,
  `landable` bit(1) NOT NULL DEFAULT b'0',
  `price` int(11) NOT NULL,
  `infopanel` varchar(100) NOT NULL,
  `wideimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `planet`
--

INSERT INTO `planet` (`ID`, `name`, `image`, `description`, `hostility`, `landable`, `price`, `infopanel`, `wideimage`) VALUES
(5, 'Venus', 'venus_min_00000.png', 'Csomagolja kameráját, és látogassa meg a Vénuszi Vadvilágot! Ismert, kedvelt látványosság, ahol a fotós lehetőségei a végtelen felé közelednek!', 2, b'1', 5000, 'venus_infopanel_00000.png', 'venus_00000.png'),
(6, 'Crystallis', 'crystallis_min_00000.png', 'Egy bolyó-méretű szellemváros, amely arra készteti az egyént, hogy újragondolja a háború fogalmát, miközben az áldozatok rideg, drágakövekbe fagyott tekintetükkel vizslatják a betolakodót.', 2, b'1', 2000, 'crystallis_infopanel_00000.png', 'crystallis_00000.png'),
(7, 'Edax Carnium', 'edax_min_00000.png', 'Mi történik, ha az egyén feldühíti a bolygót, amin áll? A bolygó bosszút áll, az egyén eltűnik.\r\n', 5, b'0', 15000, 'edax_infopanel_00000.png', 'edax_00000.png'),
(8, 'Jupiter', 'jupiter_min_00000.png', 'Fedezze fel a legújabb bányászati technológiát a tett helyszínén! Közvetlen belátást nyerhet a termelés legmodernebb, leghatékonyabb módjára, amelyet az ott dolgozók részletesen bemutatnak.\r\n', 0, b'1', 1000, 'jupiter_infopanel_00000.png', 'jupiter_00000.png'),
(9, 'Mars', 'mars_min_00000.png', 'Ismerjen meg egy kultúrát, mely ugyan a Földéhez hasonló alapokkal rendelkezik, a kultúrfa minden ágán különbözik ősétől.\r\n', 2, b'1', 4000, 'mars_infopanel_00000.png', 'mars_00000.png'),
(10, 'Mercury', 'mercury_min_00000.png', 'A brutális életkörülmények, ellenséges környezet és kemény munka megtestesülése. A Merkúr embere az életet egy magasabb nehézségi fokon játssza, a külső szemlélővel azonban mindig közvetlen, derűs hangulatot teremt.\r\n', 4, b'1', 7500, 'mercury_infopanel_00000.png', 'mercury_00000.png'),
(11, 'Saturn', 'saturn_min_00000.png', 'Ismerjen meg egy kultúrát, mely ugyan a Földéhez hasonló alapokkal rendelkezik, a kultúrfa minden ágán különbözik ősétől.\r\n', 0, b'1', 50000, 'saturn_infopanel_00000.png', 'saturn_00000.png'),
(12, 'Viverium', 'viverium_min_00000.png', 'Az arachnophobia megtestesülése. Itt szembesülhet egy olyan világgal, amelyben csak rovarok, bogarak élnek, otthont adva több méteres, de akár egy-két milliméteres pókoknak is.', 5, b'0', 30000, 'viverium_infopanel_00000.png', 'viverium_00000.png'),
(13, 'Earth', 'earth_min_00000.png', 'A terraformáló titánok ősatyja, a bolygó, ahonnan naprendszert meghódító Homo sapiens származik. Többmillió éves hagyományok, és egy sokat megélt, tapasztalt társadalom. ', 3, b'1', 4000, 'earth_infopanel_00000.png', 'earth_00000.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `from` (`from`),
  ADD KEY `to` (`to`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `planet`
--
ALTER TABLE `planet`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planet`
--
ALTER TABLE `planet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journey`
--
ALTER TABLE `journey`
  ADD CONSTRAINT `journey_ibfk_1` FOREIGN KEY (`from`) REFERENCES `planet` (`ID`),
  ADD CONSTRAINT `journey_ibfk_2` FOREIGN KEY (`to`) REFERENCES `planet` (`ID`),
  ADD CONSTRAINT `journey_ibfk_3` FOREIGN KEY (`customer`) REFERENCES `customer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
