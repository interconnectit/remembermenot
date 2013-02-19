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

if( !function_exists( 'shrkey_get_rememberme_option' ) ) {
	function shrkey_get_rememberme_option( $default = false ) {
		if(is_multisite() && function_exists('is_plugin_active_for_network') && is_plugin_active_for_network('remembermenot/remembermenot.php')) {
			return get_site_option( 'shrkey_remembermenot', $default);
		} else {
			return get_option( 'shrkey_remembermenot', $default);
		}
	}
}

if( !function_exists( 'shrkey_update_rememberme_option' ) ) {
	function shrkey_update_rememberme_option( $value = null ) {
		if(is_multisite() && function_exists('is_plugin_active_for_network') && is_plugin_active_for_network('remembermenot/remembermenot.php')) {
			return update_site_option( 'shrkey_remembermenot', $value);
		} else {
			return update_option( 'shrkey_remembermenot', $value);
		}
	}
}

if( !function_exists( 'shrkey_delete_rememberme_option' ) ) {
	function shrkey_delete_rememberme_option( ) {
		if(is_multisite() && function_exists('is_plugin_active_for_network') && is_plugin_active_for_network('remembermenot/remembermenot.php')) {
			return delete_site_option( 'shrkey_remembermenot' );
		} else {
			return delete_option( 'shrkey_remembermenot' );
		}
	}
}