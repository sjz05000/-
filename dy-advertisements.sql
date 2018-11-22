/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dongyu

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-20 21:28:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dy-advertisements`
-- ----------------------------
DROP TABLE IF EXISTS `dy-advertisements`;
CREATE TABLE `dy-advertisements` (
  `id` int(125) unsigned NOT NULL AUTO_INCREMENT,
  `adname` varchar(255) NOT NULL,
  `adphone` int(20) NOT NULL,
  `adfile` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '''1 激活 2 未激活''',
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  ` deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-advertisements
-- ----------------------------
INSERT INTO `dy-advertisements` VALUES ('15', '我天热帖对方答复', '11111111', '/d/uploads/20181105/fth9w7MtwriG5tljt9UW.png', '2', 'jl', '2018-11-05 15:31:30', '2018-11-06 11:48:51', '0000-00-00 00:00:00');
INSERT INTO `dy-advertisements` VALUES ('16', '我天热帖的速度速度', '110', '/d/uploads/20181106/Ib3wLvOylHvUuukQN2Ct.gif', '1', 'sdfdsf', '2018-11-06 09:06:10', '2018-11-06 11:49:05', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `dy-articles`
-- ----------------------------
DROP TABLE IF EXISTS `dy-articles`;
CREATE TABLE `dy-articles` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` longtext NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `auth` varchar(64) NOT NULL,
  `zan` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章点赞数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-articles
-- ----------------------------
INSERT INTO `dy-articles` VALUES ('15', '27', '这是一个文章', '<p>					&nbsp; &nbsp; &nbsp;</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　那个清晨</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　一大早，便被<a href=\"http://www.duwenzhang.com/huati/muqin/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">母亲</a>叫起。我有些不满，平常我是总要在床上多赖一会儿的。可当我迷迷糊糊的看到母亲紧绷的脸庞时，我好像一瞬间明白了什么，心隐隐的颤抖起来。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　村子里突然传出几声犬吠，我一激灵，坐直了身体。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　母亲平时是极宠爱我的。但现在，她看着我的眼睛，用一种我从未听过的，严肃得令我害怕的声音说道：“我问你，你是不是真的不想呆在这儿了？”</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我动了动嘴唇，低下头没出声。我觉得我知道母亲来的原因，无非是来教训我。因为就在昨天，母亲眼中一向懂事的<a href=\"http://www.duwenzhang.com/huati/nver/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">女儿</a>，贴心的小棉袄，竟然学会了逃学，而理由仅是因为向往城市的<a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">生活</a>，多次被拒绝后，想以此逼<a href=\"http://www.duwenzhang.com/huati/fumu/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">父母</a>就范。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我以为，自己是应该被母亲教训的。并且我还很感激母亲，因为母亲找到我的时候，并没有当着那么多人的面动手打我，而是一把把我拉回了家。母亲是动了怒的，从我被攥红的手腕和她红肿的眼睛就可以看出。可母亲什么也没说，转身进了屋子一整天都没出来。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我始终不敢与母亲对视。我怕看到母亲的目光中有对我深深的<a href=\"http://www.duwenzhang.com/huati/shiwang/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">失望</a>。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　村子里的狗终于不再叫了，却显得四周更加寂静，我甚至听到了悠远的蝉鸣声。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我终于忍不住抬起了头，母亲的<a href=\"http://www.duwenzhang.com/huati/chenmo/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">沉默</a>让我无措，我决定先求得母亲的原谅。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　可母亲打断了我即将出口的话，她只是又一遍的问着我，是不是发自<a href=\"http://www.duwenzhang.com/huati/neixin/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">内心</a>的想去城市里生活。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我愣了一下，然后深吸了一口气，坚定地对母亲说道“是！我一直<a href=\"http://www.duwenzhang.com/huati/xiwang/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">希望</a>可以去城市里读书。”过了许久，母亲缓缓点了点头，我听见她带着很大的决心说了一个字：好。我惊讶得对上了母亲的眼睛，发现母亲深邃的眼睛里翻涌着不知名的情绪。她不再看我，转身<a href=\"http://www.duwenzhang.com/huati/likai/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">离开</a>了屋子。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　望着母亲因承担生活的重担而日渐弯曲的腰背，我的内心一阵酸涩。我懂了母亲话中的意思，却怎么也高兴不起来。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我站起身，内心挣扎地跟了上去，房子里却早已不见了母亲的身影。我有些焦急的冲了出去，呆呆地看着坐在台阶上沐浴着阳光，相互<a href=\"http://www.duwenzhang.com/huati/yikao/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">依靠</a>着的父母。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　母亲望着家门前这一片小小的菜园，许久无语，只有紧紧锁住的眉头显示了主人的<a href=\"http://www.duwenzhang.com/huati/tongku/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">痛苦</a>。<a href=\"http://www.duwenzhang.com/huati/fuqin/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">父亲</a>在旁边轻声安慰着：“我知道你舍不得，住了几十年的地方，早就有了<a href=\"http://www.duwenzhang.com/huati/ganqing/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">感情</a>，要不咱不走了，也许她只是一时感<a href=\"http://www.duwenzhang.com/huati/xingqu/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">兴趣</a>呢？更何况，去了那儿如果找不到工作 ，怎么活呢？”母亲摇了摇头，“我们俩谁不了解她那倔脾气？我怎么会为了自己耽误了她。无论怎么辛苦，对她好的，我都会为她争取到的。只是……只是我真的放不下这儿，真的……”</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　在晨曦中，母亲眼里含着的泪水悄悄滑下，轻抚过她清瘦的脸颊，落在了用水泥铺成的台阶上。看着母亲颤动的双肩，我终是忍不住背过身去，任凭泪水夺眶而出……</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我一辈子都不会忘记，那个清晨，有一位伟大的母亲，在她的<a href=\"http://www.duwenzhang.com/huati/haizi/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">孩子</a>面前咽下了所有痛苦和<a href=\"http://www.duwenzhang.com/huati/wunai/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">无奈</a>，却坐在台阶上偷偷哭泣的样子</p><p><img src=\"/d/uploads/20181115/15422428952017-03-08_150432.png\" title=\"15422428952017-03-08_150432.png\" alt=\"2017-03-08_150432.png\"/></p>', '', '0000-00-00 00:00:00', '2018-11-15 10:39:19', '', '20');
INSERT INTO `dy-articles` VALUES ('16', '27', 'b', '<p>\r\n					&nbsp; &nbsp; &nbsp; b\r\n					 &nbsp; &nbsp;</p>', '', '0000-00-00 00:00:00', '2018-11-15 10:39:08', '', '200');
INSERT INTO `dy-articles` VALUES ('17', '27', 'c', '<p>\r\n					&nbsp; &nbsp; &nbsp; c\r\n					 &nbsp; &nbsp;</p>', '', '0000-00-00 00:00:00', '2018-11-15 10:39:26', '', '10');
INSERT INTO `dy-articles` VALUES ('18', '15', 'd', '<p>\r\n					&nbsp; &nbsp; &nbsp; d\r\n					 &nbsp; &nbsp;</p>', '', '0000-00-00 00:00:00', '2018-11-15 10:39:34', '', '50');
INSERT INTO `dy-articles` VALUES ('19', '3', 'e', '<p>\r\n					&nbsp; &nbsp; &nbsp; e\r\n					 &nbsp; &nbsp;</p>', '', '0000-00-00 00:00:00', '2018-11-15 10:39:44', '', '20');
INSERT INTO `dy-articles` VALUES ('20', '27', 'f', '<p>					&nbsp; &nbsp; &nbsp;</p><p>\r\n					&nbsp; &nbsp; &nbsp; f\r\n					 &nbsp; &nbsp;</p>', '', '0000-00-00 00:00:00', '2018-11-20 21:24:44', '', '6');
INSERT INTO `dy-articles` VALUES ('21', '27', 'g', 'g', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '80');
INSERT INTO `dy-articles` VALUES ('22', '9', 'k', 'K', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '60');
INSERT INTO `dy-articles` VALUES ('23', '10', 'I', 'I', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0');

-- ----------------------------
-- Table structure for `dy-banner`
-- ----------------------------
DROP TABLE IF EXISTS `dy-banner`;
CREATE TABLE `dy-banner` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `bpic` varchar(255) NOT NULL,
  `burl` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-banner
-- ----------------------------
INSERT INTO `dy-banner` VALUES ('12', '/uploads/20181118/eI3w6FAdfI0ZoRAdDuG4.jpg', 'www.baidu.com', '2018-11-14 15:30:46', '2018-11-18 19:02:25', '0000-00-00 00:00:00');
INSERT INTO `dy-banner` VALUES ('13', '/uploads/20181118/8AaJR16anh6Ur08zCrmt.jpeg', 'www.baidud.com', '2018-11-14 15:31:37', '2018-11-18 19:08:43', '0000-00-00 00:00:00');
INSERT INTO `dy-banner` VALUES ('15', '/uploads/20181118/aFxEbzdWpcg8UdB028MM.jpg', 'www.bdaidu.com', '2018-11-14 15:32:19', '2018-11-18 19:08:55', '0000-00-00 00:00:00');
INSERT INTO `dy-banner` VALUES ('17', '/uploads/20181114/r3Ty8aF5Btchj3ZDNwau.jpg', 'www.baidcddu.com', '2018-11-14 15:33:54', '2018-11-14 15:33:54', '0000-00-00 00:00:00');
INSERT INTO `dy-banner` VALUES ('19', '/uploads/20181114/ZcMkHGpwh9giaucX5TWK.jpg', 'www.bdddaidud.com', '2018-11-14 15:37:03', '2018-11-14 15:37:03', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `dy-cates`
-- ----------------------------
DROP TABLE IF EXISTS `dy-cates`;
CREATE TABLE `dy-cates` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '''1激活 2未激活''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-cates
-- ----------------------------
INSERT INTO `dy-cates` VALUES ('1', '家电', '0', '0', '2018-11-01 11:57:51', '0000-00-00 00:00:00', '2018-11-01 11:57:51', '1');
INSERT INTO `dy-cates` VALUES ('2', '电脑', '1', '0,1', '2018-11-01 12:04:05', '0000-00-00 00:00:00', '2018-11-01 12:04:05', '1');
INSERT INTO `dy-cates` VALUES ('4', '食品', '0', '0', '2018-11-01 14:51:40', '0000-00-00 00:00:00', '2018-11-01 14:51:40', '2');
INSERT INTO `dy-cates` VALUES ('5', '米食', '4', '0,4', '2018-11-01 14:52:06', '0000-00-00 00:00:00', '2018-11-01 14:52:06', '1');
INSERT INTO `dy-cates` VALUES ('6', '面食', '4', '0,4', '2018-11-01 14:52:29', '0000-00-00 00:00:00', '2018-11-01 14:52:29', '1');
INSERT INTO `dy-cates` VALUES ('11', '衣服', '0', '0', '2018-11-01 15:12:34', '0000-00-00 00:00:00', '2018-11-01 15:12:34', '1');
INSERT INTO `dy-cates` VALUES ('12', '男衣', '0', '0', '2018-11-01 15:12:53', '0000-00-00 00:00:00', '2018-11-01 20:45:24', '1');
INSERT INTO `dy-cates` VALUES ('13', '女衣', '11', '0,11', '2018-11-01 15:13:08', '0000-00-00 00:00:00', '2018-11-01 15:13:08', '1');
INSERT INTO `dy-cates` VALUES ('22', '童装', '11', '0,11', '2018-11-01 20:46:28', '0000-00-00 00:00:00', '2018-11-01 20:46:28', '1');
INSERT INTO `dy-cates` VALUES ('24', '上衣', '11', '0,11', '2018-11-20 10:47:42', '0000-00-00 00:00:00', '2018-11-20 10:47:42', '1');

-- ----------------------------
-- Table structure for `dy-collect`
-- ----------------------------
DROP TABLE IF EXISTS `dy-collect`;
CREATE TABLE `dy-collect` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-collect
-- ----------------------------
INSERT INTO `dy-collect` VALUES ('39', '15', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('40', '16', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('41', '17', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('42', '15', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('43', '16', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('44', '17', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('45', '18', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('46', '18', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('47', '19', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('48', '19', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('49', '3', '15', '2018-11-12 15:05:24', '2018-11-12 15:05:24', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('50', '3', '16', '2018-11-12 15:05:32', '2018-11-12 15:05:32', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('51', '3', '17', '2018-11-12 15:05:38', '2018-11-12 15:05:38', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('52', '3', '19', '2018-11-12 15:05:45', '2018-11-12 15:05:45', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('53', '3', '20', '2018-11-12 15:05:55', '2018-11-12 15:05:55', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('54', '3', '15', '2018-11-12 15:10:03', '2018-11-12 15:10:03', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('55', '20', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('56', '20', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-collect` VALUES ('57', '20', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `dy-comment`
-- ----------------------------
DROP TABLE IF EXISTS `dy-comment`;
CREATE TABLE `dy-comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `aid` int(11) NOT NULL COMMENT 'article\n-id文章id',
  `pid` int(11) NOT NULL COMMENT '评论父级id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `content` text NOT NULL COMMENT '评论内容',
  `zan` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数，自增',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-comment
-- ----------------------------
INSERT INTO `dy-comment` VALUES ('1', '15', '0', '3', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '7', '2018-11-19 15:07:50', null, null);
INSERT INTO `dy-comment` VALUES ('2', '16', '1', '6', 'xyz', '6', '2018-11-19 17:07:56', null, null);
INSERT INTO `dy-comment` VALUES ('3', '17', '1', '8', '哈哈', '12', '2018-11-18 15:08:01', null, null);
INSERT INTO `dy-comment` VALUES ('4', '18', '2', '8', '哈哈哈', '4', '2018-11-20 15:08:21', null, null);

-- ----------------------------
-- Table structure for `dy-config`
-- ----------------------------
DROP TABLE IF EXISTS `dy-config`;
CREATE TABLE `dy-config` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(125) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `content` varchar(125) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 激活 2 未激活',
  `file` varchar(192) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-config
-- ----------------------------
INSERT INTO `dy-config` VALUES ('1', '冬雨论坛1', '论坛 娱乐', '这是一个神奇的论坛', '1', '/h/images/logo.png', '2018-11-14 11:50:43', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `dy-feedback`
-- ----------------------------
DROP TABLE IF EXISTS `dy-feedback`;
CREATE TABLE `dy-feedback` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-feedback
-- ----------------------------
INSERT INTO `dy-feedback` VALUES ('1', '8', 'sdfdsfsdf', '2018-11-07 14:10:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('2', '9', 'fdsfsdfsdf', '2018-11-07 14:10:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('3', '10', 'sdfdsfdsf', '2018-11-07 14:10:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('4', '11', 'fsdfdsf', '2018-11-07 14:10:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('5', '12', 'fdsfdsf', '2018-11-07 14:10:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('18', '3', '哈哈', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('14', '8', 'sfdsfsf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('15', '9', 'rtetretre', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('19', '0', '乐乐饿了了', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('20', '0', '把你和她突然', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dy-feedback` VALUES ('21', '0', '突然英特尔', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `dy-heatmap`
-- ----------------------------
DROP TABLE IF EXISTS `dy-heatmap`;
CREATE TABLE `dy-heatmap` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(255) NOT NULL,
  `hpic` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-heatmap
-- ----------------------------
INSERT INTO `dy-heatmap` VALUES ('1', '15', '/uploads/20181116/L7a1KC6r4izTqq6nrEsp.jpg', '0000-00-00 00:00:00', '2018-11-16 10:55:40');
INSERT INTO `dy-heatmap` VALUES ('2', '16', '/uploads/20181116/cDs9HRcKVJXdSJSIvuYL.gif', '0000-00-00 00:00:00', '2018-11-16 10:59:23');
INSERT INTO `dy-heatmap` VALUES ('3', '17', '/uploads/20181116/W5PSdiBVqEGVmixEQkit.jpg', '0000-00-00 00:00:00', '2018-11-16 10:56:29');
INSERT INTO `dy-heatmap` VALUES ('4', '18', '/uploads/20181116/1v68lM9q71sddZQQCEwt.jpg', '0000-00-00 00:00:00', '2018-11-16 15:38:48');
INSERT INTO `dy-heatmap` VALUES ('5', '19', '/uploads/20181116/iW3Cojg0mLez9umcNJIv.png', '0000-00-00 00:00:00', '2018-11-16 15:41:25');
INSERT INTO `dy-heatmap` VALUES ('6', '20', '/uploads/20181120/Sm5af1XTjafGW5DyZOz7.gif', '0000-00-00 00:00:00', '2018-11-20 21:24:44');

-- ----------------------------
-- Table structure for `dy-label`
-- ----------------------------
DROP TABLE IF EXISTS `dy-label`;
CREATE TABLE `dy-label` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `labelname` varchar(100) NOT NULL,
  `labelcolor` varchar(100) NOT NULL,
  `articlecount` int(11) NOT NULL DEFAULT '0' COMMENT '包含文章个数',
  `articlenumber` varchar(255) NOT NULL DEFAULT '' COMMENT '包含文章编号',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-label
-- ----------------------------
INSERT INTO `dy-label` VALUES ('2', '新闻大事件', '#000011', '2', '1,2,', '2018-11-05 10:59:06', '2018-11-05 14:19:34', null);
INSERT INTO `dy-label` VALUES ('3', '节气', '#ffff00', '0', '', '2018-11-05 11:24:35', '2018-11-05 14:22:04', null);
INSERT INTO `dy-label` VALUES ('4', '技术型吃货', '#ff8000', '1', '10,', '2018-11-05 11:41:19', '2018-11-05 11:41:19', null);
INSERT INTO `dy-label` VALUES ('5', '漫画', '#ff80c0', '2', '3,4,', '2018-11-05 11:42:02', '2018-11-05 11:42:02', null);
INSERT INTO `dy-label` VALUES ('6', '天文八卦学', '#0000ff', '4', '5,6,7,8,', '2018-11-05 11:43:07', '2018-11-05 11:43:07', null);
INSERT INTO `dy-label` VALUES ('7', '创新工场', '#7cb6aa', '1', '9,', '2018-11-05 11:43:43', '2018-11-05 11:43:43', null);
INSERT INTO `dy-label` VALUES ('8', '啤酒的故事', '#00ffff', '2', '3,12,', '2018-11-05 11:44:22', '2018-11-05 11:44:22', null);
INSERT INTO `dy-label` VALUES ('9', '论戏书影', '#ff0000', '1', '11,', '2018-11-05 11:45:15', '2018-11-05 11:45:15', null);
INSERT INTO `dy-label` VALUES ('10', 'Internet', '#8000ff', '2', '16,15,', '2018-11-05 12:03:58', '2018-11-05 12:09:14', null);
INSERT INTO `dy-label` VALUES ('11', '1', '#000000', '1', '13,', '2018-11-05 12:05:23', '2018-11-05 12:09:23', null);
INSERT INTO `dy-label` VALUES ('12', '2', '#d522ee', '3', '1,7,8,', '2018-11-05 12:09:49', '2018-11-05 14:18:35', null);

-- ----------------------------
-- Table structure for `dy-link`
-- ----------------------------
DROP TABLE IF EXISTS `dy-link`;
CREATE TABLE `dy-link` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `yqname` varchar(100) NOT NULL,
  `yqlink` varchar(100) NOT NULL,
  `yqpic` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-link
-- ----------------------------
INSERT INTO `dy-link` VALUES ('1', '百度一下', 'https://www.baidu.com/', '/uploads/20181116/f8281B65PpcPSzpZcjF9.png', '2018-11-16 14:10:58', '2018-11-01 16:58:44', '0000-00-00 00:00:00');
INSERT INTO `dy-link` VALUES ('2', '淘宝', 'https://www.taobao.com/', '/uploads/20181116/Ycxb9tP9qj6dJTxHF8I2.jpg', '2018-11-16 14:13:19', '2018-11-01 18:49:25', '0000-00-00 00:00:00');
INSERT INTO `dy-link` VALUES ('4', '中央网信办', 'http://www.12377.cn/', '/uploads/20181116/AoTfeQcDK48tFGwtBVc8.jpg', '2018-11-16 14:20:59', '2018-11-02 10:18:11', '0000-00-00 00:00:00');
INSERT INTO `dy-link` VALUES ('5', '网络工商局', 'http://samr.saic.gov.cn/', '/uploads/20181116/nQcpTtSiLZAv5Lug7yPc.jpg', '2018-11-16 14:23:31', '2018-11-16 12:04:53', '0000-00-00 00:00:00');
INSERT INTO `dy-link` VALUES ('6', '上网从hao123之家开始', 'https://www.hao123.com/', '/uploads/20181116/l84LnPZCc9S4dcaxR9Yd.png', '2018-11-16 14:25:40', '2018-11-16 12:05:10', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `dy-navigation`
-- ----------------------------
DROP TABLE IF EXISTS `dy-navigation`;
CREATE TABLE `dy-navigation` (
  `id` int(64) unsigned NOT NULL AUTO_INCREMENT,
  `navname` varchar(128) NOT NULL,
  `pid` varchar(32) NOT NULL,
  `path` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '''1激活 2未激活''',
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-navigation
-- ----------------------------
INSERT INTO `dy-navigation` VALUES ('10', '生活', '0', '0', '1', '2018-11-03 14:03:09', '0000-00-00 00:00:00', '2018-11-05 19:55:10', 'f');
INSERT INTO `dy-navigation` VALUES ('11', '科技', '0', '0', '1', '2018-11-06 11:54:03', '0000-00-00 00:00:00', '2018-11-06 11:54:03', '');

-- ----------------------------
-- Table structure for `dy-users`
-- ----------------------------
DROP TABLE IF EXISTS `dy-users`;
CREATE TABLE `dy-users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '3' COMMENT '''1超级管理员 2论坛管理员 3普通用户 ''',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-users
-- ----------------------------
INSERT INTO `dy-users` VALUES ('3', 'lisilisi', '$2y$2y$10$cpnctMBzyfRImf6M7U4Rku/NEmuT2EBbTYxPEVM6fTQZc5EI4A', '2', '2018-11-02 16:02:12', '2018-11-02 16:02:12', null);
INSERT INTO `dy-users` VALUES ('6', 'admin333', '$2y$10$HCeG/wJXfrO/uBBWh/cJNevXcZUrmZ9quyr3r83cGmO.Ua2WgZKBq', '1', '2018-11-02 22:37:33', '2018-11-02 22:37:33', null);
INSERT INTO `dy-users` VALUES ('8', 'user222222', '$2y$10$vcfePl0SHe8BX6cnOAkeoe/0v6HLV0/g6x756jrGmlQGJiq1wHRcK', '2', '2018-11-03 10:04:23', '2018-11-03 10:04:23', null);
INSERT INTO `dy-users` VALUES ('9', 'user333333', '$2y$10$QjpGN9tFeO6SG94xPsuOJuozXkYlRp7d0fzuk/lkbcRcZHQyd/8yW', '3', '2018-11-03 10:04:57', '2018-11-03 10:04:57', null);
INSERT INTO `dy-users` VALUES ('10', 'user444444', '$2y$10$CKyO/bLrESPSUtiYwZ58WO4Tcz8jE90RqTIwlpd2Qdgquw5fk3rza', '3', '2018-11-03 10:05:35', '2018-11-03 10:05:35', null);
INSERT INTO `dy-users` VALUES ('11', 'user55555', '$2y$10$ixJPdrvvZ6dkZwiF1KtKIuHVy2UNadW4qb9EuQkWbEmu0VVfLGrEO', '3', '2018-11-03 10:06:20', '2018-11-03 10:06:20', null);
INSERT INTO `dy-users` VALUES ('12', 'user666666', '$2y$10$VgyrynXJScBk9mOSiN7iR.mSvBtIq5JOMSZq7Lk.ED5ZwsLyoe5vC', '3', '2018-11-03 10:06:51', '2018-11-03 10:06:51', null);
INSERT INTO `dy-users` VALUES ('14', 'phpcms222', '$2y$10$xko0iSuTBXqeZfNBPEUvnuhk6Bq6MVyo6aSaRbCoyolkdckFOkgpC', '2', '2018-11-03 19:13:02', '2018-11-03 19:13:02', null);
INSERT INTO `dy-users` VALUES ('15', 'phpcms333', '$2y$10$zQBXAOZWCLlOXhvo1Og2Z.AnGzyYuzU7.ANihJsgxDs7DAx8WnxVa', '3', '2018-11-03 19:14:32', '2018-11-03 19:14:32', null);
INSERT INTO `dy-users` VALUES ('16', 'phpcms444', '$2y$10$PnR39Y6la5LGtwu4qsX3Lutm9nnwvNeqQOcB1lX83Ji.5.pFxXQOu', '2', '2018-11-03 19:16:29', '2018-11-03 19:16:29', null);
INSERT INTO `dy-users` VALUES ('17', 'phpcms555', '$2y$10$5vHSHgxEDt4Ix06.OM.6ZeoVtZ/W3R7gdOa9Lp5P0tDUvxTG/eeAm', '3', '2018-11-03 19:17:11', '2018-11-03 19:17:11', null);
INSERT INTO `dy-users` VALUES ('18', 'phpcms666', '$2y$10$xz4qdt0425PMogYA1XG4Zuh2z4CGIRoIysbr4Yw776Ls1WdKX7Muy', '3', '2018-11-03 19:17:43', '2018-11-03 19:17:43', null);
INSERT INTO `dy-users` VALUES ('19', 'phpcms777', '$2y$10$V.X5WLoNacCMM3edoR0OcuvY0nfo/0fRG/GrZYgFwYwWvfi5O3is2', '3', '2018-11-03 19:18:27', '2018-11-03 19:18:27', null);
INSERT INTO `dy-users` VALUES ('20', 'phpcms888', '$2y$10$bkxwu6xLDnoMfesGQx/aFujzJkskqlIVemAZ3oHLR0FwX2rUMEPYK', '3', '2018-11-03 19:19:44', '2018-11-03 19:19:44', null);
INSERT INTO `dy-users` VALUES ('21', 'phpcms999', '$2y$10$GJrwH3Uhdi.lMvRgY0m73Oaf5n1.QRrv4Ks1m72oEFgItgWn9ldz6', '3', '2018-11-03 19:20:46', '2018-11-03 19:20:46', null);
INSERT INTO `dy-users` VALUES ('22', 'phpcms121', '$2y$10$EEd9TsNcmanxlnzFLZx64egMvhvZG2xFnzIepXWPvS6tUSmIYVGaS', '3', '2018-11-03 19:22:43', '2018-11-03 19:22:43', null);
INSERT INTO `dy-users` VALUES ('23', 'user8u58', '$2y$10$MtAEb8TTBEg77MffyHK7N.l95Yarbh5nNhxArdsa7gYTBO8xOfxcS', '3', '2018-11-08 11:42:58', '2018-11-08 11:42:58', null);
INSERT INTO `dy-users` VALUES ('24', 'user1568', '$2y$10$LB70WCYs2FeXUj/iT7YBBeMopjbkF1.Hwd5TdZjOhtITksUjgWJCa', '3', '2018-11-08 11:48:49', '2018-11-08 11:48:49', null);
INSERT INTO `dy-users` VALUES ('27', 'adminadmin', '$2y$10$/Uh0ia6woKjc77WQ/vxxveD3TsaUBsr3tQtwvzXEa33kU9gFg6CfO', '0', '2018-11-19 16:42:57', '2018-11-14 14:47:16', null);

-- ----------------------------
-- Table structure for `dy-users-detail`
-- ----------------------------
DROP TABLE IF EXISTS `dy-users-detail`;
CREATE TABLE `dy-users-detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '同users表的ID对应',
  `phone` char(11) NOT NULL COMMENT '电话',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(255) DEFAULT NULL COMMENT 'QQ号',
  `photo` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` tinyint(4) DEFAULT NULL COMMENT '性别1男，2女',
  `birthday` date DEFAULT NULL COMMENT '出生年月',
  `city` varchar(255) DEFAULT NULL COMMENT '所在城市',
  `fas` text COMMENT '粉丝   1,2,3,用户ID，',
  `following` text COMMENT '关注 1,2,6,',
  `integral` int(11) DEFAULT '0' COMMENT '积分   加法，数值',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dy-users-detail
-- ----------------------------
INSERT INTO `dy-users-detail` VALUES ('3', '3', '13011111212', 'lisi@qq.com', '1256981452', '/uploads/20181108/7PEMexrhJDLl1wHGHcly.jpg', '1', '2012-02-01', '北京', '3,6,', '5,', '10', '2018-11-02 16:02:12', '2018-11-08 15:28:10', null);
INSERT INTO `dy-users-detail` VALUES ('6', '6', '13033333333', '2212@qq.com', '1523698886', '/uploads/20181108/6eWaLX9amCHa7Z1acwh9.jpg', '2', '1999-12-25', '上海', '1,2,3,5,16,', null, '0', '2018-11-02 22:37:33', '2018-11-08 16:01:17', null);
INSERT INTO `dy-users-detail` VALUES ('8', '8', '13212301230', '123123@qq.com', '5555555555', '/uploads/20181108/GglCcCDcL3zUhcmtuoU9.jpg', '1', '2018-11-11', '北京2', '9,12,3,', null, '0', '2018-11-03 10:04:23', '2018-11-08 15:59:46', null);
INSERT INTO `dy-users-detail` VALUES ('9', '9', '13245601231', '666@qq.com', '15649763864', '/uploads/20181108/PuMH78ILkeoROPxT0DhM.jpg', '1', '2018-06-29', '北京', '17,19,14,15,16,', null, '0', '2018-11-03 10:04:57', '2018-11-08 16:01:06', null);
INSERT INTO `dy-users-detail` VALUES ('10', '10', '15612312300', '123123@qq.com', '1542642754', '/uploads/20181108/TkSeocvbYZucYBKVk4Dz.gif', '1', '2015-03-06', '上海', '22,20,4,5,9,', null, '15', '2018-11-03 10:05:35', '2018-11-08 15:36:37', null);
INSERT INTO `dy-users-detail` VALUES ('11', '11', '15512312310', '123@qq.com', '1542316425', '/uploads/20181108/aVFK6FZvqEU86IIrnBmt.jpg', '2', '1990-07-13', '北京', '3,6,11,12,14,', null, '0', '2018-11-03 10:06:20', '2018-11-08 15:29:39', null);
INSERT INTO `dy-users-detail` VALUES ('12', '12', '16612312366', '123123@qq.com', '1542642486', '/uploads/20181108/6LC73HvzXCinFQj2enPG.jpg', '1', '2018-11-10', '北京', '5,6,8,15,19,20,', '6,11,', '5', '2018-11-03 10:06:51', '2018-11-08 15:30:01', null);
INSERT INTO `dy-users-detail` VALUES ('14', '14', '13212312312', '123@qq.com', '9643524812', '/uploads/20181108/IgFSYfFPFoLM2bnsHhuY.jpg', '2', '2018-11-15', '上海', '8,15,12,6,', null, '5', '2018-11-03 19:13:02', '2018-11-08 15:30:16', null);
INSERT INTO `dy-users-detail` VALUES ('15', '15', '13212332112', '123@qq.com', '9469768563', '/uploads/20181108/jdZ6xoAahtPM5w73JvXe.jpg', '2', '2014-01-31', '深圳', '6,19,22,15,4,15,', null, '20', '2018-11-03 19:14:32', '2018-11-08 15:33:14', null);
INSERT INTO `dy-users-detail` VALUES ('16', '16', '13245612332', '123@qq.com', '4245273878', '/uploads/20181108/F37skbG9syJd5Ogs693k.jpg', '1', '2014-01-31', '北京', '8,12,15,20,19,22,27,', null, '50', '2018-11-03 19:16:29', '2018-11-08 15:30:45', null);
INSERT INTO `dy-users-detail` VALUES ('17', '17', '16512312332', '123@qq.com', '5465648664', '/uploads/20181108/lMrUuCXUMKjvAn1WWPUQ.jpg', '1', '2014-01-31', '上海', '5,6,15,16,9,', '20,22,', '0', '2018-11-03 19:17:11', '2018-11-08 16:00:20', null);
INSERT INTO `dy-users-detail` VALUES ('18', '18', '13245632112', '123@qq.com', '4563486456', '/uploads/20181108/pWu3fK9jgl9gN5noA7hv.jpg', '1', '2014-01-31', '北京', '8,12,3,15,', null, '25', '2018-11-03 19:17:43', '2018-11-08 15:31:26', null);
INSERT INTO `dy-users-detail` VALUES ('19', '19', '13654212332', '123@qq.com', '4564656465', '/uploads/20181108/Qs54iDJQv4qY1jvAYFff.jpg', '1', '2014-01-31', '上海', '', null, '0', '2018-11-03 19:18:27', '2018-11-08 15:32:27', null);
INSERT INTO `dy-users-detail` VALUES ('20', '20', '15311223344', '123@qq.com', '4564868586', '/uploads/20181108/1rALUTQZ6k5QJVTFwSx8.jpg', '2', '2014-01-31', '北京', '14,15,16,18,27,', null, '0', '2018-11-03 19:19:44', '2018-11-08 15:32:39', null);
INSERT INTO `dy-users-detail` VALUES ('21', '21', '15915531532', '123@qq.com', '5468538699', '/uploads/20181108/J6DAjchhce1kt68rRtwj.jpg', '2', '2014-01-31', '广州', '17,21,12,20,', null, '0', '2018-11-03 19:20:46', '2018-11-08 15:32:51', null);
INSERT INTO `dy-users-detail` VALUES ('22', '22', '13015679824', '123@qq.com', '8634824552', '/uploads/20181108/9Z7hkLFkxFhEsScljBe9.jpg', '1', '2014-01-31', '深圳', '8,16,12,4,18,16,15,14,', null, '5', '2018-11-03 19:22:43', '2018-11-08 15:27:46', null);
INSERT INTO `dy-users-detail` VALUES ('23', '23', '13015679824', 'phpcms@qq.com', '1234567890', '/uploads/20181108/9cR8yoVw4i4BgFecP7f2.jpg', '1', '2018-11-09', '河南', '5,6,8,16,9,20,', null, '0', '2018-11-08 11:42:58', '2018-11-08 15:27:26', null);
INSERT INTO `dy-users-detail` VALUES ('24', '24', '13015679824', 'phpcms@qq.com', '5649873695', '/uploads/20181108/YEqBoBKiGcXFvWZG5Yya.jpg', '1', '1989-07-23', '天津', '16,12,4,5,', null, '0', '2018-11-08 11:48:49', '2018-11-08 15:26:29', null);
INSERT INTO `dy-users-detail` VALUES ('25', '25', '13033339999', 'asd999@qq.com', '9889873695', '/uploads/20181108/1jyzwnGUH957aLKBxYO1.jpg', '2', '2014-11-10', '天津', '3,4,5,6,', null, '10', '2018-11-08 15:21:58', '2018-11-08 15:21:58', null);
INSERT INTO `dy-users-detail` VALUES ('27', '27', '15176243788', '2442148376@qq.com', null, '/uploads/20181119/xk4KjqHzk3zyNWm5WEMM.jpg', '2', null, '北京', '1,2,3,15,17,18,20,21,22,', null, '20', '2018-11-14 19:15:59', '2018-11-19 16:42:57', null);
