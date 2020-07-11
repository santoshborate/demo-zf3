-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: zf_assignment
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.16.04.1

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
-- Table structure for table `router`
--

DROP TABLE IF EXISTS `router`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `router` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sapid` varchar(18) NOT NULL,
  `hostname` varchar(50) NOT NULL,
  `loopback` varchar(20) NOT NULL,
  `macaddress` varchar(50) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `router`
--

LOCK TABLES `router` WRITE;
/*!40000 ALTER TABLE `router` DISABLE KEYS */;
INSERT INTO `router` VALUES (1,'1234','https://www.google.com','216.58.217.196','6e:00:a8:4a:98:01',0),(3,'4567','https://www.gmail.com','98.137.246.8','6e:00:a8:4a:98:03',0),(4,'1234','https://www.twitter.com','89.89.67.89','6e:00:a8:4a:98:03',1),(5,'1323','https://test.com','67.78.98.89','6e:00:a8:4a:98:01',0),(15,'123','https://test.com','67.78.98.90','6e:00:a8:4a:98:01',0),(16,'4545','https://docs.google.com/','67.78.98.89','6e:00:a8:4a:98:01',0),(17,'34343','https://docs.zendframework.com/','67.78.98.89','6e:00:a8:4a:98:01',0),(18,'56456','https://zendframework.com/','67.78.98.89','6e:00:a8:4a:98:01',0),(19,'34234','https://magento.com','67.78.98.89','6e:00:a8:4a:98:01',0),(20,'12123','https://test.com','67.78.98.89','6e:00:a8:4a:98:01',0),(21,'34234','https://mail.google.com/','67.78.98.23','6e:00:a8:4a:98:01',0),(22,'3434','https://olegkrivtsov.github.io/','67.78.98.45','6e:00:a8:4a:98:01',0);
/*!40000 ALTER TABLE `router` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-11 14:24:17
