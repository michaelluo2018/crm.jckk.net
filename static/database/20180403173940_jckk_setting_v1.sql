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
-- 表的结构jckk_setting
--

DROP TABLE IF EXISTS `jckk_setting`;
CREATE TABLE `jckk_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_key` varchar(50) DEFAULT NULL COMMENT '键',
  `sys_value` varchar(200) DEFAULT NULL COMMENT '值 ',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_setting
--

INSERT INTO `jckk_setting` VALUES('48','system_logo_text','/uploads/20180403\\3796e98ce588446cdfbe48ae00cb3963.png','1522733985');
INSERT INTO `jckk_setting` VALUES('47','system_logo_icon','/uploads/20180403\\dd81696329e345b34858c350e9676e8a.png','1522733985');
INSERT INTO `jckk_setting` VALUES('46','system_email_pwd','MTIzNDU2','1522726874');
INSERT INTO `jckk_setting` VALUES('45','system_email','jckk2017@163.com','1522726874');
INSERT INTO `jckk_setting` VALUES('44','system_email_port','25','1522726874');
INSERT INTO `jckk_setting` VALUES('42','system_login_img','/uploads/20180403\\61bdbffb6f194398a1deb63b42c6cfcd.jpg','1522726805');
INSERT INTO `jckk_setting` VALUES('43','system_email_server','smtp.163.com','1522726874');
INSERT INTO `jckk_setting` VALUES('39','system_address','深圳华强北0','1522726783');
INSERT INTO `jckk_setting` VALUES('40','system_logo','/uploads/20180403\\d5026769ee240e382df088a84a49f803.png','1522726805');
INSERT INTO `jckk_setting` VALUES('41','system_heard_img','/uploads/20180403\\0dc007195a075596ad6f2be5eb5f8bc0.jpg','1522726805');
INSERT INTO `jckk_setting` VALUES('38','system_company','金诚科技有限公司0','1522726783');
