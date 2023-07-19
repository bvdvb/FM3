CREATE DATABASE  IF NOT EXISTS `fm3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fm3`;
-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: fm3
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

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
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agendaeventdatefrom` datetime NOT NULL,
  `agendaeventdateto` datetime NOT NULL,
  `agendaopm` varchar(500) DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_agenda_user_create_idx` (`created_by_userid`),
  KEY `fk_agenda_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_agenda_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_agenda_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agendauserkruis`
--

DROP TABLE IF EXISTS `agendauserkruis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendauserkruis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agendaid` int NOT NULL,
  `agendauserid` int NOT NULL,
  `herstelid` int DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_agenda_user_create_idx` (`created_by_userid`),
  KEY `fk_agenda_user_update_idx` (`updated_by_userid`),
  KEY `fk_agendauserkruis_user_eventuser_idx` (`agendauserid`),
  KEY `fk_agendauserkruis_event_agendaid_idx` (`agendaid`),
  KEY `fk_agendauserkruis_1_idx` (`herstelid`),
  CONSTRAINT `fk_agendauserkruis_1` FOREIGN KEY (`herstelid`) REFERENCES `herstelling` (`id`),
  CONSTRAINT `fk_agendauserkruis_event_agendaid` FOREIGN KEY (`agendaid`) REFERENCES `agenda` (`id`),
  CONSTRAINT `fk_agendauserkruis_user_agendauser` FOREIGN KEY (`agendauserid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_agendauserkruis_user_create0` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_agendauserkruis_user_update0` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bestelling`
--

DROP TABLE IF EXISTS `bestelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bestelling` (
  `id` int NOT NULL AUTO_INCREMENT,
  `besteltekst` text,
  `bestelstatus` int DEFAULT NULL,
  `bestelinvoegdate` date DEFAULT NULL,
  `bestelbesteldate` date DEFAULT NULL,
  `bestelafleverdate` date DEFAULT NULL,
  `besteluser` int DEFAULT NULL,
  `herstellingid` int DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_bestelling_user_create_idx` (`created_by_userid`),
  KEY `fk_bestelling_user_update_idx` (`updated_by_userid`),
  KEY `fk_bestelling_herstelid_idx` (`herstellingid`),
  CONSTRAINT `fk_bestelling_herstelid` FOREIGN KEY (`herstellingid`) REFERENCES `herstelling` (`id`),
  CONSTRAINT `fk_bestelling_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_bestelling_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gemeente`
--

