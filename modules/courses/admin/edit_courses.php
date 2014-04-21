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
	$array_data['id_courses'] = $nv_Request -> get_title('makh', 'post', '');
	$array_data['name_courses'] = $nv_Request -> get_title('tenkh', 'post', '');
	
	$alias = $nv_Request->get_title( 'alias', 'post', '' );
	$array_data['alias'] = ( $alias == '' ) ? change_alias( $array_data['tenkh'] ) : change_alias( $alias );
	
	$array_data['schedule'] = $nv_Request -> get_title('lichkh', 'post', '');
	
	$hocphi = $nv_Request -> get_title('hocphi', 'post', '3000000');
	$array_data['fee'] = str_replace(',', '', $hocphi);
	$array_data['duration'] = $nv_Request -> get_title('thoiluong', 'post', '16');
	$array_data['total'] = $nv_Request -> get_title('slhv', 'post', '20');
	$array_data['note'] = $nv_Request -> get_title('note', 'post', '');
	//$array_data['time_start'] = $nv_Request -> get_title('timestart', 'post', '');
	//$array_data['time_end'] = $nv_Request -> get_title('timeend', 'post', '');
	$array_data['status'] = $nv_Request -> get_int('status', 'post', '1');
	
	$timeend = $nv_Request -> get_title('timeend', 'post', '');
	if( ! empty( $timeend ) and preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $timeend, $m ) )
	{
		$ehour = $nv_Request->get_int( 'ehour', 'post', 0 );
		$emin = $nv_Request->get_int( 'emin', 'post', 0 );
		$array_data['time_end'] = mktime( $ehour, $emin, 0, $m[2], $m[1], $m[3] );
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
		$array_data['time_start'] = mktime( $ehour, $emin, 0, $m[2], $m[1], $m[3] );
	}
	else
	{
		$array_data['timestart'] = NV_CURRENTTIME;
	}
	
	//print_r($array_data); die;
	
$sql='UPDATE ' . NV_PREFIXLANG . '_' . $module_data . "_courses ".'SET `id_courses`=:id_courses,`alias`=:alias,`name_courses`=:name_courses,`schedule`=:schedule,`duration`=:duration,`fee`=:fee,`total`=:total,`time_start`=:time_start,`time_end`=:time_end,`note`=:note,`status`=:status WHERE `id`='.$id;

$sth = $db->prepare($sql);
//die(''.$sql);

try
	{
	$sth->bindParam('id_courses', $array_data['id_courses'], PDO::PARAM_STR);
	$sth->bindParam('alias', $array_data['alias'], PDO::PARAM_STR);
	$sth->bindParam('name_courses', $array_data['name_courses'], PDO::PARAM_STR);
	$sth->bindParam('schedule', $array_data['schedule'], PDO::PARAM_INT);
	$sth->bindParam('duration', $array_data['duration'], PDO::PARAM_INT);
	$sth->bindParam('fee', $array_data['fee'], PDO::PARAM_INT);
	$sth->bindParam('total', $array_data['total'], PDO::PARAM_INT);
	$sth->bindParam('time_start', $array_data['time_start'], PDO::PARAM_INT);
	$sth->bindParam('time_end', $array_data['time_end'], PDO::PARAM_INT);
	$sth->bindParam('note', $array_data['note'], PDO::PARAM_STR);
	$sth->bindParam('status', $array_data['status'], PDO::PARAM_STR);
	
	
	$sth->execute();
	Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main' );
	
	
	} catch( PDOException $error ) {
trigger_error($error -> getMessage());

}
	
	if ($array_data['id_courses'] == '') {
		$error .= $lang_module['error_makh'];
	} 
	if ($array_data['name_courses'] == '') {
		$error .= $lang_module['error_tenkh'];
	} 

	if ($array_data['schedule'] == '') {
		$error .= $lang_module['error_lichkh'];
	} 
	
	if ($array_data['fee'] == ''|| !is_numeric($array_data['fee'])) {
		$error .= $lang_module['error_hocphi_nan'];
	}

	if ($array_data['duration'] == ''|| !is_numeric($array_data['duration'])) {
		$error .= $lang_module['error_thoiluong_nan'];
	}
	if ($array_data['total'] == ''|| !is_numeric($array_data['total'])) {
		$error .= $lang_module['error_slhv_nan'];
	}
	if ($array_data['time_start'] == '') {
		$error .= $lang_module['error_timestart'];
	}
	if ($array_data['time_end'] == '') {
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

$sql = 'SELECT `id`, `id_courses`, `alias`, `name_courses`, `schedule`, `duration`, `fee`, `total`, `time_start`, `time_end`, `note`, `status` FROM `nv41_vi_courses_courses` WHERE `id`='.$id;
	$q = $db->query($sql);
	$arr = $q->fetch();
	//print_r($arr);
//die('den day');	
	
	



if( $arr['status'] ==0 ){
	$xtpl -> assign('ck_0', ' checked="checked"' );	
}else{
	$xtpl -> assign('ck_1', ' checked="checked"' );
}

$arr['time_start']=date('m/d/Y',$arr['time_start']);
$arr['time_end']=date('m/d/Y',$arr['time_end']);

$xtpl->assign('DATA',$arr);

//$xtpl -> assign('DATA', $array_data);
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