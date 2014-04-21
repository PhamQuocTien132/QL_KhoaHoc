<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Fri, 18 Apr 2014 01:46:22 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_courses`";

$sql_drop_module[] = "DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_students`";

$sql_drop_module[] = "DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_attendance`";

$sql_drop_module[] = "DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_fees`";


$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_courses` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_courses` varchar(11) NOT NULL COMMENT 'mã khóa học',
  `alias` varchar(50) NOT NULL,
  `name_courses` varchar(100) NOT NULL COMMENT 'tên khóa học',
  `schedule` varchar(20) NOT NULL COMMENT 'lịch học',
  `duration` tinyint(4) NOT NULL COMMENT 'thời lượng học',
  `fee` int(11) NOT NULL COMMENT 'học phí',
  `total` tinyint(4) NOT NULL COMMENT 'sl học viên',
  `time_start` date NOT NULL COMMENT 'thời gian bắt đầu',
  `time_end` date NOT NULL COMMENT 'thời gian kết thúc',
  `note` text NOT NULL COMMENT 'ghi chú khác ',
  `status` tinyint(4) NOT NULL COMMENT 'trạng thái',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='bảng khóa học';";



$sql_create_module[] = "CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_student` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(11) NOT NULL,
  `id_courses` varchar(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `reduce` int(11) NOT NULL,
  `fee_real` int(11) NOT NULL,
  `fee_current` int(11) NOT NULL,
  `money_debit` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

?>