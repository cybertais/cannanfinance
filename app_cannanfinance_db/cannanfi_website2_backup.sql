-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cannanfi_website2
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `agentidpk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personidfk` int(10) unsigned DEFAULT NULL,
  `agentcode` varchar(256) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `datemodified` datetime DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL,
  `provinceid` int(11) DEFAULT NULL,
  PRIMARY KEY (`agentidpk`),
  KEY `conspersonagent` (`personidfk`),
  CONSTRAINT `conspersonagent` FOREIGN KEY (`personidfk`) REFERENCES `peoples` (`persidpk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,2,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',0,23),(2,3,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,26),(3,4,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,27),(4,5,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',0,25),(5,6,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,28),(6,7,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,29),(7,8,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',0,43),(8,9,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,33),(9,10,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,33),(10,11,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,33),(11,12,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,33),(12,13,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,33),(13,14,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,30),(14,15,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,32),(15,16,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(16,17,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(17,18,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(18,19,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(19,20,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(20,21,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(21,22,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(22,23,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(23,24,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(24,25,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(25,26,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,42),(26,27,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,35),(27,28,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,24),(28,29,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,37),(29,30,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,40),(30,31,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,40),(31,32,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,40),(32,33,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,39),(33,34,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,39),(34,35,NULL,'2026-03-30 14:16:13','2026-03-30 14:16:13',1,38);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masterenquiry`
--

DROP TABLE IF EXISTS `masterenquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterenquiry` (
  `masterenquiryidpk` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `principal` float DEFAULT NULL,
  `nofortnight` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(256) DEFAULT NULL,
  `surname` varchar(256) DEFAULT NULL,
  `organization` varchar(256) DEFAULT NULL,
  `empfilenumber` varchar(256) DEFAULT NULL,
  `phone` decimal(10,0) DEFAULT NULL,
  `cemail` varchar(256) DEFAULT NULL,
  `enquirydate` datetime DEFAULT NULL,
  `sysdata_percent` float DEFAULT NULL,
  PRIMARY KEY (`masterenquiryidpk`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masterenquiry`
--

LOCK TABLES `masterenquiry` WRITE;
/*!40000 ALTER TABLE `masterenquiry` DISABLE KEYS */;
INSERT INTO `masterenquiry` VALUES (20,20000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:49:52',0.35),(21,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:13',0.35),(22,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:36',0.35),(23,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:41',0.35),(24,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:43',0.35),(25,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:47',0.35),(26,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:53',0.35),(27,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:50:58',0.35),(28,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:51:02',0.35),(29,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:51:06',0.35),(30,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:51:11',0.35),(31,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:51:18',0.35),(32,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:51:23',0.35),(33,18000,79,'Theodore','Iwagu','Bsp Financial Group Limitted','13470',70304016,'TIwagu@bsp.com.pg','2025-04-29 11:51:27',0.35),(36,5000,10,'Emmanuel','Yakamsa','Department of Treasury','13752707',70029862,'yakamsa@gmail.com','2025-05-01 09:56:27',0.35),(40,300,3,'Jonathan','Patel','DPM','DPM32312',7819192,'jonathan@cybertais.com','2025-05-02 17:10:42',0.35),(43,1000,10,'Ricardo','Jovellanos','Telikom Ltd','15790',78880877,'ricardo.jovellanos@telikom.com.pg','2025-05-06 16:12:24',0.35),(44,3000,10,'Sammy Jnr','Kuna','BSP Financial Group Ltd','27366',3056777,'SKunaJnr@bsp.com.pg','2025-05-16 18:25:05',0.35),(45,500,5,'Emmanuel','Busina','PNG CUSTOMS SERVICE','13379779',81883898,'manu.busina@gmail.com','2025-05-30 03:19:11',0.35),(46,2000,10,'Mcquailla','Nui','Telikom limited','16599',78880987,'nuimcquailla@gmail.com','2025-06-02 12:07:44',0.35),(47,3000,10,'Yurete','Bomanu','Department of Treasury','13752547',70799951,'Yurete_Bomanu@treasury.gov.pg','2025-06-04 13:51:23',0.35),(48,2000,10,'Simon','Matthew Penni','Telikom LTD','15683',78880771,'Simon.Peni@telikom.com.pg','2025-06-09 08:16:10',0.35),(49,2000,10,'Juliet','Kilo','Bravo','123456',75520000,'cannanfinance@gmail.com','2025-06-10 10:19:22',0.35),(51,3000,10,'Francis','Rasin','Telikom PNG LTD','15115',79763451,'Francis.Rasin@telikom.com.pg','2025-06-23 08:51:39',0.35),(52,1800,10,'Kerryanne','Kasare','Telikom Limited','16239',76001874,'kerryannekasarekk@gmail.com','2025-06-23 09:35:11',0.35),(53,1000,6,'Payere','Pangheem','Telikom Ltd','15794',78880894,'payere.pangheem@telikom.com.pg','2025-07-14 09:24:37',0.35),(54,1800,10,'Kerryanne','Kasare','Telikom Limited','16239',76001874,'Kerryanne.Kasare@telikom.com.pg','2025-07-14 10:42:53',0.35),(55,1800,10,'Kerryanne','Kasare','Telikom Limited','16239',78657667,'kerryannekasarekk@gmail.com','2025-07-14 11:14:27',0.35),(56,300,3,'Benjamin','Tiale','Telikom','16544',78880970,'Benjamin.Tiale@telikom.com.pg','2025-07-25 15:53:05',0.35),(57,1000,7,'Kerryanne','Kasare','Telikom Limited','16239',78657667,'kerryannekasarekk@gmail.com','2025-08-01 10:18:35',0.35),(58,2000,10,'Laurie','Kuop','PNG NISIT','13313765',71653392,'laurie.kuop@nisit.gov.pg','2025-08-03 12:35:11',0.35),(59,500,5,'Sammy Jnr','Kuna','BSP Financial Group Ltd','27366',74200112,'SKunaJnr@bsp.com.pg','2025-08-22 12:23:35',0.35),(60,2500,10,'Nove','Numa','Finance Corporation','FCE01224',3137242,'novenuma9@gmail.com','2025-08-25 16:02:33',0.35),(61,500,5,'Kerryanne','Kasare','Telikom Limited','16239',78657667,'kerryannekasarekk@gmail.com','2025-08-27 12:59:26',0.35),(62,1000,7,'Kerryanne','Kasare','Telikom Limited','16239',78657667,'kerryannekasarekk@gmail.com','2025-08-29 13:38:59',0.35),(63,500,5,'Anthony','Larry','Telikom LTD','16201',76001176,'Anthony.Larry@telikom.com.pg','2025-09-01 07:43:07',0.35),(64,600,5,'Kerryanne','Kasare','Telikom Limited','16239',78657667,'kerryannekasarekk@gmail.com','2025-09-18 14:54:52',0.35),(65,500,5,'Lorraine','Deilala','Telikom Limited','15742',78880832,'Lorraine.Deilala@telikom.com.pg','2025-09-24 08:37:00',0.35),(66,2800,6,'Josephine','Kawi','Telikom Limited','16874',78880826,'kawijosephine@gmail.com','2025-10-01 13:26:49',0.35),(67,500,5,'Lorraine','Deilala','Telikom Limited','15742',78880832,'Lorraine.Deilala@telikom.com.pg','2025-10-10 09:18:40',0.35),(68,1000,7,'Stahl','Hosea','Nambawan Super Limited','10401',72350780,'stahlh525@gmail.com','2025-10-16 12:10:19',0.35),(69,1000,5,'Avia','Marai','Niugini Plumbing Services Ltd','1014',3236565,'accounts@nps.com.pg','2025-11-14 07:45:00',0.35),(70,1000,5,'Nancy','Kalebo','Niugini Plumbing Services Ltd','1132',3236565,'admin@nps.com.pg','2025-11-14 07:46:36',0.35),(71,1000,5,'Cathy','Koregura','Niugini Plumbing Services Ltd','1426',3236565,'services@nps.com.pg','2025-11-14 07:47:40',0.35),(72,1500,10,'Max','Aueii','Education','11953702',70409387,'cliffordmaxau1988@gmail.com','2025-11-14 23:38:04',0.35),(73,2000,10,'Harry','Laki','Credit Corporation property Limited','MS152',70208195,'aulakitetemau43@gmail.com','2025-11-17 19:18:20',0.35),(74,3000,7,'Tony','George','Tisa Bank','11445',3002253,'tonygeorge@tisa.com.pg','2025-11-18 06:35:58',0.35),(75,500,5,'Rose','Paul','Comrade Trustee Services Limited','PAUR',72889735,'rpaul@ctsl.com.pg','2025-11-19 11:26:32',0.35),(76,2000,10,'Saiwa','Vali','Liberty Assurance Limited','1018',82907013,'smvali5812@gmail.com','2025-11-20 12:16:15',0.35),(77,2000,8,'Paul','Bebes','National Broadcasting Cooperation','55044',83472417,'bebespaul30@gmail.com','2025-11-26 15:09:03',0.35),(78,3000,10,'Gibson','Nameba','Education Department','13198113',79585250,'gibsonnameba@gmail.com','2025-11-27 11:04:18',0.35),(79,3000,10,'Gibson','Nameba','Education Department','13198113',79585250,'gibsonnameba@gmail.com','2025-11-27 11:07:42',0.35),(80,1000,7,'Samson','Ga&#039;a','PNGDF','10714054',83631694,'sammyg813302@gmail.com','2025-11-27 11:18:56',0.35),(81,3000,10,'Ronnie','James','Central PHA','13446472',78999742,'belindaako@msoutlook.com','2025-11-27 13:11:39',0.35),(82,1000,7,'Salomie','Gerari','Scrum PNG','002',73479023,'gerarisalomie@gmail.com','2025-12-03 14:04:31',0.35),(83,500,5,'Israel','Baleng','Telikom Limited','1678',76001707,'Israel.Baleng@telikom.com.pg','2025-12-04 07:56:50',0.35),(84,2000,10,'Steven','Gola','Jiwaka provincial health authority','12925824',73379012,'juniorkukgola@gmail.com','2025-12-07 17:05:21',0.35),(85,1000,4,'Anthony','Larry','Telikom','16201',81470473,'anthonylarryjnr@gmail.com','2025-12-10 09:47:37',0.35),(86,2000,10,'Simone','Ila','National Trade Office','13273962',76044227,'sila.saviriu@gmail.com','2025-12-11 12:03:24',0.35),(87,2200,15,'Israel','Baleng','Telikom Limited','16178',74564598,'Israel.Baleng@telikom.com.pg','2025-12-17 12:45:14',0.35),(88,1900,10,'Maryanne','Turnamur','Teacher','13474001',72989029,'t','2025-12-18 12:02:08',0.35),(89,1900,11,'Maryanne','Turnamur','Teaching commission','13474001',72989029,'maryanneturnamur@gmail.com','2025-12-18 12:04:58',0.35),(90,5000,15,'Emily','Dauma','Digicel PNG Limited','ED614711',81418474,'emilydauma@gmail.com','2025-12-23 19:40:28',0.35),(91,5000,15,'Trevor','Imal','OM Holdings Limited','POM122',73818806,'trevor.imal@oilmin.com','2025-12-29 08:28:06',0.35),(92,1600,10,'KIMBERLYN','GADURE','TELIKOM LIMITED','15971',76001397,'Kimberlyn.Gadure@telikom.com.pg','2025-12-30 17:10:17',0.35),(93,5000,15,'Teatu','Terupo','Womens Microbank Limited','Wmb287',75791449,'Teatu.Terupo@gmail.com','2026-01-13 10:01:11',0.35),(94,1500,15,'Chillen','Wailipe','Education','10206807',73036554,'chillenwailipe19@gmail.com','2026-01-13 11:41:13',0.35),(95,1000,10,'Sasha','Korah','Department.of Higher Education, RST','10973716',3017047,'sasha.kora@dherst.gov.pg','2026-01-15 10:07:02',0.35),(96,3000,15,'Michael Twika','Gani','Simberi Gold Mine','19115',75724879,'mikie.gani@gmail.com','2026-01-16 12:56:30',0.35),(97,5000,15,'Boio','Simoi','BOM Finance','003',74960467,'boiosimoi2@gmail.com','2026-01-21 10:05:02',0.35),(98,500,12,'Gabriella','Kinaram','Health Department','13838554',73368889,'gkinaram23@gmail.com','2026-01-23 00:50:00',0.35),(99,2500,15,'Kenneth','Keith','PNG FIRE SERVICE','13366463',81443239,'kennethbalongkeith@gmail.com','2026-01-26 12:04:24',0.35),(100,2000,8,'Grace','Pahia','Strickland Real Estate','351',79241200,'GPahia@sre.com.pg','2026-02-03 15:51:54',0.35),(101,1000,6,'Molo','Pung','National Broadcasting Corporation','46315',82023380,'mpung@nbc.gov.pg','2026-02-16 10:32:10',0.35),(102,1500,15,'Mari','Tai','Pro Clean Ltd','3936',74593737,'maritai2071109@gmail.com','2026-03-09 20:07:44',0.35),(103,300,4,'Gideon','Tatrick','Lotic Bige Limited','01860',72986704,'gtatrick7@gmail.com','2026-03-09 23:26:39',0.35),(104,5000,15,'Rhoda','Frank','Kina Bank','11549',75531546,'Rhoda.Frank@kinabank.com.pg','2026-03-10 07:09:01',0.35),(105,1000,15,'Chandrah','Upysah','Education','12836784',83301819,'upysahchandrahgeoff@gmail.com','2026-03-11 19:38:23',0.35),(106,5000,15,'Robert','Thadeus','Water PNG Limited','50598',78956501,'RThadeus@waterpng.com','2026-03-12 01:41:08',0.35),(107,5000,15,'Rose','Werimap','Rowhani Limited','090',72319325,'rosewerimap@gmail.com','2026-03-12 20:12:00',0.35),(108,2000,15,'Badira','Vagi','The National','2271',71922268,'bvagi22@gmail.com','2026-03-12 23:25:03',0.35),(109,5000,10,'Lorna','Arek','Pacific Industries','3250',77050467,'ffm.ngi@pacificindustries.com.pg','2026-03-20 14:42:43',0.35),(110,5000,10,'Lorna','Arek','Pacific Industries','3250',77050467,'ffm.ngi@pacificindustries.com.pg','2026-03-23 12:57:55',0.35),(111,5000,15,'Elijah','Baroro','Cannan Finance','10278925',76328050,'baroroe@cannanfinance.com','2026-03-23 16:26:37',0.35),(112,3000,10,'Nimrod','David','FINANCE','13874587',83641921,'davidnimrod034@gmail.com','2026-03-25 15:21:57',0.35);
/*!40000 ALTER TABLE `masterenquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peoples`
--

DROP TABLE IF EXISTS `peoples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peoples` (
  `persidpk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(256) DEFAULT NULL,
  `lname` varchar(256) DEFAULT NULL,
  `gender` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`persidpk`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peoples`
--

LOCK TABLES `peoples` WRITE;
/*!40000 ALTER TABLE `peoples` DISABLE KEYS */;
INSERT INTO `peoples` VALUES (1,'Jonathan','Patel','Male',NULL,NULL,NULL),(2,'Mavis','Steven','Female','celestinepiau5@gmail.com','84747878',NULL),(3,'Tabar','Pennington','Male','tpenny74342@gmail.com','79176953',NULL),(4,'Franko','Kisa','Male','fkisa4@gmail.com','73568485',NULL),(5,'Samuel','Imara','Male','financecannan@gmail.com','7322 0051',NULL),(6,'Paul','Aee','Male','paulaee24@gmail.com','7000 3096',NULL),(7,'Haro','Posa','Male','h.posa.3454@gmail.com','76188684',NULL),(8,'David','Ayu','Male','davidayu371@gmail.com','72478884',NULL),(9,'Delvene Woni','Narakou','Male','lae1.cannanfinance@gmail.com','76185936',NULL),(10,'Juaneth','Mistera','Male','juanethmistera15@gmail.com','76404359',NULL),(11,'Rose','Kinnen','Female','kinnenrose0@gmail.com','76001625',NULL),(12,'Sasha','Woni','Female','sashaljaywoni@gmail.com','72469325',NULL),(13,'Kiage','Pisep','Male','kiagepisep2026@gmail.com','76500690',NULL),(14,'Kevin','Oirag','Male','oiragkevin@gmail.com','7160 2416',NULL),(15,'Mark','Robert','Male','billymarkrobert@gmail.com','72022773',NULL),(16,'Darren','Hareko','Male','dhmasterlyr25@gmail.com','77348104',NULL),(17,'Leila','Joseph','Female','josephleilalama@gmail.com','81752021',NULL),(18,'Ezekiel','Takera','Male','ezekielben675@gmail.com','77340422',NULL),(19,'Emmanuel','Gising','Male','gisingemmanuel27@gmail.com','71657458',NULL),(20,'Whitney Mary','Levo','Male','whitneymarylevo@gmail.com','73231480',NULL),(21,'Audrey','Burassi','Male','audzilynburassi@gmail.com','84752642',NULL),(22,'Jonathan','Joe','Male','jonathanwhiskey8@gmail.com','81812429',NULL),(23,'Elizah','Kraip','Male','kraipelizah4@gmail.com','72336204',NULL),(24,'Gloria','Goman','Female','glorialahineig@gmail.com','73038099',NULL),(25,'Adrian','Tony','Male','renagiadrian3@gmail.com','76587189',NULL),(26,'Mary','Trakalova','Male','marytrakalowa5@gmail.com','7041 5858',NULL),(27,'Marianne','Kansan','Male','mkansan.pgh@gmail.com','71636575',NULL),(28,'Chalene','PAR','Male','charlenepar8@gmail.com','72409450',NULL),(29,'Ben','Michael','Male','bm1151140@gmail.com','71538083',NULL),(30,'Irish','Lalau','Male','irishlalau91@gmail.com','81728192',NULL),(31,'Ruseel','Kaidavu','Male','russellkaidavu6@gmail.com','74417677',NULL),(32,'Dennis','Pokah','Male','dpokah2010@gmail.com','82842556',NULL),(33,'Vanessa','Tom','Male','tomvanessa55@gmail.com','74346958',NULL),(34,'Desmond','Steven','Male','desmondsteven778@gmail.com','79197862',NULL),(35,'Gideon','Tatrick','Male','gtatrick7@gmail.com','72986704',NULL);
/*!40000 ALTER TABLE `peoples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `provinceId` int(11) unsigned NOT NULL,
  `pro_name` varchar(256) NOT NULL,
  `provcode` varchar(256) NOT NULL,
  `regionid` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (23,'Central','',2),(24,'Chimbu (Simbu)','',1),(25,'Eastern Highlands','',1),(26,'East New Britain','',4),(27,'East Sepik','',3),(28,'Enga','',1),(29,'Gulf','',2),(30,'Madang','',3),(31,'Manus','',4),(32,'Milne Bay','',2),(33,'Morobe','',3),(34,'New Ireland','',4),(35,'Northern (Oro Province)','',2),(36,'Bougainville','',4),(37,'Southern Highlands','',1),(38,'Western Province','',2),(39,'Western Highlands','',1),(40,'West New Britain','',4),(41,'West Sepik','',3),(42,'NCD','',2),(43,'Hela','',1),(44,'Jiwaka','',1);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `roleIdPk` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary key for each role',
  `roleName` varchar(100) NOT NULL COMMENT 'Human-readable name of the role (e.g., Admin, Viewer)',
  `description` text DEFAULT NULL COMMENT 'Optional description of what this role is allowed to do',
  PRIMARY KEY (`roleIdPk`),
  UNIQUE KEY `roleName` (`roleName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Stores all the user roles in the system';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','Full access to create, edit, view, and delete records.'),(2,'userlevel1','User Level 1'),(3,'userlevel2','User Level 2'),(4,'userlevel3','User Level 3'),(5,'userlevel4','User Level 4'),(6,'Public','View-only access to specific system records.');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `userIdFk` int(10) unsigned NOT NULL COMMENT 'Foreign key referencing a user in the userprofile table',
  `roleIdFk` int(10) unsigned NOT NULL COMMENT 'Foreign key referencing a role assigned to the user',
  PRIMARY KEY (`userIdFk`,`roleIdFk`),
  KEY `roleIdFk` (`roleIdFk`),
  CONSTRAINT `con_rolesid` FOREIGN KEY (`roleIdFk`) REFERENCES `roles` (`roleIdPk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `con_userid` FOREIGN KEY (`userIdFk`) REFERENCES `userprofile` (`userIdPk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Many-to-many mapping between users and their assigned roles';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (10,1);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userprofile` (
  `userIdPk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personIdFk` int(10) unsigned NOT NULL COMMENT 'This links each user profile to a record in the persons table',
  `username` varchar(100) NOT NULL COMMENT 'Enforced as unique to avoid duplicate login credentials',
  `passwordHash` varchar(255) NOT NULL COMMENT 'Secure storage of password using hashing (never store plaintext passwords)',
  `lastLogin` datetime DEFAULT NULL,
  `accountStatus` enum('Active','Inactive','Suspended') DEFAULT 'Active' COMMENT 'accountStatus and isLocked: Help manage account lifecycle and security.',
  `isLocked` tinyint(1) DEFAULT 0 COMMENT 'accountStatus and isLocked: Help manage account lifecycle and security.',
  `failedLoginAttempts` int(11) DEFAULT 0 COMMENT 'failedLoginAttempts: Useful for login throttling or account locking logic.',
  `passwordLastChanged` datetime DEFAULT NULL COMMENT 'passwordLastChanged: Helps enforce password aging policies if needed.',
  `createdStamp` datetime DEFAULT current_timestamp(),
  `modStamp` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userIdPk`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_userprofile_person` (`personIdFk`),
  CONSTRAINT `conPersonId_UserprofilePersonId` FOREIGN KEY (`personIdFk`) REFERENCES `peoples` (`persidpk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprofile`
--

LOCK TABLES `userprofile` WRITE;
/*!40000 ALTER TABLE `userprofile` DISABLE KEYS */;
INSERT INTO `userprofile` VALUES (10,1,'administrator','36fe710f876cf532fd2aaac24a9d59cfa432f4df11be01f25dc06b5820831437','2026-03-31 05:20:38','Active',0,0,'2025-12-27 18:18:48','2025-12-27 18:16:09','2026-03-31 05:20:38');
/*!40000 ALTER TABLE `userprofile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-31  5:28:08
