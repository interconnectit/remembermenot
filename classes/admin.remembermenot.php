<?php

if( !class_exists( 'remembermenotadmin' ) ) {

	class remembermenotadmin {

		function __construct() {

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
				$hook = add_options_page(__('Remember Me','shrkey'), __('Remember Me','shrkey'), 'manage_options',  'shrkey_rememberme', array(&$this,'handle_rememberme_admin'), plugins_url('remembermenot/images/lock.png'));
			} else {
				$hook = add_submenu_page('shrkey', __('Remember Me','membership'), __('Remember Me','membership'), 'manage_options', "shrkey_rememberme", array(&$this,'handle_rememberme_admin'));
			}

			add_action( 'load-' . $hook, array( &$this, 'handle_rememberme_admin_header' ) );

		}

		function handle_rememberme_admin_header() {

		}

		function handle_rememberme_admin() {
			?>
			<div class="wrap">

				<div id="icon-options-general" class="icon32"><br></div>
				<h2><?php _e('Remember Me', 'shrkey'); ?></h2>

				<form method="post" action="">
					<input name='action' value='' />
				<?php
				?>

				<p>
					<?php _e('Allowing users to request that authentication cookies remain on a browser can lead to ','shrkey'); ?>
				</p>

				<h3><?php _e('Remember Me Settings','shrkey'); ?></h3>

				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row"><?php _e('Remove the Remember Me checkbox from the Login form','shrkey'); ?></th>
							<td>
								<input type="checkbox" value="yes" id="shrkey_remembermenot" name="shrkey_remembermenot" />
							</td>
						</tr>

					</tbody>
				</table>

				<p class="submit">
					<input type="submit" value="<?php _e('Save Changes','shrkey'); ?>" class="button button-primary" id="submit" name="submit">
				</p>
				</form>

			</div>
			<?php
		}


	}

}

$remembermenotadmin = new remembermenotadmin();