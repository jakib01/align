-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: align
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'rudy','rudy@gmail.com',NULL,'$2y$10$6PeJi3DHvPwQjLn3KFqkxe7Vfv6N/1yAoAnoKwvUgaJ3wkbXGmsLe',NULL,NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_options`
--

DROP TABLE IF EXISTS `assessment_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessment_options` (
  `id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned DEFAULT NULL,
  `option_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_question_id` (`question_id`),
  CONSTRAINT `fk_question_id` FOREIGN KEY (`question_id`) REFERENCES `assessment_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_options`
--

LOCK TABLES `assessment_options` WRITE;
/*!40000 ALTER TABLE `assessment_options` DISABLE KEYS */;
INSERT INTO `assessment_options` VALUES (1,1,'Blue',2,'2025-01-02 20:32:55','2025-01-02 20:32:55'),(2,1,'Green',3,'2025-01-02 20:32:55','2025-01-02 20:32:55'),(3,1,'Yellow',4,'2025-01-02 20:32:55','2025-01-02 20:32:55'),(4,1,'Black',5,'2025-01-02 20:32:55','2025-01-02 20:32:55'),(5,1,'Red',1,'2025-01-02 20:32:55','2025-01-02 20:32:55');
/*!40000 ALTER TABLE `assessment_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_questions`
--

DROP TABLE IF EXISTS `assessment_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessment_questions` (
  `id` bigint unsigned NOT NULL,
  `question_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_type` enum('behavior','values','skills','technical') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_questions`
--

LOCK TABLES `assessment_questions` WRITE;
/*!40000 ALTER TABLE `assessment_questions` DISABLE KEYS */;
INSERT INTO `assessment_questions` VALUES (1,'What\'s your favourite color?','behavior','2025-01-02 20:29:26','2025-01-02 20:29:26');
/*!40000 ALTER TABLE `assessment_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidate_answers`
--

DROP TABLE IF EXISTS `candidate_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidate_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `option_id` bigint unsigned NOT NULL,
  `score` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  KEY `option_id` (`option_id`),
  CONSTRAINT `candidate_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `assessment_questions` (`id`),
  CONSTRAINT `candidate_answers_ibfk_2` FOREIGN KEY (`option_id`) REFERENCES `assessment_options` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate_answers`
--

LOCK TABLES `candidate_answers` WRITE;
/*!40000 ALTER TABLE `candidate_answers` DISABLE KEYS */;
INSERT INTO `candidate_answers` VALUES (2,1,1,5,1,'2025-01-02 22:54:48','2025-01-31 18:56:12');
/*!40000 ALTER TABLE `candidate_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidate_assessments`
--

DROP TABLE IF EXISTS `candidate_assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidate_assessments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `assessment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'behavior',
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `candidate_assessmentscol` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total_score` int DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `candidate_id` (`candidate_id`),
  CONSTRAINT `candidate_assessments_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate_assessments`
--

LOCK TABLES `candidate_assessments` WRITE;
/*!40000 ALTER TABLE `candidate_assessments` DISABLE KEYS */;
INSERT INTO `candidate_assessments` VALUES (2,1,'behavior',NULL,'2025-01-02 22:54:48','2025-01-31 18:56:12','0',1,'completed');
/*!40000 ALTER TABLE `candidate_assessments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidate_selections`
--

DROP TABLE IF EXISTS `candidate_selections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidate_selections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `value_word_id` bigint unsigned NOT NULL,
  `score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `candidate_selections_candidate_id_foreign` (`candidate_id`),
  KEY `candidate_selections_value_word_id_foreign` (`value_word_id`),
  CONSTRAINT `candidate_selections_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `candidate_selections_value_word_id_foreign` FOREIGN KEY (`value_word_id`) REFERENCES `value_words` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=741 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate_selections`
--

LOCK TABLES `candidate_selections` WRITE;
/*!40000 ALTER TABLE `candidate_selections` DISABLE KEYS */;
INSERT INTO `candidate_selections` VALUES (591,1,1,5,'2025-04-09 14:40:03','2025-04-09 14:40:03','1'),(592,1,6,4,'2025-04-09 14:40:03','2025-04-09 14:40:03','1'),(593,1,11,3,'2025-04-09 14:40:03','2025-04-09 14:40:03','1'),(594,1,16,2,'2025-04-09 14:40:03','2025-04-09 14:40:03','1'),(595,1,21,1,'2025-04-09 14:40:03','2025-04-09 14:40:03','1'),(596,1,47,5,'2025-04-09 14:40:03','2025-04-09 14:40:03','2'),(597,1,2,4,'2025-04-09 14:40:03','2025-04-09 14:40:03','2'),(598,1,7,3,'2025-04-09 14:40:03','2025-04-09 14:40:03','2'),(599,1,12,2,'2025-04-09 14:40:03','2025-04-09 14:40:03','2'),(600,1,17,1,'2025-04-09 14:40:03','2025-04-09 14:40:03','2'),(601,1,43,5,'2025-04-09 14:40:03','2025-04-09 14:40:03','3'),(602,1,48,4,'2025-04-09 14:40:03','2025-04-09 14:40:03','3'),(603,1,3,3,'2025-04-09 14:40:03','2025-04-09 14:40:03','3'),(604,1,8,2,'2025-04-09 14:40:03','2025-04-09 14:40:03','3'),(605,1,13,1,'2025-04-09 14:40:03','2025-04-09 14:40:03','3'),(606,1,39,5,'2025-04-09 14:40:03','2025-04-09 14:40:03','4'),(607,1,44,4,'2025-04-09 14:40:03','2025-04-09 14:40:03','4'),(608,1,49,3,'2025-04-09 14:40:03','2025-04-09 14:40:03','4'),(609,1,4,2,'2025-04-09 14:40:03','2025-04-09 14:40:03','4'),(610,1,9,1,'2025-04-09 14:40:03','2025-04-09 14:40:03','4'),(611,1,35,5,'2025-04-09 14:40:03','2025-04-09 14:40:03','5'),(612,1,40,4,'2025-04-09 14:40:03','2025-04-09 14:40:03','5'),(613,1,45,3,'2025-04-09 14:40:03','2025-04-09 14:40:03','5'),(614,1,50,2,'2025-04-09 14:40:03','2025-04-09 14:40:03','5'),(615,1,5,1,'2025-04-09 14:40:03','2025-04-09 14:40:03','5'),(666,7,6,5,'2025-04-10 21:47:01','2025-04-10 21:47:01','1'),(667,7,11,4,'2025-04-10 21:47:01','2025-04-10 21:47:01','1'),(668,7,16,3,'2025-04-10 21:47:01','2025-04-10 21:47:01','1'),(669,7,21,2,'2025-04-10 21:47:01','2025-04-10 21:47:01','1'),(670,7,26,1,'2025-04-10 21:47:01','2025-04-10 21:47:01','1'),(671,7,7,5,'2025-04-10 21:47:01','2025-04-10 21:47:01','2'),(672,7,12,4,'2025-04-10 21:47:01','2025-04-10 21:47:01','2'),(673,7,17,3,'2025-04-10 21:47:01','2025-04-10 21:47:01','2'),(674,7,22,2,'2025-04-10 21:47:01','2025-04-10 21:47:01','2'),(675,7,27,1,'2025-04-10 21:47:01','2025-04-10 21:47:01','2'),(676,7,8,5,'2025-04-10 21:47:01','2025-04-10 21:47:01','3'),(677,7,13,4,'2025-04-10 21:47:01','2025-04-10 21:47:01','3'),(678,7,18,3,'2025-04-10 21:47:01','2025-04-10 21:47:01','3'),(679,7,23,2,'2025-04-10 21:47:01','2025-04-10 21:47:01','3'),(680,7,28,1,'2025-04-10 21:47:01','2025-04-10 21:47:01','3'),(681,7,9,5,'2025-04-10 21:47:01','2025-04-10 21:47:01','4'),(682,7,14,4,'2025-04-10 21:47:01','2025-04-10 21:47:01','4'),(683,7,19,3,'2025-04-10 21:47:01','2025-04-10 21:47:01','4'),(684,7,24,2,'2025-04-10 21:47:01','2025-04-10 21:47:01','4'),(685,7,29,1,'2025-04-10 21:47:01','2025-04-10 21:47:01','4'),(686,7,10,5,'2025-04-10 21:47:01','2025-04-10 21:47:01','5'),(687,7,15,4,'2025-04-10 21:47:01','2025-04-10 21:47:01','5'),(688,7,20,3,'2025-04-10 21:47:01','2025-04-10 21:47:01','5'),(689,7,25,2,'2025-04-10 21:47:01','2025-04-10 21:47:01','5'),(690,7,5,1,'2025-04-10 21:47:01','2025-04-10 21:47:01','5'),(716,12,1,5,'2025-04-11 22:15:52','2025-04-11 22:15:52','1'),(717,12,6,4,'2025-04-11 22:15:52','2025-04-11 22:15:52','1'),(718,12,11,3,'2025-04-11 22:15:52','2025-04-11 22:15:52','1'),(719,12,16,2,'2025-04-11 22:15:52','2025-04-11 22:15:52','1'),(720,12,21,1,'2025-04-11 22:15:52','2025-04-11 22:15:52','1'),(721,12,47,5,'2025-04-11 22:15:52','2025-04-11 22:15:52','2'),(722,12,2,4,'2025-04-11 22:15:52','2025-04-11 22:15:52','2'),(723,12,7,3,'2025-04-11 22:15:52','2025-04-11 22:15:52','2'),(724,12,12,2,'2025-04-11 22:15:52','2025-04-11 22:15:52','2'),(725,12,17,1,'2025-04-11 22:15:52','2025-04-11 22:15:52','2'),(726,12,43,5,'2025-04-11 22:15:52','2025-04-11 22:15:52','3'),(727,12,48,4,'2025-04-11 22:15:52','2025-04-11 22:15:52','3'),(728,12,3,3,'2025-04-11 22:15:52','2025-04-11 22:15:52','3'),(729,12,8,2,'2025-04-11 22:15:52','2025-04-11 22:15:52','3'),(730,12,13,1,'2025-04-11 22:15:52','2025-04-11 22:15:52','3'),(731,12,39,5,'2025-04-11 22:15:52','2025-04-11 22:15:52','4'),(732,12,44,4,'2025-04-11 22:15:52','2025-04-11 22:15:52','4'),(733,12,49,3,'2025-04-11 22:15:52','2025-04-11 22:15:52','4'),(734,12,4,2,'2025-04-11 22:15:52','2025-04-11 22:15:52','4'),(735,12,9,1,'2025-04-11 22:15:52','2025-04-11 22:15:52','4'),(736,12,35,5,'2025-04-11 22:15:52','2025-04-11 22:15:52','5'),(737,12,40,4,'2025-04-11 22:15:52','2025-04-11 22:15:52','5'),(738,12,45,3,'2025-04-11 22:15:52','2025-04-11 22:15:52','5'),(739,12,50,2,'2025-04-11 22:15:52','2025-04-11 22:15:52','5'),(740,12,5,1,'2025-04-11 22:15:52','2025-04-11 22:15:52','5');
/*!40000 ALTER TABLE `candidate_selections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `behaviour_assesment_score` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `value_assessment_score` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `value_assessment_completed_at` timestamp NULL DEFAULT NULL,
  `behaviour_assesment_completed_at` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidates_email_unique` (`email`),
  CONSTRAINT `candidates_chk_1` CHECK (json_valid(`behaviour_assesment_completed_at`))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (1,'Rudy','rudy@gmail.com',NULL,'$2b$12$jLXBBId/T2Y1aUvBaQpwzepesjIph3QCQBSzsneZLf8bsRgEMyfpa',NULL,NULL,'{\"compassion\":100,\"confidence\":0}','{\"Security\":60,\"Achievement\":40,\"Universalism\":24,\"Benevolence\":12,\"Conformity\":4,\"Stimulation\":56,\"Self-Direction\":48,\"Power\":36,\"Hedonism\":20}',NULL,'{\"t1\":\"2025-04-09 12:08:10\"}'),(2,'demon','demon@gmail.com',NULL,'$2y$10$oT2ZM/uax5dGqoOBo16VLOJD45rBTMx4i6SUmXs.zpHHBkUAPBAke','2024-12-19 02:05:30','2024-12-19 02:05:30','0','0',NULL,NULL),(3,'demon','demon1@gmail.com',NULL,'$2y$10$pxBjJDNlCunQMEm.RrYJdemxpSB16owazU48xC9zn5LGAu.vvmgae','2024-12-19 02:21:35','2024-12-19 02:21:35','0','0',NULL,NULL),(4,'demon','demon2@gmail.com',NULL,'$2y$10$mKPnBuZmaG1HNNTmwa1O.eRqoX241HRZMUz.ZW2hN0jVjz8cvaKAi','2024-12-19 02:23:40','2024-12-19 02:23:40','0','0',NULL,NULL),(5,'demon','demon3@gmail.com',NULL,'$2y$10$Isjz4.Ku015KBGBK7jfGCe40VESG9C8fKrUDchcsKUaJlPsEBNO..','2024-12-19 02:26:45','2024-12-19 02:26:45','0','0',NULL,NULL),(6,'Arka Stark','stark@gmail.com',NULL,'$2y$10$Ta.CtZcFabUFyKfnFMmOHuyG4obYuyASYnZPZ.0pJ1GBU46L0V0TG','2024-12-19 06:33:10','2024-12-19 06:33:10','0','0',NULL,NULL),(7,'idris ali','idrisforid@gmail.com',NULL,'$2y$10$M4rETI4BngJ1gya0JdxOFODNkbwf91lZfWo8CxCTlccFWD1DnLEuS','2025-03-05 22:00:25','2025-03-05 22:00:25','{\"compassion\":100,\"confidence\":0,\"curiosity\":100,\"practicality\":0,\"discipline\":100,\"adaptability\":0,\"resilience\":100,\"sensitivity\":0,\"sociability\":100,\"reflectiveness\":0}','{\"Achievement\":100,\"Benevolence\":60,\"Conformity\":40,\"Security\":4,\"Tradition\":16,\"Universalism\":80}','2025-04-10 23:45:01','{\"t1\":\"2025-04-10 23:13:41\",\"t2\":\"2025-04-10 22:57:06\",\"t3\":\"2025-04-10 23:53:32\",\"t4\":\"2025-04-10 23:56:45\",\"t5\":\"2025-04-11 00:04:53\"}'),(8,'khan','khan@gmail.com',NULL,'$2y$10$hA8MsmmpTQNK4GwlA3Coce/1u/YKE9JUv1mX9fYtt/BiKGm4yopTS','2025-03-10 12:25:32','2025-03-10 12:25:32','0','0',NULL,NULL),(9,'mabru','mabru@gmail.com',NULL,'$2y$10$rJf0FJ/tTqRlan0HYx4tquplepBE4VPLmEqtWTi5zJAKay50jpdt6','2025-03-10 12:35:28','2025-03-10 12:35:28','0','0',NULL,NULL),(10,'kasem','kasem@gmail.com',NULL,'$2y$10$QU3odbZImmZCSAT..15St.hG8/9OGZ6jxtUVnKl8A987Nx9FGbQrm','2025-03-10 12:41:21','2025-03-10 12:41:21','0','0',NULL,NULL),(11,'new','new@gmail.com',NULL,'$2y$10$8DTqga2VqkL.phEaLy2eRurKEyvgHvAyiPknDY0wNvsnpDbv.9uOm','2025-04-11 07:57:59','2025-04-11 07:57:59','{\"compassion\":50,\"confidence\":50,\"curiosity\":50,\"practicality\":50,\"discipline\":50,\"adaptability\":50,\"resilience\":50,\"sensitivity\":50,\"sociability\":50,\"reflectiveness\":50}',NULL,NULL,'{\"t1\":\"2025-04-12 13:19:04\",\"t2\":\"2025-04-12 13:19:30\",\"t3\":\"2025-04-12 13:19:56\",\"t4\":\"2025-04-12 13:20:20\",\"t5\":\"2025-04-12 13:20:45\"}'),(12,'new1@gmail.com','new1@gmail.com',NULL,'$2y$10$NQQ9eQRysr9wLlAK884WE.7nO9XZr4c8ZISVZJtCKjn3FE3mZjFqa','2025-04-11 08:02:32','2025-04-11 08:02:32','{\"compassion\":50,\"confidence\":50,\"curiosity\":50,\"practicality\":50,\"discipline\":50,\"adaptability\":50,\"resilience\":50,\"sensitivity\":50,\"sociability\":50,\"reflectiveness\":50}','{\"Achievement\":40,\"Benevolence\":12,\"Conformity\":4,\"Hedonism\":20,\"Power\":36,\"Security\":60,\"Self-Direction\":48,\"Stimulation\":56,\"Universalism\":24}','2025-04-13 08:04:38','{\"t1\":\"2025-04-11 14:03:38\",\"t2\":\"2025-04-11 22:48:47\",\"t3\":\"2025-04-11 22:49:14\",\"t4\":\"2025-04-11 22:49:40\",\"t5\":\"2025-04-11 22:51:01\"}');
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compassion_vs_confidence_questions`
--

DROP TABLE IF EXISTS `compassion_vs_confidence_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compassion_vs_confidence_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strongly_agree_compassion` int NOT NULL,
  `strongly_agree_confidence` int NOT NULL,
  `agree_compassion` int NOT NULL,
  `agree_confidence` int NOT NULL,
  `neutral_compassion` int NOT NULL,
  `neutral_confidence` int NOT NULL,
  `disagree_compassion` int NOT NULL,
  `disagree_confidence` int NOT NULL,
  `strongly_disagree_compassion` int NOT NULL,
  `strongly_disagree_confidence` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compassion_vs_confidence_questions`
--

LOCK TABLES `compassion_vs_confidence_questions` WRITE;
/*!40000 ALTER TABLE `compassion_vs_confidence_questions` DISABLE KEYS */;
INSERT INTO `compassion_vs_confidence_questions` VALUES (1,'I prefer focusing on building strong relationships with colleagues over asserting my ideas.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(2,'I feel most fulfilled when I can support others during challenging times.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(3,'I value creating a harmonious workplace more than influencing key decisions.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(4,'I prioritise understanding others’ perspectives over driving outcomes.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(5,'I enjoy helping others feel valued more than being the centre of attention.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(6,'I focus on creating a supportive environment for team members to succeed.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(7,'I find satisfaction in addressing others’ needs rather than promoting my own ideas.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(8,'I prioritise fostering kindness in the workplace over advocating for bold changes.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(9,'I enjoy ensuring that others feel heard and included.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(10,'I focus more on collaboration and empathy than on leading decisively.',100,0,75,25,50,50,25,75,0,100,NULL,NULL),(11,'I prefer taking charge of situations to achieve desired outcomes.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(12,'I feel more comfortable making assertive decisions than prioritising group harmony.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(13,'I value promoting my ideas over focusing on others’ emotional needs.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(14,'I thrive on influencing others to achieve ambitious goals.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(15,'I enjoy taking the lead in group settings to ensure objectives are met.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(16,'I prioritise confidently presenting my views over accommodating differing opinions.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(17,'I focus on achieving bold results more than maintaining peace within the team.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(18,'I feel energised by opportunities to stand out and lead discussions.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(19,'I value setting a clear direction for the team over ensuring emotional support.',0,100,25,75,50,50,75,25,100,0,NULL,NULL),(20,'I find satisfaction in driving innovation and progress over addressing interpersonal concerns.',0,100,25,75,50,50,75,25,100,0,NULL,NULL);
/*!40000 ALTER TABLE `compassion_vs_confidence_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compassion_vs_confidence_responses`
--

DROP TABLE IF EXISTS `compassion_vs_confidence_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compassion_vs_confidence_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `response` enum('strongly_agree','agree','neutral','disagree','strongly_disagree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `compassion_score` int NOT NULL,
  `confidence_score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compassion_vs_confidence_responses_candidate_id_foreign` (`candidate_id`),
  KEY `compassion_vs_confidence_responses_question_id_foreign` (`question_id`),
  CONSTRAINT `compassion_vs_confidence_responses_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `compassion_vs_confidence_responses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `compassion_vs_confidence_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compassion_vs_confidence_responses`
--

LOCK TABLES `compassion_vs_confidence_responses` WRITE;
/*!40000 ALTER TABLE `compassion_vs_confidence_responses` DISABLE KEYS */;
INSERT INTO `compassion_vs_confidence_responses` VALUES (66,1,6,'strongly_agree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(67,1,7,'strongly_agree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(68,1,8,'strongly_agree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(69,1,9,'strongly_agree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(70,1,10,'strongly_agree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(71,1,11,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(72,1,12,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(73,1,13,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(74,1,14,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(75,1,15,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(76,1,16,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(77,1,17,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(78,1,18,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(79,1,19,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(80,1,20,'strongly_disagree',100,0,'2025-04-09 11:07:25','2025-04-09 11:07:25'),(81,1,1,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(82,1,2,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(83,1,3,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(84,1,4,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(85,1,5,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(86,1,6,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(87,1,7,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(88,1,8,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(89,1,9,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(90,1,10,'strongly_agree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(91,1,11,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(92,1,12,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(93,1,13,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(94,1,14,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(95,1,15,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(96,1,16,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(97,1,17,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(98,1,18,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(99,1,19,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(100,1,20,'strongly_disagree',100,0,'2025-04-09 11:08:10','2025-04-09 11:08:10'),(101,7,1,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(102,7,2,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(103,7,3,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(104,7,4,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(105,7,5,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(106,7,6,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(107,7,7,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(108,7,8,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(109,7,9,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(110,7,10,'strongly_agree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(111,7,11,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(112,7,12,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(113,7,13,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(114,7,14,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(115,7,15,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(116,7,16,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(117,7,17,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(118,7,18,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(119,7,19,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(120,7,20,'strongly_disagree',100,0,'2025-04-10 21:48:42','2025-04-10 21:48:42'),(121,7,1,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(122,7,2,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(123,7,3,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(124,7,4,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(125,7,5,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(126,7,6,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(127,7,7,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(128,7,8,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(129,7,9,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(130,7,10,'strongly_agree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(131,7,11,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(132,7,12,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(133,7,13,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(134,7,14,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(135,7,15,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(136,7,16,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(137,7,17,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(138,7,18,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(139,7,19,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(140,7,20,'strongly_disagree',100,0,'2025-04-10 22:08:09','2025-04-10 22:08:09'),(141,7,1,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(142,7,2,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(143,7,3,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(144,7,4,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(145,7,5,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(146,7,6,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(147,7,7,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(148,7,8,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(149,7,9,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(150,7,10,'strongly_agree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(151,7,11,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(152,7,12,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(153,7,13,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(154,7,14,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(155,7,15,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(156,7,16,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(157,7,17,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(158,7,18,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(159,7,19,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(160,7,20,'strongly_disagree',100,0,'2025-04-10 22:13:41','2025-04-10 22:13:41'),(161,12,1,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(162,12,2,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(163,12,3,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(164,12,4,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(165,12,5,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(166,12,6,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(167,12,7,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(168,12,8,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(169,12,9,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(170,12,10,'strongly_agree',100,0,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(171,12,11,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(172,12,12,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(173,12,13,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(174,12,14,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(175,12,15,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(176,12,16,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(177,12,17,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(178,12,18,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(179,12,19,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(180,12,20,'strongly_agree',0,100,'2025-04-11 08:06:16','2025-04-11 08:06:16'),(181,12,1,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(182,12,2,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(183,12,3,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(184,12,4,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(185,12,5,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(186,12,6,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(187,12,7,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(188,12,8,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(189,12,9,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(190,12,10,'strongly_agree',100,0,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(191,12,11,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(192,12,12,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(193,12,13,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(194,12,14,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(195,12,15,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(196,12,16,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(197,12,17,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(198,12,18,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(199,12,19,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(200,12,20,'strongly_agree',0,100,'2025-04-11 08:08:06','2025-04-11 08:08:06'),(201,12,1,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(202,12,2,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(203,12,3,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(204,12,4,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(205,12,5,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(206,12,6,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(207,12,7,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(208,12,8,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(209,12,9,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(210,12,10,'strongly_agree',100,0,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(211,12,11,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(212,12,12,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(213,12,13,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(214,12,14,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(215,12,15,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(216,12,16,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(217,12,17,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(218,12,18,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(219,12,19,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(220,12,20,'strongly_agree',0,100,'2025-04-11 10:50:54','2025-04-11 10:50:54'),(221,12,1,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(222,12,2,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(223,12,3,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(224,12,4,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(225,12,5,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(226,12,6,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(227,12,7,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(228,12,8,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(229,12,9,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(230,12,10,'strongly_agree',100,0,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(231,12,11,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(232,12,12,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(233,12,13,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(234,12,14,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(235,12,15,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(236,12,16,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(237,12,17,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(238,12,18,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(239,12,19,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(240,12,20,'strongly_agree',0,100,'2025-04-11 10:57:28','2025-04-11 10:57:28'),(241,12,1,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(242,12,2,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(243,12,3,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(244,12,4,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(245,12,5,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(246,12,6,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(247,12,7,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(248,12,8,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(249,12,9,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(250,12,10,'strongly_agree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(251,12,11,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(252,12,12,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(253,12,13,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(254,12,14,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(255,12,15,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(256,12,16,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(257,12,17,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(258,12,18,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(259,12,19,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(260,12,20,'strongly_disagree',100,0,'2025-04-11 10:57:53','2025-04-11 10:57:53'),(261,12,1,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(262,12,2,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(263,12,3,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(264,12,4,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(265,12,5,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(266,12,6,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(267,12,7,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(268,12,8,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(269,12,9,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(270,12,10,'strongly_agree',100,0,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(271,12,11,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(272,12,12,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(273,12,13,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(274,12,14,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(275,12,15,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(276,12,16,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(277,12,17,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(278,12,18,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(279,12,19,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(280,12,20,'strongly_agree',0,100,'2025-04-11 13:03:38','2025-04-11 13:03:38'),(281,11,1,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(282,11,2,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(283,11,3,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(284,11,4,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(285,11,5,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(286,11,6,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(287,11,7,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(288,11,8,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(289,11,9,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(290,11,10,'strongly_agree',100,0,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(291,11,11,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(292,11,12,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(293,11,13,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(294,11,14,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(295,11,15,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(296,11,16,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(297,11,17,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(298,11,18,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(299,11,19,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(300,11,20,'strongly_agree',0,100,'2025-04-12 11:37:43','2025-04-12 11:37:43'),(301,11,1,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(302,11,2,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(303,11,3,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(304,11,4,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(305,11,5,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(306,11,6,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(307,11,7,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(308,11,8,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(309,11,9,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(310,11,10,'strongly_agree',100,0,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(311,11,11,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(312,11,12,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(313,11,13,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(314,11,14,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(315,11,15,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(316,11,16,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(317,11,17,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(318,11,18,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(319,11,19,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(320,11,20,'strongly_agree',0,100,'2025-04-12 11:43:48','2025-04-12 11:43:48'),(321,11,1,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(322,11,2,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(323,11,3,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(324,11,4,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(325,11,5,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(326,11,6,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(327,11,7,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(328,11,8,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(329,11,9,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(330,11,10,'strongly_disagree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(331,11,11,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(332,11,12,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(333,11,13,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(334,11,14,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(335,11,15,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(336,11,16,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(337,11,17,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(338,11,18,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(339,11,19,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(340,11,20,'strongly_agree',0,100,'2025-04-12 11:44:46','2025-04-12 11:44:46'),(341,11,1,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(342,11,2,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(343,11,3,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(344,11,4,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(345,11,5,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(346,11,6,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(347,11,7,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(348,11,8,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(349,11,9,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(350,11,10,'strongly_agree',100,0,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(351,11,11,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(352,11,12,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(353,11,13,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(354,11,14,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(355,11,15,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(356,11,16,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(357,11,17,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(358,11,18,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(359,11,19,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(360,11,20,'strongly_agree',0,100,'2025-04-12 11:53:27','2025-04-12 11:53:27'),(361,11,1,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(362,11,2,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(363,11,3,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(364,11,4,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(365,11,5,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(366,11,6,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(367,11,7,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(368,11,8,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(369,11,9,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(370,11,10,'strongly_agree',100,0,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(371,11,11,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(372,11,12,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(373,11,13,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(374,11,14,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(375,11,15,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(376,11,16,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(377,11,17,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(378,11,18,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(379,11,19,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(380,11,20,'strongly_agree',0,100,'2025-04-12 11:54:17','2025-04-12 11:54:17'),(381,11,1,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(382,11,2,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(383,11,3,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(384,11,4,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(385,11,5,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(386,11,6,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(387,11,7,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(388,11,8,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(389,11,9,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(390,11,10,'strongly_agree',100,0,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(391,11,11,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(392,11,12,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(393,11,13,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(394,11,14,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(395,11,15,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(396,11,16,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(397,11,17,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(398,11,18,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(399,11,19,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(400,11,20,'strongly_agree',0,100,'2025-04-12 11:56:23','2025-04-12 11:56:23'),(401,11,1,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(402,11,2,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(403,11,3,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(404,11,4,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(405,11,5,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(406,11,6,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(407,11,7,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(408,11,8,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(409,11,9,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(410,11,10,'strongly_agree',100,0,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(411,11,11,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(412,11,12,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(413,11,13,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(414,11,14,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(415,11,15,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(416,11,16,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(417,11,17,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(418,11,18,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(419,11,19,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(420,11,20,'strongly_agree',0,100,'2025-04-12 12:18:03','2025-04-12 12:18:03'),(421,11,1,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(422,11,2,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(423,11,3,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(424,11,4,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(425,11,5,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(426,11,6,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(427,11,7,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(428,11,8,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(429,11,9,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(430,11,10,'strongly_agree',100,0,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(431,11,11,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(432,11,12,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(433,11,13,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(434,11,14,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(435,11,15,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(436,11,16,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(437,11,17,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(438,11,18,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(439,11,19,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04'),(440,11,20,'strongly_agree',0,100,'2025-04-12 12:19:04','2025-04-12 12:19:04');
/*!40000 ALTER TABLE `compassion_vs_confidence_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curiosity_vs_practicality_questions`
--

DROP TABLE IF EXISTS `curiosity_vs_practicality_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curiosity_vs_practicality_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strongly_agree_curiosity` int NOT NULL,
  `strongly_agree_practicality` int NOT NULL,
  `agree_curiosity` int NOT NULL,
  `agree_practicality` int NOT NULL,
  `neutral_curiosity` int NOT NULL,
  `neutral_practicality` int NOT NULL,
  `disagree_curiosity` int NOT NULL,
  `disagree_practicality` int NOT NULL,
  `strongly_disagree_curiosity` int NOT NULL,
  `strongly_disagree_practicality` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curiosity_vs_practicality_questions`
--

LOCK TABLES `curiosity_vs_practicality_questions` WRITE;
/*!40000 ALTER TABLE `curiosity_vs_practicality_questions` DISABLE KEYS */;
INSERT INTO `curiosity_vs_practicality_questions` VALUES (1,'I prefer exploring new methods over relying on tried-and-true processes.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(2,'I enjoy experimenting with creative ideas more than focusing on practical implementation.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(3,'I value innovation over ensuring efficiency in routine tasks.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(4,'I prioritise brainstorming bold solutions over refining current systems.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(5,'I feel more energised by discovering possibilities than by meeting immediate goals.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(6,'I enjoy envisioning future strategies more than addressing present needs.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(7,'I would rather learn through trial and error than apply proven approaches.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(8,'I focus more on imagining what could be than on improving what already works.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(9,'I prefer diving into uncharted territory over staying within familiar frameworks.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(10,'I thrive on generating fresh ideas rather than executing dependable plans.',100,0,75,25,50,50,25,75,0,100,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(11,'I prefer managing immediate outcomes over pursuing long-term insights.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(12,'I value asking \"how\" and \"when\" more than \"why\" and \"what if.\"',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(13,'I would rather ensure the task is completed quickly than invest time exploring options.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(14,'I prioritise procedural reliability over intellectual curiosity.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(15,'I feel more satisfaction from delivering predictable results than from innovation.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(16,'I enjoy solving tangible problems more than working with abstract concepts.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(17,'I focus on optimising present-day efficiencies more than imagining future scenarios.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(18,'I would rather confirm current practices than challenge assumptions.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(19,'I find satisfaction in ensuring standardisation over challenging conventions.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39'),(20,'I feel inspired by resolving the known more than exploring unknowns.',0,100,25,75,50,50,75,25,100,0,'2025-04-05 17:31:39','2025-04-05 17:31:39');
/*!40000 ALTER TABLE `curiosity_vs_practicality_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curiosity_vs_practicality_responses`
--

DROP TABLE IF EXISTS `curiosity_vs_practicality_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curiosity_vs_practicality_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `response` enum('strongly_agree','agree','neutral','disagree','strongly_disagree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `curiosity_score` int NOT NULL,
  `practicality_score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curiosity_vs_practicality_responses_candidate_id_foreign` (`candidate_id`),
  KEY `curiosity_vs_practicality_responses_question_id_foreign` (`question_id`),
  CONSTRAINT `curiosity_vs_practicality_responses_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `curiosity_vs_practicality_responses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `curiosity_vs_practicality_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curiosity_vs_practicality_responses`
--

LOCK TABLES `curiosity_vs_practicality_responses` WRITE;
/*!40000 ALTER TABLE `curiosity_vs_practicality_responses` DISABLE KEYS */;
INSERT INTO `curiosity_vs_practicality_responses` VALUES (81,7,1,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(82,7,2,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(83,7,3,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(84,7,4,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(85,7,5,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(86,7,6,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(87,7,7,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(88,7,8,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(89,7,9,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(90,7,10,'strongly_agree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(91,7,11,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(92,7,12,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(93,7,13,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(94,7,14,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(95,7,15,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(96,7,16,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(97,7,17,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(98,7,18,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(99,7,19,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(100,7,20,'strongly_disagree',100,0,'2025-04-10 21:57:06','2025-04-10 21:57:06'),(101,12,1,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(102,12,2,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(103,12,3,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(104,12,4,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(105,12,5,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(106,12,6,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(107,12,7,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(108,12,8,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(109,12,9,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(110,12,10,'strongly_agree',100,0,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(111,12,11,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(112,12,12,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(113,12,13,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(114,12,14,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(115,12,15,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(116,12,16,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(117,12,17,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(118,12,18,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(119,12,19,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(120,12,20,'strongly_agree',0,100,'2025-04-11 10:00:40','2025-04-11 10:00:40'),(121,12,1,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(122,12,2,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(123,12,3,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(124,12,4,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(125,12,5,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(126,12,6,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(127,12,7,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(128,12,8,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(129,12,9,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(130,12,10,'strongly_agree',100,0,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(131,12,11,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(132,12,12,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(133,12,13,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(134,12,14,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(135,12,15,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(136,12,16,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(137,12,17,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(138,12,18,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(139,12,19,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(140,12,20,'strongly_agree',0,100,'2025-04-11 21:48:47','2025-04-11 21:48:47'),(141,11,1,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(142,11,2,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(143,11,3,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(144,11,4,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(145,11,5,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(146,11,6,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(147,11,7,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(148,11,8,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(149,11,9,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(150,11,10,'strongly_agree',100,0,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(151,11,11,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(152,11,12,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(153,11,13,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(154,11,14,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(155,11,15,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(156,11,16,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(157,11,17,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(158,11,18,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(159,11,19,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(160,11,20,'strongly_agree',0,100,'2025-04-12 11:38:10','2025-04-12 11:38:10'),(161,11,1,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(162,11,2,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(163,11,3,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(164,11,4,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(165,11,5,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(166,11,6,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(167,11,7,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(168,11,8,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(169,11,9,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(170,11,10,'strongly_disagree',0,100,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(171,11,11,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(172,11,12,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(173,11,13,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(174,11,14,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(175,11,15,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(176,11,16,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(177,11,17,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(178,11,18,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(179,11,19,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(180,11,20,'strongly_disagree',100,0,'2025-04-12 12:18:28','2025-04-12 12:18:28'),(181,11,1,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(182,11,2,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(183,11,3,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(184,11,4,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(185,11,5,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(186,11,6,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(187,11,7,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(188,11,8,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(189,11,9,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(190,11,10,'strongly_agree',100,0,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(191,11,11,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(192,11,12,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(193,11,13,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(194,11,14,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(195,11,15,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(196,11,16,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(197,11,17,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(198,11,18,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(199,11,19,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30'),(200,11,20,'strongly_agree',0,100,'2025-04-12 12:19:30','2025-04-12 12:19:30');
/*!40000 ALTER TABLE `curiosity_vs_practicality_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discipline_vs_adaptability_questions`
--

DROP TABLE IF EXISTS `discipline_vs_adaptability_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discipline_vs_adaptability_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strongly_agree_discipline` int NOT NULL,
  `strongly_agree_adaptability` int NOT NULL,
  `agree_discipline` int NOT NULL,
  `agree_adaptability` int NOT NULL,
  `neutral_discipline` int NOT NULL,
  `neutral_adaptability` int NOT NULL,
  `disagree_discipline` int NOT NULL,
  `disagree_adaptability` int NOT NULL,
  `strongly_disagree_discipline` int NOT NULL,
  `strongly_disagree_adaptability` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discipline_vs_adaptability_questions`
--

LOCK TABLES `discipline_vs_adaptability_questions` WRITE;
/*!40000 ALTER TABLE `discipline_vs_adaptability_questions` DISABLE KEYS */;
INSERT INTO `discipline_vs_adaptability_questions` VALUES (21,'I prefer following structured plans over adjusting to unexpected changes.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(22,'I value meeting deadlines consistently more than modifying priorities on the go.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(23,'I would rather complete tasks systematically than improvise under pressure.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(24,'I focus on maintaining order over embracing dynamic changes.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(25,'I prioritise sticking to plans over adapting them to new circumstances.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(26,'I feel more comfortable with predictability than flexibility.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(27,'I enjoy adhering to rules over bending them to meet unique challenges.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(28,'I prioritise long-term strategies over quick pivots to short-term needs.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(29,'I feel more confident working in stable environments than in fast-changing ones.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(30,'I prefer sticking to clear routines over exploring spontaneous alternatives.',100,0,75,25,50,50,25,75,0,100,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(31,'I focus more on adjusting to shifting demands than maintaining consistency.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(32,'I would rather take risks to innovate than focus on following guidelines.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(33,'I thrive in environments where expectations are unpredictable rather than stable.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(34,'I prefer reworking projects to address new input over staying the course.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(35,'I would rather try something untested than ensure a job is done as expected.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(36,'I enjoy environments where roles are fluid more than where structure is clear.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(37,'I feel more comfortable adjusting established procedures to fit new challenges than working with them as they are.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(38,'I prefer improvising solutions to unexpected issues over sticking to predefined methods.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(39,'I find satisfaction in adapting to evolving scenarios more than achieving planned goals.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00'),(40,'I prioritise exploring unforeseen opportunities over steady progress.',0,100,25,75,50,50,75,25,100,0,'2025-04-10 22:41:00','2025-04-10 22:41:00');
/*!40000 ALTER TABLE `discipline_vs_adaptability_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discipline_vs_adaptability_responses`
--

DROP TABLE IF EXISTS `discipline_vs_adaptability_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discipline_vs_adaptability_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `response` enum('strongly_agree','agree','neutral','disagree','strongly_disagree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discipline_score` int NOT NULL,
  `adaptability_score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discipline_vs_adaptability_responses_candidate_id_foreign` (`candidate_id`),
  KEY `discipline_vs_adaptability_responses_question_id_foreign` (`question_id`),
  CONSTRAINT `discipline_vs_adaptability_responses_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `discipline_vs_adaptability_responses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `discipline_vs_adaptability_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discipline_vs_adaptability_responses`
--

LOCK TABLES `discipline_vs_adaptability_responses` WRITE;
/*!40000 ALTER TABLE `discipline_vs_adaptability_responses` DISABLE KEYS */;
INSERT INTO `discipline_vs_adaptability_responses` VALUES (81,7,21,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(82,7,22,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(83,7,23,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(84,7,24,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(85,7,25,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(86,7,26,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(87,7,27,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(88,7,28,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(89,7,29,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(90,7,30,'strongly_agree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(91,7,31,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(92,7,32,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(93,7,33,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(94,7,34,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(95,7,35,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(96,7,36,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(97,7,37,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(98,7,38,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(99,7,39,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(100,7,40,'strongly_disagree',100,0,'2025-04-10 22:41:39','2025-04-10 22:41:39'),(101,7,21,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(102,7,22,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(103,7,23,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(104,7,24,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(105,7,25,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(106,7,26,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(107,7,27,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(108,7,28,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(109,7,29,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(110,7,30,'strongly_agree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(111,7,31,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(112,7,32,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(113,7,33,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(114,7,34,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(115,7,35,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(116,7,36,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(117,7,37,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(118,7,38,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(119,7,39,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(120,7,40,'strongly_disagree',100,0,'2025-04-10 22:53:32','2025-04-10 22:53:32'),(121,12,21,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(122,12,22,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(123,12,23,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(124,12,24,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(125,12,25,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(126,12,26,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(127,12,27,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(128,12,28,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(129,12,29,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(130,12,30,'strongly_agree',100,0,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(131,12,31,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(132,12,32,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(133,12,33,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(134,12,34,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(135,12,35,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(136,12,36,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(137,12,37,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(138,12,38,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(139,12,39,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(140,12,40,'strongly_agree',0,100,'2025-04-11 08:09:20','2025-04-11 08:09:20'),(141,12,21,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(142,12,22,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(143,12,23,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(144,12,24,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(145,12,25,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(146,12,26,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(147,12,27,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(148,12,28,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(149,12,29,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(150,12,30,'strongly_agree',100,0,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(151,12,31,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(152,12,32,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(153,12,33,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(154,12,34,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(155,12,35,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(156,12,36,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(157,12,37,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(158,12,38,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(159,12,39,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(160,12,40,'strongly_agree',0,100,'2025-04-11 21:49:14','2025-04-11 21:49:14'),(161,11,21,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(162,11,22,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(163,11,23,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(164,11,24,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(165,11,25,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(166,11,26,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(167,11,27,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(168,11,28,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(169,11,29,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(170,11,30,'strongly_agree',100,0,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(171,11,31,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(172,11,32,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(173,11,33,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(174,11,34,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(175,11,35,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(176,11,36,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(177,11,37,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(178,11,38,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(179,11,39,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(180,11,40,'strongly_agree',0,100,'2025-04-12 11:38:37','2025-04-12 11:38:37'),(181,11,21,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(182,11,22,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(183,11,23,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(184,11,24,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(185,11,25,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(186,11,26,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(187,11,27,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(188,11,28,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(189,11,29,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(190,11,30,'strongly_agree',100,0,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(191,11,31,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(192,11,32,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(193,11,33,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(194,11,34,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(195,11,35,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(196,11,36,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(197,11,37,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(198,11,38,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(199,11,39,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56'),(200,11,40,'strongly_agree',0,100,'2025-04-12 12:19:56','2025-04-12 12:19:56');
/*!40000 ALTER TABLE `discipline_vs_adaptability_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_selections`
--

DROP TABLE IF EXISTS `employer_selections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employer_selections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_member_id` bigint unsigned NOT NULL,
  `value_word_id` bigint unsigned NOT NULL,
  `score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_selections`
--

LOCK TABLES `employer_selections` WRITE;
/*!40000 ALTER TABLE `employer_selections` DISABLE KEYS */;
INSERT INTO `employer_selections` VALUES (251,84,46,5,'2025-04-16 13:33:18','2025-04-16 13:33:18','1'),(252,84,36,4,'2025-04-16 13:33:18','2025-04-16 13:33:18','1'),(253,84,41,3,'2025-04-16 13:33:18','2025-04-16 13:33:18','1'),(254,84,1,2,'2025-04-16 13:33:18','2025-04-16 13:33:18','1'),(255,84,6,1,'2025-04-16 13:33:18','2025-04-16 13:33:18','1'),(256,84,7,5,'2025-04-16 13:33:18','2025-04-16 13:33:18','2'),(257,84,2,4,'2025-04-16 13:33:18','2025-04-16 13:33:18','2'),(258,84,47,3,'2025-04-16 13:33:18','2025-04-16 13:33:18','2'),(259,84,42,2,'2025-04-16 13:33:18','2025-04-16 13:33:18','2'),(260,84,32,1,'2025-04-16 13:33:18','2025-04-16 13:33:18','2'),(261,84,13,5,'2025-04-16 13:33:18','2025-04-16 13:33:18','3'),(262,84,18,4,'2025-04-16 13:33:18','2025-04-16 13:33:18','3'),(263,84,23,3,'2025-04-16 13:33:18','2025-04-16 13:33:18','3'),(264,84,8,2,'2025-04-16 13:33:18','2025-04-16 13:33:18','3'),(265,84,3,1,'2025-04-16 13:33:18','2025-04-16 13:33:18','3'),(266,84,49,5,'2025-04-16 13:33:18','2025-04-16 13:33:18','4'),(267,84,4,4,'2025-04-16 13:33:18','2025-04-16 13:33:18','4'),(268,84,9,3,'2025-04-16 13:33:18','2025-04-16 13:33:18','4'),(269,84,14,2,'2025-04-16 13:33:18','2025-04-16 13:33:18','4'),(270,84,19,1,'2025-04-16 13:33:18','2025-04-16 13:33:18','4'),(271,84,40,5,'2025-04-16 13:33:18','2025-04-16 13:33:18','5'),(272,84,45,4,'2025-04-16 13:33:18','2025-04-16 13:33:18','5'),(273,84,50,3,'2025-04-16 13:33:18','2025-04-16 13:33:18','5'),(274,84,5,2,'2025-04-16 13:33:18','2025-04-16 13:33:18','5'),(275,84,10,1,'2025-04-16 13:33:18','2025-04-16 13:33:18','5');
/*!40000 ALTER TABLE `employer_selections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employers`
--

DROP TABLE IF EXISTS `employers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` text COLLATE utf8mb4_unicode_ci,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `about_us` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employees_count` int DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `employers_chk_1` CHECK (json_valid(`social_links`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employers`
--

LOCK TABLES `employers` WRITE;
/*!40000 ALTER TABLE `employers` DISABLE KEYS */;
INSERT INTO `employers` VALUES (1,'Rudy F','rudy@gmail.com','$2y$10$.4YVK5KfCN6GKsgg3bbGaOxxkA1V/ZyfMN.MHtOKInInDusC2sgqy','Align','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','logos/wRHOZbAbeTcdqyeglxOb0LfBrIumg6J7XOxIEQRx.jpg','+44 20 7946 9999','1234 London St, London, UK','{\"facebook\": \"https://facebook.com/align\", \"instagram\": \"https://instagram.com/align\"}','Align is a company focused on skills training & development',NULL,'2025-01-03 12:57:53','Recruitment','2024',5,'https://alignmyskills.com'),(4,'rudy','jykju@ghj','$2y$10$ghNVz8ALa7ZoCelG6yXh8.0FHkSDRgkSjL3MUmBnI4q5s.KhZ18/m','grg',NULL,NULL,NULL,NULL,'\"[]\"',NULL,'2025-01-02 15:03:12','2025-01-02 15:03:12',NULL,NULL,NULL,NULL),(5,'najmul','najmul@gmail.com','$2y$10$o19Sq4JkOrYIQSLKhQPaHOtr9yZsBfYz/wET0cC7rmC7XwSS8VuEq','habijabi',NULL,NULL,NULL,NULL,'\"[]\"',NULL,'2025-03-11 17:01:30','2025-03-11 17:01:30',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `employers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hours`
--

DROP TABLE IF EXISTS `hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hours` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours`
--

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
INSERT INTO `hours` VALUES (1,1,'Standard',NULL,NULL),(2,2,'Flexible',NULL,NULL);
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industries` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `industries` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industries`
--

LOCK TABLES `industries` WRITE;
/*!40000 ALTER TABLE `industries` DISABLE KEYS */;
INSERT INTO `industries` VALUES (1,1,'Technology',NULL,NULL),(2,2,'Finance',NULL,NULL),(3,3,'HealthCare',NULL,NULL),(4,4,'Education',NULL,NULL),(5,5,'Other',NULL,NULL);
/*!40000 ALTER TABLE `industries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_applieds`
--

DROP TABLE IF EXISTS `job_applieds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_applieds` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `job_post_id` int NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_id` int NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `save_applicant` int DEFAULT NULL,
  `first_interview` int DEFAULT NULL,
  `first_interview_date` datetime DEFAULT NULL,
  `second_interview` int DEFAULT NULL,
  `second_interview_date` datetime DEFAULT NULL,
  `third_interview` int DEFAULT NULL,
  `third_interview_date` datetime DEFAULT NULL,
  `offerletter` int DEFAULT NULL,
  `offerletter_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_offerletter` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_applieds`
--

LOCK TABLES `job_applieds` WRITE;
/*!40000 ALTER TABLE `job_applieds` DISABLE KEYS */;
INSERT INTO `job_applieds` VALUES (1,23,4,'programmer',1,'rudy',1,1,'2025-01-30 23:02:00',2,'2025-01-30 23:04:00',3,'2025-01-30 23:05:00',1,'congo, you are hired',1,'2024-12-25 23:44:10','2025-01-30 23:04:37'),(2,24,5,'security',2,'kashem',1,NULL,NULL,NULL,NULL,3,'2025-01-30 23:05:00',NULL,NULL,NULL,'2024-12-25 23:44:15','2025-01-05 01:51:22'),(3,25,6,'software',1,'rudy',1,1,'2025-03-13 14:16:00',2,'2025-03-29 16:20:00',NULL,NULL,NULL,NULL,NULL,'2024-12-25 23:44:17','2024-12-25 23:44:17');
/*!40000 ALTER TABLE `job_applieds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_locations`
--

DROP TABLE IF EXISTS `job_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_locations` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_locations`
--

LOCK TABLES `job_locations` WRITE;
/*!40000 ALTER TABLE `job_locations` DISABLE KEYS */;
INSERT INTO `job_locations` VALUES (1,1,'Remote',NULL,NULL),(2,2,'Onsite',NULL,NULL),(3,3,'Hybrid',NULL,NULL);
/*!40000 ALTER TABLE `job_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_posts`
--

DROP TABLE IF EXISTS `job_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_posts` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `employer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_post_id` int NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_level_id` int NOT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_id` int NOT NULL,
  `job_location_id` int NOT NULL,
  `working_pattern_id` int NOT NULL,
  `hours_id` int NOT NULL,
  `sponsorship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_id` int NOT NULL,
  `role_exists_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_exists_involve` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int DEFAULT NULL,
  `approve` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_posts`
--

LOCK TABLES `job_posts` WRITE;
/*!40000 ALTER TABLE `job_posts` DISABLE KEYS */;
INSERT INTO `job_posts` VALUES (1,4,'xyx','hsbc',8789,'programmer',3,'50k-100k',3,2,2,2,'Yes',3,'it\'s a good job','it\'s a good job',NULL,1,'2024-11-08 23:10:30','2024-11-21 12:17:15'),(2,5,'manam','mnm',6386,'security specialist',2,'50k-100k',3,2,2,2,'Yes',3,'good job','good job',NULL,1,'2024-11-12 23:02:17','2024-11-21 12:17:20'),(3,6,'xyz','hsbc',2891,'software engineer',3,'50k-100k',1,2,2,2,'Yes',1,'it\'s a good job','it\'s a good job',NULL,1,'2024-11-13 17:28:37','2024-11-21 12:17:21'),(4,7,'jabri','jabri',130,'jabri',2,'50k-100k',2,2,2,2,'Yes',3,'jabri','jabri',NULL,0,'2024-11-15 21:48:58','2024-11-20 16:04:44'),(5,8,'uhuhiu','iuhihuihu',7721,'jkjlkj',3,'50k-100k',3,2,2,2,'Yes',3,'ijijijo','kjkjhkjh',NULL,1,'2024-11-16 16:29:24','2024-11-16 16:29:24'),(6,9,'refref','frefre',5142,'frefre',3,'50k-100k',2,2,2,2,'Yes',3,'erfref','refref',NULL,1,'2024-11-21 12:34:11','2024-11-21 12:34:11'),(7,10,'fdsdfds','dsfdsf',9868,'dsfdsf',3,'50k-100k',1,2,2,2,'Yes',4,'sdfdsf','sdfdsf',NULL,0,'2024-11-24 21:21:01','2024-12-13 01:22:40');
/*!40000 ALTER TABLE `job_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employer_id` bigint unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `benefits` text COLLATE utf8mb4_unicode_ci,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seniority_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `visa_sponsorship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,2,'q',NULL,'a','AAAAAAAAAAAAAAA','w','w','q','q','London','q','q','2025-01-05','q','2024-12-23 23:27:00','2024-12-24 01:06:16'),(2,2,'q',NULL,'q','q','w','w','q','q','q','q','q',NULL,'q','2024-12-23 23:28:04','2024-12-23 23:28:04'),(3,2,'q',NULL,'q','q','q','q','q','q','q','q','q',NULL,'q','2024-12-23 23:29:51','2024-12-23 23:29:51'),(4,2,'q',NULL,'q','jbiscbi','jbcibbd','asbcjasb','Below $50k','Senior','London, ENGLAND','Hybrid','Healthcare',NULL,'Yes','2024-12-23 23:40:56','2024-12-23 23:40:56'),(5,2,'q',NULL,'q','abc','q','q','$50k-$100k','Junior','Lon','Hybrid','Technology',NULL,'No','2024-12-23 23:45:36','2024-12-24 00:55:17'),(6,2,'q',NULL,'q','q','q','q','Below $50k','Mid','q','Remote','Healthcare','2025-01-05','Yes','2024-12-24 00:01:37','2024-12-24 00:01:37'),(7,1,'q',NULL,'q','q','q','q','$50k-$100k','Senior','q','Hybrid','Technology','2025-01-05','Yes','2024-12-24 13:48:46','2024-12-24 13:48:46'),(8,1,'Align',NULL,'Developerss','Align','Align','Align','$50k-$100k','Junior','London','On-site','Technology','2025-01-05','Yes','2024-12-24 13:50:29','2025-01-30 17:44:27');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membership` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_post_limit` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership`
--

LOCK TABLES `membership` WRITE;
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
INSERT INTO `membership` VALUES (1,1,'basic',5,NULL,NULL),(2,2,'premium',10,NULL,NULL),(3,3,'vip',15,NULL,NULL);
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2024_10_11_150914_create_employers_table',1),(6,'2024_10_16_162603_create_candidates_table',1),(7,'2024_10_24_194605_create_seniority_levels_table',1),(8,'2024_10_24_195031_create_salary__ranges_table',1),(9,'2024_10_24_195115_create_industries_table',1),(10,'2024_10_24_195303_create_hours_table',1),(11,'2024_10_24_195342_create_skill__lists_table',1),(12,'2024_10_28_005536_create_admins_table',1),(13,'2024_11_23_091145_add_profile_details_to_employers_table',1),(20,'2019_12_14_000001_create_personal_access_tokens_table',2),(21,'2024_12_18_200327_create_jobs_table',2),(22,'2024_12_18_200458_create_job_locations_table',2),(23,'2024_12_18_200536_create_skills_table',2),(24,'2024_12_18_200608_create_working_patterns_table',2),(25,'2024_12_18_200637_create_salary_ranges_table',2),(26,'2024_12_18_200727_create_industries_table',3),(27,'2024_12_18_200758_create_job_post_skills_table',3),(28,'2024_12_18_200829_create_job_posts_table',3),(29,'2024_12_18_212107_create_seniority_levels_table',4),(30,'2024_12_18_221440_rename_industries_to_industry',5),(31,'2024_12_18_225647_rename_job_locations_table',6),(32,'2024_12_18_230402_rename_working_patterns_table',7),(33,'2024_12_18_232845_add_columns_to_jobs_table',8),(34,'2024_12_19_001320_create_jobs_table',9),(35,'2024_12_19_030030_add_membership_type_to_employers_table',10),(36,'2024_12_19_033459_create_employers_table',11),(37,'2024_12_19_172249_add_profile_fields_to_employers_table',12),(38,'2024_12_20_214434_create_company_profiles_table',13),(39,'2024_12_20_220201_create_company_profiles_table',14),(40,'2024_12_21_142322_add_employers_name_and_company_name_to_employers_table',15),(41,'2024_12_21_203436_add_company_overview_fields_to_employers_table',16),(42,'2024_12_21_204048_add_company_website_field_to_employers_table',17),(43,'2024_12_25_014307_add_foreign_key_to_team_members',18),(44,'2025_02_13_210047_create_values_table',19),(45,'2025_02_13_210249_create_words_table',19),(46,'2025_02_13_210428_create_batches_table',19),(47,'2025_02_13_210457_create_batch_word_table',19),(48,'2025_02_13_210745_create_user_responses_table',19),(49,'2025_02_14_130356_create_values_assessments_table',20),(50,'2025_02_18_235504_create_quiz_results_table',21),(51,'2025_03_23_123839_create_value_words_table',22),(52,'2025_03_23_142041_create_quiz_pages_table',22),(53,'2025_03_23_142141_create_candidate_selections_table',22),(54,'2025_03_29_112545_create_sociability_vs_reflectiveness_questions_table',23),(55,'2025_03_29_113231_create_sociability_vs_reflectiveness_responses_table',23),(56,'2025_04_01_201431_create_resilience_vs_sensitivity_questions_table',24),(57,'2025_04_01_201903_create_resilience_vs_sensitivity_responses_table',24),(58,'2025_04_05_133531_create_discipline_vs_adaptability_questions_table',25),(59,'2025_04_05_133821_create_discipline_vs_adaptability_responses_table',25),(60,'2025_04_05_162832_create_curiosity_vs_practicality_questions_table',26),(61,'2025_04_05_162945_create_curiosity_vs_practicality_responses_table',26),(62,'2025_04_05_195716_create_compassion_vs_confidence_questions_table',27),(63,'2025_04_05_195739_create_compassion_vs_confidence_responses_table',27),(64,'2025_04_13_190834_create_team_member_assessment_links_table',28);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_pages`
--

DROP TABLE IF EXISTS `quiz_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page` tinyint unsigned NOT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_pages`
--

LOCK TABLES `quiz_pages` WRITE;
/*!40000 ALTER TABLE `quiz_pages` DISABLE KEYS */;
INSERT INTO `quiz_pages` VALUES (1,1,'Variety','2025-03-24 16:17:29','2025-03-24 16:17:29'),(2,1,'Stability','2025-03-24 16:17:29','2025-03-24 16:17:29'),(3,1,'Ambition','2025-03-24 16:17:29','2025-03-24 16:17:29'),(4,1,'Equality','2025-03-24 16:17:29','2025-03-24 16:17:29'),(5,1,'Kindness','2025-03-24 16:17:29','2025-03-24 16:17:29'),(6,1,'Obedience','2025-03-24 16:17:29','2025-03-24 16:17:29'),(7,1,'Heritage','2025-03-24 16:17:29','2025-03-24 16:17:29'),(8,1,'Pleasure','2025-03-24 16:17:29','2025-03-24 16:17:29'),(9,1,'Authority','2025-03-24 16:17:29','2025-03-24 16:17:29'),(10,1,'Autonomy','2025-03-24 16:17:29','2025-03-24 16:17:29'),(11,2,'Freedom','2025-03-24 16:17:29','2025-03-24 16:17:29'),(12,2,'Challenge','2025-03-24 16:17:29','2025-03-24 16:17:29'),(13,2,'Reliability','2025-03-24 16:17:29','2025-03-24 16:17:29'),(14,2,'Success','2025-03-24 16:17:29','2025-03-24 16:17:29'),(15,2,'Justice','2025-03-24 16:17:29','2025-03-24 16:17:29'),(16,2,'Care','2025-03-24 16:17:29','2025-03-24 16:17:29'),(17,2,'Harmony','2025-03-24 16:17:29','2025-03-24 16:17:29'),(18,2,'Customs','2025-03-24 16:17:29','2025-03-24 16:17:29'),(19,2,'Fun','2025-03-24 16:17:29','2025-03-24 16:17:29'),(20,2,'Influence','2025-03-24 16:17:29','2025-03-24 16:17:29'),(21,3,'Leadership','2025-03-24 16:17:29','2025-03-24 16:17:29'),(22,3,'Independence','2025-03-24 16:17:29','2025-03-24 16:17:29'),(23,3,'Adventure','2025-03-24 16:17:29','2025-03-24 16:17:29'),(24,3,'Predictability','2025-03-24 16:17:29','2025-03-24 16:17:29'),(25,3,'Accomplishment','2025-03-24 16:17:29','2025-03-24 16:17:29'),(26,3,'Protection','2025-03-24 16:17:29','2025-03-24 16:17:29'),(27,3,'Compassion','2025-03-24 16:17:29','2025-03-24 16:17:29'),(28,3,'Structure','2025-03-24 16:17:29','2025-03-24 16:17:29'),(29,3,'Rituals','2025-03-24 16:17:29','2025-03-24 16:17:29'),(30,3,'Playfulness','2025-03-24 16:17:29','2025-03-24 16:17:29'),(31,4,'Enjoyment','2025-03-24 16:17:29','2025-03-24 16:17:29'),(32,4,'Control','2025-03-24 16:17:29','2025-03-24 16:17:29'),(33,4,'Individuality','2025-03-24 16:17:29','2025-03-24 16:17:29'),(34,4,'Novelty','2025-03-24 16:17:29','2025-03-24 16:17:29'),(35,4,'Comfort','2025-03-24 16:17:29','2025-03-24 16:17:29'),(36,4,'Recognition','2025-03-24 16:17:29','2025-03-24 16:17:29'),(37,4,'Fairness','2025-03-24 16:17:29','2025-03-24 16:17:29'),(38,4,'Generosity','2025-03-24 16:17:29','2025-03-24 16:17:29'),(39,4,'Order','2025-03-24 16:17:29','2025-03-24 16:17:29'),(40,4,'Preservation','2025-03-24 16:17:29','2025-03-24 16:17:29'),(41,5,'Lineage','2025-03-24 16:17:29','2025-03-24 16:17:29'),(42,5,'Gratification','2025-03-24 16:17:29','2025-03-24 16:17:29'),(43,5,'Status','2025-03-24 16:17:29','2025-03-24 16:17:29'),(44,5,'Self-Expression','2025-03-24 16:17:29','2025-03-24 16:17:29'),(45,5,'Excitement','2025-03-24 16:17:29','2025-03-24 16:17:29'),(46,5,'Risk Avoidance','2025-03-24 16:17:29','2025-03-24 16:17:29'),(47,5,'Excellence','2025-03-24 16:17:29','2025-03-24 16:17:29'),(48,5,'Understanding','2025-03-24 16:17:29','2025-03-24 16:17:29'),(49,5,'Support','2025-03-24 16:17:29','2025-03-24 16:17:29'),(50,5,'Respect','2025-03-24 16:17:29','2025-03-24 16:17:29');
/*!40000 ALTER TABLE `quiz_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_results`
--

DROP TABLE IF EXISTS `quiz_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scores` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `quiz_results_chk_1` CHECK (json_valid(`scores`))
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_results`
--

LOCK TABLES `quiz_results` WRITE;
/*!40000 ALTER TABLE `quiz_results` DISABLE KEYS */;
INSERT INTO `quiz_results` VALUES (1,'{\"stimulation\":20,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":4,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-19 00:22:07','2025-02-19 00:22:07'),(2,'{\"stimulation\":20,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":4,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-19 00:23:49','2025-02-19 00:23:49'),(3,'{\"stimulation\":20,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":4,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-19 00:24:37','2025-02-19 00:24:37'),(4,'{\"stimulation\":20,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":4,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-19 00:27:23','2025-02-19 00:27:23'),(5,'{\"stimulation\":20,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":4,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-19 00:43:31','2025-02-19 00:43:31'),(6,'{\"stimulation\":20,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":4,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-19 21:42:50','2025-02-19 21:42:50'),(7,'{\"stimulation\":16,\"security\":16,\"achievement\":12,\"universalism\":8,\"benevolence\":8,\"self-direction\":16,\"power\":12,\"hedonism\":8,\"tradition\":4}','2025-02-27 22:48:34','2025-02-27 22:48:34'),(8,'{\"universalism\":4,\"tradition\":12,\"hedonism\":16,\"power\":20,\"self-direction\":16,\"achievement\":8,\"conformity\":4,\"stimulation\":8,\"security\":8,\"benevolence\":4}','2025-02-27 22:49:31','2025-02-27 22:49:31'),(9,'{\"stimulation\":12,\"security\":8,\"achievement\":16,\"universalism\":12,\"benevolence\":16,\"tradition\":8,\"power\":8,\"conformity\":8,\"hedonism\":4,\"self-direction\":8}','2025-02-28 09:56:53','2025-02-28 09:56:53'),(10,'{\"stimulation\":12,\"achievement\":12,\"universalism\":12,\"tradition\":12,\"hedonism\":16,\"self-direction\":8,\"conformity\":8,\"power\":8,\"security\":4,\"benevolence\":8}','2025-02-28 10:03:24','2025-02-28 10:03:24'),(11,'{\"stimulation\":12,\"achievement\":12,\"universalism\":12,\"tradition\":12,\"hedonism\":16,\"self-direction\":8,\"conformity\":8,\"power\":8,\"security\":4,\"benevolence\":8}','2025-02-28 10:03:25','2025-02-28 10:03:25'),(12,'{\"stimulation\":12,\"achievement\":12,\"universalism\":12,\"tradition\":12,\"hedonism\":16,\"self-direction\":8,\"conformity\":8,\"power\":8,\"security\":4,\"benevolence\":8}','2025-02-28 10:03:25','2025-02-28 10:03:25'),(13,'{\"stimulation\":12,\"achievement\":12,\"universalism\":12,\"tradition\":12,\"hedonism\":16,\"self-direction\":8,\"conformity\":8,\"power\":8,\"security\":4,\"benevolence\":8}','2025-02-28 10:28:40','2025-02-28 10:28:40'),(14,'{\"security\":12,\"achievement\":16,\"universalism\":12,\"tradition\":4,\"hedonism\":12,\"stimulation\":16,\"conformity\":4,\"self-direction\":12,\"benevolence\":4,\"power\":8}','2025-02-28 10:29:26','2025-02-28 10:29:26'),(15,'{\"security\":12,\"achievement\":16,\"universalism\":12,\"tradition\":8,\"hedonism\":12,\"stimulation\":12,\"conformity\":4,\"self-direction\":12,\"benevolence\":4,\"power\":8}','2025-03-01 11:25:02','2025-03-01 11:25:02'),(16,'{\"security\":12,\"achievement\":16,\"universalism\":16,\"tradition\":4,\"hedonism\":8,\"stimulation\":12,\"conformity\":4,\"self-direction\":12,\"benevolence\":8,\"power\":8}','2025-03-11 11:05:35','2025-03-11 11:05:35'),(17,'{\"security\":12,\"achievement\":12,\"universalism\":12,\"tradition\":8,\"hedonism\":12,\"stimulation\":16,\"conformity\":4,\"self-direction\":12,\"benevolence\":4,\"power\":8}','2025-03-17 09:57:05','2025-03-17 09:57:05');
/*!40000 ALTER TABLE `quiz_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resilience_vs_sensitivity_questions`
--

DROP TABLE IF EXISTS `resilience_vs_sensitivity_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resilience_vs_sensitivity_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strongly_agree_resilience` int NOT NULL,
  `strongly_agree_sensitivity` int NOT NULL,
  `agree_resilience` int NOT NULL,
  `agree_sensitivity` int NOT NULL,
  `neutral_resilience` int NOT NULL,
  `neutral_sensitivity` int NOT NULL,
  `disagree_resilience` int NOT NULL,
  `disagree_sensitivity` int NOT NULL,
  `strongly_disagree_resilience` int NOT NULL,
  `strongly_disagree_sensitivity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resilience_vs_sensitivity_questions`
--

LOCK TABLES `resilience_vs_sensitivity_questions` WRITE;
/*!40000 ALTER TABLE `resilience_vs_sensitivity_questions` DISABLE KEYS */;
INSERT INTO `resilience_vs_sensitivity_questions` VALUES (1,'I prefer remaining calm and focused in high-pressure situations over expressing my emotions.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(2,'I enjoy finding solutions to problems rather than dwelling on setbacks.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(3,'I feel energised when I can maintain a sense of control in stressful circumstances.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(4,'I prioritise staying productive, even during challenging times.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(5,'I thrive on maintaining stability and focus under pressure.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(6,'I value keeping a positive outlook more than openly discussing difficulties.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(7,'I focus on overcoming obstacles quickly rather than reflecting deeply on their impact.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(8,'I feel most effective when I bounce back quickly from disappointments.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(9,'I prioritise staying composed and solution-oriented when challenges arise.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(10,'I find satisfaction in maintaining emotional stability during turbulent situations.',100,0,75,25,50,50,25,75,0,100,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(11,'I prefer acknowledging and processing emotions over quickly moving past challenges.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(12,'I value deeply understanding the emotional impact of work situations over staying detached.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(13,'I feel most authentic when I can express my emotions freely.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(14,'I prioritise creating space to discuss feelings in the workplace.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(15,'I enjoy taking time to reflect on how events affect me and my team emotionally.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(16,'I focus on addressing the emotional aspects of challenges over practical solutions.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(17,'I feel more comfortable connecting with others through shared emotional experiences.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(18,'I thrive when I can validate others’ feelings and share my own.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(19,'I value being attuned to emotional undercurrents in the workplace.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29'),(20,'I prioritise emotional authenticity over maintaining a stoic or unaffected demeanour.',0,100,25,75,50,50,75,25,100,0,'2025-04-01 19:38:29','2025-04-01 19:38:29');
/*!40000 ALTER TABLE `resilience_vs_sensitivity_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resilience_vs_sensitivity_responses`
--

DROP TABLE IF EXISTS `resilience_vs_sensitivity_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resilience_vs_sensitivity_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `response` enum('strongly_agree','agree','neutral','disagree','strongly_disagree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `resilience_score` int NOT NULL,
  `sensitivity_score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resilience_vs_sensitivity_responses_candidate_id_foreign` (`candidate_id`),
  KEY `resilience_vs_sensitivity_responses_question_id_foreign` (`question_id`),
  CONSTRAINT `resilience_vs_sensitivity_responses_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `resilience_vs_sensitivity_responses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `resilience_vs_sensitivity_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resilience_vs_sensitivity_responses`
--

LOCK TABLES `resilience_vs_sensitivity_responses` WRITE;
/*!40000 ALTER TABLE `resilience_vs_sensitivity_responses` DISABLE KEYS */;
INSERT INTO `resilience_vs_sensitivity_responses` VALUES (41,7,1,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(42,7,2,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(43,7,3,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(44,7,4,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(45,7,5,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(46,7,6,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(47,7,7,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(48,7,8,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(49,7,9,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(50,7,10,'strongly_agree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(51,7,11,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(52,7,12,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(53,7,13,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(54,7,14,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(55,7,15,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(56,7,16,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(57,7,17,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(58,7,18,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(59,7,19,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(60,7,20,'strongly_disagree',100,0,'2025-04-10 22:56:45','2025-04-10 22:56:45'),(61,12,1,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(62,12,2,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(63,12,3,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(64,12,4,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(65,12,5,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(66,12,6,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(67,12,7,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(68,12,8,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(69,12,9,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(70,12,10,'strongly_agree',100,0,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(71,12,11,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(72,12,12,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(73,12,13,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(74,12,14,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(75,12,15,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(76,12,16,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(77,12,17,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(78,12,18,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(79,12,19,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(80,12,20,'strongly_agree',0,100,'2025-04-11 08:09:58','2025-04-11 08:09:58'),(81,12,1,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(82,12,2,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(83,12,3,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(84,12,4,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(85,12,5,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(86,12,6,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(87,12,7,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(88,12,8,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(89,12,9,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(90,12,10,'strongly_agree',100,0,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(91,12,11,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(92,12,12,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(93,12,13,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(94,12,14,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(95,12,15,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(96,12,16,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(97,12,17,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(98,12,18,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(99,12,19,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(100,12,20,'strongly_agree',0,100,'2025-04-11 08:12:13','2025-04-11 08:12:13'),(101,12,1,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(102,12,2,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(103,12,3,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(104,12,4,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(105,12,5,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(106,12,6,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(107,12,7,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(108,12,8,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(109,12,9,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(110,12,10,'strongly_agree',100,0,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(111,12,11,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(112,12,12,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(113,12,13,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(114,12,14,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(115,12,15,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(116,12,16,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(117,12,17,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(118,12,18,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(119,12,19,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(120,12,20,'strongly_agree',0,100,'2025-04-11 21:49:40','2025-04-11 21:49:40'),(121,11,1,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(122,11,2,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(123,11,3,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(124,11,4,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(125,11,5,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(126,11,6,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(127,11,7,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(128,11,8,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(129,11,9,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(130,11,10,'strongly_agree',100,0,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(131,11,11,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(132,11,12,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(133,11,13,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(134,11,14,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(135,11,15,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(136,11,16,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(137,11,17,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(138,11,18,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(139,11,19,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(140,11,20,'strongly_agree',0,100,'2025-04-12 11:39:04','2025-04-12 11:39:04'),(141,11,1,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(142,11,2,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(143,11,3,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(144,11,4,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(145,11,5,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(146,11,6,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(147,11,7,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(148,11,8,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(149,11,9,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(150,11,10,'strongly_agree',100,0,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(151,11,11,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(152,11,12,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(153,11,13,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(154,11,14,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(155,11,15,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(156,11,16,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(157,11,17,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(158,11,18,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(159,11,19,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20'),(160,11,20,'strongly_agree',0,100,'2025-04-12 12:20:20','2025-04-12 12:20:20');
/*!40000 ALTER TABLE `resilience_vs_sensitivity_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary_ranges`
--

DROP TABLE IF EXISTS `salary_ranges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salary_ranges` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary_ranges`
--

LOCK TABLES `salary_ranges` WRITE;
/*!40000 ALTER TABLE `salary_ranges` DISABLE KEYS */;
INSERT INTO `salary_ranges` VALUES (1,1,'0-50k',NULL,NULL),(2,2,'50k-100k',NULL,NULL),(3,3,'50k-100k',NULL,NULL),(4,4,'100k+',NULL,NULL);
/*!40000 ALTER TABLE `salary_ranges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seniority_levels`
--

DROP TABLE IF EXISTS `seniority_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seniority_levels` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `seniority_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seniority_levels`
--

LOCK TABLES `seniority_levels` WRITE;
/*!40000 ALTER TABLE `seniority_levels` DISABLE KEYS */;
INSERT INTO `seniority_levels` VALUES (1,1,'Junior',NULL,NULL),(2,2,'Mid',NULL,NULL),(3,3,'Senior',NULL,NULL),(4,4,'Lead',NULL,NULL),(5,5,'Manager',NULL,NULL);
/*!40000 ALTER TABLE `seniority_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill_lists`
--

DROP TABLE IF EXISTS `skill_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skill_lists` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_lists`
--

LOCK TABLES `skill_lists` WRITE;
/*!40000 ALTER TABLE `skill_lists` DISABLE KEYS */;
INSERT INTO `skill_lists` VALUES (1,1,'HTML',NULL,NULL),(2,2,'CSS',NULL,NULL),(3,3,'JAVASCRIPT',NULL,NULL),(4,4,'BOOTSTRAP',NULL,NULL),(5,5,'React',NULL,NULL),(6,6,'Node.JS',NULL,NULL);
/*!40000 ALTER TABLE `skill_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sociability_vs_reflectiveness_questions`
--

DROP TABLE IF EXISTS `sociability_vs_reflectiveness_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sociability_vs_reflectiveness_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strongly_agree_sociability` int NOT NULL,
  `strongly_agree_reflectiveness` int NOT NULL,
  `agree_sociability` int NOT NULL,
  `agree_reflectiveness` int NOT NULL,
  `neutral_sociability` int NOT NULL,
  `neutral_reflectiveness` int NOT NULL,
  `disagree_sociability` int NOT NULL,
  `disagree_reflectiveness` int NOT NULL,
  `strongly_disagree_sociability` int NOT NULL,
  `strongly_disagree_reflectiveness` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sociability_vs_reflectiveness_questions`
--

LOCK TABLES `sociability_vs_reflectiveness_questions` WRITE;
/*!40000 ALTER TABLE `sociability_vs_reflectiveness_questions` DISABLE KEYS */;
INSERT INTO `sociability_vs_reflectiveness_questions` VALUES (1,'I prefer collaborating in group discussions over working alone on tasks.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(2,'I thrive on building relationships with team members to foster a positive work environment.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(3,'I feel energised by spending time networking with colleagues.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(4,'I enjoy sharing ideas with others more than working independently on them.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(5,'I prioritise communicating regularly with teammates to maintain strong connections.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(6,'I prefer resolving challenges through collaborative brainstorming rather than individual problem-solving.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(7,'I enjoy lively discussions at work over quiet, reflective moments.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(8,'I focus on fostering connections within the team to enhance productivity.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(9,'I value team bonding activities that strengthen relationships.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(10,'I feel more productive when interacting with colleagues frequently.',100,0,75,25,50,50,25,75,0,100,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(11,'I prefer spending time thinking through solutions independently before sharing them.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(12,'I feel most effective when analysing past successes and failures on my own.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(13,'I value taking time to reflect on work outcomes to make improvements.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(14,'I enjoy developing ideas in solitude before discussing them with others.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(15,'I prioritise introspection over frequent collaboration.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(16,'I feel more comfortable working on tasks where I can focus without interruptions.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(17,'I value time spent evaluating my performance over group feedback sessions.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(18,'I find fulfilment in deeply considering strategic decisions before acting on them.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(19,'I focus on understanding complex problems on my own rather than relying on group input.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22'),(20,'I enjoy quiet, thoughtful analysis over dynamic team interactions.',0,100,25,75,50,50,75,25,100,0,'2025-03-29 11:55:22','2025-03-29 11:55:22');
/*!40000 ALTER TABLE `sociability_vs_reflectiveness_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sociability_vs_reflectiveness_responses`
--

DROP TABLE IF EXISTS `sociability_vs_reflectiveness_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sociability_vs_reflectiveness_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `response` enum('strongly_agree','agree','neutral','disagree','strongly_disagree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sociability_score` int NOT NULL,
  `reflectiveness_score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sociability_vs_reflectiveness_responses_candidate_id_foreign` (`candidate_id`),
  KEY `sociability_vs_reflectiveness_responses_question_id_foreign` (`question_id`),
  CONSTRAINT `sociability_vs_reflectiveness_responses_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sociability_vs_reflectiveness_responses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `sociability_vs_reflectiveness_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sociability_vs_reflectiveness_responses`
--

LOCK TABLES `sociability_vs_reflectiveness_responses` WRITE;
/*!40000 ALTER TABLE `sociability_vs_reflectiveness_responses` DISABLE KEYS */;
INSERT INTO `sociability_vs_reflectiveness_responses` VALUES (141,7,1,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(142,7,2,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(143,7,3,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(144,7,4,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(145,7,5,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(146,7,6,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(147,7,7,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(148,7,8,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(149,7,9,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(150,7,10,'strongly_agree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(151,7,11,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(152,7,12,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(153,7,13,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(154,7,14,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(155,7,15,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(156,7,16,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(157,7,17,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(158,7,18,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(159,7,19,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(160,7,20,'strongly_disagree',100,0,'2025-04-10 23:04:53','2025-04-10 23:04:53'),(161,12,1,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(162,12,2,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(163,12,3,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(164,12,4,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(165,12,5,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(166,12,6,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(167,12,7,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(168,12,8,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(169,12,9,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(170,12,10,'strongly_agree',100,0,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(171,12,11,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(172,12,12,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(173,12,13,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(174,12,14,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(175,12,15,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(176,12,16,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(177,12,17,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(178,12,18,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(179,12,19,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(180,12,20,'strongly_agree',0,100,'2025-04-11 08:12:46','2025-04-11 08:12:46'),(181,12,1,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(182,12,2,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(183,12,3,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(184,12,4,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(185,12,5,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(186,12,6,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(187,12,7,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(188,12,8,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(189,12,9,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(190,12,10,'strongly_agree',100,0,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(191,12,11,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(192,12,12,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(193,12,13,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(194,12,14,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(195,12,15,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(196,12,16,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(197,12,17,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(198,12,18,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(199,12,19,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(200,12,20,'strongly_agree',0,100,'2025-04-11 21:50:09','2025-04-11 21:50:09'),(201,12,1,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(202,12,2,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(203,12,3,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(204,12,4,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(205,12,5,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(206,12,6,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(207,12,7,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(208,12,8,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(209,12,9,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(210,12,10,'strongly_agree',100,0,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(211,12,11,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(212,12,12,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(213,12,13,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(214,12,14,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(215,12,15,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(216,12,16,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(217,12,17,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(218,12,18,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(219,12,19,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(220,12,20,'strongly_agree',0,100,'2025-04-11 21:51:01','2025-04-11 21:51:01'),(221,11,1,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(222,11,2,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(223,11,3,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(224,11,4,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(225,11,5,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(226,11,6,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(227,11,7,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(228,11,8,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(229,11,9,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(230,11,10,'strongly_agree',100,0,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(231,11,11,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(232,11,12,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(233,11,13,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(234,11,14,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(235,11,15,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(236,11,16,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(237,11,17,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(238,11,18,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(239,11,19,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(240,11,20,'strongly_agree',0,100,'2025-04-12 11:39:50','2025-04-12 11:39:50'),(241,11,1,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(242,11,2,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(243,11,3,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(244,11,4,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(245,11,5,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(246,11,6,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(247,11,7,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(248,11,8,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(249,11,9,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(250,11,10,'strongly_agree',100,0,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(251,11,11,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(252,11,12,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(253,11,13,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(254,11,14,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(255,11,15,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(256,11,16,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(257,11,17,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(258,11,18,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(259,11,19,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45'),(260,11,20,'strongly_agree',0,100,'2025-04-12 12:20:45','2025-04-12 12:20:45');
/*!40000 ALTER TABLE `sociability_vs_reflectiveness_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsorships`
--

DROP TABLE IF EXISTS `sponsorships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sponsorships` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsorships`
--

LOCK TABLES `sponsorships` WRITE;
/*!40000 ALTER TABLE `sponsorships` DISABLE KEYS */;
/*!40000 ALTER TABLE `sponsorships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_member_assessments`
--

DROP TABLE IF EXISTS `team_member_assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_member_assessments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_member_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0',
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_member_assessment_links_access_token_unique` (`access_token`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_member_assessments`
--

LOCK TABLES `team_member_assessments` WRITE;
/*!40000 ALTER TABLE `team_member_assessments` DISABLE KEYS */;
INSERT INTO `team_member_assessments` VALUES (1,'82','rudy@gmail.com','32b62951-92da-4e08-9e84-ccd74a5a704b',0,'2025-04-16 06:29:19','2025-04-14 06:29:19','2025-04-14 06:29:19'),(2,'84','julkernienakib@gmail.com','06e1eb74-63ea-4f88-92c3-613923e4f641',1,'2025-04-16 07:17:13','2025-04-14 07:17:13','2025-04-14 07:17:13'),(3,'84','julkernienakib@gmail.com','eb6a1718-7c9a-4ab2-81a0-f8d6c69de367',1,'2025-04-16 07:23:02','2025-04-14 07:23:02','2025-04-14 07:23:02'),(4,'84','julkernienakib@gmail.com','90da7704-e9dc-4faf-a7c4-e61eb69f399d',1,'2025-04-16 07:28:10','2025-04-14 07:28:10','2025-04-14 07:28:10'),(5,'84','julkernienakib@gmail.com','ce905153-3391-43a4-ab6e-209560534e98',1,'2025-04-16 08:00:38','2025-04-14 08:00:38','2025-04-14 08:00:38'),(6,'84','julkernienakib@gmail.com','8925e26f-1bc4-4c19-8170-d8a55adcf189',1,'2025-04-16 08:02:09','2025-04-14 08:02:09','2025-04-14 08:02:09'),(7,'84','julkernienakib@gmail.com','58a94d05-5bf9-412b-b3c7-8aa07da9449d',1,'2025-04-16 12:05:07','2025-04-14 12:05:07','2025-04-14 12:05:07'),(8,'84','julkernienakib@gmail.com','204df4a3-54f2-4838-8874-ca07ca9318ff',1,'2025-04-16 12:05:50','2025-04-14 12:05:50','2025-04-14 12:05:50'),(9,'84','julkernienakib@gmail.com','5fc7eae3-5ae6-4856-ac14-cfcf53e49c5a',1,'2025-04-16 12:08:29','2025-04-14 12:08:29','2025-04-14 12:08:29'),(10,'84','julkernienakib@gmail.com','db40ee4e-0305-41fc-9c8c-eccededcb44e',1,'2025-04-18 12:51:25','2025-04-16 12:51:25','2025-04-16 12:51:25'),(11,'84','julkernienakib@gmail.com','092632da-0ae5-46b9-b999-f87da555e124',0,'2025-04-18 12:55:38','2025-04-16 12:55:38','2025-04-16 12:55:38'),(12,'84','julkernienakib@gmail.com','43c8b447-1d48-4c26-94ba-269a6fb94f34',0,'2025-04-18 13:12:10','2025-04-16 13:12:10','2025-04-16 13:12:10'),(13,'84','julkernienakib@gmail.com','6803d9d0-c795-4e20-bc37-6bd447bdf387',0,'2025-04-18 13:15:19','2025-04-16 13:15:19','2025-04-16 13:15:19'),(14,'84','julkernienakib@gmail.com','1a5d4ba7-dcd9-4cee-aa0a-fbeb71f97be1',0,'2025-04-18 13:30:18','2025-04-16 13:30:18','2025-04-16 13:30:18'),(15,'84','julkernienakib@gmail.com','40ce0256-1246-4883-8036-6642eb14161c',0,'2025-04-18 13:32:52','2025-04-16 13:32:52','2025-04-16 13:32:52');
/*!40000 ALTER TABLE `team_member_assessments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employer_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `behaviour_assessment_score` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `value_assessment_score` longtext COLLATE utf8mb4_unicode_ci,
  `value_assessment_completed_at` timestamp NULL DEFAULT NULL,
  `behaviour_assessment_completed_at` timestamp NULL DEFAULT NULL,
  `is_send_link` tinyint DEFAULT '0',
  `is_done_assessment` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `team_members_employer_id_foreign` (`employer_id`),
  CONSTRAINT `team_members_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES (16,NULL,'q','q','testuser@example.com','admin','active','2024-12-25 01:49:35','2024-12-25 01:49:35',NULL,NULL,NULL,NULL,0,0),(78,1,'Dharmith','Software Developer','dharmithsai.ganta@gmail.com','team-member','active','2024-12-27 19:05:19','2024-12-27 21:48:54',NULL,NULL,NULL,NULL,0,0),(82,1,'Rudy','Developer','rudy@gmail.com','admin','active','2024-12-27 21:57:03','2025-04-14 13:22:52',NULL,NULL,NULL,NULL,0,0),(84,1,'Julker Nien Akib','golang','julkernienakib@gmail.com','admin','active','2025-04-14 07:17:06','2025-04-16 19:33:18',NULL,'{\"Stimulation\":64,\"Power\":36,\"Self-Direction\":36,\"Security\":52,\"Achievement\":48,\"Hedonism\":4,\"Universalism\":28,\"Benevolence\":20,\"Conformity\":12}','2025-04-16 13:33:18',NULL,1,0);
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_responses`
--

DROP TABLE IF EXISTS `user_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_id` bigint unsigned NOT NULL,
  `value_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_responses_user_id_foreign` (`user_id`),
  KEY `user_responses_word_id_foreign` (`word_id`),
  CONSTRAINT `user_responses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_responses_word_id_foreign` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_responses`
--

LOCK TABLES `user_responses` WRITE;
/*!40000 ALTER TABLE `user_responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'forid','forid@gmail.com',NULL,'$2y$10$R/I3QBgUpizNjj9b4UsJMOgnZmzu1T2WWO60mwXjhaNv.4dLEuaF2',NULL,'2024-10-11 13:37:17','2024-10-11 13:37:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `value_words`
--

DROP TABLE IF EXISTS `value_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `value_words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `child_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `value_words`
--

LOCK TABLES `value_words` WRITE;
/*!40000 ALTER TABLE `value_words` DISABLE KEYS */;
INSERT INTO `value_words` VALUES (1,'Stability','Security','2025-03-24 16:16:28','2025-03-24 16:16:28'),(2,'Reliability','Security','2025-03-24 16:16:28','2025-03-24 16:16:28'),(3,'Predictability','Security','2025-03-24 16:16:28','2025-03-24 16:16:28'),(4,'Comfort','Security','2025-03-24 16:16:28','2025-03-24 16:16:28'),(5,'Risk Avoidance','Security','2025-03-24 16:16:28','2025-03-24 16:16:28'),(6,'Ambition','Achievement','2025-03-24 16:16:28','2025-03-24 16:16:28'),(7,'Success','Achievement','2025-03-24 16:16:28','2025-03-24 16:16:28'),(8,'Accomplishment','Achievement','2025-03-24 16:16:28','2025-03-24 16:16:28'),(9,'Recognition','Achievement','2025-03-24 16:16:28','2025-03-24 16:16:28'),(10,'Excellence','Achievement','2025-03-24 16:16:28','2025-03-24 16:16:28'),(11,'Equality','Universalism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(12,'Justice','Universalism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(13,'Protection','Universalism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(14,'Fairness','Universalism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(15,'Understanding','Universalism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(16,'Kindness','Benevolence','2025-03-24 16:16:28','2025-03-24 16:16:28'),(17,'Care','Benevolence','2025-03-24 16:16:28','2025-03-24 16:16:28'),(18,'Compassion','Benevolence','2025-03-24 16:16:28','2025-03-24 16:16:28'),(19,'Generosity','Benevolence','2025-03-24 16:16:28','2025-03-24 16:16:28'),(20,'Support','Benevolence','2025-03-24 16:16:28','2025-03-24 16:16:28'),(21,'Obedience','Conformity','2025-03-24 16:16:28','2025-03-24 16:16:28'),(22,'Harmony','Conformity','2025-03-24 16:16:28','2025-03-24 16:16:28'),(23,'Structure','Conformity','2025-03-24 16:16:28','2025-03-24 16:16:28'),(24,'Order','Conformity','2025-03-24 16:16:28','2025-03-24 16:16:28'),(25,'Respect','Conformity','2025-03-24 16:16:28','2025-03-24 16:16:28'),(26,'Heritage','Tradition','2025-03-24 16:16:28','2025-03-24 16:16:28'),(27,'Customs','Tradition','2025-03-24 16:16:28','2025-03-24 16:16:28'),(28,'Rituals','Tradition','2025-03-24 16:16:28','2025-03-24 16:16:28'),(29,'Preservation','Tradition','2025-03-24 16:16:28','2025-03-24 16:16:28'),(30,'Lineage','Tradition','2025-03-24 16:16:28','2025-03-24 16:16:28'),(31,'Pleasure','Hedonism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(32,'Fun','Hedonism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(33,'Playfulness','Hedonism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(34,'Enjoyment','Hedonism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(35,'Gratification','Hedonism','2025-03-24 16:16:28','2025-03-24 16:16:28'),(36,'Authority','Power','2025-03-24 16:16:28','2025-03-24 16:16:28'),(37,'Influence','Power','2025-03-24 16:16:28','2025-03-24 16:16:28'),(38,'Leadership','Power','2025-03-24 16:16:28','2025-03-24 16:16:28'),(39,'Control','Power','2025-03-24 16:16:28','2025-03-24 16:16:28'),(40,'Status','Power','2025-03-24 16:16:28','2025-03-24 16:16:28'),(41,'Autonomy','Self-Direction','2025-03-24 16:16:28','2025-03-24 16:16:28'),(42,'Freedom','Self-Direction','2025-03-24 16:16:28','2025-03-24 16:16:28'),(43,'Independence','Self-Direction','2025-03-24 16:16:28','2025-03-24 16:16:28'),(44,'Individuality','Self-Direction','2025-03-24 16:16:28','2025-03-24 16:16:28'),(45,'Self-Expression','Self-Direction','2025-03-24 16:16:28','2025-03-24 16:16:28'),(46,'Variety','Stimulation','2025-03-24 16:16:28','2025-03-24 16:16:28'),(47,'Challenge','Stimulation','2025-03-24 16:16:28','2025-03-24 16:16:28'),(48,'Adventure','Stimulation','2025-03-24 16:16:28','2025-03-24 16:16:28'),(49,'Novelty','Stimulation','2025-03-24 16:16:28','2025-03-24 16:16:28'),(50,'Excitement','Stimulation','2025-03-24 16:16:28','2025-03-24 16:16:28');
/*!40000 ALTER TABLE `value_words` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `values`
--

DROP TABLE IF EXISTS `values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `values_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `values`
--

LOCK TABLES `values` WRITE;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
INSERT INTO `values` VALUES (1,'Self-Direction','Independence, creativity, freedom.',NULL,NULL),(2,'Stimulation','Excitement, variety, and challenge.',NULL,NULL),(3,'Universalism','Tolerance, understanding, and protection of nature.',NULL,NULL),(4,'Benevolence','Caring for those close to us.',NULL,NULL),(5,'Security','Safety, harmony, and stability of society.',NULL,NULL),(6,'Conformity','Restraint of disruptive actions.',NULL,NULL),(7,'Power','Social status and prestige, dominance over others.',NULL,NULL),(8,'Achievement','Personal success through competence.',NULL,NULL),(9,'Hedonism','Pleasure, enjoying life.',NULL,NULL),(10,'Tradition','Respect for customs and religion.',NULL,NULL);
/*!40000 ALTER TABLE `values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `words_word_unique` (`word`),
  KEY `words_value_id_foreign` (`value_id`),
  CONSTRAINT `words_value_id_foreign` FOREIGN KEY (`value_id`) REFERENCES `values` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `words`
--

LOCK TABLES `words` WRITE;
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
/*!40000 ALTER TABLE `words` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `working_patterns`
--

DROP TABLE IF EXISTS `working_patterns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `working_patterns` (
  `my_row_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `working_pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`my_row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `working_patterns`
--

LOCK TABLES `working_patterns` WRITE;
/*!40000 ALTER TABLE `working_patterns` DISABLE KEYS */;
INSERT INTO `working_patterns` VALUES (1,1,'Full-time',NULL,NULL),(2,2,'Part-time',NULL,NULL),(3,3,'Contract',NULL,NULL);
/*!40000 ALTER TABLE `working_patterns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'align'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-17  1:34:47
