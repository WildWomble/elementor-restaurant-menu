<?php
/**
 * Plugin Name:                 Elementor Restaurant Menu
 * Description:                 Fancy and responsive restaurant menu.
 * Version:                     1.0.0
 * Author:                      WildWomble
 * Author URI:                  https://github.com/WildWomble/elementor-restaurant-menu
 * Text Domain:                 elementor-restaurant-menu
 * Elementor tested up to:      3.16.0
 * Elementor Pro tested up to:  3.16.0
 */

function register_new_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/widget-restaurant-menu.php' );
	
	$widgets_manager->register( new \Widget_Restaurant_Menu() );

}

add_action( 'elementor/widgets/register', 'register_new_widget' );

function widget_scripts() {

	/* Styles */
	wp_register_style( 'restaurant-menu-css', plugins_url( 'assets/css/restaurant-menu.css', __FILE__ ) );
	
	/* Scripts */
	wp_register_script( 'restaurant-menu-js', plugins_url( 'assets/js/restaurant-menu.js', __FILE__ ) );

}
add_action( 'wp_enqueue_scripts', 'widget_scripts' );
