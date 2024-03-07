-- MariaDB dump 10.19-11.3.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: harenae_castrum
-- ------------------------------------------------------
-- Server version	11.3.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `ID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `species` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `residency` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES
('helyi alkesz','Dávid','Humanoid','Budapest','Szendehely'),
('idcorrupt','Katona Bálint','weeb','budapest','dunakeszi'),
('nerd','pék','nerd','korhaz','despawnol');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journey`
--

DROP TABLE IF EXISTS `journey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journey` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date_recorded` varchar(19) NOT NULL,
  `date_of_journey` varchar(19) NOT NULL,
  `price` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `number_of_passangers` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `from` (`from`),
  KEY `to` (`to`),
  KEY `customer` (`customer`),
  CONSTRAINT `journey_ibfk_1` FOREIGN KEY (`from`) REFERENCES `planet` (`ID`),
  CONSTRAINT `journey_ibfk_2` FOREIGN KEY (`to`) REFERENCES `planet` (`ID`),
  CONSTRAINT `journey_ibfk_3` FOREIGN KEY (`customer`) REFERENCES `customer` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journey`
--

LOCK TABLES `journey` WRITE;
/*!40000 ALTER TABLE `journey` DISABLE KEYS */;
/*!40000 ALTER TABLE `journey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planet`
--

DROP TABLE IF EXISTS `planet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hostility` int(11) NOT NULL DEFAULT 0,
  `landable` bit(1) NOT NULL DEFAULT b'0',
  `price` int(11) NOT NULL,
  `infopanel` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planet`
--

LOCK TABLES `planet` WRITE;
/*!40000 ALTER TABLE `planet` DISABLE KEYS */;
INSERT INTO `planet` VALUES
(5,'Venus','venus_min_00000.png','Csomagolja kameráját, és látogassa meg a Vénuszi Vadvilágot! Ismert, kedvelt látványosság, ahol a fotós lehetőségei a végtelen felé közelednek!',2,'',5000,'venus_infopanel_00000.png'),
(6,'Crystallis','crystallis_min_00000.png','Egy bolygó-méretű szellemváros, amely arra készteti az egyént, hogy újragondolja a háború fogalmát, miközben az áldozatok rideg, drágakövekbe fagyott tekintetükkel vizslatják a betolakodót.',2,'',2000,'crystallis_infopanel_00000.png'),
(7,'Edax Carnium','edax_min_00000.png','Mi történik, ha az egyén feldühíti a bolygót, amin áll? A bolygó bosszút áll, az egyén eltűnik.',5,'\0',15000,'edax_infopanel_00000.png'),
(8,'Jupiter','jupiter_min_00000.png','Fedezze fel a legújabb bányászati technológiát a tett helyszínén! Közvetlen belátást nyerhet a termelés legmodernebb, leghatékonyabb módjára, amelyet az ott dolgozók részletesen bemutatnak.',0,'',1000,'jupiter_infopanel_00000.png'),
(9,'Mars','mars_min_00000.png','Ismerjen meg egy kultúrát, mely ugyan a Földéhez hasonló alapokkal rendelkezik, a kultúrfa minden ágán különbözik ősétől.',2,'',4000,'mars_infopanel_00000.png'),
(10,'Mercury','mercury_min_00000.png','A brutális életkörülmények, ellenséges környezet és kemény munka megtestesülése. A Merkúr embere az életet egy magasabb nehézségi fokon játssza, mégis egy könnyed, boldog társadalmat tudnak felmutatni, ahova bekerülve az ember nem is sejtené, mennyit szenvednek.',4,'',7500,'mercury_infopanel_00000.png'),
(11,'Saturn','saturn_min_00000.png','Játsszon univerzum legismertebb szórakozóhelyei, fogadjon a legendás Saturn Eight körversenyre, vegyen részt a fényűzés létrájának legmagasabb fokain!',0,'',50000,'saturn_infopanel_00000.png'),
(12,'Viverium','viverium_min_00000.png','Az arachnophobia megtestesülése. Itt szembesülhet egy olyan világgal, amelyben csak rovarok, bogarak élnek, otthont adva több méteres, de akár egy-két milliméteres pókoknak is.',5,'\0',30000,'viverium_infopanel_00000.png');
/*!40000 ALTER TABLE `planet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-07 13:26:53
