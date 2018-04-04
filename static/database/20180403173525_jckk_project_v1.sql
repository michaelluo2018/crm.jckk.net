--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 17:35
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_project
--

DROP TABLE IF EXISTS `jckk_project`;
CREATE TABLE `jckk_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL COMMENT '客户id',
  `executor_uid` int(10) DEFAULT NULL COMMENT '项目执行人',
  `planning_uid` int(10) DEFAULT NULL COMMENT '策划人',
  `docking_uid` int(10) DEFAULT NULL COMMENT '对接人',
  `manage_uid` int(10) DEFAULT NULL COMMENT '管理人',
  `product_demand_1` varchar(50) DEFAULT NULL COMMENT '需求产品一级',
  `product_demand_2` varchar(50) DEFAULT NULL COMMENT '需求产品二级',
  `contract_status` varchar(30) DEFAULT NULL COMMENT '合同状态 ',
  `contract_amount` varchar(30) DEFAULT NULL COMMENT '合同金额 ',
  `payment_type` varchar(50) DEFAULT NULL COMMENT '回款模式 ',
  `payment_status` varchar(50) DEFAULT NULL COMMENT '回款状态 ',
  `rate` varchar(50) DEFAULT NULL COMMENT '毛利率 ',
  `cost` varchar(50) DEFAULT NULL COMMENT '成本支出 ',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_project
--

INSERT INTO `jckk_project` VALUES('11','22','24','24','24','24','品牌信息壁垒体系','官网SEO','合约审核','10000','续约审核','合约审核','0.2','1000','1','1522662437');
INSERT INTO `jckk_project` VALUES('10','21','24','24','24','24','品牌信息壁垒体系','官网SEO','合约审核','10000','合约审核','合约审核','0.2','1000','0','1522662371');
