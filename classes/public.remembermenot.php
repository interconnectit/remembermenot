<?php

if ( ! class_exists( 'remembermenotpublic' ) ):
	/**
	 * Class remembermenotpublic
	 */
	class remembermenotpublic {
		/**
		 * remembermenotpublic constructor.
		 */
		public function __construct() {
			// Reset any attempt to set the remember option
			add_action( 'login_head', array( $this, 'reset_remember_option' ), 99 );
			// Add the hook into the login_form
			add_action( 'login_form', array( $this, 'start_login_form_cache' ), 99 );
		}

		/**
		 * Reset remember option.
		 */
		public function reset_remember_option() {
			unset( $_POST['rememberme'] );
		}

		/**
		 * Start login form cache.
		 */
		public function start_login_form_cache() {
			ob_start( array( $this, 'process_login_form_cache' ) );
		}

		/**
		 * Process login form cache.
		 *
		 * @param string $content
		 *
		 * @return string
		 */
		public function process_login_form_cache( $content ) {
			return preg_replace( '/<p class="forgetmenot">(.*)<\/p>/', '', $content );
		}
	}
endif;

new remembermenotpublic;
