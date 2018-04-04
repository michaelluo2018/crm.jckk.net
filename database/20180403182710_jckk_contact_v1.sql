--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 18:27
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_contact
--

DROP TABLE IF EXISTS `jckk_contact`;
CREATE TABLE `jckk_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `position` varchar(50) DEFAULT NULL COMMENT '职位',
  `sex` enum('0','1') DEFAULT NULL COMMENT '性别，0为男',
  `mobile` varchar(20) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(20) DEFAULT NULL COMMENT 'QQ',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_contact
--

INSERT INTO `jckk_contact` VALUES('20','star','it','1','18676758995','3434234550@qq.com','3434234550','1522662964','0');
