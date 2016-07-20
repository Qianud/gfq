# Host: localhost  (Version: 5.5.47)
# Date: 2016-07-13 11:12:16
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `wp_user`;
CREATE TABLE `wp_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';
