<?php

if( !class_exists( 'remembermenotpublic' ) ) {

	class remembermenotpublic {

		var $rememberme = 'no';

		function __construct() {

			// Get the setting option
			$this->rememberme = shrkey_get_rememberme_option( 'no' );

			if( $this->rememberme == 'yes' ) {
				// Set up our actions if we are switched on

			}
			//do_action('login_form');
		}

		function remembermenotpublic() {
			$this->__construct();
		}

		function

	}

}

$remembermenotpublic = new remembermenotpublic();