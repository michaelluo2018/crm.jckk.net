--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 17:39
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_department
--

DROP TABLE IF EXISTS `jckk_department`;
CREATE TABLE `jckk_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) DEFAULT NULL COMMENT '部门名称',
  `sort` int(10) DEFAULT NULL COMMENT '排序 ',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_department
--

INSERT INTO `jckk_department` VALUES('91','技术部','1','1522657251','0');
