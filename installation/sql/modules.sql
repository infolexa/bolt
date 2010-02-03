DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `alias` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `installed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`),
  UNIQUE KEY `uniq_alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`id`,`name`,`title`,`description`,`alias`,`type`,`path`,`ordering`,`installed`)
VALUES
	(1,'auth','Auth','Basic Authentication for Kohana','auth','core','modules/auth',2,1),
	(3,'orm','','','orm','core','modules/orm',3,1),
	(4,'pagination','','','pagination','core','modules/pagination',4,1),
	(5,'sprig','','','sprig','core','modules/sprig',5,1),
	(6,'aacl','','','aacl','core','modules/aacl',6,1),
	(7,'pages','Pages','Organize pages for your website','page','app','modules/pages',7,1),
	(8,'statichtml','','','html','app','modules/statichtml',8,1),
	(9,'users','','','members','app','modules/users',9,1),

/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;