/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : ykppky

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2017-03-29 16:47:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity`
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '赵苗姐姐的事迹', 'ykp', '2016-09-16 00:00:00', '是的发送到发送到分', '0');
INSERT INTO `activity` VALUES ('2', 'nihao', '撒的发生的', '0000-00-00 00:00:00', '<span style=\"color:#333333;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\">isset()是判断这个变量是否定义，empty()是在这个变量已经定义的情况下（如果变量没定义，将报错variable is undefinded），判断这个变量是否为null，空字符串，空数组都被empty()视为空,返回true。举个例子，比如传过来一个表单$user(\'name\'=&gt;\'tom\',\'nickname\'=&gt;\'\')，你想判断$use[\'nickname\']是都已经被用户填写了数据，可以用empty()来判断，比如你的表单里面本来有password字段，但是第三方登录注册的用户暂时没有密码字段，这你就需要判断isset($user[\'password\'])了，isset和empty有本质上的区别，希望我举的例子可以为你的理解提供帮助～</span>', '0');

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(16) DEFAULT NULL,
  `account` char(20) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'ykp', 'ykp', '18450089550', 'ykp@qq.com', '4297f44b13955235245b2497399d7a93');

-- ----------------------------
-- Table structure for `advert`
-- ----------------------------
DROP TABLE IF EXISTS `advert`;
CREATE TABLE `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '广告',
  `title` varchar(255) DEFAULT NULL COMMENT '广告标题',
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL COMMENT '广告图片路径',
  `date` datetime DEFAULT NULL COMMENT '广告创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advert
-- ----------------------------
INSERT INTO `advert` VALUES ('4', '美丽校园', 'http://dxxy.fjnufq.edu.cn/', '20161227022201.jpg', '2016-12-27 02:27:03');
INSERT INTO `advert` VALUES ('5', '昌檀楼', 'http://dxxy.fjnufq.edu.cn/', '20160915161125.jpg', '2016-12-27 09:37:42');

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '广告',
  `title` varchar(255) DEFAULT NULL COMMENT '广告标题',
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL COMMENT '广告图片路径',
  `date` datetime DEFAULT NULL COMMENT '广告创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('97', '昌檀楼', 'http://dxxy.fjnufq.edu.cn/', '20160915163642.jpg', '2016-09-15 16:36:44');
INSERT INTO `album` VALUES ('98', '校园风光', 'http://dxxy.fjnufq.edu.cn/', '20160915164441.jpg', '2016-09-15 16:45:02');
INSERT INTO `album` VALUES ('119', '运动会', '', '20161227024606.jpg', '2016-12-27 02:46:09');
INSERT INTO `album` VALUES ('120', '运动会', '', '20161227024613.jpg', '2016-12-27 02:46:16');
INSERT INTO `album` VALUES ('121', '运动会', '', '20161227024622.jpg', '2016-12-27 02:46:24');
INSERT INTO `album` VALUES ('122', '运动会', '', '20161227024630.jpg', '2016-12-27 02:46:32');
INSERT INTO `album` VALUES ('123', '运动会', '', '20161227024637.jpg', '2016-12-27 02:46:40');
INSERT INTO `album` VALUES ('124', '运动会', '', '20161227024645.jpg', '2016-12-27 02:46:47');
INSERT INTO `album` VALUES ('125', '运动会', '', '20161227024653.jpg', '2016-12-27 02:46:55');
INSERT INTO `album` VALUES ('126', '运动会', '', '20161227024704.jpg', '2016-12-27 02:47:06');
INSERT INTO `album` VALUES ('127', '歌手赛', '', '20161227024924.jpg', '2016-12-27 02:49:35');
INSERT INTO `album` VALUES ('128', '歌手赛', '', '20161227024941.jpg', '2016-12-27 02:49:43');

