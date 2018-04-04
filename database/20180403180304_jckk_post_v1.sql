--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 18:03
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_post
--

DROP TABLE IF EXISTS `jckk_post`;
CREATE TABLE `jckk_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(50) DEFAULT NULL COMMENT '岗位名称',
  `department_id` int(10) DEFAULT NULL COMMENT '所属部门 ',
  `pid` int(10) DEFAULT '0' COMMENT '上级post_id ',
  `sort` int(11) NOT NULL COMMENT '排序',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_post
--

INSERT INTO `jckk_post` VALUES('79','技术2','91','0','2','1522657267','0');
INSERT INTO `jckk_post` VALUES('78','技术1','91','0','1','1522657267','0');
