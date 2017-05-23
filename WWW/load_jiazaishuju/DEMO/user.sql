/*
Navicat MySQL Data Transfer

Source Server         : ee
Source Server Version : 50018
Source Host           : 127.0.0.1:3306
Source Database       : user

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2017-02-06 14:47:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ding
-- ----------------------------
DROP TABLE IF EXISTS `ding`;
CREATE TABLE `ding` (
  `ding_id` int(11) NOT NULL auto_increment,
  `ding_name` varchar(300) default NULL,
  `sku_id` char(11) default NULL,
  `ding_zt` int(11) default NULL,
  `goodid` varchar(40) default NULL,
  `sk_name` varchar(40) default NULL,
  PRIMARY KEY  (`ding_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding
-- ----------------------------
INSERT INTO `ding` VALUES ('44', '颜色分类:【上门】iPad2/3/4【换外屏】', '2', '1', '38576556499', '3218955493245');
INSERT INTO `ding` VALUES ('45', '颜色分类sss', '2', '1', '538804404645', '3198137202347');
INSERT INTO `ding` VALUES ('46', '颜色分类:【上门】iPad2/3/4【换外屏】', '5', '1', '38576556499', '3218955493240');
INSERT INTO `ding` VALUES ('47', '颜色分类sss', '3', '1', '538804404645', '3198137202040');

-- ----------------------------
-- Table structure for dingdan
-- ----------------------------
DROP TABLE IF EXISTS `dingdan`;
CREATE TABLE `dingdan` (
  `p_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `usernamee` varchar(50) default NULL,
  `phone` varchar(30) default NULL,
  `post_code` varchar(15) default NULL,
  `country` varchar(30) default NULL,
  `province` varchar(30) default NULL,
  `city` varchar(30) default NULL,
  `district` varchar(30) default NULL,
  `address` varchar(200) default NULL,
  `logistics_number` varchar(40) default NULL,
  `goods_name` varchar(150) default NULL,
  `goods_na` varchar(150) default NULL,
  `goods_number` varchar(50) default NULL,
  `goods_price` decimal(10,0) default NULL,
  `goods_nums` varchar(11) default NULL,
  `discount_price` decimal(10,0) default NULL,
  `sum_price` decimal(10,0) default NULL,
  `goods_content` varchar(300) default NULL,
  `goods_color` varchar(50) default NULL,
  `shop_card` varchar(30) default NULL,
  `goods_card` varchar(30) default NULL,
  `sku_id` varchar(30) default NULL,
  `qibiao` varchar(30) default NULL,
  `forum` varchar(50) default NULL,
  `revise_time` datetime default NULL,
  `order_state` varchar(50) default NULL,
  `order_number` varchar(30) default NULL,
  `order_time` datetime default NULL,
  `zt` varchar(5) default NULL,
  `jingweidu` varchar(100) default NULL,
  `dizhizt` varchar(10) default NULL,
  `sku_zt` int(11) default NULL,
  `qizi` varchar(255) default NULL,
  `ztt` varchar(20) default NULL,
  `content` varchar(400) default NULL,
  `sku_name` varchar(30) default NULL,
  `duanxin` varchar(10) default NULL,
  `xd_zt` varchar(10) default NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dingdan
-- ----------------------------
INSERT INTO `dingdan` VALUES ('3050', '杜胜成', '君剑2008', '15811207510', '100091', '中国', '北京', '北京市', '海淀区', '云南省 临沧市  勐董镇老农贸市场天资隔壁靓丽日化', '2993323703271661', '适用苹果ipad2/3/4/5/6/air/mini迷你 pro换外屏触摸玻璃屏幕维修', '适用苹果ipad2/3/4/5/6/air/mini迷你 pro换外屏触摸玻璃屏幕维修', '维百士;型号;ipad2/3/4/5/6/air/mini/pro', '198', '1.0', '0', '198', '颜色分类:【上门】iPad2/3/4【换外屏】', '【上门】iPad2/3/4【换外屏】 ', '清风亭阁', '38576556499', null, '紫旗', '淘宝', '2017-01-10 21:16:42', '卖家已发货', '2993323703271661', '2017-01-10 21:16:42', '2', null, '2', null, '2', null, null, '3218955493240', null, null);
INSERT INTO `dingdan` VALUES ('3051', '李斌敏', 'leoninmin', '17301205932', '100029', '中国', '北京', '北京市', '朝阳区', '北京 北京市 朝阳区 小关街道北苑路小关北里甲2号和美妇儿医院', '2985809439031406', '适用苹果手机更换硬盘扩容iPhone6s/6p/iPad 64G加大128G内存升级', '适用苹果手机更换硬盘扩容iPhone6s/6p/iPad 64G加大128G内存升级', '维百士;型号;iPhone6s/6p/iPad', '388', '1.0', '-5', '383', '颜色分类sss', '【 5s 】升级64G硬盘 ', '清风亭阁', '538804404645', '3', '紫旗', '淘宝', '2017-01-11 01:20:16', '卖家已发货', '2985809439031406', '2017-01-11 01:20:16', '2', null, '1', '1', '1', '2', null, '3198137202040', '2', null);

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL auto_increment,
  `goods_name` varchar(50) default NULL,
  `user_name` varchar(20) default NULL,
  `phone` varchar(20) default NULL,
  `sku_id` int(11) default NULL,
  `address` varchar(100) default NULL,
  `jingweidu` varchar(100) default NULL,
  `p_id` int(11) default NULL,
  `dingdanhao` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('13', '颜色分类sss', '李斌敏', '17301205932', '3', '北京 北京市 朝阳区 小关街道北苑路小关北里甲2号和美妇儿医院', null, '3051', '2985809439031406');

-- ----------------------------
-- Table structure for qizi
-- ----------------------------
DROP TABLE IF EXISTS `qizi`;
CREATE TABLE `qizi` (
  `qizi_id` int(11) NOT NULL auto_increment,
  `qizi_name` varchar(20) default NULL,
  `qizi_color` varchar(20) default NULL,
  `dianpu` varchar(50) default NULL,
  `pwd` varchar(10) default NULL,
  PRIMARY KEY  (`qizi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qizi
-- ----------------------------
INSERT INTO `qizi` VALUES ('86', '下单', '紫旗', '玖零国际数码', null);
INSERT INTO `qizi` VALUES ('87', '刷单', '黄旗', '玖零国际数码', null);
INSERT INTO `qizi` VALUES ('88', '下单', '紫旗', '清风亭阁', null);
INSERT INTO `qizi` VALUES ('89', '刷单', '蓝旗', '清风亭阁', null);

-- ----------------------------
-- Table structure for shou
-- ----------------------------
DROP TABLE IF EXISTS `shou`;
CREATE TABLE `shou` (
  `shou_id` int(11) NOT NULL auto_increment,
  `shou_name` varchar(50) default NULL,
  PRIMARY KEY  (`shou_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shou
-- ----------------------------
INSERT INTO `shou` VALUES ('1', '玖零国际数码');
INSERT INTO `shou` VALUES ('2', '清风亭阁');

-- ----------------------------
-- Table structure for sku
-- ----------------------------
DROP TABLE IF EXISTS `sku`;
CREATE TABLE `sku` (
  `sku_id` int(11) NOT NULL auto_increment,
  `sku_name` varchar(100) default NULL,
  `sku_money` varchar(100) default NULL,
  PRIMARY KEY  (`sku_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sku
-- ----------------------------
INSERT INTO `sku` VALUES ('1', '苹果6 plus', '30');
INSERT INTO `sku` VALUES ('2', '苹果6 s', '40');
INSERT INTO `sku` VALUES ('3', '苹果6 a', '60');
INSERT INTO `sku` VALUES ('4', '苹果6 b', '47');
INSERT INTO `sku` VALUES ('5', '苹果6 c', '60');

-- ----------------------------
-- Table structure for url
-- ----------------------------
DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `url_id` int(11) NOT NULL auto_increment,
  `url` varchar(100) default NULL,
  `url_l` varchar(30) default NULL,
  `order` varchar(30) default NULL,
  PRIMARY KEY  (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of url
-- ----------------------------
