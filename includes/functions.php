<?php

// We initially need to make sure that this function exists, and if not then include the file that has it.
if ( !function_exists( 'is_plugin_active_for_network' ) ) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

if( !function_exists( 'shrkey_on_login_page' ) ) {
	function shrkey_on_login_page() {
	    return in_array($GLOBALS['pagenow'], array('wp-login.php'));
	}
}