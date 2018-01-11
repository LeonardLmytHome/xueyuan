/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xueyuantest

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-11 23:56:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `kq_admin`
-- ----------------------------
DROP TABLE IF EXISTS `kq_admin`;
CREATE TABLE `kq_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL COMMENT '用户名',
  `character_id` int(10) unsigned NOT NULL COMMENT '角色ID',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `addtime` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态1启用0禁用',
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `abs` varchar(255) DEFAULT NULL COMMENT '备注',
  `is_cn77` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of kq_admin
-- ----------------------------
INSERT INTO `kq_admin` VALUES ('1', 'zzcn77', '1', '4766ef201aceba59ff733d42f6d54152', '1472174616', '1', '11111111111', '1@1.com', 'zzcn77', '1', '77');
INSERT INTO `kq_admin` VALUES ('2', 'kuaiqian', '1', '86bd97a59a14ce3948ffcf7c11612b2b', '1498553888', '1', '18638035535', 'kuaiqian@qq.com', '学员快签', '0', '学员快签');

-- ----------------------------
-- Table structure for `kq_carousel`
-- ----------------------------
DROP TABLE IF EXISTS `kq_carousel`;
CREATE TABLE `kq_carousel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL COMMENT '分类',
  `a_id` int(10) NOT NULL COMMENT '文章id',
  `s_id` int(10) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `disable` int(1) NOT NULL DEFAULT '0',
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kq_carousel
-- ----------------------------
INSERT INTO `kq_carousel` VALUES ('6', '9', '1', '32', '/Public/uploads/images/carouselt/25220_233814_4226.png', '哈哈哈', '1', '1515685094');
INSERT INTO `kq_carousel` VALUES ('2', '7', '0', '0', '/Public/uploads/images/carouselt/25220_210042_1406.png', 'csadcsa', '0', '1515675642');
INSERT INTO `kq_carousel` VALUES ('5', '18', '1', '32', '/Public/uploads/images/carouselt/25220_233706_7910.png', '轮播', '1', '1515685026');
INSERT INTO `kq_carousel` VALUES ('4', '7', '0', '31', '/Public/uploads/images/carouselt/25220_231115_2627.png', '差时辰2', '1', '1515682844');
INSERT INTO `kq_carousel` VALUES ('7', '18', '2', '28', '/Public/uploads/images/carouselt/25220_233905_1351.png', '呵呵', '1', '1515685145');

-- ----------------------------
-- Table structure for `kq_carousel_classify`
-- ----------------------------
DROP TABLE IF EXISTS `kq_carousel_classify`;
CREATE TABLE `kq_carousel_classify` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL,
  `disable` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kq_carousel_classify
-- ----------------------------
INSERT INTO `kq_carousel_classify` VALUES ('15', '添加数据', '1515596247', '1');
INSERT INTO `kq_carousel_classify` VALUES ('7', '测试1', '0', '1');
INSERT INTO `kq_carousel_classify` VALUES ('8', '测试1', '0', '1');
INSERT INTO `kq_carousel_classify` VALUES ('9', '测试1', '1515596662', '0');
INSERT INTO `kq_carousel_classify` VALUES ('12', 'cscsacs', '1515596674', '1');
INSERT INTO `kq_carousel_classify` VALUES ('18', '测试232', '1515596290', '0');
INSERT INTO `kq_carousel_classify` VALUES ('19', '时间', '1515596850', '0');

-- ----------------------------
-- Table structure for `kq_character`
-- ----------------------------
DROP TABLE IF EXISTS `kq_character`;
CREATE TABLE `kq_character` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `character` varchar(100) NOT NULL COMMENT '角色',
  `rights` text COMMENT '权限字段',
  `is_root` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0超级管理员1其他管理员',
  `description` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
-- Records of kq_character
-- ----------------------------
INSERT INTO `kq_character` VALUES ('1', '超级管理员', null, '0', '最大权限用户');
INSERT INTO `kq_character` VALUES ('13', '普通管理员', 'user-edit,user-index,user-detail,cate-add,goods-status,cate-del,goods-edit,pic-uploadify,pic-edit,pic-file_upload_del,cate-edit,goods-index,goods-log,goods-desc,cate-index,goods-status,news-add,news-cateadd,news-edit,news-cateedit,cuxiao-add,cuxiao-del,cuxiao-edit,cuxiao-index,cuxiao-tui,Index-index,Index-welcome1', '1', '普通管理员');

-- ----------------------------
-- Table structure for `kq_config`
-- ----------------------------
DROP TABLE IF EXISTS `kq_config`;
CREATE TABLE `kq_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_name` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `description` text COMMENT '描述',
  `phone` varchar(50) DEFAULT NULL COMMENT '固定电话',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `icp` varchar(100) DEFAULT NULL COMMENT '备案号',
  `copyright` varchar(100) DEFAULT NULL COMMENT '版权',
  `address` varchar(255) DEFAULT NULL COMMENT '公司地址',
  `postcode` varchar(100) DEFAULT NULL COMMENT '邮编',
  `sms_name` varchar(255) DEFAULT NULL COMMENT '短信配置name',
  `sms_pwd` varchar(255) DEFAULT NULL COMMENT '短信配置密码',
  `config_pic` varchar(255) DEFAULT NULL COMMENT '系统logo',
  `banner_color` varchar(255) DEFAULT NULL COMMENT '轮播图背景色',
  `tui_reg_point` int(11) DEFAULT NULL COMMENT '注册获取',
  `weixin` varchar(255) DEFAULT NULL COMMENT '客服qq',
  `dui_jifen` int(11) DEFAULT NULL COMMENT '1块钱兑换多少积分',
  `app_code_day` int(11) DEFAULT NULL COMMENT '验证码z增加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

-- ----------------------------
-- Records of kq_config
-- ----------------------------
INSERT INTO `kq_config` VALUES ('1', '学员快签APP-后台管理系统', '学员快签APP-后台管理系统', '学员快签APP-后台管理系统', '18638035535', 'ldcom@163.com', '豫ICP备17028773', '财富指南针-后台管理系统版权所有Copyright ©2015 All Rights Reserved', '财富指南针-后台管理系统13层1325室', '314000', 'chenqiandiansang', 'wAQBPxk3', '/Public/uploads/images/logo/59c0c72f3b538.png', null, '10000', 'wx_ldns', '10', '365');

