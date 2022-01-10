-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: animalerie
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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complement` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=364 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (41,'77, boulevard de Evrard',NULL,'06 372','Zimbabwe'),(42,'7, rue de Charles',NULL,'85 464','Zaïre'),(43,'2, chemin Maryse Brunet',NULL,'00283','Antarctique'),(44,'22, avenue Marechal',NULL,'95300','Russie'),(45,'81, place de Gillet',NULL,'22 570','Gabon'),(46,'53, rue Emmanuel Jacques',NULL,'07391','Italie'),(47,'686, rue Pascal',NULL,'16417','Bolivie'),(48,'47, rue de Perrier',NULL,'71375','Malawi'),(49,'553, chemin Christophe Camus',NULL,'19188','Chine (Rép. pop.)'),(50,'718, boulevard Le Goff',NULL,'83170','Wallis et Futuna (Îles)'),(361,'57, rue Hector Berlioz',NULL,'42210','Saint André le Puy'),(362,'57 rue de la chance','Porte 154','37120','Tours'),(363,'fghtjklkm','d','sdfg','qsdf');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Foxy'),(2,'SweetyCat'),(3,'FishyLife'),(4,'Dogy'),(5,'BirdyFree');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `cart_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BA388B7A76ED395` (`user_id`),
  CONSTRAINT `FK_BA388B7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19C1727ACA70` (`parent_id`),
  CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (0,NULL,''),(41,NULL,'Chat'),(42,NULL,'Chien'),(43,NULL,'Poisson'),(44,NULL,'Rongeur'),(45,NULL,'Oiseau'),(47,42,'Accessoires'),(48,41,'Accessoires'),(49,43,'Accessoires'),(50,44,'Accessoires'),(51,45,'Accessoires'),(52,42,'Alimentation'),(53,41,'Alimentation'),(54,43,'Alimentation'),(55,44,'Alimentation'),(56,45,'Alimentation');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20211026125850','2021-10-26 12:58:59',1726),('DoctrineMigrations\\Version20211027103102','2021-10-27 10:31:17',723),('DoctrineMigrations\\Version20211028101941','2021-10-28 10:19:58',382),('DoctrineMigrations\\Version20211031152251','2021-10-31 15:23:03',796),('DoctrineMigrations\\Version20211031153604','2021-10-31 15:36:14',591),('DoctrineMigrations\\Version20211119093131','2021-11-19 09:32:08',434),('DoctrineMigrations\\Version20211119124615','2021-11-19 12:46:23',494),('DoctrineMigrations\\Version20211119132022','2021-11-19 13:20:28',103),('DoctrineMigrations\\Version20211119134205','2021-11-19 13:42:13',462),('DoctrineMigrations\\Version20211229145807','2021-12-29 14:58:27',767),('DoctrineMigrations\\Version20220103100457','2022-01-03 10:05:09',298);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C53D045F12469DE2` (`category_id`),
  KEY `IDX_C53D045F4584665A` (`product_id`),
  CONSTRAINT `FK_C53D045F12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_C53D045F4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (181,NULL,111,'sac-foin-bamby-lapin-rongeur.png','Sac à foin pour rongeur'),(182,NULL,112,'arbre-a-chat-case-cube-bois.png','Arbre à chat avec cubes en bois'),(183,NULL,113,'niche-chien-interieur-boby.png','Niche d\'intérieur en bois pour chien Boby'),(184,NULL,114,'mini-aquarium-poisson-boule.jpg','Aquarium boule pour poisson Nemo'),(185,NULL,115,'panier-chien-plastique-luxe.jpg','Panier pour chien de luxe en plastique transparent'),(186,NULL,116,'suspension-balancoire-oiseau-bois.jpg','Balançoire pour oiseau en bois'),(187,NULL,117,'panier-chat-osier-tendance.jpg','Panier tendance en osier pour chat'),(188,NULL,118,'mangeoire-pour-oiseau-design-blanc.jpg','Mangeoire pour oiseaux design blanc'),(189,47,NULL,'accessoires-pour-chien.jpg','Accessoires pour chiens'),(190,48,NULL,'accessoires-pour-chat.jpg','Accessoires pour chats'),(191,50,NULL,'accessoires-pour-rongeur.jpg','Accessoires pour rongeurs'),(192,49,NULL,'accessoires-pour-poisson.jpg','Accessoires pour poissons'),(193,51,NULL,'accessoires-pour-oiseau.jpg','Accessoires pour oiseaux'),(194,52,NULL,'alimentation-pour-chien.jpg','Alimentation pour chiens'),(195,53,NULL,'alimentation-pour-chat.jpg','Alimentation pour chats'),(196,55,NULL,'alimentation-pour-rongeur.jpg','Alimentation pour rongeurs'),(197,56,NULL,'alimentation-pour-oiseau.jpg','Alimentation pour oiseaux'),(198,54,NULL,'alimentation-pour-poisson.jpg','Alimentation pour poissons');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meanspayment`
