# Sequel Pro dump
# Version 2210
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.37)
# Database: mtko3
# Generation Time: 2010-06-04 17:05:28 +0800
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `parameters` mediumtext,
  `alias` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `installed` tinyint(1) DEFAULT NULL,
  `core` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`),
  UNIQUE KEY `uniq_alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`id`,`name`,`title`,`description`,`alias`,`type`,`path`,`ordering`,`installed`,`core`)
VALUES
	(1,'bolt-auth','Bolt Auth','A more advanced Authentication library for Bolt CMS forked from Kohana 3\'s basic Auth Module.','auth','library','/WWW/sandbox/boltcms/modules/bolt-auth',14,1,1),
	(4,'pagination','','','pagination','library','/WWW/sandbox/boltcms/modules/pagination',14,1,1),
	(5,'sprig','','','sprig','library','/WWW/sandbox/boltcms/modules/sprig',14,1,1),
	(7,'pages','Pages','Organize pages for your website','page','app','/WWW/sandbox/boltcms/modules/bolt-pages',4,1,1),
	(8,'file','PHP/HTML File','','html','app','/WWW/sandbox/boltcms/modules/statichtml',5,1,1),
	(9,'users','Users','','members','app','/WWW/sandbox/boltcms/modules/bolt-users',6,1,1),
	(10,'magicthemes','MagicThemes','MagicThemes Templates for Joomla and HoneyComb','templates','app','/WWW/sandbox/magicthemes.com/modules/magicthemes',1,1,0),
	(12,'admin','Administrator',NULL,'secret','library','/WWW/sandbox/boltcms/modules/bolt-admin',14,1,1),
	(14,'sprig-mptt','Sprig MPTT','Sprig MPTT by banks','sprig-mptt','library','/WWW/sandbox/boltcms/modules/sprig-mptt',14,1,1),
	(15,'jelly','Jelly','Jelly ORM Library','jelly','library','/WWW/sandbox/boltcms/modules/jelly',14,1,1),
	(17,'bolt-views','Views for Bolt CMS',NULL,'bolt-views','library','/WWW/sandbox/boltcms/modules/bolt-views',2,1,1);

/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `attributes` mediumtext,
  `params` text,
  `meta` text,
  `roles` mediumtext,
  `protocol` varchar(50) DEFAULT 'http:inherit',
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `duplicate_of` int(11) NOT NULL DEFAULT '0',
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`,`route`,`url`,`title`,`alias`,`description`,`attributes`,`params`,`meta`,`roles`,`protocol`,`enabled`,`duplicate_of`,`lft`,`rgt`,`lvl`,`scope`)
VALUES
	(1,'',NULL,'Root','root','',NULL,NULL,NULL,NULL,'',0,0,1,24,0,1);

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `permissions` text,
  `parent` varchar(20) DEFAULT 'login',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`,`name`,`title`,`description`,`permissions`,`parent`)
VALUES
	(1,'login','Registered','Login privileges, granted after account confirmation','','core'),
	(2,'admin','Administrator','Administrative user that can login to the admin section.','','core');
UNLOCK TABLES;


# Dump of table roles_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles_users`;

CREATE TABLE `roles_users` (
  `user_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Dump of table routes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `routes`;

CREATE TABLE `routes` (
  `name` varchar(100) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `regex` mediumtext,
  `defaults` mediumtext,
  `meta` mediumtext,
  `ordering` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table stats_visits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stats_visits`;

CREATE TABLE `stats_visits` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_sessions`;

CREATE TABLE `user_sessions` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) unsigned NOT NULL,
  `contents` text NOT NULL,
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`session_id`),
  KEY `last_active` (`last_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table user_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_tokens`;

CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `date_joined` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`email`,`username`,`password`,`firstname`,`lastname`,`timezone`,`logins`,`last_login`,`date_joined`)
VALUES
	(1,'raeldc@wizmediateam.com','admin','cce314ef9e71ab6399298155c8fb12c81aabcc5f80440b6cce',NULL,NULL,NULL,62,1273707917,1265591656);
UNLOCK TABLES;
# Dump of table widgets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `widgets`;

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `theme` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `show_where` text,
  `hide_where` text,
  `roles` varchar(255) DEFAULT NULL,
  `params` text,
  `type` varchar(10) DEFAULT NULL,
  `show_title` tinyint(1) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `iscore` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;


