--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年  04 月 03 日 18:08
-- MySQL版本: 5.7.9
-- PHP 版本: 5.6.16

--
-- 数据库: `jckk_crm`
--

-- -------------------------------------------------------

--
-- 表的结构jckk_customer
--

DROP TABLE IF EXISTS `jckk_customer`;
CREATE TABLE `jckk_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL COMMENT '客户全称',
  `industry` varchar(50) DEFAULT NULL COMMENT '行业',
  `customer_status_1` varchar(50) DEFAULT NULL COMMENT '客户状态1',
  `customer_status_2` varchar(50) DEFAULT NULL COMMENT '客户状态2',
  `company_nature` varchar(20) DEFAULT NULL COMMENT '公司性质',
  `annual_turnover` varchar(50) DEFAULT NULL COMMENT '年营业额',
  `contact_id` varchar(50) DEFAULT NULL COMMENT '首要联系人',
  `note` text COMMENT '备注',
  `create_time` int(11) DEFAULT NULL COMMENT '加入时间',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 jckk_customer
--

INSERT INTO `jckk_customer` VALUES('22','qianhaibendinong0','贵金属','潜在客户','战略级客户','国企','10万以内','20','1111','1522662964','1');
INSERT INTO `jckk_customer` VALUES('21','金城科技0','贵金属','潜在客户','战略级客户','其他','10万以内','20','123456','1522662371','0');
