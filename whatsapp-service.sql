CREATE DATABASE  IF NOT EXISTS `whatsapp_service` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `whatsapp_service`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: whatsapp_service
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `actionlogs`
--

DROP TABLE IF EXISTS `actionlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actionlogs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `Action` varchar(45) DEFAULT NULL,
  `Description` text,
  `Indate` datetime DEFAULT NULL,
  `AddedBy` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actionlogs`
--

LOCK TABLES `actionlogs` WRITE;
/*!40000 ALTER TABLE `actionlogs` DISABLE KEYS */;
INSERT INTO `actionlogs` VALUES (1,'Phonebook deleted successfully...','Kunal Bhosale','2026-01-09 15:51:23',1),(2,'Phonebook deleted successfully...','Kunal Bhosale0','2026-01-09 15:51:32',1),(3,'Phonebook deleted successfully...','send-Testing','2026-01-09 15:51:47',1);
/*!40000 ALTER TABLE `actionlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_queue`
--

DROP TABLE IF EXISTS `message_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_queue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `device_id` int DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `message` text,
  `status` enum('pending','sent','failed') DEFAULT 'pending',
  `error_message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `media` varchar(45) DEFAULT NULL,
  `schedule_at` datetime DEFAULT NULL,
  `delay` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_queue`
--

LOCK TABLES `message_queue` WRITE;
/*!40000 ALTER TABLE `message_queue` DISABLE KEYS */;
INSERT INTO `message_queue` VALUES (1,1,'7499318917','? नमस्ते पार्टनर! एक ज़बरदस्त खुशखबरी है आपके लिए!\r\nआपके लिए है NPAV का सुपर ऑफर, जो है ? फायदा वाला!\r\n\r\nक्या आप फैमिली के साथ घूमने का प्लान बना रहे हैं?\r\nतो बस ? NPAV TS खरीदें, और जीतिए फैमिली ट्रिप –\r\n? गोवा, ? नेपाल  ? केरल की शानदार यात्रा! ✈️?\r\n\r\n? और हां!  सिर्फ इतना ही नहीं...  एक्टिवेशन पर मिलेंगे:\r\n? सिक्योरिटी / फिटनेस / Yoga +Pranayaam गिफ्ट्स आपके माता-पिता / पूरे परिवार के लिए\r\n\r\nजल्दी करें, ये ऑफर सिर्फ कुछ समय के लिए है! ⏳\r\nअभी पूरी जानकारी लें\r\n\r\nhttps://www.npav.net/rj','sent',NULL,'2026-01-08 12:37:39','2026-01-08 12:38:18',NULL,NULL,0),(2,1,'9284581330','? नमस्ते पार्टनर! एक ज़बरदस्त खुशखबरी है आपके लिए!\r\nआपके लिए है NPAV का सुपर ऑफर, जो है ? फायदा वाला!\r\n\r\nक्या आप फैमिली के साथ घूमने का प्लान बना रहे हैं?\r\nतो बस ? NPAV TS खरीदें, और जीतिए फैमिली ट्रिप –\r\n? गोवा, ? नेपाल  ? केरल की शानदार यात्रा! ✈️?\r\n\r\n? और हां!  सिर्फ इतना ही नहीं...  एक्टिवेशन पर मिलेंगे:\r\n? सिक्योरिटी / फिटनेस / Yoga +Pranayaam गिफ्ट्स आपके माता-पिता / पूरे परिवार के लिए\r\n\r\nजल्दी करें, ये ऑफर सिर्फ कुछ समय के लिए है! ⏳\r\nअभी पूरी जानकारी लें\r\n\r\nhttps://www.npav.net/rj','sent',NULL,'2026-01-08 12:37:39','2026-01-08 12:38:21',NULL,NULL,0),(3,1,'7499318917','Net Protector: Enjoy Water Park Water Kingdom, Borivali (40 TS) OR Wet N Joy, Lonavala (45 TS) ! *Exclusive Offer for T3 Activation Partners Only Activate 5 TS in May with your Dealer Code Enroll in Scheme : https://www.npav.net/mumbai','sent',NULL,'2026-01-08 12:58:46','2026-01-08 12:59:06',NULL,NULL,0),(4,1,'9284581330','Net Protector: Enjoy Water Park Water Kingdom, Borivali (40 TS) OR Wet N Joy, Lonavala (45 TS) ! *Exclusive Offer for T3 Activation Partners Only Activate 5 TS in May with your Dealer Code Enroll in Scheme : https://www.npav.net/mumbai','sent',NULL,'2026-01-08 12:58:46','2026-01-08 12:59:09',NULL,NULL,0),(5,1,'918459222674','Net Protector: Enjoy Water Park Water Kingdom, Borivali (40 TS) OR Wet N Joy, Lonavala (45 TS) ! *Exclusive Offer for T3 Activation Partners Only Activate 5 TS in May with your Dealer Code Enroll in Scheme : https://www.npav.net/mumbai','sent',NULL,'2026-01-08 13:01:30','2026-01-08 13:01:52',NULL,NULL,0),(6,1,'918805073375','? नमस्ते पार्टनर! एक ज़बरदस्त खुशखबरी है आपके लिए!\r\nआपके लिए है NPAV का सुपर ऑफर, जो है ? फायदा वाला!\r\n\r\nक्या आप फैमिली के साथ घूमने का प्लान बना रहे हैं?\r\nतो बस ? NPAV TS खरीदें, और जीतिए फैमिली ट्रिप –\r\n? गोवा, ? नेपाल  ? केरल की शानदार यात्रा! ✈️?\r\n\r\n? और हां!  सिर्फ इतना ही नहीं...  एक्टिवेशन पर मिलेंगे:\r\n? सिक्योरिटी / फिटनेस / Yoga +Pranayaam गिफ्ट्स आपके माता-पिता / पूरे परिवार के लिए\r\n\r\nजल्दी करें, ये ऑफर सिर्फ कुछ समय के लिए है! ⏳\r\nअभी पूरी जानकारी लें\r\n\r\nhttps://www.npav.net/rj','sent',NULL,'2026-01-08 13:28:16','2026-01-08 13:28:46',NULL,NULL,0),(7,1,'918805073375','hii','pending',NULL,'2026-01-09 08:25:59',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `message_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phonebook_contacts`
--

DROP TABLE IF EXISTS `phonebook_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phonebook_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `phonebook_id` bigint unsigned NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index` (`id`,`phonebook_id`,`mobile`,`created_at`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phonebook_contacts`
--

LOCK TABLES `phonebook_contacts` WRITE;
/*!40000 ALTER TABLE `phonebook_contacts` DISABLE KEYS */;
INSERT INTO `phonebook_contacts` VALUES (7,2,'Kunal Bhosale1','7499318917','2026-01-07 07:10:34'),(8,2,'Tushar Bhise1','9284581330','2026-01-07 07:10:34'),(23,4,'Kunal Bhosale','7499318917','2026-01-09 09:05:42'),(24,4,'swapnil BhiseBhise','9284581330','2026-01-09 09:05:42'),(25,5,'Kunal Bhosale','7499318917','2026-01-09 09:48:08'),(26,5,'swapnil BhiseBhise','9284581330','2026-01-09 09:48:08'),(27,3,'Kunal Bhosale1','7499318917','2026-01-09 10:21:47'),(28,3,'Tushar Bhise1','9284581330','2026-01-09 10:21:47');
/*!40000 ALTER TABLE `phonebook_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phonebooks`
--

DROP TABLE IF EXISTS `phonebooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phonebooks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `total_numbers` int DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index` (`id`,`user_id`,`created_at`,`total_numbers`,`updated_at`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phonebooks`
--

LOCK TABLES `phonebooks` WRITE;
/*!40000 ALTER TABLE `phonebooks` DISABLE KEYS */;
INSERT INTO `phonebooks` VALUES (2,1,'Kunal Bhosale0',2,'2026-01-07 11:34:16','2026-01-09 15:51:32'),(3,1,'send-Testing',2,'2026-01-09 14:14:56','2026-01-09 15:51:47'),(4,1,'send-Testing1',2,'2026-01-09 14:35:42','2026-01-09 14:35:42'),(5,NULL,'Kunal Bhosale100',2,'2026-01-09 15:18:08','2026-01-09 15:18:08');
/*!40000 ALTER TABLE `phonebooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission2`
--

DROP TABLE IF EXISTS `user_permission2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permission2` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `user_Id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `dashboard` tinyint(1) DEFAULT '1' COMMENT '/dashboard',
  `actionlog` tinyint(1) DEFAULT '0' COMMENT '/actionlog',
  `usermaster` tinyint(1) DEFAULT '0' COMMENT '/usermaster',
  `InDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission2`
--

LOCK TABLES `user_permission2` WRITE;
/*!40000 ALTER TABLE `user_permission2` DISABLE KEYS */;
INSERT INTO `user_permission2` VALUES (1,1,'kunalb',1,1,1,NULL);
/*!40000 ALTER TABLE `user_permission2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usermaster`
--

DROP TABLE IF EXISTS `usermaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usermaster` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_key` varchar(64) DEFAULT NULL,
  `access` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `indate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(20) DEFAULT NULL,
  `last_ip` varchar(20) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usermaster`
--

LOCK TABLES `usermaster` WRITE;
/*!40000 ALTER TABLE `usermaster` DISABLE KEYS */;
INSERT INTO `usermaster` VALUES (1,'kunalb',NULL,'kunalb',NULL,'admin',1,'2026-01-05 12:09:57','::1',NULL,'2026-01-05 17:39:57');
/*!40000 ALTER TABLE `usermaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_bulk_campaigns`
--

DROP TABLE IF EXISTS `whatsapp_bulk_campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_bulk_campaigns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `whatsapp_number` varchar(20) NOT NULL,
  `campaign_name` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `total_numbers` int DEFAULT '0',
  `sent_count` int DEFAULT '0',
  `failed_count` int DEFAULT '0',
  `status` enum('pending','running','completed','failed') DEFAULT 'pending',
  `started_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_bulk_campaigns`
--

LOCK TABLES `whatsapp_bulk_campaigns` WRITE;
/*!40000 ALTER TABLE `whatsapp_bulk_campaigns` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp_bulk_campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_bulk_jobs`
--

DROP TABLE IF EXISTS `whatsapp_bulk_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_bulk_jobs` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text,
  `total_numbers` int DEFAULT '0',
  `sent_count` int DEFAULT '0',
  `failed_count` int DEFAULT '0',
  `status` enum('PENDING','RUNNING','COMPLETED') DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_bulk_jobs`
--

LOCK TABLES `whatsapp_bulk_jobs` WRITE;
/*!40000 ALTER TABLE `whatsapp_bulk_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp_bulk_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_bulk_numbers`
--

DROP TABLE IF EXISTS `whatsapp_bulk_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_bulk_numbers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `bulk_id` bigint NOT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `status` enum('PENDING','SENT','FAILED') DEFAULT 'PENDING',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_bulk_numbers`
--

LOCK TABLES `whatsapp_bulk_numbers` WRITE;
/*!40000 ALTER TABLE `whatsapp_bulk_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp_bulk_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_devices`
--

DROP TABLE IF EXISTS `whatsapp_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `sender_jid` varchar(30) DEFAULT NULL,
  `api_token` varchar(64) NOT NULL,
  `webhook_url` varchar(255) DEFAULT NULL,
  `status` enum('ONLINE','OFFLINE','QR_REQUIRED','DISCONNECTED') DEFAULT 'OFFLINE',
  `last_seen` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_token` (`api_token`),
  KEY `user_id` (`user_id`),
  KEY `mobile_number` (`mobile_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_devices`
--

LOCK TABLES `whatsapp_devices` WRITE;
/*!40000 ALTER TABLE `whatsapp_devices` DISABLE KEYS */;
INSERT INTO `whatsapp_devices` VALUES (1,1,'Kunal','7499318917',NULL,'P6MDtK6PDI9DxCVmY82Yerc0SQ812Fcg','https://npav.alert.ind.in/','ONLINE',NULL,'2026-01-05 13:17:55','2026-01-08 13:22:49');
/*!40000 ALTER TABLE `whatsapp_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_logs`
--

DROP TABLE IF EXISTS `whatsapp_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `request_data` text,
  `response_data` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_logs`
--

LOCK TABLES `whatsapp_logs` WRITE;
/*!40000 ALTER TABLE `whatsapp_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_messages`
--

DROP TABLE IF EXISTS `whatsapp_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `whatsapp_number` varchar(20) NOT NULL,
  `to_number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `message_type` enum('single','bulk') DEFAULT 'single',
  `status` enum('pending','sent','failed') DEFAULT 'pending',
  `error_message` text,
  `sent_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_to_number` (`to_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_messages`
--

LOCK TABLES `whatsapp_messages` WRITE;
/*!40000 ALTER TABLE `whatsapp_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_sessions`
--

DROP TABLE IF EXISTS `whatsapp_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `session_path` varchar(255) DEFAULT NULL,
  `status` enum('QR_REQUIRED','READY','DISCONNECTED') DEFAULT 'QR_REQUIRED',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_sessions`
--

LOCK TABLES `whatsapp_sessions` WRITE;
/*!40000 ALTER TABLE `whatsapp_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp_templates`
--

DROP TABLE IF EXISTS `whatsapp_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `template_name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp_templates`
--

LOCK TABLES `whatsapp_templates` WRITE;
/*!40000 ALTER TABLE `whatsapp_templates` DISABLE KEYS */;
INSERT INTO `whatsapp_templates` VALUES (2,1,'Kunal','.;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;','2026-01-07 09:34:29','2026-01-08 04:54:21'),(3,1,'Kunal New','Net Protector: Enjoy Water Park Water Kingdom, Borivali (40 TS) OR Wet N Joy, Lonavala (45 TS) ! *Exclusive Offer for T3 Activation Partners Only Activate 5 TS in May with your Dealer Code Enroll in Scheme : https://www.npav.net/mumbai','2026-01-07 09:35:08','2026-01-08 10:44:22'),(4,1,'Tushar Bhise','? नमस्ते पार्टनर! एक ज़बरदस्त खुशखबरी है आपके लिए!\r\nआपके लिए है NPAV का सुपर ऑफर, जो है ? फायदा वाला!\r\n\r\nक्या आप फैमिली के साथ घूमने का प्लान बना रहे हैं?\r\nतो बस ? NPAV TS खरीदें, और जीतिए फैमिली ट्रिप –\r\n? गोवा, ? नेपाल  ? केरल की शानदार यात्रा! ✈️?\r\n\r\n? और हां!  सिर्फ इतना ही नहीं...  एक्टिवेशन पर मिलेंगे:\r\n? सिक्योरिटी / फिटनेस / Yoga +Pranayaam गिफ्ट्स आपके माता-पिता / पूरे परिवार के लिए\r\n\r\nजल्दी करें, ये ऑफर सिर्फ कुछ समय के लिए है! ⏳\r\nअभी पूरी जानकारी लें\r\n\r\nhttps://www.npav.net/rj','2026-01-08 10:47:44','2026-01-08 10:47:44'),(5,1,'swapnil-test','? नमस्ते पार्टनर! एक ज़बरदस्त खुशखबरी है आपके लिए!\r\nआपके लिए है NPAV का सुपर ऑफर, जो है ? फायदा वाला!\r\n\r\nक्या आप फैमिली के साथ घूमने का प्लान बना रहे हैं?\r\nतो बस ? NPAV TS खरीदें, और जीतिए फैमिली ट्रिप –\r\n? गोवा, ? नेपाल  ? केरल की शानदार यात्रा! ✈️?\r\n\r\n? और हां!  सिर्फ इतना ही नहीं...  एक्टिवेशन पर मिलेंगे:\r\n? सिक्योरिटी / फिटनेस / Yoga +Pranayaam गिफ्ट्स आपके माता-पिता / पूरे परिवार के लिए\r\n\r\nजल्दी करें, ये ऑफर सिर्फ कुछ समय के लिए है! ⏳\r\nअभी पूरी जानकारी लें\r\n\r\nhttps://www.npav.net/rj','2026-01-08 13:27:04','2026-01-08 13:27:04');
/*!40000 ALTER TABLE `whatsapp_templates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-09 15:58:11