-- ----------------------------
-- Table structure for `kq_equip`
-- ----------------------------
DROP TABLE IF EXISTS `kq_equip`;
CREATE TABLE `kq_equip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '激活码',
  `add_time` int(10) unsigned DEFAULT NULL,
  `stu` int(11) DEFAULT '2' COMMENT '1是未激活2已激活',
  `over_time` int(11) DEFAULT NULL COMMENT '到期时间',
  `user_name` varchar(255) DEFAULT NULL COMMENT '教学点名称',
  `tel` varchar(30) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `update_time` int(11) DEFAULT '0' COMMENT '上次更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of kq_equip
-- ----------------------------

-- ----------------------------
-- Table structure for `kq_site`
-- ----------------------------
DROP TABLE IF EXISTS `kq_site`;
CREATE TABLE `kq_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '教学点名称',
  `principal` varchar(255) DEFAULT NULL COMMENT '负责人',
  `tel` varchar(15) DEFAULT NULL COMMENT '联系方式',
  `account` varchar(255) DEFAULT NULL COMMENT '账户',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `add_time` varchar(255) DEFAULT NULL COMMENT '添加时间',
  `save_time` varchar(255) DEFAULT NULL COMMENT '修改时间',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kq_site
-- ----------------------------
INSERT INTO `kq_site` VALUES ('33', 'CSE轮滑俱乐部-格林小城', '梁宇', '18675229030', 'glxc9030', '14e1b600b1fd579f47433b88e8d85291', '1514990106', '1514990106', '1');
INSERT INTO `kq_site` VALUES ('31', 'CSE轮滑俱乐部-凯旋国际', '梁晓宁', '13138899148', 'kxgj1313', '14e1b600b1fd579f47433b88e8d85291', '1514605762', '1514605762', '1');
INSERT INTO `kq_site` VALUES ('32', '哈尔滨轮滑教学点', '张予', '18904617543', 'zy7543', '14e1b600b1fd579f47433b88e8d85291', '1514967643', '1514967643', '1');
INSERT INTO `kq_site` VALUES ('28', '深圳蓝天轮滑俱乐部', '王倩倩', '13539792080', 'zzcn77', '14e1b600b1fd579f47433b88e8d85291', '1510195918', '1514658853', '1');

