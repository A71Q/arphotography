CREATE DATABASE arp;
use arp;

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL auto_increment,
  `login_name` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `title` varchar(255) default NULL,
  `search_data` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `image_info`;

CREATE TABLE `image_info` (
  `id` int(11) NOT NULL auto_increment,
  `upload_date` date NOT NULL,
  `orig_name` varchar(500) NOT NULL default '0',
  `raw_name` varchar(500) NOT NULL,
  `file_ext` varchar(50) NOT NULL,
  `size` double NOT NULL,
  `width` int(10),
  `height` int(10),
  `title` varchar(500),
  `description` varchar(500),
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `image_gallery`;

CREATE TABLE `image_gallery` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL default '0',
  `description` varchar(500) NOT NULL default '0',
  `create_date` date,
  `update_date` date,
  `cover_image` int(11),
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `image_in_gallery`;

CREATE TABLE `image_in_gallery` (
  `id` int(11) NOT NULL auto_increment,
  `image_gallery_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `image_idx` int(11) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;



insert  into `image_gallery`(`id`,`name`,`description`,`create_date`,`update_date`,`cover_image`) values (1,'Default gallery','Images that does not belongs to any gallery',NULL,NULL,1);

INSERT INTO `login` (`id`,`login_name`,`login_type`,`password`,`first_name`,`last_name`,`title`,`search_data`)
VALUES (1, 'admin', 'ADMIN', 'pass', 'First', 'Last', 'Mr.', NULL);