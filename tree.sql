-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 08 月 15 日 15:54
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tree`
--

-- --------------------------------------------------------

--
-- 表的结构 `tree_ad`
--

CREATE TABLE IF NOT EXISTS `tree_ad` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_logo` varchar(100) NOT NULL,
  `ad_url` varchar(100) NOT NULL,
  `ad_position` varchar(15) NOT NULL,
  `ad_state` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '广告显示状态',
  `ad_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tree_ad`
--

INSERT INTO `tree_ad` (`ad_id`, `ad_logo`, `ad_url`, `ad_position`, `ad_state`, `ad_order`) VALUES
(1, 'data/attachment/2015-03/20150317174225c.jpg', 'http://www.phpshe.com', 'index_jdt', 1, 1),
(2, 'data/attachment/2015-03/20150317174252u.jpg', 'http://www.phpshe.com', 'index_jdt', 1, 3),
(3, 'data/attachment/2015-03/20150317174237d.jpg', 'http://www.phpshe.com', 'index_jdt', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tree_admin`
--

CREATE TABLE IF NOT EXISTS `tree_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理id',
  `admin_name` varchar(20) NOT NULL COMMENT '管理名',
  `admin_pw` varchar(32) NOT NULL COMMENT '管理密码',
  `admin_atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理注册时间',
  `admin_ltime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理上次登录时间',
  `adminlevel_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tree_admin`
--

INSERT INTO `tree_admin` (`admin_id`, `admin_name`, `admin_pw`, `admin_atime`, `admin_ltime`, `adminlevel_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1269059337, 1462108280, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tree_article`
--

CREATE TABLE IF NOT EXISTS `tree_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_name` varchar(100) NOT NULL,
  `article_text` text NOT NULL,
  `article_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `article_clicknum` int(10) unsigned NOT NULL DEFAULT '0',
  `class_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `article_picture` varchar(250) NOT NULL,
  `article_showpic` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `tree_article`
--

INSERT INTO `tree_article` (`article_id`, `article_name`, `article_text`, `article_atime`, `article_clicknum`, `class_id`, `article_picture`, `article_showpic`) VALUES
(1, '关于简好网络', '<p>\r\n	<strong><span style="color:#E53333;font-size:16px;">COMPANY PROFILE　公司简介</span></strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	灵宝简好网络科技有限公司，优秀的互联网平台与服务提供商，七年网站设计与开发经验，专业从事互联网软件开发等网络技术服务。自公司成立以来，简好网络始终秉承“产品简单好用，用心服务客户”的核心经营理念，在自主研发的创新之路稳健前行。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	严谨的程序开发人员、专业的美工设计、良好的服务让我们在竞争激烈的互联网行业中蓬勃发展。通过我们多年在上百个不同行业领域的项目历练，加之对\r\n各行业、各类型客户需求的理解，抛开炒作与虚夸，以一贯低调、踏实、诚信的风格为企、事业单位提供更好更实用的一站式网站建设服务！\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	业务范围：网站建设、网页设计、网站制作、软件开发、网站维护、域名注册、虚拟主机、网站推广、网络广告、电子商务、企业管理信息化、行业信息化解决方案、网络技术服务等。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong><span style="color:#E53333;font-size:16px;">OUR ADVANTAGE　我们的优势</span></strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	灵宝市首家专业的互联网软件开发企业，专业的网站策划设计公司，灵宝市网站建设第一品牌。\r\n</p>\r\n<p>\r\n	7 年时间里服务超过 500 家客户。为客户开发了上百个项目，并建立了长期合作关系。\r\n</p>\r\n<p>\r\n	拥有多项自主研发网站管理系统，为客户提供不同行业的互联网解决方案。\r\n</p>\r\n<p>\r\n	公司专注于网站构架、设计、开发，七年如一日，我们只专注于WEB领域技术研究。\r\n</p>\r\n<p>\r\n	美工设计师/程序员/技术总监/项目协调人员都拥有多年的互联网行业从业经验。\r\n</p>\r\n<p>\r\n	我们同时提供 中文 和 英文 语言服务。\r\n</p>\r\n<p>\r\n	制作符合W3C标准的网站，兼容各个版本的浏览器，IE6,IE7,IE8,IE9,Safari,火狐,遨游,谷歌,360……兼容各个版本浏览器是我们对技术的执着追求虽然有些浏览器并不常用。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong><span style="color:#E53333;font-size:16px;">Enterprise culture　企业文化</span></strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h4>\r\n	专业+经验+创意+服务\r\n</h4>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	简好网络坚信质量和信誉是我们存在的基石。我们注重客户提出的每个要求并充分考虑每一个细节，积极做好服务，不断地完善自己，通过不懈的努力，我\r\n们把每一位客户都做成了朋友，感谢你们对简好网络的信任与支持，这种信任与支持激励着我们提供更优质的服务。在所有新老客户面前，我们都很乐意朴实的跟您\r\n接触，深入的了解您的企业，每一次倾心的合作，都是一个全新的体会和挑战，我们随时与您同在。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h4>\r\n	我们的愿景：最受客户信任的互联网企业\r\n</h4>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	将以诚实守信的操守、共同发展的理念，长远的眼光建立公司的品牌\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h4>\r\n	我们的使命：提升企业品牌形象获得最大的价值\r\n</h4>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	以高品质的服务 / 稳健的技术 / 向用户提供丰富 / 可靠的互联网产品\r\n</p>\r\n<p>\r\n	持续关注新的互联网走向 / 积极探索新的用户需求 / 不断为用户提供创新的业务\r\n</p>\r\n<p>\r\n	为企业搭建优秀的网络平台 / 捕捉有效的客户信息 / 促进企业经济的快速发展\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h4>\r\n	我们的价值观：诚信、专注、尽责、创新\r\n</h4>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>详情请访问：</strong><a href="http://www.phpshe.com/about" target="_blank"><strong><span style="color:#E53333;">灵宝简好网络科技有限公司简介</span></strong></a> \r\n</p>', 1335834720, 980, 1, '', 0),
(2, 'PHPSHE B2C商城系统v1.4版发布', '【PHPSHE基本资料】:<br />\r\n当前版本：<strong>PHPSHE B2C商城系统v1.4</strong>(build 20150515 UTF8) <br />\r\n官方网站：<a target="_blank" href="http://www.phpshe.com/phpshe">http://www.phpshe.com/phpshe</a><br />\r\n演示网站：<a target="_blank" href="http://www.phpshe.com/demo/phpshe">http://www.phpshe.com/demo/phpshe</a><br />\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	【PHPSHE系统简介】:\r\n</p>\r\n<p>\r\n	<a target="_blank" href="http://www.phpshe.com/phpshe"><span style="color:#E53333;"><strong>PHPSHE商城系统</strong></span></a>是将商品管理、品牌管理、规格管理、促销管理、优惠券管理、在线购物、订单管理、支付管理、文章管理、会员管理、权限管理、通知管理、咨询评价、数据统计等功能相结合，并提供了简易的操作、实用的功能，快速让用户建立独立个性化的网上商店，为用户提供了一个低成本、高效率的网上商城建设方案。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	【PHPSHE功能概述】:\r\n</p>\r\n<p>\r\n	软件适用于于各行业产品销售的商家，主要包括有以下功能：\r\n</p>\r\n<p>\r\n	01. 管理员发布、修改，删除商品信息，商品多级分类检索、多属性检索等；<br />\r\n02. 管理员可以对商品品牌名称，图片，描述等管理；<br />\r\n03. 管理员可以对商品规格管理，如：尺寸，颜色，套餐等；<br />\r\n04. 管理员对商品咨询管理，商品评价管理；<br />\r\n05. 管理员对商品活动管理，优惠券管理；<br />\r\n06. 订单流程清晰，可及时便捷查询，修改和处理订单信息；<br />\r\n07. 会员积分体系，有效增加客户回购率及粘性；<br />\r\n08. 详细统计功能，实时显示每日订单情况，访客流量，热销排行，消费排行；<br />\r\n09. 管理员对文章分类管理、文章管理、单页信息管理；<br />\r\n10. 管理员对会员信息管理，管理帐号管理，管理权限管理；<br />\r\n11. 管理员对网站整体基本信息的系统设置；<br />\r\n12. 集成支付宝线、下转帐/汇款、货到付款、网银等接口方便用户支付；<br />\r\n13. 邮件实时提醒，随时随地掌握网站注册，下单，付款，发货等情况；<br />\r\n14. 便捷模板中心，一键轻松更换不同风格的模板；<br />\r\n15. 高效缓存处理，提高系统的运行效率；<br />\r\n16. 一键对网站进行备份恢复，保障数据安全；<br />\r\n17. 支持首页导航、友情链接、首页广告图管理；<br />\r\n18. 会员注册、登录，订单查询，积分明细，优惠券，咨询，评价及商品收藏等。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	【PHPSHE技术规格】:\r\n</p>\r\n<p>\r\n	PHP + Mysql，前端URL伪静态\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	【PHPSHE安装说明】:\r\n</p>\r\n<p>\r\n	1.用FTP工具（如flashfxp）把程序上传到服务器；<br />\r\n2.给./config.php文件、./install目录、./data目录及其子目录，加 777 权限（windows服务器可忽略此步）；<br />\r\n3.访问http://您的网址/install进行安装。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	【PHPSHE升级说明】:<br />\r\n老版本升级至1.4版本，请先上传PHPSHE1.4程序中的 ./install目录，然后访问 http://您的网址/install/update 按教程进行升级；\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n【PHPSHE1.4更新详情】\r\n<div style="border:1px solid #ccc;background:#fafafa;padding:10px;">\r\n	<span style="color:#009900;">[新增]</span>分类自定义标题，关键词及描述<br />\r\n<span style="color:#009900;">[新增]</span>产品自定义关键词和描述<br />\r\n<span style="color:#009900;">[新增]</span>订单按帐号，时间段筛选<br />\r\n<span style="color:#009900;">[新增]</span>开启和关闭游客购买设置<br />\r\n<span style="color:#009900;">[新增]</span>广告位显示隐藏<br />\r\n<span style="color:#009900;">[新增]</span>订单邮件通知,邮件队列记录<br />\r\n<span style="color:#009900;">[新增]</span>群发邮件通知<br />\r\n<span style="color:#009900;">[新增]</span>积分功能，积分明细<br />\r\n<span style="color:#009900;">[新增]</span>用户注册归属地<br />\r\n<span style="color:#009900;">[新增]</span>特价活动，优惠券<br />\r\n<span style="color:#009900;">[新增]</span>订单统计，销量排行，消费排行<br />\r\n<span style="color:#009900;">[新增]</span>管理员权限<br />\r\n<span style="color:#009900;">[新增]</span>热门搜索<br />\r\n<span style="color:#FF9900;">[修正]</span>支付宝及网银支付sql注入<br />\r\n<span style="color:#FF9900;">[修正]</span>后台及会员中心csrf漏洞<br />\r\n<span style="color:#FF9900;">[修正]</span>用户名，邮箱服务器端检测<br />\r\n<span style="color:#FF9900;">[修正]</span>缓存反斜杠出错<br />\r\n<span style="color:#FF9900;">[修正]</span>后台登录权限bug<br />\r\n<span style="color:#FF9900;">[修正]</span>广告修改位置bug<br />\r\n<span style="color:#FF9900;">[修正]</span>个别PHP环境验证码不显示<br />\r\n<span style="color:#337FE5;">[优化]</span>资讯中心和帮助中心<br />\r\n<span style="color:#337FE5;">[优化]</span>订单流程及用户体验<br />\r\n<span style="color:#337FE5;">[优化]</span>订单号升级到15位<br />\r\n<span style="color:#337FE5;">[优化]</span>品牌相关功能<br />\r\n<span style="color:#337FE5;">[优化]</span>商品添加规格流程<br />\r\n<span style="color:#337FE5;">[优化]</span>管理后台操作界面及用户体验<br />\r\n<span style="color:#337FE5;">[优化]</span>提升前台图片加载速度<br />\r\n<span style="color:#337FE5;">[优化]</span>重写产品缩略图原理，高清不变形<br />\r\n<span style="color:#337FE5;">[优化]</span>重新设计会员中心界面<br />\r\n<span style="color:#337FE5;">[优化]</span>重新设计登录注册页面<br />\r\n<span style="color:#337FE5;">[优化]</span>更新dialog版本<br />\r\n<span style="color:#337FE5;">[优化]</span>更新编辑器版本<br />\r\n<span style="color:#337FE5;">[优化]</span>评价2星变更为差评<br />\r\n<span style="color:#337FE5;">[优化]</span>在线客服样式<br />\r\n<span style="color:#337FE5;">[优化]</span>验证码类<br />\r\n<span style="color:#337FE5;">[优化]</span>缓存模块<br />\r\n<span style="color:#337FE5;">[优化]</span>数据备份<br />\r\n<span style="color:#888888;">[移除]</span>微博设置\r\n</div>\r\n<p>\r\n	<strong><br />\r\n</strong> \r\n</p>\r\n<p>\r\n	<strong>详情请访问：</strong><a href="http://www.phpshe.com/phpshe" target="_blank"><strong><span style="color:#E53333;">PHPSHE商城系统简介</span></strong></a> \r\n</p>', 1335856260, 931, 1, '', 1),
(3, '购买PHPSHE商城系统商业版', '<div class="taocan">\r\n\r\n	<table class="ke-zeroborder" style="font-size:15px;" border="0" cellpadding="0" cellspacing="0" width="100%">\r\n		<tbody>\r\n			<tr>\r\n				<td style="background:#C4D9EC;font-size:14px;" align="center" width="170">\r\n					<strong>服务项目\\类型</strong> \r\n				</td>\r\n				<td style="background:#C4D9EC;font-size:14px;" align="center" width="170">\r\n					<strong>免费版</strong> \r\n				</td>\r\n				<td style="background:#C4D9EC;font-size:14px;" align="center" width="170">\r\n					<strong>基础版</strong> \r\n				</td>\r\n				<td style="background:#C4D9EC;font-size:14px;" align="center" width="170">\r\n					<strong>标准版</strong> \r\n				</td>\r\n				<td style="background:#C4D9EC;font-size:14px;" align="center">\r\n					<strong>高级定制版</strong> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1" align="center">\r\n					系统功能\r\n				</td>\r\n				<td align="center">\r\n					有限制\r\n				</td>\r\n				<td align="center">\r\n					无限制\r\n				</td>\r\n				<td align="center">\r\n					无限制\r\n				</td>\r\n				<td align="center">\r\n					无限制\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1" align="center">\r\n					商业授权\r\n				</td>\r\n				<td align="center">\r\n					×\r\n				</td>\r\n				<td align="center">\r\n					终身\r\n				</td>\r\n				<td align="center">\r\n					终身\r\n				</td>\r\n				<td align="center">\r\n					终身\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					前台版权\r\n				</td>\r\n				<td align="center">\r\n					必须保留\r\n				</td>\r\n				<td align="center">\r\n					允许去除\r\n				</td>\r\n				<td align="center">\r\n					允许去除\r\n				</td>\r\n				<td align="center">\r\n					允许去除\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1" align="center">\r\n					授权域名\r\n				</td>\r\n				<td align="center">\r\n					×\r\n				</td>\r\n				<td align="center">\r\n					1个\r\n				</td>\r\n				<td align="center">\r\n					1个\r\n				</td>\r\n				<td align="center">\r\n					1个\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1" align="center">\r\n					购买咨询\r\n				</td>\r\n				<td align="center">\r\n					×\r\n				</td>\r\n				<td align="center">\r\n					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=76265959&site=qq&menu=yes"><img src="http://www.phpshe.com/template/default/index/images/qq.png" alt="咨询客服" title="咨询客服" border="0" /></a> \r\n				</td>\r\n				<td align="center">\r\n					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=76265959&site=qq&menu=yes"><img src="http://www.phpshe.com/template/default/index/images/qq.png" alt="咨询客服" title="咨询客服" border="0" /></a> \r\n				</td>\r\n				<td align="center">\r\n					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=76265959&site=qq&menu=yes"><img src="http://www.phpshe.com/template/default/index/images/qq.png" alt="咨询客服" title="咨询客服" border="0" /></a> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th colspan="5" style="text-align:center;background:#eaeaea;color:#333;">\r\n					服务方式\r\n				</th>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1" align="center">\r\n					服务期限\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					1年\r\n				</td>\r\n				<td align="center">\r\n					1年\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1" width="170">\r\n					电话技术支持\r\n				</td>\r\n				<td width="170">\r\n					<br />\r\n				</td>\r\n				<td width="170">\r\n					<br />\r\n				</td>\r\n				<td align="center" width="170">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					Email/QQ支持\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th colspan="5" style="text-align:center;background:#eaeaea;color:#333;">\r\n					服务项目\r\n				</th>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					产品BUG反馈\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					程序安装指导\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					首次安装\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					程序使用指导\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					程序升级指导\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					站点迁移指导\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					模板制作技术咨询\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					二次开发咨询\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class="tt1">\r\n					二次开发文档\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<br />\r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n				<td align="center">\r\n					<img src="http://www.phpshe.com/template/default/index/images/dui.png" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th colspan="5" style="text-align:center;background:#eaeaea;color:#333;">\r\n					<span class="cred">注意：</span>简好网络未授权任何公司或个人代理销售! 请注意鉴别，以免上当。\r\n				</th>\r\n			</tr>\r\n<!--\r\n			<tr>\r\n				<td class="tt1" align="center">\r\n					<strong>价格</strong> \r\n				</td>\r\n				<td align="center">\r\n				</td>\r\n				<td align="center">\r\n					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=76265959&site=qq&menu=yes"><img border="0" src="http://www.phpshe.com/template/default/index/images/qq.png" alt="咨询客服" title="咨询客服" /></a> \r\n				</td>\r\n				<td align="center">\r\n					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=76265959&site=qq&menu=yes"><img border="0" src="http://www.phpshe.com/template/default/index/images/qq.png" alt="咨询客服" title="咨询客服" /></a> \r\n				</td>\r\n				<td align="center">\r\n					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=76265959&site=qq&menu=yes"><img border="0" src="http://www.phpshe.com/template/default/index/images/qq.png" alt="咨询客服" title="咨询客服" /></a> \r\n				</td>\r\n			</tr>\r\n-->\r\n		</tbody>\r\n	</table>\r\n	<div class="mat10 font12" style="font-family:宋体;">\r\n		<p class="strong mat8">\r\n			免费版说明：\r\n		</p>\r\n		<div style="background:#fff;border:1px #ddd solid;padding:10px;">\r\n			1、phpshe免费使用用户，仅供从事学习研究之用，不具备商业运作的合法性；如果未获取phpshe官方授权而从事商业行为，phpshe保留对其使用系统停止升级、关闭、甚至对其商业运作行为起诉的权利；<br />\r\n2、免费版不可删除前台和后台phpshe版权信息，无论您对phpshe程序代码如何修改，都必须在明显和恰当的位置宣告版权声明(网站页面页脚处的 Powered by phpshe 名称的链接必须保留，而不能清除或修改)；<br />\r\n3、免费版不提供程序使用协助、技术咨询；<br />\r\n4、免费版无品牌、规格、促销、优惠券、数据统计等功能；\r\n		</div>\r\n		<p class="strong mat8">\r\n			购买说明：\r\n		</p>\r\n		<div style="background:#fff;border:1px #ddd solid;padding:10px;">\r\n			1、联系客服人员确认购买的版本类型或服务；<br />\r\n2、<a href="http://www.phpshe.com/phpshe/pay" target="_blank" class="cblue">点击查看支付方式；</a><br />\r\n3、联系客服确认到账，并发放产品授权许可；<br />\r\n4、不接受议价，及预付方式，所有费用需一次性全额付款；\r\n		</div>\r\n		<p class="strong mat8">\r\n			技术服务说明：以下情况不属于服务范围\r\n		</p>\r\n		<div style="background:#fff;border:1px #ddd solid;padding:10px;">\r\n			1、自行修改或使用非原始PHPSHE商城系统程序代码产生的问题；<br />\r\n2、自行对PHPSHE商城系统数据库进行直接操作导致数据库出错或者崩溃；<br />\r\n3、非PHPSHE商城系统官方的模块/插件的安装以及由于安装模块/插件造成的故障；<br />\r\n4、服务器、虚拟主机原因造成的系统故障；<br />\r\n5、二次开发或定制及其它可能产生问题的情况。<br />\r\n		</div>\r\n	</div>\r\n</div>\r\n<p><br /></p>\r\n<p>\r\n	<strong>详情请访问：</strong><a href="http://www.phpshe.com/phpshe/buy" target="_blank"><strong><span style="color:#E53333;">PHPSHE商城系统购买</span></strong></a> \r\n</p>\r\n<style>\r\n.taocan td,th{padding:7px 5px; border:1px #ddd solid; color:#555; font-size:12px; line-height:20px;}\r\n.taocan th{ background:#2D89AE; color:#fff;}\r\n.taocan td{color:#666; background:#fff;}\r\n.taocan .tt1{background:#f3f3f3; text-align:center;}\r\n.taocan .money{color:#FF0000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;}\r\n</style>', 1335863100, 1073, 1, '', 0),
(5, '用户注册', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406563800, 52, 4, '', 0),
(6, '购物流程', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564160, 38, 4, '', 0),
(7, '常见问题', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564160, 28, 4, '', 0),
(8, '配送时间及运费', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564220, 180, 5, '', 0),
(9, '验货与签收', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564220, 175, 5, '', 0),
(10, '订单查询', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564280, 12, 5, '', 0),
(11, '售后政策', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564280, 49, 6, '', 0),
(12, '退货说明', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564400, 4, 6, '', 0),
(13, '取消订单', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564460, 11, 6, '', 0),
(14, '公司简介', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564520, 59, 7, '', 0),
(15, '联系我们', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564520, 8, 7, '', 0),
(16, '诚聘英才', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1406564580, 41, 7, '', 0),
(17, '在线支付', '<a target="_blank" href="http://www.phpshe.com">请在此填写相关内容</a>', 1431398100, 2, 8, '', 0),
(20, '发的是刚刚灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌是', '大师傅', 1460786040, 6, 0, '', 0),
(21, 'futu', '<div style="text-align:center;">\r\n	<span style="line-height:1.5;background-color:#E56600;">gg爱上打开了房间</span><span style="line-height:1.5;">了拉升的减肥拉屎是事实上事实上事实上事实上事实上是</span>\r\n</div>', 1460789280, 4, 0, 'data/attachment/2016-04/20160416144115q.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tree_category`
--

CREATE TABLE IF NOT EXISTS `tree_category` (
  `category_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  `category_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `category_logo` varchar(255) DEFAULT NULL COMMENT '分类图片',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- 转存表中的数据 `tree_category`
--

INSERT INTO `tree_category` (`category_id`, `category_name`, `category_order`, `category_logo`) VALUES
(49, '荷树', 0, 'data/attachment/2016-07/20160701214904f.jpg'),
(50, '枫香', 4, 'data/attachment/2016-07/20160701214904f.jpg'),
(51, '木犀', 3, 'data/attachment/2016-07/20160701214904f.jpg'),
(56, '小叶榕', 1, 'data/attachment/2016-08/20160814202701c.png'),
(55, '白兰', 2, 'data/attachment/2016-07/20160701214904f.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tree_city`
--

CREATE TABLE IF NOT EXISTS `tree_city` (
  `city_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_pid` int(11) NOT NULL,
  `city_areaID` varchar(5) NOT NULL,
  `city_areaname` varchar(100) NOT NULL,
  `city_management` varchar(100) NOT NULL,
  `city_address` varchar(100) NOT NULL,
  `city_tel` varchar(100) NOT NULL,
  `city_worker` varchar(20) NOT NULL,
  `city_order` int(10) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `tree_city`
--

INSERT INTO `tree_city` (`city_id`, `city_pid`, `city_areaID`, `city_areaname`, `city_management`, `city_address`, `city_tel`, `city_worker`, `city_order`) VALUES
(1, 0, '021', '梅江区', '13', '13', '13', '131', 0),
(2, 0, '2', '梅县区', '', '', '', '', 1),
(3, 0, '3', '兴宁市', '', '', '', '', 2),
(4, 0, '4', '平远县', '', '', '', '', 3),
(5, 0, '5', '大埔县', '', '', '', '', 4),
(6, 0, '6', '蕉岭县', '', '', '', '', 5),
(7, 0, '7', '丰顺县', '', '', '', '', 6),
(8, 0, '8', '五华县', '', '', '', '', 7),
(10, 1, '062', '白宫镇', '13', '13', '13', '131', 0),
(14, 10, '191', '龙岗村', '城市综合管理局', '江南路', '0753-2288566', '黄先生', 2),
(12, 10, '181', '太平村', '城市管理综合局', '老街', '0753-6562788', '黄先生', 1),
(13, 10, '151', '四平村', '城市综合管理局', '江南路', '0753-2288566', '黄先生', 2),
(15, 10, '241', '万山村', '城市综合管理局', '江南路', '0753-2288566', '黄先生', 2),
(18, 1, '060', '白宫镇居委', '13', '13', '13', '131', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tree_message`
--

CREATE TABLE IF NOT EXISTS `tree_message` (
  `msg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msg_number` varchar(10) NOT NULL COMMENT '调查号',
  `msg_areaID` varchar(20) NOT NULL COMMENT '树种编号',
  `msg_name` varchar(100) NOT NULL COMMENT '树种名',
  `msg_address` varchar(100) NOT NULL COMMENT '位置',
  `msg_age` int(10) NOT NULL,
  `msg_height` varchar(20) NOT NULL COMMENT '树高',
  `msg_xiongjing` varchar(20) NOT NULL,
  `msg_dxguanfu` varchar(20) NOT NULL COMMENT '东西冠幅',
  `msg_nbguanfu` varchar(20) NOT NULL COMMENT '南北冠幅',
  `msg_hb` int(5) NOT NULL COMMENT '海拔',
  `msg_poxiang` varchar(10) NOT NULL DEFAULT '0' COMMENT '坡向',
  `msg_podu` varchar(10) NOT NULL DEFAULT '0' COMMENT '坡度',
  `msg_powei` varchar(2) NOT NULL DEFAULT '0' COMMENT '坡位',
  `msg_prodanwei` varchar(50) NOT NULL COMMENT '管护单位',
  `msg_proman` varchar(30) NOT NULL COMMENT '管护人',
  `msg_environment` varchar(100) NOT NULL,
  `msg_tezheng` varchar(22) NOT NULL COMMENT '特征代码',
  `msg_quanshu` varchar(30) NOT NULL COMMENT '权属',
  `msg_weidu` varchar(20) NOT NULL,
  `msg_jingdu` varchar(20) NOT NULL,
  `msg_rank` int(10) NOT NULL,
  `msg_state` varchar(10) NOT NULL COMMENT '生长势',
  `msg_note` text NOT NULL,
  `msg_story` text NOT NULL,
  `msg_aid` int(10) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `tree_message`
--

INSERT INTO `tree_message` (`msg_id`, `msg_number`, `msg_areaID`, `msg_name`, `msg_address`, `msg_age`, `msg_height`, `msg_xiongjing`, `msg_dxguanfu`, `msg_nbguanfu`, `msg_hb`, `msg_poxiang`, `msg_podu`, `msg_powei`, `msg_prodanwei`, `msg_proman`, `msg_environment`, `msg_tezheng`, `msg_quanshu`, `msg_weidu`, `msg_jingdu`, `msg_rank`, `msg_state`, `msg_note`, `msg_story`, `msg_aid`) VALUES
(1, '001', '4414021062151001', '白兰', '四平村钟氏祠道', 120, '23', '102', '15', '15', 60, '0', '0', '0', '钟氏祠道', '', '良好', '1307220120232032001511', '集体', '24.281', '116.221', 3, '旺盛', '22', '钟氏祠道s', 151),
(2, '002', '4414021062151002', '白兰', '四平村钟氏祠道', 120, '16', '93', '15', '15', 60, '0', '0', '0', '钟氏祠道', '', '良好', '1307220120155029101511', '集体', '24.281', '116.221', 3, '旺盛', '', '钟氏祠道', 151),
(3, '003', '4414021062191003', '小叶榕', '龙岗村承启楼', 300, '9', '159', '6', '5', 60, '0', '0', '0', '龙岗村村委会', '', '良好', '1207300300093050000611', '集体', '24.282', '116.235', 2, '旺盛', '22', '据龙岗村村委会说丐帮第十九代人种植', 191),
(15, '004', '4414021060031004', '小叶榕', '白宫居委老人活动中心', 300, '16', '207', '29', '23', 75, '0', '0', '0', '白宫居委', '', '良好', '1307300300160065002611', '集体', '24.281', '116.249', 2, '旺盛', '22', '白宫居委', 0),
(19, '008', '4414021062241008', '枫香', '万山村村口', 150, '17', '81', '14', '11', 145, '0', '0', '0', '万山村', '', '良好', '1307300150171025501211', '集体', '24.284', '116.270', 3, '旺盛', '22', '万山村', 241),
(20, '009', '4414021062241009', '枫香', '万山村村口', 150, '19', '53', '5', '11', 145, '0', '0', '0', '万山村', '', '良好', '1307300150185016600811', '集体', '24.284', '116.270', 3, '旺盛', '22', '万山村', 241),
(6, '005', '4414021062181005', '荷树', '太平村村口', 100, '14', '73', '10', '4', 97, '朝东', '16.7', '下', '个人', '', '良好', '1307640100137023000711', '集体', '24.295', '116.239', 3, '旺盛', '22', '个人', 181),
(21, '010', '4414021062241010', '枫香', '万山村村口', 150, '15', '60', '13', '10', 145, '0', '0', '0', '万山村', '', '良好', '1307300150150018801211', '集体', '24.284', '116.270', 3, '旺盛', '22', '万山村', 241),
(16, '006', '4414021062181006', '木犀', '太平村九斗庄组', 250, '10', '90', '10', '8', 87, '朝西', '43.7', '下', '太平村', '', '良好', '1307280250097028200911', '集体', '24.301', '116.259', 3, '旺盛', '22', '太平村九斗庄组', 181),
(18, '007', '4414021062181007', '木犀', '太平村九斗庄组', 250, '13', '96', '9', '10', 87, '朝东北', '23.6', '下', '太平村', '', '良好', '1307280250126030000911', '集体', '24.301', '116.259', 3, '旺盛', '22', '太平村九斗庄组', 181),
(22, '011', '4414021062241011', '小叶榕', '万山村村口公王庙', 300, '16', '339', '23', '17', 149, '朝东南', '20.2', '下', '万山村村口公王庙', '', '良好', '1207300300164106502011', '集体', '24.284', '116.269', 2, '旺盛', '22', '万山村', 241),
(23, '011', '4414021062241012', '枫香', '万山村村口', 150, '25', '88', '6', '8', 152, '朝东南', '17.6', '上', '万山村', '', '良好', '1307300150250027600711', '集体', '24.284', '116.270', 3, '旺盛', '22', '万山村', 241);

-- --------------------------------------------------------

--
-- 表的结构 `tree_order`
--

CREATE TABLE IF NOT EXISTS `tree_order` (
  `order_id` bigint(15) unsigned NOT NULL COMMENT '订单id',
  `product_id` int(11) unsigned NOT NULL,
  `order_outid` bigint(15) unsigned NOT NULL DEFAULT '0',
  `order_money` decimal(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '订单金额',
  `order_product_money` decimal(10,1) unsigned NOT NULL DEFAULT '0.0',
  `order_product_num` int(10) unsigned NOT NULL DEFAULT '0',
  `order_quan_name` varchar(30) NOT NULL,
  `order_quan_money` int(10) unsigned NOT NULL DEFAULT '0',
  `order_point_get` smallint(5) unsigned NOT NULL DEFAULT '0',
  `order_point_use` smallint(5) unsigned NOT NULL DEFAULT '0',
  `order_point_money` decimal(10,1) unsigned NOT NULL DEFAULT '0.0',
  `order_wl_id` varchar(20) NOT NULL,
  `order_wl_name` varchar(20) NOT NULL,
  `order_wl_money` decimal(5,1) unsigned NOT NULL DEFAULT '0.0',
  `order_atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  `order_ptime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '付款时间',
  `order_stime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发货时间',
  `order_ftime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '完成时间',
  `order_payway` varchar(10) NOT NULL DEFAULT 'alipay_js',
  `order_comment` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order_state` varchar(10) NOT NULL DEFAULT 'notpay',
  `order_text` varchar(255) NOT NULL COMMENT '订单留言',
  `order_closetext` varchar(255) NOT NULL COMMENT '订单关闭原因',
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_tname` varchar(10) NOT NULL,
  `user_phone` char(11) NOT NULL COMMENT '用户手机',
  `user_tel` varchar(20) NOT NULL,
  `user_address` varchar(255) NOT NULL COMMENT '用户地址',
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tree_pic`
--

CREATE TABLE IF NOT EXISTS `tree_pic` (
  `pic_id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_id` int(10) NOT NULL,
  `pic_path` varchar(100) NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tree_pic`
--

INSERT INTO `tree_pic` (`pic_id`, `msg_id`, `pic_path`) VALUES
(1, 1, 'http://localhost/tree/template/default/index/images/mcontent.png'),
(3, 1, 'http://localhost/tree/template/default/index/images/mcontent.png'),
(6, 1, 'data/attachment/2016-07/20160701214904f.jpg'),
(7, 2, 'data/attachment/2016-07/20160701214555i.png'),
(5, 1, 'http://localhost/tree/template/default/index/images/mcontent.png'),
(8, 2, 'data/attachment/2016-07/20160701214610v.jpg'),
(9, 2, 'data/attachment/2016-07/20160701214725c.jpg'),
(10, 1, 'data/attachment/2016-07/20160701214843q.png');

-- --------------------------------------------------------

--
-- 表的结构 `tree_protectnote`
--

CREATE TABLE IF NOT EXISTS `tree_protectnote` (
  `prot_id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_id` int(10) NOT NULL,
  `prot_reason` text NOT NULL,
  `prot_result` varchar(50) NOT NULL,
  `prot_time` varchar(50) NOT NULL,
  PRIMARY KEY (`prot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tree_protectnote`
--

INSERT INTO `tree_protectnote` (`prot_id`, `msg_id`, `prot_reason`, `prot_result`, `prot_time`) VALUES
(1, 1, '虫害', '解决了', '10月'),
(2, 1, '虫害', '解决了', '10月'),
(3, 2, '虫害', '解决了', '10月'),
(5, 2, '132', '13213', '132'),
(6, 1, '123', '123', '123');

-- --------------------------------------------------------

--
-- 表的结构 `tree_setting`
--

CREATE TABLE IF NOT EXISTS `tree_setting` (
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text NOT NULL,
  KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tree_setting`
--

INSERT INTO `tree_setting` (`setting_key`, `setting_value`) VALUES
('web_title', '梅州和谐文化广告有限公司'),
('web_keywords', '梅州和谐文化广告有限公司，雕刻，广告，文化，和谐，梅州'),
('web_description', '梅州和谐文化广告有限公司，雕刻，广告，文化，和谐，梅州'),
('web_copyright', 'G+创意网络'),
('web_tpl', 'default'),
('web_logo', 'data/attachment/2016-05/20160501211550w.jpg'),
('web_phone', '18813972090'),
('web_qq', '806644733'),
('web_icp', '豫ICP备 13014394号-2'),
('web_guestbuy', '0'),
('web_name', '梅州和谐文化广告有限公司'),
('web_tongji', ''),
('web_wlname', 'a:15:{i:0;s:12:"顺丰快递";i:1;s:12:"申通快递";i:2;s:12:"圆通快递";i:3;s:12:"韵达快递";i:4;s:12:"中通快递";i:5;s:12:"天天快递";i:6;s:9:"宅急送";i:7;s:9:"EMS快递";i:8;s:12:"百事汇通";i:9;s:12:"全峰快递";i:10;s:12:"德邦物流";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";}'),
('myname', '冯先生'),
('weekend_worktime', '9:00-17:00'),
('email_name', '11@qq.com'),
('web_footerlogo', 'data/attachment/2016-05/20160501211541b.jpg'),
('normal_worktime', '8:30-18:00'),
('invite', '<span style="font-size:16px;background-color:#E56600;">招聘经理两名，要求按时到路口附近辣椒水的佛罗伦萨快递放假 阿拉丁flak分类爱丽丝快递费及卢卡斯的分类看书离开第三课拉屎的积分来看雷克萨法兰克福卡拉升的减肥卡刷卡了对方卡的积分爱上了咖啡可拉伸的积分卡拉圣诞节快乐可垃圾费可拉伸 看来是大家分路口附近快乐撒娇发的就打卡克里斯的风景快乐撒地方了可打算离开对方金坷垃大师傅快乐撒疯了快速打开撒娇分类考试uu</span>'),
('point_state', '1'),
('web_call', 'data/attachment/2016-04/ABUIABACGAAguNH3rAUomeiZsAMw9QI4bQ.jpg'),
('point_comment', '50'),
('web_webname', '#'),
('web_biaoyu1', '产品质量是企业的生命'),
('web_biaoyu2', '绿色环保是企业生存的基石'),
('culture_logo', 'data/attachment/2016-04/20160416155654n.jpg'),
('culture_culture', '<p>\r\n	【企业理念】 一次合作，一生朋友&nbsp;\r\n</p>\r\n<p>\r\n	【企业宗旨】 产品质量是企业的生命、绿色环&nbsp;\r\n</p>\r\n<p>\r\n	【企业理念】 一次合作，一生朋友&nbsp;\r\n</p>\r\n<p>\r\n	【企业宗旨】 产品质量是企业的生命、绿色环保是企业生存的基石&nbsp;\r\n</p>\r\n<p>\r\n	【企业目标】 一流的产品、一流的形象、一流的服务、一流的管理&nbsp;\r\n</p>\r\n<p>\r\n	【企业精神】 稳固 发展 求实 创新&nbsp;\r\n</p>\r\n<p>\r\n	【企业核心价值观】 爱心 正直 创造 奉献\r\n</p>'),
('company_introduction', '公司以国内外先进的设计理念集合现代化木工机械设备，致力于为公寓住宅、写字楼、酒店等提供各类低碳绿色环保健康的高档实木门、实木复合门、免漆生态门等产品。在日益激烈的市场竞争中，公司始终秉承“产品质量是企业的生命、绿色环保是企业生存的基石”，把价格竞争转化为产品质量的竞争。公司生产通过“ISO9000质量管理体系标准认证”，产品通过质检局检验合格。优异的产品质量，全新的人性化售后服务赢得了广大消费者的青睐。'),
('company_picture', 'data/attachment/2016-04/20160416155654n.jpg'),
('web_address', '梅州市嘉应学院'),
('web_footerlogo', 'data/attachment/2016-05/20160501211541b.jpg'),
('web_footerlogo', 'data/attachment/2016-05/20160501211541b.jpg'),
('kefu_one', '806644733'),
('kefu_two', '331685124');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
