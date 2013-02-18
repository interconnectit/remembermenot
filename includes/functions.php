<?php

if( !function_exists( 'shrkey_on_login_page' ) ) {
	function shrkey_on_login_page() {
	    return in_array($GLOBALS['pagenow'], array('wp-login.php'));
	}
}