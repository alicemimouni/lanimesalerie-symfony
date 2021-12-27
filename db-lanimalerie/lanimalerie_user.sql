-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: lanimalerie
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telNumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isMan` tinyint(1) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `idaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@admin.com','[\"ROLE_ADMIN\"]','$2y$13$X8cRdN/Cad/yLWSnOVG8vuLGCNs2VsMFto36wUqaApRLu4P6h7qZS',NULL,NULL,NULL,NULL,NULL,NULL),(2,'denis.laurent@live.com','[]',';do[u+,WcXVw)XS',NULL,NULL,NULL,NULL,NULL,NULL),(3,'daniel.denise@gmail.com','[]','pkts4h(+\'!9,|o@',NULL,NULL,NULL,NULL,NULL,NULL),(4,'jacob.mathilde@free.fr','[]','7<Ye#u7|:F[',NULL,NULL,NULL,NULL,NULL,NULL),(5,'simone.petit@noos.fr','[]','ReL\"o3^Z{.pGAU5',NULL,NULL,NULL,NULL,NULL,NULL),(6,'hortense95@yahoo.fr','[]','Os$rj&^zx54sj',NULL,NULL,NULL,NULL,NULL,NULL),(7,'henriette.lemonnier@hotmail.fr','[]','A6UeVi08\"SF_',NULL,NULL,NULL,NULL,NULL,NULL),(8,'pineau.edouard@gmail.com','[]','2HX(GDDU.N%j',NULL,NULL,NULL,NULL,NULL,NULL),(9,'thomas89@gmail.com','[]','qk?L:F69B4QYWq5',NULL,NULL,NULL,NULL,NULL,NULL),(10,'suzanne68@hotmail.fr','[]','G}1$\'Lh>1I<B',NULL,NULL,NULL,NULL,NULL,NULL),(11,'legros.xavier@free.fr','[]','+33S>|DLvqM',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-24 12:01:50