--

DROP TABLE IF EXISTS `meanspayment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meanspayment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meanspayment`
--

LOCK TABLES `meanspayment` WRITE;
/*!40000 ALTER TABLE `meanspayment` DISABLE KEYS */;
/*!40000 ALTER TABLE `meanspayment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva_rate_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `state_id` int NOT NULL,
  `means_payment_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F52993981AD5CDBF` (`cart_id`),
  KEY `IDX_F529939838C0512E` (`tva_rate_id`),
  KEY `IDX_F52993985D83CC1` (`state_id`),
  KEY `IDX_F529939817157679` (`means_payment_id`),
  CONSTRAINT `FK_F529939817157679` FOREIGN KEY (`means_payment_id`) REFERENCES `meanspayment` (`id`),
  CONSTRAINT `FK_F52993981AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  CONSTRAINT `FK_F529939838C0512E` FOREIGN KEY (`tva_rate_id`) REFERENCES `tva_rate` (`id`),
  CONSTRAINT `FK_F52993985D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `reference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOnSale` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD44F5D008` (`brand_id`),
  CONSTRAINT `FK_D34A04AD44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (111,1,'Sac à foin Bamby',23.99,'RONACC0001','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'2021-11-19','2026-11-30',NULL),(112,2,'Arbre à chat Case',79.99,'CHAACC0001','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'0000-00-00',NULL,NULL),(113,NULL,'Niche d\'intérieur Bobby',109.99,'CHIACC0001','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'2021-11-19','0000-00-00',NULL),(114,3,'Aquarium boule Nemo',49.99,'POIACC0001','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'2021-12-27',NULL,NULL),(115,4,'Panier de  luxe César',72.99,'CHIACC0002','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'2021-12-28',NULL,NULL),(116,5,'Balançoire en bois Coco',18.99,'OISACC0001','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'2021-12-28',NULL,NULL),(117,2,'Panier chat Charly',57.99,'CHAACC0002','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'2021-12-29',NULL,NULL),(118,5,'Mangeoire Picoli',16.99,'OISACC0002','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'2022-01-03',NULL,9.99);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `IDX_CDFC73564584665A` (`product_id`),
  KEY `IDX_CDFC735612469DE2` (`category_id`),
  CONSTRAINT `FK_CDFC735612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_CDFC73564584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (111,44),(111,50),(112,41),(112,48),(113,42),(113,47),(114,43),(114,49),(115,42),(115,47),(116,45),(116,51),(117,41),(117,48),(118,45),(118,51);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` VALUES (5,'Chien',42),(6,'Chat',21);
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tva_rate`
--

DROP TABLE IF EXISTS `tva_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tva_rate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rate` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tva_rate`
--

LOCK TABLES `tva_rate` WRITE;
/*!40000 ALTER TABLE `tva_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `tva_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address_id` int DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telNumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isMan` tinyint(1) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `registrer_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D649F5B7AF75` (`address_id`),
  CONSTRAINT `FK_8D93D649F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (14,NULL,'admin@admin.com','[\"ROLE_ADMIN\"]','$2y$13$fnPGmksezd2n75yE2zhZm.PehMYy/jx21CHcj.PfaM10R9lcT/TGO','Richardeau','Alice','07 82 26 19 53',0,'1984-11-25','2021-11-23'),(15,NULL,'bernard62@laposte.net','[]','tTD4nZSa3t',NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,'omenard@orange.fr','[]','Z#4f,A,gnSFp',NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,'dominique98@laposte.net','[]','U_,;/]egWt=)4N',NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,'tbruneau@wanadoo.fr','[]','xvZ\'[/M`z^3^qa',NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,'delattre.philippe@gmail.com','[]','a\'&_@c*_9TOZj',NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,'naubert@dbmail.com','[]','fNM;!_J~?L+av',NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,'cpoulain@laposte.net','[]','NYVCI=cd\\=z',NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,'gabriel84@gmail.com','[]','I|zPtoVb/\"F#Y',NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,'raymond.traore@tele2.fr','[]','Z~Ut0Ile)P+y3',NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,'honore86@tele2.fr','[]',':B1Zc=b6[6j',NULL,NULL,NULL,NULL,NULL,NULL),(213,361,'alicerichardeau@outlook.com','[\"ROLE_USER\"]','$2y$13$iVtk6BTWPbsHG1pcpXuDKuCyx/ekwcxVgzH/TQ/AkDgQTnk4dBsum','Mimouni','Alice','0782261953',0,'1984-11-25','2021-12-29'),(214,362,'jeanrenard@live.fr','[]','$2y$13$KFQc7gT8.iM5A90eVqRyaOGBOn6WltIUuZOsYWZbDVrFc/zsuSJLm','Jean','Renard','07 34 34 23 14',1,'1978-01-01',NULL);
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

-- Dump completed on 2022-01-09  9:42:15
