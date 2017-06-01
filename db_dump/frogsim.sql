/*
Navicat MySQL Data Transfer

Source Server         : phpMyAdmin
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : frogsim

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-06-01 03:08:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for frog_tbl
-- ----------------------------
DROP TABLE IF EXISTS `frog_tbl`;
CREATE TABLE `frog_tbl` (
  `frog_id` int(11) NOT NULL AUTO_INCREMENT,
  `frog_specie_id` int(11) DEFAULT NULL,
  `frog_gender` varchar(255) DEFAULT NULL,
  `frog_weight` double DEFAULT NULL,
  `frog_age` varchar(255) DEFAULT NULL,
  `frog_pond_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`frog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pond_tbl
-- ----------------------------
DROP TABLE IF EXISTS `pond_tbl`;
CREATE TABLE `pond_tbl` (
  `pond_id` int(11) NOT NULL AUTO_INCREMENT,
  `pond_name` varchar(255) NOT NULL,
  `pond_capacity` varchar(255) NOT NULL,
  `pond_size` varchar(255) NOT NULL,
  PRIMARY KEY (`pond_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for specie_tbl
-- ----------------------------
DROP TABLE IF EXISTS `specie_tbl`;
CREATE TABLE `specie_tbl` (
  `specie_id` int(11) NOT NULL AUTO_INCREMENT,
  `specie_name` varchar(255) DEFAULT NULL,
  `specie_growth_rate` varchar(255) NOT NULL,
  `specie_mature_age` varchar(255) NOT NULL,
  `specie_life_expect` int(11) NOT NULL,
  `specie_crowd_rate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`specie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