-- ----------------------------
-- Table structure for `kq_user`
-- ----------------------------
DROP TABLE IF EXISTS `kq_user`;
CREATE TABLE `kq_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL COMMENT '学员编号',
  `name` varchar(255) NOT NULL COMMENT '学员姓名',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '学员性别 1男 2女',
  `age` tinyint(4) NOT NULL COMMENT '年龄',
  `tel` varchar(11) NOT NULL COMMENT '联系电话',
  `sid` int(11) NOT NULL COMMENT '教学点id',
  `total_hours` tinyint(4) NOT NULL COMMENT '总课时',
  `shang_hours` tinyint(4) NOT NULL DEFAULT '0' COMMENT '上课次数',
  `sheng_hours` tinyint(4) NOT NULL COMMENT '剩余课时',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '学员状态，1正常 2删除',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `savetime` int(11) NOT NULL COMMENT '修改时间',
  `start_time` int(11) NOT NULL COMMENT '有效期开始时间',
  `end_time` int(11) NOT NULL COMMENT '有效期结束时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of kq_user
-- ----------------------------
INSERT INTO `kq_user` VALUES ('1', '12', '12', '1', '50', '13539792080', '28', '100', '63', '-59', '2', '1509433873', '1509633873', '1509433873', '1609439973');
INSERT INTO `kq_user` VALUES ('2', 'ockav0l8kk', 'zhansan', '1', '10', '18218455454', '28', '36', '0', '36', '2', '1510902189', '1510904932', '1510902175', '1511852579');
INSERT INTO `kq_user` VALUES ('3', 'c3cuxl6uxg', '美媚', '1', '20', '18264349546', '28', '46', '0', '46', '2', '1510904564', '1510904564', '1510904555', '1512027756');
INSERT INTO `kq_user` VALUES ('4', 'kv37b0j76m', '摸摸', '1', '27', '18218526855', '28', '52', '0', '52', '2', '1510904764', '1510904967', '1510904755', '1511855157');
INSERT INTO `kq_user` VALUES ('5', 'nwwmh10ahf', '', '0', '0', '', '0', '0', '0', '0', '1', '1510905379', '1510905379', '0', '0');
INSERT INTO `kq_user` VALUES ('6', 'ssirpf9376', '莫伊拉', '2', '17', '18218862626', '28', '63', '0', '63', '2', '1510906268', '1510906268', '1510906262', '1511424663');
INSERT INTO `kq_user` VALUES ('7', '53z9tlqfrg', '莫总', '1', '11', '18662694666', '28', '63', '1', '62', '2', '1510906470', '1510906470', '1510906465', '1510992866');
INSERT INTO `kq_user` VALUES ('8', '530p25481g', '张学友', '2', '38', '13539792080', '28', '100', '1', '99', '2', '1511143110', '1511143110', '1511143081', '1511229483');
INSERT INTO `kq_user` VALUES ('9', 'k0sa2a9dbn', '好纠结', '2', '15', '18818749473', '28', '5', '0', '5', '2', '1511144588', '1511144588', '1513736555', '1576808584');
INSERT INTO `kq_user` VALUES ('10', '0ybvfresqg', '果果', '1', '4', '13686053357', '0', '15', '0', '15', '1', '1514661078', '1514661078', '1514661070', '1546197073');
INSERT INTO `kq_user` VALUES ('11', 'pbl98kxyix', '果果', '1', '15', '13135567484', '0', '4', '0', '4', '1', '1514661119', '1514661119', '1514661113', '1577733115');
INSERT INTO `kq_user` VALUES ('12', 'aux94wsb2m', '六月', '1', '15', '13154876486', '0', '25', '0', '25', '1', '1514661215', '1514661215', '1514661203', '1546197205');
INSERT INTO `kq_user` VALUES ('13', 'tzg2dz7m2a', '李鑫', '2', '5', '18676981616', '0', '24', '0', '24', '1', '1514880131', '1514968278', '1514880115', '1525161717');
INSERT INTO `kq_user` VALUES ('14', '1rbo5j37hr', '蒋楚煊', '2', '4', '15920298853', '31', '24', '1', '23', '1', '1514965649', '1514965649', '1514965635', '1530604044');
INSERT INTO `kq_user` VALUES ('15', 'bxhhk76osn', '测试学员', '2', '3', '13132457638', '32', '5', '1', '4', '1', '1514967943', '1514967943', '1514967937', '1517646338');
INSERT INTO `kq_user` VALUES ('16', 'g5fi1hr658', '李鑫', '2', '5', '18676981616', '0', '24', '0', '24', '1', '1514969135', '1514969887', '1514969124', '1540889126');
INSERT INTO `kq_user` VALUES ('17', 'ov6g85saqk', '刘茹文', '1', '6', '13412456265', '31', '20', '0', '20', '1', '1514989080', '1514989080', '1514989072', '1528035474');
INSERT INTO `kq_user` VALUES ('18', 'fue1r3rlvr', '梁泽桐', '2', '5', '13450081232', '31', '35', '0', '35', '1', '1514989127', '1514989127', '1514989118', '1525357123');
INSERT INTO `kq_user` VALUES ('19', 'ofbcskpwib', '赵紫涵', '1', '5', '13553896519', '31', '15', '1', '14', '1', '1514989175', '1514989175', '1514989166', '1525357170');
INSERT INTO `kq_user` VALUES ('20', 'a27zehbvdv', '朱浩宇高级', '2', '5', '13686624883', '31', '30', '0', '30', '1', '1514989248', '1514989248', '1514989241', '1533306043');
INSERT INTO `kq_user` VALUES ('21', 'ucs5slov06', '李鑫高级', '1', '5', '18676981616', '31', '24', '0', '24', '1', '1514989295', '1514989295', '1514989282', '1528035684');
INSERT INTO `kq_user` VALUES ('22', 'f4lmzrqkmc', '解家轩', '2', '3', '18688692947', '31', '46', '0', '46', '1', '1514989492', '1514989492', '1514989480', '1528035881');
INSERT INTO `kq_user` VALUES ('23', 'bfywgcpjwu', '贾辰彦', '2', '6', '15817504631', '31', '8', '2', '6', '1', '1514989625', '1514989625', '1514989617', '1528036018');
INSERT INTO `kq_user` VALUES ('24', '6vp7kksqpv', '叶泳斐', '1', '5', '13622625396', '31', '5', '0', '5', '1', '1514989960', '1514989960', '1514989952', '1528036355');
INSERT INTO `kq_user` VALUES ('25', 'ys4f5bjfuy', '张博乔', '2', '3', '18688693265', '31', '7', '1', '6', '1', '1514991098', '1514991098', '1514991089', '1528037492');
INSERT INTO `kq_user` VALUES ('26', 'ge3clavsbc', '陈泳颖', '1', '8', '13138899148', '33', '20', '2', '18', '1', '1514993317', '1514993317', '1514993309', '1546269871');
INSERT INTO `kq_user` VALUES ('27', '11qvenn2yp', '胡艺歆', '2', '5', '13138899148', '0', '21', '0', '21', '1', '1514993499', '1514993738', '1514993478', '1546529481');
INSERT INTO `kq_user` VALUES ('28', 'a6iof4dkuw', '胡艺歆', '1', '5', '13138899148', '33', '21', '0', '21', '1', '1514993870', '1514993870', '1514993867', '1546529869');
INSERT INTO `kq_user` VALUES ('29', 'rj5h1me0k0', '刘沄辰', '2', '5', '13138899148', '33', '20', '0', '20', '1', '1514993949', '1514993949', '1514993940', '1546529947');
INSERT INTO `kq_user` VALUES ('30', 'jrf1b15hfz', '冯欣然', '1', '8', '13138899148', '33', '20', '9', '11', '1', '1514994041', '1514994041', '1514994038', '1546530040');
INSERT INTO `kq_user` VALUES ('31', 'q0rc1krf7f', '蓝一新', '2', '4', '13138899148', '33', '15', '1', '14', '1', '1514994087', '1514994087', '1514994084', '1546530085');
INSERT INTO `kq_user` VALUES ('32', 'oqt48cfbud', '全芸熙', '2', '5', '13138899148', '0', '30', '0', '30', '1', '1514994167', '1514994196', '1514994164', '1546530166');
INSERT INTO `kq_user` VALUES ('33', 'd30c7hrf43', '全芸熙', '1', '5', '13138899148', '33', '30', '10', '20', '1', '1514994388', '1514994388', '1514994384', '1546530386');
INSERT INTO `kq_user` VALUES ('34', 'c0i9stpiop', '全建熙', '2', '5', '13138899148', '33', '30', '10', '20', '1', '1514994434', '1514994434', '1514994430', '1546530432');
INSERT INTO `kq_user` VALUES ('35', '7fbb7hmnnf', '李云龙', '2', '4', '13138899148', '33', '20', '11', '9', '1', '1514994494', '1514994494', '1514994492', '1546530493');
INSERT INTO `kq_user` VALUES ('36', '2lwoh97ng5', '谢一凡', '2', '5', '13138899148', '33', '35', '4', '31', '1', '1514994537', '1514994537', '1514994531', '1546530534');
INSERT INTO `kq_user` VALUES ('37', '6vcl785ump', '陈曦露', '1', '5', '13138899148', '33', '25', '8', '17', '1', '1514994584', '1514994584', '1514994579', '1546530581');
INSERT INTO `kq_user` VALUES ('38', 'nw2khut6tp', '汤柔嘉', '1', '4', '13138899148', '33', '35', '0', '35', '2', '1514994616', '1514994616', '1514994612', '1546530615');
INSERT INTO `kq_user` VALUES ('39', 'b8oomv7ps7', '汤柔嘉', '1', '4', '13138899148', '33', '40', '11', '29', '1', '1514994702', '1514994702', '1514994692', '1546530693');
INSERT INTO `kq_user` VALUES ('40', 'p2fgspvdxa', '曾彦渤', '2', '4', '13138899148', '33', '20', '1', '19', '1', '1514994773', '1514994773', '1514994768', '1546530770');
INSERT INTO `kq_user` VALUES ('41', 'a2ljohhjws', '沈朗', '2', '5', '13138899148', '33', '20', '14', '6', '1', '1514994808', '1514994808', '1514994804', '1546530806');
INSERT INTO `kq_user` VALUES ('42', 'a14om0g5rj', '何恩兆', '2', '4', '13138899148', '33', '15', '4', '11', '1', '1514994852', '1514994852', '1514994848', '1546530849');
INSERT INTO `kq_user` VALUES ('43', 'ud4lbb6xky', '何恩瑞', '2', '5', '13138899148', '33', '15', '6', '9', '1', '1514994878', '1514994878', '1514994875', '1546530877');
INSERT INTO `kq_user` VALUES ('44', 'fgfnbgtd3k', '何彦熙', '1', '4', '13138899148', '33', '28', '8', '20', '1', '1514994929', '1514994929', '1514994925', '1546530926');
INSERT INTO `kq_user` VALUES ('45', 'x7gosqnaxb', '何彦皓', '2', '4', '13138899148', '33', '28', '8', '20', '1', '1514994963', '1514994963', '1514994961', '1546530962');
INSERT INTO `kq_user` VALUES ('46', '4gvbjn2iew', '杨尊文', '2', '5', '13138899148', '33', '28', '15', '13', '1', '1514995011', '1514995011', '1514995008', '1546531010');
INSERT INTO `kq_user` VALUES ('47', 'q9p8ifkqjg', '李心瑜', '1', '4', '13138899148', '33', '25', '7', '18', '1', '1514995061', '1514995061', '1514995058', '1546531060');
INSERT INTO `kq_user` VALUES ('48', 's1gph8okw8', '熊嘉萱', '1', '4', '13138899148', '33', '25', '4', '21', '1', '1514995109', '1514995109', '1514995106', '1546531108');
INSERT INTO `kq_user` VALUES ('49', 'lv787pr2yr', '张初荷', '1', '5', '13138899148', '33', '15', '3', '12', '1', '1514995150', '1514995150', '1514995146', '1546531147');
INSERT INTO `kq_user` VALUES ('50', 'bqby48zw6y', '陈骏菘', '2', '5', '13138899148', '33', '16', '11', '5', '1', '1514995204', '1514995204', '1514995201', '1546531203');
INSERT INTO `kq_user` VALUES ('51', '8jtd4k5z94', '陈沿至', '2', '7', '13138899148', '33', '45', '24', '21', '1', '1514995288', '1514995288', '1514995285', '1546531286');
INSERT INTO `kq_user` VALUES ('52', '6stcfcl9r5', '陈沿帆', '2', '9', '13138899148', '33', '45', '27', '18', '1', '1514995345', '1514995345', '1514995342', '1546531344');
INSERT INTO `kq_user` VALUES ('53', 'rfdu0sr1lj', '吕云桐', '1', '4', '13138899148', '33', '20', '11', '9', '1', '1514995421', '1514995421', '1514995418', '1546531420');
INSERT INTO `kq_user` VALUES ('54', 'h4o84vbf5b', '小宇', '2', '8', '13138899148', '33', '25', '11', '14', '1', '1514995472', '1514995472', '1514995469', '1546531470');
INSERT INTO `kq_user` VALUES ('55', 'rkifcqo8eb', '王敏敏', '1', '5', '13138899148', '33', '35', '19', '16', '1', '1514995515', '1514995515', '1514995512', '1546531513');
INSERT INTO `kq_user` VALUES ('56', 'ozycux19ir', '曾昱菲', '1', '5', '13138899148', '33', '30', '0', '30', '2', '1514995613', '1514995613', '1514995610', '1546531612');
INSERT INTO `kq_user` VALUES ('57', 'ea2o12m4og', '陈铄', '2', '4', '13138899148', '33', '35', '15', '20', '1', '1514995668', '1514995668', '1514995663', '1546531666');
INSERT INTO `kq_user` VALUES ('58', '90fyxjkw5e', '果果', '1', '5', '13138899148', '33', '20', '9', '11', '1', '1514995702', '1514995702', '1514995700', '1546531701');
INSERT INTO `kq_user` VALUES ('59', 'qkjz7mcfpc', '郑丝予', '1', '5', '13138899148', '33', '25', '5', '20', '1', '1514995775', '1514995775', '1514995764', '1546531765');
INSERT INTO `kq_user` VALUES ('60', 'aiaviifpaa', '曾昱菲', '1', '5', '13138899148', '33', '50', '12', '38', '1', '1514998222', '1514998222', '1514998220', '1546534221');
INSERT INTO `kq_user` VALUES ('61', 'n8o3u51jse', '钟守立', '2', '6', '13138899148', '33', '25', '14', '11', '1', '1514998550', '1514998550', '1514998547', '1546534548');
INSERT INTO `kq_user` VALUES ('62', 'r7a7isgrdc', '测试', '1', '15', '13134578466', '0', '30', '0', '30', '1', '1515071349', '1515071377', '1515071345', '1516367347');
INSERT INTO `kq_user` VALUES ('63', 'e8ndzvk8sf', '测试', '1', '16', '13539792080', '0', '80', '0', '80', '1', '1515322635', '1515390212', '1515322627', '1544180231');

-- ----------------------------
-- Table structure for `kq_user_log`
-- ----------------------------
DROP TABLE IF EXISTS `kq_user_log`;
CREATE TABLE `kq_user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `addtime` int(11) NOT NULL COMMENT '签到时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8 COMMENT='验证码生成';

