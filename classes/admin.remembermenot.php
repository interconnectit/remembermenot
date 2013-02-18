<?php

if( !class_exists( 'remembermenotadmin' ) ) {

	class remembermenotadmin {

		function __construct() {
			//login_form

			if( function_exists('is_plugin_active_for_network') && is_plugin_active_for_network('remembermenot/remembermenot.php') ) {
				add_action('network_admin_menu', array(&$this, 'add_admin_menu'));
			} else {
				add_action('admin_menu', array(&$this, 'add_admin_menu'));
			}

		}

		function remembermenotadmin() {
			$this->__construct();
		}

		function has_parent_menu() {

			global $menu;

			foreach( $menu as $m ) {
				if( $m[2] == 'shrkey' ) {
					return true;
				}
			}

			return false;

		}

		function add_admin_menu() {

			global $menu, $admin_page_hooks;

			if( !$this->has_parent_menu() ) {
				add_menu_page(__('Shrkey','shrkey'), __('Shrkey','shrkey'), 'manage_options',  'shrkey', array(&$this,'handle_shrkey_dashboard'), plugins_url('remembermenot/images/lock.png'));
				add_submenu_page('shrkey', '', '', 'manage_options', "shrkey", array(&$this,'handle_shrkey_dashboard'));
			}

			$hook = add_submenu_page('shrkey', __('Remember Me','membership'), __('Remember Me','membership'), 'manage_options', "shrkey_rememberme", array(&$this,'handle_rememberme_admin'));

			add_action( 'load-' . $hook, array( &$this, 'handle_rememberme_admin_header' ) );


		}

		function handle_shrkey_dashboard() {

		}

		function handle_rememberme_admin_header() {

		}

		function handle_rememberme_admin() {

		}


	}

}

$remembermenotadmin = new remembermenotadmin();