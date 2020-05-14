/*
 Navicat Premium Data Transfer

 Source Server         : My-localhost
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : admin

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 12/14/2019 09:49:48 AM
*/

USE admin;

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `itemorder`;
CREATE TABLE `itemorder` (
  `Orderid` int(20) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(60) NOT NULL,
  `ItemBranch` varchar(60) NOT NULL,
  `ItemCategories` varchar(60) NOT NULL,
  `ItemAmount` int(10) NOT NULL,
  `ItemPrice` int(100) NOT NULL,
  PRIMARY KEY (`Orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
