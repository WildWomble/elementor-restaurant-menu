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

	require_once( __DIR__ . '/includes/widgets/widget-restaurant-menu.php' );

	$widgets_manager->register( new \Widget_Restaurant_Menu() );

}

add_action( 'elementor/widgets/register', 'register_new_widget' );

function widget_styles() {

	wp_register_style( 'restaurant-menu', plugins_url( 'assets/css/restaurant-menu.css', __FILE__ ) );

	wp_enqueue_style( 'restaurant-menu' );

}
add_action( 'elementor/frontend/before_enqueue_styles', 'widget_styles' );