-- ----------------------------
-- Records of kq_user_log
-- ----------------------------
INSERT INTO `kq_user_log` VALUES ('1', '1', '1510826673');
INSERT INTO `kq_user_log` VALUES ('2', '1', '1510826848');
INSERT INTO `kq_user_log` VALUES ('3', '1', '1510827202');
INSERT INTO `kq_user_log` VALUES ('4', '1', '1510902988');
INSERT INTO `kq_user_log` VALUES ('5', '1', '1510903869');
INSERT INTO `kq_user_log` VALUES ('6', '1', '1510903956');
INSERT INTO `kq_user_log` VALUES ('7', '1', '1510904217');
INSERT INTO `kq_user_log` VALUES ('8', '1', '1510904416');
INSERT INTO `kq_user_log` VALUES ('9', '1', '1510905268');
INSERT INTO `kq_user_log` VALUES ('10', '1', '1510905800');
INSERT INTO `kq_user_log` VALUES ('11', '1', '1510905805');
INSERT INTO `kq_user_log` VALUES ('12', '1', '1510905926');
INSERT INTO `kq_user_log` VALUES ('13', '1', '1510906040');
INSERT INTO `kq_user_log` VALUES ('14', '8', '1511143493');
INSERT INTO `kq_user_log` VALUES ('15', '7', '1511159610');
INSERT INTO `kq_user_log` VALUES ('16', '15', '1514969166');
INSERT INTO `kq_user_log` VALUES ('17', '26', '1514996011');
INSERT INTO `kq_user_log` VALUES ('18', '30', '1514996032');
INSERT INTO `kq_user_log` VALUES ('19', '30', '1514996039');
INSERT INTO `kq_user_log` VALUES ('20', '30', '1514996053');
INSERT INTO `kq_user_log` VALUES ('21', '30', '1514996067');
INSERT INTO `kq_user_log` VALUES ('22', '30', '1514996081');
INSERT INTO `kq_user_log` VALUES ('23', '30', '1514996088');
INSERT INTO `kq_user_log` VALUES ('24', '30', '1514996096');
INSERT INTO `kq_user_log` VALUES ('25', '30', '1514996103');
INSERT INTO `kq_user_log` VALUES ('26', '30', '1514996109');
INSERT INTO `kq_user_log` VALUES ('27', '31', '1514996118');
INSERT INTO `kq_user_log` VALUES ('28', '34', '1514996136');
INSERT INTO `kq_user_log` VALUES ('29', '34', '1514996148');
INSERT INTO `kq_user_log` VALUES ('30', '34', '1514996160');
INSERT INTO `kq_user_log` VALUES ('31', '34', '1514996176');
INSERT INTO `kq_user_log` VALUES ('32', '34', '1514996182');
INSERT INTO `kq_user_log` VALUES ('33', '34', '1514996188');
INSERT INTO `kq_user_log` VALUES ('34', '34', '1514996194');
INSERT INTO `kq_user_log` VALUES ('35', '34', '1514996200');
INSERT INTO `kq_user_log` VALUES ('36', '34', '1514996208');
INSERT INTO `kq_user_log` VALUES ('37', '34', '1514996218');
INSERT INTO `kq_user_log` VALUES ('38', '33', '1514996234');
INSERT INTO `kq_user_log` VALUES ('39', '33', '1514996247');
INSERT INTO `kq_user_log` VALUES ('40', '33', '1514996253');
INSERT INTO `kq_user_log` VALUES ('41', '33', '1514996258');
INSERT INTO `kq_user_log` VALUES ('42', '33', '1514996263');
INSERT INTO `kq_user_log` VALUES ('43', '33', '1514996270');
INSERT INTO `kq_user_log` VALUES ('44', '33', '1514996274');
INSERT INTO `kq_user_log` VALUES ('45', '33', '1514996282');
INSERT INTO `kq_user_log` VALUES ('46', '33', '1514996289');
INSERT INTO `kq_user_log` VALUES ('47', '33', '1514996296');
INSERT INTO `kq_user_log` VALUES ('48', '26', '1514996309');
INSERT INTO `kq_user_log` VALUES ('49', '35', '1514996385');
INSERT INTO `kq_user_log` VALUES ('50', '35', '1514996398');
INSERT INTO `kq_user_log` VALUES ('51', '35', '1514996407');
INSERT INTO `kq_user_log` VALUES ('52', '35', '1514996412');
INSERT INTO `kq_user_log` VALUES ('53', '35', '1514996418');
INSERT INTO `kq_user_log` VALUES ('54', '35', '1514996433');
INSERT INTO `kq_user_log` VALUES ('55', '35', '1514996437');
INSERT INTO `kq_user_log` VALUES ('56', '35', '1514996447');
INSERT INTO `kq_user_log` VALUES ('57', '35', '1514996454');
INSERT INTO `kq_user_log` VALUES ('58', '35', '1514996461');
INSERT INTO `kq_user_log` VALUES ('59', '35', '1514996476');
INSERT INTO `kq_user_log` VALUES ('60', '36', '1514996488');
INSERT INTO `kq_user_log` VALUES ('61', '36', '1514996496');
INSERT INTO `kq_user_log` VALUES ('62', '36', '1514996509');
INSERT INTO `kq_user_log` VALUES ('63', '36', '1514996516');
INSERT INTO `kq_user_log` VALUES ('64', '37', '1514996532');
INSERT INTO `kq_user_log` VALUES ('65', '37', '1514996542');
INSERT INTO `kq_user_log` VALUES ('66', '37', '1514996550');
INSERT INTO `kq_user_log` VALUES ('67', '37', '1514996556');
INSERT INTO `kq_user_log` VALUES ('68', '37', '1514996562');
INSERT INTO `kq_user_log` VALUES ('69', '37', '1514996567');
INSERT INTO `kq_user_log` VALUES ('70', '37', '1514996574');
INSERT INTO `kq_user_log` VALUES ('71', '37', '1514996582');
INSERT INTO `kq_user_log` VALUES ('72', '39', '1514996605');
INSERT INTO `kq_user_log` VALUES ('73', '39', '1514996612');
INSERT INTO `kq_user_log` VALUES ('74', '39', '1514996619');
INSERT INTO `kq_user_log` VALUES ('75', '39', '1514996637');
INSERT INTO `kq_user_log` VALUES ('76', '39', '1514996645');
INSERT INTO `kq_user_log` VALUES ('77', '39', '1514996651');
INSERT INTO `kq_user_log` VALUES ('78', '39', '1514996661');
INSERT INTO `kq_user_log` VALUES ('79', '39', '1514996667');
INSERT INTO `kq_user_log` VALUES ('80', '39', '1514996693');
INSERT INTO `kq_user_log` VALUES ('81', '39', '1514996699');
INSERT INTO `kq_user_log` VALUES ('82', '39', '1514996706');
INSERT INTO `kq_user_log` VALUES ('83', '40', '1514996718');
INSERT INTO `kq_user_log` VALUES ('84', '41', '1514996733');
INSERT INTO `kq_user_log` VALUES ('85', '41', '1514996742');
INSERT INTO `kq_user_log` VALUES ('86', '41', '1514996749');
INSERT INTO `kq_user_log` VALUES ('87', '41', '1514996758');
INSERT INTO `kq_user_log` VALUES ('88', '41', '1514996767');
INSERT INTO `kq_user_log` VALUES ('89', '41', '1514996773');
INSERT INTO `kq_user_log` VALUES ('90', '41', '1514996779');
INSERT INTO `kq_user_log` VALUES ('91', '41', '1514996786');
INSERT INTO `kq_user_log` VALUES ('92', '41', '1514996791');
INSERT INTO `kq_user_log` VALUES ('93', '41', '1514996796');
INSERT INTO `kq_user_log` VALUES ('94', '41', '1514996803');
INSERT INTO `kq_user_log` VALUES ('95', '41', '1514996810');
INSERT INTO `kq_user_log` VALUES ('96', '41', '1514996814');
INSERT INTO `kq_user_log` VALUES ('97', '41', '1514996820');
INSERT INTO `kq_user_log` VALUES ('98', '42', '1514996832');
INSERT INTO `kq_user_log` VALUES ('99', '42', '1514996837');
INSERT INTO `kq_user_log` VALUES ('100', '42', '1514996842');
INSERT INTO `kq_user_log` VALUES ('101', '42', '1514996847');
INSERT INTO `kq_user_log` VALUES ('102', '43', '1514996859');
INSERT INTO `kq_user_log` VALUES ('103', '43', '1514996863');
INSERT INTO `kq_user_log` VALUES ('104', '43', '1514996868');
INSERT INTO `kq_user_log` VALUES ('105', '43', '1514996875');
INSERT INTO `kq_user_log` VALUES ('106', '43', '1514996880');
INSERT INTO `kq_user_log` VALUES ('107', '43', '1514996886');
INSERT INTO `kq_user_log` VALUES ('108', '44', '1514996897');
INSERT INTO `kq_user_log` VALUES ('109', '44', '1514996903');
INSERT INTO `kq_user_log` VALUES ('110', '44', '1514996908');
INSERT INTO `kq_user_log` VALUES ('111', '44', '1514996912');
INSERT INTO `kq_user_log` VALUES ('112', '44', '1514996917');
INSERT INTO `kq_user_log` VALUES ('113', '44', '1514996922');
INSERT INTO `kq_user_log` VALUES ('114', '44', '1514996926');
INSERT INTO `kq_user_log` VALUES ('115', '44', '1514996931');
INSERT INTO `kq_user_log` VALUES ('116', '45', '1514996941');
INSERT INTO `kq_user_log` VALUES ('117', '45', '1514996946');
INSERT INTO `kq_user_log` VALUES ('118', '45', '1514996951');
INSERT INTO `kq_user_log` VALUES ('119', '45', '1514996955');
INSERT INTO `kq_user_log` VALUES ('120', '45', '1514996960');
INSERT INTO `kq_user_log` VALUES ('121', '45', '1514996965');
INSERT INTO `kq_user_log` VALUES ('122', '45', '1514996970');
INSERT INTO `kq_user_log` VALUES ('123', '45', '1514996974');
INSERT INTO `kq_user_log` VALUES ('124', '46', '1514996985');
INSERT INTO `kq_user_log` VALUES ('125', '46', '1514996991');
INSERT INTO `kq_user_log` VALUES ('126', '46', '1514996996');
INSERT INTO `kq_user_log` VALUES ('127', '46', '1514997001');
INSERT INTO `kq_user_log` VALUES ('128', '46', '1514997006');
INSERT INTO `kq_user_log` VALUES ('129', '46', '1514997011');
INSERT INTO `kq_user_log` VALUES ('130', '46', '1514997015');
INSERT INTO `kq_user_log` VALUES ('131', '46', '1514997019');
INSERT INTO `kq_user_log` VALUES ('132', '46', '1514997024');
INSERT INTO `kq_user_log` VALUES ('133', '46', '1514997033');
INSERT INTO `kq_user_log` VALUES ('134', '46', '1514997037');
INSERT INTO `kq_user_log` VALUES ('135', '46', '1514997042');
INSERT INTO `kq_user_log` VALUES ('136', '46', '1514997047');
INSERT INTO `kq_user_log` VALUES ('137', '46', '1514997052');
INSERT INTO `kq_user_log` VALUES ('138', '46', '1514997057');
INSERT INTO `kq_user_log` VALUES ('139', '47', '1514997084');
INSERT INTO `kq_user_log` VALUES ('140', '47', '1514997091');
INSERT INTO `kq_user_log` VALUES ('141', '47', '1514997096');
INSERT INTO `kq_user_log` VALUES ('142', '47', '1514997106');
INSERT INTO `kq_user_log` VALUES ('143', '47', '1514997117');
INSERT INTO `kq_user_log` VALUES ('144', '47', '1514997124');
INSERT INTO `kq_user_log` VALUES ('145', '47', '1514997129');
INSERT INTO `kq_user_log` VALUES ('146', '48', '1514997151');
INSERT INTO `kq_user_log` VALUES ('147', '48', '1514997158');
INSERT INTO `kq_user_log` VALUES ('148', '48', '1514997163');
INSERT INTO `kq_user_log` VALUES ('149', '48', '1514997169');
INSERT INTO `kq_user_log` VALUES ('150', '49', '1514997222');
INSERT INTO `kq_user_log` VALUES ('151', '49', '1514997228');
INSERT INTO `kq_user_log` VALUES ('152', '49', '1514997233');
INSERT INTO `kq_user_log` VALUES ('153', '50', '1514997266');
INSERT INTO `kq_user_log` VALUES ('154', '50', '1514997273');
INSERT INTO `kq_user_log` VALUES ('155', '50', '1514997279');
INSERT INTO `kq_user_log` VALUES ('156', '50', '1514997283');
INSERT INTO `kq_user_log` VALUES ('157', '50', '1514997291');
INSERT INTO `kq_user_log` VALUES ('158', '50', '1514997297');
INSERT INTO `kq_user_log` VALUES ('159', '50', '1514997304');
INSERT INTO `kq_user_log` VALUES ('160', '50', '1514997309');
INSERT INTO `kq_user_log` VALUES ('161', '50', '1514997316');
INSERT INTO `kq_user_log` VALUES ('162', '50', '1514997321');
INSERT INTO `kq_user_log` VALUES ('163', '50', '1514997328');
INSERT INTO `kq_user_log` VALUES ('164', '51', '1514997356');
INSERT INTO `kq_user_log` VALUES ('165', '51', '1514997360');
INSERT INTO `kq_user_log` VALUES ('166', '51', '1514997365');
INSERT INTO `kq_user_log` VALUES ('167', '51', '1514997369');
INSERT INTO `kq_user_log` VALUES ('168', '51', '1514997379');
INSERT INTO `kq_user_log` VALUES ('169', '51', '1514997383');
INSERT INTO `kq_user_log` VALUES ('170', '51', '1514997387');
INSERT INTO `kq_user_log` VALUES ('171', '51', '1514997392');
INSERT INTO `kq_user_log` VALUES ('172', '51', '1514997396');
INSERT INTO `kq_user_log` VALUES ('173', '51', '1514997400');
INSERT INTO `kq_user_log` VALUES ('174', '51', '1514997405');
INSERT INTO `kq_user_log` VALUES ('175', '51', '1514997409');
INSERT INTO `kq_user_log` VALUES ('176', '51', '1514997413');
INSERT INTO `kq_user_log` VALUES ('177', '51', '1514997417');
INSERT INTO `kq_user_log` VALUES ('178', '51', '1514997420');
INSERT INTO `kq_user_log` VALUES ('179', '51', '1514997425');
INSERT INTO `kq_user_log` VALUES ('180', '51', '1514997429');
INSERT INTO `kq_user_log` VALUES ('181', '51', '1514997433');
INSERT INTO `kq_user_log` VALUES ('182', '51', '1514997438');
INSERT INTO `kq_user_log` VALUES ('183', '51', '1514997442');
INSERT INTO `kq_user_log` VALUES ('184', '51', '1514997448');
INSERT INTO `kq_user_log` VALUES ('185', '51', '1514997465');
INSERT INTO `kq_user_log` VALUES ('186', '51', '1514997477');
INSERT INTO `kq_user_log` VALUES ('187', '51', '1514997483');
INSERT INTO `kq_user_log` VALUES ('188', '52', '1514997520');
INSERT INTO `kq_user_log` VALUES ('189', '52', '1514997525');
INSERT INTO `kq_user_log` VALUES ('190', '52', '1514997529');
INSERT INTO `kq_user_log` VALUES ('191', '52', '1514997533');
INSERT INTO `kq_user_log` VALUES ('192', '52', '1514997538');
INSERT INTO `kq_user_log` VALUES ('193', '52', '1514997542');
INSERT INTO `kq_user_log` VALUES ('194', '52', '1514997545');
INSERT INTO `kq_user_log` VALUES ('195', '52', '1514997550');
INSERT INTO `kq_user_log` VALUES ('196', '52', '1514997554');
INSERT INTO `kq_user_log` VALUES ('197', '52', '1514997559');
INSERT INTO `kq_user_log` VALUES ('198', '52', '1514997563');
INSERT INTO `kq_user_log` VALUES ('199', '52', '1514997567');
INSERT INTO `kq_user_log` VALUES ('200', '52', '1514997572');
INSERT INTO `kq_user_log` VALUES ('201', '52', '1514997576');
INSERT INTO `kq_user_log` VALUES ('202', '52', '1514997580');
INSERT INTO `kq_user_log` VALUES ('203', '52', '1514997584');
INSERT INTO `kq_user_log` VALUES ('204', '52', '1514997588');
INSERT INTO `kq_user_log` VALUES ('205', '52', '1514997592');
INSERT INTO `kq_user_log` VALUES ('206', '52', '1514997596');
INSERT INTO `kq_user_log` VALUES ('207', '52', '1514997600');
INSERT INTO `kq_user_log` VALUES ('208', '52', '1514997605');
INSERT INTO `kq_user_log` VALUES ('209', '52', '1514997609');
INSERT INTO `kq_user_log` VALUES ('210', '52', '1514997613');
INSERT INTO `kq_user_log` VALUES ('211', '52', '1514997617');
INSERT INTO `kq_user_log` VALUES ('212', '52', '1514997621');
INSERT INTO `kq_user_log` VALUES ('213', '52', '1514997627');
INSERT INTO `kq_user_log` VALUES ('214', '52', '1514997631');
INSERT INTO `kq_user_log` VALUES ('215', '53', '1514997660');
INSERT INTO `kq_user_log` VALUES ('216', '53', '1514997664');
INSERT INTO `kq_user_log` VALUES ('217', '53', '1514997671');
INSERT INTO `kq_user_log` VALUES ('218', '53', '1514997674');
INSERT INTO `kq_user_log` VALUES ('219', '53', '1514997678');
INSERT INTO `kq_user_log` VALUES ('220', '53', '1514997683');
INSERT INTO `kq_user_log` VALUES ('221', '53', '1514997686');
INSERT INTO `kq_user_log` VALUES ('222', '53', '1514997691');
INSERT INTO `kq_user_log` VALUES ('223', '53', '1514997697');
INSERT INTO `kq_user_log` VALUES ('224', '53', '1514997702');
INSERT INTO `kq_user_log` VALUES ('225', '53', '1514997706');
INSERT INTO `kq_user_log` VALUES ('226', '54', '1514997745');
INSERT INTO `kq_user_log` VALUES ('227', '54', '1514997748');
INSERT INTO `kq_user_log` VALUES ('228', '54', '1514997752');
INSERT INTO `kq_user_log` VALUES ('229', '54', '1514997755');
INSERT INTO `kq_user_log` VALUES ('230', '54', '1514997759');
INSERT INTO `kq_user_log` VALUES ('231', '54', '1514997763');
INSERT INTO `kq_user_log` VALUES ('232', '54', '1514997767');
INSERT INTO `kq_user_log` VALUES ('233', '54', '1514997770');
INSERT INTO `kq_user_log` VALUES ('234', '54', '1514997774');
INSERT INTO `kq_user_log` VALUES ('235', '54', '1514997778');
INSERT INTO `kq_user_log` VALUES ('236', '54', '1514997782');
INSERT INTO `kq_user_log` VALUES ('237', '55', '1514997915');
INSERT INTO `kq_user_log` VALUES ('238', '55', '1514997919');
INSERT INTO `kq_user_log` VALUES ('239', '55', '1514997923');
INSERT INTO `kq_user_log` VALUES ('240', '55', '1514997927');
INSERT INTO `kq_user_log` VALUES ('241', '55', '1514997931');
INSERT INTO `kq_user_log` VALUES ('242', '55', '1514997936');
INSERT INTO `kq_user_log` VALUES ('243', '55', '1514997940');
INSERT INTO `kq_user_log` VALUES ('244', '55', '1514997944');
INSERT INTO `kq_user_log` VALUES ('245', '55', '1514997947');
INSERT INTO `kq_user_log` VALUES ('246', '55', '1514997951');
INSERT INTO `kq_user_log` VALUES ('247', '55', '1514997955');
INSERT INTO `kq_user_log` VALUES ('248', '55', '1514997959');
INSERT INTO `kq_user_log` VALUES ('249', '55', '1514997965');
INSERT INTO `kq_user_log` VALUES ('250', '55', '1514997971');
INSERT INTO `kq_user_log` VALUES ('251', '55', '1514997976');
INSERT INTO `kq_user_log` VALUES ('252', '55', '1514997981');
INSERT INTO `kq_user_log` VALUES ('253', '55', '1514997985');
INSERT INTO `kq_user_log` VALUES ('254', '55', '1514997990');
INSERT INTO `kq_user_log` VALUES ('255', '55', '1514997996');
INSERT INTO `kq_user_log` VALUES ('256', '60', '1514998287');
INSERT INTO `kq_user_log` VALUES ('257', '60', '1514998292');
INSERT INTO `kq_user_log` VALUES ('258', '60', '1514998295');
INSERT INTO `kq_user_log` VALUES ('259', '60', '1514998301');
INSERT INTO `kq_user_log` VALUES ('260', '60', '1514998305');
INSERT INTO `kq_user_log` VALUES ('261', '60', '1514998308');
INSERT INTO `kq_user_log` VALUES ('262', '60', '1514998312');
INSERT INTO `kq_user_log` VALUES ('263', '60', '1514998316');
INSERT INTO `kq_user_log` VALUES ('264', '60', '1514998320');
INSERT INTO `kq_user_log` VALUES ('265', '60', '1514998324');
INSERT INTO `kq_user_log` VALUES ('266', '60', '1514998328');
INSERT INTO `kq_user_log` VALUES ('267', '60', '1514998332');
INSERT INTO `kq_user_log` VALUES ('268', '57', '1514998352');
INSERT INTO `kq_user_log` VALUES ('269', '57', '1514998356');
INSERT INTO `kq_user_log` VALUES ('270', '57', '1514998360');
INSERT INTO `kq_user_log` VALUES ('271', '57', '1514998364');
INSERT INTO `kq_user_log` VALUES ('272', '57', '1514998367');
INSERT INTO `kq_user_log` VALUES ('273', '57', '1514998371');
INSERT INTO `kq_user_log` VALUES ('274', '57', '1514998376');
INSERT INTO `kq_user_log` VALUES ('275', '57', '1514998380');
INSERT INTO `kq_user_log` VALUES ('276', '57', '1514998384');
INSERT INTO `kq_user_log` VALUES ('277', '57', '1514998388');
INSERT INTO `kq_user_log` VALUES ('278', '57', '1514998392');
INSERT INTO `kq_user_log` VALUES ('279', '57', '1514998396');
INSERT INTO `kq_user_log` VALUES ('280', '57', '1514998400');
INSERT INTO `kq_user_log` VALUES ('281', '57', '1514998405');
INSERT INTO `kq_user_log` VALUES ('282', '57', '1514998410');
INSERT INTO `kq_user_log` VALUES ('283', '58', '1514998426');
INSERT INTO `kq_user_log` VALUES ('284', '58', '1514998430');
INSERT INTO `kq_user_log` VALUES ('285', '58', '1514998435');
INSERT INTO `kq_user_log` VALUES ('286', '58', '1514998439');
INSERT INTO `kq_user_log` VALUES ('287', '58', '1514998443');
INSERT INTO `kq_user_log` VALUES ('288', '58', '1514998448');
INSERT INTO `kq_user_log` VALUES ('289', '58', '1514998452');
INSERT INTO `kq_user_log` VALUES ('290', '58', '1514998456');
INSERT INTO `kq_user_log` VALUES ('291', '58', '1514998459');
INSERT INTO `kq_user_log` VALUES ('292', '59', '1514998484');
INSERT INTO `kq_user_log` VALUES ('293', '59', '1514998489');
INSERT INTO `kq_user_log` VALUES ('294', '59', '1514998493');
INSERT INTO `kq_user_log` VALUES ('295', '59', '1514998504');
INSERT INTO `kq_user_log` VALUES ('296', '59', '1514998508');
INSERT INTO `kq_user_log` VALUES ('297', '61', '1514998589');
INSERT INTO `kq_user_log` VALUES ('298', '61', '1514998594');
INSERT INTO `kq_user_log` VALUES ('299', '61', '1514998599');
INSERT INTO `kq_user_log` VALUES ('300', '61', '1514998603');
INSERT INTO `kq_user_log` VALUES ('301', '61', '1514998608');
INSERT INTO `kq_user_log` VALUES ('302', '61', '1514998612');
INSERT INTO `kq_user_log` VALUES ('303', '61', '1514998617');
INSERT INTO `kq_user_log` VALUES ('304', '61', '1514998621');
INSERT INTO `kq_user_log` VALUES ('305', '61', '1514998625');
INSERT INTO `kq_user_log` VALUES ('306', '61', '1514998630');
INSERT INTO `kq_user_log` VALUES ('307', '61', '1514998634');
INSERT INTO `kq_user_log` VALUES ('308', '61', '1514998638');
INSERT INTO `kq_user_log` VALUES ('309', '61', '1514998643');
INSERT INTO `kq_user_log` VALUES ('310', '61', '1514998647');
INSERT INTO `kq_user_log` VALUES ('311', '14', '1515069664');
INSERT INTO `kq_user_log` VALUES ('312', '23', '1515069702');
INSERT INTO `kq_user_log` VALUES ('313', '25', '1515069734');
INSERT INTO `kq_user_log` VALUES ('314', '23', '1515155736');
INSERT INTO `kq_user_log` VALUES ('315', '19', '1515155767');
