<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 16 Apr 2014 11:50:05 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

/*$array_data = array(); phương thức pót
if ($nv_Request->isset_request('submit', 'post')) {
	$array_data['hoten'] = $nv_Request->get_title('hoten','post','');
	print_r($array_data);die;
}*/

$array_data = array();
if ($nv_Request->isset_request('submit', 'GET')) {
	$array_data['name'] = $nv_Request->get_title('name','GET','');
	$array_data['pass'] = $nv_Request->get_title('pass','GET','');
	
	
}


$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );

$xtpl->assign('DATA',$array_data);

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['main'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';

?>