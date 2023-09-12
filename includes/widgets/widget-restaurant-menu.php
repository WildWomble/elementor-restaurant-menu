<?php

class Elementor_Restaurant_Menu extends \Elementor\Widget_Base {
	public function get_name() {
		return 'elementor_restaurant_menu';
	}

	public function get_title() {
		return esc_html__( 'Restaurant Menu', 'elementor-restaurant-menu' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://github.com/WildWomble/elementor-restaurant-menu';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'menu', 'restaurant', 'catering' ];
	}
    
	protected function register_controls() {

		$this->start_controls_section();

		$this->add_control();

		$this->add_control();

		$this->add_control();

		$this->end_controls_section();

	}
}