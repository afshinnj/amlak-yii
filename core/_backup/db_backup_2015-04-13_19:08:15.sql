-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `yii_apartments_Info`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_apartments_Info`;
CREATE TABLE IF NOT EXISTS `yii_apartments_Info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `home_general_Info_id` int(11) DEFAULT NULL,
  `Infrastructure` varchar(255) DEFAULT NULL,
  `metr` varchar(255) DEFAULT NULL,
  `rooms` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `floors` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `r_status` varchar(255) DEFAULT NULL,
  `old_home` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cabinets` varchar(255) DEFAULT NULL,
  `wc` varchar(255) DEFAULT NULL,
  `flooring` varchar(255) DEFAULT NULL,
  `price_metr` varchar(255) DEFAULT NULL,
  `price_all` varchar(255) DEFAULT NULL,
  `parking` varchar(255) DEFAULT NULL,
  `tell` varchar(255) DEFAULT NULL,
  `loan` varchar(255) DEFAULT NULL,
  `facilities` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_city`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_city`;
CREATE TABLE IF NOT EXISTS `yii_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `city` int(11) NOT NULL DEFAULT '0',
  `area` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `yii_city_state_id` (`state_id`),
  KEY `yii_city_city_id` (`city_id`),
  CONSTRAINT `yii_city_city_id` FOREIGN KEY (`city_id`) REFERENCES `yii_city` (`id`),
  CONSTRAINT `yii_city_state_id` FOREIGN KEY (`state_id`) REFERENCES `yii_city` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_home_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_home_details`;
CREATE TABLE IF NOT EXISTS `yii_home_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_home_general_Info`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_home_general_Info`;
CREATE TABLE IF NOT EXISTS `yii_home_general_Info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `zone_id` varchar(255) DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `home_type` varchar(255) DEFAULT NULL,
  `doc_type` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_email` varchar(255) DEFAULT NULL,
  `address_home` varchar(255) DEFAULT NULL,
  `no_home` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `tell` varchar(255) DEFAULT NULL,
  `tell1` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_mediafile`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_mediafile`;
CREATE TABLE IF NOT EXISTS `yii_mediafile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `alt` text,
  `size` varchar(255) NOT NULL,
  `description` text,
  `thumbs` text,
  `owner_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_menus`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_menus`;
CREATE TABLE IF NOT EXISTS `yii_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `section` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_migration`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_migration`;
CREATE TABLE IF NOT EXISTS `yii_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_option`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_option`;
CREATE TABLE IF NOT EXISTS `yii_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_title` varchar(255) NOT NULL,
  `option_value` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_pages`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_pages`;
CREATE TABLE IF NOT EXISTS `yii_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `captcha_count` smallint(6) NOT NULL DEFAULT '5',
  `captcha_show` smallint(6) NOT NULL DEFAULT '1',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_profile`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_profile`;
CREATE TABLE IF NOT EXISTS `yii_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `yii_profile_user_id` (`user_id`),
  CONSTRAINT `yii_profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_request_home`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_request_home`;
CREATE TABLE IF NOT EXISTS `yii_request_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `home_type` varchar(255) DEFAULT NULL,
  `doc_type` varchar(255) DEFAULT NULL,
  `contract_type` int(11) DEFAULT NULL,
  `metr` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `price_rent` varchar(255) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_role`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_role`;
CREATE TABLE IF NOT EXISTS `yii_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0',
  `can_user` smallint(6) NOT NULL DEFAULT '0',
  `can_author` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_session`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_session`;
CREATE TABLE IF NOT EXISTS `yii_session` (
  `id` varchar(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_settings`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_settings`;
CREATE TABLE IF NOT EXISTS `yii_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `admin_language` varchar(255) NOT NULL,
  `site_language` varchar(255) NOT NULL,
  `site_off` smallint(6) NOT NULL,
  `site_off_description` text,
  `email_confirmation` smallint(6) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_user`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_user`;
