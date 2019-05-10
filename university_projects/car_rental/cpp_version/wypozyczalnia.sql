CREATE DATABASE  IF NOT EXISTS `wypozyczalnia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wypozyczalnia`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: wypozyczalnia
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `productionYear` int(11) NOT NULL,
  `milleage` varchar(45) NOT NULL,
  `capacity` varchar(45) NOT NULL,
  `powerhorse` int(11) NOT NULL,
  `fuelType` varchar(45) NOT NULL,
  `gearboxType` varchar(45) NOT NULL,
  `numberPlate` varchar(45) NOT NULL,
  `isRented` tinyint(4) NOT NULL,
  `inOffer` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`carID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Toyota','Corolla',2016,'30205','1,6',130,'benzyna','manualna','ABCDE123',0,0),(2,'Lexus','GS450h',2016,'300000','3,5',350,'benzyna','automatyczna','WI1234',0,0),(3,'Alfa Romeo','TS',1998,'120000','1,6',120,'benzyna','manualna','PN12345',0,0),(11,'Toyota','Yaris',2000,'180000','1',70,'benzyna 95','automatyczna','WI98765',0,0),(12,'Ford','Mustang',2017,'30','5,5',550,'benzyna 98','automatyczna','POMUSTANG',0,0),(26,'Aston Martin','DB9',2017,'15000','4,5',470,'benzyna 98','automatyczna','WIASTON',0,0),(27,'Mercedes','SLS',2018,'5','5,5',650,'benzyna 98','automatyczna','POMERC',0,0);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `phoneNo` varchar(45) NOT NULL,
  `idCard` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`clientID`),
  UNIQUE KEY `clientID_UNIQUE` (`clientID`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,' ',' ',' ',' ','admin','admin',' '),(8,'Wiktor','Pieklik','123456789','rcv12345hf2','wygryw667','wygryw667','wiktor.pieklik@icloud.com'),(9,'Cecylia','Kubczak','123456789','rcb12hf','knedix','knedix','cecylia.kubczak@gmail.com'),(17,'Aleksander','Wielki','129876453','CCV16543HF','olek','olek','aleksander.macedonski@starozytnosc.com'),(19,'Jan','Kowalski','987650432','rfh123cvg21','jan','jan','jan.kowalski@onet.pl'),(20,'Maciej','Walczak','123098321','abc12egfh23','maciek','maciek','maciej.walczak@o2.pl');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offers` (
  `offerID` int(11) NOT NULL AUTO_INCREMENT,
  `carID` int(11) NOT NULL,
  `offerPrice` varchar(45) NOT NULL,
  `available` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`offerID`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `dateOfPurchase` varchar(45) NOT NULL,
  `dateOfReturn` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `discount` varchar(45) NOT NULL,
  `discountGranted` tinyint(4) NOT NULL DEFAULT '1',
  `carID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-16 22:36:49
