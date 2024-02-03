-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: food
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `company_name`
--

DROP TABLE IF EXISTS `company_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_name` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gcash_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gcash_number` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `e_payment` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_name`
--

LOCK TABLES `company_name` WRITE;
/*!40000 ALTER TABLE `company_name` DISABLE KEYS */;
INSERT INTO `company_name` VALUES (1,'ok','Pedro Pendokoss','093612345621','Gcash '),(3,'','Juan Tamad','093612345621','Paymaya'),(5,'','Fj torres','0812312432','VISA');
/*!40000 ALTER TABLE `company_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messagein`
--

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcategory` (
  `CATEGID` int NOT NULL AUTO_INCREMENT,
  `CATEGORIES` varchar(255) NOT NULL,
  `USERID` int NOT NULL,
  PRIMARY KEY (`CATEGID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategory`
--

LOCK TABLES `tblcategory` WRITE;
/*!40000 ALTER TABLE `tblcategory` DISABLE KEYS */;
INSERT INTO `tblcategory` VALUES (5,'Dinner',0),(11,'Lunch',0),(12,'Snacks',0),(13,'Desserts',0),(21,'Street Foods',0),(22,'Appetizers',0),(23,'Japanese Food',0),(24,'Drinks',0),(25,'Korean Food',0);
/*!40000 ALTER TABLE `tblcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomer` (
  `CUSTOMERID` int NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `CUSHOMENUM` varchar(90) DEFAULT NULL,
  `STREETADD` text,
  `BRGYADD` text,
  `CITYADD` text,
  `PROVINCE` varchar(80) DEFAULT NULL,
  `COUNTRY` varchar(30) DEFAULT NULL,
  `DBIRTH` date DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAILADD` varchar(40) DEFAULT NULL,
  `ZIPCODE` int DEFAULT NULL,
  `CUSUNAME` varchar(255) DEFAULT NULL,
  `CUSPASS` varchar(90) DEFAULT NULL,
  `CUSPHOTO` varchar(255) DEFAULT NULL,
  `TERMS` tinyint DEFAULT NULL,
  `DATEJOIN` date DEFAULT NULL,
  `status` int DEFAULT NULL,
  `is_validate_email` int DEFAULT '0',
  PRIMARY KEY (`CUSTOMERID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomer`
--

LOCK TABLES `tblcustomer` WRITE;
/*!40000 ALTER TABLE `tblcustomer` DISABLE KEYS */;
INSERT INTO `tblcustomer` VALUES (15,'Leoanardo','la','','','','','BSIT -1C','','','0000-00-00','Male','09321321321','',0,'leo','fc2bd766b60116ff825c647020ba0b5f6844c4fc','customer_image/girl.png',1,'2022-11-12',0,0),(16,'Fernando ','Torres','','','','','Tarlac','','','0000-00-00','Male','09150022123','',0,'fj1','fc2bd766b60116ff825c647020ba0b5f6844c4fc','',1,'2023-12-30',0,0),(31,'FJ','FJ',NULL,NULL,NULL,NULL,'Iligan CIty',NULL,NULL,NULL,'Male','09755983121',NULL,NULL,'fjclient2022@gmail.com','6266aa7cb5ebba01768bd0501606f8b7ba92df8a',NULL,1,'2024-02-02',NULL,1),(32,'MARVIN','VILLANEA',NULL,NULL,NULL,NULL,'Iligan CIty',NULL,NULL,NULL,'Male','09755983121',NULL,NULL,'marvinvillanea1@gmail.com','6266aa7cb5ebba01768bd0501606f8b7ba92df8a',NULL,1,'2024-02-02',NULL,1);
/*!40000 ALTER TABLE `tblcustomer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblorder`
--

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproduct` (
  `PROID` int NOT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `INGREDIENTS` varchar(255) NOT NULL,
  `PROQTY` int DEFAULT NULL,
  `ORIGINALPRICE` double NOT NULL,
  `PROPRICE` double DEFAULT NULL,
  `CATEGID` int DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `OWNERNAME` varchar(90) NOT NULL,
  `OWNERPHONE` varchar(90) NOT NULL,
  `M` int NOT NULL,
  `T` int NOT NULL,
  `W` int NOT NULL,
  `TH` int NOT NULL,
  `F` int NOT NULL,
  `ST` int NOT NULL,
  `SU` int NOT NULL,
  PRIMARY KEY (`PROID`),
  KEY `CATEGID` (`CATEGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproduct`
--

LOCK TABLES `tblproduct` WRITE;
/*!40000 ALTER TABLE `tblproduct` DISABLE KEYS */;
INSERT INTO `tblproduct` VALUES (201739,'4Color Menâ€²S Denim Pants STRETCHABLE Skinny Black/Blue','',5,250,289,18,'uploaded_photos/jeans.jpg','Available','janobe','',1,0,0,0,0,0,0),(201740,'SIMPLE Fashion Men`S Casual T Shirt Short Sleeve Round neck Top','',1,100,149,18,'uploaded_photos/shirt.jpg','Available','janobe','',0,0,0,0,0,0,0),(201741,'ICM #T146 BESTSELLER TOPS TSHIRT FOR MEN','',4,50,89,18,'uploaded_photos/shirt2.jpg','Available','janobe','',0,0,0,0,0,0,0),(201742,'CJY-001 Coat Rack Creative Simple CoatRack Bedroom Wardrobe (Gray)','',4,250,287,14,'uploaded_photos/bed.jpeg','Available','janobe','',0,0,0,0,0,0,0),(201745,'Bacon-and-Kimchi Burgers                                                                                                              ','',0,110,110,12,'uploaded_photos/burger2.jpg','Available','Mark','09066985387',1,1,0,1,0,0,0),(201747,'Detroit-Style Pan Pizza                                                                                                                                    ','',15,150,150,12,'uploaded_photos/pizza.jpg','Available','Mark','09123456789',1,1,1,1,1,1,1),(201751,'Triple Cheese Overload                                            ','',1,50,50,12,'uploaded_photos/che.jpg','Available','Mark','09123456789',1,0,0,0,0,0,0),(201752,'Chicken Inasal with extra 2 rice                                                                                                                                    ','',0,150,150,11,'uploaded_photos/chicken-inasal-640.jpg','Available','Mark','09123456789',1,0,1,0,0,0,0),(201754,'Sweet Spain Adobong Baboy                                                                                                                                                                                                                                      ','',0,150,150,5,'uploaded_photos/Pork Adobo.png','Available','Mark','09123456789',1,1,1,1,1,1,1),(201755,'Coke                                                                                        ','',0,30,30,24,'uploaded_photos/coke.jpeg','Available','Mark','09123456789',1,1,1,1,1,1,1),(201757,'Special Fruit Salad                                            ','',26,65,65,13,'uploaded_photos/Ambrosia-Salad-IG.jpg','Available','Mark','09123456789',1,0,0,0,0,0,0),(201758,'5 pieces Spicy Siomai                                            ','',20,35,35,21,'uploaded_photos/lutong-bahay-recipe-pork-siomai-1200x892.jpg','Available','Mark','09123456789',1,1,1,1,1,1,1),(201760,'Pork Spagitte with hotdog my tommy                                            ','',0,150,150,5,'uploaded_photos/beef.jpg','Available','Mark','09361776112',1,0,1,1,1,0,0);
/*!40000 ALTER TABLE `tblproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpromopro`
--

DROP TABLE IF EXISTS `tblpromopro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpromopro` (
  `PROMOID` int NOT NULL AUTO_INCREMENT,
  `PROID` int NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint NOT NULL,
  `PRONEW` tinyint NOT NULL,
  `DT_XPRD_DISCOUNT` varchar(500) NOT NULL,
  PRIMARY KEY (`PROMOID`),
  UNIQUE KEY `PROID` (`PROID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpromopro`
--

LOCK TABLES `tblpromopro` WRITE;
/*!40000 ALTER TABLE `tblpromopro` DISABLE KEYS */;
INSERT INTO `tblpromopro` VALUES (3,201739,0,289,0,0,''),(4,201740,0,149,0,0,''),(5,201741,0,89,0,0,''),(6,201742,0,287,0,0,''),(9,201745,10,99,1,0,'September 26, 2022 20:37'),(11,201747,10,135,1,0,'November 30, 2022 11:28'),(15,201751,10,45,1,0,'November 30, 2022 11:47'),(16,201752,0,150,0,0,''),(18,201754,10,135,1,0,'November 30, 2022 15:00'),(19,201755,0,30,1,0,''),(21,201757,0,65,0,0,''),(22,201758,0,35,0,0,''),(24,201760,0,150,0,0,'');
/*!40000 ALTER TABLE `tblpromopro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsetting`
--

DROP TABLE IF EXISTS `tblsetting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsetting` (
  `SETTINGID` int NOT NULL AUTO_INCREMENT,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL,
  PRIMARY KEY (`SETTINGID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsetting`
--

LOCK TABLES `tblsetting` WRITE;
/*!40000 ALTER TABLE `tblsetting` DISABLE KEYS */;
INSERT INTO `tblsetting` VALUES (1,'Bagasawe','Brgy. 1',100),(2,'Putat','Brgy. 2',70),(4,'Apalan','Brgy. 3',50),(5,'Daan Lungsod','Brgy. 4',50),(6,'Carmelo','Brgy. 5',50),(7,'San Juan','Brgy. 6',60),(8,'Cogon','Brgy. 7',65),(9,'Tominjao','Brgy. 9',40);
/*!40000 ALTER TABLE `tblsetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstockin`
--

DROP TABLE IF EXISTS `tblstockin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstockin` (
  `STOCKINID` int NOT NULL AUTO_INCREMENT,
  `STOCKDATE` datetime DEFAULT NULL,
  `PROID` int DEFAULT NULL,
  `STOCKQTY` int DEFAULT NULL,
  `STOCKPRICE` double DEFAULT NULL,
  `USERID` int DEFAULT NULL,
  PRIMARY KEY (`STOCKINID`),
  KEY `PROID` (`PROID`,`USERID`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstockin`
--

LOCK TABLES `tblstockin` WRITE;
/*!40000 ALTER TABLE `tblstockin` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstockin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsummary`
--
