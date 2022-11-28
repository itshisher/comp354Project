-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: bookappdb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `state` text NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'Through the Looking-Glass','Lewis Carroll','20','Alice again enters a fantastical world, this time by climbing through a mirror into the world that she can see beyond it. There she finds that, just like a reflection, everything is reversed, including logic.','../IMG/book1.jpg','novel','True'),(2,'The Lost City','Jos. E. Badge','38','A Tale of Deadly Obsession in the Amazon is the debut non-fiction book by American author David Grann.','../IMG/book2.jpg','history','True'),(3,'I am Glad My Mom Died','Jennette McCurdy','40','A heartbreaking and hilarious memoir by iCarly and Sam & Cat star Jennette McCurdy about her struggles as a former child actor—including eating disorders, addiction, and a complicated relationship with her overbearing mother—and how she retook control of ','../IMG/book3.jpg','science','True'),(4,'It Ends with Us','Colleen Hoover','88','Sometimes it is the one who loves you who hurts you the most.','../IMG/book4.jpg','history','True'),(5,'Where the Crawdads Sing','Delia Owens','38','The first timeline describes the life and adventures of a young girl named Kya as she grows up isolated in the marshes of North Carolina. The second timeline follows an investigation into the apparent murder of Chase Andrews, a local celebrity of Barkley.','../IMG/book5.jpg','novel','True'),(6,'Under the Magnolias','T.I. Lowe','69','Austin Foster is barely a teenager when her mama dies giving birth to twins, leaving her to pick up the pieces','../IMG/book6.jpg','history','True'),(7,'The Kilteegan Bridge Story','Jean Grainge','78','For eighteen year old Lena Sullivan, life is predictable and dull. A future of hard work, marriage to a local boy','../IMG/book7.jpg','novel','True'),(8,'The Five Wishes of Mr. Murray McBride','Joe Siple','28','With all his family and friends gone, one-hundred-year-old Murray McBride is looking for a reason to live. ','../IMG/book8.jpg','science','True'),(9,'The Nurse is Secret','Amanda Skenandore','1','Based on Florence Nightingale’s nursing principles, Bellevue is the first school of its kind in the country. Where once nurses were assumed to be ignorant and unskilled, Bellevue prizes discipline, intellect, and moral character, and only young women.','../IMG/book9.jpg','science','True'),(10,'The Beach House','Rachel Hanna','18','\"Mary Alice Monroe is helping to redefine the beauty and magic of the Carolina Lowcountry. Every book she has written has felt like a homecoming to me.\" —Pat Conroy','../IMG/book10.jpg','novel','True');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `records` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(32) DEFAULT 'none',
  `state` varchar(32) DEFAULT 'none',
  `bid` varchar(32) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES (51,'123456','reading','7'),(50,'123456','reading','6'),(49,'123456','toread','5'),(48,'123456','read','4'),(46,'123456','favorite','2'),(52,'123456','reading','3'),(53,'123456','nofinish','9'),(56,'45611','reading','2'),(55,'45611','reading','3'),(107,'ca_ya','toread','3'),(100,'user123','reading','4'),(133,'user123','toread','5'),(130,'user123','unfavorite','6'),(63,'user123','reading','3'),(110,'ca_ya','toread','2'),(109,'ca_ya','nofinish','3'),(106,'ca_ya','favorite','2'),(99,'user123','reading','2'),(124,'caoyangtommy@hotmail.com','reading','2'),(125,'caoyangtommy@hotmail.com','reading','3'),(128,'user123','unfavorite','3'),(82,'user123','toread','4'),(131,'user123','unfavorite','6'),(129,'user123','unfavorite','3'),(101,'user123','toread','6'),(102,'user123','reading','6'),(126,'ca_ya','reading','4'),(127,'itshisher','reading','2'),(132,'user123','favorite','2'),(136,'1111','read','2');
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT 'none',
  `password` varchar(32) DEFAULT 'none',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'123456','123456'),(9,'45611','123456'),(10,'12345611','123456'),(11,'user123','123456'),(12,'caoyangtommy@hotmail.com','123'),(13,'ca_ya','123'),(14,'itshisher','123'),(15,'1111','111');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bookappdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-28 15:38:24
