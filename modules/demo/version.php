<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 16 Apr 2014 11:50:05 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$module_version = array(
		'name' => 'Demo',
		'modfuncs' => 'main,detail,search,cat',
		'submenu' => 'main,detail,search,cat',
		'is_sysmod' => 0,
		'virtual' => 1,
		'version' => '4.0.0',
		'date' => 'Wed, 16 Apr 2014 11:50:05 GMT',
		'author' => 'VINADES (contact@vinades.vn)',
		'uploads_dir' => array($module_name),
		'note' => 'demo'
	);

?>