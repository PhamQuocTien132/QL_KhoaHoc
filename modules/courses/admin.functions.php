<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Fri, 18 Apr 2014 01:46:22 GMT
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );

$submenu['main'] = $lang_module['main'];
$submenu['config'] = $lang_module['config'];
$submenu['courses'] = $lang_module['courses'];
$submenu['student'] = $lang_module['student'];
$submenu['attendance'] = $lang_module['attendance'];
//$submenu['diff'] = $lang_module['diff'];

$allow_func = array( 'main', 'config', 'courses', 'student', 'attendance', 'diff','alias');

define( 'NV_IS_FILE_ADMIN', true );

?>