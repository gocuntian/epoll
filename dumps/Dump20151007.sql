CREATE DATABASE  IF NOT EXISTS `epoll` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `epoll`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: epoll
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `adr_city`
--

DROP TABLE IF EXISTS `adr_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` char(50) NOT NULL DEFAULT '' COMMENT 'назва н.п.',
  `c_type_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id типу населеного пункту',
  `is_grp` int(11) NOT NULL DEFAULT '0' COMMENT '1 - група; 0- елемент (кінцевий) ',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id батьківського елементу',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=167;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adr_city_type`
--

DROP TABLE IF EXISTS `adr_city_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_city_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` char(10) NOT NULL DEFAULT '' COMMENT 'коротка назва',
  `f_name` char(50) NOT NULL DEFAULT '' COMMENT 'повна назва',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=185;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adr_street`
--

DROP TABLE IF EXISTS `adr_street`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_street` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_type_id` int(11) NOT NULL DEFAULT '0' COMMENT 'тип вулиці',
  `s_name` char(50) NOT NULL DEFAULT '' COMMENT 'назва вулиці',
  `owner_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id н.п. власника',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adr_street_type`
--

DROP TABLE IF EXISTS `adr_street_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_street_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` char(10) NOT NULL DEFAULT '' COMMENT 'коротка назва',
  `f_name` char(50) NOT NULL DEFAULT '' COMMENT 'довга назва',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ank_answvariants`
--

DROP TABLE IF EXISTS `ank_answvariants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ank_answvariants` (
  `id_av` int(11) NOT NULL AUTO_INCREMENT,
  `id_q` int(11) NOT NULL DEFAULT '0' COMMENT 'ank_questions.id_q',
  `npp` int(11) NOT NULL DEFAULT '0',
  `isHidden` tinyint(3) NOT NULL DEFAULT '0',
  `hasText` tinyint(3) NOT NULL DEFAULT '0',
  `textMaxLength` int(11) NOT NULL DEFAULT '0',
  `isNoRandomized` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'jaksho v pytanni isRandom=1, a tut isNoRandomized=1 --- danyj variant ne pryjmae uchasti v rotacii variantiv',
  `separator` varchar(15) NOT NULL DEFAULT '' COMMENT 'dla q_type=3 - tekstovyj rozdiluvach livoi i pravoi chastyn (napr. [<===>])',
  `name_ua` varchar(255) NOT NULL DEFAULT '',
  `name_ru` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_av`)
) ENGINE=MyISAM AUTO_INCREMENT=790 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=83 COMMENT='Varianty vidpovidej na zakryti pytannia ankety';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ank_answvariants_filter`
--

DROP TABLE IF EXISTS `ank_answvariants_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ank_answvariants_filter` (
  `id_av` int(11) NOT NULL DEFAULT '0' COMMENT 'potochnyj variant v-di',
  `id_av_f` int(11) NOT NULL DEFAULT '0' COMMENT 'variant na poperedne pytanna',
  `isEnabled` tinyint(3) NOT NULL DEFAULT '0' COMMENT '1-dozvolaty danyj variant, 0-zaboronaty --- jakscho korystuvach vybrav id_av_f',
  PRIMARY KEY (`id_av`,`id_av_f`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=10 COMMENT='Таблиця фільтрів відповідей - якась конкретна відповід може виключити наступні варіанти відповідей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ank_names`
--

