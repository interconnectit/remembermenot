<?php
/*
Plugin Name: Remember Me Not
Version: 1.1
Plugin URI: https://github.com/shrkey/remembermenot
Description: Completely removes the Remember Me functionality from WordPress
Author: Shrkey
Author URI: http://shrkey.com
Text_domain: shrkey

Copyright 2013 (email: team@shrkey.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$root_dir = __DIR__;

// Include the plugin functions
require_once( $root_dir . '/includes/functions.php' );

if ( remembermenot_on_login_page() ) {
	require_once( $root_dir . '/classes/public.remembermenot.php' );
}