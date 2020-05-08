/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : GpsLocationTest

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2017-10-12 14:20:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Locations
-- ----------------------------
DROP TABLE IF EXISTS `Locations`;
CREATE TABLE `Locations` (
  `LocationId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `DeviceId` varchar(200) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  PRIMARY KEY (`LocationId`)
) ENGINE=InnoDB AUTO_INCREMENT=841 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
