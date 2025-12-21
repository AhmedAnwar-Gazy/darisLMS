-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: daris
-- ------------------------------------------------------
-- Server version	8.4.5

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
-- Table structure for table `adminpresets`
--

DROP TABLE IF EXISTS `adminpresets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moodleversion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moodlerelease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iscore` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this is a core preset or not, and which core preset',
  `timecreated` int NOT NULL DEFAULT '0',
  `timeimported` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_app`
--

DROP TABLE IF EXISTS `adminpresets_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_app` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adminpresetid` int NOT NULL,
  `userid` int NOT NULL,
  `time` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adminpresetid` (`adminpresetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_app_it`
--

DROP TABLE IF EXISTS `adminpresets_app_it`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_app_it` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adminpresetapplyid` int NOT NULL,
  `configlogid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `configlogid` (`configlogid`),
  KEY `adminpresetapplyid` (`adminpresetapplyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_app_it_a`
--

DROP TABLE IF EXISTS `adminpresets_app_it_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_app_it_a` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adminpresetapplyid` int NOT NULL,
  `configlogid` int NOT NULL,
  `itemname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Necessary to rollback',
  PRIMARY KEY (`id`),
  KEY `configlogid` (`configlogid`),
  KEY `adminpresetapplyid` (`adminpresetapplyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_app_plug`
--

DROP TABLE IF EXISTS `adminpresets_app_plug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_app_plug` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adminpresetapplyid` int NOT NULL,
  `plugin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` smallint NOT NULL DEFAULT '0',
  `oldvalue` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `adminpresetapplyid` (`adminpresetapplyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_it`
--

DROP TABLE IF EXISTS `adminpresets_it`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_it` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adminpresetid` int NOT NULL,
  `plugin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `adminpresetid` (`adminpresetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_it_a`
--

DROP TABLE IF EXISTS `adminpresets_it_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_it_a` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `itemid` (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adminpresets_plug`
--

DROP TABLE IF EXISTS `adminpresets_plug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminpresets_plug` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adminpresetid` int NOT NULL,
  `plugin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` smallint NOT NULL DEFAULT '0' COMMENT 'Whether this plugins is currently enabled.',
  PRIMARY KEY (`id`),
  KEY `adminpresetid` (`adminpresetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_action_explain_text`
--

DROP TABLE IF EXISTS `ai_action_explain_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_action_explain_text` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `prompt` text COLLATE utf8mb4_unicode_ci,
  `responseid` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingerprint` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generatedcontent` text COLLATE utf8mb4_unicode_ci,
  `finishreason` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prompttokens` bigint unsigned DEFAULT NULL,
  `completiontoken` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_action_generate_image`
--

DROP TABLE IF EXISTS `ai_action_generate_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_action_generate_image` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `prompt` text COLLATE utf8mb4_unicode_ci,
  `numberimages` bigint unsigned NOT NULL,
  `quality` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspectratio` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sourceurl` text COLLATE utf8mb4_unicode_ci,
  `revisedprompt` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_action_generate_text`
--

DROP TABLE IF EXISTS `ai_action_generate_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_action_generate_text` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `prompt` text COLLATE utf8mb4_unicode_ci,
  `responseid` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingerprint` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generatedcontent` text COLLATE utf8mb4_unicode_ci,
  `finishreason` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prompttokens` bigint unsigned DEFAULT NULL,
  `completiontoken` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_action_register`
--

DROP TABLE IF EXISTS `ai_action_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_action_register` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `actionname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionid` bigint unsigned NOT NULL,
  `success` tinyint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `errorcode` int unsigned DEFAULT NULL,
  `errormessage` text COLLATE utf8mb4_unicode_ci,
  `timecreated` bigint unsigned NOT NULL,
  `timecompleted` bigint unsigned DEFAULT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `action` (`actionname`,`actionid`),
  KEY `provider` (`actionname`,`provider`),
  KEY `ai_action_register_userid_foreign` (`userid`),
  CONSTRAINT `ai_action_register_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_action_summarise_text`
--

DROP TABLE IF EXISTS `ai_action_summarise_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_action_summarise_text` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `prompt` text COLLATE utf8mb4_unicode_ci,
  `responseid` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingerprint` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generatedcontent` text COLLATE utf8mb4_unicode_ci,
  `finishreason` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prompttokens` bigint unsigned DEFAULT NULL,
  `completiontoken` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_policy_register`
--

DROP TABLE IF EXISTS `ai_policy_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_policy_register` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `timeaccepted` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`),
  CONSTRAINT `ai_policy_register_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ai_providers`
--

DROP TABLE IF EXISTS `ai_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ai_providers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint unsigned NOT NULL DEFAULT '1',
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionconfig` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `ai_providers_provider_index` (`provider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_indicator_calc`
--

DROP TABLE IF EXISTS `analytics_indicator_calc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_indicator_calc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `starttime` int NOT NULL,
  `endtime` int NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `sampleorigin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampleid` int NOT NULL,
  `indicator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10,2) DEFAULT NULL COMMENT 'The calculated value, it can be null.',
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `starttime-endtime-contextid` (`starttime`,`endtime`,`contextid`),
  KEY `analytics_indicator_calc_contextid_foreign` (`contextid`),
  CONSTRAINT `analytics_indicator_calc_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_models`
--

DROP TABLE IF EXISTS `analytics_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `trained` tinyint(1) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8mb4_unicode_ci COMMENT 'Explicit name of the model, the localised target name is used when left empty',
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicators` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timesplitting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `predictionsprocessor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` int NOT NULL,
  `contextids` text COLLATE utf8mb4_unicode_ci COMMENT 'The model will be restricted to this contexts',
  `timecreated` int DEFAULT NULL,
  `timemodified` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enabledandtrained` (`enabled`,`trained`),
  KEY `analytics_models_usermodified_foreign` (`usermodified`),
  CONSTRAINT `analytics_models_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_models_log`
--

DROP TABLE IF EXISTS `analytics_models_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_models_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelid` bigint unsigned NOT NULL,
  `version` int NOT NULL,
  `evaluationmode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicators` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timesplitting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `info` text COLLATE utf8mb4_unicode_ci,
  `dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `analytics_models_log_modelid_foreign` (`modelid`),
  KEY `analytics_models_log_usermodified_foreign` (`usermodified`),
  CONSTRAINT `analytics_models_log_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `analytics_models` (`id`),
  CONSTRAINT `analytics_models_log_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_predict_samples`
--

DROP TABLE IF EXISTS `analytics_predict_samples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_predict_samples` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelid` bigint unsigned NOT NULL,
  `analysableid` int NOT NULL,
  `timesplitting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rangeindex` int NOT NULL,
  `sampleids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `modelidandanalysableidandtimesplittingandrangeindex` (`modelid`,`analysableid`,`timesplitting`,`rangeindex`),
  CONSTRAINT `analytics_predict_samples_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `analytics_models` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_prediction_actions`
--

DROP TABLE IF EXISTS `analytics_prediction_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_prediction_actions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `predictionid` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `actionname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `predictionidanduseridandactionname` (`predictionid`,`userid`,`actionname`),
  KEY `analytics_prediction_actions_userid_foreign` (`userid`),
  CONSTRAINT `analytics_prediction_actions_predictionid_foreign` FOREIGN KEY (`predictionid`) REFERENCES `analytics_predictions` (`id`),
  CONSTRAINT `analytics_prediction_actions_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_predictions`
--

DROP TABLE IF EXISTS `analytics_predictions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_predictions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelid` bigint unsigned NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `sampleid` int NOT NULL,
  `rangeindex` smallint NOT NULL,
  `prediction` decimal(10,2) NOT NULL,
  `predictionscore` decimal(10,5) NOT NULL,
  `calculations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `timestart` int DEFAULT NULL,
  `timeend` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modelidandcontextid` (`modelid`,`contextid`),
  KEY `analytics_predictions_contextid_foreign` (`contextid`),
  CONSTRAINT `analytics_predictions_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `analytics_predictions_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `analytics_models` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_train_samples`
--

DROP TABLE IF EXISTS `analytics_train_samples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_train_samples` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelid` bigint unsigned NOT NULL,
  `analysableid` int NOT NULL,
  `timesplitting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampleids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `modelidandanalysableidandtimesplitting` (`modelid`,`analysableid`,`timesplitting`),
  CONSTRAINT `analytics_train_samples_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `analytics_models` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_used_analysables`
--

DROP TABLE IF EXISTS `analytics_used_analysables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_used_analysables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelid` bigint unsigned NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analysableid` int NOT NULL,
  `firstanalysis` int NOT NULL,
  `timeanalysed` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modelid-action` (`modelid`,`action`),
  KEY `analysableid` (`analysableid`),
  CONSTRAINT `analytics_used_analysables_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `analytics_models` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analytics_used_files`
--

DROP TABLE IF EXISTS `analytics_used_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_used_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelid` bigint unsigned NOT NULL DEFAULT '0',
  `fileid` bigint unsigned NOT NULL DEFAULT '0',
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `modelidandactionandfileid` (`modelid`,`action`,`fileid`),
  KEY `analytics_used_files_fileid_foreign` (`fileid`),
  CONSTRAINT `analytics_used_files_fileid_foreign` FOREIGN KEY (`fileid`) REFERENCES `files` (`id`),
  CONSTRAINT `analytics_used_files_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `analytics_models` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the instance of the assignment. Displayed at the top of each page.',
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The description of the assignment. This field is used by feature MOD_INTRO.',
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format of the description field of the assignment. This field is used by feature MOD_INTRO.',
  `alwaysshowdescription` tinyint NOT NULL DEFAULT '0' COMMENT 'If false the assignment intro will only be displayed after the allowsubmissionsfrom date. If true it will always be displayed.',
  `nosubmissions` tinyint NOT NULL DEFAULT '0' COMMENT 'This field is a cache for is_any_submission_plugin_enabled() which allows Moodle pages to distinguish offline assignment types without loading the assignment class.',
  `submissiondrafts` tinyint NOT NULL DEFAULT '0' COMMENT 'If true, assignment submissions will be considered drafts until the student clicks on the submit assignmnet button.',
  `sendnotifications` tinyint NOT NULL DEFAULT '0' COMMENT 'Allows the disabling of email notifications in the assign module.',
  `sendlatenotifications` tinyint NOT NULL DEFAULT '0' COMMENT 'Allows separate enabling of notifications for late assignment submissions.',
  `duedate` int NOT NULL DEFAULT '0' COMMENT 'The due date for the assignment. Displayed to students.',
  `allowsubmissionsfromdate` int NOT NULL DEFAULT '0' COMMENT 'If set, submissions will only be accepted after this date.',
  `grade` int NOT NULL DEFAULT '0' COMMENT 'The maximum grade for this assignment. Can be negative to indicate the use of a scale.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The time the settings for this assign module instance were last modified.',
  `requiresubmissionstatement` tinyint NOT NULL DEFAULT '0' COMMENT 'Forces the student to accept a submission statement when submitting an assignment',
  `completionsubmit` tinyint NOT NULL DEFAULT '0' COMMENT 'If this field is set to 1, then the activity will be automatically marked as ''complete'' once the user submits their assignment.',
  `cutoffdate` int NOT NULL DEFAULT '0' COMMENT 'The final date after which submissions will no longer be accepted for this assignment without an extensions.',
  `gradingduedate` int NOT NULL DEFAULT '0' COMMENT 'The expected date for marking the submissions.',
  `teamsubmission` tinyint NOT NULL DEFAULT '0' COMMENT 'Do students submit in teams?',
  `requireallteammemberssubmit` tinyint NOT NULL DEFAULT '0' COMMENT 'If enabled, a submission will not be accepted until all team members have submitted it.',
  `teamsubmissiongroupingid` int NOT NULL DEFAULT '0' COMMENT 'A grouping id to get groups for team submissions',
  `blindmarking` tinyint NOT NULL DEFAULT '0' COMMENT 'Hide student/grader identities until the reveal identities action is performed',
  `hidegrader` tinyint NOT NULL DEFAULT '0' COMMENT 'Hide the grader''s identity from students. The opposite of blind marking.',
  `revealidentities` tinyint NOT NULL DEFAULT '0' COMMENT 'Show identities for a blind marking assignment',
  `attemptreopenmethod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none' COMMENT 'How to determine when students are allowed to open a new submission. Valid options are none, manual, untilpass',
  `maxattempts` int NOT NULL DEFAULT '-1' COMMENT 'What is the maximum number of student attempts allowed for this assignment? -1 means unlimited.',
  `markingworkflow` tinyint NOT NULL DEFAULT '0' COMMENT 'If enabled, marking workflow features will be used in this assignment.',
  `markingallocation` tinyint NOT NULL DEFAULT '0' COMMENT 'If enabled, marking allocation features will be used in this assignment',
  `sendstudentnotifications` tinyint NOT NULL DEFAULT '1' COMMENT 'Default for send student notifications checkbox when grading.',
  `preventsubmissionnotingroup` tinyint NOT NULL DEFAULT '0' COMMENT 'If enabled a user will be unable to make a submission unless they are a member of a group.',
  `activity` text COLLATE utf8mb4_unicode_ci,
  `activityformat` smallint NOT NULL DEFAULT '0',
  `timelimit` int NOT NULL DEFAULT '0',
  `submissionattachments` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`),
  KEY `teamsubmissiongroupingid` (`teamsubmissiongroupingid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign_grades`
--

DROP TABLE IF EXISTS `assign_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'The time the assignment submission was first modified by a grader.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The most recent modification time for the assignment submission by a grader.',
  `grader` int NOT NULL DEFAULT '0',
  `grade` decimal(10,5) DEFAULT '0.00000' COMMENT 'The numerical grade for this assignment submission. Can be determined by scales/advancedgradingforms etc but will always be converted back to a floating point number.',
  `attemptnumber` int NOT NULL DEFAULT '0' COMMENT 'The attempt number that this grade relates to',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueattemptgrade` (`assignment`,`userid`,`attemptnumber`),
  KEY `userid` (`userid`),
  KEY `attemptnumber` (`attemptnumber`),
  CONSTRAINT `assign_grades_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign_overrides`
--

DROP TABLE IF EXISTS `assign_overrides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_overrides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references assign.id',
  `groupid` bigint unsigned DEFAULT NULL COMMENT 'Foreign key references groups.id.  Can be null if this is a per-user override.',
  `userid` bigint unsigned DEFAULT NULL COMMENT 'Foreign key references user.id.  Can be null if this is a per-group override.',
  `sortorder` int DEFAULT NULL COMMENT 'Rank for sorting overrides.',
  `allowsubmissionsfromdate` int DEFAULT NULL COMMENT 'Time at which students may start attempting this assign. Can be null, in which case the assign default is used.',
  `duedate` int DEFAULT NULL COMMENT 'Time by which students must have completed their attempt.  Can be null, in which case the assign default is used.',
  `cutoffdate` int DEFAULT NULL COMMENT 'Time by which students must have completed their attempt.  Can be null, in which case the assign default is used.',
  `timelimit` int DEFAULT NULL COMMENT 'Time limit in seconds. Can be null, in which case the quiz default is used.',
  PRIMARY KEY (`id`),
  KEY `assign_overrides_assignid_foreign` (`assignid`),
  KEY `assign_overrides_groupid_foreign` (`groupid`),
  KEY `assign_overrides_userid_foreign` (`userid`),
  CONSTRAINT `assign_overrides_assignid_foreign` FOREIGN KEY (`assignid`) REFERENCES `assign` (`id`),
  CONSTRAINT `assign_overrides_groupid_foreign` FOREIGN KEY (`groupid`) REFERENCES `groups` (`id`),
  CONSTRAINT `assign_overrides_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign_plugin_config`
--

DROP TABLE IF EXISTS `assign_plugin_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_plugin_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `plugin` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtype` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci COMMENT 'The value of the config setting. Stored as text but can be interpreted by the plugin however it likes.',
  PRIMARY KEY (`id`),
  KEY `plugin` (`plugin`),
  KEY `subtype` (`subtype`),
  KEY `name` (`name`),
  KEY `assign_plugin_config_assignment_foreign` (`assignment`),
  CONSTRAINT `assign_plugin_config_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign_submission`
--

DROP TABLE IF EXISTS `assign_submission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_submission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'The time of the first student submission to this assignment.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The last time this assignment submission was modified by a student.',
  `timestarted` int DEFAULT NULL COMMENT 'The time when the student stared the submission.',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The status of this assignment submission. The current statuses are DRAFT and SUBMITTED.',
  `groupid` int NOT NULL DEFAULT '0' COMMENT 'The group id for team submissions',
  `attemptnumber` int NOT NULL DEFAULT '0' COMMENT 'Used to track attempts for an assignment',
  `latest` tinyint NOT NULL DEFAULT '0' COMMENT 'Greatly simplifies queries wanting to know information about only the latest attempt.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueattemptsubmission` (`assignment`,`userid`,`groupid`,`attemptnumber`),
  KEY `userid` (`userid`),
  KEY `attemptnumber` (`attemptnumber`),
  KEY `latestattempt` (`assignment`,`userid`,`groupid`,`latest`),
  CONSTRAINT `assign_submission_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign_user_flags`
--

DROP TABLE IF EXISTS `assign_user_flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_user_flags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'The id of the user these flags apply to.',
  `assignment` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'The assignment these flags apply to.',
  `locked` int NOT NULL DEFAULT '0' COMMENT 'Student cannot make any changes to their submission if this flag is set.',
  `mailed` smallint NOT NULL DEFAULT '0' COMMENT 'Has the student been sent a notification about this grade update?',
  `extensionduedate` int NOT NULL DEFAULT '0' COMMENT 'An extension date assigned to an individual student.',
  `workflowstate` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The current workflow state of the grade',
  `allocatedmarker` int NOT NULL DEFAULT '0' COMMENT 'The allocated marker to this submission',
  PRIMARY KEY (`id`),
  KEY `mailed` (`mailed`),
  KEY `assign_user_flags_userid_foreign` (`userid`),
  KEY `assign_user_flags_assignment_foreign` (`assignment`),
  CONSTRAINT `assign_user_flags_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`),
  CONSTRAINT `assign_user_flags_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assign_user_mapping`
--

DROP TABLE IF EXISTS `assign_user_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_user_mapping` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `assign_user_mapping_assignment_foreign` (`assignment`),
  KEY `assign_user_mapping_userid_foreign` (`userid`),
  CONSTRAINT `assign_user_mapping_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`),
  CONSTRAINT `assign_user_mapping_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignfeedback_comments`
--

DROP TABLE IF EXISTS `assignfeedback_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignfeedback_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `grade` bigint unsigned NOT NULL DEFAULT '0',
  `commenttext` text COLLATE utf8mb4_unicode_ci COMMENT 'The feedback text',
  `commentformat` smallint NOT NULL DEFAULT '0' COMMENT 'The feedback text format',
  PRIMARY KEY (`id`),
  KEY `assignfeedback_comments_assignment_foreign` (`assignment`),
  KEY `assignfeedback_comments_grade_foreign` (`grade`),
  CONSTRAINT `assignfeedback_comments_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`),
  CONSTRAINT `assignfeedback_comments_grade_foreign` FOREIGN KEY (`grade`) REFERENCES `assign_grades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignfeedback_editpdf_annot`
--

DROP TABLE IF EXISTS `assignfeedback_editpdf_annot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignfeedback_editpdf_annot` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gradeid` bigint unsigned NOT NULL DEFAULT '0',
  `pageno` int NOT NULL DEFAULT '0' COMMENT 'The page in the PDF that this annotation appears on',
  `x` int DEFAULT '0' COMMENT 'x-position of the start of the annotation (in pixels - image resolution is set to 100 pixels per inch)',
  `y` int DEFAULT '0' COMMENT 'y-position of the start of the annotation (in pixels - image resolution is set to 100 pixels per inch)',
  `endx` int DEFAULT '0' COMMENT 'x-position of the end of the annotation',
  `endy` int DEFAULT '0' COMMENT 'y-position of the end of the annotation',
  `path` text COLLATE utf8mb4_unicode_ci COMMENT 'SVG path describing the freehand line',
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'line' COMMENT 'line, oval, rect, etc.',
  `colour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'black' COMMENT 'Can be red, yellow, green, blue, white, black',
  `draft` tinyint NOT NULL DEFAULT '1' COMMENT 'Is this a draft annotation?',
  PRIMARY KEY (`id`),
  KEY `gradeid_pageno` (`gradeid`,`pageno`),
  CONSTRAINT `assignfeedback_editpdf_annot_gradeid_foreign` FOREIGN KEY (`gradeid`) REFERENCES `assign_grades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignfeedback_editpdf_cmnt`
--

DROP TABLE IF EXISTS `assignfeedback_editpdf_cmnt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignfeedback_editpdf_cmnt` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gradeid` bigint unsigned NOT NULL DEFAULT '0',
  `x` int DEFAULT '0' COMMENT 'x-position of the top-left corner of the comment (in pixels - image resolution is set to 100 pixels per inch)',
  `y` int DEFAULT '0' COMMENT 'y-position of the top-left corner of the comment (in pixels - image resolution is set to 100 pixels per inch)',
  `width` int DEFAULT '120' COMMENT 'width, in pixels, of the comment box',
  `rawtext` text COLLATE utf8mb4_unicode_ci COMMENT 'Raw text of the comment',
  `pageno` int NOT NULL DEFAULT '0' COMMENT 'The page in the PDF that this comment appears on',
  `colour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'black' COMMENT 'Can be red, yellow, green, blue, white, black',
  `draft` tinyint NOT NULL DEFAULT '1' COMMENT 'Is this a draft comment?',
  PRIMARY KEY (`id`),
  KEY `gradeid_pageno` (`gradeid`,`pageno`),
  CONSTRAINT `assignfeedback_editpdf_cmnt_gradeid_foreign` FOREIGN KEY (`gradeid`) REFERENCES `assign_grades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignfeedback_editpdf_quick`
--

DROP TABLE IF EXISTS `assignfeedback_editpdf_quick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignfeedback_editpdf_quick` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `rawtext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int NOT NULL DEFAULT '120',
  `colour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'yellow',
  PRIMARY KEY (`id`),
  KEY `assignfeedback_editpdf_quick_userid_foreign` (`userid`),
  CONSTRAINT `assignfeedback_editpdf_quick_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignfeedback_editpdf_rot`
--

DROP TABLE IF EXISTS `assignfeedback_editpdf_rot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignfeedback_editpdf_rot` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gradeid` bigint unsigned NOT NULL DEFAULT '0',
  `pageno` int NOT NULL DEFAULT '0' COMMENT 'Page number',
  `pathnamehash` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'File path hash of the rotated page',
  `isrotated` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the page is rotated or not',
  `degree` int NOT NULL DEFAULT '0' COMMENT 'Rotation degree',
  PRIMARY KEY (`id`),
  UNIQUE KEY `gradeid_pageno` (`gradeid`,`pageno`),
  CONSTRAINT `assignfeedback_editpdf_rot_gradeid_foreign` FOREIGN KEY (`gradeid`) REFERENCES `assign_grades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignfeedback_file`
--

DROP TABLE IF EXISTS `assignfeedback_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignfeedback_file` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `grade` bigint unsigned NOT NULL DEFAULT '0',
  `numfiles` int NOT NULL DEFAULT '0' COMMENT 'The number of files uploaded by a grader.',
  PRIMARY KEY (`id`),
  KEY `assignfeedback_file_assignment_foreign` (`assignment`),
  KEY `assignfeedback_file_grade_foreign` (`grade`),
  CONSTRAINT `assignfeedback_file_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`),
  CONSTRAINT `assignfeedback_file_grade_foreign` FOREIGN KEY (`grade`) REFERENCES `assign_grades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignsubmission_file`
--

DROP TABLE IF EXISTS `assignsubmission_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignsubmission_file` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `submission` bigint unsigned NOT NULL DEFAULT '0',
  `numfiles` int NOT NULL DEFAULT '0' COMMENT 'The number of files the student submitted.',
  PRIMARY KEY (`id`),
  KEY `assignsubmission_file_assignment_foreign` (`assignment`),
  KEY `assignsubmission_file_submission_foreign` (`submission`),
  CONSTRAINT `assignsubmission_file_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`),
  CONSTRAINT `assignsubmission_file_submission_foreign` FOREIGN KEY (`submission`) REFERENCES `assign_submission` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assignsubmission_onlinetext`
--

DROP TABLE IF EXISTS `assignsubmission_onlinetext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignsubmission_onlinetext` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint unsigned NOT NULL DEFAULT '0',
  `submission` bigint unsigned NOT NULL DEFAULT '0',
  `onlinetext` text COLLATE utf8mb4_unicode_ci COMMENT 'The text for this online text submission.',
  `onlineformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format for this online text submission.',
  PRIMARY KEY (`id`),
  KEY `assignsubmission_onlinetext_assignment_foreign` (`assignment`),
  KEY `assignsubmission_onlinetext_submission_foreign` (`submission`),
  CONSTRAINT `assignsubmission_onlinetext_assignment_foreign` FOREIGN KEY (`assignment`) REFERENCES `assign` (`id`),
  CONSTRAINT `assignsubmission_onlinetext_submission_foreign` FOREIGN KEY (`submission`) REFERENCES `assign_submission` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_lti_linked_login`
--

DROP TABLE IF EXISTS `auth_lti_linked_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_lti_linked_login` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL COMMENT 'The user account the LTI user is linked to.',
  `issuer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuer256` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SHA256 hash of the issuer from which the platform user originates.',
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub256` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SHA256 hash of the subject identifying the user for the issuer.',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_key` (`userid`,`issuer256`,`sub256`),
  CONSTRAINT `auth_lti_linked_login_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_oauth2_linked_login`
--

DROP TABLE IF EXISTS `auth_oauth2_linked_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_oauth2_linked_login` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL COMMENT 'The user account this oauth login is linked to.',
  `issuerid` bigint unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The external username to map to this moodle account',
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The external email to map to this moodle account',
  `confirmtoken` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'If this is not empty - the user has not confirmed their email to create the link.',
  `confirmtokenexpires` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_key` (`userid`,`issuerid`,`username`),
  KEY `search_index` (`issuerid`,`username`),
  KEY `auth_oauth2_linked_login_usermodified_foreign` (`usermodified`),
  CONSTRAINT `auth_oauth2_linked_login_issuerid_foreign` FOREIGN KEY (`issuerid`) REFERENCES `oauth2_issuer` (`id`),
  CONSTRAINT `auth_oauth2_linked_login_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `auth_oauth2_linked_login_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `backup_controllers`
--

DROP TABLE IF EXISTS `backup_controllers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `backup_controllers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `backupid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'unique id of the backup',
  `operation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backup' COMMENT 'Type of operation (backup/restore)',
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Type of the backup (activity/section/course)',
  `itemid` int NOT NULL COMMENT 'id of the module/section/activity being backup',
  `format` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'format of the backup (moodle/imscc...)',
  `interactive` smallint NOT NULL COMMENT 'is the backup interactive (1-yes/0-no)',
  `purpose` smallint NOT NULL COMMENT 'purpose (target) of the backup (general, import, hub...)',
  `userid` bigint unsigned NOT NULL COMMENT 'user that owns/performs the backup',
  `status` smallint NOT NULL COMMENT 'current status of the backup (configured, ui, running...)',
  `execution` smallint NOT NULL COMMENT 'type of execution (immediate/delayed)',
  `executiontime` int NOT NULL COMMENT 'epoch secs when the backup should be executed (for delayed backups only)',
  `checksum` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'checksum of the backup_controller object',
  `timecreated` int NOT NULL COMMENT 'time the controller was created',
  `timemodified` int NOT NULL COMMENT 'last time the controller was modified',
  `progress` decimal(15,14) NOT NULL DEFAULT '0.00000000000000' COMMENT 'The backup or restore progress as a floating point number',
  `controller` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'serialised backup_controller object',
  PRIMARY KEY (`id`),
  UNIQUE KEY `backupid_uk` (`backupid`),
  KEY `typeitem_ix` (`type`,`itemid`),
  KEY `useritem_ix` (`userid`,`itemid`),
  CONSTRAINT `backup_controllers_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `backup_courses`
--

DROP TABLE IF EXISTS `backup_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `backup_courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `laststarttime` int NOT NULL DEFAULT '0',
  `lastendtime` int NOT NULL DEFAULT '0',
  `laststatus` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5',
  `nextstarttime` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `backup_logs`
--

DROP TABLE IF EXISTS `backup_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `backup_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `backupid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'backupid the log record belongs to',
  `loglevel` smallint NOT NULL COMMENT 'level of the log (debug...error)',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'text logged',
  `timecreated` int NOT NULL COMMENT 'timestamp this log entry was created',
  PRIMARY KEY (`id`),
  UNIQUE KEY `backupid-id` (`backupid`,`id`),
  CONSTRAINT `backup_logs_backupid_foreign` FOREIGN KEY (`backupid`) REFERENCES `backup_controllers` (`backupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge`
--

DROP TABLE IF EXISTS `badge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `usercreated` bigint unsigned NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  `issuername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuerurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuercontact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiredate` int DEFAULT NULL,
  `expireperiod` int DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = site, 2 = course',
  `courseid` bigint unsigned DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `messagesubject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Attach baked badge for download',
  `notification` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Message when badge is awarded',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Badge status: 0 = inactive, 1 = active, 2 = active+locked, 3 = inactive+locked, 4 = archived',
  `nextcron` int DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageauthorname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageauthoremail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageauthorurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagecaption` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `badge_courseid_foreign` (`courseid`),
  KEY `badge_usermodified_foreign` (`usermodified`),
  KEY `badge_usercreated_foreign` (`usercreated`),
  CONSTRAINT `badge_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `badge_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `badge_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_alignment`
--

DROP TABLE IF EXISTS `badge_alignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_alignment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badgeid` bigint unsigned NOT NULL DEFAULT '0',
  `targetname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `targeturl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `targetdescription` text COLLATE utf8mb4_unicode_ci,
  `targetframework` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `targetcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `badge_alignment_badgeid_foreign` (`badgeid`),
  CONSTRAINT `badge_alignment_badgeid_foreign` FOREIGN KEY (`badgeid`) REFERENCES `badge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_backpack`
--

DROP TABLE IF EXISTS `badge_backpack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_backpack` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backpackuid` int NOT NULL,
  `autosync` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `externalbackpackid` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `backpackcredentials` (`userid`,`externalbackpackid`),
  KEY `badge_backpack_externalbackpackid_foreign` (`externalbackpackid`),
  CONSTRAINT `badge_backpack_externalbackpackid_foreign` FOREIGN KEY (`externalbackpackid`) REFERENCES `badge_external_backpack` (`id`),
  CONSTRAINT `badge_backpack_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_backpack_oauth2`
--

DROP TABLE IF EXISTS `badge_backpack_oauth2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_backpack_oauth2` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL,
  `issuerid` bigint unsigned NOT NULL,
  `externalbackpackid` bigint unsigned NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `refreshtoken` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` int DEFAULT NULL,
  `scope` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `badge_backpack_oauth2_usermodified_foreign` (`usermodified`),
  KEY `badge_backpack_oauth2_userid_foreign` (`userid`),
  KEY `badge_backpack_oauth2_issuerid_foreign` (`issuerid`),
  KEY `badge_backpack_oauth2_externalbackpackid_foreign` (`externalbackpackid`),
  CONSTRAINT `badge_backpack_oauth2_externalbackpackid_foreign` FOREIGN KEY (`externalbackpackid`) REFERENCES `badge_external_backpack` (`id`),
  CONSTRAINT `badge_backpack_oauth2_issuerid_foreign` FOREIGN KEY (`issuerid`) REFERENCES `oauth2_issuer` (`id`),
  CONSTRAINT `badge_backpack_oauth2_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `badge_backpack_oauth2_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_criteria`
--

DROP TABLE IF EXISTS `badge_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_criteria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badgeid` bigint unsigned NOT NULL DEFAULT '0',
  `criteriatype` int DEFAULT NULL COMMENT 'The criteria type we are aggregating',
  `method` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = all, 2 = any',
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `badgecriteriatype` (`badgeid`,`criteriatype`),
  KEY `criteriatype` (`criteriatype`),
  CONSTRAINT `badge_criteria_badgeid_foreign` FOREIGN KEY (`badgeid`) REFERENCES `badge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_criteria_met`
--

DROP TABLE IF EXISTS `badge_criteria_met`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_criteria_met` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `issuedid` bigint unsigned DEFAULT NULL,
  `critid` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `datemet` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `badge_criteria_met_critid_foreign` (`critid`),
  KEY `badge_criteria_met_userid_foreign` (`userid`),
  KEY `badge_criteria_met_issuedid_foreign` (`issuedid`),
  CONSTRAINT `badge_criteria_met_critid_foreign` FOREIGN KEY (`critid`) REFERENCES `badge_criteria` (`id`),
  CONSTRAINT `badge_criteria_met_issuedid_foreign` FOREIGN KEY (`issuedid`) REFERENCES `badge_issued` (`id`),
  CONSTRAINT `badge_criteria_met_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_criteria_param`
--

DROP TABLE IF EXISTS `badge_criteria_param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_criteria_param` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `critid` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `badge_criteria_param_critid_foreign` (`critid`),
  CONSTRAINT `badge_criteria_param_critid_foreign` FOREIGN KEY (`critid`) REFERENCES `badge_criteria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_endorsement`
--

DROP TABLE IF EXISTS `badge_endorsement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_endorsement` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badgeid` bigint unsigned NOT NULL DEFAULT '0',
  `issuername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuerurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issueremail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claimid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claimcomment` text COLLATE utf8mb4_unicode_ci,
  `dateissued` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `badge_endorsement_badgeid_foreign` (`badgeid`),
  CONSTRAINT `badge_endorsement_badgeid_foreign` FOREIGN KEY (`badgeid`) REFERENCES `badge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_external`
--

DROP TABLE IF EXISTS `badge_external`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_external` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `backpackid` bigint unsigned NOT NULL COMMENT 'ID of a backpack',
  `collectionid` int NOT NULL COMMENT 'Badge collection id in the backpack',
  `entityid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assertion` text COLLATE utf8mb4_unicode_ci COMMENT 'Assertion of external badge',
  PRIMARY KEY (`id`),
  KEY `badge_external_backpackid_foreign` (`backpackid`),
  CONSTRAINT `badge_external_backpackid_foreign` FOREIGN KEY (`backpackid`) REFERENCES `badge_backpack` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_external_backpack`
--

DROP TABLE IF EXISTS `badge_external_backpack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_external_backpack` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `backpackapiurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backpackweburl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apiversion` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `sortorder` int NOT NULL DEFAULT '0',
  `oauth2_issuerid` bigint unsigned DEFAULT NULL COMMENT 'OAuth 2 Issuer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `backpackapiurlkey` (`backpackapiurl`),
  UNIQUE KEY `backpackweburlkey` (`backpackweburl`),
  KEY `badge_external_backpack_oauth2_issuerid_foreign` (`oauth2_issuerid`),
  CONSTRAINT `badge_external_backpack_oauth2_issuerid_foreign` FOREIGN KEY (`oauth2_issuerid`) REFERENCES `oauth2_issuer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_external_identifier`
--

DROP TABLE IF EXISTS `badge_external_identifier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_external_identifier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sitebackpackid` bigint unsigned NOT NULL COMMENT 'ID of a site backpack',
  `internalid` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `externalid` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `backpack-internal-external` (`sitebackpackid`,`internalid`,`externalid`,`type`),
  CONSTRAINT `badge_external_identifier_sitebackpackid_foreign` FOREIGN KEY (`sitebackpackid`) REFERENCES `badge_backpack` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_issued`
--

DROP TABLE IF EXISTS `badge_issued`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_issued` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badgeid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `uniquehash` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateissued` int NOT NULL DEFAULT '0',
  `dateexpire` int DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `issuernotified` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `badgeuser` (`badgeid`,`userid`),
  KEY `badge_issued_userid_foreign` (`userid`),
  CONSTRAINT `badge_issued_badgeid_foreign` FOREIGN KEY (`badgeid`) REFERENCES `badge` (`id`),
  CONSTRAINT `badge_issued_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_manual_award`
--

DROP TABLE IF EXISTS `badge_manual_award`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_manual_award` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badgeid` bigint unsigned NOT NULL,
  `recipientid` bigint unsigned NOT NULL,
  `issuerid` bigint unsigned NOT NULL,
  `issuerrole` bigint unsigned NOT NULL,
  `datemet` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `badge_manual_award_badgeid_foreign` (`badgeid`),
  KEY `badge_manual_award_recipientid_foreign` (`recipientid`),
  KEY `badge_manual_award_issuerid_foreign` (`issuerid`),
  KEY `badge_manual_award_issuerrole_foreign` (`issuerrole`),
  CONSTRAINT `badge_manual_award_badgeid_foreign` FOREIGN KEY (`badgeid`) REFERENCES `badge` (`id`),
  CONSTRAINT `badge_manual_award_issuerid_foreign` FOREIGN KEY (`issuerid`) REFERENCES `users` (`id`),
  CONSTRAINT `badge_manual_award_issuerrole_foreign` FOREIGN KEY (`issuerrole`) REFERENCES `role` (`id`),
  CONSTRAINT `badge_manual_award_recipientid_foreign` FOREIGN KEY (`recipientid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `badge_related`
--

DROP TABLE IF EXISTS `badge_related`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge_related` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badgeid` bigint unsigned NOT NULL DEFAULT '0',
  `relatedbadgeid` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `badgeid-relatedbadgeid` (`badgeid`,`relatedbadgeid`),
  KEY `badge_related_relatedbadgeid_foreign` (`relatedbadgeid`),
  CONSTRAINT `badge_related_badgeid_foreign` FOREIGN KEY (`badgeid`) REFERENCES `badge` (`id`),
  CONSTRAINT `badge_related_relatedbadgeid_foreign` FOREIGN KEY (`relatedbadgeid`) REFERENCES `badge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bigbluebuttonbn`
--

DROP TABLE IF EXISTS `bigbluebuttonbn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bigbluebuttonbn` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL DEFAULT '0',
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '1',
  `meetingid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moderatorpass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewerpass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wait` tinyint(1) NOT NULL DEFAULT '0',
  `record` tinyint(1) NOT NULL DEFAULT '0',
  `recordallfromstart` tinyint(1) NOT NULL DEFAULT '0',
  `recordhidebutton` tinyint(1) NOT NULL DEFAULT '0',
  `welcome` text COLLATE utf8mb4_unicode_ci,
  `voicebridge` smallint NOT NULL DEFAULT '0',
  `openingtime` int NOT NULL DEFAULT '0',
  `closingtime` int NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `presentation` text COLLATE utf8mb4_unicode_ci,
  `participants` text COLLATE utf8mb4_unicode_ci,
  `userlimit` tinyint NOT NULL DEFAULT '0',
  `recordings_html` tinyint(1) NOT NULL DEFAULT '0',
  `recordings_deleted` tinyint(1) NOT NULL DEFAULT '1',
  `recordings_imported` tinyint(1) NOT NULL DEFAULT '0',
  `recordings_preview` tinyint(1) NOT NULL DEFAULT '0',
  `clienttype` tinyint(1) NOT NULL DEFAULT '0',
  `muteonstart` tinyint(1) NOT NULL DEFAULT '0',
  `disablecam` tinyint(1) NOT NULL DEFAULT '0',
  `disablemic` tinyint(1) NOT NULL DEFAULT '0',
  `disableprivatechat` tinyint(1) NOT NULL DEFAULT '0',
  `disablepublicchat` tinyint(1) NOT NULL DEFAULT '0',
  `disablenote` tinyint(1) NOT NULL DEFAULT '0',
  `hideuserlist` tinyint(1) NOT NULL DEFAULT '0',
  `completionattendance` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if a certain number of minutes in the meeting are required to mark an activity completed for a user.',
  `completionengagementchats` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if chat during the meeting is required to mark an activity completed for a user.',
  `completionengagementtalks` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if talking during the meeting is required to mark an activity completed for a user.',
  `completionengagementraisehand` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if raising hand during the meeting is required to mark an activity completed for a user.',
  `completionengagementpollvotes` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if poll voting during the meeting is required to mark an activity completed for a user.',
  `completionengagementemojis` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if the use of emojis during the meeting is required to mark an activity completed for a user.',
  `guestallowed` tinyint DEFAULT '0',
  `mustapproveuser` tinyint DEFAULT '1',
  `guestlinkuid` text COLLATE utf8mb4_unicode_ci,
  `guestpassword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bigbluebuttonbn_logs`
--

DROP TABLE IF EXISTS `bigbluebuttonbn_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bigbluebuttonbn_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL,
  `bigbluebuttonbnid` int NOT NULL,
  `userid` int DEFAULT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `meetingid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `log` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `log` (`log`),
  KEY `logrow` (`courseid`,`bigbluebuttonbnid`,`userid`,`log`),
  KEY `userlog` (`userid`,`log`),
  KEY `course_bbbid_ix` (`courseid`,`bigbluebuttonbnid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bigbluebuttonbn_recordings`
--

DROP TABLE IF EXISTS `bigbluebuttonbn_recordings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bigbluebuttonbn_recordings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL,
  `bigbluebuttonbnid` bigint unsigned NOT NULL,
  `groupid` int DEFAULT NULL,
  `recordingid` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headless` tinyint(1) NOT NULL DEFAULT '0',
  `imported` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `importeddata` text COLLATE utf8mb4_unicode_ci COMMENT 'This is the remote recording data stored as json and kept for future reference.',
  `timecreated` int NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `recordingid` (`recordingid`),
  KEY `bigbluebuttonbn_recordings_bigbluebuttonbnid_foreign` (`bigbluebuttonbnid`),
  KEY `bigbluebuttonbn_recordings_usermodified_foreign` (`usermodified`),
  CONSTRAINT `bigbluebuttonbn_recordings_bigbluebuttonbnid_foreign` FOREIGN KEY (`bigbluebuttonbnid`) REFERENCES `bigbluebuttonbn` (`id`),
  CONSTRAINT `bigbluebuttonbn_recordings_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cron` int NOT NULL DEFAULT '0',
  `lastcron` int NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block_instances`
--

DROP TABLE IF EXISTS `block_instances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_instances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blockname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of block this is. Foreign key, references block.name.',
  `parentcontextid` bigint unsigned NOT NULL COMMENT 'The context within which this block appears. Foreign key, references context.id.',
  `showinsubcontexts` smallint NOT NULL COMMENT 'If 1, this block appears on all matching pages in subcontexts of parentcontextid, as well in pages belonging to parentcontextid.',
  `requiredbytheme` smallint NOT NULL DEFAULT '0' COMMENT 'If 1, this block was created because it was required by the theme and did not exist.',
  `pagetypepattern` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The types of page this block appears on. Either an exact page type like mod-quiz-view, or a pattern like mod-quiz-* or course-view-*. Note that course-view-* will match course-view.',
  `subpagepattern` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Further restrictions on where this block appears. In some places, e.g. during a quiz or lesson attempt, different pages have different subpage ids. If this field is not null, the block only appears on that particular subpage.',
  `defaultregion` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Which block region this block should appear in on each page, in the absence of a specific position in the block_positions table.',
  `defaultweight` int NOT NULL COMMENT 'Used to order the blocks within a block region. Again, may be overridden by the block_positions table for a specific page where this block appears.',
  `configdata` text COLLATE utf8mb4_unicode_ci COMMENT 'A serialized blob of configuration data for this block instance.',
  `timecreated` int NOT NULL COMMENT 'Time at which this block instance was originally created',
  `timemodified` int NOT NULL COMMENT 'Time at which block instance was last modified.',
  PRIMARY KEY (`id`),
  KEY `parentcontextid-showinsubcontexts-pagetypepattern-subpagepattern` (`parentcontextid`,`showinsubcontexts`,`pagetypepattern`,`subpagepattern`),
  KEY `timemodified` (`timemodified`),
  KEY `blocknameindex` (`blockname`),
  CONSTRAINT `block_instances_parentcontextid_foreign` FOREIGN KEY (`parentcontextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block_positions`
--

DROP TABLE IF EXISTS `block_positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blockinstanceid` bigint unsigned NOT NULL COMMENT 'The block_instance this position relates to.',
  `contextid` bigint unsigned NOT NULL COMMENT 'With pagetype and subpage, defines the page we are setting the position for.',
  `pagetype` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'With contextid and subpage, defines the page we are setting the position for.',
  `subpage` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'With contextid and pagetype, defines the page we are setting the position for.',
  `visible` smallint NOT NULL COMMENT 'Whether this block instance is visible on this page.',
  `region` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Which block region on this page this block should appear in.',
  `weight` int NOT NULL COMMENT 'Used to order the blocks within a block region.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blockinstanceid-contextid-pagetype-subpage` (`blockinstanceid`,`contextid`,`pagetype`,`subpage`),
  KEY `block_positions_contextid_foreign` (`contextid`),
  CONSTRAINT `block_positions_blockinstanceid_foreign` FOREIGN KEY (`blockinstanceid`) REFERENCES `block_instances` (`id`),
  CONSTRAINT `block_positions_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block_recent_activity`
--

DROP TABLE IF EXISTS `block_recent_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_recent_activity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL COMMENT 'Course id',
  `cmid` int NOT NULL COMMENT 'Course module id',
  `timecreated` int NOT NULL,
  `userid` int NOT NULL COMMENT 'User performing the action',
  `action` tinyint(1) NOT NULL COMMENT '0 created, 1 updated, 2 deleted',
  `modname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'module type name (for delete action)',
  PRIMARY KEY (`id`),
  KEY `coursetime` (`courseid`,`timecreated`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block_recentlyaccesseditems`
--

DROP TABLE IF EXISTS `block_recentlyaccesseditems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_recentlyaccesseditems` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL COMMENT 'Course id the item belongs to',
  `cmid` bigint unsigned NOT NULL COMMENT 'Item course module id',
  `userid` bigint unsigned NOT NULL COMMENT 'User id that accessed the item',
  `timeaccess` int NOT NULL COMMENT 'Time the user accessed the last time an item',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-courseid-cmid` (`userid`,`courseid`,`cmid`),
  KEY `block_recentlyaccesseditems_courseid_foreign` (`courseid`),
  KEY `block_recentlyaccesseditems_cmid_foreign` (`cmid`),
  CONSTRAINT `block_recentlyaccesseditems_cmid_foreign` FOREIGN KEY (`cmid`) REFERENCES `course_modules` (`id`),
  CONSTRAINT `block_recentlyaccesseditems_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `block_recentlyaccesseditems_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block_rss_client`
--

DROP TABLE IF EXISTS `block_rss_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_rss_client` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferredtitle` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shared` tinyint NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skiptime` int NOT NULL DEFAULT '0' COMMENT 'How many seconds skip this feed for (increases every time it fails, resets to 0 when it succeeds)',
  `skipuntil` int NOT NULL DEFAULT '0' COMMENT 'Do not query this RSS feed again until this time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `blog_association`
--

DROP TABLE IF EXISTS `blog_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_association` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL,
  `blogid` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_association_contextid_foreign` (`contextid`),
  KEY `blog_association_blogid_foreign` (`blogid`),
  CONSTRAINT `blog_association_blogid_foreign` FOREIGN KEY (`blogid`) REFERENCES `post` (`id`),
  CONSTRAINT `blog_association_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `blog_external`
--

DROP TABLE IF EXISTS `blog_external`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_external` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filtertags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Comma-separated list of tags that will be used to filter which entries are copied over from the external blog. They refer to existing tags in the external blog.',
  `failedlastsync` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether or not the last sync failed for some reason',
  `timemodified` int DEFAULT NULL,
  `timefetched` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blog_external_userid_foreign` (`userid`),
  CONSTRAINT `blog_external_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `numbering` smallint NOT NULL DEFAULT '0',
  `navstyle` smallint NOT NULL DEFAULT '1',
  `customtitles` tinyint NOT NULL DEFAULT '0',
  `revision` int NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `book_course_foreign` (`course`),
  CONSTRAINT `book_course_foreign` FOREIGN KEY (`course`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `book_chapters`
--

DROP TABLE IF EXISTS `book_chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_chapters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bookid` int NOT NULL DEFAULT '0',
  `pagenum` int NOT NULL DEFAULT '0',
  `subchapter` int NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentformat` smallint NOT NULL DEFAULT '0',
  `hidden` tinyint NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `importsrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache_filters`
--

DROP TABLE IF EXISTS `cache_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_filters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filter` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int NOT NULL DEFAULT '0',
  `md5key` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rawtext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `filter_md5key` (`filter`,`md5key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache_flags`
--

DROP TABLE IF EXISTS `cache_flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_flags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `flagtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timemodified` int NOT NULL DEFAULT '0',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flagtype` (`flagtype`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `capabilities`
--

DROP TABLE IF EXISTS `capabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capabilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `captype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contextlevel` int NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `riskbitmask` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'text format of intro field',
  `keepdays` bigint NOT NULL DEFAULT '0',
  `studentlogs` smallint NOT NULL DEFAULT '0',
  `chattime` int NOT NULL DEFAULT '0',
  `schedule` smallint NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chatid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '0',
  `issystem` tinyint(1) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `groupid` (`groupid`),
  KEY `timestamp-chatid` (`timestamp`,`chatid`),
  KEY `chat_messages_chatid_foreign` (`chatid`),
  CONSTRAINT `chat_messages_chatid_foreign` FOREIGN KEY (`chatid`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chat_messages_current`
--

DROP TABLE IF EXISTS `chat_messages_current`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_messages_current` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chatid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '0',
  `issystem` tinyint(1) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `groupid` (`groupid`),
  KEY `timestamp-chatid` (`timestamp`,`chatid`),
  KEY `chat_messages_current_chatid_foreign` (`chatid`),
  CONSTRAINT `chat_messages_current_chatid_foreign` FOREIGN KEY (`chatid`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chat_users`
--

DROP TABLE IF EXISTS `chat_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chatid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint NOT NULL DEFAULT '0',
  `groupid` bigint NOT NULL DEFAULT '0',
  `version` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstping` int NOT NULL DEFAULT '0',
  `lastping` int NOT NULL DEFAULT '0',
  `lastmessageping` int NOT NULL DEFAULT '0',
  `sid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` bigint unsigned NOT NULL DEFAULT '0',
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `lastping` (`lastping`),
  KEY `groupid` (`groupid`),
  KEY `chat_users_chatid_foreign` (`chatid`),
  KEY `chat_users_course_foreign` (`course`),
  CONSTRAINT `chat_users_chatid_foreign` FOREIGN KEY (`chatid`) REFERENCES `chat` (`id`),
  CONSTRAINT `chat_users_course_foreign` FOREIGN KEY (`course`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `choice`
--

DROP TABLE IF EXISTS `choice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `choice` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0',
  `publish` tinyint NOT NULL DEFAULT '0',
  `showresults` tinyint NOT NULL DEFAULT '0',
  `display` smallint NOT NULL DEFAULT '0',
  `allowupdate` tinyint NOT NULL DEFAULT '0',
  `allowmultiple` tinyint NOT NULL DEFAULT '0',
  `showunanswered` tinyint NOT NULL DEFAULT '0',
  `includeinactive` tinyint NOT NULL DEFAULT '1',
  `limitanswers` tinyint NOT NULL DEFAULT '0',
  `timeopen` int NOT NULL DEFAULT '0',
  `timeclose` int NOT NULL DEFAULT '0',
  `showpreview` tinyint NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `completionsubmit` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this field is set to 1, then the activity will be automatically marked as ''complete'' once the user submits their choice.',
  `showavailable` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this field is set to 1, then the the number of available space on choice options will be shown, given limitanswers is set to 1.',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `choice_answers`
--

DROP TABLE IF EXISTS `choice_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `choice_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `choiceid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `optionid` bigint unsigned NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `choice_answers_choiceid_foreign` (`choiceid`),
  KEY `choice_answers_optionid_foreign` (`optionid`),
  CONSTRAINT `choice_answers_choiceid_foreign` FOREIGN KEY (`choiceid`) REFERENCES `choice` (`id`),
  CONSTRAINT `choice_answers_optionid_foreign` FOREIGN KEY (`optionid`) REFERENCES `choice_options` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `choice_options`
--

DROP TABLE IF EXISTS `choice_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `choice_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `choiceid` bigint unsigned NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci,
  `maxanswers` int DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `choice_options_choiceid_foreign` (`choiceid`),
  CONSTRAINT `choice_options_choiceid_foreign` FOREIGN KEY (`choiceid`) REFERENCES `choice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cohort`
--

DROP TABLE IF EXISTS `cohort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cohort` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL COMMENT 'Context is usually ignored in sync operations so that the cohorts may be moved freely around in the context tree without any side affects.',
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Short human readable name for the cohort, does not have to be unique',
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Unique identifier of a cohort, useful especially for mapping to external entities',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Standard description text box',
  `descriptionformat` tinyint NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Visibility to teachers',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Component (plugintype_pluignname) that manages the cohort, manual modifications are allowed only when set to NULL',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `theme` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cohort_contextid_foreign` (`contextid`),
  CONSTRAINT `cohort_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cohort_members`
--

DROP TABLE IF EXISTS `cohort_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cohort_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cohortid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `timeadded` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cohortid-userid` (`cohortid`,`userid`),
  KEY `cohort_members_userid_foreign` (`userid`),
  CONSTRAINT `cohort_members_cohortid_foreign` FOREIGN KEY (`cohortid`) REFERENCES `cohort` (`id`),
  CONSTRAINT `cohort_members_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` int NOT NULL,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The plugin this comment belongs to.',
  `commentarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` tinyint NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_concomitem` (`contextid`,`commentarea`,`itemid`),
  KEY `comments_userid_foreign` (`userid`),
  CONSTRAINT `comments_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `communication`
--

DROP TABLE IF EXISTS `communication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communication` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL COMMENT 'The id of the context that this communication instance relates to',
  `instanceid` int NOT NULL COMMENT 'ID of the instance where the communication is a part of',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Component of the instance where the communication room is a part of',
  `instancetype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of the instance for the given component',
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the selected communication provider',
  `roomname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name of the communication room',
  `avatarfilename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name of the avatar file name for the communication instance',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'The communication instance is active or not',
  `avatarsynced` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicate if the avatar has been synced with the provider',
  PRIMARY KEY (`id`),
  KEY `communication_contextid_foreign` (`contextid`),
  CONSTRAINT `communication_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `communication_customlink`
--

DROP TABLE IF EXISTS `communication_customlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communication_customlink` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `commid` bigint unsigned NOT NULL COMMENT 'ID of the communication record',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'URL being linked to by the provider',
  PRIMARY KEY (`id`),
  KEY `communication_customlink_commid_foreign` (`commid`),
  CONSTRAINT `communication_customlink_commid_foreign` FOREIGN KEY (`commid`) REFERENCES `communication` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `communication_user`
--

DROP TABLE IF EXISTS `communication_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communication_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `commid` bigint unsigned NOT NULL COMMENT 'ID of the communication instance',
  `userid` bigint unsigned NOT NULL COMMENT 'ID of the moodle user to map with communication instance',
  `synced` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'The user is synced or not',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'The user need to be deleted or not',
  PRIMARY KEY (`id`),
  KEY `communication_user_commid_foreign` (`commid`),
  KEY `communication_user_userid_foreign` (`userid`),
  CONSTRAINT `communication_user_commid_foreign` FOREIGN KEY (`commid`) REFERENCES `communication` (`id`),
  CONSTRAINT `communication_user_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency`
--

DROP TABLE IF EXISTS `competency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Shortname of a competency',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Description of a single competency',
  `descriptionformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format of the description field',
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competencyframeworkid` int NOT NULL COMMENT 'The framework this competency relates to.',
  `parentid` int NOT NULL DEFAULT '0' COMMENT 'The parent competency.',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Used to speed up queries that use an entire branch of the tree. Looks like /5/34/54.',
  `sortorder` int NOT NULL COMMENT 'Relative sort order within the branch',
  `ruletype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruleoutcome` tinyint NOT NULL DEFAULT '0',
  `ruleconfig` text COLLATE utf8mb4_unicode_ci,
  `scaleid` bigint unsigned DEFAULT NULL,
  `scaleconfiguration` text COLLATE utf8mb4_unicode_ci,
  `timecreated` int NOT NULL COMMENT 'The time this competency was created.',
  `timemodified` int NOT NULL COMMENT 'The time this competency was last modified.',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'The user who last modified this competency',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idnumberframework` (`competencyframeworkid`,`idnumber`),
  KEY `ruleoutcome` (`ruleoutcome`),
  KEY `competency_scaleid_foreign` (`scaleid`),
  KEY `competency_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`),
  CONSTRAINT `competency_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_coursecomp`
--

DROP TABLE IF EXISTS `competency_coursecomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_coursecomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL COMMENT 'The course this competency is linked to.',
  `competencyid` bigint unsigned NOT NULL COMMENT 'The competency that is linked to this course.',
  `ruleoutcome` tinyint NOT NULL COMMENT 'The rule that applies to the competency when the course is completed.',
  `timecreated` int NOT NULL COMMENT 'The time this link was created.',
  `timemodified` int NOT NULL COMMENT 'The time this link was modified.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who modified this link.',
  `sortorder` int NOT NULL COMMENT 'The display order for this link.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseidcompetencyid` (`courseid`,`competencyid`),
  KEY `courseidruleoutcome` (`courseid`,`ruleoutcome`),
  KEY `competency_coursecomp_competencyid_foreign` (`competencyid`),
  KEY `competency_coursecomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_coursecomp_competencyid_foreign` FOREIGN KEY (`competencyid`) REFERENCES `competency` (`id`),
  CONSTRAINT `competency_coursecomp_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `competency_coursecomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_coursecompsetting`
--

DROP TABLE IF EXISTS `competency_coursecompsetting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_coursecompsetting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL COMMENT 'The course this setting is linked to.',
  `pushratingstouserplans` tinyint DEFAULT NULL COMMENT 'Does this course push ratings to user plans?',
  `timecreated` int NOT NULL COMMENT 'The time this setting was created.',
  `timemodified` int NOT NULL COMMENT 'The time this setting was last modified.',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'The user who last modified this setting',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseidlink` (`courseid`),
  KEY `competency_coursecompsetting_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_coursecompsetting_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_evidence`
--

DROP TABLE IF EXISTS `competency_evidence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_evidence` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usercompetencyid` int NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `action` tinyint NOT NULL,
  `actionuserid` bigint unsigned DEFAULT NULL,
  `descidentifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desccomponent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desca` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` int DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci COMMENT 'A non-localised text to attach to the evidence.',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usercompetencyid` (`usercompetencyid`),
  KEY `competency_evidence_contextid_foreign` (`contextid`),
  KEY `competency_evidence_actionuserid_foreign` (`actionuserid`),
  KEY `competency_evidence_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_evidence_actionuserid_foreign` FOREIGN KEY (`actionuserid`) REFERENCES `users` (`id`),
  CONSTRAINT `competency_evidence_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `competency_evidence_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_framework`
--

DROP TABLE IF EXISTS `competency_framework`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_framework` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Short name for the competency framework.',
  `contextid` bigint unsigned NOT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Unique idnumber for this competency framework.',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Description of this competency framework',
  `descriptionformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format of the description field',
  `scaleid` bigint unsigned DEFAULT NULL COMMENT 'Scale used to define competency.',
  `scaleconfiguration` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Scale information.',
  `visible` tinyint NOT NULL DEFAULT '1' COMMENT 'Used to show/hide this competency framework.',
  `taxonomies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sequence of terms to use for each competency level.',
  `timecreated` int NOT NULL COMMENT 'The time this competency framework was created.',
  `timemodified` int NOT NULL COMMENT 'The time this competency framework was last modified.',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'The user who last modified this framework',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idnumber` (`idnumber`),
  KEY `competency_framework_contextid_foreign` (`contextid`),
  KEY `competency_framework_scaleid_foreign` (`scaleid`),
  KEY `competency_framework_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_framework_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `competency_framework_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`),
  CONSTRAINT `competency_framework_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_modulecomp`
--

DROP TABLE IF EXISTS `competency_modulecomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_modulecomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cmid` bigint unsigned NOT NULL COMMENT 'ID of the record in the course_modules table.',
  `timecreated` int NOT NULL COMMENT 'The time this record was created.',
  `timemodified` int NOT NULL COMMENT 'The time this record was last modified',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who last modified this field.',
  `sortorder` int NOT NULL COMMENT 'The field used to naturally sort this link.',
  `competencyid` bigint unsigned NOT NULL COMMENT 'The course competency this activity is linked to.',
  `ruleoutcome` tinyint NOT NULL COMMENT 'The outcome when an activity is completed.',
  `overridegrade` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Enables the ability to override an existing competencys grade.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cmidcompetencyid` (`cmid`,`competencyid`),
  KEY `cmidruleoutcome` (`cmid`,`ruleoutcome`),
  KEY `competency_modulecomp_competencyid_foreign` (`competencyid`),
  KEY `competency_modulecomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_modulecomp_cmid_foreign` FOREIGN KEY (`cmid`) REFERENCES `course_modules` (`id`),
  CONSTRAINT `competency_modulecomp_competencyid_foreign` FOREIGN KEY (`competencyid`) REFERENCES `competency` (`id`),
  CONSTRAINT `competency_modulecomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_plan`
--

DROP TABLE IF EXISTS `competency_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_plan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` smallint NOT NULL DEFAULT '0',
  `userid` int NOT NULL,
  `templateid` int DEFAULT NULL,
  `origtemplateid` int DEFAULT NULL COMMENT 'The template ID this plan was based on originally',
  `status` tinyint(1) NOT NULL,
  `duedate` int DEFAULT '0',
  `reviewerid` int DEFAULT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `useridstatus` (`userid`,`status`),
  KEY `templateid` (`templateid`),
  KEY `statusduedate` (`status`,`duedate`),
  KEY `competency_plan_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_plan_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_plancomp`
--

DROP TABLE IF EXISTS `competency_plancomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_plancomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `planid` int NOT NULL,
  `competencyid` int NOT NULL,
  `sortorder` int DEFAULT NULL COMMENT 'Relative sort order',
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `planidcompetencyid` (`planid`,`competencyid`),
  KEY `competency_plancomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_plancomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_relatedcomp`
--

DROP TABLE IF EXISTS `competency_relatedcomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_relatedcomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `competencyid` bigint unsigned NOT NULL,
  `relatedcompetencyid` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `competency_relatedcomp_competencyid_foreign` (`competencyid`),
  KEY `competency_relatedcomp_relatedcompetencyid_foreign` (`relatedcompetencyid`),
  KEY `competency_relatedcomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_relatedcomp_competencyid_foreign` FOREIGN KEY (`competencyid`) REFERENCES `competency` (`id`),
  CONSTRAINT `competency_relatedcomp_relatedcompetencyid_foreign` FOREIGN KEY (`relatedcompetencyid`) REFERENCES `competency` (`id`),
  CONSTRAINT `competency_relatedcomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_template`
--

DROP TABLE IF EXISTS `competency_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_template` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Short name for the learning plan template.',
  `contextid` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Description of this learning plan template',
  `descriptionformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format of the description field',
  `visible` tinyint NOT NULL DEFAULT '1' COMMENT 'Used to show/hide this learning plan template.',
  `duedate` int DEFAULT NULL COMMENT 'The default due date for instances of this plan.',
  `timecreated` int NOT NULL COMMENT 'The time this learning plan template was created.',
  `timemodified` int NOT NULL COMMENT 'The time this learning plan template was last modified.',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'The user who last modified this learning plan template',
  PRIMARY KEY (`id`),
  KEY `competency_template_contextid_foreign` (`contextid`),
  KEY `competency_template_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_template_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `competency_template_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_templatecohort`
--

DROP TABLE IF EXISTS `competency_templatecohort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_templatecohort` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `templateid` int NOT NULL,
  `cohortid` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `templatecohortids` (`templateid`,`cohortid`),
  KEY `templateid` (`templateid`),
  KEY `competency_templatecohort_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_templatecohort_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_templatecomp`
--

DROP TABLE IF EXISTS `competency_templatecomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_templatecomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `templateid` bigint unsigned NOT NULL COMMENT 'The template this competency is linked to.',
  `competencyid` bigint unsigned NOT NULL COMMENT 'The competency that is linked to this course.',
  `timecreated` int NOT NULL COMMENT 'The time this link was created.',
  `timemodified` int NOT NULL COMMENT 'The time this link was modified.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who modified this link.',
  `sortorder` int DEFAULT NULL COMMENT 'Relative sort order',
  PRIMARY KEY (`id`),
  KEY `competency_templatecomp_templateid_foreign` (`templateid`),
  KEY `competency_templatecomp_competencyid_foreign` (`competencyid`),
  KEY `competency_templatecomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_templatecomp_competencyid_foreign` FOREIGN KEY (`competencyid`) REFERENCES `competency` (`id`),
  CONSTRAINT `competency_templatecomp_templateid_foreign` FOREIGN KEY (`templateid`) REFERENCES `competency_template` (`id`),
  CONSTRAINT `competency_templatecomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_usercomp`
--

DROP TABLE IF EXISTS `competency_usercomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_usercomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL COMMENT 'User associated to the competency.',
  `competencyid` int NOT NULL COMMENT 'Competency associated to the user.',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT 'Competency status.',
  `reviewerid` int DEFAULT NULL COMMENT 'User that reviewed the competency.',
  `proficiency` tinyint DEFAULT NULL COMMENT 'Indicate if the competency is proficient not.',
  `grade` int DEFAULT NULL COMMENT 'Grade assigned to the competency.',
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridcompetency` (`userid`,`competencyid`),
  KEY `competency_usercomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_usercomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_usercompcourse`
--

DROP TABLE IF EXISTS `competency_usercompcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_usercompcourse` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL COMMENT 'User associated to the competency.',
  `courseid` int NOT NULL COMMENT 'The course this competency is linked to.',
  `competencyid` int NOT NULL COMMENT 'Competency associated to the user.',
  `proficiency` tinyint DEFAULT NULL COMMENT 'Indicate if the competency is proficient not.',
  `grade` int DEFAULT NULL COMMENT 'The course grade assigned for the competency.',
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridcoursecomp` (`userid`,`courseid`,`competencyid`),
  KEY `competency_usercompcourse_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_usercompcourse_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_usercompplan`
--

DROP TABLE IF EXISTS `competency_usercompplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_usercompplan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL COMMENT 'User associated to the competency.',
  `competencyid` int NOT NULL COMMENT 'Competency associated to the user.',
  `planid` int NOT NULL COMMENT 'Plan associated to the user.',
  `proficiency` tinyint DEFAULT NULL COMMENT 'Indicate if the competency is proficient not.',
  `grade` int DEFAULT NULL COMMENT 'Grade assigned to the competency.',
  `sortorder` int DEFAULT NULL COMMENT 'Relative sort order',
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usercompetencyplan` (`userid`,`competencyid`,`planid`),
  KEY `competency_usercompplan_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_usercompplan_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_userevidence`
--

DROP TABLE IF EXISTS `competency_userevidence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_userevidence` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionformat` tinyint(1) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `competency_userevidence_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_userevidence_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competency_userevidencecomp`
--

DROP TABLE IF EXISTS `competency_userevidencecomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competency_userevidencecomp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userevidenceid` int NOT NULL,
  `competencyid` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userevidencecompids` (`userevidenceid`,`competencyid`),
  KEY `userevidenceid` (`userevidenceid`),
  KEY `competency_userevidencecomp_usermodified_foreign` (`usermodified`),
  CONSTRAINT `competency_userevidencecomp_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `config_log`
--

DROP TABLE IF EXISTS `config_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `timemodified` int NOT NULL,
  `plugin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `oldvalue` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `timemodified` (`timemodified`),
  KEY `config_log_userid_foreign` (`userid`),
  CONSTRAINT `config_log_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `config_plugins`
--

DROP TABLE IF EXISTS `config_plugins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config_plugins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `plugin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'core',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plugin_name` (`plugin`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contentbank_content`
--

DROP TABLE IF EXISTS `contentbank_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contentbank_content` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenttype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contextid` bigint unsigned NOT NULL COMMENT 'References context.id.',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `instanceid` int DEFAULT NULL,
  `configdata` text COLLATE utf8mb4_unicode_ci,
  `usercreated` bigint unsigned NOT NULL COMMENT 'The original author of the content',
  `usermodified` bigint unsigned DEFAULT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `instance` (`contextid`,`contenttype`,`instanceid`),
  KEY `contentbank_content_usermodified_foreign` (`usermodified`),
  KEY `contentbank_content_usercreated_foreign` (`usercreated`),
  CONSTRAINT `contentbank_content_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `contentbank_content_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `contentbank_content_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `context`
--

DROP TABLE IF EXISTS `context`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `context` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextlevel` int NOT NULL DEFAULT '0',
  `instanceid` int NOT NULL DEFAULT '0',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth` tinyint NOT NULL DEFAULT '0',
  `locked` tinyint NOT NULL DEFAULT '0' COMMENT 'Whether this context and its children are locked',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextlevel-instanceid` (`contextlevel`,`instanceid`),
  KEY `instanceid` (`instanceid`),
  KEY `path` (`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `context_temp`
--

DROP TABLE IF EXISTS `context_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `context_temp` (
  `id` int NOT NULL COMMENT 'This id isn''t autonumeric/sequence. It''s the context->id',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depth` tinyint NOT NULL,
  `locked` tinyint NOT NULL DEFAULT '0' COMMENT 'Whether this context and its children are locked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL DEFAULT '0',
  `sortorder` int NOT NULL DEFAULT '0',
  `fullname` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `summaryformat` tinyint NOT NULL DEFAULT '0',
  `format` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'topics',
  `showgrades` tinyint NOT NULL DEFAULT '1',
  `newsitems` smallint NOT NULL DEFAULT '1',
  `startdate` int NOT NULL DEFAULT '0',
  `enddate` int NOT NULL DEFAULT '0',
  `relativedatesmode` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether to let this course display course- or activity-related dates relative to the user''s enrolment date in this course.',
  `marker` int NOT NULL DEFAULT '0',
  `maxbytes` int NOT NULL DEFAULT '0',
  `legacyfiles` smallint NOT NULL DEFAULT '0' COMMENT 'course files are not necessary any more: 0 no legacy files, 1 legacy files disabled, 2 legacy files enabled',
  `showreports` smallint NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `visibleold` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'the state of visible field when hiding parent category, this helps us to recover hidden states when unhiding the parent category later',
  `downloadcontent` tinyint(1) DEFAULT NULL,
  `groupmode` smallint NOT NULL DEFAULT '0',
  `groupmodeforce` smallint NOT NULL DEFAULT '0',
  `defaultgroupingid` int NOT NULL DEFAULT '0' COMMENT 'default grouping used in course modules, does not have key intentionally',
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Forced language for this course. Null or '''' means ''Do not force''. Otherwise a Moodle lang pack name like ''fr'' or ''en_us''.',
  `calendartype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `requested` tinyint(1) NOT NULL DEFAULT '0',
  `enablecompletion` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = allow use of ''completion'' progress-tracking on this course. 0 = disable completion tracking on this course.',
  `completionnotify` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Notify users when they complete this course',
  `cacherev` int NOT NULL DEFAULT '0' COMMENT 'Incrementing revision for validating the course content cache',
  `originalcourseid` bigint unsigned DEFAULT NULL COMMENT 'the id of the source course when a new course originates from a restore of another course on the same site.',
  `showactivitydates` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether to display activity dates to user. 0 = do not display, 1 = display activity dates',
  `showcompletionconditions` tinyint(1) DEFAULT NULL COMMENT 'Whether to display completion conditions to user. 0 = do not display, 1 = display conditions',
  `pdfexportfont` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `idnumber` (`idnumber`),
  KEY `shortname` (`shortname`),
  KEY `sortorder` (`sortorder`),
  KEY `course_originalcourseid_foreign` (`originalcourseid`),
  CONSTRAINT `course_originalcourseid_foreign` FOREIGN KEY (`originalcourseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_categories`
--

DROP TABLE IF EXISTS `course_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `parent` bigint unsigned NOT NULL DEFAULT '0',
  `sortorder` int NOT NULL DEFAULT '0',
  `coursecount` int NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `visibleold` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'the state of visible field when hiding parent category, this helps us to recover hidden states when unhiding the parent category later',
  `timemodified` int NOT NULL DEFAULT '0',
  `depth` int NOT NULL DEFAULT '0',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Theme for the category',
  PRIMARY KEY (`id`),
  KEY `course_categories_parent_foreign` (`parent`),
  CONSTRAINT `course_categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `course_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_completion_aggr_methd`
--

DROP TABLE IF EXISTS `course_completion_aggr_methd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_completion_aggr_methd` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `criteriatype` int DEFAULT NULL COMMENT 'The criteria type we are aggregating, or NULL if complete course aggregation',
  `method` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = all, 2 = any, 3 = fraction, 4 = unit',
  `value` decimal(10,5) DEFAULT NULL COMMENT 'NULL = all/any, 0..1 for method ''fraction'', > 0 for method ''unit''',
  PRIMARY KEY (`id`),
  UNIQUE KEY `coursecriteriatype` (`course`,`criteriatype`),
  KEY `course` (`course`),
  KEY `criteriatype` (`criteriatype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_completion_crit_compl`
--

DROP TABLE IF EXISTS `course_completion_crit_compl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_completion_crit_compl` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `course` int NOT NULL DEFAULT '0',
  `criteriaid` int NOT NULL DEFAULT '0' COMMENT 'Completion criteria this references',
  `gradefinal` decimal(10,5) DEFAULT NULL COMMENT 'The final grade for the course (included regardless of whether a passing grade was required)',
  `unenroled` int DEFAULT NULL COMMENT 'Timestamp when the user was unenroled',
  `timecompleted` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridcoursecriteriaid` (`userid`,`course`,`criteriaid`),
  KEY `userid` (`userid`),
  KEY `course` (`course`),
  KEY `criteriaid` (`criteriaid`),
  KEY `timecompleted` (`timecompleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_completion_criteria`
--

DROP TABLE IF EXISTS `course_completion_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_completion_criteria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `criteriatype` int NOT NULL DEFAULT '0' COMMENT 'Type of criteria',
  `module` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Type of module (if using module criteria type)',
  `moduleinstance` int DEFAULT NULL COMMENT 'Course module id (if using module criteria type)',
  `courseinstance` int DEFAULT NULL COMMENT 'Course instance id (if using course criteria type)',
  `enrolperiod` int DEFAULT NULL COMMENT 'Number of days after enrolment the course is completed (if using enrolperiod criteria type)',
  `timeend` int DEFAULT NULL COMMENT 'Timestamp of the date for course completion (if using date criteria type)',
  `gradepass` decimal(10,5) DEFAULT NULL COMMENT 'The minimum grade needed to pass the course (if passing grade criteria enabled)',
  `role` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_completion_defaults`
--

DROP TABLE IF EXISTS `course_completion_defaults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_completion_defaults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint unsigned NOT NULL,
  `module` bigint unsigned NOT NULL,
  `completion` tinyint(1) NOT NULL DEFAULT '0',
  `completionview` tinyint(1) NOT NULL DEFAULT '0',
  `completionusegrade` tinyint(1) NOT NULL DEFAULT '0',
  `completionpassgrade` tinyint(1) NOT NULL DEFAULT '0',
  `completionexpected` int NOT NULL DEFAULT '0',
  `customrules` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coursemodule` (`course`,`module`),
  KEY `course_completion_defaults_module_foreign` (`module`),
  CONSTRAINT `course_completion_defaults_course_foreign` FOREIGN KEY (`course`) REFERENCES `course` (`id`),
  CONSTRAINT `course_completion_defaults_module_foreign` FOREIGN KEY (`module`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_completions`
--

DROP TABLE IF EXISTS `course_completions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_completions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `course` int NOT NULL DEFAULT '0',
  `timeenrolled` int NOT NULL DEFAULT '0',
  `timestarted` int NOT NULL DEFAULT '0',
  `timecompleted` int DEFAULT NULL,
  `reaggregate` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridcourse` (`userid`,`course`),
  KEY `userid` (`userid`),
  KEY `course` (`course`),
  KEY `timecompleted` (`timecompleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_format_options`
--

DROP TABLE IF EXISTS `course_format_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_format_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL COMMENT 'Id of the course',
  `format` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Format this option is for',
  `sectionid` int NOT NULL DEFAULT '0' COMMENT 'Null if this is a course option, otherwise id of the section this option is for',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the format option',
  `value` text COLLATE utf8mb4_unicode_ci COMMENT 'Value of the format option',
  PRIMARY KEY (`id`),
  UNIQUE KEY `formatoption` (`courseid`,`format`,`sectionid`,`name`),
  CONSTRAINT `course_format_options_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_modules`
--

DROP TABLE IF EXISTS `course_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `module` int NOT NULL DEFAULT '0',
  `instance` int NOT NULL DEFAULT '0',
  `section` int NOT NULL DEFAULT '0',
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'customizable idnumber',
  `added` int NOT NULL DEFAULT '0',
  `score` smallint NOT NULL DEFAULT '0',
  `indent` smallint NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `visibleoncoursepage` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'If stealth visibility is allowed for the course, this controls whether activity is visible on course page',
  `visibleold` tinyint(1) NOT NULL DEFAULT '1',
  `groupmode` smallint NOT NULL DEFAULT '0',
  `groupingid` bigint unsigned NOT NULL DEFAULT '0',
  `completion` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the completion-tracking facilities are enabled for this activity. 0 = not enabled (database default) 1 = manual tracking, user can tick this activity off (UI default for most activity types) 2 = automatic tracking, system should mark completion according to rules specified in course_moduleS_completion',
  `completiongradeitemnumber` int DEFAULT NULL COMMENT 'Grade-item number used to track automatic completion, if applicable.',
  `completionview` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Controls whether a page view is part of the automatic completion requirements for this activity. 0 = view not required 1 = view required',
  `completionexpected` int NOT NULL DEFAULT '0' COMMENT 'Date at which students are expected to complete this activity. This field is used when displaying student progress.',
  `completionpassgrade` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Enable completion check on passing grade.',
  `showdescription` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Some module types support a ''description'' which shows within the module pages. This option controls whether it also displays on the course main page. 0 = does not display (default), 1 = displays',
  `availability` text COLLATE utf8mb4_unicode_ci COMMENT 'Availability restrictions for viewing this activity, in JSON format. Null if no restrictions.',
  `deletioninprogress` tinyint(1) NOT NULL DEFAULT '0',
  `downloadcontent` tinyint(1) DEFAULT '1' COMMENT 'Whether the ability to download course module content is enabled for this activity',
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Forced language for this activity. Null or '''' means ''Do not force''. Otherwise a Moodle lang pack name like ''fr'' or ''en_us''.',
  PRIMARY KEY (`id`),
  KEY `visible` (`visible`),
  KEY `course` (`course`),
  KEY `module` (`module`),
  KEY `instance` (`instance`),
  KEY `idnumber-course` (`idnumber`,`course`),
  KEY `course_modules_groupingid_foreign` (`groupingid`),
  CONSTRAINT `course_modules_groupingid_foreign` FOREIGN KEY (`groupingid`) REFERENCES `groupings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_modules_completion`
--

DROP TABLE IF EXISTS `course_modules_completion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_modules_completion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coursemoduleid` int NOT NULL COMMENT 'Activity that has been completed (or not).',
  `userid` int NOT NULL COMMENT 'ID of user who has (or hasn''t) completed the activity.',
  `completionstate` tinyint(1) NOT NULL COMMENT 'Whether or not the user has completed the activity. Available states: 0 = not completed [if there''s no row in this table, that also counts as 0] 1 = completed 2 = completed, show passed 3 = completed, show failed',
  `overrideby` int DEFAULT NULL COMMENT 'Tracks whether this completion state has been set manually to override a previous state.',
  `timemodified` int NOT NULL COMMENT 'Time at which the completion state last changed.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-coursemoduleid` (`userid`,`coursemoduleid`),
  KEY `coursemoduleid` (`coursemoduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_modules_viewed`
--

DROP TABLE IF EXISTS `course_modules_viewed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_modules_viewed` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coursemoduleid` int NOT NULL COMMENT 'Activity that has been viewed (or not).',
  `userid` int NOT NULL COMMENT 'ID of user who has (or hasn''t) viewed the activity.',
  `timecreated` int NOT NULL COMMENT 'Time at which the completion viewed created.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-coursemoduleid` (`userid`,`coursemoduleid`),
  KEY `coursemoduleid` (`coursemoduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_published`
--

DROP TABLE IF EXISTS `course_published`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_published` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `huburl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'the url of the "registered on" hub',
  `courseid` bigint unsigned NOT NULL COMMENT 'the id of the published course',
  `timepublished` int NOT NULL COMMENT 'The time when the publication occurred',
  `enrollable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = enrollable, 0 = downloadable',
  `hubcourseid` int NOT NULL COMMENT 'the course id on the hub server',
  `status` tinyint(1) DEFAULT '0' COMMENT 'is the publication published or not',
  `timechecked` int DEFAULT NULL COMMENT 'the last time the status has been checked',
  PRIMARY KEY (`id`),
  KEY `hubcourseid` (`hubcourseid`),
  KEY `course_published_courseid_foreign` (`courseid`),
  CONSTRAINT `course_published_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_request`
--

DROP TABLE IF EXISTS `course_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_request` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summaryformat` tinyint NOT NULL DEFAULT '0',
  `category` int NOT NULL DEFAULT '0',
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester` int NOT NULL DEFAULT '0',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shortname` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_sections`
--

DROP TABLE IF EXISTS `course_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `section` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `summaryformat` tinyint NOT NULL DEFAULT '0',
  `sequence` text COLLATE utf8mb4_unicode_ci,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `availability` text COLLATE utf8mb4_unicode_ci COMMENT 'Availability restrictions for viewing this section, in JSON format. Null if no restrictions.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'Time at which the course section was last changed.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_section` (`course`,`section`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customfield_category`
--

DROP TABLE IF EXISTS `customfield_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customfield_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` int DEFAULT NULL,
  `sortorder` int DEFAULT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` int NOT NULL DEFAULT '0',
  `contextid` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `component_area_itemid` (`component`,`area`,`itemid`,`sortorder`),
  KEY `customfield_category_contextid_foreign` (`contextid`),
  CONSTRAINT `customfield_category_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customfield_data`
--

DROP TABLE IF EXISTS `customfield_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customfield_data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fieldid` bigint unsigned NOT NULL,
  `instanceid` int NOT NULL,
  `intvalue` int DEFAULT NULL,
  `decvalue` decimal(10,5) DEFAULT NULL,
  `shortcharvalue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charvalue` text COLLATE utf8mb4_unicode_ci,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valueformat` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `contextid` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instanceid-fieldid` (`instanceid`,`fieldid`),
  KEY `fieldid-intvalue` (`fieldid`,`intvalue`),
  KEY `fieldid-shortcharvalue` (`fieldid`,`shortcharvalue`),
  KEY `fieldid-decvalue` (`fieldid`,`decvalue`),
  KEY `customfield_data_contextid_foreign` (`contextid`),
  CONSTRAINT `customfield_data_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `customfield_data_fieldid_foreign` FOREIGN KEY (`fieldid`) REFERENCES `customfield_field` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customfield_field`
--

DROP TABLE IF EXISTS `customfield_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customfield_field` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` int DEFAULT NULL,
  `sortorder` int DEFAULT NULL,
  `categoryid` bigint unsigned DEFAULT NULL,
  `configdata` text COLLATE utf8mb4_unicode_ci,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryid_sortorder` (`categoryid`,`sortorder`),
  CONSTRAINT `customfield_field_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `customfield_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customfield_shared`
--

DROP TABLE IF EXISTS `customfield_shared`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customfield_shared` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` bigint unsigned NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoryid-component-area-itemid` (`categoryid`,`component`,`area`,`itemid`),
  KEY `customfield_shared_usermodified_foreign` (`usermodified`),
  CONSTRAINT `customfield_shared_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `customfield_category` (`id`),
  CONSTRAINT `customfield_shared_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0',
  `comments` smallint NOT NULL DEFAULT '0',
  `timeavailablefrom` int NOT NULL DEFAULT '0',
  `timeavailableto` int NOT NULL DEFAULT '0',
  `timeviewfrom` int NOT NULL DEFAULT '0',
  `timeviewto` int NOT NULL DEFAULT '0',
  `requiredentries` int NOT NULL DEFAULT '0',
  `requiredentriestoview` int NOT NULL DEFAULT '0',
  `maxentries` int NOT NULL DEFAULT '0',
  `rssarticles` smallint NOT NULL DEFAULT '0',
  `singletemplate` text COLLATE utf8mb4_unicode_ci,
  `listtemplate` text COLLATE utf8mb4_unicode_ci,
  `listtemplateheader` text COLLATE utf8mb4_unicode_ci,
  `listtemplatefooter` text COLLATE utf8mb4_unicode_ci,
  `addtemplate` text COLLATE utf8mb4_unicode_ci,
  `rsstemplate` text COLLATE utf8mb4_unicode_ci,
  `rsstitletemplate` text COLLATE utf8mb4_unicode_ci,
  `csstemplate` text COLLATE utf8mb4_unicode_ci,
  `jstemplate` text COLLATE utf8mb4_unicode_ci,
  `asearchtemplate` text COLLATE utf8mb4_unicode_ci,
  `approval` smallint NOT NULL DEFAULT '0',
  `manageapproved` smallint NOT NULL DEFAULT '1',
  `scale` int NOT NULL DEFAULT '0',
  `assessed` int NOT NULL DEFAULT '0',
  `assesstimestart` int NOT NULL DEFAULT '0',
  `assesstimefinish` int NOT NULL DEFAULT '0',
  `defaultsort` int NOT NULL DEFAULT '0',
  `defaultsortdir` smallint NOT NULL DEFAULT '0',
  `editany` smallint NOT NULL DEFAULT '0',
  `notification` int NOT NULL DEFAULT '0' COMMENT 'Notify people when things change',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The time the settings for this database module instance were last modified.',
  `config` text COLLATE utf8mb4_unicode_ci,
  `completionentries` int DEFAULT '0' COMMENT 'Number of entries required for completion',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_content`
--

DROP TABLE IF EXISTS `data_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_content` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fieldid` bigint unsigned NOT NULL DEFAULT '0',
  `recordid` bigint unsigned NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci,
  `content1` text COLLATE utf8mb4_unicode_ci,
  `content2` text COLLATE utf8mb4_unicode_ci,
  `content3` text COLLATE utf8mb4_unicode_ci,
  `content4` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `data_content_recordid_foreign` (`recordid`),
  KEY `data_content_fieldid_foreign` (`fieldid`),
  CONSTRAINT `data_content_fieldid_foreign` FOREIGN KEY (`fieldid`) REFERENCES `data_fields` (`id`),
  CONSTRAINT `data_content_recordid_foreign` FOREIGN KEY (`recordid`) REFERENCES `data_records` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_fields`
--

DROP TABLE IF EXISTS `data_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dataid` bigint unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Required fields must have a value when inserted by a user',
  `param1` text COLLATE utf8mb4_unicode_ci,
  `param2` text COLLATE utf8mb4_unicode_ci,
  `param3` text COLLATE utf8mb4_unicode_ci,
  `param4` text COLLATE utf8mb4_unicode_ci,
  `param5` text COLLATE utf8mb4_unicode_ci,
  `param6` text COLLATE utf8mb4_unicode_ci,
  `param7` text COLLATE utf8mb4_unicode_ci,
  `param8` text COLLATE utf8mb4_unicode_ci,
  `param9` text COLLATE utf8mb4_unicode_ci,
  `param10` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `type-dataid` (`type`,`dataid`),
  KEY `data_fields_dataid_foreign` (`dataid`),
  CONSTRAINT `data_fields_dataid_foreign` FOREIGN KEY (`dataid`) REFERENCES `data` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_records`
--

DROP TABLE IF EXISTS `data_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_records` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '0',
  `dataid` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `approved` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `data_records_dataid_foreign` (`dataid`),
  KEY `data_records_userid_foreign` (`userid`),
  CONSTRAINT `data_records_dataid_foreign` FOREIGN KEY (`dataid`) REFERENCES `data` (`id`),
  CONSTRAINT `data_records_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `editor_atto_autosave`
--

DROP TABLE IF EXISTS `editor_atto_autosave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editor_atto_autosave` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `elementid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The unique id for the text editor in the form.',
  `contextid` int NOT NULL COMMENT 'The contextid that the form was loaded with.',
  `pagehash` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The HTML DOM id of the page that loaded the form.',
  `userid` int NOT NULL COMMENT 'The id of the user that loaded the form.',
  `drafttext` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The draft text',
  `draftid` int DEFAULT NULL COMMENT 'Optional draft area id containing draft files.',
  `pageinstance` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The browser tab instance that last saved the draft text. This is to prevent multiple tabs from the same user saving different text alternately.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'Store the last modified time for the auto save text.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `autosave_uniq_key` (`elementid`,`contextid`,`userid`,`pagehash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol`
--

DROP TABLE IF EXISTS `enrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enrol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0..9 are system constants, 0 means active enrolment, see ENROL_STATUS_* constants, plugins may define own status greater than 10',
  `courseid` bigint unsigned NOT NULL,
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'order of enrol plugins in each course',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Optional instance name',
  `enrolperiod` int DEFAULT '0' COMMENT 'Custom - enrolment duration',
  `enrolstartdate` int DEFAULT '0' COMMENT 'Custom - start of self enrolment',
  `enrolenddate` int DEFAULT '0' COMMENT 'Custom - end of enrolment',
  `expirynotify` tinyint(1) DEFAULT '0' COMMENT 'Custom - notify users before expiration',
  `expirythreshold` int DEFAULT '0' COMMENT 'Custom - when should be the participants notified',
  `notifyall` tinyint(1) DEFAULT '0' COMMENT 'Custom - Notify both participant and person responsible for enrolments',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom - enrolment or access password',
  `cost` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom - enrolment cost',
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom - cost currency',
  `roleid` bigint unsigned DEFAULT '0' COMMENT 'Custom - the default role given to participants who self-enrol',
  `customint1` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint2` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint3` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint4` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint5` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint6` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint7` int DEFAULT NULL COMMENT 'Custom - general int',
  `customint8` int DEFAULT NULL COMMENT 'Custom - general int',
  `customchar1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom - general short name',
  `customchar2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom - general short name',
  `customchar3` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom - general short name',
  `customdec1` decimal(12,7) DEFAULT NULL COMMENT 'Custom - general decimal',
  `customdec2` decimal(12,7) DEFAULT NULL COMMENT 'Custom - general decimal',
  `customtext1` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom - general text',
  `customtext2` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom - general text',
  `customtext3` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom - general text',
  `customtext4` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom - general text',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `enrol` (`enrol`),
  KEY `enrol_courseid_foreign` (`courseid`),
  KEY `enrol_roleid_foreign` (`roleid`),
  CONSTRAINT `enrol_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `enrol_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_flatfile`
--

DROP TABLE IF EXISTS `enrol_flatfile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_flatfile` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleid` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `courseid` bigint unsigned NOT NULL,
  `timestart` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `enrol_flatfile_courseid_foreign` (`courseid`),
  KEY `enrol_flatfile_userid_foreign` (`userid`),
  KEY `enrol_flatfile_roleid_foreign` (`roleid`),
  CONSTRAINT `enrol_flatfile_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `enrol_flatfile_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`),
  CONSTRAINT `enrol_flatfile_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_app_registration`
--

DROP TABLE IF EXISTS `enrol_lti_app_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_app_registration` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Common name to identify this platform to users',
  `platformid` text COLLATE utf8mb4_unicode_ci COMMENT 'The issuer URL',
  `clientid` text COLLATE utf8mb4_unicode_ci COMMENT 'The clientid string, generated by the platform when setting up the tool.',
  `uniqueid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A unique local id, which can be used in the initiate login URI to provide {iss, clientid} uniqueness in the absence of the optional client_id claim.',
  `platformclienthash` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SHA256 hash of the platformid (issuer) and clientid',
  `platformuniqueidhash` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SHA256 hash of the platformid (issuer) and uniqueid',
  `authenticationrequesturl` text COLLATE utf8mb4_unicode_ci COMMENT 'The authorisation endpoint of the platform',
  `jwksurl` text COLLATE utf8mb4_unicode_ci COMMENT 'The JSON Web Key Set URL for the platform',
  `accesstokenurl` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Status of the registration, used to denote draft (incomplete) or active (complete)',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueid` (`uniqueid`),
  UNIQUE KEY `platformclienthash` (`platformclienthash`),
  UNIQUE KEY `platformuniqueidhash` (`platformuniqueidhash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_context`
--

DROP TABLE IF EXISTS `enrol_lti_context`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_context` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The id of the context on the platform',
  `ltideploymentid` bigint unsigned NOT NULL COMMENT 'The id of the enrol_lti_deployment record containing the deployment information.',
  `type` text COLLATE utf8mb4_unicode_ci COMMENT 'The type of the context on the platform',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ltideploymentid-contextid` (`ltideploymentid`,`contextid`),
  CONSTRAINT `enrol_lti_context_ltideploymentid_foreign` FOREIGN KEY (`ltideploymentid`) REFERENCES `enrol_lti_deployment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_deployment`
--

DROP TABLE IF EXISTS `enrol_lti_deployment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_deployment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A short name identifying the tool deployment to users',
  `deploymentid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The id of the deployment, as defined in the platform',
  `platformid` bigint unsigned NOT NULL COMMENT 'The platformid to which this deployment belongs',
  `legacyconsumerkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The legacy consumer key mapped to this deployment, if the deployment represents a migrated tool.',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `platformid-deploymentid` (`platformid`,`deploymentid`),
  CONSTRAINT `enrol_lti_deployment_platformid_foreign` FOREIGN KEY (`platformid`) REFERENCES `enrol_lti_app_registration` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_consumer`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_consumer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_consumer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumerkey256` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumerkey` text COLLATE utf8mb4_unicode_ci,
  `secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ltiversion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumerversion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumerguid` text COLLATE utf8mb4_unicode_ci,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `toolproxy` text COLLATE utf8mb4_unicode_ci,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `protected` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `enablefrom` int DEFAULT NULL,
  `enableuntil` int DEFAULT NULL,
  `lastaccess` int DEFAULT NULL,
  `created` int NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `consumerkey256_uniq` (`consumerkey256`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_context`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_context`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_context` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `consumerid` bigint unsigned NOT NULL,
  `lticontextkey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created` int NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enrol_lti_lti2_context_consumerid_foreign` (`consumerid`),
  CONSTRAINT `enrol_lti_lti2_context_consumerid_foreign` FOREIGN KEY (`consumerid`) REFERENCES `enrol_lti_lti2_consumer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_nonce`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_nonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_nonce` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `consumerid` bigint unsigned NOT NULL,
  `value` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enrol_lti_lti2_nonce_consumerid_foreign` (`consumerid`),
  CONSTRAINT `enrol_lti_lti2_nonce_consumerid_foreign` FOREIGN KEY (`consumerid`) REFERENCES `enrol_lti_lti2_consumer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_resource_link`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_resource_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_resource_link` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned DEFAULT NULL,
  `consumerid` bigint unsigned DEFAULT NULL,
  `ltiresourcelinkkey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `primaryresourcelinkid` bigint unsigned DEFAULT NULL,
  `shareapproved` tinyint(1) DEFAULT NULL,
  `created` int NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enrol_lti_lti2_resource_link_contextid_foreign` (`contextid`),
  KEY `enrol_lti_lti2_resource_link_primaryresourcelinkid_foreign` (`primaryresourcelinkid`),
  KEY `enrol_lti_lti2_resource_link_consumerid_foreign` (`consumerid`),
  CONSTRAINT `enrol_lti_lti2_resource_link_consumerid_foreign` FOREIGN KEY (`consumerid`) REFERENCES `enrol_lti_lti2_consumer` (`id`),
  CONSTRAINT `enrol_lti_lti2_resource_link_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `enrol_lti_lti2_context` (`id`),
  CONSTRAINT `enrol_lti_lti2_resource_link_primaryresourcelinkid_foreign` FOREIGN KEY (`primaryresourcelinkid`) REFERENCES `enrol_lti_lti2_resource_link` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_share_key`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_share_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_share_key` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sharekey` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resourcelinkid` bigint NOT NULL,
  `autoapprove` tinyint(1) NOT NULL,
  `expires` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sharekey` (`sharekey`),
  UNIQUE KEY `resourcelinkid` (`resourcelinkid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_tool_proxy`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_tool_proxy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_tool_proxy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `toolproxykey` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumerid` bigint unsigned NOT NULL,
  `toolproxy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` int NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `toolproxykey_uniq` (`toolproxykey`),
  KEY `enrol_lti_lti2_tool_proxy_consumerid_foreign` (`consumerid`),
  CONSTRAINT `enrol_lti_lti2_tool_proxy_consumerid_foreign` FOREIGN KEY (`consumerid`) REFERENCES `enrol_lti_lti2_consumer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_lti2_user_result`
--

DROP TABLE IF EXISTS `enrol_lti_lti2_user_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_lti2_user_result` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `resourcelinkid` bigint unsigned NOT NULL,
  `ltiuserkey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ltiresultsourcedid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` int NOT NULL,
  `updated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enrol_lti_lti2_user_result_resourcelinkid_foreign` (`resourcelinkid`),
  CONSTRAINT `enrol_lti_lti2_user_result_resourcelinkid_foreign` FOREIGN KEY (`resourcelinkid`) REFERENCES `enrol_lti_lti2_resource_link` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_resource_link`
--

DROP TABLE IF EXISTS `enrol_lti_resource_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_resource_link` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `resourcelinkid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The platform-and-deployment-unique id of the resource link',
  `ltideploymentid` bigint unsigned NOT NULL COMMENT 'The id of the enrol_lti_deployment record containing the deployment information.',
  `resourceid` int NOT NULL COMMENT 'The id of the local enrol_lti_tools record containing information about the published resource to which this resource link relates.',
  `lticontextid` bigint unsigned DEFAULT NULL COMMENT 'The id of the enrol_lti_context record containing information about the context from which this resource link originates.',
  `lineitemsservice` text COLLATE utf8mb4_unicode_ci COMMENT 'The URL for the line items service for this resource link',
  `lineitemservice` text COLLATE utf8mb4_unicode_ci COMMENT 'The URL for the line item service (if only one line item present).',
  `lineitemscope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The ags line items authorization scope',
  `resultscope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The ags result authorization scope',
  `scorescope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The ags score items authorization scope',
  `contextmembershipsurl` text COLLATE utf8mb4_unicode_ci COMMENT 'The NRPS membership URL',
  `nrpsserviceversions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The NRPS supported service versions',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `resourcelinkid-ltideploymentid` (`resourcelinkid`,`ltideploymentid`),
  KEY `enrol_lti_resource_link_ltideploymentid_foreign` (`ltideploymentid`),
  KEY `enrol_lti_resource_link_lticontextid_foreign` (`lticontextid`),
  CONSTRAINT `enrol_lti_resource_link_lticontextid_foreign` FOREIGN KEY (`lticontextid`) REFERENCES `enrol_lti_context` (`id`),
  CONSTRAINT `enrol_lti_resource_link_ltideploymentid_foreign` FOREIGN KEY (`ltideploymentid`) REFERENCES `enrol_lti_deployment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_tool_consumer_map`
--

DROP TABLE IF EXISTS `enrol_lti_tool_consumer_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_tool_consumer_map` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `toolid` bigint unsigned NOT NULL COMMENT 'The tool ID.',
  `consumerid` bigint unsigned NOT NULL COMMENT 'The consumer ID.',
  PRIMARY KEY (`id`),
  KEY `enrol_lti_tool_consumer_map_toolid_foreign` (`toolid`),
  KEY `enrol_lti_tool_consumer_map_consumerid_foreign` (`consumerid`),
  CONSTRAINT `enrol_lti_tool_consumer_map_consumerid_foreign` FOREIGN KEY (`consumerid`) REFERENCES `enrol_lti_lti2_consumer` (`id`),
  CONSTRAINT `enrol_lti_tool_consumer_map_toolid_foreign` FOREIGN KEY (`toolid`) REFERENCES `enrol_lti_tools` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_tools`
--

DROP TABLE IF EXISTS `enrol_lti_tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_tools` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enrolid` bigint unsigned NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `ltiversion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LTI-1p3',
  `institution` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '99',
  `maxenrolled` int NOT NULL DEFAULT '0',
  `maildisplay` tinyint NOT NULL DEFAULT '2',
  `city` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradesync` tinyint(1) NOT NULL DEFAULT '0',
  `gradesynccompletion` tinyint(1) NOT NULL DEFAULT '0',
  `membersync` tinyint(1) NOT NULL DEFAULT '0',
  `membersyncmode` tinyint(1) NOT NULL DEFAULT '0',
  `roleinstructor` int NOT NULL,
  `rolelearner` int NOT NULL,
  `secret` text COLLATE utf8mb4_unicode_ci,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provisioningmodelearner` tinyint DEFAULT NULL,
  `provisioningmodeinstructor` tinyint DEFAULT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  KEY `enrol_lti_tools_enrolid_foreign` (`enrolid`),
  KEY `enrol_lti_tools_contextid_foreign` (`contextid`),
  CONSTRAINT `enrol_lti_tools_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `enrol_lti_tools_enrolid_foreign` FOREIGN KEY (`enrolid`) REFERENCES `enrol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_user_resource_link`
--

DROP TABLE IF EXISTS `enrol_lti_user_resource_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_user_resource_link` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ltiuserid` bigint unsigned NOT NULL COMMENT 'The id of the enrol_lti_users record',
  `resourcelinkid` bigint unsigned NOT NULL COMMENT 'The id of the enrol_lti_resource_link record.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ltiuserid-resourcelinkid` (`ltiuserid`,`resourcelinkid`),
  KEY `enrol_lti_user_resource_link_resourcelinkid_foreign` (`resourcelinkid`),
  CONSTRAINT `enrol_lti_user_resource_link_ltiuserid_foreign` FOREIGN KEY (`ltiuserid`) REFERENCES `enrol_lti_users` (`id`),
  CONSTRAINT `enrol_lti_user_resource_link_resourcelinkid_foreign` FOREIGN KEY (`resourcelinkid`) REFERENCES `enrol_lti_resource_link` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_lti_users`
--

DROP TABLE IF EXISTS `enrol_lti_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_lti_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `toolid` bigint unsigned NOT NULL,
  `serviceurl` text COLLATE utf8mb4_unicode_ci,
  `sourceid` text COLLATE utf8mb4_unicode_ci,
  `ltideploymentid` bigint unsigned DEFAULT NULL,
  `consumerkey` text COLLATE utf8mb4_unicode_ci,
  `consumersecret` text COLLATE utf8mb4_unicode_ci,
  `membershipsurl` text COLLATE utf8mb4_unicode_ci,
  `membershipsid` text COLLATE utf8mb4_unicode_ci,
  `lastgrade` decimal(10,5) DEFAULT NULL COMMENT 'The last grade that was sent',
  `lastaccess` int DEFAULT NULL COMMENT 'The time the user last accessed',
  `timecreated` int DEFAULT NULL COMMENT 'The time the user was created',
  PRIMARY KEY (`id`),
  KEY `enrol_lti_users_userid_foreign` (`userid`),
  KEY `enrol_lti_users_toolid_foreign` (`toolid`),
  KEY `enrol_lti_users_ltideploymentid_foreign` (`ltideploymentid`),
  CONSTRAINT `enrol_lti_users_ltideploymentid_foreign` FOREIGN KEY (`ltideploymentid`) REFERENCES `enrol_lti_deployment` (`id`),
  CONSTRAINT `enrol_lti_users_toolid_foreign` FOREIGN KEY (`toolid`) REFERENCES `enrol_lti_tools` (`id`),
  CONSTRAINT `enrol_lti_users_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enrol_paypal`
--

DROP TABLE IF EXISTS `enrol_paypal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrol_paypal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `business` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `instanceid` bigint unsigned NOT NULL DEFAULT '0',
  `memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_name1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_selection1_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_name2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_selection2_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_txn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeupdated` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `business` (`business`),
  KEY `receiver_email` (`receiver_email`),
  KEY `enrol_paypal_courseid_foreign` (`courseid`),
  KEY `enrol_paypal_userid_foreign` (`userid`),
  KEY `enrol_paypal_instanceid_foreign` (`instanceid`),
  CONSTRAINT `enrol_paypal_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `enrol_paypal_instanceid_foreign` FOREIGN KEY (`instanceid`) REFERENCES `enrol` (`id`),
  CONSTRAINT `enrol_paypal_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` smallint NOT NULL DEFAULT '0',
  `categoryid` bigint unsigned NOT NULL DEFAULT '0',
  `courseid` int NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `repeatid` int NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Component that created this event, if specified, only component itself can edit and delete it',
  `modulename` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` int NOT NULL DEFAULT '0',
  `type` smallint NOT NULL DEFAULT '0',
  `eventtype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestart` int NOT NULL DEFAULT '0',
  `timeduration` int NOT NULL DEFAULT '0',
  `timesort` int DEFAULT NULL,
  `visible` smallint NOT NULL DEFAULT '1',
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int NOT NULL DEFAULT '1',
  `timemodified` int NOT NULL DEFAULT '0',
  `subscriptionid` bigint unsigned DEFAULT NULL COMMENT 'The event_subscription id this event is associated with.',
  `priority` int DEFAULT NULL COMMENT 'The event''s display priority. For multiple events with the same module name, instance and eventtype (e.g. for group overrides), the one with the higher priority will be displayed.',
  `location` text COLLATE utf8mb4_unicode_ci COMMENT 'Event Location',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `userid` (`userid`),
  KEY `timestart` (`timestart`),
  KEY `timeduration` (`timeduration`),
  KEY `uuid` (`uuid`),
  KEY `type-timesort` (`type`,`timesort`),
  KEY `groupid-courseid-categoryid-visible-userid` (`groupid`,`courseid`,`categoryid`,`visible`,`userid`),
  KEY `eventtype` (`eventtype`),
  KEY `component` (`component`,`eventtype`,`instance`),
  KEY `modulename-instance-eventtype` (`modulename`,`instance`,`eventtype`),
  KEY `event_categoryid_foreign` (`categoryid`),
  KEY `event_subscriptionid_foreign` (`subscriptionid`),
  CONSTRAINT `event_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `course_categories` (`id`),
  CONSTRAINT `event_subscriptionid_foreign` FOREIGN KEY (`subscriptionid`) REFERENCES `event_subscriptions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `event_subscriptions`
--

DROP TABLE IF EXISTS `event_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryid` int NOT NULL DEFAULT '0',
  `courseid` bigint unsigned NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `eventtype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of the event',
  `pollinterval` int NOT NULL DEFAULT '0' COMMENT 'Frequency of checks for new/changed events',
  `lastupdated` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_subscriptions_courseid_foreign` (`courseid`),
  KEY `event_subscriptions_userid_foreign` (`userid`),
  CONSTRAINT `event_subscriptions_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `event_subscriptions_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events_handlers`
--

DROP TABLE IF EXISTS `events_handlers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events_handlers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `eventname` varchar(166) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name of the event, e.g. ''grade_updated''',
  `component` varchar(166) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g. moodle, mod_forum, block_rss_client',
  `handlerfile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'path to the file of the function, eg /grade/export/lib.php',
  `handlerfunction` text COLLATE utf8mb4_unicode_ci COMMENT 'serialized string or array describing function, suitable to be passed to call_user_func()',
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''cron'' or ''instant''.',
  `status` int NOT NULL DEFAULT '0' COMMENT 'number of failed attempts to process this handler',
  `internal` tinyint NOT NULL DEFAULT '1' COMMENT '1 means standard plugin handler, 0 indicates if event handler sends data to external systems, this is used for example to prevent immediate sending of events from pending db transactions',
  PRIMARY KEY (`id`),
  UNIQUE KEY `eventname-component` (`eventname`,`component`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events_queue`
--

DROP TABLE IF EXISTS `events_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events_queue` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `eventdata` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'serialized version of the data object passed to the event handler.',
  `stackdump` text COLLATE utf8mb4_unicode_ci COMMENT 'serialized debug_backtrace showing where the event was fired from',
  `userid` bigint unsigned DEFAULT NULL COMMENT '$USER-&gt;id when the event was fired',
  `timecreated` int NOT NULL COMMENT 'time stamp of the first time this was added',
  PRIMARY KEY (`id`),
  KEY `events_queue_userid_foreign` (`userid`),
  CONSTRAINT `events_queue_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events_queue_handlers`
--

DROP TABLE IF EXISTS `events_queue_handlers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events_queue_handlers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queuedeventid` bigint unsigned NOT NULL COMMENT 'foreign key id corresponding to the id of the event_queues table',
  `handlerid` bigint unsigned NOT NULL COMMENT 'foreign key id corresponding to the id of the event_handlers table',
  `status` int DEFAULT NULL COMMENT 'number of failed attempts to process this handler',
  `errormessage` text COLLATE utf8mb4_unicode_ci COMMENT 'if an error happened last time we tried to process this event, record it here.',
  `timemodified` int NOT NULL COMMENT 'time stamp of the last attempt to run this from the queue',
  PRIMARY KEY (`id`),
  KEY `events_queue_handlers_queuedeventid_foreign` (`queuedeventid`),
  KEY `events_queue_handlers_handlerid_foreign` (`handlerid`),
  CONSTRAINT `events_queue_handlers_handlerid_foreign` FOREIGN KEY (`handlerid`) REFERENCES `events_handlers` (`id`),
  CONSTRAINT `events_queue_handlers_queuedeventid_foreign` FOREIGN KEY (`queuedeventid`) REFERENCES `events_queue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `external_functions`
--

DROP TABLE IF EXISTS `external_functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `external_functions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `methodname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classpath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capabilities` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'all capabilities that are required to be run by the function (separated by comma)',
  `services` text COLLATE utf8mb4_unicode_ci COMMENT 'all the services (by shortname) where this function must be included',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `external_services`
--

DROP TABLE IF EXISTS `external_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `external_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `requiredcapability` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restrictedusers` tinyint(1) NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'a unique shortname',
  `downloadfiles` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if the service allow people to download file from webservice/plugins.php - 0 if not',
  `uploadfiles` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if the service allow people to upload files to webservice/upload.php - 0 if not',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `external_services_functions`
--

DROP TABLE IF EXISTS `external_services_functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `external_services_functions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `externalserviceid` bigint unsigned NOT NULL,
  `functionname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `external_services_functions_externalserviceid_foreign` (`externalserviceid`),
  CONSTRAINT `external_services_functions_externalserviceid_foreign` FOREIGN KEY (`externalserviceid`) REFERENCES `external_services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `external_services_users`
--

DROP TABLE IF EXISTS `external_services_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `external_services_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `externalserviceid` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `iprestriction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ip restriction',
  `validuntil` int DEFAULT NULL COMMENT 'timestampt - valid until data',
  `timecreated` int DEFAULT NULL COMMENT 'created timestamp',
  PRIMARY KEY (`id`),
  KEY `external_services_users_externalserviceid_foreign` (`externalserviceid`),
  KEY `external_services_users_userid_foreign` (`userid`),
  CONSTRAINT `external_services_users_externalserviceid_foreign` FOREIGN KEY (`externalserviceid`) REFERENCES `external_services` (`id`),
  CONSTRAINT `external_services_users_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `external_tokens`
--

DROP TABLE IF EXISTS `external_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `external_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'security token, aka private access key',
  `privatetoken` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'private token, generated at the same time that the token, must be stored safely by the ws client, to be transmitted only via https',
  `tokentype` smallint NOT NULL COMMENT 'type of token: 0=permanent, no session; 1=linked to current browser session via sid; 2=permanent, with emulated session',
  `userid` bigint unsigned NOT NULL COMMENT 'owner of the token',
  `externalserviceid` bigint unsigned NOT NULL,
  `sid` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link to browser or emulated session',
  `contextid` bigint unsigned NOT NULL COMMENT 'context id where in token valid',
  `creatorid` bigint unsigned NOT NULL DEFAULT '1' COMMENT 'user id of the token creator (useful to know when the administrator created a token and so display the token to a specific administrator)',
  `iprestriction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ip restriction',
  `validuntil` int DEFAULT NULL COMMENT 'timestampt - valid until data',
  `timecreated` int NOT NULL COMMENT 'created timestamp',
  `lastaccess` int DEFAULT NULL COMMENT 'last access timestamp',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token name, used to identify the token at the table view',
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `sid` (`sid`),
  KEY `external_tokens_userid_foreign` (`userid`),
  KEY `external_tokens_externalserviceid_foreign` (`externalserviceid`),
  KEY `external_tokens_contextid_foreign` (`contextid`),
  KEY `external_tokens_creatorid_foreign` (`creatorid`),
  CONSTRAINT `external_tokens_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `external_tokens_creatorid_foreign` FOREIGN KEY (`creatorid`) REFERENCES `users` (`id`),
  CONSTRAINT `external_tokens_externalserviceid_foreign` FOREIGN KEY (`externalserviceid`) REFERENCES `external_services` (`id`),
  CONSTRAINT `external_tokens_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `favourite`
--

DROP TABLE IF EXISTS `favourite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favourite` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Defines the Moodle component in which the favourite was created.',
  `itemtype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of the item which is being favourited. Usually a table name, but doesn''t have to be. E.g. ''messages'' or ''message_conversations''.',
  `itemid` int NOT NULL COMMENT 'The identifier of the item which is being favourited.',
  `contextid` bigint unsigned NOT NULL COMMENT 'The context id of the item being favourited',
  `userid` bigint unsigned NOT NULL COMMENT 'The id of the user to whom the favourite belongs',
  `ordering` int DEFAULT NULL COMMENT 'Optional ordering of the favourite within its context area. For example, this allows things like sorting favourite message conversations.',
  `timecreated` int NOT NULL COMMENT 'Creation time',
  `timemodified` int NOT NULL COMMENT 'Last modification time',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueuserfavouriteitem` (`component`,`itemtype`,`itemid`,`contextid`,`userid`),
  KEY `favourite_contextid_foreign` (`contextid`),
  KEY `favourite_userid_foreign` (`userid`),
  CONSTRAINT `favourite_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `favourite_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0',
  `anonymous` tinyint(1) NOT NULL DEFAULT '1',
  `email_notification` tinyint(1) NOT NULL DEFAULT '1',
  `multiple_submit` tinyint(1) NOT NULL DEFAULT '1',
  `autonumbering` tinyint(1) NOT NULL DEFAULT '1',
  `site_after_submit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_after_submit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_after_submitformat` tinyint NOT NULL DEFAULT '0',
  `publish_stats` tinyint(1) NOT NULL DEFAULT '0',
  `timeopen` int NOT NULL DEFAULT '0',
  `timeclose` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `completionsubmit` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this field is set to 1, then the activity will be automatically marked as ''complete'' once the user submits their choice.',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_completed`
--

DROP TABLE IF EXISTS `feedback_completed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_completed` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `random_response` int NOT NULL DEFAULT '0',
  `anonymous_response` tinyint(1) NOT NULL DEFAULT '0',
  `courseid` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `feedback_completed_feedback_foreign` (`feedback`),
  KEY `feedback_completed_courseid_foreign` (`courseid`),
  CONSTRAINT `feedback_completed_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `feedback_completed_feedback_foreign` FOREIGN KEY (`feedback`) REFERENCES `feedback` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_completedtmp`
--

DROP TABLE IF EXISTS `feedback_completedtmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_completedtmp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `guestid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timemodified` int NOT NULL DEFAULT '0',
  `random_response` int NOT NULL DEFAULT '0',
  `anonymous_response` tinyint(1) NOT NULL DEFAULT '0',
  `courseid` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `feedback_completedtmp_feedback_foreign` (`feedback`),
  CONSTRAINT `feedback_completedtmp_feedback_foreign` FOREIGN KEY (`feedback`) REFERENCES `feedback` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_item`
--

DROP TABLE IF EXISTS `feedback_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback` bigint unsigned NOT NULL DEFAULT '0',
  `template` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasvalue` tinyint(1) NOT NULL DEFAULT '0',
  `position` tinyint NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `dependitem` int NOT NULL DEFAULT '0',
  `dependvalue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_item_feedback_foreign` (`feedback`),
  KEY `feedback_item_template_foreign` (`template`),
  CONSTRAINT `feedback_item_feedback_foreign` FOREIGN KEY (`feedback`) REFERENCES `feedback` (`id`),
  CONSTRAINT `feedback_item_template_foreign` FOREIGN KEY (`template`) REFERENCES `feedback_template` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_sitecourse_map`
--

DROP TABLE IF EXISTS `feedback_sitecourse_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_sitecourse_map` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedbackid` bigint unsigned NOT NULL DEFAULT '0',
  `courseid` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `feedback_sitecourse_map_feedbackid_foreign` (`feedbackid`),
  CONSTRAINT `feedback_sitecourse_map_feedbackid_foreign` FOREIGN KEY (`feedbackid`) REFERENCES `feedback` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_template`
--

DROP TABLE IF EXISTS `feedback_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_template` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `ispublic` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_value`
--

DROP TABLE IF EXISTS `feedback_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_value` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL DEFAULT '0',
  `item` bigint unsigned NOT NULL DEFAULT '0',
  `completed` int NOT NULL DEFAULT '0',
  `tmp_completed` int NOT NULL DEFAULT '0',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `completed_item` (`completed`,`item`,`course_id`),
  KEY `course_id` (`course_id`),
  KEY `feedback_value_item_foreign` (`item`),
  CONSTRAINT `feedback_value_item_foreign` FOREIGN KEY (`item`) REFERENCES `feedback_item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_valuetmp`
--

DROP TABLE IF EXISTS `feedback_valuetmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_valuetmp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL DEFAULT '0',
  `item` bigint unsigned NOT NULL DEFAULT '0',
  `completed` int NOT NULL DEFAULT '0',
  `tmp_completed` int NOT NULL DEFAULT '0',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `completed_item` (`completed`,`item`,`course_id`),
  KEY `course_id` (`course_id`),
  KEY `feedback_valuetmp_item_foreign` (`item`),
  CONSTRAINT `feedback_valuetmp_item_foreign` FOREIGN KEY (`item`) REFERENCES `feedback_item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `file_conversion`
--

DROP TABLE IF EXISTS `file_conversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `file_conversion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usermodified` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `sourcefileid` bigint unsigned NOT NULL,
  `targetformat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '0',
  `statusmessage` text COLLATE utf8mb4_unicode_ci,
  `converter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destfileid` bigint unsigned DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `file_conversion_sourcefileid_foreign` (`sourcefileid`),
  KEY `file_conversion_destfileid_foreign` (`destfileid`),
  KEY `file_conversion_usermodified_foreign` (`usermodified`),
  CONSTRAINT `file_conversion_destfileid_foreign` FOREIGN KEY (`destfileid`) REFERENCES `files` (`id`),
  CONSTRAINT `file_conversion_sourcefileid_foreign` FOREIGN KEY (`sourcefileid`) REFERENCES `files` (`id`),
  CONSTRAINT `file_conversion_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contenthash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1 hash of file content',
  `pathnamehash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'complete file path sha1 hash - unique for each file',
  `contextid` bigint unsigned NOT NULL COMMENT 'The context id defined in context table - identifies the instance of plugin owning the file',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Full name of the component owning the area',
  `filearea` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Like "coursefiles". "submission", "intro" and "content" (images and swf linked from summaries), etc.',
  `itemid` int NOT NULL COMMENT 'Optional - some plugin specific item id (eg. forum post, blog entry or assignment submission, user id for user files)',
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Optional - relative path to file from module content root, useful in Scorm and Resource mod - most of the mods do not need this',
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The full Unicode name of this file (case sensitive) - some chars are not allowed though',
  `userid` bigint unsigned DEFAULT NULL COMMENT 'Optional - general userid field - meaning depending on plugin',
  `filesize` int NOT NULL,
  `mimetype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'type of file - jpeg image, open document spreadsheet',
  `status` int NOT NULL DEFAULT '0' COMMENT 'number greater than 0 means something is wrong with this file (virus, missing, etc.)',
  `source` text COLLATE utf8mb4_unicode_ci COMMENT 'contains the reference if the file is imported from external sites',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The original author of the file',
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'license of the file to guide reuse',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'order of files',
  `referencefileid` bigint unsigned DEFAULT NULL COMMENT 'Use to indicate file is a proxy for repository file',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pathnamehash` (`pathnamehash`),
  KEY `component-filearea-contextid-itemid` (`component`,`filearea`,`contextid`,`itemid`),
  KEY `contenthash` (`contenthash`),
  KEY `license` (`license`),
  KEY `filename` (`filename`),
  KEY `files_contextid_foreign` (`contextid`),
  KEY `files_userid_foreign` (`userid`),
  KEY `files_referencefileid_foreign` (`referencefileid`),
  CONSTRAINT `files_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `files_referencefileid_foreign` FOREIGN KEY (`referencefileid`) REFERENCES `files_reference` (`id`),
  CONSTRAINT `files_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `files_reference`
--

DROP TABLE IF EXISTS `files_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files_reference` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `repositoryid` bigint unsigned NOT NULL,
  `lastsync` int DEFAULT NULL COMMENT 'Last time the proxy file was synced with repository',
  `reference` text COLLATE utf8mb4_unicode_ci COMMENT 'Identification of the external file. Repository plugins are interpreting it to locate the external file.',
  `referencehash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Internal implementation detail, contains SHA1 hash of the reference field. Can be indexed and used for comparison. Not meant to be used by a non-core code.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_external_file` (`referencehash`,`repositoryid`),
  KEY `files_reference_repositoryid_foreign` (`repositoryid`),
  CONSTRAINT `files_reference_repositoryid_foreign` FOREIGN KEY (`repositoryid`) REFERENCES `repository_instances` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filter_active`
--

DROP TABLE IF EXISTS `filter_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filter_active` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filter` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The filter internal name, like ''tex''.',
  `contextid` bigint unsigned NOT NULL COMMENT 'References context.id.',
  `active` smallint NOT NULL COMMENT 'Whether this filter is active in this context. +1 = On, -1 = Off, no row with this contextid = inherit. As a special case, when contextid points to the system context, -9999 means this filter is completely disabled.',
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'Only relevant if contextid points to the system context. In other cases this field should contain 0. The order in which the filters should be applied.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextid-filter` (`contextid`,`filter`),
  CONSTRAINT `filter_active_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filter_config`
--

DROP TABLE IF EXISTS `filter_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filter_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filter` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The filter internal name, like ''tex''.',
  `contextid` bigint unsigned NOT NULL COMMENT 'References context.id.',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The config variable name.',
  `value` text COLLATE utf8mb4_unicode_ci COMMENT 'The correspoding config variable value.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextid-filter-name` (`contextid`,`filter`,`name`),
  CONSTRAINT `filter_config_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `folder`
--

DROP TABLE IF EXISTS `folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `folder` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `revision` int NOT NULL DEFAULT '0' COMMENT 'incremented when after each file changes, solves browser caching issues',
  `timemodified` int NOT NULL DEFAULT '0',
  `display` smallint NOT NULL DEFAULT '0' COMMENT 'Display type of folder contents - on a separate page or inline',
  `showexpanded` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = expanded, 0 = collapsed for sub-folders',
  `showdownloadfolder` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = show download folder button',
  `forcedownload` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = force download of individual files',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'text format of intro field',
  `duedate` int NOT NULL DEFAULT '0' COMMENT 'A due date to show in the calendar. Not used for grading.',
  `cutoffdate` int NOT NULL DEFAULT '0' COMMENT 'The final date after which forum posts will no longer be accepted for this forum.',
  `assessed` int NOT NULL DEFAULT '0',
  `assesstimestart` int NOT NULL DEFAULT '0',
  `assesstimefinish` int NOT NULL DEFAULT '0',
  `scale` int NOT NULL DEFAULT '0',
  `grade_forum` int NOT NULL DEFAULT '0',
  `grade_forum_notify` smallint NOT NULL DEFAULT '0',
  `maxbytes` int NOT NULL DEFAULT '0',
  `maxattachments` int NOT NULL DEFAULT '1' COMMENT 'Number of attachments allowed per post',
  `forcesubscribe` tinyint(1) NOT NULL DEFAULT '0',
  `trackingtype` tinyint NOT NULL DEFAULT '1',
  `rsstype` tinyint NOT NULL DEFAULT '0',
  `rssarticles` tinyint NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `warnafter` int NOT NULL DEFAULT '0',
  `blockafter` int NOT NULL DEFAULT '0',
  `blockperiod` int NOT NULL DEFAULT '0',
  `completiondiscussions` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if a certain number of posts are required to mark this forum completed for a user.',
  `completionreplies` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if a certain number of replies are required to mark this forum complete for a user.',
  `completionposts` int NOT NULL DEFAULT '0' COMMENT 'Nonzero if a certain number of posts or replies (total) are required to mark this forum complete for a user.',
  `displaywordcount` tinyint(1) NOT NULL DEFAULT '0',
  `lockdiscussionafter` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_digests`
--

DROP TABLE IF EXISTS `forum_digests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_digests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `forum` bigint unsigned NOT NULL,
  `maildigest` tinyint(1) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `forumdigest` (`forum`,`userid`,`maildigest`),
  KEY `forum_digests_userid_foreign` (`userid`),
  CONSTRAINT `forum_digests_forum_foreign` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`),
  CONSTRAINT `forum_digests_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_discussion_subs`
--

DROP TABLE IF EXISTS `forum_discussion_subs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_discussion_subs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `forum` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `discussion` bigint unsigned NOT NULL,
  `preference` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_discussions` (`userid`,`discussion`),
  KEY `forum_discussion_subs_forum_foreign` (`forum`),
  KEY `forum_discussion_subs_discussion_foreign` (`discussion`),
  CONSTRAINT `forum_discussion_subs_discussion_foreign` FOREIGN KEY (`discussion`) REFERENCES `forum_discussions` (`id`),
  CONSTRAINT `forum_discussion_subs_forum_foreign` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`),
  CONSTRAINT `forum_discussion_subs_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_discussions`
--

DROP TABLE IF EXISTS `forum_discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_discussions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `forum` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstpost` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '-1',
  `assessed` tinyint(1) NOT NULL DEFAULT '1',
  `timemodified` int NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timestart` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `pinned` tinyint(1) NOT NULL DEFAULT '0',
  `timelocked` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `course` (`course`),
  KEY `forum_discussions_forum_foreign` (`forum`),
  KEY `forum_discussions_usermodified_foreign` (`usermodified`),
  CONSTRAINT `forum_discussions_forum_foreign` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`),
  CONSTRAINT `forum_discussions_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_grades`
--

DROP TABLE IF EXISTS `forum_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `forum` bigint unsigned NOT NULL COMMENT 'The ID of the forum that this grade relates to',
  `itemnumber` int NOT NULL COMMENT 'The grade itemnumber',
  `userid` int NOT NULL COMMENT 'The user who was graded',
  `grade` decimal(10,5) DEFAULT NULL COMMENT 'The numerical grade for this user''s forum assessment. Can be determined by scales/advancedgradingforms etc but will always be converted back to a floating point number.',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `forumusergrade` (`forum`,`itemnumber`,`userid`),
  KEY `userid` (`userid`),
  CONSTRAINT `forum_grades_forum_foreign` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `discussion` bigint unsigned NOT NULL DEFAULT '0',
  `parent` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `created` int NOT NULL DEFAULT '0',
  `modified` int NOT NULL DEFAULT '0',
  `mailed` tinyint NOT NULL DEFAULT '0',
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageformat` tinyint NOT NULL DEFAULT '0',
  `messagetrust` tinyint NOT NULL DEFAULT '0',
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalscore` smallint NOT NULL DEFAULT '0',
  `mailnow` int NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `privatereplyto` int NOT NULL DEFAULT '0',
  `wordcount` bigint DEFAULT NULL,
  `charcount` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `created` (`created`),
  KEY `mailed` (`mailed`),
  KEY `privatereplyto` (`privatereplyto`),
  KEY `forum_posts_discussion_foreign` (`discussion`),
  KEY `forum_posts_parent_foreign` (`parent`),
  CONSTRAINT `forum_posts_discussion_foreign` FOREIGN KEY (`discussion`) REFERENCES `forum_discussions` (`id`),
  CONSTRAINT `forum_posts_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `forum_posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_queue`
--

DROP TABLE IF EXISTS `forum_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_queue` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `discussionid` bigint unsigned NOT NULL DEFAULT '0',
  `postid` bigint unsigned NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The modified time of the original post',
  PRIMARY KEY (`id`),
  KEY `user` (`userid`),
  KEY `forum_queue_discussionid_foreign` (`discussionid`),
  KEY `forum_queue_postid_foreign` (`postid`),
  CONSTRAINT `forum_queue_discussionid_foreign` FOREIGN KEY (`discussionid`) REFERENCES `forum_discussions` (`id`),
  CONSTRAINT `forum_queue_postid_foreign` FOREIGN KEY (`postid`) REFERENCES `forum_posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_read`
--

DROP TABLE IF EXISTS `forum_read`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_read` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `forumid` int NOT NULL DEFAULT '0',
  `discussionid` int NOT NULL DEFAULT '0',
  `postid` int NOT NULL DEFAULT '0',
  `firstread` int NOT NULL DEFAULT '0',
  `lastread` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `forumid-userid` (`forumid`,`userid`),
  KEY `discussionid-userid` (`discussionid`,`userid`),
  KEY `postid-userid` (`postid`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_subscriptions`
--

DROP TABLE IF EXISTS `forum_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `forum` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridforum` (`userid`,`forum`),
  KEY `userid` (`userid`),
  KEY `forum_subscriptions_forum_foreign` (`forum`),
  CONSTRAINT `forum_subscriptions_forum_foreign` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `forum_track_prefs`
--

DROP TABLE IF EXISTS `forum_track_prefs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_track_prefs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `forumid` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid-forumid` (`userid`,`forumid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossary`
--

DROP TABLE IF EXISTS `glossary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `glossary` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0',
  `allowduplicatedentries` tinyint NOT NULL DEFAULT '0',
  `displayformat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dictionary',
  `mainglossary` tinyint NOT NULL DEFAULT '0',
  `showspecial` tinyint NOT NULL DEFAULT '1',
  `showalphabet` tinyint NOT NULL DEFAULT '1',
  `showall` tinyint NOT NULL DEFAULT '1',
  `allowcomments` tinyint NOT NULL DEFAULT '0',
  `allowprintview` tinyint NOT NULL DEFAULT '1',
  `usedynalink` tinyint NOT NULL DEFAULT '1',
  `defaultapproval` tinyint NOT NULL DEFAULT '1',
  `approvaldisplayformat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default' COMMENT 'Display Format when approving entries',
  `globalglossary` tinyint NOT NULL DEFAULT '0',
  `entbypage` tinyint NOT NULL DEFAULT '10',
  `editalways` tinyint NOT NULL DEFAULT '0',
  `rsstype` tinyint NOT NULL DEFAULT '0',
  `rssarticles` tinyint NOT NULL DEFAULT '0',
  `assessed` int NOT NULL DEFAULT '0',
  `assesstimestart` int NOT NULL DEFAULT '0',
  `assesstimefinish` int NOT NULL DEFAULT '0',
  `scale` int NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `completionentries` int NOT NULL DEFAULT '0' COMMENT 'Non zero if a certain number of entries are required to mark this glossary complete for a user.',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossary_alias`
--

DROP TABLE IF EXISTS `glossary_alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `glossary_alias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entryid` bigint unsigned NOT NULL DEFAULT '0',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `glossary_alias_entryid_foreign` (`entryid`),
  CONSTRAINT `glossary_alias_entryid_foreign` FOREIGN KEY (`entryid`) REFERENCES `glossary_entries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossary_categories`
--

DROP TABLE IF EXISTS `glossary_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `glossary_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `glossaryid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usedynalink` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `glossary_categories_glossaryid_foreign` (`glossaryid`),
  CONSTRAINT `glossary_categories_glossaryid_foreign` FOREIGN KEY (`glossaryid`) REFERENCES `glossary` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossary_entries`
--

DROP TABLE IF EXISTS `glossary_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `glossary_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `glossaryid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `concept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `definition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `definitionformat` tinyint NOT NULL DEFAULT '0',
  `definitiontrust` tinyint NOT NULL DEFAULT '0',
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `teacherentry` tinyint NOT NULL DEFAULT '0',
  `sourceglossaryid` int NOT NULL DEFAULT '0',
  `usedynalink` tinyint NOT NULL DEFAULT '1',
  `casesensitive` tinyint NOT NULL DEFAULT '0',
  `fullmatch` tinyint NOT NULL DEFAULT '1',
  `approved` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `concept` (`concept`),
  KEY `glossary_entries_glossaryid_foreign` (`glossaryid`),
  CONSTRAINT `glossary_entries_glossaryid_foreign` FOREIGN KEY (`glossaryid`) REFERENCES `glossary` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossary_entries_categories`
--

DROP TABLE IF EXISTS `glossary_entries_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `glossary_entries_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` bigint unsigned NOT NULL DEFAULT '0',
  `entryid` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `glossary_entries_categories_categoryid_foreign` (`categoryid`),
  KEY `glossary_entries_categories_entryid_foreign` (`entryid`),
  CONSTRAINT `glossary_entries_categories_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `glossary_categories` (`id`),
  CONSTRAINT `glossary_entries_categories_entryid_foreign` FOREIGN KEY (`entryid`) REFERENCES `glossary_entries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossary_formats`
--

DROP TABLE IF EXISTS `glossary_formats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `glossary_formats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popupformatname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint NOT NULL DEFAULT '1',
  `showgroup` tinyint NOT NULL DEFAULT '1',
  `showtabs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultmode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defaulthook` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortkey` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortorder` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_categories`
--

DROP TABLE IF EXISTS `grade_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL COMMENT 'The course this grade category is part of',
  `parent` bigint unsigned DEFAULT NULL COMMENT 'Categories can be hierarchical',
  `depth` int NOT NULL DEFAULT '0' COMMENT 'How many parents does this category have?',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'shows the path as /1/2/3 (like course_categories)',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of this grade category',
  `aggregation` int NOT NULL DEFAULT '0' COMMENT 'A constant pointing to one of the predefined aggregation strategies (none, mean,median,sum, etc)',
  `keephigh` int NOT NULL DEFAULT '0' COMMENT 'Keep only the X highest items',
  `droplow` int NOT NULL DEFAULT '0' COMMENT 'Drop the X lowest items',
  `aggregateonlygraded` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'aggregate only graded activities',
  `aggregateoutcomes` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Aggregate outcomes',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `hidden` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `grade_categories_courseid_foreign` (`courseid`),
  KEY `grade_categories_parent_foreign` (`parent`),
  CONSTRAINT `grade_categories_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `grade_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_categories_history`
--

DROP TABLE IF EXISTS `grade_categories_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_categories_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` int NOT NULL DEFAULT '0' COMMENT 'created/modified/deleted constants',
  `oldid` bigint unsigned NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'What caused the modification? manual/module/import/...',
  `timemodified` int DEFAULT NULL COMMENT 'The last time this grade_item was modified',
  `loggeduser` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this outcome',
  `courseid` bigint unsigned NOT NULL COMMENT 'The course this grade category is part of',
  `parent` bigint unsigned DEFAULT NULL COMMENT 'Categories can be hierarchical',
  `depth` int NOT NULL DEFAULT '0' COMMENT 'How many parents does this category have?',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'shows the path as /1/2/3 (like course_categories)',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of this grade category',
  `aggregation` int NOT NULL DEFAULT '0' COMMENT 'A constant pointing to one of the predefined aggregation strategies (none, mean,median,sum, etc)',
  `keephigh` int NOT NULL DEFAULT '0' COMMENT 'Keep only the X highest items',
  `droplow` int NOT NULL DEFAULT '0' COMMENT 'Drop the X lowest items',
  `aggregateonlygraded` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'aggregate only graded items',
  `aggregateoutcomes` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Aggregate outcomes',
  `aggregatesubcats` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'This setting was removed from grade_categories. It is kept here only to preserve history.',
  `hidden` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `action` (`action`),
  KEY `timemodified` (`timemodified`),
  KEY `grade_categories_history_oldid_foreign` (`oldid`),
  KEY `grade_categories_history_courseid_foreign` (`courseid`),
  KEY `grade_categories_history_parent_foreign` (`parent`),
  KEY `grade_categories_history_loggeduser_foreign` (`loggeduser`),
  CONSTRAINT `grade_categories_history_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_categories_history_loggeduser_foreign` FOREIGN KEY (`loggeduser`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_categories_history_oldid_foreign` FOREIGN KEY (`oldid`) REFERENCES `grade_categories` (`id`),
  CONSTRAINT `grade_categories_history_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `grade_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_grades`
--

DROP TABLE IF EXISTS `grade_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint unsigned NOT NULL COMMENT 'The item this grade belongs to',
  `userid` bigint unsigned NOT NULL COMMENT 'The user who this grade is for',
  `rawgrade` decimal(10,5) DEFAULT NULL COMMENT 'If the grade is a float value (or has been converted to one)',
  `rawgrademax` decimal(10,5) NOT NULL DEFAULT '100.00000' COMMENT 'The maximum allowable grade when this was created',
  `rawgrademin` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The minimum allowable grade when this was created',
  `rawscaleid` bigint unsigned DEFAULT NULL COMMENT 'If this grade is based on a scale, which one was it?',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this grade',
  `finalgrade` decimal(10,5) DEFAULT NULL COMMENT 'The final grade (cached) after all calculations are made',
  `hidden` int NOT NULL DEFAULT '0' COMMENT 'show 0, hide 1 or hide until date',
  `locked` int NOT NULL DEFAULT '0' COMMENT 'not locked 0, locked from date',
  `locktime` int NOT NULL DEFAULT '0' COMMENT 'automatic locking of final grade, 0 means none, date otherwise',
  `exported` int NOT NULL DEFAULT '0' COMMENT 'date of last grade export, 0 if none',
  `overridden` int NOT NULL DEFAULT '0' COMMENT 'indicates grade overridden from gradebook, 0 means none, date means overridden',
  `excluded` int NOT NULL DEFAULT '0' COMMENT 'grade excluded from aggregation functions, date means when excluded',
  `feedback` text COLLATE utf8mb4_unicode_ci COMMENT 'grading feedback',
  `feedbackformat` int NOT NULL DEFAULT '0' COMMENT 'format of feedback text',
  `information` text COLLATE utf8mb4_unicode_ci COMMENT 'optiona information',
  `informationformat` int NOT NULL DEFAULT '0' COMMENT 'format of information text',
  `timecreated` int DEFAULT NULL COMMENT 'the time this grade was first created',
  `timemodified` int DEFAULT NULL COMMENT 'the time this grade was last modified',
  `aggregationstatus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unknown' COMMENT 'One of several values describing how this grade_grade was used when calculating the aggregation. Possible values are "unknown", "dropped", "novalue", "used"',
  `aggregationweight` decimal(10,5) DEFAULT NULL COMMENT 'If the aggregationstatus == ''included'', then this is the percent this item contributed to the aggregation.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-itemid` (`userid`,`itemid`),
  KEY `locked-locktime` (`locked`,`locktime`),
  KEY `grade_grades_itemid_foreign` (`itemid`),
  KEY `grade_grades_rawscaleid_foreign` (`rawscaleid`),
  KEY `grade_grades_usermodified_foreign` (`usermodified`),
  CONSTRAINT `grade_grades_itemid_foreign` FOREIGN KEY (`itemid`) REFERENCES `grade_items` (`id`),
  CONSTRAINT `grade_grades_rawscaleid_foreign` FOREIGN KEY (`rawscaleid`) REFERENCES `scale` (`id`),
  CONSTRAINT `grade_grades_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_grades_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_grades_history`
--

DROP TABLE IF EXISTS `grade_grades_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_grades_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` int NOT NULL DEFAULT '0' COMMENT 'created/modified/deleted constants',
  `oldid` bigint unsigned NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'What caused the modification? manual/module/import/...',
  `timemodified` int DEFAULT NULL COMMENT 'The last time this grade_item was modified',
  `loggeduser` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this outcome',
  `itemid` bigint unsigned NOT NULL COMMENT 'The item this grade belongs to',
  `userid` bigint unsigned NOT NULL COMMENT 'The user who this grade is for',
  `rawgrade` decimal(10,5) DEFAULT NULL COMMENT 'If the grade is a float value (or has been converted to one)',
  `rawgrademax` decimal(10,5) NOT NULL DEFAULT '100.00000' COMMENT 'The maximum allowable grade when this was created',
  `rawgrademin` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The minimum allowable grade when this was created',
  `rawscaleid` bigint unsigned DEFAULT NULL COMMENT 'If this grade is based on a scale, which one was it?',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this grade',
  `finalgrade` decimal(10,5) DEFAULT NULL COMMENT 'The final grade (cached) after all calculations are made',
  `hidden` int NOT NULL DEFAULT '0' COMMENT 'show 0, hide 1 or hide until date',
  `locked` int NOT NULL DEFAULT '0' COMMENT 'not locked 0, locked from date',
  `locktime` int NOT NULL DEFAULT '0' COMMENT 'automatic locking of final grade, 0 means none, date otherwise',
  `exported` int NOT NULL DEFAULT '0' COMMENT 'date of last grade export, 0 if none',
  `overridden` int NOT NULL DEFAULT '0' COMMENT 'indicates grade overridden from gradebook, 0 means none, date means overridden',
  `excluded` int NOT NULL DEFAULT '0' COMMENT 'grade excluded from aggregation functions, date means when excluded',
  `feedback` text COLLATE utf8mb4_unicode_ci COMMENT 'grading feedback',
  `feedbackformat` int NOT NULL DEFAULT '0' COMMENT 'format of feedback text',
  `information` text COLLATE utf8mb4_unicode_ci COMMENT 'optiona information',
  `informationformat` int NOT NULL DEFAULT '0' COMMENT 'format of information text',
  PRIMARY KEY (`id`),
  KEY `action` (`action`),
  KEY `timemodified` (`timemodified`),
  KEY `userid-itemid-timemodified` (`userid`,`itemid`,`timemodified`),
  KEY `grade_grades_history_oldid_foreign` (`oldid`),
  KEY `grade_grades_history_itemid_foreign` (`itemid`),
  KEY `grade_grades_history_rawscaleid_foreign` (`rawscaleid`),
  KEY `grade_grades_history_usermodified_foreign` (`usermodified`),
  KEY `grade_grades_history_loggeduser_foreign` (`loggeduser`),
  CONSTRAINT `grade_grades_history_itemid_foreign` FOREIGN KEY (`itemid`) REFERENCES `grade_items` (`id`),
  CONSTRAINT `grade_grades_history_loggeduser_foreign` FOREIGN KEY (`loggeduser`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_grades_history_oldid_foreign` FOREIGN KEY (`oldid`) REFERENCES `grade_grades` (`id`),
  CONSTRAINT `grade_grades_history_rawscaleid_foreign` FOREIGN KEY (`rawscaleid`) REFERENCES `scale` (`id`),
  CONSTRAINT `grade_grades_history_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_grades_history_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_import_newitem`
--

DROP TABLE IF EXISTS `grade_import_newitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_import_newitem` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'new grade item name',
  `importcode` int NOT NULL COMMENT 'import batch code for identification',
  `importer` bigint unsigned NOT NULL COMMENT 'user importing the data',
  PRIMARY KEY (`id`),
  KEY `grade_import_newitem_importer_foreign` (`importer`),
  CONSTRAINT `grade_import_newitem_importer_foreign` FOREIGN KEY (`importer`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_import_values`
--

DROP TABLE IF EXISTS `grade_import_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_import_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint unsigned DEFAULT NULL COMMENT 'if set, this points to existing grade_items id',
  `newgradeitem` bigint unsigned DEFAULT NULL COMMENT 'if set, points to the id of grade_import_newitem',
  `userid` bigint unsigned NOT NULL,
  `finalgrade` decimal(10,5) DEFAULT NULL COMMENT 'raw grade value',
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `importcode` int NOT NULL COMMENT 'similar to backup_code, a unique batch code for identifying one batch of imports',
  `importer` bigint unsigned DEFAULT NULL,
  `importonlyfeedback` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `grade_import_values_itemid_foreign` (`itemid`),
  KEY `grade_import_values_newgradeitem_foreign` (`newgradeitem`),
  KEY `grade_import_values_importer_foreign` (`importer`),
  KEY `grade_import_values_userid_foreign` (`userid`),
  CONSTRAINT `grade_import_values_importer_foreign` FOREIGN KEY (`importer`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_import_values_itemid_foreign` FOREIGN KEY (`itemid`) REFERENCES `grade_items` (`id`),
  CONSTRAINT `grade_import_values_newgradeitem_foreign` FOREIGN KEY (`newgradeitem`) REFERENCES `grade_import_newitem` (`id`),
  CONSTRAINT `grade_import_values_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_items`
--

DROP TABLE IF EXISTS `grade_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned DEFAULT NULL COMMENT 'The course this item is part of',
  `categoryid` bigint unsigned DEFAULT NULL COMMENT '(optional) the category group this item belongs to',
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The name of this item (pushed in by the module)',
  `itemtype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '''mod'', ''blocks'', ''import'', ''calculated'' etc',
  `itemmodule` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''forum'', ''quiz'', ''csv'', etc',
  `iteminstance` int DEFAULT NULL COMMENT 'id of the item module',
  `itemnumber` int DEFAULT NULL COMMENT 'Can be used to distinguish multiple grades for an activity',
  `iteminfo` text COLLATE utf8mb4_unicode_ci COMMENT 'Info and notes about this item XXX',
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Arbitrary idnumber provided by the module responsible',
  `calculation` text COLLATE utf8mb4_unicode_ci COMMENT 'Formula describing how to derive this grade from other items, referring to them using giXXX where XXX is grade item id ... eg something like: =sin(square([#gi20#])) + [#gi30#]',
  `gradetype` smallint NOT NULL DEFAULT '1' COMMENT '0 = none, 1 = value, 2 = scale, 3 = text',
  `grademax` decimal(10,5) NOT NULL DEFAULT '100.00000' COMMENT 'What is the maximum allowable grade?',
  `grademin` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'What is the minimum allowable grade?',
  `scaleid` bigint unsigned DEFAULT NULL COMMENT 'If this grade is based on a scale, which one is it?',
  `outcomeid` bigint unsigned DEFAULT NULL COMMENT 'If this grade is related to an outcome, which one is it?',
  `gradepass` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'What grade is needed to pass? grademin &lt; gradepass &lt;= grademax',
  `multfactor` decimal(10,5) NOT NULL DEFAULT '1.00000' COMMENT 'Multiply all grades by this',
  `plusfactor` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Add this to all grades',
  `aggregationcoef` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Aggregation coefficient used for category weights or other aggregation types',
  `aggregationcoef2` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Aggregation coefficient used for weights in aggregation types with both extra credit and weight',
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'Sorting order of the columns',
  `display` int NOT NULL DEFAULT '0' COMMENT 'Display as real grades, percentages (in reference to the minimum and maximum grades) or letters (A, B, C etc..), or course default (0)',
  `decimals` tinyint(1) DEFAULT NULL COMMENT 'Also known as precision, the number of digits after the decimal point symbol.',
  `hidden` int NOT NULL DEFAULT '0' COMMENT '1 is hidden, &gt; 1 is a date to hide until (prevents viewing)',
  `locked` int NOT NULL DEFAULT '0' COMMENT '1 is locked, &gt; 1 is a date to lock until (prevents update)',
  `locktime` int NOT NULL DEFAULT '0' COMMENT 'lock all final grades after this date',
  `needsupdate` int NOT NULL DEFAULT '0' COMMENT 'If this flag is set, then the whole column will be recalculated',
  `weightoverride` tinyint(1) NOT NULL DEFAULT '0',
  `timecreated` int DEFAULT NULL COMMENT 'The first time this grade_item was created',
  `timemodified` int DEFAULT NULL COMMENT 'The last time this grade_item was modified',
  PRIMARY KEY (`id`),
  KEY `locked-locktime` (`locked`,`locktime`),
  KEY `itemtype-needsupdate` (`itemtype`,`needsupdate`),
  KEY `gradetype` (`gradetype`),
  KEY `idnumber-courseid` (`idnumber`,`courseid`),
  KEY `itemtype-mod-inst-course` (`itemtype`,`itemmodule`,`iteminstance`,`courseid`),
  KEY `grade_items_courseid_foreign` (`courseid`),
  KEY `grade_items_categoryid_foreign` (`categoryid`),
  KEY `grade_items_scaleid_foreign` (`scaleid`),
  KEY `grade_items_outcomeid_foreign` (`outcomeid`),
  CONSTRAINT `grade_items_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `grade_categories` (`id`),
  CONSTRAINT `grade_items_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_items_outcomeid_foreign` FOREIGN KEY (`outcomeid`) REFERENCES `grade_outcomes` (`id`),
  CONSTRAINT `grade_items_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_items_history`
--

DROP TABLE IF EXISTS `grade_items_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_items_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` int NOT NULL DEFAULT '0' COMMENT 'created/modified/deleted constants',
  `oldid` bigint unsigned NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'What caused the modification? manual/module/import/...',
  `timemodified` int DEFAULT NULL COMMENT 'The last time this grade_item was modified',
  `loggeduser` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this outcome',
  `courseid` bigint unsigned DEFAULT NULL COMMENT 'The course this item is part of',
  `categoryid` bigint unsigned DEFAULT NULL COMMENT '(optional) the category group this item belongs to',
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The name of this item (pushed in by the module)',
  `itemtype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '''mod'', ''blocks'', ''import'', ''calculated'' etc',
  `itemmodule` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''forum'', ''quiz'', ''csv'', etc',
  `iteminstance` int DEFAULT NULL COMMENT 'id of the item module',
  `itemnumber` int DEFAULT NULL COMMENT 'Can be used to distinguish multiple grades for an activity',
  `iteminfo` text COLLATE utf8mb4_unicode_ci COMMENT 'Info and notes about this item XXX',
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Arbitrary idnumber provided by the module responsible',
  `calculation` text COLLATE utf8mb4_unicode_ci COMMENT 'Formula describing how to derive this grade from other items, referring to them using giXXX where XXX is grade item id ... eg something like: =sin(square([#gi20#])) + [#gi30#]',
  `gradetype` smallint NOT NULL DEFAULT '1' COMMENT '0 = none, 1 = value, 2 = scale, 3 = text',
  `grademax` decimal(10,5) NOT NULL DEFAULT '100.00000' COMMENT 'What is the maximum allowable grade?',
  `grademin` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'What is the minimum allowable grade?',
  `scaleid` bigint unsigned DEFAULT NULL COMMENT 'If this grade is based on a scale, which one is it?',
  `outcomeid` bigint unsigned DEFAULT NULL COMMENT 'If this grade is related to an outcome, which one is it?',
  `gradepass` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'What grade is needed to pass? grademin &lt; gradepass &lt;= grademax',
  `multfactor` decimal(10,5) NOT NULL DEFAULT '1.00000' COMMENT 'Multiply all grades by this',
  `plusfactor` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Add this to all grades',
  `aggregationcoef` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Aggregation coefficient used for category weights or other aggregation types',
  `aggregationcoef2` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Aggregation coefficient used for category weights or other aggregation types',
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'Sorting order of the columns',
  `hidden` int NOT NULL DEFAULT '0' COMMENT '1 is hidden, &gt; 1 is a date to hide until (prevents viewing)',
  `locked` int NOT NULL DEFAULT '0' COMMENT '1 is locked, &gt; 1 is a date to lock until (prevents update)',
  `locktime` int NOT NULL DEFAULT '0' COMMENT 'lock all final grades after this date',
  `needsupdate` int NOT NULL DEFAULT '0' COMMENT 'If this flag is set, then the whole column will be recalculated',
  `display` int NOT NULL DEFAULT '0',
  `decimals` tinyint(1) DEFAULT NULL,
  `weightoverride` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `action` (`action`),
  KEY `timemodified` (`timemodified`),
  KEY `grade_items_history_oldid_foreign` (`oldid`),
  KEY `grade_items_history_courseid_foreign` (`courseid`),
  KEY `grade_items_history_categoryid_foreign` (`categoryid`),
  KEY `grade_items_history_scaleid_foreign` (`scaleid`),
  KEY `grade_items_history_outcomeid_foreign` (`outcomeid`),
  KEY `grade_items_history_loggeduser_foreign` (`loggeduser`),
  CONSTRAINT `grade_items_history_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `grade_categories` (`id`),
  CONSTRAINT `grade_items_history_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_items_history_loggeduser_foreign` FOREIGN KEY (`loggeduser`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_items_history_oldid_foreign` FOREIGN KEY (`oldid`) REFERENCES `grade_items` (`id`),
  CONSTRAINT `grade_items_history_outcomeid_foreign` FOREIGN KEY (`outcomeid`) REFERENCES `grade_outcomes` (`id`),
  CONSTRAINT `grade_items_history_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_letters`
--

DROP TABLE IF EXISTS `grade_letters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_letters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` int NOT NULL COMMENT 'What contextid does this letter apply to (for now these will always be courses, but later...)',
  `lowerboundary` decimal(10,5) NOT NULL COMMENT 'The lower boundary of the letter. Its upper boundary is the lower boundary of the next highest letter, unless there is none above, in which case it''s grademax for that grade_item.',
  `letter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The display value of the letter. Can be any character or string of characters (OK, A, 10% etc..)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextid-lowerboundary-letter` (`contextid`,`lowerboundary`,`letter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_outcomes`
--

DROP TABLE IF EXISTS `grade_outcomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_outcomes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned DEFAULT NULL COMMENT 'Mostly these are defined site wide ie NULL',
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The short name or code for this outcome statement',
  `fullname` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The full description of the outcome (usually 1 sentence)',
  `scaleid` bigint unsigned DEFAULT NULL COMMENT 'The recommended scale for this outcome.',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'outcome description',
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `timecreated` int DEFAULT NULL COMMENT 'the time this outcome was first created',
  `timemodified` int DEFAULT NULL COMMENT 'the time this outcome was last updated',
  `usermodified` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this outcome',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseid-shortname` (`courseid`,`shortname`),
  KEY `grade_outcomes_scaleid_foreign` (`scaleid`),
  KEY `grade_outcomes_usermodified_foreign` (`usermodified`),
  CONSTRAINT `grade_outcomes_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_outcomes_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`),
  CONSTRAINT `grade_outcomes_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_outcomes_courses`
--

DROP TABLE IF EXISTS `grade_outcomes_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_outcomes_courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL COMMENT 'id of the course',
  `outcomeid` bigint unsigned NOT NULL COMMENT 'id of the outcome',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseid-outcomeid` (`courseid`,`outcomeid`),
  KEY `grade_outcomes_courses_outcomeid_foreign` (`outcomeid`),
  CONSTRAINT `grade_outcomes_courses_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_outcomes_courses_outcomeid_foreign` FOREIGN KEY (`outcomeid`) REFERENCES `grade_outcomes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_outcomes_history`
--

DROP TABLE IF EXISTS `grade_outcomes_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_outcomes_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` int NOT NULL DEFAULT '0' COMMENT 'created/modified/deleted constants',
  `oldid` bigint unsigned NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'What caused the modification? manual/module/import/...',
  `timemodified` int DEFAULT NULL COMMENT 'The last time this grade_item was modified',
  `loggeduser` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this outcome',
  `courseid` bigint unsigned DEFAULT NULL COMMENT 'Mostly these are defined site wide ie NULL',
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The short name or code for this outcome statement',
  `fullname` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The full description of the outcome (usually 1 sentence)',
  `scaleid` bigint unsigned DEFAULT NULL COMMENT 'The recommended scale for this outcome.',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Outcome description',
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `action` (`action`),
  KEY `timemodified` (`timemodified`),
  KEY `grade_outcomes_history_oldid_foreign` (`oldid`),
  KEY `grade_outcomes_history_courseid_foreign` (`courseid`),
  KEY `grade_outcomes_history_scaleid_foreign` (`scaleid`),
  KEY `grade_outcomes_history_loggeduser_foreign` (`loggeduser`),
  CONSTRAINT `grade_outcomes_history_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `grade_outcomes_history_loggeduser_foreign` FOREIGN KEY (`loggeduser`) REFERENCES `users` (`id`),
  CONSTRAINT `grade_outcomes_history_oldid_foreign` FOREIGN KEY (`oldid`) REFERENCES `grade_outcomes` (`id`),
  CONSTRAINT `grade_outcomes_history_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grade_settings`
--

DROP TABLE IF EXISTS `grade_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseid-name` (`courseid`,`name`),
  CONSTRAINT `grade_settings_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradepenalty_duedate_rule`
--

DROP TABLE IF EXISTS `gradepenalty_duedate_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradepenalty_duedate_rule` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint NOT NULL,
  `sortorder` bigint NOT NULL DEFAULT '0',
  `overdueby` bigint NOT NULL,
  `penalty` double NOT NULL,
  `usermodified` bigint NOT NULL DEFAULT '0',
  `timecreated` bigint NOT NULL DEFAULT '0',
  `timemodified` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gradduedrule_con_ix` (`contextid`),
  KEY `gradduedrule_use_ix` (`usermodified`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grading_areas`
--

DROP TABLE IF EXISTS `grading_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grading_areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL COMMENT 'The context of the gradable area, eg module instance context.',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Frankenstyle name of the component holding this area',
  `areaname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of gradable area',
  `activemethod` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The default grading method (plugin) that should be used for this area',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_gradable_area` (`contextid`,`component`,`areaname`),
  CONSTRAINT `grading_areas_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grading_definitions`
--

DROP TABLE IF EXISTS `grading_definitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grading_definitions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `areaid` bigint unsigned NOT NULL,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the plugin providing this grading form',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The title of the form that helps users to identify it',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'More detailed description of the form',
  `descriptionformat` tinyint DEFAULT NULL COMMENT 'Format of the description field',
  `status` int NOT NULL DEFAULT '0' COMMENT 'Status of the form definition, by default in the under-construction state',
  `copiedfromid` int DEFAULT NULL COMMENT 'The id of the original definition that this was initially copied from or null if it was from scratch',
  `timecreated` int NOT NULL COMMENT 'The timestamp of when the form definition was created initially',
  `usercreated` bigint unsigned NOT NULL COMMENT 'The ID of the user who created this definition and is considered as its owner for access control purposes',
  `timemodified` int NOT NULL COMMENT 'The time stamp of when the form definition was modified recently',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The ID of the user who did the most recent modification',
  `timecopied` int DEFAULT '0' COMMENT 'The timestamp of when this form was most recently copied into another area',
  `options` text COLLATE utf8mb4_unicode_ci COMMENT 'General field to be used by plugins as a general storage place for their own settings',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_area_method` (`areaid`,`method`),
  KEY `grading_definitions_usermodified_foreign` (`usermodified`),
  KEY `grading_definitions_usercreated_foreign` (`usercreated`),
  CONSTRAINT `grading_definitions_areaid_foreign` FOREIGN KEY (`areaid`) REFERENCES `grading_areas` (`id`),
  CONSTRAINT `grading_definitions_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `grading_definitions_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grading_instances`
--

DROP TABLE IF EXISTS `grading_instances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grading_instances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `definitionid` bigint unsigned NOT NULL COMMENT 'The ID of the form definition this is instance of',
  `raterid` bigint unsigned NOT NULL COMMENT 'The ID of the user who did the assessment',
  `itemid` int DEFAULT NULL COMMENT 'This identifies the graded item within the grabable area',
  `rawgrade` decimal(10,5) DEFAULT NULL COMMENT 'The raw normalized grade 0.00000 - 100.00000 as a result of the most recent assessment',
  `status` int NOT NULL DEFAULT '0' COMMENT 'The status of the assessment. By default the instance is under-assessment state',
  `feedback` text COLLATE utf8mb4_unicode_ci COMMENT 'Overall feedback from the rater for the author of the graded item',
  `feedbackformat` tinyint DEFAULT NULL COMMENT 'The format of the feedback field',
  `timemodified` int NOT NULL COMMENT 'The timestamp of when the assessment was most recently modified',
  PRIMARY KEY (`id`),
  KEY `grading_instances_definitionid_foreign` (`definitionid`),
  KEY `grading_instances_raterid_foreign` (`raterid`),
  CONSTRAINT `grading_instances_definitionid_foreign` FOREIGN KEY (`definitionid`) REFERENCES `grading_definitions` (`id`),
  CONSTRAINT `grading_instances_raterid_foreign` FOREIGN KEY (`raterid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradingform_guide_comments`
--

DROP TABLE IF EXISTS `gradingform_guide_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradingform_guide_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `definitionid` bigint unsigned NOT NULL COMMENT 'The ID of the form definition this faq is part of',
  `sortorder` int NOT NULL COMMENT 'Defines the order of the comments',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The comment description',
  `descriptionformat` tinyint DEFAULT NULL COMMENT 'The format of the description field',
  PRIMARY KEY (`id`),
  KEY `gradingform_guide_comments_definitionid_foreign` (`definitionid`),
  CONSTRAINT `gradingform_guide_comments_definitionid_foreign` FOREIGN KEY (`definitionid`) REFERENCES `grading_definitions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradingform_guide_criteria`
--

DROP TABLE IF EXISTS `gradingform_guide_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradingform_guide_criteria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `definitionid` bigint unsigned NOT NULL COMMENT 'The ID of the form definition this criterion is part of',
  `sortorder` int NOT NULL COMMENT 'Defines the order of the criterion in the guide',
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'shortname of this criterion',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The criterion description for students',
  `descriptionformat` tinyint DEFAULT NULL COMMENT 'The format of the description field',
  `descriptionmarkers` text COLLATE utf8mb4_unicode_ci COMMENT 'Description for Markers',
  `descriptionmarkersformat` tinyint DEFAULT NULL,
  `maxscore` decimal(10,5) NOT NULL COMMENT 'maximum grade that can be assigned using this criterion',
  PRIMARY KEY (`id`),
  KEY `gradingform_guide_criteria_definitionid_foreign` (`definitionid`),
  CONSTRAINT `gradingform_guide_criteria_definitionid_foreign` FOREIGN KEY (`definitionid`) REFERENCES `grading_definitions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradingform_guide_fillings`
--

DROP TABLE IF EXISTS `gradingform_guide_fillings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradingform_guide_fillings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instanceid` bigint unsigned NOT NULL COMMENT 'The ID of the grading form instance',
  `criterionid` bigint unsigned NOT NULL COMMENT 'The ID of the criterion (row) in the guide',
  `remark` text COLLATE utf8mb4_unicode_ci COMMENT 'Side note feedback regarding this particular criterion',
  `remarkformat` tinyint DEFAULT NULL COMMENT 'The format of the remark field',
  `score` decimal(10,5) NOT NULL COMMENT 'The score assigned',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_instance_criterion` (`instanceid`,`criterionid`),
  KEY `gradingform_guide_fillings_criterionid_foreign` (`criterionid`),
  CONSTRAINT `gradingform_guide_fillings_criterionid_foreign` FOREIGN KEY (`criterionid`) REFERENCES `gradingform_guide_criteria` (`id`),
  CONSTRAINT `gradingform_guide_fillings_instanceid_foreign` FOREIGN KEY (`instanceid`) REFERENCES `grading_instances` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradingform_rubric_criteria`
--

DROP TABLE IF EXISTS `gradingform_rubric_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradingform_rubric_criteria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `definitionid` bigint unsigned NOT NULL COMMENT 'The ID of the form definition this criterion is part of',
  `sortorder` int NOT NULL COMMENT 'Defines the order of the criterion in the rubric',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The criterion description',
  `descriptionformat` tinyint DEFAULT NULL COMMENT 'The format of the description field',
  PRIMARY KEY (`id`),
  KEY `gradingform_rubric_criteria_definitionid_foreign` (`definitionid`),
  CONSTRAINT `gradingform_rubric_criteria_definitionid_foreign` FOREIGN KEY (`definitionid`) REFERENCES `grading_definitions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradingform_rubric_fillings`
--

DROP TABLE IF EXISTS `gradingform_rubric_fillings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradingform_rubric_fillings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instanceid` bigint unsigned NOT NULL COMMENT 'The ID of the grading form instance',
  `criterionid` bigint unsigned NOT NULL COMMENT 'The ID of the criterion (row) in the rubric',
  `levelid` int DEFAULT NULL COMMENT 'If a particular level was selected during the assessment, its ID is stored here',
  `remark` text COLLATE utf8mb4_unicode_ci COMMENT 'Side note feedback regarding this particular criterion',
  `remarkformat` tinyint DEFAULT NULL COMMENT 'The format of the remark field',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_instance_criterion` (`instanceid`,`criterionid`),
  KEY `ix_levelid` (`levelid`),
  KEY `gradingform_rubric_fillings_criterionid_foreign` (`criterionid`),
  CONSTRAINT `gradingform_rubric_fillings_criterionid_foreign` FOREIGN KEY (`criterionid`) REFERENCES `gradingform_rubric_criteria` (`id`),
  CONSTRAINT `gradingform_rubric_fillings_instanceid_foreign` FOREIGN KEY (`instanceid`) REFERENCES `grading_instances` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gradingform_rubric_levels`
--

DROP TABLE IF EXISTS `gradingform_rubric_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradingform_rubric_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `criterionid` bigint unsigned NOT NULL COMMENT 'The rubric criterion we are level of',
  `score` decimal(10,5) NOT NULL COMMENT 'The score for this level',
  `definition` text COLLATE utf8mb4_unicode_ci COMMENT 'The optional text describing the level',
  `definitionformat` int DEFAULT NULL COMMENT 'The format of the definition field',
  PRIMARY KEY (`id`),
  KEY `gradingform_rubric_levels_criterionid_foreign` (`criterionid`),
  CONSTRAINT `gradingform_rubric_levels_criterionid_foreign` FOREIGN KEY (`criterionid`) REFERENCES `gradingform_rubric_criteria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `groupings`
--

DROP TABLE IF EXISTS `groupings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groupings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Short human readable unique name for group.',
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `configdata` text COLLATE utf8mb4_unicode_ci COMMENT 'extra configuration data - may be used by group IU tools',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idnumber` (`idnumber`),
  KEY `groupings_courseid_foreign` (`courseid`),
  CONSTRAINT `groupings_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `groupings_groups`
--

DROP TABLE IF EXISTS `groupings_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groupings_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `groupingid` bigint unsigned NOT NULL DEFAULT '0',
  `groupid` bigint unsigned NOT NULL DEFAULT '0',
  `timeadded` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `groupings_groups_groupingid_foreign` (`groupingid`),
  KEY `groupings_groups_groupid_foreign` (`groupid`),
  CONSTRAINT `groupings_groups_groupid_foreign` FOREIGN KEY (`groupid`) REFERENCES `groups` (`id`),
  CONSTRAINT `groupings_groups_groupingid_foreign` FOREIGN KEY (`groupingid`) REFERENCES `groupings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Short human readable unique name for the group.',
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `enrolmentkey` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` int NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Visibility of group membership',
  `participation` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Can this group be selected when participating in activities?',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idnumber` (`idnumber`),
  KEY `groups_courseid_foreign` (`courseid`),
  CONSTRAINT `groups_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `groups_members`
--

DROP TABLE IF EXISTS `groups_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `groupid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `timeadded` int NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Defines the Moodle component which added this group membership (e.g. ''auth_myplugin''), or blank if it was added manually. (Entries which are created by a Moodle component cannot be removed in the normal user interface.)',
  `itemid` int NOT NULL DEFAULT '0' COMMENT 'If the ''component'' field is set, this can be used to define the instance of the component that created the entry. Otherwise should be left as default (0).',
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridgroupid` (`userid`,`groupid`),
  KEY `groups_members_groupid_foreign` (`groupid`),
  CONSTRAINT `groups_members_groupid_foreign` FOREIGN KEY (`groupid`) REFERENCES `groups` (`id`),
  CONSTRAINT `groups_members_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5p`
--

DROP TABLE IF EXISTS `h5p`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5p` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jsoncontent` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The content in json format',
  `mainlibraryid` bigint unsigned NOT NULL COMMENT 'The library we first instanciate for this node',
  `displayoptions` smallint DEFAULT NULL COMMENT 'H5P Button display options',
  `pathnamehash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Defines the complete unique hash for the file path where the H5P content was added.',
  `contenthash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Defines the hash for the file content.',
  `filtered` text COLLATE utf8mb4_unicode_ci COMMENT 'Filtered version of json_content',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pathnamehash_idx` (`pathnamehash`),
  KEY `h5p_mainlibraryid_foreign` (`mainlibraryid`),
  CONSTRAINT `h5p_mainlibraryid_foreign` FOREIGN KEY (`mainlibraryid`) REFERENCES `h5p_libraries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5p_contents_libraries`
--

DROP TABLE IF EXISTS `h5p_contents_libraries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5p_contents_libraries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `h5pid` bigint unsigned NOT NULL COMMENT 'Identifier for the h5p content',
  `libraryid` bigint unsigned NOT NULL COMMENT 'The identifier of a H5P library this content uses',
  `dependencytype` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'dynamic, preloaded or editor',
  `dropcss` tinyint(1) NOT NULL COMMENT '1 if the preloaded css from the dependency is to be excluded',
  `weight` int NOT NULL COMMENT 'Determines the order in which the preloaded libraries will be loaded',
  PRIMARY KEY (`id`),
  KEY `h5p_contents_libraries_h5pid_foreign` (`h5pid`),
  KEY `h5p_contents_libraries_libraryid_foreign` (`libraryid`),
  CONSTRAINT `h5p_contents_libraries_h5pid_foreign` FOREIGN KEY (`h5pid`) REFERENCES `h5p` (`id`),
  CONSTRAINT `h5p_contents_libraries_libraryid_foreign` FOREIGN KEY (`libraryid`) REFERENCES `h5p_libraries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5p_libraries`
--

DROP TABLE IF EXISTS `h5p_libraries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5p_libraries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machinename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The library machine name',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The human readable name of this library',
  `majorversion` smallint NOT NULL,
  `minorversion` smallint NOT NULL,
  `patchversion` smallint NOT NULL,
  `runnable` tinyint(1) NOT NULL COMMENT 'Can this library be started by the module? i.e. not a dependency.',
  `fullscreen` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Display fullscreen button',
  `embedtypes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'List of supported embed types',
  `preloadedjs` text COLLATE utf8mb4_unicode_ci COMMENT 'Comma separated list of scripts to load.',
  `preloadedcss` text COLLATE utf8mb4_unicode_ci COMMENT 'Comma separated list of stylesheets to load.',
  `droplibrarycss` text COLLATE utf8mb4_unicode_ci COMMENT 'List of libraries that should not have CSS included if this library is used. Comma separated list.',
  `semantics` text COLLATE utf8mb4_unicode_ci COMMENT 'The semantics definition in json format',
  `addto` text COLLATE utf8mb4_unicode_ci COMMENT 'Plugin configuration data',
  `coremajor` smallint DEFAULT NULL COMMENT 'H5P core API major version required',
  `coreminor` smallint DEFAULT NULL COMMENT 'H5P core API minor version required',
  `metadatasettings` text COLLATE utf8mb4_unicode_ci COMMENT 'Library metadata settings',
  `tutorial` text COLLATE utf8mb4_unicode_ci COMMENT 'Tutorial URL',
  `example` text COLLATE utf8mb4_unicode_ci COMMENT 'Example URL',
  `enabled` tinyint(1) DEFAULT '1' COMMENT 'Defines if this library is enabled (1) or not (0)',
  PRIMARY KEY (`id`),
  KEY `machinemajorminorpatch` (`machinename`,`majorversion`,`minorversion`,`patchversion`,`runnable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5p_libraries_cachedassets`
--

DROP TABLE IF EXISTS `h5p_libraries_cachedassets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5p_libraries_cachedassets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libraryid` bigint unsigned NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cache hash key that this library is part of.',
  PRIMARY KEY (`id`),
  KEY `h5p_libraries_cachedassets_libraryid_foreign` (`libraryid`),
  CONSTRAINT `h5p_libraries_cachedassets_libraryid_foreign` FOREIGN KEY (`libraryid`) REFERENCES `h5p_libraries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5p_library_dependencies`
--

DROP TABLE IF EXISTS `h5p_library_dependencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5p_library_dependencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libraryid` bigint unsigned NOT NULL COMMENT 'The id of a H5P library.',
  `requiredlibraryid` bigint unsigned NOT NULL COMMENT 'The dependent library to load',
  `dependencytype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'preloaded, dynamic, or editor',
  PRIMARY KEY (`id`),
  KEY `h5p_library_dependencies_libraryid_foreign` (`libraryid`),
  KEY `h5p_library_dependencies_requiredlibraryid_foreign` (`requiredlibraryid`),
  CONSTRAINT `h5p_library_dependencies_libraryid_foreign` FOREIGN KEY (`libraryid`) REFERENCES `h5p_libraries` (`id`),
  CONSTRAINT `h5p_library_dependencies_requiredlibraryid_foreign` FOREIGN KEY (`requiredlibraryid`) REFERENCES `h5p_libraries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5pactivity`
--

DROP TABLE IF EXISTS `h5pactivity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5pactivity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint unsigned NOT NULL COMMENT 'ID of the course this activity is part of.',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the activity module instance',
  `timecreated` int NOT NULL COMMENT 'Timestamp of when the instance was added to the course.',
  `timemodified` int NOT NULL COMMENT 'Timestamp of when the instance was last modified.',
  `intro` text COLLATE utf8mb4_unicode_ci COMMENT 'Activity description.',
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format of the intro field.',
  `grade` int DEFAULT '0',
  `displayoptions` smallint NOT NULL DEFAULT '0' COMMENT 'H5P Button display options',
  `enabletracking` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Enable xAPI tracking',
  `grademethod` smallint NOT NULL DEFAULT '1' COMMENT 'Which H5P attempt is used for grading',
  `reviewmode` smallint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `h5pactivity_course_foreign` (`course`),
  CONSTRAINT `h5pactivity_course_foreign` FOREIGN KEY (`course`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5pactivity_attempts`
--

DROP TABLE IF EXISTS `h5pactivity_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5pactivity_attempts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `h5pactivityid` bigint unsigned NOT NULL COMMENT 'H5P activity ID',
  `userid` bigint NOT NULL COMMENT 'Attempt user ID',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `attempt` int NOT NULL DEFAULT '1' COMMENT 'Attempt number',
  `rawscore` int DEFAULT '0',
  `maxscore` int DEFAULT '0',
  `scaled` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'Number 0..1 that reflects the performance of the learner',
  `duration` int DEFAULT '0' COMMENT 'Number of second inverted in that attempt (provided by the statement)',
  `completion` tinyint(1) DEFAULT NULL COMMENT 'Store the xAPI tracking completion result.',
  `success` tinyint(1) DEFAULT NULL COMMENT 'Store the xAPI tracking success result.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_activityuserattempt` (`h5pactivityid`,`userid`,`attempt`),
  KEY `timecreated` (`timecreated`),
  KEY `h5pactivityid-timecreated` (`h5pactivityid`,`timecreated`),
  KEY `h5pactivityid-userid` (`h5pactivityid`,`userid`),
  CONSTRAINT `h5pactivity_attempts_h5pactivityid_foreign` FOREIGN KEY (`h5pactivityid`) REFERENCES `h5pactivity` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `h5pactivity_attempts_results`
--

DROP TABLE IF EXISTS `h5pactivity_attempts_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h5pactivity_attempts_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `attemptid` bigint unsigned NOT NULL COMMENT 'h5pactivity_attempts ID',
  `subcontent` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timecreated` int NOT NULL,
  `interactiontype` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `correctpattern` text COLLATE utf8mb4_unicode_ci COMMENT 'Correct Pattern in xAPI format',
  `response` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'User response data in xAPI format',
  `additionals` text COLLATE utf8mb4_unicode_ci COMMENT 'Extra subcontent information in JSON format',
  `rawscore` int NOT NULL DEFAULT '0',
  `maxscore` int NOT NULL DEFAULT '0',
  `duration` int DEFAULT '0' COMMENT 'Seconds inverted in this result (exctracted directly from statement)',
  `completion` tinyint(1) DEFAULT NULL COMMENT 'Store the xAPI tracking completion result.',
  `success` tinyint(1) DEFAULT NULL COMMENT 'Store the xAPI tracking success result.',
  PRIMARY KEY (`id`),
  KEY `attemptid-timecreated` (`attemptid`,`timecreated`),
  CONSTRAINT `h5pactivity_attempts_results_attemptid_foreign` FOREIGN KEY (`attemptid`) REFERENCES `h5pactivity_attempts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `imscp`
--

DROP TABLE IF EXISTS `imscp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imscp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `revision` int NOT NULL DEFAULT '0' COMMENT 'incremented when after each file changes, solves browser caching issues',
  `keepold` int NOT NULL DEFAULT '-1' COMMENT 'incremented when after each file changes, solves browser caching issues',
  `structure` text COLLATE utf8mb4_unicode_ci,
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `infected_files`
--

DROP TABLE IF EXISTS `infected_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infected_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Original file name',
  `quarantinedfile` text COLLATE utf8mb4_unicode_ci COMMENT 'Quarantine zip file',
  `userid` bigint unsigned NOT NULL COMMENT 'The user that uploaded the infected file.',
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The reason for the antivirus failure',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'The time the infected file was uploaded.',
  PRIMARY KEY (`id`),
  KEY `infected_files_userid_foreign` (`userid`),
  CONSTRAINT `infected_files_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `label`
--

DROP TABLE IF EXISTS `label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `label` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `practice` tinyint NOT NULL DEFAULT '0',
  `modattempts` tinyint NOT NULL DEFAULT '0',
  `usepassword` tinyint NOT NULL DEFAULT '0',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dependency` int NOT NULL DEFAULT '0',
  `conditions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` int NOT NULL DEFAULT '0',
  `custom` tinyint NOT NULL DEFAULT '0',
  `ongoing` tinyint NOT NULL DEFAULT '0',
  `usemaxgrade` tinyint NOT NULL DEFAULT '0',
  `maxanswers` tinyint NOT NULL DEFAULT '4',
  `maxattempts` tinyint NOT NULL DEFAULT '5',
  `review` tinyint NOT NULL DEFAULT '0',
  `nextpagedefault` tinyint NOT NULL DEFAULT '0',
  `feedback` tinyint NOT NULL DEFAULT '1',
  `minquestions` tinyint NOT NULL DEFAULT '0',
  `maxpages` tinyint NOT NULL DEFAULT '0',
  `timelimit` int NOT NULL DEFAULT '0',
  `retake` tinyint NOT NULL DEFAULT '1',
  `activitylink` int NOT NULL DEFAULT '0',
  `mediafile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Local file path or full external URL',
  `mediaheight` int NOT NULL DEFAULT '100',
  `mediawidth` int NOT NULL DEFAULT '650',
  `mediaclose` tinyint NOT NULL DEFAULT '0',
  `slideshow` tinyint NOT NULL DEFAULT '0',
  `width` int NOT NULL DEFAULT '640',
  `height` int NOT NULL DEFAULT '480',
  `bgcolor` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `displayleft` tinyint NOT NULL DEFAULT '0',
  `displayleftif` tinyint NOT NULL DEFAULT '0',
  `progressbar` tinyint NOT NULL DEFAULT '0',
  `available` int NOT NULL DEFAULT '0',
  `deadline` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `completionendreached` tinyint(1) DEFAULT '0',
  `completiontimespent` bigint DEFAULT '0',
  `allowofflineattempts` tinyint(1) DEFAULT '0' COMMENT 'Whether to allow the lesson to be attempted offline in the mobile app',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_answers`
--

DROP TABLE IF EXISTS `lesson_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0',
  `pageid` bigint unsigned NOT NULL DEFAULT '0',
  `jumpto` bigint NOT NULL DEFAULT '0',
  `grade` smallint NOT NULL DEFAULT '0',
  `score` int NOT NULL DEFAULT '0',
  `flags` tinyint NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `answer` text COLLATE utf8mb4_unicode_ci,
  `answerformat` tinyint NOT NULL DEFAULT '0',
  `response` text COLLATE utf8mb4_unicode_ci,
  `responseformat` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `lesson_answers_lessonid_foreign` (`lessonid`),
  KEY `lesson_answers_pageid_foreign` (`pageid`),
  CONSTRAINT `lesson_answers_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`),
  CONSTRAINT `lesson_answers_pageid_foreign` FOREIGN KEY (`pageid`) REFERENCES `lesson_pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_attempts`
--

DROP TABLE IF EXISTS `lesson_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_attempts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0',
  `pageid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `answerid` bigint unsigned NOT NULL DEFAULT '0',
  `retry` tinyint NOT NULL DEFAULT '0',
  `correct` int NOT NULL DEFAULT '0',
  `useranswer` text COLLATE utf8mb4_unicode_ci,
  `timeseen` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `lesson_attempts_lessonid_foreign` (`lessonid`),
  KEY `lesson_attempts_pageid_foreign` (`pageid`),
  KEY `lesson_attempts_answerid_foreign` (`answerid`),
  CONSTRAINT `lesson_attempts_answerid_foreign` FOREIGN KEY (`answerid`) REFERENCES `lesson_answers` (`id`),
  CONSTRAINT `lesson_attempts_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`),
  CONSTRAINT `lesson_attempts_pageid_foreign` FOREIGN KEY (`pageid`) REFERENCES `lesson_pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_branch`
--

DROP TABLE IF EXISTS `lesson_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_branch` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `pageid` bigint unsigned NOT NULL DEFAULT '0',
  `retry` int NOT NULL DEFAULT '0',
  `flag` tinyint NOT NULL DEFAULT '0',
  `timeseen` int NOT NULL DEFAULT '0',
  `nextpageid` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `lesson_branch_lessonid_foreign` (`lessonid`),
  KEY `lesson_branch_pageid_foreign` (`pageid`),
  CONSTRAINT `lesson_branch_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`),
  CONSTRAINT `lesson_branch_pageid_foreign` FOREIGN KEY (`pageid`) REFERENCES `lesson_pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_grades`
--

DROP TABLE IF EXISTS `lesson_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late` tinyint NOT NULL DEFAULT '0',
  `completed` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `lesson_grades_lessonid_foreign` (`lessonid`),
  CONSTRAINT `lesson_grades_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_overrides`
--

DROP TABLE IF EXISTS `lesson_overrides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_overrides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references lesson.id',
  `groupid` bigint unsigned DEFAULT NULL COMMENT 'Foreign key references groups.id.  Can be null if this is a per-user override.',
  `userid` bigint unsigned DEFAULT NULL COMMENT 'Foreign key references user.id.  Can be null if this is a per-group override.',
  `available` int DEFAULT NULL COMMENT 'Time at which students may start attempting this lesson. Can be null, in which case the lesson default is used.',
  `deadline` int DEFAULT NULL COMMENT 'Time by which students must have completed their attempt.  Can be null, in which case the lesson default is used.',
  `timelimit` int DEFAULT NULL COMMENT 'Time limit in seconds.  Can be null, in which case the lesson default is used.',
  `review` tinyint DEFAULT NULL,
  `maxattempts` tinyint DEFAULT NULL,
  `retake` tinyint DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Lesson password.  Can be null, in which case the lesson default is used.',
  PRIMARY KEY (`id`),
  KEY `lesson_overrides_lessonid_foreign` (`lessonid`),
  KEY `lesson_overrides_groupid_foreign` (`groupid`),
  KEY `lesson_overrides_userid_foreign` (`userid`),
  CONSTRAINT `lesson_overrides_groupid_foreign` FOREIGN KEY (`groupid`) REFERENCES `groups` (`id`),
  CONSTRAINT `lesson_overrides_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`),
  CONSTRAINT `lesson_overrides_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_pages`
--

DROP TABLE IF EXISTS `lesson_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0',
  `prevpageid` int NOT NULL DEFAULT '0',
  `nextpageid` int NOT NULL DEFAULT '0',
  `qtype` tinyint NOT NULL DEFAULT '0',
  `qoption` tinyint NOT NULL DEFAULT '0',
  `layout` tinyint NOT NULL DEFAULT '1',
  `display` tinyint NOT NULL DEFAULT '1',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentsformat` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `lesson_pages_lessonid_foreign` (`lessonid`),
  CONSTRAINT `lesson_pages_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_timer`
--

DROP TABLE IF EXISTS `lesson_timer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_timer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `starttime` int NOT NULL DEFAULT '0',
  `lessontime` int NOT NULL DEFAULT '0',
  `completed` tinyint(1) DEFAULT '0',
  `timemodifiedoffline` int NOT NULL DEFAULT '0' COMMENT 'Last modified time via web services (mobile app).',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `lesson_timer_lessonid_foreign` (`lessonid`),
  CONSTRAINT `lesson_timer_lessonid_foreign` FOREIGN KEY (`lessonid`) REFERENCES `lesson` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `license`
--

DROP TABLE IF EXISTS `license`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `license` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` text COLLATE utf8mb4_unicode_ci,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `version` int NOT NULL DEFAULT '0',
  `custom` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this flag is set, license is custom and can be updated or deleted, otherwise license is a core license and cannot be edited.',
  `sortorder` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lock_db`
--

DROP TABLE IF EXISTS `lock_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lock_db` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `resourcekey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'String identifying the resource to be locked. Should use frankenstyle format.',
  `expires` int DEFAULT NULL COMMENT 'Expiry time for an active lock.',
  `owner` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'uuid indicating the owner of the lock.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `resourcekey_uniq` (`resourcekey`),
  KEY `expires_idx` (`expires`),
  KEY `owner_idx` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `time` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` int NOT NULL DEFAULT '0',
  `module` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmid` int NOT NULL DEFAULT '0',
  `action` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course-module-action` (`course`,`module`,`action`),
  KEY `time` (`time`),
  KEY `action` (`action`),
  KEY `userid-course` (`userid`,`course`),
  KEY `cmid` (`cmid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log_display`
--

DROP TABLE IF EXISTS `log_display`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_display` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtable` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'owner of the log action',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module-action` (`module`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log_queries`
--

DROP TABLE IF EXISTS `log_queries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_queries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `qtype` smallint NOT NULL COMMENT 'query type constant',
  `sqltext` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'query sql',
  `sqlparams` text COLLATE utf8mb4_unicode_ci COMMENT 'query parameters',
  `error` smallint NOT NULL DEFAULT '0' COMMENT 'is error',
  `info` text COLLATE utf8mb4_unicode_ci COMMENT 'detailed info such as error text',
  `backtrace` text COLLATE utf8mb4_unicode_ci COMMENT 'php execution trace',
  `exectime` decimal(10,5) NOT NULL COMMENT 'query execution time in seconds as float',
  `timelogged` int NOT NULL COMMENT 'timestamp when log info stored into db',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `logstore_standard_log`
--

DROP TABLE IF EXISTS `logstore_standard_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logstore_standard_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `eventname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objecttable` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objectid` int DEFAULT NULL,
  `crud` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edulevel` tinyint(1) NOT NULL,
  `contextid` bigint unsigned NOT NULL,
  `contextlevel` int NOT NULL,
  `contextinstanceid` int NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `courseid` bigint unsigned DEFAULT NULL,
  `relateduserid` bigint unsigned DEFAULT NULL,
  `anonymous` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Was this event anonymous at the time of triggering?',
  `other` text COLLATE utf8mb4_unicode_ci,
  `timecreated` int NOT NULL,
  `origin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cli, cron, ws, etc.',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'IP address',
  `realuserid` bigint unsigned DEFAULT NULL COMMENT 'real user id when logged-in-as',
  PRIMARY KEY (`id`),
  KEY `timecreated` (`timecreated`),
  KEY `course-time` (`courseid`,`anonymous`,`timecreated`),
  KEY `user-module` (`userid`,`contextlevel`,`contextinstanceid`,`crud`,`edulevel`,`timecreated`),
  KEY `logstore_standard_log_contextid_foreign` (`contextid`),
  KEY `logstore_standard_log_realuserid_foreign` (`realuserid`),
  KEY `logstore_standard_log_relateduserid_foreign` (`relateduserid`),
  CONSTRAINT `logstore_standard_log_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `logstore_standard_log_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `logstore_standard_log_realuserid_foreign` FOREIGN KEY (`realuserid`) REFERENCES `users` (`id`),
  CONSTRAINT `logstore_standard_log_relateduserid_foreign` FOREIGN KEY (`relateduserid`) REFERENCES `users` (`id`),
  CONSTRAINT `logstore_standard_log_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti`
--

DROP TABLE IF EXISTS `lti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0' COMMENT 'Course basiclti activity belongs to',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name field for moodle instances',
  `intro` text COLLATE utf8mb4_unicode_ci COMMENT 'General introduction of the basiclti activity',
  `introformat` smallint DEFAULT '0' COMMENT 'Format of the intro field (MOODLE, HTML, MARKDOWN...)',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `typeid` int DEFAULT NULL COMMENT 'Basic LTI type',
  `toolurl` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Remote tool url',
  `securetoolurl` text COLLATE utf8mb4_unicode_ci,
  `instructorchoicesendname` tinyint(1) DEFAULT NULL COMMENT 'Send user''s name',
  `instructorchoicesendemailaddr` tinyint(1) DEFAULT NULL COMMENT 'Send user''s email',
  `instructorchoiceallowroster` tinyint(1) DEFAULT NULL COMMENT 'Allow the roster to be retrieved',
  `instructorchoiceallowsetting` tinyint(1) DEFAULT NULL COMMENT 'Allow a tool to store a setting',
  `instructorcustomparameters` text COLLATE utf8mb4_unicode_ci COMMENT 'Additional custom parameters provided by the instructor',
  `instructorchoiceacceptgrades` tinyint(1) DEFAULT NULL COMMENT 'Accept grades from tool',
  `grade` int NOT NULL DEFAULT '100' COMMENT 'Grade scale',
  `launchcontainer` tinyint NOT NULL DEFAULT '1' COMMENT 'Launch external tool in a pop-up',
  `resourcekey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debuglaunch` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Enable the debug-style launch which pauses before auto-submit',
  `showtitlelaunch` tinyint(1) NOT NULL DEFAULT '0',
  `showdescriptionlaunch` tinyint(1) NOT NULL DEFAULT '0',
  `servicesalt` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `secureicon` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_access_tokens`
--

DROP TABLE IF EXISTS `lti_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `typeid` bigint unsigned NOT NULL COMMENT 'Basic LTI type id',
  `scope` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Scope values as JSON array',
  `token` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'security token, aka private access key',
  `validuntil` int NOT NULL COMMENT 'timestamp - valid until data',
  `timecreated` int NOT NULL COMMENT 'created timestamp',
  `lastaccess` int DEFAULT NULL COMMENT 'last access timestamp',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `lti_access_tokens_typeid_foreign` (`typeid`),
  CONSTRAINT `lti_access_tokens_typeid_foreign` FOREIGN KEY (`typeid`) REFERENCES `lti_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_coursevisible`
--

DROP TABLE IF EXISTS `lti_coursevisible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_coursevisible` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int NOT NULL,
  `courseid` int NOT NULL COMMENT 'Course ID',
  `coursevisible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_submission`
--

DROP TABLE IF EXISTS `lti_submission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_submission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ltiid` int NOT NULL COMMENT 'ID of the LTI tool instance',
  `userid` int NOT NULL,
  `datesubmitted` int NOT NULL,
  `dateupdated` int NOT NULL,
  `gradepercent` decimal(10,5) NOT NULL,
  `originalgrade` decimal(10,5) NOT NULL,
  `launchid` int NOT NULL,
  `state` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ltiid` (`ltiid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_tool_proxies`
--

DROP TABLE IF EXISTS `lti_tool_proxies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_tool_proxies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tool Provider' COMMENT 'Tool Provider name',
  `regurl` text COLLATE utf8mb4_unicode_ci,
  `state` tinyint NOT NULL DEFAULT '1' COMMENT 'Configured = 1, Pending = 2, Accepted = 3, Rejected = 4, Cancelled = 5',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capabilityoffered` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'List of capabilities offered, one per line',
  `serviceoffered` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'List of services offered, one per line',
  `toolproxy` text COLLATE utf8mb4_unicode_ci COMMENT 'JSON string representing tool proxy returned by tool provider',
  `createdby` int NOT NULL COMMENT 'ID of user which initiated the registration process',
  `timecreated` int NOT NULL COMMENT 'Date/time at which the record was created',
  `timemodified` int NOT NULL COMMENT 'Date/time at which the record was last modified',
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid` (`guid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_tool_settings`
--

DROP TABLE IF EXISTS `lti_tool_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_tool_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `toolproxyid` bigint unsigned NOT NULL COMMENT 'Primary key of related tool proxy',
  `typeid` bigint unsigned DEFAULT NULL,
  `course` bigint unsigned DEFAULT NULL COMMENT 'Primary key of course (null for system-wide settings)',
  `coursemoduleid` bigint unsigned DEFAULT NULL COMMENT 'Primary key of course module - tool link added to course (null for system-wide and context-wide settings)',
  `settings` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Setting values as JSON',
  `timecreated` int NOT NULL COMMENT 'Date/time at which the record was created',
  `timemodified` int NOT NULL COMMENT 'Date/time at which the record was last modified',
  PRIMARY KEY (`id`),
  KEY `lti_tool_settings_toolproxyid_foreign` (`toolproxyid`),
  KEY `lti_tool_settings_typeid_foreign` (`typeid`),
  KEY `lti_tool_settings_course_foreign` (`course`),
  KEY `lti_tool_settings_coursemoduleid_foreign` (`coursemoduleid`),
  CONSTRAINT `lti_tool_settings_course_foreign` FOREIGN KEY (`course`) REFERENCES `course` (`id`),
  CONSTRAINT `lti_tool_settings_coursemoduleid_foreign` FOREIGN KEY (`coursemoduleid`) REFERENCES `lti` (`id`),
  CONSTRAINT `lti_tool_settings_toolproxyid_foreign` FOREIGN KEY (`toolproxyid`) REFERENCES `lti_tool_proxies` (`id`),
  CONSTRAINT `lti_tool_settings_typeid_foreign` FOREIGN KEY (`typeid`) REFERENCES `lti_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_types`
--

DROP TABLE IF EXISTS `lti_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'basiclti Activity' COMMENT 'Activity name',
  `baseurl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tooldomain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint NOT NULL DEFAULT '2' COMMENT 'Active = 1, Pending = 2, Rejected = 3',
  `course` int NOT NULL,
  `coursevisible` tinyint(1) NOT NULL DEFAULT '0',
  `ltiversion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clientid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toolproxyid` int DEFAULT NULL COMMENT 'Primary key of related tool proxy (null for LTI 1 tools)',
  `enabledcapability` text COLLATE utf8mb4_unicode_ci COMMENT 'Enabled capabilities, one per line (null for LTI 1 tools)',
  `parameter` text COLLATE utf8mb4_unicode_ci COMMENT 'Launch parameters, one per line (null for LTI 1 tools)',
  `icon` text COLLATE utf8mb4_unicode_ci COMMENT 'URL to icon file',
  `secureicon` text COLLATE utf8mb4_unicode_ci COMMENT 'Secure URL to icon file',
  `createdby` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'A description of what this LTI module is.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientid` (`clientid`),
  KEY `course` (`course`),
  KEY `tooldomain` (`tooldomain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_types_categories`
--

DROP TABLE IF EXISTS `lti_types_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_types_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `typeid` bigint unsigned NOT NULL,
  `categoryid` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lti_types_categories_typeid_foreign` (`typeid`),
  KEY `lti_types_categories_categoryid_foreign` (`categoryid`),
  CONSTRAINT `lti_types_categories_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `course_categories` (`id`),
  CONSTRAINT `lti_types_categories_typeid_foreign` FOREIGN KEY (`typeid`) REFERENCES `lti_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lti_types_config`
--

DROP TABLE IF EXISTS `lti_types_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lti_types_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int NOT NULL COMMENT 'Basic LTI type id',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Basic LTI param',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Param value',
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ltiservice_gradebookservices`
--

DROP TABLE IF EXISTS `ltiservice_gradebookservices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ltiservice_gradebookservices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gradeitemid` bigint unsigned NOT NULL COMMENT 'ID of the gradeItem related.',
  `courseid` int NOT NULL COMMENT 'ID of the course related.',
  `toolproxyid` int DEFAULT NULL COMMENT 'ID of the Tool Proxy instance.',
  `typeid` int DEFAULT NULL COMMENT 'ID of the LTI Type if not Proxy.',
  `baseurl` text COLLATE utf8mb4_unicode_ci COMMENT 'Lineitem URL that will be returned to the Tool provider',
  `ltilinkid` bigint unsigned DEFAULT NULL COMMENT 'ID of the LTI element related with this lineitem.',
  `resourceid` text COLLATE utf8mb4_unicode_ci COMMENT 'Resource id for the line item',
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tag type specified for the line item',
  `subreviewurl` text COLLATE utf8mb4_unicode_ci COMMENT 'Submission review URL',
  `subreviewparams` text COLLATE utf8mb4_unicode_ci COMMENT 'Submission review custom params',
  PRIMARY KEY (`id`),
  KEY `ltiservice_gradebookservices_ltilinkid_foreign` (`ltilinkid`),
  KEY `ltiservice_gradebookservices_gradeitemid_foreign` (`gradeitemid`),
  CONSTRAINT `ltiservice_gradebookservices_gradeitemid_foreign` FOREIGN KEY (`gradeitemid`) REFERENCES `grade_items` (`id`),
  CONSTRAINT `ltiservice_gradebookservices_ltilinkid_foreign` FOREIGN KEY (`ltilinkid`) REFERENCES `lti` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `matrix_room`
--

DROP TABLE IF EXISTS `matrix_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matrix_room` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `commid` bigint unsigned NOT NULL COMMENT 'ID of the communication record',
  `roomid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ID of the matrix room instance',
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Topic of the matrix room instance.',
  PRIMARY KEY (`id`),
  KEY `matrix_room_commid_foreign` (`commid`),
  CONSTRAINT `matrix_room_commid_foreign` FOREIGN KEY (`commid`) REFERENCES `communication` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `useridfrom` int NOT NULL DEFAULT '0',
  `useridto` int NOT NULL DEFAULT '0',
  `subject` text COLLATE utf8mb4_unicode_ci COMMENT 'The message subject',
  `fullmessage` text COLLATE utf8mb4_unicode_ci,
  `fullmessageformat` smallint DEFAULT '0' COMMENT 'The format of the full message',
  `fullmessagehtml` text COLLATE utf8mb4_unicode_ci COMMENT 'html format of message',
  `smallmessage` text COLLATE utf8mb4_unicode_ci COMMENT 'Smal version of message (eg sms)',
  `notification` tinyint(1) DEFAULT '0',
  `contexturl` text COLLATE utf8mb4_unicode_ci COMMENT 'If this message is a notification of an event contexturl should contain a link to view this event. For example if its a notification of a forum post contexturl should contain a link to the forum post.',
  `contexturlname` text COLLATE utf8mb4_unicode_ci COMMENT 'Display text for the contexturl',
  `timecreated` int NOT NULL DEFAULT '0',
  `timeuserfromdeleted` int NOT NULL DEFAULT '0',
  `timeusertodeleted` int NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventtype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customdata` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom data to be passed to the message processor. Must be serialisable using json_encode()',
  PRIMARY KEY (`id`),
  KEY `useridfromtodeleted` (`useridfrom`,`useridto`,`timeuserfromdeleted`,`timeusertodeleted`),
  KEY `useridfrom_timeuserfromdeleted_notification` (`useridfrom`,`timeuserfromdeleted`,`notification`),
  KEY `useridto_timeusertodeleted_notification` (`useridto`,`timeusertodeleted`,`notification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_airnotifier_devices`
--

DROP TABLE IF EXISTS `message_airnotifier_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_airnotifier_devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userdeviceid` int NOT NULL COMMENT 'The user device id in the user_devices table',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'The user can enable/disable his devices',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userdeviceid` (`userdeviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_contact_requests`
--

DROP TABLE IF EXISTS `message_contact_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_contact_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `requesteduserid` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-requesteduserid` (`userid`,`requesteduserid`),
  KEY `message_contact_requests_requesteduserid_foreign` (`requesteduserid`),
  CONSTRAINT `message_contact_requests_requesteduserid_foreign` FOREIGN KEY (`requesteduserid`) REFERENCES `users` (`id`),
  CONSTRAINT `message_contact_requests_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_contacts`
--

DROP TABLE IF EXISTS `message_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `contactid` bigint unsigned NOT NULL,
  `timecreated` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-contactid` (`userid`,`contactid`),
  KEY `message_contacts_contactid_foreign` (`contactid`),
  CONSTRAINT `message_contacts_contactid_foreign` FOREIGN KEY (`contactid`) REFERENCES `users` (`id`),
  CONSTRAINT `message_contacts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_conversation_actions`
--

DROP TABLE IF EXISTS `message_conversation_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_conversation_actions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `conversationid` bigint unsigned NOT NULL,
  `action` int NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_conversation_actions_userid_foreign` (`userid`),
  KEY `message_conversation_actions_conversationid_foreign` (`conversationid`),
  CONSTRAINT `message_conversation_actions_conversationid_foreign` FOREIGN KEY (`conversationid`) REFERENCES `message_conversations` (`id`),
  CONSTRAINT `message_conversation_actions_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_conversation_members`
--

DROP TABLE IF EXISTS `message_conversation_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_conversation_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conversationid` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_conversation_members_conversationid_foreign` (`conversationid`),
  KEY `message_conversation_members_userid_foreign` (`userid`),
  CONSTRAINT `message_conversation_members_conversationid_foreign` FOREIGN KEY (`conversationid`) REFERENCES `message_conversations` (`id`),
  CONSTRAINT `message_conversation_members_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_conversations`
--

DROP TABLE IF EXISTS `message_conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_conversations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convhash` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Defines the Moodle component which the area was added to',
  `itemtype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemid` int DEFAULT NULL,
  `contextid` bigint unsigned DEFAULT NULL COMMENT 'The context id of the itemid or course of the itemtype was added',
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `convhash` (`convhash`),
  KEY `component-itemtype-itemid-contextid` (`component`,`itemtype`,`itemid`,`contextid`),
  KEY `message_conversations_contextid_foreign` (`contextid`),
  CONSTRAINT `message_conversations_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_email_messages`
--

DROP TABLE IF EXISTS `message_email_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_email_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `useridto` bigint unsigned NOT NULL,
  `conversationid` bigint unsigned NOT NULL,
  `messageid` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_email_messages_useridto_foreign` (`useridto`),
  KEY `message_email_messages_conversationid_foreign` (`conversationid`),
  KEY `message_email_messages_messageid_foreign` (`messageid`),
  CONSTRAINT `message_email_messages_conversationid_foreign` FOREIGN KEY (`conversationid`) REFERENCES `message_conversations` (`id`),
  CONSTRAINT `message_email_messages_messageid_foreign` FOREIGN KEY (`messageid`) REFERENCES `messages` (`id`),
  CONSTRAINT `message_email_messages_useridto_foreign` FOREIGN KEY (`useridto`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_popup`
--

DROP TABLE IF EXISTS `message_popup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_popup` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `messageid` int NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `messageid-isread` (`messageid`,`isread`),
  KEY `isread` (`isread`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_popup_notifications`
--

DROP TABLE IF EXISTS `message_popup_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_popup_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `notificationid` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_popup_notifications_notificationid_foreign` (`notificationid`),
  CONSTRAINT `message_popup_notifications_notificationid_foreign` FOREIGN KEY (`notificationid`) REFERENCES `notifications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_processors`
--

DROP TABLE IF EXISTS `message_processors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_processors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(166) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the message processor',
  `enabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Defines if processor is enabled',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_providers`
--

DROP TABLE IF EXISTS `message_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_providers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The full name of the message provider in standard form',
  `component` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the component that produces these messages',
  `capability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Optional: permission that is required on the user''s setting screen to see this message provider.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `componentname` (`component`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_read`
--

DROP TABLE IF EXISTS `message_read`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_read` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `useridfrom` int NOT NULL DEFAULT '0',
  `useridto` int NOT NULL DEFAULT '0',
  `subject` text COLLATE utf8mb4_unicode_ci COMMENT 'The message subject',
  `fullmessage` text COLLATE utf8mb4_unicode_ci,
  `fullmessageformat` smallint DEFAULT '0' COMMENT 'The format of the full message',
  `fullmessagehtml` text COLLATE utf8mb4_unicode_ci COMMENT 'html format of message',
  `smallmessage` text COLLATE utf8mb4_unicode_ci COMMENT 'Smal version of message (eg sms)',
  `notification` tinyint(1) DEFAULT '0',
  `contexturl` text COLLATE utf8mb4_unicode_ci COMMENT 'If this message is a notification of an event contexturl should contain a link to view this event. For example if its a notification of a forum post contexturl should contain a link to the forum post.',
  `contexturlname` text COLLATE utf8mb4_unicode_ci COMMENT 'Display text for the contexturl',
  `timecreated` int NOT NULL DEFAULT '0',
  `timeread` int NOT NULL DEFAULT '0',
  `timeuserfromdeleted` int NOT NULL DEFAULT '0',
  `timeusertodeleted` int NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventtype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `useridfromtodeleted` (`useridfrom`,`useridto`,`timeuserfromdeleted`,`timeusertodeleted`),
  KEY `notificationtimeread` (`notification`,`timeread`),
  KEY `useridfrom_timeuserfromdeleted_notification` (`useridfrom`,`timeuserfromdeleted`,`notification`),
  KEY `useridto_timeusertodeleted_notification` (`useridto`,`timeusertodeleted`,`notification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_user_actions`
--

DROP TABLE IF EXISTS `message_user_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_user_actions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `messageid` bigint unsigned NOT NULL,
  `action` int NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid_messageid_action` (`userid`,`messageid`,`action`),
  KEY `message_user_actions_messageid_foreign` (`messageid`),
  CONSTRAINT `message_user_actions_messageid_foreign` FOREIGN KEY (`messageid`) REFERENCES `messages` (`id`),
  CONSTRAINT `message_user_actions_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message_users_blocked`
--

DROP TABLE IF EXISTS `message_users_blocked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_users_blocked` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `blockeduserid` bigint unsigned NOT NULL,
  `timecreated` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-blockeduserid` (`userid`,`blockeduserid`),
  KEY `message_users_blocked_blockeduserid_foreign` (`blockeduserid`),
  CONSTRAINT `message_users_blocked_blockeduserid_foreign` FOREIGN KEY (`blockeduserid`) REFERENCES `users` (`id`),
  CONSTRAINT `message_users_blocked_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messageinbound_datakeys`
--

DROP TABLE IF EXISTS `messageinbound_datakeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messageinbound_datakeys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `handler` bigint unsigned NOT NULL COMMENT 'The handler that this key belongs to.',
  `datavalue` int NOT NULL COMMENT 'The integer value of the data item that this key belongs to.',
  `datakey` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The secret key for this data item.',
  `timecreated` int NOT NULL COMMENT 'The time that the data key was created.',
  `expires` int DEFAULT NULL COMMENT 'The expiry time of this key.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `handler_datavalue` (`handler`,`datavalue`),
  CONSTRAINT `messageinbound_datakeys_handler_foreign` FOREIGN KEY (`handler`) REFERENCES `messageinbound_handlers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messageinbound_handlers`
--

DROP TABLE IF EXISTS `messageinbound_handlers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messageinbound_handlers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The component this handler belongs to.',
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The class defining the Inbound Message handler to be called.',
  `defaultexpiration` int NOT NULL DEFAULT '86400' COMMENT 'The default expiration period to use when creating a new key',
  `validateaddress` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether to validate the sender address against the user record.',
  `enabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this handler is currently enabled.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `classname` (`classname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messageinbound_messagelist`
--

DROP TABLE IF EXISTS `messageinbound_messagelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messageinbound_messagelist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `messageid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The Inbound Message address that the message was originally sent to',
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messageinbound_messagelist_userid_foreign` (`userid`),
  CONSTRAINT `messageinbound_messagelist_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `useridfrom` bigint unsigned NOT NULL,
  `conversationid` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `fullmessage` text COLLATE utf8mb4_unicode_ci,
  `fullmessageformat` tinyint(1) NOT NULL DEFAULT '0',
  `fullmessagehtml` text COLLATE utf8mb4_unicode_ci,
  `smallmessage` text COLLATE utf8mb4_unicode_ci,
  `timecreated` int NOT NULL,
  `fullmessagetrust` tinyint NOT NULL DEFAULT '0',
  `customdata` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom data to be passed to the message processor. Must be serialisable using json_encode()',
  PRIMARY KEY (`id`),
  KEY `conversationid_timecreated` (`conversationid`,`timecreated`),
  KEY `messages_useridfrom_foreign` (`useridfrom`),
  CONSTRAINT `messages_conversationid_foreign` FOREIGN KEY (`conversationid`) REFERENCES `message_conversations` (`id`),
  CONSTRAINT `messages_useridfrom_foreign` FOREIGN KEY (`useridfrom`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_application`
--

DROP TABLE IF EXISTS `mnet_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_application` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xmlrpc_server_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sso_land_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sso_jump_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_host`
--

DROP TABLE IF EXISTS `mnet_host`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_host` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `wwwroot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_key_expires` int NOT NULL DEFAULT '0',
  `transport` tinyint NOT NULL DEFAULT '0',
  `portno` smallint NOT NULL DEFAULT '0',
  `last_connect_time` int NOT NULL DEFAULT '0',
  `last_log_id` int NOT NULL DEFAULT '0',
  `force_theme` tinyint(1) NOT NULL DEFAULT '0',
  `theme` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationid` bigint unsigned NOT NULL DEFAULT '1',
  `sslverification` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `last_log_id` (`last_log_id`),
  KEY `mnet_host_applicationid_foreign` (`applicationid`),
  CONSTRAINT `mnet_host_applicationid_foreign` FOREIGN KEY (`applicationid`) REFERENCES `mnet_application` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_host2service`
--

DROP TABLE IF EXISTS `mnet_host2service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_host2service` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hostid` int NOT NULL DEFAULT '0',
  `serviceid` int NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `subscribe` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hostid_serviceid` (`hostid`,`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_log`
--

DROP TABLE IF EXISTS `mnet_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hostid` int NOT NULL DEFAULT '0' COMMENT 'Unique host ID',
  `remoteid` int NOT NULL DEFAULT '0',
  `time` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` int NOT NULL DEFAULT '0',
  `coursename` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmid` int NOT NULL DEFAULT '0',
  `action` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hostid_userid_course` (`hostid`,`userid`,`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_remote_rpc`
--

DROP TABLE IF EXISTS `mnet_remote_rpc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_remote_rpc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `functionname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xmlrpcpath` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plugintype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pluginname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_remote_service2rpc`
--

DROP TABLE IF EXISTS `mnet_remote_service2rpc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_remote_service2rpc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `serviceid` int NOT NULL DEFAULT '0' COMMENT 'Unique service ID',
  `rpcid` int NOT NULL DEFAULT '0' COMMENT 'Unique Function ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rpcid_serviceid` (`rpcid`,`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_rpc`
--

DROP TABLE IF EXISTS `mnet_rpc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_rpc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `functionname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xmlrpcpath` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plugintype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pluginname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `help` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Method signature',
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enabled_xmlrpcpath` (`enabled`,`xmlrpcpath`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_service`
--

DROP TABLE IF EXISTS `mnet_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_service` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apiversion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Do we even offer this service?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_service2rpc`
--

DROP TABLE IF EXISTS `mnet_service2rpc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_service2rpc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `serviceid` int NOT NULL DEFAULT '0' COMMENT 'Unique service ID',
  `rpcid` int NOT NULL DEFAULT '0' COMMENT 'Unique Function ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rpcid_serviceid` (`rpcid`,`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_session`
--

DROP TABLE IF EXISTS `mnet_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_session` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Unique user ID',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unique username',
  `token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unique SHA1 Token',
  `mnethostid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Unique remote host ID',
  `useragent` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SHA1 hash of User Agent',
  `confirm_timeout` int NOT NULL DEFAULT '0' COMMENT 'UNIX timestamp for expiry of session',
  `session_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The PHP Session ID',
  `expires` int NOT NULL DEFAULT '0' COMMENT 'Expire time of session on peer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `mnet_session_userid_foreign` (`userid`),
  KEY `mnet_session_mnethostid_foreign` (`mnethostid`),
  CONSTRAINT `mnet_session_mnethostid_foreign` FOREIGN KEY (`mnethostid`) REFERENCES `mnet_host` (`id`),
  CONSTRAINT `mnet_session_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnet_sso_access_control`
--

DROP TABLE IF EXISTS `mnet_sso_access_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnet_sso_access_control` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Username',
  `mnet_host_id` int NOT NULL DEFAULT '0' COMMENT 'id of mnet host',
  `accessctrl` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'allow' COMMENT 'Whether or not this user/host can login',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mnethostid_username` (`mnet_host_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnetservice_enrol_courses`
--

DROP TABLE IF EXISTS `mnetservice_enrol_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnetservice_enrol_courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hostid` int NOT NULL COMMENT 'The id of the remote MNet host',
  `remoteid` int NOT NULL COMMENT 'ID of course on its home server',
  `categoryid` int NOT NULL COMMENT 'The id of the category on the remote server',
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortorder` int NOT NULL DEFAULT '0',
  `fullname` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summaryformat` tinyint DEFAULT '0' COMMENT 'Format of the summary field',
  `startdate` int NOT NULL,
  `roleid` int NOT NULL COMMENT 'The ID of the role at the remote server that our users will get when we enrol them there',
  `rolename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the role at the remote server that our users will get when we enrol them there',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_hostid_remoteid` (`hostid`,`remoteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mnetservice_enrol_enrolments`
--

DROP TABLE IF EXISTS `mnetservice_enrol_enrolments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mnetservice_enrol_enrolments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hostid` bigint unsigned NOT NULL COMMENT 'ID of the remote MNet host',
  `userid` bigint unsigned NOT NULL COMMENT 'ID of our local user on this server',
  `remotecourseid` int NOT NULL COMMENT 'ID of the course at  the remote server. Note that this may and may not be cached in our mnetservice_enrol_courses table, depends of whether the course is opened for remote enrolments or our student is the enrolled there via other plugin',
  `rolename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enroltime` int NOT NULL DEFAULT '0',
  `enroltype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the enrol plugin at the remote server that was used to enrol our student into their course',
  PRIMARY KEY (`id`),
  KEY `mnetservice_enrol_enrolments_userid_foreign` (`userid`),
  KEY `mnetservice_enrol_enrolments_hostid_foreign` (`hostid`),
  CONSTRAINT `mnetservice_enrol_enrolments_hostid_foreign` FOREIGN KEY (`hostid`) REFERENCES `mnet_host` (`id`),
  CONSTRAINT `mnetservice_enrol_enrolments_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cron` int NOT NULL DEFAULT '0',
  `lastcron` int NOT NULL DEFAULT '0',
  `search` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `moodle_sessions`
--

DROP TABLE IF EXISTS `moodle_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moodle_sessions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `state` int NOT NULL DEFAULT '0' COMMENT '0 means normal session',
  `sid` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Session id',
  `userid` bigint unsigned NOT NULL,
  `sessdata` text COLLATE utf8mb4_unicode_ci COMMENT 'session content',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  `firstip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sid` (`sid`),
  KEY `state` (`state`),
  KEY `timecreated` (`timecreated`),
  KEY `timemodified` (`timemodified`),
  KEY `moodle_sessions_userid_foreign` (`userid`),
  CONSTRAINT `moodle_sessions_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `moodlenet_share_progress`
--

DROP TABLE IF EXISTS `moodlenet_share_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moodlenet_share_progress` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL,
  `courseid` int NOT NULL,
  `cmid` int DEFAULT NULL,
  `userid` int NOT NULL,
  `timecreated` int NOT NULL,
  `resourceurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `my_pages`
--

DROP TABLE IF EXISTS `my_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `my_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT '0' COMMENT 'The user who owns this page or 0 for system defaults',
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The page name (freeform text)',
  `private` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether or not the page is private (dashboard) or public (profile)',
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'The order of the pages for a user',
  PRIMARY KEY (`id`),
  KEY `user_idx` (`userid`,`private`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `useridfrom` int NOT NULL,
  `useridto` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci COMMENT 'The message subject',
  `fullmessage` text COLLATE utf8mb4_unicode_ci,
  `fullmessageformat` tinyint(1) NOT NULL DEFAULT '0',
  `fullmessagehtml` text COLLATE utf8mb4_unicode_ci,
  `smallmessage` text COLLATE utf8mb4_unicode_ci,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventtype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contexturl` text COLLATE utf8mb4_unicode_ci,
  `contexturlname` text COLLATE utf8mb4_unicode_ci,
  `timeread` int DEFAULT NULL,
  `timecreated` int NOT NULL,
  `customdata` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom data to be passed to the message processor. Must be serialisable using json_encode()',
  PRIMARY KEY (`id`),
  KEY `useridfrom` (`useridfrom`),
  KEY `notifications_useridto_foreign` (`useridto`),
  CONSTRAINT `notifications_useridto_foreign` FOREIGN KEY (`useridto`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth2_access_token`
--

DROP TABLE IF EXISTS `oauth2_access_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth2_access_token` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timecreated` int NOT NULL COMMENT 'Time this record was created.',
  `timemodified` int NOT NULL COMMENT 'Time this record was modified.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who modified this record.',
  `issuerid` int NOT NULL COMMENT 'Corresponding oauth2 issuer',
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'access token',
  `expires` int NOT NULL COMMENT 'Expiry timestamp (according to the issuer)',
  `scope` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `issueridkey` (`issuerid`),
  KEY `oauth2_access_token_usermodified_foreign` (`usermodified`),
  CONSTRAINT `oauth2_access_token_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth2_endpoint`
--

DROP TABLE IF EXISTS `oauth2_endpoint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth2_endpoint` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timecreated` int NOT NULL COMMENT 'The time this record was created.',
  `timemodified` int NOT NULL COMMENT 'The time this record was modified.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who modified this record.',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The service name.',
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The url to the endpoint',
  `issuerid` bigint unsigned NOT NULL COMMENT 'The identity provider this service belongs to.',
  PRIMARY KEY (`id`),
  KEY `oauth2_endpoint_issuerid_foreign` (`issuerid`),
  KEY `oauth2_endpoint_usermodified_foreign` (`usermodified`),
  CONSTRAINT `oauth2_endpoint_issuerid_foreign` FOREIGN KEY (`issuerid`) REFERENCES `oauth2_issuer` (`id`),
  CONSTRAINT `oauth2_endpoint_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth2_issuer`
--

DROP TABLE IF EXISTS `oauth2_issuer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth2_issuer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timecreated` int NOT NULL COMMENT 'Time this record was created.',
  `timemodified` int NOT NULL COMMENT 'Time this record was modified.',
  `usermodified` int NOT NULL COMMENT 'The user who modified this record',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of this identity issuer',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `baseurl` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The base url to the issuer',
  `clientid` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The client id used to connect to this oauth2 service.',
  `clientsecret` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The secret used to connect to this oauth2 service.',
  `loginscopes` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The scopes requested for a normal login attempt.',
  `loginscopesoffline` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The scopes requested for a login attempt to generate a refresh token.',
  `loginparams` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Additional parameters sent for a login attempt.',
  `loginparamsoffline` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Additional parameters sent for a login attempt to generate a refresh token.',
  `alloweddomains` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Allowed domains for this issuer.',
  `scopessupported` text COLLATE utf8mb4_unicode_ci COMMENT 'The list of scopes this service supports.',
  `enabled` tinyint NOT NULL DEFAULT '1',
  `showonloginpage` tinyint NOT NULL DEFAULT '1',
  `basicauth` tinyint NOT NULL DEFAULT '0' COMMENT 'Use HTTP Basic authentication scheme when sending client ID and password',
  `sortorder` int NOT NULL COMMENT 'The defined sort order.',
  `requireconfirmation` tinyint NOT NULL DEFAULT '1',
  `servicetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Issuer service type, such as ''google'' or ''facebook''.',
  `loginpagename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth2_refresh_token`
--

DROP TABLE IF EXISTS `oauth2_refresh_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth2_refresh_token` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timecreated` int NOT NULL COMMENT 'Time this record was created.',
  `timemodified` int NOT NULL COMMENT 'Time this record was modified.',
  `userid` bigint unsigned NOT NULL COMMENT 'The user to whom this refresh token belongs.',
  `issuerid` bigint unsigned NOT NULL COMMENT 'Corresponding oauth2 issuer',
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'refresh token',
  `scopehash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1 hash of the scopes used when requesting the refresh token',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-issuerid-scopehash` (`userid`,`issuerid`,`scopehash`),
  KEY `oauth2_refresh_token_issuerid_foreign` (`issuerid`),
  CONSTRAINT `oauth2_refresh_token_issuerid_foreign` FOREIGN KEY (`issuerid`) REFERENCES `oauth2_issuer` (`id`),
  CONSTRAINT `oauth2_refresh_token_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth2_system_account`
--

DROP TABLE IF EXISTS `oauth2_system_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth2_system_account` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timecreated` int NOT NULL COMMENT 'Time this record was created.',
  `timemodified` int NOT NULL COMMENT 'Time this record was modified.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who modified this record.',
  `issuerid` int NOT NULL COMMENT 'The id of the oauth 2 identity issuer',
  `refreshtoken` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The refresh token used to request access tokens.',
  `grantedscopes` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The scopes that this system account has been granted access to.',
  `email` text COLLATE utf8mb4_unicode_ci COMMENT 'The email that was connected to this issuer.',
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The username that was connected as a system account to this issue.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `issueridkey` (`issuerid`),
  KEY `oauth2_system_account_usermodified_foreign` (`usermodified`),
  CONSTRAINT `oauth2_system_account_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth2_user_field_mapping`
--

DROP TABLE IF EXISTS `oauth2_user_field_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth2_user_field_mapping` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timemodified` int NOT NULL COMMENT 'The time this record was modified',
  `timecreated` int NOT NULL COMMENT 'The time this record was created.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'The user who modified this record.',
  `issuerid` bigint unsigned NOT NULL COMMENT 'The oauth issuer.',
  `externalfield` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The fieldname returned by the userinfo endpoint.',
  `internalfield` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the Moodle field this user field maps to.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqinternal` (`issuerid`,`internalfield`),
  KEY `oauth2_user_field_mapping_usermodified_foreign` (`usermodified`),
  CONSTRAINT `oauth2_user_field_mapping_issuerid_foreign` FOREIGN KEY (`issuerid`) REFERENCES `oauth2_issuer` (`id`),
  CONSTRAINT `oauth2_user_field_mapping_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci,
  `contentformat` smallint NOT NULL DEFAULT '0',
  `legacyfiles` smallint NOT NULL DEFAULT '0',
  `legacyfileslast` int DEFAULT NULL,
  `display` smallint NOT NULL DEFAULT '0',
  `displayoptions` text COLLATE utf8mb4_unicode_ci,
  `revision` int NOT NULL DEFAULT '0' COMMENT 'incremented when after each file changes, solves browser caching issues',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paygw_paypal`
--

DROP TABLE IF EXISTS `paygw_paypal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paygw_paypal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `paymentid` int NOT NULL,
  `pp_orderid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'The ID of the order in PayPal',
  PRIMARY KEY (`id`),
  UNIQUE KEY `paymentid` (`paymentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_accounts`
--

DROP TABLE IF EXISTS `payment_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contextid` bigint unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `timecreated` int DEFAULT NULL,
  `timemodified` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_accounts_contextid_foreign` (`contextid`),
  CONSTRAINT `payment_accounts_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_gateways`
--

DROP TABLE IF EXISTS `payment_gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_gateways` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `accountid` bigint unsigned NOT NULL,
  `gateway` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `config` text COLLATE utf8mb4_unicode_ci,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_gateways_accountid_foreign` (`accountid`),
  CONSTRAINT `payment_gateways_accountid_foreign` FOREIGN KEY (`accountid`) REFERENCES `payment_accounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The plugin this payment belongs to.',
  `paymentarea` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of payable area',
  `itemid` int NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountid` bigint unsigned NOT NULL,
  `gateway` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gateway` (`gateway`),
  KEY `component-paymentarea-itemid` (`component`,`paymentarea`,`itemid`),
  KEY `payments_userid_foreign` (`userid`),
  KEY `payments_accountid_foreign` (`accountid`),
  CONSTRAINT `payments_accountid_foreign` FOREIGN KEY (`accountid`) REFERENCES `payment_accounts` (`id`),
  CONSTRAINT `payments_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `portfolio_instance`
--

DROP TABLE IF EXISTS `portfolio_instance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_instance` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `plugin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'fk to plugin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name of plugin instance',
  `visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'whether this instance is visible or not',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `portfolio_instance_config`
--

DROP TABLE IF EXISTS `portfolio_instance_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_instance_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instance` bigint unsigned NOT NULL COMMENT 'instance of plugin we''re configurating',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'config field',
  `value` text COLLATE utf8mb4_unicode_ci COMMENT 'config value',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `portfolio_instance_config_instance_foreign` (`instance`),
  CONSTRAINT `portfolio_instance_config_instance_foreign` FOREIGN KEY (`instance`) REFERENCES `portfolio_instance` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `portfolio_instance_user`
--

DROP TABLE IF EXISTS `portfolio_instance_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_instance_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instance` bigint unsigned NOT NULL COMMENT 'fk to instance table',
  `userid` bigint unsigned NOT NULL COMMENT 'fk to user table',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name of config item',
  `value` text COLLATE utf8mb4_unicode_ci COMMENT 'value of config item',
  PRIMARY KEY (`id`),
  KEY `portfolio_instance_user_instance_foreign` (`instance`),
  KEY `portfolio_instance_user_userid_foreign` (`userid`),
  CONSTRAINT `portfolio_instance_user_instance_foreign` FOREIGN KEY (`instance`) REFERENCES `portfolio_instance` (`id`),
  CONSTRAINT `portfolio_instance_user_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `portfolio_log`
--

DROP TABLE IF EXISTS `portfolio_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL COMMENT 'user who exported content',
  `time` int NOT NULL COMMENT 'time of transfer (in the case of a queued transfer this is the time the actual transfer ran, not when the user started)',
  `portfolio` bigint unsigned NOT NULL COMMENT 'fk to portfolio_instance',
  `caller_class` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the name of the class used to create the transfer',
  `caller_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'path to file to include where the class definition lives. (relative to dirroot)',
  `caller_component` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'the component name responsible for exporting',
  `caller_sha1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1 of exported content as far as the caller is concerned (before the portfolio plugin gets a hold of it)',
  `tempdataid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'old id from portfolio_tempdata.  This is so that we can gracefully catch a race condition between an external system requesting a file and causing the tempdata to be deleted, before the user gets the "your transfer is requested" page',
  `returnurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the original "returnurl" of the export - takes us to the moodle page we started from',
  `continueurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the url the external system has set to view the transfer',
  PRIMARY KEY (`id`),
  KEY `portfolio_log_userid_foreign` (`userid`),
  KEY `portfolio_log_portfolio_foreign` (`portfolio`),
  KEY `portfolio_log_tempdataid_foreign` (`tempdataid`),
  CONSTRAINT `portfolio_log_portfolio_foreign` FOREIGN KEY (`portfolio`) REFERENCES `portfolio_instance` (`id`),
  CONSTRAINT `portfolio_log_tempdataid_foreign` FOREIGN KEY (`tempdataid`) REFERENCES `portfolio_tempdata` (`id`),
  CONSTRAINT `portfolio_log_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `portfolio_mahara_queue`
--

DROP TABLE IF EXISTS `portfolio_mahara_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_mahara_queue` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transferid` bigint unsigned NOT NULL COMMENT 'fk to portfolio_tempdata.id',
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the token mahara sent us to use for this transfer.',
  PRIMARY KEY (`id`),
  KEY `tokenidx` (`token`),
  KEY `portfolio_mahara_queue_transferid_foreign` (`transferid`),
  CONSTRAINT `portfolio_mahara_queue_transferid_foreign` FOREIGN KEY (`transferid`) REFERENCES `portfolio_tempdata` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `portfolio_tempdata`
--

DROP TABLE IF EXISTS `portfolio_tempdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_tempdata` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8mb4_unicode_ci COMMENT 'dumping ground for portfolio callers to store their data in.',
  `expirytime` int NOT NULL COMMENT 'time this record will expire (used for cron cleanups) - the start of export + 24 hours',
  `userid` bigint unsigned NOT NULL COMMENT 'psuedo fk to user.  this is stored in the serialised data structure in the data field, but added here for ease of lookups.',
  `instance` bigint unsigned DEFAULT '0' COMMENT 'which portfolio plugin instance is being used',
  `queued` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Value 1 means the entry should be processed in cron.',
  PRIMARY KEY (`id`),
  KEY `portfolio_tempdata_userid_foreign` (`userid`),
  KEY `portfolio_tempdata_instance_foreign` (`instance`),
  CONSTRAINT `portfolio_tempdata_instance_foreign` FOREIGN KEY (`instance`) REFERENCES `portfolio_instance` (`id`),
  CONSTRAINT `portfolio_tempdata_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int NOT NULL DEFAULT '0',
  `courseid` bigint unsigned NOT NULL DEFAULT '0',
  `groupid` int NOT NULL DEFAULT '0',
  `moduleid` int NOT NULL DEFAULT '0',
  `coursemoduleid` bigint unsigned NOT NULL DEFAULT '0',
  `subject` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `uniquehash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `format` int NOT NULL DEFAULT '0',
  `summaryformat` tinyint NOT NULL DEFAULT '0',
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'attachment',
  `publishstate` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `lastmodified` int NOT NULL DEFAULT '0',
  `created` int NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id-userid` (`id`,`userid`),
  KEY `lastmodified` (`lastmodified`),
  KEY `module` (`module`),
  KEY `subject` (`subject`),
  KEY `post_usermodified_foreign` (`usermodified`),
  KEY `post_courseid_foreign` (`courseid`),
  KEY `post_coursemoduleid_foreign` (`coursemoduleid`),
  CONSTRAINT `post_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `post_coursemoduleid_foreign` FOREIGN KEY (`coursemoduleid`) REFERENCES `course_modules` (`id`),
  CONSTRAINT `post_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profiling`
--

DROP TABLE IF EXISTS `profiling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiling` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `runid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the unique id for this run (as generated by xhprof)',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the url this profiling record is about (without wwwroot nor query params)',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the raw data gathered by xhprof',
  `totalexecutiontime` int NOT NULL COMMENT 'time (in microseconds) spent by the run',
  `totalcputime` int NOT NULL COMMENT 'time (in microseconds) spent by the CPU in this run',
  `totalcalls` int NOT NULL COMMENT 'Total number of calls performed by the run',
  `totalmemory` int NOT NULL COMMENT 'Total memory used byt the run',
  `runreference` tinyint NOT NULL DEFAULT '0' COMMENT 'Is this run a reference one',
  `runcomment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Brief comment for this run',
  `timecreated` int NOT NULL COMMENT 'unix timestap of the creation of this run',
  PRIMARY KEY (`id`),
  UNIQUE KEY `runid_uk` (`runid`),
  KEY `url_runreference_ix` (`url`,`runreference`),
  KEY `timecreated_runreference_ix` (`timecreated`,`runreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qbank`
--

DROP TABLE IF EXISTS `qbank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qbank` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint NOT NULL,
  `name` varchar(1333) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timecreated` bigint NOT NULL DEFAULT '0',
  `timemodified` bigint NOT NULL DEFAULT '0',
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `qban_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ddimageortext`
--

DROP TABLE IF EXISTS `qtype_ddimageortext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ddimageortext` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `shuffleanswers` smallint NOT NULL DEFAULT '1',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `qtype_ddimageortext_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_ddimageortext_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ddimageortext_drags`
--

DROP TABLE IF EXISTS `qtype_ddimageortext_drags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ddimageortext_drags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `no` int NOT NULL DEFAULT '0' COMMENT 'drag no',
  `draggroup` int NOT NULL DEFAULT '0',
  `infinite` smallint NOT NULL DEFAULT '0',
  `label` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Alt text label for drag-able image.',
  PRIMARY KEY (`id`),
  KEY `qtype_ddimageortext_drags_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_ddimageortext_drags_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ddimageortext_drops`
--

DROP TABLE IF EXISTS `qtype_ddimageortext_drops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ddimageortext_drops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `no` int NOT NULL DEFAULT '0' COMMENT 'drop number',
  `xleft` int NOT NULL DEFAULT '0',
  `ytop` int NOT NULL DEFAULT '0',
  `choice` int NOT NULL DEFAULT '0',
  `label` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Alt label for drop box',
  PRIMARY KEY (`id`),
  KEY `qtype_ddimageortext_drops_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_ddimageortext_drops_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ddmarker`
--

DROP TABLE IF EXISTS `qtype_ddmarker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ddmarker` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `shuffleanswers` smallint NOT NULL DEFAULT '1',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0',
  `showmisplaced` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `qtype_ddmarker_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_ddmarker_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ddmarker_drags`
--

DROP TABLE IF EXISTS `qtype_ddmarker_drags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ddmarker_drags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `no` int NOT NULL DEFAULT '0' COMMENT 'drag no',
  `label` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Alt text label for drag-able image.',
  `infinite` smallint NOT NULL DEFAULT '0',
  `noofdrags` int NOT NULL DEFAULT '1' COMMENT 'No of drag items, ignored if drag is infinite.',
  PRIMARY KEY (`id`),
  KEY `qtype_ddmarker_drags_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_ddmarker_drags_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ddmarker_drops`
--

DROP TABLE IF EXISTS `qtype_ddmarker_drops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ddmarker_drops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `no` int NOT NULL DEFAULT '0' COMMENT 'drop number',
  `shape` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'circle, rectangle, polygon',
  `coords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `qtype_ddmarker_drops_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_ddmarker_drops_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_essay_options`
--

DROP TABLE IF EXISTS `qtype_essay_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_essay_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` int NOT NULL COMMENT 'Foreign key linking to the question table.',
  `responseformat` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor' COMMENT 'The type of input area students should be given for their response.',
  `responserequired` tinyint NOT NULL DEFAULT '1' COMMENT 'Nonzero if an online text response is optional',
  `responsefieldlines` smallint NOT NULL DEFAULT '15' COMMENT 'Approximate height, in lines, of the input box the students should be given for their response.',
  `minwordlimit` int DEFAULT NULL COMMENT 'Minimum number of words',
  `maxwordlimit` int DEFAULT NULL COMMENT 'Maximum number of words',
  `attachments` smallint NOT NULL DEFAULT '0' COMMENT 'Whether, and how many, attachments a student is allowed to include with their response. -1 means unlimited.',
  `attachmentsrequired` smallint NOT NULL DEFAULT '0' COMMENT 'The number of attachments that should be required',
  `graderinfo` text COLLATE utf8mb4_unicode_ci COMMENT 'Information shown to people with permission to manually grade the question, when they are grading.',
  `graderinfoformat` smallint NOT NULL DEFAULT '0' COMMENT 'The text format for graderinfo.',
  `responsetemplate` text COLLATE utf8mb4_unicode_ci COMMENT 'The template to pre-populate student''s response field during attempt.',
  `responsetemplateformat` smallint NOT NULL DEFAULT '0' COMMENT 'The text format for responsetemplate.',
  `maxbytes` int NOT NULL DEFAULT '0' COMMENT 'Maximum size of attached files in bytes.',
  `filetypeslist` text COLLATE utf8mb4_unicode_ci COMMENT 'What attachment file type a student is allowed to include with their response. * or empty means unlimited.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionid` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_match_options`
--

DROP TABLE IF EXISTS `qtype_match_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_match_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` int NOT NULL DEFAULT '0' COMMENT 'Foreign key link to question.id.',
  `shuffleanswers` smallint NOT NULL DEFAULT '1',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0' COMMENT 'If true, then when the user gets the question partially correct, tell them how many choices they got correct alongside the feedback.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionid` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_match_subquestions`
--

DROP TABLE IF EXISTS `qtype_match_subquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_match_subquestions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key link to question.id.',
  `questiontext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `questiontextformat` tinyint NOT NULL DEFAULT '0',
  `answertext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qtype_match_subquestions_questionid_foreign` (`questionid`),
  CONSTRAINT `qtype_match_subquestions_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_multichoice_options`
--

DROP TABLE IF EXISTS `qtype_multichoice_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_multichoice_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references question.id',
  `layout` smallint NOT NULL DEFAULT '0' COMMENT 'Not used. Was intended for a vertical/horizontal layout option. See MDL-18445.',
  `single` smallint NOT NULL DEFAULT '0' COMMENT 'If 0 it multiple response (checkboxes). Otherwise it is radio buttons.',
  `shuffleanswers` smallint NOT NULL DEFAULT '1' COMMENT 'Whether the choices can be randomly shuffled.',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `answernumbering` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'abc' COMMENT 'Indicates how and whether the choices should be numbered.',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0' COMMENT 'If true, then when the user gets a multiple-response question partially correct, tell them how many choices they got correct alongside the feedback.',
  `showstandardinstruction` tinyint NOT NULL DEFAULT '1' COMMENT 'Whether standard instruction (''Select one:'' or ''Select one or more:'') is displayed',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionid` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_ordering_options`
--

DROP TABLE IF EXISTS `qtype_ordering_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_ordering_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint NOT NULL DEFAULT '0',
  `layouttype` tinyint NOT NULL DEFAULT '0',
  `selecttype` tinyint NOT NULL DEFAULT '0',
  `selectcount` smallint NOT NULL DEFAULT '2',
  `gradingtype` tinyint NOT NULL DEFAULT '0',
  `showgrading` tinyint NOT NULL DEFAULT '0',
  `numberingstyle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci,
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci,
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci,
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `qtypordeopti_que_uix` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_randomsamatch_options`
--

DROP TABLE IF EXISTS `qtype_randomsamatch_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_randomsamatch_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references question.id.',
  `choose` int NOT NULL DEFAULT '4' COMMENT 'Number of subquestions to randomly generate.',
  `subcats` tinyint NOT NULL DEFAULT '1' COMMENT 'Whether to include or not the subcategories.',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0' COMMENT 'If true, then when the user gets the question partially correct, tell them how many choices they got correct alongside the feedback.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionid` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qtype_shortanswer_options`
--

DROP TABLE IF EXISTS `qtype_shortanswer_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtype_shortanswer_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references question.id.',
  `usecase` tinyint NOT NULL DEFAULT '0' COMMENT 'Whether answers are matched case-sensitively.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionid` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questiontext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `questiontextformat` tinyint NOT NULL DEFAULT '0',
  `generalfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'to store the question feedback',
  `generalfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `defaultmark` decimal(12,7) NOT NULL DEFAULT '1.0000000',
  `penalty` decimal(12,7) NOT NULL DEFAULT '0.3333333',
  `qtype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int NOT NULL DEFAULT '1',
  `stamp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'time question was created',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'time that question was last modified',
  `createdby` bigint unsigned DEFAULT NULL COMMENT 'userid of person who created this question',
  `modifiedby` bigint unsigned DEFAULT NULL COMMENT 'userid of person who last edited this question',
  PRIMARY KEY (`id`),
  KEY `qtype` (`qtype`),
  KEY `question_parent_foreign` (`parent`),
  KEY `question_createdby_foreign` (`createdby`),
  KEY `question_modifiedby_foreign` (`modifiedby`),
  CONSTRAINT `question_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  CONSTRAINT `question_modifiedby_foreign` FOREIGN KEY (`modifiedby`) REFERENCES `users` (`id`),
  CONSTRAINT `question_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_answers`
--

DROP TABLE IF EXISTS `question_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answerformat` tinyint NOT NULL DEFAULT '0',
  `fraction` decimal(12,7) NOT NULL DEFAULT '0.0000000',
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedbackformat` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_answers_question_foreign` (`question`),
  CONSTRAINT `question_answers_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_attempt_step_data`
--

DROP TABLE IF EXISTS `question_attempt_step_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_attempt_step_data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `attemptstepid` bigint unsigned NOT NULL COMMENT 'Foreign key, references question_attempt_steps.id',
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of this bit of data.',
  `value` text COLLATE utf8mb4_unicode_ci COMMENT 'The corresponding value',
  PRIMARY KEY (`id`),
  KEY `question_attempt_step_data_attemptstepid_foreign` (`attemptstepid`),
  CONSTRAINT `question_attempt_step_data_attemptstepid_foreign` FOREIGN KEY (`attemptstepid`) REFERENCES `question_attempt_steps` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_attempt_steps`
--

DROP TABLE IF EXISTS `question_attempt_steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_attempt_steps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionattemptid` bigint unsigned NOT NULL COMMENT 'Foreign key, references question_attempt.id',
  `sequencenumber` int NOT NULL COMMENT 'Numbers the steps in a question attempt sequentially from 0.',
  `state` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'One of the constants defined by the question_state class, giving the state of the question at the end of this step.',
  `fraction` decimal(12,7) DEFAULT NULL COMMENT 'The grade for this question, when graded out of 1. Needs to be multiplied by question_attempt.maxmark to get the actual mark for the question.',
  `timecreated` int NOT NULL COMMENT 'Time-stamp of the action that lead to this state being created.',
  `userid` bigint unsigned DEFAULT NULL COMMENT 'The user whose action lead to this state being created.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionattemptid-sequencenumber` (`questionattemptid`,`sequencenumber`),
  KEY `question_attempt_steps_userid_foreign` (`userid`),
  CONSTRAINT `question_attempt_steps_questionattemptid_foreign` FOREIGN KEY (`questionattemptid`) REFERENCES `question_attempts` (`id`),
  CONSTRAINT `question_attempt_steps_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_attempts`
--

DROP TABLE IF EXISTS `question_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_attempts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionusageid` bigint unsigned NOT NULL COMMENT 'Foreign key, references question_usages.id',
  `slot` int NOT NULL COMMENT 'Used to number the questions in one attempt sequentially.',
  `behaviour` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the question behaviour that is managing this question attempt.',
  `questionid` bigint unsigned NOT NULL COMMENT 'The id of the question being attempted. Foreign key references question.id.',
  `variant` int NOT NULL DEFAULT '1' COMMENT 'The variant of the qusetion being used.',
  `maxmark` decimal(12,7) NOT NULL COMMENT 'The grade this question is marked out of in this attempt.',
  `minfraction` decimal(12,7) NOT NULL COMMENT 'Some questions can award negative marks. This indicates the most negative mark that can be awarded, on the faction scale where the maximum positive mark is 1.',
  `maxfraction` decimal(12,7) NOT NULL DEFAULT '1.0000000' COMMENT 'Some questions can give fractions greater than 1. This indicates the greatest fraction that can be awarded.',
  `flagged` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this question has been flagged within the attempt.',
  `questionsummary` text COLLATE utf8mb4_unicode_ci COMMENT 'If this question uses randomisation, it should set this field to summarise what random version the student actually saw. This is a human-readable textual summary of the student''s response which might, for example, be used in a report.',
  `rightanswer` text COLLATE utf8mb4_unicode_ci COMMENT 'This is a human-readable textual summary of the right answer to this question. Might be used, for example on the quiz preview, to help people who are testing the question. Or might be used in reports.',
  `responsesummary` text COLLATE utf8mb4_unicode_ci COMMENT 'This is a textual summary of the student''s response (basically what you would expect to in the Quiz responses report).',
  `timemodified` int NOT NULL COMMENT 'The time this record was last changed.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionusageid-slot` (`questionusageid`,`slot`),
  KEY `behaviour` (`behaviour`),
  KEY `question_attempts_questionid_foreign` (`questionid`),
  CONSTRAINT `question_attempts_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`),
  CONSTRAINT `question_attempts_questionusageid_foreign` FOREIGN KEY (`questionusageid`) REFERENCES `question_usages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_bank_entries`
--

DROP TABLE IF EXISTS `question_bank_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_bank_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questioncategoryid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'ID of the category this question is part of.',
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Unique identifier, useful especially for mapping to external entities.',
  `ownerid` bigint unsigned DEFAULT NULL COMMENT 'userid of person who owns this question bank entry.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoryidnumber` (`questioncategoryid`,`idnumber`),
  KEY `question_bank_entries_ownerid_foreign` (`ownerid`),
  CONSTRAINT `question_bank_entries_ownerid_foreign` FOREIGN KEY (`ownerid`) REFERENCES `users` (`id`),
  CONSTRAINT `question_bank_entries_questioncategoryid_foreign` FOREIGN KEY (`questioncategoryid`) REFERENCES `question_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_calculated`
--

DROP TABLE IF EXISTS `question_calculated`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_calculated` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `answer` int NOT NULL DEFAULT '0',
  `tolerance` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tolerancetype` int NOT NULL DEFAULT '1',
  `correctanswerlength` int NOT NULL DEFAULT '2',
  `correctanswerformat` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `answer` (`answer`),
  KEY `question_calculated_question_foreign` (`question`),
  CONSTRAINT `question_calculated_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_calculated_options`
--

DROP TABLE IF EXISTS `question_calculated_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_calculated_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `synchronize` tinyint NOT NULL DEFAULT '0',
  `single` smallint NOT NULL DEFAULT '0' COMMENT 'If 0 it multiple response (checkboxes). Otherwise it is radio buttons.',
  `shuffleanswers` smallint NOT NULL DEFAULT '0' COMMENT 'Whether the choices can be randomly shuffled.',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `answernumbering` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'abc' COMMENT 'Indicates how and whether the choices should be numbered.',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0' COMMENT 'If true, then when the user gets a multiple-response question partially correct, tell them how many choices they got correct alongside the feedback.',
  PRIMARY KEY (`id`),
  KEY `question_calculated_options_question_foreign` (`question`),
  CONSTRAINT `question_calculated_options_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_categories`
--

DROP TABLE IF EXISTS `question_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contextid` int NOT NULL DEFAULT '0' COMMENT 'context that this category is shared in',
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `infoformat` tinyint NOT NULL DEFAULT '0',
  `stamp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint unsigned NOT NULL DEFAULT '0',
  `sortorder` int NOT NULL DEFAULT '999',
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextidstamp` (`contextid`,`stamp`),
  UNIQUE KEY `contextididnumber` (`contextid`,`idnumber`),
  KEY `contextid` (`contextid`),
  KEY `question_categories_parent_foreign` (`parent`),
  CONSTRAINT `question_categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `question_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_dataset_definitions`
--

DROP TABLE IF EXISTS `question_dataset_definitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_dataset_definitions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemcount` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_dataset_definitions_category_foreign` (`category`),
  CONSTRAINT `question_dataset_definitions_category_foreign` FOREIGN KEY (`category`) REFERENCES `question_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_dataset_items`
--

DROP TABLE IF EXISTS `question_dataset_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_dataset_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `definition` int NOT NULL DEFAULT '0',
  `itemnumber` int NOT NULL DEFAULT '0',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `definition` (`definition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_datasets`
--

DROP TABLE IF EXISTS `question_datasets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_datasets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `datasetdefinition` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question-datasetdefinition` (`question`,`datasetdefinition`),
  KEY `question_datasets_datasetdefinition_foreign` (`datasetdefinition`),
  CONSTRAINT `question_datasets_datasetdefinition_foreign` FOREIGN KEY (`datasetdefinition`) REFERENCES `question_dataset_definitions` (`id`),
  CONSTRAINT `question_datasets_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_ddwtos`
--

DROP TABLE IF EXISTS `question_ddwtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_ddwtos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `shuffleanswers` smallint NOT NULL DEFAULT '1',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_ddwtos_questionid_foreign` (`questionid`),
  CONSTRAINT `question_ddwtos_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_gapselect`
--

DROP TABLE IF EXISTS `question_gapselect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_gapselect` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL DEFAULT '0',
  `shuffleanswers` smallint NOT NULL DEFAULT '1',
  `correctfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any correct response.',
  `correctfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `partiallycorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any partially correct response.',
  `partiallycorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `incorrectfeedback` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Feedback shown for any incorrect response.',
  `incorrectfeedbackformat` tinyint NOT NULL DEFAULT '0',
  `shownumcorrect` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_gapselect_questionid_foreign` (`questionid`),
  CONSTRAINT `question_gapselect_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_hints`
--

DROP TABLE IF EXISTS `question_hints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_hints` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionid` bigint unsigned NOT NULL,
  `hint` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The text of the feedback to be given.',
  `hintformat` smallint NOT NULL DEFAULT '0' COMMENT 'The format of the hint.',
  `shownumcorrect` tinyint(1) DEFAULT NULL COMMENT 'Whether the feedback should include a message about how many things the student got right. This is only applicable to certain question types (for example matching or multiple choice multiple-response).',
  `clearwrong` tinyint(1) DEFAULT NULL COMMENT 'Whether any wrong choices should be cleared before the next try. Whether this is applicable, and what it means, depends on the question type, as with the shownumright option.',
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'A space for any other question-type specific options.',
  PRIMARY KEY (`id`),
  KEY `question_hints_questionid_foreign` (`questionid`),
  CONSTRAINT `question_hints_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_multianswer`
--

DROP TABLE IF EXISTS `question_multianswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_multianswer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `sequence` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_multianswer_question_foreign` (`question`),
  CONSTRAINT `question_multianswer_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_numerical`
--

DROP TABLE IF EXISTS `question_numerical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_numerical` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Redundant, because of the answer field. Foreign key references question.id.',
  `answer` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references question_answers.id.',
  `tolerance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Allowed error when matching a response to this answer. I don''t know why this is stored as a string.',
  PRIMARY KEY (`id`),
  KEY `answer` (`answer`),
  KEY `question_numerical_question_foreign` (`question`),
  CONSTRAINT `question_numerical_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_numerical_options`
--

DROP TABLE IF EXISTS `question_numerical_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_numerical_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `showunits` smallint NOT NULL DEFAULT '0' COMMENT 'How units are handled: 3) Not used at all, 0) Optional, or 1) must be right or penalty applied.',
  `unitsleft` smallint NOT NULL DEFAULT '0' COMMENT 'display the unit at left as in $1.00',
  `unitgradingtype` smallint NOT NULL DEFAULT '0' COMMENT '0 no penalty, 1 fraction response grade, 2 fraction total grade',
  `unitpenalty` decimal(12,7) NOT NULL DEFAULT '0.1000000' COMMENT 'Penalty for getting the unit wrong, when they are being graded.',
  PRIMARY KEY (`id`),
  KEY `question_numerical_options_question_foreign` (`question`),
  CONSTRAINT `question_numerical_options_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_numerical_units`
--

DROP TABLE IF EXISTS `question_numerical_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_numerical_units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references question.id',
  `multiplier` decimal(38,19) NOT NULL DEFAULT '1.0000000000000000000' COMMENT 'The multiplier for this unit. For example, if the first unit is (1.0, ''cm''), another unit might be (0.1, ''mm'') or (100.0, ''m'').',
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The unit. For example ''m'' or ''kg''.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `question-unit` (`question`,`unit`),
  CONSTRAINT `question_numerical_units_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_references`
--

DROP TABLE IF EXISTS `question_references`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_references` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usingcontextid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Context where question is used.',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Component (e.g. mod_quiz or core_question)',
  `questionarea` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Depending on the component, which area the question is used in (e.g. slot for quiz).',
  `itemid` int DEFAULT NULL COMMENT 'Plugin specific id (e.g. slotid for quiz) where its used.',
  `questionbankentryid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'ID of the question bank entry this question is part of.',
  `version` int DEFAULT NULL COMMENT 'Version number for the question where NULL means use the latest non-draft version.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `context-component-area-itemid` (`usingcontextid`,`component`,`questionarea`,`itemid`),
  KEY `question_references_questionbankentryid_foreign` (`questionbankentryid`),
  CONSTRAINT `question_references_questionbankentryid_foreign` FOREIGN KEY (`questionbankentryid`) REFERENCES `question_bank_entries` (`id`),
  CONSTRAINT `question_references_usingcontextid_foreign` FOREIGN KEY (`usingcontextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_response_analysis`
--

DROP TABLE IF EXISTS `question_response_analysis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_response_analysis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hashcode` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1 hash of serialized qubaids_condition class. Unique for every combination of class name and property.',
  `whichtries` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timemodified` int NOT NULL,
  `questionid` bigint unsigned NOT NULL,
  `variant` int DEFAULT NULL,
  `subqid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` text COLLATE utf8mb4_unicode_ci,
  `credit` decimal(15,5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_response_analysis_questionid_foreign` (`questionid`),
  CONSTRAINT `question_response_analysis_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_response_count`
--

DROP TABLE IF EXISTS `question_response_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_response_count` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `analysisid` bigint unsigned NOT NULL,
  `try` int NOT NULL,
  `rcount` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_response_count_analysisid_foreign` (`analysisid`),
  CONSTRAINT `question_response_count_analysisid_foreign` FOREIGN KEY (`analysisid`) REFERENCES `question_response_analysis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_set_references`
--

DROP TABLE IF EXISTS `question_set_references`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_set_references` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usingcontextid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Context where question is used.',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Component (e.g. mod_quiz)',
  `questionarea` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Depending on the component, which area the question is used in (e.g. slot for quiz).',
  `itemid` int DEFAULT NULL COMMENT 'Plugin specific id (e.g. slotid for quiz) where its used.',
  `questionscontextid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Context questions come from.',
  `filtercondition` text COLLATE utf8mb4_unicode_ci COMMENT 'Filter expression in json format',
  PRIMARY KEY (`id`),
  UNIQUE KEY `context-component-area-itemid` (`usingcontextid`,`component`,`questionarea`,`itemid`),
  KEY `question_set_references_questionscontextid_foreign` (`questionscontextid`),
  CONSTRAINT `question_set_references_questionscontextid_foreign` FOREIGN KEY (`questionscontextid`) REFERENCES `context` (`id`),
  CONSTRAINT `question_set_references_usingcontextid_foreign` FOREIGN KEY (`usingcontextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_statistics`
--

DROP TABLE IF EXISTS `question_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hashcode` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1 hash of serialized qubaids_condition class. Unique for every combination of class name and property.',
  `timemodified` int NOT NULL,
  `questionid` bigint unsigned NOT NULL,
  `slot` int DEFAULT NULL COMMENT 'The position in the quiz where this question appears',
  `subquestion` smallint NOT NULL,
  `variant` int DEFAULT NULL,
  `s` int NOT NULL DEFAULT '0',
  `effectiveweight` decimal(15,5) DEFAULT NULL,
  `negcovar` tinyint NOT NULL DEFAULT '0',
  `discriminationindex` decimal(15,5) DEFAULT NULL,
  `discriminativeefficiency` decimal(15,5) DEFAULT NULL,
  `sd` decimal(15,10) DEFAULT NULL,
  `facility` decimal(15,10) DEFAULT NULL,
  `subquestions` text COLLATE utf8mb4_unicode_ci,
  `maxmark` decimal(12,7) DEFAULT NULL,
  `positions` text COLLATE utf8mb4_unicode_ci COMMENT 'positions in which this item appears. Only used for random questions.',
  `randomguessscore` decimal(12,7) DEFAULT NULL COMMENT 'An estimate of the score a student would get by guessing randomly.',
  PRIMARY KEY (`id`),
  KEY `question_statistics_questionid_foreign` (`questionid`),
  CONSTRAINT `question_statistics_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_truefalse`
--

DROP TABLE IF EXISTS `question_truefalse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_truefalse` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references question.id.',
  `trueanswer` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references question_answers.id. The ''True'' choice.',
  `falseanswer` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references question_answers.id. The ''False'' choice.',
  `showstandardinstruction` tinyint NOT NULL DEFAULT '1' COMMENT 'Whether standard instruction (''Select one:'') is displayed',
  PRIMARY KEY (`id`),
  KEY `question_truefalse_question_foreign` (`question`),
  CONSTRAINT `question_truefalse_question_foreign` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_usages`
--

DROP TABLE IF EXISTS `question_usages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_usages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL COMMENT 'Every question usage must be associated with some context.',
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The plugin this attempt belongs to, e.g. ''mod_quiz'', ''block_questionoftheday'', ''filter_embedquestion''.',
  `preferredbehaviour` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The archetypal behaviour that should be used for question attempts in this usage.',
  PRIMARY KEY (`id`),
  KEY `question_usages_contextid_foreign` (`contextid`),
  CONSTRAINT `question_usages_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `question_versions`
--

DROP TABLE IF EXISTS `question_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_versions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionbankentryid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'ID of the question bank entry this question version is part of.',
  `version` int NOT NULL DEFAULT '1' COMMENT 'Version number for the question where the first version is always 1.',
  `questionid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'The question ID.',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ready' COMMENT 'If the question is ready, hidden or draft',
  PRIMARY KEY (`id`),
  KEY `question_versions_questionbankentryid_foreign` (`questionbankentryid`),
  KEY `question_versions_questionid_foreign` (`questionid`),
  CONSTRAINT `question_versions_questionbankentryid_foreign` FOREIGN KEY (`questionbankentryid`) REFERENCES `question_bank_entries` (`id`),
  CONSTRAINT `question_versions_questionid_foreign` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0' COMMENT 'Foreign key reference to the course this quiz is part of.',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Quiz name.',
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Quiz introduction text.',
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'Quiz intro text format.',
  `timeopen` int NOT NULL DEFAULT '0' COMMENT 'The time when this quiz opens. (0 = no restriction.)',
  `timeclose` int NOT NULL DEFAULT '0' COMMENT 'The time when this quiz closes. (0 = no restriction.)',
  `timelimit` int NOT NULL DEFAULT '0' COMMENT 'The time limit for quiz attempts, in seconds.',
  `overduehandling` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'autoabandon' COMMENT 'The method used to handle overdue attempts. ''autosubmit'', ''graceperiod'' or ''autoabandon''.',
  `graceperiod` int NOT NULL DEFAULT '0' COMMENT 'The amount of time (in seconds) after the time limit runs out during which attempts can still be submitted, if overduehandling is set to allow it.',
  `preferredbehaviour` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The behaviour to ask questions to use.',
  `canredoquestions` smallint NOT NULL DEFAULT '0' COMMENT 'Allows students to redo any completed question within a quiz attempt.',
  `attempts` int NOT NULL DEFAULT '0' COMMENT 'The maximum number of attempts a student is allowed.',
  `attemptonlast` smallint NOT NULL DEFAULT '0' COMMENT 'Whether subsequent attempts start from the answer to the previous attempt (1) or start blank (0).',
  `grademethod` smallint NOT NULL DEFAULT '1' COMMENT 'One of the values QUIZ_GRADEHIGHEST, QUIZ_GRADEAVERAGE, QUIZ_ATTEMPTFIRST or QUIZ_ATTEMPTLAST.',
  `decimalpoints` smallint NOT NULL DEFAULT '2' COMMENT 'Number of decimal points to use when displaying grades.',
  `questiondecimalpoints` smallint NOT NULL DEFAULT '-1' COMMENT 'Number of decimal points to use when displaying question grades. (-1 means use decimalpoints.)',
  `reviewattempt` int NOT NULL DEFAULT '0' COMMENT 'Whether users are allowed to review their quiz attempts at various times. This is a bit field, decoded by the \\mod_quiz\\question\\display_options class. It is formed by ORing together the constants defined there.',
  `reviewcorrectness` int NOT NULL DEFAULT '0' COMMENT 'Whether users are allowed to review the correctness of the questions in their quiz attempts at various times. A bit field, like reviewattempt.',
  `reviewmaxmarks` int NOT NULL DEFAULT '0' COMMENT 'Works with reviewmarks to control whether users can see grades at various times. 0 here means no grade information is shown at all. If 1, student can see the number of marks available for this question, and reviewmarks applies. A bit field, like reviewattempt.',
  `reviewmarks` int NOT NULL DEFAULT '0' COMMENT 'Works with reviewmaxmarks to control whether users can see grades at various times. If reviewmaxmarks is 1, then this controls whether students can see the the mark they got for the question, in addition to the max. A bit field, like reviewattempt.',
  `reviewspecificfeedback` int NOT NULL DEFAULT '0' COMMENT 'Whether users are allowed to see the specific feedback in their quiz attempts. A bit field, like reviewattempt.',
  `reviewgeneralfeedback` int NOT NULL DEFAULT '0' COMMENT 'Whether users are allowed to see the general feedback in their quiz attempts. A bit field, like reviewattempt.',
  `reviewrightanswer` int NOT NULL DEFAULT '0' COMMENT 'Whether users are allowed to see the right answer in their quiz attempts. A bit field, like reviewattempt.',
  `reviewoverallfeedback` int NOT NULL DEFAULT '0' COMMENT 'Whether users are allowed to see the overall feedback in their quiz attempts. A bit field, like reviewattempt.',
  `questionsperpage` int NOT NULL DEFAULT '0' COMMENT 'How often to insert a page break when editing the quiz, or when shuffling the question order.',
  `navmethod` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free' COMMENT 'Any constraints on how the user is allowed to navigate around the quiz. Currently recognised values are ''free'' and ''seq''.',
  `shuffleanswers` smallint NOT NULL DEFAULT '0' COMMENT 'Whether the parts of the question should be shuffled, in those question types that support it.',
  `sumgrades` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The total of all the question instance maxmarks.',
  `grade` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The total that the quiz overall grade is scaled to be out of.',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'The time when the quiz was added to the course.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'Last modified time.',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A password that the student must enter before starting or continuing a quiz attempt.',
  `subnet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Used to restrict the IP addresses from which this quiz can be attempted. The format is as requried by the address_in_subnet function.',
  `browsersecurity` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Restriciton on the browser the student must use. E.g. ''securewindow''.',
  `delay1` int NOT NULL DEFAULT '0' COMMENT 'Delay that must be left between the first and second attempt, in seconds.',
  `delay2` int NOT NULL DEFAULT '0' COMMENT 'Delay that must be left between the second and subsequent attempt, in seconds.',
  `showuserpicture` smallint NOT NULL DEFAULT '0' COMMENT 'Option to show the user''s picture during the attempt and on the review page.',
  `showblocks` smallint NOT NULL DEFAULT '0' COMMENT 'Whether blocks should be shown on the attempt.php and review.php pages.',
  `completionattemptsexhausted` tinyint(1) DEFAULT '0',
  `completionminattempts` int NOT NULL DEFAULT '0',
  `allowofflineattempts` tinyint(1) DEFAULT '0' COMMENT 'Whether to allow the quiz to be attempted offline in the mobile app',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_attempts`
--

DROP TABLE IF EXISTS `quiz_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_attempts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quiz` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key reference to the quiz that was attempted.',
  `userid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key reference to the user whose attempt this is.',
  `attempt` int NOT NULL DEFAULT '0' COMMENT 'Sequentially numbers this student''s attempts at this quiz.',
  `uniqueid` int NOT NULL DEFAULT '0' COMMENT 'Foreign key reference to the question_usage that holds the details of the the question_attempts that make up this quiz attempt.',
  `layout` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentpage` int NOT NULL DEFAULT '0',
  `preview` tinyint NOT NULL DEFAULT '0',
  `state` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inprogress' COMMENT 'The current state of the attempts. ''inprogress'', ''overdue'', ''finished'' or ''abandoned''.',
  `timestart` int NOT NULL DEFAULT '0' COMMENT 'Time when the attempt was started.',
  `timefinish` int NOT NULL DEFAULT '0' COMMENT 'Time when the attempt was submitted. 0 if the attempt has not been submitted yet.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'Last modified time.',
  `timemodifiedoffline` int NOT NULL DEFAULT '0' COMMENT 'Last modified time via web services.',
  `timecheckstate` int DEFAULT '0' COMMENT 'Next time quiz cron should check attempt for state changes.  NULL means never check.',
  `sumgrades` decimal(10,5) DEFAULT NULL COMMENT 'Total marks for this attempt.',
  `gradednotificationsenttime` int DEFAULT NULL COMMENT 'The timestamp when the ''graded'' notification was sent.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueid` (`uniqueid`),
  UNIQUE KEY `quiz-userid-attempt` (`quiz`,`userid`,`attempt`),
  KEY `state-timecheckstate` (`state`,`timecheckstate`),
  KEY `quiz_attempts_userid_foreign` (`userid`),
  CONSTRAINT `quiz_attempts_quiz_foreign` FOREIGN KEY (`quiz`) REFERENCES `quiz` (`id`),
  CONSTRAINT `quiz_attempts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_feedback`
--

DROP TABLE IF EXISTS `quiz_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quizid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references quiz.id.',
  `feedbacktext` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The feedback to show for a attempt where mingrade <= attempt grade < maxgrade. See function quiz_feedback_for_grade in mod/quiz/locallib.php.',
  `feedbacktextformat` tinyint NOT NULL DEFAULT '0',
  `mingrade` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The lower limit of this grade band. Inclusive.',
  `maxgrade` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The upper limit of this grade band. Exclusive.',
  PRIMARY KEY (`id`),
  KEY `quiz_feedback_quizid_foreign` (`quizid`),
  CONSTRAINT `quiz_feedback_quizid_foreign` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_grade_items`
--

DROP TABLE IF EXISTS `quiz_grade_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_grade_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quizid` bigint NOT NULL,
  `sortorder` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `quizgraditem_quisor_uix` (`quizid`,`sortorder`),
  KEY `quizgraditem_qui_ix` (`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_grades`
--

DROP TABLE IF EXISTS `quiz_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quiz` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references quiz.id.',
  `userid` int NOT NULL DEFAULT '0' COMMENT 'Foreign key references user.id.',
  `grade` decimal(10,5) NOT NULL DEFAULT '0.00000' COMMENT 'The overall grade from the quiz. Not affected by overrides in the gradebook.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The last time this grade changed.',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `quiz_grades_quiz_foreign` (`quiz`),
  CONSTRAINT `quiz_grades_quiz_foreign` FOREIGN KEY (`quiz`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_overrides`
--

DROP TABLE IF EXISTS `quiz_overrides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_overrides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quiz` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references quiz.id',
  `groupid` bigint unsigned DEFAULT NULL COMMENT 'Foreign key references groups.id.  Can be null if this is a per-user override.',
  `userid` bigint unsigned DEFAULT NULL COMMENT 'Foreign key references user.id.  Can be null if this is a per-group override.',
  `timeopen` int DEFAULT NULL COMMENT 'Time at which students may start attempting this quiz. Can be null, in which case the quiz default is used.',
  `timeclose` int DEFAULT NULL COMMENT 'Time by which students must have completed their attempt.  Can be null, in which case the quiz default is used.',
  `timelimit` int DEFAULT NULL COMMENT 'Time limit in seconds.  Can be null, in which case the quiz default is used.',
  `attempts` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Quiz password.  Can be null, in which case the quiz default is used.',
  PRIMARY KEY (`id`),
  KEY `quiz_overrides_quiz_foreign` (`quiz`),
  KEY `quiz_overrides_groupid_foreign` (`groupid`),
  KEY `quiz_overrides_userid_foreign` (`userid`),
  CONSTRAINT `quiz_overrides_groupid_foreign` FOREIGN KEY (`groupid`) REFERENCES `groups` (`id`),
  CONSTRAINT `quiz_overrides_quiz_foreign` FOREIGN KEY (`quiz`) REFERENCES `quiz` (`id`),
  CONSTRAINT `quiz_overrides_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_overview_regrades`
--

DROP TABLE IF EXISTS `quiz_overview_regrades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_overview_regrades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `questionusageid` int NOT NULL COMMENT 'Foreign key references question_usages.id, or equivalently quiz_attempt.uniqueid.',
  `slot` int NOT NULL COMMENT 'Foreign key, references question_attempts.slot',
  `newfraction` decimal(12,7) DEFAULT NULL COMMENT 'The new fraction for this question_attempt after regrading.',
  `oldfraction` decimal(12,7) DEFAULT NULL COMMENT 'The previous fraction for this question_attempt.',
  `regraded` smallint NOT NULL COMMENT 'set to 0 if element has just been regraded. Set to 1 if element has been marked as needing regrading.',
  `timemodified` int NOT NULL COMMENT 'Timestamp of when this row was last modified.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_reports`
--

DROP TABLE IF EXISTS `quiz_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'name of the report, same as the directory name',
  `displayorder` int NOT NULL COMMENT 'display order for report tabs',
  `capability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Capability required to see this report. May be blank which means use the default of mod/quiz:viewreport. This is used when deciding which tabs to render.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_sections`
--

DROP TABLE IF EXISTS `quiz_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quizid` bigint unsigned NOT NULL COMMENT 'Foreign key references quiz.id.',
  `firstslot` int NOT NULL COMMENT 'Number of the first slot in the section. The section runs from here to the start of the next section, or the end of the quiz.',
  `heading` text COLLATE utf8mb4_unicode_ci COMMENT 'The text of the heading. May be an empty string/null. Multilang format.',
  `shufflequestions` smallint NOT NULL DEFAULT '0' COMMENT 'Whether the question order within this section should be shuffled for each attempt.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `quizid-firstslot` (`quizid`,`firstslot`),
  CONSTRAINT `quiz_sections_quizid_foreign` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_slots`
--

DROP TABLE IF EXISTS `quiz_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slot` int NOT NULL COMMENT 'Where this question comes in order in the list of questions in this quiz. Like question_attempts.slot.',
  `quizid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign key references quiz.id.',
  `page` int NOT NULL COMMENT 'The page number that this questions appears on. If the question in slot n appears on page p, then the question in slot n+1 must appear on page p or p+1. Well, except that when a quiz is being created, there may be empty pages, which would cause the page number to jump here.',
  `displaynumber` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Stores customised question number such as 1.2, A1, B12. If this is null, the default number is used.',
  `requireprevious` smallint NOT NULL DEFAULT '0' COMMENT 'Set to 1 when current question requires previous one to be answered first.',
  `maxmark` decimal(12,7) NOT NULL DEFAULT '0.0000000' COMMENT 'How many marks this question contributes to quiz.sumgrades.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `quizid-slot` (`quizid`,`slot`),
  CONSTRAINT `quiz_slots_quizid_foreign` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quiz_statistics`
--

DROP TABLE IF EXISTS `quiz_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hashcode` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1 hash of serialized qubaids_condition class. Unique for every combination of class name and property.',
  `whichattempts` smallint NOT NULL COMMENT 'bool used to indicate whether these stats are for all attempts or just for the first.',
  `timemodified` int NOT NULL,
  `firstattemptscount` int NOT NULL,
  `highestattemptscount` int NOT NULL,
  `lastattemptscount` int NOT NULL,
  `allattemptscount` int NOT NULL,
  `firstattemptsavg` decimal(15,5) DEFAULT NULL,
  `highestattemptsavg` decimal(15,5) DEFAULT NULL,
  `lastattemptsavg` decimal(15,5) DEFAULT NULL,
  `allattemptsavg` decimal(15,5) DEFAULT NULL,
  `median` decimal(15,5) DEFAULT NULL,
  `standarddeviation` decimal(15,5) DEFAULT NULL,
  `skewness` decimal(15,10) DEFAULT NULL,
  `kurtosis` decimal(15,5) DEFAULT NULL,
  `cic` decimal(15,10) DEFAULT NULL,
  `errorratio` decimal(15,10) DEFAULT NULL,
  `standarderror` decimal(15,10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quizaccess_seb_quizsettings`
--

DROP TABLE IF EXISTS `quizaccess_seb_quizsettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizaccess_seb_quizsettings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quizid` int NOT NULL COMMENT 'Foreign key to quiz id.',
  `cmid` int NOT NULL COMMENT 'Foreign key to course module id.',
  `templateid` bigint unsigned NOT NULL COMMENT 'Foreign key to quizaccess_seb_template.id.',
  `requiresafeexambrowser` tinyint(1) NOT NULL COMMENT 'Bool whether to require SEB.',
  `showsebtaskbar` tinyint(1) DEFAULT NULL COMMENT 'Bool to show SEB task bar',
  `showwificontrol` tinyint(1) DEFAULT NULL COMMENT 'Bool to allow user to control networking.',
  `showreloadbutton` tinyint(1) DEFAULT NULL COMMENT 'Bool to show reload button.',
  `showtime` tinyint(1) DEFAULT NULL COMMENT 'Bool to show the clock.',
  `showkeyboardlayout` tinyint(1) DEFAULT NULL COMMENT 'Bool to show keyboard layout.',
  `allowuserquitseb` tinyint(1) DEFAULT NULL COMMENT 'Bool to show quit button.',
  `quitpassword` text COLLATE utf8mb4_unicode_ci COMMENT 'Quit password to exit SEB.',
  `linkquitseb` text COLLATE utf8mb4_unicode_ci COMMENT 'Link to exit SEB.',
  `userconfirmquit` tinyint(1) DEFAULT NULL COMMENT 'Bool whether confirm quit popup should appear.',
  `enableaudiocontrol` tinyint(1) DEFAULT NULL COMMENT 'Bool to show volume and audio controls.',
  `muteonstartup` tinyint(1) DEFAULT NULL COMMENT 'Bool whether browser starts muted.',
  `allowspellchecking` tinyint(1) DEFAULT NULL COMMENT 'Bool whether spell checking will happen in SEB.',
  `allowreloadinexam` tinyint(1) DEFAULT NULL COMMENT 'Bool whether user can reload.',
  `activateurlfiltering` tinyint(1) DEFAULT NULL COMMENT 'Bool whether URLs will be filtered.',
  `filterembeddedcontent` tinyint(1) DEFAULT NULL COMMENT 'Bool wither embedded content will be filtered',
  `expressionsallowed` text COLLATE utf8mb4_unicode_ci COMMENT 'Comma or newline separated list of allowed expressions',
  `regexallowed` text COLLATE utf8mb4_unicode_ci COMMENT 'Regex of allowed URLs',
  `expressionsblocked` text COLLATE utf8mb4_unicode_ci COMMENT 'Comma or newline separated list of blocked expressions',
  `regexblocked` text COLLATE utf8mb4_unicode_ci COMMENT 'Regex of blocked URLs',
  `allowedbrowserexamkeys` text COLLATE utf8mb4_unicode_ci COMMENT 'List of allowed browser exam keys.',
  `showsebdownloadlink` tinyint(1) DEFAULT NULL COMMENT 'Bool whether SEB download link should appear',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `quizid` (`quizid`),
  UNIQUE KEY `cmid` (`cmid`),
  KEY `quizaccess_seb_quizsettings_templateid_foreign` (`templateid`),
  KEY `quizaccess_seb_quizsettings_usermodified_foreign` (`usermodified`),
  CONSTRAINT `quizaccess_seb_quizsettings_templateid_foreign` FOREIGN KEY (`templateid`) REFERENCES `quizaccess_seb_template` (`id`),
  CONSTRAINT `quizaccess_seb_quizsettings_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quizaccess_seb_template`
--

DROP TABLE IF EXISTS `quizaccess_seb_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizaccess_seb_template` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the template',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Content of the template',
  `enabled` tinyint(1) NOT NULL,
  `sortorder` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `quizaccess_seb_template_usermodified_foreign` (`usermodified`),
  CONSTRAINT `quizaccess_seb_template_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rating` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratingarea` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` int NOT NULL,
  `scaleid` bigint unsigned NOT NULL,
  `rating` int NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniqueuserrating` (`component`,`ratingarea`,`contextid`,`itemid`),
  KEY `rating_contextid_foreign` (`contextid`),
  KEY `rating_userid_foreign` (`userid`),
  KEY `rating_scaleid_foreign` (`scaleid`),
  CONSTRAINT `rating_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `rating_scaleid_foreign` FOREIGN KEY (`scaleid`) REFERENCES `scale` (`id`),
  CONSTRAINT `rating_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registration_hubs`
--

DROP TABLE IF EXISTS `registration_hubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration_hubs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the token to communicate with the hub by web service',
  `hubname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huburl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'the unique site identifier for this hub',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reportbuilder_audience`
--

DROP TABLE IF EXISTS `reportbuilder_audience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportbuilder_audience` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reportid` bigint unsigned NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `configdata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usercreated` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reportbuilder_audience_reportid_foreign` (`reportid`),
  KEY `reportbuilder_audience_usercreated_foreign` (`usercreated`),
  KEY `reportbuilder_audience_usermodified_foreign` (`usermodified`),
  CONSTRAINT `reportbuilder_audience_reportid_foreign` FOREIGN KEY (`reportid`) REFERENCES `reportbuilder_report` (`id`),
  CONSTRAINT `reportbuilder_audience_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_audience_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reportbuilder_column`
--

DROP TABLE IF EXISTS `reportbuilder_column`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportbuilder_column` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reportid` bigint unsigned NOT NULL DEFAULT '0',
  `uniqueidentifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregation` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `columnorder` int NOT NULL,
  `sortenabled` tinyint(1) NOT NULL DEFAULT '0',
  `sortdirection` tinyint(1) NOT NULL,
  `sortorder` int DEFAULT NULL,
  `usercreated` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reportbuilder_column_reportid_foreign` (`reportid`),
  KEY `reportbuilder_column_usercreated_foreign` (`usercreated`),
  KEY `reportbuilder_column_usermodified_foreign` (`usermodified`),
  CONSTRAINT `reportbuilder_column_reportid_foreign` FOREIGN KEY (`reportid`) REFERENCES `reportbuilder_report` (`id`),
  CONSTRAINT `reportbuilder_column_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_column_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reportbuilder_filter`
--

DROP TABLE IF EXISTS `reportbuilder_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportbuilder_filter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reportid` bigint unsigned NOT NULL DEFAULT '0',
  `uniqueidentifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iscondition` tinyint(1) NOT NULL DEFAULT '0',
  `filterorder` int NOT NULL,
  `usercreated` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `report-filter` (`reportid`,`uniqueidentifier`,`iscondition`),
  KEY `reportbuilder_filter_usercreated_foreign` (`usercreated`),
  KEY `reportbuilder_filter_usermodified_foreign` (`usermodified`),
  CONSTRAINT `reportbuilder_filter_reportid_foreign` FOREIGN KEY (`reportid`) REFERENCES `reportbuilder_report` (`id`),
  CONSTRAINT `reportbuilder_filter_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_filter_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reportbuilder_report`
--

DROP TABLE IF EXISTS `reportbuilder_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportbuilder_report` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `uniquerows` tinyint(1) NOT NULL DEFAULT '0',
  `conditiondata` text COLLATE utf8mb4_unicode_ci,
  `settingsdata` text COLLATE utf8mb4_unicode_ci,
  `contextid` bigint unsigned NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` int NOT NULL DEFAULT '0',
  `usercreated` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reportbuilder_report_usercreated_foreign` (`usercreated`),
  KEY `reportbuilder_report_usermodified_foreign` (`usermodified`),
  KEY `reportbuilder_report_contextid_foreign` (`contextid`),
  CONSTRAINT `reportbuilder_report_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `reportbuilder_report_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_report_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reportbuilder_schedule`
--

DROP TABLE IF EXISTS `reportbuilder_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportbuilder_schedule` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reportid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `audiences` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageformat` int NOT NULL,
  `userviewas` bigint unsigned NOT NULL DEFAULT '0',
  `timescheduled` int NOT NULL DEFAULT '0',
  `recurrence` int NOT NULL DEFAULT '0',
  `reportempty` int NOT NULL DEFAULT '0',
  `timelastsent` int NOT NULL DEFAULT '0',
  `timenextsend` int NOT NULL DEFAULT '0',
  `usercreated` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reportbuilder_schedule_reportid_foreign` (`reportid`),
  KEY `reportbuilder_schedule_userviewas_foreign` (`userviewas`),
  KEY `reportbuilder_schedule_usercreated_foreign` (`usercreated`),
  KEY `reportbuilder_schedule_usermodified_foreign` (`usermodified`),
  CONSTRAINT `reportbuilder_schedule_reportid_foreign` FOREIGN KEY (`reportid`) REFERENCES `reportbuilder_report` (`id`),
  CONSTRAINT `reportbuilder_schedule_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_schedule_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_schedule_userviewas_foreign` FOREIGN KEY (`userviewas`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reportbuilder_user_filter`
--

DROP TABLE IF EXISTS `reportbuilder_user_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportbuilder_user_filter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reportid` bigint unsigned NOT NULL DEFAULT '0',
  `filterdata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usercreated` bigint unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `report-user` (`reportid`,`usercreated`),
  KEY `reportbuilder_user_filter_usercreated_foreign` (`usercreated`),
  KEY `reportbuilder_user_filter_usermodified_foreign` (`usermodified`),
  CONSTRAINT `reportbuilder_user_filter_reportid_foreign` FOREIGN KEY (`reportid`) REFERENCES `reportbuilder_report` (`id`),
  CONSTRAINT `reportbuilder_user_filter_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`),
  CONSTRAINT `reportbuilder_user_filter_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `repository`
--

DROP TABLE IF EXISTS `repository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `sortorder` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `repository_instance_config`
--

DROP TABLE IF EXISTS `repository_instance_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository_instance_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instanceid` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `repository_instances`
--

DROP TABLE IF EXISTS `repository_instances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository_instances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeid` int NOT NULL,
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `contextid` bigint unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timecreated` int DEFAULT NULL,
  `timemodified` int DEFAULT NULL,
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `repository_instances_userid_foreign` (`userid`),
  KEY `repository_instances_contextid_foreign` (`contextid`),
  CONSTRAINT `repository_instances_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `repository_instances_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `repository_onedrive_access`
--

DROP TABLE IF EXISTS `repository_onedrive_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repository_onedrive_access` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timemodified` int NOT NULL,
  `timecreated` int NOT NULL,
  `usermodified` bigint unsigned NOT NULL,
  `permissionid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The permission id in OneDrive.',
  `itemid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The item id in OneDrive.',
  PRIMARY KEY (`id`),
  KEY `repository_onedrive_access_usermodified_foreign` (`usermodified`),
  CONSTRAINT `repository_onedrive_access_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resource` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `tobemigrated` smallint NOT NULL DEFAULT '0',
  `legacyfiles` smallint NOT NULL DEFAULT '0',
  `legacyfileslast` int DEFAULT NULL,
  `display` smallint NOT NULL DEFAULT '0',
  `displayoptions` text COLLATE utf8mb4_unicode_ci,
  `filterfiles` smallint NOT NULL DEFAULT '0',
  `revision` int NOT NULL DEFAULT '0' COMMENT 'incremented when after each file changes, solves browser caching issues',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `resource_old`
--

DROP TABLE IF EXISTS `resource_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resource_old` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `alltext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `popup` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timemodified` int NOT NULL DEFAULT '0',
  `oldid` int NOT NULL,
  `cmid` int DEFAULT NULL,
  `newmodule` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newid` int DEFAULT NULL,
  `migrated` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oldid` (`oldid`),
  KEY `cmid` (`cmid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Empty names are automatically localised',
  `shortname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Empty descriptions may be automatically localised',
  `sortorder` int NOT NULL DEFAULT '0',
  `archetype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Role archetype is used during install and role reset, marks admin role and helps in site settings',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sortorder` (`sortorder`),
  UNIQUE KEY `shortname` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_allow_assign`
--

DROP TABLE IF EXISTS `role_allow_assign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_allow_assign` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL DEFAULT '0',
  `allowassign` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleid-allowassign` (`roleid`,`allowassign`),
  KEY `role_allow_assign_allowassign_foreign` (`allowassign`),
  CONSTRAINT `role_allow_assign_allowassign_foreign` FOREIGN KEY (`allowassign`) REFERENCES `role` (`id`),
  CONSTRAINT `role_allow_assign_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_allow_override`
--

DROP TABLE IF EXISTS `role_allow_override`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_allow_override` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL DEFAULT '0',
  `allowoverride` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleid-allowoverride` (`roleid`,`allowoverride`),
  KEY `role_allow_override_allowoverride_foreign` (`allowoverride`),
  CONSTRAINT `role_allow_override_allowoverride_foreign` FOREIGN KEY (`allowoverride`) REFERENCES `role` (`id`),
  CONSTRAINT `role_allow_override_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_allow_switch`
--

DROP TABLE IF EXISTS `role_allow_switch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_allow_switch` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL COMMENT 'The role the user has.',
  `allowswitch` bigint unsigned NOT NULL COMMENT 'The id of a role that the user is allowed to switch to as a result of having this role.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleid-allowoverride` (`roleid`,`allowswitch`),
  KEY `role_allow_switch_allowswitch_foreign` (`allowswitch`),
  CONSTRAINT `role_allow_switch_allowswitch_foreign` FOREIGN KEY (`allowswitch`) REFERENCES `role` (`id`),
  CONSTRAINT `role_allow_switch_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_allow_view`
--

DROP TABLE IF EXISTS `role_allow_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_allow_view` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL COMMENT 'The role the user has.',
  `allowview` bigint unsigned NOT NULL COMMENT 'The id of a role that the user is allowed to view to as a result of having this role.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleid-allowview` (`roleid`,`allowview`),
  KEY `role_allow_view_allowview_foreign` (`allowview`),
  CONSTRAINT `role_allow_view_allowview_foreign` FOREIGN KEY (`allowview`) REFERENCES `role` (`id`),
  CONSTRAINT `role_allow_view_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_assignments`
--

DROP TABLE IF EXISTS `role_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_assignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL DEFAULT '0',
  `contextid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `modifierid` int NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'plugin responsible responsible for role assignment, empty when manually assigned',
  `itemid` int NOT NULL DEFAULT '0' COMMENT 'Id of enrolment/auth instance responsible for this role assignment',
  `sortorder` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sortorder` (`sortorder`),
  KEY `rolecontext` (`roleid`,`contextid`),
  KEY `usercontextrole` (`userid`,`contextid`,`roleid`),
  KEY `component-itemid-userid` (`component`,`itemid`,`userid`),
  KEY `role_assignments_contextid_foreign` (`contextid`),
  CONSTRAINT `role_assignments_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `role_assignments_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`),
  CONSTRAINT `role_assignments_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_capabilities`
--

DROP TABLE IF EXISTS `role_capabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_capabilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL DEFAULT '0',
  `roleid` bigint unsigned NOT NULL DEFAULT '0',
  `capability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `modifierid` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleid-contextid-capability` (`roleid`,`contextid`,`capability`),
  KEY `role_capabilities_contextid_foreign` (`contextid`),
  KEY `role_capabilities_modifierid_foreign` (`modifierid`),
  KEY `role_capabilities_capability_foreign` (`capability`),
  CONSTRAINT `role_capabilities_capability_foreign` FOREIGN KEY (`capability`) REFERENCES `capabilities` (`name`),
  CONSTRAINT `role_capabilities_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `role_capabilities_modifierid_foreign` FOREIGN KEY (`modifierid`) REFERENCES `users` (`id`),
  CONSTRAINT `role_capabilities_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_context_levels`
--

DROP TABLE IF EXISTS `role_context_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_context_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL,
  `contextlevel` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextlevel-roleid` (`contextlevel`,`roleid`),
  KEY `role_context_levels_roleid_foreign` (`roleid`),
  CONSTRAINT `role_context_levels_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role_names`
--

DROP TABLE IF EXISTS `role_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_names` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint unsigned NOT NULL DEFAULT '0',
  `contextid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleid-contextid` (`roleid`,`contextid`),
  KEY `role_names_contextid_foreign` (`contextid`),
  CONSTRAINT `role_names_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `role_names_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scale`
--

DROP TABLE IF EXISTS `scale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scale` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scale` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `scale_userid_foreign` (`userid`),
  CONSTRAINT `scale_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scale_history`
--

DROP TABLE IF EXISTS `scale_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scale_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` int NOT NULL DEFAULT '0' COMMENT 'created/modified/deleted constants',
  `oldid` bigint unsigned NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'What caused the modification? manual/module/import/...',
  `timemodified` int DEFAULT NULL COMMENT 'The last time this grade_item was modified',
  `loggeduser` bigint unsigned DEFAULT NULL COMMENT 'the userid of the person who last modified this outcome',
  `courseid` bigint unsigned NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scale` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `action` (`action`),
  KEY `timemodified` (`timemodified`),
  KEY `scale_history_oldid_foreign` (`oldid`),
  KEY `scale_history_courseid_foreign` (`courseid`),
  KEY `scale_history_loggeduser_foreign` (`loggeduser`),
  KEY `scale_history_userid_foreign` (`userid`),
  CONSTRAINT `scale_history_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  CONSTRAINT `scale_history_loggeduser_foreign` FOREIGN KEY (`loggeduser`) REFERENCES `users` (`id`),
  CONSTRAINT `scale_history_oldid_foreign` FOREIGN KEY (`oldid`) REFERENCES `scale` (`id`),
  CONSTRAINT `scale_history_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm`
--

DROP TABLE IF EXISTS `scorm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scormtype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'local' COMMENT 'local, external or repository',
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0',
  `version` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxgrade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `grademethod` tinyint NOT NULL DEFAULT '0',
  `whatgrade` int NOT NULL DEFAULT '0',
  `maxattempt` int NOT NULL DEFAULT '1',
  `forcecompleted` tinyint(1) NOT NULL DEFAULT '0',
  `forcenewattempt` tinyint(1) NOT NULL DEFAULT '0',
  `lastattemptlock` tinyint(1) NOT NULL DEFAULT '0',
  `masteryoverride` tinyint(1) NOT NULL DEFAULT '1',
  `displayattemptstatus` tinyint(1) NOT NULL DEFAULT '1',
  `displaycoursestructure` tinyint(1) NOT NULL DEFAULT '0',
  `updatefreq` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Define when the package must be automatically update',
  `sha1hash` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'package content or ext path hash',
  `md5hash` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MD5 Hash of package file',
  `revision` int NOT NULL DEFAULT '0' COMMENT 'revison number',
  `launch` int NOT NULL DEFAULT '0',
  `skipview` tinyint(1) NOT NULL DEFAULT '1',
  `hidebrowse` tinyint(1) NOT NULL DEFAULT '0',
  `hidetoc` tinyint(1) NOT NULL DEFAULT '0',
  `nav` tinyint(1) NOT NULL DEFAULT '1',
  `navpositionleft` int DEFAULT '-100',
  `navpositiontop` int DEFAULT '-100',
  `auto` tinyint(1) NOT NULL DEFAULT '0',
  `popup` tinyint(1) NOT NULL DEFAULT '0',
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int NOT NULL DEFAULT '100',
  `height` int NOT NULL DEFAULT '600',
  `timeopen` int NOT NULL DEFAULT '0',
  `timeclose` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `completionstatusrequired` tinyint(1) DEFAULT NULL,
  `completionscorerequired` int DEFAULT NULL,
  `completionstatusallscos` tinyint(1) DEFAULT NULL,
  `autocommit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_aicc_session`
--

DROP TABLE IF EXISTS `scorm_aicc_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_aicc_session` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'id from user table',
  `scormid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'id from scorm table',
  `hacpsession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sessionid used to authenticate AICC HACP communication',
  `scoid` int DEFAULT '0' COMMENT 'id from scorm_scoes table',
  `scormmode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scormstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempt` int DEFAULT NULL,
  `lessonstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessiontime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'time this session was created',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'time this session was last used',
  PRIMARY KEY (`id`),
  KEY `scorm_aicc_session_scormid_foreign` (`scormid`),
  KEY `scorm_aicc_session_userid_foreign` (`userid`),
  CONSTRAINT `scorm_aicc_session_scormid_foreign` FOREIGN KEY (`scormid`) REFERENCES `scorm` (`id`),
  CONSTRAINT `scorm_aicc_session_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_attempt`
--

DROP TABLE IF EXISTS `scorm_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_attempt` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `scormid` bigint unsigned NOT NULL COMMENT 'The id of the scorm table',
  `attempt` int NOT NULL DEFAULT '1' COMMENT 'The attempt number',
  PRIMARY KEY (`id`),
  KEY `scorm_attempt_userid_foreign` (`userid`),
  KEY `scorm_attempt_scormid_foreign` (`scormid`),
  CONSTRAINT `scorm_attempt_scormid_foreign` FOREIGN KEY (`scormid`) REFERENCES `scorm` (`id`),
  CONSTRAINT `scorm_attempt_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_element`
--

DROP TABLE IF EXISTS `scorm_element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_element` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `element` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of SCORM element',
  PRIMARY KEY (`id`),
  UNIQUE KEY `element` (`element`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_scoes`
--

DROP TABLE IF EXISTS `scorm_scoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_scoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scorm` bigint unsigned NOT NULL DEFAULT '0',
  `manifest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `launch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scormtype` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'order of scoes',
  PRIMARY KEY (`id`),
  KEY `scorm_scoes_scorm_foreign` (`scorm`),
  CONSTRAINT `scorm_scoes_scorm_foreign` FOREIGN KEY (`scorm`) REFERENCES `scorm` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_scoes_data`
--

DROP TABLE IF EXISTS `scorm_scoes_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_scoes_data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scorm_scoes_data_scoid_foreign` (`scoid`),
  CONSTRAINT `scorm_scoes_data_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_scoes_value`
--

DROP TABLE IF EXISTS `scorm_scoes_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_scoes_value` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL COMMENT 'The id of the scorm_scoes table',
  `attemptid` bigint unsigned NOT NULL COMMENT 'id from scorm_attempt',
  `elementid` bigint unsigned NOT NULL COMMENT 'id from scorm_element',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Value passed from SCORM package',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'Time value last changed.',
  PRIMARY KEY (`id`),
  KEY `scorm_scoes_value_scoid_foreign` (`scoid`),
  KEY `scorm_scoes_value_attemptid_foreign` (`attemptid`),
  KEY `scorm_scoes_value_elementid_foreign` (`elementid`),
  CONSTRAINT `scorm_scoes_value_attemptid_foreign` FOREIGN KEY (`attemptid`) REFERENCES `scorm_attempt` (`id`),
  CONSTRAINT `scorm_scoes_value_elementid_foreign` FOREIGN KEY (`elementid`) REFERENCES `scorm_element` (`id`),
  CONSTRAINT `scorm_scoes_value_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_seq_mapinfo`
--

DROP TABLE IF EXISTS `scorm_seq_mapinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_seq_mapinfo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `objectiveid` bigint unsigned NOT NULL DEFAULT '0',
  `targetobjectiveid` int NOT NULL DEFAULT '0',
  `readsatisfiedstatus` tinyint(1) NOT NULL DEFAULT '1',
  `readnormalizedmeasure` tinyint(1) NOT NULL DEFAULT '1',
  `writesatisfiedstatus` tinyint(1) NOT NULL DEFAULT '0',
  `writenormalizedmeasure` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `scorm_mapinfo_uniq` (`scoid`,`id`,`objectiveid`),
  KEY `scorm_seq_mapinfo_objectiveid_foreign` (`objectiveid`),
  CONSTRAINT `scorm_seq_mapinfo_objectiveid_foreign` FOREIGN KEY (`objectiveid`) REFERENCES `scorm_seq_objective` (`id`),
  CONSTRAINT `scorm_seq_mapinfo_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_seq_objective`
--

DROP TABLE IF EXISTS `scorm_seq_objective`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_seq_objective` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `primaryobj` tinyint(1) NOT NULL DEFAULT '0',
  `objectiveid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfiedbymeasure` tinyint(1) NOT NULL DEFAULT '1',
  `minnormalizedmeasure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `scorm_objective_uniq` (`scoid`,`id`),
  CONSTRAINT `scorm_seq_objective_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_seq_rolluprule`
--

DROP TABLE IF EXISTS `scorm_seq_rolluprule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_seq_rolluprule` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `childactivityset` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimumcount` int NOT NULL DEFAULT '0',
  `minimumpercent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `conditioncombination` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all',
  `action` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scorm_rolluprule_uniq` (`scoid`,`id`),
  CONSTRAINT `scorm_seq_rolluprule_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_seq_rolluprulecond`
--

DROP TABLE IF EXISTS `scorm_seq_rolluprulecond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_seq_rolluprulecond` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `rollupruleid` bigint unsigned NOT NULL DEFAULT '0',
  `operator` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noOp',
  `cond` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scorm_rulluprulecond_uniq` (`scoid`,`rollupruleid`,`id`),
  KEY `scorm_seq_rolluprulecond_rollupruleid_foreign` (`rollupruleid`),
  CONSTRAINT `scorm_seq_rolluprulecond_rollupruleid_foreign` FOREIGN KEY (`rollupruleid`) REFERENCES `scorm_seq_rolluprule` (`id`),
  CONSTRAINT `scorm_seq_rolluprulecond_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_seq_rulecond`
--

DROP TABLE IF EXISTS `scorm_seq_rulecond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_seq_rulecond` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `ruleconditionsid` bigint unsigned NOT NULL DEFAULT '0',
  `refrencedobjective` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measurethreshold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `operator` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noOp',
  `cond` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'always',
  PRIMARY KEY (`id`),
  UNIQUE KEY `scorm_rulecond_uniq` (`id`,`scoid`,`ruleconditionsid`),
  KEY `scorm_seq_rulecond_scoid_foreign` (`scoid`),
  KEY `scorm_seq_rulecond_ruleconditionsid_foreign` (`ruleconditionsid`),
  CONSTRAINT `scorm_seq_rulecond_ruleconditionsid_foreign` FOREIGN KEY (`ruleconditionsid`) REFERENCES `scorm_seq_ruleconds` (`id`),
  CONSTRAINT `scorm_seq_rulecond_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scorm_seq_ruleconds`
--

DROP TABLE IF EXISTS `scorm_seq_ruleconds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scorm_seq_ruleconds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint unsigned NOT NULL DEFAULT '0',
  `conditioncombination` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all',
  `ruletype` tinyint NOT NULL DEFAULT '0',
  `action` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scorm_ruleconds_un` (`scoid`,`id`),
  CONSTRAINT `scorm_seq_ruleconds_scoid_foreign` FOREIGN KEY (`scoid`) REFERENCES `scorm_scoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `search_index_requests`
--

DROP TABLE IF EXISTS `search_index_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_index_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint unsigned NOT NULL COMMENT 'Context ID that has been requested for reindexing.',
  `searcharea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Set (e.g. ''forum-post'') if a specific area is to be reindexed. Blank indicates all areas.',
  `timerequested` int NOT NULL COMMENT 'Time at which this index update was requested.',
  `partialarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'If processing of this context partially completed, set to the area that needs processing next. Blank indicates not processed yet.',
  `partialtime` int NOT NULL COMMENT 'If processing partially completed, set to the timestamp within the next area where processing should start. 0 indicates not processed yet.',
  `indexpriority` int NOT NULL COMMENT 'Priority value so that important requests can be dealt with first; higher numbers are processed first',
  PRIMARY KEY (`id`),
  KEY `indexprioritytimerequested` (`indexpriority`,`timerequested`),
  KEY `search_index_requests_contextid_foreign` (`contextid`),
  CONSTRAINT `search_index_requests_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `search_simpledb_index`
--

DROP TABLE IF EXISTS `search_simpledb_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_simpledb_index` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `docid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `contextid` int NOT NULL,
  `areaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `courseid` int NOT NULL,
  `owneruserid` int DEFAULT NULL,
  `modified` int NOT NULL,
  `userid` int DEFAULT NULL,
  `description1` text COLLATE utf8mb4_unicode_ci,
  `description2` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `docid` (`docid`),
  KEY `owneruserid-contextid` (`owneruserid`,`contextid`),
  KEY `contextid` (`contextid`),
  KEY `courseid` (`courseid`),
  KEY `areaid` (`areaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shortlink`
--

DROP TABLE IF EXISTS `shortlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shortlink` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortcode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linktype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(1333) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortcode_userid` (`userid`,`shortcode`),
  KEY `shortlink_shortcode_index` (`shortcode`),
  CONSTRAINT `shortlink_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sms_gateways`
--

DROP TABLE IF EXISTS `sms_gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_gateways` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint unsigned NOT NULL DEFAULT '1',
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sms_messages`
--

DROP TABLE IF EXISTS `sms_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `recipientnumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messagetype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipientuserid` bigint unsigned DEFAULT NULL,
  `issensitive` tinyint unsigned NOT NULL DEFAULT '0',
  `gatewayid` bigint unsigned DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timecreated` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sms_messages_gatewayid_foreign` (`gatewayid`),
  CONSTRAINT `sms_messages_gatewayid_foreign` FOREIGN KEY (`gatewayid`) REFERENCES `sms_gateways` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats_daily`
--

DROP TABLE IF EXISTS `stats_daily`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats_daily` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0' COMMENT 'id of role for the aggregates',
  `stattype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activity' COMMENT 'type of stat',
  `stat1` int NOT NULL DEFAULT '0' COMMENT 'stat1. usually used for reads',
  `stat2` int NOT NULL DEFAULT '0' COMMENT 'stat2. usually used for writes.',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `timeend` (`timeend`),
  KEY `roleid` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats_monthly`
--

DROP TABLE IF EXISTS `stats_monthly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats_monthly` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0' COMMENT 'id of role for the aggregates',
  `stattype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activity' COMMENT 'type of stat',
  `stat1` int NOT NULL DEFAULT '0' COMMENT 'stat1. usually used for reads',
  `stat2` int NOT NULL DEFAULT '0' COMMENT 'stat2. usually used for writes.',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `timeend` (`timeend`),
  KEY `roleid` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats_user_daily`
--

DROP TABLE IF EXISTS `stats_user_daily`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats_user_daily` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `statsreads` int NOT NULL DEFAULT '0',
  `statswrites` int NOT NULL DEFAULT '0',
  `stattype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `userid` (`userid`),
  KEY `roleid` (`roleid`),
  KEY `timeend` (`timeend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats_user_monthly`
--

DROP TABLE IF EXISTS `stats_user_monthly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats_user_monthly` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `statsreads` int NOT NULL DEFAULT '0',
  `statswrites` int NOT NULL DEFAULT '0',
  `stattype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `userid` (`userid`),
  KEY `roleid` (`roleid`),
  KEY `timeend` (`timeend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats_user_weekly`
--

DROP TABLE IF EXISTS `stats_user_weekly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats_user_weekly` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `statsreads` int NOT NULL DEFAULT '0',
  `statswrites` int NOT NULL DEFAULT '0',
  `stattype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `userid` (`userid`),
  KEY `roleid` (`roleid`),
  KEY `timeend` (`timeend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats_weekly`
--

DROP TABLE IF EXISTS `stats_weekly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats_weekly` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0' COMMENT 'id of role for the aggregates',
  `stattype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activity' COMMENT 'type of stat',
  `stat1` int NOT NULL DEFAULT '0' COMMENT 'stat1. usually used for reads',
  `stat2` int NOT NULL DEFAULT '0' COMMENT 'stat2. usually used for writes.',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `timeend` (`timeend`),
  KEY `roleid` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stored_progress`
--

DROP TABLE IF EXISTS `stored_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stored_progress` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestart` bigint unsigned DEFAULT NULL,
  `lastupdate` bigint unsigned DEFAULT NULL,
  `percentcompleted` decimal(5,2) DEFAULT '0.00',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haserrored` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid_index` (`idnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subsection`
--

DROP TABLE IF EXISTS `subsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subsection` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint NOT NULL DEFAULT '0',
  `name` varchar(1333) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timemodified` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subs_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `template` int NOT NULL DEFAULT '0',
  `days` int NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'intro text field format',
  `questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completionsubmit` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this field is set to 1, then the activity will be automatically marked as ''complete'' once the user submits the survey.',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `survey_analysis`
--

DROP TABLE IF EXISTS `survey_analysis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_analysis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `survey` bigint unsigned NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `survey_analysis_survey_foreign` (`survey`),
  CONSTRAINT `survey_analysis_survey_foreign` FOREIGN KEY (`survey`) REFERENCES `survey` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `survey_answers`
--

DROP TABLE IF EXISTS `survey_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `survey` bigint unsigned NOT NULL DEFAULT '0',
  `question` bigint unsigned NOT NULL DEFAULT '0',
  `time` int NOT NULL DEFAULT '0',
  `answer1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `survey_answers_survey_foreign` (`survey`),
  KEY `survey_answers_question_foreign` (`question`),
  CONSTRAINT `survey_answers_question_foreign` FOREIGN KEY (`question`) REFERENCES `survey_questions` (`id`),
  CONSTRAINT `survey_answers_survey_foreign` FOREIGN KEY (`survey`) REFERENCES `survey` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `survey_questions`
--

DROP TABLE IF EXISTS `survey_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shorttext` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `options` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `tagcollid` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rawname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The raw, unnormalised name for the tag as entered by users',
  `isstandard` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this tag is standard',
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `flag` smallint DEFAULT '0' COMMENT 'a tag can be ''flagged'' as inappropriate',
  `timemodified` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tagcollname` (`tagcollid`,`name`),
  KEY `tagcolltype` (`tagcollid`,`isstandard`),
  KEY `tag_userid_foreign` (`userid`),
  CONSTRAINT `tag_tagcollid_foreign` FOREIGN KEY (`tagcollid`) REFERENCES `tag_coll` (`id`),
  CONSTRAINT `tag_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_area`
--

DROP TABLE IF EXISTS `tag_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag_area` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemtype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `tagcollid` bigint unsigned NOT NULL,
  `callback` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callbackfile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showstandard` tinyint(1) NOT NULL DEFAULT '0',
  `multiplecontexts` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the tag area allows tag instances to be created in multiple contexts.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `compitemtype` (`component`,`itemtype`),
  KEY `tag_area_tagcollid_foreign` (`tagcollid`),
  CONSTRAINT `tag_area_tagcollid_foreign` FOREIGN KEY (`tagcollid`) REFERENCES `tag_coll` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_coll`
--

DROP TABLE IF EXISTS `tag_coll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag_coll` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdefault` tinyint NOT NULL DEFAULT '0',
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sortorder` smallint NOT NULL DEFAULT '0',
  `searchable` tinyint NOT NULL DEFAULT '1' COMMENT 'Whether the tag collection is searchable',
  `customurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom URL for the tag page instead of /tag/index.php',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_correlation`
--

DROP TABLE IF EXISTS `tag_correlation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag_correlation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tagid` bigint unsigned NOT NULL,
  `correlatedtags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_correlation_tagid_foreign` (`tagid`),
  CONSTRAINT `tag_correlation_tagid_foreign` FOREIGN KEY (`tagid`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_instance`
--

DROP TABLE IF EXISTS `tag_instance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag_instance` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tagid` bigint unsigned NOT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Defines the Moodle component which the tag was added to',
  `itemtype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemid` int NOT NULL,
  `contextid` bigint unsigned DEFAULT NULL COMMENT 'The context id of the item that was tagged',
  `tiuserid` int NOT NULL DEFAULT '0',
  `ordering` int DEFAULT NULL COMMENT 'Maintains the order of the tag instances of an item',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'timemodified',
  PRIMARY KEY (`id`),
  UNIQUE KEY `taggeditem` (`component`,`itemtype`,`itemid`,`contextid`,`tiuserid`,`tagid`),
  KEY `taglookup` (`itemtype`,`component`,`tagid`,`contextid`),
  KEY `tag_instance_tagid_foreign` (`tagid`),
  KEY `tag_instance_contextid_foreign` (`contextid`),
  CONSTRAINT `tag_instance_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `tag_instance_tagid_foreign` FOREIGN KEY (`tagid`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `task_adhoc`
--

DROP TABLE IF EXISTS `task_adhoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_adhoc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The component that triggered this adhoc task.',
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the class extending adhoc_task to run when this task is executed.',
  `nextruntime` int NOT NULL,
  `faildelay` int DEFAULT NULL,
  `customdata` text COLLATE utf8mb4_unicode_ci COMMENT 'Custom data to be passed to the adhoc task. Must be serialisable using json_encode()',
  `userid` bigint unsigned DEFAULT NULL,
  `blocking` tinyint NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'Timestamp of adhoc task creation',
  `timestarted` int DEFAULT NULL COMMENT 'Time when the task was started',
  `hostname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hostname where the task is running',
  `pid` int DEFAULT NULL COMMENT 'PHP process ID that is running the task',
  PRIMARY KEY (`id`),
  KEY `nextruntime_idx` (`nextruntime`),
  KEY `timestarted_idx` (`timestarted`),
  KEY `task_adhoc_userid_foreign` (`userid`),
  CONSTRAINT `task_adhoc_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `task_log`
--

DROP TABLE IF EXISTS `task_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` smallint NOT NULL COMMENT 'The type of task. Scheduled task = 0; Adhoc task = 1.',
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The component that the task belongs to',
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The class of the task being run',
  `userid` bigint unsigned NOT NULL COMMENT 'The userid that the task was configured to run as (Adhoc tasks only)',
  `timestart` decimal(20,10) NOT NULL COMMENT 'The start time of the task',
  `timeend` decimal(20,10) NOT NULL COMMENT 'The end time of the task',
  `dbreads` int NOT NULL COMMENT 'The number of DB reads performed during the task.',
  `dbwrites` int NOT NULL COMMENT 'The number of DB writes performed during the task.',
  `result` tinyint NOT NULL COMMENT 'Whether the task was successful or not. 0 = pass; 1 = fail.',
  `output` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hostname where the task was executed',
  `pid` int DEFAULT NULL COMMENT 'PHP process ID that was running the task',
  PRIMARY KEY (`id`),
  KEY `classname` (`classname`),
  KEY `timestart` (`timestart`),
  KEY `task_log_userid_foreign` (`userid`),
  CONSTRAINT `task_log_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `task_scheduled`
--

DROP TABLE IF EXISTS `task_scheduled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_scheduled` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The component this scheduled task belongs to.',
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The class extending scheduled_task to be called when running this task.',
  `lastruntime` int DEFAULT NULL,
  `nextruntime` int DEFAULT NULL,
  `blocking` tinyint NOT NULL DEFAULT '0' COMMENT 'Block the entire cron when this task is running.',
  `minute` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dayofweek` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faildelay` int DEFAULT NULL,
  `customised` tinyint NOT NULL DEFAULT '0' COMMENT 'Used on upgrades to prevent overwriting custom schedules.',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 means do not run from cron',
  `timestarted` int DEFAULT NULL COMMENT 'Time when the task was started',
  `hostname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hostname where the task is running',
  `pid` int DEFAULT NULL COMMENT 'PHP process ID that is running the task',
  PRIMARY KEY (`id`),
  UNIQUE KEY `classname_uniq` (`classname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiny_autosave`
--

DROP TABLE IF EXISTS `tiny_autosave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiny_autosave` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `elementid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The unique id for the text editor in the form.',
  `contextid` int NOT NULL COMMENT 'The contextid that the form was loaded with.',
  `pagehash` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The HTML DOM id of the page that loaded the form.',
  `userid` int NOT NULL COMMENT 'The id of the user that loaded the form.',
  `drafttext` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The draft text',
  `draftid` int DEFAULT NULL COMMENT 'Optional draft area id containing draft files.',
  `pageinstance` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The browser tab instance that last saved the draft text. This is to prevent multiple tabs from the same user saving different text alternately.',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'Store the last modified time for the auto save text.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `autosave_uniq_key` (`elementid`,`contextid`,`userid`,`pagehash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_areas`
--

DROP TABLE IF EXISTS `tool_brickfield_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL DEFAULT '0',
  `contextid` bigint unsigned DEFAULT NULL,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tablename` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fieldorarea` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemid` int DEFAULT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `reftable` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refid` int DEFAULT NULL,
  `cmid` bigint unsigned DEFAULT NULL,
  `courseid` bigint unsigned DEFAULT NULL,
  `categoryid` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coursecm` (`courseid`,`cmid`),
  KEY `tablefield` (`type`,`tablename`,`itemid`,`fieldorarea`),
  KEY `file` (`type`,`contextid`,`component`,`fieldorarea`,`itemid`),
  KEY `reftable` (`reftable`,`refid`,`type`),
  KEY `tool_brickfield_areas_cmid_foreign` (`cmid`),
  KEY `tool_brickfield_areas_categoryid_foreign` (`categoryid`),
  KEY `tool_brickfield_areas_contextid_foreign` (`contextid`),
  CONSTRAINT `tool_brickfield_areas_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `course_categories` (`id`),
  CONSTRAINT `tool_brickfield_areas_cmid_foreign` FOREIGN KEY (`cmid`) REFERENCES `course_modules` (`id`),
  CONSTRAINT `tool_brickfield_areas_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `tool_brickfield_areas_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_cache_acts`
--

DROP TABLE IF EXISTS `tool_brickfield_cache_acts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_cache_acts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `component` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalactivities` int DEFAULT NULL,
  `failedactivities` int DEFAULT NULL,
  `passedactivities` int DEFAULT NULL,
  `errorcount` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `tool_brickfield_cache_acts_courseid_foreign` (`courseid`),
  CONSTRAINT `tool_brickfield_cache_acts_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_cache_check`
--

DROP TABLE IF EXISTS `tool_brickfield_cache_check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_cache_check` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `checkid` int DEFAULT NULL,
  `checkcount` int DEFAULT NULL,
  `errorcount` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `errorcount` (`errorcount`),
  KEY `tool_brickfield_cache_check_courseid_foreign` (`courseid`),
  CONSTRAINT `tool_brickfield_cache_check_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_checks`
--

DROP TABLE IF EXISTS `tool_brickfield_checks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_checks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `checktype` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkgroup` bigint DEFAULT '0' COMMENT 'The group category identifier.',
  `status` smallint NOT NULL,
  `severity` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `checktype` (`checktype`),
  KEY `checkgroup` (`checkgroup`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_content`
--

DROP TABLE IF EXISTS `tool_brickfield_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_content` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `areaid` bigint unsigned NOT NULL,
  `contenthash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iscurrent` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 - needs checking, -1 in progress, 1 checked',
  `timecreated` int NOT NULL,
  `timechecked` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `iscurrent` (`iscurrent`,`areaid`),
  KEY `tool_brickfield_content_areaid_foreign` (`areaid`),
  CONSTRAINT `tool_brickfield_content_areaid_foreign` FOREIGN KEY (`areaid`) REFERENCES `tool_brickfield_areas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_errors`
--

DROP TABLE IF EXISTS `tool_brickfield_errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_errors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `resultid` bigint unsigned NOT NULL,
  `linenumber` int NOT NULL DEFAULT '0',
  `errordata` text COLLATE utf8mb4_unicode_ci,
  `htmlcode` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `tool_brickfield_errors_resultid_foreign` (`resultid`),
  CONSTRAINT `tool_brickfield_errors_resultid_foreign` FOREIGN KEY (`resultid`) REFERENCES `tool_brickfield_results` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_process`
--

DROP TABLE IF EXISTS `tool_brickfield_process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_process` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL,
  `item` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The item for process action.',
  `contextid` int DEFAULT NULL,
  `innercontextid` int DEFAULT NULL,
  `timecreated` bigint DEFAULT NULL,
  `timecompleted` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timecompleted` (`timecompleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_results`
--

DROP TABLE IF EXISTS `tool_brickfield_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contentid` bigint unsigned DEFAULT NULL,
  `checkid` bigint unsigned NOT NULL,
  `errorcount` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `areacheck` (`contentid`,`checkid`),
  KEY `tool_brickfield_results_checkid_foreign` (`checkid`),
  CONSTRAINT `tool_brickfield_results_checkid_foreign` FOREIGN KEY (`checkid`) REFERENCES `tool_brickfield_checks` (`id`),
  CONSTRAINT `tool_brickfield_results_contentid_foreign` FOREIGN KEY (`contentid`) REFERENCES `tool_brickfield_content` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_schedule`
--

DROP TABLE IF EXISTS `tool_brickfield_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_schedule` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextlevel` int NOT NULL DEFAULT '50' COMMENT 'The context level for this item. Defaults to CONTEXT_COURSE.',
  `instanceid` int NOT NULL COMMENT 'The id of the specific context instance. Course id for courses.',
  `contextid` int DEFAULT NULL COMMENT 'Id of the specific context record.',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT 'The schedule status for this item. 0 = not requested; 1 = requested; 2 = analyzed.',
  `timeanalyzed` int DEFAULT '0' COMMENT 'The most recent time the item was analyzed by scheduler.',
  `timemodified` int DEFAULT '0' COMMENT 'Time stamp of the last record update.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseidx` (`contextlevel`,`instanceid`),
  KEY `statusidx` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_brickfield_summary`
--

DROP TABLE IF EXISTS `tool_brickfield_summary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_brickfield_summary` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `activities` int DEFAULT NULL,
  `activitiespassed` int DEFAULT NULL,
  `activitiesfailed` int DEFAULT NULL,
  `errorschecktype1` int DEFAULT NULL,
  `errorschecktype2` int DEFAULT NULL,
  `errorschecktype3` int DEFAULT NULL,
  `errorschecktype4` int DEFAULT NULL,
  `errorschecktype5` int DEFAULT NULL,
  `errorschecktype6` int DEFAULT NULL,
  `errorschecktype7` int DEFAULT NULL,
  `failedchecktype1` int DEFAULT NULL,
  `failedchecktype2` int DEFAULT NULL,
  `failedchecktype3` int DEFAULT NULL,
  `failedchecktype4` int DEFAULT NULL,
  `failedchecktype5` int DEFAULT NULL,
  `failedchecktype6` int DEFAULT NULL,
  `failedchecktype7` int DEFAULT NULL,
  `percentchecktype1` int DEFAULT NULL,
  `percentchecktype2` int DEFAULT NULL,
  `percentchecktype3` int DEFAULT NULL,
  `percentchecktype4` int DEFAULT NULL,
  `percentchecktype5` int DEFAULT NULL,
  `percentchecktype6` int DEFAULT NULL,
  `percentchecktype7` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `tool_brickfield_summary_courseid_foreign` (`courseid`),
  CONSTRAINT `tool_brickfield_summary_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_cohortroles`
--

DROP TABLE IF EXISTS `tool_cohortroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_cohortroles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cohortid` int NOT NULL COMMENT 'The cohort to sync',
  `roleid` int NOT NULL COMMENT 'The role to assign',
  `userid` int NOT NULL COMMENT 'The user to sync',
  `timecreated` int NOT NULL COMMENT 'The time this record was created',
  `timemodified` int NOT NULL COMMENT 'The time this record was modified.',
  `usermodified` int DEFAULT NULL COMMENT 'Who last modified this record?',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cohortuserrole` (`cohortid`,`roleid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_customlang`
--

DROP TABLE IF EXISTS `tool_customlang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_customlang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The code of the language this string belongs to. Like en, cs or es',
  `componentid` bigint unsigned NOT NULL COMMENT 'The id of the component',
  `stringid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The identifier of the string',
  `original` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'English original of the string',
  `master` text COLLATE utf8mb4_unicode_ci COMMENT 'Master translation of the string as is distributed in the official lang pack, null if not translated',
  `local` text COLLATE utf8mb4_unicode_ci COMMENT 'Local customization of the string, null if not customized',
  `timemodified` int NOT NULL COMMENT 'The timestamp of when the original or master was recently modified',
  `timecustomized` int DEFAULT NULL COMMENT 'The timestamp of when the value of the local translation was recently modified, null if not customized yet',
  `outdated` tinyint DEFAULT '0' COMMENT 'Either the English original or the master translation changed and the customization may be outdated',
  `modified` tinyint DEFAULT '0' COMMENT 'Has the string been modified via the translator?',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_lang_component_string` (`lang`,`componentid`,`stringid`),
  KEY `tool_customlang_componentid_foreign` (`componentid`),
  CONSTRAINT `tool_customlang_componentid_foreign` FOREIGN KEY (`componentid`) REFERENCES `tool_customlang_components` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_customlang_components`
--

DROP TABLE IF EXISTS `tool_customlang_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_customlang_components` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The normalized name of the plugin',
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The checked out version of the plugin, null if the version is unknown',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_category`
--

DROP TABLE IF EXISTS `tool_dataprivacy_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint(1) DEFAULT NULL,
  `usermodified` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_contextlist`
--

DROP TABLE IF EXISTS `tool_dataprivacy_contextlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_contextlist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Frankenstyle component name',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_ctxexpired`
--

DROP TABLE IF EXISTS `tool_dataprivacy_ctxexpired`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_ctxexpired` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` int NOT NULL,
  `unexpiredroles` text COLLATE utf8mb4_unicode_ci COMMENT 'Roles which have explicitly not expired yet.',
  `expiredroles` text COLLATE utf8mb4_unicode_ci COMMENT 'Explicitly expires roles',
  `defaultexpired` tinyint(1) NOT NULL COMMENT 'The default retention period has passed.',
  `status` tinyint NOT NULL DEFAULT '0',
  `usermodified` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextid` (`contextid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_ctxinstance`
--

DROP TABLE IF EXISTS `tool_dataprivacy_ctxinstance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_ctxinstance` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` int NOT NULL,
  `purposeid` bigint unsigned DEFAULT NULL,
  `categoryid` bigint unsigned DEFAULT NULL,
  `usermodified` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextid` (`contextid`),
  KEY `tool_dataprivacy_ctxinstance_purposeid_foreign` (`purposeid`),
  KEY `tool_dataprivacy_ctxinstance_categoryid_foreign` (`categoryid`),
  CONSTRAINT `tool_dataprivacy_ctxinstance_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `tool_dataprivacy_category` (`id`),
  CONSTRAINT `tool_dataprivacy_ctxinstance_purposeid_foreign` FOREIGN KEY (`purposeid`) REFERENCES `tool_dataprivacy_purpose` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_ctxlevel`
--

DROP TABLE IF EXISTS `tool_dataprivacy_ctxlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_ctxlevel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextlevel` tinyint NOT NULL,
  `purposeid` bigint unsigned DEFAULT NULL,
  `categoryid` bigint unsigned DEFAULT NULL,
  `usermodified` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contextlevel` (`contextlevel`),
  KEY `tool_dataprivacy_ctxlevel_categoryid_foreign` (`categoryid`),
  KEY `tool_dataprivacy_ctxlevel_purposeid_foreign` (`purposeid`),
  CONSTRAINT `tool_dataprivacy_ctxlevel_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `tool_dataprivacy_category` (`id`),
  CONSTRAINT `tool_dataprivacy_ctxlevel_purposeid_foreign` FOREIGN KEY (`purposeid`) REFERENCES `tool_dataprivacy_purpose` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_ctxlst_ctx`
--

DROP TABLE IF EXISTS `tool_dataprivacy_ctxlst_ctx`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_ctxlst_ctx` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contextid` int NOT NULL,
  `contextlistid` bigint unsigned NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT 'Approval status of the context item',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tool_dataprivacy_ctxlst_ctx_contextlistid_foreign` (`contextlistid`),
  CONSTRAINT `tool_dataprivacy_ctxlst_ctx_contextlistid_foreign` FOREIGN KEY (`contextlistid`) REFERENCES `tool_dataprivacy_contextlist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_purpose`
--

DROP TABLE IF EXISTS `tool_dataprivacy_purpose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_purpose` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint(1) DEFAULT NULL,
  `lawfulbases` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Comma-separated IDs matching records in tool_dataprivacy_lawfulbasis',
  `sensitivedatareasons` text COLLATE utf8mb4_unicode_ci COMMENT 'Comma-separated IDs matching records in tool_dataprivacy_sensitive',
  `retentionperiod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protected` tinyint(1) DEFAULT NULL,
  `usermodified` int NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_purposerole`
--

DROP TABLE IF EXISTS `tool_dataprivacy_purposerole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_purposerole` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purposeid` bigint unsigned NOT NULL,
  `roleid` bigint unsigned NOT NULL,
  `lawfulbases` text COLLATE utf8mb4_unicode_ci,
  `sensitivedatareasons` text COLLATE utf8mb4_unicode_ci,
  `retentionperiod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protected` tinyint(1) DEFAULT NULL,
  `usermodified` bigint unsigned NOT NULL,
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purposerole` (`purposeid`,`roleid`),
  KEY `tool_dataprivacy_purposerole_roleid_foreign` (`roleid`),
  KEY `tool_dataprivacy_purposerole_usermodified_foreign` (`usermodified`),
  CONSTRAINT `tool_dataprivacy_purposerole_purposeid_foreign` FOREIGN KEY (`purposeid`) REFERENCES `tool_dataprivacy_purpose` (`id`),
  CONSTRAINT `tool_dataprivacy_purposerole_roleid_foreign` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`),
  CONSTRAINT `tool_dataprivacy_purposerole_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_request`
--

DROP TABLE IF EXISTS `tool_dataprivacy_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_request` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL DEFAULT '0' COMMENT 'Data request type',
  `comments` text COLLATE utf8mb4_unicode_ci COMMENT 'More details about the request',
  `commentsformat` tinyint NOT NULL DEFAULT '0',
  `userid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'The user ID the request is being made for',
  `requestedby` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'The user ID of the one making the request',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT 'The current status of the data request',
  `dpo` bigint unsigned DEFAULT '0' COMMENT 'The user ID of the Data Protection Officer who is reviewing th request',
  `dpocomment` text COLLATE utf8mb4_unicode_ci COMMENT 'DPO''s comments (e.g. reason for rejecting the request, etc.)',
  `dpocommentformat` tinyint NOT NULL DEFAULT '0',
  `systemapproved` smallint NOT NULL DEFAULT '0',
  `usermodified` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'The user who created/modified this request object',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'The time this data request was created',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'The last time this data request was updated',
  `creationmethod` int NOT NULL DEFAULT '0' COMMENT 'The type of the creation method of the data request',
  PRIMARY KEY (`id`),
  KEY `tool_dataprivacy_request_userid_foreign` (`userid`),
  KEY `tool_dataprivacy_request_requestedby_foreign` (`requestedby`),
  KEY `tool_dataprivacy_request_dpo_foreign` (`dpo`),
  KEY `tool_dataprivacy_request_usermodified_foreign` (`usermodified`),
  CONSTRAINT `tool_dataprivacy_request_dpo_foreign` FOREIGN KEY (`dpo`) REFERENCES `users` (`id`),
  CONSTRAINT `tool_dataprivacy_request_requestedby_foreign` FOREIGN KEY (`requestedby`) REFERENCES `users` (`id`),
  CONSTRAINT `tool_dataprivacy_request_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `tool_dataprivacy_request_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_dataprivacy_rqst_ctxlst`
--

DROP TABLE IF EXISTS `tool_dataprivacy_rqst_ctxlst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_dataprivacy_rqst_ctxlst` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `requestid` bigint unsigned NOT NULL,
  `contextlistid` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `requestidcontextlistid` (`requestid`,`contextlistid`),
  KEY `tool_dataprivacy_rqst_ctxlst_contextlistid_foreign` (`contextlistid`),
  CONSTRAINT `tool_dataprivacy_rqst_ctxlst_contextlistid_foreign` FOREIGN KEY (`contextlistid`) REFERENCES `tool_dataprivacy_contextlist` (`id`),
  CONSTRAINT `tool_dataprivacy_rqst_ctxlst_requestid_foreign` FOREIGN KEY (`requestid`) REFERENCES `tool_dataprivacy_request` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_mfa`
--

DROP TABLE IF EXISTS `tool_mfa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_mfa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL COMMENT 'User ID',
  `factor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Factor type',
  `secret` text COLLATE utf8mb4_unicode_ci COMMENT 'Any secret data for factor',
  `label` text COLLATE utf8mb4_unicode_ci COMMENT 'label for factor instance, eg device or email.',
  `timecreated` bigint DEFAULT NULL COMMENT 'Time the factor instance was setup',
  `createdfromip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'IP that the factor was setup from',
  `timemodified` bigint DEFAULT NULL COMMENT 'Time factor was last modified.',
  `lastverified` bigint DEFAULT NULL COMMENT 'Time user was last verified with this factor.',
  `revoked` tinyint(1) NOT NULL DEFAULT '0',
  `lockcounter` smallint NOT NULL DEFAULT '0' COMMENT 'Counter of failed attempts',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `factor` (`factor`),
  KEY `lockcounter` (`userid`,`factor`,`lockcounter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_mfa_auth`
--

DROP TABLE IF EXISTS `tool_mfa_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_mfa_auth` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL COMMENT 'User id',
  `lastverified` bigint NOT NULL DEFAULT '0' COMMENT 'Timestamp of last MFA verification.',
  PRIMARY KEY (`id`),
  KEY `tool_mfa_auth_userid_foreign` (`userid`),
  CONSTRAINT `tool_mfa_auth_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_mfa_secrets`
--

DROP TABLE IF EXISTS `tool_mfa_secrets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_mfa_secrets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `factor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` bigint NOT NULL,
  `expiry` bigint NOT NULL,
  `revoked` tinyint(1) NOT NULL DEFAULT '0',
  `sessionid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factor` (`factor`),
  KEY `expiry` (`expiry`),
  KEY `tool_mfa_secrets_userid_foreign` (`userid`),
  CONSTRAINT `tool_mfa_secrets_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_monitor_events`
--

DROP TABLE IF EXISTS `tool_monitor_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_monitor_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `eventname` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Event name',
  `contextid` bigint unsigned NOT NULL COMMENT 'Context id',
  `contextlevel` int NOT NULL COMMENT 'Context level',
  `contextinstanceid` bigint unsigned NOT NULL COMMENT 'Context instance id',
  `link` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Link to the event location',
  `courseid` bigint unsigned NOT NULL COMMENT 'course id',
  `timecreated` int NOT NULL COMMENT 'Time created',
  PRIMARY KEY (`id`),
  KEY `tool_monitor_events_courseid_foreign` (`courseid`),
  KEY `tool_monitor_events_contextid_foreign` (`contextid`),
  CONSTRAINT `tool_monitor_events_contextid_foreign` FOREIGN KEY (`contextid`) REFERENCES `context` (`id`),
  CONSTRAINT `tool_monitor_events_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_monitor_history`
--

DROP TABLE IF EXISTS `tool_monitor_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_monitor_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sid` bigint unsigned NOT NULL COMMENT 'Subscription id',
  `userid` int NOT NULL COMMENT 'User to whom this notification was sent',
  `timesent` int NOT NULL COMMENT 'Timestamp of when the message was sent.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sid_userid_timesent` (`sid`,`userid`,`timesent`),
  CONSTRAINT `tool_monitor_history_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `tool_monitor_subscriptions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_monitor_rules`
--

DROP TABLE IF EXISTS `tool_monitor_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_monitor_rules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Description of the rule',
  `descriptionformat` tinyint(1) NOT NULL COMMENT 'Description format',
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the rule',
  `userid` int NOT NULL COMMENT 'Id of user who created the rule',
  `courseid` int NOT NULL COMMENT 'Id of course to which this rule belongs.',
  `plugin` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Frankenstlye name of the plguin',
  `eventname` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Fully qualified name of the event',
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Message template',
  `templateformat` tinyint(1) NOT NULL COMMENT 'Template format',
  `frequency` smallint NOT NULL COMMENT 'Frequency',
  `timewindow` smallint NOT NULL COMMENT 'Time window in seconds',
  `timemodified` int NOT NULL COMMENT 'Timestamp when this rule was last modified',
  `timecreated` int NOT NULL COMMENT 'Time stamp of when this rule was created',
  PRIMARY KEY (`id`),
  KEY `courseanduser` (`courseid`,`userid`),
  KEY `eventname` (`eventname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_monitor_subscriptions`
--

DROP TABLE IF EXISTS `tool_monitor_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_monitor_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int NOT NULL COMMENT 'Course id of the subscription',
  `ruleid` bigint unsigned NOT NULL COMMENT 'Rule id',
  `cmid` int NOT NULL COMMENT 'Course module id',
  `userid` int NOT NULL COMMENT 'User id of the subscriber',
  `timecreated` int NOT NULL COMMENT 'Timestamp of when this subscription was created',
  `lastnotificationsent` int NOT NULL DEFAULT '0' COMMENT 'Timestamp of the time when a notification was last sent for this subscription.',
  `inactivedate` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `courseanduser` (`courseid`,`userid`),
  KEY `tool_monitor_subscriptions_ruleid_foreign` (`ruleid`),
  CONSTRAINT `tool_monitor_subscriptions_ruleid_foreign` FOREIGN KEY (`ruleid`) REFERENCES `tool_monitor_rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_policy`
--

DROP TABLE IF EXISTS `tool_policy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_policy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sortorder` smallint NOT NULL DEFAULT '999' COMMENT 'Defines the order in which policies should be presented to users',
  `currentversionid` bigint unsigned DEFAULT NULL COMMENT 'ID of the current policy version that applies on the site, NULL if the policy does not apply',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_policy_acceptances`
--

DROP TABLE IF EXISTS `tool_policy_acceptances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_policy_acceptances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `policyversionid` bigint unsigned NOT NULL COMMENT 'ID of the policy document version',
  `userid` bigint unsigned NOT NULL COMMENT 'ID of the user this acceptance is relevant to',
  `status` tinyint(1) DEFAULT NULL COMMENT 'Acceptance status: 1 - accepted, 0 - not accepted',
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Code of the language the user had when the policy document was displayed',
  `usermodified` bigint unsigned NOT NULL COMMENT 'ID of the user who last modified the acceptance record',
  `timecreated` int NOT NULL COMMENT 'Timestamp of when the acceptance record was created',
  `timemodified` int NOT NULL COMMENT 'Timestamp of when the acceptance record was last modified',
  `note` text COLLATE utf8mb4_unicode_ci COMMENT 'Plain text note describing how the actual consent has been obtained if the policy has been accepted on other user''s behalf.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_versionuser` (`policyversionid`,`userid`),
  KEY `tool_policy_acceptances_userid_foreign` (`userid`),
  KEY `tool_policy_acceptances_usermodified_foreign` (`usermodified`),
  CONSTRAINT `tool_policy_acceptances_policyversionid_foreign` FOREIGN KEY (`policyversionid`) REFERENCES `tool_policy_versions` (`id`),
  CONSTRAINT `tool_policy_acceptances_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `tool_policy_acceptances_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_policy_versions`
--

DROP TABLE IF EXISTS `tool_policy_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_policy_versions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the policy document',
  `type` tinyint NOT NULL DEFAULT '0' COMMENT 'Type of the policy: 0 - Site policy, 1 - Privacy policy, 2 - Third party policy, 99 - Other',
  `audience` tinyint NOT NULL DEFAULT '0' COMMENT 'Who is this policy targeted at: 0 - all users, 1 - logged in users only, 2 - guests only',
  `archived` tinyint NOT NULL DEFAULT '0' COMMENT 'Should the version be considered as archived. All non-archived, non-current versions are considered to be drafts.',
  `usermodified` bigint unsigned NOT NULL COMMENT 'ID of the user who last edited this policy document version.',
  `timecreated` int NOT NULL COMMENT 'Timestamp of when the policy version was created.',
  `timemodified` int NOT NULL COMMENT 'Timestamp of when the policy version was last modified.',
  `policyid` bigint unsigned NOT NULL COMMENT 'ID of the policy document we are version of.',
  `agreementstyle` tinyint NOT NULL DEFAULT '0' COMMENT 'How this agreement should flow: 0 - on the consent page, 1 - on a separate page before reaching the consent page.',
  `optional` tinyint NOT NULL DEFAULT '0' COMMENT '0 - the policy must be accepted to use the site, 1 - accepting the policy is optional',
  `revision` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Human readable version of the policy document',
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Policy text summary',
  `summaryformat` tinyint NOT NULL COMMENT 'Format of the summary field',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Full policy text',
  `contentformat` tinyint NOT NULL COMMENT 'Format of the content field',
  PRIMARY KEY (`id`),
  KEY `tool_policy_versions_usermodified_foreign` (`usermodified`),
  KEY `tool_policy_versions_policyid_foreign` (`policyid`),
  CONSTRAINT `tool_policy_versions_policyid_foreign` FOREIGN KEY (`policyid`) REFERENCES `tool_policy` (`id`),
  CONSTRAINT `tool_policy_versions_usermodified_foreign` FOREIGN KEY (`usermodified`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_recyclebin_category`
--

DROP TABLE IF EXISTS `tool_recyclebin_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_recyclebin_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` bigint unsigned NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timecreated` (`timecreated`),
  KEY `tool_recyclebin_category_categoryid_foreign` (`categoryid`),
  CONSTRAINT `tool_recyclebin_category_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `course_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_recyclebin_course`
--

DROP TABLE IF EXISTS `tool_recyclebin_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_recyclebin_course` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint unsigned NOT NULL,
  `section` int NOT NULL,
  `module` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timecreated` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `timecreated` (`timecreated`),
  KEY `tool_recyclebin_course_courseid_foreign` (`courseid`),
  CONSTRAINT `tool_recyclebin_course_courseid_foreign` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_usertours_steps`
--

DROP TABLE IF EXISTS `tool_usertours_steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_usertours_steps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tourid` bigint unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci COMMENT 'Title of the step',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT 'Content of the user tour - allow for multilang tags',
  `contentformat` smallint NOT NULL DEFAULT '0',
  `targettype` tinyint NOT NULL COMMENT 'Type of the target (e.g. block, CSS selector, etc.)',
  `targetvalue` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The value for the specified target type.',
  `sortorder` int NOT NULL DEFAULT '0',
  `configdata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orderedsteps` (`tourid`,`sortorder`),
  CONSTRAINT `tool_usertours_steps_tourid_foreign` FOREIGN KEY (`tourid`) REFERENCES `tool_usertours_tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_usertours_tours`
--

DROP TABLE IF EXISTS `tool_usertours_tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_usertours_tours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the user tour',
  `description` text COLLATE utf8mb4_unicode_ci,
  `pathmatch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `sortorder` int NOT NULL DEFAULT '0',
  `endtourlabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Custom label for the end tour button',
  `configdata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `displaystepnumbers` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Setting to display step numbers of the tour',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `upgrade_log`
--

DROP TABLE IF EXISTS `upgrade_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upgrade_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL COMMENT 'type: 0==info, 1==notice, 2==error',
  `plugin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'plugin or main version if known',
  `targetversion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'version of plugin or core specified in version.php at the time of upgrade loggging',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `backtrace` text COLLATE utf8mb4_unicode_ci,
  `userid` bigint unsigned NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timemodified` (`timemodified`),
  KEY `type-timemodified` (`type`,`timemodified`),
  KEY `upgrade_log_userid_foreign` (`userid`),
  CONSTRAINT `upgrade_log_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `url` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `introformat` smallint NOT NULL DEFAULT '0',
  `externalurl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` smallint NOT NULL DEFAULT '0',
  `displayoptions` text COLLATE utf8mb4_unicode_ci,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `auth` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `policyagreed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'suspended flag prevents users to log in',
  `mnethostid` int NOT NULL DEFAULT '0',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailstop` tinyint(1) NOT NULL DEFAULT '0',
  `phone1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `calendartype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gregorian',
  `theme` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '99',
  `firstaccess` int NOT NULL DEFAULT '0',
  `lastaccess` int NOT NULL DEFAULT '0',
  `lastlogin` int NOT NULL DEFAULT '0',
  `currentlogin` int NOT NULL DEFAULT '0',
  `lastip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` int NOT NULL DEFAULT '0' COMMENT '0 means no image uploaded, positive values are revisions thta prevent caching problems, negative values are reserved for future use',
  `description` text COLLATE utf8mb4_unicode_ci,
  `descriptionformat` tinyint NOT NULL DEFAULT '1',
  `mailformat` tinyint(1) NOT NULL DEFAULT '1',
  `maildigest` tinyint(1) NOT NULL DEFAULT '0',
  `maildisplay` tinyint NOT NULL DEFAULT '2',
  `autosubscribe` tinyint(1) NOT NULL DEFAULT '1',
  `trackforums` tinyint(1) NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `trustbitmask` int NOT NULL DEFAULT '0',
  `imagealt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'alt tag for user uploaded image',
  `lastnamephonetic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Last name phonetic',
  `firstnamephonetic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'First name phonetic',
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Middle name',
  `alternatename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Alternate name - Useful for three-name countries.',
  `moodlenetprofile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Moodle.net profile information',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`mnethostid`,`username`),
  KEY `deleted` (`deleted`),
  KEY `confirmed` (`confirmed`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `city` (`city`),
  KEY `country` (`country`),
  KEY `lastaccess` (`lastaccess`),
  KEY `email` (`email`),
  KEY `auth` (`auth`),
  KEY `idnumber` (`idnumber`),
  KEY `firstnamephonetic` (`firstnamephonetic`),
  KEY `lastnamephonetic` (`lastnamephonetic`),
  KEY `middlename` (`middlename`),
  KEY `alternatename` (`alternatename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_devices`
--

DROP TABLE IF EXISTS `user_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL DEFAULT '0',
  `appid` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the app id, usually something like com.moodle.moodlemobile',
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the device name, occam or iPhone etc..',
  `model` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the device model, Nexus 4 or iPad 1,1',
  `platform` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the device platform, Android or iOS etc',
  `version` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The device version, 6.1.2, 4.2.2 etc..',
  `pushid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the device PUSH token/key/identifier/registration id',
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The device vendor UUID',
  `publickey` text COLLATE utf8mb4_unicode_ci COMMENT 'The app generated public key',
  `timecreated` int NOT NULL,
  `timemodified` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pushid-userid` (`pushid`,`userid`),
  KEY `uuid-userid` (`uuid`,`userid`),
  KEY `user_devices_userid_foreign` (`userid`),
  CONSTRAINT `user_devices_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_enrolments`
--

DROP TABLE IF EXISTS `user_enrolments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_enrolments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL DEFAULT '0' COMMENT '0..9 are system constants, 0 means active participation, see ENROL_PARTICIPATION_* constants, plugins may define own status greater than 10',
  `enrolid` bigint unsigned NOT NULL,
  `userid` bigint unsigned NOT NULL,
  `timestart` int NOT NULL DEFAULT '0',
  `timeend` int NOT NULL DEFAULT '2147483647',
  `modifierid` bigint unsigned NOT NULL DEFAULT '0',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `enrolid-userid` (`enrolid`,`userid`),
  KEY `user_enrolments_userid_foreign` (`userid`),
  KEY `user_enrolments_modifierid_foreign` (`modifierid`),
  CONSTRAINT `user_enrolments_enrolid_foreign` FOREIGN KEY (`enrolid`) REFERENCES `enrol` (`id`),
  CONSTRAINT `user_enrolments_modifierid_foreign` FOREIGN KEY (`modifierid`) REFERENCES `users` (`id`),
  CONSTRAINT `user_enrolments_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_info_category`
--

DROP TABLE IF EXISTS `user_info_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_info_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Category name',
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'Display order',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_info_data`
--

DROP TABLE IF EXISTS `user_info_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_info_data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0' COMMENT 'id from the user table',
  `fieldid` int NOT NULL DEFAULT '0' COMMENT 'id from the field table',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Field data',
  `dataformat` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userfieldidx` (`userid`,`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_info_field`
--

DROP TABLE IF EXISTS `user_info_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_info_field` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'shortname' COMMENT 'short name for each field',
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'field name',
  `datatype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Type of data held in this field',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Description of field',
  `descriptionformat` tinyint NOT NULL DEFAULT '0',
  `categoryid` int NOT NULL DEFAULT '0' COMMENT 'id from category table',
  `sortorder` int NOT NULL DEFAULT '0' COMMENT 'order within the category',
  `required` tinyint NOT NULL DEFAULT '0' COMMENT 'Field required',
  `locked` tinyint NOT NULL DEFAULT '0' COMMENT 'Field locked',
  `visible` smallint NOT NULL DEFAULT '0' COMMENT 'Visibility: private, public, hidden',
  `forceunique` tinyint NOT NULL DEFAULT '0' COMMENT 'should the field contain unique data',
  `signup` tinyint NOT NULL DEFAULT '0' COMMENT 'display field on signup page',
  `defaultdata` text COLLATE utf8mb4_unicode_ci COMMENT 'Default value for this field',
  `defaultdataformat` tinyint NOT NULL DEFAULT '0',
  `param1` text COLLATE utf8mb4_unicode_ci COMMENT 'General parameter field',
  `param2` text COLLATE utf8mb4_unicode_ci COMMENT 'General parameter field',
  `param3` text COLLATE utf8mb4_unicode_ci COMMENT 'General parameter field',
  `param4` text COLLATE utf8mb4_unicode_ci COMMENT 'General parameter field',
  `param5` text COLLATE utf8mb4_unicode_ci COMMENT 'General parameter field',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_lastaccess`
--

DROP TABLE IF EXISTS `user_lastaccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_lastaccess` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `courseid` int NOT NULL DEFAULT '0',
  `timeaccess` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-courseid` (`userid`,`courseid`),
  KEY `userid` (`userid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_password_history`
--

DROP TABLE IF EXISTS `user_password_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_password_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timecreated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_password_history_userid_foreign` (`userid`),
  CONSTRAINT `user_password_history_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_password_resets`
--

DROP TABLE IF EXISTS `user_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_password_resets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint unsigned NOT NULL COMMENT 'id of the user account which requester claimed to be',
  `timerequested` int NOT NULL COMMENT 'The time that the user first requested this password reset',
  `timererequested` int NOT NULL DEFAULT '0' COMMENT 'The time the user re-requested the password reset.',
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'secret set and emailed to user',
  PRIMARY KEY (`id`),
  KEY `user_password_resets_userid_foreign` (`userid`),
  CONSTRAINT `user_password_resets_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_preferences`
--

DROP TABLE IF EXISTS `user_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_preferences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid-name` (`userid`,`name`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_private_key`
--

DROP TABLE IF EXISTS `user_private_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_private_key` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `script` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'plugin, module - unique identifier',
  `value` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'private access key value',
  `userid` bigint unsigned NOT NULL COMMENT 'owner',
  `instance` int DEFAULT NULL COMMENT 'optional instance id',
  `iprestriction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ip restriction',
  `validuntil` int DEFAULT NULL COMMENT 'timestampt - valid until data',
  `timecreated` int DEFAULT NULL COMMENT 'created timestamp',
  PRIMARY KEY (`id`),
  KEY `script-value` (`script`,`value`),
  KEY `user_private_key_userid_foreign` (`userid`),
  CONSTRAINT `user_private_key_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki`
--

DROP TABLE IF EXISTS `wiki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` int NOT NULL DEFAULT '0' COMMENT 'Course wiki activity belongs to',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wiki' COMMENT 'name field for moodle instances',
  `intro` text COLLATE utf8mb4_unicode_ci COMMENT 'General introduction of the wiki activity',
  `introformat` smallint NOT NULL DEFAULT '0' COMMENT 'Format of the intro field (MOODLE, HTML, MARKDOWN...)',
  `timecreated` int NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL DEFAULT '0',
  `firstpagetitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'First Page' COMMENT 'Wiki first page''s name',
  `wikimode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'collaborative' COMMENT 'Wiki mode (individual, collaborative)',
  `defaultformat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'creole' COMMENT 'Wiki''s default editor',
  `forceformat` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Forces the default editor',
  `editbegin` int NOT NULL DEFAULT '0' COMMENT 'editbegin',
  `editend` int DEFAULT '0' COMMENT 'editend',
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki_links`
--

DROP TABLE IF EXISTS `wiki_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subwikiid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Subwiki instance',
  `frompageid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Page id with a link',
  `topageid` int NOT NULL DEFAULT '0' COMMENT 'Page id that recives a link',
  `tomissingpage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link to a nonexistent page',
  PRIMARY KEY (`id`),
  KEY `wiki_links_frompageid_foreign` (`frompageid`),
  KEY `wiki_links_subwikiid_foreign` (`subwikiid`),
  CONSTRAINT `wiki_links_frompageid_foreign` FOREIGN KEY (`frompageid`) REFERENCES `wiki_pages` (`id`),
  CONSTRAINT `wiki_links_subwikiid_foreign` FOREIGN KEY (`subwikiid`) REFERENCES `wiki_subwikis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki_locks`
--

DROP TABLE IF EXISTS `wiki_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki_locks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pageid` int NOT NULL DEFAULT '0' COMMENT 'Locked page',
  `sectionname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'locked page section',
  `userid` int NOT NULL DEFAULT '0' COMMENT 'Locking user',
  `lockedat` int NOT NULL DEFAULT '0' COMMENT 'timestamp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki_pages`
--

DROP TABLE IF EXISTS `wiki_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subwikiid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Subwiki instance of this page',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'title' COMMENT 'Page name',
  `cachedcontent` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cache wiki content',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'Wiki page creation timestamp',
  `timemodified` int NOT NULL DEFAULT '0' COMMENT 'page edition timestamp',
  `timerendered` int NOT NULL DEFAULT '0' COMMENT 'Last render timestamp',
  `userid` int NOT NULL DEFAULT '0' COMMENT 'Edition author',
  `pageviews` int NOT NULL DEFAULT '0' COMMENT 'Number of page views',
  `readonly` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Read only flag',
  PRIMARY KEY (`id`),
  UNIQUE KEY `subwikititleuser` (`subwikiid`,`title`,`userid`),
  CONSTRAINT `wiki_pages_subwikiid_foreign` FOREIGN KEY (`subwikiid`) REFERENCES `wiki_subwikis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki_subwikis`
--

DROP TABLE IF EXISTS `wiki_subwikis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki_subwikis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wikiid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Wiki activity',
  `groupid` int NOT NULL DEFAULT '0' COMMENT 'Group that owns this wiki',
  `userid` int NOT NULL DEFAULT '0' COMMENT 'Owner of that subwiki',
  PRIMARY KEY (`id`),
  UNIQUE KEY `wikiidgroupiduserid` (`wikiid`,`groupid`,`userid`),
  CONSTRAINT `wiki_subwikis_wikiid_foreign` FOREIGN KEY (`wikiid`) REFERENCES `wiki` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki_synonyms`
--

DROP TABLE IF EXISTS `wiki_synonyms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki_synonyms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subwikiid` int NOT NULL DEFAULT '0' COMMENT 'Subwiki instance',
  `pageid` int NOT NULL DEFAULT '0' COMMENT 'Original page',
  `pagesynonym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pagesynonym' COMMENT 'Page name synonym',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pageidsyn` (`pageid`,`pagesynonym`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wiki_versions`
--

DROP TABLE IF EXISTS `wiki_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wiki_versions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pageid` bigint unsigned NOT NULL DEFAULT '0' COMMENT 'Page id',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Not parsed wiki content',
  `contentformat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'creole' COMMENT 'Markup used to write content',
  `version` smallint NOT NULL DEFAULT '0' COMMENT 'Wiki page version',
  `timecreated` int NOT NULL DEFAULT '0' COMMENT 'Page edition timestamp',
  `userid` int NOT NULL DEFAULT '0' COMMENT 'Edition autor',
  PRIMARY KEY (`id`),
  KEY `wiki_versions_pageid_foreign` (`pageid`),
  CONSTRAINT `wiki_versions_pageid_foreign` FOREIGN KEY (`pageid`) REFERENCES `wiki_pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshop`
--

DROP TABLE IF EXISTS `workshop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshop` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint unsigned NOT NULL COMMENT 'ID of the parent course',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the activity',
  `intro` text COLLATE utf8mb4_unicode_ci COMMENT 'The introduction or description of the activity',
  `introformat` tinyint NOT NULL DEFAULT '0' COMMENT 'The format of the intro field',
  `instructauthors` text COLLATE utf8mb4_unicode_ci COMMENT 'Instructions for the submission phase',
  `instructauthorsformat` tinyint NOT NULL DEFAULT '0',
  `instructreviewers` text COLLATE utf8mb4_unicode_ci COMMENT 'Instructions for the assessment phase',
  `instructreviewersformat` tinyint NOT NULL DEFAULT '0',
  `timemodified` int NOT NULL COMMENT 'The timestamp when the module was modified',
  `phase` tinyint DEFAULT '0' COMMENT 'The current phase of workshop (0 = not available, 1 = submission, 2 = assessment, 3 = closed)',
  `useexamples` tinyint DEFAULT '0' COMMENT 'optional feature: students practise evaluating on example submissions from teacher',
  `usepeerassessment` tinyint DEFAULT '0' COMMENT 'optional feature: students perform peer assessment of others'' work',
  `useselfassessment` tinyint DEFAULT '0' COMMENT 'optional feature: students perform self assessment of their own work',
  `grade` decimal(10,5) DEFAULT '80.00000' COMMENT 'The maximum grade for submission',
  `gradinggrade` decimal(10,5) DEFAULT '20.00000' COMMENT 'The maximum grade for assessment',
  `strategy` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The type of the current grading strategy used in this workshop',
  `evaluation` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The recently used grading evaluation method',
  `gradedecimals` tinyint DEFAULT '0' COMMENT 'Number of digits that should be shown after the decimal point when displaying grades',
  `submissiontypetext` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Can students enter text for their submissions? 0 for no, 1 for optional, 2 for required.',
  `submissiontypefile` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Can students attach files for their submissions? 0 for no, 1 for optional, 2 for required.',
  `nattachments` tinyint DEFAULT '1' COMMENT 'Maximum number of submission attachments',
  `submissionfiletypes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'comma separated list of file extensions',
  `latesubmissions` tinyint DEFAULT '0' COMMENT 'Allow submitting the work after the deadline',
  `maxbytes` int DEFAULT '100000' COMMENT 'Maximum size of the one attached file',
  `examplesmode` tinyint DEFAULT '0' COMMENT '0 = example assessments are voluntary, 1 = examples must be assessed before submission, 2 = examples are available after own submission and must be assessed before peer/self assessment phase',
  `submissionstart` int DEFAULT '0' COMMENT '0 = will be started manually, greater than 0 the timestamp of the start of the submission phase',
  `submissionend` int DEFAULT '0' COMMENT '0 = will be closed manually, greater than 0 the timestamp of the end of the submission phase',
  `assessmentstart` int DEFAULT '0' COMMENT '0 = will be started manually, greater than 0 the timestamp of the start of the assessment phase',
  `assessmentend` int DEFAULT '0' COMMENT '0 = will be closed manually, greater than 0 the timestamp of the end of the assessment phase',
  `phaseswitchassessment` tinyint NOT NULL DEFAULT '0' COMMENT 'Automatically switch to the assessment phase after the submissions deadline',
  `conclusion` text COLLATE utf8mb4_unicode_ci COMMENT 'A text to be displayed at the end of the workshop.',
  `conclusionformat` tinyint NOT NULL DEFAULT '1' COMMENT 'The format of the conclusion field content.',
  `overallfeedbackmode` tinyint DEFAULT '1' COMMENT 'Mode of the overall feedback support.',
  `overallfeedbackfiles` tinyint DEFAULT '0' COMMENT 'Number of allowed attachments to the overall feedback.',
  `overallfeedbackfiletypes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'comma separated list of file extensions',
  `overallfeedbackmaxbytes` int DEFAULT '100000' COMMENT 'Maximum size of one file attached to the overall feedback.',
  PRIMARY KEY (`id`),
  KEY `workshop_course_foreign` (`course`),
  CONSTRAINT `workshop_course_foreign` FOREIGN KEY (`course`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshop_aggregations`
--

DROP TABLE IF EXISTS `workshop_aggregations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshop_aggregations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'the id of the workshop instance',
  `userid` bigint unsigned NOT NULL COMMENT 'The id of the user which aggregated grades are calculated for',
  `gradinggrade` decimal(10,5) DEFAULT NULL COMMENT 'The aggregated grade for all assessments made by this reviewer. The grade is a number from interval 0..100. If NULL then the grade for assessments has not been aggregated yet.',
  `timegraded` int DEFAULT NULL COMMENT 'The timestamp of when the participant''s gradinggrade was recently aggregated.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `workshopuser` (`workshopid`,`userid`),
  KEY `workshop_aggregations_userid_foreign` (`userid`),
  CONSTRAINT `workshop_aggregations_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  CONSTRAINT `workshop_aggregations_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshop_assessments`
--

DROP TABLE IF EXISTS `workshop_assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshop_assessments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `submissionid` bigint unsigned NOT NULL COMMENT 'The id of the assessed submission',
  `reviewerid` bigint unsigned NOT NULL COMMENT 'The id of the reviewer who makes this assessment',
  `weight` int NOT NULL DEFAULT '1' COMMENT 'The weight of the assessment for the purposes of aggregation',
  `timecreated` int DEFAULT '0' COMMENT 'If 0 then the assessment was allocated but the reviewer has not assessed yet. If greater than 0 then the timestamp of when the reviewer assessed for the first time',
  `timemodified` int DEFAULT '0' COMMENT 'If 0 then the assessment was allocated but the reviewer has not assessed yet. If greater than 0 then the timestamp of when the reviewer assessed for the last time',
  `grade` decimal(10,5) DEFAULT NULL COMMENT 'The aggregated grade for submission suggested by the reviewer. The grade 0..100 is computed from the values assigned to the assessment dimensions fields. If NULL then it has not been aggregated yet.',
  `gradinggrade` decimal(10,5) DEFAULT NULL COMMENT 'The computed grade 0..100 for this assessment. If NULL then it has not been computed yet.',
  `gradinggradeover` decimal(10,5) DEFAULT NULL COMMENT 'Grade for the assessment manually overridden by a teacher. Grade is always from interval 0..100. If NULL then the grade is not overriden.',
  `gradinggradeoverby` bigint unsigned DEFAULT NULL COMMENT 'The id of the user who has overridden the grade for submission.',
  `feedbackauthor` text COLLATE utf8mb4_unicode_ci COMMENT 'The comment/feedback from the reviewer for the author.',
  `feedbackauthorformat` tinyint DEFAULT '0',
  `feedbackauthorattachment` tinyint DEFAULT '0' COMMENT 'Are there some files attached to the feedbackauthor field? Sets to 1 by file_postupdate_standard_filemanager().',
  `feedbackreviewer` text COLLATE utf8mb4_unicode_ci COMMENT 'The comment/feedback from the teacher for the reviewer. For example the reason why the grade for assessment was overridden',
  `feedbackreviewerformat` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `workshop_assessments_submissionid_foreign` (`submissionid`),
  KEY `workshop_assessments_gradinggradeoverby_foreign` (`gradinggradeoverby`),
  KEY `workshop_assessments_reviewerid_foreign` (`reviewerid`),
  CONSTRAINT `workshop_assessments_gradinggradeoverby_foreign` FOREIGN KEY (`gradinggradeoverby`) REFERENCES `users` (`id`),
  CONSTRAINT `workshop_assessments_reviewerid_foreign` FOREIGN KEY (`reviewerid`) REFERENCES `users` (`id`),
  CONSTRAINT `workshop_assessments_submissionid_foreign` FOREIGN KEY (`submissionid`) REFERENCES `workshop_submissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshop_grades`
--

DROP TABLE IF EXISTS `workshop_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshop_grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assessmentid` bigint unsigned NOT NULL COMMENT 'Part of which assessment this grade is of',
  `strategy` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensionid` int NOT NULL COMMENT 'Foreign key. References dimension id in one of the grading strategy tables.',
  `grade` decimal(10,5) DEFAULT NULL COMMENT 'Given grade in the referenced assessment dimension.',
  `peercomment` text COLLATE utf8mb4_unicode_ci COMMENT 'Reviewer''s comment to the grade value.',
  `peercommentformat` tinyint DEFAULT '0' COMMENT 'The format of peercomment field',
  PRIMARY KEY (`id`),
  UNIQUE KEY `formfield_uk` (`assessmentid`,`strategy`,`dimensionid`),
  CONSTRAINT `workshop_grades_assessmentid_foreign` FOREIGN KEY (`assessmentid`) REFERENCES `workshop_assessments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshop_submissions`
--

DROP TABLE IF EXISTS `workshop_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshop_submissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'the id of the workshop instance',
  `example` tinyint DEFAULT '0' COMMENT 'Is this submission an example from teacher',
  `authorid` bigint unsigned NOT NULL COMMENT 'The author of the submission',
  `timecreated` int NOT NULL COMMENT 'Timestamp when the work was submitted for the first time',
  `timemodified` int NOT NULL COMMENT 'Timestamp when the submission has been updated',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The submission title',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT 'Submission text',
  `contentformat` tinyint NOT NULL DEFAULT '0' COMMENT 'The format of submission text',
  `contenttrust` tinyint NOT NULL DEFAULT '0' COMMENT 'The trust mode of the data',
  `attachment` tinyint DEFAULT '0' COMMENT 'Used by File API file_postupdate_standard_filemanager',
  `grade` decimal(10,5) DEFAULT NULL COMMENT 'Aggregated grade for the submission. The grade is a decimal number from interval 0..100. If NULL then the grade for submission has not been aggregated yet.',
  `gradeover` decimal(10,5) DEFAULT NULL COMMENT 'Grade for the submission manually overridden by a teacher. Grade is always from interval 0..100. If NULL then the grade is not overriden.',
  `gradeoverby` bigint unsigned DEFAULT NULL COMMENT 'The id of the user who has overridden the grade for submission.',
  `feedbackauthor` text COLLATE utf8mb4_unicode_ci COMMENT 'Teacher comment/feedback for the author of the submission, for example describing the reasons for the grade overriding',
  `feedbackauthorformat` tinyint DEFAULT '0',
  `timegraded` int DEFAULT NULL COMMENT 'The timestamp when grade or gradeover was recently modified',
  `published` tinyint DEFAULT '0' COMMENT 'Shall the submission be available to other when the workshop is closed',
  `late` tinyint NOT NULL DEFAULT '0' COMMENT 'Has this submission been submitted after the deadline or during the assessment phase?',
  PRIMARY KEY (`id`),
  KEY `workshop_submissions_workshopid_foreign` (`workshopid`),
  KEY `workshop_submissions_gradeoverby_foreign` (`gradeoverby`),
  KEY `workshop_submissions_authorid_foreign` (`authorid`),
  CONSTRAINT `workshop_submissions_authorid_foreign` FOREIGN KEY (`authorid`) REFERENCES `users` (`id`),
  CONSTRAINT `workshop_submissions_gradeoverby_foreign` FOREIGN KEY (`gradeoverby`) REFERENCES `users` (`id`),
  CONSTRAINT `workshop_submissions_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopallocation_scheduled`
--

DROP TABLE IF EXISTS `workshopallocation_scheduled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopallocation_scheduled` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` int NOT NULL COMMENT 'workshop id we are part of',
  `enabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Is the scheduled allocation enabled',
  `submissionend` int NOT NULL COMMENT 'What was the workshop''s submissionend when this record was created or modified',
  `timeallocated` int DEFAULT NULL COMMENT 'When was the last scheduled allocation executed',
  `settings` text COLLATE utf8mb4_unicode_ci COMMENT 'The pre-defined settings for the underlying random allocation to run it with',
  `resultstatus` int DEFAULT NULL COMMENT 'The resulting status of the most recent execution',
  `resultmessage` text COLLATE utf8mb4_unicode_ci COMMENT 'Optional short message describing the resulting status',
  `resultlog` text COLLATE utf8mb4_unicode_ci COMMENT 'The log of the most recent execution',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fkuq_workshopid` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopeval_best_settings`
--

DROP TABLE IF EXISTS `workshopeval_best_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopeval_best_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` int NOT NULL,
  `comparison` tinyint DEFAULT '5' COMMENT 'Here we store the recently set factor of comparison of assessment in the given workshop. Reasonable values are from 1 to 10 or so. Default to 5.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fkuq_workshop` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_accumulative`
--

DROP TABLE IF EXISTS `workshopform_accumulative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_accumulative` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'Workshop ID',
  `sort` int DEFAULT '0' COMMENT 'Defines the dimension order within the assessment form',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The description of the dimension',
  `descriptionformat` tinyint DEFAULT '0' COMMENT 'The format of the description field',
  `grade` int NOT NULL COMMENT 'If greater than 0, then the value is maximum grade on a scale 0..grade. If lesser than 0, then its absolute value is the id of a record in scale table. If equals 0, then no grading is possible for this dimension, just commenting.',
  `weight` smallint DEFAULT '1' COMMENT 'The weigh of the dimension',
  PRIMARY KEY (`id`),
  KEY `workshopform_accumulative_workshopid_foreign` (`workshopid`),
  CONSTRAINT `workshopform_accumulative_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_comments`
--

DROP TABLE IF EXISTS `workshopform_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'Workshop ID',
  `sort` int DEFAULT '0' COMMENT 'Defines the dimension order within the assessment form',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The description of the dimension',
  `descriptionformat` tinyint DEFAULT '0' COMMENT 'The format of the description field',
  PRIMARY KEY (`id`),
  KEY `workshopform_comments_workshopid_foreign` (`workshopid`),
  CONSTRAINT `workshopform_comments_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_numerrors`
--

DROP TABLE IF EXISTS `workshopform_numerrors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_numerrors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'Workshop ID',
  `sort` int DEFAULT '0' COMMENT 'Defines the dimension order within the assessment form',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The description of the dimension',
  `descriptionformat` tinyint DEFAULT '0' COMMENT 'The format of the description field',
  `descriptiontrust` int DEFAULT NULL,
  `grade0` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The word describing the negative evaluation (like Poor, Missing, Absent, etc.). If NULL, it defaults to a translated string False',
  `grade1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'A word for possitive evaluation (like Good, Present, OK etc). If NULL, it defaults to a translated string True',
  `weight` smallint DEFAULT '1' COMMENT 'Weight of this dimension',
  PRIMARY KEY (`id`),
  KEY `workshopform_numerrors_workshopid_foreign` (`workshopid`),
  CONSTRAINT `workshopform_numerrors_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_numerrors_map`
--

DROP TABLE IF EXISTS `workshopform_numerrors_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_numerrors_map` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'The id of the workshop',
  `nonegative` int NOT NULL COMMENT 'Number of negative responses given by the reviewer',
  `grade` decimal(10,5) NOT NULL COMMENT 'Percentual grade 0..100 for this number of negative responses',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nonegative_uq` (`workshopid`,`nonegative`),
  CONSTRAINT `workshopform_numerrors_map_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_rubric`
--

DROP TABLE IF EXISTS `workshopform_rubric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_rubric` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint unsigned NOT NULL COMMENT 'Workshop ID',
  `sort` int DEFAULT '0' COMMENT 'Defines the dimension order within the assessment form',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'The description of the dimension',
  `descriptionformat` tinyint DEFAULT '0' COMMENT 'The format of the description field',
  PRIMARY KEY (`id`),
  KEY `workshopform_rubric_workshopid_foreign` (`workshopid`),
  CONSTRAINT `workshopform_rubric_workshopid_foreign` FOREIGN KEY (`workshopid`) REFERENCES `workshop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_rubric_config`
--

DROP TABLE IF EXISTS `workshopform_rubric_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_rubric_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` int NOT NULL COMMENT 'The id of workshop this configuartion applies for',
  `layout` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'list' COMMENT 'How should the rubric be displayed for reviewers',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uqfk_workshop` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `workshopform_rubric_levels`
--

DROP TABLE IF EXISTS `workshopform_rubric_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workshopform_rubric_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dimensionid` bigint unsigned NOT NULL COMMENT 'Which criterion this level is part of',
  `grade` decimal(10,5) NOT NULL COMMENT 'Grade representing this level.',
  `definition` text COLLATE utf8mb4_unicode_ci COMMENT 'The definition of this level',
  `definitionformat` tinyint DEFAULT '0' COMMENT 'The format of the definition field',
  PRIMARY KEY (`id`),
  KEY `workshopform_rubric_levels_dimensionid_foreign` (`dimensionid`),
  CONSTRAINT `workshopform_rubric_levels_dimensionid_foreign` FOREIGN KEY (`dimensionid`) REFERENCES `workshopform_rubric` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xapi_states`
--

DROP TABLE IF EXISTS `xapi_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xapi_states` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The component name',
  `userid` int DEFAULT NULL,
  `itemid` int NOT NULL COMMENT 'The Agent Id (usually the plugin instance)',
  `stateid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Component identified for the state data',
  `statedata` text COLLATE utf8mb4_unicode_ci COMMENT 'JSON state data',
  `registration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Optional registration identifier',
  `timecreated` int NOT NULL,
  `timemodified` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `component-itemid` (`component`,`itemid`),
  KEY `userid` (`userid`),
  KEY `timemodified` (`timemodified`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-29 19:46:10