-- ----------------------------
-- Table structure for `baseinfo`
-- ----------------------------
DROP TABLE IF EXISTS `baseinfo`;
CREATE TABLE `baseinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(16) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baseinfo
-- ----------------------------
INSERT INTO `baseinfo` VALUES ('1', 'name', '电子与信息工程学院');
INSERT INTO `baseinfo` VALUES ('2', 'phone', '18450089550');
INSERT INTO `baseinfo` VALUES ('3', 'address', '福建省福清市龙江街道福建师范大学福清分校昌檀楼');
INSERT INTO `baseinfo` VALUES ('4', 'qq', '837382171');
INSERT INTO `baseinfo` VALUES ('5', 'introduce', '<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	电子与信息工程学院成立于2014年6月，在原数学与计算机科学系、电子与信息工程系基础上发展而来。现设有计算机科学与技术、信息与计算科学、网络工程、电子信息工程、电子信息科学与技术五个本科专业。现有在校生1400余名。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	我院坚持立足地方主导产业发展现状，主动对接行业企业，不断加强学科专业建设的力度。学院拥有省级精品课程2门，校级精品课程4门，校级重点学科2个，校级特色专业建设点1个，校级教学团队1个，校级教学名师2名，获得校级“优秀教学成果奖”1项。电子信息工程专业列入省“产学研用联合培养工程类应用型人才改革试点专业”，并与融侨经济技术开发区、元洪投资区相关企业签署校企合作协议。为促进学科专业建设，推动科学研究和人才培养，增强社会服务能力，学院设有应用电子技术研究所、创新信息产业研究所等2个研究所。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	我院坚持人才培养的“应用性、行业性、地方性”，积极探索人才培养模式的改革与创新，以解决行业、企业实际技术问题为人才培养导向。学院拥有10余间多媒体教室，3个计算机软件实验室（可兼做多媒体教室），2个计算机网络实验室，1个计算机硬件实验室，设有电路分析、电工实训、模电、数电、电子测量、高频电子线路、传感器、PLC、光纤通信等实验室，可以满足正常的实验与实训教学需要。在冠捷科技（福建）有限公司、星网锐捷、厦门长朝科技有限公司、绿网天下（福建）网络科技股份有限公司、福清众远网络等设有校外实训实践基地。学生参加国家、省级学生创新创业训练计划50多人，在“全国大学生数学建模”竞赛、“全国大学生电子设计”竞赛、“博创杯”全国大学生嵌入式系统应用设计大赛、全国信息技术应用水平大赛Android应用开发团体赛、第一届“中国软件杯”全国大学生软件设计大赛等全国性的比赛中，取得了优异的成绩，人才培养质量受到了社会各界的一致肯定。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	我院坚持内培外引，努力打造一支能够适应建设应用技术大学要求，理论教学与实践教学并重的教师队伍。目前，学院现有教职工73人（专任教师63人），其中正高职称5人，副高职称20人，中级职称30人，具有博士学位5人，硕士学位56人。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	我院坚持教学科研相结合，以科研促进教学，以科研服务地方。近年来，学院教师承担了40余个省自然科学基金和省教育厅科研项目；多项科研成果获奖，申请专利9项，授权专利5项，1个项目荣获2007年海峡两岸职工创新成果展览会银奖，全省高校青年教师教学竞赛特等奖1项 ；在国内外学术刊物上发表科研论文400多篇，多篇论文被SCI、EI、CSCD和美国《数学评论》等国内外权威刊物收录或摘录；主编及参编教材10余部。与京东方科技集团股份有限公司、福建捷创有限公司协同合作，申请横向课题经费210万元。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	我院坚持协同创新，以校企合作、产教融合为主要路径，努力实现同频、共振、双赢。积极深入福清市各大经济技术开发区、投资区以及平潭综合试验区，主动邀请企业参与学院治理结构，共同探讨产学研用合作的着力点，推动校企合作持续深入开展。\r\n</p>\r\n<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	发展无穷期，奋进不言止！在学校党政领导下，我院将按照应用型本科人才培养的办学目标，坚持综合改革和提升内涵建设，以培养高素质、高水平应用型人才为中心任务，以学科专业建设为龙头，以师资队伍建设为重点，以产教融合、校企合作为主要路径，全面提高教育、教学质量，为建设应用技术大学作贡献。\r\n</p>');
INSERT INTO `baseinfo` VALUES ('6', 'time', '2017-03-08 03:45:41');
INSERT INTO `baseinfo` VALUES ('7', 'brief', '电子与信息工程学院成立于2014年6月，在原数学与计算机科学系、电子与信息工程系基础上发展而来。');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `activity_id` int(5) NOT NULL COMMENT '活动ID',
  `openid` varchar(50) DEFAULT NULL COMMENT '评论者ID',
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
  `sendtime` datetime NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('7', '1', '1', '阿斯顿发斯蒂芬', '2016-12-06 11:04:27');
INSERT INTO `comment` VALUES ('8', '1', '1', '的萨芬撒打发斯蒂芬', '2016-12-06 11:04:49');
INSERT INTO `comment` VALUES ('9', '1', '1', '撒旦法撒旦法', '2016-12-06 11:04:54');
INSERT INTO `comment` VALUES ('10', '1', '1', '大法师打发', '2016-12-06 11:05:00');
INSERT INTO `comment` VALUES ('11', '1', '1', '撒旦法撒旦法', '2016-12-06 11:05:05');
INSERT INTO `comment` VALUES ('12', '1', '1', '啊撒旦发送到发送到都是发的发生多番', '2016-12-06 11:06:41');
INSERT INTO `comment` VALUES ('47', '1', '1', '防守打法sad', '2016-12-08 08:59:23');
INSERT INTO `comment` VALUES ('48', '0', '', '', '2016-12-22 07:31:42');
INSERT INTO `comment` VALUES ('49', '0', '', '', '2016-12-22 07:31:43');
INSERT INTO `comment` VALUES ('50', '0', '', '', '2016-12-22 07:31:43');
INSERT INTO `comment` VALUES ('51', '0', '', '', '2016-12-22 07:31:43');
INSERT INTO `comment` VALUES ('52', '0', '', '', '2016-12-22 07:31:44');
INSERT INTO `comment` VALUES ('53', '0', '', '', '2016-12-22 07:31:44');
INSERT INTO `comment` VALUES ('54', '0', '', '', '2016-12-22 07:31:44');
INSERT INTO `comment` VALUES ('55', '0', '', '', '2016-12-22 07:31:44');
INSERT INTO `comment` VALUES ('56', '0', '', '', '2016-12-22 07:31:45');
INSERT INTO `comment` VALUES ('57', '0', '', '', '2016-12-22 07:31:45');
INSERT INTO `comment` VALUES ('58', '0', '', '', '2016-12-22 07:31:45');
INSERT INTO `comment` VALUES ('59', '0', '', '', '2016-12-22 07:31:45');
INSERT INTO `comment` VALUES ('60', '0', '', '', '2016-12-22 07:31:46');
INSERT INTO `comment` VALUES ('61', '0', '', '', '2016-12-22 07:31:46');
INSERT INTO `comment` VALUES ('62', '0', '', '', '2016-12-22 07:31:46');
INSERT INTO `comment` VALUES ('63', '0', '', '', '2016-12-22 07:31:47');
INSERT INTO `comment` VALUES ('64', '0', '', '', '2016-12-22 07:31:47');
INSERT INTO `comment` VALUES ('65', '0', '', '', '2016-12-22 07:31:47');
INSERT INTO `comment` VALUES ('66', '0', '', '', '2016-12-22 07:31:48');
INSERT INTO `comment` VALUES ('67', '0', '', '', '2016-12-22 07:31:48');
INSERT INTO `comment` VALUES ('68', '0', '', '', '2016-12-22 07:31:48');
INSERT INTO `comment` VALUES ('69', '0', '', '', '2016-12-22 07:31:49');
INSERT INTO `comment` VALUES ('70', '0', '', '', '2016-12-22 07:31:49');
INSERT INTO `comment` VALUES ('71', '0', '', '', '2016-12-22 07:31:49');
INSERT INTO `comment` VALUES ('72', '0', '', '', '2016-12-22 07:34:07');
INSERT INTO `comment` VALUES ('73', '0', '', '', '2016-12-22 07:34:07');
INSERT INTO `comment` VALUES ('74', '0', '', '', '2016-12-22 07:34:07');
INSERT INTO `comment` VALUES ('75', '0', '', '', '2016-12-22 07:34:08');
INSERT INTO `comment` VALUES ('76', '0', '', '', '2016-12-22 07:34:08');
INSERT INTO `comment` VALUES ('77', '0', '', '', '2016-12-22 07:34:08');
INSERT INTO `comment` VALUES ('78', '0', '', '', '2016-12-22 07:34:09');
INSERT INTO `comment` VALUES ('79', '0', '', '', '2016-12-22 07:34:09');
INSERT INTO `comment` VALUES ('80', '0', '', '', '2016-12-22 07:34:09');
INSERT INTO `comment` VALUES ('81', '0', '', '', '2016-12-22 07:34:09');
INSERT INTO `comment` VALUES ('82', '0', '', '', '2016-12-22 07:34:10');
INSERT INTO `comment` VALUES ('83', '0', '', '', '2016-12-22 07:34:10');
INSERT INTO `comment` VALUES ('84', '0', '', '', '2016-12-22 07:34:10');
INSERT INTO `comment` VALUES ('85', '0', '', '', '2016-12-22 07:34:11');
INSERT INTO `comment` VALUES ('86', '0', '', '', '2016-12-22 07:34:11');
INSERT INTO `comment` VALUES ('87', '0', '', '', '2016-12-22 07:34:11');
INSERT INTO `comment` VALUES ('88', '0', '', '', '2016-12-22 07:34:14');
INSERT INTO `comment` VALUES ('89', '0', '', '', '2016-12-22 07:34:15');
INSERT INTO `comment` VALUES ('90', '0', '', '', '2016-12-22 07:34:15');
INSERT INTO `comment` VALUES ('91', '0', '', '', '2016-12-22 07:34:15');
INSERT INTO `comment` VALUES ('92', '0', '', '', '2016-12-22 07:34:15');
INSERT INTO `comment` VALUES ('93', '0', '', '', '2016-12-22 07:34:16');
INSERT INTO `comment` VALUES ('94', '0', '', '', '2016-12-22 07:34:16');
INSERT INTO `comment` VALUES ('95', '0', '', '', '2016-12-22 07:34:16');
INSERT INTO `comment` VALUES ('96', '0', '', '', '2016-12-22 07:34:17');
INSERT INTO `comment` VALUES ('97', '0', '', '', '2016-12-22 07:34:17');
INSERT INTO `comment` VALUES ('98', '0', '', '', '2016-12-22 07:34:17');
INSERT INTO `comment` VALUES ('99', '0', '', '', '2016-12-22 07:34:18');
INSERT INTO `comment` VALUES ('100', '0', '', '', '2016-12-22 07:34:18');
INSERT INTO `comment` VALUES ('101', '0', '', '', '2016-12-22 07:34:18');
INSERT INTO `comment` VALUES ('102', '0', '', '', '2016-12-22 07:34:19');
INSERT INTO `comment` VALUES ('103', '0', '', '', '2016-12-22 07:34:19');
INSERT INTO `comment` VALUES ('104', '0', '', '', '2016-12-22 07:34:19');
INSERT INTO `comment` VALUES ('105', '0', '', '', '2016-12-22 07:34:20');
INSERT INTO `comment` VALUES ('106', '0', '', '', '2016-12-22 07:34:47');
INSERT INTO `comment` VALUES ('107', '0', '', '', '2016-12-22 07:34:47');
INSERT INTO `comment` VALUES ('108', '0', '', '', '2016-12-22 07:34:47');
INSERT INTO `comment` VALUES ('109', '0', '', '', '2016-12-22 07:34:48');
INSERT INTO `comment` VALUES ('110', '0', '', '', '2016-12-22 07:34:48');
INSERT INTO `comment` VALUES ('111', '0', '', '', '2016-12-22 07:34:48');
INSERT INTO `comment` VALUES ('112', '0', '', '', '2016-12-22 07:34:48');
INSERT INTO `comment` VALUES ('113', '0', '', '', '2016-12-22 07:34:49');
INSERT INTO `comment` VALUES ('114', '0', '', '', '2016-12-22 07:34:49');
INSERT INTO `comment` VALUES ('115', '0', '', '', '2016-12-22 07:34:49');
INSERT INTO `comment` VALUES ('116', '0', '', '', '2016-12-22 07:34:50');
INSERT INTO `comment` VALUES ('117', '0', '', '', '2016-12-22 07:34:50');
INSERT INTO `comment` VALUES ('118', '0', '', '', '2016-12-22 07:34:50');
INSERT INTO `comment` VALUES ('119', '0', '', '', '2016-12-22 07:34:50');
INSERT INTO `comment` VALUES ('120', '0', '', '', '2016-12-22 07:34:51');
INSERT INTO `comment` VALUES ('121', '0', '', '', '2016-12-22 07:34:51');
INSERT INTO `comment` VALUES ('122', '1', '', 'fjasdlkfjskdjf ', '2016-12-26 09:17:19');
INSERT INTO `comment` VALUES ('123', '1', '', 'sgadfasdfsd', '2017-03-08 03:42:46');
INSERT INTO `comment` VALUES ('124', '1', '', 'adgadfgadfgadfgadfga', '2017-03-08 03:42:54');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '昵称',
  `specialty` varchar(50) DEFAULT NULL COMMENT '专业',
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `sendtime` datetime DEFAULT NULL COMMENT '发送时间',
  `ischeck` tinyint(6) DEFAULT NULL COMMENT '是否审核通过',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `moral_education`
-- ----------------------------
DROP TABLE IF EXISTS `moral_education`;
CREATE TABLE `moral_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `order` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of moral_education
-- ----------------------------
INSERT INTO `moral_education` VALUES ('323', '我校开展道路交通安全教育活动', '电信院', '2013-01-17 00:00:00', '<p>\r\n	<span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;\"=\"\"><span style=\"font-size:16px;\"> </span><span style=\"font-size:16px;\">为切实加强学校道路交通安全工作， 有效减少道路交通安全事故的发生，让学生从小树立交通安全意识，养成自觉遵守道路交通安全法律法规的良好习惯，联星中学开展“道路交通安全教育”专题活动，通过举办交通安全知识讲座、看展板、发放宣传图片、观看有关交通视频等形式对在学生进行交通安全教育。 </span></span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;\"=\"\"><span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;\"=\"\"><span style=\"font-size:16px;\"> </span><span style=\"font-size:16px;\">联星中学高度重视学生上放学的交通安全，把交通安全工作作为学校工作的重中之重，将交通安全常识、交通法律法规教育纳入课堂教学计划。通过国旗下讲话、播放交通安全视频资料、校园广播、宣传栏、黑板报等形式对师生进行文明参与交通、安全出行教育，增强师生的文明交通意识。并“以致家长一封信”的形式，把交通安全知识作为信的重要内容，以一个学生带动一个家庭，学生家长带动周边人群的方式，教育引导群众遵守交通规则，平安出行。</span></span><span style=\"font-size:16px;\"></span><br />\r\n </span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;\"=\"\"><span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;font-size:16px;\"=\"\">　　通过一系列的活动，增强了学校师生的交通安全意识，对保障个人的交通安全，维护学校内外交通秩序起到了积极的推动作用。</span></span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;\"=\"\"><span style=\"font-size:16px;\"><img src=\"/kindeditor/attached/image/20160709/20160709152417_85138.jpg\" alt=\"\" /></span></span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#222222;font-family:Consolas, \" line-height:normal;background-color:#ffffff;\"=\"\"><span style=\"font-size:16px;\"><img src=\"/kindeditor/attached/image/20160709/20160709152433_14443.jpg\" alt=\"\" /><img src=\"/kindeditor/attached/image/20160709/20160709152447_75486.jpg\" alt=\"\" /><img src=\"/kindeditor/attached/image/20160709/20160709152523_82710.jpg\" alt=\"\" /></span><br />\r\n </span>\r\n</p>', '5');
INSERT INTO `moral_education` VALUES ('324', '校园风光', '来自网络', '2016-07-23 00:00:00', 'asdfasd', '1');
INSERT INTO `moral_education` VALUES ('325', '校园风光', 'ykp', '2016-07-23 00:00:00', '发送到发送到发斯蒂芬', '2');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `order` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2', '校园风光', 'ykp', '2017-03-08 14:14:47', 'sdgdsg', '2');
INSERT INTO `news` VALUES ('346', 'sadfsadf', 'ykp', '2017-03-08 14:14:39', '是的发送到发送到分asdf&nbsp;', '5');