DROP TABLE IF EXISTS `ank_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ank_names` (
  `id_ank` int(11) NOT NULL AUTO_INCREMENT,
  `name_ua` varchar(255) NOT NULL DEFAULT '',
  `name_ru` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_ank`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=37 COMMENT='Назви опитувань';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ank_questions`
--

DROP TABLE IF EXISTS `ank_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ank_questions` (
  `id_q` int(11) NOT NULL AUTO_INCREMENT,
  `id_ank` int(11) NOT NULL DEFAULT '0' COMMENT 'ank_names.id_ank',
  `npp` int(11) NOT NULL DEFAULT '0',
  `name_ua` varchar(255) NOT NULL DEFAULT '',
  `name_ru` varchar(255) NOT NULL DEFAULT '',
  `q_type` int(11) NOT NULL DEFAULT '0' COMMENT 'ank_q_types_n.id_qtype',
  `answ_min` int(3) NOT NULL DEFAULT '0' COMMENT 'min k-t variantiv v-dej',
  `answ_max` int(11) NOT NULL DEFAULT '0' COMMENT 'maks k-t variantiv v-dej',
  `isRandom` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'peremishuvaty varianty vidpovidej',
  `bbPresent` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'Vazko Vidpovisty present',
  `ivPresent` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'Insha Vidpovid present',
  `openQuestionAnswerMaxLength` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_q`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=280 COMMENT='Питання до опитування';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ank_questions_filter`
--

DROP TABLE IF EXISTS `ank_questions_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ank_questions_filter` (
  `id_q` int(11) NOT NULL DEFAULT '0' COMMENT 'id potochnogo pytanna',
  `id_av_f` int(11) NOT NULL DEFAULT '0' COMMENT 'variant vidpovidi na poperedne pytanna vybrane korystuvachem',
  `isEnabled` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-zaboronaty / 1-dozvolaty dane pytanna',
  PRIMARY KEY (`id_q`,`id_av_f`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=10 COMMENT='Таблиця фільтрів питань - якась конкретна відповідь може виключити наступні питання';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `answ_ankets`
--

DROP TABLE IF EXISTS `answ_ankets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answ_ankets` (
  `id_answ_ank` int(11) NOT NULL AUTO_INCREMENT,
  `id_poll` int(11) NOT NULL DEFAULT '0' COMMENT 'polls_n.id_poll',
  `id_user` int(11) NOT NULL DEFAULT '0' COMMENT 'id interviewer',
  `hw_id` int(11) NOT NULL DEFAULT '0',
  `guid` varchar(48) NOT NULL DEFAULT '',
  `npp` int(11) NOT NULL DEFAULT '0' COMMENT 'npp ankety',
  `dtFrom` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'data/chas pochatku zapovnennia ankety',
  `dtTo` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'data/chas kinca zapovnennia ankety',
  `dtServer` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gpsLngFrom` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsLtdFrom` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsAccFrom` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsSrcFrom` varchar(10) NOT NULL DEFAULT '',
  `gpsLngTo` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsLtdTo` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsAccTo` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsSrcTo` varchar(10) NOT NULL DEFAULT '',
  `isCompleted` tinyint(3) NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_answ_ank`),
  UNIQUE KEY `guid` (`guid`),
  UNIQUE KEY `k` (`id_poll`,`id_user`,`hw_id`,`dtFrom`,`dtTo`)
) ENGINE=MyISAM AUTO_INCREMENT=604 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=120 COMMENT='Заголовки заповнених анкет';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `answ_answers`
--

DROP TABLE IF EXISTS `answ_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answ_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_answ_ank` int(11) NOT NULL DEFAULT '0' COMMENT 'answ_ankets.id_answ_ank',
  `id_q` int(11) NOT NULL DEFAULT '0',
  `id_av` int(11) NOT NULL DEFAULT '0',
  `iv` varchar(255) NOT NULL DEFAULT '' COMMENT 'inshyj variant',
  `iv_n_var` int(11) NOT NULL DEFAULT '0' COMMENT 'dla iv-variantiv - nomer variantu na odyn id_av (dla exportu d spss)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `k` (`id_answ_ank`,`id_q`,`id_av`)
) ENGINE=MyISAM AUTO_INCREMENT=9016 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=23;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `answ_questions`
--

DROP TABLE IF EXISTS `answ_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answ_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_answ_ank` int(11) NOT NULL DEFAULT '0' COMMENT 'answ_ankets.id_answ_ank',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `session_id_prev` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'dla paralelnyh zapytiv, schob ne vylitalo v login_form',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) DEFAULT '0',
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=110;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `geographical_allocation`
--

DROP TABLE IF EXISTS `geographical_allocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geographical_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part` varchar(25) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `locality_area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='таблиця географічного розподілу';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hw_n`
--

DROP TABLE IF EXISTS `hw_n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hw_n` (
  `hw_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial0` varchar(50) NOT NULL DEFAULT '',
  `serial1` varchar(50) NOT NULL DEFAULT '',
  `fkey` varchar(128) NOT NULL DEFAULT '',
  `fiv` varchar(128) NOT NULL DEFAULT '',
  `useEncode` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hw_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=96;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hw_state`
--

DROP TABLE IF EXISTS `hw_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hw_state` (
  `hw_id` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gpsLng` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsLat` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsAcc` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsSrc` varchar(10) NOT NULL DEFAULT '',
  `gpsDt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`hw_id`),
  UNIQUE KEY `k` (`id_user`,`dt`,`gpsLng`,`gpsLat`,`gpsDt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=43;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER hw_state_ai
AFTER INSERT
ON hw_state
FOR EACH ROW
BEGIN
  INSERT IGNORE hw_state_history (hw_id, id_user, dt, gpsLng, gpsLat, gpsAcc, gpsSrc, gpsDt)
    VALUES (new.hw_id, new.id_user, NOW(), new.gpsLng, new.gpsLat, new.gpsAcc, new.gpsSrc, new.gpsDt);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER hw_state_au
AFTER UPDATE
ON hw_state
FOR EACH ROW
BEGIN
  INSERT IGNORE hw_state_history (hw_id, id_user, dt, gpsLng, gpsLat, gpsAcc, gpsSrc, gpsDt)
    VALUES (new.hw_id, new.id_user, NOW(), new.gpsLng, new.gpsLat, new.gpsAcc, new.gpsSrc, new.gpsDt);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `hw_state_history`
--

DROP TABLE IF EXISTS `hw_state_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hw_state_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hw_id` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gpsLng` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsLat` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsAcc` float(16,9) NOT NULL DEFAULT '0.000000000',
  `gpsSrc` varchar(10) NOT NULL DEFAULT '',
  `gpsDt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kk` (`hw_id`,`id_user`,`gpsLng`,`gpsLat`,`gpsDt`)
) ENGINE=MyISAM AUTO_INCREMENT=4930 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=47;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `itasks`
--

DROP TABLE IF EXISTS `itasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itasks` (
  `id_itask` int(11) NOT NULL AUTO_INCREMENT,
  `id_poll` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0-new(not sended to tablet), 1-sended, 2-finished, 3-canceled',
  `proress` int(11) NOT NULL DEFAULT '0' COMMENT 'in percents',
  `krespondents` int(11) NOT NULL DEFAULT '0' COMMENT 'k-t respondentiv, jakyh neobhidno opytaty',
  `comment` text NOT NULL,
  PRIMARY KEY (`id_itask`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=72;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `iv_groups`
--

DROP TABLE IF EXISTS `iv_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iv_groups` (
  `id_poll` int(11) NOT NULL DEFAULT '0',
  `id_av` int(11) NOT NULL DEFAULT '0',
  `iv` varchar(255) NOT NULL DEFAULT '',
  `npp` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id_av___iv` (`id_av`,`iv`),
  KEY `id_poll` (`id_poll`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=35 COMMENT='dla iv-variantiv - pogrupovani vsi varianty';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `langs`
--

DROP TABLE IF EXISTS `langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `langs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ua` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `k` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=1367 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=111;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log_requests`
--

DROP TABLE IF EXISTS `log_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_requests` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'GET, POST',
  `isAjax` tinyint(3) NOT NULL DEFAULT '0' COMMENT '1/0',
  `ksql` smallint(6) NOT NULL DEFAULT '0' COMMENT 'sql count',
  `controller` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'controller name',
  `method` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'method name',
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'uri',
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'username',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'date/time',
  `ex_time` float(15,4) NOT NULL DEFAULT '0.0000' COMMENT 'execution time',
  `par` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'get,post data (Array format)',
  `tmark` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'time marks, array',
  `out_text` text COLLATE utf8_unicode_ci NOT NULL,
  `out_text_enc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `dt` (`dt`)
) ENGINE=MyISAM AUTO_INCREMENT=65284 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=1585;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log_sql`
--

DROP TABLE IF EXISTS `log_sql`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_sql` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_r` int(11) NOT NULL DEFAULT '0' COMMENT 'log_requests.id',
  `rtime` float(15,5) NOT NULL DEFAULT '0.00000' COMMENT 'execution time',
  `rsql` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'sql statement',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `liid` int(11) NOT NULL DEFAULT '0',
  `ar` int(11) NOT NULL DEFAULT '0',
  `rc` int(11) NOT NULL DEFAULT '0',
  `backtrace` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  KEY `id_r` (`id_r`)
) ENGINE=MyISAM AUTO_INCREMENT=1427458 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=839;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `perms`
--

DROP TABLE IF EXISTS `perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perms` (
  `id_user` int(11) NOT NULL,
  `perm_c` int(11) NOT NULL DEFAULT '0',
  `perm_d` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00',
  `id_x` int(11) NOT NULL DEFAULT '0',
  `iden` int(11) NOT NULL DEFAULT '0',
  `last_perm` smallint(6) NOT NULL DEFAULT '1' COMMENT 'rol ostannogo vhodu: 1-ostanna, 0-nt ostanna',
  UNIQUE KEY `k` (`id_user`,`perm_d`,`id_x`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `polls_n`
--

DROP TABLE IF EXISTS `polls_n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polls_n` (
  `id_poll` int(11) NOT NULL AUTO_INCREMENT,
  `poll_code` varchar(50) NOT NULL DEFAULT '',
  `krespondents` int(11) NOT NULL DEFAULT '0',
  `name_ua` varchar(255) NOT NULL DEFAULT '',
  `name_ru` varchar(255) NOT NULL DEFAULT '',
  `id_ank` int(11) NOT NULL DEFAULT '0' COMMENT 'ank_names.id_ank',
  `id_sample` int(11) NOT NULL DEFAULT '0',
  `dtFrom` date NOT NULL DEFAULT '0000-00-00',
  `dtTo` date NOT NULL DEFAULT '0000-00-00',
  `dtCreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL DEFAULT '0' COMMENT 'id user-creater',
  `state` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-not created completelly, 1-created, 2-committed(changing not permitted)',
  PRIMARY KEY (`id_poll`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=97;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_geo_age`
--

DROP TABLE IF EXISTS `ref_geo_age`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_geo_age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL DEFAULT '0',
  `qty_man` int(11) NOT NULL DEFAULT '0',
  `qty_woman` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_ref_geo_age_city_id` (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ref_geo_age';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles_n`
--

DROP TABLE IF EXISTS `roles_n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_n` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `perm_code` char(2) NOT NULL DEFAULT '',
  `role_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=42;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `hw_id` int(11) NOT NULL DEFAULT '0',
  `task` text NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(255) NOT NULL DEFAULT '',
  `user_lname` varchar(255) NOT NULL DEFAULT '',
  `user_mname` varchar(255) NOT NULL DEFAULT '',
  `user_login` varchar(255) NOT NULL DEFAULT '',
  `user_pass` varchar(32) NOT NULL DEFAULT '',
  `hw_id` int(11) NOT NULL DEFAULT '0',
  `date_nar` date NOT NULL DEFAULT '0000-00-00',
  `stat` enum('n/a','male','female') NOT NULL DEFAULT 'n/a',
  `dom_addr` varchar(255) NOT NULL DEFAULT '',
  `tel_num` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `has_car` tinyint(3) NOT NULL DEFAULT '0',
  `dtFrom` date NOT NULL DEFAULT '0000-00-00' COMMENT 'data pochatku roboty',
  `dtTo` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Data kinca roboty',
  `id_role` int(11) NOT NULL DEFAULT '0' COMMENT 'roles_n.id_role',
  `lang` char(2) NOT NULL DEFAULT 'ua' COMMENT 'ua,ru',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`user_login`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5496 ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'epoll'
--

--
-- Dumping routines for database 'epoll'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-07 19:33:15
