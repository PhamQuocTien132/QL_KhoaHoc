<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 16 Apr 2014 11:45:32 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
	die('Stop!!!');

$array_data = array(
'trinhdo' => -1
);
if ($nv_Request -> isset_request('submit', 'post')) {
	$array_data['full_name'] = $nv_Request -> get_title('full_name', 'post', '');
	$array_data['phone'] = $nv_Request -> get_title('phone', 'post', '');
	$array_data['age'] = $nv_Request -> get_int('post', 'post', 0);
	$array_data['trinhdo'] = $nv_Request -> get_int('trinhdo', 'post', 0);
	$array_data['sex'] = $nv_Request -> get_int('sex', 'post', 0);
	
	if ($array_data['full_name'] == '') {
		$error = ' loi full name';
	} elseif ($array_data['phone'] == '' || !is_numeric($array_data['phone'])) {
		$error = 'Dien thoai phai la so';
	}
}

$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl -> assign('LANG', $lang_module);
$xtpl -> assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl -> assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl -> assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl -> assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl -> assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl -> assign('MODULE_NAME', $module_name);
$xtpl -> assign('OP', $op);

if( $array_data['sex'] ==0 ){
	$xtpl -> assign('ck_male', ' checked=checked' );	
}else{
	$xtpl -> assign('ck_fmale', ' checked=checked' );
}
$xtpl -> assign('DATA', $array_data);
if ($error != '') {
	$xtpl -> assign('error', $error);
}


$array_level = array(
	$lang_module['level1'],
	$lang_module['level2'],
	$lang_module['level3']
);

foreach ($array_level as $key => $value) {
	$xtpl -> assign('LEVEL', 
		array( 
			'key' => $key,
			'value' => $value,
			'sl' => ( $array_data['trinhdo'] == $key )? ' selected=selected' : ''
		)
	);
	$xtpl -> parse('main.loop');
}

$xtpl -> parse('main');
$contents = $xtpl -> text('main');

$page_title = $lang_module['main'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
?>