-- ----------------------------
-- Table structure for `open_news`
-- ----------------------------
DROP TABLE IF EXISTS `open_news`;
CREATE TABLE `open_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `order` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of open_news
-- ----------------------------
INSERT INTO `open_news` VALUES ('1', '校园风光', '来自网络', '2017-03-08 14:10:30', '撒的发生', '6');
INSERT INTO `open_news` VALUES ('2', '太费钱文', '沃尔法外', '0000-00-00 00:00:00', 'asdfsadf', '0');

-- ----------------------------
-- Table structure for `response`
-- ----------------------------
DROP TABLE IF EXISTS `response`;
CREATE TABLE `response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of response
-- ----------------------------
INSERT INTO `response` VALUES ('1', 'subscribe', '你好，欢迎关注电信院公众号！！！');
INSERT INTO `response` VALUES ('2', 'textresponse', '你的信息我们已经收到，我们会尽快处理的！？');

-- ----------------------------
-- Table structure for `specialties`
-- ----------------------------
DROP TABLE IF EXISTS `specialties`;
CREATE TABLE `specialties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `order` int(11) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of specialties
-- ----------------------------
INSERT INTO `specialties` VALUES ('1', '电子信息工程', '2016-09-16 00:00:00', '<p class=\"\" style=\"text-indent:37.3333px;font-size:19px;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<span style=\"line-height:1.5;font-family:宋体, simsun;\">专业概述：电子信息工程</span><span style=\"line-height:1.5;font-family:宋体, simsun;\">专业</span><span style=\"line-height:1.5;\">培养德智体全面发展，具备电子信息系统和通信系统理论和技术，计算机网络技术，能在电子与信息领域、计算机和通信领域中工作的高等工程技术人才与管理人才。具有应用计算机和网络技术进行电子信息系统和通信系统的设计、研究和开发的能力，使学生毕业后在社会上具有较强的适应性和竞争能力，以适应现代电子信息产业迅速发展对人才的需求。</span>\r\n</p>\r\n<p style=\"text-indent:37.3333px;font-size:19px;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	培养目标：本专业培养熟练掌握电子、通讯和计算机网络的基本原理和应用技术，具备应用电子技术、计算机技术等进行电子信息系统和通信系统的研究、设计与开发能力，能在电子信息、计算机、通信等行业从事实际工作的应用型高级技术人才和管理人才。\r\n</p>\r\n<p style=\"text-indent:37.3333px;font-size:19px;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	课程结构：电路分析、模拟电子技术、数字电子技术、高频电子线路、C语言程序设计、微机原理与接口技术、计算机通信与网络、软件工程、网络系统集成技术、通信原理、微波通信、光纤通信、信息论、信号与系统、数字信号处理、单片机原理与应用、可编程控制技术等。\r\n</p>\r\n<p style=\"text-indent:37.3333px;font-size:19px;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	授予学位：工学学士\r\n</p>', '0', '培养德智体全面发展，具备电子信息系统和通信系统理论和技术，计算机网络技术，能在电子与信息领域、计算机和通信领域中工作的高等工程技术人才与管理人才。');
INSERT INTO `specialties` VALUES ('2', '计算机类专业', '2016-07-23 00:00:00', '<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	计算机类专业由网络工程、计算机科学与技术两专业组成。\r\n</p>\r\n<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	专业名称：网络工程\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	专业概述：网络工程专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识，能运用所学知识与技能去分析和解决相关的实际问题，可在信息产业以及其他国民经济部门从事各类网络系统和计算机通信系统研究、教学、设计、开发等工作的高级科技人才。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	培养目标：本专业培养熟练掌握计算机网络系统的基本原理和应用技术，具备较强的实践能力，能在通信、交通、政府部门及其他企事业单位从事网络系统规划设计、管理维护、性能分析、软件开发等工作的应用型高级工程技术人才。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	课程结构：计算机网络、通信原理、软件工程、数据库原理及应用、网络操作系统、网络规划与构建、网络信息安全、网络分析与测试、TCP/IP编程、IP交换与路由技术、Web技术与应用、网络管理、网络服务器技术、嵌入式系统编程、云计算等，以及根据专业方向设置的选修课程组。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	授予学位：工学学士\r\n</p>\r\n<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14pt;\">专业名称：计算机科学与技术</span>\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	专业概述：计算机科学与技术坚持以应用型职业岗位所需要的理论与技能为本分，培养熟练掌握计算机科学的基本原理和应用技术，具备从事软硬件操作、维护、设计和开发的实际工作能力，并能快速跟踪和运用计算机新技术的应用型高级技术人才。把打造“具有一定行业知识、掌握最新IT技能、善于独立开发应用”的综合型IT人才作为最终培养目标。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	培养目标：本专业培养熟练掌握计算机科学的基本原理和应用技术，具备从事软硬件操作、维护、设计和开发的实际工作能力，并能快速跟踪和运用计算机新技术的应用型高级技术人才。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	课程结构：微机原理及应用、高级语言程序设计、汇编语言程序设计、数据结构、数据库原理与应用、操作系统、编译原理、软件平台技术（B/S，J2EE）、软件工程、计算机网络与通信、面向对象程序设计（Java）、VC++程序设计等，以及根据专业方向设置的选修课程组（开设网络与通信、软件设计、手机软件设计等三个专向）。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	专业特色：注重项目实践，成立校内实训基地，在WEB、移动开发方面培养了大量人才，得到了社会的认可。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	就业方向：为适应学生个性发展实行分方向培养，根据社会需求设置三个专业方向选修课程组：网络与通讯、软件设计、移动开发，这三个方向就业领域主要有：IT企业、移动通信、政府机构、金融保险等。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14pt;\">授予学位：工学学士</span>\r\n</p>', '0', '网络工程专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识。');
INSERT INTO `specialties` VALUES ('3', '新能源科学与技术 ', '2016-09-16 00:00:00', '<p style=\"color:#3E3E3E;font-family:&quot;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:20px;\">&nbsp; &nbsp;专业概述：新能源专业即开发利用或正在积极研究、有待推广的能源，如太阳能、地热能、风能、海洋能、生物质能和核聚变能等在各个行业中的应用技术。</span>\r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:&quot;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:20px;\">   培养目标：本专业培养能熟练掌握学习风能、太阳能、生物质能、核电能等新能源的特点、利用方式和方法，能胜任新能源领域教学、科研、技术开发、工程应用、经营管理等方面的专业人才，特别是适应我国需求的风能、核能专业人才等工作的应用型高级工程技术人才。</span>\r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:&quot;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:20px;\">   课程结构：流体力学、自动控制原理、传感器原理及应用、电子测量与仪器、固体与半导体物理、新能源科学与工程导论、太阳能物理、风能工程、核物理、风力机设计理论与方法、新能源发电并网技术、环境保护与综合利用技术、薄膜材料与技术、光源设计与应用、核反应堆概论、储能原理与技术、材料科学基础与新能源材料、半导体制冷制热原理、新能源综合实验等，以及根据专业方向设置的选修课程组。</span>\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:20px;\"><span style=\"font-size:16px;font-family:sans-serif;\">授予学位：工学学士</span></span>\r\n</p>', '0', '网络工程专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识，');
INSERT INTO `specialties` VALUES ('4', '电子信息科学与技术专业', '2016-09-16 00:00:00', '<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	专业概述：电子信息科学与技术主要学习电子信息科学与技术的基本理论和技术，受到严格的科学实验训练和科学研究初步训练，具有本学科及跨学科的应用研究与技术开发能力。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	‍培养目标：本专业培养熟练掌握电子信息科学的基本原理和应用技术，具备电子信息系统、设备等硬件的研究、设计和应用软件的开发能力。能在电子信息行业或部门从事科学研究、技术开发、产品设计、生产技术管理等工作的应用型高级工程技术人才。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	课程结构：电磁学、原子物理、模拟电子技术、数字电子技术、高频电子线路、半导体物理、嵌入式系统、微机原理与接口技术、数据采集与处理技术、现代显示技术、C语言程序设计、VB程序设计、信息论、通信原理、信号与系统、数字信号处理、传感器原理与应用等。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	授予学位：工学学士\r\n</p>', '0', '网络工程专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识，');
INSERT INTO `specialties` VALUES ('5', '信息与计算科学', '2016-09-16 00:00:00', '<p class=\"\" style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14pt;line-height:1.5;\">专业概述：信息与计算科学专业培养具有良好的数学基础和数学思维能力，系统掌握信息科学与计算科学的基本理论和方法，具备熟练运用专业知识和技能解决问题的实际能力，能在科技、教育、信息产业、经济金融等部门从事研究、教学、应用开发和管理工作的应用型高级专门人才。</span>\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	培养目标：本专业培养具有良好的数学基础和数学思维能力，系统掌握信息科学与计算科学的基本理论和方法，具备熟练运用专业知识和技能解决问题的实际能力，能在科技、教育、信息产业、经济金融等部门从事研究、教学、应用开发和管理工作的应用型高级专门人才。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	课程结构：数学分析、高等代数、解析几何、常微分方程、离散数学、概率论与数理统计、高级语言程序设计、数据结构、数值分析、算法设计与分析、数据库原理及其应用、运筹学、信息科学基础、计算机网络等，以及根据专业方向设置的选修课程组（目前开设信息管理、信息安全、软件工程、数字图像处理、金融数学、应用统计、科学与工程计算等7个专业方向）。\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;font-size:14pt;color:#222222;font-family:宋体;background-color:#FFFFFF;\">\r\n	授予学位：理学学士\r\n</p>', '0', '网络工程专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识，');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) DEFAULT NULL,
  `headimg` varchar(255) DEFAULT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `truename` varchar(10) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `wxaccount` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `specialties` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', '1', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0', '有一種習', '叶鲲', '1', 'ykp5590514', '2016-12-26 12:45:52', '福建', '漳州', null);
INSERT INTO `user` VALUES ('6', '6', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0', '有一種習慣叫單曲循環', '叶鲲鹏', '1', 'ykp5590514', '2016-12-26 12:45:54', '福建', '漳州', null);
INSERT INTO `user` VALUES ('7', '7', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0', '循環', '叶鲲鹏', '2', 'ykp5590514', '2016-12-26 12:45:57', '福建', '漳州', null);
INSERT INTO `user` VALUES ('8', '8', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0', '有一種習慣叫單', '叶鲲鹏', '1', 'ykp5590514', '2016-12-26 12:46:01', '福建', '漳州', null);
INSERT INTO `user` VALUES ('9', '9', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0', '有一種習', '叶鹏', '1', 'ykp5590514', '2016-12-26 12:46:03', '福建', '漳州', null);
INSERT INTO `user` VALUES ('10', '10', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0', '有一種習', '叶', '2', 'ykp5590514', '2016-12-26 12:46:06', '福建', '漳州', null);
INSERT INTO `user` VALUES ('11', 'odrxFwjfDy7lV0JxFwMQzOors0GE', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzN', 'hahah', '叶锟鹏', '1', 'ykp5590514', '2017-03-08 15:53:55', '福建', '漳州', '13网工');
