<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Fri, 18 Apr 2014 01:46:22 GMT
 */
 
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id=$nv_Request -> get_title('id', 'get', ''); // nhận id truyền sang từ trang chính
//die(''.$id);

$array_data = array(
'trinhdo' => -1,
'status'=>1,
);

$error='';

if ($nv_Request -> isset_request('submit', 'post')) {
	
	$array_data['makh'] = $nv_Request -> get_title('makh', 'post', '');
	$array_data['tenkh'] = $nv_Request -> get_title('tenkh', 'post', '');
	
	$alias = $nv_Request->get_title( 'alias', 'post', '' );
	$array_data['alias'] = ( $alias == '' ) ? change_alias( $array_data['tenkh'] ) : change_alias( $alias );
	
	$array_data['lichkh'] = $nv_Request -> get_title('lichkh', 'post', '');
	
	$hocphi = $nv_Request -> get_title('hocphi', 'post', '3000000');
	$array_data['hocphi'] = str_replace(',', '', $hocphi);
	$array_data['thoiluong'] = $nv_Request -> get_title('thoiluong', 'post', '16');
	$array_data['slhv'] = $nv_Request -> get_title('slhv', 'post', '20');
	$array_data['note'] = $nv_Request -> get_title('note', 'post', '');
	//$array_data['timestart'] = $nv_Request -> get_title('timestart', 'post', '');
	//$array_data['timeend'] = $nv_Request -> get_title('timeend', 'post', '');
	$array_data['status'] = $nv_Request -> get_int('status', 'post', '1');
	
	$timeend = $nv_Request -> get_title('timeend', 'post', '');
	if( ! empty( $timeend ) and preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $timeend, $m ) )
	{
		$ehour = $nv_Request->get_int( 'ehour', 'post', 0 );
		$emin = $nv_Request->get_int( 'emin', 'post', 0 );
		$array_data['timeend'] = mktime( $ehour, $emin, 0, $m[2], $m[1], $m[3] );
	}
	else
	{
		$array_data['timeend'] = NV_CURRENTTIME;
	}
	
	$timestart = $nv_Request -> get_title('timestart', 'post', '');
	if( ! empty( $timestart ) and preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $timestart, $m ) )
	{
		$ehour = $nv_Request->get_int( 'ehour', 'post', 0 );
		$emin = $nv_Request->get_int( 'emin', 'post', 0 );
		$array_data['timestart'] = mktime( $ehour, $emin, 0, $m[2], $m[1], $m[3] );
	}
	else
	{
		$array_data['timestart'] = NV_CURRENTTIME;
	}
	
	//print_r($array_data); die;
	
	$sth = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . "_courses ".' ( `id_courses`, `alias`, `name_courses`, `schedule`, `duration`, `fee`, `total`, `time_start`, `time_end`, `note`, `status`) VALUES
																							( :makh, :alias, :tenkh, :lichkh, :thoiluong, :hocphi, :slhv, :timestart, :timeend, :note, :status)');
	//$sth = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . "_courses ".' ( `id_courses`, `alias`, `name_courses`, `schedule`, `duration`, `fee`, `total`, `note`, `status`) VALUES
		//																					( :makh, :alias, :tenkh, :lichkh, :thoiluong, :hocphi, :slhv, :note, :status)');																							

try
	{
	$sth->bindParam('makh', $array_data['makh'], PDO::PARAM_STR);
	$sth->bindParam('alias', $array_data['alias'], PDO::PARAM_STR);
	$sth->bindParam('tenkh', $array_data['tenkh'], PDO::PARAM_STR);
	$sth->bindParam('lichkh', $array_data['lichkh'], PDO::PARAM_INT);
	$sth->bindParam('thoiluong', $array_data['thoiluong'], PDO::PARAM_INT);
	$sth->bindParam('hocphi', $array_data['hocphi'], PDO::PARAM_INT);
	$sth->bindParam('slhv', $array_data['slhv'], PDO::PARAM_INT);
	$sth->bindParam('timestart', $array_data['timestart'], PDO::PARAM_INT);
	$sth->bindParam('timeend', $array_data['timeend'], PDO::PARAM_INT);
	$sth->bindParam('note', $array_data['note'], PDO::PARAM_STR);
	$sth->bindParam('status', $array_data['status'], PDO::PARAM_STR);
	
	
	$sth->execute();
	
	} catch( PDOException $error ) {
trigger_error($error -> getMessage());
}
	
	
	if ($array_data['makh'] == '') {
		$error .= $lang_module['error_makh'];
	} 
	if ($array_data['tenkh'] == '') {
		$error .= $lang_module['error_tenkh'];
	} 

	if ($array_data['lichkh'] == '') {
		$error .= $lang_module['error_lichkh'];
	} 
	
	if ($array_data['hocphi'] == ''|| !is_numeric($array_data['hocphi'])) {
		$error .= $lang_module['error_hocphi_nan'];
	}

	if ($array_data['thoiluong'] == ''|| !is_numeric($array_data['hocphi'])) {
		$error .= $lang_module['error_thoiluong_nan'];
	}
	if ($array_data['slhv'] == ''|| !is_numeric($array_data['hocphi'])) {
		$error .= $lang_module['error_slhv_nan'];
	}
	if ($array_data['timestart'] == '') {
		$error .= $lang_module['error_timestart'];
	}
	if ($array_data['timeend'] == '') {
		$error .= $lang_module['error_timeend'];
	}
}

$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl -> assign('LANG', $lang_module);
$xtpl -> assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl -> assign('NV_BASE_SITEURL', NV_BASE_SITEURL);

$xtpl -> assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl -> assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl -> assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl -> assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl -> assign('MODULE_NAME', $module_name);
$xtpl -> assign('OP', $op);





if( $array_data['status'] ==0 ){
	$xtpl -> assign('ck_0', ' checked="checked"' );	
}else{
	$xtpl -> assign('ck_1', ' checked="checked"' );
}

$array_data['timestart']=$timestart;
$array_data['timeend']=$timeend;
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