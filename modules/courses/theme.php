<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Fri, 18 Apr 2014 01:46:22 GMT
 */

if ( ! defined( 'NV_IS_MOD_COURSES' ) ) die( 'Stop!!!' );

/**
 * nv_theme_courses_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_courses_main ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_courses_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_courses_detail ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_courses_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_courses_search ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

?>