CREATE TABLE IF NOT EXISTS `yii_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `new_email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `login_ip` varchar(15) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `ban_time` datetime DEFAULT NULL,
  `ban_reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yii_user_email` (`email`),
  UNIQUE KEY `yii_user_username` (`username`),
  KEY `yii_user_role_id` (`role_id`),
  CONSTRAINT `yii_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `yii_role` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_user_auth`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_user_auth`;
CREATE TABLE IF NOT EXISTS `yii_user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `provider_attributes` text NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `yii_user_auth_provider_id` (`provider_id`),
  KEY `yii_user_auth_user_id` (`user_id`),
  CONSTRAINT `yii_user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `yii_user_key`
-- -------------------------------------------
DROP TABLE IF EXISTS `yii_user_key`;
CREATE TABLE IF NOT EXISTS `yii_user_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `key` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `consume_time` datetime DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yii_user_key_key` (`key`),
  KEY `yii_user_key_user_id` (`user_id`),
  CONSTRAINT `yii_user_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE DATA yii_apartments_Info
-- -------------------------------------------
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('3','1','3','5','645','0','14','5','5','8','آجر','مالک','8','Southern','999','MDF','ایرانی','HDF','54','قیمت روز','122','5555','','a:6:{i:0;s:8:\"چیلر\";i:1;s:8:\"پکیچ\";i:2;s:10:\"استخر\";i:3;s:8:\"مبله\";i:4;s:23:\"شوتینگ زباله\";i:5;s:10:\"بالکن\";}','1394-01-23 20:43:56','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('4','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('5','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('6','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('7','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('8','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('9','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('10','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('11','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('12','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('13','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');
INSERT INTO `yii_apartments_Info` (`id`,`user_id`,`home_general_Info_id`,`Infrastructure`,`metr`,`rooms`,`floor`,`floors`,`unit`,`units`,`view`,`r_status`,`old_home`,`location`,`description`,`cabinets`,`wc`,`flooring`,`price_metr`,`price_all`,`parking`,`tell`,`loan`,`facilities`,`create_time`,`update_time`) VALUES
('14','3','4','200','100','0','1','1','10','1','آجر','مالک','restored','\'Western','به تو چه','MDF','ایرانی','HDF','200','قیمت روز','10','2','0','a:2:{i:0;s:10:\"شوفاژ\";i:1;s:14:\"آسانسور\";}','1394-01-23 20:46:12','');



-- -------------------------------------------
-- TABLE DATA yii_city
-- -------------------------------------------
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('1','آذربايجان شرقي','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('2','آذربايجان غربی','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('3','اردبیل','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('4','اصفهان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('5','ایلام','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('6','بوشهر','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('7','تهران','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('8','چهارمحال بختياري','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('9','خراسان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('10','خوزستان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('11','زنجان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('12','سمنان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('13','سیستان و بلوچستان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('14','چهارمحال بختياري','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('15','فارس','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('16','قزوین','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('17','قم','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('18','کردستان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('19','کرمان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('20','کرمانشاه','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('21','كهكيلويه و بويراحمد','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('22','گلستان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('23','گیلان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('24','لرستان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('25','مازندران','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('26','مرکزی','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('27','هرمزگان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('28','همدان','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('29','یزد','','','1','0','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('30','اردبیل','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('31','آبی‌بیگلو','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('32','اصلاندوز','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('33','بیله‌سوار','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('34','پارس آباد','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('35','خلخال','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('36','مشکین شهر','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('37','نمین','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('38','نیر','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('39','هیر','3','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('40','شهرضا','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('41','مبارکه','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('42','لنجان','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('43','دیزیچه لنجان','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('44','فلاورجان','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('45','نجف‌ آباد','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('46','اردستان','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('47','گلپایگان','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('48','نطنز','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('49','سمیرم','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('50','کاشان','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('51','خمینی‌ شهر','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('52','فریدون‌ شهر','4','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('53','ایلام','5','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('54','دهلران','5','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('55','مهران','5','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('56','مراغه','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('57','بناب','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('58','مرند','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('59','کلیبر','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('60','کلیبر','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('61','هشترود','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('62','ملکان','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('63','آذرشهر','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('64','اسکو','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('65','سراب','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('66','تبریز','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('67','شبستر','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('68','هریس','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('69','هریس','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('70','ورزقان','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('71','جلفا','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('72','بستان‌آباد','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('73','عجب‌شیر','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('74','هشترود','1','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('75','سردشت','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('76','تکاب','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('77','بوکان','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('78','شاهین‌ دژ','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('79','نقده','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('80','میاندوآب','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('81','اشنویه','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('82','ارومیه','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('83','سلماس','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('84','خوی','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('85','چایپاره','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('86','ماکو','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('87','پلدشت','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('88','پیرانشهر','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('89','چالدران','2','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('90','بوشهر','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('91','جم','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('92','تنگستان','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('93','دشتستان','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('94','دشتی','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('95','دیر','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('96','دیلم','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('97','کنگان','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('98','گناوه','6','','0','1','0','1394-01-18 22:34:05','');
INSERT INTO `yii_city` (`id`,`name`,`state_id`,`city_id`,`state`,`city`,`area`,`create_time`,`update_time`) VALUES
('99','منطقه 1','1','56','0','0','1','1394-01-19 20:51:38','');



-- -------------------------------------------
-- TABLE DATA yii_home_details
-- -------------------------------------------
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('1','1','home Type','آپارتمان','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('2','1','home Type','ویلا - خانه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('3','1','home Type','مغازه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('4','1','home Type','زمین - کلنگی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('5','1','home Type','املاک کشاورزی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('6','1','home Type','کارخانه و کارگاه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('7','1','home Type','دامداری و دامپروری','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('8','1','home Type','مجتمع آپارتمانی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('9','2','Doc Type','مسکونی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('10','2','Doc Type','تجاری','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('11','2','Doc Type','اداری','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('12','2','Doc Type','موقعیت اداری','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('13','2','Doc Type','مسکونی ','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('14','2','Doc Type','صنعتی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('15','2','Doc Type','مزروعی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('16','3','Metr','تا 50 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('17','3','Metr','50 تا 75 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('18','3','Metr','75 تا 100 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('19','3','Metr','100 تا 150 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('20','3','Metr','150 تا 200 متر ','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('21','3','Metr','200 تا 250 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('22','3','Metr','250 تا 300 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('23','3','Metr','بالای 300 متر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('24','4','Total Price','قیمت روز','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('25','4','Total Price','تا 50 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('26','4','Total Price','50 تا 100 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('27','4','Total Price','100 تا 200 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('28','4','Total Price','200 تا 300 میلیون ','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('29','4','Total Price','300 تا 400 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('30','4','Total Price','400 تا 500 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('31','4','Total Price','500 تا 600 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('32','4','Total Price','600 تا 700 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('33','4','Total Price','700 تا 1 میلیارد','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('34','4','Total Price','1 میلیارد به بالا','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('35','5','Kitchen Cabinets','MDF','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('36','5','Kitchen Cabinets','آبدار خانه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('37','5','Kitchen Cabinets','چوبی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('38','5','Kitchen Cabinets','فلزی طرح چوب','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('39','5','Kitchen Cabinets','فایبر گلاس','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('40','6','WC','ایرانی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('41','6','WC','فرنگی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('42','6','WC','ایرانی - فرنگی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('43','7','Flooring','HDF','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('44','7','Flooring','پارکت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('45','7','Flooring','سرامیک','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('46','7','Flooring','موکت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('47','7','Flooring','کاشی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('48','8','View','آجر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('49','8','View','آجر سه سانت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('50','8','View','آلمینیوم','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('51','8','View','رفلکس','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('52','8','View','رومی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('53','8','View','گرانیت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('54','8','View','کامپوزیت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('55','8','View','کلاسیک','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('56','8','View','سنگ','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('57','8','View','سیمان','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('58','9','Residence status','مالک','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('59','9','Residence status','مستاجر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('60','9','Residence status','تخلیه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('61','10','Type Villa','یک طبقه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('62','10','Type Villa','دو طبقه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('63','10','Type Villa','دوبلکس','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('64','10','Type Villa','تریبلکس','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('65','10','Type Villa','دوقلو','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('66','10','Type Villa','سه قلو','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('67','11','Facilities','شوفاژ','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('68','11','Facilities','چیلر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('69','11','Facilities','فن کوئل','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('70','11','Facilities','پکیچ','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('71','11','Facilities','کولر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('72','11','Facilities','استخر','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('73','11','Facilities','سونا','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('74','11','Facilities','جکوزی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('75','11','Facilities','آسانسور','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('76','11','Facilities','باربیکیو','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('77','11','Facilities','آیفون تصویری','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('78','11','Facilities','دوربین مدار بسته','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('79','11','Facilities','درب ریموت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('80','11','Facilities','آنتن مرکزی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('81','11','Facilities','اینترنت مرکزی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('82','11','Facilities','حیاط خلوت','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('83','11','Facilities','فضای سبز','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('84','11','Facilities','لابی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('85','11','Facilities','سالن اجتماعات','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('86','11','Facilities','سرایداری','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('87','11','Facilities','پاسیو','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('88','11','Facilities','نیمه مبله','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('89','11','Facilities','مبله','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('90','11','Facilities','اطفاء حریق','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('91','11','Facilities','شوتینگ زباله','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('92','11','Facilities','انبار','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('93','11','Facilities','بالکن','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('94','11','Facilities','شومینه','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('95','12','Location','شمالی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('96','12','Location','جنوبی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('97','12','Location','شرقی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('98','12','Location','غربی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('99','13','Home Old','نوساز','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('100','13','Home Old','قدیمی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('101','13','Home Old','باز سازی شده','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('102','14','Contract Type','فروش','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('103','14','Contract Type','رهن و اجاره','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('104','15','Price Rent','تا 10 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('105','15','Price Rent','10 تا 15 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('106','15','Price Rent','15 تا 20 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('107','15','Price Rent','20 تا 30 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('108','15','Price Rent','40 تا 50 میلیون','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('109','15','Price Rent','50 میلیون به بالا','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('110','16','Rent','رهن کامل','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('111','16','Rent','تا 200,000','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('112','16','Rent','تا 300,000 200,000','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('113','16','Rent','تا 400,000 300,000','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('114','16','Rent','تا 500,000 400,000','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('115','16','Rent','تا 700,000 500,000','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('116','16','Rent','700,000 به بالا','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('117','17','Sale Contract Type','فروش','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('118','17','Sale Contract Type','رهن و اجاره','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('119','17','Sale Contract Type','رهن','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('120','17','Sale Contract Type','اجاره','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('121','17','Sale Contract Type','سر قفلی','1394-01-18 22:33:57','');
INSERT INTO `yii_home_details` (`id`,`details_id`,`details`,`title`,`create_time`,`update_time`) VALUES
('122','17','Sale Contract Type','پیش فروش','1394-01-18 22:33:57','');



-- -------------------------------------------
-- TABLE DATA yii_home_general_Info
-- -------------------------------------------
INSERT INTO `yii_home_general_Info` (`id`,`sale_code`,`user_id`,`state_id`,`city_id`,`zone_id`,`contract_type`,`home_type`,`doc_type`,`owner_name`,`owner_email`,`address_home`,`no_home`,`mobile`,`tell`,`tell1`,`create_time`,`update_time`) VALUES
('3','12012','1','1','56','99','102','','مسکونی','asdasd','asdasd','88','564','','9789874','','1394-01-23 20:43:56','');
INSERT INTO `yii_home_general_Info` (`id`,`sale_code`,`user_id`,`state_id`,`city_id`,`zone_id`,`contract_type`,`home_type`,`doc_type`,`owner_name`,`owner_email`,`address_home`,`no_home`,`mobile`,`tell`,`tell1`,`create_time`,`update_time`) VALUES
('4','30243','3','1','','','102','','مسکونی','افشین','a@a.com','خانه ما','99','','09144540742','','1394-01-23 20:46:12','');



-- -------------------------------------------
-- TABLE DATA yii_mediafile
-- -------------------------------------------
INSERT INTO `yii_mediafile` (`id`,`filename`,`type`,`url`,`alt`,`size`,`description`,`thumbs`,`owner_id`,`created_at`,`updated_at`) VALUES
('4','b1b38c1feb3700fb3b1610c0aac7b956.jpg','image/jpeg','/uploads/2015/04/b1b38c1feb3700fb3b1610c0aac7b956.jpg','','126203','','a:3:{s:5:\"small\";s:60:\"/uploads/2015/04/b1b38c1feb3700fb3b1610c0aac7b956-120x80.jpg\";s:6:\"medium\";s:61:\"/uploads/2015/04/b1b38c1feb3700fb3b1610c0aac7b956-400x300.jpg\";s:5:\"large\";s:61:\"/uploads/2015/04/b1b38c1feb3700fb3b1610c0aac7b956-800x600.jpg\";}','1','1428915420','1428915421');
INSERT INTO `yii_mediafile` (`id`,`filename`,`type`,`url`,`alt`,`size`,`description`,`thumbs`,`owner_id`,`created_at`,`updated_at`) VALUES
('5','Screenshot from 2015-03-28 17:29:00.png','image/png','/uploads/2015/04/Screenshot from 2015-03-28 17:29:00.png','','1051183','','a:3:{s:5:\"small\";s:63:\"/uploads/2015/04/Screenshot from 2015-03-28 17:29:00-120x80.png\";s:6:\"medium\";s:64:\"/uploads/2015/04/Screenshot from 2015-03-28 17:29:00-400x300.png\";s:5:\"large\";s:64:\"/uploads/2015/04/Screenshot from 2015-03-28 17:29:00-800x600.png\";}','1','1428915938','1428915939');



-- -------------------------------------------
-- TABLE DATA yii_menus
-- -------------------------------------------
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('1','1','0','Settings','','panel','fa-wrench','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('2','1','1','Pages','pages','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('3','1','1','Setting','settings','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('4','1','1','Backup','backup','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('5','1','1','File-Manager','media-file','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('6','1','0','Registration-location','','panel','fa-globe','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('7','1','6','State','State-List','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('8','1','6','Sub-State','City-List','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('9','1','6','Zone','Zone-List','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('10','1','0','Registration-variable','','panel','fa-home','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('11','1','10','Home-Type','Home-Type','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('12','1','10','Doc-Type','Doc-Type','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('13','1','10','Total-Price','Total-Price','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('14','1','10','Metr-Groups','Metr-Groups','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('15','1','0','User','','panel','fa-user','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('16','1','15','Change-Password','change-password','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('17','1','15','Change-Profile','change-profile','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('18','1','15','Change-Avatar','change-avatar','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('19','1','15','Change-Email','change-email','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('20','1','0','Registration-home','','panel','fa-home','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('21','1','20','Request-Home','request-home','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('22','1','20','Apartments','apartments','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('23','2','0','User','','panel','fa-user','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('24','2','23','Change-Password','change-password','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('25','2','23','Change-Profile','change-profile','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('26','2','20','Change-Avatar','change-avatar','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('27','2','20','Change-Email','change-email','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('28','2','20','File-Manager','media-file','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('29','2','0','Registration-home','','panel','fa-home','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('30','2','29','Request-Home','request-home','panel','','1394-01-18 22:34:06','');
INSERT INTO `yii_menus` (`id`,`role_id`,`parent_id`,`title`,`url`,`section`,`icon`,`create_time`,`update_time`) VALUES
('31','2','29','Apartments','apartments','panel','','1394-01-18 22:34:06','');



-- -------------------------------------------
-- TABLE DATA yii_migration
-- -------------------------------------------
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m000000_000000_base','1428429824');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m141129_130551_mediafile','1428429829');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m141207_081031_init_session','1428429829');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150113_102452_pages','1428429830');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150123_183235_settings','1428429830');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150214_044831_init_user','1428429837');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150222_154457_Home_Details','1428429838');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150222_182756_option','1428429842');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150223_083339_city','1428429845');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150226_144019_menus','1428429846');
INSERT INTO `yii_migration` (`version`,`apply_time`) VALUES
('m150318_114736_request_sale_home','1428429848');



-- -------------------------------------------
-- TABLE DATA yii_option
-- -------------------------------------------
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('1','1','setting','title','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('2','1','setting','email','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('3','1','setting','telephone','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('4','1','setting','description','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('5','1','setting','keywords','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('6','1','setting','admin_language','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('7','1','setting','site_language','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('8','1','setting','site_off_description','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('9','2','page','login','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('10','2','page','Sign up','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('11','2','page','about','','1394-01-18 22:33:58','');
INSERT INTO `yii_option` (`id`,`option_id`,`option_name`,`option_title`,`option_value`,`create_time`,`update_time`) VALUES
('12','2','page','contact','','1394-01-18 22:33:58','');



-- -------------------------------------------
-- TABLE DATA yii_pages
-- -------------------------------------------
INSERT INTO `yii_pages` (`id`,`title`,`title_en`,`text`,`keyword`,`captcha_count`,`captcha_show`,`create_time`,`update_time`) VALUES
('1','صفحه ورود','Login','صفحه ورود','','5','1','1394-01-18 22:33:50','');
INSERT INTO `yii_pages` (`id`,`title`,`title_en`,`text`,`keyword`,`captcha_count`,`captcha_show`,`create_time`,`update_time`) VALUES
('2','صفحه ثبت نام','SignUp','صفحه ثبت نام','','5','1','1394-01-18 22:33:50','');
INSERT INTO `yii_pages` (`id`,`title`,`title_en`,`text`,`keyword`,`captcha_count`,`captcha_show`,`create_time`,`update_time`) VALUES
('3','درباره ما','About','درباره ما','','5','1','1394-01-18 22:33:50','');
INSERT INTO `yii_pages` (`id`,`title`,`title_en`,`text`,`keyword`,`captcha_count`,`captcha_show`,`create_time`,`update_time`) VALUES
('4','تماس با ما','Contact','تماس با ما','','5','1','1394-01-18 22:33:50','');



-- -------------------------------------------
-- TABLE DATA yii_profile
-- -------------------------------------------
INSERT INTO `yii_profile` (`id`,`user_id`,`create_time`,`update_time`,`full_name`,`mobile`,`avatar`) VALUES
('1','1','1394-01-18 22:33:57','1394-01-24 13:04:22','admin','09144540742','');
INSERT INTO `yii_profile` (`id`,`user_id`,`create_time`,`update_time`,`full_name`,`mobile`,`avatar`) VALUES
('2','3','1394-01-18 22:33:57','','افشین','','');



-- -------------------------------------------
-- TABLE DATA yii_role
-- -------------------------------------------
INSERT INTO `yii_role` (`id`,`name`,`create_time`,`update_time`,`can_admin`,`can_user`,`can_author`) VALUES
('1','Admin','1394-01-18 22:33:56','','1','0','0');
INSERT INTO `yii_role` (`id`,`name`,`create_time`,`update_time`,`can_admin`,`can_user`,`can_author`) VALUES
('2','User','1394-01-18 22:33:56','','0','1','0');
INSERT INTO `yii_role` (`id`,`name`,`create_time`,`update_time`,`can_admin`,`can_user`,`can_author`) VALUES
('3','Author','1394-01-18 22:33:56','','0','0','1');



-- -------------------------------------------
-- TABLE DATA yii_session
-- -------------------------------------------
INSERT INTO `yii_session` (`id`,`expire`,`data`) VALUES
('b73ojapkvhggcsb4ri01ikf455','1428953529','__flash|a:0:{}__id|i:1;page|s:11:\"/home/pages\";');



-- -------------------------------------------
-- TABLE DATA yii_settings
-- -------------------------------------------
INSERT INTO `yii_settings` (`id`,`title`,`email`,`telephone`,`description`,`keywords`,`admin_language`,`site_language`,`site_off`,`site_off_description`,`email_confirmation`,`create_time`,`update_time`) VALUES
('1','','','','','','fa-IR','fa-IR','1','','1','1394-01-18 22:33:50','1394-01-24 23:33:45');



-- -------------------------------------------
-- TABLE DATA yii_user
-- -------------------------------------------
INSERT INTO `yii_user` (`id`,`role_id`,`status`,`email`,`new_email`,`username`,`password`,`auth_key`,`api_key`,`login_ip`,`login_time`,`create_ip`,`create_time`,`update_time`,`ban_time`,`ban_reason`) VALUES
('1','1','1','neo@neo.com','','neo','$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O','lb0TOTsFUkq31GF2QEI180joi7Dyb72I','1OCqiOwdtrZ859YRc09uOG9zsx5in5G4','127.0.0.1','1394-01-24 23:22:14','','2015-04-07 18:03:56','','','');
INSERT INTO `yii_user` (`id`,`role_id`,`status`,`email`,`new_email`,`username`,`password`,`auth_key`,`api_key`,`login_ip`,`login_time`,`create_ip`,`create_time`,`update_time`,`ban_time`,`ban_reason`) VALUES
('3','2','1','neo@neo1.com','','afshin','$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O','lb0TOTsFUkq31GF2QEI180joi7Dyb72I','1OCqiOwdtrZ859YRc09uOG9zsx5in5G4','127.0.0.1','1394-01-23 21:15:10','','2015-04-07 18:03:56','','','');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
