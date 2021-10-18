/*
Navicat MySQL Data Transfer

Source Server         : Schneider Dev
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : crudoo

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-10-04 11:21:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contatos
-- ----------------------------
DROP TABLE IF EXISTS `contatos`;
CREATE TABLE `contatos` (
  `cnto_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnto_nome` varchar(255) DEFAULT NULL,
  `cnto_email` varchar(255) DEFAULT NULL,
  `cnto_status` char(1) DEFAULT 'S',
  PRIMARY KEY (`cnto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contatos
-- ----------------------------
INSERT INTO `contatos` VALUES ('1', 'Gustavo', 'gustavo@email.com', 'S');
