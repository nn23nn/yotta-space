# Host: 127.0.0.1  (Version 5.5.47)
# Date: 2017-02-18 11:42:31
# Generator: MySQL-Front 5.4  (Build 2.5)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

#
# Structure for table "ace_action_log"
#

DROP TABLE IF EXISTS `ace_action_log`;
CREATE TABLE `ace_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `user_id` int(10) DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `realname` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "ace_action_log"
#


#
# Structure for table "ace_category"
#

DROP TABLE IF EXISTS `ace_category`;
CREATE TABLE `ace_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_category"
#

/*!40000 ALTER TABLE `ace_category` DISABLE KEYS */;
INSERT INTO `ace_category` VALUES (1,0,'测试分类','测试分类',1,'2016-10-27 06:44:25','2016-10-27 06:44:25');
/*!40000 ALTER TABLE `ace_category` ENABLE KEYS */;

#
# Structure for table "ace_migrations"
#

DROP TABLE IF EXISTS `ace_migrations`;
CREATE TABLE `ace_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_migrations"
#

/*!40000 ALTER TABLE `ace_migrations` DISABLE KEYS */;
INSERT INTO `ace_migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_10_29_090455_entrust_setup_tables',1),('2015_11_27_063339_create_category_table',1);
/*!40000 ALTER TABLE `ace_migrations` ENABLE KEYS */;

#
# Structure for table "ace_password_resets"
#

DROP TABLE IF EXISTS `ace_password_resets`;
CREATE TABLE `ace_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_password_resets"
#


#
# Structure for table "ace_permission_group"
#

DROP TABLE IF EXISTS `ace_permission_group`;
CREATE TABLE `ace_permission_group` (
  `group_id` int(10) DEFAULT '0',
  `permission_id` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "ace_permission_group"
#

/*!40000 ALTER TABLE `ace_permission_group` DISABLE KEYS */;
INSERT INTO `ace_permission_group` VALUES (1,1),(1,2),(1,3),(1,4),(2,5),(2,6);
/*!40000 ALTER TABLE `ace_permission_group` ENABLE KEYS */;

#
# Structure for table "ace_permission_group_config"
#

DROP TABLE IF EXISTS `ace_permission_group_config`;
CREATE TABLE `ace_permission_group_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "ace_permission_group_config"
#

/*!40000 ALTER TABLE `ace_permission_group_config` DISABLE KEYS */;
INSERT INTO `ace_permission_group_config` VALUES (1,'系统管理','2017-02-18 10:14:21','2017-02-18 10:14:21'),(2,'其他管理','2017-02-18 10:14:21','2017-02-18 10:14:21');
/*!40000 ALTER TABLE `ace_permission_group_config` ENABLE KEYS */;

#
# Structure for table "ace_permission_role"
#

DROP TABLE IF EXISTS `ace_permission_role`;
CREATE TABLE `ace_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_permission_role"
#

/*!40000 ALTER TABLE `ace_permission_role` DISABLE KEYS */;
INSERT INTO `ace_permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1);
/*!40000 ALTER TABLE `ace_permission_role` ENABLE KEYS */;

#
# Structure for table "ace_permissions"
#

DROP TABLE IF EXISTS `ace_permissions`;
CREATE TABLE `ace_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_permissions"
#

/*!40000 ALTER TABLE `ace_permissions` DISABLE KEYS */;
INSERT INTO `ace_permissions` VALUES (1,'ADD_ADMIN','添加管理员','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(2,'DEL_ADMIN','删除管理员','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(3,'LIST_ADMIN','管理员列表','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(4,'UP_ADMIN','编辑管理员','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(5,'LIST_PERMISSION','权限列表','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(6,'ADD_PERMISSION','添加权限','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(7,'DEL_PERMISSION','删除权限','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(8,'UP_PERMISSION','编辑权限','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(9,'LIST_ROLE','角色列表','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(10,'ADD_ROLE','添加角色','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(11,'UP_ROLE','编辑角色','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(12,'DEL_ROLE','删除角色','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(13,'LIST_CATEGORY','分类列表','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(14,'ADD_CATEGORY','添加分类','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(15,'UP_CATEGORY','编辑分类','','2016-10-27 06:41:47','2016-10-27 06:41:47'),(16,'DEL_CATEGORY','删除分类','','2016-10-27 06:41:47','2016-10-27 06:41:47');
/*!40000 ALTER TABLE `ace_permissions` ENABLE KEYS */;

#
# Structure for table "ace_role_user"
#

DROP TABLE IF EXISTS `ace_role_user`;
CREATE TABLE `ace_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_role_user"
#

/*!40000 ALTER TABLE `ace_role_user` DISABLE KEYS */;
INSERT INTO `ace_role_user` VALUES (1,1);
/*!40000 ALTER TABLE `ace_role_user` ENABLE KEYS */;

#
# Structure for table "ace_roles"
#

DROP TABLE IF EXISTS `ace_roles`;
CREATE TABLE `ace_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_roles"
#

/*!40000 ALTER TABLE `ace_roles` DISABLE KEYS */;
INSERT INTO `ace_roles` VALUES (1,'super_admin','超级管理员','','2016-10-27 06:41:47','2016-10-27 06:41:47');
/*!40000 ALTER TABLE `ace_roles` ENABLE KEYS */;

#
# Structure for table "ace_users"
#

DROP TABLE IF EXISTS `ace_users`;
CREATE TABLE `ace_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "ace_users"
#

/*!40000 ALTER TABLE `ace_users` DISABLE KEYS */;
INSERT INTO `ace_users` VALUES (1,'liukai','hi_kay@qq.com','$2y$10$V//30GP4LyRePtb99XGa/e//.ECDWOVCfwjhnnrO93wruECzQK.Pa','AxA48NWZD5hXD96k4stJL2dxJbABpTD8pyOSX4mJa3ekwJRfzJpmEtmAV1oi','2016-10-27 06:41:47','2017-02-17 06:34:43'),(2,'devin','nn23nn@163.com','$2y$10$EEnGDDemEcarNvNiDShZOuHstuOlp1CFsMSl6JvJqo23M79eZFLvq',NULL,'2016-11-10 02:52:25','2016-11-10 02:52:25');
/*!40000 ALTER TABLE `ace_users` ENABLE KEYS */;
