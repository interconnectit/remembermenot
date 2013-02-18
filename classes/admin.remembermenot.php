<?php

if( !class_exists( 'remembermenotadmin' ) ) {

	class remembermenotadmin {

		function __construct() {
			//login_form

			if( function_exists('is_plugin_active_for_network') && is_plugin_active_for_network('remembermenot/remembermenot.php') ) {
				add_action('network_admin_menu', array(&$this, 'add_admin_menu'), 99);
			} else {
				add_action('admin_menu', array(&$this, 'add_admin_menu'), 99);
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
				$hook = add_menu_page(__('Remember Me','shrkey'), __('Remember Me','shrkey'), 'manage_options',  'shrkey_rememberme', array(&$this,'handle_rememberme_admin'), plugins_url('remembermenot/images/lock.png'));
			} else {
				$hook = add_submenu_page('shrkey', __('Remember Me','membership'), __('Remember Me','membership'), 'manage_options', "shrkey_rememberme", array(&$this,'handle_rememberme_admin'));
			}

			add_action( 'load-' . $hook, array( &$this, 'handle_rememberme_admin_header' ) );

		}

		function handle_shrkey_dashboard() {
			?>
			<div class="wrap">

				<div id="icon-index" class="icon32"><br></div>
				<h2><?php _e('Shrkey Dashboard', 'shrkey'); ?></h2>

				<div class="welcome-panel" id="welcome-panel">

					<div class="welcome-panel-content">
						<h3><?php _e('Welcome to Shrkey', 'shrkey'); ?></h3>
						<p class="about-description">We’ve assembled some links to get you started:</p>
						<p></p>
					</div>

				</div>

				<div id="shrkey-dashboard-widgets-wrap">

					<div class="metabox-holder columns-2" id="shrkey-dashboard-widgets">
						<div class="postbox-container">
							<div class="meta-box-sortables ui-sortable">
								<?php do_action( 'shrkey_dashboard_widgets' ); ?>
							</div>
						</div>
					</div>
					<div class="clear"></div>

				</div>

			</div>
			<?php
		}

		function handle_rememberme_admin_header() {

		}

		function handle_rememberme_admin() {

		}


	}

}

$remembermenotadmin = new remembermenotadmin();