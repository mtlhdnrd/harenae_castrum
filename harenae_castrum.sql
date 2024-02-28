-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Feb 15. 12:28
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `harenae_castrum`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customer`
--

CREATE TABLE `customer` (
  `ID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `species` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `residency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `customer`
--

INSERT INTO `customer` (`ID`, `name`, `species`, `birthplace`, `residency`) VALUES
('helyi alkesz', 'Dávid', 'Humanoid', 'Budapest', 'Szendehely'),
('idcorrupt', 'Katona Bálint', 'weeb', 'budapest', 'dunakeszi'),
('nerd', 'pék', 'nerd', 'korhaz', 'despawnol');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `journeys`
--

CREATE TABLE `journeys` (
  `ID` int(11) NOT NULL,
  `date_recorded` varchar(19) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'0',
  `date_of_journey` varchar(19) NOT NULL,
  `price` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `planet`
--

CREATE TABLE `planet` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hostility` int(11) NOT NULL DEFAULT 1,
  `landable` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `journeys`
--
ALTER TABLE `journeys`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `from` (`from`),
  ADD KEY `to` (`to`),
  ADD KEY `customer` (`customer`);

--
-- A tábla indexei `planet`
--
ALTER TABLE `planet`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `journeys`
--
ALTER TABLE `journeys`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `planet`
--
ALTER TABLE `planet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `journeys`
--
ALTER TABLE `journeys`
  ADD CONSTRAINT `journeys_ibfk_1` FOREIGN KEY (`from`) REFERENCES `planet` (`ID`),
  ADD CONSTRAINT `journeys_ibfk_2` FOREIGN KEY (`to`) REFERENCES `planet` (`ID`),
  ADD CONSTRAINT `journeys_ibfk_3` FOREIGN KEY (`customer`) REFERENCES `customer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
