<?php

class Widget_Restaurant_Menu extends \Elementor\Widget_Base {
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

		$this->start_controls_section(
			'heading_section',
			[
				'label' 		=> esc_html__( 'Heading', 'elementor-restaurant-menu' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Title', 'elementor-restaurant-menu' ),
				'defaul' 		=> esc_html__( 'Enter your title', 'elementor-restaurant-menu' ),
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'items_section',
			[
				'label' 		=> esc_html__( 'Items', 'elementor-restaurant-menu' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'currency',
			[
				'label' 		=> esc_html__( 'Currency', 'elementor-restaurant-menu' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'RON',
				'options' 		=> [
					'€' 		=> esc_html__( '(€) Euro', 'elementor-restaurant-menu' ),
					'$' 		=> esc_html__( '($) Dollar', 'elementor-restaurant-menu' ),
					'RON' 		=> esc_html__( '(RON) Romanian Leu', 'elementor-restaurant-menu' ),
				]
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Restaurant Items', 'elementor-restaurant-menu' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' 			=> 'list_item_type',
						'label' 		=> esc_html__( 'Type', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::SELECT,
						'default' 		=> 'item',
						'options' 		=> [
							'item' 		=> esc_html__( 'Item', 'elementor-restaurant-menu' ),
							'heading' 	=> esc_html__( 'Heading', 'elementor-restaurant-menu' ),
						]
					],
					[
						'name' 			=> 'list_item_hide',
						'label' 		=> esc_html__( 'Hide this item?', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::SWITCHER,
						'label_on' 		=> esc_html__( 'No', 'elementor-restaurant-menu' ),
						'label_off' 	=> esc_html__( 'Yes', 'elementor-restaurant-menu' ),
						'return_value' 	=> 'yes',
						'default' 		=> 'yes',
					],
					[
						'name' 			=> 'list_item_heading',
						'label' 		=> esc_html__( 'Category Name', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'placeholder' 	=> esc_html__( 'Appetizers' , 'elementor-restaurant-menu' ),
						'label_block' 	=> true,
						'condition' => [
							'list_item_type' => 'heading',
						],
					],
					[
						'name' 			=> 'list_item_name',
						'label' 		=> esc_html__( 'Item Name', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'placeholder' 	=> esc_html__( 'Something delicious!' , 'elementor-restaurant-menu' ),
						'label_block' 	=> true,
						'condition' => [
							'list_item_type' => 'item',
						],
					],
					[
						'name' 			=> 'list_item_ingredients',
						'label' 		=> esc_html__( 'Item Ingredients', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' 	=> esc_html__( 'Cheese - 50g, Bread - 15g, Tomato - 25g' , 'elementor-restaurant-menu' ),
						'condition' => [
							'list_item_type' => 'item',
						],
					],
					[
						'name' 			=> 'list_item_nutrition_facts',
						'label' 		=> esc_html__( 'Item Nutrition Facts', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' 	=> esc_html__( 'Energy Value (kJ/kcal): 568.4 / 135.8, Fat (g): 9.1 of which: Saturated Fatty Acids (g) 4.5, Carbohydrates (g): 7.7 of which: Sugars (g): 1.7, Protein (g): 6.5, Salt (g): 0.5' , 'elementor-restaurant-menu' ),
						'condition' => [
							'list_item_type' => 'item',
						],
					],
					[
						'name' 			=> 'list_item_weight',
						'label' 		=> esc_html__( 'Item Weight (g)', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'placeholder' 	=> esc_html__( '250g' , 'elementor-restaurant-menu' ),
						'condition' => [
							'list_item_type' => 'item',
						],
					],
					[
						'name' 			=> 'list_item_price',
						'label' 		=> esc_html__( 'Item Price', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'placeholder' 	=> esc_html__( '2.55' , 'elementor-restaurant-menu' ),
						'condition' => [
							'list_item_type' => 'item',
						],
					]
				],
				'title_field' => '{{{ list_item_name }}}',
			]
		);

		$this->end_controls_section();
		

		/* 
		*
		* STYLE TAB
		*
		*/
		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<p class="hello-world">
			<?php echo $settings['title']; ?>
		</p>
		
		<?php
		if ( $settings['list'] ) {
			echo '<dl>';
			foreach (  $settings['list'] as $item ) {
				echo '<dt class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . '">' . $item['list_item_name'] . '</dt>';
				echo '<dd>' . $item['list_item_ingredients'] . '</dd>';
			}
			echo '</dl>';
		}
	}
}