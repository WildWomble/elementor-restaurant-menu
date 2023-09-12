<?php
/**
 * Plugin Name:                 Elementor Restaurant Menu
 * Description:                 Fancy and responsive restaurant menu.
 * Version:                     1.0.0
 * Author:                      MoistWomble
 * Author URI:                  #
 * Text Domain:                 elementor-restaurant-menu
 * Elementor tested up to:      3.16.0
 * Elementor Pro tested up to:  3.14.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ERM_VER', 1.0.0 );
define( 'ERM_FILE', __FILE__ );
define( 'ERM_DIR', plugin_dir_path( __FILE__ ) );

//Load the class
require_once ERM_DIR . '/includes/class-elementor-restaurant-menu.php';