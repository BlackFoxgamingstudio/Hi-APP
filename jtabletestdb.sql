-- MySQL dump 10.13  Distrib 5.1.46, for Win64 (unknown)
--
-- Host: localhost    Database: jtabletestdb2
-- ------------------------------------------------------
-- Server version	5.1.46-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `jtabletestdb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `jtabletestdb2` /*!40100 DEFAULT CHARACTER SET latin5 */;

USE `jtabletestdb2`;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `PersonId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `HomeLocationName` varchar(45),
  `Name` varchar(45),
  `Age` int(10) unsigned,
  `HomeItem` varchar(45),
  `ItemDescription` varchar(45),
  `ItemRoom` varchar(45),
  `DrawerNum` varchar(45),
  `RecordDate` datetime NOT NULL,
  PRIMARY KEY (`PersonId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1, 'NC APT', 'Russell Powers', 30, 'hat', 'the coolest', 'LR', 'six', '2011-12-27 00:00:00'),(2, 'NC APT', 'nat Powers', 2, 'hat', 'the coolest', 'LR', 'six', '2011-12-27 00:00:00'),(3, 'DM House', 'Andrew Powers', 28, 'hat', 'the coolest', 'LR', 'six', '2011-12-27 00:00:00'),(4, 'DM house', 'Adam Powers', 28, 'hat', 'the coolest', 'LR', 'six', '2011-12-27 00:00:00'),(5, 'Normandy Park 1', 'Glenn Powers', 59, 'hat', 'the coolest', 'LR', 'six', '2011-12-27 00:00:00');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-01-03 23:06:11
