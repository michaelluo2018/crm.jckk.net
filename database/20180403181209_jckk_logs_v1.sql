--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 18:12
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_logs
--

DROP TABLE IF EXISTS `jckk_logs`;
CREATE TABLE `jckk_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) DEFAULT NULL COMMENT '模块',
  `action` varchar(50) DEFAULT NULL COMMENT '方法 ',
  `type` int(10) DEFAULT NULL COMMENT '类型，（增加 1，删除2，修改3） ',
  `before_value` text COMMENT '之前值 ',
  `after_value` text COMMENT '现值',
  `title` varchar(100) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL COMMENT 'ip',
  `uid` int(10) DEFAULT NULL COMMENT '操作人',
  `create_time` varchar(25) DEFAULT NULL COMMENT '加入时间',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=334 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_logs
--

INSERT INTO `jckk_logs` VALUES('333','System','setting_save','3','{\"id\":41,\"sys_key\":\"system_heard_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\cb53cbf73bd25f9194372f295e13740b.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','{\"id\":41,\"sys_key\":\"system_heard_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\0dc007195a075596ad6f2be5eb5f8bc0.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','更改system_heard_img(系统设置)信息，ID是41','127.0.0.1','24','2018-04-03 13:53:44','0');
INSERT INTO `jckk_logs` VALUES('332','System','setting_save','3','{\"id\":42,\"sys_key\":\"system_login_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\639f2b91d4601a6f77cdfa03af06d465.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','{\"id\":42,\"sys_key\":\"system_login_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\61bdbffb6f194398a1deb63b42c6cfcd.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','更改system_login_img(系统设置)信息，ID是42','127.0.0.1','24','2018-04-03 13:53:30','0');
INSERT INTO `jckk_logs` VALUES('331','System','setting_save','3','{\"id\":47,\"sys_key\":\"system_logo_icon\",\"sys_value\":\"\\/uploads\\/20180403\\\\25dc32a7cd3815fa145df5cca6241c1c.png\",\"create_time\":\"2018-04-03 13:39:45\"}','{\"id\":47,\"sys_key\":\"system_logo_icon\",\"sys_value\":\"\\/uploads\\/20180403\\\\dd81696329e345b34858c350e9676e8a.png\",\"create_time\":\"2018-04-03 13:39:45\"}','更改system_logo_icon(系统设置)信息，ID是47','127.0.0.1','24','2018-04-03 13:40:22','0');
INSERT INTO `jckk_logs` VALUES('319','System','setting_save','3','{\"id\":40,\"sys_key\":\"system_logo\",\"sys_value\":\"\\/uploads\\/20180403\\\\91dd8be8df863c062c497b77dee5085e.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','{\"id\":40,\"sys_key\":\"system_logo\",\"sys_value\":\"\\/uploads\\/20180403\\\\efffb8d065af55b782cbce868d1573b5.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','更改system_logo(系统设置)信息，ID是40','127.0.0.1','24','2018-04-03 11:40:39','0');
INSERT INTO `jckk_logs` VALUES('320','System','setting_save','1','','{\"sys_key\":\"system_email_server\",\"sys_value\":\"smtp.163.com\",\"create_time\":\"2018-04-03 11:41:14\",\"id\":\"43\"}','添加system_email_server(系统设置)信息，ID是43','127.0.0.1','24','2018-04-03 11:41:14','0');
INSERT INTO `jckk_logs` VALUES('321','System','setting_save','1','','{\"sys_key\":\"system_email_port\",\"sys_value\":\"25\",\"create_time\":\"2018-04-03 11:41:14\",\"id\":\"44\"}','添加system_email_port(系统设置)信息，ID是44','127.0.0.1','24','2018-04-03 11:41:14','0');
INSERT INTO `jckk_logs` VALUES('322','System','setting_save','1','','{\"sys_key\":\"system_email\",\"sys_value\":\"jckk2017@163.com\",\"create_time\":\"2018-04-03 11:41:14\",\"id\":\"45\"}','添加system_email(系统设置)信息，ID是45','127.0.0.1','24','2018-04-03 11:41:14','0');
INSERT INTO `jckk_logs` VALUES('323','System','setting_save','1','','{\"sys_key\":\"system_email_pwd\",\"sys_value\":\"\",\"create_time\":\"2018-04-03 11:41:14\",\"id\":\"46\"}','添加system_email_pwd(系统设置)信息，ID是46','127.0.0.1','24','2018-04-03 11:41:14','0');
INSERT INTO `jckk_logs` VALUES('324','System','setting_save','3','{\"id\":46,\"sys_key\":\"system_email_pwd\",\"sys_value\":\"\",\"create_time\":\"2018-04-03 11:41:14\"}','{\"id\":46,\"sys_key\":\"system_email_pwd\",\"sys_value\":\"MTIzNDU2\",\"create_time\":\"2018-04-03 11:41:14\"}','更改system_email_pwd(系统设置)信息，ID是46','127.0.0.1','24','2018-04-03 11:43:07','0');
INSERT INTO `jckk_logs` VALUES('325','System','setting_save','3','{\"id\":41,\"sys_key\":\"system_heard_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\ae7bd51420dd5581394a372563bbb1de.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','{\"id\":41,\"sys_key\":\"system_heard_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\cb53cbf73bd25f9194372f295e13740b.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','更改system_heard_img(系统设置)信息，ID是41','127.0.0.1','24','2018-04-03 13:30:42','0');
INSERT INTO `jckk_logs` VALUES('326','System','setting_save','3','{\"id\":42,\"sys_key\":\"system_login_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\854f56beb2d570a94427832e42a6dcc3.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','{\"id\":42,\"sys_key\":\"system_login_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\639f2b91d4601a6f77cdfa03af06d465.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','更改system_login_img(系统设置)信息，ID是42','127.0.0.1','24','2018-04-03 13:30:42','0');
INSERT INTO `jckk_logs` VALUES('327','System','setting_save','3','{\"id\":40,\"sys_key\":\"system_logo\",\"sys_value\":\"\\/uploads\\/20180403\\\\efffb8d065af55b782cbce868d1573b5.jpg\",\"create_time\":\"2018-04-03 11:40:05\"}','{\"id\":40,\"sys_key\":\"system_logo\",\"sys_value\":\"\\/uploads\\/20180403\\\\d5026769ee240e382df088a84a49f803.png\",\"create_time\":\"2018-04-03 11:40:05\"}','更改system_logo(系统设置)信息，ID是40','127.0.0.1','24','2018-04-03 13:32:51','0');
INSERT INTO `jckk_logs` VALUES('328','System','setting_save','1','','{\"sys_key\":\"system_logo_icon\",\"sys_value\":\"\\/uploads\\/20180403\\\\257b39627d05594cb87d49547fa3dcfb.png\",\"create_time\":\"2018-04-03 13:39:45\",\"id\":\"47\"}','添加system_logo_icon(系统设置)信息，ID是47','127.0.0.1','24','2018-04-03 13:39:45','0');
INSERT INTO `jckk_logs` VALUES('329','System','setting_save','1','','{\"sys_key\":\"system_logo_text\",\"sys_value\":\"\\/uploads\\/20180403\\\\3796e98ce588446cdfbe48ae00cb3963.png\",\"create_time\":\"2018-04-03 13:39:45\",\"id\":\"48\"}','添加system_logo_text(系统设置)信息，ID是48','127.0.0.1','24','2018-04-03 13:39:45','0');
INSERT INTO `jckk_logs` VALUES('330','System','setting_save','3','{\"id\":47,\"sys_key\":\"system_logo_icon\",\"sys_value\":\"\\/uploads\\/20180403\\\\257b39627d05594cb87d49547fa3dcfb.png\",\"create_time\":\"2018-04-03 13:39:45\"}','{\"id\":47,\"sys_key\":\"system_logo_icon\",\"sys_value\":\"\\/uploads\\/20180403\\\\25dc32a7cd3815fa145df5cca6241c1c.png\",\"create_time\":\"2018-04-03 13:39:45\"}','更改system_logo_icon(系统设置)信息，ID是47','127.0.0.1','24','2018-04-03 13:40:02','0');
INSERT INTO `jckk_logs` VALUES('318','System','setting_save','3','{\"id\":39,\"sys_key\":\"system_address\",\"sys_value\":\"\\u6df1\\u5733\\u534e\\u5f3a\\u5317\",\"create_time\":\"2018-04-03 11:39:43\"}','{\"id\":39,\"sys_key\":\"system_address\",\"sys_value\":\"\\u6df1\\u5733\\u534e\\u5f3a\\u53170\",\"create_time\":\"2018-04-03 11:39:43\"}','更改system_address(系统设置)信息，ID是39','127.0.0.1','24','2018-04-03 11:40:32','0');
INSERT INTO `jckk_logs` VALUES('317','System','setting_save','3','{\"id\":38,\"sys_key\":\"system_company\",\"sys_value\":\"\\u91d1\\u8bda\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f8\",\"create_time\":\"2018-04-03 11:39:43\"}','{\"id\":38,\"sys_key\":\"system_company\",\"sys_value\":\"\\u91d1\\u8bda\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f80\",\"create_time\":\"2018-04-03 11:39:43\"}','更改system_company(系统设置)信息，ID是38','127.0.0.1','24','2018-04-03 11:40:32','0');
INSERT INTO `jckk_logs` VALUES('316','System','setting_save','1','','{\"sys_key\":\"system_login_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\854f56beb2d570a94427832e42a6dcc3.jpg\",\"create_time\":\"2018-04-03 11:40:05\",\"id\":\"42\"}','添加system_login_img(系统设置)信息，ID是42','127.0.0.1','24','2018-04-03 11:40:05','0');
INSERT INTO `jckk_logs` VALUES('312','System','setting_save','1','','{\"sys_key\":\"system_company\",\"sys_value\":\"\\u91d1\\u8bda\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f8\",\"create_time\":\"2018-04-03 11:39:43\",\"id\":\"38\"}','添加system_company(系统设置)信息，ID是38','127.0.0.1','24','2018-04-03 11:39:43','0');
INSERT INTO `jckk_logs` VALUES('313','System','setting_save','1','','{\"sys_key\":\"system_address\",\"sys_value\":\"\\u6df1\\u5733\\u534e\\u5f3a\\u5317\",\"create_time\":\"2018-04-03 11:39:43\",\"id\":\"39\"}','添加system_address(系统设置)信息，ID是39','127.0.0.1','24','2018-04-03 11:39:43','0');
INSERT INTO `jckk_logs` VALUES('314','System','setting_save','1','','{\"sys_key\":\"system_logo\",\"sys_value\":\"\\/uploads\\/20180403\\\\91dd8be8df863c062c497b77dee5085e.jpg\",\"create_time\":\"2018-04-03 11:40:05\",\"id\":\"40\"}','添加system_logo(系统设置)信息，ID是40','127.0.0.1','24','2018-04-03 11:40:05','0');
INSERT INTO `jckk_logs` VALUES('315','System','setting_save','1','','{\"sys_key\":\"system_heard_img\",\"sys_value\":\"\\/uploads\\/20180403\\\\ae7bd51420dd5581394a372563bbb1de.jpg\",\"create_time\":\"2018-04-03 11:40:05\",\"id\":\"41\"}','添加system_heard_img(系统设置)信息，ID是41','127.0.0.1','24','2018-04-03 11:40:05','0');
