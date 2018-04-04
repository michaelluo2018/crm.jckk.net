--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 17:40
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_user
--

DROP TABLE IF EXISTS `jckk_user`;
CREATE TABLE `jckk_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `chinese_name` varchar(50) DEFAULT NULL COMMENT '中文名字',
  `english_name` varchar(50) DEFAULT NULL COMMENT '英文名字',
  `sex` enum('0','1') DEFAULT NULL COMMENT '性别,0为男',
  `department_id` int(11) DEFAULT NULL COMMENT '所在部门 ',
  `post_id` int(11) DEFAULT NULL COMMENT '岗位名称 ',
  `address` varchar(200) DEFAULT NULL COMMENT '地址 ',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号 ',
  `wechat` varchar(20) DEFAULT NULL COMMENT '微信号 ',
  `email` varchar(30) DEFAULT NULL COMMENT '电子邮箱 ',
  `qq` varchar(30) NOT NULL COMMENT 'QQ',
  `heard_img` varchar(100) DEFAULT NULL COMMENT '头像 ',
  `introduction` text COMMENT '个人简介 ',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_user
--

INSERT INTO `jckk_user` VALUES('24','方桂珍','star','1','91','78','信息','18676758995','18676758995','3434234550@qq.com','3434234550','/uploads/20180402\\d5d18be366a6fe1cce76e4cd8484e22a.jpg','123456789','131353548a9be4e856de303d38d507ff','1522637570','0');
