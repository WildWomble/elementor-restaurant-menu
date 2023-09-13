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

	public function get_script_depends() {
		return [ 'restaurant-menu-js' ];
	}
    
	protected function register_controls() {
		
		$this->start_controls_section(
			'lang_section',
			[
				'label' 		=> esc_html__( 'Languages', 'elementor-restaurant-menu' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'first_lang',
			[
				'label' 		=> esc_html__( 'First Language', 'elementor-restaurant-menu' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'RON',
				'options' 		=> [
					'romana' 		=> esc_html__( 'Romana', 'elementor-restaurant-menu' ),
					'english' 		=> esc_html__( 'English', 'elementor-restaurant-menu' ),
					'deutsch' 		=> esc_html__( 'Deutsch', 'elementor-restaurant-menu' ),
				]
			]
		);

		$this->add_control(
			'second_lang',
			[
				'label' 		=> esc_html__( 'Second Language', 'elementor-restaurant-menu' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'RON',
				'options' 		=> [
					'romana' 		=> esc_html__( 'Romana', 'elementor-restaurant-menu' ),
					'english' 		=> esc_html__( 'English', 'elementor-restaurant-menu' ),
					'deutsch' 		=> esc_html__( 'Deutsch', 'elementor-restaurant-menu' ),
				]
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'items_section',
			[
				'label' 		=> esc_html__( 'Items & Settings', 'elementor-restaurant-menu' ),
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
						'name'			=> 'list_item_image',
						'label' 		=> esc_html__( 'Choose Image', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::MEDIA,
						'default' 		=> [
							'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'list_item_type' 	=> 'item',
						],
					],
					[
						'name' 			=> 'list_item_show',
						'label' 		=> esc_html__( 'Show this item?', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::SWITCHER,
					],
					[
						'name' 			=> 'second_language',
						'label' 		=> esc_html__( 'Show 2nd language?', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::SWITCHER,
						'label_on' 		=> esc_html__( 'Yes', 'elementor-restaurant-menu' ),
						'label_off' 	=> esc_html__( 'No', 'elementor-restaurant-menu' ),
						'return_value' 	=> 'yes',
						'default' 		=> 'yes',
					],
					[
						'name' 			=> 'list_item_name',
						'label' 		=> esc_html__( 'Item Name', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'Something delicious!' , 'elementor-restaurant-menu' ),
						'label_block' 	=> true,
					],
					[
						'name' 			=> 'list_item_name_2nd',
						'label' 		=> esc_html__( 'Item Name 2', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'Something delicious!' , 'elementor-restaurant-menu' ),
						'label_block' 	=> true,
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
						'name' 			=> 'list_item_ingredients_2nd',
						'label' 		=> esc_html__( 'Item Ingredients 2', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' 	=> esc_html__( 'Something delicious!' , 'elementor-restaurant-menu' ),
						'condition' => [
							'list_item_type' 	=> 'item',
							'second_language'	=> 'yes'
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
						'name' 			=> 'list_item_nutrition_facts_2nd',
						'label' 		=> esc_html__( 'Item Nutrition Facts 2', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' 	=> esc_html__( 'Energy Value (kJ/kcal): 568.4 / 135.8, Fat (g): 9.1 of which: Saturated Fatty Acids (g) 4.5, Carbohydrates (g): 7.7 of which: Sugars (g): 1.7, Protein (g): 6.5, Salt (g): 0.5' , 'elementor-restaurant-menu' ),
						'condition' => [
							'list_item_type' 	=> 'item',
							'second_language'	=> 'yes'
						],
					],
					[
						'name' 			=> 'list_item_alergies',
						'label' 		=> esc_html__( 'Item Alergies', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'placeholder' 	=> esc_html__( 'Peanuts, Milk' , 'elementor-restaurant-menu' ),
						'label_block' 	=> true,
						'condition' => [
							'list_item_type' => 'item',
						],
					],
					[
						'name' 			=> 'list_item_alergies_2nd',
						'label' 		=> esc_html__( 'Item Alergies 2', 'elementor-restaurant-menu' ),
						'type' 			=> \Elementor\Controls_Manager::TEXT,
						'placeholder' 	=> esc_html__( 'Peanuts, Milk' , 'elementor-restaurant-menu' ),
						'label_block' 	=> true,
						'condition' => [
							'list_item_type' 	=> 'item',
							'second_language'	=> 'yes'
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
					],
				],
				'title_field' => '{{list_item_name}} ({{list_item_type}})'
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

		
		<?php
		if ( $settings['list'] ) {
			echo '<div id="language-switch">
				<label for="language_' . $settings['first_lang'] . '">
					<input type="radio" id="language_' . $settings['first_lang'] . '" name="language_switch" value="first_lang">
					<img src="' . plugins_url( '../../assets/img/flags/flag-' . $settings['first_lang'] . '.jpg', __FILE__ ) . '"> <span>' . $settings['first_lang'] . '</span>
				</label>
				<label for="language_' . $settings['second_lang'] . '">
					<input type="radio" id="language_' . $settings['second_lang'] . '" name="language_switch" value="second_lang">
					<img src="' . plugins_url( '../../assets/img/flags/flag-' . $settings['second_lang'] . '.jpg', __FILE__ ) . '"> <span>' . $settings['second_lang'] . '</span>
				</label>
			</div>';

			echo '<div class="restaurant-items">';
			foreach (  $settings['list'] as $item ) {
				$hidden = ($item['list_item_show'] === 'yes') ? 'item-show' : 'item-hidden';

				if($item['list_item_type'] == 'heading') {
					echo '
					<section class="list-item-' . esc_attr( $item['_id'] ) . ' ' . $hidden . '">
						<h2 class="item-section-heading first-lang">' . $item['list_item_name'] . '</h2>
						<h2 class="item-section-heading second-lang">' . $item['list_item_name_2nd'] . '</h2>
					</section>';
				} else {
					echo '
					<div class="item-' . esc_attr( $item['_id'] ) . ' restaurant-item ' . $hidden . '">
						<div class="item-image"><img src="' . $item['list_item_image']['url'] . '"></div>
						<div class="item-details">
							<div class="item-title">
								<div class="first-lang"><h2>' . $item['list_item_name'] . '</h2></div>
								<div class="second-lang"><h2>' . $item['list_item_name_2nd'] . '</h2></div>
							</div>
							<div class="item-info">
								<div class="info-weight">' . $item['list_item_weight'] . '</div>
								<div class="info-price">' . $item['list_item_price'] . ' ' . $settings['currency'] . '</div>
							</div>
							<div class="item-subtitle">
								<p class="first-lang">Click pentru valori nutritionale.</p>
								<p class="second-lang">Click to show nutritional values.</p>
							</div>
							<div class="item-facts">
								<h4 class="first-lang">Ingrediente</h4>
								<h4 class="second-lang">Ingredients</h4>
								<div class="item-ingredients">
									<p class="first-lang">' . $item['list_item_ingredients'] . '</p>
									<p class="second-lang">' . $item['list_item_ingredients_2nd'] . '</p>
								</div>
								<br>
								<h4 class="first-lang">Informatii Nutritionale 100g</h4>
								<h4 class="second-lang">Nutrition Facts per 100g</h4>
								<div class="item-nutr-facts">
									<p class="first-lang">' . $item['list_item_nutrition_facts'] . '</p>
									<p class="second-lang">' . $item['list_item_nutrition_facts_2nd'] . '</p>
								</div>
							</div>
							<div class="item-alergies">
								<p class="first-lang">Alergeni: ' . $item['list_item_alergies'] . '</p>
								<p class="second-lang">Alergies: ' . $item['list_item_alergies_2nd'] . '</p>
							</div>
						</div>
					</div>
					';
				}
			}
			echo '</div>';
		}
	}
}