DROP TABLE IF EXISTS `gemeente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gemeente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_gemeente_user_create_idx` (`created_by_userid`),
  KEY `fk_gemeente_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_gemeente_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_gemeente_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `herstelling`
--

DROP TABLE IF EXISTS `herstelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `herstelling` (
  `id` int NOT NULL AUTO_INCREMENT,
  `klantid` int NOT NULL,
  `typeid` int DEFAULT NULL,
  `defectid` int DEFAULT NULL,
  `defectomschr` text,
  `serienr` varchar(255) DEFAULT NULL,
  `ophalen` int DEFAULT NULL COMMENT '0 - niet ophalen\\n1 - wel ophalen',
  `volnazicht` int DEFAULT NULL COMMENT '0 - geen volledig nazicht\\n1 - wel volledig nazicht',
  `reservetoestid` int DEFAULT NULL,
  `beschadigingomschr` text,
  `eigentoest` int DEFAULT NULL,
  `prijsofferte` int DEFAULT NULL COMMENT '0 - geen prijsofferte maken\\n1 - wel prijsofferte maken',
  `voorschot` varchar(100) DEFAULT NULL,
  `opverdieping` int DEFAULT NULL COMMENT '0 - op gelijkvloers\\n1 - op verdieping',
  `prijsofferteprijs` varchar(45) DEFAULT NULL COMMENT 'Prijs van de prijsofferte',
  `consultatieomschrijving` varchar(255) DEFAULT NULL,
  `totaleprijs` varchar(45) DEFAULT NULL COMMENT 'afrekenprijs',
  `betaalwijze` varchar(45) DEFAULT NULL COMMENT '0\\n1\\n2\\n3\\n4\\n5\\n6',
  `ontvangen` varchar(45) DEFAULT NULL COMMENT 'Bedrag dat men cash heeft ontvangen',
  `inleveringsdatum` date DEFAULT NULL,
  `werkhuisdatum` date DEFAULT NULL,
  `levdat` datetime DEFAULT NULL,
  `garantietype` varchar(45) DEFAULT NULL,
  `garantieinsertdate` date DEFAULT NULL,
  `garantieupdatetype` varchar(45) DEFAULT NULL,
  `garantieupdatedate` date DEFAULT NULL,
  `garantieopmerkingen` text,
  `garantiesendtolevdate` date DEFAULT NULL,
  `jongens_insertid` int DEFAULT NULL,
  `jongens_herstelid` int DEFAULT NULL,
  `jongensverzendupdate` int DEFAULT NULL,
  `jongensarterugupdate` int DEFAULT NULL,
  `jongensafhalenupdate` int DEFAULT NULL,
  `herstelopmerkingen` text,
  `herstellingagendatype` int DEFAULT NULL COMMENT '0 --> herstelling\n1 --> herstelling ter plaatse\n2 --> levering',
  `verdieping` int DEFAULT NULL COMMENT '0 -> gelijkvloers\n1 -> op verdiep\n',
  `aantalpersonenlevering` int DEFAULT NULL COMMENT 'hoeveel personen zijn er nodig voor de herstelling/levering',
  `herstellingbelangrijk` text,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_herstelling_klant_idx` (`klantid`),
  KEY `fk_herstelling_type_idx` (`typeid`),
  KEY `fk_herstelling_jongens_insert_idx` (`jongens_insertid`),
  KEY `fk_herstelling_jongens_verzendupdate_idx` (`jongensverzendupdate`),
  KEY `fk_herstelling_jongens_herstel_idx` (`jongens_herstelid`),
  KEY `fk_herstelling_jongens_artterug_idx` (`jongensarterugupdate`),
  KEY `fk_herstelling_jongens_afhalen_idx` (`jongensafhalenupdate`),
  KEY `fk_herstelling_create_idx` (`created_by_userid`),
  KEY `fk_herstelling_update_idx` (`updated_by_userid`),
  KEY `fk_herstelling_reservetoestel` (`reservetoestid`),
  CONSTRAINT `fk_herstelling_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_herstelling_klant` FOREIGN KEY (`klantid`) REFERENCES `klant` (`klantid`) ON DELETE CASCADE,
  CONSTRAINT `fk_herstelling_kruistypemerk` FOREIGN KEY (`typeid`) REFERENCES `kruistypemerktoestel` (`id`),
  CONSTRAINT `fk_herstelling_reservetoestel` FOREIGN KEY (`reservetoestid`) REFERENCES `reservetoestel` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_herstelling_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_herstelling_user_afhalen` FOREIGN KEY (`jongensafhalenupdate`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_herstelling_user_art_terug` FOREIGN KEY (`jongensarterugupdate`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_herstelling_user_herstel` FOREIGN KEY (`jongens_herstelid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_herstelling_user_insert` FOREIGN KEY (`jongens_insertid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_herstelling_user_verzend` FOREIGN KEY (`jongensverzendupdate`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klant` (
  `klantid` int NOT NULL AUTO_INCREMENT,
  `klantnaam` varchar(100) DEFAULT NULL,
  `straat` varchar(100) DEFAULT NULL,
  `nr` varchar(100) DEFAULT NULL,
  `gemeenid` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `klantopmerkingen` varchar(255) DEFAULT NULL,
  `created_by_userid` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by_userid` int NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`klantid`),
  KEY `fk_klant_1_idx` (`gemeenid`),
  KEY `fk_klant_user_create_idx` (`created_by_userid`),
  KEY `fk_klant_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_klant_gemeente` FOREIGN KEY (`gemeenid`) REFERENCES `gemeente` (`id`) ON UPDATE RESTRICT,
  CONSTRAINT `fk_klant_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_klant_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kleurcode`
--

DROP TABLE IF EXISTS `kleurcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kleurcode` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kleur` varchar(45) DEFAULT NULL,
  `useridint` int DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_kleurcode_1_idx` (`useridint`),
  CONSTRAINT `fk_kleurcode_1` FOREIGN KEY (`useridint`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kruistypemerktoestel`
--

DROP TABLE IF EXISTS `kruistypemerktoestel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kruistypemerktoestel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kruistypeid` int NOT NULL,
  `kruismerkid` int NOT NULL,
  `kruisttoestelid` int NOT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_kruistypemerktoestel_user_create_idx` (`created_by_userid`),
  KEY `fk_kruistypemerktoestel_user_update_idx` (`updated_by_userid`),
  KEY `fk_kruistypemerktoestel_merk_idx` (`kruismerkid`),
  KEY `fk_kruistypemerktoestel_toestel_idx` (`kruisttoestelid`),
  KEY `fk_kruistypemerktoestel_type_idx` (`kruistypeid`),
  CONSTRAINT `fk_kruistypemerktoestel_merk` FOREIGN KEY (`kruismerkid`) REFERENCES `merk` (`id`),
  CONSTRAINT `fk_kruistypemerktoestel_toestel` FOREIGN KEY (`kruisttoestelid`) REFERENCES `toestel` (`id`),
  CONSTRAINT `fk_kruistypemerktoestel_type` FOREIGN KEY (`kruistypeid`) REFERENCES `type` (`id`),
  CONSTRAINT `fk_kruistypemerktoestel_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_kruistypemerktoestel_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language` (
  `language_id` varchar(5) NOT NULL,
  `language` varchar(3) NOT NULL,
  `country` varchar(3) NOT NULL,
  `name` varchar(32) NOT NULL,
  `name_ascii` varchar(32) NOT NULL,
  `status` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `language_source`
--

DROP TABLE IF EXISTS `language_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language_source` (
  `id` int NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `language_translate`
--

DROP TABLE IF EXISTS `language_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language_translate` (
  `id` int NOT NULL,
  `language` varchar(5) NOT NULL,
  `translation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `idgesch` int NOT NULL AUTO_INCREMENT,
  `geschwhatend` varchar(45) DEFAULT NULL COMMENT 'from what side of the application\nBackend/frontend',
  `geschcontroller` varchar(45) DEFAULT NULL,
  `geschaction` varchar(45) DEFAULT NULL,
  `geschkortomschrijving` varchar(255) DEFAULT NULL,
  `geschalerttype` int DEFAULT NULL COMMENT '0--> error\n1-> succes\n',
  `geschextratekst` varchar(255) DEFAULT NULL,
  `geschparams` longtext,
  `geschrelatedkeys` varchar(500) DEFAULT NULL,
  `created_by_userid` int DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int DEFAULT '1',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `geschiedenisherstelid` int DEFAULT NULL,
  PRIMARY KEY (`idgesch`),
  KEY `fk_gesch_create_user_idx` (`created_by_userid`),
  KEY `fk_gesch_update_user_idx` (`updated_by_userid`),
  KEY `fk_geschiedenis_herstelid_idx` (`geschiedenisherstelid`),
  CONSTRAINT `fk_gesch_create_user` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_gesch_update_user` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_geschiedenis_herstelid` FOREIGN KEY (`geschiedenisherstelid`) REFERENCES `herstelling` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merk`
--

DROP TABLE IF EXISTS `merk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `merknaam` varchar(100) DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_merk_user_create_idx` (`created_by_userid`),
  KEY `fk_merk_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_merk_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_merk_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reparatie`
--

DROP TABLE IF EXISTS `reparatie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reparatie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reparatienaam` varchar(255) DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_reparatie_user_add_idx` (`created_by_userid`),
  KEY `fk_reparatie_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_reparatie_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_reparatie_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reservetoestel`
--

DROP TABLE IF EXISTS `reservetoestel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservetoestel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservetoestelmerk` int DEFAULT NULL,
  `reservetoesteltype` int NOT NULL,
  `reservetoestelnummer` varchar(45) DEFAULT NULL,
  `reservetoestelomschrijving` varchar(500) DEFAULT NULL,
  `reserveuitleenaan` int DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_reservetoestel_type_idx` (`reservetoesteltype`),
  KEY `fk_reservetoestel_create_idx` (`created_by_userid`),
  KEY `fk_reservetoestel_update_idx` (`updated_by_userid`),
  KEY `fk_reservetoestel_1_idx` (`reservetoestelmerk`),
  KEY `fk_reservetoestel_3_idx` (`reserveuitleenaan`),
  CONSTRAINT `fk_reservetoestel_1` FOREIGN KEY (`reservetoestelmerk`) REFERENCES `merk` (`id`),
  CONSTRAINT `fk_reservetoestel_2` FOREIGN KEY (`reservetoesteltype`) REFERENCES `toestel` (`id`),
  CONSTRAINT `fk_reservetoestel_3` FOREIGN KEY (`reserveuitleenaan`) REFERENCES `klant` (`klantid`),
  CONSTRAINT `fk_reservetoestel_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_reservetoestel_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `toestel`
--

DROP TABLE IF EXISTS `toestel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `toestel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `toestelnaam` varchar(100) DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_toestel_user_create_idx` (`created_by_userid`),
  KEY `fk_toestel_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_toestel_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_toestel_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_type_user_create_idx` (`created_by_userid`),
  KEY `fk_type_user_update_idx` (`updated_by_userid`),
  CONSTRAINT `fk_type_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_type_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usergroep`
--

DROP TABLE IF EXISTS `usergroep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usergroep` (
  `idusergroep` int NOT NULL AUTO_INCREMENT,
  `usergroepnaam` varchar(45) NOT NULL,
  `usergroepvolgorde` int DEFAULT NULL,
  `created_by_userid` int DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int DEFAULT '1',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusergroep`),
  UNIQUE KEY `idusergroep_UNIQUE` (`idusergroep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usergroepuserkruis`
--

DROP TABLE IF EXISTS `usergroepuserkruis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usergroepuserkruis` (
  `idusergroepuserkruis` int NOT NULL AUTO_INCREMENT,
  `usergroepuseruserid` int NOT NULL,
  `usergroepusergroepid` int NOT NULL,
  `created_by_userid` int DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int DEFAULT '1',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusergroepuserkruis`),
  UNIQUE KEY `idusergroepuserkruis_UNIQUE` (`idusergroepuserkruis`),
  KEY `fk_usergroepuserkruis_1_idx` (`usergroepuseruserid`),
  KEY `fk_usergroepuserkruis_2_idx` (`usergroepusergroepid`),
  CONSTRAINT `fk_usergroepuserkruis_groep` FOREIGN KEY (`usergroepusergroepid`) REFERENCES `usergroep` (`idusergroep`),
  CONSTRAINT `fk_usergroepuserkruis_user` FOREIGN KEY (`usergroepuseruserid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `verlof`
--

DROP TABLE IF EXISTS `verlof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verlof` (
  `id` int NOT NULL AUTO_INCREMENT,
  `verlofwie` int DEFAULT NULL,
  `verlofstart` datetime DEFAULT NULL,
  `verlofeind` datetime DEFAULT NULL,
  `verlofgoedkeuring_userid` int DEFAULT NULL,
  `verlofgoedkeuring` int DEFAULT NULL,
  `verlofextrainfo` longtext,
  `verlofextrainforeply` longtext,
  `created_by_userid` int NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by_userid` int NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_verlof_user_insert_idx` (`created_by_userid`),
  KEY `fk_verlof_user_update_idx` (`updated_by_userid`),
  KEY `fk_verlof_user_goedkeuring_idx` (`verlofgoedkeuring_userid`),
  CONSTRAINT `fk_verlof_user_create` FOREIGN KEY (`created_by_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_verlof_user_goedkeuring` FOREIGN KEY (`verlofgoedkeuring_userid`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_verlof_user_update` FOREIGN KEY (`updated_by_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-19 22:42:12
