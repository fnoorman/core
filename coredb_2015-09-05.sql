# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.26)
# Database: coredb
# Generation Time: 2015-09-05 11:35:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table auth_assignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table auth_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`)
VALUES
	('AddPermission',2,'Able to add permission',NULL,NULL,1434271619,1434271619),
	('Author',1,'Author descriptions',NULL,NULL,1434264927,1434264927),
	('Client',1,'Client Roles',NULL,NULL,1434268923,1434268923),
	('CreatePost',2,'Able to create post',NULL,NULL,1437560729,1437560729),
	('Duduk nganga',2,'goyang kaki',NULL,NULL,1439363830,1439363830),
	('Remove Permission',2,'Able to remove permission',NULL,NULL,1434271729,1434271729),
	('System Admin',1,'System Administration',NULL,NULL,1437560806,1437560806),
	('ViewAuthorisation',2,'Able to view Authorisation',NULL,NULL,1434271465,1434271465);

/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;

INSERT INTO `auth_item_child` (`parent`, `child`)
VALUES
	('Client','AddPermission'),
	('Client','Author'),
	('System Admin','Client'),
	('Author','Duduk nganga'),
	('Author','Remove Permission');

/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table contest
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contest`;

CREATE TABLE `contest` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_type` int(2) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;

INSERT INTO `contest` (`id`, `contest_id`, `question_id`, `question_type`, `question`, `answer`, `status`)
VALUES
	(87,53,1,0,'ytry','{\"answer1\":\"ytry\",\"answer2\":\"ytry\",\"answer3\":\"yrty\",\"answer4\":\"ytry\",\"answer5\":\"A\"}',1),
	(88,53,2,1,'yrty','{\"answer1\":\"ryt\"}',1),
	(89,54,1,0,'yrrt','{\"answer1\":\"yrtyrtyu\",\"answer2\":\"rtuty\",\"answer3\":\"utyu\",\"answer4\":\"utyu\",\"answer5\":\"A\"}',1);

/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contest_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contest_main`;

CREATE TABLE `contest_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `contest_name` varchar(31) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `contest_main` WRITE;
/*!40000 ALTER TABLE `contest_main` DISABLE KEYS */;

INSERT INTO `contest_main` (`id`, `user_id`, `contest_name`, `status`)
VALUES
	(53,6,'trtr',1),
	(54,6,'tyrerty',1);

/*!40000 ALTER TABLE `contest_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lookup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lookup`;

CREATE TABLE `lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `lookup` WRITE;
/*!40000 ALTER TABLE `lookup` DISABLE KEYS */;

INSERT INTO `lookup` (`id`, `name`, `code`, `type`, `position`)
VALUES
	(4,'ACTIVE',1,'Package',1),
	(5,'INACTIVE',0,'Package',2),
	(6,'ACTIVE',1,'Contest',1),
	(7,'INACTIVE',0,'Contest',2);

/*!40000 ALTER TABLE `lookup` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1432527015),
	('m130524_201442_init',1432527020),
	('m140506_102106_rbac_init',1432540036);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table package
# ------------------------------------------------------------

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  `maxCallOut` int(11) NOT NULL COMMENT 'maximum of callouts allowed',
  `maxAllowedCode` int(11) NOT NULL COMMENT 'number of given code',
  `enable` int(11) DEFAULT '0' COMMENT 'Status of the package',
  `code` varchar(19) DEFAULT NULL COMMENT 'package code',
  `videoMaxSize` varchar(7) DEFAULT '1000',
  `pictureMaxSize` varchar(7) DEFAULT '512',
  `minBalance` int(11) DEFAULT NULL COMMENT 'Minimum balamce on callouts',
  `update_by` int(11) DEFAULT NULL,
  `update_at` int(11) NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `package_code_idx` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table setting_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `setting_item`;

CREATE TABLE `setting_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(101) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `setting_item` WRITE;
/*!40000 ALTER TABLE `setting_item` DISABLE KEYS */;

INSERT INTO `setting_item` (`id`, `name`, `update_by`, `create_by`)
VALUES
	(1,'layout',NULL,NULL),
	(2,'unify',NULL,NULL),
	(3,'inspinia',NULL,NULL);

/*!40000 ALTER TABLE `setting_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '7',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'superadmin','5QgSFLJaRv4Rr1wZ3sVBjMw9IStH7pK1','$2y$13$jQ2cBEwxWubRtF853Xpfe.pVG4mEikyUjJfXsOrV/MDYFXz6FutdC',NULL,'fahmy@aptinventions.com',10,1432527060,1432527060),
	(4,'hafiz','ZgDKSsT86pzwLnx9TTPSnBCg0vNl_-oA','$2y$13$DAcaXvFWIHUEFhj1ciBXduOZSWHCD/UNuzXqqQfLV5przLud2cxRO',NULL,'hafiz@bb.com',7,1439791273,1439791273);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
